<?php
get_header();
?>

<div class="row">

	<main class="col-md-8 main-content">
	 <?php if ( have_posts() ) : ?>
					<?php
    while (have_posts()) :
        the_post();
        get_template_part('template-parts/post/content_single', get_post_format());
    endwhile
    ;
    
    ?>
 
    <?php
    $tags = wp_get_post_tags($post->ID);
    if (! empty($tags)) :
        echo "<div class='post-tags'><ul>";
        foreach ($tags as $tag) :
            ?>
    	<li class="post-tag"><a class="tags"  style="background-color: <?php echo randomColor();?>"  href="<?php echo get_tag_link($tag->term_id);?>" rel="bookmark"><?php echo $tag->name;?></a></li>
    	<?php
        
endforeach
        ;
        echo "</ul><div class='clear'></div><div>";
    
    endif;
    echo "<div class='previous_next_page'><ul>";
    if (get_previous_post()) {
        previous_post_link('<li>上一篇: %link</li>');
    }
    if (get_next_post()) {
        next_post_link('<li>下一篇: %link</li>');
    }
    echo "</ul></div>";
    
    // 相同类别的文章
    list_common_category_post();
    
    if (comments_open() || get_comments_number()) :
        comments_template();
    
    endif;
 else :
    get_template_part('content', 'none');
endif;
?>

	</main>
	 <?php
get_template_part('template-parts/sidebar/sidebar_single');
?>
</div>

<?php get_footer(); ?>
