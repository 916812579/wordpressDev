<?php
?>

</section>
<!-- #content -->

<ul id="scroll">
	<li><a class="scroll-h" title="返回顶部"><i class="fa fa-angle-up"></i></a></li>
	<li><a class="scroll-b" title="转到底部"><i class="fa fa-angle-down"></i></a></li>
</ul>

<?php

if (is_single()) {
    echo '<script
        src="' . esc_url(get_template_directory_uri()) . '/js/generateCatelog.js"' . '></script>';
    
    echo '<script
        src="' . esc_url(get_template_directory_uri()) . '/js/highlightText.js"' . '></script>';
}

?>


<footer class="main-footer">
	<!--  
	<div class="container">
		<div class="row">
			<div class="col-sm-4">
				<div class="widget">
					<h4 class="title">最新文章</h4>
					<div class="content recent-post">
						<div class="recent-single-post">
							<a href="/moving-to-node-js-v4-lts/" class="post-title">Node.js
								v4 LTS 成为 Ghost 推荐版本</a>
							<div class="date">2016年7月26日</div>
						</div>
						<div class="recent-single-post">
							<a
								href="/ghost-zhuo-mian-ban-app-geng-xin-neng-gou-tong-shi-guan-li-duo-ge-ghost-bo-ke/"
								class="post-title">Ghost 桌面版 APP 正式发布，能同时管理多个 Ghost 博客</a>
							<div class="date">2016年4月28日</div>
						</div>
						<div class="recent-single-post">
							<a href="/install-nodejs-of-latest-version-in-ubuntu-and-debian/"
								class="post-title">为 Ubuntu 和 Debian 安装最新版本的 Node.js</a>
							<div class="date">2016年3月23日</div>
						</div>
					</div>
				</div>
			</div>

			<div class="col-sm-4">
				<div class="widget">
					<h4 class="title">标签云</h4>
					<div class="content tag-cloud">
						<a href="/tag/about-ghost/">Ghost</a> <a href="/tag/release/">新版本发布</a>
						<a href="/tag/javascript/">JavaScript</a> <a href="/tag/promise/">Promise</a>
						<a href="/tag/zhuti/">主题</a> <a href="/tag/nodejs/">Node.js</a> <a
							href="/tag/mysql/">MySQL</a> <a href="/tag/nginx/">Nginx</a> <a
							href="/tag/aliyun-ecs/">阿里云服务器</a> <a href="/tag/ubuntu/">Ubuntu</a>
						<a href="/tag/ghost-in-depth/">深度玩转 Ghost</a> <a
							href="/tag/theme/">Theme</a> <a href="/tag/markdown/">Markdown</a>
						<a href="/tag/proxy/">反向代理</a> <a href="/tag/apache/">Apache</a> <a
							href="/tag-cloud/">...</a>
					</div>
				</div>
			</div>

			<div class="col-sm-4">
				<div class="widget">
					<h4 class="title">合作伙伴</h4>
					<div class="content tag-cloud friend-links">
						<a href="http://www.bootcss.com" title="Bootstrap中文网"
							onclick="_hmt.push(['_trackEvent', 'link', 'click', 'bootcsscom'])"
							target="_blank">Bootstrap中文网</a> <a href="http://www.bootcdn.cn"
							title="开放CDN服务"
							onclick="_hmt.push(['_trackEvent', 'link', 'click', 'bootcdncn'])"
							target="_blank">开放CDN服务</a> <a href="http://www.gruntjs.net"
							title="Grunt中文网"
							onclick="_hmt.push(['_trackEvent', 'link', 'click', 'gruntjsnet'])"
							target="_blank">Grunt中文网</a> <a href="http://www.gulpjs.com.cn/"
							title="Gulp中文网"
							onclick="_hmt.push(['_trackEvent', 'link', 'click', 'gulpjscomcn'])"
							target="_blank">Gulp中文网</a>
						<hr>
						<a href="http://lodashjs.com/" title="Lodash中文文档"
							onclick="_hmt.push(['_trackEvent', 'link', 'click', 'lodashjscom'])"
							target="_blank">Lodash中文文档</a> <a
							href="http://www.jquery123.com/" title="jQuery中文文档"
							onclick="_hmt.push(['_trackEvent', 'link', 'click', 'jquery123com'])"
							target="_blank">jQuery中文文档</a>
						<hr>
						<a href="http://www.aliyun.com/" title="阿里云"
							onclick="_hmt.push(['_trackEvent', 'link', 'click', 'aliyun'])"
							target="_blank">阿里云</a>
						<hr>
						<a href="https://www.upyun.com/" title="又拍云"
							onclick="_hmt.push(['_trackEvent', 'link', 'click', 'upyun'])"
							target="_blank">又拍云</a> <a href="http://www.qiniu.com/"
							title="七牛云存储"
							onclick="_hmt.push(['_trackEvent', 'link', 'click', 'qiniu'])"
							target="_blank">七牛云存储</a>
					</div>
				</div>
			</div>
		</div>
	</div> -->
</footer>
<div class="copyright">
	<div class="container">
		<div class="row">
			<div class="col-sm-12">
				<span>Copyright © <a href="<?php bloginfo('url')?>"><?php bloginfo("name")?></a></span>
				| <span><a href="https://wordpress.org/" target="_blank">Wordpress</a></span>
				| <span><a href="https://www.aliyun.com/" target="_blank">阿里云</a></span>

				| <span>粤ICP备17069513号</span>

                                | <span><a href="http://webscan.360.cn/index/checkwebsite/url/www.hemingliang.site"><img border="0" src="http://img.webscan.360.cn/status/pai/hash/7361f5d1c0d13dc99e81fcf029db0292/?size=74x27"/></a></span>
			</div>
		</div>
	</div>
</div>
<?php
if (check_user_isAdmin()) {
    wp_footer();
}
get_css("/plugins/toastr/toastr.min.css");
get_js("/js/jQuery.textSlider.js");
get_js("/js/coder.js");
get_js("/js/zan.js");
get_js("/plugins/toastr/toastr.min.js");
?>


<script type="text/javascript">
		SyntaxHighlighter.defaults['toolbar'] = false;  //去掉右上角问号图标
		SyntaxHighlighter.config.tagName = 'pre';       //可以更改解析的默认Tag。
		SyntaxHighlighter.config.bloggerMode = true; 
		SyntaxHighlighter.config.stripBrs = true;  
		SyntaxHighlighter.all();
</script>

</body>
</html>
