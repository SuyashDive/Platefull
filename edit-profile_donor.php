<?php
// Database connection parameters
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

// Retrieve data from the login table
$sql = "SELECT username, password, number, email, address FROM login";
$result = $conn->query($sql);

// Initialize variables
$username = $password = $number = $email = $address = "";

if ($result->num_rows > 0) {
    // Fetch data from the last row
    $row = $result->fetch_assoc();
    $username = $row["username"];
    $password = $row["password"];
    $number = $row["number"];
    $email = $row["email"];
    $address = $row["address"];
} else {
    echo "0 results";
}

// Free result set
$result->free();

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $username = $_POST['username'];
    $password = $_POST['password'];
    $number = $_POST['number'];
    $email = $_POST['email'];
    $address = $_POST['address'];
    $prefered_pickup_address = $_POST['prefered_pickup_address'];
    $fullname = $_POST['fullname'];
    $other = $_POST['other'];

    // Prepare SQL statements to update data in login and donor_profile tables
    $sql_login = "UPDATE login SET username='$username', password='$password', number='$number', email='$email', address='$address' WHERE username='$username'";
    $sql_profile = "UPDATE donor_profile SET username='$username', password='$password', number='$number', email='$email', address='$address', prefered_pickup_address='$prefered_pickup_address', fullname='$fullname', other='$other' WHERE username='$username'";

    // Execute SQL statements
    if ($conn->query($sql_login) === TRUE && $conn->query($sql_profile) === TRUE) {
        echo "Profile updated successfully";
    } else {
        echo "Error updating profile: " . $conn->error;
    }
}

// Close the database connection
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
            display: block;
            margin-bottom: 5px;
        }
        input[type="text"], input[type="password"], input[type="email"], input[type="tel"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
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
        .goback-btn {
    position: absolute;
    top: 20px;
    left: 20px;
    background-color: #007bff;
    color: #fff;
    padding: 10px 20px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    text-decoration: none; /* Remove underline from anchor */
    font-size: 16px;
    transition: background-color 0.3s ease; /* Add transition effect */
}

.goback-btn:hover {
    background-color: #0056b3; /* Darken the background color on hover */
}

    </style>
</head>
<body>
 <a href="donor_dashboard.php" class="goback-btn">Go Back</a>
    
    <div class="container">
        <h2>Donor Profile</h2>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" value="<?php echo $username; ?>" required>

            <label for="password">Password:</label>
            <input type="password" id="password" name="password" value="<?php echo $password; ?>" required>

            <label for="number">Phone Number:</label>
            <input type="tel" id="number" name="number" value="<?php echo $number; ?>" required>

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" value="<?php echo $email; ?>" required>

            <label for="address">Address:</label>
            <input type="text" id="address" name="address" value="<?php echo $address; ?>" required>
            
            <label for="prefered_pickup_address">Preferred Pickup Address:</label>
            <input type="text" id="prefered_pickup_address" name="prefered_pickup_address" value="" required>
            
            <label for="fullname">Full Name:</label>
            <input type="text" id="fullname" name="fullname" value="" required>
            
            <label for="other">Other:</label>
            <input type="text" id="other" name="other" value="" required>

            <input type="submit" value="Update Profile">
           
        </form>
    </div>
</body>
</html>
