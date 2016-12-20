<div class="logo_wrapper">

	<?php 
		$logo_url = thr_get_option('logo_custom_url') ? thr_get_option('logo_custom_url') : home_url( '/' ); 
		$logo = thr_get_option('logo')
	?>
	
	<div class="site-title">
		<a href="<?php echo esc_url( $logo_url ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name' ) ); ?>" >
			<?php if(!empty($logo['url'])) : ?>
			<img src="<?php echo $logo['url']; ?>" alt="<?php bloginfo( 'name' ); ?>" />
			<?php else: ?>
			<?php bloginfo( 'name' ); ?>
			<?php endif; ?>
		</a>
	</div>

<?php if (thr_get_option('header_description')) { ?>
	<span class="site-desc">
		<?php echo get_bloginfo('description'); ?>
	</span>	
<?php } ?>	

</div>