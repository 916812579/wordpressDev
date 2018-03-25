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

function dopt($e){
    return stripslashes(get_option($e));
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
        href="' . esc_url(get_template_directory_uri()) . $path . '"></link>';
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
 /*
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
*/

function timeago( $ptime ) {
    $ptime = strtotime($ptime);
    $etime = time() - $ptime;
    if($etime < 1) return '刚刚';
    $interval = array (
        12 * 30 * 24 * 60 * 60  =>  '年前 ('.date('Y-m-d', $ptime).')',
        30 * 24 * 60 * 60       =>  '个月前 ('.date('m-d', $ptime).')',
        7 * 24 * 60 * 60        =>  '周前 ('.date('m-d', $ptime).')',
        24 * 60 * 60            =>  '天前',
        60 * 60                 =>  '小时前',
        60                      =>  '分钟前',
        1                       =>  '秒前'
    );
    foreach ($interval as $secs => $str) {
        $d = $etime / $secs;
        if ($d >= 1) {
            $r = round($d);
            return $r . $str;
        }
    };
}
add_filter('the_time', 'timeago');

/**
 * 获取访问量最多的文章
 */
function get_hot_posts($limit)
{
    return new WP_Query(array(
        'post_type' => "post",
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
function colorCloud($text)
{
    $text = preg_replace_callback('|<a (.+?)>|i', 'colorCloudCallback', $text);
    return $text;
}

function colorCloudCallback($matches)
{
    $text = $matches[1];
    $color = dechex(rand(1000000, 16777215));
    $pattern = '/style=(\'|\”)(.*)(\'|\”)/i';
    $text = preg_replace($pattern, "style=\"background-color:#{$color};$2;\"", $text);
    return "<a $text>";
}
add_filter('wp_tag_cloud', 'colorCloud', 1);

/**
 * 返回随机颜色
 */
function randomColor()
{
    return "#" . dechex(rand(1000000, 16777215));
}

/**
 * 获取文章的类别
 */
function getCat($post_id)
{
    $cats = get_the_category($post->ID);
    foreach ($cats as $cat) {
        return $cat;
    }
}

/**
 * 赞class
 * 
 * @param string $odc            
 */
function wp_zan_html_class()
{
    global $user_ID;
    get_currentuserinfo();
    
    $user_ID = $user_ID ? $user_ID : 0;
    $wpzan = new wpzan(get_the_ID(), $user_ID);
    $class = $wpzan->is_zan() ? 'wp-zan zaned' : 'wp-zan';
    echo $class;
}

function wp_custom_zan($odc = false)
{
    global $user_ID;
    get_currentuserinfo();
    
    $user_ID = $user_ID ? $user_ID : 0;
    $wpzan = new wpzan(get_the_ID(), $user_ID);
    $class = $wpzan->is_zan() ? 'wp-zan zaned' : 'wp-zan';
    $userId = $wpzan->is_loggedin ? $wpzan->user_id : 0;
    $postId = $wpzan->post_id;
    
    $action = "wpzan($postId, $userId)";
    
    $btn_html = $odc ? '<a id="wp-zan-%d" class="%s addLike" onclick="%s" href="javascript:;"><span>%d</span></a>' : '<a id="wp-zan-%d" class="%s addLike" onclick="%s" href="javascript:;"><i class="fa fa-heart-o"></i>喜欢 (<span>%d</span>)</a>';
    $button = sprintf($btn_html, $postId, $class . " action zan", $action, $wpzan->zan_count);
    
    echo $button;
}


//移除菜单的多余CSS选择器
/**
add_filter('nav_menu_css_class', 'my_css_attributes_filter', 100, 1);
add_filter('nav_menu_item_id', 'my_css_attributes_filter', 100, 1);
add_filter('page_css_class', 'my_css_attributes_filter', 100, 1);
function my_css_attributes_filter($var) {
	return is_array($var) ? array() : '';
}
**/

// 给菜单添加某些class属性
function yly_special_nav_class($classes, $item){
    if( in_array('current-menu-item', $classes) || in_array('current-menu-ancestor', $classes) || in_array('current-post-parent', $classes) || in_array('current-post-ancestor', $classes)){
        $classes[] = 'active ';
    }
    return $classes;
}
add_filter('nav_menu_css_class' , 'yly_special_nav_class' , 10 , 2);


//输出缩略图地址
function post_thumbnail_src(){
    global $post;
    if( $values = get_post_custom_values("thumb") ) {	//输出自定义域图片地址
        $values = get_post_custom_values("thumb");
        $post_thumbnail_src = $values [0];
    } elseif( has_post_thumbnail() ){    //如果有特色缩略图，则输出缩略图地址
        $thumbnail_src = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID),'full');
        $post_thumbnail_src = $thumbnail_src [0];
    } else {
        $post_thumbnail_src = '';
        ob_start();
        ob_end_clean();
        $output = preg_match_all('/<img.+src=[\'"]([^\'"]+)[\'"].*>/i', $post->post_content, $matches);
        $post_thumbnail_src = $matches [1] [0];   //获取该图片 src
        if(empty($post_thumbnail_src)){	//如果日志中没有图片，则显示随机图片
            $random = mt_rand(1, 10);
            echo get_bloginfo('template_url');
            echo '/img/pic/'.$random.'.jpg';
            //如果日志中没有图片，则显示默认图片
            //echo '/img/thumbnail.png';
        }
    };
    echo $post_thumbnail_src;
}


function deel_views($after=''){
    global $post;
    $post_ID = $post->ID;
    $views = (int)get_post_meta($post_ID, 'views', true);
    echo $views, $after;
}

function deel_avatar_default(){
    return get_bloginfo('template_directory').'/imgages/default_user.png';
}

//自动勾选
function deel_add_checkbox() {
    echo '<label for="comment_mail_notify" class="checkbox inline" style="padding-top:0"><input type="checkbox" name="comment_mail_notify" id="comment_mail_notify" value="comment_mail_notify" checked="checked"/>有人回复时邮件通知我</label>';
}

//评论样式
function deel_comment_list($comment, $args, $depth) {
    echo '<li '; comment_class(); echo ' id="comment-'.get_comment_ID().'">';

    //头像
    echo '<div class="c-avatar">';
    echo get_avatar( $comment->comment_author_email, $size = '54' , deel_avatar_default()); //str_replace(' src=', ' data-original=', get_avatar( $comment->comment_author_email, $size = '32' , deel_avatar_default()));
    //内容
    echo '<div class="c-main" id="div-comment-'.get_comment_ID().'">';
    
    if ($comment->comment_approved == '0'){
        echo '<span class="c-approved">您的评论正在排队审核中，请稍后！</span><br />';
    }
    //信息
    echo '<div class="c-meta">';
    echo '<span class="c-author">'.get_comment_author_link().'</span>';
    
    if ($comment -> comment_parent > 0) {
        echo "回复: ";
    } else {
        echo "说: ";
    }
    
    echo "<br/>";
    
    echo '<div class="c_content">' . str_replace(' src=', ' data-original=', convert_smilies(get_comment_text())) . '</div>';
    echo get_comment_time('Y-m-d H:i '); echo time_ago();
    if ($comment->comment_approved !== '0'){
        echo comment_reply_link( array_merge( $args, array('add_below' => 'div-comment', 'depth' => $depth, 'max_depth' => $args['max_depth']) ) );
        // echo edit_comment_link(__('(编辑)'),' - ','');
    }
    echo '</div>';
    echo '</div></div>';
}

//时间显示方式‘xx以前’
function time_ago( $type = 'commennt', $day = 7 ) {
    $d = $type == 'post' ? 'get_post_time' : 'get_comment_time';
    if (time() - $d('U') > 60*60*24*$day) return;
    echo ' (', human_time_diff($d('U'), strtotime(current_time('mysql', 0))), '前)';
}


if ( ! function_exists( 'deel_paging' ) ) :
function deel_paging() {
    $p = 4;
    if ( is_singular() ) return;
    global $wp_query, $paged;
    $max_page = $wp_query->max_num_pages;
    if ( $max_page == 1 ) return;
    echo '<div class="pagination"><ul>';
    if ( empty( $paged ) ) $paged = 1;
    // echo '<span class="pages">Page: ' . $paged . ' of ' . $max_page . ' </span> ';
    echo '<li class="prev-page">'; previous_posts_link('上一页'); echo '</li>';

    if ( $paged > $p + 1 ) p_link( 1, '<li>第一页</li>' );
    if ( $paged > $p + 2 ) echo "<li><span>···</span></li>";
    for( $i = $paged - $p; $i <= $paged + $p; $i++ ) {
        if ( $i > 0 && $i <= $max_page ) $i == $paged ? print "<li class=\"active\"><span>{$i}</span></li>" : p_link( $i );
    }
    if ( $paged < $max_page - $p - 1 ) echo "<li><span> ... </span></li>";
    //if ( $paged < $max_page - $p ) p_link( $max_page, '&raquo;' );
    echo '<li class="next-page">'; next_posts_link('下一页'); echo '</li>';
    // echo '<li><span>共 '.$max_page.' 页</span></li>';
    echo '</ul></div>';
}
function p_link( $i, $title = '' ) {
    if ( $title == '' ) $title = "第 {$i} 页";
    echo "<li><a href='", esc_html( get_pagenum_link( $i ) ), "'>{$i}</a></li>";
}
endif;


function subStrTitle ($post = 0, $maxLen = 15) {
    $title = get_the_title($post);
    $len = mb_strlen($title, 'utf8');
    if ( $len == 0 )
        return;
    if ($len > $maxLen) {
        $title = mb_substr($title, 0, $maxLen - 1, 'utf8') . '...';
    }
    echo $title;
}

?>
