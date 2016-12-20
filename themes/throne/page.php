<?php get_header(); ?>

<section id="main" class="content_wrapper">

<?php global $thr_sidebar_opts; ?>
<?php if ( $thr_sidebar_opts['use_sidebar'] == 'left' ) { get_sidebar(); } ?>

<div class="main_content_wrapper">

<?php while ( have_posts() ) : the_post(); ?>

			
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	
	<div class="entry-header">		
	<h1 class="entry-title"><?php the_title(); ?></h1>
	</div>
	<?php if(has_post_thumbnail()): ?>
	<div class="entry-image">
		<?php the_post_thumbnail('thr-onecol-sid'); ?>
	</div>
	<?php endif; ?>

	
	<div class="entry-content">
		
		<?php the_content(); ?>
		
	</div>
	
<div class="clear"></div>	
			
</article><!-- #post -->


<?php comments_template( '', true ); ?>

<?php endwhile; // end of the loop. ?>

</div>

<?php if ( $thr_sidebar_opts['use_sidebar'] == 'right' ) { get_sidebar(); } ?>

</section>
	
<?php get_footer(); ?>