<?php
?>






<aside id="sidebar" class="col-md-4 sidebar">


	<aside class="widget widget_hot_commend wow animated"
		data-wow-delay="0.3s"
		style="visibility: visible; animation-delay: 0.3s;">
		<h3 class="widget-title">
			<i class="fa fa-bars"></i>本站推荐
		</h3>
		<div id="hot" class="hot_commend">
			<ul>
			<?php

$most_viewed = get_hot_posts(5);

if ($most_viewed->have_posts()) :
    while ($most_viewed->have_posts()) :
        $most_viewed->the_post();
        ?>
				<li
					class="<?php if (($most_viewed->current_post + 1) != $most_viewed->post_count) echo 'dashed-border';?>">
				<?php if (has_post_thumbnail()):?>
				<span class="thumbnail"> <a href="<?php  the_permalink();?>">
				<?php  the_post_thumbnail(array(200,150));?></a>
				</span> 
				<?php endif;?>
				<h3 class="hot-title"><a href="<?php  the_permalink();?>"
						rel="bookmark"><?php the_title();?></a></h3> <span
					class="views"><i class="fa fa-eye interact-item"></i>&nbsp;<?php the_views();?></span>
					<span class="zans"><i class="fa fa-thumbs-o-up interact-item">&nbsp;<?php wp_zan_count();?></i></span>
				</li>
				<?php
    endwhile
    ;






    endif;
wp_reset_postdata();
?>
			</ul>
		</div>
		<div class="clear"></div>
	</aside>

	<aside class="widget widget_hot_commend wow animated"
		data-wow-delay="0.3s"
		style="visibility: visible; animation-delay: 0.3s;">
		<h3 class="widget-title">
			<i class="fa fa-bars"></i>热评文章
		</h3>
		<div id="hot_comment_widget">
			<ul>
						<?php
    
    $most_comments = get_hot_comments_posts(6);
    
    if ($most_comments->have_posts()) :
        while ($most_comments->have_posts()) :
            $most_comments->the_post();
            ?>
				<li><span
					class="li-icon li-icon-<?php echo $most_comments->current_post + 1;?>"><?php echo $most_comments->current_post + 1;?></span><a
					href="<?php  the_permalink();?>" rel="bookmark"
					title=" (<?php echo $post->comment_count;?>条评论)"
					style="margin-left: 0px;"><?php the_title();?></a></li>
									<?php
        endwhile
        ;
    
    
    
    
    

    endif;
    wp_reset_postdata();
    ?>
			</ul>
		</div>
		<div class="clear"></div>
	</aside>

	<aside class="widget widget_hot_commend wow animated"
		data-wow-delay="0.3s"
		style="visibility: visible; animation-delay: 0.3s;">
		<h3 class="widget-title">
			<i class="fa fa-bars"></i>热门文章
		</h3>
		<div id="hot_comment_widget">
			<ul>
						<?php
    
    $most_zans = get_hot_zan(6);
    
    if (! empty($most_zans)) :
        $i = 0;
        foreach ($most_zans as $zan) :
            $i ++;
            ?>
				<li><span class="li-icon li-icon-<?php echo $i;?>"><?php echo $i;?></span><a
					href="<?php  the_permalink($zan);?>" rel="bookmark"
					style="margin-left: 0px;"><?php echo get_the_title($zan);?></a></li>
									<?php
        endforeach
        ;
    
    endif;
    ?>
			</ul>
		</div>
		<div class="clear"></div>
	</aside>
	
 
	<aside class="widget widget_hot_commend wow animated"
		data-wow-delay="0.3s"
		style="visibility: visible; animation-delay: 0.3s;">
		<h3 class="widget-title">
			<i class="fa fa-bars"></i>标签云
		</h3>
		<div id="hot_comment_widget" class="tag-cloud">
<?php wp_tag_cloud(); ?>
			</div>
		<div class="clear"></div>
	</aside>

</aside>
