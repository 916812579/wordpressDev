<?php
?>

<article class="post shadow post_expert">
	   <?php if (has_post_thumbnail()):?>
		<figure class="thumbnail">
		<a href="<?php  the_permalink();?>">
			
			<?php  the_post_thumbnail('thumbnail');?>
	
	</figure>
		<?php endif;?>
		<header class="post-header">
		<h3 class="post-title">
			<a href="<?php  the_permalink();?>" rel="bookmark"><?php the_title();?></a>
		</h3>
	</header>
	<!-- .entry-header -->
	<div class="entry-content">
		<div class="archive-content"><?php get_post_excerpt();?></div>
		<span class="entry-meta"> <span class="date"><?php  the_time('Y-m-d G:H'); ?>&nbsp;&nbsp;</span>
		     <?php
    
    if (function_exists("the_views")) {
        echo '<span class="reads"><i
				class="fa fa-eye"></i>&nbsp;&nbsp;';
        the_views();
        echo '&nbsp;</span>';
    }
    ?> 
            
             <?php
            
            if (function_exists("wp_zan")) {
                echo '<span class="zans">';
                wp_zan();
                echo '&nbsp;&nbsp;</span>';
            }
            ?> 
		    <span class="comment"><a href="<?php  the_permalink();?>#comments"
				rel="external nofollow"><i class="fa fa-comment-o"></i>&nbsp;&nbsp;<?php echo number_format_i18n(get_comments_number());?></a></span>
		</span>
		<div class="clear"></div>
	</div>
	<!-- .entry-content -->
	<span class="entry-more"><a class="tags" href="<?php  the_permalink();?>"
		rel="bookmark">阅读全文</a></span>
	
	<div class="entry-tags">
		<?php
		
$tags = wp_get_post_tags($post->ID);
foreach ($tags as $tag) :
    ?>
	<!--	<span class="entry-tag"> <a class="tags" href="<?php echo get_tag_link($tag->term_id);?>" rel="bookmark"><?php echo $tag->name;?></a></span>
	-->	<?php  endforeach;?>
		
			<?php
		
$cats = get_the_category($post->ID);
foreach ($cats as $cat) :
    ?>
		<span class="entry-tag"> <a class="tags" href="<?php echo get_tag_link($cat->term_id);?>" rel="bookmark"><?php echo $cat->name;?></a></span>
		<?php  break; endforeach;?>
		
		
	</div> 

	<div class="entry-cats">
	
	</div>
	
</article>

