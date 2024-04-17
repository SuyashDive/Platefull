<?php
// Start the session
session_start();

// Check if the logout button has been clicked
if (isset($_POST['logout'])) {
    // Destroy the session and redirect to login page
    session_destroy();
    header("Location: Home.php");
    exit;
}

// HTML and CSS combined with PHP for the logout
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Logout</title>
    <style>
        /* Logout Button Styles */
        .logout-button {
            display: block;
            width: 100px;
            padding: 10px;
            margin: 30px auto;
            background-color: #f44336; /* Red color for logout button */
            color: white;
            text-align: center;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            text-decoration: none;
        }
        .logout-button:hover {
            background-color: #d32f2f; /* Darker red on hover */
        }
    </style>
</head>
<body>
    <form method="post">
        <button type="submit" name="logout" class="logout-button">Logout</button>
    </form>
</body>
</html>
