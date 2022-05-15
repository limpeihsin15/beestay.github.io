
loadNavbar();

window.setTimeout(sticky, 1000);

function loadNavbar() {
    fetch('common.html')
    .then(response=> response.text())
    .then(text=> document.getElementById('common-placeholder').innerHTML = text);

    fetch('footer.html')
    .then(response=> response.text())
    .then(text=> document.getElementById('footer-placeholder').innerHTML = text);
}
function sticky(){
window.onscroll = function() {myFunction()}; 
var topnav = document.getElementById("topnav");
var navdropdown = document.getElementById("topdrop");
var navdropdown2 = document.getElementById("topdrop2");
var topbutton = document.getElementById("topBtn");
var sticky = topnav.offsetTop;

function myFunction() {
    if (window.pageYOffset >= sticky) {
    topnav.classList.add("sticky");
    navdropdown.classList.add("dropdownsticky");
    navdropdown2.classList.add("dropdownsticky");
    topbutton.style.display = "block";
    } else {
    topnav
    .classList.remove("sticky");
    navdropdown.classList.remove("dropdownsticky");
    navdropdown2.classList.remove("dropdownsticky");
    topbutton.style.display = "none";
    }
}

}