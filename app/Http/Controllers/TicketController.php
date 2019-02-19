<?php

namespace Team1Helpdesk\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use DateTime;

class TicketController extends Controller
{
    private $issueDefinition;
    private $priority;
    private $notes;
    private $employeeID;
    private $id;

    public function getTicketData(Request $request)
    {
        $this->issueDefinition = $request->input('issueDefinition');
        $this->priority = $request->input('priority');
        $this->notes = $request->input('notes');
        $this->employeeID = $request->input('employeeID');

        $this->pushToDB();
    }
    public function pushToDB()
    {
        $tickets = DB::table('tickets');
        $currentTime = date('Y-m-d H:i:s');

        $this->id = $tickets->insertGetID(
            ['employeeID' => $this->employeeID, 'specialistID' => null,
             'issueDefinition' => $this->issueDefinition, 'priority' => $this->priority,
             'openTimestamp' => $currentTime, 'closeTimestamp' => null]
        );

        $this->addInitialTicket();
    }
    public function addInitialTicket()
    {
        $updates = DB::table('updates');
        $currentTime = date('Y-m-d H:i:s');

        $updates->insert(['issueID' => $this->id, 'callerID' => $this->employeeID,
        'updateID' => 0, 'notes' => $this->notes, 'callReason' => 'Open Ticket',
        'openTimestamp' => $currentTime]);
    }
}
