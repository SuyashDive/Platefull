<?php
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data


    // Database connection parameters
    $servername = "localhost:3307"; // Change this to your MySQL server host
    $username = "root"; // Change this to your MySQL username
    $password = ""; // Change this to your MySQL password
    $database = "platefull"; // Change this to your MySQL database name

    // Create connection
    $conn = new mysqli($servername, $username, $password, $database);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

 // Assuming form data is validated and sanitized
$donor_name = $_POST['donor_name'];
$donation_date = date('Y-m-d'); // Current date
$food_type = $_POST['food_type'];
$quantity = $_POST['quantity'];
$pickup_address = $_POST['pickup_address'];
$contact_number = $_POST['contact_number'];
$message = $_POST['message'];

// Insert food donation data into the database
$sql = "INSERT INTO food_donations (donor_name, donation_date, food_type, quantity, pickup_address, contact_number, message) 
        VALUES ('$donor_name', '$donation_date', '$food_type', '$quantity', '$pickup_address', '$contact_number', '$message')";

if ($conn->query($sql) === TRUE) {
    echo "Food donation submitted successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
header("location: confitte.php");
exit;

    // Close database connection
    $conn->close();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Food Donation Form</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 20px;
        }
        .container {
            max-width: 600px;
            margin: auto;
            background: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
        h2 {
            text-align: center;
            color: #333;
        }
        label {
            font-weight: bold;
        }
        input[type="text"], input[type="tel"], textarea {
            width: 100%;
            padding: 10px;
            margin: 8px 0;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }
        input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            padding: 12px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            width: 100%;
        }
        input[type="submit"]:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
<div class="container">
    <h2>Food Donation Form</h2>
    <form action="donation_form.php" method="post">
        <label for="donor_name">Donor Name:</label>
        <input type="text" id="donor_name" name="donor_name" placeholder="Enter Donor's name.." required>

        <label for="contact_number">Contact Number:</label>
        <input type="tel" id="contact_number" name="contact_number" pattern="[0-9]{10}" placeholder="Enter seller's 10-digit contact number.." required>
        
        <label for="quantity">Quantity (in kilograms):</label>
        <input type="text" id="quantity" name="quantity" placeholder="Enter quantity in kilograms.." required>

        <label for="food_type">Food Type:</label>
        <input type="text" id="food_type" name="food_type" placeholder="Enter type of food.." required>

        

        <label for="pickup_address">Pickup Location:</label>
        <textarea id="pickup_address" name="pickup_address" placeholder="Enter pickup location.." style="height:100px" required></textarea>

        <label for="message">Message:</label>
        <input type="text" id="message" name="message" placeholder="Any other details..." required>

        <input type="submit" value="Submit Donation">
    </form>
</div>donation_date

</body>
</html>
