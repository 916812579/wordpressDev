<div>
    <h3 class="h3_title">相关推荐</h3>
</div>
<?php
// 获取同类文章20篇
$cats = '';
$post_num = 20;
foreach (get_the_category() as $cat) $cats .= $cat->cat_ID . ',';
$args = array(
    'category__in' => explode(',', $cats), 'post__not_in' => explode(',', $exclude_id), 'caller_get_posts' => 1, 'orderby' => 'comment_date', 'posts_per_page' => $post_num
);
query_posts($args);
if (have_posts()) :
    echo '<div class="row relate_post">';
    $even = array();
    $odd = array();
    $count = 0;
    while (have_posts()) {
        the_post();
        global $post;
        if ($count % 2 == 0) {
            array_push($even, $post);
        } else {
            array_push($odd, $post);
        }
        $count++;
    }

    echo '<div class="col-xs-6">';
    echo '<ul class="list-group">';
    $count = 0;
    foreach ($even as $post) :
        ?>
        <li class="list-group-item"><span class="count_seq"><?php echo 2 * $count + 1; ?></span><a
                    title="<?php echo get_the_title($post); ?>"
                    data-toggle="tooltip"
                    data-placement="top"
                    href="<?php the_permalink($post); ?>"><?php echo $post->post_title; ?></a>
        </li>
        <?php
        $count++;
    endforeach;
    echo '</ul">';
    echo '</div>';
    echo '<div class="col-xs-6">';
    echo '<ul class="list-group">';
    $count = 1;
    foreach ($odd as $post) :
        ?>
        <li class="list-group-item"><span class="count_seq"><?php echo 2 * $count; ?></span><a
                    title="<?php echo get_the_title($post); ?>"
                    data-toggle="tooltip"
                    data-placement="top"
                    href="<?php the_permalink($post); ?>"><?php echo $post->post_title; ?></a>
        </li>
        <?php
        $count++;
    endforeach;
    echo '</ul">';
    echo '</div>';
    echo '</div>';
endif;
wp_reset_query();
?>


<?php
// 根据标签查找8篇文章
$exclude_id = $post->ID;
$posttags = get_the_tags();
$i = 0;
$limit = 8;
if ($posttags) {
    $tags = '';
    foreach ($posttags as $tag) $tags .= $tag->name . ',';
    $args = array('post_status' => 'publish', 'tag_slug__in' => explode(',', $tags), 'post__not_in' => explode(',', $exclude_id), 'caller_get_posts' => 1, 'orderby' => 'comment_date', 'posts_per_page' => $limit
    );
    query_posts($args);
    if (have_posts()) {
        echo '<div class="row relate_post">';
        $count = 0;
        while (have_posts()) {
            $count++;
            the_post();
            get_template_part('template-parts/post/relateExcerpt', get_post_format());
            if ($count % 4 == 0) {
                echo '<div class="clearfix"></div>';
            }
        };
        echo '</div>';
    }
    wp_reset_query();
}
?>
