@extends('layouts.empty')

@section('rightcard')
		<form method="post" action="submitupdate">
		{{ csrf_field() }}
        <h1 style="text-align: left"><span id="issue_id" class="badge badge-secondary">Issue #{{$issueID}}.{{$updateNumber}}</span> <span id="name" class="badge badge-secondary">{{$name}} {{$surname}}</span></h1>
        <div class="row" style="padding-top: 2em; padding-bottom: 1em;">
              <div id="user_pane" class="col-4">
                    <ul class="list-group" style="text-align: left;">
                            <div id="user_info">                                             
                                <li class="list-group-item border-0"><i class="fas fa-user" style="padding-right: 1em;"></i>{{$employeeID}} {{$name}} {{$surname}}</li>
                                <li class="list-group-item border-0"><i class="fas fa-briefcase" style="padding-right: 1em;"></i>{{$department}}</li>
                                <li class="list-group-item border-0"><i class="fas fa-envelope" style="padding-right: 1em;"></i>{{$email}}</li>
                                <li class="list-group-item border-0"><i class="fas fa-phone" style="padding-right: 1em;"></i>{{$extensionNumber}}</li>
                                <li class="list-group-item border-0"><i class="fas fa-sticky-note" style="padding-right: 1em;"></i>Notes!</li>									                        
                                </li>
                            </div>
                            <div class="dropdown-divider"></div>
                            <div id="affected_items" style="text-align: left">
                            		<div id="hardwareTextboxes">
                                  
                                  </div>
                                  <button type="button" class="m-1 btn btn-outline-info" onclick="addOtherHardware()"><i class="fas fa-plus" style="padding-right: 0.5em;"></i>Add Hardware</button>
                           </div>
                           <div id="affected_items" style="text-align: left">
                            		<div id="softwareCombos">
                            		
                                  </div>
                                  <button type="button" class="m-1 btn btn-outline-info" onclick="addOtherSoftware()"><i class="fas fa-plus" style="padding-right: 0.5em;"></i>Add Software</button>
                           </div>
                    </ul>
              </div>
              
              
              <div class="col-4" style="text-align: left;">
                      <h1> History </h1>
                    <ul style="text-align: left; overflow: auto; white-space: nowrap; max-height: 25rem; overflow-y: scroll;" id="callHistory">
                    </ul>
            </div>
              <div id="extra_pane" class="col-4" style="text-align: left; padding-left: 1.5em; padding-right: 1.5em">
                    <div style="padding-bottom: 1em;">
                    			Priority
									<input type="range" class="" name="priority" min="1" max="3">
                    </div>
                    <div>
	                    <button type="button" class="btn-outline-info btn" style="display: inline;" onclick="originalCallerID()">Original Caller</button>
	                    <input type="text" name="callerID" id="callerID" placeholder="Caller ID" style="float:right; display: inline;">
							</div>                    
                    <select style="display:inline-block; vertical-align:top; width: 100%; overflow-y: hidden;" size="3" name="updateReason" required="true">
									<option class="list-group-item" value="Information Update">Information Update</option>                        	
                        	<option class="list-group-item" value="Feedback Request">Feedback Request</option>
                        	<option class="list-group-item" value="Close Ticket">Close Ticket</option>
                        </select>
                    <textarea id="extra_notes" name="notes" style="background-color: #ffffcc; width: 100%; height: 7rem; resize: none; overflow-y: scroll;" class="form-control">Dear Patrick Star,</textarea>
              </div>
        </div>
        <div class="btn-block" style="margin-top: 2em;">
              <button type="submit" style="color: white" class="btn btn-primary btn-lg" name="submit"><i class="fas fa-check" style="padding-right: 0.5em;"></i>Submit</button>
        </div>
        
        <input type="hidden" name="employeeID" value="{{$employeeID}}">
        <input type="hidden" name="issueID" value="{{$issueID}}">
        </form>
@endsection

@section('javascript')
	
	let hardwareCounter = 0;
	let softwareCounter = 0;
	
	//This function adds another textbox to enter affected hardware
	function addOtherHardware() {
		let newdiv = document.createElement('div');
		newdiv.innerHTML += "<input type='text' class='m-1 form-control' name='affectedHardware[" + hardwareCounter +"]' placeholder='Hardware serial number'>";
		document.getElementById("hardwareTextboxes").appendChild(newdiv);
		hardwareCounter++;
	}
	
	//This function adds another comboBox to enter affected software
	function addOtherSoftware(){
		let newdiv = document.createElement('div');
		newdiv.innerHTML += "<select class='m-1 form-control' style='width: 100%;' name='affectedHardware["+ softwareCounter +"]'></select>";
		document.getElementById("softwareCombos").appendChild(newdiv);
		softwareCounter++;
	}
	
	function originalCallerID(){
		let id = "{{$employeeID}}";
		document.getElementById('callerID').value = id;
	}
	
	function onload(){
		let decodeElement = document.createElement("textarea");
		decodeElement.innerHTML = "{{json_encode($history)}}";
		let jsonarray = decodeElement.value;
		let history = JSON.parse(jsonarray);
		for(let i = 0; i<history.length; i++){
			let update = "<li><b>" + history[i][0] + "</b><br><b>Date </b>" + history[i][1] + "<br><b>Caller </b>" + history[i][2] + "<br><b>Call Reason </b>" + history[i][3] + "<br><b>Notes </b>" + history[i][4] + "<br></li><br>"
			document.getElementById("callHistory").innerHTML += update;
		}
	}
@endsection