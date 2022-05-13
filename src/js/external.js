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
  
  // When the user scrolls down 750px from the top of the document, show the button
  window.onscroll = function() {scrollFunction()};

  function scrollFunction() 
  {
    if (document.body.scrollTop > 750 || document.documentElement.scrollTop > 750) 
    {
      document.getElementById("topBtn").style.display = "block";
    } 
    else 
    {
      document.getElementById("topBtn").style.display = "none";
    }
  }

  // When the user clicks on the button, scroll to the top of the document
  function topFunction() {
    document.body.scrollTop = 0; // For Safari
    document.documentElement.scrollTop = 0; // For Chrome, Firefox, IE and Opera
}


