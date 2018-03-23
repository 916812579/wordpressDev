<article class="excerpt">
	<header>
		<?php

if (! is_category()) {
    $category = get_the_category();
    if ($category[0]) {
        echo '<a class="label label-important" href="' . get_category_link($category[0]->term_id) . '">' . $category[0]->cat_name . '&nbsp;&nbsp;<i class="label-arrow fa fa-hand-o-right"></i></a>';
    }
}
;
?>
		<h3>
			<a target="_blank" href="<?php  the_permalink();?>"
				title="<?php the_title();?>"><?php the_title();?> </a>
		</h3>
	</header>
	<?php if( has_post_thumbnail() ){ ?>
	<div class="focus">
		<a target="_blank" href="<?php the_permalink(); ?>"><img class="thumb"
			src="<?php echo get_bloginfo('template_url') ?>/timthumb.php?src=<?php echo post_thumbnail_src(); ?>&h=123&w=200&q=90&zc=1&ct=1"
			alt="<?php the_title(); ?>" /></a>
	</div>
	<?php } ?>
	

	<span class="note">
		<?php get_post_excerpt();?></span>
	<div class="clearfix "></div>
	<p class="auth-span">
	<?php if (get_edit_post_link( $post->ID )) :?>
		<span class="muted">
				<i class="fa fa-pencil-square-o"></i>
				<?php edit_post_link('编辑'); ?></span>
		<?php endif;?>
		 <span class="muted"><i
			class="fa fa-clock-o"></i> <?php echo timeago( get_gmt_from_date(get_the_time('Y-m-d G:i:s')) ) ?></span>
		<span class="muted"><i class="fa fa-eye"></i> <?php deel_views('℃'); ?></span>
		<span class="muted"><i class="fa fa-comments-o"></i> <?php
if (comments_open())
    echo '<a target="_blank" href="' . get_comments_link() . '">' . get_comments_number('0', '1', '%') . '评论</a>'?></span></span><span
			class="muted"> <span href="javascript:;" data-action="ding"
			data-id="3831" id="Addlike" class="action"><i class="fa fa-heart-o"></i><span
				class="count"><?php wp_zan_count();?></span>喜欢</span></span>
	</p>
</article>