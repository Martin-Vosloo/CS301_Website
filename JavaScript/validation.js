/* Validation functions for the venue forms */

// Wait for the DOM to be fully loaded
document.addEventListener("DOMContentLoaded", function() {
    
    // --- Booking Form Validation ---
    const coupleNames = document.getElementById("couple-names");
    const bookingEmail = document.getElementById("email");
    const bookingPhone = document.getElementById("phone");
    const password = document.getElementById("password");
    const confirmPassword = document.getElementById("password_conf");

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
            this.classList.add("is-invalid");
            this.classList.remove("is-valid");
        } else {
            this.setCustomValidity("");
            this.classList.add("is-valid");
            this.classList.remove("is-invalid");
        }
    }

    // Function for email validation
    function validate_email() {
        const emailRegex = /^\S+@\S+\.\S+$/;
        if (this.value.trim() === "") {
            this.setCustomValidity("Email address cannot be left blank.");
            this.classList.add("is-invalid");
            this.classList.remove("is-valid");
        } else if (!emailRegex.test(this.value)) {
            this.setCustomValidity("Please enter a valid email address.");
            this.classList.add("is-invalid");
            this.classList.remove("is-valid");
        } else {
            this.setCustomValidity("");
            this.classList.add("is-valid");
            this.classList.remove("is-invalid");
        }
    }

    // Function for phone validation
    function validate_phone() {
        const digitsOnly = this.value.replace(/\D/g, "");
        if (this.value.trim() === "") {
            this.setCustomValidity("Phone number cannot be left blank.");
            this.classList.add("is-invalid");
            this.classList.remove("is-valid");
        } else if (digitsOnly.length !== 10) {
            this.setCustomValidity("The phone number must be exactly 10 digits.");
            this.classList.add("is-invalid");
            this.classList.remove("is-valid");
        } else {
            this.setCustomValidity("");
            this.classList.add("is-valid");
            this.classList.remove("is-invalid");
        }
    }

    // Function for password length validation
    function validate_password_length() {
        if (this.value.length < 8) {
            this.setCustomValidity("Password must be at least 8 characters long.");
            this.classList.add("is-invalid");
            this.classList.remove("is-valid");
        } else {
            this.setCustomValidity("");
            this.classList.add("is-valid");
            this.classList.remove("is-invalid");
        }
    }

    // Function for password matching
    function validate_passwords() {
        if (password.value !== confirmPassword.value) {
            confirmPassword.setCustomValidity("Passwords do not match.");
            confirmPassword.classList.add("is-invalid");
            confirmPassword.classList.remove("is-valid");
        } else {
            confirmPassword.setCustomValidity("");
            confirmPassword.classList.add("is-valid");
            confirmPassword.classList.remove("is-invalid");
        }
    }

    // Toggle password visibility
    function togglePassword() {
        let passwordField = document.getElementById("password");
        if (passwordField.type === "password") {
            passwordField.type = "text";
        } else {
            passwordField.type = "password";
        }
    }
});
