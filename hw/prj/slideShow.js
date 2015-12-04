var imgCount = 1;
var total = 6;

function slide(x) {
    var img = document.getElementById("imgSS");
    img.src = "http://web.engr.oregonstate.edu/~yooso/cs290/hw/a3/images/LC-ep001-0" + imgCount + ".png";
    imgCount += x;
    if (imgCount > total) {
        imgCount = 1;
    }
    if (imgCount < 1) {
        imgCount = total;
    }
}

window.setInterval(function slideAuto(x) {
    var img = document.getElementById("imgSS");
    img.src = "http://web.engr.oregonstate.edu/~yooso/cs290/hw/a3/images/LC-ep001-0" + imgCount + ".png";
    imgCount += 1;
    if (imgCount > total) {
        imgCount = 1;
    }
    if (imgCount < 1) {
        imgCount = total;
    }
}, 2500);

slideshowScreen.style.marginLeft = -(slideWidth * currentSlide) + "px";
