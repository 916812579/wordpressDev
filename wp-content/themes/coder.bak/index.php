<?php
get_header();
?>

<div class="row">

	<main class="col-md-8 main-content">
	 <?php if ( have_posts() ) : ?>
					<?php
    while (have_posts()) :
        the_post();
        get_template_part('template-parts/post/content_home', get_post_format());
    endwhile
    ;
    the_posts_pagination(array(
        'mid_size'           => 20,
        'prev_text' => __('Previous page'),
        'next_text' => __('Next page'),
        'screen_reader_text' => __('')
    ));
 else :
    // get_template_part('content', 'none');
    echo "敬请期待！！！";


endif;
?>



	</main>
		 <?php
get_template_part('template-parts/sidebar/sidebar_index');
?>

</div>

<?php get_footer(); ?>
