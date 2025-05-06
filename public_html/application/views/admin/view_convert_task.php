 <?php include "header.php";?>
        <div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>Convert Task</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                           <li class="active">Dashboard/Convert Task</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

    <div class="card">
        <div class="card-header">
          <strong class="card-title">PDF and PRINT Convert Task</strong>
		  			<strong class="float-right"><a class="btn btn-success" href="">PDF</a>&nbsp;<a class="btn btn-success" href="" onclick="window.print()">Print</a></strong>
        </div>
        <div class="card-body">
			<div class="rehead">
			<div class="float-right">
			<label for="" class=" form-control-label"><strong>Convert Task ID: </strong><?php echo $data->id; ?></label>
			<br><label for="" class=" form-control-label"><strong>Date: </strong><?php echo $data->createdate; ?></label>
			</div>
			</div>
			<div class="reheadsub">Task Information</div>
			<div class="reheadbody">
			<div class="form-group col-sm-4">
			<label for="" class=" form-control-label"><strong>Task Number: </strong><?php echo $data->task_number; ?></label>
			</div>
			<div class="form-group col-sm-4">
				<label for="" class=" form-control-label"><strong>Employee Name: </strong><?php echo $data->employee_name; ?></label>
			</div>
			<div class="form-group col-sm-4">
			<label for="" class=" form-control-label"><strong>Employee Number: </strong><?php echo $data->employee_number; ?></label>
			</div>
			<div class="form-group col-sm-4">	
			<label for="" class=" form-control-label"><strong>Current Achievement Ratio: </strong><?php echo $data->current_achievement_ratio; ?></label>
			</div>
			<div class="form-group col-sm-4">	
			<label for="" class=" form-control-label"><strong>Designated Employee Name: </strong><?php echo $data->designated_employee_name; ?></label>
			</div>
			<div class="form-group col-sm-4">
			<label for="" class=" form-control-label"><strong>Branch: </strong><?php echo getBranchName($data->branch);?></label>
			</div>
			<div class="form-group col-sm-4">
			<label for="" class=" form-control-label"><strong>Department: </strong><?php echo $data->department;?></label>
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
			<label for="" class=" form-control-label"><strong>Start Time: </strong><?php echo $data->start_time;?></label>
			</div>
			<div class="form-group col-sm-4">	
			<label for="" class=" form-control-label"><strong>Ending Time: </strong><?php echo $data->ending_time;?></label>
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
