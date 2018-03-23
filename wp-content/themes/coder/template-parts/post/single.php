<?php
?>

<div class="content-wrap">
	<div class="content">
		<header class="archive-header">
			<div class="mbx-dh">
				当前位置：<a href="<?php echo get_bloginfo('url') ?>">首页</a> 
				>> <?php $categorys = get_the_category(); $category = $categorys[0];echo(get_category_parents($category->term_id,true,'>>')); ?>
				<?php the_title();?>
				<div class="pull-right">
					<a href="javascript:fullscrent()" data-toggle="tooltip" title="全屏"><i
						class="fa fa-caret-left"></i> <i class="fa fa-caret-right"></i></a>
				</div>
			</div>

		</header>
	</div>
</div>

<div class="content">
	<header class="article-header">
		<h2 class="article-title">
			<a href="<?php  the_permalink();?>"><?php the_title();?></a>
		</h2>


		<div class="meta">
			<span id="mute-category" class="muted"><i class="fa fa-list-alt"></i>&nbsp;&nbsp;<?php

if (! is_category()) {
    $category = get_the_category();
    if ($category[0]) {
        echo '<a href="' . get_category_link($category[0]->term_id) . '">' . $category[0]->cat_name . '</a>';
    }
}
;
?></span>
			<time class="muted">
				<i class="fa fa-clock-o"></i> <?php echo timeago( get_gmt_from_date(get_the_time('Y-m-d G:i:s')) )?>
				</time>
			<span class="muted"><i class="fa fa-eye"></i><?php deel_views('℃'); ?></span>
			<span class="muted"><i class="fa fa-comments-o"></i> <a
				href="<?php echo get_comments_link();?>"><?php echo get_comments_number('0', '1', '%');?>评论</a></span>
				
				<?php if (get_edit_post_link( $post->ID )) :?>
				<i class="fa fa-pencil-square-o"></i>
				<?php edit_post_link('编辑'); endif;?>
		</div>
	</header>
</div>
<article class="article-content">
<?php  the_content(); ?>
<div class="article-social">
<?php wp_custom_zan();?>
	</div>
</article>
<footer class="article-footer">
	<div class="article-tags">
		<i class="fa fa-tags"></i>
		
		<?php
$cats = wp_get_post_tags($post->ID);
$count = 1;
foreach ($cats as $cat) :
    ?>
		
		<a href="<?php echo get_tag_link($cat->term_id);?>"
			data-toggle="tooltip" rel="tag"
			class="post_tag post_tag_<?php echo $count;?>" data-original-title=""
			title="<?php echo $cat->name;?>"><?php echo $cat->name;?></a>
	    <?php $count++; endforeach;?>
	</div>
</footer>

<nav class="article-nav">
<?php if (get_previous_post()) :?>
	<span class="article-nav-prev">
	    
	    <i class="fa fa-angle-double-left"></i>
		<?php  previous_post_link('%link')?>
		</span><?php endif;?>
		<?php if (get_next_post()) :?>
	<span class="article-nav-next pull-right">
	
	    <?php  next_post_link('%link') ;?>
	<i class="fa fa-angle-double-right"></i></span>
	<?php endif;?>
</nav>


