<!DOCTYPE html>
<html>
<head>
    <title>Make-It-All Helpdesk</title>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../css/main.css">
    <style>
      body{  }
      .ticket-red{ border-left: 1rem solid red; background-color: #ff9999; padding: 0.5rem; width: 100%; }
      .ticket-orange{ border-left: 1rem solid orange; background-color: #ffd280; padding: 0.5rem; width: 100%; }
      .ticket-yellow{ border-left: 1rem solid yellow; background-color: #ffff99; padding: 0.5rem; width: 100%; }
      .ticket-blue{ border-left: 1rem solid blue; background-color: lightblue; padding: 0.5rem; width: 100%; }
      .dropdown-hover:hover
      .dropdown-content{display: block;}
      .dropdown-content{display: none;}
  </style>
</head>
<body>
    <!-- Sidebar -->
<div class="w3-sidebar w3-animate-left w3-bar-block w3-border-right" style="display:none" id="sidebar">
  <button onclick="sidebar_close()" class="w3-bar-item w3-large">Close &times;</button>
  <p class="w3-bar-item w3-xxlarge">Alice Peterson</p><br>
  <a href="#" class="w3-bar-item w3-hover-green w3-xlarge w3-button">Start Break</a>
  <a href="../../index.html" class="w3-bar-item w3-large w3-hover-red w3-button">Log Off</a>
</div>
<button class="w3-button w3-round-xxlarge w3-white w3-margin-top w3-xlarge" style="border-radius: 0px 15px 15px 0px; "onclick="sidebar_open()">More</button>

<!-- Page Content -->
       <div class="w3-card w3-white w3-padding w3-row w3-round-xlarge" style="margin: 2%;">
           <div class="w3-padding w3-twothird" style="text-align: center;">
               <h1 class="w3-margin-bottom"> Statistics </h1>
               <img src="../img/g1.png" height="300rem">
               <img src="../img/g2.png" height="300rem">
               <img src="../img/g3.png" height="300rem">
               <img src="../img/g4.png" height="300rem">
               <img src="../img/g5.png" height="300rem">
               <img src="../img/gp6.png" height="300rem">
               <img src="../img/g1.png" height="300rem">
               <img src="../img/g2.png" height="300rem">
               <img src="../img/g3.png" height="300rem">
               <img src="../img/g4.png" height="300rem">
               <img src="../img/g5.png" height="300rem">
               <img src="../img/gp6.png" height="300rem">
           </div>
           <div class="w3-padding w3-rest" style="text-align: center;">
               <h1> Operator Requests </h1>
               <br>
               <ul class="w3-ul" style="text-align: right; overflow: auto; white-space: nowrap; max-height: 20rem;">
                   <li>
                       <a href="feedback-request.html" class="w3-btn ticket-blue"><b>Add issue</b></b> issued by <b>Alice</b><a></li>
                       <li>
                       <a href="feedback-request.html" class="w3-btn ticket-blue"><b>Remove issue</b></b> issued by<b> Andrew</b><a></li>
                       </ul>
                       <br>
                <h1 class="w3-margin-bottom"> Specialist Requests </h1>
                       <ul class="w3-ul" style="text-align: right; overflow: auto; white-space: nowrap; max-height: 20rem;">
                           <li><a href="feedback-request.html" class="w3-btn ticket-blue"><b>Change item's priority</b></b> issued by <b>Frank</b><a></li>
                           </ul>
                       </div>
                   </div>
                   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
                   <script type="text/javascript">

                   function sidebar_open() {
                       document.getElementById("sidebar").style.display = "block";
                   }

                   function sidebar_close() {
                       document.getElementById("sidebar").style.display = "none";
                   }

                   $('#logout').on('click', (function(e){
                     e.preventDefault()
                     window.location.replace("../login.html");
                   }));

               </script>
           </body>
          </html>
