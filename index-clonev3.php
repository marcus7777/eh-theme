<?php get_header(); ?>
<?php global $woo_options; ?>
  <div id="content" class="col-full home-content">
    <div class="full"> 		      
      <div id="main" class="fullwidth">      
        <div class="white-box">
      
<?php if ($woo_options['woo_texttitle'] <> "true") : $logo = $woo_options['woo_logo']; ?>
            <a href="/" title="<?php bloginfo('description'); ?>">
                <img src="<?php if ($logo) echo $logo; else { bloginfo('template_directory'); ?>/images/logo.png<?php } ?>" alt="<?php bloginfo('name'); ?>" />
            </a>
        <?php endif; ?> 
        
          	<div id="MiddleTitle">Search for Hotels, Destinations & Attractions</div>
          		<div class="essential">
            		<input class="typeahead" type="text" placeholder="Hotel, City, Area or Interest"/>
          		</div>
        	</div> 	
        </div>
        
        
        
      </div>	
      			<div div id="boxbottom">     	

<?php
/*
global $acn;
echo $acn->show('taxonomy=region&sort=no&options=no&layout=grid&social=no'); 
*/

?>
                </div>

                </div>

<script src="//twitter.github.io/typeahead.js/js/handlebars.js"></script>
<script src="//twitter.github.io/typeahead.js/releases/latest/typeahead.bundle.js"></script>
<?php get_footer(); ?>
