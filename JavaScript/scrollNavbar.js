  // navigation bar function to hide navbar when scrolling down, and show when scrolling up
  
  var prevScrollPos = window.pageYOffset;
  window.onscroll = function () {
    var currentScrollPos = window.pageYOffset;
    if (prevScrollPos > currentScrollPos) {
      document.getElementById("navigation-bar").style.top = "0";
    }
    else {
      document.getElementById("navigation-bar").style.top = "-50px";
    }
   prevScrollPos = currentScrollPos; 
  }
