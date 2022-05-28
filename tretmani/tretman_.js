const navbar = document.getElementById('navbar');
let scrolled = false;

window.onscroll = function () {
    if (window.pageYOffset > 100) {
        navbar.classList.remove('top');
        if (!scrolled) {
            navbar.style.transform = 'translateY(-100px)';
        }
        setTimeout(function () {
            navbar.style.transform = 'translateY(0)';
            scrolled = true;
        }, 200);
    } else {
        navbar.classList.add('top');
        scrolled = false;
    }
};

var counter = 10;
setInterval(function () {
    document.getElementById('radio' + counter).checked = true;
    counter = counter + 10;
    if (counter > 40) {
        counter = 10;
    }
}, 3000);