@extends('layouts.empty')

@section('rightcard')
		<p>Filename: incoming-new-call.blade.php</p>
		<form method="post" action="submitticket">
		{{ csrf_field() }}
        <h1 style="text-align: left"><span id="name" class="badge badge-secondary">{{$firstname}} {{$surname}}</span></h1>
        <div class="row" style="padding-top: 2em; padding-bottom: 1em;">
              <div id="user_pane" class="col-4">
                    <ul class="list-group" style="text-align: left;">
                            <div id="user_info">                                             
                                <li class="list-group-item border-0"><i class="fas fa-user" style="padding-right: 1em;"></i>{{$employeeID}} {{$firstname}} {{$surname}}</li>
                                <li class="list-group-item border-0"><i class="fas fa-briefcase" style="padding-right: 1em;"></i>{{$department}}</li>
                                <li class="list-group-item border-0"><i class="fas fa-envelope" style="padding-right: 1em;"></i>{{$email}}</li>
                                <li class="list-group-item border-0"><i class="fas fa-phone" style="padding-right: 1em;"></i>{{$extensionNumber}}</li>
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
              
              
              <div id="problem_selector_pane" class="col-4" style="text-align: left;">
                      <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="#">Hardware</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Desktop</li>
                          </ol>
                    </nav>
                    <div class="list-group">
                        <!--<button class="list-group-item btn-outline-dark">Won't Turn On</button>
                        <button class="list-group-item btn-outline-dark">Won't Log In</button>
                        <button class="list-group-item btn-outline-dark">No Network</button>
                        <button class="list-group-item btn-outline-dark">Driver Issue</button>
                        <button class="list-group-item btn-outline-dark">Very Slow</button>
                        <button class="list-group-item btn-outline-dark">Individual Component</button>-->
                        <select style="display:inline-block; vertical-align:top; overflow:hidden;" size="6" name="issueDefinition" required="true">
									<option class="list-group-item" value="Won't Turn On">Won't Turn On</option>                        	
                        	<option class="list-group-item" value="Won't Log In">Won't Log In</option>
                        	<option class="list-group-item" value="No Network">No Network</option>
                        	<option class="list-group-item" value="Driver Issue">Driver Issue</option>
                        	<option class="list-group-item" value="Very Slow">Very Slow</option>
                        	<option class="list-group-item" value="Individual Component">Individual Component</option>
                        </select>
                  </div>
            </div>
              <div id="extra_pane" class="col-4" style="text-align: left; padding-left: 1.5em; padding-right: 1.5em">
                    <div style="padding-bottom: 1em;">
                    			Priority
									<input type="range" class="" name="priority" min="1" max="3">
                    </div>
                    <textarea id="extra_notes" name="notes" style="background-color: #ffffcc; width: 100%; height: 20rem; resize: none;" placeholder="Enter notes here" class="form-control" required="true"></textarea>
              </div>
        </div>
        <div class="btn-block" id="submitButtons" style="margin-top: 2em;">
              <button type="submit" style="color: white" class="btn btn-primary btn-lg"><i class="fas fa-user-tie" style="padding-right: 0.5em;"></i>Submit</button>
        </div>
        <input type="hidden" name="employeeID" value="{{$employeeID}}">
        <input type="hidden" name="specialistID" id="specialistID" value="">
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
		newdiv.innerHTML += "<select class='m-1 form-control' style='width: 100%;' name='affectedSoftware["+ softwareCounter +"]'></select>";
		document.getElementById("softwareCombos").appendChild(newdiv);
		softwareCounter++;
	}
	
	function selfSubmit(){
		alert();
		document.getElementById("specialistID").value = "{{Auth::user()['employeeID']}}";	
	}
	
@endsection