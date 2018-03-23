<?php
get_header();
?>

<div class="row">
	 <?php
get_template_part('template-parts/sidebar/sidebar_home');
?>
	<main class="col-md-8 main-content">
	 <?php if ( have_posts() ) : ?>
					<?php
    while (have_posts()) :
        the_post();
        get_template_part('template-parts/post/content_home', get_post_format());
    endwhile
    ;
    the_posts_pagination(array(
        'prev_text' => __('Previous page'),
        'next_text' => __('Next page'),
        'before_page_number' => '<span class="meta-nav screen-reader-text">' . __('Page') . ' </span>'
    ));
 else :
    // get_template_part('content', 'none');
 echo "敬请期待！！！";

endif;
?>

	</main>

</div>

<?php get_footer(); ?>
