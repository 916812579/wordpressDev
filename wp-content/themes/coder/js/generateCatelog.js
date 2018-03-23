/**
 * js 生成博客目录，依赖Jquery
 * @param title 目录名称，默认为 阅读目录
 * @param classOrId 指定生成目录的元素的class或者Id, 不能为空
 * @param parentClassOrId 目录插入到哪个元素的class或者id
 * @param level 指定生成多少级目录，默认3级，最多不能超过6级
 */
 function generateCatelog(classOrId, level, parentClassOrId,  title)
 {
     var target = $('#' + classOrId);
     if (!target || target.length == 0) {
    	 target = $('.' + classOrId);
     }
     // 如果没有则不再继续查找
     if (!target || target.length == 0) {
    	 return;
     }
     if (!title) {
    	 title = "阅读目录"
     }
     
     if (!parentClassOrId) {
    	 parentClassOrId = classOrId;
     }
     
     var parent = $("#" + parentClassOrId);
     if (!parent || parent.length == 0) {
    	 parent = $("." + parentClassOrId);
     }
     
     if (!level || level <= 0) {
    	 level = 3;
     }
     if (level > 6) {
    	 level = 6;
     }
     
     // 具体生成目录
     var levels = generateLevel(target, level, "")
     if (levels) { 
        var title = "<h1 class='catelog_title'>" + title + "</h1>";
        var div = $("<div class='div_category'></div>");
        div.prepend(levels);
        div.prepend(title);
        parent.prepend(div);
     }
 }
 
 function generateLevel (target, maxLevel, current) {
	 if (!target || target.length == 0 || !maxLevel || maxLevel > 6 || current > maxLevel) {
		 return;
	 }
	 if (!current) {
		 current = 1; 
	 }
	 var children = target.children("h" + current);
	 if (!children || children.length == 0) {
		 return;
	 }
	 var result = '<ul class="ul_category ul_category_' + current + '">';
	 var allChildren = target.children();
	 for (var i = 0; i < children.length; i++) {
		 var child = $(children[i]);
		 var text = child.text();
		 var name = "category_" + current + "_" + i;
		 var prefix = "" + (i + 1);
		 result += '<li class="h_' + current + '"><a href="#' + name + '">' + prefix + "&nbsp;" + text + '</a>';
		 var ha = "<a name='" + name + "'>" + text +  "</a>";
		 child.html(ha);
		 var util;
		 if (i + 1 == children.length) {
			 util = $(allChildren[allChildren.length - 1]);
		 } else {
			 util = $(children[i + 1]);
		 }
		 var next = nextLevel(child, util, maxLevel, current + 1, $(allChildren[allChildren.length - 1]), prefix + ".");
		 result += next;
	 }
	 result += '</ul></li>';
	 return result;
 }
 
 function nextLevel(target, util, maxLevel, current, lastEle, prefix) {
	 var nextEles = target.nextUntil(util, "h" + current);
	 if (nextEles.length == 0) {
		 return "";
	 }
	 var result = '<ul class="ul_category_' + current + '">';
	 for (var i = 0; i < nextEles.length; i++) {
		 var next = $(nextEles[i]);
		 var text = next.text();
		 prefix += i + 1;
		 var name = "category_" + current + "_" + i;
		 result += '<li class="h_' + current + '"><a href="#' + name + '">' + prefix + "&nbsp;" + text + '</a></li>';
		 var ha = "<a name='" + name + "'>" + prefix + "&nbsp;" + text +  "</a>";
		 next.html(ha);
		 var nextUtil;
		 if (i + 1 == nextEles.length) {
                    if (util) {
                        nextUtil = util;
                    } else {
                        nextUtil = lastEle;
                    }
		 } else {
                    nextUtil = nextEles[i + 1];
                 }
		 result += nextLevel(next, nextUtil, maxLevel, current + 1, lastEle, prefix + ".");
	 }
	 result += '</ul>';
	 return result;
 }
 
 generateCatelog("post-content");
