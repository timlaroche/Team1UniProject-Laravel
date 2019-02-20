<!DOCTYPE html>
<html>
<head>
    <title>Make-It-All Helpdesk</title>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">	
	 <link rel="stylesheet" href="/public/css/main.css">	
	<script>
		function mycalls() {
			document.getElementById('my_calls').style.display = "block";
			document.getElementById('incoming_call').style.display = "none";
			document.getElementById('mycallsbutton').className = "nav-link btn active";
			document.getElementById('incomingcallsbutton').className = "nav-link btn";
		}
		
		function incomingcalls() {
			document.getElementById('my_calls').style.display = "none";
			document.getElementById('incoming_call').style.display = "block";
			document.getElementById('mycallsbutton').className = "nav-link btn";
			document.getElementById('incomingcallsbutton').className = "nav-link btn active";
            }
            
            function onload(){
                  let decodeElement = document.createElement("textarea");
                  decodeElement.innerHTML = "{{json_encode($tickets)}}";
                  let jsonarray = decodeElement.value;
                  let tickets = JSON.parse(jsonarray);
                  for(let i = 0; i<tickets.length; i++){
                        let ticket = '<a href="" class="btn btn-block m-1 p-3 btn-danger"><span id="issue_id" class="badge badge-pill badge-secondary">#'+tickets[i][0]+'</span> <span id="description">'+tickets[i][1]+'</span></a>';
                        document.getElementById("myTickets").innerHTML += ticket;
                  }
            }
	</script>
	<script>@yield('javascript')</script>
 </head>

 <body style="background-color: #f8f8e8; font-size: 100%;" onload="onload();">
      <div class="container-fluid" style="margin-top: 3em;">
              <div class="row" style="margin: 0">
                    <div id="sidepanel" class="col-3" style="text-align: center;">
                          <div id="user" style="padding-bottom: 1.5em;">
                         </div>
                         <div id="call_type" style="padding-bottom: 1.5em;">
                               <ul class="nav nav-pills nav-fill">
                                     <li class="nav-item">
                                           <a class="nav-link active" id="mycallsbutton" href="#" onclick="mycalls()"><i class="fas fa-bars" style="padding-right: 0.5em;"></i>My Calls</a>
                                     </li>
                                     <li class="nav-item">
                                           <a class="nav-link" href="#" id="incomingcallsbutton" onclick="incomingcalls()"><i class="fas fa-phone" style="padding-right: 0.5em;"></i>Incoming Call</a>
                                     </li>
                              </ul>
                        </div>
                        <div id="my_calls">
                              <!--<div class="rounded p-4" style="margin: 0em;">
                                    <h3> Requests </h3>
                                    <a href="" class="btn btn-block m-1 p-3 btn-info"><span id="issue_id" class="badge badge-pill badge-secondary">#1993</span> <span id="description">Closure Request</span></a>
                              </div>-->
                                <div class="rounded p-4 m-2" style="margin: 0em;">
                                      <h3> Calls </h3>
                                      <div id="myTickets">

                                      </div>
                                </div>
                        </div>
                        <div id="incoming_call" style="overflow: auto; height: 35em; display: none;">
                              <div class="rounded p-4" style="margin: 0em;">
                                    <h3> Call Reason </h3>
                                    <a type="button" class="btn  m-1 p-3  btn-primary" href="/newcallident">New Call</a>
                                    <a type="button" class="btn  m-1 p-3  btn-primary" href="/recurringcallident">Recurring Call</a>
                              </div>
                        </div>
                        <a type="button" class="btn" href="/logout" style="margin-bottom: 2em; margin-top: 2em;"><i class="fas fa-sign-out-alt"></i></a>
                    </div>
                  <div class="col-9" style="text-align: center; margin-top: 2em;">
                        <div class="rounded p-4 sticky-top" style="background-color: white; border: 0.6em solid lightgrey; border-radius: 9px">
                           @yield('rightcard')         
                  	</div>
                    <div class="sticky-top">
                    </div>
                  </div>
                  </div>
              </div>
</body>
</html>
