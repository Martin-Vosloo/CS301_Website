/* Validation functions for the venue forms */

// Wait for the DOM to be fully loaded
document.addEventListener("DOMContentLoaded", function() {
    
    // --- Booking Form Validation ---
    const coupleNames = document.getElementById("couple-names");
    const bookingEmail = document.getElementById("email");
    const bookingPhone = document.getElementById("phone");

    if (coupleNames) coupleNames.addEventListener("input", validate_names);
    if (bookingEmail) bookingEmail.addEventListener("input", validate_email);
    if (bookingPhone) bookingPhone.addEventListener("input", validate_phone);
    if (password) password.addEventListener("input", validate_password_length);
    if (password && confirmPassword) {
        password.addEventListener("input", validate_passwords);
        confirmPassword.addEventListener("input", validate_passwords);
    }

    // Function for couple names validation
    function validate_names() {
        if (this.value.trim() === "") {
            this.setCustomValidity("Please enter the names of the couple.");
            this.style.borderColor = "red";
        } else {
            this.setCustomValidity(""); // Clear error
            this.style.borderColor = "#ccc";
        }
    }

    // Function for email validation
    function validate_email() {
        const emailRegex = /^\S+@\S+\.\S+$/;
        if (this.value.trim() === "") {
            this.setCustomValidity("Email address cannot be left blank.");
            this.style.borderColor = "red";
        } else if (!emailRegex.test(this.value)) {
            this.setCustomValidity("Please enter a valid email address.");
            this.style.borderColor = "red";
        } else {
            this.setCustomValidity("");
            this.style.borderColor = "#ccc";
        }
    }

    // Function for phone validation
    function validate_phone() {
        const digitsOnly = this.value.replace(/\D/g, ""); // Remove non-digits
        if (this.value.trim() === "") {
            this.setCustomValidity("Phone number cannot be left blank.");
            this.style.borderColor = "red";
        } else if (digitsOnly.length !== 10) {
            this.setCustomValidity("The phone number must be exactly 10 digits.");
            this.style.borderColor = "red";
        } else {
            this.setCustomValidity("");
            this.style.borderColor = "#ccc";
        }
    }

    // --- Sign-Up Password Matching ---
    const password = document.getElementById("password");
    const confirmPassword = document.getElementById("password_conf");

    if (password && confirmPassword) {
        function validate_passwords() {
            if (password.value !== confirmPassword.value) {
                confirmPassword.setCustomValidity("Passwords do not match.");
            } else {
                confirmPassword.setCustomValidity("");
            }
        }
        password.addEventListener("input", validate_passwords);
        confirmPassword.addEventListener("input", validate_passwords);
    }
    
    /* A function called togglePassword(): 
       The function creates an eye icon at the edge of the password box.
       The user can click it to see their password previously inputted.
       The function switches between data types changing from the actually password,
       This is like a show and hide feature.
    */
    function togglePassword() {
        let passwordField = document.getElementById("password");

        if (passwordField.type === "password") {
            passwordField.type = "text";
        } else {
            passwordField.type = "password";
        }
        }


});