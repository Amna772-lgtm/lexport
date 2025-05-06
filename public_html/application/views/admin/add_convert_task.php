<?php include "header.php"; ?>
<div class="breadcrumbs">
	<div class="col-sm-4">
		<div class="page-header float-left">
			<div class="page-title">
				<?php  if($data){ ?>
				<h1>Edit Convert Task</h1>
			<?php	} else { ?>
				<h1>Add Convert Task</h1>
		<?php } ?>
			</div>
		</div>
	</div>
	<div class="col-sm-8">
		<div class="page-header float-right">
			<div class="page-title">
				<ol class="breadcrumb text-right">
				<?php  if($data){ ?>
				<li class="active">Dashboard/Edit Convert Task</li>
				<?php	} else { ?>
					<li class="active">Dashboard/Add Convert Task</li>
				<?php } ?>
				</ol>
			</div>
		</div>
		
	</div>
</div>
<div id="success" class="sufee-alert alert with-close alert-success alert-dismissible fade show success"></div>
<div class="col-md-12">
	<div class="card">
	  <div class="card-header"><strong>Convert Task Information</strong><small><small class="float-right"><?= form_input(['id'=>'user_id','name'=>'user_id','placeholder'=>'Customer ID#','class'=>'form-control','value'=>'']);?></small></small></div>
	  <div class="card-body card-block">

<?php echo form_open_multipart('admin/task/store_convert_task',['id'=>'customer']);
		if($data)
			{
				 echo form_hidden('id',$data->id); 
			}
			else
			{
				 echo form_hidden('id',''); 
			}
		?>


	  	<div class="form-group col-sm-4">
	  		<label for="task_number" class=" form-control-label">Task Number</label>
	  		<?php if($data)
			{
				$value=$data->task_number;
			}
			else
			{
				$value=set_value('task_number');
			} ?>
	  		<?= form_input(['name'=>'task_number','class'=>'form-control','value'=>$value]);?>
	  		<div class="form-error"><?= form_error('task_number'); ?></div>
	  	</div>

	  	<div class="form-group col-sm-4">
	  		<label for="employee_name" class=" form-control-label">Employee Name</label>
	  		<?php if($data)
			{
				$value=$data->employee_name;
			}
			else
			{
				$value=set_value('employee_name');
			} ?>
	  		<?= form_input(['name'=>'employee_name','class'=>'form-control','value'=>$value]);?>
	  		<div class="form-error"><?= form_error('employee_name'); ?></div>
	  	</div>

		<div class="form-group col-sm-4">
	  		<label for="employee_number" class=" form-control-label">Employee Number</label>
	  		<?php if($data)
			{
				$value=$data->employee_number;
			}
			else
			{
				$value=set_value('employee_number');
			} ?>
	  		<?= form_input(['name'=>'employee_number','class'=>'form-control','value'=>$value]);?>
	  		<div class="form-error"><?= form_error('employee_number'); ?></div>
	  	</div>
		
		<div class="form-group col-sm-4">
			<label for="current_achievement_ratio" class=" form-control-label">Current Achievement Ratio</label>
			<?php if($data)
			{
				$value=$data->current_achievement_ratio;
			}
			else
			{
				$value=set_value('current_achievement_ratio');
			} ?>
			<?= form_input(['name'=>'current_achievement_ratio','class'=>'form-control','value'=>$value]);?>
			<div class="form-error"><?= form_error('current_achievement_ratio'); ?></div>
		</div>

		<div class="form-group col-sm-4">
			<label for="designated_employee_name" class=" form-control-label">Designated Employee Name</label>
			<?php if($data)
			{
				$value=$data->designated_employee_name;
			}
			else
			{
				$value=set_value('designated_employee_name');
			} ?>
			<?= form_input(['name'=>'designated_employee_name','class'=>'form-control','value'=>$value]);?>
			<div class="form-error"><?= form_error('designated_employee_name'); ?></div>
		</div>
		
		<div class="form-group col-sm-4">
			<label for="department" class=" form-control-label">Department</label>
			<?php if($data)
			{
				$value=$data->department;
			}
			else
			{
				$value=set_value('department');
			} ?>
			<?= form_input(['name'=>'department','class'=>'form-control','value'=>$value]);?>
			<div class="form-error"><?= form_error('department'); ?></div>
		</div>

		<div class="form-group col-sm-4">
			<label for="branch" class=" form-control-label">Branch</label>
			<?php if($data)
			{
				$value=$data->branch;
			}
			else
			{
				$value=set_value('branch');
			} ?>
			<?= form_input(['name'=>'branch','class'=>'form-control','value'=>$value]);?>
			<div class="form-error"><?= form_error('branch'); ?></div>
		</div>

		<div class="form-group col-sm-4"><?php if($data)
			{
				$value=$data->task_status;
			}
			else
			{
				$value=set_value('task_status');
			} ?>
			<label for="task_status" class=" form-control-label">Task Status</label>
			<select name="case" class="form-control">
				<option value="">Please Select Task Status</option>
					<option value="active"<?php if($value=="active") echo "selected=selected"; ?>>Active</optino>
					<option value="inactive"<?php if($value=="inactive") echo "selected=selected"; ?>>Inactive</optino>
					<option value="ending"<?php if($value=="ending") echo "selected=selected"; ?>>Ending</optino>
					<option value="reactive"<?php if($value=="reactive") echo "selected=selected"; ?>>Reactive</optino>
					<option value="other"<?php if($value=="other") echo "selected=selected"; ?>>Other</optino>
				
			</select>
		</div>

		<div class="form-group col-sm-4">
			<label for="starting_date" class=" form-control-label">Starting Date</label>
			<?php if($data)
			{
				$value=$data->starting_date;
			}
			else
			{
				$value=set_value('starting_date');
			} ?>
			<?= form_input(['name'=>'starting_date','id'=>'starting_date','readonly'=>'readonly','class'=>'form-control','value'=>$value]);?>
			<div class="form-error"><?= form_error('starting_date'); ?></div>
		</div>

		<div class="form-group col-sm-4">
			<label for="ending_date" class=" form-control-label">Ending Date</label>
			<?php if($data)
			{
				$value=$data->ending_date;
			}
			else
			{
				$value=set_value('ending_date');
			} ?>
			<?= form_input(['name'=>'ending_date','id'=>"ending_date",'readonly'=>'readonly','class'=>'form-control','value'=>$value]);?>
			<div class="form-error"><?= form_error('ending_date'); ?></div>
		</div>

		<div class="form-group col-sm-4">
			<label for="start_time" class=" form-control-label">Start Time</label>
			<?php if($data)
			{
				$value=$data->start_time;
			}
			else
			{
				$value=set_value('start_time');
			} ?>
			<?= form_input(['name'=>'start_time','id'=>"start_time",'readonly'=>'readonly','class'=>'form-control','value'=>$value]);?>
			<div class="form-error"><?= form_error('start_time'); ?></div>
		</div>

		<div class="form-group col-sm-4">
			<label for="ending_time" class=" form-control-label">Ending Time</label>
			<?php if($data)
			{
				$value=$data->ending_time;
			}
			else
			{
				$value=set_value('ending_time');
			} ?>
			<?= form_input(['name'=>'ending_time','id'=>"ending_time",'readonly'=>'readonly','class'=>'form-control','value'=>$value]);?>
			<div class="form-error"><?= form_error('ending_time'); ?></div>
		</div>

		<div class="form-group col-sm-4">
			<label for="reminder_and_alerts" class=" form-control-label">Reminder & alerts</label>
			<?php if($data)
			{
				$value=$data->reminder_and_alerts;
			}
			else
			{
				$value=set_value('reminder_and_alerts');
			} ?>
			<?= form_input(['name'=>'reminder_and_alerts','class'=>'form-control','value'=>$value]);?>
			<div class="form-error"><?= form_error('reminder_and_alerts'); ?></div>
		</div>

		<div class="form-group col-sm-4">
			<label for="reminder_and_alerts_type" class=" form-control-label">Reminder & alerts Type</label>
			<?php if($data)
			{
				$value=$data->reminder_and_alerts_type;
			}
			else
			{
				$value=set_value('reminder_and_alerts_type');
			} ?>
			<?= form_input(['name'=>'reminder_and_alerts_type','class'=>'form-control','value'=>$value]);?>
			<div class="form-error"><?= form_error('reminder_and_alerts_type'); ?></div>
		</div>

		<div class="form-group col-sm-4">
			<label for="list_of_tasks" class=" form-control-label">List of Tasks</label>
			<?php if($data)
			{
				$value=$data->list_of_tasks;
			}
			else
			{
				$value=set_value('list_of_tasks');
			} ?>
			<?= form_input(['name'=>'list_of_tasks','class'=>'form-control','value'=>$value]);?>
			<div class="form-error"><?= form_error('list_of_tasks'); ?></div>
		</div>

		<div class="form-group col-sm-4">
			<label for="responsible_employee" class=" form-control-label">Responsible Employee</label>
			<?php if($data)
			{
				$value=$data->responsible_employee;
			}
			else
			{
				$value=set_value('responsible_employee');
			} ?>
			<?= form_input(['name'=>'responsible_employee','class'=>'form-control','value'=>$value]);?>
			<div class="form-error"><?= form_error('responsible_employee'); ?></div>
		</div>
		
		<div class="form-group col-sm-4">
			<label for="follow_up_employee" class=" form-control-label">Follow-up Employee</label>
			<?php if($data)
			{
				$value=$data->follow_up_employee;
			}
			else
			{
				$value=set_value('follow_up_employee');
			} ?>
			<?= form_input(['name'=>'follow_up_employee','class'=>'form-control','value'=>$value]);?>
			<div class="form-error"><?= form_error('follow_up_employee'); ?></div>
		</div>

		<div class="form-group col-sm-4">
			<label for="expected_completion_rate" class=" form-control-label">Expected Completion rate</label>
			<?php if($data)
			{
				$value=$data->expected_completion_rate;
			}
			else
			{
				$value=set_value('expected_completion_rate');
			} ?>
			<?= form_input(['name'=>'expected_completion_rate','class'=>'form-control','value'=>$value]);?>
			<div class="form-error"><?= form_error('expected_completion_rate'); ?></div>
		</div>

		<div class="form-group col-sm-4">
			<label for="note" class=" form-control-label">Note</label>
			<?php if($data)
			{
				$value=$data->note;
			}
			else
			{
				$value=set_value('note');
			} ?>
			<?= form_input(['name'=>'note','class'=>'form-control','value'=>$value]);?>
			<div class="form-error"><?= form_error('note'); ?></div>
		</div>

		<div class="form-group col-sm-4">
			<label for="upload_file" class=" form-control-label">Upload Files</label>
			<?= form_upload(['name'=>'upload_file','class'=>'form-control']);?>
			<?php if($data) { echo $data->upload_file; } ?>
		</div>

		
		

	  </div>
	  </div>	
		<div class="card">
	  <div class="card-footer">

	 <?php 
	 	echo form_submit(['id'=>'addcustomer','value'=>'Submit','class'=>'btn btn-primary btn-lg']);
	 ?>
	 <?php 
	 	echo form_reset(['id'=>'reset','value'=>'Reset','class'=>'btn btn-danger btn-lg']);
	 ?>
	  </div>
	</div>
	
<?php form_close(); ?>
</div>
<?php include "footer.php"; ?>
<script type="text/javascript">
	
$(document).ready(function()
{
$('#success').hide();
$('#starting_date, #ending_date').datetimepicker({ language: 'ar', format: 'yyyy-mm-dd',  minView: 2, pickTime: false, autoclose: true,startDate: new Date()});
$(document).ready(function(){
  $("#start_time,#ending_time").datetimepicker({
    pickDate: false,
    minuteStep: 15,
    pickerPosition: 'bottom-right',
    format: 'HH:ii p',
    autoclose: true,
    showMeridian: true,
    startView: 1,
    maxView: 1,
  });

  });
});
</script>