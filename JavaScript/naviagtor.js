//JavaScript section of the practical 3: Naviagtor

/* 1. The code below allows the user to check if javascript is enabled in their browser. (incase not)
   2. The user will click a button to check how far the venue is from themselves.  
   3. the button will redirect them to google maps to find the distance. 
   4. From enhace they will be able to start testing for directions.
*/

// the button id is directionBtn which is styled in csss to have a nicer look. 

const directionsBtn = document.getElementById("directionsBtn");
if (directionsBtn) {
    directionsBtn.addEventListener("click", getDirections);
}

function getDirections() {
    const venueLat = -24.450427344869926;
    const venueLon = 28.73777946911542;

    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(
            function(position) {
                const userLat = position.coords.latitude;
                const userLon = position.coords.longitude;
                window.open(
                    `https://www.google.com/maps/dir/${userLat},${userLon}/${venueLat},${venueLon}`,
                    "_blank"
                );
            },
            function() {
                window.open(
                    `https://www.google.com/maps/dir/?api=1&destination=${venueLat},${venueLon}`,
                    "_blank"
                );
            }
        );
    } else {
        window.open(
            `https://www.google.com/maps/dir/?api=1&destination=${venueLat},${venueLon}`,
            "_blank"
        );
    }
}
