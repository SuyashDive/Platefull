<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Food Donation Platform</title>
    <style>Basic styling */
   /* Basic styling */
body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
}

.container {
    max-width: 1200px;
    margin: 0 auto;
    padding: 20px;
}


header {
    background-color: #023f0ac9;
    color: #f8f8f89e;
    padding: 20px 0;
    text-align: center;
    overflow: hidden; /* Clear float */
    display: flex; /* Use flexbox for alignment */
    align-items: center; /* Vertically center items */
}

header img {
    max-width: 100px;
    margin-right: auto; /* Push the logo to the left */
}

nav {
    margin-left: auto; /* Push the menu to the right */
}


/* header img {
    max-width: 20px;
    float: left;
} */

nav {
    float: right;
}

.menu {
    list-style-type: none;
    margin: 0;
    padding: 0;
}

.menu li {
    display: inline;
    margin-left: 20px;
}

.menu li a {
    color: #fff;
    text-decoration: none;
}

.menu li a:hover {
    text-decoration: underline;
}
.menu li a {
    color: #fff;
    text-decoration: none;
    transition: color 0.3s ease; /* Add transition for color change */
}

.menu li a:hover {
    text-decoration: underline;
    color: #ffc107; /* Change color on hover */
}
</style>
   
</head>
<body>
    <header>
        <div class="container">
            <img src="logo.png" alt="Food Donation Platform Logo">
            <nav>
                <ul class="menu">
                    <li><a href="Home.php">Home</a></li> <!-- Link to Home Page -->
                    <li><a href="about.php">About Us</a></li> <!-- Link to About Us Page -->
                    <li><a href="donor_signup.php">Donor Signup</a></li> <!-- Link to Donor Login Page -->
                    <li><a href="ngo_signup.php">NGO Signup</a></li> <!-- Link to NGO Login Page -->
                </ul>
            </nav>
        </div>
    </header>


   

    
    </section>

    <footer>
        <div class="container">
           
        </div>
    </footer>

    <script src="script.js"></script>
    <section id="hero">
        <div class="container">
           
    </section>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blurred Image with Text Overlay</title>
    <style>
      body {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        font-family: 'Arial', sans-serif;
      }
  
      .blur-container {
        position: relative;
        width: 100%;
        height: 400px; /* Adjust the height as needed */
        overflow: hidden;
      }
  
      .blur-container img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        filter: blur(10px); /* Adjust the blur intensity */
      }
  
      .text-overlay {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        color: #b64848;
        text-align: center;
      }
  
      .text-overlay h1 {
        margin: 0;
        font-size: 2.5em;
      }
  
      .text-overlay p {
        margin: 10px 0 0;
        font-size: 1.2em;
         /* Style for buttons */
         .button-container {
            position: absolute;
            top: 20vh; /* Adjusted to 20% of viewport height */
            left: 50%;
            transform: translate(-50%, -50%);
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 60px; /* Increased gap between buttons and text */
            animation: slideIn 1s ease-in-out; /* Slide in animation */
        }
        body {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Arial', sans-serif;
            background-color: #f2f2f2; /* Light gray background */
        }

        header {
            background-color: #4CAF50; /* Green header background */
            padding: 20px 0;
        }

        header .container {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        header nav ul.menu {
            list-style-type: none;
            margin: 0;
            padding: 0;
        }

        header nav ul.menu li {
            display: inline;
            margin-right: 20px;
        }

        header nav ul.menu li a {
            color: white;
            text-decoration: none;
            transition: color 0.3s ease-in-out; /* Smooth color transition */
        }

        header nav ul.menu li a:hover {
            color: #FFEB3B; /* Yellow on hover */
        }

        .blur-container {
            position: relative;
            width: 100%;
            height: 100vh; /* Adjusted to full viewport height */
            overflow: hidden;
        }

        .blur-container img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            filter: blur(10px); /* Adjust the blur intensity */
        }

        .text-overlay {
            position: absolute;
            top: 150%; /* Pushed down below the viewport */
            left: 50%;
            transform: translate(-50%, -50%);
            color: #ffffff; /* White text */
            text-align: center;
            animation: fadeIn 1s ease-in-out; /* Fade in animation */
        }

        .text-overlay h2 {
            margin: 0;
            font-size: 3em;
            color: #ffffff; /* White text */
            text-shadow: 2px 2px 4px rgba(0,0,0,0.5); /* Text shadow */
        }

        .text-overlay p {
            margin: 10px 0 0;
            font-size: 1.2em;
            color: #ffffff; /* White text */
            text-shadow: 1px 1px 2px rgba(0,0,0,0.5); /* Text shadow */
        }
      }
    </style>
  </head>
  <body>
    <!-- Buttons container -->
    <div class="button-container">
           
            <center><button type="submit"style="color:white;background-color:green;font-size:25px;"><a href="http://localhost/backend/login.php"style="color:white;">Donate Now</a></button>
            <button type="submit" style="color:white;background-color:green;font-size:25px;"><a href="http://localhost/backend/ngo_signup.php"style="color:white;">For NGO</a></button>
            <h1>Rescuing Food Feeding Future</h1><br><br><br> <!-- Line breaks added --></center>
        </div>

    <div class="blur-container">
      <img src="background_home.jpg" alt="Blurred Background Image">
      <div class="text-overlay">
        <center><h2>About Platefull</h2></center>
        <p>The Food Donation Platform "Platefull" connects restaurants, cafeterias, and other food establishments with NGOs to donate surplus food. Our goal is to reduce food waste and fight hunger by redistributing excess food to those in need.</p>
        <p>Together, we can make a difference in our communities and create a more sustainable future.</p>
      </div>
    </div>
    <p>&copy; 2024 Food Donation Platform</p>

    </body>
    </html> 
    