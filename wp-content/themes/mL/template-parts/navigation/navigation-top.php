<?php
/**
 * Displays top navigation
 */
?>

<nav class="navbar navbar-default">
    <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->

        <a class="navbar-brand logo"
           href="<?php echo esc_url(home_url('/')); ?>">猿乐园</a>


        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <?php
            wp_nav_menu(array(
                'container' => '',
                'theme_location' => 'top',
                'items_wrap' => '<ul id="%1$s" class=" nav navbar-nav %2$s nav-pills">%3$s</ul>'
            ));
            ?>
            <ul class="nav navbar-nav navbar-right">
                <?php if (is_user_logged_in()) {
                    global $current_user;
                    get_currentuserinfo();
                    $uid = $current_user->ID;
                    $u_name = get_user_meta($uid, 'nickname', true);
                    $write_article_url = esc_url(home_url('/')) . 'wp-admin/post-new.php';
                    echo '<li><a class="ab-item" href="' . $write_article_url . '"><i class="fa fa-pencil-square-o"></i>写文章</a></li>';
                    echo '<li>';
                    echo '<div class="dropdown-toggle">';
                    echo '<span class="dropdown-toggle"  id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">';
                    echo get_avatar($current_user->user_email, 28, deel_avatar_default(), "", null);
                    echo '</span>';
                    echo '<ul class="dropdown-menu" aria-labelledby="dropdownMenu1">';
                    echo '<li><a href="#">欢迎 ' . $u_name . '</a></li>';
                    echo '<li role="separator" class="divider"></li>';
                    if (check_user_isAdmin()) {
                        $control_url = esc_url(home_url('/')) . 'wp-admin/';
                        echo '<li><a class="ab-item" href="' . $control_url . '">控制台</a></li>';
                        echo '<li role="separator" class="divider"></li>';
                    }
                    echo '<li><a href="' . esc_url(wp_logout_url()) . '">' . '退出' . '</a></li>';
                    echo '</ul>';
                    echo '</div>';
                    echo '</li>';
                } else {
                    echo "<li><a href='" . get_bloginfo('url') . "/wp-login.php'>登录</a></li>";
                } ?>


            </ul>

            <ul class="nav navbar-nav navbar-right">
                <form class="navbar-form navbar-left"
                      action="<?php echo esc_url(home_url('/')); ?>">
                    <div class="form-group">
                        <input id="<?php echo $unique_id; ?>" class="form-control"
                               placeholder="请输入关键字" type="text"
                               value="<?php echo get_search_query(); ?>" name="s"/>
                    </div>
                    <button type="submit" class="btn btn-default">搜索</button>
                </form>
            </ul>
        </div>
    </div>
</nav>









