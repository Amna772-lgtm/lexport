<?php if(!empty($posts)): foreach($posts as $post): 
						$timestamp = strtotime($post['create_date']); 
						$date = "From: ".$post['device']."(".$post['ip'].")  | ";
						$date .= date("d M Y G:i",$timestamp);
					?>

				<?php if($post['action_type'] == "login") { ?>
					<?php if($post['status_type'] == "customer") { ?>
						<div class="list-item"><p>The user <b><?php echo getEmployeeName($post['customer_id']); ?></b> has been logged in<small><i class="float-right">&nbsp;<?php echo $date; ?></small></i></p></div>
					<?php } ?>	
					<?php if($post['status_type'] == "user") { ?>
						<div class="list-item"><p>The Employee <b><?php echo getEmployeeName($post['customer_id']); ?></b> has been logged in<small><i class="float-right">&nbsp;<?php echo $date; ?></small></i></p></div>
					<?php } ?>	
				<?php } ?>	
				<?php if($post['action_type'] == "otp_verify") { ?>		
						<div class="list-item"><p> <b><?php echo getEmployeeName($post['customer_id']); ?></b> user OTP verification <?php echo $post['status_type']; ?><small><i class="float-right">&nbsp;<?php echo $date; ?></i></small></p></div>
				<?php } ?>
				<?php if($post['action_type'] == "e-service") { ?>	
						<?php if($post['status_type'] == "add new") { ?>	
							<div class="list-item"><p><b><?php echo getEmployeeName($post['customer_id']); ?></b> user has been <?php echo $post['status_type']; ?> <?php echo $post['action_type']; ?> <small><i class="float-right">&nbsp;<?php echo $date; ?></i></small></p></div>
							<?php } 
							else if($post['status_type'] == "edit e-service") { ?>
							<div class="list-item"><p><b><?php echo getEmployeeName($post['customer_id']); ?></b> user has been <?php echo $post['status_type']; ?> <small><i class="float-right">&nbsp;<?php echo $date; ?></i></small></p></div>
							<?php	}else { ?>
						<div class="list-item"><p><b><?php echo getEmployeeName($post['customer_id']); ?></b> user visit the <?php echo $post['action_type']; ?> <?php echo $post['status_type']; ?><small><i class="float-right">&nbsp;<?php echo $date; ?></i></small></p></div>
				<?php } ?>
				<?php } ?>
				<?php if($post['action_type'] == "file") { ?>		
						<div class="list-item"><p><b><?php echo getEmployeeName($post['customer_id']); ?></b> user <?php echo $post['status_type']; ?> the <?php echo $post['action_type']; ?><small><i class="float-right">&nbsp;<?php echo $date; ?></i></small></p></div>
				<?php } ?>
				<?php if($post['action_type'] == "profile") { ?>		
						<div class="list-item"><p><b><?php echo getEmployeeName($post['customer_id']); ?></b> user <?php echo $post['status_type']; ?> the <?php echo $post['action_type']; ?><small><i class="float-right">&nbsp;<?php echo $date; ?></i></small></p></div>
				<?php } ?>
					<?php if($post['action_type'] == "session_mission" || $post['action_type'] == "consultation_mission" || $post['action_type'] == "writing_misssion" || $post['action_type'] == "general_mission" || $post['action_type'] == "visiting_mission" ) { ?>		
						<div class="list-item"><p><b><?php echo getEmployeeName($post['customer_id']); ?></b> user visit the  <?php echo $post['action_type']; ?> <?php echo $post['status_type']; ?> <small><i class="float-right">&nbsp;<?php echo $date; ?></i></small></p></div>
				<?php } ?>
					<?php if($post['action_type'] == "audio") { ?>		
						<div class="list-item"><p><b><?php echo getEmployeeName($post['customer_id']); ?></b> user <?php echo $post['status_type']; ?> the <?php echo $post['action_type']; ?><small><i class="float-right">&nbsp;<?php echo $date; ?></i></small></p></div>
				<?php } ?>
				<?php if($post['action_type'] == "archive") { ?>
						<div class="list-item"><p><b><?php echo getEmployeeName($post['customer_id']); ?></b> user <?php echo $post['status_type']; ?> the <?php echo $post['action_type']; ?><small><i class="float-right">&nbsp;<?php echo $date; ?></i></small></p></div>
				<?php } ?>
				<?php endforeach; else: ?>
<p>Post(s) not available.</p>
<?php endif; ?>
<?php echo $this->ajax_pagination->create_links(); ?>