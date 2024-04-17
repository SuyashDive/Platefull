<?php
session_start();

if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin']!=true){
    header("location: login.php");
    exit;
}
?>
<!DOCTYPE html>
<html>
<head>
  <title>Responsive Sidebar</title>
 <style>@import url('https://fonts.googleapis.com/css2?family=Poppins&display=swap');

  :root{
    --color-default:#004f83;
    --color-second:#0067ac;
    --color-white:#fff;
    --color-body:#e4e9f7;
    --color-light:#e0e0e0;
  }
  
  
  *{
    padding: 0%;
    margin: 0%;
    box-sizing: border-box;
    font-family: 'Poppins', sans-serif;
  }
  
  body{
    min-height: 100vh;
  }
  
  .sidebar{
    min-height: 100vh;
    width: 78px;
    padding: 6px 14px;
    z-index: 99;
    background-color: var(--color-default);
    transition: all .5s ease;
    position: fixed;
    top:0;
    left: 0;
  }
  
  .sidebar.open{
    width: 250px;
  }
  
  .sidebar .logo_details{
    height: 60px;
    display: flex;
    align-items: center;
    position: relative;
  }
  
  .sidebar .logo_details .icon{
    opacity: 0;
    transition: all 0.5s ease ;
  }
  
  
  
  .sidebar .logo_details .logo_name{
    color:var(--color-white);
    font-size: 22px;
    font-weight: 600;
    opacity: 0;
    transition: all .5s ease;
  }
  
  .sidebar.open .logo_details .icon,
  .sidebar.open .logo_details .logo_name{
    opacity: 1;
  }
  
  .sidebar .logo_details #btn{
    position: absolute;
    top:50%;
    right: 0;
    transform: translateY(-50%);
    font-size: 23px;
    text-align: center;
    cursor: pointer;
    transition: all .5s ease;
  }
  
  .sidebar.open .logo_details #btn{
    text-align: right;
  }
  
  .sidebar i{
    color:var(--color-white);
    height: 60px;
    line-height: 60px;
    min-width: 50px;
    font-size: 25px;
    text-align: center;
  }
  
  .sidebar .nav-list{
    margin-top: 20px;
    height: 100%;
  }
  
  .sidebar li{
    position: relative;
    margin:8px 0;
    list-style: none;
  }
  
  .sidebar li .tooltip{
    position: absolute;
    top:-20px;
    left:calc(100% + 15px);
    z-index: 3;
    background-color: var(--color-white);
    box-shadow: 0 5px 10px rgba(0, 0, 0, 0.3);
    padding: 6px 14px;
    font-size: 15px;
    font-weight: 400;
    border-radius: 5px;
    white-space: nowrap;
    opacity: 0;
    pointer-events: none;
  }
  
  .sidebar li:hover .tooltip{
    opacity: 1;
    pointer-events: auto;
    transition: all 0.4s ease;
    top:50%;
    transform: translateY(-50%);
  }
  
  .sidebar.open li .tooltip{
    display: none;
  }
  
  .sidebar input{
    font-size: 15px;
    color: var(--color-white);
    font-weight: 400;
    outline: none;
    height: 35px;
    width: 35px;
    border:none;
    border-radius: 5px;
    background-color: var(--color-second);
    transition: all .5s ease;
  }
  
  .sidebar input::placeholder{
    color:var(--color-light)
  }
  
  .sidebar.open input{
    width: 100%;
    padding: 0 20px 0 50px;
  }
  
  .sidebar .bx-search{
    position: absolute;
    top:50%;
    left:0;
    transform: translateY(-50%);
    font-size: 22px;
    background-color: var(--color-second);
    color: var(--color-white);
  }
  
  .sidebar li a{
    display: flex;
    height: 100%;
    width: 100%;
    align-items: center;
    text-decoration: none;
    background-color: var(--color-default);
    position: relative;
    transition: all .5s ease;
    z-index: 12;
  }
  
  .sidebar li a::after{
    content: "";
    position: absolute;
    width: 100%;
    height: 100%;
    transform: scaleX(0);
    background-color: var(--color-white);
    border-radius: 5px;
    transition: transform 0.3s ease-in-out;
    transform-origin: left;
    z-index: -2;
  }
  
  .sidebar li a:hover::after{
    transform: scaleX(1);
    color:var(--color-default)
  }
  
  .sidebar li a .link_name{
    color:var(--color-white);
    font-size: 15px;
    font-weight: 400;
    white-space: nowrap;
    pointer-events: auto;
    transition: all 0.4s ease;
    pointer-events: none;
    opacity: 0;
  }
  
  .sidebar li a:hover .link_name,
  .sidebar li a:hover i{
    transition: all 0.5s ease;
    color:var(--color-default)
  }
  
  .sidebar.open li a .link_name{
    opacity: 1;
    pointer-events: auto;
  }
  
  .sidebar li i{
    height: 35px;
    line-height: 35px;
    font-size: 18px;
    border-radius: 5px;
  }
  
  .sidebar li.profile{
    position: fixed;
    height: 60px;
    width: 78px;
    left: 0;
    bottom:-8px;
    padding:10px 14px;
    overflow: hidden;
    transition: all .5s ease;
  }
  
  .sidebar.open li.profile{
    width: 250px;
  }
  
  .sidebar .profile .profile_details{
    display: flex;
    align-items: center;
    flex-wrap:  nowrap;
  }
  
  .sidebar li img{
    height: 45px;
    width: 45px;
    object-fit: cover;
    border-radius: 50%;
    margin-right: 10px;
  }
  
  .sidebar li.profile .name,
  .sidebar li.profile .designation{
    font-size: 15px;
    font-weight: 400;
    color:var(--color-white);
    white-space: nowrap;
  }
  
  .sidebar li.profile .designation{
    font-size: 12px;
  }
  
  .sidebar .profile #log_out{
    position: absolute;
    top:50%;
    right: 0;
    transform: translateY(-50%);
    background-color: var(--color-second);
    width: 100%;
    height: 60px;
    line-height: 60px;
    border-radius: 5px;
    cursor: pointer;
    transition: all 0.5s ease;
  }
  
  .sidebar.open .profile #log_out{
    width: 50px;
    background: none;
  }
  
  .home-section{
    position: relative;
    background-color: var(--color-body);
    min-height: 100vh;
    top:0;
    left:78px;
    width: calc(100% - 78px);
    transition: all .5s ease;
    z-index: 2;
  }
  
  .home-section .text{
    display: inline-block;
    color:var(--color-default);
    font-size: 25px;
    font-weight: 500;
    margin: 18px;
  }
  
  .sidebar.open ~ .home-section{
    left:250px;
    width: calc(100% - 250px);
  }</style>
  <link rel="stylesheet" href="exp.css">
  <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
* {box-sizing: border-box;}
body {font-family: Verdana, sans-serif;}
.mySlides {display: none;}
img {vertical-align: middle;}

/* Slideshow container */
.slideshow-container {
  max-width: 1000px;
  position: relative;
  margin: auto;
}

/* Caption text */
.text {
  color: #f2f2f2;
  font-size: 15px;
  padding: 8px 12px;
  position: absolute;
  bottom: 8px;
  width: 100%;
  text-align: center;
}

/* Number text (1/3 etc) */
.numbertext {
  color: #f2f2f2;
  font-size: 12px;
  padding: 8px 12px;
  position: absolute;
  top: 0;
}

/* The dots/bullets/indicators */
.dot {
  height: 15px;
  width: 15px;
  margin: 0 2px;
  background-color: #bbb;
  border-radius: 50%;
  display: inline-block;
  transition: background-color 0.6s ease;
}

.active {
  background-color: #717171;
}

/* Fading animation */
.fade {
  animation-name: fade;
  animation-duration: 1.5s;
}

@keyframes fade {
  from {opacity: .4} 
  to {opacity: 1}
}

/* On smaller screens, decrease taext size */
@media only screen and (max-width: 300px) {
  .text {font-size: 11px}
}
</style>
</head>
<body>
  <div class="sidebar">
    <div class="logo_details">
      <i class="bx bxl-audible icon"></i>
      <div class="logo_name">Platefull</div>
      <i class="bx bx-menu" id="btn"></i>
    </div>
    <ul class="nav-list">
     
      <li>
        <a href="Home.php">
          <i class="bx bx-grid-alt"></i>
          <span class="link_name">Home</span>
        </a>
        <span class="tooltip">Home</span>
      </li>
      <li>
        <a href="edit-profile_donor.php">
          <i class="bx bx-user"></i>
          <span class="link_name">User Profile</span>
        </a>
        <span class="tooltip">User Profile</span>
      </li>
 
      
     
      <li class="profile">
        <div class="profile_details">
          
          <div class="profile_content">
            <div class="name"> Log Out</div>
            <div class="designation"></div>
          </div>
        </div>
        <a href="logout.php">
        <i class="bx bx-log-out" id="log_out"></i>
      </a></li>
    </ul>
  </div>
  <section class="home-section">
    <div class="text">Platefull</div>
    <center>
    <h1 style="color:rgb(10, 97, 10)">Rescuing Food Feeding Future</h1>
    <br><br>
    <h3 style="color:rgb(26, 9, 155)">Let's unite to fight hunger! Join us in donating food to those in need. Every contribution counts, no matter how big or small. Together, we can make a meaningful difference in the lives of individuals and families facing food insecurity. Spread the word, gather donations, and let's create a community where no one goes hungry. Take action today and be a part of the solution!</h2>
    
    <br>
    <br>
      
    <style>
    .donate-btn {
        display: inline-block;
        background-color: #4CAF50; /* Green */
        border: none;
        color: white;
        text-align: center;
        text-decoration: none;
        font-size: 16px;
        padding: 10px 20px;
        border-radius: 5px;
        cursor: pointer;
        transition: background-color 0.3s;
    }
    .donate-btn:hover {
        background-color: #45a049; /* Darker green */
    }
</style>


<a href="donation_form.php" class="donate-btn">Donate Now</a>



    </center>
  </section>
   <script>window.onload = function(){
    const sidebar = document.querySelector(".sidebar");
    const closeBtn = document.querySelector("#btn");
    const searchBtn = document.querySelector(".bx-search")

    closeBtn.addEventListener("click",function(){
        sidebar.classList.toggle("open")
        menuBtnChange()
    })

    searchBtn.addEventListener("click",function(){
        sidebar.classList.toggle("open")
        menuBtnChange()
    })

    function menuBtnChange(){
        if(sidebar.classList.contains("open")){
            closeBtn.classList.replace("bx-menu","bx-menu-alt-right")
        }else{
            closeBtn.classList.replace("bx-menu-alt-right","bx-menu")
        }
    }
}</script>
  <!-- Scripts -->


<div class="slideshow-container">

<div class="mySlides fade">
  <div class="numbertext">1 / 3</div>
  <img src="donate2.jpg" style="width:100%">
  <div class="text"></div>
</div>

<div class="mySlides fade">
  <div class="numbertext">2 / 3</div>
  <img src="donate3.jpeg" style="width:100%">
  <div class="text"></div>
</div>

<div class="mySlides fade">
  <div class="numbertext">3 / 3</div>
  <img src="donate.png" style="width:100%">
  <div class="text"></div>
</div>

</div>
<br>

<div style="text-align:center">
  <span class="dot"></span> 
  <span class="dot"></span> 
  <span class="dot"></span> 
</div>

<script>
let slideIndex = 0;
showSlides();

function showSlides() {
  let i;
  let slides = document.getElementsByClassName("mySlides");
  let dots = document.getElementsByClassName("dot");
  for (i = 0; i < slides.length; i++) {
    slides[i].style.display = "none";  
  }
  slideIndex++;
  if (slideIndex > slides.length) {slideIndex = 1}    
  for (i = 0; i < dots.length; i++) {
    dots[i].className = dots[i].className.replace(" active", "");
  }
  slides[slideIndex-1].style.display = "block";  
  dots[slideIndex-1].className += " active";
  setTimeout(showSlides, 2000); // Change image every 2 seconds
}
</script>

</body>
</html> 
