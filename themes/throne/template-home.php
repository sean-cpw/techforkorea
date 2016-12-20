<?php
/**
 * Template Name: Home Page
 */
?>
<?php get_header(); ?>

<?php
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

<?php get_template_part('sections/featured','area'); ?>

<section id="main" class="content_wrapper">

<?php global $thr_sidebar_opts; ?>
<?php if ( $thr_sidebar_opts['use_sidebar'] == 'left' ) { get_sidebar(); } ?>

<div class="main_content_wrapper">
	

<?php
	/* Get posts for home page */
	
	$args = array(
		'post_type'=>'post'
	);
	
	if(is_front_page()){
		$args['paged'] = get_query_var('page');
		global $paged;
		$paged = $args['paged'];
	} else {
		$args['paged'] = get_query_var('paged');
	}

	//Exclude featured area posts
	global $home_post_ids;
	if(thr_get_option('home_do_not_duplicate') && !empty($home_post_ids)){
		$args['post__not_in'] = $home_post_ids;
	}
	
	$wp_query = new WP_Query($args);
?>

	<?php get_template_part('sections/loops/'.thr_get_option('home_page_layout')); ?>
		
	<?php get_template_part('sections/pagination'); ?>
	
	<?php wp_reset_query(); ?>
</div>

<?php if ( $thr_sidebar_opts['use_sidebar'] == 'right' ) { get_sidebar(); } ?>
	
</section>


<?php get_footer(); ?>