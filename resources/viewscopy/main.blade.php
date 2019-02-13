﻿<!DOCTYPE html>
<html>
<head>
    <title>Make-It-All Helpdesk</title>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../css/main.css">
    <link rel="stylesheet" href="../css/additional.css">
 </head>

<body>
      <div class="w3-sidebar w3-animate-left w3-bar-block w3-border-right" style="display:none" id="sidebar">
          <button onclick="sidebar_close()" class="w3-bar-item w3-large">Close &times;</button>
          <p class="w3-bar-item w3-xxlarge">Alice Peterson</p><br>
          <a class="w3-bar-item w3-hover-green w3-large w3-button">Start Break</a>
          <a href="request-addition.html" class="w3-bar-item w3-hover-orange w3-large w3-button">Request issue addition</a>
          <a href="../../index.html" class="w3-bar-item w3-large w3-hover-red w3-button">Log Off</a>
    </div>

    <button class="w3-button w3-round-xxlarge w3-white w3-margin-top w3-xlarge" style="border-radius: 0px 15px 15px 0px; "onclick="sidebar_open()">More</button>
  <div class="w3-card w3-row w3-white w3-padding-large w3-round-xlarge" style="margin: 5%">
      <div class="w3-padding w3-twothird" style="text-align: center;">
          <h1> My Tasks </h1>
          <ul class="w3-ul" style="overflow: auto; white-space: nowrap; max-height: 30rem;">
            <li><a href="close-call.html" class="w3-btn ticket-blue"><span class="w3-tag w3-left w3-deep-orange">Issue ID #8263</span><b> Call Closure Request</b></b> pending for <b>3 hours</b> <span class="w3-tag w3-pale-yellow w3-right w3-round-xlarge">By <b> S Peterson</b></span><a></li>
            <li><a href="existing-call.html" class="w3-btn ticket-red"><span class="w3-tag w3-left w3-deep-orange">Issue ID #4463</span><b> Hardware/Desktop/Driver Issue</b> <span class="w3-tag w3-pale-blue w3-right w3-round-xlarge">Due in <b>3 hours </b></span></a></li>
            <li><a href="existing-call.html" class="w3-btn ticket-orange"><span class="w3-tag w3-left w3-deep-orange">Issue ID #2552</span><b> Hardware/Desktop/Won't Turn On</b> <span class="w3-tag w3-right w3-pale-red w3-round-xlarge">Late by <b>2 days</b></span></a></li>
            <li><a href="existing-call.html" class="w3-btn ticket-orange"><span class="w3-tag w3-left w3-deep-orange">Issue ID #1123</span><b> Software/Mobile OS/Update Issue</b> <span class="w3-tag w3-right w3-pale-blue w3-round-xlarge">Due in <b>3 days </b></span></a></li>
            <li><a href="existing-call.html" class="w3-btn ticket-yellow"><span class="w3-tag w3-left w3-deep-orange">Issue ID #3466</span><b> Software/Projector/Bulb Warning</b> <span class="w3-tag w3-right w3-pale-blue w3-round-xlarge">Due in <b>5 days </b></span></a></li>
            <li><a href="existing-call.html" class="w3-btn ticket-yellow"><span class="w3-tag w3-left w3-deep-orange">Issue ID #2355</span><b> Hardware/Printer/Won't Turn On</b> <span class="w3-tag w3-right w3-pale-blue w3-round-xlarge">Due in <b>1 days </b></span></a></li>
            <li><a href="existing-call.html" class="w3-btn ticket-yellow"><span class="w3-tag w3-left w3-deep-orange">Issue ID #8867</span><b> Software/Programs/Licensing</b> <span class="w3-tag w3-right w3-pale-blue w3-round-xlarge">Due in <b>4 days </b></span></a></li>

          </ul>
      </div>
      <div class="w3-third w3-padding" style="text-align: center;">
           <h1> Actions </h1>
           <a href="new-call-ident.html" class="w3-margin-top w3-button w3-large w3-border w3-hover-green w3-margin-bottom w3-padding-large w3-round-xxlarge"> New Call </a><br>
           <a href="recurring-call-ident.html" class="w3-margin-top w3-button w3-large w3-border w3-hover-green w3-margin-bottom w3-padding-large w3-round-xxlarge"> Recurring Call </a><br>
          <a href="task-search.html" class="w3-margin-top w3-button w3-large w3-border w3-hover-orange w3-margin-bottom w3-padding-large w3-round-xxlarge"> View All Calls </a><br>
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
      window.location.replace("login.html");
    }));
  </script>
</body>
</html>
