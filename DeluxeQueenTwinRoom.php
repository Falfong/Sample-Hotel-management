<?php
session_start();
$loggedIn = isset($_SESSION['email']); // Check if the user is logged in
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Room Livingston Hotel</title>
    <link rel="stylesheet" href="style.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }

           h2, h3 {
            text-align: center;
            color: #333;
            margin-top: 20px;
        }

        .slideshow-container {
            position: relative;
            max-width: 800px;
            max-height: 500px;
            margin: auto;
            overflow: hidden;
            border: 2px solid #ddd;
            border-radius: 10px;
        }

        .slide {
            display: none;
        }

        .slide img {
            width: 800px;
            height: 500px;
            border-radius: 10px;
        }

        .prev, .next {
            cursor: pointer;
            position: absolute;
            top: 50%;
            width: auto;
            padding: 16px;
            margin-top: -22px;
            color: #333;
            font-weight: bold;
            font-size: 18px;
            transition: 0.6s ease;
            border-radius: 0 3px 3px 0;
            user-select: none;
        }

        .next {
            right: 0;
            border-radius: 3px 0 0 3px;
        }

        .prev:hover, .next:hover {
            background-color: rgba(0,0,0,0.8);
            color: white;
        }

        .container {
            display: flex;
            max-width: 1200px;
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            border: 1px solid #ddd;
            border-radius: 10px;
            flex-wrap: wrap; /* Ensure it wraps on smaller screens */
        }

        .container > .box {
            flex: 1;
            padding: 20px;
        }

        .container .divider {
            width: 2px;
            background-color: #ddd;
            height: auto;
            margin: 0 20px;
        }

        .box.left {
            text-align: left;
        }

        .box.right {
            text-align: left;
        }

        .box img {
            width: 100%;
            height: auto;
            border-radius: 10px;
        }

        .container strong {
            display: block;
            margin-top: 10px;
            margin-bottom: 5px;
            color: #555;
        }

        .container p {
            margin: 0;
            padding: 0;
            color: #666;
        }

        
    </style>
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

    <h2>Deluxe Twin Queen Room</h2>

    <div class="slideshow-container">

        <div class="slide">
            <img src="https://ik.imagekit.io/tvlk/generic-asset/Ixf4aptF5N2Qdfmh4fGGYhTN274kJXuNMkUAzpL5HuD9jzSxIGG5kZNhhHY-p7nw/hotel/asset/20009953-b058f034b32c6803393fe621b6d76823.jpeg?_src=imagekit&tr=c-at_max,f-jpg,h-460,pr-true,q-80,w-724" alt="">
        </div>

        <div class="slide">
            <img src="https://ik.imagekit.io/tvlk/generic-asset/Ixf4aptF5N2Qdfmh4fGGYhTN274kJXuNMkUAzpL5HuD9jzSxIGG5kZNhhHY-p7nw/hotel/asset/20009953-6f8602440dca27dae69c28711000a9b7.jpeg?_src=imagekit&tr=c-at_max,f-jpg,h-460,pr-true,q-80,w-724" alt="">
        </div>

        <div class="slide">
            <img src="https://ik.imagekit.io/tvlk/generic-asset/dgXfoyh24ryQLRcGq00cIdKHRmotrWLNlvG-TxlcLxGkiDwaUSggleJNPRgIHCX6/hotel/asset/20009953-c09e41d2dbe7fc6c63029fac6d8e47c5.jpeg?_src=imagekit&tr=c-at_max,f-jpg,h-460,pr-true,q-80,w-724" alt="">
        </div>

        <div class="slide">
            <img src="https://ik.imagekit.io/tvlk/generic-asset/dgXfoyh24ryQLRcGq00cIdKHRmotrWLNlvG-TxlcLxGkiDwaUSggleJNPRgIHCX6/hotel/asset/67733904-4000x2666-FIT_AND_TRIM-0c31bac6099bc003f40bd6aeead52fab.jpeg?_src=imagekit&tr=c-at_max,f-jpg,h-460,pr-true,q-80,w-724" alt="">
        </div>

        <div class="slide">
            <img src="https://ik.imagekit.io/tvlk/generic-asset/dgXfoyh24ryQLRcGq00cIdKHRmotrWLNlvG-TxlcLxGkiDwaUSggleJNPRgIHCX6/hotel/asset/67733904-4000x2666-FIT_AND_TRIM-86e12fc52c3f028f609a1a3bdd8e7c51.jpeg?_src=imagekit&tr=c-at_max,f-jpg,h-460,pr-true,q-80,w-724" alt="">
        </div>

        <div class="slide">
            <img src="https://ik.imagekit.io/tvlk/generic-asset/Ixf4aptF5N2Qdfmh4fGGYhTN274kJXuNMkUAzpL5HuD9jzSxIGG5kZNhhHY-p7nw/hotel/asset/20009953-3bd840cb54e6d0fd53ba99832b3dd556.jpeg?_src=imagekit&tr=c-at_max,f-jpg,h-460,pr-true,q-80,w-724" alt="">
        </div>

        <div class="slide">
            <img src="https://ik.imagekit.io/tvlk/generic-asset/dgXfoyh24ryQLRcGq00cIdKHRmotrWLNlvG-TxlcLxGkiDwaUSggleJNPRgIHCX6/hotel/asset/67733904-4000x2666-FIT_AND_TRIM-86f0a346d98c5543c08eee9a25c824bb.jpeg?_src=imagekit&tr=c-at_max,f-jpg,h-460,pr-true,q-80,w-724" alt="">
        </div>

        <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
        <a class="next" onclick="plusSlides(1)">&#10095;</a>

    </div>

    <p style="text-align: center; margin: 20px; color: #555;">
        Our simple yet comfortable Deluxe Twin Queen Room features 2 Queen Size Beds and a separate seating area as well as a modern bathroom with walk-in shower. Decorated with traditional Malaysian artwork and textiles this room is perfect for a family trip or a getaway with friends.
    </p>


    <div class="container">
        <table>
            <tr>
                <th>Room Option(s)</th>
                <th>Guest(s)</th>
                <th>Price/room/night</th>
                <th></th>
            </tr>

            <!-- Row 1 -->
            <tr>
                <td>
                    <b>Deluxe Twin Queen Room</b><br>
                    No Breakfast included <br>
                    <img src="https://icons.veryicon.com/png/o/object/home-icon/bed-7.png" alt="Bed icon" width="15px"> 2 Queen Size Bed
                </td>
                <td>
                    <img src="https://cdn-icons-png.flaticon.com/512/1946/1946429.png" alt="Guest icon" width="15px">
                    <img src="https://cdn-icons-png.flaticon.com/512/1946/1946429.png" alt="Guest icon" width="15px">
                </td>
                <td>
                    <span class="price-strike">RM 350.54</span><br>
                    <b style="color: red;">RM 310.54</b><br>
                    <small>Include taxes & fees</small><br>
                </td>
                <td>
                    <button class="choose-btn" onclick="showForm('Deluxe Twin Queen Room no Breakfast included', 'RM 310.54')">Choose</button><br>
                </td>
            </tr>

            <!-- Row 2 -->
            <tr>
                <td>
                    <b>Deluxe Twin Queen Room</b> <br>
                    Breakfast included for 2 People <br>
                    Non-refundable<br>
                    <img src="https://icons.veryicon.com/png/o/object/home-icon/bed-7.png" alt="Bed icon" width="15px"> 2 Queen Size Bed
                </td>
                <td>
                    <img src="https://cdn-icons-png.flaticon.com/512/1946/1946429.png" alt="Guest icon" width="15px">
                    <img src="https://cdn-icons-png.flaticon.com/512/1946/1946429.png" alt="Guest icon" width="15px">
                </td>
                <td>
                    <span class="price-strike">RM 386.21</span><br>
                    <b style="color: red;">RM 325.56</b><br>
                    <small>Include taxes & fees</small><br>
                </td>
                <td>
                    <button class="choose-btn" onclick="showForm('Deluxe Twin Queen Room for 2 People Breakfast included', 'RM 325.56')">Choose</button><br>
                </td>
            </tr>

            <!-- Row 3 -->
            <tr>
                <td>
                    <b>Deluxe Twin Queen Room</b><br>
                    Special Breakfast included for 4 People<br>
                    Non-refundable<br>
                    <img src="https://icons.veryicon.com/png/o/object/home-icon/bed-7.png" alt="Bed icon" width="15px"> 2 Queen Size Bed
                </td>
                <td>
                    <img src="https://cdn-icons-png.flaticon.com/512/1946/1946429.png" alt="Guest icon" width="15px"> 
                    <img src="https://cdn-icons-png.flaticon.com/512/1946/1946429.png" alt="Guest icon" width="15px"> 
                    <img src="https://cdn-icons-png.flaticon.com/512/1946/1946429.png" alt="Guest icon" width="15px"> 
                    <img src="https://cdn-icons-png.flaticon.com/512/1946/1946429.png" alt="Guest icon" width="15px"> 
                </td>
                <td>
                    <span class="price-strike">RM 447.88</span><br>
                    <b style="color: red;">RM 357.50</b><br>
                    <small>Include taxes & fees</small><br>
                </td>
                <td>
                    <button class="choose-btn" onclick="showForm('Deluxe Twin Queen Room for 4 People Special Breakfast included', 'RM 357.50')">Choose</button>
                </td>
            </tr>
        </table>

    </div>

    <div class="container">
        <div class="box left">
            <strong>Room Features</strong>
            <p>
                35 square meters<br>
                Air-Conditioned <br>
                Seating area with table and 2 chairs<br>
                Non-Smoking
            </p>
            
            <strong>Beds & Bedding</strong>
                <p> 
                    Maximum Occupancy: 2 <br>
                    1 King Bed <br>
                    Cribs Available for Children
                </p>
            
            <strong>Food and Beverage</strong>
                <p>
                    Room Service Available<br>
                    Bottled water on arrival<br>
                    Tea & Coffee making facilities<br>
                    Mini Refrigerator
                </p>

            <strong>Entertainment</strong>
            <p>LCD TV with local channels</p>
        </div>

        

        <div class="box right">
            <strong>Bathroom Features</strong>
            <p>
                Walk-In Rainforest Shower with Handheld Unit <br>
                Toilet with Handheld Bidet <br>
                Shampoo and Body Wash <br>
                Shower Cap <br>
                Hair Dryer <br>
                Slippers
            </p>
            
            <strong>Internet and Phones</strong>
            <p>
                Telephone <br>
                High-Speed WiFi
            </p>
            
            <strong>Furnishings</strong>
            <p>
                Iron and Ironing Board <br>
                Safe <br>
                Luggage Rack <br>
                Towel Rack
            </p>
            
            <strong>Hospitality Services</strong>
            <p>
                1 Complimentary Car Parking Space per Room <br>
                Laundry and Dry Cleaning Service available (chargeable)
            </p>
        </div>
    </div>

    
    <div class="container">
        <h3 style="text-align: center; width: 100%;">Some Helpful Facts</h3>
        <div class="box left">
            <strong>Check-in/Check-out Time</strong>
            <p>
                Check-in from: 3.00pm <br>
                Check-out until: 12.00pm 
            </p>
                
            <strong>Services and Convenience</strong>
                <p>
                    Safety Deposit Box <br>
                    Facilities for Disabled Guests <br>
                    Luggage Storage <br>
                </p>

            <strong>Getting Around</strong>
                <p>
                    Harbour Mall Sandakan: 3.9km <br>
                    Puu Jih Shih Buddhist Temple: 6.2km <br>
                    Sandakan Airport (SDK): 7.8km
                </p>
        </div>
        
        <div class="box right">
            <img src="https://hotelmaluri.com/wp-content/uploads/2022/04/some-01.jpg" style="width:335px; height:335px;" alt="">
        </div>
    </div>

    <div class="overlay" id="formOverlay">
        <div class="form-container">
            <button class="close-btn" onclick="hideForm()">X</button>
            <h3>Enter Your Details</h3>
            <form id="payment-form" action="confirmation.php" method="POST">
                <label for="name">Name:</label>
                <input type="text" id="name" name="name" required><br>

                <label for="email">Email:</label>
                <input type="email" id="email" name="email" required><br>

                <label for="phone">Phone Number:</label>
                <input type="tel" id="phone" name="phone" required><br>

                <label for="checkinDate">Check-in Date:</label>
                <input type="date" id="checkinDate" name="checkinDate" required> <br>
                <label for="checkoutDate">Check-out Date:</label>
                <input type="date" id="checkoutDate" name="checkoutDate" required> <br>
 
                <p><strong>Room Selected:</strong> <span id="selectedRoom">Deluxe Suite</span></p>
                <input type="hidden" id="room" name="room" value=""> <!-- Ensure this has a value -->

                <p><strong>Total Price:</strong> <span id="totalPrice"></span></p>
                <input type="hidden" id="price" name="price" value=""> <!-- Ensure this has a value -->
                
                <p><strong>Payment Method: Only Cash are accepted!!</strong> <br> </p>

                <button type="submit">Pay Now</button>
            </form>
        </div>
    </div>


    <script>
        let slideIndex = 0;
        showSlides();

        function showSlides() {
            let slides = document.getElementsByClassName("slide");
            for (let i = 0; i < slides.length; i++) {
                slides[i].style.display = "none";
            }
            slides[slideIndex].style.display = "block";
        }

        function plusSlides(n) {
            let slides = document.getElementsByClassName("slide");
            slideIndex += n;
            if (slideIndex >= slides.length) { slideIndex = 0; }
            if (slideIndex < 0) { slideIndex = slides.length - 1; }
            showSlides();
        }

        function autoSlide() {
            plusSlides(1);
            setTimeout(autoSlide, 2000); // Change slide every 2 seconds
        }

        autoSlide(); // Start auto sliding

        let loggedIn = <?php echo json_encode($loggedIn); ?>;

        function showForm(roomType, price) {
            if (loggedIn) {
                document.getElementById('selectedRoom').textContent = roomType;
                document.getElementById('room').value = roomType;
                document.getElementById('totalPrice').textContent = price;
                document.getElementById('price').value = price;

                document.getElementById('formOverlay').style.display = 'flex';
                document.querySelector(".form-container").style.display = "block";
            } else {
                alert('You need to log in to view this form.');
            }
        }

        function hideForm() {
            document.getElementById('formOverlay').style.display = 'none';
            document.querySelector(".form-container").style.display = "none";
        }

        document.addEventListener('DOMContentLoaded', function () {
            const startDateInput = document.getElementById('startDate');
            const endDateInput = document.getElementById('endDate');

            function validateDates() {
                const startDate = new Date(startDateInput.value);
                const endDate = new Date(endDateInput.value);

                if (endDate <= startDate) {
                    endDateInput.setCustomValidity('End date must be after start date.');
                } else {
                    endDateInput.setCustomValidity('');
                }
            }

            startDateInput.addEventListener('change', validateDates);
            endDateInput.addEventListener('change', validateDates);
        });



    document.addEventListener("DOMContentLoaded", function() {
        const room = document.getElementById('selectedRoom').innerText;
        const price = parseFloat(document.getElementById('totalPrice').innerText); // Convert price to a float

        document.getElementById('room').value = room;
        document.getElementById('price').value = price;

        // Optional: Log the values to check if they're being set correctly
        console.log('Room:', room);
        console.log('Price:', price);
    });
    </script>


    
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
