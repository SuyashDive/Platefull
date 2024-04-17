<!DOCTYPE html>
<!-- Coding By CodinFire - youtube.com/codingfire -->
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
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
    <link rel="stylesheet" href="style.css" />
    <title>Confetti Popup Modal  V2</title>
  </head>
  <body>
    <style>
        /* Import poppins - Goole Font */
@import url('https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap');
* {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
  font-family: "Poppins";
}
.container {
  width: 100%;
  height: 100vh;
  background: #f1f1f1;
  display: flex;
  align-items: center;
  justify-content: center;
}
.open {
  padding: 20px 80px;
  font-size: 24px;
  color: #fff;
  border-radius: 100px;
  border: none;
  outline: none;
  background: #056826;
  cursor: pointer;
  font-weight: 500;
}
.open.hidden {
  display: none;
  pointer-events: none;
}
.box {
  padding: 30px 40px;
  background: #fff;
  box-shadow: 0 10px 40px rgba(0,0,0,0.1);
  overflow: hidden;
  width: 650px;

  border-radius: 10px;

  display: none;
  pointer-events: none;
}
.box.visible {
  display: block;
  pointer-events: all;
}
.box .imgBox {
  text-align: center;
}
.box img {
  width: 180px;
}
.title {
  margin-top: 30px;
  text-align: center;
  font-size: 32px;
  color: #222;
}
.box p {
  text-align: center;
  margin-top: 10px;
  font-weight: 500;
  color: #777;
}
.btnContainer {
  display: flex;
  justify-content: center;
}
.close {
  margin-top: 30px;
  width: 240px;
  height: 54px;
  cursor: pointer;
  font-size: 17px;
  color: #fff;
  border: none;
  outline: none;
  background: #046228;
  border-radius: 5px;
}
    </style>
    <div class="container">
      <button class="open">DONATE</button>
      <!-- modal -->
      <div class="box">
        <div class="imgBox">
          <img src="./logo.png" alt="" />
        </div>
        <h2 class="title">Thanks For Feeding Future ! 🌟</h2>
        <p>
            "Thank you deeply for your generous food donation. Your kindness nourishes both body and soul, bringing hope to those in need. Your selflessness inspires us all to make a positive impact in our community. Your contribution is truly appreciated, and we are grateful for your compassionate spirit. May your kindness be returned to you in abundance. Thank you once again for your heartfelt generosity."
        </p>
        <div class="btnContainer">
          <a href = "donor_dashboard.php" ></a>
          <button class="close">THANK YOU !</button>
        </div>
      </div>
    </div>
   <!-- Please watch Confetti Effect Video Before Watching This  -->
<!-- Confetti.min.js + Confetti Video Link In Description -->
<script src="./confetti.min.js"></script>
<script>
  const openbtn = document.querySelector(".open");
  const modal = document.querySelector('.box');
  const closeBtn = document.querySelector('.close');

  // Function to open modal and start confetti
  openbtn.addEventListener("click", () => {
    modal.classList.add('visible');
    openbtn.classList.add('hidden');
    const startConfetti = () => {
      setTimeout(() => {
        confetti.start();
      }, 1000);
    };
    startConfetti();
    setTimeout(() => {
      confetti.stop();
    }, 2000);
  });

  // Function to close modal and redirect
  closeBtn.addEventListener('click', () => {
    modal.classList.remove('visible');
    openbtn.classList.remove('hidden');
    setTimeout(() => {
      window.location.href = 'donor_dashboard.php';
    }, 5000); // Redirect after 5 seconds
  });
</script>

    </script>
    <script>var confetti={maxCount:150,speed:2,frameInterval:15,alpha:1,gradient:!1,start:null,stop:null,toggle:null,pause:null,resume:null,togglePause:null,remove:null,isPaused:null,isRunning:null};!function(){confetti.start=s,confetti.stop=w,confetti.toggle=function(){e?w():s()},confetti.pause=u,confetti.resume=m,confetti.togglePause=function(){i?m():u()},confetti.isPaused=function(){return i},confetti.remove=function(){stop(),i=!1,a=[]},confetti.isRunning=function(){return e};var t=window.requestAnimationFrame||window.webkitRequestAnimationFrame||window.mozRequestAnimationFrame||window.oRequestAnimationFrame||window.msRequestAnimationFrame,n=["rgba(30,144,255,","rgba(107,142,35,","rgba(255,215,0,","rgba(255,192,203,","rgba(106,90,205,","rgba(173,216,230,","rgba(238,130,238,","rgba(152,251,152,","rgba(70,130,180,","rgba(244,164,96,","rgba(210,105,30,","rgba(220,20,60,"],e=!1,i=!1,o=Date.now(),a=[],r=0,l=null;function d(t,e,i){return t.color=n[Math.random()*n.length|0]+(confetti.alpha+")"),t.color2=n[Math.random()*n.length|0]+(confetti.alpha+")"),t.x=Math.random()*e,t.y=Math.random()*i-i,t.diameter=10*Math.random()+5,t.tilt=10*Math.random()-10,t.tiltAngleIncrement=.07*Math.random()+.05,t.tiltAngle=Math.random()*Math.PI,t}function u(){i=!0}function m(){i=!1,c()}function c(){if(!i)if(0===a.length)l.clearRect(0,0,window.innerWidth,window.innerHeight),null;else{var n=Date.now(),u=n-o;(!t||u>confetti.frameInterval)&&(l.clearRect(0,0,window.innerWidth,window.innerHeight),function(){var t,n=window.innerWidth,i=window.innerHeight;r+=.01;for(var o=0;o<a.length;o++)t=a[o],!e&&t.y<-15?t.y=i+100:(t.tiltAngle+=t.tiltAngleIncrement,t.x+=Math.sin(r)-.5,t.y+=.5*(Math.cos(r)+t.diameter+confetti.speed),t.tilt=15*Math.sin(t.tiltAngle)),(t.x>n+20||t.x<-20||t.y>i)&&(e&&a.length<=confetti.maxCount?d(t,n,i):(a.splice(o,1),o--))}(),function(t){for(var n,e,i,o,r=0;r<a.length;r++){if(n=a[r],t.beginPath(),t.lineWidth=n.diameter,i=n.x+n.tilt,e=i+n.diameter/2,o=n.y+n.tilt+n.diameter/2,confetti.gradient){var l=t.createLinearGradient(e,n.y,i,o);l.addColorStop("0",n.color),l.addColorStop("1.0",n.color2),t.strokeStyle=l}else t.strokeStyle=n.color;t.moveTo(e,n.y),t.lineTo(i,o),t.stroke()}}(l),o=n-u%confetti.frameInterval),requestAnimationFrame(c)}}function s(t,n,o){var r=window.innerWidth,u=window.innerHeight;window.requestAnimationFrame=window.requestAnimationFrame||window.webkitRequestAnimationFrame||window.mozRequestAnimationFrame||window.oRequestAnimationFrame||window.msRequestAnimationFrame||function(t){return window.setTimeout(t,confetti.frameInterval)};var m=document.getElementById("confetti-canvas");null===m?((m=document.createElement("canvas")).setAttribute("id","confetti-canvas"),m.setAttribute("style","display:block;z-index:999999;pointer-events:none;position:fixed;top:0"),document.body.prepend(m),m.width=r,m.height=u,window.addEventListener("resize",function(){m.width=window.innerWidth,m.height=window.innerHeight},!0),l=m.getContext("2d")):null===l&&(l=m.getContext("2d"));var s=confetti.maxCount;if(n)if(o)if(n==o)s=a.length+o;else{if(n>o){var f=n;n=o,o=f}s=a.length+(Math.random()*(o-n)+n|0)}else s=a.length+n;else o&&(s=a.length+o);for(;a.length<s;)a.push(d({},r,u));e=!0,i=!1,c(),t&&window.setTimeout(w,t)}function w(){e=!1}}();
    </script>
  </body>
</html>