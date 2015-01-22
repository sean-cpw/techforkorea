<?php global $thr_sidebar_opts; ?>
<aside id="sidebar" class="sidebar <?php echo $thr_sidebar_opts['use_sidebar']; ?>">
	<div class="widget">
		<h4 class="widget-title"><span>Added This Week</span></h4>
		<?php
		$sevendaytime = 60*60*24*7;
		$time = getdate(time() - $sevendaytime);
		$args = array(
			'post_type' => 'page',
			'category_name' => 'companies', // companies
			'date_query' => array(
				array(
					'after' => array(
						'year' => $time['year'],
						'month' => $time['mon'],
						'day' => $time['mday'],
					),
					'inclusive' => true,
				),
			),
		);
		$query = new WP_Query( $args );
		?>
		<?php while ( $query->have_posts() ) : $query->the_post(); ?>
			<div>
				<h5 class="entry-title"><a href="<?php echo esc_url(get_permalink()); ?>" title="<?php esc_attr(get_the_title()); ?>" <?php if(get_post_custom_values('external_link')) echo 'target=\"_blank\"'?>><?php echo thr_get_title('layout-d'); ?></a></h5>
	
				<div class="clear"></div>	
			</div>


		<?php endwhile; ?>
		<?php
		wp_reset_postdata();
		?>
	</div>
	
</aside>
