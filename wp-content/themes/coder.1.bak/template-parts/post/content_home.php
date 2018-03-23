<?php
?>





<article class="post">



	<header class="post-header">
		<h3 class="post-title">
			<a href="<?php  the_permalink();?>" rel="bookmark"><?php the_title();?></a>
		</h3>
	</header>

	
	   <?php if (has_post_thumbnail()):?>
		<figure class="col-md-3">
		<a href="<?php  the_permalink();?>">
			
			<?php  the_post_thumbnail('thumbnail');?>
			</a>
	</figure>
		<?php endif;?>
		
	<!-- .entry-header -->
	<div class="entry-content">
		<div class="archive-content"><?php get_post_excerpt();?></div>
	</div>
	<div class="clear"></div>
	<div class="post_footer">
		<span class="entry-meta"> <span class="date"><?php  the_time('Y-m-d G:H'); ?>&nbsp;&nbsp;</span>
		     <?php
    
    if (function_exists("the_views")) {
        echo '<span class="reads"><i
				class="fa fa-eye"></i>&nbsp;&nbsp;查看(';
        the_views();
        echo ')&nbsp;&nbsp;</span>';
    }
    ?> 
            
             <?php
            
            if (function_exists("wp_zan")) {
                echo '<span class="zans">&nbsp;&nbsp;赞(';
                $wpzan = new wpzan(get_the_ID(), $user_ID);
                echo $wpzan->zan_count;
                echo ')&nbsp;&nbsp;</span>';
            }
            ?> 
		    <span class="comment"><a href="<?php  the_permalink();?>#comments"
				rel="external nofollow"><i class="fa fa-comment-o"></i>&nbsp;&nbsp;评论(<?php echo number_format_i18n(get_comments_number());?>)</a></span>
		</span>
		<!-- .entry-content -->
		<span class="read-more"><a class="tags"
			href="<?php  the_permalink();?>" rel="bookmark">阅读全文</a></span>

		<div class="entry-meta entry-meta-cat">
		<?php

$tags = wp_get_post_tags($post->ID);
foreach ($tags as $tag) :
    ?>
	<!--	<span class="entry-tag"> <a class="tags" href="<?php echo get_tag_link($tag->term_id);?>" rel="bookmark"><?php echo $tag->name;?></a></span>-->
		<?php  endforeach;?>
		
			<?php

$cats = get_the_category($post->ID);
echo "所属分类：";
foreach ($cats as $cat) :
    ?>
		 <span class="entry-cat"> <a class="cat"
				href="<?php echo get_tag_link($cat->term_id);?>" rel="bookmark"><?php echo $cat->name;?>&nbsp;&nbsp;&nbsp;&nbsp;</a></span>
		<?php  break; endforeach;?>
	</div>



	</div>

	<a class="btn btn-danger pull-right read-more"
		href="http://www.yeahzan.com/zanblog/archives/856.html"
		title="详细阅读 Zanblog 更新至V2.1.0">阅读全文 <span class="badge">6</span></a>

</article>

