<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us - Food Donation Platform</title>
    
    <style>body {
        font-family: Arial, sans-serif;
        margin: 1;
        padding: 1;
        background-color: #fefefe5a;
    }
    
    .container {
        max-width: 1000px;
        margin: 1 auto;
        padding: 25px;
    }
    
    header {
        background-color: #034815ef;
        color: #fff;
        padding: 3px 0;
        display: flex;
        border-radius: 108px;
    
        align-items: center; /* Align items vertically */
    }
    header img {
        max-width: 100px; /* Adjust the max-width as needed */
        margin-right: 30px; /* Add some space between logo and menu */
        /*filter: invert(10%) sepia(0%) saturate(10%) hue-rotate(25deg) brightness(100%) contrast(100%);*/
    }
    
    
    
    nav {
        float: right;
    }
    
    .menu {
        list-style-type: none;
        margin: 0;
        padding: 3;
    }
    
    .menu li {
        display: inline;
        margin-left: 20px;
    }
    
    .menu li a {
        color: #fff;
        text-decoration: none ;
    }
    
    .menu li a:hover {
        text-decoration: underline;
    }
    
    #about {
        background-color: #63181d81;
        padding: 28px;
        border-radius: 108px;
        box-shadow: 1 1 10px rgba(107, 154, 135, 0.414);
    }
    
    #about h2 {
        text-align: center;
        margin-bottom: 28px;
    }
    
    #about p {
        line-height: 1.6;
    }
    
    footer {
        background-color: #133f336c;
        color: #fff;
        padding: 20px 0;
        border-radius: 108px;
        text-align: center;
       
    }
    </style>
</head>
<body>
    <header>
        <div class="container">
            <img src="logo.png" alt="Food Donation Platform Logo">
            <nav>
                <ul class="menu">
                    <li><a href="Home.php">Home</a></li>
                    <li><a href="about.php">About Us</a></li>
                    <li><a href="donor_signup.php">Donor Signup</a></li>
                    <li><a href="ngo_signup.php">NGO Signup</a></li>
                </ul>
            </nav>
        </div>
    </header>

    <section id="about">
        <div class="container">
            <h2>About Us</h2>
            <p>We are first-year engineering students at PICT Pune, working on the Food Donation Platform as our college project.</p>
            <p>Our goal is to create an online platform that connects restaurants, mess canteens, and other food establishments with NGOs to donate surplus food. By redistributing excess food to those in need, we aim to reduce food waste and fight hunger in our community.</p>
            <p>Thank you for supporting our project!</p>
        </div>
    </section>

    <footer>
        <div class="container">
            <p>&copy; 2024 Food Donation Platform</p>
        </div>
    </footer>
</body>
</html>
