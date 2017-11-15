$(document).ready(function() {

    $(".badge_container").click(function() {
        $(".badge_description").hide();
        $(this).next().show();
        setTimeout(function(){
            $(".badge_description").hide(100);
        }, 2000);

    });
    $(".badge_description").click(function(){
        $(this).toggle();
    })

});