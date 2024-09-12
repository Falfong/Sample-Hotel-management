

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Booking Confirmation</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            color: #333;
            padding: 20px;
        }

        .container {
            max-width: 800px;
            margin: 0 auto;
            background: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h1 {
            color: #4a90e2;
        }

        p {
            margin: 10px 0;
        }

        a {
            color: #007BFF;
            text-decoration: none;
        }

        a:hover {
            text-decoration: underline;
        }

        .error {
            color: red;
        }
    </style>
</head>
<body>
    <div class="container">

    <?php
include "database.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data from POST request
    $username = isset($_POST['name']) ? $_POST['name'] : '';
    $email = isset($_POST['email']) ? $_POST['email'] : '';
    $phone = isset($_POST['phone']) ? $_POST['phone'] : '';
    $room = isset($_POST['room']) ? $_POST['room'] : '';
    $price = isset($_POST['price']) ? $_POST['price'] : '';
    $checkinDate = isset($_POST['checkinDate']) ? $_POST['checkinDate'] : '';
    $checkoutDate = isset($_POST['checkoutDate']) ? $_POST['checkoutDate'] : '';

    echo "<h1>Booking Confirmation</h1>";
    echo "<p>Username: $username</p>";
    echo "<p>Email: $email</p>";
    echo "<p>Phone: $phone</p>";
    echo "<p>Room: $room</p>";
    echo "<p>Price per Night: RM $price</p>";
    echo "<p>Check-in Date: $checkinDate</p>";
    echo "<p>Check-out Date: $checkoutDate</p>";

    if (empty($checkinDate) || empty($checkoutDate)) {
        echo "<p class='error'>Error: Check-in date and Check-out date are required.</p>";
        exit;
    }

    try {
        $checkinDateObj = new DateTime($checkinDate);
        $checkoutDateObj = new DateTime($checkoutDate);

        if ($checkoutDateObj <= $checkinDateObj) {
            echo "<p class='error'>Error: Check-out date must be after check-in date.</p>";
            exit;
        }

        $interval = $checkinDateObj->diff($checkoutDateObj);
        $numberOfNights = $interval->days;

        // Sanitize the price and calculate the total price
        $price = floatval(preg_replace('/[^\d.]/', '', $price));
        $totalPrice = $price * $numberOfNights;

        echo "<p>Total Nights: $numberOfNights</p>";
        echo "<p><strong>Total Price: RM$totalPrice</strong></p>";

        // Get current date and time for created_at field
        $createdAt = date("Y-m-d H:i:s");

        // Prepare the SQL query
        $sql = "INSERT INTO bookings (username, email, phone, room, price, created_at, checkin_date, checkout_date, number_of_nights, total_price) 
                VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

        if ($stmt = $conn->prepare($sql)) {
            // Bind the parameters to the SQL query
            $stmt->bind_param("ssssdsssii", 
                $username, 
                $email, 
                $phone, 
                $room, 
                $price, 
                $createdAt, 
                $checkinDate, 
                $checkoutDate, 
                $numberOfNights, 
                $totalPrice
            );

            // Execute the statement and check for success
            if ($stmt->execute()) {
                echo "<h2>Thank You for Your Payment!</h2>";
                echo "<p>Your booking is confirmed.</p>";
                echo "<p>If you have any questions, please
                        <a href='tel:+11234567890'>Contact Us</a> ||
                        For assistance with Room Reservations: 
                        <a href='mailto:reservation@Livingstonhotel.com'>Email Us</a>
                    </p>";
            } else {
                echo "<p class='error'>Error executing statement: " . $stmt->error . "</p>";
            }

            // Close the prepared statement
            $stmt->close();
        } else {
            echo "<p class='error'>Error preparing statement: " . $conn->error . "</p>";
        }

        // Close the database connection
        $conn->close();
    } catch (Exception $e) {
        echo "<p class='error'>Error processing dates: " . $e->getMessage() . "</p>";
    }
}
?>


        <p><a href="index.php">Back to Home</a></p>
    </div>
</body>
</html>
