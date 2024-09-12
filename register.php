<?php

include 'database.php';

if (isset($_POST['register-submit'])) {

    if (isset($_POST['register-username']) && isset($_POST['register-email']) && isset($_POST['phone']) && isset($_POST['register-password']) && isset($_POST['confirm-password'])) {
        
        $username = $_POST['register-username'];
        $email = $_POST['register-email'];
        $phone = $_POST['phone'];
        $password = $_POST['register-password'];
        $confirmPassword = $_POST['confirm-password'];

        $username = $_POST['register-username'];
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        $stmt = $conn->prepare("SELECT username FROM users WHERE username = ?");
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $stmt->store_result();
        
        if ($stmt->num_rows > 0) {
            echo "Username already exists!<br>";
            echo "<script>setTimeout(function() { window.location.href = 'login.php'; }, 3000);</script>"; 
            exit();
        } else {
           

            
            $stmt = $conn->prepare("INSERT INTO users (username, email, phone, password) VALUES (?, ?,? , ?)");
            $stmt->bind_param("ssss", $username, $email, $phone, $hashedPassword); 

            if ($stmt->execute()) {
                echo "Registration successful! 1s will redirect you to the login page.<br>";
                echo "<script>setTimeout(function() { window.location.href = 'login.php'; }, 1000);</script>"; 
            } else {
                echo "Error: Could not register user.<br>";
            }
        }

        $stmt->close();
    } else {
        echo "All fields are required!<br>";
    }
}

?>
