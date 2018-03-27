<? php ?>
</section>
<div class="rollto">
    <button class="btn btn-inverse" data-type="totop" title="回顶部">
        <i class="fa fa-arrow-up"></i>
    </button>
</div>

<footer class="main-footer">
    <div class="copyright">
        <ul class="list-inline text-center">
            <li>粤ICP备17069513号</li>
            <li>Copyright © <a href="<?php bloginfo('url') ?>"><?php bloginfo("name") ?></a></li>
            <li><a href="https://wordpress.org/" target="_blank">Wordpress</a></li>
            <li><a href="https://www.aliyun.com/" target="_blank">阿里云</a></li>
        </ul>
    </div>
    </div>
</footer>
<?php
// 屏蔽管理栏
//if (check_user_isAdmin()) {
    wp_footer();
//}
get_css("/css/animate.min.css");
get_css("/plugins/toastr/toastr.min.css");
// get_js("/js/jQuery.textSlider.js");
get_js("/js/coder.js");

get_js("/plugins/toastr/toastr.min.js");
get_js("/js/zan.js");
get_js("/bootstrap-3.3.7/js/bootstrap.min.js");
get_js("/js/imageToBig.js");
get_js("/js/sosh-master/dist/sosh.min.js");

?>

<link rel="stylesheet"
      href="//cdnjs.cloudflare.com/ajax/libs/highlight.js/9.12.0/styles/monokai-sublime.min.css">
<script src="//cdnjs.cloudflare.com/ajax/libs/highlight.js/9.12.0/highlight.min.js"></script>

<?php

if (is_single()) {
    echo '<script
        src="' . esc_url(get_template_directory_uri()) . '/js/generateCatelog.js"' . '></script>';

    echo '<script
        src="' . esc_url(get_template_directory_uri()) . '/js/highlightText.js"' . '></script>';
}

?>
<script>

    $(document).ready(function () {
        $('pre, code').each(function (i, block) {
            hljs.highlightBlock(block);
        });
    });

    $(function () {
        $('[data-toggle="tooltip"]').tooltip()

    })

</script>
</body>
</html>
