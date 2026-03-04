
// get the cookies container, and two buttons
  const container = document.getElementById("cookies-container");
  const acceptBtn = document.getElementById("accept-cookies");
  const rejectBtn = document.getElementById("reject-cookies");

  // Check if cookie exists, don't display popup if pre-accepted/exists
  if (document.cookie.includes("cookiesAccepted=true")) {
    container.style.display = "none";
    console.log("Cookies Accepted")
  }

  // click to accept cookies, save changes and set expiry in 7 days; close container
  acceptBtn.addEventListener("click", function() {
    document.cookie = "cookiesAccepted=true; max-age=" + (60 * 60 * 24 * 7) + "; path=/";
    container.style.display = "none";
  });
  
  // click to reject cookies, save changes and expire on refresh; close container
  rejectBtn.addEventListener("click", function(){
    document.cookie = "cookiesAccepted=false; path=/";
    container.style.display = "none";
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