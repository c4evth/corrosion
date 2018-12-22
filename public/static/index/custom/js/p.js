//Footer()

function Footer() {
    $.ajax({
        url     : '../footer.html',
        type    : 'GET',
        dataType: 'html',
        async   : true,
        success : function (html) {
            $('footer').html(html);
        }
    });

}

//Header()

function Header() {
    $.ajax({
        url     : '../header.html',
        type    : 'GET',
        dataType: 'html',
        async   : true,
        success : function (html) {
            $('header').html(html);
        }
    });

}

//Nav()

function Nav() {
    $.ajax({
        url     : '../nav.html',
        type    : 'GET',
        dataType: 'html',
        async   : true,
        success : function (html) {
            $('nav').html(html);
        }
    });

}

//header 搜索框
function search_hack() {   //不好的东西
    $("#lang").click(function () {
        if ("block" == $("#huangbiao").css("display")) {
            hideLi();
        } else {
            showLi();
        }
    });

    $("li").each(function (i, v) {
        $(this).click(function () {
            $("#lang").val($(this).html());
            hideLi();
        });
    });

    $("#lang").blur(function () {
        setTimeout(hideLi, 200);
    });

}
function showLi() {
    $("#huangbiao").show();
}
function hideLi() {
    $("#huangbiao").hide();
}  