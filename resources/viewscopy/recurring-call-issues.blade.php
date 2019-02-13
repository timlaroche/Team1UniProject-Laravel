<!DOCTYPE html>
<html>
<head>
    <title>Make-It-All Helpdesk</title>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../css/main.css">
 </head>

<body>
    <!-- Sidebar -->
    <div class="w3-sidebar w3-animate-left w3-bar-block w3-border-right" style="display:none" id="sidebar">
      <button onclick="sidebar_close()" class="w3-bar-item w3-large">Close &times;</button>
      <p class="w3-bar-item w3-xxlarge">Alice Peterson</p><br>
      <a href="#" class="w3-bar-item w3-hover-green w3-xlarge w3-button">Start Break</a>
      <a href="#" class="w3-bar-item w3-xlarge w3-hover-red w3-button">Log Off</a>
    </div>
    <button class="w3-button w3-round-xxlarge w3-white w3-margin-top w3-xlarge" style="border-radius: 0px 15px 15px 0px; "onclick="sidebar_open()">More</button>

    <!-- Page Content -->
        <div class="w3-display-middle w3-card w3-white w3-padding-large w3-round-xlarge">
                <div class="w3-padding" style="text-align: center;">
                    <div class="w3-container">
                        <h1>Patrick Star</h1>
                        <h2> Active Issues </h2>
                    </div>
                    <ul class="w3-ul w3-padding" style="text-align: right; overflow: auto; white-space: nowrap; max-height: 15rem;">
                        <li><a href="recurring-call-main.html" style="border-left: 1rem solid orange; background-color: #ffd280; padding: 0.5rem;" class="w3-btn"> Software/Desktop/Login Issue  </a></li>
                        <li><a href="recurring-call-main.html" style="border-left: 1rem solid yellow; background-color: #ffff99; padding: 0.5rem;" class="w3-btn"> Software/M-OS/Update Issue</a></li>
                    </ul>
                    <a href="recurring-call-ident.html" class="w3-margin-top w3-button w3-border w3-hover-red w3-margin-bottom w3-padding-large w3-round-xxlarge"> < Back </a>
                 </div>
             </div>
        <script>
        function sidebar_open() {
            document.getElementById("sidebar").style.display = "block";
        }

        function sidebar_close() {
            document.getElementById("sidebar").style.display = "none";
        }
        </script>
</body>
</html>
