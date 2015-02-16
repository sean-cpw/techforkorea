<?php
/**
 * Template Name: Database Page
 */
?>
<?php get_header(); ?>

<?php
	$uurl = wp_remote_get('www.techforkorea.com/asdf/database/');
	global $post;
	$subheader_content = get_post_field('post_content', $post->ID);
	if(!empty($subheader_content)){
		$subheader_content = apply_filters('the_content', $subheader_content);
	}

 if($subheader_content): ?>
	<div id="subheader_box" class="full_width">
		<div class="content_wrapper">
			<?php echo $subheader_content; ?>
		</div>
	</div>
<?php endif; ?>

<section id="main" class="content_wrapper">

<!--?php global $thr_sidebar_opts; ?-->
<!--?php if ( $thr_sidebar_opts['use_sidebar'] == 'left' ) { get_sidebar(); } ?-->

<div id="tfk_company_db_header">
	<h1>K-Startup Database</h1>

	<div id="tfk_company_search_form">
		<form class="search_form" id="tfk_company_db" action="<?php echo esc_url( home_url( '/' ) ); ?>" method="get">
			<!-- crazy hack to make query come back to same page -->
			<input name="page_id" value=<?php echo "\"".$post->ID."\""; ?> style="display:none;"/>
			<input name="search" class="search_input" size="20" type="text" placeholder="Type here to search" />
			<input class="icon-magnifier" type="submit" />
		</form>
	</div>
	<p>Compiled by the TK team</p>
</div>
	

<?php get_sidebar('company-db'); ?>
	

<?php if (get_query_var('cat') || strcmp(get_query_var('search', 'no_search_query'), 'no_search_query') != 0) : ?>
	<?php if (get_query_var('cat')) : ?>
		<div id="search_result"><h5>Search result for category search <?php echo get_cat_name( (int) get_query_var('cat') ); ?> </h5></div>
	<?php else : ?>
		<div id="search_result"><h5>Search result for keyword search <?php echo get_query_var('search'); ?> </h5></div>
	<?php endif; ?>
	<div class="main_content_wrapper database_main_content_wrapper">
	<?php
	/* startup databases are made as page */
	$args = array(
		'post_type'=>'page'
	);
	if(is_front_page()){
		$args['paged'] = get_query_var('page');
		global $paged;
		$paged = $args['paged'];	
	} else {
		$args['paged'] = get_query_var('paged');
	}

	if (get_query_var('cat')) {
		$args['category__and'] = array( get_cat_ID('companies'), (int)get_query_var('cat'));
	} else {
		$args['category_name'] = 'companies';
	}
	$args['s'] = get_query_var('search');
	
	$wp_query = new WP_Query($args);

	get_template_part('sections/loops/layout-d'); 
	
	get_template_part('sections/pagination'); 	
	
	wp_reset_query(); 
	?>
	</div>
<?php endif; ?>


<!--?php if ( $thr_sidebar_opts['use_sidebar'] == 'right' ) { get_sidebar(); } ?-->

<!--?php get_sidebar('company-db'); ?-->

</section>


<?php get_footer(); ?>
