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
                                <li class="list-group-item border-0"><i class="fas fa-sticky-note" style="padding-right: 1em;"></i>{{$issueDefinition}}</li>						                        
                                
                            </div>
                            <div class="dropdown-divider"></div>
                            <div id="affected_items" style="text-align: left">
                            		<div id="hardwareTextboxes">
                                  
                                  </div>
                                  <button type="button" class="m-1 btn btn-outline-info" onclick="addOtherHardware()"><i class="fas fa-plus" style="padding-right: 0.5em;"></i>Add Hardware</button>
                           </div>
                           <!--<div id="affected_items" style="text-align: left">
                            		<div id="softwareCombos">
                            		
                                  </div>
                                  <button type="button" class="m-1 btn btn-outline-info" onclick="addOtherSoftware()"><i class="fas fa-plus" style="padding-right: 0.5em;"></i>Add Software</button>
                           </div>-->
                    </ul>
              </div>
              
              
              <div class="col-4" style="text-align: left;">
                      <h1> History </h1>
                    <ul style="text-align: left; max-height: 25rem; overflow-y: scroll; width:100%;" id="callHistory">
                    </ul>
            </div>
              <div id="extra_pane" class="col-4" style="text-align: left; padding-left: 1.5em; padding-right: 1.5em">
                    <div style="padding-bottom: 1em;">
 										 <div><span class="float-left">Low Priority</span><span class="float-right">High Priority</span>
											<input type="range" class="custom-range form-control" min="1" max="3" id="customRange2" name="priority">
										</div>
                    </div>
                    <div>
										<div class="input-group mb-3">
											<div class="input-group-prepend">
												<button class="btn btn-outline-secondary" onclick="originalCallerID()" type="button">Same User</button>
											</div>
											<input type="text" class="form-control"  id="callerID" placeholder="" aria-label="" aria-describedby="basic-addon1" name="callerID" required="true">
										</div>
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
		newdiv.innerHTML += "<input type='text' class='m-1 form-control' name='affectedSoftware[" + softwareCounter +"]' placeholder='Software serial number'>";
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
		
		decodeElement.innerHTML = "{{json_encode($hardware)}}";
		let jsonarray2 = decodeElement.value;
		let hardware = JSON.parse(jsonarray2);
		if(hardware != ""){
			for(let i = 0; i<hardware.length; i++){
				let affected = '<li class="list-group-item border-0"><i class="fas fa-desktop" style="padding-right: 1em;"></i>'+hardware[i][0]+' '+hardware[i][1]+'</li>';		
				document.getElementById('user_info').innerHTML += affected;
			}
		}
		

		document.getElementById('customRange2').value = {{$priority}};
	}
@endsection