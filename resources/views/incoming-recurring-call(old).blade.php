@extends('layouts.empty')

@section('rightcard')

                <div class="w3-container w3-center w3-margin-bottom">
                    <h1> Patrick Star <span class="w3-tag w3-deep-orange">Issue ID #8482.3</span> </h1>
                </div>
                <div class="w3-padding w3-quarter" style="text-align: center;">
                    <h1> Info </h1>
                    <ul class="w3-ul" style="text-align: left; overflow: auto; white-space: nowrap; max-height: 25rem;">
                        <li>Assigned to: <br><b>Frank William Abagnale</b></li>
                        <li>ID: <br><b> A1234</b></li>
                        <li>Notes: <br><b>User cannot log into their account<br>Windows recognises credentials <br><span class="w3-tag w3-deep-orange">.1</span><br>Gets stuck on "Group Policy"</b></li>
                        <li>Rating:<br><b><span class="w3-tag w3-orange">Medium Urgency</span></b></li>
                        <li>Dept: <br><b>Project Accounting</b></li>
                        <li>Pos: <br><b>Deputy Team Lead</b></li>
                        <li>Mail: <br><b>p.star@makeitall.com</b></li>
                        <li>Num: <br><b>07413012084</b></li>
                        <li>Office: <br><b>Room 3.21</b></li>
                        <li>Desktop Model: <br><b>HP Desk8300</b></li>
                        <li>Desktop OS: <br><b>Windows 7 Pro</b></li>
                        <li>Mobile Model: <br><b>Apple iPad Pro 12.9</b></li>
                        <li>Mobile OS: <br><b>iOS 12.1.1</b></li>
                        <li>Software: <br><b>AutoCAD ArduinoIDE NX11</b></li>
                    </ul>
                </div>
                <div class="w3-padding w3-quarter" style="text-align: center;">
                    <h1> History </h1>
                    <ul class="w3-ul" style="text-align: left; overflow: auto; white-space: nowrap; max-height: 25rem;">
                        <li><span class="w3-tag w3-deep-orange">#8482</span><b> Login Issue </b><br><br>At<b> 16/04/18 09:45 </b></li><br>
                        <li><span class="w3-tag w3-deep-orange">#8482.1</span><b> Info Update </b><br><br>Date <b> 16/04/18 10:02 </b><br>Caller <b> Roger Federer A3241</b></li><br>
                        <li><span class="w3-tag w3-deep-orange">#8482.2</span><b> Feedback Request </b><br><br>Date <b> 22/04/18 13:32 </b><br>Caller <b> Self</b></li>
                    </ul>
                </div>
                <div class="w3-padding w3-quarter" style="text-align: center;">
                    <h1> Caller </h1>
                    <div class="w3-bar" style="text-align: center;">
                        <a class="w3-margin-top w3-button w3-margin-bottom btn-default w3-large w3-border w3-hover-blue w3-round-xxlarge"> Initial User </a>
                        <input id="caller" onkeypress="changecaller()" class="w3-input w3-center w3-round-xxlarge" type="text" style="margin: 0 auto; width: 7rem; border: 0.5px solid #cccccc; text-align: center;" placeholder="AXXX">
                    </div>
                    <br><br>
                    <h1> Call Reason </h1>
                    <div class="w3-bar">
                        <a  class="w3-margin-top w3-button w3-large w3-border w3-hover-blue w3-round-xxlarge"> Information Update </a>
                        <br>
                        <a id="reason" onclick="changereason()" class="w3-margin-top w3-button w3-large w3-border w3-hover-blue w3-round-xxlarge"> Feedback Request </a>
                        <br>
                        <a class="w3-margin-top w3-button w3-large w3-border w3-hover-blue w3-round-xxlarge"> Remove Issue </a>
                    </div>
                </div>
                <div class="w3-padding w3-quarter" style="text-align: center;">
                    <h1> Notes </h1>
                    <form>
                        <textarea style="width: 80%; height: 25rem; resize: none;" class="w3-border w3-pale-yellow w3-round-large w3-padding" placeholder="- Separate sections by bullet points if writing more than one note">Dear F W Abagnale, </textarea>
                    </form>
                </div>
                <div class="w3-container w3-center w3-padding-top">
                    <a href="recurring-call-issues.html" class="w3-margin-top w3-button w3-border w3-hover-red w3-margin-bottom w3-padding-large w3-round-xxlarge"> < Back </a>
                    <a href="recurring-call-done.html" class="w3-margin-top w3-button w3-large w3-border w3-hover-green w3-margin-bottom w3-padding-large w3-round-xxlarge"> Update Issue </a>
                    <br>
                    <p> Review data before next stage </p>
                </div>

@endsection
