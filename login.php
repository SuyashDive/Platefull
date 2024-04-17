<?php
session_start();

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

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $username = $_POST['username']; // Corrected variable name
    $password = $_POST['password'];

    // Check if the user is an NGO
    $sql = "SELECT * FROM ngo_sign WHERE ngo_name = '$username' AND password = '$password'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // NGO login successful
        $_SESSION['loggedin'] = true;
        $_SESSION['username'] = $username;
        header("Location: ngo_dashboard.php"); // Redirect to NGO dashboard page
        exit();
    }

    // Check if the user is a donor
    $sql = "SELECT * FROM login WHERE username = '$username' AND password = '$password'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Donor login successful
        $_SESSION['loggedin'] = true;
        $_SESSION['username'] = $username;
        header("Location: donor_dashboard.php"); // Redirect to donor dashboard page
        exit();
    }

    // If login is not successful, display an error message
    $error_message = "Invalid username or password";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 20px;
        }
        .container {
            max-width: 400px;
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
        input[type="text"], input[type="password"] {
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
        .error {
            color: red;
        }
    </style>
</head>
<body>

<div class="container">
    <h2>Login</h2>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <label for="username">Username :</label>
        <input type="text" id="username" name="username" required><br><br>

        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required><br><br>

        <input type="submit" value="Login">
        <div class="container">
        
        <p>If no existing account present  </p>
        <p>Go back to <a href="home.php">Home Page</a>.</p>
    </div>
    </form>
    <?php
    if (isset($error_message)) {
        echo '<p class="error">' . $error_message . '</p>';
    }
    ?>
</div>

</body>
</html>
