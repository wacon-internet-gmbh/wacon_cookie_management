function setCookie(cname, cvalue, exdays) {
  var d = new Date();
  var maxage = "max-age="+ 24 * 60 * 60 * 365;
  document.cookie = cname + "=" + cvalue + ";" + maxage + ";path=/";
}

function getCookie(cname) {
  var name = cname + "=";
  var ca = document.cookie.split(';');
  for(var i = 0; i < ca.length; i++) {
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

$(document).ready(function(){ 
$('.waconcookiemanagement').prependTo("body");
 var wert = getCookie("waconcookiemanagement");
  if (wert != "") {
    if (wert == "max") {
    for (i = 0; i < 30; i++) {
      $("cookie-on").show();
      $("cookie-off").hide();
     }
    }
    else{
      res= wert.split("c");
       jQuery.each( res, function( i, val ) {
         $( ".cookie-on.cookie" + val ).show();
         $( ".cookie-off.cookie" + val ).hide();
       });
    }
   
  } else {
if(!$(".waconcookiemanagement").hasClass("firsthidden")){

    $(".waconcookiemanagement").show();
    setCookie("waconcookiemanagement", "min", Date.now());
$("cookieclose").hide();
}
  }
    
});

$(".cookie-set").click(function(){ 
  var wert = getCookie("waconcookiemanagement");
  if (wert != "") {
    if (wert == "max") {
    for (i = 0; i < 30; i++) {
      $("cookie-on").show();
      $("cookie-off").hide();
     }
    }
    else{
      res= wert.split("c");
       jQuery.each( res, function( i, val ) {
         $( ".cookie-on.cookie" + val ).show();
         $( ".cookie-off.cookie" + val ).hide();
       });
    }
   
  } else {
    

  }
$(".waconcookiemanagement").show();
});


$( ".cookie-save" ).click(function() {
wert = "";
var i;
for (i = 0; i < 30; i++) {
if($(".cookie-on.cookie"+i).css("display") == "block"){
  wert += "c" + i;
}

}
if (wert == "") {wert = "min";}
setCookie("waconcookiemanagement", wert, Date.now());
$(".waconcookiemanagement").hide();
location.reload();
});

$( ".cookie-accept" ).click(function() {
setCookie("waconcookiemanagement", "max", Date.now());
$(".waconcookiemanagement").hide();
location.reload();
});
$( ".cookie-refuse" ).click(function() {
setCookie("waconcookiemanagement", "min", Date.now());
$(".waconcookiemanagement").hide();
location.reload();
});

$( ".cookie-management" ).click(function() {
  $( ".box-cookie-management" ).show();
  $( ".cookie-fix" ).show();
  var varGes = $('#CookieBox').height();
  var varFix = $('.cookie-fix').height();
  var neuHeight = varGes - varFix - 100;
  if(neuHeight >= 300){$('.box-cookie-management').height(neuHeight);}
  if(neuHeight < 300){$('#CookieBox').css("overflow","auto");}
  
  $(".intro").hide();
});
$( ".cookieback" ).click(function() {
  $( ".box-cookie-management" ).hide();
  $( ".cookie-fix" ).hide();
  
 $(".intro").show();
});

$( ".show-n" ).click(function() {
  $( ".box-cookie-management" ).show();
  $(".cookie-n").next().show();
  $(".cookie-n").hide();
  $(".intro").hide();

});
$( ".show-m" ).click(function() {
  $( ".box-cookie-management" ).show();
  $(".cookie-m").next().show();
  $(".cookie-m").hide();
  $(".intro").hide();

});
$( ".show-s" ).click(function() {
  $( ".box-cookie-management" ).show();
  $(".cookie-s").next().show();
  $(".cookie-s").hide();
  $(".intro").hide();

});
$( ".show-e" ).click(function() {
  $( ".box-cookie-management" ).show();
  $(".cookie-e").next().show();
  $(".cookie-e").hide();
  $(".intro").hide();

});
$( ".cookie-on.cookiecat" ).click(function() {
  $(this).parent().find(".cookie-off").show();
  $(this).parent().find(".cookie-on").hide();
});
$( ".cookie-off.cookiecat" ).click(function() {
  $(this).parent().find(".cookie-on").show();
  $(this).parent().find(".cookie-off").hide();
});


$( ".cookie-on" ).click(function() {
  $(this).prev().show();
  $(this).hide();

});
$( ".cookie-off" ).click(function() {
  $(this).next().show();
  $(this).hide();
});

$( ".info-show" ).click(function() {
  $(this).next().show();
  $(this).hide();

});
$( ".info-hide" ).click(function() {
  $(this).parent().hide();
  $(this).parent().prev().show();
});
$( ".cookieclose" ).click(function() {
$(".waconcookiemanagement").hide();
});
var $menu = $('#CookieBox');
$(".waconcookiemanagement").on('click', function (e) {

    // If element is opened and click target is outside it, hide it
    if ($menu.is(':visible') && !$menu.is(e.target) && !$menu.has(e.target).length) {
      $(".waconcookiemanagement").hide();
    }
});