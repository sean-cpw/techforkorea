<?php
// preheader
function external_link_preheader() {
        if ( !is_admin() ) {
                global $post, $current_user;
                if ( !empty( $post->post_content ) && strpos
                   ( $post->post_content, "[external-link]" ) !== false &&
		   is_single() ) {
			$e_url = get_post_custom_values('external_link');
			wp_redirect($e_url[0]);
			exit;
                        /*
                                Put your preheader code here.
                        */
                }
        }
}
add_action( 'wp', 'external_link_preheader', 1 );

function print_array_with_s_inbetween($array, $s) {
	$i = 0;
	foreach ($array as $t) {
		if ($i != 0) {
			echo $s;
		}
		echo $t;
		$i++;
	}
}
// shortcode [company-details]
function company_details_shortcode() {
        ob_start();
        ?>
	<h3>Company Details</h3>
	<ul>
	<?php 
	if (get_post_custom_values('company_founded')) {
		echo '<li>Founded : ';
		print_array_with_s_inbetween(get_post_custom_values('company_founded'), ' | ');
		echo '</li>';
	}
	if (get_post_custom_values('company_contact')) {
		echo '<li>Contact : ';
	 	print_array_with_s_inbetween(get_post_custom_values('company_contact'), ' | ');	
		echo '</li>'; 
	}
	if (get_post_custom_values('company_employees')) {
		echo '<li>Employees : ';
		print_array_with_s_inbetween(get_post_custom_values('company_employees'), ' | ');
		echo '</li>';
	}
	if (get_post_custom_values('company_funding')) {
		echo '<li>Funding : ';
		print_array_with_s_inbetween(get_post_custom_values('company_funding'), ' | ');
		echo '</li>';
	}

	$database_page_id = 1682; // page_id for the database page
	$i = 0;
	$cats = array();
	$post_categories = wp_get_post_categories( get_the_ID() );
	foreach ($post_categories as $c) {
		$cat = get_category( $c );
		if (strcmp($cat->slug, 'companies') != 0) { // companies is a slug for startup database page
			$get = esc_url("?page_id=$database_page_id&cat=$c");
			$url = get_site_url();
			$cats[] = "<a href=\"$url/$get\">$cat->name</a>";
			$i++;
		}
	}
	if ($i > 0) {
		echo '<li>Category : ';
		print_array_with_s_inbetween($cats, ' | ');
		echo '</li>';
	}
	?>
	</ul>
	<?php
        $temp_content = ob_get_contents();
        ob_end_clean();
        return $temp_content;
}
add_shortcode( 'company-details', 'company_details_shortcode' );

?>
