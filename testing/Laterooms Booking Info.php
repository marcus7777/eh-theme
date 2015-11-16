  <div id="lateroomsbooking">

                    <?php // woisme.php 

error_reporting( E_ALL );

// SET THE APPROPRIATE TIMEZONE

date_default_timezone_set( 'Europe/London' );

// ASSIGN DEFAULT VALUES. DEFAULT DATE NEEDS TO BE SET FOR TODAY BY DEFAULT

$default_sdate = date( "d.m.y", strtotime( "next week" ) );

// ASSIGN REQUEST VALUES OR SET DEFAULT

$_GET = $_POST;


$sdate    = ( isset( $_GET['sdate'] ) AND strlen( $_GET['sdate'] ) > 0 ) ? date( 'd.m.y', strtotime( $_GET['sdate'] ) ) : $default_sdate;

$nights   = ( isset( $_GET['nights'] ) AND strlen( $_GET['nights'] ) > 0 ) ? (int) $_GET['nights'] : "5";

$hotel    = ( isset( $_GET['hotel_id'] ) AND strlen( $_GET['hotel_id'] ) > 0 ) ? (int) $_GET['hotel_id'] : 260075;

$adults   = ( isset( $_GET['adults'] ) AND strlen( $_GET['adults'] ) > 0 ) ? (int) $_GET['adults'] : 1;

$children = ( isset( $_GET['children'] ) AND strlen( $_GET['children'] ) > 0 ) ? (int) $_GET['children'] : 0;

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

if ( $children == 0 AND $adults < 3 ) {

  $xml = "http://xmlfeed.laterooms.com/index.aspx?aid=3095&rtype=7&hids=$hotel&sdate=$sdate" . "&nights=$nights";

  // needs looking at ."&a=$adults";

  $obj = simplexml_load_file( $xml );

  if ( is_object( $obj ) ) {

    $out   = NULL;   

    $html_nights = NULL;

    $html_nights = '<select id="nightpicker" class="rounded" name="nights"/>';

    for ( $i = 1; $i <= 28; $i++ ) { //nights list

      If ( $i == $nights ) {

        $html_nights .= '<option selected="selected" >' . $i . '</option>';

      } else {

        $html_nights .= '<option>' . $i . '</option>';

      }

    }

    $html_nights .= '</select>';

    $html_adults = NULL;

    $html_adults = '<select id="adultspicker" class="rounded" name="adults"/>';  

    for ( $i = 1; $i <= 10; $i++ ) { //adults list

      If ( $i == $adults ) {

        $html_adults .= '<option selected="selected" >' . $i . '</option>';

      } else {

        $html_adults .= '<option>' . $i . '</option>';

      }

    }

    $html_adults .= '</select>';

    $html_children = NULL;

    $html_children = '<select id="childrenpicker" class="rounded" name="children"/>';

    for ( $i = 0; $i <= 10; $i++ ) { //children list

      If ( $i == $children ) {

        $html_children .= '<option selected="selected" >' . $i . '</option>';

      } else {

        $html_children .= '<option>' . $i . '</option>';

      }

    }

    $html_children .= '</select>';

    // CONSTRUCT AN OUTPUT HTML STRING JUST HERE   

    $out .= '<tr><th class="roomty">Room Type</th><th></th><th class="tot">Total</th></tr>';

    foreach ( $obj->lr_rates->hotel->hotel_rooms->room as $rm ) {

      $out .= '<tr><td width="270px" class="rmdes">';

      $out .= (string) $rm->type_description . ' room ';

      $out .= 'sleeps ' . (string) $rm->sleeps . '</td>';

      $totalPrice = 0;

      $flag_full  = ""; //flag to show the where full is

      $out_total  = "";

      foreach ( $rm->rate as $rt ) {

        if ( (string) $rt->price == 'Full' ) {

          $flag_full = 'on request';

        }

        $out .= '<td width="1px" class="price"> ' . (string) $rt->price . '</td><td class="totalpr" align="right">';

        $totalPrice += floatval( preg_replace( '/[^\d . ]+/', '', $rt->price ) );

      }

      if ( $flag_full !== 'on request' ) {

        $out_total = '&pound;' . number_format( $totalPrice, 2 );

        $action    = "https://bookings.essentialworld.travel/bookings.php";

      } else {

        $out_total = $flag_full;

        $action    = "http://essentialworld.travel/phone-only-offer-call-or-request-callback-now/";

      }

      $room_type = $rm->type_description;

      $out .= $out_total . '</td></tr>';

      $out .= '<tr><td colspan="3" width="400px" cellpadding-bottom="30px" class="des" bgcolor="#FFFFFF" >' . (string) $rm->description . '</td><td><form action="' . $action . '" method="post" >' . "<input type=hidden name=sdate value='$sdate' >" . "<input type=hidden name=nights value='$nights' >" . "<input type=hidden name=hotel_id value='$hotel' >" . "<input type=hidden name=adults value='$adults' >" . "<input type=hidden name=children value='$children' >" . "<input type=hidden name=room value='$room_type' >" . "<input type=hidden name=status value='$flag_full' >" . '<input type=submit class="submit"  value="Book"/></form></td></tr>';

    }

  } 

  // HTML DOCUMENT USING HEREDOC NOTATION

  $htm = <<<ENDHTML

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

                    <input type="text" id="datepicker" class="daterounded"  VALUE="$sdate" name="sdate"/>

               </div>

            <div class="dformnights">

                    <label for='nightspicker'>Nights</label>

                    $html_nights

               </div>

            <div class="dformadults">

                 <label for='adultspicker'>Adults</label>

                    $html_adults

               </div>

            <div class="dformchildren">

                    <label for='childrenpicker'>Kids</label>

                              $html_children

            </div>

            <div class="dsubmit">

                    <input type="submit" class="submit"  value="Check"/>

            </div>

     </form>

<table class="tble">

$out

</table>

</body>

</html>

ENDHTML;

  // RENDER THE WEB PAGE

  echo $htm;

} else {

  // in drupal I'd use drupal_goto('phone-only-offer-call-or-request-callback-now')

  print '<meta http-equiv="refresh" content="0;url=http://essentialworld.travel/phone-only-offer-call-or-request-callback-now/">';
}

       ?>
       
       </div>