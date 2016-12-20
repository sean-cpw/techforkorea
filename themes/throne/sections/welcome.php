<!-- This is a welcome message that displays on theme activation -->
<?php 
		$protocol = isset( $_SERVER['https'] ) ? 'https://' : 'http://';
		$thr_ajax_url = admin_url( 'admin-ajax.php', $protocol );
?>
<script>
	(function($) {
		$(document).ready(function() {
				$("body").on('click', '#thr_welcome_box_hide',function(e){
	    			e.preventDefault();
	    			$(this).parent().parent().remove();
	    			$.post('<?php echo $thr_ajax_url; ?>', {action: 'thr_hide_welcome'}, function(response) {});
    			});
		});
	})(jQuery);

</script> 
<?php global $current_user; ?>
<h3>Welcome to Throne!</h3>
<p>Dear <?php echo $current_user->display_name; ?>,</p>
<p>Thanks for purchasing and installing <strong>Throne</strong> - Personal Blog/Magazine WordPress Theme. <br/>We really appreciate your trust and hope you will enjoy using this theme as much as we have enjoyed creating it.</p>
<p>Cheers,<br/><a href="http://mekshq.com" target="_blank">MeksHQ Team</a></p>
<h3>Quick tips to start with:</h3>
<ul>
	<li>
		<p><strong>1.</strong> Please refer to <a href="http://demo.mekshq.com/throne/documentation" target="_blank">Throne Documentation</a> for explanation how to setup this theme step by step.</p>
	</li>
	<li>
		<p><strong>2.</strong>  Install and activate our <a href="<?php echo admin_url('themes.php?page=install-required-plugins'); ?>" target="_blank">recommended plugins</a> to get the most features of this theme.</p>
	</li>
	<li>
		<p><strong>3.</strong>  Go to <a href="<?php echo admin_url('admin.php?page=thr_options'); ?>" target="_blank">Throne Options</a> page to start customization.</p>
	</li>
	<li>
		<p><strong>4.</strong>  If you have any questions do not hesitate to <a href="http://mekshq.com/contact" target="_blank">contact our support</a>.</p>
	</li>
</ul>

<?php get_template_part('sections/theme-share'); ?>
<p class="description"><a href="#" id="thr_welcome_box_hide">Hide this message</a></p>