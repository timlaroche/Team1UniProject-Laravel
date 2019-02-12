@extends('layouts.empty')

@section('rightcard')
		<form method="post" action="submitticket">
		{{ csrf_field() }}
        <h1 style="text-align: left"><span id="issue_id" class="badge badge-secondary">Issue #7323</span> <span id="name" class="badge badge-secondary">Patrick Star</span></h1>
        <div class="row" style="padding-top: 2em; padding-bottom: 1em;">
              <div id="user_pane" class="col-4">
                    <ul class="list-group" style="text-align: left;">
                            <div id="user_info">                                             
                                <li class="list-group-item border-0"><i class="fas fa-user" style="padding-right: 1em;"></i>A1234 Patrick Star</li>
                                <li class="list-group-item border-0"><i class="fas fa-briefcase" style="padding-right: 1em;"></i>Accounting Dept, Room 12.3</li>
                                <li class="list-group-item border-0"><i class="fas fa-envelope" style="padding-right: 1em;"></i>p.star@makeitall.co.uk</li>
                                <li class="list-group-item border-0"><i class="fas fa-phone" style="padding-right: 1em;"></i>07413 012088</li>
                            </div>
                            <div class="dropdown-divider"></div>
                            <div id="affected_items" style="text-align: left">
                                  <button type="button" class="list-group-item m-1 border-0 btn btn-outline-dark" onclick="addaffected(this.value)" value="HP Pavilion 8300, Windows 7 Pro"><i class="fas fa-tablet-alt" style="padding-right: 1em;"></i>HP Pavilion 8300, Windows 7 Pro</li></button>
                                  <button type="button" class="list-group-item m-1 border-0 btn btn-outline-dark" onclick="addaffected(this.value)" value="iPad Pro 12.9 2018, iOS 12.1"><i class="fas fa-tablet-alt" style="padding-right: 1em;"></i>iPad Pro 12.9 2018, iOS 12.1</li></button>
                                  <button type="button" class="list-group-item m-1 border-0 btn btn-outline-dark" onclick="addaffected(this.value)" value="Office Suite"><i class="fas fa-box-open" style="padding-right: 1em;"></i>Office Suite</li></button>
                                  <button type="button" class="list-group-item m-1 border-0 btn btn-outline-dark" onclick="addaffected(this.value)" value="Arduino IDE"><i class="fas fa-box-open" style="padding-right: 1em;"></i>Arduino IDE</li></button>
                                  <button type="button" class="list-group-item m-1 border-0 btn btn-outline-dark" onclick="addaffected(this.value)" value="HP Deskjet 8300"><i class="fas fa-print" style="padding-right: 1em;"></i>HP Deskjet 8300</li></button>
                                  <button type="button" class="m-1 btn btn-outline-info" onclick="addother()"><i class="fas fa-plus" style="padding-right: 0.5em;"></i>Add other</button>
                                  <input type="hidden" name="affected" id="affected" value="">
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
                        <a href="#" class="list-group-item btn-outline-dark"><span id="priority" class="text-danger" style="padding-right: 0.5em">●</span>Won't Turn On</a>
                        <a href="#" class="list-group-item btn-outline-dark"><span id="priority" class="text-warning" style="padding-right: 0.5em">●</span>Won't Log In</a>
                        <a href="#" class="list-group-item btn-outline-dark"><span id="priority" class="text-warning" style="padding-right: 0.5em">●</span>No Network</a>
                        <a href="#" class="list-group-item btn-outline-dark"><span id="priority" class="text-warning" style="padding-right: 0.5em">●</span>Driver Issue</a>
                        <a href="#" class="list-group-item btn-outline-dark"><span id="priority" class="text-success" style="padding-right: 0.5em">●</span>Very Slow</a>
                        <a href="#" class="list-group-item btn-outline-dark"><span id="priority" class="text-warning" style="padding-right: 0.5em">●</span>Individual Component</a>
                  </div>
                  <input type="hidden" name="issue">
            </div>
              <div id="extra_pane" class="col-4" style="text-align: left; padding-left: 1.5em; padding-right: 1.5em">
                    <div class="btn-block" style="padding-bottom: 1em">
                          <button type="button" class="m-1 btn btn-outline-info" data-toggle="button" aria-pressed="false" autocomplete="off"><i class="fas fa-exclamation" style="padding-right: 0.5em;"></i>Add urgency</button>
                    </div>
                    <textarea id="extra_notes" name="notes" style="background-color: #ffffcc; width: 100%; height: 20rem; resize: none;" class="form-control">Dear Patrick Star,</textarea>
              </div>
        </div>
        <div class="btn-block" style="margin-top: 2em;">
              <button type="submit" style="color: white" class="btn btn-primary btn-lg" name="selfsubmit"><i class="fas fa-user-tie" style="padding-right: 0.5em;"></i>Assign to self</button>
              <button type="submit" style="color: white" class="btn btn-primary btn-lg" name="specialistsubmit"><i class="fas fa-users" style="padding-right: 0.5em;"></i>Assign to specialist</button>
        </div>
        
        </form>
@endsection

@section('javascript')
	function addother(){
		alert("This function will add a text box under the automatically detected hardware/software to type in other hardware/software");	
	}
	
	var affected = [];
	function addaffected(x){
		affected.push(x);
		alert(affected);
	}
@endsection