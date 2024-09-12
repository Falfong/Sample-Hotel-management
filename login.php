<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
include 'database.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Hotel Livingston</title>
    <style>
        /* Basic reset */
        * {
            margin: 0;
            box-sizing: border-box;
        }

        html, body {
            height: 100%;
            width: 100%;
            background: #4a90e2;

        }

        body {
            font-family: 'Arial', sans-serif;
            display: flex;
            align-items: center;
            flex-direction: column;
            overflow: auto; /* Allow scrolling */
            padding: 20px;
        }

        .container {
            display: flex;
            align-items: center;
            flex-direction: column;
            padding: 20px;
            background: #ffffff;
            border-radius: 20px;
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.3);
        }


        .button-group {
            display: flex; /* Use flexbox to align items horizontally */
            justify-content: center; /* Center the buttons horizontally */
        }

        .button-group button {
            background-color: #007bff; /* Vibrant Blue */
            color: white;
            border: none;
            padding: 14px 30px;
            border-radius: 30px;
            margin: 10px; /* Margin between buttons */
            cursor: pointer;
            font-size: 1.2rem;
            transition: all 0.3s ease;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.3);
            flex: 1; /* Allow buttons to grow and shrink as needed */
            max-width: 150px; /* Optional: Set a max-width to control button size */
        }

        .button-group button:hover {
            background-color: #0056b3; /* Darker Blue on hover */
        }

        input {
            margin-bottom: 10px;
        }
        .error {
            color: red;
            font-size: 0.9em;
        }
        .valid {
            color: green;
            font-size: 0.9em;
        }

        /* Form styling */
        .input-group {
            display: none; /* Hidden by default */
            width: 350px;
            padding: 20px;
            background-color: #ffffff;
            border-radius: 20px;
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.3);
            margin-top: 20px;
            opacity: 0; /* Invisible initially */
            transition: opacity 0.4s ease; /* Only fade-in effect */
        }

        .input-group.active {
            display: block;
            opacity: 1; /* Make visible */
        }

        .input-group input, .input-group label {
            width: 100%;
            margin-bottom: 15px;
            padding: 12px;
            border: 2px solid #ddd;
            border-radius: 10px;
            font-size: 1rem;
            transition: border-color 0.3s ease;
        }

        .input-group input:focus {
            border-color: #007bff; /* Blue focus */
            outline: none;
            box-shadow: 0 0 5px rgba(0, 123, 255, 0.5);
        }

        .input-group button {
            background-color: #007bff; /* Blue button */
            color: white;
            border: none;
            padding: 12px;
            border-radius: 25px;
            cursor: pointer;
            font-size: 1.1rem;
            transition: background-color 0.3s ease;
            width: 100%;
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.2);
        }

        .input-group button:hover {
            background-color: #0056b3; /* Darker Blue on hover */
        }

        @keyframes fadeInOnly {
            from {
                opacity: 0;
            }
            to {
                opacity: 1;
            }
        }

        /* Center content */
        h3 {
            text-align: center;
            margin-bottom: 20px;
            color: #007bff; /* Blue text */
        }

        .forgot-password {
            display: block;
            text-align: center;
            color: #007bff;
            text-decoration: none;
            margin: 10px 0;
            font-size: 0.9rem;
        }

        .forgot-password:hover {
            text-decoration: underline;
        }

        /* Checkbox styling */
        .checkbox-container {
            display: flex;
            align-items: center;
            justify-content: flex-start; 
            margin-bottom: 15px; 
        }

        .checkbox-container input[type="checkbox"] {
            margin: 0 10px 0 0; 
            width: 20px; 
            height: 20px; 
        }




        /* Responsive Design */
        @media (max-width: 600px) {
            .input-group {
                width: 90%;
            }

            .button-group button {
                font-size: 1rem;
                padding: 10px 20px;
            }
        }
    </style>
</head>
<body>

<div class="button-group">
    <button onclick="showLogin()">Login</button>
    <button onclick="showRegister()">Register</button>
</div>

<form class="input-group" id="login-form" action="auth.php" method="post">
    <h3>Login Form</h3>
    <label for="email">Email:</label>
    <input type="email" id="email" name="email" placeholder="Enter Email" required>
    <div id="emailMessage" class="error">Please enter a valid email address.</div>
    <br>

    <label for="password">Password:</label>
    <input type="password" id="password" name="password" placeholder="Enter Password" required>
    <div id="passwordMessage" class="error">Password must contain at least 1 uppercase letter, 1 lowercase letter, and 1 number.</div>
    <br>
    
    <div class="checkbox-container">
    <input type="checkbox" id="showPassword">
    <label for ="showPassword" onclick="togglePassword()"> Show Password </a></label> 
    </div>
        
    <div class="checkbox-container">
    <input type="checkbox" id="agree">
    <label for="agree" required>I agree to the <a href="terms.html">Terms and Conditions</a></label>
    </div>

    
    <a href="#" class="forgot-password">Forgot Password?</a>

    <button type="submit" name="login-submit">Login</button>

</form>

<form class="input-group" id="register-form" action="register.php" method="post">
    <h3>Register Form</h3>
    
    <label for="register-username">Username:</label>
    <input type="text" id="register-username" name="register-username" placeholder="Enter your username" required>

    <label for="register-email">Email:</label>
    <input type="email" id="register-email" name="register-email" placeholder="Enter your email address" required>
    <div id="register-emailMessage" class="error">Please enter a valid email address.</div>
    <br>

    <label for="phone">Contact Number:</label>
    <input type="tel" id="phone" name="phone" placeholder="Enter your contact number" required>
    <div id="phoneMessage" class="error">Only accept method +60XXXXXXXXX or +60XXXXXXXXXX.</div>
    <br>

    <label for="register-password">Password:</label>
    <input type="password" id="register-password" name="register-password" placeholder="Enter your password" required>
    <div id="register-passwordMessage" class="error">Password must contain at least 1 uppercase letter, 1 lowercase letter, and 1 number.</div>
    <br>
    
    <label for="confirm-password">Confirm Password:</label>
    <input type="password" id="confirm-password" name="confirm-password" placeholder="Re-enter your password" required>
    <div id="confirm-passwordMessage" class="error">Passwords do not match.</div>
    <br>

    <div class="checkbox-container">
    <input type="checkbox" id="register-showPassword">
    <label for="register-showPassword"> Show Password </label>
    </div>

    <div class="checkbox-container">
        <input type="checkbox" id="agree">
        <label for="agree">I agree to the <a href="terms.html">Terms and Conditions</a></label>
    </div> 

    <button type="submit" name="register-submit">Register</button>
</form>


<script>
    function showLogin() {
        document.getElementById('login-form').classList.add('active');
        document.getElementById('register-form').classList.remove('active');
    }

    function showRegister() {
        document.getElementById('register-form').classList.add('active');
        document.getElementById('login-form').classList.remove('active');
    }
</script>


<script>
document.addEventListener("DOMContentLoaded", function() {
    // Function to validate email for registration
    function validateRegisterEmail() {
        var emailField = document.getElementById("register-email");
        var emailMessage = document.getElementById("register-emailMessage");
        var email = emailField.value;

        var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

        if (!emailRegex.test(email)) {
            emailMessage.textContent = "Please enter a valid email address.";
            emailMessage.classList.remove("valid");
            emailMessage.classList.add("error");
        } else {
            emailMessage.textContent = "Email is valid!";
            emailMessage.classList.remove("error");
            emailMessage.classList.add("valid");
        }
    }

    // Function to validate password for registration
    function validateRegisterPassword() {
        var passwordField = document.getElementById("register-password");
        var passwordMessage = document.getElementById("register-passwordMessage");
        var password = passwordField.value;

        var passwordRegex = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[A-Za-z\d]{8,}$/;

        if (!passwordRegex.test(password)) {
            passwordMessage.textContent = "Password must contain at least 1 uppercase letter, 1 lowercase letter, and 1 number.";
            passwordMessage.classList.remove("valid");
            passwordMessage.classList.add("error");
        } else {
            passwordMessage.textContent = "Password is valid!";
            passwordMessage.classList.remove("error");
            passwordMessage.classList.add("valid");
        }
    }

    // Function to confirm password match
    function confirmPasswordMatch() {
        var passwordField = document.getElementById("register-password");
        var confirmPasswordField = document.getElementById("confirm-password");
        var confirmPasswordMessage = document.getElementById("confirm-passwordMessage");
        var password = passwordField.value;
        var confirmPassword = confirmPasswordField.value;

        if (password !== confirmPassword) {
            confirmPasswordMessage.textContent = "Passwords do not match.";
            confirmPasswordMessage.classList.remove("valid");
            confirmPasswordMessage.classList.add("error");
        } else {
            confirmPasswordMessage.textContent = "Passwords match!";
            confirmPasswordMessage.classList.remove("error");
            confirmPasswordMessage.classList.add("valid");
        }
    }

    // Add event listeners for registration
    document.getElementById("register-email").addEventListener("input", validateRegisterEmail);
    document.getElementById("register-email").addEventListener("focus", validateRegisterEmail);
    document.getElementById("register-email").addEventListener("blur", validateRegisterEmail);

    document.getElementById("register-password").addEventListener("input", validateRegisterPassword);
    document.getElementById("register-password").addEventListener("focus", validateRegisterPassword);
    document.getElementById("register-password").addEventListener("blur", validateRegisterPassword);

    document.getElementById("confirm-password").addEventListener("input", confirmPasswordMatch);
    document.getElementById("confirm-password").addEventListener("focus", confirmPasswordMatch);
    document.getElementById("confirm-password").addEventListener("blur", confirmPasswordMatch);
});



document.addEventListener("DOMContentLoaded", function() {
    // Function to validate email for registration
    function validateEmail() {
        var emailField = document.getElementById("email");
        var emailMessage = document.getElementById("emailMessage");
        var email = emailField.value;

        var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

        if (!emailRegex.test(email)) {
            emailMessage.textContent = "Please enter a valid email address.";
            emailMessage.classList.remove("valid");
            emailMessage.classList.add("error");
        } else {
            emailMessage.textContent = "Email is valid!";
            emailMessage.classList.remove("error");
            emailMessage.classList.add("valid");
        }
    }

    // Function to validate password for registration
    function validatePassword() {
        var passwordField = document.getElementById("password");
        var passwordMessage = document.getElementById("passwordMessage");
        var password = passwordField.value;

        var passwordRegex = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[A-Za-z\d]{8,}$/;

        if (!passwordRegex.test(password)) {
            passwordMessage.textContent = "Password must contain at least 1 uppercase letter, 1 lowercase letter, and 1 number.";
            passwordMessage.classList.remove("valid");
            passwordMessage.classList.add("error");
        } else {
            passwordMessage.textContent = "Password is valid!";
            passwordMessage.classList.remove("error");
            passwordMessage.classList.add("valid");
        }
    }


    function validatePhone() {
        var telField = document.getElementById("phone"); // Corrected ID
        var phoneMessage = document.getElementById("phoneMessage"); // Corrected ID
        var phone = telField.value;

        // Updated regex for various formats (10 digits, 11 digits, etc.)
        var phoneRegex = /^\d{10,11}$/;

        if (!phoneRegex.test(phone)) {
            phoneMessage.textContent = "Only accept method +60XXXXXXXXX or +60XXXXXXXXXX.";
            phoneMessage.classList.remove("valid");
            phoneMessage.classList.add("error");
        } else {
            phoneMessage.textContent = "Phone number is valid!";
            phoneMessage.classList.remove("error");
            phoneMessage.classList.add("valid");
        }
    }


    // Add event listeners for registration
    document.getElementById("email").addEventListener("input", validateEmail);
    document.getElementById("email").addEventListener("focus", validateEmail);
    document.getElementById("email").addEventListener("blur", validateEmail);

    document.getElementById("password").addEventListener("input", validatePassword);
    document.getElementById("password").addEventListener("focus", validatePassword);
    document.getElementById("password").addEventListener("blur", validatePassword);

    document.getElementById("phone").addEventListener("input", validatePhone);
    document.getElementById("phone").addEventListener("focus", validatePhone);
    document.getElementById("phone").addEventListener("blur", validatePhone);
});
</script>

<script>
        // Get the checkbox and input field
        const showPasswordCheckbox = document.getElementById('showPassword');
        const passwordInput = document.getElementById('password');

        // Add an event listener for when the checkbox is clicked
        showPasswordCheckbox.addEventListener('change', function() {
            // Check if checkbox is checked
            if (this.checked) {
                // If checked, change input type to text
                passwordInput.type = 'text';
            } else {
                // If unchecked, change input type back to password
                passwordInput.type = 'password';
            }
        });

    // Get the checkbox and password input elements
    const registerShowPasswordCheckbox = document.getElementById('register-showPassword');
    const registerPasswordInput = document.getElementById('register-password');

    // Add an event listener for when the checkbox is clicked
    registerShowPasswordCheckbox.addEventListener('change', function() {
        // Check if checkbox is checked
        if (this.checked) {
            // If checked, change input type to text
            registerPasswordInput.type = 'text';
        } else {
            // If unchecked, change input type back to password
            registerPasswordInput.type = 'password';
        }
    });

        document.addEventListener("DOMContentLoaded", function() {
    // Toggle visibility of password fields
    const showPasswordCheckbox = document.getElementById('showPassword');
    const passwordInput = document.getElementById('password');
    const confirmPasswordInput = document.getElementById('confirm-password'); // Added

    showPasswordCheckbox.addEventListener('change', function() {
        if (this.checked) {
            passwordInput.type = 'text';
            confirmPasswordInput.type = 'text'; // Added
        } else {
            passwordInput.type = 'password';
            confirmPasswordInput.type = 'password'; // Added
        }
    });

    // Toggle visibility of registration password fields
    const registerShowPasswordCheckbox = document.getElementById('register-showPassword');
    const registerPasswordInput = document.getElementById('register-password');
    const registerConfirmPasswordInput = document.getElementById('confirm-password'); // Added

    registerShowPasswordCheckbox.addEventListener('change', function() {
        if (this.checked) {
            registerPasswordInput.type = 'text';
            registerConfirmPasswordInput.type = 'text'; // Added
        } else {
            registerPasswordInput.type = 'password';
            registerConfirmPasswordInput.type = 'password'; // Added
        }
    });
});
</script>

<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
</body>
</html>
