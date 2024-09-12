<?php
// Start the session
session_start();

// Simulate user login process (for example purposes)
// In a real application, this would be handled by a login script
// Setting a session variable as if the user has logged in
// Comment out these lines if you're manually setting login elsewhere
$_SESSION['username'] = 'helloworld'; // User's username after login

// Check if the user is logged in
if (isset($_SESSION['username'])) {
    // User is logged in, show username and logout link
    echo "Hello, " . htmlspecialchars($_SESSION['username']) . "! ";
    echo "<a href='logout.php'>Logout</a>";
} else {
    // User is not logged in, show login link
    echo "<a href='login.php'>Login</a>";
}
?>
