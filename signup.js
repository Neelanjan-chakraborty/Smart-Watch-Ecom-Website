function validateForm() {
    // Check if password and confirm password match
    event.preventDefault(); // Prevent default form submission
    var password = document.getElementById("password").value;
    var confirmPassword = document.getElementById("confirmPassword").value;
    
    if (password !== confirmPassword) {
        showError("Passwords do not match");
        return false;
    }
    
    // Check password strength
    var passwordStrength = document.getElementById("passwordStrength").textContent;
    if (passwordStrength === "Weak" || passwordStrength === "") {
        showError("Password is too weak");
        return false;
    }
    
    return true; // Form submission allowed
        var formData = new FormData(document.querySelector(".login-form"));

    fetch("signup.php", {
        method: "POST",
        body: formData
    })
    .then(response => response.text())
    .then(result => {
    if (result === 'success') {
        // Successful signup
        window.location.href = 'index.html'; // Redirect to a success page if needed
    } else if (result === 'error') {
        // Error during signup
        const dialog = document.getElementById('custom-dialog');
        const dialogMessage = document.getElementById('custom-dialog-message');
        dialogMessage.textContent = 'An error occurred. Please try again.';
        dialog.style.display = 'flex';

        const dialogButton = document.getElementById('custom-dialog-button');
        dialogButton.addEventListener('click', () => {
            dialog.style.display = 'none';
        })
        .catch(error => {
            console.error('Error:', error);
        });
    }

function showError(message) {
    // Show error message using your custom dialog or alert
    // For example, using the custom dialog you provided
    var dialog = document.getElementById("custom-dialog");
    var messageElement = document.getElementById("custom-dialog-message");
    messageElement.textContent = message;
    dialog.style.display = "flex";
}

function checkPasswordStrength() {
    var password = document.getElementById("password").value;
    var strengthIndicator = document.getElementById("passwordStrength");
    var strength = 0;

    if (password.match(/[a-z]+/)) {
        strength += 1;
    }
    if (password.match(/[A-Z]+/)) {
        strength += 1;
    }
    if (password.match(/[0-9]+/)) {
        strength += 1;
    }
    if (password.length >= 8) {
        strength += 1;
    }

    if (strength === 0) {
        strengthIndicator.textContent = "";
    } else if (strength === 1) {
        strengthIndicator.textContent = "Weak";
        strengthIndicator.className = "password-strength weak";
    } else if (strength === 2) {
        strengthIndicator.textContent = "Medium";
        strengthIndicator.className = "password-strength medium";
    } else if (strength === 3) {
        strengthIndicator.textContent = "Strong";
        strengthIndicator.className = "password-strength strong";
    } else {
        strengthIndicator.textContent = "Very Strong";
        strengthIndicator.className = "password-strength strong";
    }
}

function checkPasswordMatch() {
    var password = document.getElementById("password").value;
    var confirmPassword = document.getElementById("confirmPassword").value;
    var confirmPasswordField = document.getElementById("confirmPassword");

    if (password === confirmPassword) {
        confirmPasswordField.style.borderColor = "green";
    } else {
        confirmPasswordField.style.borderColor = "red";
    }
}