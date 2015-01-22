<?php

/* Custom function to get meta data for specific layout */
if(!function_exists('thr_child_get_meta_data')):
function thr_child_get_meta_data($layout = 'layout-a') {

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
			if (get_post_custom_values('source') && strcmp($mkey, 'author') == 0) {
				continue;
			}
			$output .= '<div class="meta-item '.$mkey.'">'.$metas_html[$mkey].'</div>';
		}
	}

	if (get_post_custom_values('source')) {
		$source = get_post_custom_values('source');
		$output .= '<div class="meta-item source"><i class="icon-pin"></i><span>'.$source[0].'</span></div>';
	}	

	return $output;
}
endif;
?>
