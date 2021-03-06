  <div id="lateroomsbooking">

                    <?php // woisme.php 

error_reporting( E_ALL );

// SET THE APPROPRIATE TIMEZONE 

date_default_timezone_set( 'Europe/London' );

// ASSIGN DEFAULT VALUES. DEFAULT DATE NEEDS TO BE SET FOR TODAY BY DEFAULT

$booking_default_sdate = date( "d.m.y", strtotime( "next week" ) );

// ASSIGN REQUEST VALUES OR SET DEFAULT
$booking_hotel    = ( isset( $_GET['hotel_id'] ) AND strlen( $_GET['hotel_id'] ) > 0 ) ? (int) $_GET['hotel_id'] : 260075;
$booking_phone_page = 'http://essentialworld.travel/phone-only-offer-call-or-request-callback-now/';

$_GET = $_POST;


$booking_sdate    = ( isset( $_GET['sdate'] ) AND strlen( $_GET['sdate'] ) > 0 ) ? date( 'd.m.y', strtotime( $_GET['sdate'] ) ) : $booking_default_sdate;

$booking_nights   = ( isset( $_GET['nights'] ) AND strlen( $_GET['nights'] ) > 0 ) ? (int) $_GET['nights'] : "5";

$booking_adults   = ( isset( $_GET['adults'] ) AND strlen( $_GET['adults'] ) > 0 ) ? (int) $_GET['adults'] : 1;

$booking_children = ( isset( $_GET['children'] ) AND strlen( $_GET['children'] ) > 0 ) ? (int) $_GET['children'] : 0;

// sdate nights hotel adults children

// READ THE FEED AND MAKE AN OBJECT

/** not:

* hid = hotel id

* rid = room id

* r = number of rooms

* n = nights

* d = start date

* a = adults

* c = children

**/

if ( $booking_children == 0 AND $booking_adults < 3 ) {

  $booking_xml = "http://xmlfeed.laterooms.com/index.aspx?aid=3095&rtype=7&hids=$booking_hotel&sdate=$booking_sdate" . "&nights=$booking_nights";

  // needs looking at ."&a=$booking_adults";

  $booking_obj = simplexml_load_file( $booking_xml );

  if ( is_object( $booking_obj ) ) {

    $booking_out   = NULL;   

    $booking_html_nights = NULL;

    $booking_html_nights = '<select id="nightpicker" class="rounded" name="nights"/>';

    for ( $booking_i = 1; $booking_i <= 28; $booking_i++ ) { //nights list

      If ( $booking_i == $booking_nights ) {

        $booking_html_nights .= '<option selected="selected" >' . $booking_i . '</option>';

      } else {

        $booking_html_nights .= '<option>' . $booking_i . '</option>';

      }

    }

    $booking_html_nights .= '</select>';

    $booking_html_adults = NULL;

    $booking_html_adults = '<select id="adultspicker" class="rounded" name="adults"/>';  

    for ( $booking_i = 1; $booking_i <= 10; $booking_i++ ) { //adults list

      If ( $booking_i == $booking_adults ) {

        $booking_html_adults .= '<option selected="selected" >' . $booking_i . '</option>';

      } else {

        $booking_html_adults .= '<option>' . $booking_i . '</option>';

      }

    }

    $booking_html_adults .= '</select>';

    $booking_html_children = NULL;

    $booking_html_children = '<select id="childrenpicker" class="rounded" name="children"/>';

    for ( $booking_i = 0; $booking_i <= 10; $booking_i++ ) { //children list

      If ( $booking_i == $booking_children ) {

        $booking_html_children .= '<option selected="selected" >' . $booking_i . '</option>';

      } else {

        $booking_html_children .= '<option>' . $booking_i . '</option>';

      }

    }

    $booking_html_children .= '</select>';

    // CONSTRUCT AN OUTPUT HTML STRING JUST HERE   

    $booking_out .= '<tr><th class="roomty">Room Type</th><th></th><th class="tot">Total</th></tr>';
    if (is_object( $booking_obj->lr_rates->hotel->hotel_rooms->room )) {
      foreach ( $booking_obj->lr_rates->hotel->hotel_rooms->room as $booking_rm ) {
        $booking_out .= '<tr><td width="270px" class="rmdes">';
        $booking_out .= (string) $booking_rm->type_description . ' room ';
        $booking_out .= 'sleeps ' . (string) $booking_rm->sleeps . '</td>';
        $booking_totalPrice = 0;
        $booking_flag_full  = ""; //flag to show the where full is
        $booking_out_total  = "";

        foreach ( $booking_rm->rate as $booking_rt ) {

          if ( (string) $booking_rt->price == 'Full' ) {
            $booking_flag_full = 'on request';
          }

          $booking_out .= '<td width="1px" class="price"> ' . (string) $booking_rt->price . '</td><td class="totalpr" align="right">';

          $booking_totalPrice += floatval( preg_replace( '/[^\d . ]+/', '', $booking_rt->price ) );

        }

        if ( $booking_flag_full !== 'on request' ) {

          $booking_out_total = '&pound;' . number_format( $booking_totalPrice, 2 );
          $booking_action    = "https://bookings.essentialworld.travel/bookings.php";

        } else {

          $booking_out_total = $booking_flag_full;
          $booking_action    = $booking_phone_page;

        }

        $booking_room_type = $booking_rm->type_description;

        $booking_out .= $booking_out_total . '</td></tr>';

        $booking_out .= '<tr><td colspan="3" width="400px" cellpadding-bottom="30px" class="des" bgcolor="#FFFFFF" >' . (string) $booking_rm->description . '</td><td><form action="' . $booking_action . '" method="post" >' . "<input type=hidden name=sdate value='$booking_sdate' >" . "<input type=hidden name=nights value='$booking_nights' >" . "<input type=hidden name=hotel_id value='$booking_hotel' >" . "<input type=hidden name=adults value='$booking_adults' >" . "<input type=hidden name=children value='$booking_children' >" . "<input type=hidden name=room value='$booking_room_type' >". "<input type=hidden name=children value='$booking_children' >" . "<input type=hidden name=roomid value='$booking_room_type' >" . "<input type=hidden name=status value='$booking_flag_full' >" . '<input type=submit class="submit"  value="Book"/></form></td></tr>';

      } else { 
         print '<meta http-equiv="refresh" content="0;url='.$booking_phone_page.'">';
      }
  } 

  // HTML DOCUMENT USING HEREDOC NOTATION

  $booking_htm = <<<ENDHTML

<!doctype html>

<head>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<title>Essential Hotels Travel</title>

<style type="text/css">

input.rounded {

     margin-bottom: 20px;

     margin-right: 3px;

     margin-left: 3px;

    border: 1px solid #ccc;
	
  /* Safari 5, Chrome support border-radius without vendor prefix.

   * FF 3.0/3.5/3.6, Mobile Safari 4.0.4 require vendor prefix.

   * No support in Safari 3/4, IE 6/7/8, Opera 10.0.

   */

  -moz-border-radius: 5px;

  -webkit-border-radius: 5px;

  border-radius: 5px;

  /* Chrome, FF 4.0 support box-shadow without vendor prefix.

   * Safari 3/4/5 and FF 3.5/3.6 require vendor prefix.

   * No support in FF 3.0, IE 6/7/8, Opera 10.0, iPhone 3.

   * change the offsets, blur and color to suit your design.

   */

  -moz-box-shadow: 2px 2px 3px #33cccc;

  -webkit-box-shadow: 2px 2px 3px #33cccc;

  box-shadow: 2px 2px 3px #33cccc;

  /* using a bigger font for demo purposes so the box isn't too small */

  font-size: 20px;

  /* with a big radius/font there needs to be padding left and right

   * otherwise the text is too close to the radius.

   * on a smaller radius/font it may not be necessary

   */

  padding: 4px 7px;

  /* only needed for webkit browsers which show a rectangular outline;

   * others do not do outline when radius used.

   * android browser still displays a big outline

   */

  outline: 0;

  /* this is needed for iOS devices otherwise a shadow/line appears at the

   * top of the input. depending on the ratio of radius to height it will

   * go all the way across the full width of the input and look really messy.

   * ensure the radius is no more than half the full height of the input,

   * and the following is set, and everything will render well in iOS.

   */

  -webkit-appearance: none;

  width:120px;

}

input.rounded:focus {

  /* supported IE8+ and all other browsers tested.

   * optional, but gives the input focues when selected.

   * change to a color that suits your design.

   */

  border-color: #66cccc;

  width:120px;

}

select.rounded {

     margin-bottom: 20px;

     margin-right: 3px;

     margin-left: 3px;

    border: 1px solid #ccc;

  /* Safari 5, Chrome support border-radius without vendor prefix.

   * FF 3.0/3.5/3.6, Mobile Safari 4.0.4 require vendor prefix.

   * No support in Safari 3/4, IE 6/7/8, Opera 10.0.

   */

  -moz-border-radius: 5px;

  -webkit-border-radius: 5px;

  border-radius: 5px;

  /* Chrome, FF 4.0 support box-shadow without vendor prefix.

   * Safari 3/4/5 and FF 3.5/3.6 require vendor prefix.

   * No support in FF 3.0, IE 6/7/8, Opera 10.0, iPhone 3.

   * change the offsets, blur and color to suit your design.

   */

  -moz-box-shadow: 2px 2px 3px #33cccc;

  -webkit-box-shadow: 2px 2px 3px #33cccc;

  box-shadow: 2px 2px 3px #33cccc;

  /* using a bigger font for demo purposes so the box isn't too small */

  font-size: 20px;

  /* with a big radius/font there needs to be padding left and right

   * otherwise the text is too close to the radius.

   * on a smaller radius/font it may not be necessary

   */

  padding: 4px 7px;

  /* only needed for webkit browsers which show a rectangular outline;

   * others do not do outline when radius used.

   * android browser still displays a big outline

   */

  outline: 0;

  /* this is needed for iOS devices otherwise a shadow/line appears at the

   * top of the input. depending on the ratio of radius to height it will

   * go all the way across the full width of the input and look really messy.

   * ensure the radius is no more than half the full height of the input,

   * and the following is set, and everything will render well in iOS.

   */

  -webkit-appearance: none;

}

select.rounded:focus {

  /* supported IE8+ and all other browsers tested.

   * optional, but gives the input focues when selected.

   * change to a color that suits your design.

   */

  border-color: #66cccc;

}

</style>

<meta charset="utf-8" />

    <!-- jQuery UI Datepicker - Animations   -->

    <link rel="stylesheet" href="http://code.jquery.com/ui/1.9.1/themes/base/jquery-ui.css"/>
	<script src="http://code.jquery.com/jquery-1.8.2.js"></script>
    <script src="http://code.jquery.com/ui/1.9.1/jquery-ui.js"></script>

    <link rel="stylesheet" href="/resources/demos/style.css" />

   <script>

     $(function() {

        // initialize the datapicker

             $("#datepicker").datepicker({ dateFormat: 'dd.mm.y' }); // eu date format e.g. 27.09.77    

     });

   </script>

</head>

<body>

<h2 class="restitle" style="color:#33CCCC;" >reserve your room</h2>

     <form method="post">

                    <input type="hidden" name="aid" value="3095" />

               <div class="dformdate">

                    <label for='datepicker'>Date</label>

                    <input type="text" id="datepicker" class="daterounded"  VALUE="$booking_sdate" name="sdate"/>

               </div>

            <div class="dformnights">

                    <label for='nightspicker'>Nights</label>

                    $booking_html_nights

               </div>

            <div class="dformadults">

                 <label for='adultspicker'>Adults</label>

                    $booking_html_adults

               </div>

            <div class="dformchildren">

                    <label for='childrenpicker'>Kids</label>

                              $booking_html_children

            </div>

            <div class="dsubmit">

                    <input type="submit" class="submit"  value="Check"/>

            </div>

     </form>

<table class="tble">

$booking_out

</table>

</body>

</html>

ENDHTML;

  // RENDER THE WEB PAGE

  echo $booking_htm;

} else {

  // in drupal I'd use drupal_goto('phone-only-offer-call-or-request-callback-now')

  print '<meta http-equiv="refresh" content="0;url='.$booking_phone_page.'">';
}

       ?>
       
       </div>
