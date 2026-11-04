var number = 0;
var pictures = document.getElementsByClassName("picture");

showPicture();

function showPicture() {
    for (var i = 0; i < pictures.length; i++) {
        pictures[i].style.display = "none";
    }
    pictures[number].style.display = "block";
}

function nextPicture() {
    number = number + 1;
    if (number == pictures.length) {
        number = 0;
    }
    showPicture();
}

function previousPicture() {
    number = number - 1;
    if (number < 0) {
        number = pictures.length - 1;
    }
    showPicture();
}