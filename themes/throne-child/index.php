<?php get_header(); ?>

<?php get_template_part('sections/subheader'); ?>

<?php get_template_part('sections/featured','area'); ?>

    <section id="main" class="content_wrapper">

    	<?php global $thr_sidebar_opts; ?>
		<?php if ( $thr_sidebar_opts['use_sidebar'] == 'left' ) { get_sidebar(); } ?>

        <div class="main_content_wrapper">
        
<?php
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

	$args['search'] = get_query_var( 'search' );
	$wp_query = new WP_Query($args); 
?>
	<?php get_template_part('sections/loops/'.thr_get_posts_layout()); ?>

        <?php get_template_part('sections/pagination'); ?>
        </div>

        <?php if ( $thr_sidebar_opts['use_sidebar'] == 'right' ) { get_sidebar(); } ?>

	<?php wp_reset_query(); ?>

    </section>

<?php get_footer(); ?>
