<?php $__env->startSection('rightcard'); ?>
		<p>Filename: incoming-new-call.blade.php</p>
		<form method="post" action="submitticket">
		<?php echo e(csrf_field()); ?>

        <h1 style="text-align: left"><span id="issue_id" class="badge badge-secondary">Issue #<?php echo e($issueID); ?></span> <span id="name" class="badge badge-secondary"><?php echo e($firstname); ?> <?php echo e($surname); ?></span></h1>
        <div class="row" style="padding-top: 2em; padding-bottom: 1em;">
              <div id="user_pane" class="col-4">
                    <ul class="list-group" style="text-align: left;">
                            <div id="user_info">                                             
                                <li class="list-group-item border-0"><i class="fas fa-user" style="padding-right: 1em;"></i><?php echo e($employeeID); ?> <?php echo e($firstname); ?> <?php echo e($surname); ?></li>
                                <li class="list-group-item border-0"><i class="fas fa-briefcase" style="padding-right: 1em;"></i><?php echo e($department); ?></li>
                                <li class="list-group-item border-0"><i class="fas fa-envelope" style="padding-right: 1em;"></i><?php echo e($email); ?></li>
                                <li class="list-group-item border-0"><i class="fas fa-phone" style="padding-right: 1em;"></i>07413 <?php echo e($extensionNumber); ?></li>
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
                        <select style="display:inline-block; vertical-align:top; overflow:hidden;" size="6" name="issueDefinition">
									<option class="list-group-item" value="Won't Log In">Won't Turn On</option>                        	
                        	<option class="list-group-item" value="Won't Log In">Won't Log In</option>
                        	<option class="list-group-item" value="No Network">No Network</option>
                        	<option class="list-group-item" value="Driver Issue">Driver Issue</option>
                        	<option class="list-group-item" value="No Network">Very Slow</option>
                        	<option class="list-group-item" value="Driver Issue">Individual Component</option>
                        </select>
                  </div>
            </div>
              <div id="extra_pane" class="col-4" style="text-align: left; padding-left: 1.5em; padding-right: 1.5em">
                    <div style="padding-bottom: 1em;">
                    			Priority
									<input type="range" class="" name="priority" min="1" max="3">
                    </div>
                    <textarea id="extra_notes" name="notes" style="background-color: #ffffcc; width: 100%; height: 20rem; resize: none;" class="form-control">Dear Patrick Star,</textarea>
              </div>
        </div>
        <div class="btn-block" style="margin-top: 2em;">
              <button type="submit" style="color: white" class="btn btn-primary btn-lg" name="selfsubmit"><i class="fas fa-user-tie" style="padding-right: 0.5em;"></i>Assign to self</button>
              <button type="submit" style="color: white" class="btn btn-primary btn-lg" name="specialistsubmit"><i class="fas fa-users" style="padding-right: 0.5em;"></i>Assign to specialist</button>
        </div>
        <input type="hidden" name="employeeID" value="<?php echo e($employeeID); ?>">
        </form>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('javascript'); ?>
	
	let affectedCounter = 0;
	//This function adds another textbox to enter affected hardware
	function addother() {
		let newdiv = document.createElement('div');
		affectedCounter++;
		newdiv.innerHTML += "<input type='text' class='m-1 form-control' name='affected[" + affectedCounter +"]' placeholder='Affected hardware/software'>";
		document.getElementById("textboxes").appendChild(newdiv);
	}
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.empty', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>