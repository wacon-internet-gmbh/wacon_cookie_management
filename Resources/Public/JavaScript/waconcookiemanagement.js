function setCookie(cname, cvalue, exdays) {
  var d = new Date();
  var maxage = "max-age="+ 24 * 60 * 60 * 365;

  document.cookie = cname + "=setwcm" + cvalue + "ts" + Date.now() +   ";" + maxage + ";path=/";
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
 var res = getCookie("waconcookiemanagement");
 resc= res.split("ts");
 wert= resc[0];
  if (wert != "") {
    
    if (wert == "setwcmmax") {
  
      $(".cookie-on").show();
      $(".cookie-off").hide();

    }
    else{

      res= wert.split("c");
       jQuery.each( res, function( i, val ) {
         if(val=='max'){}
         else{
           $( ".cookie-on.cookie" + val ).show();
           $( ".cookie-off.cookie" + val ).hide();
         }
       });
    }
  } else {
    if(!$(".waconcookiemanagement").hasClass("firsthidden")){
      $(".waconcookiemanagement").show();
      $(".waconcookiemanagement").focus();
      $(".cookieclose").hide();
    }
  }
});

$(".cookie-set").click(function(event) {
  event.preventDefault();
  var res = getCookie("waconcookiemanagement");
  resc= res.split("ts");
  wert= resc[0];
  if (wert != "") {
    if (wert == "max") {
    
      $(".cookie-on").show();
      $(".cookie-off").hide();

    }
    else{

      res= wert.split("c");
       jQuery.each( res, function( i, val ) {
         $( ".cookie-on.cookie" + val ).show();
         $( ".cookie-off.cookie" + val ).hide();
       });
    }
  } 
  $(".waconcookiemanagement").show();
  $(".waconcookiemanagement").focus();
  if($(this).hasClass('cookiecontent')){
    $( ".box-cookie-management" ).show();
    $( ".box-cookie-management" ).focus();
    $( ".cookie-fix" ).show();
    var varGes = $('#CookieBox').height();
    var varFix = $('.cookie-fix').height();
    var neuHeight = varGes - varFix - 100;
    if(neuHeight >= 300){$('.box-cookie-management').height(neuHeight);}
    if(neuHeight < 300){$('#CookieBox').css("overflow","auto");}
    
    $(".intro").hide();
    for (i = 0; i < 30; i++) {
      if($(this).hasClass("cookieuid-" + i)){
        $(".cookieinfo-" + i).parent().show();
        $(".cookieinfo-" + i).prev().hide();
        $(".cookieinfo-" + i).find('.cookie-off').click();
      }
      
     }
  }

});

  $(".cookie-set").keypress(function(event) {
    if (event.key === "Enter") {
      event.preventDefault();
  var res = getCookie("waconcookiemanagement");
  resc= res.split("ts");
  wert= resc[0];
  if (wert != "") {
    if (wert == "max") {
    
      $(".cookie-on").show();
      $(".cookie-off").hide();

    }
    else{

      res= wert.split("c");
       jQuery.each( res, function( i, val ) {
         $( ".cookie-on.cookie" + val ).show();
         $( ".cookie-off.cookie" + val ).hide();
       });
    }
  } 
  $(".waconcookiemanagement").show();
  
  $(".cookie-accept").focus();
  if($(this).hasClass('cookiecontent')){
    $( ".box-cookie-management" ).show();
    $( ".box-cookie-management" ).focus();
    $( ".cookie-fix" ).show();
    var varGes = $('#CookieBox').height();
    var varFix = $('.cookie-fix').height();
    var neuHeight = varGes - varFix - 100;
    if(neuHeight >= 300){$('.box-cookie-management').height(neuHeight);}
    if(neuHeight < 300){$('#CookieBox').css("overflow","auto");}
    
    $(".intro").hide();
    for (i = 0; i < 30; i++) {
      if($(this).hasClass("cookieuid-" + i)){
    
        $(".cookieinfo-" + i).parent().show();
        $(".cookieinfo-" + i).parent().prev().hide();
        $( ".cookie-on.cookie" + i ).show();
        $( ".cookie-off.cookie" + i ).hide();

      }
      
     }
  }
    }
});

$( ".cookie-save" ).click(function(event) {
  event.preventDefault();
  wert = "";
  var i;
  for (i = 0; i < 40; i++) {
    if($(".cookie-on.cookie"+i).css("display") == "block"){
      wert += "c" + i;
    }
  }
  if (wert == "") {wert = "min";}
  setCookie("waconcookiemanagement", wert, Date.now());
  $(".waconcookiemanagement").hide();
  location.reload();
});
$(".cookie-save").keypress(function(event) {
  if (event.key === "Enter") {
    event.preventDefault();
    // Trigger the button element with a click
    $(this).click();
  }
});

$( ".cookie-accept" ).click(function(event) {
  event.preventDefault();
  setCookie("waconcookiemanagement", "max", Date.now());
  $(".waconcookiemanagement").hide();
  location.reload();
});
$(".cookie-accept").keypress(function(event) {
  if (event.key === "Enter") {
    event.preventDefault();
    // Trigger the button element with a click
    $(this).click();
  }
});
$( ".cookie-refuse" ).click(function(event) {
  event.preventDefault();
  setCookie("waconcookiemanagement", "min", Date.now());
  $(".waconcookiemanagement").hide();
  location.reload();
});
$(".cookie-refuse").keypress(function(event) {
  if (event.key === "Enter") {
    event.preventDefault();
    // Trigger the button element with a click
    $(this).click();
  }
});
$( ".cookie-management" ).click(function() {
  $( ".box-cookie-management" ).show();
  $( ".box-cookie-management" ).focus();
  $( ".cookie-fix" ).show();
  var varGes = $('#CookieBox').height();
  var varFix = $('.cookie-fix').height();
  var neuHeight = varGes - varFix - 100;
  if(neuHeight >= 300){$('.box-cookie-management').height(neuHeight);}
  if(neuHeight < 300){$('#CookieBox').css("overflow","auto");}
  $(".intro").hide();
});
$(".cookie-management").keypress(function(event) {
  
  if (event.key === "Enter") {
    event.preventDefault();
    // Trigger the button element with a click
    $(this).click();
  }
});
$( ".cookieback" ).click(function(event) {
  event.preventDefault();
  $( ".box-cookie-management" ).hide();
  $( ".cookie-fix" ).hide();
  
 $(".intro").show();
 $(".intro").focus();
});

$(".cookieback").keypress(function(event) {
  if (event.key === "Enter") {
    event.preventDefault();
    // Trigger the button element with a click
    $(this).click();
  }
});
$( ".show-n" ).click(function(event) {
  event.preventDefault();
  $( ".box-cookie-management" ).show();
  $(".cookie-n").next().show();
  $(".cookie-n").hide();
  $(".intro").hide();

});
$(".show-n").keypress(function(event) {
  if (event.key === "Enter") {
    event.preventDefault();
    // Trigger the button element with a click
    $(this).click();
  }
});

$( ".show-m" ).click(function(event) {
  event.preventDefault();
  $( ".box-cookie-management" ).show();
  $(".cookie-m").next().show();
  $(".cookie-m").hide();
  $(".intro").hide();

});

$(".show-m").keypress(function(event) {
  if (event.key === "Enter") {
    event.preventDefault();
    // Trigger the button element with a click
    $(this).click();
  }
});
$( ".show-s" ).click(function(event) {
  event.preventDefault();
  $( ".box-cookie-management" ).show();
  $(".cookie-s").next().show();
  $(".cookie-s").hide();
  $(".intro").hide();

});
$(".show-s").keypress(function(event) {
  if (event.key === "Enter") {
    event.preventDefault();
    // Trigger the button element with a click
    $(this).click();
  }
});
$( ".show-e" ).click(function(event) {
  event.preventDefault();
  $( ".box-cookie-management" ).show();
  $(".cookie-e").next().show();
  $(".cookie-e").hide();
  $(".intro").hide();

});
$(".show-e").keypress(function(event) {
  if (event.key === "Enter") {
    event.preventDefault();
    // Trigger the button element with a click
    $(this).click();
  }
});
$( ".cookie-on.cookiecat" ).click(function(event) {
  event.preventDefault();
  $(this).parent().find(".cookie-off").show();
  $(this).parent().find(".cookie-on").hide();
});
$(".cookie-on.cookiecat").keypress(function(event) {
  if (event.key === "Enter") {
    event.preventDefault();
    // Trigger the button element with a click
    $(this).click();
  }
});
$( ".cookie-off.cookiecat" ).click(function(event) {
  event.preventDefault();
  $(this).parent().find(".cookie-on").show();
  $(this).parent().find(".cookie-off").hide();
});
$(".cookie-off.cookiecat").keypress(function(event) {
  if (event.key === "Enter") {
    event.preventDefault();
    // Trigger the button element with a click
    $(this).click();
  }
});

$( ".cookie-info .cookie-on" ).click(function(event) {
  event.preventDefault();
  $(this).prev().show();
  $(this).hide();
  var children=$(this).parent().parent().children();
  var cookieoff = 0;
  for(var i=0;i<children.length;i++){
    if(children.eq(i).find(".cookie-off").css("display") == "none"){
      cookieoff += 1;
    }
  }
  if(cookieoff==0){
    $(this).parent().parent().parent().find(".cookie-off.cookiecat").show();
    $(this).parent().parent().parent().find(".cookie-on.cookiecat").hide();
  }
});
$(".cookie-info .cookie-on").keypress(function(event) {
  if (event.key === "Enter") {
    event.preventDefault();
    // Trigger the button element with a click
    $(this).click();
  }
});
$( ".cookie-info .cookie-off" ).click(function(event) {
  event.preventDefault();
  $(this).next().show();
  $(this).hide();
  $(this).parent().parent().parent().find(".cookie-off.cookiecat").hide();
  $(this).parent().parent().parent().find(".cookie-on.cookiecat").show();
});
$(".cookie-info .cookie-off").keypress(function(event) {
  if (event.key === "Enter") {
    event.preventDefault();
    // Trigger the button element with a click
    $(this).click();
  }
});

$( ".info-show" ).click(function(event) {
  event.preventDefault();
  $(this).next().show();
  $(this).hide();

});
$(".info-show").keypress(function(event) {
  if (event.key === "Enter") {
    event.preventDefault();
    // Trigger the button element with a click
    $(this).click();
  }
});
$( ".info-hide" ).click(function(event) {
  event.preventDefault();
  $(this).parent().hide();
  $(this).parent().prev().show();
});
$(".info-hide").keypress(function(event) {
  if (event.key === "Enter") {
    event.preventDefault();
    // Trigger the button element with a click
    $(this).click();
  }
});
$( ".cookieclose" ).click(function() {
$(".waconcookiemanagement").hide();
});
$(".cookieclose").keypress(function(event) {
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
