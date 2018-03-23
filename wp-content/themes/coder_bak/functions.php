<?php


if ( ! function_exists( 'coder_setup' ) ) :
 
function coder_setup() {
 
	add_theme_support( 'automatic-feed-links' );
 
	add_theme_support( 'title-tag' );
 
	add_theme_support( 'custom-logo', array(
		'height'      => 240,
		'width'       => 240,
		'flex-height' => true,
	) );

 
	add_theme_support( 'post-thumbnails' );
	set_post_thumbnail_size( 1200, 9999 );
 
    // 注册菜单 
	register_nav_menus(array(
        'top' => __('Top Menu')
    ));

 
	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );

 
	add_theme_support( 'post-formats', array(
		'aside',
		'image',
		'video',
		'quote',
		'link',
		'gallery',
		'status',
		'audio',
		'chat',
	) );
}
endif;  
add_action( 'after_setup_theme', 'coder_setup' );


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
    $result .= "<div class='widget'><h4 class='title'>同类文章</h4></div>";
    $category = get_the_category();
    $args = array(
        'cat' => $category[0]->term_id, // 分类ID
        'posts_per_page' => 15
    );
    query_posts($args);
    if (have_posts()) {
        while (have_posts()) {
            the_post();
            $result .= "<div><a href='";
            $result .= esc_url( apply_filters( 'the_permalink', get_permalink( 0 ), 0 ) );
            $result .= "'>";
            $result .= the_title("", "", false);
            $result .= "</a></div>";
        }
    }
    $result .= "</div>";
    wp_reset_query();
    echo $result;
}
 
