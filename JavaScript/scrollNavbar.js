// navigation bar function to hide navbar when scrolling down, and show when scrolling up
const navBar = document.getElementById("navigation-bar");
if (navBar) {
  let prevScrollPos = window.pageYOffset;
  window.addEventListener('scroll', function () {
    const currentScrollPos = window.pageYOffset;
    if (prevScrollPos > currentScrollPos) {
      navBar.style.top = "0";
    } else {
      navBar.style.top = "-50px";
    }
    prevScrollPos = currentScrollPos; 
  });
}
