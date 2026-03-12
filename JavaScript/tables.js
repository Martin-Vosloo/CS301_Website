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


/*
    reducing functionality basing that on the type of device being used
*/
window.addEventListener('load', function(){
    if(isMobile()==true){
        this.document.getElementById('changes').innerHTML=
        "Due to the nature of the device you are using to access the page we cannot allow you to make changes to the database.<br>Try using a desktop or laptop please";
        this.document.getElementById('changes').style.display="block";
        this.document.getElementById('changes').style.width="90%";
    }
})



/*
when you click on a table the table will change to an overflow and it will display everything based of the clicked styling
it will also allow scroll in both directions
*/

function overlay(elementId) {
    const elem = document.getElementById(elementId);
    
    if(elem.classList.contains("clicked")){
       //removes th styling added using the style in js
        elem.removeAttribute("style");
        //removing the clicked stylnig class
        elem.classList.remove("clicked");
    }else{
        /* does not have the class thus we add it to it*/
        elem.classList.add("clicked");
        /* 
        the clicked class does not scale down nicely for small phone screens thus we make additional styling here
        */
       if(isMobile==true){
            alert("is mobile ");
            elem.style.top = "10%";
            elem.style.marginBottom="26%";
       }
       
    }
}

/*
functionality to be added it the use of the transactions table
*/
const table = document.getElementById("smt");
console.log(table);
//table is for some reason pointing to a null
table.addEventListener("click", function(){
    //getting the closest row to the click on the table from the dom
    const row = event.target.closest("tr");
    //if none was found
    if(!row) return;
    //getting everythind or datavalue from the row clicked
    const cells = row.querySelectorAll("td");
    //changing from a node list to the usual array
    const rowData = Array.from(cells).map(td=>td.textContent);
    /*this is to be passed to php to display the person's transactions in the table that will appear on the side
      this will be implemented later on
    */
    profile(['him']);
})
