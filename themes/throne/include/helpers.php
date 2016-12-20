<?php
/*-----------------------------------------------------------------------------------*/
/*	Helpers and utils functions for theme use
/*-----------------------------------------------------------------------------------*/ 

/* 	Debug (log) function */ 
if(!function_exists('thr_log')):
	function thr_log($mixed){
			
	        if (is_array($mixed)) {
	            $mixed = print_r($mixed, 1);
	        } else if (is_object($mixed)) {
	            ob_start();
	            var_dump($mixed);
	            $mixed = ob_get_clean();
	        }
	        
	        $handle = fopen(THEME_DIR . '/log', 'a');
	        fwrite($handle, $mixed . PHP_EOL);
	        fclose($handle);
	}
endif;

/* 	Get theme option function */ 
if(!function_exists('thr_get_option')):
	function thr_get_option($option){
		global $thr_settings;
			if(isset($thr_settings[$option])){
				return $thr_settings[$option];
			} else {
				return false;
			}
	}
endif;

/* 	Update theme option function */ 
if(!function_exists('thr_update_option')):
	function thr_update_option($key = false, $value = false){
					global $Redux_Options;
					if(!empty($key)){
						$Redux_Options->set($key, $value);
					} 
	}
endif;

/* Extend the_category() function to show any post/custom_post_type taxonomies */
if(!function_exists('thr_the_taxonomy')):
	function thr_the_taxonomy ($taxonomy, $separator = '') {
		global $post;
		$terms = wp_get_object_terms($post->ID, $taxonomy);
		$term_output = array();
		foreach ( $terms as $term ) {
			$link = get_term_link((int)$term->term_id, $term->taxonomy);
			$term_output[] = '<a href="'.$link.'">'.$term->name.'</a>'; 
		}
			echo implode($separator,$term_output);
	}
endif;

/* Get first image src from post content */
if(!function_exists('thr_first_image')):
	function thr_first_image(){
	  global $post;
	  $first_img = '';
	  $output = preg_match_all('/<img.+src=[\'"]([^\'"]+)[\'"].*>/i', $post->post_content, $matches);
	  if(isset($matches[1][0])){
	  	 $first_img = $matches[1][0];
		return $first_img;
	  }
	  
	  return false;
	}
endif;

/* Get image id by url */
if(!function_exists('thr_get_image_id_by_url')):
	function thr_get_image_id_by_url($image_url) {
		global $wpdb;
		
		$attachment = $wpdb->get_col($wpdb->prepare("SELECT ID FROM $wpdb->posts WHERE guid='%s';", $image_url )); 
		
		if(isset($attachment[0])){
        	return $attachment[0];
        }

        return false;
	}
endif;

/* Display featured image, and more :) */
if(!function_exists('thr_featured_image')):
	function thr_featured_image($size = false, $use_sidebar = true, $post_id = false){
	  if(!$use_sidebar && $size){
	  	$size .='-nosid';
	  }
	 
	  if(empty($post_id)){
	  	$post_id = get_the_ID();
	  }

	  if(has_post_thumbnail($post_id)){

	  	return get_the_post_thumbnail($post_id, $size);

	  } else if( !strstr('thr-layout-a', $size) && ($placeholder = thr_get_option_media('default_fimg')) ){
	  	
	  	$img_id = thr_get_image_id_by_url($placeholder);

	  	if(!empty($img_id)){
	  		$def_img = wp_get_attachment_image( $img_id, $size);
	  		if(!empty($def_img)){
	  			return $def_img;
	  		}
	  	}

	  	return '<img src="'.$placeholder.'"/>';
	  }

	  return false;
	}
endif;

/* Check wheter to display date in standard or "time ago" format */
if(!function_exists('thr_get_date')):
	function thr_get_date(){

		if(thr_get_option('time_ago')){
			
			$limits = array(
				'hour' => 3600,
				'day' => 86400,
				'week' => 604800,
				'month' => 2592000,
				'three_months' => 7776000,
				'six_months' => 15552000,
				'year' => 31104000,
				'0' => 0
			);
			
			$ago_limit = thr_get_option('time_ago_limit');
			
			if(array_key_exists($ago_limit, $limits)){

				if((current_time('timestamp') - get_the_time('U') <= $limits[$ago_limit]) || empty($ago_limit) ){
					
	  				return human_time_diff(get_the_time('U'), current_time('timestamp')).__thr('ago');
		  		} else {
		  			return get_the_date();
		  		}
			} else {
				return get_the_date();
			}
	 	} else {
	  		return get_the_date();
	  	}
	}
endif;

/* Display different comments icon for one or more comments :) */
if(!function_exists('thr_get_comments_icon')):
	function thr_get_comments_icon(){
		if(get_comments_number() > 1){
	  	return 'bubbles';
	  } else {
	  	return 'bubble';
	  }
	}
endif;

/* Get post listing layouts */
if(!function_exists('thr_get_post_layouts')):
	function thr_get_post_layouts($inherit = false){
		$layouts = array(
			'layout-a' => array('title' => __('Layout A', THEME_SLUG), 'img' => ReduxFramework::$_url . 'assets/img/layout_a.png'),
			'layout-b' => array('title' => __('Layout B', THEME_SLUG), 'img' => ReduxFramework::$_url . 'assets/img/layout_b.png'),
			'layout-c' => array('title' => __('Layout C', THEME_SLUG), 'img' => ReduxFramework::$_url . 'assets/img/layout_c.png'),
			'layout-d' => array('title' => __('Layout D', THEME_SLUG), 'img' => ReduxFramework::$_url . 'assets/img/layout_d.png')
		);

		if($inherit){
			$layouts = array_merge( array('inherit' => array('title' => __('Inherit', THEME_SLUG)) ), $layouts);
		}
		
		return $layouts;
	}
endif;

/* Get featured area layouts */
if(!function_exists('thr_featured_area_layouts')):
	function thr_featured_area_layouts($inherit = false){
		$layouts = array(
			'2_0' => array('title' => __('2 posts inline', THEME_SLUG), 'img' => ReduxFramework::$_url . 'assets/img/2_posts_inline.png'),
			'3_0' => array('title' => __('3 posts inline', THEME_SLUG), 'img' => ReduxFramework::$_url . 'assets/img/3_posts_inline.png'),
			'4_0' => array('title' => __('4 posts inline', THEME_SLUG), 'img' => ReduxFramework::$_url . 'assets/img/4_posts_inline.png'),
			'2_2' => array('title' => __('4 posts <span>(2 top + 2 bottom)</span>', THEME_SLUG),  'img' => ReduxFramework::$_url . 'assets/img/2_2_posts.png'),
			'2_3' => array('title' => __('5 posts <span>(2 top + 3 bottom)</span>', THEME_SLUG), 'img' => ReduxFramework::$_url . 'assets/img/2_3_posts.png'),
			'2_4' => array('title' => __('6 posts <span>(2 top + 4 bottom)</span>', THEME_SLUG), 'img' => ReduxFramework::$_url . 'assets/img/2_4_posts.png'),
			'3_2' => array('title' => __('5 posts <span>(3 top + 2 bottom)</span>', THEME_SLUG), 'img' => ReduxFramework::$_url . 'assets/img/3_2_posts.png'),
			'3_3' => array('title' => __('6 posts <span>(3 top + 3 bottom)</span>', THEME_SLUG), 'img' => ReduxFramework::$_url . 'assets/img/3_3_posts.png'),
			'3_4' => array('title' => __('7 posts <span>(3 top + 4 bottom)</span>', THEME_SLUG), 'img' => ReduxFramework::$_url . 'assets/img/3_4_posts.png'),
			'4_2' => array('title' => __('6 posts <span>(4 top + 2 bottom)</span>', THEME_SLUG), 'img' => ReduxFramework::$_url . 'assets/img/4_2_posts.png'),
			'4_3' => array('title' => __('7 posts <span>(4 top + 3 bottom)</span>', THEME_SLUG), 'img' => ReduxFramework::$_url . 'assets/img/4_3_posts.png'),
			'4_4' => array('title' => __('8 posts <span>(4 top + 4 bottom)</span>', THEME_SLUG), 'img' => ReduxFramework::$_url . 'assets/img/4_4_posts.png')
		);

		if($inherit){
			$layouts = array_merge( array('inherit' => array('title' => __('Inherit', THEME_SLUG)), '0' => array('title' => __('None', THEME_SLUG)) ), $layouts);
		}
		
		return $layouts;
	}
endif;

/* Get sidebar layouts */
if(!function_exists('thr_get_sidebar_layouts')):
	function thr_get_sidebar_layouts($inherit = false){
		$sidebars = array();
		if($inherit){
			$sidebars['inherit'] = __('Inherit', THEME_SLUG);
		}
		$sidebars['0'] = __('No sidebar (full width content)', THEME_SLUG);
		$sidebars['left'] = __('Left sidebar', THEME_SLUG);
		$sidebars['right'] = __('Right sidebar', THEME_SLUG);
		return $sidebars;
	}
endif;

/* Get all sidebars */
if(!function_exists('thr_get_sidebars_list')):
	function thr_get_sidebars_list($inherit = false){
		$sidebars = array();
		if($inherit){
			$sidebars['inherit'] = __('Inherit', THEME_SLUG);
		}
		$sidebars['0'] = __('None', THEME_SLUG);
		$sidebars['thr_default_sidebar'] = __('Default Sidebar', THEME_SLUG);
		$sidebars['thr_default_sticky_sidebar'] = __('Default Sticky Sidebar', THEME_SLUG);
		$custom_sidebars = thr_get_option('add_sidebars');
		
		if(empty($custom_sidebars)){
			$settings = get_option('thr_settings');
			$custom_sidebars = isset($settings['add_sidebars']) ? $settings['add_sidebars'] : false;
		}

		if($custom_sidebars){
			for( $i = 1; $i <= $custom_sidebars; $i++){
				$sidebars['thr_custom_sidebar_'.$i] = __( 'Additional Sidebar', THEME_SLUG).' '.$i;
			}
		}

		return $sidebars;
	}
endif;

/* Get current sidebar options */
if(!function_exists('thr_get_current_sidebar')):
	function thr_get_current_sidebar(){
		
		$use_sidebar = false;
	    $sidebar = '';
	    $sticky_sidebar = '';
		$thr_template = thr_detect_template();

		if(in_array($thr_template, array('search','tag', 'author', 'other_archives')) ){

			$use_sidebar = thr_get_option($thr_template.'_use_sidebar');
			if($use_sidebar){
				 $sidebar = thr_get_option($thr_template.'_sidebar');
				 $sticky_sidebar = thr_get_option($thr_template.'_sticky_sidebar');
			}

		} else if ($thr_template == 'category') {
			$obj = get_queried_object();
			if(isset($obj->term_id)){
				$meta = thr_get_category_meta($obj->term_id);
			}

			if($meta['use_sidebar']){
				$use_sidebar = ($meta['use_sidebar'] == 'inherit') ? thr_get_option($thr_template.'_use_sidebar') : $meta['use_sidebar'];
				if($use_sidebar){
					 $sidebar = ($meta['sidebar'] == 'inherit') ?  thr_get_option($thr_template.'_sidebar') : $meta['sidebar'];
					$sticky_sidebar = ($meta['sidebar'] == 'inherit') ?  thr_get_option($thr_template.'_sticky_sidebar') : $meta['sticky_sidebar'];
				}
			}

		} else if ($thr_template == 'single'){

			$meta = thr_get_post_meta(get_the_ID());
			$use_sidebar = ($meta['use_sidebar'] == 'inherit') ? thr_get_option($thr_template.'_use_sidebar') : $meta['use_sidebar'];
			if($use_sidebar){
				$sidebar = ($meta['sidebar'] == 'inherit') ?  thr_get_option($thr_template.'_sidebar') : $meta['sidebar'];
				$sticky_sidebar = ($meta['sidebar'] == 'inherit') ?  thr_get_option($thr_template.'_sticky_sidebar') : $meta['sticky_sidebar'];
			}

		} else if ( in_array($thr_template, array('home_page', 'page', 'posts_page')) ){
			if($thr_template == 'posts_page'){
				$meta = thr_get_page_meta(get_option('page_for_posts'));
			} else {
				$meta = thr_get_page_meta(get_the_ID());
			}


			$use_sidebar = ($meta['use_sidebar'] == 'inherit') ? thr_get_option('page_use_sidebar') : $meta['use_sidebar'];
			if($use_sidebar){
				$sidebar = ($meta['sidebar'] == 'inherit') ?  thr_get_option('page_sidebar') : $meta['sidebar'];
				$sticky_sidebar = ($meta['sidebar'] == 'inherit') ?  thr_get_option('page_sticky_sidebar') : $meta['sticky_sidebar'];
			}

		}

		$args = array(
			'use_sidebar' => $use_sidebar,
			'sidebar' => $sidebar,
			'sticky_sidebar' => $sticky_sidebar
		);

		return $args;
	}
endif;

/* Get current featured area options */
if(!function_exists('thr_get_current_fa')):
	function thr_get_current_fa(){
		
		$output['query'] = false;
		$output['display'] = false;
		$args = array();
		
		$thr_template = thr_detect_template();

		if(in_array($thr_template, array('tag', 'author', 'category')) ){
			
			if($thr_template == 'category'){
				$obj = get_queried_object();
				$meta = thr_get_category_meta($obj->term_id);
				if($meta['fa_layout'] == 'inherit') {

					if($use_fa = thr_get_option($thr_template.'_featured_area')){
						$featured_area_layout = thr_get_option($thr_template.'_fa_layout');
					} else {
						$use_fa = false;
					}
				} else {
					$featured_area_layout = $meta['fa_layout'];
					if(!$featured_area_layout){
						$use_fa = false;	
					} else {
						$use_fa = true;
					}
				}

			} else {
				$use_fa = thr_get_option($thr_template.'_featured_area');
			}

			
			if($use_fa){

				$output['display'] = true;

				$featured_area_layout = thr_get_option($thr_template.'_fa_layout');

				$obj = get_queried_object();

				if($thr_template == 'category'){
					$args['cat'] = $obj->term_id;
					$meta = thr_get_category_meta($obj->term_id);
					$featured_area_layout = ($meta['fa_layout'] == 'inherit') ? $featured_area_layout : $meta['fa_layout'];				
				} else if ($thr_template == 'tag'){
					$args['tag_id'] = $obj->term_id;
				} else if ($thr_template == 'author'){
					$args['author'] = $obj->ID;
				}
			}

		} else if ( $thr_template == 'home_page'){

			$use_fa = thr_get_option('home_featured_area');

			if($use_fa) {

				$output['display'] = true;
				$featured_area_layout = thr_get_option('home_fa_layout');	
	    		$orderby = thr_get_option('home_fa_posts_order');
			
	    		if($orderby != 'manual'){
	    			
	    			//Orderby
	    			$args['orderby'] = 	$orderby;
			
	    			//Cat
	    			$cats = thr_get_option('home_fa_posts_cat');
	    			if(!empty($cats)){
	    				$args['cat'] = implode(",", $cats);
	    			}
			
	    			//Tag
	    			$tags = thr_get_option('home_fa_posts_tag');
	    			if(!empty($tags)){
	    				$args['tag__in'] =  $tags;
	    			}
			
	    		} else {
	    			$manual_posts = thr_get_option('home_fa_posts_manual');
	    			$args['orderby'] = 	'post__in';
	    			$args['post__in'] =  $manual_posts;
	    		}

			}
			
		}

		if($output['display']){
			
			$option = explode('_', $featured_area_layout);
			$top = $option[0];
			$bottom = $option[1];
			$posts_per_page = $top + $bottom;

			$args['post_type'] = 'post';
			$args['posts_per_page'] = absint($posts_per_page);
			$args['ignore_sticky_posts'] = 1;

			$output['query'] = new WP_Query($args);
			$output['top'] = $top;
			$output['bottom'] = $bottom;
		}

		return $output;
	}
endif;

/* Get current featured area posts count */
if(!function_exists('thr_get_current_fa_count')):
	function thr_get_current_fa_count(){
		
		$thr_template = thr_detect_template();

		if(in_array($thr_template, array('tag', 'author', 'category')) ){
			
			if($thr_template == 'category'){
				$obj = get_queried_object();
				$meta = thr_get_category_meta($obj->term_id);
				if($meta['fa_layout'] == 'inherit') {

					if($use_fa = thr_get_option($thr_template.'_featured_area')){
						$featured_area_layout = thr_get_option($thr_template.'_fa_layout');
					} else {
						$use_fa = false;
					}

				} else {
					
					$featured_area_layout = $meta['fa_layout'];
					if(!$featured_area_layout){
						$use_fa = false;	
					} else {
						$use_fa = true;
					}
				}

			} else {
				$use_fa = thr_get_option($thr_template.'_featured_area');
			}

			
			
			if($use_fa){

				if($thr_template != 'category'){
					$featured_area_layout = thr_get_option($thr_template.'_fa_layout');
				}

				$option = explode('_', $featured_area_layout);
				$top = $option[0];
				$bottom = $option[1];
				$offset = $top + $bottom;
				return absint($offset);
			}
		}

		return false;
	}
endif;

/* Get current posts layout  */
if(!function_exists('thr_get_posts_layout')):
	function thr_get_posts_layout(){
		
		$layout = 'layout-a'; //default
		$thr_template = thr_detect_template();

		if(in_array($thr_template, array('search','tag', 'author', 'other_archives', 'posts_page')) ){

			$layout = thr_get_option($thr_template.'_layout');

		} else if ($thr_template == 'category') {
			
			$obj = get_queried_object();
			if(isset($obj->term_id)){
				$meta = thr_get_category_meta($obj->term_id);
				$layout = ($meta['layout'] == 'inherit') ? thr_get_option($thr_template.'_layout') : $meta['layout'];
			}

		}

		return $layout;
	}
endif;

/* Get single post layout */
if(!function_exists('thr_get_single_layout')):
	function thr_get_single_layout(){
		$layout = thr_get_post_meta(get_the_ID(),'layout');
		
		if($layout == 'inherit'){
			return thr_get_option('single_layout');
		}

		return $layout;
	}
endif; 

/* Detect WordPress template */
if(!function_exists('thr_detect_template')):
	function thr_detect_template(){
		$template = '';
		if(is_single()){
		 	$template = 'single';
		} else if (is_page_template('template-home.php')){
			$template = 'home_page';
		} else if(is_page()){
			$template = 'page';
		} else if(is_category()){
			$template = 'category';
		} else if (is_tag()){
			$template = 'tag';
		} else if (is_search()){
			$template = 'search';
		} else if (is_author()){
			$template = 'author';
		} else if ( is_home() && ($posts_page = get_option('page_for_posts')) && !is_page_template('template-home.php')){
			$template = 'posts_page';
		} else {
			$template = 'other_archives';
		}
		return $template;
	}
endif;

/* Get post format icon */
if(!function_exists('thr_post_format_icon')):
	function thr_post_format_icon(){
		$format = get_post_format();

		$icons = array(
				'video' => 'camcorder',
				'audio' => 'music-tone-alt',
				'image' => 'camera',
				'gallery' => 'picture'
		);

		if($format && array_key_exists($format, $icons)){
			return $icons[$format];
		}

		return false;
	}
endif;



/* Include simple pagination */
if(!function_exists('thr_pagination')):
function thr_pagination($prev = '&lsaquo;', $next = '&rsaquo;') {
    global $wp_query, $wp_rewrite;
    $wp_query->query_vars['paged'] > 1 ? $current = $wp_query->query_vars['paged'] : $current = 1;
    $pagination = array(
        'base' => @add_query_arg('paged','%#%'),
        'format' => '',
        'total' => $wp_query->max_num_pages,
        'current' => $current,
        'prev_text' => $prev,
        'next_text' => $next,
        'type' => 'plain'
);
    if( $wp_rewrite->using_permalinks() )
        $pagination['base'] = user_trailingslashit( trailingslashit( remove_query_arg( 's', get_pagenum_link( 1 ) ) ) . 'page/%#%/', 'paged' );

    if( !empty($wp_query->query_vars['s']) )
        $pagination['add_args'] = array( 's' => str_replace(' ', '+', get_query_var( 's' )) );
    
    $links = paginate_links( $pagination );

    if($links){
    	echo '<div id="thr_pagination">'.$links.'</div>';
    }
}
endif;

/* Limit words in string */
if(!function_exists('thr_trim_words')):
function thr_trim_words($text, $limit = false, $more = '...') {
 
   $words = explode(' ', $text);
   if (count($words) > $limit) {
      $result = implode(' ', array_slice($words, 0, $limit));
      $text = rtrim($result, ".,-?!");
      $text .= $more;
   }
    
   return $text;
}
endif;

/* Custom function to limit post content words */
if(!function_exists('thr_get_excerpt')):
function thr_get_excerpt($layout = 'layout-a') {

	$map = array(
				'layout-a' => 'lay_a',
				'layout-b' => 'lay_b',
				'layout-c' => 'lay_c',
				'layout-d' => 'lay_d',
				'fa' => 'lay_fa'
			);

	if(!array_key_exists($layout, $map)){
		return '';
	}

	$content = apply_filters('the_content',get_the_content( get_the_ID()));
	
	//print_r($content);

	if(!empty($content)){
		$limit = thr_get_option($map[$layout].'_excerpt_limit');
		$more = thr_get_option($map[$layout].'_excerpt_more');
		$content = wp_strip_all_tags($content);
		$content = preg_replace('/\b(https?|ftp|file):\/\/[-A-Z0-9+&@#\/%?=~_|$!:,.;]*[A-Z0-9+&@#\/%=~_|$]/i', '', $content);
		$excerpt = thr_trim_chars($content, $limit, $more);
		return $excerpt;
	}

	return '';

}
endif;

/* Custom function to get meta data for specific layout */
if(!function_exists('thr_get_meta_data')):
function thr_get_meta_data($layout = 'layout-a') {

	$map = array(
				'layout-a' => 'lay_a',
				'layout-b' => 'lay_b',
				'layout-c' => 'lay_c',
				'layout-d' => 'lay_d',
				'single' => 'single',
				'fa' => 'lay_fa'
			);

	if(!array_key_exists($layout, $map)){
		return '';
	}

	ob_start();
	comments_popup_link(__thr('no_comments'), __thr('one_comment'), __thr('multiple_comments'));
	$comments_link = ob_get_contents();
	ob_end_clean();

	$metas_html = array(
		'date' => '<i class="icon-clock"></i><span>'.thr_get_date().'</span>',
		'author' => '<i class="icon-user"></i><a href="'.get_author_posts_url( get_the_author_meta( 'ID' ) ).'">'.get_the_author_meta( 'display_name' ).'</a>',
		'categories' => '<i class="icon-note"></i>'.get_the_category_list(', '),
		'comments' => '<i class="icon-'.thr_get_comments_icon().'"></i>'.$comments_link
	);

	$layout_metas = thr_get_option($map[$layout].'_meta');

	$output = '';

	foreach($layout_metas as $mkey => $active){
		if($active){
			$output .= '<div class="meta-item '.$mkey.'">'.$metas_html[$mkey].'</div>';
		}
	}

	return $output;

}
endif;

/* Custom function to limit post title chars for specific layout */
if(!function_exists('thr_get_title')):
function thr_get_title($layout = 'layout-b') {

	$map = array(
				'layout-b' => 'lay_b',
				'layout-c' => 'lay_c',
				'layout-d' => 'lay_d',
				'fa' => 'lay_fa'
			);

	if(!array_key_exists($layout, $map)){
		return get_the_title();
	}


	$title_limit = thr_get_option($map[$layout].'_title_limit');


	if(!empty($title_limit)){
		$output = thr_trim_chars(strip_tags(get_the_title()), $title_limit, thr_get_option($map[$layout].'_title_more'));
	} else {
		$output = get_the_title();
	}
	

	return $output;

}
endif;

/* Trim chars of string */
if(!function_exists('thr_trim_chars')):
	function thr_trim_chars($string, $limit, $more = '...') {
		
		if ( mb_strlen( $string, 'utf8' ) > $limit ) {
   			$last_space = strrpos( substr( $string, 0, $limit ), ' ' );
   			$string = substr( $string, 0, $last_space );
   			$string = rtrim($string, ".,-?!");
   			$string.= $more;
		}

		return $string;
	}
endif;


/* Convert hexdec color string to rgba */
if(!function_exists('thr_hex2rgba')):
	function thr_hex2rgba($color, $opacity = false) {
		$default = 'rgb(0,0,0)';
	
		//Return default if no color provided
		if(empty($color))
	          return $default;
	
		//Sanitize $color if "#" is provided
	  if ($color[0] == '#' ) {
	    $color = substr( $color, 1 );
	  }
	
	  //Check if color has 6 or 3 characters and get values
	  if (strlen($color) == 6) {
	     $hex = array( $color[0] . $color[1], $color[2] . $color[3], $color[4] . $color[5] );
	  } elseif ( strlen( $color ) == 3 ) {
	                $hex = array( $color[0] . $color[0], $color[1] . $color[1], $color[2] . $color[2] );
	  } else {
	      return $default;
	  }
	
	  //Convert hexadec to rgb
	  $rgb =  array_map('hexdec', $hex);
	
	  //Check if opacity is set(rgba or rgb)
	  if($opacity){
	  	if(abs($opacity) > 1){ $opacity = 1.0; }
	    $output = 'rgba('.implode(",",$rgb).','.$opacity.')';
	  } else {
	    $output = 'rgb('.implode(",",$rgb).')';
	  }
	
	  //Return rgb(a) color string
	  return $output;
	}
endif;

/* Get array of social options  */
if(!function_exists('thr_get_social')) :
  function thr_get_social($existing = false) {
		$social = array(
					'0' => 'None',
					'apple' => 'Apple',
					'behance' => 'Behance',
					'delicious' => 'Delicious',
					'deviantart' => 'DeviantArt',
					'digg' => 'Digg',
					'dribbble' => 'Dribbble',
					'facebook' => 'Facebook',
					'flickr' => 'Flickr',
					'github' => 'Github',
					'google' => 'GooglePlus',
					'instagram' => 'Instagram',
					'linkedin' => 'LinkedIN',
					'pinterest' => 'Pinterest',
					'reddit' => 'ReddIT',
					'rss' => 'Rss',
					'skype' => 'Skype',
					'stumbleupon' => 'StumbleUpon',
					'soundcloud' => 'SoundCloud',
					'spotify' => 'Spotify',
					'tumblr' => 'Tumblr',
					'twitter' => 'Twitter',
					'vimeo' => 'Vimeo',
					'vine' => 'Vine',
					'wordpress' => 'WordPress' ,
					'yahoo' => 'Yahoo',
					'youtube' => 'Youtube'
				);
			
	if($existing){
		$new_social = array();
		foreach($social as $key => $soc){
			if($key && thr_get_option('soc_'.$key.'_url')){
				$new_social[$key] = $soc;
			}
		}
		$social = $new_social;
	}
					
	return $social;
}
endif;


/* Get Theme Translated String */
if(!function_exists('__thr')):
	function __thr($string_key){
		if( ($translated_string = thr_get_option('tr_'.$string_key)) && thr_get_option('enable_translate')){
				if($translated_string == '-1'){
					return "";
				}
				return $translated_string;
		} else {
			$translate = thr_get_translate_options();
			return $translate[$string_key]['translated'];
		}
	}
endif;

/* Get All Translation Strings */
if(!function_exists('thr_get_translate_options')):
	function thr_get_translate_options(){
		global $thr_translate;
		require_once('translate.php');
		$translate = apply_filters('thr_modify_translate_options', $thr_translate);	
		return $translate;
	}
endif;

/* Compress CSS Code  */
if(!function_exists('thr_compress_css_code')) :
  function thr_compress_css_code($code) {
    
    // Remove Comments
    $code = preg_replace('!/\*[^*]*\*+([^/][^*]*\*+)*/!', '', $code);
    
    // Remove tabs, spaces, newlines, etc.
    $code = str_replace(array("\r\n", "\r", "\n", "\t", '  ', '    ', '    '), '', $code);
    
    return $code;
  }
endif;

/* Get page meta with default values */
if(!function_exists('thr_get_page_meta')):
	function thr_get_page_meta($post_id, $field = false){
		$defaults = array(
				'use_sidebar' => 'inherit',
				'sidebar' => 'thr_default_sidebar',
				'sticky_sidebar' => 'thr_default_sticky_sidebar'
			);
		  
		  if(!$post_id){
		  	$post_id = get_the_ID();
		  }

		  
		  $meta = get_post_meta($post_id, '_thr_meta', true);
		  $meta = wp_parse_args( (array) $meta, $defaults );

			
			if($field){
				if(isset($meta[$field])){
					return $meta[$field];
				} else {
					return false;
				}
			}
		
		return $meta;
	}
endif;

/* Get post meta with default values */
if(!function_exists('thr_get_post_meta')):
	function thr_get_post_meta($post_id, $field = false){
		$defaults = array(
				'use_sidebar' => 'inherit',
				'sidebar' => 'thr_default_sidebar',
				'sticky_sidebar' => 'thr_default_sticky_sidebar',
				'layout' => 'inherit'
			);
		
		$meta = get_post_meta($post_id, '_thr_meta', true);
	 	$meta = wp_parse_args( (array) $meta, $defaults );
		
		if($field){
			if(isset($meta[$field])){
				return $meta[$field];
			} else {
				return false;
			}
		}
		
		return $meta;
	}
endif;

/* Get category meta with default values */
if(!function_exists('thr_get_category_meta')):
	function thr_get_category_meta($cat_id = false, $field = false){
		$defaults = array(
				'use_sidebar' => 'inherit',
				'sidebar' => 'inherit',
				'sticky_sidebar' => 'inherit',
				'layout' => 'inherit',
				'fa_layout' => 'inherit'
			);
		if($cat_id){
			$meta = get_option('_thr_category_'.$cat_id);
	   		$meta = wp_parse_args( (array) $meta, $defaults );
	   	} else {
	   		$meta = $defaults;
	   	}
		
		if($field){
			if(isset($meta[$field])){
				return $meta[$field];
			} else {
				return false;
			}
		}
		
		return $meta;
	}
endif;


/* Draw "order by" selectbox inside widget form */
if(!function_exists('thr_widget_orderby')):
	function thr_widget_orderby($widget_instance = false, $orderby = false, $opts = array()){
		$orders = array(
				'date' => __('Published date', THEME_SLUG),
				'menu_order' => __('Menu order', THEME_SLUG),
				'rand' => __('Random', THEME_SLUG),
				'views' => __('Number of views', THEME_SLUG),
				'comment_count' => __('Popularity (Number of comments)', THEME_SLUG)
			);

		if(is_array($opts) && !empty($opts)){
			$new_orders = array();
			foreach($opts as $opt){
				if(array_key_exists($opt,$orders)){
					$new_orders[$opt] = $orders[$opt];
				}
			}
			if(!empty($new_orders)){
				$orders = $new_orders;
			}
		}

		if(!empty($widget_instance)) { ?>
				<label for="<?php echo $widget_instance->get_field_id( 'orderby' ); ?>"><?php _e('Order by:', THEME_SLUG); ?></label>
				<select id="<?php echo $widget_instance->get_field_id( 'orderby' ); ?>" name="<?php echo $widget_instance->get_field_name( 'orderby' ); ?>" class="widefat">
					<?php foreach($orders as $key => $order) { ?>
						<option value="<?php echo $key; ?>" <?php selected( $orderby, $key );?>><?php echo $order; ?></option>
					<?php } ?>
				</select>
		<?php }
	}
endif;

/* Draw taxonomy selectbox inside widget form */
if(!function_exists('thr_widget_tax')):
	function thr_widget_tax($widget_instance, $taxonomy, $selected_taxonomy = false){
		if(!empty($widget_instance) && !empty($taxonomy)){
					$categories = get_terms( $taxonomy, 'orderby=name&hide_empty=0' );
			?>
				<label for="<?php echo $widget_instance->get_field_id( 'category' ); ?>"><?php _e('Choose from:', THEME_SLUG); ?></label>
				<select id="<?php echo $widget_instance->get_field_id( 'category' ); ?>" name="<?php echo $widget_instance->get_field_name( 'category' ); ?>" class="widefat">
					<option value="0" <?php selected( $selected_taxonomy, 0 );?>><?php _e('All categories', THEME_SLUG); ?></option>
					<?php foreach($categories as $category) { ?>
						<option value="<?php echo $category->term_id; ?>" <?php selected( $category->term_id, $selected_taxonomy );?>><?php echo $category->name; ?></option>
					<?php } ?>
				</select>
		<?php }
	}
endif;

/* Get image sizes */
if(!function_exists('thr_get_image_sizes')):
function thr_get_image_sizes() {
    $sizes = array(
    		'thr-fa-half' => array('title' => 'Featured area half', 'w' => 534, 'h' => 267, 'crop' => true),
    		'thr-fa-third' => array('title' => 'Featured area third', 'w' => 356, 'h' => 267, 'crop' => true),
    		'thr-fa-quarter' => array('title' => 'Featured area quarter', 'w' => 267, 'h' => 267, 'crop' => true),
    		'thr-layout-a' => array('title' => 'Layout A', 'w' => 730, 'h' => 9999, 'crop' => false),
    		'thr-layout-a-nosid' => array('title' => 'Layout A (no sidebar)', 'w' => 1070, 'h' => 9999, 'crop' => false),
    		'thr-layout-b' => array('title' => 'Layout B', 'w' => 267, 'h' => 267, 'crop' => true),
    		'thr-layout-c' => array('title' => 'Layout C', 'w' => 350, 'h' => 185, 'crop' => true),
    		'thr-layout-c-nosid' => array('title' => 'Layout C (no sidebar)', 'w' => 514, 'h' => 272, 'crop' => true),
    		'thr-layout-d' => array('title' => 'Layout D', 'w' => 100, 'h' => 100, 'crop' => true)
    	);
	return $sizes;
}
endif;


/* Get image option url */
if(!function_exists('thr_get_option_media')):
	function thr_get_option_media($option){
	  $media = thr_get_option($option);
	  if(isset($media['url']) && !empty($media['url'])){
	  	return $media['url'];
	  }
	  return false;
	}
endif;

/* Generate font links */
if(!function_exists('thr_generate_font_links')):
	function thr_generate_font_links(){
	  $fonts = array();
	  $fonts[] = thr_get_option('main_font');
	  $fonts[] = thr_get_option('h_font');
	  $fonts[] = thr_get_option('nav_font');

	  $output = array();

	  $links = array();
	  foreach ($fonts as $font){
	  	
	  	//<link href='http://fonts.googleapis.com/css?family=Roboto:400,300&subset=latin,greek' rel='stylesheet' type='text/css'>

	  	if($font['google']){
		  	$link = 'http://fonts.googleapis.com/css?family='.str_replace(' ','%20', $font['font-family']); //valid
		  	if(isset($font['font-weight']) && $font['font-weight'] != 400){
		  		$link .= ':400,'.$font['font-weight'];
		  		if(isset($font['font-style']) && empty($font['font-style'])){
		  			$link .= $font['font-style'];
		  		}
		  	}

		  	if(isset($font['subsets']) && $font['subsets'] != 'latin'){
		  		$link .= '&subset=latin';
		  		if($font['subsets'] != ''){
		  			$link .= ','.$font['subsets'];
		  		}

		  	}
		  	$output[] = str_replace('&','&amp;', $link); //valid
	   }

	  }
	  
	  return $output;
	}
endif;

/* Generate dynamic CSS */
if(!function_exists('thr_generate_dynamic_css')):
	function thr_generate_dynamic_css(){
	  ob_start();
	  get_template_part('css/dynamic-css');
	  $output = ob_get_contents();
	  ob_end_clean();
	  return thr_compress_css_code($output);
	}
endif;

?>
