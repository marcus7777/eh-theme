<?php
global $post;
$photo_size = 'fullsize';	// The WP "size" to use for the large image

$id = $post->ID;
$attachments = get_children( array(
'post_parent' => $id,
'numberposts' => $repeat,
'post_type' => 'attachment',
'post_mime_type' => 'image',
'order' => 'ASC', 
'orderby' => 'menu_order date')
);
if ( !empty($attachments) ) {
  $counter = 0;
  $photo_output = '';
  $thumb_output = '';	
  foreach ( $attachments as $att_id => $attachment ) {
    $counter++;
      // Caption text
    $caption = "";
    if ($attachment->post_excerpt) { 
//      $caption = $attachment->post_excerpt;		
    }
    $src = wp_get_attachment_image_src($att_id, $photo_size, true);
    $photo_output .= 
	    '<img src="'.$src[0].'" width="100%"'
	//    .' title="'.$caption.'"'
	    .' alt="'.$attachment->post_excerpt.'" />'; 
  }  
  ?>
  <div class="cycle-slideshow"
    data-cycle-fx=scrollHorz
    data-cycle-timeout=0
    data-cycle-swipe=true
    style="overflow: hidden; height: 500px;"
  >
    <div class="cycle-pager"></div>
    <div class="cycle-prev" ><</div>
    <div class="cycle-next" >></div>
  <!--  <div class="cycle-overlay"></div>
  -->  
    <?php echo $photo_output; ?>
  </div>
<?php 
} ?>
