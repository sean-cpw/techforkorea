<?php $fa = thr_get_current_fa(); ?>
<?php if($fa['display']): ?>
 
 <?php 
	$img_lyt = array();
	$img_lyt[2] = 'thr-fa-half';
	$img_lyt[3] = 'thr-fa-third';
	$img_lyt[4] = 'thr-fa-quarter';
	$top = $fa['top'];
	$bottom = $fa['bottom'];
	global $wp_query; 
	$wp_query = $fa['query'];

	$hover_effect = thr_get_option('featured_area_hover');
	$rm = thr_get_option('lay_fa_rm');
	
	global $home_post_ids;
	$home_post_ids = array();
?>

<section id="featured_wrapper" class="featured_wrapper full_width">

	<div class="content_wrapper">
   
   <?php $i = 1; if ( have_posts() ) :  while ( have_posts() ) : the_post(); ?>
   
   <?php if($i == 1) : $img_size = $img_lyt[$top]; ?>
		<div class="featured_<?php echo $top; ?>">
	 <?php endif; ?>
	 
	 <?php if($i == ($top + 1)) : $img_size = $img_lyt[$bottom]; ?>
		<div class="featured_<?php echo $bottom; ?>">
	 <?php endif; ?>				
				<?php
				// custom edit	
				echo "<div class=\"featured_element tfk_featured" . $i . "\">";
				?>
					<div class="featured_item">
						<?php echo thr_featured_image($img_size); ?>
					</div>
					
                	<?php if($icon = thr_post_format_icon()) :?>
						<div class="featured_icon">
							<i class="icon-<?php echo $icon; ?>"></i>
						</div>
					<?php endif; ?>
					<?php if($hover_effect): ?>
						<a href="<?php echo esc_url(get_permalink()); ?>" class="f_overlay"></a>
					<?php endif; ?>
					<div class="featured_title_over">
						
						<?php if($meta = thr_get_meta_data('fa')) : ?>
							<?php echo $meta; ?>
						<?php endif; ?>
						<h2><a href="<?php echo esc_url(get_permalink()); ?>" title="<?php esc_attr(get_the_title()); ?>"><?php echo thr_get_title('fa'); ?></a></h2>
						<?php if($hover_effect): ?>
						<div class="featured_excerpt">
							<p><?php echo thr_get_excerpt('fa'); ?></p>
							<?php if($rm): ?>
								<a href="<?php echo esc_url(get_permalink()); ?>" class="f_read_more"><i class="icon-arrow-right"></i> <?php echo __thr('read_more');?></a>
							<?php endif; ?>
						</div>
						<?php endif; ?>
					</div>
					<div class="f_title_bg"></div>
				</div>
		
		<?php if($i == $top  || $i == $top + $bottom) : ?>	
			</div>
		<?php endif; ?>
		
	<?php $i++; ?>
	<?php $home_post_ids[] = get_the_ID(); ?>
	<?php endwhile; ?>
	<?php endif; ?>
	
	<?php wp_reset_query(); ?>
		<!--h6 style="background-color: red; padding: 5px; margin-bottom:0px; display: inline-block;">
			Latest
		</h6>
		<h6 style="background-color: grey; padding: 5px; margin-bottom:0px; display: inline-block;">
			Popular
		</h6>
		<span style="width: 70%; border: 10px; display: inline-block;">
		</span>
		<span class="arch_line" style="margin-top: 0px; padding-top: 5px; width: 73%; float:left; position:static;"></span--> 
	</div>

</section>
<?php endif; ?>
