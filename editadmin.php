<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Booking</title>
    <style>
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

        form {
            margin-top: 20px;
        }

        input, select {
            padding: 10px;
            width: 100%;
            margin: 10px 0;
        }

        button {
            padding: 10px 20px;
            background-color: #4a90e2;
            color: #fff;
            border: none;
            cursor: pointer;
        }

        button:hover {
            background-color: #357ABD;
        }

        .error {
            color: red;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Edit Booking</h1>

        <?php
        // Include database connection
        include "database.php";

        // Check if booking ID is provided
        if (isset($_GET['id'])) {
            $bookingId = $_GET['id'];

            // Fetch booking details from the database
            $sql = "SELECT * FROM bookings WHERE id = ?";
            if ($stmt = $conn->prepare($sql)) {
                $stmt->bind_param("i", $bookingId);
                $stmt->execute();
                $result = $stmt->get_result();

                if ($result->num_rows > 0) {
                    $booking = $result->fetch_assoc();
                } else {
                    echo "<p class='error'>No booking found with ID $bookingId</p>";
                    exit;
                }
                $stmt->close();
            } else {
                echo "<p class='error'>Error fetching booking: " . $conn->error . "</p>";
                exit;
            }
        } else {
            echo "<p class='error'>No booking ID provided.</p>";
            exit;
        }

        // Handle form submission for updating booking
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Get updated data from the form
            $username = $_POST['name'];
            $email = $_POST['email'];
            $phone = $_POST['phone'];
            $room = $_POST['room'];
            $price = floatval($_POST['price']);
            $checkinDate = $_POST['checkinDate'];
            $checkoutDate = $_POST['checkoutDate'];

            // Validate dates
            $checkinDateTime = DateTime::createFromFormat('Y-m-d', $checkinDate);
            $checkoutDateTime = DateTime::createFromFormat('Y-m-d', $checkoutDate);

            if ($checkinDateTime && $checkoutDateTime) {
                // Format the dates to ensure they are stored in YYYY-MM-DD format
                $checkinDate = $checkinDateTime->format('Y-m-d');
                $checkoutDate = $checkoutDateTime->format('Y-m-d');
            } else {
                echo "<p class='error'>Invalid date format. Please use YYYY-MM-DD.</p>";
                exit;
            }

            // Calculate the number of nights
            $interval = $checkinDateTime->diff($checkoutDateTime);
            $numberOfNights = $interval->days;

            if ($numberOfNights <= 0) {
                echo "<p class='error'>Check-out date must be later than check-in date.</p>";
                exit;
            }

            // Calculate total price
            $totalPrice = $numberOfNights * $price;

            // Update booking details in the database
            $sql = "UPDATE bookings SET username = ?, email = ?, phone = ?, room = ?, price = ?, checkin_date = ?, checkout_date = ?, number_of_nights = ?, total_price = ? WHERE id = ?";
            if ($stmt = $conn->prepare($sql)) {
                // Bind parameters and execute the statement
                $stmt->bind_param("ssssdsdidi", $username, $email, $phone, $room, $price, $checkinDate, $checkoutDate, $numberOfNights, $totalPrice, $bookingId);

                if ($stmt->execute()) {
                    echo "<p>Booking updated successfully.</p>";
                } else {
                    echo "<p class='error'>Error updating booking: " . $stmt->error . "</p>";
                }

                $stmt->close();
            } else {
                echo "<p class='error'>Error preparing statement: " . $conn->error . "</p>";
            }
        }

        // Close the database connection
        $conn->close();
        ?>

        <!-- Display booking details in a form for editing -->
        <form method="POST">
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" value="<?php echo htmlspecialchars($booking['username']); ?>" required>

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" value="<?php echo htmlspecialchars($booking['email']); ?>" required>

            <label for="phone">Phone:</label>
            <input type="text" id="phone" name="phone" value="<?php echo htmlspecialchars($booking['phone']); ?>" required>

            <label for="room">Room:</label>
            <input type="text" id="room" name="room" value="<?php echo htmlspecialchars($booking['room']); ?>" required>

            <label for="price">Price per Night (RM):</label>
            <input type="text" id="price" name="price" value="<?php echo htmlspecialchars($booking['price']); ?>" required>

            <label for="checkinDate">Check-in Date:</label>
            <input type="date" id="checkinDate" name="checkinDate" value="<?php echo htmlspecialchars($booking['checkin_date']); ?>" required>

            <label for="checkoutDate">Check-out Date:</label>
            <input type="date" id="checkoutDate" name="checkoutDate" value="<?php echo htmlspecialchars($booking['checkout_date']); ?>" required>

            <button type="submit">Update Booking</button>
        </form>

        <p><a href="admin.php">Back to Admin Dashboard</a></p>
    </div>
</body>



<script>
    document.addEventListener('DOMContentLoaded', function () {
    const checkinDateInput = document.getElementById('checkinDate');
    const checkoutDateInput = document.getElementById('checkoutDate');

    function validateDates() {
        const checkinDate = new Date(checkinDateInput.value);
        const checkoutDate = new Date(checkoutDateInput.value);

        if (checkoutDate <= checkinDate) {
            checkoutDateInput.setCustomValidity('Check-out date must be after check-in date.');
        } else {
            checkoutDateInput.setCustomValidity('');
        }
    }

    checkinDateInput.addEventListener('change', validateDates);
    checkoutDateInput.addEventListener('change', validateDates);
});

</script>
</html>
