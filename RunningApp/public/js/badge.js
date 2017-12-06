$(document).ready(function() {

    $(".badge_container").click(function() {
        $(".badge_description").fadeOut(500);
        $(this).next().fadeIn(500);
        setTimeout(function(){
            $(".badge_description").fadeOut(500);
        }, 10000);
        $("html, body").animate({ scrollTop: $(document).height() }, 1000);
    });
    $(".badge_description").click(function(){
        $(this).fadeOut(500);
    })

});