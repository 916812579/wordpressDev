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
    /**
     * the_posts_pagination(array(
     * 'prev_text' => __('Previous page'),
     * 'next_text' => __('Next page'),
     * 'before_page_number' => '<span class="meta-nav screen-reader-text">' .
     *
     *
     * __('Page') . ' </span>'
     * ));*
     */
    
    echo "<div class='previous_next_page'>";
    if (get_previous_post()) {
        previous_post_link('上一篇: %link');
    }
    echo "<br/>";
    if (get_next_post()) {
        next_post_link('下一篇: %link');
    }
    echo "</div>";
    
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
