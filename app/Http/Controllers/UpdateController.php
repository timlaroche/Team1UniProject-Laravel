<?php

namespace Team1Helpdesk\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use DateTime;
use Auth;

class UpdateController extends Controller
{
    public function createUpdate(Request $request)
    {
        $issueID = $request->input('issueID');
        $callerID = $request->input('callerID');
        $priority = $request->input('priority');
        $updateReason = $request->input('updateReason');
        $notes = $request->input('notes');

        
        $updates = DB::table('updates');
        $currentTime = date('Y-m-d H:i:s');
        $prevUpdateNumber = $updates->select('updateID')->where('issueID', '=', $issueID)->max('updateID');
        $updateNumber = $prevUpdateNumber + 1;

        $updates->insert(['issueID' => $issueID, 'updateID' => $updateNumber, 'callerID' => $callerID,
            'notes' => $notes, 'callReason' => $updateReason,
            'openTimestamp' => $currentTime]);

        $tickets = DB::table('tickets');
        $tickets->where('issueID', $issueID)->update(['priority' => $priority]);

        if($updateReason == "Close Ticket")
        {
            $tickets->where('issueID', $issueID)->update(['closeTimestamp' => $currentTime]);
        }
        $data['tickets'] = retrieveSideTickets();
        return view('done', $data);
    }
    
    //Function to change the specialist of a submitted ticket
    public function changeSpecialist(Request $request) {
    	$tickets = DB::table('tickets');
        $tickets->where('issueID', $request->input('issueID'))->update(['specialistID' => $request->input('specialistID')]);
        $data['tickets'] = retrieveSideTickets();
    	return view('done', $data);
    }
}
