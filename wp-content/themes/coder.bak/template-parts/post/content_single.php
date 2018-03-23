<?php
?>



<article id="primary" class="single_post">

	<header>
		<ul class="single-meta">
			<li class="print"><a href="javascript:printme()" target="_self"
				title="打印"><i class="fa fa-print"></i></a></li>
			<li class="comment"><a href="<?php  the_permalink();?>#comments"
				rel="external nofollow"><i class="fa fa-comment-o"></i> <?php echo number_format_i18n(get_comments_number());?></a></li>
			
			<li class="views"><i class="fa fa-eye"></i> <?php the_views();?></li>
			<li class="r-hide"><a href="javascript:pr()" title="侧边栏"><i
					class="fa fa-caret-left"></i> <i class="fa fa-caret-right"></i></a></li>
		</ul>
		<ul id="fontsize">
			<li>A+</li>
		</ul>

	</header>
    <div class="clear"></div>

	<div class="post-head">
		<h3 class="single_post-title">
			<a href="<?php  the_permalink();?>"><?php the_title();?></a>
		</h3>
		
	</div>
	<div  class="post-content">
		<p><?php  the_content(); ?></p>
		
	</div>
	<div class="article-social">
			<?php wp_custom_zan();?>
	</div>
<?php $cat = getCat($post->ID);?>
<div class="single-cat">所属分类：
		 <a href="<?php echo get_tag_link($cat->term_id);?>" rel="bookmark"><?php echo $cat->name;?></a></div>
		 
	<?php if (!is_page()) :?>
	<footer class="post-footer clearfix">
		<div class="post-permalink">
			<?php
    edit_post_link(sprintf(
					/* translators: %s: Name of current post */
					__('编辑')), '', '', 0, 'btn-primary btn ');
    ?>
		</div>
	</footer>
	<?php endif;?>
</article>



