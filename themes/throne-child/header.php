<!DOCTYPE html>

<!--[if lt IE 7]> <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang="en"> <![endif]-->
<!--[if IE 7]>    <html class="no-js lt-ie9 lt-ie8" lang="en"> <![endif]-->
<!--[if IE 8]>    <html class="no-js lt-ie9" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" <?php language_attributes(); ?>> <!--<![endif]-->


<head>
  
  	<!-- Meta Tags -->
  	<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
	<meta name="viewport" content="user-scalable=no, width=device-width, initial-scale=1, maximum-scale=1">
	<meta name="description" content="TechForKorea is an online media portal providing the latest news from the Korean venture and startup community. Join in the latest gossip about Korean startups, tech inventions and events. Use us to jump in and discover virgin Korean technology. Because tech is just that sexy." />
	<meta name="keywords" content="TechForKorea, Tech, Korea, Startup, Korean Startup, mobile app, mobile application, accelerator, entrepreneur, business trends, venture capital" />
	<meta name="author" content="TechForKorea" />
	<meta name="robots" content="all, index, follow" />	
	<meta name="google-site-verification" content="aabLOmhCWE6PgjFMrdkdN7viTHcSGY7HhaztylXoIz8" />
        <meta name="google-site-verification" content="XXDgU3qhBMWIRAY5k4wiGq0ez0eU3_2Dg-mVOngm9XU" />
	<!-- Bing verification -->
	<meta name="msvalidate.01" content="19788A454158F4C29DD2FF3E5F6CE394" />
 	<title><?php wp_title( '|', true, 'right' ); ?></title>
	<?php wp_head(); ?>
</head>

<?php
	global $thr_sidebar_opts;
	$thr_sidebar_opts = thr_get_current_sidebar();
	$sidebar_class = $thr_sidebar_opts['use_sidebar'] ? '' : 'no_sidebar';
	$sticky_on = thr_get_option('sticky_header') ? ' sticky_on' : '';
?>

<body <?php body_class($sidebar_class.$sticky_on); ?>>
	<?php include_once("analyticstracking.php") ?>
	<?php if($body_bg_img = thr_get_option_media('body_bg_img')): ?>
		<div class="body_bg_img">
			<div class="overlay_bg_div"></div>
			<img src="<?php echo esc_url($body_bg_img); ?>" alt="<?php bloginfo('name'); ?>"/>
		</div>
	<?php endif; ?>

	<?php if(thr_get_option('body_style') == 'boxed'): ?>
		<div class="thr_boxed">
			<div class="thr_boxed_wrapper">
	<?php endif; ?>

	<?php if(thr_get_option('sticky_header')) : ?>
		<div id="sticky_header" class="header-sticky"><div class="content_wrapper"></div></div>
	<?php endif; ?>

	<header id="header" class="header full_width clearfix">
		<div class="header-main">
			<?php if($header_bg_img = thr_get_option_media('header_bg_img')): ?>
				<div class="header_bg_img"><img src="<?php echo esc_url($header_bg_img); ?>" alt="<?php bloginfo('name'); ?>"/></div>
			<?php endif; ?>
			<div class="content_wrapper">
				<div class="header-widget">
					<?php dynamic_sidebar('thr_header_sidebar'); ?>		
				</div>
				<?php $header_layout = thr_get_option('header_main'); ?>
				<?php get_template_part('sections/headers/header-main-'.$header_layout); ?>
			</div>

		</div>
		<?php if(in_array($header_layout, array(2,3))): ?>
			<div class="header-bottom">
				<div class="content_wrapper">
					<?php get_template_part('sections/headers/header-bottom'); ?>
				</div>
			</div>
		<?php endif; ?>
	</header>
<script type="text/javascript" src="//s3.amazonaws.com/downloads.mailchimp.com/js/signup-forms/popup/embed.js" data-dojo-config="usePlainJson: true, isDebug: false"></script><script type="text/javascript">require(["mojo/signup-forms/Loader"], function(L) { L.start({"baseUrl":"mc.us10.list-manage.com","uuid":"37ab6470efbc61209ca1850ed","lid":"c897d012ba"}) })</script>
	<main id="main_content" class="clearfix">
