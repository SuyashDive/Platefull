<?php
session_start();

// Redirect to login page if not logged in
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

// HTML and PHP code for the dashboard
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <<!-- Add your CSS file links here -->
    <style> /* General reset */
/* General reset */
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}
.donation-entry {
    background: #fff;
    padding: 20px;
    margin-bottom: 20px; /* Adds space between posts */
    border: 1px solid #ddd; /* Adds a border around each post */
    border-radius: 8px; /* Optional: Rounds the corners of the border */
    box-shadow: 0 2px 5px rgba(0,0,0,0.1); /* Optional: Adds a subtle shadow */
}

body {
    font-family: 'Arial', sans-serif;
    background-color: #f4f4f4;
    color: #333;
}

/* Sidebar styles */
.sidebar {
    width: 250px;
    height: 100vh;
    background-color: #27ae60; /* Green color */
    position: fixed;
    left: 0;
    top: 0;
    overflow-y: auto;
    transition: width 0.5s; /* Smooth transition for toggle effect */
}

.sidebar.collapsed {
    width: 80px; /* Smaller width when collapsed */
}

.logo_details {
    padding: 15px;
    background: #2ecc71; /* Slightly lighter green for the header */
    display: flex;
    align-items: center;
    justify-content: space-between; /* Adjusted for toggle button */
}

.logo_details .icon,
.logo_details .logo_name {
    color: #fff;
    display: inline-block; /* Ensure visibility */
}

.nav-list {
    padding: 20px 0;
    width: 100%;
}

.nav-list li {
    position: relative;
    list-style: none;
    width: 100%;
    border-top: 1px solid rgba(255, 255, 255, 0.1);
    border-bottom: 1px solid rgba(0, 0, 0, 0.1);
}

.nav-list li a {
    display: flex;
    align-items: center;
    padding: 12px 20px;
    text-decoration: none;
    color: #fff;
    font-size: 18px;
    transition: background 0.3s; /* Smooth background transition */
}

.nav-list li a:hover,
.nav-list li a.active { /* Active state for current page */
    background: #2ecc71; /* Slightly lighter green for active/hover state */
}

.nav-list .tooltip {
    position: absolute;
    top: 0;
    left: 120%;
    background: #34495e;
    padding: 5px 8px;
    border-radius: 4px;
    font-size: 14px;
    color: #fff;
    opacity: 0;
    white-space: nowrap;
    pointer-events: none;
    transition: 0.3s;
}

.nav-list li:hover .tooltip {
    opacity: 1;
}

/* Profile section */
.profile {
    position: absolute;
    bottom: 0;
    width: 250px;
    padding: 10px 15px;
    background: #2ecc71; /* Slightly lighter green for the profile section */
}

.profile_details img {
    height: 50px;
    width: 50px;
    border-radius: 50%;
}

.profile_content {
    display: flex;
    flex-direction: column;
    margin-left: 10px;
}

.name,
.designation {
    color: #fff;
}

/* Home section styles */
.home-section {
    margin-left: 250px;
    padding: 20px;
    background: #f4f4f4;
    min-height: 100vh;
    transition: margin-left 0.5s; /* Smooth transition for toggle effect */
}

.home-section.collapsed {
    margin-left: 80px; /* Adjust margin when sidebar is collapsed */
}

/* Add any additional styles you need here */


/* Add any additional styles you need here */

</style>
</head>
<body>
    <div class="sidebar">
        <!-- Sidebar content -->
    </div>
    <section class="home-section">
        <div class="text">Dashboard</div>
        <div class="sidebar">
    <div class="logo_details">
        <span class="logo_name">Platefull</span>
        <i class="bx bx-menu" id="btn"></i>
    </div>
    <ul class="nav-list">
        <!-- ... other list items ... -->
        <li>
            <a href="Home.php" class="active">
                <i class="bx bx-home"></i>
                <span class="link_name">Home</span>
            </a>
            <span class="tooltip">Home</span>
        </li>
        <li>
            <a href="ngo_profile.php">
                <i class="bx bx-user"></i>
                <span class="link_name">NGO Profile</span>
            </a>
            <span class="tooltip">NGO Profile</span>
        </li>
        <li>
            <a href="logout.php">
                <i class="bx bx-log-out" id="log_out"></i>
                <span class="link_name">Logout</span>
            </a>
            <span class="tooltip">Logout</span>
        </li>
    </ul>
</div>

        <!-- Displaying donation forms -->
        <?php
        // Retrieve food donation submissions from the database
        $sql = "SELECT * FROM food_donations";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            // Output data of each row
            while ($row = $result->fetch_assoc()) {
                echo "<p>\n\n</strong>";
                echo "<div class='donation-entry'>";
                echo "<h3>Food Donation Details</h3>";
                echo "<p><strong>Donor Name:</strong> " . htmlspecialchars($row["donor_name"]) . "</p>";
                echo "<p><strong>Contact Number:</strong> " . htmlspecialchars($row["contact_number"]) . "</p>";
                echo "<p><strong>Food Type:</strong> " . htmlspecialchars($row["food_type"]) . "</p>";
                echo "<p><strong>Quantity (kg):</strong> " . htmlspecialchars($row["quantity"]) . "</p>";
                echo "<p><strong>Pickup Location:</strong> " . htmlspecialchars($row["pickup_address"]) . "</p>";
                echo "</div>";
            }
        } else {
            echo "<p>No food donations submitted yet.</p>";
        }
        ?>
    </section>
    <script>document.getElementById('btn').addEventListener('click', function() {
    document.querySelector('.sidebar').classList.toggle('collapsed');
    document.querySelector('.home-section').classList.toggle('collapsed');
  });</script>
<script/>
    <script src="script.js"></script>
</body>
</html>
<?php
$conn->close();
?>
