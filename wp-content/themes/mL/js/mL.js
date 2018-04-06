$body = (window.opera) ? (document.compatMode == "CSS1Compat" ? $("html") : $("body")) : $("html,body");
$cancel = $("#cancel-comment-reply-link");
cancel_text = $cancel.text();
var addComment = {
    moveForm: function (commId, parentId, respondId, postId, num) {
        var t = document,

            div, comm = t.getElementById(commId),
            respond = t.getElementById(respondId),
            cancel = t.getElementById("cancel-comment-reply-link"),
            parent = t.getElementById("comment_parent"),
            post = t.getElementById("comment_post_ID");
        num ? (t.getElementById("comment").value = comm_array[num], edit = t.getElementById("new_comm_" + num).innerHTML.match(/(comment-)(\d+)/)[2], $new_sucs = $("#success_" + num), $new_sucs.hide(), $new_comm = $("#new_comm_" + num), $new_comm.hide(), $cancel.text(cancel_edit)) : $cancel.text(cancel_text);
        t.respondId = respondId;
        postId = postId || false;
        if (!t.getElementById("wp-temp-form-div")) {
            div = document.createElement("div");
            div.id = "wp-temp-form-div";
            div.style.display = "none";
            respond.parentNode.insertBefore(div, respond)
        }
        !comm ? (temp = t.getElementById("wp-temp-form-div"), t.getElementById("comment_parent").value = "0", temp.parentNode.insertBefore(respond, temp), temp.parentNode.removeChild(temp)) : comm.parentNode.insertBefore(respond, comm.nextSibling);
        $body.animate({
                scrollTop: $("#respond").offset().top - 180
            },
            400);
        if (post && postId) {
            post.value = postId
        }
        parent.value = parentId;
        cancel.style.display = "";
        var parent = $("#" + commId);
        var author = $(".c-author", parent).text();
        $("#reply-label").text("回复 " + author);
        cancel.onclick = function () {
            $("#reply-label").text("发表我的评论");
            temp = t.getElementById("wp-temp-form-div"),
                respond = t.getElementById(t.respondId);
            t.getElementById("comment_parent").value = "0";
            if (temp && respond) {
                temp.parentNode.insertBefore(respond, temp);
                temp.parentNode.removeChild(temp)
            }
            this.style.display = "none";
            this.onclick = null;
            return false
        };
        try {
            t.getElementById("comment").focus()
        } catch (e) {
        }
        return false
    },
    I: function (e) {
        return document.getElementById(e)
    }
}

$(document).on("click",
    function (e) {
        e = e || window.event;
        var target = e.target || e.srcElement,
            _ta = $(target);
        if (_ta.hasClass("disabled")) {
            return
        }
        if (_ta.parent().attr("data-type")) {
            _ta = $(_ta.parent()[0])
        }
        if (_ta.parent().parent().attr("data-type")) {
            _ta = $(_ta.parent().parent()[0])
        }
        var type = _ta.attr("data-type");
        switch (type) {
            case "screen-nav":
                var el = $(".navbar .nav"),
                    so = $(".navbar .nav");
                el.toggleClass("active");
                so.slideToggle(300);
                break;
            case "totop":
                //         scrollTo();
                break;
            case "torespond":
                scrollTo("#comment-ad");
                $("#comment").focus();
                var name = document.getElementsByName("message");
                name[0].focus();
            case "comment-insert-smilie":
                if (!$("#comment-smilies").length) {
                    $("#commentform .comt-box").append('<div id="comment-smilies" class="hide"></div>');
                    var res = "";
                    for (key in options.smilies) {
                        res += '<img data-simle="' + key + '" data-type="comment-smilie" src="' + _deel.url + "/img/smilies/icon_" + options.smilies[key] + '.gif">'
                    }
                    $("#comment-smilies").html(res)
                }
                $("#comment-smilies").slideToggle(100);
                break;
            case "comment-smilie":
                grin(_ta.attr("data-simle"));
                _ta.parent().slideUp(300);
                break;
            case "switch-author":
                $(".comt-comterinfo").slideToggle(300);
                $("#author").focus();
                break
        }
    });

$("#submit").click(function () {

    if (!$("#comment").val().trim()) {
        $("#comment").focus();
        $("#comt-error-tips").html("评论内容不能为空");
        return false;
    }

    if ($("#author").length > 0 && ($("#author").val() == "" || $("#email").val() == "")) {
        $("#author").focus();
        $("#comt-error-tips").html("昵称和邮箱不能为空");
        return false;
    }
    $("#comt-error-tips").html("");

    var emailReg = /^[A-Za-z0-9\u4e00-\u9fa5]+@[a-zA-Z0-9_-]+(\.[a-zA-Z0-9_-]+)+$/;
    if ($("#author").length > 0 && !emailReg.test($("#email").val())) {
        $("#comt-error-tips").html("邮箱格式不正确");
        return false;
    }

    txt1 = '<div class="comt-tip comt-loading">正在提交, 请稍候...</div>',
        txt2 = '<div class="comt-tip comt-error">#</div>',
        txt3 = '">提交成功',
        cancel_edit = "取消编辑",
        comm_array = [];
    num = 1;
    comm_array.push("");
    $comments = $("#comments-title");
    $submit = $("#commentform #submit");
    $submit.attr("disabled", false);

    $.ajax({
        url: _deel.url + "/ajax/comment.php",
        data: $("#commentform").serialize(),
        type: $("#commentform").attr("method"),
        dataType: "text",
        error: function (request) {
            $(".comt-loading").hide();
            $("#comt-error-tips").html(request.responseText);
            setTimeout(function () {
                    $submit.attr("disabled", false).fadeTo("slow", 1);
                    $(".comt-error").fadeOut()
                },
                3000)
        },
        success: function (data) {

            $(".comt-loading").hide();
            comm_array.push($("#comment").val());
            $("textarea").each(function () {
                this.value = ""
                editor.txt.clear();
            });
            var t = document,
                cancel = t.getElementById("cancel-comment-reply-link"),
                temp = t.getElementById("wp-temp-form-div"),
                respond = t.getElementById(t.respondId),
                post = t.getElementById("comment_post_ID").value,
                parent = t.getElementById("comment_parent").value;
            if ($comments.length) {
                n = parseInt($comments.text().match(/\d+/));
                $comments.text($comments.text().replace(n, n + 1))
            }
            new_htm = '" id="new_comm_' + num + '"></';
            new_htm = (parent == "0") ? ('\n<ol style="clear:both;" class="commentlist commentnew' + new_htm + "ol>") : ('\n<ul class="children' + new_htm + "ul>");
            ok_htm = '\n<span id="success_' + num + txt3;
            ok_htm += "</span><span></span>\n";
            if (parent == "0") {
                if ($("#postcomments .commentlist").length) {
                    $("#postcomments .commentlist").before(new_htm)
                } else {
                    $("#comments").after(new_htm)
                }
            } else {
                $("#respond").after(new_htm)
            }
            $("#comment-author-info").slideUp();
            console.log($("#new_comm_" + num));
            $("#new_comm_" + num).hide().append(data);
            $("#new_comm_" + num + " li").append(ok_htm);
            $("#new_comm_" + num).fadeIn(4000);
            $body.animate({
                    scrollTop: $("#new_comm_" + num).offset().top - 200
                },
                500);
            $(".comt-avatar .avatar").attr("src", $(".commentnew .avatar:last").attr("src"));
            countdown();
            num++;
            edit = "";
            $("*").remove("#edit_id");
            cancel.style.display = "none";
            $("#reply-label").text("发表我的评论");
            cancel.onclick = null;
            t.getElementById("comment_parent").value = "0";
            if (temp && respond) {
                temp.parentNode.insertBefore(respond, temp);
                temp.parentNode.removeChild(temp)
            }

        }
    });
    return false;
});

var wait = 15,
    submit_val = $("#submit").val();

function countdown() {
    if (wait > 0) {
        $submit.val(wait);
        wait--;
        setTimeout(countdown, 1000)
    } else {
        $submit.val(submit_val).attr("disabled", false).fadeTo("slow", 1);
        wait = 15
    }
}

$("#comment").focus(function () {
    if ($("#author").val() == "" || $("#email").val() == "") {
        $(".comt-comterinfo").slideDown(300)
    }
});


function scrollTo() {
    //当点击跳转链接后，回到页面顶部位置
    $(".rollto").click(function () {
        $('body,html').animate({scrollTop: 0}, 500);
        return false;
    });
}

$(function () {
    $(window).scroll(function () {
        if ($(window).scrollTop() > 250) {
            $(".rollto").fadeIn(1000);
        }
        else {
            $(".rollto").fadeOut(1000);
        }
    });

    //当点击跳转链接后，回到页面顶部位置
    $(".rollto").click(function () {
        $('body,html').animate({scrollTop: 0}, 500);
        return false;
    });

});


function preloader(immune, background, color) {
    $("body").prepend('<div class="preloader"><span class="loading-bar"></span><i class="radial-loader"></i></div>');

    if (immune == true) {
        $("body > div.preloader").addClass('immune');
    }

    if (background == 'white') {
        $("body > div.preloader").addClass('white');
    }

    else if (background == 'black') {
        $("body > div.preloader").addClass('black');
    }

    if (color == 'red') {
        $("body > div.preloader span.loading-bar").addClass('red-colored');
        $("body > div.preloader i.radial-loader").addClass('red-colored');
    } else if (color == 'blue') {
        $("body > div.preloader span.loading-bar").addClass('blue-colored');
        $("body > div.preloader i.radial-loader").addClass('blue-colored');
    } else if (color == 'green') {
        $("body > div.preloader span.loading-bar").addClass('green-colored');
        $("body > div.preloader i.radial-loader").addClass('green-colored');
    } else if (color == 'yellow') {
        $("body > div.preloader span.loading-bar").addClass('yellow-colored');
        $("body > div.preloader i.radial-loader").addClass('yellow-colored');
    }
    $(window).on("load", function () {
        var preloader = $('.preloader');
        setTimeout(function () {
            preloader.fadeOut(1000);
        }, 1000);
        setTimeout(function () {
            preloader.remove();
        }, 2000);

    })
};

preloader(true, 'black', 'red');

$(function () {
    $(".share-s").mouseover(function () {
        $(this).children("#soshid").show();
    });
    $(".share-s").mouseout(function () {
        $(this).children("#soshid").hide();
    });

    $(".shang-p").mouseover(function () {
        $(this).children(".shang_box").show();
    });
    $(".shang-p").mouseout(function () {
        $(this).children(".shang_box").hide();
    });
});

$(function () {
    $(".pay_item").click(function () {
        $(this).addClass('checked').siblings('.pay_item').removeClass('checked');
        var dataid = $(this).attr('data-id');
        $(".shang_payimg img").attr("src", theme_context_path + "/images/" + dataid + "-img.png");
        $("#shang_pay_txt").text(dataid == "alipay" ? "支付宝" : "微信");
    });
});





