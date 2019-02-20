<?php

namespace Team1Helpdesk\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use DateTime;
use Auth;

class TicketController extends Controller
{
    private $issueDefinition;
    private $priority;
    private $notes;
    private $employeeID;
    private $id;
    private $specialistID;
    private $issueID;
	

	//Retrieves ticket data from the POST request, then adds a new ticket and initial update, before returning the specialist select view
    public function getTicketData(Request $request)
    {
        $this->issueDefinition = $request->input('issueDefinition');
        $this->priority = $request->input('priority');
        $this->notes = $request->input('notes');
        $this->employeeID = $request->input('employeeID');
        $this->specialistID = $request->input('specialistID');
        $affectedHardware = $request->input('affectedHardware');
        $affectedSoftware = $request->input('affectedSoftware');
        
        $tickets = DB::table('tickets');
        $currentTime = date('Y-m-d H:i:s');
		
        $this->id = $tickets->insertGetID(
            ['employeeID' => $this->employeeID, 'specialistID' => null,
             'issueDefinition' => $this->issueDefinition, 'priority' => $this->priority,
             'openTimestamp' => $currentTime, 'closeTimestamp' => null, 'specialistID' => $this->specialistID]
        );
		  $this->issueID = $tickets->where('openTimestamp', $currentTime)->first()->issueID;
		  
		  $hardwareTable = DB::table('affected_hardware');
		  //loops through affected hardware array and adds to the table
		  //table id issueID equipmentSerialNumber
		  if($affectedHardware!=""){
			for($i = 0; $i < sizeof($affectedHardware); $i++) {
					$hardwareTable->insert(['issueID' => $this->issueID, 'equipmentSerialNumber' => $affectedHardware[$i]]);
			}
		  }
		  $softwareTable = DB::table('affected_software');
		  if($affectedSoftware!=""){
			for($i = 0; $i < sizeof($affectedSoftware); $i++)
			{
				$softwareTable->insert(['issueID' => $this->issueID, 'softwareName' => $affectedSoftware[$i]]);
			}
		  
		  }
		  
        $updates = DB::table('updates');
        $currentTime = date('Y-m-d H:i:s');

        $updates->insert(['issueID' => $this->id, 'callerID' => $this->employeeID,
        'updateID' => 0, 'notes' => $this->notes, 'callReason' => 'Open Ticket',
        'openTimestamp' => $currentTime]);
        
        	$data['issueID'] = $this->issueID;
        	$specialists = DB::table('employees')->where('isSpecialist', true)->get()->toArray();
        	//return $specialists[0]->id;
        	
        	//loop to add each specialist to a new array with a count of how many tickets the specialist has
			$index = 0;    
			$specialistArray;    	
        	foreach($specialists as $specialist){
        		//Count how many tickets the specialist has
        		$count = DB::table('tickets')->where('specialistID', $specialist->id)->where('closeTimestamp', null)->get()->count();
        		$specialistArray[$index]['name'] = $specialist->name;
        		$specialistArray[$index]['surname'] = $specialist->surname;
        		$specialistArray[$index]['id'] = $specialist->id;
        		$specialistArray[$index]['count'] = $count;
        		$index++;
        	}
        	
			$data['specialists'] = $specialistArray;
			$data['tickets'] = retrieveSideTickets();
        	return view('new-call-specialist', $data);
    }
    
    
    public function retrieveTicket(Request $request)
    {
    		$issueID = $request->input('issueID');
    		$tickets = DB::table('tickets');
    		$updates = DB::table('updates');
    		$employees = DB::table('employees');
    		$prevUpdateID = $updates->where('issueID', $issueID)->max('updateID');
        	$updateID = (string)($prevUpdateID + 1);
			$employeeID = $tickets->where('issueID', $issueID)->first()->employeeID;
        	
        	//Ticket information
    		$data['employeeID'] = $employeeID;
			$data['updateNumber'] = $updateID;    		
    		$data['issueID'] = $issueID;
			$data['issueDefinition'] = $tickets->where('issueID', $issueID)->first()->issueDefinition;
			$data['priority'] = $tickets->where('issueID', $issueID)->first()->priority;
    		
    		//Information about initial caller
    		$row = $employees->where('id', $employeeID)->first();
    		$data['name'] = $row->name;
    		$data['surname'] = $row->surname;
    		$data['department'] = $row->department;
    		$data['email'] = $row->email;
    		$data['extensionNumber'] = $row->extension;
    		
    		$updateHistory = $updates->where('issueID', $issueID)->get();
			//For loop to populate array with update information
			if($updateHistory->count()==0){
				$data['history'] = "";
			}
			else{
				foreach($updateHistory as $result) {
					$callerName = $employees->where('id', $employeeID)->first()->name." ".$employees->where('id', $employeeID)->first()->surname;
					$history[$result->updateID][0] = $result->issueID.".".$result->updateID;
					$history[$result->updateID][1] = $result->openTimestamp;
					$history[$result->updateID][2] = $employeeID." - ".$callerName;
					$history[$result->updateID][3] = $result->callReason;
					$history[$result->updateID][4] = $result->notes;
				}
				$data['history'] = $history;
			}
    		
    		//Affected hardware
    		$affectedHardware = DB::table('affected_hardware')->where('issueID', $issueID)->get();
			$index = 0;
			if($affectedHardware->count()==0){
				$data['hardware'][0][0]="";
			}
			else{
				foreach($affectedHardware as $hardware){
					$serialNumber = $hardware->equipmentSerialNumber;
					$data['hardware'][$index][0] = $serialNumber;
					$hardwareInfo = DB::table('registered_hardware')->where('serialNumber', $serialNumber)->first();
					$data['hardware'][$index][1] = $hardwareInfo->make." ".$hardwareInfo->type;
				}
			}
			
			$data['tickets'] = retrieveSideTickets();
    		
    		return view('incoming-recurring-call', $data);
	}

}
