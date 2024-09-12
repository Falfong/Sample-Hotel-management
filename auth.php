<?php
session_start(); // Start the session

// Include the database connection file
include 'database.php'; 

// Check if the login form was submitted
if (isset($_POST['login-submit'])) {
    // Trim the input to remove extra spaces
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);

    // Check if email and password are not empty
    if (!empty($email) && !empty($password)) {
        // Ensure the database connection is established
        if ($conn) {
            // Prepare the SQL statement to check if the email exists
            $stmt = $conn->prepare("SELECT email, username, password FROM users WHERE email = ?");
            $stmt->bind_param("s", $email); // Bind the input email to the SQL query
            $stmt->execute();
            $stmt->store_result();

            // Check if an account with the provided email exists
            if ($stmt->num_rows === 1) {
                // Bind the result variables
                $stmt->bind_result($db_email, $db_username, $hashed_password);
                $stmt->fetch();

                // Verify the provided password against the hashed password in the database
                if (password_verify($password, $hashed_password)) {
                    // Password is correct, set session variables
                    $_SESSION['email'] = $db_email;
                    $_SESSION['username'] = $db_username; // Add username to the session

                    // Redirect to the protected index page
                    header('Location: index.php');
                    exit(); // Make sure to exit after the redirect
                } else {
                    // If password is incorrect
                    $error = "Incorrect password!";
                }
            } else {
                // If email doesn't exist in the database
                $error = "Email not found!";
            }

            // Close the statement
            $stmt->close();
        } else {
            // If the database connection failed
            $error = "Database connection failed!";
        }
    } else {
        // If email or password is empty
        $error = "Please fill out both fields!";
    }
}
// Close the database connection
$conn->close();
?>

