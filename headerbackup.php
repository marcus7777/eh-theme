<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="//www.w3.org/1999/xhtml">
<head profile="//gmpg.org/xfn/11">
<title><?php woo_title(); ?></title>
<?php woo_meta(); ?>
<?php global $woo_options; ?>

	<link rel="stylesheet" type="text/css" href="<?php bloginfo('stylesheet_url'); ?>" media="screen" />
	<link rel="alternate" type="application/rss+xml" title="RSS 2.0" href="/feed" />
	<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
    <script src="/bower_components/webcomponentsjs/webcomponents.min.js"></script>
    <link rel="import" href="/bower_components/paper-form-on-fire/paper-form-on-fire.html">

	<!-- Polymer Menu Imports-->
  	<script src="/elements/search.js"></script>
  	<link rel="import" href="/elements/elements.html">
  	<link rel="stylesheet" href="/app.css">

	<!-- jQuery UI Datepicker - Animations   -->
    <link rel="stylesheet" href="//code.jquery.com/ui/1.9.1/themes/base/jquery-ui.css"/>
	<script src="//code.jquery.com/jquery-1.8.2.js"></script>
    <script src="//code.jquery.com/ui/1.9.1/jquery-ui.js"></script>
    <link rel="stylesheet" href="/resources/demos/style.css" />

<?php wp_head(); ?>
<?php woo_head(); ?>

<?php // print_r(get_option('framework_woo_font_stack'));
 ?>

<script type="text/javascript" src="//maps.google.com/maps/api/js?sensor=false"></script>

<meta name=”SKYPE_TOOLBAR” content =”SKYPE_TOOLBAR_PARSER_COMPATIBLE”/>

<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-46452484-1', 'essentialhotels.co.uk');
  ga('send', 'pageview');

</script>

</head>

<body <?php body_class(); ?>>

<?php woo_top(); ?>

<div id="wrapper">

<div id="header" class="col-full">
</div>

<div id="navig">

<body unresolved fullbleed layout vertical>

	<core-drawer-panel id="drawerPanel" responsiveWidth="3000px">

	  <core-header-panel drawer>
	    <core-toolbar icon="menu">Menu</core-toolbar>
	    <core-menu selected="0">
	      <core-item icon="home" label="Home"><a href="https://essentialhotels.co.uk"></a></core-item>
	      <core-item icon="maps:hotel" label="All destinations"><a href="https://www.essentialhotels.co.uk/f.html#/hotels/World/"></a></core-item>
	      <core-item icon="maps:hotel" label="London"><a href="https://www.essentialhotels.co.uk/f.html#/hotels/London/"></a></core-item>
	      <core-item icon="maps:hotel" label="Manchester"><a href="https://www.essentialhotels.co.uk/f.html#/hotels/Manchester/"></a></core-item>
	      <core-item icon="maps:hotel" label="Paris"><a href="https://essentialhotels.co.uk/f.html#/hotels/Paris/"></a></core-item>
	      <core-item icon="maps:hotel" label="Brighton"><a href="https://essentialhotels.co.uk/f.html#/hotels/Brighton/"></a></core-item>
	      <core-item icon="maps:hotel" label="Rome"><a href="https://essentialhotels.co.uk/f.html#/hotels/Rome/"></a></core-item>
	      <core-item icon="maps:hotel" label="Madrid"><a href="https://essentialhotels.co.uk/f.html#/hotels/Madrid/"></a></core-item>
	      <core-item icon="maps:hotel" label="New York"><a href="https://essentialhotels.co.uk/f.html#/hotels/New%20York/"></a></core-item>
	      <core-item icon="maps:hotel" label="Dubai"><a href="https://essentialhotels.co.uk/f.html#/hotels/Dubai/"></a></core-item>
	    </core-menu>
	  </core-header-panel>

	  <core-header-panel main>
	    <core-toolbar>
	    <!-- If you want to have the menu back change to the line below and delete the line below that -->
	      <!-- <paper-icon-button id="navicon" icon="menu" core-drawer-toggle></paper-icon-button> -->
	      <core-item icon="home"><a href="https://essentialhotels.co.uk"></a></core-item>
	      <div><img src="/elements/EH-Logo.png" alt="Essential Hotels" style="width: 76px;"></div>
	      <span flex></span>
		    <div style="width: 40%;">
		      <script>
				  (function() {
				    var cx = '012477433197051517293:sl1ssjlfhme';
				    var gcse = document.createElement('script');
				    gcse.type = 'text/javascript';
				    gcse.async = true;
				    gcse.src = (document.location.protocol == 'https:' ? 'https:' : 'http:') +
				        '//www.google.com/cse/cse.js?cx=' + cx;
				    var s = document.getElementsByTagName('script')[0];
				    s.parentNode.insertBefore(gcse, s);
				  })();
				</script>
				<gcse:search></gcse:search>
			</div>
          <paper-icon-button icon="communication:call"><a href="tel:+44-0800-180-4700"></a></paper-icon-button>
          <!-- <paper-icon-button icon="search"></paper-icon-button> -->
		  <div>
		  	<a>
                <paper-form-on-fire link=1 linkText="Enquiry" firebase_url_data="https://shining-fire-8330.firebaseio.com/data" firebase_url_form="https://shining-fire-8330.firebaseio.com/form" firebase_url="https://shining-fire-8330.firebaseio.com/data/"></paper-form-on-fire>
            </a>
		  </div>
	    </core-toolbar>
	  </core-header-panel>

	</core-drawer-panel>

</body>


</div><!-- /#navigation -->

	</div><!-- /#header -->

<div id="container" class="col-full">

