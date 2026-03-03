/*
when you click on a table the table will change to an overflow and it will display everything based of the clicked styling
it will also allow scroll in both directions
*/

function overlay(elementId) {
    const elem = document.getElementsById(elementId);
    if(elem.classList.contains("clicked")){
        /*does have the class thus we must remove it*/
        elem.classList.remove("clicked");
    }else{
        /* does not have the class thus we add it to it*/
        elem.className += "clicked";
    }
}

/*
    checking if the device is a mobile or not
    if it is we hide the edit buttons and display on their space that editing on mobile device can be errenious 
*/
function isMobile(){
    //screen size only
    let screen = window.matchMedia("only screen and (max-width 780px)").matches;
    //touch points
    let touch = 'ontouchstart' in window || navigator.maxTouchPoints>0 || navigator.maxTouchPoints>0;
    //common device keywords
    let keywords = /Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent);
    //a device is a smart phone iff it has a small screen, supports touch and has one of the keywords
    return screen&&touch&&keywords;
}

window.addEventListener('load', function(){
    if(isMobile()){
        this.document.getElementById('changes').innerHTML=
        "Due to the nature of the device you are using to access the page we cannot allow you to make changes to the database.<br>Try using a desktop or laptop please";
        this.document.getElementById('changes').style.display="block";
        this.document.getElementById('changes').style.width="100%";
    }
})