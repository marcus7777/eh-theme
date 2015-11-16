<?php
if (!isset($_GET['card']) && !isset($_GET['iframe']) && !isset($_GET['mobi'])) {
  $ota = get_post_meta($post->ID, 'bookingservices', true); 
  get_header();
?>
<?php
  if (have_posts()):
    $count = 0;
  ?><?php
  while (have_posts()):
    the_post();
  $count++;
  ?>  <?php
  global $woo_options, $post;
  if (isset($woo_options['woo_single_listing_image_caption']))
  {
    $listing_image_caption = get_post_meta($post->ID, $woo_options['woo_single_listing_image_caption'], true);
    if ($listing_image_caption != '' && $woo_options['woo_single_listing_image_caption'] == 'price')
    {
      $listing_image_caption = number_format($listing_image_caption, 0, '.', ',');
    }
  }
  else
  {
    $listing_image_caption = '';
  } // End If Statement
  //setup features array
  if ($woo_options['woo_single_listing_feature_taxonomy'])
  {
    $features_list = get_the_term_list($post->ID, $woo_options['woo_single_listing_feature_taxonomy'], '', '|', '');
    $features_array = explode('|', $features_list);
    //setup similar array
    $similar_list = get_the_term_list($post->ID, $woo_options['woo_single_listing_related_taxonomy'], '', '|', '');
    $similar_list = strip_tags($similar_list);
    $similar_array = explode('|', $similar_list);
    $similar_results = '';
    foreach ($similar_array as $similar_item)
    {
      $similar_id = get_term_by('name', $similar_item, $woo_options['woo_single_listing_related_taxonomy']);
      $similar_results = $similar_id->slug . ',';
    }
  }
  else
  {
    $features_array = array();
    $similar_results = '';
  } // End If Statement
?> <div id="content" class="col-full"> 
  <div id="gallerystuff">
  <?php include('includes/galleryheader.php'); ?>
<?php

  if (1 != $ota && 2 != $ota) // venere laterooms  
  {
    print "<!-- bookingservices  " . get_post_meta($post->ID, 'bookingservices', true) . " -->";
?> 
<?php
  } else {
    include "./ota/inpage.php";
  }
?>
 </div>
  <div class="post">   
  <div id="titleblock">	 	
  <H1><?php
  the_title();
  ?></a><?php 
  if ($listing_image_caption != '')
  {
    ?><span class="price"><?php
    if ($woo_options['woo_single_listing_image_caption'] == 'price')
    {
      ?><?php
      echo stripslashes($woo_options['woo_single_listing_starting_at_text']);
      ?><strong><?php
      echo $woo_options['woo_listings_currency'] . $listing_image_caption;
      ?></strong><?php
    }
    else
    {
      echo $listing_image_caption;
    }
    ?></span><?php
  }
?></h1> 
<div class="hoteladd">	
<?php
  echo get_post_meta($post->ID, 'addressline', true);
  echo get_post_meta($post->ID, 'towncity', true);
  echo get_post_meta($post->ID, 'county', true);
  echo get_post_meta($post->ID, 'postcode', true);
?>
</div> 
<div id="teloffer">
  <a href="tel:08001804700">
  <img src="https://essentialhotels.co.uk/wp-content/uploads/2014/09/Telephone-Number-PNG-USE-1.png" alt="Special Phone Only Deals Call 0118 9714 700">
  </a>
</div>

<div id="hotelsinarea">
<?php $my_meta = get_post_meta( $post->ID, 'listofattractions', true ); ?>
<?php if( $my_meta && '' != $my_meta ) : ?>
     <a href="<?php echo $my_meta ?>">Things To Do</a>
<?php endif; ?>  
</div>


<?php
  if (1 != $ota && 2 != $ota) // "venere laterooms" 
  {
    print "<!-- bookingservices  " . get_post_meta($post->ID, 'bookingservices', true) . " -->";
?> 
<div class="chkavail">
  <input type="Submit" class="submit" name="chkavail" value="Check and Book" onclick="window.location.href='<?php echo get_post_meta($post->ID, 'bookwebadd', true); ?>'" />
</div>

<?php } ?>


</div>
<div class="entry">
<?php
    echo do_shortcode(hhost_add_links(get_the_content()));
    ?>  </div>  <div class="lateid">   <strong>Hotel ID</strong>   <?php
    echo get_post_meta($post->ID, 'hotelid', true);
?>  </div>  
  <div class="meta"> <ul> <?php
    foreach ($features_array as $feature_item)
    {
      ?>   <li><?php
      echo $feature_item;
      ?></li>  <?php
    }
    ?> </ul>  </div> <?php
    edit_post_link(__('{ Edit }', 'woothemes'), '<span class="small">', '</span>');
    ?><?php
    $comm = $woo_options['woo_comments'];
    if (($comm == "post" || $comm == "both")):
?>
<?php
      comments_template('', true);
?>
<?php
endif;
?>   </div></div></div>
<?php
$maps_active = get_post_meta($post->ID, 'woo_maps_enable', true);
?>   	<?php
if ($maps_active == 'on')
{
  ?>   		 <div class="map"> <?php
    $mode = get_post_meta($post->ID, 'woo_maps_mode', true);
    $streetview = get_post_meta($post->ID, 'woo_maps_streetview', true);
    $address = get_post_meta($post->ID, 'woo_maps_address', true);
    $long = get_post_meta($post->ID, 'woo_maps_long', true);
    $lat = get_post_meta($post->ID, 'woo_maps_lat', true);
    $pov = get_post_meta($post->ID, 'woo_maps_pov', true);
    $from = get_post_meta($post->ID, 'woo_maps_from', true);
    $to = get_post_meta($post->ID, 'woo_maps_to', true);
    $zoom = get_post_meta($post->ID, 'woo_maps_zoom', true);
    $type = get_post_meta($post->ID, 'woo_maps_type', true);
    $yaw = get_post_meta($post->ID, 'woo_maps_pov_yaw', true);
    $pitch = get_post_meta($post->ID, 'woo_maps_pov_pitch', true);
    if (!empty($lat))
    {
      woo_maps_single_output("mode=$mode&streetview=$streetview&address=$address&long=$long&lat=$lat&pov=$pov&from=$from&to=$to&zoom=$zoom&type=$type&yaw=$yaw&pitch=$pitch");
    }
  ?>   </div><!-- /.map -->		 <div>  		<?php
  echo $woo_term_meta['Hotel ID'][0];
  ?>		 </div>   </div> <?php
}
?>  </div>  <div class="fix"></div>   <div class="fullwidth">  <?php
if (function_exists('yoast_breadcrumb'))
{
  yoast_breadcrumb('<div id="breadcrumb"><p>', '</p></div>');
}
?>   <?php
//RELATED PROPERTIES - BY LOCATION
$similar_results = chop($similar_results, ',');
$query_args = array(
  'post_type' => $post->post_type,
  'post__not_in' => array(
    $post->ID
  ),
  'tax_query' => array(
    array(
      'taxonomy' => $woo_options['woo_single_listing_related_taxonomy'],
      'field' => 'slug',
      'terms' => $similar_results
    )
  ),
  'posts_per_page' => 3,
  'orderby' => 'rand',
);
$related_query = new WP_Query($query_args);
if ($related_query->have_posts()):
  $count = 0;
?> <div class="similar-listings"> <h2 class="cufon"><?php
echo stripslashes($woo_options['woo_single_listing_similar_listings_title']);
?></h2>   <?php
while ($related_query->have_posts()):
  $related_query->the_post();
?>  <?php
$listing_image_caption = get_post_meta($post->ID, $woo_options['woo_single_listing_image_caption'], true);
if ($listing_image_caption != '' && $woo_options['woo_single_listing_image_caption'] == 'price')
{
  $listing_image_caption = number_format($listing_image_caption, 0, '.', ',');
}
?>   <div class="block">  <a href="<?php
the_permalink();
?>">  <?php // woo_image('id='.$post->ID.'&key=image&width=296&height=174&link=img'); 
?>  <?php
if ($post->ID > 0)
{
  // If a featured image is available, use it in priority over the "image" field.
  if (function_exists('has_post_thumbnail') && current_theme_supports('post-thumbnails'))
  {
    if (has_post_thumbnail($post->ID))
    {
      $_id = 0;
      $_id = get_post_thumbnail_id($post->ID);
      if (intval($_id))
      {
        $_image = array();
        $_image = wp_get_attachment_image_src($_id, 'full');
        // $_image should have 3 indexes: url, width and height.
        if (count($_image))
        {
          $_image_url = $_image[0];
          woo_image('src=//st5lte.cloudimage.io/s/resize/296/' . $_image_url . '&key=image&width=296&height=174&link=img');
        } // End IF Statement
      } // End IF Statement
    }
    else
    {
      woo_image('id=' . $post->ID . '&key=image&width=296&height=174&link=img');
    } // End IF Statement
  }
  else
  {
    woo_image('id=' . $post->ID . '&key=image&width=296&height=174&link=img');
  } // End IF Statement
} // End IF Statement
?>  </a>  <?php
if ($listing_image_caption != '')
{
  ?><span class="price"><?php
  if ($woo_options['woo_single_listing_image_caption'] == 'price')
  {
    ?><?php
    echo $woo_options['woo_listings_currency'] . $listing_image_caption;
    ?><?php
  }
  else
  {
    echo $listing_image_caption;
  }
  ?></span><?php
}
?>  <h2 class="cufon"><?php
the_title();
?></h2>  <?php
the_excerpt();
?>  <span class="more"><a href="<?php
the_permalink();
?>"><?php
_e('More Info', 'woothemes');
?></a></span>   </div>   <?php
endwhile;
?>  </div><!-- /.more-listings -->   <div class="fix"></div>   <?php
else:
endif;
?> </div><!-- /.fullwidth -->   </div><!-- /#content -->   <?php
endwhile;
?> <?php
endif;
?>   <?php
get_footer();
} elseif (isset($_GET['mobi'])) {
  // 
  //
  // mobi vertion
  //
  //
  //get_header();
  //
?>
<!DOCTYPE HTML>
<html>
<meta charset="UTF-8">
  <title><?php woo_title(); ?></title>
<?php woo_meta(); ?>
<?php global $woo_options; ?>

    <link rel="stylesheet" href="http://code.jquery.com/ui/1.9.1/themes/base/jquery-ui.css"/>
        <script src="http://code.jquery.com/jquery-1.8.2.js"></script>
    <script src="http://code.jquery.com/ui/1.9.1/jquery-ui.js"></script>

    <link rel="stylesheet" href="/resources/demos/style.css" />

<?php wp_head(); ?>
<?php woo_head(); ?>

<link rel="stylesheet" type="text/css" href="<?php bloginfo('stylesheet_url'); ?>" media="screen" />
<link rel="stylesheet" type="text/css" href="/wp-content/themes/listings/custom.css" media="screen" />
<body class="mobi">
<?php

  if (have_posts()) {
    $count = 0;
    while (have_posts()) {
      the_post();
      $count++;
      global $woo_options, $post;
      if (isset($woo_options['woo_single_listing_image_caption'])) {
        $listing_image_caption = get_post_meta($post->ID, $woo_options['woo_single_listing_image_caption'], true);
        if ($listing_image_caption != '' && $woo_options['woo_single_listing_image_caption'] == 'price') {
          $listing_image_caption = number_format($listing_image_caption, 0, '.', ',');
        }
      } else {
        $listing_image_caption = '';
      } // End If Statement
      //setup features array
      if ($woo_options['woo_single_listing_feature_taxonomy']) {
        $features_list = get_the_term_list($post->ID, $woo_options['woo_single_listing_feature_taxonomy'], '', '|', '');
        $features_array = explode('|', $features_list);
        //setup similar array
        $similar_list = get_the_term_list($post->ID, $woo_options['woo_single_listing_related_taxonomy'], '', '|', '');
        $similar_list = strip_tags($similar_list);
        $similar_array = explode('|', $similar_list);
        $similar_results = '';
        foreach ($similar_array as $similar_item) {
          $similar_id = get_term_by('name', $similar_item, $woo_options['woo_single_listing_related_taxonomy']);
          $similar_results = $similar_id->slug . ',';
        }
      } else {
        $features_array = array();
        $similar_results = '';
      } // End If Statement
?> <div class="full"> 
  <div id="gallerystuff">
    <?php include('includes/galleryheader.php'); ?>
  </div>
  <div class="full">
   <div class="post">   
    <div id="titleblock">	 	
      <h1><?php the_title(); ?></h1> 
      <div class="hoteladd">	
<?php
      echo get_post_meta($post->ID, 'addressline', true);
      echo get_post_meta($post->ID, 'towncity', true);
      echo get_post_meta($post->ID, 'county', true);
      echo get_post_meta($post->ID, 'postcode', true);
?>
      </div> 
    </div>
    <div class="entry">
<?php
      $site = 'essentialhotels.co.uk';
      $booking_form = '<iframe width="310" scrolling="no" height="290" frameborder="0" align="middle" style="overflow: hidden;position: absolute; right: 6px; top: 10px; z-index: 4999;" allowtransparency="true" src="/ota/out.php?doubleroom='. str_replace("http://$site/wp-content/uploads", "", get_post_meta($post->ID, 'classictwinroom', true)) 
        . '&deluxeroom=' . str_replace("http://$site/wp-content/uploads", "", get_post_meta($post->ID, 'executivedoubleroom', true)) 
        .'&familyroom='. str_replace("http://$site/wp-content/uploads", "", get_post_meta($post->ID, 'executivetwinroom', true))
        .'&suiteroom='. str_replace("http://$site/wp-content/uploads", "", get_post_meta($post->ID, 'juniorsuiteroom', true))
        .'&singleroom='. str_replace("http://$site/wp-content/uploads", "", get_post_meta($post->ID, 'classicdoublerm', true))
        .'&doublemap='. get_post_meta($post->ID, 'classictwinroomdes', true)
        .'&deluxemapp'. get_post_meta($post->ID, 'executivedoublermdes', true)
        .'&familymap='. get_post_meta($post->ID, 'executivetwinrmdescr', true)
        .'&suitemap='. get_post_meta($post->ID, 'juniorsuitermdes', true)
        .'&singlemap='. get_post_meta($post->ID, 'classicdoublermdes', true)
        .'&id='. get_post_meta($post->ID, 'hotelid', true)
        .'&doubledisplay='. get_post_meta($post->ID, 'classictwinrmtitle', true)
        .'&deluxedisplay='. get_post_meta($post->ID, 'executivedblrmtitle', true)
        .'&familydisplay='. get_post_meta($post->ID, 'executivetwinrmtitle', true)
        .'&suitedisplay='. get_post_meta($post->ID, 'juniorrmtitle', true)
        .'&singledisplay='. get_post_meta($post->ID, 'classicdblrmtitle', true)
        .'&ota='. get_post_meta($post->ID, 'bookingservices', true)
        .'" ></iframe>';
      $hhost_text = hhost_stripArgumentFromTags(get_the_content()); //strip attributes
      echo do_shortcode(hhost_add_links_mobi('<h2>Book</h2>'. $booking_form .'<h2>Infomation</h2>'. $hhost_text));
?>  </div>  
  </div>
</div>
<?php
      $maps_active = get_post_meta($post->ID, 'woo_maps_enable', true);
      if ($maps_active == 'on') {
        ?><div class="map"><h2 class="cufon"><?php
        echo stripslashes($woo_options['woo_single_listing_google_map_title']);
        ?></h2> <div class="map <?php
        if (!empty($video)) {
          echo 'fr';
        } else {
          echo 'wide';
        }
        ?>"> <?php
        if ($maps_active == 'on' && 4 != get_post_meta($post->ID, 'bookingservices', true))
        {
          $mode = get_post_meta($post->ID, 'woo_maps_mode', true);
          $streetview = get_post_meta($post->ID, 'woo_maps_streetview', true);
          $address = get_post_meta($post->ID, 'woo_maps_address', true);
          $long = get_post_meta($post->ID, 'woo_maps_long', true);
          $lat = get_post_meta($post->ID, 'woo_maps_lat', true);
          $pov = get_post_meta($post->ID, 'woo_maps_pov', true);
          $from = get_post_meta($post->ID, 'woo_maps_from', true);
          $to = get_post_meta($post->ID, 'woo_maps_to', true);
          $zoom = get_post_meta($post->ID, 'woo_maps_zoom', true);
          $type = get_post_meta($post->ID, 'woo_maps_type', true);
          $yaw = get_post_meta($post->ID, 'woo_maps_pov_yaw', true);
          $pitch = get_post_meta($post->ID, 'woo_maps_pov_pitch', true);
          if (!empty($lat) OR !empty($from))
          {
            woo_maps_single_output("mode=$mode&streetview=$streetview&address=$address&long=$long&lat=$lat&pov=$pov&from=$from&to=$to&zoom=$zoom&type=$type&yaw=$yaw&pitch=$pitch");
          }
        }
        ?></div><!-- /.map --><?php
        ?></div><?php
      }
      ?></div><div class="fix"></div> <?php
    }// end whil
  }//endif;
  //get_footer();
?>
        <div id="footer" class="full">
                <div id="copyright" class="col-left">
                        <p>© 2014 Essential Hotels 01189714700. All Rights Reserved.</p>
                </div>
                <div id="credit" class="col-right">
        <p>Designed by Morna</p>
                </div>
        </div><!-- /#footer  -->
  </body>
  <script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
    (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
      m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-46452484-1', 'essentialhotels.co.uk');
  ga('send', 'pageview');
  </script>
  <script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>
<!--Start of Zopim Live Chat Script-->
  <script type="text/javascript">
  window.$zopim||(function(d,s){var z=$zopim=function(c){z._.push(c)},$=z.s=
    d.createElement(s),e=d.getElementsByTagName(s)[0];z.set=function(o){z.set.
    _.push(o)};z._=[];z.set._=[];$.async=!0;$.setAttribute('charset','utf-8');
  $.src='//v2.zopim.com/?jPEQ1iJPWGDWy7FQte1G1UivoCqWZMzw';z.t=+new Date;$.
    type='text/javascript';e.parentNode.insertBefore($,e)})(document,'script');
  </script>
<!--End of Zopim Live Chat Script-->

</html>
<?php
} elseif (isset($_GET['card'])) {
  // 
  //
  // card vertion
  //
  //
  //get_header();
  //
?>
<!DOCTYPE HTML>
<html>
<meta charset="UTF-8">
  <title><?php woo_title(); ?></title>
<?php woo_meta(); ?>
<?php global $woo_options; ?>

    <link rel="stylesheet" href="http://code.jquery.com/ui/1.9.1/themes/base/jquery-ui.css"/>
        <script src="http://code.jquery.com/jquery-1.8.2.js"></script>
    <script src="http://code.jquery.com/ui/1.9.1/jquery-ui.js"></script>

    <link rel="stylesheet" href="/resources/demos/style.css" />

<?php wp_head(); ?>
<?php woo_head(); ?>

<link rel="stylesheet" type="text/css" href="<?php bloginfo('stylesheet_url'); ?>" media="screen" />
<link rel="stylesheet" type="text/css" href="/wp-content/themes/listings/custom.css" media="screen" />
<body class="card">
<?php

  if (have_posts()) {
    $count = 0;
    while (have_posts()) {
      the_post();
      $count++;
      global $woo_options, $post;
      if (isset($woo_options['woo_single_listing_image_caption'])) {
        $listing_image_caption = get_post_meta($post->ID, $woo_options['woo_single_listing_image_caption'], true);
        if ($listing_image_caption != '' && $woo_options['woo_single_listing_image_caption'] == 'price') {
          $listing_image_caption = number_format($listing_image_caption, 0, '.', ',');
        }
      } else {
        $listing_image_caption = '';
      } // End If Statement
      //setup features array
      if ($woo_options['woo_single_listing_feature_taxonomy']) {
        $features_list = get_the_term_list($post->ID, $woo_options['woo_single_listing_feature_taxonomy'], '', '|', '');
        $features_array = explode('|', $features_list);
        //setup similar array
        $similar_list = get_the_term_list($post->ID, $woo_options['woo_single_listing_related_taxonomy'], '', '|', '');
        $similar_list = strip_tags($similar_list);
        $similar_array = explode('|', $similar_list);
        $similar_results = '';
        foreach ($similar_array as $similar_item) {
          $similar_id = get_term_by('name', $similar_item, $woo_options['woo_single_listing_related_taxonomy']);
          $similar_results = $similar_id->slug . ',';
        }
      } else {
        $features_array = array();
        $similar_results = '';
      } // End If Statement
?> <div class="full"> 
  <div id="gallerystuff">
    <?php include('includes/galleryheader.php'); ?>
  </div>
  <div class="full">
   <div class="post">   
    <div id="titleblock">	 	
      <h1><?php the_title(); ?></h1> 
      <div class="hoteladd">	
<?php
      echo get_post_meta($post->ID, 'addressline', true);
      echo get_post_meta($post->ID, 'towncity', true);
      echo get_post_meta($post->ID, 'county', true);
      echo get_post_meta($post->ID, 'postcode', true);
?>
      </div> 
    </div>
    <div class="entry">
<?php
      $site = 'essentialhotels.co.uk';
      $booking_form = '<iframe width="310" scrolling="no" height="290" frameborder="0" align="middle" style="overflow: hidden;position: absolute; right: 6px; top: 10px; z-index: 4999;" allowtransparency="true" src="https://essentialhotels.co.uk/venere/out.php?doubleroom='. str_replace("http://$site/wp-content/uploads", "", get_post_meta($post->ID, 'classictwinroom', true)) 
        . '&deluxeroom=' . str_replace("http://$site/wp-content/uploads", "", get_post_meta($post->ID, 'executivedoubleroom', true)) 
        .'&familyroom='. str_replace("http://$site/wp-content/uploads", "", get_post_meta($post->ID, 'executivetwinroom', true))
        .'&suiteroom='. str_replace("http://$site/wp-content/uploads", "", get_post_meta($post->ID, 'juniorsuiteroom', true))
        .'&singleroom='. str_replace("http://$site/wp-content/uploads", "", get_post_meta($post->ID, 'classicdoublerm', true))
        .'&doublemap='. get_post_meta($post->ID, 'classictwinroomdes', true)
        .'&deluxemapp'. get_post_meta($post->ID, 'executivedoublermdes', true)
        .'&familymap='. get_post_meta($post->ID, 'executivetwinrmdescr', true)
        .'&suitemap='. get_post_meta($post->ID, 'juniorsuitermdes', true)
        .'&singlemap='. get_post_meta($post->ID, 'classicdoublermdes', true)
        .'&id='. get_post_meta($post->ID, 'hotelid', true)
        .'&doubledisplay='. get_post_meta($post->ID, 'classictwinrmtitle', true)
        .'&deluxedisplay='. get_post_meta($post->ID, 'executivedblrmtitle', true)
        .'&familydisplay='. get_post_meta($post->ID, 'executivetwinrmtitle', true)
        .'&suitedisplay='. get_post_meta($post->ID, 'juniorrmtitle', true)
        .'&singledisplay='. get_post_meta($post->ID, 'classicdblrmtitle', true)
        .'&ota='. get_post_meta($post->ID, 'bookingservices', true)
        .'" ></iframe>';
      $hhost_text = hhost_stripArgumentFromTags(get_the_content()); //strip attributes
      echo do_shortcode(hhost_add_links_card('<h2>Info</h2>'. $hhost_text.'<h2>Book</h2>'. $booking_form));
?>  </div>  
  </div>
</div>id
<?php
      $maps_active = get_post_meta($post->ID, 'woo_maps_enable', true);
      if ($maps_active == 'on') {
        ?><div class="map"><h2 class="cufon"><?php
        echo stripslashes($woo_options['woo_single_listing_google_map_title']);
        ?></h2> <div class="map"> <?php
        if ($maps_active == 'on')
        {
          $mode = get_post_meta($post->ID, 'woo_maps_mode', true);
          $streetview = get_post_meta($post->ID, 'woo_maps_streetview', true);
          $address = get_post_meta($post->ID, 'woo_maps_address', true);
          $long = get_post_meta($post->ID, 'woo_maps_long', true);
          $lat = get_post_meta($post->ID, 'woo_maps_lat', true);
          $pov = get_post_meta($post->ID, 'woo_maps_pov', true);
          $from = get_post_meta($post->ID, 'woo_maps_from', true);
          $to = get_post_meta($post->ID, 'woo_maps_to', true);
          $zoom = get_post_meta($post->ID, 'woo_maps_zoom', true);
          $type = get_post_meta($post->ID, 'woo_maps_type', true);
          $yaw = get_post_meta($post->ID, 'woo_maps_pov_yaw', true);
          $pitch = get_post_meta($post->ID, 'woo_maps_pov_pitch', true);
          if (!empty($lat) OR !empty($from))
          {
            woo_maps_single_output("mode=$mode&streetview=$streetview&address=$address&long=$long&lat=$lat&pov=$pov&from=$from&to=$to&zoom=$zoom&type=$type&yaw=$yaw&pitch=$pitch");
          }
        }
        ?></div><!-- /.map --><?php
        ?></div><?php
      }
      ?></div><div class="fix"></div> <?php
    }// end whil
  }//endif;
  //get_footer();
?>
        <div id="footer" class="full">
                <div id="copyright" class="col-left">
                        <p>© 2014 Essential Hotels 01189714700. All Rights Reserved.</p>
                </div>
                <div id="credit" class="col-right">
        <p>Designed by Morna</p>
                </div>
        </div><!-- /#footer  -->
  </body>
  <script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
    (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
      m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-46452484-1', 'essentialhotels.co.uk');
  ga('send', 'pageview');
  </script>
  <script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>
<!--Start of Zopim Live Chat Script-->
  <script type="text/javascript">
  window.$zopim||(function(d,s){var z=$zopim=function(c){z._.push(c)},$=z.s=
    d.createElement(s),e=d.getElementsByTagName(s)[0];z.set=function(o){z.set.
    _.push(o)};z._=[];z.set._=[];$.async=!0;$.setAttribute('charset','utf-8');
  $.src='//v2.zopim.com/?jPEQ1iJPWGDWy7FQte1G1UivoCqWZMzw';z.t=+new Date;$.
    type='text/javascript';e.parentNode.insertBefore($,e)})(document,'script');
  </script>
<!--End of Zopim Live Chat Script-->

</html>
<?php
} else {
  include "./ota/inpage.php";
}
?>
