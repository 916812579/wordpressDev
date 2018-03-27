<?php
$count = 0;
while (have_posts()) : the_post();
    $count++;
    ?>
    <?php
    get_template_part('template-parts/post/excerpt', get_post_format());
    if ($count % 2 == 0) {
        echo '<div class="clearfix"></div>';
    }
endwhile;
wp_reset_query(); ?>