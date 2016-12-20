<?php

// Do not delete these lines
	if (!empty($_SERVER['SCRIPT_FILENAME']) && 'comments.php' == basename($_SERVER['SCRIPT_FILENAME']))
		die ('Please do not load this page directly. Thanks!');

	if ( post_password_required() ) { ?>
		<p class="nocomments"><?php _e('This post is password protected. Enter the password to view comments.', THEME_SLUG); ?></p>
	<?php
		return;
	}
?>
<?php if(comments_open()) : ?>
<!-- You can start editing here. -->
<div id="post-comments-<?php the_ID(); ?>" class="comments_main">

<?php if ( have_comments() ) : ?>
     <div class="comments_holder">
        <h3 class="comment_title underlined_heading"><span><?php comments_number(__thr('no_comments'), __thr('one_comment'), __thr('comments_number')); ?></span><a href="#respond" class="button_respond"><i class="icon-bubbles"></i><?php echo __thr('leave_a_comment'); ?></a>  </h3> 
        
        
        <div class="clear"></div>     
                       
        <ul class="comment-list">
            <?php $args = array(
                'avatar_size' => 64,
                'reply_text' => __thr('reply_comment'),
                'format' => 'html5'
            );?>
            <?php wp_list_comments($args); ?>
        </ul><!--END comment-list-->
    		
    		<div class="navigation">
  			   <?php paginate_comments_links(); ?> 
 			</div>
    </div><!--END comments holder -->
<?php endif; ?>

<div id="comments" class="comment_post">
<div class="comment-form-wrapper">
<?php $args = array(
    'comment_notes_after' => ''
);?>
<?php comment_form($args); ?>

</div> <!-- end of comment-form-wrapper -->
</div><!--END post--> 
        
</div>

<?php endif; ?>