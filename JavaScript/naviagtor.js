//JavaScript section of the practical 3: Naviagtor

/* 1. The code below allows the user to check if javascript is enabled in their browser. (incase not)
   2. The user will click a button to check how far the venue is from themselves.  
   3. the button will redirect them to google maps to find the distance. 
   4. From enhace they will be able to start testing for directions.
*/

// the button id is directionBtn which is styled in csss to have a nicer look. 
document.getElementById("directionsBtn")
    .addEventListener("click", getDirections);

document.getElementById("directionsBtn")
    .addEventListener("click", getDirections);

function getDirections() {

    if (navigator.geolocation) {

        navigator.geolocation.getCurrentPosition(
            function(position) {

                // with the permission of the user, we  use it to get the directions of the venue from
                // where they are 
                const userLat = position.coords.latitude;
                const userLon = position.coords.longitude;

                const venueLat = -24.450427344869926;
                const venueLon = 28.73777946911542;

                window.location.href =
                    "https://www.google.com/maps/dir/" +
                    userLat + "," + userLon + "/" +
                    venueLat + "," + venueLon;
            },

            // warning to tell user to allow location retreival 
            function() {
                alert("Location permission is required.");
            }
        );
    // feedback will report that it was unsuccessful
    } else {
        alert("Geolocation not supported.");
    }
}