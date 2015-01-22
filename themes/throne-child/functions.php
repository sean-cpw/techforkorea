<?php

/* Load frontend styles */
function thr_load_styles(){

	//Load fonts
	$fonts = thr_generate_font_links();
	if(!empty($fonts)){
		foreach($fonts as $k => $font){
			wp_register_style('thr_font_'.$k, $font, false, THEME_VERSION, 'screen');
			wp_enqueue_style('thr_font_'.$k);
		}
	}


	//Load main css file
	wp_register_style('thr_style', THEME_URI . '/style.css', false, THEME_VERSION, 'screen');
	wp_enqueue_style('thr_style');

	//Load child css file
	wp_register_style('thr_child_style', THEME_URI . '-child' . '/style.css', false, THEME_VERSION, 'screen');
	wp_enqueue_style('thr_child_style');


	//Append dynamic css
	$thr_dynamic_css = thr_generate_dynamic_css();
	wp_add_inline_style('thr_style', $thr_dynamic_css);

	//Enqueue font awsm icons if css is not already included via plugin
	if(!wp_style_is('mks_shortcodes_fntawsm_css', 'enqueued')){
		wp_register_style('thr_font_awesome', CSS_URI . '/font-awesome.min.css', false, THEME_VERSION, 'screen');
		wp_enqueue_style('thr_font_awesome');
	}

	//Enqueue simple line icons if css is not already included via plugin
	if(!wp_style_is('mks_shortcodes_simple_line_icons', 'enqueued')){
		wp_register_style('thr_icons', CSS_URI . '/simple-line-icons.css', false, THEME_VERSION, 'screen');
		wp_enqueue_style('thr_icons');
	}
	
	//Load responsive css
	if (thr_get_option('responsive_mode')) {
		// wp_register_style('thr_responsive', CSS_URI . '/responsive.css', false, THEME_VERSION, 'screen');		
		wp_register_style('thr_responsive', THEME_URI . '-child' . '/css' . '/responsive.css', false, THEME_VERSION, 'screen');
		wp_enqueue_style('thr_responsive');
	}

	//Load RTL css
	if (thr_get_option('rtl_mode')) {
		wp_register_style('thr_rtl', CSS_URI . '/rtl.css', false, THEME_VERSION, 'screen');
		wp_enqueue_style('thr_rtl');
	}


}

/* Load frontend scripts */
function thr_load_scripts(){
	thr_load_styles();

	// Load child javascript
	wp_enqueue_script('thr_custom', THEME_URI . '-child' . '/js'  . '/custom.js', array('jquery'), THEME_VERSION, true);
	
	wp_enqueue_script('thr_match_height', JS_URI . '/jquery.matchHeight.js', array('jquery'), THEME_VERSION, true);
	wp_enqueue_script('thr_responsive_menu', JS_URI . '/jquery.sidr.js', array('jquery'), THEME_VERSION, true);
	wp_enqueue_script('thr_magnific_popup', JS_URI . '/jquery.magnific-popup.min.js', array('jquery'), THEME_VERSION, true);
	wp_enqueue_script('thr_fitjs', JS_URI . '/jquery.fitvids.js', array('jquery'), THEME_VERSION, true);
	wp_enqueue_script('thr_touchwipe', JS_URI . '/jquery.touchwipe.min.js', array('jquery'), THEME_VERSION, true);
	wp_enqueue_script('thr_images_loaded', JS_URI . '/imagesloaded.pkgd.min.js', array('jquery'), THEME_VERSION, true);
	wp_enqueue_script('thr_sticky', JS_URI . '/affix.js', array('jquery'), THEME_VERSION, true);


	if (is_singular() && comments_open() && get_option('thread_comments')) {
		wp_enqueue_script('comment-reply');
	}
}

/*
function thr_load_child_styles() {
	//Load child css file
	wp_register_style('thr_child_style', THEME_URI . '-child' . '/style.css', false, THEME_VERSION, 'screen');
	wp_enqueue_style('thr_child_style');

}
*/

require_once('include/helper_child.php');
?>
