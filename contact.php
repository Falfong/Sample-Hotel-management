<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us</title>
    <link rel="stylesheet" href="style.css">

    
</head>
<body>
<header>
    <img src="https://img.freepik.com/premium-vector/hotel-icon-logo-vector-design-template_827767-3569.jpg?w=740" style="width: 100px; height: 100px;" alt="">
    <div class="navbar">
        <h1>Livingston Hotel</h1>
        <nav>
            <ul>
                <li><a href="index.php">Homepage</a></li>
                <li><a href="DeluxeKingRoom.php">Deluxe King Room</a></li>
                <li><a href="DeluxeQueenTwinRoom.php">Deluxe Twin Queen Room</a></li>
                <li><a href="DeluxeFamilyRoom.php">Deluxe Family Room</a></li>
                <li><a href="contact.php">Contact Us</a></li>
                <?php
                    session_start(); // Ensure session is started

                    // Check if email is set in session to determine if user is logged in
                    if (isset($_SESSION['email'])):
                        // Check if username is set before using it
                        $username = isset($_SESSION['username']) ? $_SESSION['username'] : 'Guest'; // Fallback to 'Guest' if not set
                    ?>
                        <ul>
                            <li><a href="#"><?php echo htmlspecialchars($username); ?></a></li>
                            <li><a href="logout.php">Logout</a></li>
                        </ul>
                    <?php else: ?>
                        <ul>
                            <li><a href="login.php">Login/Register</a></li>
                        </ul>
                    <?php endif; ?>
            </ul>
        </nav>
    </div>
</header>
    <h2>Contact Us</h2>
        <section id="contact">
            <h3>Our capable team is always ready to assist you.</h3>
                <p>Call us on: <a href="tel:(123) 456-7890">Contact Us</a> 
                <br>or
                <br>For assistance with Room Reservations: <a href="mailto:reservation@Livingstonhotel.com">Email Us</a></p>
        </section>

        <div class="map" style="margin: 0 auto; text-align: center ;width: 80%; height: 400px; border: none; border-radius: 10px; padding-bottom: 100px;">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3968.987470102451!2d118.08185060000001!3d5.8573841!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3238db10a34e8c01%3A0xc41e114765ba3eec!2sLivingston%20Hotel%20Sandakan!5e0!3m2!1sen!2smy!4v1725723553223!5m2!1sen!2smy" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>

     <!-- Footer Section -->
     <footer>
        <div class="footer-content">
            <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="http://127.0.0.1:5500/hotel/index.php#rooms">Book a Room</a></li>
                <li><a href="contact.php">Contact</a></li>
                <li><a href="feedback.php">Feedback</a></li>
            </ul>
            <p>Call us on: <a href="tel:(123) 456-7890">Contact Us</a> || For assistance with Room Reservations: <a href="mailto:reservation@Livingstonhotel.com">Email Us</a></p>
            <div class="social-icons">
                <a href="https://www.facebook.com/livingstonhotel.official"><img src="https://upload.wikimedia.org/wikipedia/commons/thumb/c/cd/Facebook_logo_%28square%29.png/900px-Facebook_logo_%28square%29.png" alt="Facebook"></a>
                <a href="https://www.instagram.com/livingstonhotel/"><img src="https://upload.wikimedia.org/wikipedia/commons/thumb/a/a5/Instagram_icon.png/768px-Instagram_icon.png" alt="Instagram"></a>
                <a href="https://www.google.com/maps/place/Livingston+Hotel+Sandakan/@5.8573841,118.0792757,17z/data=!4m9!3m8!1s0x3238db10a34e8c01:0xc41e114765ba3eec!5m2!4m1!1i2!8m2!3d5.8573841!4d118.0818506!16s%2Fg%2F11c1w0y3kp?entry=ttu&g_ep=EgoyMDI0MDkwNC4wIKXMDSoASAFQAw%3D%3D"><img src="https://cdn4.iconfinder.com/data/icons/logos-brands-in-colors/150/google-maps-512.png" alt="Google Map"></a>
            </div>
        </div>
    </footer>
</body>
</html>