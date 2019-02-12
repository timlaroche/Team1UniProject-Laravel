﻿<!DOCTYPE html>
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
                    <h1>Phone Extension</h1>
                </div>
                <form class="w3-container">
                    <input id='employeeidinput' class="w3-center w3-input w3-xlarge w3-border w3-round-xxlarge" type="text">
                    <label id="error">ex: XX</label>
                </form>
                <a href="main.html" class="w3-margin-top w3-button w3-border w3-hover-red w3-margin-bottom w3-padding-large w3-round-xxlarge"> < Back </a>
                <a id="nextbutton" href="new-call-main.html" class="w3-margin-top w3-button w3-large w3-border w3-hover-green w3-margin-bottom w3-padding-large w3-round-xxlarge"> Next > </a>
                <br>
                <a href="#" class="w3-button w3-hover-orange w3-round-xlarge"> Search by name </a>
                <a href="new-call-ident.html" class="w3-button w3-hover-orange w3-round-xlarge"> Search by office ID </a>

             </div>
         </div>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://www.gstatic.com/firebasejs/5.5.4/firebase.js"></script>
    <script>
      // Initialize Firebase
      var config = {
        apiKey: "AIzaSyADO8TYrvY9YQ06tnr0oScByw2rXbUWI90",
        authDomain: "team1-helpdesk.firebaseapp.com",
        databaseURL: "https://team1-helpdesk.firebaseio.com",
        projectId: "team1-helpdesk",
        storageBucket: "team1-helpdesk.appspot.com",
        messagingSenderId: "469732965366"
      };
      firebase.initializeApp(config);
    </script>
    <script type="text/javascript">

        $('#employeeidinput').on('keydown', function (e){
        		if (e.keyCode == 13) {
        			logIn();
        		}
        });


        $('#nextbutton').on('click', function(e){
            e.preventDefault();
            logIn();
        });

        //GET VALUE IN TEXT FIELD INTO VARIABLE
        function logIn(){
        		var x = $('#employeeidinput').val();
            if(x === ""){
                $('#error').html("Could not find employee");
            }
            console.log(x)
            var y = db.collection("employees").doc(x);
            y.get().then(function(doc){
                if(doc.exists){
                    window.location.replace('new-call-main.html')
                }
                else{
                    console.log("No such employee!")
                    $('#error').html("Could not find employee");
                }
            });
        }
        function sidebar_open() {
            document.getElementById("sidebar").style.display = "block";
        }

        function sidebar_close() {
            document.getElementById("sidebar").style.display = "none";
        }
        </script>
</body>
</html>
