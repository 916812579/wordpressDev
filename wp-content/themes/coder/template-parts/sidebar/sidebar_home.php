<?php
?>






<aside id="sidebar" class="col-md-4 sidebar">

	<div class="widget widget_text">
		<div class="textwidget">
			<div class="social">

				<a href="tencent://message/?uin=916812579&amp;Site=&amp;Menu=yes"
					rel="external nofollow" target="_blank"><i class="qq fa fa-qq"
					title="联系QQ" data-toggle="tooltip" data-placement="top"></i></a>

			</div>
		</div>
	</div>
	
<?php
$args = array(
    'numberposts' => 5,
    'orderby' => 'rand',
    'post_status' => 'publish',
    'category' => $post ->ancestors
);
$rand_posts = get_posts($args);

?>	
	

	<div class="widget d_postlist">
		<div class="title">
			<h3>猜你喜欢</h3>
		</div>
		<ul>
		
		<?php
foreach ($rand_posts as $rand_post) :
    ?>
			<li><a href="<?php the_permalink($rand_post); ?>"
				title=""><span class="thumbnail">
					<?php if( has_post_thumbnail($rand_post) ){ ?>
					<img
						src="<?php echo get_bloginfo('template_url') ?>/timthumb.php?src=<?php $post = $rand_post; echo post_thumbnail_src(); ?>&h=123&w=200&q=90&zc=1&ct=1"
						alt="<?php echo $rand_post->post_title;?>" />
						<?php } else {?>
						<img
						src="<?php echo esc_url( get_template_directory_uri() ); ?>/images/default.png"
						alt="<?php echo $rand_post->post_title;?>" />
						<?php }?>
						</span><span class="text"><?php echo $rand_post->post_title;?></span><span
					class="muted"><?php echo timeago( get_gmt_from_date(get_the_time('Y-m-d G:i:s', $rand_post)) ) ?>&nbsp;&nbsp;</span><span
					class="muted"><?php echo get_comments_number($rand_post->ID);?>&nbsp;评论</span></a></li>
					<?php
endforeach
;
?>
		</ul>
	</div>

	<div class="cat-posts">
		<h3 class="title">分类目录</h3>
		<ul>
			
			<?php

$categories = get_categories($r);
foreach ($categories as $categorie) :
    ?>
        <li><a class=""
				href="<?php echo get_category_link( $categorie -> term_id);?>" title="<?php echo $categorie->name;?>"><img
					src="<?php echo esc_url( get_template_directory_uri() ); ?>/images/folder.gif">&nbsp;<?php echo $categorie->name . " (". $categorie->count . ") ";?></a>
			</li>
				
	<?php
endforeach
;
?>
		</ul>
	</div>

	<div class="widget d_comment">
		<div class="title">
			<h3>最新评论</h3>
		</div>
		<ul>
		
		   <?php
    $comments_query = new WP_Comment_Query();
    
    $comments = $comments_query->query(array(
        'number' => 10,
        'status' => 'approve'
    ));
    foreach ($comments as $comment) :
        ?>
			<li><a href="<?php echo get_permalink( $comment->post_ID );?>"><img
					width="36" height="36" alt=""
					class="avatar avatar-36 wp-user-avatar wp-user-avatar-36 photo avatar-default"
					src="<?php echo esc_url( get_template_directory_uri() ); ?>/images/bubbles.png"
					style="display: block;">
					<div class="muted">
						<i><?php echo get_comment_author( $comment->comment_ID );?></i>&nbsp;<?php echo timeago($comment -> comment_date);?>说：<?php echo strip_tags( substr( apply_filters( 'get_comment_text', $comment->comment_content ), 0, 150 ) );?>
					</div></a></li>
          <?php endforeach;?>
			
		</ul>
	</div>



</aside>
