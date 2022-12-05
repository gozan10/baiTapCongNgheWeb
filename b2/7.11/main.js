var Jack = new Array(3);
var curPosition = 0;
var action;
var direction = "up";

Jack[0] = new Image();
Jack[0].src = "img/1.png";
Jack[1] = new Image();
Jack[1].src = "img/2.png";
Jack[2] = new Image();
Jack[2].src = "img/3.png";
function Action() {
    if (direction == "up") {
        if (curPosition == 3) {
            --curPosition;
            direction = "down";
        } else {
            ++curPosition;
        }
    } else {
        if (curPosition == 0) {
            ++curPosition;
            direction = "up";
        } else {
            --curPosition;
        }
    }
    document.Jack.src = Jack[curPosition].src;
}

function startAction() {
    if (action) {
        clearInterval(action);
    }
    action = setInterval("Action()",1000);
}