@extends('layouts.empty')

@section('rightcard')
		<p>Filename: incoming-recurring-call.blade.php</p>
		<form method="post" action="api/submitupdate">
		{{ csrf_field() }}
        <h1 style="text-align: left"><span id="issue_id" class="badge badge-secondary">Issue #{{$issueID}}.{{$updateNumber}}</span> <span id="name" class="badge badge-secondary">{{$name}} {{$surname}}</span></h1>
        <div class="row" style="padding-top: 2em; padding-bottom: 1em;">
              <div id="user_pane" class="col-4">
                    <ul class="list-group" style="text-align: left;">
                            <div id="user_info">                                             
                                <li class="list-group-item border-0"><i class="fas fa-user" style="padding-right: 1em;"></i>{{$employeeID}} {{$name}} {{$surname}}</li>
                                <li class="list-group-item border-0"><i class="fas fa-briefcase" style="padding-right: 1em;"></i>{{$department}}</li>
                                <li class="list-group-item border-0"><i class="fas fa-envelope" style="padding-right: 1em;"></i>{{$email}}</li>
                                <li class="list-group-item border-0"><i class="fas fa-phone" style="padding-right: 1em;"></i>07413 {{$extensionNumber}}</li>
                                <li class="list-group-item border-0"><i class="fas fa-sticky-note" style="padding-right: 1em;"></i>Notes!</li>
                                <li class="list-group-item border-0"><i class="fas fa-desktop" style="padding-right: 1em;"></i>Hardware/software</li>	
                                <li class="list-group-item border-0"><i class="fas fa-desktop" style="padding-right: 1em;"></i>Hardware/software</li>										                        
                                </li>
                            </div>
                            <div class="dropdown-divider"></div>
                            <div id="affected_items" style="text-align: left">
                            		<div id="textboxes">
                                  <input type='text' class='m-1 form-control' name='affected[0]' placeholder='Affected hardware/software'>
                                  </div>
                                  <button type="button" class="m-1 btn btn-outline-info" onclick="addother()"><i class="fas fa-plus" style="padding-right: 0.5em;"></i>Add other</button>
                                  <!--<input type="hidden" name="affected" id="affected" value="">-->
                           </div>
                    </ul>
              </div>
              
              
              <div class="col-4" style="text-align: left;">
                      <h1> History </h1>
                    <ul style="text-align: left; overflow: auto; white-space: nowrap; max-height: 25rem; overflow-y: scroll;">
                        <li><span class="w3-tag w3-deep-orange">#8482</span><b> Login Issue </b><br><b>Date</b> 16/04/18 09:45<br><b>Notes </b>yadayaday<br></li><br>
                        <li><span class="w3-tag w3-deep-orange">#8482.1</span><b> Info Update </b><br><b>Date </b> 16/04/18 10:02<br><b>Caller</b> Roger Federer A3241<br><b>Notes </b>yadayaday<br></li><br>
                        <li><span class="w3-tag w3-deep-orange">#8482.2</span><b> Feedback Request </b><br><b>Date </b> 22/04/18 13:32<br><b>Caller</b> Self<br><b>Notes </b>yadayaday<br></li>
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
        
        </form>
@endsection

@section('javascript')
	
	let affectedCounter = 0;
	//This function adds another textbox to enter affected hardware
	function addother() {
		let newdiv = document.createElement('div');
		affectedCounter++;
		newdiv.innerHTML += "<input type='text' class='m-1 form-control' name='affected[" + affectedCounter +"]' placeholder='Affected hardware/software'>";
		document.getElementById("textboxes").appendChild(newdiv);
	}
	
	function originalCallerID(){
		let id = "{{$employeeID}}";
		document.getElementById('callerID').value = id;
	}
@endsection