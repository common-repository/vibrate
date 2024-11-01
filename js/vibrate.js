// jQuery for load popup
jQuery(document).ready(function() {
    navigator.vibrate = navigator.vibrate || navigator.webkitVibrate || navigator.mozVibrate || navigator.msVibrate;
    navigator.vibrate("500");
    //calculation for get windows hight and width for popup.
    jQuery('.vibrate').show().css("position","absolute");
    jQuery('.vibrate').css("top", Math.max(0, ((jQuery(window).height() - jQuery('.vibrate').outerHeight()) / 2) + jQuery(window).scrollTop()) + "px");
    jQuery('.vibrate').css("left", Math.max(0, ((jQuery(window).width() - jQuery('.vibrate').outerWidth()) / 2) +  jQuery(window).scrollLeft()) + "px");
    
    //disagree button clear everything.
    jQuery('#vibrate-close').click(function(){
        jQuery('.vibratebase').fadeOut('slow');
        jQuery('.vibrate').hide();
    });
});