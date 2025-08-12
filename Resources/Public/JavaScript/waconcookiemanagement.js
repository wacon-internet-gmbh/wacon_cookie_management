function setCookie(cname, cvalue, exdays) {
    var d = new Date();
    var maxage = "max-age=" + 24 * 60 * 60 * 365;
    document.cookie = cname + "=setwcm" + cvalue + "ts" + Date.now() + ";" + maxage + ";path=/";
}

function getCookie(cname) {
    var name = cname + "=";
    var ca = document.cookie.split(';');
    for (var i = 0; i < ca.length; i++) {
        var c = ca[i];
        while (c.charAt(0) == ' ') {
            c = c.substring(1);
        }
        if (c.indexOf(name) == 0) {
            return c.substring(name.length, c.length);
        }
    }
    return "";
}


function reloadCookies()
{
    history.go(0);
}

function loadCookies()
{
    var res = getCookie("waconcookiemanagement");
    resc = res.split("ts");
    wert = resc[0];
    params = [];
    if (wert == "setwcmmax") {
        $("cookiecat").addClass('cookie-on');
        $("cookiecat").removeClass('cookie-off');
        params['max'] =1;
    } else {
        res = wert.split("c");
        jQuery.each(res, function (i, val) {
            if (val == 'max') {
            } else {
                $(".cookie-id.cookie" + val).addClass('cookie-on');
                $(".cookie-id.cookie" + val).removeClass('cookie-off');
                params[val] =1;
            }
        });
    }
}
$(document).ready(function () {
    $('.waconcookiemanagement').prependTo("body");
    loadCookies();
    if (wert == "") {
        if (!$(".waconcookiemanagement").hasClass("firsthidden")) {
            $(".waconcookiemanagement").show();
            $(".waconcookiemanagement").focus();
            $(".cookieclose").hide();
        }
    }
    $(".cookie-set-direct").click(function (event) {
        event.preventDefault();
        var res = getCookie("waconcookiemanagement");
        resc = res.split("ts");
        wert = resc[0];
        params = [];
        res = wert.split("c");
        var id = $(this).attr('data-id');
        wert += "c" + id;
        setCookie("waconcookiemanagement", wert, Date.now());
        reloadCookies();
    });

    $(".cookie-set").click(function (event) {
        event.preventDefault();
        $(".waconcookiemanagement").show();
        $(".waconcookiemanagement .cookie-accept").focus();
        if ($(this).hasClass('cookiecontent')) {
            $(".box-cookie-management").show();
            $(".box-cookie-management").focus();
            $(".cookie-fix").show();
            var varGes = $('#CookieBox').height();
            var varFix = $('.cookie-fix').height();
            var neuHeight = varGes - varFix - 100;
            if (neuHeight >= 300) {
                $('.box-cookie-management').height(neuHeight);
            }
            if (neuHeight < 300) {
                $('#CookieBox').css("overflow", "auto");
            }
            $(".intro").hide();
            var cid = $(this).attr("data-id");
            var child= $(".waconcookiemanagement .box-cookie-management").find('.cookieinfo-' + cid);
            child.parent().show();
            child.parent().prev().hide();
            child.find(".cookie-id").removeClass('cookie-off').addClass('cookie-on').attr('aria-checked',true);
        }
    });

    $(".cookie-set").keypress(function (event) {
        if (event.key === "Enter") {
            event.preventDefault();
            $(this).click();
        }
    });

    $(".cookie-save").click(function (event) {
        event.preventDefault();
        wert = "";

        $('.cookie-info').each(function () {
            if ($(this).find(".cookie-id").hasClass("cookie-on")) {
                var className = $(this).attr('class');
                var classarray = className.split("-");
    
                wert += "c" + classarray['2'];
            }
        });
        if (wert == "") {
            wert = "min";
        }
        setCookie("waconcookiemanagement", wert, Date.now());
        reloadCookies();
       
    });

    $(".cookie-save").keypress(function (event) {
        if (event.key === "Enter") {
            event.preventDefault();
            // Trigger the button element with a click
            $(this).click();
        }
    });

    $(".cookie-accept").click(function (event) {
        event.preventDefault();
        setCookie("waconcookiemanagement", "max", Date.now());
        reloadCookies();
    });

    $(".cookie-accept").keypress(function (event) {
        if (event.key === "Enter") {
            event.preventDefault();
            // Trigger the button element with a click
            $(this).click();
        }
    });

    $(".cookie-refuse").click(function (event) {
        event.preventDefault();
        setCookie("waconcookiemanagement", "min", Date.now());
        reloadCookies();
    });

    $(".cookie-refuse").keypress(function (event) {
        if (event.key === "Enter") {
            event.preventDefault();
            // Trigger the button element with a click
            $(this).click();
        }
    });

    $(".cookie-management").click(function (event) {
        event.preventDefault();
        $(".box-cookie-management").show();
        $(".cookieclose").focus();

        $(".cookie-fix").show();
        var varGes = $('#CookieBox').height();
        var varFix = $('.cookie-fix').height();
        var neuHeight = varGes - varFix - 100;
        if (neuHeight >= 300) {
            $('.box-cookie-management').height(neuHeight);
        }
        if (neuHeight < 300) {
            $('#CookieBox').css("overflow", "auto");
        }
        $(".intro").hide();
    });

    $(".cookie-management").keypress(function (event) {
        if (event.key === "Enter") {
            event.preventDefault();
            // Trigger the button element with a click
            $(this).click();
        }
    });

    $(".cookieback").click(function (event) {
        event.preventDefault();
        $(".box-cookie-management").hide();
        $(".cookie-fix").hide();

        $(".intro").show();
        $(".intro").focus();
    });

    $(".cookieback").keypress(function (event) {
        if (event.key === "Enter") {
            event.preventDefault();
            // Trigger the button element with a click
            $(this).click();
        }
    });

    $(".cookiecat").click(function (event) {
        event.preventDefault();
        //alert($(this).attr('class'));
        if($(this).hasClass('cookie-off')) $(this).parent().find(".cookie-off").removeClass('cookie-off').addClass('cookie-on').attr('aria-checked',true);
        else $(this).parent().find(".cookie-on").removeClass('cookie-on').addClass('cookie-off').attr('aria-checked',false);
    });

    $(".cookiecat").keypress(function (event) {
        if (event.key === "Enter") {
            event.preventDefault();
            // Trigger the button element with a click
            $(this).click();
        }
    });

    $(".cookie-info .cookie-id").click(function (event) {
        event.preventDefault();
        if($(this).hasClass('cookie-off')) {
            $(this).removeClass('cookie-off').addClass('cookie-on').attr('aria-checked',true);
            $(this).parent().parent().parent().find(".cookiecat").removeClass('cookie-off').addClass('cookie-on').attr('aria-checked',true);
        }
        else { 
            $(this).removeClass('cookie-on').addClass('cookie-off').attr('aria-checked',false);
            var children = $(this).parent().parent().children();
            var cookieon = 0;
            for (var i = 0; i < children.length; i++) {
                if (children.eq(i).find(".cookie-id").hasClass('cookie-on')) {
                    cookieon += 1;
                }
            }
            if (cookieon == 0) {
                $(this).parent().parent().parent().find(".cookiecat").removeClass('cookie-on').addClass('cookie-off').attr('aria-checked',false);
            }
        }
    });

    $(".cookie-info .cookie-id").keypress(function (event) {
        if (event.key === "Enter") {
            event.preventDefault();
            // Trigger the button element with a click
            $(this).click();
        }
    });



    $(".cookie-acc").click(function (event) {
        event.preventDefault();
        if($(this).hasClass('info-show')){
        $(this).next().show();
        $(this).removeClass('info-show').addClass('info-hide');
         $(this).attr('aria-expanded', true);
        $(this).html($(this).attr('data-hide') + '<span class="arrow up"></span>');
        }
        else{
            $(this).next().hide();
        $(this).removeClass('info-hide').addClass('info-show');
        $(this).attr('aria-expanded', false);
        $(this).html($(this).attr('data-show') + '<span class="arrow down"></span>');
        }
    });

    $(".cookie-acc").keypress(function (event) {
        if (event.key === "Enter") {
            event.preventDefault();
            // Trigger the button element with a click
            $(this).click();
        }
    });

  

    $(".cookieclose").click(function () {
        $(".waconcookiemanagement").hide();
    });

    $(".cookieclose").keypress(function (event) {
        if (event.key === "Enter") {
            event.preventDefault();
            // Trigger the button element with a click
            $(this).click();
        }
    });

    var $menu = $('#CookieBox');
    $(".waconcookiemanagement").on('click', function (e) {
        var wert = getCookie("waconcookiemanagement");
        if (wert != "") {
            // If element is opened and click target is outside it, hide it
            if ($menu.is(':visible') && !$menu.is(e.target) && !$menu.has(e.target).length) {
                $(".waconcookiemanagement").hide();
            }
        }
    });

});
