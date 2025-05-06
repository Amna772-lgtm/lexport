<?php
include('header.php'); ?>
<Style>
    .m-portlet {
    overflow: hidden;
}
</Style>
    <div class="m-grid__item m-grid__item--fluid m-wrapper">

        <!-- END: Subheader -->
        <div class="m-content">
            <!--begin::Portlet-->
            <div class="m-portlet lp-theme-card bg-transparent">
                <div class="m-portlet__head">
                    <div class="m-portlet__head-caption">
                        <div class="m-portlet__head-title">
                            <h3 class="m-portlet__head-text">
                                <?php echo $this->lang->line('LOG_INFORMATION');?>
                            </h3>
                        </div>
						<div class="theme-new-nav-menu">
                            <a class="back-link" href="#">
<svg width="16" height="14" viewBox="0 0 16 14" fill="none" xmlns="http://www.w3.org/2000/svg">
<path fill-rule="evenodd" clip-rule="evenodd" d="M7.70679 13.7006C7.51926 13.888 7.26495 13.9934 6.99979 13.9934C6.73462 13.9934 6.48031 13.888 6.29279 13.7006L0.292786 7.70057C0.105315 7.51304 0 7.25874 0 6.99357C0 6.72841 0.105315 6.4741 0.292786 6.28657L6.29279 0.286571C6.48139 0.104413 6.73399 0.00361876 6.99619 0.00589718C7.25838 0.0081756 7.5092 0.113345 7.6946 0.298753C7.88001 0.484161 7.98518 0.734973 7.98746 0.99717C7.98974 1.25937 7.88894 1.51197 7.70679 1.70057L3.41379 5.99357H14.9998C15.265 5.99357 15.5194 6.09893 15.7069 6.28646C15.8944 6.474 15.9998 6.72835 15.9998 6.99357C15.9998 7.25879 15.8944 7.51314 15.7069 7.70068C15.5194 7.88821 15.265 7.99357 14.9998 7.99357H3.41379L7.70679 12.2866C7.89426 12.4741 7.99957 12.7284 7.99957 12.9936C7.99957 13.2587 7.89426 13.513 7.70679 13.7006Z" fill="#333333"/>
</svg>
 Back</a>
                            <ul>
                                <li class="active"> <a href="http://lexport.demosbywpsqr.com/admin/action_log">Log Information</a> </li>
								<li> <a href="http://lexport.demosbywpsqr.com/admin/admin/change_pass">Reset Password</a> </li>
								<li> <a href="http://lexport.demosbywpsqr.com/admin/services/services">E-Service Name</a> </li>
								<li> <a href="http://lexport.demosbywpsqr.com/admin/admin/case_type">E-Service Type</a> </li>
								<li> <a href="http://lexport.demosbywpsqr.com/admin/admin/task_type">Task Type</a> </li>
								<li> <a href="http://lexport.demosbywpsqr.com/admin/admin/consultation_type">Consultation Type</a> </li>
								<li> <a href="http://lexport.demosbywpsqr.com/admin/admin/writing_type">Writing Type</a> </li>
								<li> <a href="http://lexport.demosbywpsqr.com/admin/admin/fine_type">Fine Type</a> </li>
								<li> <a href="http://lexport.demosbywpsqr.com/admin/admin/add_group">Add Group</a> </li>
								<li> <a href="http://lexport.demosbywpsqr.com/admin/admin/department_type">Department Type</a> </li>
								<li> <a href="http://lexport.demosbywpsqr.com/admin/admin/employee_type">Employee Type</a> </li>
								<li> <a href="http://lexport.demosbywpsqr.com/admin/admin/hr_eservice_type">HR E-Service Type</a> </li>
								<li> <a href="http://lexport.demosbywpsqr.com/admin/admin/project_type">Project Type</a> </li>
								<li> <a href="http://lexport.demosbywpsqr.com/admin/admin/list_judge">Judge</a> </li>
								<li> <a href="http://lexport.demosbywpsqr.com/admin/admin/court_master">Court</a> </li>
								<li> <a href="http://lexport.demosbywpsqr.com/admin/admin/branch">Branch List</a> </li>
								<li> <a href="http://lexport.demosbywpsqr.com/admin/admin/city">Cities List</a> </li>
								<li> <a href="http://lexport.demosbywpsqr.com/admin/admin/block_list">Block List</a> </li>
								<li> <a href="http://lexport.demosbywpsqr.com/admin/admin/marketing_banner">Marketing Banner</a> </li>
								<li> <a href="http://lexport.demosbywpsqr.com/admin/permission/add_permission">Permission</a> </li>
								<li> <a href="http://lexport.demosbywpsqr.com/admin/admin/chat">Support Chat</a> </li>
								<li> <a href="http://lexport.demosbywpsqr.com/admin/admin/send_notification">Send Notification</a> </li>
                            </ul>

                        </div>
                    </div>
                </div>

                    
                <!--begin::Form-->

				
                   <?php 
        $attr = array("class" => "form-horizontal", "role" => "form", "id" => "form1", "name" => "form1");
        echo form_open("admin/action_log/search", $attr);?>
                    <div class="m-portlet__body">
 
      
   
        <div class="form-group">
		<div class="theme-group-form">
		<div class="row">
			<div class="col-md-9">
                    <select name="role" class="form-control" >
						<option value="" ><?php echo $this->lang->line('Select_Role');?></option>
						<option value="1" <?php if(isset($_POST['role'])&& $_POST['role'] == "1") echo "selected"; ?>><?php echo $this->lang->line('Admin');?></option>
						<option value="2" <?php if(isset($_POST['role']) && $_POST['role'] == "2") echo "selected"; ?>><?php echo $this->lang->line('Employee');?></option>
						<option value="3" <?php if(isset($_POST['role']) && $_POST['role'] == "3") echo "selected"; ?>><?php echo $this->lang->line('Customer');?></option>
					</select>
                </div>
                <div class="col-md-3">
					<div class="theme-btn-group">
					<input id="btn_search" name="btn_search" type="submit" class="btn btn-danger" value="Search" />
                    <a href="<?php echo base_url(). "/admin/action_log"; ?>" class="btn btn-primary"><?php echo $this->lang->line('Show_All');?></a>
					</div>
                    
                </div>
			</div>
		</div>
			
            


 	<div class="post-list theme-group-form" id="postList">
				<?php if(!empty($posts)): foreach($posts as $post): 
		echo "<div class='warpard'>";
						if($post['role'] == 1) { $rl = "Admin"; $abt = "success"; } else if($post['role'] == 2) { $rl = "Employee";  $abt = "info"; } else { $rl = "Customer"; $abt = "warning"; } 
						$timestamp = strtotime($post['create_date']); 
						$date = "<i class='float-right'>&nbsp;<a class='btn btn-$abt btn-sm rlbtn'>".$rl."</a>";
						$date .= "From: ".$post['device']."(".$post['ip'].")  | ";
						$date .= date("d M Y G:i",$timestamp)."</i>";
					?>

<?php if($post['role'] == 3) { ?>
            	<?php if($post['action_type'] == "send") { ?>
            		<div class="list-item"><p>sms send to <b><?php echo getEmployeeName($post['customer_id']); ?></b> : <?php $json_data = json_decode($post['json_data']); echo $json_data->text; ?> <small><?php echo $date; ?></small></p></div>
            	<?php } ?>
				<?php if($post['action_type'] == "login") { ?>
					<?php if($post['status_type'] == "customer") { ?>
						<div class="list-item"><p><?php echo $this->lang->line('The_user');?> <b><?php echo getEmployeeName($post['customer_id']); ?></b> <?php echo $this->lang->line('has_been_logged_in');?><small><?php echo $date; ?></small></p></div>
					<?php } ?>	
					<?php if($post['status_type'] == "user") { ?>
						<div class="list-item"><p><?php echo $this->lang->line('The_Employee');?> <b><?php echo getEmployeeName($post['customer_id']); ?></b> <?php echo $this->lang->line('has_been_logged_in');?><small><?php echo $date; ?></small></p></div>
					<?php } ?>	
				<?php } ?>	
				<?php if($post['action_type'] == "otp_verify") { ?>		
						<div class="list-item"><p> <b><?php echo getEmployeeName($post['customer_id']); ?></b> <?php echo $this->lang->line('user_OTP_verification');?> <?php echo $post['status_type']; ?><small><?php echo $date; ?></small></p></div>
				<?php } ?>
				<?php if($post['action_type'] == "e-service") { ?>	
						<?php if($post['status_type'] == "add new") { ?>	
							<div class="list-item"><p><b><?php echo getEmployeeName($post['customer_id']); ?></b> <?php echo $this->lang->line('user_has_been');?> <?php echo $post['status_type']; ?> <?php echo $post['action_type']; ?> <small><?php echo $date; ?></small></p></div>
							<?php } 
							else if($post['status_type'] == "edit e-service") { ?>
							<div class="list-item"><p><b><?php echo getEmployeeName($post['customer_id']); ?></b> <?php echo $this->lang->line('user_has_been');?> <?php echo $post['status_type']; ?> <small><?php echo $date; ?></small></p></div>
							<?php	}else { ?>
						<div class="list-item"><p><b><?php echo getEmployeeName($post['customer_id']); ?></b> <?php echo $this->lang->line('user_visit_the');?> <?php echo $post['action_type']; ?> <?php echo $post['status_type']; ?><small><?php echo $date; ?></small></p></div>
				<?php } ?>
				<?php } ?>
				<?php if($post['action_type'] == "file") { ?>		
						<div class="list-item"><p><b><?php echo getEmployeeName($post['customer_id']); ?></b> <?php echo $this->lang->line('user');?> <?php echo $post['status_type']; ?> <?php echo $this->lang->line('the');?> <?php echo $post['action_type']; ?><small><?php echo $date; ?></small></p></div>
				<?php } ?>
				<?php if($post['action_type'] == "profile") { ?>		
						<div class="list-item"><p><b><?php echo getEmployeeName($post['customer_id']); ?></b> <?php echo $this->lang->line('user');?> <?php echo $post['status_type']; ?> <?php echo $this->lang->line('the');?> <?php echo $post['action_type']; ?><small><?php echo $date; ?></small></p></div>
				<?php } ?>
					<?php if($post['action_type'] == "session_mission" || $post['action_type'] == "consultation_mission" || $post['action_type'] == "writing_misssion" || $post['action_type'] == "general_mission" || $post['action_type'] == "visiting_mission" ) { ?>		
						<div class="list-item"><p><b><?php echo getEmployeeName($post['customer_id']); ?></b> <?php echo $this->lang->line('user_visit_the');?>  <?php echo $post['action_type']; ?> <?php echo $post['status_type']; ?> <small><?php echo $date; ?></small></p></div>
				<?php } ?>
					<?php if($post['action_type'] == "audio") { ?>		
						<div class="list-item"><p><b><?php echo getEmployeeName($post['customer_id']); ?></b> <?php echo $this->lang->line('user');?> <?php echo $post['status_type']; ?> <?php echo $this->lang->line('the');?> <?php echo $post['action_type']; ?><small><?php echo $date; ?></small></p></div>
				<?php } ?>
				<?php if($post['action_type'] == "archive") { ?>
						<div class="list-item"><p><b><?php echo getEmployeeName($post['customer_id']); ?></b> <?php echo $this->lang->line('user');?> <?php echo $post['status_type']; ?> <?php echo $this->lang->line('the');?> <?php echo $post['action_type']; ?><small><?php echo $date; ?></small></p></div>
				<?php } ?>
			<?php }  else { $json_data = json_decode($post['json_data']); ?>
	             <?php if($post['action_type'] == "send") { ?>
	             <?php  if($this->session->userdata('admin_site_lang')=="english") {  ?>
	              <div class="list-item"><p style="width: 63%;float: left;"><b><?php echo getEmployeeName($post['user_id']); ?></b>   sms send to <b><?php echo getEmployeeName($post['customer_id']); ?></b> : <?php $json_data = json_decode($post['json_data']); echo $json_data->text; ?> </p><p style="float: left;width: 37%;"><small><?php echo $date; ?></small></p></div>
                
               <?php } else { ?>
                <div class="list-item"><p style="width: 63%;float: right;"><b><?php echo getEmployeeName($post['user_id']); ?></b>   sms send to <b><?php echo getEmployeeName($post['customer_id']); ?></b> : <?php $json_data = json_decode($post['json_data']); echo $json_data->text; ?> </p><p style="float: left;width: 37%;"><small><?php echo $date; ?></small></p></div>
                
                <?php } ?>
                <?php } ?>
				<?php if($post['action_type'] == "e-service") {
				 //echo $json_data ->case_id;;
				?>	
   
				    <?php if($post['status_type'] == "add") { ?>	
					<div class="list-item"><p><b><?php echo getEmployeeName($post['user_id']); ?></b> <?php echo $this->lang->line('has_been_added_new_e_service');?> #<?php echo getCaseNumber($json_data ->case_id) ?>  <small><?php echo $date; ?></small></p></div>
					<?php }
					else if($post['status_type'] == "approve") { ?>
					<div class="list-item"><p><b><?php echo getEmployeeName($post['user_id']); ?></b> <?php echo $this->lang->line('has_been_approved_e_service');?> #<?php echo getCaseNumber($json_data ->case_id); ?><small><?php echo $date; ?></small></p></div>
					<?php }  else if($post['status_type']  == "assign") { 	?>
					<div class="list-item"><p><b><?php echo getEmployeeName($post['user_id']); ?></b>  <?php echo $this->lang->line('has_been_assign_e_service');?> #<?php echo getCaseNumber($json_data ->case_id); ?> <?php echo $this->lang->line('To');?> <?php echo getEmployeeName($json_data ->follow_up_employee); ?> <?php echo $this->lang->line('as_follow_up_employee_AND');?> <?php echo getEmployeeName($json_data ->responsible_employee); ?> <?php echo $this->lang->line('as_responsible_employee');?><small><?php echo $date; ?></small></p></div> 
			 
					<?php }  else if($post['status_type']  == "reject") { 	?>
					<div class="list-item"><p><b><?php echo getEmployeeName($post['user_id']); ?></b>  <?php echo $this->lang->line('has_been_reject_your_e_service');?> #<?php echo getCaseNumber($json_data ->case_id); ?> <small><?php echo $date; ?></small></p></div> 
	 
					<?php }  else if($post['status_type']  == "delete") { 	?>
					<div class="list-item"><p><b><?php echo getEmployeeName($post['user_id']); ?></b>  <?php echo $this->lang->line('has_been_delete_your_e_service');?> #<?php echo getCaseNumber($json_data ->case_id); ?> <small><?php echo $date; ?></small></p></div> 
	 
					<?php }  else if($post['status_type']  == "view") { 	?>
					<div class="list-item"><p><b><?php echo getEmployeeName($post['user_id']); ?></b>  <?php echo $this->lang->line('has_been_view_your_e_service');?> #<?php echo getCaseNumber($json_data ->case_id); ?> <small><?php echo $date; ?></small></p></div> 
			
					<?php }  else if($post['status_type']  == "pending-view") { 	?>
					<div class="list-item"><p><b><?php echo getEmployeeName($post['user_id']); ?></b>  <?php echo $this->lang->line('has_been_visit_pending_e_service_view');?>  #<?php echo getCaseNumber($json_data ->case_id); ?> <small><?php echo $date; ?></small></p></div> 
					<?php } else { ?>
					<div class="list-item"><p><b><?php echo getEmployeeName($post['user_id']); ?></b>  <?php echo $this->lang->line('visit_the');?> <?php echo $post['action_type']; ?> <?php echo $post['status_type']; ?><small><?php echo $date; ?></small></p></div>
					<?php } ?>
					<?php } ?>
					<?php if($post['action_type'] == "customer") { ?>
					<?php if($post['status_type']  == "update") { 	?>
					<div class="list-item"><p><b><?php echo getEmployeeName($post['user_id']); ?></b>  <?php echo $this->lang->line('has_been_update_file_of');?> <?php echo getEmployeeName($json_data ->customers_id); ?> <small><?php echo $date; ?></small></p></div> 
					<?php } else if($post['status_type']  == "view") { 	?>
					<div class="list-item"><p><b><?php echo getEmployeeName($post['user_id']); ?></b>  <?php echo $this->lang->line('has_been_view_file_of');?> <?php echo getEmployeeName($post['customer_id']); ?> <small><?php echo $date; ?></small></p></div> 
					<?php } else if($post['status_type']  == "delete") { 	?>
					<div class="list-item"><p><b><?php echo getEmployeeName($post['user_id']); ?></b>  <?php echo $this->lang->line('has_been_delete_file_of');?> <?php echo getEmployeeName($post['customer_id']); ?> <small><?php echo $date; ?></small></p></div> 	
					<?php } else if($post['status_type']  == "assign") { 	?>
					<div class="list-item"><p><b><?php echo getEmployeeName($post['user_id']); ?></b>  <?php echo $this->lang->line('assign_file_to');?>  <?php echo getEmployeeName($json_data ->assign_to); ?> <small><?php echo $date; ?></small></p></div> 
					<?php } else { ?>
					<div class="list-item"><p><b><?php echo getEmployeeName($post['user_id']); ?></b>  <?php echo $this->lang->line('visit_the');?> <?php echo $post['action_type']; ?> <?php echo $post['status_type']; ?><small><?php echo $date; ?></small></p></div>
					<?php } ?>	
					<?php } ?>
					<?php if($post['action_type'] == "assignment") { ?>
					<?php if($post['status_type'] == "convert-file") { ?>
						<div class="list-item"><p><b><?php echo getEmployeeName($post['user_id']); ?></b>  <?php echo $this->lang->line('convert_assignment_file_to');?> <?php echo getEmployeeName($post['customer_id']); ?> <small><?php echo $date; ?></small></p></div> 
					<?php } else if($post['status_type'] == "convert") { ?>
						<div class="list-item"><p><b><?php echo getEmployeeName($post['user_id']); ?></b>  <?php echo $this->lang->line('convert_e_service');?> #<?php echo getCaseNumber($json_data ->case_id); ?> <?php echo $this->lang->line('To');?> <?php echo getEmployeeName($json_data ->emp_id); ?>  <?php echo $this->lang->line('as_responsible_employee_and');?>  <?php echo getEmployeeName($json_data ->responsible_employee); ?><?php echo $this->lang->line('as_follow_up_employee');?><small><?php echo $date; ?></small></p></div>
						<?php } else if($post['status_type'] == "update-assign") { ?>
						<div class="list-item"><p><b><?php echo getEmployeeName($post['user_id']); ?></b>  <?php echo $this->lang->line('update_the_assign_e_service');?> #<?php echo getCaseNumber($json_data ->case_id); ?> <?php echo $this->lang->line('assignment_to');?> <?php echo getEmployeeName($json_data ->following_employee_id); ?> <small><?php echo $date; ?></small></p></div> 
					<?php } else { ?>
					<div class="list-item"><p><b><?php echo getEmployeeName($post['user_id']); ?></b>  <?php echo $this->lang->line('visit_the');?> <?php echo $post['action_type']; ?> <?php echo $post['status_type']; ?><small><?php echo $date; ?></small></p></div>
					<?php } ?>	
					<?php } ?>
					<?php if($post['action_type'] == "employee") { ?>
					<?php if($post['status_type'] == "update") { ?>
					<div class="list-item"><p><b><?php echo getEmployeeName($post['user_id']); ?></b>  <?php echo $this->lang->line('update_employee');?>   <?php echo getEmployeeName($json_data ->emp_id); ?> <small><?php echo $date; ?></small></p></div> 
					<?php } else if($post['status_type'] == "delete") { ?>
					<div class="list-item"><p><b><?php echo getEmployeeName($post['user_id']); ?></b>  <?php echo $this->lang->line('delete_employee');?>   <?php echo getEmployeeName($json_data ->emp_id); ?> <small><?php echo $date; ?></small></p></div> 
					<?php } else { ?>
					<div class="list-item"><p><b><?php echo getEmployeeName($post['user_id']); ?></b>  <?php echo $this->lang->line('visit_the');?> <?php echo $post['action_type']; ?> <?php echo $post['status_type']; ?><small><?php echo $date; ?></small></p></div>
					<?php } ?>	
					<?php } ?>
					<?php if($post['action_type'] == "invoice") { ?>
					<?php if($post['status_type'] == "add") { ?>
					<div class="list-item"><p><b><?php echo getEmployeeName($post['user_id']); ?></b>  <?php echo $this->lang->line('add_new_invoice');?> #<?php echo $json_data->invoice_no; ?> <?php echo $this->lang->line('of');?> <?php echo getEmployeeName($json_data->customer_id); ?> <?php echo $this->lang->line('E_Service_Number');?> #<?php echo getCaseNumber($json_data->case_id); ?> <small><?php echo $date; ?></small></p></div> 
					<?php } else if($post['status_type'] == "update") { ?>
					<div class="list-item"><p><b><?php echo getEmployeeName($post['user_id']); ?></b>  <?php echo $this->lang->line('update_invoice');?> #<?php echo $json_data->invoice_no; ?>  <small><?php echo $date; ?></small></p></div> 	
					<?php } else if($post['status_type'] == "generate") { ?>
					<div class="list-item"><p><b><?php echo getEmployeeName($post['user_id']); ?></b>  <?php echo $this->lang->line('generate_invoice');?> #<?php echo $json_data->invoice_no; ?>  <small><?php echo $date; ?></small></p></div> 
					<?php } else if($post['status_type'] == "approve") { ?>
					<div class="list-item"><p><b><?php echo getEmployeeName($post['user_id']); ?></b>  <?php echo $this->lang->line('approve_invoice');?> #<?php echo $json_data->invoice_id; ?>  <small><?php echo $date; ?></small></p></div> 
					<?php } else if($post['status_type'] == "delete") { ?>
					<div class="list-item"><p><b><?php echo getEmployeeName($post['user_id']); ?></b>  <?php echo $this->lang->line('delete_invoice');?> #<?php echo $json_data->invoice_id; ?>  <small><?php echo $date; ?></small></p></div> 
					<?php } else { ?>
					<div class="list-item"><p><b><?php echo getEmployeeName($post['user_id']); ?></b>  <?php echo $this->lang->line('visit_the');?> <?php echo $post['action_type']; ?> <?php echo $post['status_type']; ?><small><?php echo $date; ?></small></p></div>
					<?php } ?>	
					<?php } ?>
					<?php if($post['action_type'] == "expense") { ?>
					<?php if($post['status_type'] == "add") { ?>
					<div class="list-item"><p><b><?php echo getEmployeeName($post['user_id']); ?></b>  <?php echo $this->lang->line('add_new_expense_of');?> <?php echo getEmployeeName($json_data->customer_id); ?> <?php echo $this->lang->line('E_Service_Number');?> #<?php echo getCaseNumber($json_data->case_id); ?> <small><?php echo $date; ?></small></p></div> 
					<?php } else if($post['status_type'] == "update") { ?>
					<div class="list-item"><p><b><?php echo getEmployeeName($post['user_id']); ?></b>  <?php echo $this->lang->line('update_expense');?> #<?php echo $json_data->expense_id; ?>  <small><?php echo $date; ?></small></p></div> 	
					<?php } else if($post['status_type'] == "generate") { ?>
					<div class="list-item"><p><b><?php echo getEmployeeName($post['user_id']); ?></b>  <?php echo $this->lang->line('generate_expense');?> #<?php echo $json_data->expense_id; ?>  <small><?php echo $date; ?></small></p></div> 
					
					<?php } else if($post['status_type'] == "delete") { ?>
					<div class="list-item"><p><b><?php echo getEmployeeName($post['user_id']); ?></b>  <?php echo $this->lang->line('delete_expense');?> #<?php echo $json_data->expense_id; ?>  <small><?php echo $date; ?></small></p></div> 
					<?php } else { ?>
					<div class="list-item"><p><b><?php echo getEmployeeName($post['user_id']); ?></b>  <?php echo $this->lang->line('visit_the');?> <?php echo $post['action_type']; ?> <?php echo $post['status_type']; ?><small><?php echo $date; ?></small></p></div>
					<?php } ?>	
					<?php } ?>
					<?php if($post['action_type'] == "session_mission") { ?>
		
					<?php if($post['status_type'] == "visit") { ?>
					<div class="list-item"><p><b><?php echo getEmployeeName($post['user_id']); ?></b>  <?php echo $this->lang->line('visit_the_session');?> <?PHP  echo $json_data->page ?><small><?php echo $date; ?></small></p></div>
					<?php } else if($post['status_type'] == "add") { ?>
					<div class="list-item"><p><b><?php echo getEmployeeName($post['user_id']); ?></b>  <?php echo $this->lang->line('add_new_session_mission');?> #<?php echo getMissionNumber($json_data->misssion_id, "session_mission"); ?>  <?php echo $this->lang->line('for_e_service');?>  #<?php echo getCaseNumber($json_data ->case_id); ?>  <small><?php echo $date; ?></small></p></div> 	
					<?php } else if($post['status_type'] == "view") { ?>
					<div class="list-item"><p><b><?php echo getEmployeeName($post['user_id']); ?></b>  <?php echo $this->lang->line('view_the_session_mission');?> #<?php echo getMissionNumber($json_data->misssion_id, "session_mission"); ?> <small><?php echo $date; ?></small></p></div> 
					<?php } else if($post['status_type'] == "update") { ?>
					<div class="list-item"><p><b><?php echo getEmployeeName($post['user_id']); ?></b>  <?php echo $this->lang->line('update_session_mission');?> #<?php echo getMissionNumber($json_data->misssion_id, "session_mission"); ?>  <?php echo $this->lang->line('for_e_service');?>  #<?php echo getCaseNumber($json_data ->case_id); ?>  <small><?php echo $date; ?></small></p></div> 
					<?php } else if($post['status_type'] == "delete") { ?>
					<div class="list-item"><p><b><?php echo getEmployeeName($post['user_id']); ?></b>  <?php echo $this->lang->line('delete_session_mission');?> #<?php echo getMissionNumber($json_data->misssion_id, "session_mission"); ?> 	<small><?php echo $date; ?></small></p></div> 
					<?php } else if($post['status_type'] == "close") { ?>
					<div class="list-item"><p><b><?php echo getEmployeeName($post['user_id']); ?></b>  <?php echo $this->lang->line('close_session_mission');?> #<?php echo getMissionNumber($json_data->misssion_id, "session_mission"); ?> 	<small><?php echo $date; ?></small></p></div> 
				
					<?php } else if($post['status_type'] == "reject") { ?>
					<div class="list-item"><p><b><?php echo getEmployeeName($post['user_id']); ?></b>  <?php echo $this->lang->line('reject_session_mission');?> #<?php echo getMissionNumber($json_data->misssion_id, "session_mission"); ?> 	<small><?php echo $date; ?></small></p></div> 
					<?php } else if($post['status_type'] == "pending-approve") { ?>
					<div class="list-item"><p><b><?php echo getEmployeeName($post['user_id']); ?></b>  <?php echo $this->lang->line('approve_pending_session_missionv');?> #<?php echo getMissionNumber($json_data->misssion_id, "session_mission"); ?> <small><?php echo $date; ?></small></p></div> 
					<?php } else if($post['status_type'] == "convert") { ?>
					<div class="list-item"><p><b><?php echo getEmployeeName($post['user_id']); ?></b>  <?php echo $this->lang->line('convert_session_mission');?> #<?php echo getMissionNumber($json_data->misssion_id, "session_mission"); ?> <?php echo $this->lang->line('To');?> <?php echo getEmployeeName($json_data->following_employee_id); ?> <small><?php echo $date; ?></small></p></div> 
					<?php } else if($post['status_type'] == "approve") { ?>
					<div class="list-item"><p><b><?php echo getEmployeeName($post['user_id']); ?></b>  <?php echo $this->lang->line('approve_session_mission');?> #<?php echo getMissionNumber($json_data->misssion_id, "session_mission"); ?> 	<small><?php echo $date; ?></small></p></div> 
					<?php } ?>
					<?php } ?>
					<?php if($post['action_type'] == "consultation_mission") { ?>
		
					<?php if($post['status_type'] == "visit") { ?>
					<div class="list-item"><p><b><?php echo getEmployeeName($post['user_id']); ?></b>  <?php echo $this->lang->line('visit_the_consultation');?> <?PHP  echo $json_data->page ?><small><?php echo $date; ?></small></p></div>
					<?php } else if($post['status_type'] == "add") { ?>
					<div class="list-item"><p><b><?php echo getEmployeeName($post['user_id']); ?></b>  <?php echo $this->lang->line('add_new_consultation_mission');?> #<?php echo getMissionNumber($json_data->misssion_id, "consultation_mission"); ?>  <?php echo $this->lang->line('for_e_service');?>  #<?php echo getCaseNumber($json_data ->case_id); ?>  <small><?php echo $date; ?></small></p></div> 	
					<?php } else if($post['status_type'] == "view") { ?>
					<div class="list-item"><p><b><?php echo getEmployeeName($post['user_id']); ?></b>  <?php echo $this->lang->line('view_the_consultation_mission');?> #<?php echo getMissionNumber($json_data->misssion_id, "consultation_mission"); ?> <small><?php echo $date; ?></small></p></div> 
					<?php } else if($post['status_type'] == "update") { ?>
					<div class="list-item"><p><b><?php echo getEmployeeName($post['user_id']); ?></b>  <?php echo $this->lang->line('update_consultation_mission');?> #<?php echo getMissionNumber($json_data->misssion_id, "consultation_mission"); ?>  <?php echo $this->lang->line('for_e_service');?>  #<?php echo getCaseNumber($json_data ->case_id); ?>  <small><?php echo $date; ?></small></p></div> 
					<?php } else if($post['status_type'] == "delete") { ?>
					<div class="list-item"><p><b><?php echo getEmployeeName($post['user_id']); ?></b>  <?php echo $this->lang->line('delete_consultation_mission');?> #<?php echo getMissionNumber($json_data->misssion_id, "consultation_mission"); ?> 	<small><?php echo $date; ?></small></p></div> 
					<?php } else if($post['status_type'] == "close") { ?>
					<div class="list-item"><p><b><?php echo getEmployeeName($post['user_id']); ?></b>  <?php echo $this->lang->line('close_consultation_mission');?> #<?php echo getMissionNumber($json_data->misssion_id, "consultation_mission"); ?> 	<small><?php echo $date; ?></small></p></div> 
				
					<?php } else if($post['status_type'] == "reject") { ?>
					<div class="list-item"><p><b><?php echo getEmployeeName($post['user_id']); ?></b>  <?php echo $this->lang->line('reject_consultation_mission');?> #<?php echo getMissionNumber($json_data->misssion_id, "consultation_mission"); ?> 	<small><?php echo $date; ?></small></p></div> 
					<?php } else if($post['status_type'] == "pending-approve") { ?>
					<div class="list-item"><p><b><?php echo getEmployeeName($post['user_id']); ?></b>  <?php echo $this->lang->line('approve_pending_consultation_mission');?> #<?php echo getMissionNumber($json_data->misssion_id, "consultation_mission"); ?> <small><?php echo $date; ?></small></p></div> 
					<?php } else if($post['status_type'] == "convert") { ?>
					<div class="list-item"><p><b><?php echo getEmployeeName($post['user_id']); ?></b>  <?php echo $this->lang->line('convert_consultation_mission');?> #<?php echo getMissionNumber($json_data->misssion_id, "consultation_mission"); ?> <?php echo $this->lang->line('To');?> <?php echo getEmployeeName($json_data->following_employee_id); ?> <small><?php echo $date; ?></small></p></div> 
					<?php } else if($post['status_type'] == "approve") { ?>
					<div class="list-item"><p><b><?php echo getEmployeeName($post['user_id']); ?></b>  <?php echo $this->lang->line('approve_consultation_mission');?> #<?php echo getMissionNumber($json_data->misssion_id, "consultation_mission"); ?> 	<small><?php echo $date; ?></small></p></div> 
					<?php } ?>
					<?php } ?>
					
					
					<?php if($post['action_type'] == "writing_mission") { ?>
		
					<?php if($post['status_type'] == "visit") { ?>
					<div class="list-item"><p><b><?php echo getEmployeeName($post['user_id']); ?></b>  <?php echo $this->lang->line('visit_the_writing');?> <?php  echo $json_data->page ?><small><?php echo $date; ?></small></p></div>
					<?php } else if($post['status_type'] == "add") { ?>
					<div class="list-item"><p><b><?php echo getEmployeeName($post['user_id']); ?></b>  <?php echo $this->lang->line('add_new_writing_mission');?> #<?php echo getMissionNumber($json_data->misssion_id, "writing_misssion"); ?>  <?php echo $this->lang->line('for_e_service');?>  #<?php echo getCaseNumber($json_data ->case_id); ?>  <small><?php echo $date; ?></small></p></div> 	
					<?php } else if($post['status_type'] == "view") { ?>
					<div class="list-item"><p><b><?php echo getEmployeeName($post['user_id']); ?></b>  <?php echo $this->lang->line('view_the_writing_mission');?> #<?php echo getMissionNumber($json_data->misssion_id, "writing_misssion"); ?> <small><?php echo $date; ?></small></p></div> 
					<?php } else if($post['status_type'] == "update") { ?>
					<div class="list-item"><p><b><?php echo getEmployeeName($post['user_id']); ?></b>  <?php echo $this->lang->line('update_writing_mission');?> #<?php echo getMissionNumber($json_data->misssion_id, "writing_misssion"); ?>  <?php echo $this->lang->line('for_e_service');?>  #<?php echo getCaseNumber($json_data ->case_id); ?>  <small><?php echo $date; ?></small></p></div> 
					<?php } else if($post['status_type'] == "delete") { ?>
					<div class="list-item"><p><b><?php echo getEmployeeName($post['user_id']); ?></b>  <?php echo $this->lang->line('delete_writing_mission');?> #<?php echo getMissionNumber($json_data->misssion_id, "writing_misssion"); ?> 	<small><?php echo $date; ?></small></p></div> 
					<?php } else if($post['status_type'] == "close") { ?>
					<div class="list-item"><p><b><?php echo getEmployeeName($post['user_id']); ?></b>  <?php echo $this->lang->line('close_writing_mission');?> #<?php echo getMissionNumber($json_data->misssion_id, "writing_misssion"); ?> 	<small><?php echo $date; ?></small></p></div> 
				
					<?php } else if($post['status_type'] == "reject") { ?>
					<div class="list-item"><p><b><?php echo getEmployeeName($post['user_id']); ?></b>  <?php echo $this->lang->line('reject_writing_mission');?> #<?php echo getMissionNumber($json_data->misssion_id, "writing_misssion"); ?> 	<small><?php echo $date; ?></small></p></div> 
					<?php } else if($post['status_type'] == "pending-approve") { ?>
					<div class="list-item"><p><b><?php echo getEmployeeName($post['user_id']); ?></b>  <?php echo $this->lang->line('approve_pending_writing_mission');?> #<?php echo getMissionNumber($json_data->misssion_id, "writing_misssion"); ?> <small><?php echo $date; ?></small></p></div> 
					<?php } else if($post['status_type'] == "convert") { ?>
					<div class="list-item"><p><b><?php echo getEmployeeName($post['user_id']); ?></b>  <?php echo $this->lang->line('convert_writing_mission');?> #<?php echo getMissionNumber($json_data->misssion_id, "writing_misssion"); ?> <?php echo $this->lang->line('');?>to <?php echo getEmployeeName($json_data->following_employee_id); ?> <small><?php echo $date; ?></small></p></div> 
					<?php } else if($post['status_type'] == "approve") { ?>
					<div class="list-item"><p><b><?php echo getEmployeeName($post['user_id']); ?></b>  <?php echo $this->lang->line('approve_writing_mission');?> #<?php echo getMissionNumber($json_data->misssion_id, "writing_misssion"); ?> 	<small><?php echo $date; ?></small></p></div> 
					<?php } ?>
					<?php } ?>
					
					<?php if($post['action_type'] == "visiting_mission") { ?>
		
					<?php if($post['status_type'] == "visit") { ?>
					<div class="list-item"><p><b><?php echo getEmployeeName($post['user_id']); ?></b>  <?php echo $this->lang->line('visit_the_visiting');?> <?php  echo $json_data->page ?><small><?php echo $date; ?></small></p></div>
					<?php } else if($post['status_type'] == "add") { ?>
					<div class="list-item"><p><b><?php echo getEmployeeName($post['user_id']); ?></b>  <?php echo $this->lang->line('add_new_visiting_mission');?> #<?php echo getMissionNumber($json_data->misssion_id, "visiting_mission"); ?>  <?php echo $this->lang->line('for_e_service');?>  #<?php echo getCaseNumber($json_data ->case_id); ?>  <small><?php echo $date; ?></small></p></div> 	
					<?php } else if($post['status_type'] == "view") { ?>
					<div class="list-item"><p><b><?php echo getEmployeeName($post['user_id']); ?></b>  <?php echo $this->lang->line('view_the_visiting_mission');?> #<?php echo getMissionNumber($json_data->misssion_id, "visiting_mission"); ?> <small><?php echo $date; ?></small></p></div> 
					<?php } else if($post['status_type'] == "update") { ?>
					<div class="list-item"><p><b><?php echo getEmployeeName($post['user_id']); ?></b>  <?php echo $this->lang->line('update_visiting_mission');?> #<?php echo getMissionNumber($json_data->misssion_id, "visiting_mission"); ?>  <?php echo $this->lang->line('for_e_service');?>  #<?php echo getCaseNumber($json_data ->case_id); ?>  <small><?php echo $date; ?></small></p></div> 
					<?php } else if($post['status_type'] == "delete") { ?>
					<div class="list-item"><p><b><?php echo getEmployeeName($post['user_id']); ?></b>  <?php echo $this->lang->line('delete_visiting_mission');?> #<?php echo getMissionNumber($json_data->misssion_id, "visiting_mission"); ?> 	<small><?php echo $date; ?></small></p></div> 
					<?php } else if($post['status_type'] == "close") { ?>
					<div class="list-item"><p><b><?php echo getEmployeeName($post['user_id']); ?></b>  <?php echo $this->lang->line('close_visiting_mission');?> #<?php echo getMissionNumber($json_data->misssion_id, "visiting_mission"); ?> 	<small><?php echo $date; ?></small></p></div> 
				
					<?php } else if($post['status_type'] == "reject") { ?>
					<div class="list-item"><p><b><?php echo getEmployeeName($post['user_id']); ?></b>  <?php echo $this->lang->line('reject_visiting_mission');?> #<?php echo getMissionNumber($json_data->misssion_id, "visiting_mission"); ?> 	<small><?php echo $date; ?></small></p></div> 
					<?php } else if($post['status_type'] == "pending-approve") { ?>
					<div class="list-item"><p><b><?php echo getEmployeeName($post['user_id']); ?></b>  <?php echo $this->lang->line('approve_pending_visiting_mission');?> #<?php echo getMissionNumber($json_data->misssion_id, "visiting_mission"); ?> <small><?php echo $date; ?></small></p></div> 
					<?php } else if($post['status_type'] == "convert") { ?>
					<div class="list-item"><p><b><?php echo getEmployeeName($post['user_id']); ?></b>  <?php echo $this->lang->line('convert_visiting_mission');?> #<?php echo getMissionNumber($json_data->misssion_id, "visiting_mission"); ?> <?php echo $this->lang->line('To');?> <?php echo getEmployeeName($json_data->following_employee_id); ?> <small><?php echo $date; ?></small></p></div> 
					<?php } else if($post['status_type'] == "approve") { ?>
					<div class="list-item"><p><b><?php echo getEmployeeName($post['user_id']); ?></b>  <?php echo $this->lang->line('approve_visiting_mission');?> #<?php echo getMissionNumber($json_data->misssion_id, "visiting_mission"); ?> 	<small><?php echo $date; ?></small></p></div> 
					<?php } ?>
					<?php } ?>
					
					<?php if($post['action_type'] == "general_mission") { ?>
		
					<?php if($post['status_type'] == "visit") { ?>
					<div class="list-item"><p><b><?php echo getEmployeeName($post['user_id']); ?></b>  <?php echo $this->lang->line('visit_the_general');?> <?php  echo $json_data->page ?><small><?php echo $date; ?></small></p></div>
					<?php } else if($post['status_type'] == "add") { ?>
					<div class="list-item"><p><b><?php echo getEmployeeName($post['user_id']); ?></b>  <?php echo $this->lang->line('add_new_general_mission');?> #<?php echo getMissionNumber($json_data->misssion_id, "general_mission"); ?>  <?php echo $this->lang->line('for_e_service');?>  #<?php echo getCaseNumber($json_data ->case_id); ?>  <small><?php echo $date; ?></small></p></div> 	
					<?php } else if($post['status_type'] == "view") { ?>
					<div class="list-item"><p><b><?php echo getEmployeeName($post['user_id']); ?></b>  <?php echo $this->lang->line('view_the_general_mission');?> #<?php echo getMissionNumber($json_data->misssion_id, "general_mission"); ?> <small><?php echo $date; ?></small></p></div> 
					<?php } else if($post['status_type'] == "update") { ?>
					<div class="list-item"><p><b><?php echo getEmployeeName($post['user_id']); ?></b>  <?php echo $this->lang->line('update_general_mission');?> #<?php echo getMissionNumber($json_data->misssion_id, "general_mission"); ?>  <?php echo $this->lang->line('for_e_service');?>  #<?php echo getCaseNumber($json_data ->case_id); ?>  <small><?php echo $date; ?></small></p></div> 
					<?php } else if($post['status_type'] == "delete") { ?>
					<div class="list-item"><p><b><?php echo getEmployeeName($post['user_id']); ?></b>  <?php echo $this->lang->line('delete_general_mission');?> #<?php echo getMissionNumber($json_data->misssion_id, "general_mission"); ?> 	<small><?php echo $date; ?></small></p></div> 
					<?php } else if($post['status_type'] == "close") { ?>
					<div class="list-item"><p><b><?php echo getEmployeeName($post['user_id']); ?></b>  <?php echo $this->lang->line('close_general_mission');?> #<?php echo getMissionNumber($json_data->misssion_id, "general_mission"); ?> 	<small><?php echo $date; ?></small></p></div> 
				
					<?php } else if($post['status_type'] == "reject") { ?>
					<div class="list-item"><p><b><?php echo getEmployeeName($post['user_id']); ?></b>  <?php echo $this->lang->line('reject_general_mission');?> #<?php echo getMissionNumber($json_data->misssion_id, "general_mission"); ?> 	<small><?php echo $date; ?></small></p></div> 
					<?php } else if($post['status_type'] == "pending-approve") { ?>
					<div class="list-item"><p><b><?php echo getEmployeeName($post['user_id']); ?></b>  <?php echo $this->lang->line('approve_pending_general_mission');?> #<?php echo getMissionNumber($json_data->misssion_id, "general_mission"); ?> <small><?php echo $date; ?></small></p></div> 
					<?php } else if($post['status_type'] == "convert") { ?>
					<div class="list-item"><p><b><?php echo getEmployeeName($post['user_id']); ?></b>  <?php echo $this->lang->line('convert_general_mission');?> #<?php echo getMissionNumber($json_data->misssion_id, "general_mission"); ?> <?php echo $this->lang->line('To');?> <?php echo getEmployeeName($json_data->following_employee_id); ?> <small><?php echo $date; ?></small></p></div> 
					<?php } else if($post['status_type'] == "approve") { ?>
					<div class="list-item"><p><b><?php echo getEmployeeName($post['user_id']); ?></b>  <?php echo $this->lang->line('approve_general_mission');?> #<?php echo getMissionNumber($json_data->misssion_id, "general_mission"); ?> 	<small><?php echo $date; ?></small></p></div> 
					<?php } ?>
					<?php } ?>
 		<?php } ?>
</div>				<?php endforeach; else: ?>
				<p><?php echo $this->lang->line('Logs_not_available');?></p>
				<?php endif; ?>
				<div class="row">
				<div class="col-md-8 col-md-offset-2">
		
				</div>
				</div>	
			</div><br>
	<?php echo $pagination;  ?><br><div style="text-align: center; font-weight: bold;"><?php echo  $result_count; ?></div>
	</div></div>
	</div>

                    </div>
                 
                </form>

                <!--end::Form-->
            </div>

            <!--end::Portlet-->
        </div>
    </div>
<style>
.list-item a {
    color: #fff !important;
    margin-right: 5px;
    margin-left: 5px;
}
.pagination a {
    color: black;
    float: left;
    padding: 0px 8px;
    text-decoration: none;
    transition: background-color .3s;
    border: 1px solid #ddd;
}
.list-item {
    display: block;
    clear: both;
    padding: 7px 20px;
}
.small, small {
    font-size: 70%;
    font-weight: 400;
}


.warpard {
    margin-bottom: 10px;
}
</style>

<?php

include('footer.php');