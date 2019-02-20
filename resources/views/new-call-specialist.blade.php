@extends('layouts.empty')

@section('rightcard')
		<p>Filename: new-call-specialist.blade.php</p>
		<form method="post" action="submitSpecialist">
		{{ csrf_field() }}
        <h1 style="text-align: left"><span id="name" class="badge badge-secondary">Issue ID: #{{$issueID}}</span></h1>
        <div class="row" style="padding-top: 2em; padding-bottom: 1em;">
        <label for="specialistSelect">Select Specialist</label>
           <select class="m-1 form-control" id="specialistSelect" name="specialistSelect" size="5">
           
           </select>
        </div>
        <div class="btn-block" id="submitButtons" style="margin-top: 2em;">
              <button type="submit" style="color: white" class="btn btn-primary btn-lg"><i class="fas fa-user-tie" style="padding-right: 0.5em;"></i>Submit</button>
        </div>
        <input type="hidden" name="issueID" value="{{$issueID}}">
        <input type="hidden" name="specialistID" id="specialistID" value="">
        </form>
@endsection

@section('javascript')
	
function onload(){
	let decodeElement = document.createElement("textarea");
	decodeElement.innerHTML = "{{json_encode($specialists)}}";
	let jsonarray = decodeElement.value;
	let history = JSON.parse(jsonarray);
	//alert(history[0]['name']);
	
	for(let i = 0; i < history.length; i++){
		let specialist = document.createElement("option");
		specialist.value = history[i]['id'];
		specialist.classList.add("list-group-item");
		specialist.innerHTML = history[i]['id']+" "+history[i]['name']+" "+history[i]['surname']+" Open tickets:"+history[i]['count'];
		specialist.onclick = function (){chooseSpecialist(history[i]['id'])};
		document.getElementById('specialistSelect').appendChild(specialist);
	}
}
	
function chooseSpecialist(id){
	document.getElementById('specialistID').value = id;
}	
@endsection