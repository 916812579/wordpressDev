<?php
if (! function_exists('coder_setup')) :

    function coder_setup()
    {
        add_theme_support('automatic-feed-links');
        
        add_theme_support('title-tag');
        
        add_theme_support('custom-logo', array(
            'height' => 240,
            'width' => 240,
            'flex-height' => true
        ));
        
        add_theme_support('post-thumbnails');
        set_post_thumbnail_size(1200, 9999);
        
        // 注册菜单
        register_nav_menus(array(
            'top' => __('Top Menu')
        ));
        
        add_theme_support('html5', array(
            'search-form',
            'comment-form',
            'comment-list',
            'gallery',
            'caption'
        ));
        
        add_theme_support('post-formats', array(
            'aside',
            'image',
            'video',
            'quote',
            'link',
            'gallery',
            'status',
            'audio',
            'chat'
        ));
    }






endif;
add_action('after_setup_theme', 'coder_setup');

function check_user_role()
{
    global $current_user;
    if ($current_user->roles[0] == 'author') {
        echo 'The current user is an author';
    }
}

function check_user_isAdmin()
{
    return current_user_can('manage_options');
}

function list_common_category_post()
{
    $result = "<div class='common_category_post'>";
    $result .= "<h3 class='common_category_title'>同类文章</h3>";
    $category = get_the_category();
    $args = array(
        'cat' => $category[0]->term_id, // 分类ID
        'posts_per_page' => 15
    );
    query_posts($args);
    $result .= "<ul>";
    if (have_posts()) {
        while (have_posts()) {
            the_post();
            $result .= "<li><a href='";
            $result .= esc_url(apply_filters('the_permalink', get_permalink(0), 0));
            $result .= "'>";
            $result .= the_title("", "", false);
            $result .= "</a></li>";
        }
    }
    $result .= "</ul></div>";
    wp_reset_query();
    echo $result;
}

$VERSION = "2017-7-9";

/**
 * 输出css路径
 */
function get_css($path)
{
    global $VERSION;
    echo '<link type="text/css" rel="stylesheet"
        href="' . esc_url(get_template_directory_uri()) . $path  . '"></link>';
}

/**
 * 输出js路径
 */
function get_js($path)
{
    global $VERSION;
    echo '<script type="text/javascript" src="' . esc_url(get_template_directory_uri()) . $path . '?v=' . $VERSION . '"></script>';
}

function get_img($alt, $path)
{
    global $VERSION;
    echo '<img alt="' . $alt . '" src="' . esc_url(get_template_directory_uri()) . $path . '?v=' . $VERSION . '"/>';
}

/**
 * 获取文章摘要
 *
 * @param unknown $post            
 * @param number $excerpt_length            
 */
function get_post_excerpt()
{
    // echo mb_substr(the_content(), 0, 20, "utf-8");
    echo wp_trim_words(get_the_content(), 150);
}

/**
 * 处理文章发表时间的格式化
 */
function timeago()
{
    global $post;
    $date = $post->post_date;
    $time = get_post_time('G', true, $post);
    $time_diff = time() - $time;
    // 3天
    $max_diff_time = 3 * 24 * 60 * 60;
    if ($time_diff > 0 && $time_diff < $max_diff_time)
        $display = sprintf(__('%s前'), human_time_diff($time));
    else
        $display = date(get_option('date_format'), strtotime($date));
    return $display;
}
add_filter('the_time', 'timeago');

/**
 * 获取访问量最多的文章
 */
function get_hot_posts($limit)
{
    return new WP_Query(array(
        'post_type' =>  "post",
        'posts_per_page' => $limit,
        'orderby' => 'meta_value_num',
        'order' => 'desc',
        'meta_key' => 'views'
    ));
}

/**
 * 获取评论最多的文章
 */
function get_hot_comments_posts($limit)
{
    return new WP_Query(array(
        'post_type' => (empty($mode) || $mode === 'both') ? 'any' : "",
        'posts_per_page' => $limit,
        'orderby' => 'comment_count',
        'order' => 'desc'
    ));
}

/**
 * 获取赞的数量
 *
 * @param string $odc            
 * @return Ambigous <string, NULL>
 */
function wp_zan_count($odc = false)
{
    global $user_ID;
    get_currentuserinfo();
    
    $user_ID = $user_ID ? $user_ID : 0;
    $wpzan = new wpzan(get_the_ID(), $user_ID);
    
    echo $wpzan->zan_count;
}

/**
 * 返回随机颜色
 *
 * @return number
 */
function get_color()
{
    $colors = Array(
        "#1d898a"
    );
    return $colors[rand(1, count($colors)) - 1];
}

/**
 * 获取点赞最多的文章，但是不是按照点赞次数排序
 *
 * @param unknown $count            
 * @return WP_Query
 */
function get_hot_zan($count)
{
    global $wpdb;
    $arr = array();
    $posts = $wpdb->get_results($wpdb->prepare("SELECT a.* , count(1) cnt FROM $wpdb->posts as a join wp_zan as b on a.ID = b.post_id group by a.ID order by cnt desc limit 0, %d;", $count));
    foreach ($posts as $post) {
        $_post = sanitize_post($_post, 'raw');
        // wp_cache_add($_post->ID, $_post, 'posts');
        array_push($arr, $post);
    }
    return $arr;
}

/**
 * 处理彩色标签云
 */
function colorCloud($text) {
    $text = preg_replace_callback('|<a (.+?)>|i','colorCloudCallback', $text);
    return $text;
}
function colorCloudCallback($matches) {
    $text = $matches[1];
    $color = dechex(rand(1000000,16777215));
    $pattern = '/style=(\'|\”)(.*)(\'|\”)/i';
    $text = preg_replace($pattern, "style=\"background-color:#{$color};$2;\"", $text);
    return "<a $text>";
}
add_filter('wp_tag_cloud', 'colorCloud', 1);

/**
 * 返回随机颜色
 */
function randomColor() {
    return "#".dechex(rand(1000000,16777215));
}

/**
 * 获取文章的类别
 */
function getCat($post_id) {
    $cats = get_the_category($post->ID);
    foreach ($cats as $cat) {
        return $cat;
    }
}


/**
 * 赞class
 * @param string $odc
 */
function wp_zan_html_class(){
    global $user_ID;
    get_currentuserinfo();

    $user_ID = $user_ID ? $user_ID : 0;
    $wpzan = new wpzan(get_the_ID(), $user_ID);
    $class = $wpzan->is_zan() ? 'wp-zan zaned' : 'wp-zan';
    echo $class;
}


function wp_custom_zan($odc=false){
    global $user_ID;
    get_currentuserinfo();

    $user_ID = $user_ID ? $user_ID : 0;
    $wpzan = new wpzan(get_the_ID(), $user_ID);
    $class = $wpzan->is_zan() ? 'wp-zan zaned' : 'wp-zan';
    $userId = $wpzan->is_loggedin ? $wpzan->user_id : 0;
    $postId = $wpzan->post_id;
    
    $action = "wpzan($postId, $userId)";
    
    $btn_html = $odc ? '<a id="wp-zan-%d" class="%s" onclick="%s" href="javascript:;"><span>%d</span></a>' : '<a id="wp-zan-%d" class="%s" onclick="%s" href="javascript:;"><i class="fa fa-heart-o"></i>喜欢 (<span>%d</span>)</a>';
    $button = sprintf($btn_html, $postId, $class. " action zan", $action, $wpzan->zan_count);

    echo $button;
}

