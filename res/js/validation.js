const firstNameInput = document.querySelector('input[name="fname"]');
const lastNameInput = document.querySelector('input[name="lname"]');
const emailInput = document.querySelector('input[name="email"]');
const passwordInput = document.querySelector('input[name="password"]');
const confirmPasswordInput = document.querySelector('input[name="confirmPassword"]');
const signupButton = document.getElementById('signupButton'); // Get the signup button element


document.addEventListener('DOMContentLoaded', function () {
  // Disable the signup button initially
  signupButton.disabled = true;
  

  firstNameInput.addEventListener('input', function () {
    validateFirstName();
    updateSignupButtonState(); // Call this function to update button state and appearance
  });

  lastNameInput.addEventListener('input', function () {
    validateLastName();
    updateSignupButtonState(); // Call this function to update button state and appearance
  });

  emailInput.addEventListener('input', function () {
    validateEmail();
    updateSignupButtonState(); // Call this function to update button state and appearance
  });

  passwordInput.addEventListener('input', function () {
    validatePassword();
    updateSignupButtonState(); // Call this function to update button state and appearance
  });

  confirmPasswordInput.addEventListener('input', function () {
    validateConfirmPassword();
    updateSignupButtonState(); // Call this function to update button state and appearance
  });


  const passwordToggle = document.getElementById('password-toggle');
  const confirmPasswordToggle = document.getElementById('confirmPassword-toggle');

  passwordToggle.addEventListener('click', togglePasswordVisibility);
  confirmPasswordToggle.addEventListener('click', toggleConfirmPasswordVisibility);

});


function updateSignupButtonState() {
  const firstNameValid = validateFirstName();
  const lastNameValid = validateLastName();
  const emailValid = validateEmail();
  const passwordValid = validatePassword();
  const confirmPasswordValid = validateConfirmPassword();
  console.log('firstNameValid:', firstNameValid);
  console.log(' lastNameValid :', lastNameValid);
  console.log('emailValid :', emailValid);
  console.log('passwordValid:', passwordValid);
  console.log('confirmPasswordValid:', confirmPasswordValid);

  const allValid = firstNameValid && lastNameValid && emailValid && passwordValid && confirmPasswordValid;

  // Enable signup button only if all validations are met
  signupButton.disabled = !allValid;

  // Change button color based on its state
  if (signupButton.disabled) {
    signupButton.style.backgroundColor = 'grey'; // Grey out when disabled
  } else {
    signupButton.style.backgroundColor = 'yellow'; // Yellow when enabled
  }

  // Log button state to console
  console.log('Signup button disabled:', signupButton.disabled);
}


// Validation functions (same as before)
function validateFirstName() {
  const firstNameInput = document.querySelector('input[name="fname"]');
  const firstName = firstNameInput.value.trim();
  const errorElement = document.querySelector('#error-fname');
  
  if (firstName === '') {
    errorElement.textContent = 'First name is required.';
    return false; // Validation failed
  } else {
    errorElement.textContent = '';
    return true; // Validation succeeded
  }
}

function validateLastName() {
  const lastNameInput = document.querySelector('input[name="lname"]');
  const lastName = lastNameInput.value.trim();
  const errorElement = document.querySelector('#error-lname');
  
  if (lastName === '') {
    errorElement.textContent = 'Last name is required.';
    return false;
  } else {
    errorElement.textContent = '';
    return true
  }
}

function validateEmail() {
  const emailInput = document.querySelector('input[name="email"]');
  const email = emailInput.value.trim();
  const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
  const errorElement = document.querySelector('#error-email');
  
  if (!emailRegex.test(email)) {
    errorElement.textContent = 'Please enter a valid email address.';
    return false;
  } else {
    errorElement.textContent = '';
    return true;
  }
}

function validatePassword() {
  const passwordInput = document.querySelector('input[name="password"]');
  const password = passwordInput.value;
  const errorElement = document.querySelector('#error-password');
  
  if (password.length < 8 || !/[a-z]/.test(password) || !/[A-Z]/.test(password) || !/[0-9]/.test(password) || !/[!@#$%^&*]/.test(password)) {
    errorElement.textContent = 'Password must be at least 8 characters long and include lowercase, uppercase, number, and special characters.';
    return false;
  } else {
    errorElement.textContent = '';
    return true;
  }
}

function validateConfirmPassword() {
  const passwordInput = document.querySelector('input[name="password"]');
  const confirmPasswordInput = document.querySelector('input[name="confirmPassword"]');
  const confirmPassword = confirmPasswordInput.value;
  const errorElement = document.querySelector('#error-confirmPassword');
  
  if (confirmPassword !== passwordInput.value) {
    errorElement.textContent = 'Passwords do not match.';
    return false;
  } else {
    errorElement.textContent = '';
    return true;
  }
}



// Toggle password visibility functions (same as before)
function togglePasswordVisibility() {
  const passwordInput = document.querySelector('input[name="password"]');
  const passwordToggle = document.getElementById('password-toggle');
  
  if (passwordInput.type === 'password') {
    passwordInput.type = 'text';
    passwordToggle.classList.add('active');
  }
}

function toggleConfirmPasswordVisibility() {
  const confirmPasswordInput = document.querySelector('input[name="confirmPassword"]');
  const confirmPasswordToggle = document.getElementById('confirmPassword-toggle');
  
  if (confirmPasswordInput.type === 'password') {
    confirmPasswordInput.type = 'text';
    confirmPasswordToggle.classList.add('active');
  } else {
    confirmPasswordInput.type = 'password';
    confirmPasswordToggle.classList.remove('active');
  }
}

const passwordField = document.getElementById('password');
const passwordIndicators = document.getElementById('password-indicators');
const lowercaseIndicator = document.getElementById('indicator-lowercase');
const uppercaseIndicator = document.getElementById('indicator-uppercase');
const numberIndicator = document.getElementById('indicator-number');
const specialIndicator = document.getElementById('indicator-special');
const lengthIndicator = document.getElementById('indicator-length');

passwordField.addEventListener('input', () => {
  const password = passwordField.value;
  if (password.length > 0) {
    passwordIndicators.style.display = 'flex'; // Show indicators when password has content
  } else {
    passwordIndicators.style.display = 'none'; // Hide indicators when password is empty
  }
  const hasLowercase = /[a-z]/.test(password);
  const hasUppercase = /[A-Z]/.test(password);
  const hasNumber = /[0-9]/.test(password);
  const hasSpecial = /[!@#$%^&*]/.test(password);
  const hasLength = password.length >= 8;

  updateIndicator(lowercaseIndicator, hasLowercase);
  updateIndicator(uppercaseIndicator, hasUppercase);
  updateIndicator(numberIndicator, hasNumber);
  updateIndicator(specialIndicator, hasSpecial);
  updateIndicator(lengthIndicator, hasLength);


});

function updateIndicator(indicator, isValid) {
  indicator.classList.toggle('passed', isValid);
  indicator.classList.toggle('failed', !isValid);
}


