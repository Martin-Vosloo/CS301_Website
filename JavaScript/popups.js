
// get the cookies container, and two buttons
const languageContainer = document.getElementById("language-container");
const acceptLanguageBtn = document.getElementById("accept-language-btn");
acceptLanguageBtn.addEventListener("click", function() {
  languageContainer.style.display = "none";
});

const cookiesContainer = document.getElementById("cookies-container");
const rejectCookiesBtn = document.getElementById("reject-cookies-btn");
const acceptCookiesBtn = document.getElementById("accept-cookies-btn");

  // Check if cookie exists, don't display popup if pre-accepted/exists
  if (document.cookie.includes("cookiesAccepted=true")) {
    cookiesContainer.style.display = "none";
    console.log("Cookies Accepted")
  }

  // click to accept cookies, save changes and set expiry in 7 days; close container
  acceptCookiesBtn.addEventListener("click", function() {
    document.cookie = "cookiesAccepted=true; max-age=" + (60 * 60 * 24 * 7) + "; path=/";
    cookiesContainer.style.display = "none";
  });
  
  // click to reject cookies, save changes and expire on refresh; close container
  rejectCookiesBtn.addEventListener("click", function(){
    document.cookie = "cookiesAccepted=false; path=/";
    cookiesContainer.style.display = "none";
  });
  

function checkLanguage(){
  const userLanguage = navigator.language.substring(0, 2).toLowerCase();
  
  if (userLanguage == 'en'){
    return true;
  }
  
  else{
    return false;
  }
}

function checkOnline(){
  return navigator.onLine;
}

if (checkLanguage()){
  console.log("User browser: English")
  stateLanguage();
}
else {
  console.log("User browser: Not English")
}

if (checkOnline()) {
  console.log("User Browser: Online")
}
else{
  console.log("User Browser: Offline")
}