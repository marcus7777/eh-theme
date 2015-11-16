<?php global $woo_options; ?>
<div class="search_module">
    <div class="fix"></div>
    <div class="search_main fl">
         <div class="panel<?php if ( $woo_options['woo_keywords'] <> 'true' ) echo ' full'; ?>">
            <div class="main-control">
              <form method="get" class="searchform" action="/">
                <div>
                  <input type="text" size="18" value="" placeholder="Hotel, City, Area or Interest"  name="s" id="s" style="width:200px" />
                  <input type="submit" class="submit button 2" value="Search" class="btn" />
                </div>
              </form>       
              <div class="fix"></div>
            </div><!-- /.main-control -->
        </div>
    </div>
     <?php if ( $woo_options['woo_keywords'] == 'true' ) { ?>
          <div class="tag_cloud fr">
		<img src="//essentialworld.travel/wp-content/uploads/2013/09/Essential-Telephone-Numbers.png"  alt="Phone Number"/>
          </div>
     <?php } ?>
     <div class="fix"></div>
</div>
