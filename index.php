<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Livingston Hotel</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<header>
    <img src="https://img.freepik.com/premium-vector/hotel-icon-logo-vector-design-template_827767-3569.jpg?w=740" style="width: 100px; height: 100px;" alt="">
    <div class="navbar">
        <h1>Livingston Hotel</h1>
        <nav>
            <ul>
                <li class="nav-item active">
                    <a class="nav-link" href="#hero">Homepage</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#rooms">Rooms</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#amenities">Amenities</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#location">Location</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#review">review</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="contact.php">Contact Us</a>
                </li>
                <li class="nav-item">
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

                </li>
            </ul>
        </nav>
    </div>
</header>
</body>
</html>

    
    <!-- Hero Section -->
    <section id="hero">
        <div class="hero-content">
            <h2>Welcome to Livingston Hotel – Your Oasis in the Heart of the City</h2>
            <p>Just minutes away from Sandakan Airport, experience unmatched luxury and comfort.</p>
            <a href="#rooms" class="btn">Book Now</a>
        </div>
    </section>
    
    <!-- About the Hotel Section -->
    <section id="about">
        <h2>Discover Livingston Hotel</h2>
        <p>At Livingston Hotel, we pride ourselves on offering elegant rooms, personalized service, and luxurious amenities such as a spa, fitness center, and rooftop bar with breathtaking views.</p>
        <div class="icons">
            <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRSdQBP3moq2lqL0Wrj30IDzEgSVNZjIVRZIw&s" alt="Wi-Fi"> 
            <img src="https://w7.pngwing.com/pngs/526/536/png-transparent-car-park-parking-computer-icons-transport-gratis-others-miscellaneous-rectangle-logo-thumbnail.png" alt="Parking">
            <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSHKaK7yBgS_Dh1W7SbhibumHYXgQiegXavUg&s" alt="Breakfast">
            <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcS8O0KU-5O63g9uMt6ub56SYcUj0zDH17CpmA&s" alt="Pool"> 
        </div>
    </section>
    
    <!-- Rooms & Rates Section -->
    <section id="rooms">
        <h2>Rooms & Rates</h2>
        <div class="room">
            <img src="https://ik.imagekit.io/tvlk/generic-asset/Ixf4aptF5N2Qdfmh4fGGYhTN274kJXuNMkUAzpL5HuD9jzSxIGG5kZNhhHY-p7nw/hotel/asset/20009953-5e62ab3d5bba980bbb896e4529b8da86.jpeg?_src=imagekit&tr=c-at_max,f-jpg,h-460,pr-true,q-80,w-724" alt="Deluxe Room">
            <h3>Deluxe King Room</h3>
            <p>Our simple yet comfortable Deluxe King Room features a King Size Bed, a separate seating area with table and chairs as well as a modern bathroom with walk-in shower. The spacious room is decorated with traditional Malaysian artwork and textiles and is perfect for a business traveller or a couples getaway.</p>
            <a href="DeluxeKingRoom.php" class="btn">Book Now</a>
        </div>
        <div class="room">
            <img src="https://ik.imagekit.io/tvlk/generic-asset/Ixf4aptF5N2Qdfmh4fGGYhTN274kJXuNMkUAzpL5HuD9jzSxIGG5kZNhhHY-p7nw/hotel/asset/20009953-b058f034b32c6803393fe621b6d76823.jpeg?_src=imagekit&tr=c-at_max,f-jpg,h-460,pr-true,q-80,w-724" alt="Suite Room">
            <h3>Deluxe Twin Queen Room</h3>
            <p>Our simple yet comfortable Deluxe Twin Queen Room features 2 Queen Size Beds and a separate seating area as well as a modern bathroom with walk-in shower. Decorated with traditional Malaysian artwork and textiles this room is perfect for a family trip or a getaway with friends.</p>
            <a href="DeluxeQueenTwinRoom.php" class="btn">Book Now</a>
        </div>
        <div class="room">
            <img src="https://hotelmaluri.com/wp-content/uploads/2022/04/some-02.jpg" alt="Suite Room">
            <h3>Deluxe Family Room</h3>
            <p>Perfect for larger families or groups, our spacious and comfortable Family Suite features 3 Queen Size Beds, a modern bathroom with a walk-in Rainforest shower and handheld unit, and a large open seating area featuring traditional Malaysian artwork and textiles. A comfy and homey space for that family or friends getaway in the city.</p>
            <a href="DeluxeFamilyRoom.php" class="btn">Book Now</a>
        </div>
    </section>
    
    <!-- Amenities Section -->
    <section id="amenities">
        <h2>Unmatched Amenities for Every Guest</h2>
        <div class="amenities-grid">
            <div class="amenity">
                <img src="https://w7.pngwing.com/pngs/295/1008/png-transparent-stone-massage-computer-icons-spa-therapy-others-miscellaneous-text-hand.png" alt="Spa">
                <h4>Relaxing Spa</h4>
                <p>Experience luxury treatments to relax and rejuvenate.</p>
            </div>
            <div class="amenity">
                <img src="https://w7.pngwing.com/pngs/170/171/png-transparent-fitness-centre-computer-icons-physical-fitness-psd-gym-miscellaneous-physical-fitness-sport-thumbnail.png" alt="Gym">
                <h4>Fully Equipped Gym</h4>
                <p>Stay fit during your stay with our state-of-the-art fitness facilities.</p>
            </div>
            <div class="amenity">
                <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcS8O0KU-5O63g9uMt6ub56SYcUj0zDH17CpmA&s" alt="Pool">
                <h4>Rooftop Pool</h4>
                <p>Take a dip in our rooftop pool with breathtaking views.</p>
            </div>
            <div class="amenity">
                <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSHKaK7yBgS_Dh1W7SbhibumHYXgQiegXavUg&s" alt="Restaurant">
                <h4>Gourmet Restaurant</h4>
                <p>Enjoy exquisite dining experiences with our international chefs.</p>
            </div>
        </div>
    </section>
    
    <!-- Location & Attractions Section -->
    <section id="location">
        <h2>Explore Our Location</h2>
        <div class="map">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3968.987470102451!2d118.08185060000001!3d5.8573841!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3238db10a34e8c01%3A0xc41e114765ba3eec!2sLivingston%20Hotel%20Sandakan!5e0!3m2!1sen!2smy!4v1725723553223!5m2!1sen!2smy" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
        <p>Just 10 minutes from [Landmark], and a short walk to [Shopping District], our location is perfect for both leisure and business travelers.</p>
    </section>
    
    <!-- Reviews/Testimonials Section -->
    <section id="reviews">
        <h2>What Our Guests Are Saying</h2>
        <div class="reviews-slider">
            <div class="review">
                <p>"Comfortable and cleanliness. The staff was exceedingly polite and kind. They went out of their way to ensure we had everything we needed"- Hamsan.S</p>
                <span>★★★★★</span>
            </div>
            <div class="review">
                <p>"A nice and smooth experience with the hotel. Been here twice already and everything was fine. Just that they aren't any shops within close proximity so you have to walk quite a bit to the nearest town area. Also it would be better if they can provide pool towels for patrons since it was quite a hassle to bring your own towels from the room." - John Smith</p>
                <span>★★★★</span>
            </div>
            <div class="review">
                <p>"The accommodation looked exactly like the picture, spacious, comfy, and super clean. surely will stay again soon" - Mohd.R.B.B</p>
                <span>★★★★★</span>
            </div>
        </div>
    </section>
    
    <!-- Call to Action (CTA) Section -->
    <section id="cta">
        <h2>Register or Login having a booking now!</h2>
        <a href="login.php" class="btn-large">Login/Register</a>
    </section>
    
    <!-- Footer Section -->
    <footer>
        <div class="footer-content">
            <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="http://127.0.0.1:5500/hotel/index.php#rooms">Book a Room</a></li>
                <li><a href="login.php">Login/Register</a></li>
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
