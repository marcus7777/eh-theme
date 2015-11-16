<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="//www.w3.org/1999/xhtml">
<head profile="//gmpg.org/xfn/11">
<title><?php woo_title(); ?></title>
<?php woo_meta(); ?>
<?php global $woo_options; ?>
<meta name=viewport content="width=device-width, initial-scale=.3">
        <link rel="stylesheet" type="text/css" href="<?php bloginfo('stylesheet_url'); ?>" media="screen" />
        <link rel="alternate" type="application/rss+xml" title="RSS 2.0" href="/feed" />
        <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
    <script src="/bower_components/webcomponentsjs/webcomponents.min.js"></script>
    <!-- needs updating to 1 <link rel="import" href="/bower_components/paper-form-on-fire/paper-form-on-fire.html"> -->

        <!-- Polymer Menu Imports-->
        <script src="/elements/search.js"></script>
        <link rel="import" href="/elements/elements.html">
        <link rel="import" href="/bower_components/map-eh/map-eh.html">
        <link rel="stylesheet" href="../../../assets/css/main.css">

        <!-- jQuery UI Datepicker - Animations   
    <link rel="stylesheet" href="//code.jquery.com/ui/1.9.1/themes/base/jquery-ui.css"/>
        <script src="//code.jquery.com/jquery-1.8.2.js"></script>
    <script src="//code.jquery.com/ui/1.9.1/jquery-ui.js"></script>
-->
<?php wp_head(); ?>
<?php woo_head(); ?>

<?php // print_r(get_option('framework_woo_font_stack'));
 ?>

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

    <paper-toolbar>
                 <span id="eletter">E</span>
		 <span id="hletter">H</span>
		 <span class="flex"></span>
		 <span>0800 180 4700</span>
		 <span class="flex"></span>
		 <!-- <iron-icon icon="refresh"></iron-icon> -->
		 <a href="/#!/Hotels" title="Home" ><iron-icon icon="search"></iron-icon></a> 
     </paper-toolbar>



</div><!-- /#navigation -->

        </div><!-- /#header -->

<div id="container" class="col-full">
