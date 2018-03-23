<?php
/**
 * Displays top navigation
 */
?>

<nav class="navbar navbar-inverse">
	<div class="container">
		<!-- Brand and toggle get grouped for better mobile display -->
		<div class="navbar-header">
			<button type="button" class="navbar-toggle collapsed"
				data-toggle="collapse" data-target="#bs-example-navbar-collapse-1"
				aria-expanded="false">
				<span class="sr-only">Toggle navigation</span> <span
					class="icon-bar"></span> <span class="icon-bar"></span> <span
					class="icon-bar"></span>
			</button>
			<a class="navbar-brand"
				href="<?php echo esc_url( home_url( '/' ) ); ?>">猿乐园</a>
		</div>

		<div class="collapse navbar-collapse"
			id="bs-example-navbar-collapse-1">
			<!--
			<ul class="nav navbar-nav">
				<li class="active"><a href="#">Link <span class="sr-only">(current)</span></a></li>
				<li><a href="#">Link</a></li>
			</ul>   -->
<?php
wp_nav_menu(array(
    'container' => '',
    'theme_location' => 'top',
    'items_wrap' => '<ul id="%1$s" class=" nav navbar-nav %2$s">%3$s</ul>'
));
?> <ul class="nav navbar-nav navbar-right">
				<?php if(is_user_logged_in()){
				    global $current_user;
				    get_currentuserinfo();
				    $uid = $current_user->ID;
				    $u_name = get_user_meta($uid,'nickname',true);
				    echo '<li><a href="#">欢迎 '.$u_name.'</a></li>';
				    echo '<li><a href="' . esc_url( wp_logout_url() ) . '">' . '退出' . '</a></li>';
				} else{
				    echo  "<li><a href='" . get_bloginfo('url') . "/wp-login.php'>登录</a></li>"; 
				} ?>
 

			</ul>

			<ul class="nav navbar-nav navbar-right">
				<form class="navbar-form navbar-left"
					action="<?php echo esc_url( home_url( '/' ) ); ?>">
					<div class="form-group">
						<input id="<?php echo $unique_id; ?>" class="form-control"
							placeholder="请输入关键字" type="text"
							value="<?php echo get_search_query(); ?>" name="s" />
					</div>
					<button type="submit" class="btn btn-default">搜索</button>
				</form>
			</ul>


		</div>
	</div>
</nav>









