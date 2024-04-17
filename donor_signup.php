<?php
// Database connection parameters
$host = "localhost:3307"; // Change this to your MySQL server host
$username = "root"; // Change this to your MySQL username
$password = ""; // Change this to your MySQL password
$database = "platefull"; // Change this to your MySQL database name

// Connect to MySQL database
$conn = new mysqli($host, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $address = $_POST['Address']; // Change to lowercase or camelCase
    $number = $_POST['number'];
   
    // Prepare SQL statement to insert data into Users table
    $sql = "INSERT INTO login (username, email, password, Address, number) VALUES ('$username', '$email', '$password', '$address', '$number')";

    // Execute SQL statement
    if ($conn->query($sql) === TRUE) {
        // Redirect to sign-up success page with success parameter
        header("Location: signup_success.php?success=true");
        exit(); // Stop further execution
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Close database connection
$conn->close();
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Donor Sign Up</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 20px;
        }

        h1 {
            text-align: center;
            color: #333;
        }

        form {
            max-width: 400px;
            margin: 0 auto;
            background: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        label {
            display: block;
            margin-bottom: 8px;
            font-weight: bold;
        }

        input[type="text"],
        input[type="email"],
        input[type="password"],
        input[type="number"] {
            width: 100%;
            padding: 10px;
            margin: 8px 0;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        button[type="submit"] {
            background-color: #4CAF50;
            color: white;
            padding: 12px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            width: 100%;
        }

        button[type="submit"]:hover {
            background-color: #45a049;
        }

        p {
            text-align: center;
        }

        a {
            color: blue;
        }
    </style>
</head>
<body>
    <h1>Donor Sign Up</h1>
    <form action="donor_signup.php" method="POST">
        <label for="username">Username:</label>
        <input type="text" id="username" name="username" required><br><br>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required><br><br>

        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required><br><br>

        <label for="Address">Address:</label>
        <input type="text" id="Address" name="Address" required><br><br>

        <label for="number">Phone Number:</label>
        <input type="number" id="number" name="number" required><br><br>

        <button type="submit">Sign Up</button>
    </form>
    <title>Sign Up Success</title>
   
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
            text-align: center;
        }
        h1 {
            color: #333;
        }
    </style>
</head>
<body>
<div class="container">
        <h1>Sign Up Success</h1>
        <p>You have successfully signed up!</p>
        <p>Redirecting to the login page...</p>
        <script>
            // JavaScript code to redirect to login page after a delay
            setTimeout(function() {
                window.location.href = "login.php"; // Redirect to login.php after 3 seconds
            }, 3000); // 3000 milliseconds = 3 seconds
        </script>
    </div>
    <p>Already have an account? <a href="login.php">Login</a></p>
</body>
