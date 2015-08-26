<!DOCTYPE HTML>
<!--[if IEMobile 7 ]><html class="no-js iem7" manifest="default.appcache?v=1"><![endif]-->
<!--[if lt IE 7 ]><html class="no-js ie6" lang="en"><![endif]-->
<!--[if IE 7 ]><html class="no-js ie7" lang="en"><![endif]-->
<!--[if IE 8 ]><html class="no-js ie8" lang="en"><![endif]-->
<!--[if (gte IE 9)|(gt IEMobile 7)|!(IEMobile)|!(IE)]><!--><html class="no-js" lang="en"><!--<![endif]-->
	<head>
		<title><?php wp_title( '|' ); ?></title>
		<meta charset="<?php bloginfo( 'charset' ); ?>" />
	  	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
		<link rel="shortcut icon" href="<?php echo get_stylesheet_directory_uri(); ?>/img/favicon.ico"/>

		<link href="//cdnjs.cloudflare.com/ajax/libs/normalize/3.0.1/normalize.min.css" rel='stylesheet' />
		<link href='http://fonts.googleapis.com/css?family=Open+Sans:900,700,300,600,400' rel='stylesheet' type='text/css'>
		<link href='http://fonts.googleapis.com/css?family=Open+Sans+Condensed:700' rel='stylesheet' type='text/css'>
		<link rel="stylesheet" href="/dress/css/global.css" />

		<link rel="shortcut icon" href="/favicon.ico" type="image/x-icon">
		<link rel="icon" href="/favicon.ico" type="image/x-icon">

		<?php $uri = $_SERVER['REQUEST_URI'];
			$uriArr = explode('/', $uri);
		?>
		<?php if($uriArr[1] == "hot-tubs") { ?>
			<link rel="stylesheet" href="/dress/css/hot-tubs.css" />
		<?php } else if($uriArr[1] == "blog" || $uriArr[1] == "category") { ?>
			<link rel="stylesheet" href="/dress/css/blog.css" />
		<?php } else if(is_front_page()) { ?>
			<link rel="stylesheet" href="/dress/css/home.css" />
		<?php } else { ?>
			<link rel="stylesheet" href="/dress/css/pages.css" />
		<?php } ?>

		<?php if(isset($_GET['s'])) { ?>
			<link rel="stylesheet" href="/dress/css/search.css" />
		<?php } ?>

		<?php if($uriArr[1] == "get-free-site-inspection") { ?>
			<link rel="stylesheet" href="/dress/css/free-site-inspection.css" />
		<?php }	?>

		<?php if($uriArr[1] == "get-free-brochure-dvd-1000-coupon") { ?>
			<link rel="stylesheet" href="/dress/css/get-free-brochure.css" />
		<?php }	?>

		<?php if($uriArr[1] == "get-pricing") { ?>
			<link rel="stylesheet" href="/dress/css/get-pricing.css" />
		<?php }	?>

		<?php if($uriArr[1] == "dyo" || $uriArr[1] == "dyo1") { ?>
			<link rel="stylesheet" href="/dress/css/dyo.css" />
		<?php }	?>

		<?php if($uriArr[1] == "hot-tub-pricing-results") { ?>
			<link rel="stylesheet" href="/dress/css/hot-tub-pricing-results.css" />
		<?php }	?>

		<?php wp_head(); ?>

		<script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.11.2/jquery-ui.min.js"></script>
		<script src="//cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.2/html5shiv.js"></script>
		<script src="//cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.min.js"></script>
		<script src="//cdnjs.cloudflare.com/ajax/libs/jquery.hoverintent/2013.03.11/hoverintent.min.js"></script>
		<script src="//cdn.jsdelivr.net/bxslider/4.1.1/jquery.bxslider.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/simplemodal/1.4.4/jquery.simplemodal.min.js"></script>
		<script src="/js/global.js"></script>
		<?php if(is_front_page()) { ?>
			<script src="/js/home.js"></script>
		<?php } ?>
		<?php if($uriArr[1] == "hot-tubs") { ?>
			<script src="/js/hot-tubs.js"></script>
		<?php } else if($uriArr[1] == "blog" || $uriArr[1] == "category") { ?>
			<script src="/js/blog.js"></script>
		<?php } else { ?>
			<script src="/js/pages.js"></script>
		<?php } ?>

		<?php /* Removed [https://ninthlink.atlassian.net/browse/THERMO-42]
		<script type="text/javascript">
			var _ss = _ss || [];
			_ss.push(['_setDomain', 'https://koi-PLBR48.sharpspring.com/net']);
			_ss.push(['_setAccount', 'KOI-RUPIJ2']);
			_ss.push(['_trackPageView']);
			(function() {
			    var ss = document.createElement('script');
			    ss.type = 'text/javascript'; ss.async = true;
			    ss.src = ('https:' == document.location.protocol ? 'https://' : 'http://') + 'koi-PLBR48.sharpspring.com/client/ss.js?ver=1.1.1';
			    var scr = document.getElementsByTagName('script')[0];
			    scr.parentNode.insertBefore(ss, scr);
			})();
		</script>
		*/ ?>
		<!-- Start Visual Website Optimizer Asynchronous Code -->
		<script type='text/javascript'>
		var _vwo_code=(function(){
		var account_id=43506,
		settings_tolerance=2000,
		library_tolerance=2500,
		use_existing_jquery=false,
		// DO NOT EDIT BELOW THIS LINE
		f=false,d=document;return{use_existing_jquery:function(){return use_existing_jquery;},library_tolerance:function(){return library_tolerance;},finish:function(){if(!f){f=true;var a=d.getElementById('_vis_opt_path_hides');if(a)a.parentNode.removeChild(a);}},finished:function(){return f;},load:function(a){var b=d.createElement('script');b.src=a;b.type='text/javascript';b.innerText;b.onerror=function(){_vwo_code.finish();};d.getElementsByTagName('head')[0].appendChild(b);},init:function(){settings_timer=setTimeout('_vwo_code.finish()',settings_tolerance);this.load('//dev.visualwebsiteoptimizer.com/j.php?a='+account_id+'&u='+encodeURIComponent(d.URL)+'&r='+Math.random());var a=d.createElement('style'),b='body{opacity:0 !important;filter:alpha(opacity=0) !important;background:none !important;}',h=d.getElementsByTagName('head')[0];a.setAttribute('id','_vis_opt_path_hides');a.setAttribute('type','text/css');if(a.styleSheet)a.styleSheet.cssText=b;else a.appendChild(d.createTextNode(b));h.appendChild(a);return settings_timer;}};}());_vwo_settings_timer=_vwo_code.init();
		</script>
		<!-- End Visual Website Optimizer Asynchronous Code -->
		<script type="text/javascript">
			var _ss = _ss || [];
			_ss.push(['_setDomain', 'https://koi-PLBR48.sharpspring.com/net']);
			_ss.push(['_setAccount', 'KOI-RUPIJ2']);
			_ss.push(['_trackPageView']);
			(function() {
			    var ss = document.createElement('script');
			    ss.type = 'text/javascript'; ss.async = true;
			 
			    ss.src = ('https:' == document.location.protocol ? 'https://' : 'http://') + 'koi-PLBR48.sharpspring.com/client/ss.js?ver=1.1.1';
			    var scr = document.getElementsByTagName('script')[0];
			   scr.parentNode.insertBefore(ss, scr);
			})();
		</script>
		<script type="text/javascript">
			jQuery(document).ready(function(){
				jQuery('input.datepicker').attr('readonly', 'readonly');
			});
		</script>
	</head>
	<body <?php body_class(); ?>>

		<!-- Google Tag Manager -->
		<noscript><iframe src="//www.googletagmanager.com/ns.html?id=GTM-WZMRRG"
		height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
		<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
		new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
		j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
		'//www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
		})(window,document,'script','dataLayer','GTM-WZMRRG');</script>
		<!-- End Google Tag Manager -->


		<div id="fb-root"></div>
		<script>(function(d, s, id) {
  			var js, fjs = d.getElementsByTagName(s)[0];
  			if (d.getElementById(id)) return;
  			js = d.createElement(s); js.id = id;
  			js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.0";
  			fjs.parentNode.insertBefore(js, fjs);
			}(document, 'script', 'facebook-jssdk'));
		</script>
		<!-- Go to www.addthis.com/dashboard to customize your tools -->
		<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-54b423dd1a227c8d" async="async"></script>
