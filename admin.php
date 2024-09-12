<?php
include "database.php";

$sql = "SELECT * FROM bookings";
$result = $conn->query($sql);

if ($result === FALSE) {
    die("Error: " . $conn->error);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - View Bookings</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f9f9f9;
            color: #333;
        }

        h1 {
            text-align: center;
            font-size: 2rem;
            margin-top: 20px;
        }

        table {
            width: 90%;
            margin: 20px auto;
            border-collapse: collapse;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            background-color: #fff;
        }

        table, th, td {
            border: 1px solid #e0e0e0;
        }

        th, td {
            padding: 12px;
            text-align: left;
            font-size: 0.9rem;
        }

        th {
            background-color: #1976d2;
            color: #fff;
            text-transform: uppercase;
            font-weight: 600;
            font-size: 0.85rem;
        }

        td {
            background-color: #fefefe;
        }

        tr:nth-child(even) td {
            background-color: #f2f2f2;
        }

        td a {
            text-decoration: none;
            color: #1976d2;
            font-weight: 500;
        }

        td a:hover {
            text-decoration: underline;
        }

        a.back-btn {
            display: inline-block;
            margin: 20px auto;
            padding: 10px 20px;
            background-color: #1976d2;
            color: white;
            text-decoration: none;
            text-align: center;
            border-radius: 5px;
            font-size: 0.9rem;
            box-shadow: 0 3px 6px rgba(0, 0, 0, 0.1);
        }

        a.back-btn:hover {
            background-color: #1565c0;
        }

        @media (max-width: 768px) {
            table, th, td {
                font-size: 0.8rem;
            }

            h1 {
                font-size: 1.5rem;
            }
        }
    </style>
</head>
<body>
    <h1>All Bookings</h1>
    
    <?php if ($result->num_rows > 0): ?>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Room</th>
                    <th>Price</th>
                    <th>Start Date</th>
                    <th>End Date</th>
                    <th>Number of Nights</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = $result->fetch_assoc()): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($row['id']); ?></td>
                        <td><?php echo htmlspecialchars($row['username']); ?></td>
                        <td><?php echo htmlspecialchars($row['email']); ?></td>
                        <td><?php echo htmlspecialchars($row['phone']); ?></td>
                        <td><?php echo htmlspecialchars($row['room']); ?></td>
                        <td><?php echo htmlspecialchars(number_format($row['price'], 2)); ?></td>
                        <td><?php echo htmlspecialchars($row['checkin_date']); ?></td>
                        <td><?php echo htmlspecialchars($row['checkout_date']); ?></td>
                        <td><?php echo htmlspecialchars($row['number_of_nights']); ?></td>
                        <td>
                            <a href="editadmin.php?id=<?php echo htmlspecialchars($row['id']); ?>">Edit</a>
                        </td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    <?php else: ?>
        <p>No bookings found.</p>
    <?php endif; ?>
    
    <div style="text-align: center;">
        <a href="index.php" class="back-btn">Back to Homepage</a>
    </div>
</body>
</html>

<?php
$conn->close();
?>
