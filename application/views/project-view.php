<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
			
			<!--START QUERYING AND SORTING OF TABLE VALUES-->

							<?php
								//Instantiate variables

								$cash_on_hand = 0;
								$cash_on_bank = 0;

								$ongoing = 0;
								
								/* EXPENSE TRANSACTION */
								$transaction_id = 0;
								foreach($project->result_array() as $row){ 
								
								$ongoing++;

							 	} 
							?>
			

				<div class="container">

					<!--The overwatch Main element Container or MEC-->

					<div class="table-bank-row">
						<div class="col-xs-9 table-end-general table-end table-bank">
								<div class="col-md-6 total-label total-label-bank">ONGOING PROJECTS --</div><div class="col-md-6 total-amount"> <?php echo $ongoing; ?></div>
						</div>
						<div class="col-xs-4"></div>
					</div>

					<div class="overwatch-mec">

						<div class="col-xs-12">
							<div class="row table-title table-title-general">
								<div class="col-xs-3">Time Left</div>
								<div class="col-xs-4 col-sm-3">Project Name</div>
								<div class="col-xs-2 col-sm-3">Potatocoders</div>
								<div class="col-xs-3">Budget</div>
							</div>

							<?php
								//showing transactions
								$reporting_row = 0;
								if($ongoing>0){
								foreach($project->result_array() as $row){ 
								$project_id = $row['project_id'];
								$project_name = $row['project_name'];
								$project_deadline = $row['project_deadline'];
								$project_personnel = $row['project_personnel'];
								$project_budget = $row['project_budget'];
								$reporting_row++;
							?>
								<script>
									/*alert("<?php echo $project_deadline;?>");*/
									var end<?php echo $reporting_row; ?> = new Date('<?php echo $project_deadline; ?> 00:00 AM');

									    var _second = 1000;
									    var _minute = _second * 60;
									    var _hour = _minute * 60;
									    var _day = _hour * 24;
									    var timer;

									    function showRemaining() {
									        var now = new Date();
									        var distance = end<?php echo $reporting_row; ?> - now;
									        if (distance < 0) {

									            clearInterval(timer);
									            document.getElementById('timer<?php echo $reporting_row; ?>').innerHTML = 'EXPIRED!';

									            return;
									        }
									        var days = Math.floor(distance / _day);
									        var hours = Math.floor((distance % _day) / _hour);
									        var minutes = Math.floor((distance % _hour) / _minute);
									        var seconds = Math.floor((distance % _minute) / _second);

									        document.getElementById('timer<?php echo $reporting_row; ?>').innerHTML = days + 'days ';
									        document.getElementById('timer<?php echo $reporting_row; ?>').innerHTML += hours + 'hrs ';
									        document.getElementById('timer<?php echo $reporting_row; ?>').innerHTML += minutes + 'mins ';
									        document.getElementById('timer<?php echo $reporting_row; ?>').innerHTML += seconds + 'secs';
									    }

									    timer = setInterval(showRemaining, 1000);
									</script>
						
								<div class="row table-entries">
									<div class="col-xs-3" id="timer<?php echo $reporting_row; ?>"></div>
									<div class="col-xs-4 col-sm-3"><?php echo $project_name; ?></div>
									<div class="col-xs-2 col-sm-3"><?php echo $project_personnel; ?></div>
									<div class="col-xs-3">PhP <?php echo $project_budget; ?>.00</div>
								</div>

							<?php $reporting_row ++; } }?>
							
						</div>


					</div><!-- MEC end -->

				</div>