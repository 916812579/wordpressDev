<?php
get_header();
?>



<div class="row">

	<main class="col-md-8 main-content">

	<div class="hot-posts">
		<h3 class="title">
			热门阅读 <img
				src="<?php echo esc_url( get_template_directory_uri() ); ?>/images/hot.gif">
		</h3>
		<ul>
			
			<?php

$most_viewed = get_hot_posts(6);
$count = 1;
if ($most_viewed->have_posts()) :
    while ($most_viewed->have_posts()) :
        $most_viewed->the_post();
        ?>
        <li>
				<p>
					<span class="post-comments">评论 (<?php echo $post->comment_count;?>)</span><span class="muted"><span
						href="javascript:;" data-action="ding" data-id="2718" id="Addlike"
						class="action"><i class="fa fa-heart-o"></i><span class="count"><?php wp_zan_count();?></span>喜欢</span></span>
				</p> <span class="label label-<?php echo $count;?> pull-left"><?php echo $count;?></span><a class="col-md-8"
				href="<?php the_permalink();?>" title="<?php  the_title();?>"><?php  the_title();?></a>
			</li>
				
							<?php $count++;
    endwhile
    ;



    endif;
wp_reset_postdata();
?>
		</ul>
	</div>
	 <?php
if (have_posts()) :
    ?>
					<?php
    while (have_posts()) :
        the_post();
        get_template_part('template-parts/post/excerpt', get_post_format());
    endwhile
    ;
 
    the_posts_pagination(array(
        'mid_size' => 10,
        'prev_text' => __('Previous page'),
        'next_text' => __('Next page'),
        'screen_reader_text' => __(' '),
        'type' => 'list'
    ));

else :
    // get_template_part('content', 'none');
    echo "敬请期待！！！";


endif;
?>


	</main>
		 <?php
get_template_part('template-parts/sidebar/sidebar_home');
?>

</div>

<?php get_footer(); ?>
