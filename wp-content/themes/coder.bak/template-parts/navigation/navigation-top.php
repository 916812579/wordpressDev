<?php
/**
 * Displays top navigation
 */
?>
<nav id="main-navigation" class="main-navigation">

	<div class="menu-container content-width">

		<div class="menu-container-subs menu-container-logo">
			<a href="<?php bloginfo("url")?>">
         <?php
        echo get_img("logo", "/images/logo.png");
        ?>
      
      </a>
		</div>

		<div class="menu-container-subs menu-container-menus">
    	<?php
    wp_nav_menu(array(
        'container' => '',
        'theme_location' => 'top',
        'items_wrap' => '<ul id="%1$s" class="%2$s coder-menu">%3$s</ul>'
    ));
    ?>
    
		</div>

		<div class="menu-container-subs col-lg-3 col-md-5 pull-right search">
			<form action="<?php echo esc_url( home_url( '/' ) ); ?>"
				class="search-form form-inline">
				<div class="form-group">
					<input id="<?php echo $unique_id; ?>" class="form-control"
						placeholder="请输入关键字" type="text"
						value="<?php echo get_search_query(); ?>" name="s">
				</div>
				<button class="btn btn-danger" type="submit">
					<i class="fa fa-search" aria-hidden="true"></i>
				</button>
			</form>
		</div>
	</div>




</nav>

<div class="clear"></div>

<!-- #site-navigation -->
