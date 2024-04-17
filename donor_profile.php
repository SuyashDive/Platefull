<?php
$servername = "localhost:3307";
$username = "root";
$password = "";
$database = "platefull";

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Assuming the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Assuming you have validated and sanitized the form data
    $username = $_POST['username'];
    $email = $_POST['email'];
    $address = $_POST['address'];
    $number = $_POST['number'];

    // Insert donor profile record into the database using prepared statement
    $sql = "INSERT INTO donor_profile (username, email, address, number) VALUES (?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssss", $username, $email, $address, $number);

    if ($stmt->execute()) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $stmt->close();
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Donor Profile</title>
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
        p {
            margin: 0;
        }
    </style>
</head>
<body>

<div class="container">
    <h2>Donor Profile</h2>
    <label for="username">Username:</label>
    <p><?php echo isset($username) ? $username : ""; ?></p>
    <input type="text" id="username" name="username" required><br><br>

    <label for="email">Email:</label>
    <p><?php echo isset($email) ? $email : ""; ?></p>
    <input type="text" id="email" name="email" required><br><br>
     
    <label for="address">Address:</label>
    <p><?php echo isset($address) ? $address : ""; ?></p>
    <input type="text" id="Address" name="Address" required><br><br>
    
    <label for="number">Phone Number:</label>
    <p><?php echo isset($number) ? $number : ""; ?></p>
    <input type="text" id="number" name="number" required><br><br>
</div>
<input type="submit" value="Update Profile" name="update_profile" class="btn">
         <a href="home.php" class="delete-btn">Go Back</a>

</body>
</html>
