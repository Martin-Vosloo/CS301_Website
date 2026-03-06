
// get the cookies container, and two buttons
document.addEventListener("DOMContentLoaded", function(){
  checkLanguage();
  checkCookies();
  checkOnline();
})

// check if language has already been acknowledged. if not, run languageNav()
function checkLanguage(){
  const userLanguage = navigator.language.substring(0, 2).toLowerCase();
  
  if (userLanguage == 'en'){
    console.log("User browser: English")
    languageNav();
  }
  else{
    languageNav();
  }
}
// display language default English notification
function languageNav() {
  const languageContainer = document.getElementById("language-container");
  const acceptLanguageBtn = document.getElementById("accept-language-btn");
  
  acceptLanguageBtn.addEventListener("click", function() {
    document.cookie = "languageAccepted=true; path=/"
    languageContainer.style.display = "none";
  });
  
  if (document.cookie.includes("languageAccepted=true")){
    languageContainer.style.display = "none";
    console.log("Language: en -> Acknowledged");
  }
  
}

// check if cookies have already been accepted. if not, run cookiesNav()
function checkCookies() {
  const cookiesContainer = document.getElementById("cookies-container");
  
  // Check if cookie exists, don't display popup if pre-accepted/exists
    if (document.cookie.includes("cookiesAccepted=true")) {
      cookiesContainer.style.display = "none";
      cookiesNav(cookiesContainer);
      console.log("Cookies Accepted")
    }
    else{
      cookiesNav(cookiesContainer);
    }
} 
// display banner to accept/reject website cookies
function cookiesNav(container) {
  const acceptCookiesBtn = document.getElementById("accept-cookies-btn");
  const rejectCookiesBtn = document.getElementById("reject-cookies-btn");
  
  // click to accept cookies, save changes and set expiry in 7 days; close container
  acceptCookiesBtn.addEventListener("click", function() {
    document.cookie = "cookiesAccepted=true; max-age=" + (60 * 60 * 24 * 7) + "; path=/";
    container.style.display = "none";
    console.log("Cookies Accepted")
  });
  
  // click to reject cookies, save changes and expire on refresh; close container
  rejectCookiesBtn.addEventListener("click", function(){
    document.cookie = "cookiesAccepted=false; path=/";
    container.style.display = "none";
    console.log("Cookies Rejected")
  });
}

// ckeck if the user's browser is online and log to console
function checkOnline(){
  if (navigator.onLine) {
    console.log("User Browser: Online")
  }
  else{
    console.log("User Browser: Offline")
  }
}
