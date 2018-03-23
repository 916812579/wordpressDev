=== Plugin Name ===
Contributors: xiaole_tao
Donate link: http://xiaole.happylive.org/wp_cha_jian/
Tags: pinyin, permalink, friendly
Requires at least: 2.0.2
Tested up to: 3.3.1
Stable tag: /trunk/

Generate friendly Pinyin permalink for chinese title
为中文标题生成友好的拼音链接

== Description ==

1. 本插件兼容 Wordpress 英文友好 permalink；
2. 插件仅对标题中的中文字符进行友好转换，字典范围为 GB2312 全码表约7000个汉字；
3. 使用分词符连接拼音便于人眼分辨；
4. 非码表汉字会被忽略，如果标题里使用了特别的繁体汉字，可能需要手动为这些汉字添加拼音。
5. WP3.31 前的版本，如果选择“- 减号”做连接符，将会影响小工具 Widget 设置。请先关闭插件，设置好小工具后再开启。
6. 由于本插件需对汉字起作用，所以用户都能正常阅读汉字。故取消了双语说明。

== Installation ==

1. 在 Wordpress 的'添加新插件' 页里搜索 'Pinyin Permalink'
2. 选择 '安装插件'，然后再选择 '启用插件'

或者

1. 下载并解压 'pinyin-permalink' 压缩包到 '/wp-content/plugins/' 目录下
2. 在 Wordpress 的 '插件' 菜单项里启用

== Frequently Asked Questions ==

暂时没有FAQ

== Screenshots ==

1. '/thunk/screenshot-1.png'
2. '/thunk/screenshot-2.png'

== Changelog ==

= 2.1 =
* 修复设置页面一处小错误。

= 2.0 =
* 增加设置页面，可以对插件进行一些配置。

= 1.2 =
* 修复BUG: WP过滤器在小工具页面也工作了，为了避免影响小工具设置不再自动修改标题里的"-"

= 1.1 =
* 将翻译字符集扩展至整个 GB2312 码表范围大约包括 7000 个汉字

= 1.0 =
* 第一版
* 可以翻译 GB2312 的一级汉字约 3750 个

== Upgrade Notice ==

如果您想修改连字符号和拼音词长，请升级后在设置项目里配置插件。
重新生成所有链接工具，将在下一版本提供。
