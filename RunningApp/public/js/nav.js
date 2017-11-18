$(document).ready(function(){


    if ($(window).width() < 740) {
        $('.nav_menu_js').removeAttr("style").hide();



        $('.hamburger_icon').click(function () {
            $('.nav_menu_js').toggle( "slide" );
        });
    }


});
