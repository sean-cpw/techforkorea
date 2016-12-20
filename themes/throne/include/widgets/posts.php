<?php
/*-----------------------------------------------------------------------------------*/
/*	Posts Widget Class
/*-----------------------------------------------------------------------------------*/

class THR_Posts_Widget extends WP_Widget { 

	function THR_Posts_Widget() {
		$widget_ops = array( 'classname' => 'thr_posts_widget', 'description' => __('Display your posts with this widget', THEME_SLUG) );
		$control_ops = array( 'id_base' => 'thr_posts_widget' );
		$this->WP_Widget( 'thr_posts_widget', __('Throne Posts', THEME_SLUG), $widget_ops, $control_ops );
	}

	
	function widget( $args, $instance ) {
		extract( $args );
		
		$title = apply_filters('widget_title', $instance['title'] );
		
		echo $before_widget;

		if ( !empty($title) ) {
			echo $before_title . $title . $after_title;
		}
	
		$q_args = array(
			'post_type'=> 'post',
			'posts_per_page' => $instance['numposts'],
			'ignore_sticky_posts' => 1,
			'orderby' => $instance['orderby']
		);
				
		if(!empty($instance['category'])){
			$q_args['cat'] = $instance['category'];
		}
		
		$thr_posts = new WP_Query($q_args);
		
		if($thr_posts->have_posts()): ?>
		  
		<ul>			
			
			<?php	while($thr_posts->have_posts()) : $thr_posts->the_post(); ?>
		 	
		 		<li>
		 			<a href="<?php esc_url(get_permalink()); ?>" class="featured_image_sidebar"><?php echo thr_featured_image('thr-layout-c'); ?><span class="featured_item_overlay"></span><span class="featured_title_over"><span class="featured_posts_link"><?php echo thr_trim_chars(get_the_title(), 53, '...'); ?></span></span></a>
		 		</li>
			<?php endwhile; ?>
			 
		  </ul>
		<?php endif; ?>
		
		<?php wp_reset_postdata(); ?>
		
		<?php
		echo $after_widget;
	}

	
	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
		$instance['title'] = strip_tags( $new_instance['title'] );
		$instance['orderby'] = $new_instance['orderby'];
		$instance['category'] = absint($new_instance['category']);
		$instance['numposts'] = absint($new_instance['numposts']);

		return $instance;
	}

	function form( $instance ) {

		$defaults = array( 
				'title' => __('My posts', THEME_SLUG),
				'numposts' => 5,
				'category' => 0,
				'orderby' => 0
			);
			
		$instance = wp_parse_args( (array) $instance, $defaults ); ?>
		
		
		<p>
			<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e('Title', THEME_SLUG); ?>:</label>
			<input id="<?php echo $this->get_field_id( 'title' ); ?>" type="text" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo esc_attr($instance['title']); ?>" class="widefat" />
		</p>
		
		<p>
	   <label for="<?php echo $this->get_field_id( 'numposts' ); ?>"><?php _e('Number of posts to show', THEME_SLUG); ?>:</label>
		 <input id="<?php echo $this->get_field_id( 'numposts' ); ?>" type="text" name="<?php echo $this->get_field_name( 'numposts' ); ?>" value="<?php echo absint($instance['numposts']); ?>" class="small-text" />
	  </p>
	  
	  <p>
	  	<?php thr_widget_tax($this, 'category', $instance['category']); ?>
	  </p>
    
    <p>
	  	<?php thr_widget_orderby($this, $instance['orderby'], array('date','rand','comment_count')); ?>
	  </p>
	   
	<?php
	}
}

?>