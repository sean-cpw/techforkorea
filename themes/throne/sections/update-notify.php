<!-- Show this box once the theme is updated -->
<?php 
		$protocol = isset( $_SERVER['https'] ) ? 'https://' : 'http://';
		$thr_ajax_url = admin_url( 'admin-ajax.php', $protocol );
?>
<script>
	(function($) {
		$(document).ready(function() {
				$("body").on('click', '#thr_update_box_hide',function(e){
	    			e.preventDefault();
	    			$(this).parent().parent().remove();
	    			$.post('<?php echo $thr_ajax_url; ?>', {action: 'thr_update_version'}, function(response) {});
    			});

				$("body").on('click', '#thr_feedback a',function(e){
	    			e.preventDefault();
	    			var wrap_id = $(this).attr("data-wrap");
	    			$('.thr_feedback_wrap').hide();
	    			$('#thr_feedback').hide();
	    			$('#'+wrap_id).show();
	    			$('#thr_feedback a').removeClass('selected');
	    			$(this).toggleClass('selected');
    			});

		});
	})(jQuery);

</script> 

<h3>Congratulations, your website just got better!</h3>
<p><strong>Throne</strong> theme has been successfully updated to <strong>version <?php echo THEME_VERSION; ?>.</strong> Feel free to check the changelog and <a href="http://demo.mekshq.com/throne/documentation/#changelog" target="_blank">see what's new</a>.</p>
<div class="feedback_wrapper">

<h3>How do you feel about Throne Theme so far?</h3>
<ul id="thr_feedback">
	<li><a href="" class="happy_link" data-wrap="thr_happy_wrap">Happy</a></li>
	<li><a href="" class="sad_link" data-wrap="thr_sad_wrap">Sad</a></li>
</ul>
<div id="thr_happy_wrap" class="thr_feedback_wrap">
	<p><strong>Great! That's why we have to work hard every day!</strong></p>
	<?php get_template_part('sections/theme-share'); ?>
</div>

<div id="thr_sad_wrap" class="thr_feedback_wrap">
	<p><strong>Yikes! Sorry to hear that.</strong></p>
	<p>If you have any issues with the theme or any ideas how we can improve it, do not hesitate to <a href="http://mekshq.com/contact" target="_blank">contact our support</a>.</p>
	<p>Also, if you find this theme hard to use, please <a href="http://demo.mekshq.com/throne/documentation" target="_blank">visit our documentation</a> in order to find some answers about the setup.</p>
</div>
</div>
<p class="description"><a href="#" id="thr_update_box_hide">Hide this message</a></p>