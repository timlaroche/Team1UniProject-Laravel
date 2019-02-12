﻿<!DOCTYPE html>
<html>
<head>
    <title>Make-It-All Helpdesk</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../css/main.css">
    <link rel="stylesheet" href="../css/additional.css">
</head>

<body>
    <!-- Sidebar -->
    <div class="w3-sidebar w3-animate-left w3-bar-block w3-border-right" style="display:none" id="sidebar">
      <button onclick="sidebar_close()" class="w3-bar-item w3-large">Close &times;</button>
      <p class="w3-bar-item w3-xxlarge">Peter Johnson</p><br>
      <a href="#" class="w3-bar-item w3-hover-green w3-xlarge w3-button">Start Break</a>
      <a href="../../index.html" class="w3-bar-item w3-xlarge w3-hover-red w3-button">Log Off</a>
    </div>
    <button class="w3-button w3-round-xxlarge w3-white w3-margin-top w3-xlarge" style="border-radius: 0px 15px 15px 0px; "onclick="sidebar_open()">More</button>

    <!-- Page Content -->

    <div class="w3-card w3-white w3-padding w3-row w3-round-xlarge" style="margin: 2%;">
          <div class="w3-padding" style="text-align: center;">
              <h1> My Tasks </h1>
             <ul class="w3-ul" style="text-align: right; overflow: auto; white-space: nowrap; max-height: 20rem;">
                <li><a href="feedback-request.html" class="w3-btn ticket-blue"><b>Feedback Request</b></b> pending for <b>3 hours</b><a></li>
                <li><a href="existing-call-specialist.html" class="w3-btn ticket-red"><b>Hardware/Desktop/Driver Issue</b> due in <b>2 hours</b><a></li>
                <li><a href="existing-call-specialist.html" class="w3-btn ticket-red"><b> Software/Network/Cloud </b>due in <b>3 days</b></a></li>
                <li><a href="existing-call-specialist.html" class="w3-btn ticket-orange"> <b>Software/DesktopOS/Login Issue </b>due in <b>4 days</b></a></li>
                <li><a href="existing-call-specialist.html" class="w3-btn ticket-yellow"> <b>Software/M-OS/Update Issue</b> due in <b>6 days</b></a></li>
              </ul>
          </div>
      </div>
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
      <script type="text/javascript">
        $('#logout').on('click', (function(e){
          e.preventDefault()
          window.location.replace("login.html");
        }));

        function sidebar_open() {
            document.getElementById("sidebar").style.display = "block";
        }

        function sidebar_close() {
            document.getElementById("sidebar").style.display = "none";
        }
      </script>
</body>
</html>
