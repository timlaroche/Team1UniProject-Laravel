<!DOCTYPE html>
<html>
<head>
    <title>Make-It-All Helpdesk</title>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="{{ url('/css/main.css') }}">
 </head>

<body>
    <div class="w3-display-container" style="height:50rem;">
            <div class="w3-display-middle w3-card w3-white w3-padding-large w3-round-xlarge">
                <div style="text-align: center;"><img src="library/img/logo.png" height="60rem"></div>
                <p style="text-align: center;"> <b>Operator's Station</b> </p>
                <hr class="w3-margin-bottom">
                <p>Username
                <input id="usernamefield" class="w3-input w3-border" name="first" type="text"></p>
                <p>Password
                <input id="passwordfield" class="w3-input w3-border" name="last" type="password"></p>
                <a id="login" href="main.html" class="w3-margin-top w3-button w3-border w3-hover-green w3-margin-bottom w3-padding-large w3-round-xlarge"> Login as Operator </a>
                <a id="login" href="library/html/analyst-main.html" class="w3-margin-top w3-button w3-border w3-hover-green w3-margin-bottom w3-padding-large w3-round-xlarge"> Login as Analyst </a>
                <a id="login" href="library/html/specialist-main.html" class="w3-margin-top w3-button w3-border w3-hover-green w3-margin-bottom w3-padding-large w3-round-xlarge"> Login as Specialist </a>
            </div>

    </div>
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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <!-- Prototype login function -->
    <script type="text/javascript">
        $('#login').on('click', (function(e){
            e.preventDefault()
            var username = $('#usernamefield').val()
            var password = $('#passwordfield').val()
            if(username === "admin"){
                if(password === "Admin123"){
                    window.location.replace("library/html/main.html");
                }
            }
            else{
                $('#failedlogin').show()
            }
        }));
    </script>
</body>
</html>
