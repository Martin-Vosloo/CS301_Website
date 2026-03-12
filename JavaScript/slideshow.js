// console.log("images"); test


/*----------------------------------------
Slideshow for First collection of images
----------------------------------------*/


// current image being shown
let current1 = 0;
let imgIndex1 = [0,1,2,3];
// look for all the paragraphs that contain the images
let image_slides1 = document.getElementsByClassName("image-slider");

// paths of images to slideshow, divvied up with their widths
const images1 = ["../images/venue/reception_table0.jpg", "../images/venue/reception_table01.jpg","../images/venue/reception_table02.jpg","../images/venue/outside_chairs.jpg"];

if(image_slides1.length > 0){
    function slideshow1(){
     
        // loop through each img and updates value stored in array( imgIndxe1)
        for(let i = 0; i < image_slides1.length;i++){
        // if it reaches the end of the images goes back to start
            imgIndex1[i] = imgIndex1[i]+1;
            if(imgIndex1[i] >= images1.length){
                imgIndex1[i] = 0;
            }
            //get the next img path from images2 list and assign it to current img element on the page
            image_slides1[i].src = images1[imgIndex1[i]];
            // image_slides1[i].src = images1[current1];
    }
   
}


// switch images after 3 seconds
    // setInterval(slideshow1, 2000);

}



/*----------------------------------------
Slideshow for Second collection of images
----------------------------------------*/

// current image being shown

let current2 = 0;
let imgIndex2 = [0,1,2,3];
// look for all the paragraphs that contain the images
let image_slides2 = document.getElementsByClassName("home1");

// paths of images to slideshow, divvied up with their widths
const images2 = ["../images/venue/outside_seating1.jpg","../images/venue/outside_night.jpg", "../images/venue/reception_hall3.jpg"];

if(image_slides2.length > 0){
    function slideshow2(){
    // loop through each img and updates value stored in array( imgIndxe2)
        for(let i = 0; i < image_slides2.length;i++){
            imgIndex2[i] = imgIndex2[i]+1;
            // if it reaches the end of the images goes back to start
            if(imgIndex2[i] >= images2.length){
                imgIndex2[i] = 0;
            }
        //get the next img path from images2 list and assign it to current img element on the page
            image_slides2[i].src = images2[imgIndex2[i]];
        
    }
}


// switch images after 3 seconds
    setInterval(slideshow2, 2000);


}


/*-----------------------------
link a button to google maps
-----------------------------
*/

// location URL
const locationUrl = "https://www.google.com/maps/place/Die+Boer+en+die+Belg,+Die+Boer+en+Die+Belg+Part+4+of+Rietvally+340+Rietvally,+Mookgophong,+0560/@-24.4338477,28.7037168,16z/data=!4m6!3m5!1s0x1ec0a7bb00000001:0xf654b315f386eba1!8m2!3d-24.4338477!4d28.7037168!16s%2Fg%2F11bwf73s66?force=pwa&source=mlapk&g_ep=Eg1tbF8yMDI2MDIyM18wIOC7DCoASAJQAQ%3D%3D";

// get button with a class name about-btn
let locationBtn = document.getElementsByClassName("about-btn")[0];

if(locationBtn){
    // when you click a button should take you to the location
    locationBtn.addEventListener("click", function(){
    window.location.href = locationUrl;
});
}


/*-----------------------------
Change a button color when hover 
-----------------------------
*/
let bgColor = "#a8c0a2";
let bgColor2  = "#efefef";
let contactBtn = document.getElementsByClassName("about-btn1")[0];
let aboutBtn = document.getElementsByClassName("about-btn2")[0];

if(contactBtn){
     
    contactBtn.style.backgroundColor = "#000000";
    contactBtn.style.color = "#ffffff";

    aboutBtn.style.backgroundColor = bgColor
    // when you hover on the location button change backgrownd color
    contactBtn.addEventListener("mouseenter", function(){
        contactBtn.style.backgroundColor = bgColor;
        contactBtn.style.color = "#000000";
    });
    // and when you stop hovering backgrownd color goes back to default color
    contactBtn.addEventListener("mouseleave", function(){
        contactBtn.style.backgroundColor = "#000000";
        contactBtn.style.color = "#ffffff";
    });
}

if(locationBtn){
    // when you hover on the location button change backgrownd color
    locationBtn.addEventListener("mouseenter", function(){
        locationBtn.style.backgroundColor = bgColor;
    });
    // and when you stop hovering backgrownd color goes back to default color
    locationBtn.addEventListener("mouseleave", function(){
        locationBtn.style.backgroundColor = bgColor2;
    });
}

if(aboutBtn){
    // when you hover on the location button change backgrownd color
    aboutBtn.addEventListener("mouseenter", function(){
        aboutBtn.style.backgroundColor = "#000000";
        aboutBtn.style.color = "#ffffff";
        
    });
    // and when you stop hovering backgrownd color goes back to default color
    aboutBtn.addEventListener("mouseleave", function(){
        aboutBtn.style.backgroundColor = bgColor;
        aboutBtn.style.color = "#000000";
        
    });
}


/*-----------------------------
placeholder property
-----------------------------
*/

// fetch html element and change the placeholder
let placeholderVar = document.getElementById("couple-names");
if(placeholderVar){
    let names = "e.g. Samantha & Goerge";                             
    placeholderVar.placeholder = names;
}

/*-----------------------------
Title property
-----------------------------
*/

// fetch html elements
let namesInput = document.getElementById("couple-names");
let emailInput = document.getElementById("email");
let phoneNumInput = document.getElementById("phone");

if(namesInput){
    // show validation live hints to the user when filling forms
    namesInput.title = "Enter your names";
    emailInput.title = "Enter your email";
    phoneNumInput.title = "Enter your phone number";
}
/*-----------------------------
Alternative property
-----------------------------
*/
// fetch html elements for home page images
let venueImgs = document.getElementsByClassName("home");
let venueImgs2 = document.getElementsByClassName("home1");

/*show alt text if image does'nt load, loop through collection of 
images with class name home and home1*/

if(venueImgs && venueImgs2){
    for( let i = 0; i < venueImgs.length; i++){
        venueImgs[i].alt = "Venue Image";
    }
    for( let i = 0; i < venueImgs2.length; i++){
        venueImgs2[i].alt = "Venue Image";
    }
    
    
}
/*-----------------------------
Scroll top btn 
-----------------------------
*/

let scrollTopBtn = document.getElementById("top-btn");

if(scrollTopBtn){
    // show the scroll top button after scrolling down  px
    window.onscroll = function() {
         if(document.documentElement.scrollTop > 2050) {
        scrollTopBtn.style.display = "block";

        }else{
            scrollTopBtn.style.display = "none";
        }
    }
// when you click on the button it should take you to the top

    scrollTopBtn.onclick = function(){
        window.scrollTo({
            top : 0
        });
    }
}

const images = ["../images/venue/cover1.jpg","../images/venue/cover2.png", "../images/venue/reception_table0.jpg", "../images/venue/outside_seating0.jpg"];

let currentImage = document.getElementsByClassName("bc-img")[0];
let currentIndex = 0;

if(currentImage){
    
function backgrowndChanger(){
    currentIndex = currentIndex + 1;
    // if it reaches end of the image, go back to start
    if(currentIndex >= images.length){
        currentIndex = 0;
    }

    // move to the next img
    currentImage.style.backgroundImage = "url('" + images[currentIndex] +  "')";
}

// call func to load image to be loaded first
backgrowndChanger();
//change backgrownd after 2 seconds
setInterval(backgrowndChanger, 3000);
}





