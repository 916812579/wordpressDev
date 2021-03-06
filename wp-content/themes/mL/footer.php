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
            <li><?php echo get_option("zh_cn_l10n_icp_num"); ?></li>
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
//wp_footer();
//}
get_css("/css/animate.min.css");
get_css("/plugins/toastr/toastr.min.css");
get_js("/js/mL.js");

get_js("/plugins/toastr/toastr.min.js");
get_js("/js/zan.js");
get_js("/bootstrap-3.3.7/js/bootstrap.min.js");
get_js("/js/imageToBig.js");
get_js("/js/sosh-master/dist/sosh.min.js");

get_js("/js/login/js/modal.js");
get_js("/js/login/js/login.js");
get_js("/js/wow/wow.min.js");

?>

<script type="text/javascript">
    var ajax_sign_object = <?php echo ajax_sign_object(); ?>;
</script>

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
        $('[data-toggle="tooltip"]').tooltip();

        $(".dropdown-toggle").on("mouseover", function () {
            $(".dropdown-toggle").click();
        })
    });

</script>


<?php // 下面是登录框  ?>

<div class="modal fade" id="loginModal" style="display:none;">
    <div class="modal-dialog modal-sm" style="width:330px;">
        <div class="modal-content" style="border:none;">
            <!--            <div class="col-left"></div>-->
            <div class="col-right">
                <div class="modal-header">
                    <button type="button" id="login_close" class="close" data-dismiss="modal"><span
                                aria-hidden="true">×</span><span class="sr-only">Close</span></button>
                    <h4 class="modal-title" id="loginModalLabel" style="font-size: 18px;">登录</h4>
                </div>
                <div class="modal-body">
                    <section class="box-login v5-input-txt" id="box-login">
                        <form id="login_form" action="<?php echo esc_url(site_url('wp-login.php', 'login_post')); ?>"
                              method="post" autocomplete="off">

                            <ul>
                                <li class="form-group"><input class="form-control" id="log" maxlength="50"
                                                              name="log" placeholder="请输入邮箱账号/手机号" type="text"
                                                              autocomplete="off">
                                </li>
                                <li class="form-group"><input class="form-control" id="pwd" name="pwd"
                                                              placeholder="请输入密码" type="password" autocomplete="off">
                                </li>
                                <li><input type="hidden" id="security" name="security"
                                           value="<?php echo wp_create_nonce('security_nonce'); ?>"></li>
                            </ul>
                        </form>
                        <p class="good-tips marginB10"><a id="btnForgetpsw"
                                                          href="<?php echo esc_url(network_site_url('wp-login.php?action=lostpassword', 'login_post')); ?>"
                                                          class="fr">忘记密码？</a>
                            <?php
                            if (get_option('users_can_register')) :
                            ?>
                            <!--
                            还没有账号？<a
                                    href="javascript:;" target="_blank" id="btnRegister">立即注册</a></p>-->
                        <?php endif; ?>
                        <div class="login-box marginB10">
                            <input id="login_btn" type="submit" onclick="javascript:loginSubmit();" value="登录"
                                   class="btn btn-micv5 btn-block globalLogin"/>
                            <div id="login-form-tips" class="tips-error" style="display: none;">错误提示</div>
                        </div>
                        <div class="threeLogin">
                            <span>其他方式登录</span>
                            <a class="nqq" href="<?php global $core; echo $core->qq->get_profile_url(); ?>"></a>
                            <!--
                            <a class="nwx" href="<?php global $core; echo $core->wechat->get_profile_url(); ?>"></a>
                            -->
                        </div>
                    </section>
                </div>
            </div>
        </div>
    </div>
</div>
<?php // 登录框结束  ?>
<script type="application/javascript">
    wow = new WOW(
        {
            animateClass: 'animated',
            callback:     function(box) {
                console.log("WOW: animating <" + box.tagName.toLowerCase() + ">");
            }
        }
    );
    wow.init();
</script>
</body>
</html>
