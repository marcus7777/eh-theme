<?php get_header(); ?>

<?php global $woo_options; ?>
<?php 
// Global query variable
global $wp_query; 
// Get taxonomy query object
$taxonomy_archive_query_obj = $wp_query->get_queried_object();
// Taxonomy term name
$taxonomy_term_nice_name = $taxonomy_archive_query_obj->name;
// Taxonomy term id
$term_id = $taxonomy_archive_query_obj->term_id;
// Get taxonomy object
$taxonomy_short_name = $taxonomy_archive_query_obj->taxonomy;
$taxonomy_raw_obj = get_taxonomy($taxonomy_short_name);
// You can alternate between these labels: name, singular_name
$taxonomy_full_name = $taxonomy_raw_obj->labels->name;
?>
    
    <div id="content" class="col-full">
    	<?php get_sidebar(); ?>
    	<div id="taxonomycss"> 
		<div id="main" class="fullwidth">

		<?php if (have_posts()) : $count = 0; ?>
        
            <span class="archive_header"><span class="fl cat"><?php echo $taxonomy_term_nice_name;?></span> </span>       
        	<div class="arcive_description"></span><?php echo category_description( $category_id ); ?></div>
        	
            <div class="fix"></div>
        	
        	<div class="more-listings">
        	
        <?php while (have_posts()) : the_post(); $count++; ?>
                                                                    
            <div class="block">

                <?php woo_image('key=image&width=296&height=174'); ?>
                
                <?php 
                //Meta Data
                global $post;
        		$custom_field = $woo_options['woo_slider_image_caption'];
        		$listing_image_caption = get_post_meta($post->ID,$custom_field,true);
				if ($listing_image_caption != '' && $custom_field == 'price') { $listing_image_caption = number_format($listing_image_caption , 0 , '.', ','); }
				?>
                
                <?php if ($listing_image_caption != '') { ?><span class="price"><?php if ($custom_field == 'price') { echo $woo_options['woo_listings_currency']; } echo ''.$listing_image_caption ?></span><?php } ?>
                
                <h2 class="cufon"><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h2>
        		
        		<p><?php echo get_the_excerpt(); ?></p>
        		
        		<span class="more"><a href="<?php echo get_permalink($post->ID); ?>" title="<?php echo get_the_title($post->ID); ?>"</a></span>
        	
            </div><!-- /.block -->
            
            <?php
            	if ( $count % 5 == 0 ) {
            ?>
            	<div class="fix"></div>
            <?php
            	} // End IF Statement
            ?>
            
        <?php endwhile; ?>
        
        	</div><!-- /.more-listings -->
        
        <?php else: ?>
        
            <div class="post">
                <p><?php _e('Sorry, no posts matched your criteria.', 'woothemes') ?></p>
            </div><!-- /.post -->
        
        <?php endif; ?> 
        
        	<div class="fix"></div>
    
			<?php woo_pagenav(); ?>
                
		</div><!-- /#main -->

    </div><!-- /#content -->
    </div><!-- /#taxonomycss -->
		
<?php get_footer(); ?>