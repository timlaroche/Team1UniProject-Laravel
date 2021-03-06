<?php

namespace Team1Helpdesk\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use DateTime;

class UpdateController extends Controller
{
    public function createUpdate(Request $request)
    {
        $issueID = $request->input('issueID');
        $callerID = $request->input('callerID');
        $priority = $request->input('priority');
        $updateReason = $request->input('updateReason');
        $notes = $request->input('notes');

        $this->pushToDB($issueID, $callerID, $priority, $updateReason, $notes);
    }
    
    public function pushToDB($issueID, $callerID, $priority, $updateReason, $notes)
    {
        $updates = DB::table('updates');
        $currentTime = date('Y-m-d H:i:s');
        $prevUpdateNumber = $updates->select('updateID')->where('issueID', '=', $issueID)->max('updateID');
        $updateNumber = $prevUpdateNumber + 1;

        $updates->insert(['issueID' => $issueID, 'updateID' => $updateNumber, 'callerID' => $callerID,
        'notes' => $notes, 'callReason' => $updateReason,
        'openTimestamp' => $currentTime]);
        
        $tickets = DB::table('updates');
        $tickets->insert(['priority' => $priority]);
    }
}
