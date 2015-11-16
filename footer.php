<?php global $woo_options; ?>
	<?php if ( woo_active_sidebar('footer-1') || woo_active_sidebar('footer-2') || woo_active_sidebar('footer-3') ) : ?>
	<?php if(!is_home()){ ?><div class="fake-banner"></div><?php } ?>			   
	<div id="footer-widgets" class="col-full">
		<div class="block">
        	<?php woo_sidebar('footer-1'); ?>    
		</div>
		<div class="block">
        	<?php woo_sidebar('footer-2'); ?>    
		</div>
		<div class="block">
        	<?php woo_sidebar('footer-3'); ?>    
		</div>
		<div class="fix"></div>
	</div><!-- /#footer-widgets  -->
    <?php endif; ?>
</div><!-- /#container -->   
	<div id="footer" class="col-full">
		<div id="copyright" class="col-left">
		<?php if($woo_options['woo_footer_left'] == 'true'){
				echo stripslashes($woo_options['woo_footer_left_text']);	
		} else { ?>
			<p>&copy; <?php echo date('Y'); ?> <?php bloginfo(); ?>. <?php _e('All Rights Reserved.', 'Morna') ?></p>
		<?php } ?>
		</div>
		<div id="credit" class="col-right">
        <?php if($woo_options['woo_footer_right'] == 'true'){
        	echo stripslashes($woo_options['woo_footer_right_text']);
		} else { ?>
			<p><?php _e('Powered by', 'morna') ?> <a href="http://www.wordpress.org"><?php _e('WordPress', 'woothemes') ?></a>. <?php _e('Designed by', 'Morna') ?> <a href="<?php $aff = $woo_options['woo_footer_aff_link']; if(!empty($aff)) { echo $aff; } else { echo 'http://www.morna.uk.com'; } ?>"><img src="<?php bloginfo('template_directory'); ?>/images/woothemes.png" width="74" height="19" alt="Morna" /></a></p>
		<?php } ?>
		</div>
	</div><!-- /#footer rack  -->
</div><!-- /#wrapper -->
<?php wp_footer(); ?>
<?php woo_foot(); ?>
<!--Start of Zopim Live Chat Script-->
<script type="text/javascript">
window.$zopim||(function(d,s){var z=$zopim=function(c){z._.push(c)},$=z.s=
d.createElement(s),e=d.getElementsByTagName(s)[0];z.set=function(o){z.set.
_.push(o)};z._=[];z.set._=[];$.async=!0;$.setAttribute('charset','utf-8');
$.src='//v2.zopim.com/?jPEQ1iJPWGDWy7FQte1G1UivoCqWZMzw';z.t=+new Date;$.
type='text/javascript';e.parentNode.insertBefore($,e)})(document,'script');
</script>
<!--End of Zopim Live Chat Script-->
<!-- Start of GetKudos Script -->
<script>
(function(w,t,gk,d,s,fs){if(w[gk])return;d=w.document;w[gk]=function(){
(w[gk]._=w[gk]._||[]).push(arguments)};s=d.createElement(t);s.async=!0;
s.src='//static.getkudos.me/widget.js';fs=d.getElementsByTagName(t)[0];
fs.parentNode.insertBefore(s,fs)})(window,'script','getkudos');
getkudos('create', 'essentialhotels');
</script>
<!-- End of GetKudos Script -->
</body>
</html>
