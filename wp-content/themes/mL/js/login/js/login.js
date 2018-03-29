function login_popup() {
    $("#loginModal").modal("show")
}

function login_hide() {
    $("#loginModal").modal("hide")
}

$(".globalLoginBtn").on("click", login_popup),function() {
    var e = [];
    $(".modal").on("show.bs.modal",
    function() {
        for (var s = 0; e.length > s; s++) e[s] && (e[s].modal("hide"), e[s] = null);
        e.push($(this));
        var o = $(this),
        a = o.find(".modal-dialog"),
        t = $('<div style="display:table; width:100%; height:100%;"></div>');
        t.html('<div style="vertical-align:middle; display:table-cell;"></div>'),
        t.children("div").html(a),
        o.html(t)
    })
} ();

function loginSubmit() {
    // 参考： https://webapproach.net/wordpress-ajax-login-register.html https://www.cnblogs.com/huangcong/p/4773366.html
    var data = {
        action: 'ajaxlogin',
        log: log.value,
        pwd: pwd.value,
        security: security.value
    };
    $.post(ajax_sign_object.ajaxurl, data, function(response) {
        if (response.code != 0 || !response.loggedin) {
            $("#login-form-tips").show();
            $("#login-form-tips").html(response.message);
        } else {
            login_hide();
            $("#login-form-tips").hide();
            window.location.reload();
        }
    });
}

$(document).on("show.bs.modal", ".modal", function(){
    $(this).draggable();
});

$(function () {
    $("#loginModal").bind("keydown",function(e){
        // 兼容FF和IE和Opera
        var theEvent = e || window.event;
        var code = theEvent.keyCode || theEvent.which || theEvent.charCode;
        if (code == 13) {
            //回车执行查询
            $("#login_btn").click();
        }
    });
});
