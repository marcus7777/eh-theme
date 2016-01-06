<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="//www.w3.org/1999/xhtml">
<head profile="//gmpg.org/xfn/11">
<title><?php woo_title(); ?></title>
<?php woo_meta(); ?>
<?php global $woo_options; ?>
<meta name=viewport content="width=device-width, initial-scale=1">
        <link rel="stylesheet" type="text/css" href="<?php bloginfo('stylesheet_url'); ?>" media="screen" />
        <link rel="alternate" type="application/rss+xml" title="RSS 2.0" href="/feed" />
        <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
    <script src="/bower_components/webcomponentsjs/webcomponents.min.js"></script>
    <!-- needs updating to 1 <link rel="import" href="/bower_components/paper-form-on-fire/paper-form-on-fire.html"> -->

        <!-- Polymer Menu Imports-->
        <script src="/elements/search.js"></script>
        <link rel="import" href="/elements/elements.html">
        <link rel="import" href="/bower_components/map-eh/map-eh.html">
        <link rel="import" href="/bower_components/rate-lister/rate-lister.html">
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
  
<style is="custom-style">

      :root {
        --color-one: #33cccc;
/*         --color-two: #ff9800; */
        --accent-color: #3cc;        
      }

	  paper-toolbar {
      background-color: #1E4265;
		  font-family: Roboto, Hevetica, Arial, sans-serif;
  		font-size: 20px;
	  	font-weight: 300;
  	}

	  input {
		  margin: 10px;
		  font-size: 20px;
	  }

		#tel {
			color: #FFF;
		}
		.small {
			color: #FFF --iron-icon-width: 40px;
			--iron-icon-height: 40px;
		}
		.smaller {
			color: #FFF --iron-icon-width: 25px;
			--iron-icon-height: 25px;
			--iron-icon-fill-color: #FFF;
		}
		#logobox {
			height: 64px;
			width: 64px;
		}
		a {
			text-decoration: none;
		}
</style>

</head>

<body <?php body_class(); ?>>

<?php woo_top(); ?>

<div id="wrapper">

<div id="header" class="col-full">
</div>

	<div id="navig">

    <paper-toolbar style="overflow: hidden;">
       <a href="https://essentialhotels.co.uk">
			   <div id="logobox" style="max-height: 100%;  position: absolute; left: 0; top: 0;">
				  <svg viewBox="0 0 744 1052" >
            <g id="eh">
              <rect x="50" y="50" style="fill:#fff" height="500" width="600"/>
              <path style="fill:#002e5b" d="m 1.5,373.8 0,-371.43 371.42,0 371.42,0 0,371.42 0,371.42 -371.42,0 -371.43,0 0,-371.43 z M 325.2,505.4 l 0,-7.43 -86,-0.06 -86,-0.06 0,-61 0,-61 80,0 80,0 0,-7.6 0,-7.6 -80,0 -80,0 0,-55.71 0,-55.71 85,-0.06 85,-0.0 0,-7.4 0,-7.43 -93.66,-0.06 -93.7,-0.06 0,139.24 c 0,76.5 0.07,139.31 0.16,139.41 0.1,0.1 42.68,0.14 94.65,0.10 l 95,-0.06 0,-7.5 z m 89.4,-61.1 0,-68.5 88.9,0 88.9,0 0,68.6 0,68.6 8.6,-0.07 8.6,-0.07 0,-139.3 0,-139.3 -8.6,-0.07 -8.6,-0.06 0,63.3 0,63.3 -88.9,0 -88.9,0 -0.06,-63.2 -0.06,-63.2 -8.60,-0.07 -8.6,-0.07 0,139.4 0,139.5 8.6,-0.07 8.60,-0.07 0,-68.5 z" />
            </g>
          </svg>
			   </div>
		    </a>

       <span class="flex"></span>
       <iron-icon icon="maps:local-phone" class="smaller"></iron-icon>
		
		    <a href="tel:08001804700">
			    <span id="tel">0800 180 4700</span> 
		    </a>
       <span class="flex"></span>
       
      <a href="https://essentialhotels.co.uk">
			  <iron-icon icon="search" class="small" style="color: #FFF;"></iron-icon>
		  </a> 
     </paper-toolbar>


	</div><!-- /#navigation -->

</div><!-- /#header -->

<div id="container" class="col-full">
