#!/bin/bash
curl http://www.hemingliang.site/zhan_dian_suo_you_lian_jie 1>/dev/null 2>&1
curl -H 'Content-Type:text/plain' --data-binary @/website/www/siteUrls/sitemap.txt "http://data.zz.baidu.com/urls?site=www.hemingliang.site&token=WuPALXXsXZi229PK"
echo ""
echo `date "+%Y-%m-%d %H:%M:%S"`
echo "push over"
