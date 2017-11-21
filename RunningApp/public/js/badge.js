$(document).ready(function() {

    $(".badge_container").click(function() {
        $(".badge_description").fadeOut(500);
        $(this).next().fadeIn(500);
        setTimeout(function(){
            $(".badge_description").fadeOut(500);
        }, 3000);

    });
    $(".badge_description").click(function(){
        $(this).fadeOut(500);
    })

});