 <?php include "header.php";?>
        <div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>Task</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                           <li class="active">Dashboard/Task</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

    <div class="card">
        <div class="card-header">
          <strong class="card-title">PDF and PRINT Task</strong>
		  			<strong class="float-right"><a class="btn btn-success" href="">PDF</a>&nbsp;<a class="btn btn-success" href="" onclick="window.print()">Print</a></strong>
        </div>
        <div class="card-body">
			<div class="rehead">
			<div class="float-right">
			<label for="" class=" form-control-label"><strong>Task ID: </strong><?php echo $data->id; ?></label>
			<br><label for="" class=" form-control-label"><strong>Date: </strong><?php echo $data->createdate; ?></label>
			</div>
			</div>
			<div class="reheadsub">Task Information</div>
			<div class="reheadbody">
			<div class="form-group col-sm-4">
			<label for="" class=" form-control-label"><strong>Employee Name: </strong><?php echo $data->employee_name; ?></label>
			</div>
			<div class="form-group col-sm-4">
				<label for="" class=" form-control-label"><strong>Employee Number: </strong><?php echo $data->employee_number; ?></label>
			</div>
			<div class="form-group col-sm-4">
			<label for="" class=" form-control-label"><strong>Position Name: </strong><?php echo $data->position_name; ?></label>
			</div>
			<div class="form-group col-sm-4">	
			<label for="" class=" form-control-label"><strong>Department: </strong><?php echo $data->department; ?></label>
			</div>
			<div class="form-group col-sm-4">	
			<label for="" class=" form-control-label"><strong>Branch: </strong><?php echo getBranchName($data->branch); ?></label>
			</div>
			<div class="form-group col-sm-4">
			<label for="" class=" form-control-label"><strong>Task type: </strong><?php echo $data->task_type;?></label>
			</div>
			<div class="form-group col-sm-4">
				<label for="" class=" form-control-label"><strong>Task Relation: </strong><?php echo $data->task_relation; ?></label>
			</div>
			<div class="form-group col-sm-4">
			<label for="" class=" form-control-label"><strong>Client: </strong><?php echo $data->client; ?></label>
			</div>
			<div class="form-group col-sm-4">	
			<label for="" class=" form-control-label"><strong>Case: </strong><?php echo $data->case_name; ?></label>
			</div>
			<div class="form-group col-sm-4">	
			<label for="" class=" form-control-label"><strong>Project: </strong><?php echo $data->project;?></label>
			</div>
			<div class="form-group col-sm-4">	
			<label for="" class=" form-control-label"><strong>Other: </strong><?php echo $data->other;?></label>
			</div>
			<div class="form-group col-sm-4">	
			<label for="" class=" form-control-label"><strong>Task Title: </strong><?php echo $data->task_title; ?></label>
			</div>
			<div class="form-group col-sm-4">	
			<label for="" class=" form-control-label"><strong>Task Number: </strong><?php echo $data->task_number; ?></label>
			</div>
			<div class="form-group col-sm-4">	
			<label for="" class=" form-control-label"><strong>Task Status: </strong><?php echo $data->task_status; ?></label>
			</div>
			<div class="form-group col-sm-4">	
			<label for="" class=" form-control-label"><strong>Starting Date: </strong><?php echo $data->starting_date; ?></label>
			</div>
			<div class="form-group col-sm-4">	
			<label for="" class=" form-control-label"><strong>Ending Date: </strong><?php echo $data->ending_date; ?></label>
			</div>
			<div class="form-group col-sm-4">	
			<label for="" class=" form-control-label"><strong>Start Time: </strong><?php echo $data->start_time; ?></label>
			</div>
			<div class="form-group col-sm-4">	
			<label for="" class=" form-control-label"><strong>Ending Time: </strong><?php echo $data->ending_time; ?></label>
			</div>
			<div class="form-group col-sm-4">	
			<label for="" class=" form-control-label"><strong>Reminder & alerts: </strong><?php echo $data->reminder_and_alerts; ?></label>
			</div>
			<div class="form-group col-sm-4">	
			<label for="" class=" form-control-label"><strong>Reminder & alerts Type: </strong><?php echo $data->reminder_and_alerts_type; ?></label>
			</div>
			<div class="form-group col-sm-4">	
			<label for="" class=" form-control-label"><strong>List of Tasks: </strong><?php echo $data->list_of_tasks; ?></label>
			</div>
			<div class="form-group col-sm-4">	
			<label for="" class=" form-control-label"><strong>Responsible Employee: </strong><?php echo $data->responsible_employee; ?></label>
			</div>
			<div class="form-group col-sm-4">	
			<label for="" class=" form-control-label"><strong>Follow-up Employee: </strong><?php echo $data->follow_up_employee; ?></label>
			</div>
			<div class="form-group col-sm-4">	
			<label for="" class=" form-control-label"><strong>Expected Completion rate: </strong><?php echo $data->expected_completion_rate; ?></label>
			</div>
			<div class="form-group col-sm-4">	
			<label for="" class=" form-control-label"><strong>Note: </strong><?php echo $data->note; ?></label>
			</div>
		
			<div class="form-group col-sm-4">	
			<label for="" class=" form-control-label"><strong>Client File Number: </strong><?php echo $data->client_file_number; ?></label>
			</div>
			
			<div class="form-group col-sm-4">	
			<label for="" class=" form-control-label"><strong>Client Full Name: </strong><?php echo $data->client_name; ?></label>
			</div>
			<div class="form-group col-sm-4">	
			<label for="" class=" form-control-label"><strong>Case Code: </strong><?php echo $data->case_code; ?></label>
			</div>
			<div class="form-group col-sm-4">	
			<label for="" class=" form-control-label"><strong>Case Number: </strong><?php echo $data->case_number; ?></label>
			</div>
			<div class="form-group col-sm-4">	
			<label for="" class=" form-control-label"><strong>Session Code: </strong><?php echo $data->session_code; ?></label>
			</div>
			<div class="form-group col-sm-4">	
			<label for="" class=" form-control-label"><strong>Session Number: </strong><?php echo $data->session_number; ?></label>
			</div>
			<div class="form-group col-sm-4">	
			<label for="" class=" form-control-label"><strong>Writing Code: </strong><?php echo $data->writing_code; ?></label>
			</div>
			<div class="form-group col-sm-4">	
			<label for="" class=" form-control-label"><strong>Writing Number: </strong><?php echo $data->writing_number; ?></label>
			</div>
			<div class="form-group col-sm-4">	
			<label for="" class=" form-control-label"><strong>Consultation Code: </strong><?php echo $data->consultation_code; ?></label>
			</div>
			<div class="form-group col-sm-4">	
			<label for="" class=" form-control-label"><strong>Consultation Number: </strong><?php echo $data->consultation_number; ?></label>
			</div>
			<div class="form-group col-sm-4">	
			<label for="" class=" form-control-label"><strong>Visiting Code: </strong><?php echo $data->visiting_code; ?></label>
			</div>
			<div class="form-group col-sm-4">	
			<label for="" class=" form-control-label"><strong>Visiting Number: </strong><?php echo $data->visiting_number; ?></label>
			</div>
			<div class="form-group col-sm-4">	
			<label for="" class=" form-control-label"><strong>Project Name: </strong><?php echo $data->project_name; ?></label>
			</div>
			<div class="form-group col-sm-4">	
			<label for="" class=" form-control-label"><strong>Project Number: </strong><?php echo $data->project_number; ?></label>
			</div>
			<div class="form-group col-sm-4">	
			<label for="" class=" form-control-label"><strong>Uploaded File: </strong><img src="<?php echo base_url();?>/uploads/<?php echo $data->upload_file; ?>" width="200"> </label>
			</div>
			</div>
		<div class="reheadfoot">
		<div class="form-group col-sm-4">
			<label for="court_name" class=" form-control-label"><strong>Email: </strong><?php echo $this->session->userdata('admin_email');  ?></label>
		</div>
		<div class="form-group col-sm-4">
			<label for="court_name" class=" form-control-label"><strong>Contact No: </strong><?php  echo $this->session->userdata('admin_phone'); ?></label>
		</div>
		<div class="form-group col-sm-4">
			<label for="court_name" class=" form-control-label"><strong>Address: </strong><?php echo $this->session->userdata('admin_address'); ?></label>
		</div>
		</div>
		</div>
		</div>


<?php include "footer.php";?>
<script src="<?= base_url('assets/js/ajax.js'); ?>"></script>
