<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NGO Sign Up</title>
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
        input[type="text"], input[type="email"], input[type="password"], input[type="tel"] {
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
    <h2>NGO Sign Up</h2>
    <form action="ngo_signup.php" method="post">
        <label for="ngo_name">NGO Name:</label>
        <input type="text" id="ngo_name" name="ngo_name" placeholder="Enter NGO name.." required>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" placeholder="Enter your email.." required>

        <label for="password">Password:</label>
        <input type="password" id="password" name="password" placeholder="Enter your password.." required>

        <label for="address">Address:</label>
        <input type="text" id="address" name="address" placeholder="Enter your address.." required>

        <label for="contact_number">Contact Number:</label>
        <input type="tel" id="contact_number" name="contact_number" pattern="[0-9]{10}" placeholder="Enter your 10-digit contact number.." required>

        <input type="submit" value="Sign Up">
    </form>
    <p>Already have an account? <a href="login.php">Login</a></p>
</div>

<!-- JavaScript code to redirect to login page after a delay -->
<script>
    // Check if the URL contains the success parameter
    const urlParams = new URLSearchParams(window.location.search);
    const success = urlParams.get('success');

    // If the success parameter is present and true, redirect to login.php after a delay
    if (success === 'true') {
        setTimeout(function() {
            window.location.href = "login.php"; // Redirect to login.php after a delay
        }, 3000); // 3000 milliseconds = 3 seconds
    }
</script>

</body>
</html>
