document.querySelector(".switched_item_1").style.display = "block";
document.querySelector(".switched_item_2").style.display = "none";

function switchEffect(switchNumber) {
    switch (switchNumber){
        case 1:
            document.querySelector(".switch_button_2").style.backgroundColor = "white";
            document.querySelector(".switch_button_1").style.backgroundColor = "#E63257";

            document.querySelector(".switch_button_1").style.color = "white";
            document.querySelector(".switch_button_2").style.color = "#E63257";

            document.querySelector(".switched_item_1").style.display = "block";
            document.querySelector(".switched_item_2").style.display = "none";

            console.log("personal");
            break;
        case 2:
            document.querySelector(".switch_button_2").style.backgroundColor = "#E63257";
            document.querySelector(".switch_button_1").style.backgroundColor = "white";

            document.querySelector(".switch_button_1").style.color = "#E63257";
            document.querySelector(".switch_button_2").style.color = "white";

            document.querySelector(".switched_item_1").style.display = "none";
            document.querySelector(".switched_item_2").style.display = "block";

            console.log("public");
            break;
        default:
            console.log("het staat op 1");
    }
}