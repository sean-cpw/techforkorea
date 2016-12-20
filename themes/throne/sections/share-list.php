<?php 
	$share = array();
	$share['facebook'] = '<a class="fa fa-facebook" href="javascript:void(0);" data-url="http://www.facebook.com/sharer.php?u='.get_permalink().'&amp;t='.get_the_title().'"></a>';
	$share['twitter'] = '<a class="fa fa-twitter" href="javascript:void(0);" data-url="http://twitter.com/intent/tweet?url='.get_permalink().'&amp;text='.get_the_title().'"></a>';
	$share['gplus'] = '<a class="fa fa-google-plus" href="javascript:void(0);" data-url="https://plus.google.com/share?url='.get_permalink().'"></a>';
	$share['pinterest'] = '<a class="fa fa-pinterest" href="javascript:void(0);" data-url="http://pinterest.com/pin/create/button/?url='.get_permalink().'&amp;media=&amp;description='.get_the_title().'"></a>';
	$share['linkedin'] = '<a class="fa fa-linkedin" href="javascript:void(0);" data-url="http://www.linkedin.com/shareArticle?mini=true&amp;url='.get_permalink().'&amp;title='.get_the_title().'"></a>';
	
	$share_options = thr_get_option('social_share');
?>

<div class="soc_sharing">
	<div class="thr_share_button">
		<i class="icon-share"></i>
	</div>
	<ul class="thr_share_items">
		<?php foreach($share_options as $social => $value): ?>
			<?php if($value): ?>
				<li><?php echo $share[$social]; ?></li>
			<?php endif; ?>
		<?php endforeach; ?>
	</ul>
</div>