// console.log("images"); test


/*----------------------------------------
Slideshow for First collection of images
----------------------------------------*/


// current image being shown
let current1 = 0;
let imgIndex1 = [0,1,2,3];
// look for all the paragraphs that contain the images
let image_slides1 = document.getElementsByClassName("home");

// paths of images to slideshow, divvied up with their widths
const images1 = ["../images/venue/reception_table0.jpg", "../images/venue/reception_table01.jpg","../images/venue/reception_table02.jpg","../images/venue/outside_seating0.jpg"];


function slideshow1(){
     
    // loop through each img
    for(i = 0; i < image_slides1.length;i++){
        imgIndex1[i] = imgIndex1[i]+1;
        if(imgIndex1[i] >= images1.length){
            imgIndex1[i] = 0;
        }
        image_slides1[i].src = images1[imgIndex1[i]];
        // image_slides1[i].src = images1[current1];
    }
   
}


// switch images after 3 seconds
    setInterval(slideshow1, 2000);



/*----------------------------------------
Slideshow for Second collection of images
----------------------------------------*/

// current image being shown

let current2 = 0;
let imgIndex2 = [0,1,2,3];
// look for all the paragraphs that contain the images
let image_slides2 = document.getElementsByClassName("home1");

// paths of images to slideshow, divvied up with their widths
const images2 = ["../images/venue/outside_seating1.jpg","../images/venue/outside_night.jpg", "../images/venue/reception_hall2.jpg"];

function slideshow2(){
    // loop through each img and updates value stored in array( imgIndxe2)
    for(i = 0; i < image_slides2.length;i++){
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