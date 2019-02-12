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
                <div style="text-align: center;"><img src="{{ url('/img/logo.png') }}" height="60rem"></div>
                <p style="text-align: center;"> <b>Operator's Station</b> </p>
                <hr class="w3-margin-bottom">
                <form action="login" method="post">
	                {{ csrf_field() }}
	                <p> Username
	                <input id="usernamefield" class="w3-input w3-border" name="username" type="text"></p>
	                <p> Password
	                <input id="passwordfield" class="w3-input w3-border" name="password" type="password"></p>
	                <input type="submit" value="Submit">
                </form>
                
                
                <!--<a id="login" href="main.html" class="w3-margin-top w3-button w3-border w3-hover-green w3-margin-bottom w3-padding-large w3-round-xlarge"> Login as Operator </a>-->
                </div>

    </div>

</body>
</html>
