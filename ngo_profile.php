
<?php
session_start();

// Check if the user is logged in, otherwise redirect to login page
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] != true) {
    header("location: login.php");
    exit;
}

// Database credentials
$servername = "localhost:3307";
$username = "root";
$password = "";
$database = "platefull";

// Create database connection
$conn = new mysqli($servername, $username, $password, $database);

// Check database connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Initialize variables
$ngo_name = $email = $address = $contact_number = $about_ngo = $ngo_url = $other_info = "";

// Check if the form has been submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data and sanitize inputs
    $ngo_name = $_POST['ngo_name'];
    $email = $_POST['email'];
    $address = $_POST['address'];
    $contact_number = $_POST['contact_number'];
    $about_ngo = $_POST['about_ngo'];
    $ngo_url = $_POST['ngo_url'];
    $other_info = $_POST['other_info'];
    
    // Update NGO profile in the database
    $sql = "UPDATE ngo_sign SET ngo_name=?, email=?, address=?, contact_number=? WHERE id=?";
    if ($stmt = $conn->prepare($sql)) {
        $stmt->bind_param("ssssi", $ngo_name, $email, $address, $contact_number, $_SESSION['id']);
        $stmt->execute();
        $stmt->close();
    }
    
    // Update additional profile information in the database
    $sql = "UPDATE ngo_profile_db SET about_ngo=?, ngo_url=?, other_info=? WHERE ngo_name=?";
    if ($stmt = $conn->prepare($sql)) {
        $stmt->bind_param("ssss", $about_ngo, $ngo_url, $other_info, $ngo_name);
        $stmt->execute();
        $stmt->close();
    }
      // Redirect user to dashboard after profile update
      header("location: ngo_dashboard.php");
      exit;
}

// Attempt to retrieve existing profile information
$sql = "SELECT ngo_name, email, address, contact_number FROM ngo_sign WHERE id=?";
if ($stmt = $conn->prepare($sql)) {
    $stmt->bind_param("i", $_SESSION['id']);
    $stmt->execute();
    $stmt->bind_result($ngo_name, $email, $address, $contact_number);
    $stmt->fetch();
    $stmt->close();
}

// Attempt to retrieve additional profile information
$sql = "SELECT about_ngo, ngo_url, other_info FROM ngo_profile_db WHERE ngo_name=?";
if ($stmt = $conn->prepare($sql)) {
    $stmt->bind_param("s", $ngo_name);
    $stmt->execute();
    $stmt->bind_result($about_ngo, $ngo_url, $other_info);
    $stmt->fetch();
    $stmt->close();
}

// Close connection
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NGO Profile</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            padding: 20px;
        }
        form {
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
            max-width: 500px;
            margin: auto;
        }
        label {
            display: block;
            margin-top: 10px;
        }
        input[type="text"],
        input[type="email"],
        input[type="url"],
        textarea {
            width: 100%;
            padding: 10px;
            margin-top: 5px;
            border: 1px solid #ddd;
            border-radius: 5px;
            box-sizing: border-box; /* Added for proper sizing */
        }
        input[type="submit"] {
            background-color: #27ae60;
            color: white;
            padding: 10px 15px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            margin-top: 20px;
        }
        input[type="submit"]:hover {
            background-color: #2ecc71;
        }
    </style>
</head>
<body>
<center><h2>NGO Profile Information</h2></center>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
        <label for="ngo_name">NGO Name:</label>
        <input type="text" id="ngo_name" name="ngo_name" value="<?php echo $ngo_name; ?>" required>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" value="<?php echo $email; ?>" required>

        <label for="address">Address:</label>
        <input type="text" id="address" name="address" value="<?php echo $address; ?>" required>

        <label for="contact_number">Contact Number:</label>
        <input type="text" id="contact_number" name="contact_number" value="<?php echo $contact_number; ?>" required>

        <label for="about_ngo">About NGO:</label>
        <textarea id="about_ngo" name="about_ngo" placeholder="Describe your NGO"><?php echo $about_ngo ?: ''; ?></textarea>

        <label for="ngo_url">NGO Website URL:</label>
        <input type="url" id="ngo_url" name="ngo_url" placeholder="http://www.yourngo.org" value="<?php echo $ngo_url ?: ''; ?>">

        <label for="other_info">Other Information:</label>
        <textarea id="other_info" name="other_info" placeholder="Any additional information"><?php echo $other_info ?: ''; ?></textarea>

        <input type="submit" value="Update Profile">
    </form>
</body>
</html>>
