<?php global $thr_sidebar_opts; ?>
<div class="posts_wrapper layout_c">
<?php $x = 0; ?>	
<?php if ( have_posts() ) :  while ( have_posts() ) : the_post(); $x++; ?>
<?php      
	if( $x == 2) {
		$style = 'last';
		$x= 0;
	} else $style='';
?>
<article id="post-<?php the_ID(); ?>" <?php post_class($style); ?>>

	<?php if($image = thr_featured_image('thr-layout-c', $thr_sidebar_opts['use_sidebar'])): ?>
	<div class="entry-image featured_image">
		<a href="<?php echo esc_url(get_permalink()); ?>" title="<?php esc_attr(get_the_title()); ?>">

		<?php echo $image; ?>
		
		<span class="featured_item_overlay"></span>
    	<?php if($icon = thr_post_format_icon()) :?>
			<span class="featured_icon">
				<i class="icon-<?php echo $icon; ?>"></i>
			</span>
		<?php endif; ?>

		</a>
	</div>
	<?php endif;?>

	<div class="entry-header">

		<h2 class="entry-title"><a href="<?php echo esc_url(get_permalink()); ?>" title="<?php esc_attr(get_the_title()); ?>"><?php echo thr_get_title('layout-c'); ?></a></h2>
		
		<?php if($meta = thr_get_meta_data('layout-c')): ?>
			<div class="entry-meta">
				<?php echo $meta; ?>
			</div>
		<?php endif; ?>
	</div>
	
	<div class="entry-content">
		
		<?php if( $excerpt = thr_get_excerpt('layout-c')) {echo '<p>'.$excerpt.'</p>'; } ?>
		
	</div>


	<div class="entry-footer">

		<?php if(thr_get_option('lay_c_rm')) : ?>
		<div class="meta-item">
			<a href="<?php echo esc_url(get_permalink()); ?>" class="read_more_button read_more_small"><i class="icon-arrow-right"></i><?php echo __thr('read_more'); ?></a>
		</div>
		<?php endif; ?>

		<?php if(thr_get_option('lay_c_share')) : ?>
		<div class="meta-item meta-item-share meta-item-share-small">
			<div class="meta-item-wrapper">
				<?php get_template_part('sections/share-list'); ?>
			</div>
		</div>
		<?php endif; ?>
		
	</div>

	
<div class="clear"></div>	
</article>

<?php endwhile; ?>
<?php else: ?>
	<?php get_template_part( 'sections/content', 'none' ); ?>		
<?php endif; ?>
</div>