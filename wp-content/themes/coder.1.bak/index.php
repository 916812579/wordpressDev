<!-- 
  参考：
  http://www.xminseo.com/
  https://yusi123.com/
-->

<?php
get_header();
?>

<div class="col-md-8 main-content">
	 <?php if ( have_posts() ) : ?>
					<?php
    while (have_posts()) :
        the_post();
    // include 'modules/excerpt.php';
    get_template_part('template-parts/post/excerpt', get_post_format());
    endwhile
    ;
    
    the_posts_pagination(array(
        'mid_size' => 20,
        'prev_text' => __('Previous page'),
        'next_text' => __('Next page'),
        'screen_reader_text' => __(''),
        'type' => 'list'
    ));
 else :
    // get_template_part('content', 'none');
    echo "敬请期待！！！";


endif;
?>
</div>

<?php
get_template_part('template-parts/sidebar/sidebar_index');
?>



<?php get_footer(); ?>