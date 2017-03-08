<?php get_header(); ?>

<?php get_template_part('sections/subheader'); ?>

<?php get_template_part('sections/featured','area'); ?>

    <section id="main" class="content_wrapper">
    	
    	<?php global $thr_sidebar_opts; ?>
		<?php if ( $thr_sidebar_opts['use_sidebar'] == 'left' ) { get_sidebar(); } ?>

        <div class="main_content_wrapper">
	
	<?php get_template_part('sections/loops/'.thr_get_posts_layout()); ?>

        <?php get_template_part('sections/pagination'); ?>
	
        </div>

	<?php if ( $thr_sidebar_opts['use_sidebar'] == 'right' ) { get_sidebar(); } ?>

    </section>

<?php get_footer(); ?>

