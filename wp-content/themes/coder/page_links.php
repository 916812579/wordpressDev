<?php
get_header();
?>

<script>

function push_links() {
      window.location.href = window.location.href + "?sumit=1"
}

</script>

<div class="row">
         <?php
get_template_part('template-parts/sidebar/sidebar_home');
?>
        <main class="col-md-8 main-content">
                    <article id="60>" class="post">
                    <div class="post-head">
                        <h1 class="post-title">
                                本站所有文章链接
                        </h1>            
                    </div>
                    <div class="post-content">
                         <?php 
                           $args = array(
                               'posts_per_page' => 100000,
                               'post_status' => 'publish'
                           );
                           query_posts($args);
			   $filename = "/website/www/siteUrls/sitemap.txt";
                           if (file_exists($filename )) {
                              unlink($filename);
                           }
                           $file = fopen($filename, "aw");
                           while (have_posts()) : the_post();
                               echo "<a title='".$post->post_name."'  href='".get_permalink()."'>";
                               echo get_permalink();
                               echo "</a>";
                               echo '</br>';
							   fwrite($file, get_permalink()."\n");
                           endwhile;
						   fclose($file);
                        ?>
                
                    </div>

<?php
    echo "<button class='btn btn-default' id='push_links' onclick='push_links()'>提交链接到百度</button>";
?>
        
   </article>

        </main>

</div>

<?php get_footer(); ?>
