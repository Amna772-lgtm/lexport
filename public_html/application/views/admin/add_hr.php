<?php include "header.php"; ?>
<div class="breadcrumbs">
	<div class="col-sm-4">
		<div class="page-header float-left">
			<div class="page-title">
				<?php  if($data){ ?>
				<h1>Edit HR</h1>
			<?php	} else { ?>
				<h1>Add HR</h1>
		<?php } ?>
			</div>
		</div>
	</div>
	<div class="col-sm-8">
		<div class="page-header float-right">
			<div class="page-title">
				<ol class="breadcrumb text-right">
				<?php  if($data){ ?>
				<li class="active">Dashboard/Edit HR</li>
			<?php	} else { ?>
					<li class="active">Dashboard/Add HR</li>
		<?php } ?>
				</ol>
			</div>
		</div>
		
	</div>
</div>
<div id="success" class="sufee-alert alert with-close alert-success alert-dismissible fade show success"></div>
<div class="col-md-12">
	<div class="card">
	  <div class="card-header"><strong>HR Information</strong><small><small class="float-right"><?= form_input(['id'=>'user_id','name'=>'user_id','placeholder'=>'Customer ID#','class'=>'form-control','value'=>'']);?></small></small></div>
	  <div class="card-body card-block">
	  
<?php echo form_open_multipart('admin/hr/store_hr',['id'=>'hr']);
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
	  		<label for="client_full_name" class=" form-control-label">Client full name</label>
	  		<?php if($data)
			{
				$value=$data->client_full_name;
			}
			else
			{
				$value=set_value('client_full_name');
			} ?>
	  		<?= form_input(['name'=>'client_full_name','class'=>'form-control','value'=>$value]);?>
	  		<div class="form-error"><?= form_error('client_full_name'); ?></div>
	  	</div>


	  	<div class="form-group col-sm-4">
	  		<label for="identification_number" class=" form-control-label">Identification Number</label>
	  		<?php if($data)
			{
				$value=$data->identification_number;
			}
			else
			{
				$value=set_value('identification_number');
			} ?>
	  		<?= form_input(['name'=>'identification_number','id'=>'id_numbers','class'=>'form-control','value'=>$value]);?>
	  		<div class="form-error"><?= form_error('identification_number'); ?></div>
	  	</div>

	  	<div class="form-group col-sm-4">
	  		<?php if($data)
			{
				$value=$data->identification_types;
			}
			else
			{
				$value=set_value('identification_types');
			} ?>
	  		<label for="identification_types" class=" form-control-label">Identification Types</label>
	  		<select name="identification_types" id="identification_types" class="form-control"  >
	  			<option value="">Please Select Identification Types</option>
	  			
	  				<option value="CR"<?php if($value=="CR") echo "selected=selected";?>>CR</option>
	  				<option value="National_id"<?php if($value=="National_id") echo "selected=selected";?>>National id</option>
	  				<option value="Aqama"<?php if($value=="Aqama") echo "selected=selected";?>>Aqama</option>
					<option value="Governmental"<?php if($value=="Governmental") echo "selected=selected";?>>Governmental</option>
	  				<option value="other"<?php if($value=="other") echo "selected=selected";?>>Other</option>
	  				  			
	  		</select>
			 
			<?php echo form_input(['name'=>'other_identification_types','id'=>'other_identification_types','class'=>'form-control']); ?><div class="form-error"><?= form_error('identification_types'); ?></div>
			
	  	</div>

		<div class="form-group col-sm-4">
			<label for="dob" class=" form-control-label">Date of birth</label>
			<?php if($data)
			{
				$value=$data->dob;
			}
			else
			{
				$value=set_value('dob');
			} ?>
			<?= form_input(['name'=>'dob','id'=>'dob','readonly'=>true,'class'=>'form-control','value'=>$value]);?>
			<div class="form-error"><?= form_error('dob'); ?></div>
			
		</div>
		<div class="form-group col-sm-4">
			<label for="address" class=" form-control-label">Address</label>
			<?php if($data)
			{
				$value=$data->address;
			}
			else
			{
				$value=set_value('address');
			} ?>
			<?= form_input(['name'=>'address','class'=>'form-control','value'=>$value]);?>
			<div class="form-error"><?= form_error('address'); ?></div>
		</div>

		<div class="form-group col-sm-4">
			<label for="main_mobile_number" class=" form-control-label">Main mobile number</label>
			<?php if($data)
			{
				$value=$data->main_mobile_number;
			}
			else
			{
				$value=set_value('main_mobile_number');
			} ?>
			<?= form_input(['name'=>'main_mobile_number','class'=>'form-control','value'=>$value]);?>
			<div class="form-error"><?= form_error('main_mobile_number'); ?></div>
		</div>
			<div class="form-group col-sm-4">
			<label for="other_mobile_number" class=" form-control-label">Other mobile number</label>
			<?php if($data)
			{
				$value=$data->other_mobile_number;
			}
			else
			{
				$value=set_value('other_mobile_number');
			} ?>
			<?= form_input(['name'=>'other_mobile_number','class'=>'form-control','value'=>$value]);?>
			<div class="form-error"><?= form_error('other_mobile_number'); ?></div>
	  	</div>

		<div class="form-group col-sm-4">
			<label for="employee_bank_name" class=" form-control-label">Employee bank name</label>
			<?php if($data)
			{
				$value=$data->employee_bank_name;
			}
			else
			{
				$value=set_value('employee_bank_name');
			} ?>
			<?= form_input(['name'=>'employee_bank_name','class'=>'form-control','value'=>$value]);?>
			<div class="form-error"><?= form_error('employee_bank_name'); ?></div>
		</div>
		<div class="form-group col-sm-4">
			<label for="iban" class=" form-control-label">IBAN</label>
			<?php if($data)
			{
				$value=$data->iban;
			}
			else
			{
				$value=set_value('iban');
			} ?>
			<?= form_input(['name'=>'iban','class'=>'form-control','value'=>$value]);?>
			<div class="form-error"><?= form_error('iban'); ?></div>
		</div>
		<div class="form-group col-sm-4">
			<label for="monthly_salary" class=" form-control-label">Monthly salary </label>
			<?php if($data)
			{
				$value=$data->monthly_salary;
			}
			else
			{
				$value=set_value('monthly_salary');
			} ?>
			<?= form_input(['name'=>'monthly_salary','class'=>'form-control','value'=>$value]);?>
			<div class="form-error"><?= form_error('monthly_salary'); ?></div>
		</div>
		<div class="form-group col-sm-4">
			<?php if($data)
			{
				$employee_type=$data->monthly_salary;
			}
			else
			{
				$employee_type=set_value('monthly_salary');
			} ?>
			<label for="employee_type" class=" form-control-label">Employee Type</label>
			<select name="employee_type" id="employee_type" class="form-control">
				<option value="" >Please select</option>
				<option value="temporary" <?php if($employee_type == 'temporary') echo "selected=selected"; ?>>Temporary</option>
				<option value="longterm" <?php if($employee_type == 'longterm') echo "selected=selected"; ?>>Long Term</option>
					<option value="other">other</option> 
			</select>
			<label for="" class="form-control-label"></label>
			<?php echo form_input(['name'=>'other_employee_type','id'=>'other_employee_type','class'=>'form-control']); ?>
		</div>
		<div class="form-group col-sm-4">
			<label for="employee_positions" class=" form-control-label">Employee positions</label>
			<?php if($data)
			{
				$value=$data->employee_positions;
			}
			else
			{
				$value=set_value('employee_positions');
			} ?>
			<?= form_input(['name'=>'employee_positions','class'=>'form-control','value'=>$value]);?>
			<div class="form-error"><?= form_error('employee_positions'); ?></div>
		</div>
		<div class="form-group col-sm-4">
			<label for="job_position_name" class=" form-control-label">Job position name</label>
			<?php if($data)
			{
				$value=$data->job_position_name;
			}
			else
			{
				$value=set_value('job_position_name');
			} ?>
			<?= form_input(['name'=>'job_position_name','class'=>'form-control','value'=>$value]);?>
			<div class="form-error"><?= form_error('job_position_name'); ?></div>
		</div>
		<div class="form-group col-sm-4">
			<label for="contract_number" class=" form-control-label">Contract number</label>
			<?php if($data)
			{
				$value=$data->contract_number;
			}
			else
			{
				$value=set_value('contract_number');
			} ?>
			<?= form_input(['name'=>'contract_number','class'=>'form-control','value'=>$value]);?>
			<div class="form-error"><?= form_error('contract_number'); ?></div>
		</div>
		
		<div class="form-group col-sm-4">
<?php if($data)
			{
				$value=$data->case_status;
			}
			else
			{
				$value=set_value('case_status');
			} ?>
			<label for="case_status" class=" form-control-label">Case Status</label>
			<select name="case_status" class="form-control"  >
				<option value="">Please Select Case Status</option>
				
					<option value="active"<?php if($value =="active") echo "selected=selected"; ?>>Active</option>
					<option value="inactive"<?php if($value  =="inactive") echo "selected=selected"; ?>>Inactive</option>
					<option value="reactivated"<?php if($value  =="reactivated") echo "selected=selected"; ?>>Reactived</option>
			
			</select>
		</div>
		<div class="form-group col-sm-4">
			<label for="date_of_starting_work" class=" form-control-label">Date of starting work</label>
			<?php if($data)
			{
				$value=$data->date_of_starting_work;
			}
			else
			{
				$value=set_value('date_of_starting_work');
			} ?>
			<?= form_input(['name'=>'date_of_starting_work','class'=>'form-control','value'=>$value]);?>
			<div class="form-error"><?= form_error('date_of_starting_work'); ?></div>
		</div>
		<div class="form-group col-sm-4">
			<label for="contract_ending_date" class=" form-control-label">Contract ending date</label>
			<?php if($data)
			{
				$value=$data->contract_ending_date;
			}
			else
			{
				$value=set_value('contract_ending_date');
			} ?>
			<?= form_input(['name'=>'contract_ending_date','class'=>'form-control','value'=>$value]);?>
			<div class="form-error"><?= form_error('contract_ending_date'); ?></div>
		</div>
		<div class="form-group col-sm-4">
			<label for="employee_fail_number" class=" form-control-label">Employee fail number </label>
			<?php if($data)
			{
				$value=$data->employee_fail_number;
			}
			else
			{
				$value=set_value('employee_fail_number');
			} ?>
			<?= form_input(['name'=>'employee_fail_number','class'=>'form-control','value'=>$value]);?>
			<div class="form-error"><?= form_error('employee_fail_number'); ?></div>
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
		
		<div class="form-group col-sm-4">
			<label for="number_of_annual_vacation_date" class=" form-control-label">Number of Annual vacation date</label>
			<?php if($data)
			{
				$value=$data->number_of_annual_vacation_date;
			}
			else
			{
				$value=set_value('number_of_annual_vacation_date');
			} ?>
			<?= form_input(['name'=>'number_of_annual_vacation_date','class'=>'form-control','value'=>$value]);?>
			<div class="form-error"><?= form_error('number_of_annual_vacation_date'); ?></div>
		</div>
		
		<div class="form-group col-sm-4">
			<label for="expiations_date" class=" form-control-label">Number of expiations date </label>
			<?php if($data)
			{
				$value=$data->expiations_date;
			}
			else
			{
				$value=set_value('expiations_date');
			} ?>
			<?= form_input(['name'=>'expiations_date','class'=>'form-control','value'=>$value]);?>
			<div class="form-error"><?= form_error('expiations_date'); ?></div>
		</div>
		
		<div class="form-group col-sm-4">
			<label for="number_of_working_days" class=" form-control-label">Number of working days </label>
			<?php if($data)
			{
				$value=$data->number_of_working_days;
			}
			else
			{
				$value=set_value('number_of_working_days');
			} ?>
			<?= form_input(['name'=>'number_of_working_days','class'=>'form-control','value'=>$value]);?>
			<div class="form-error"><?= form_error('number_of_working_days'); ?></div>
		</div>
		
		<div class="form-group col-sm-4">
			<label for="number_of_sick_live_days" class=" form-control-label">Number of sick live days</label>
			<?php if($data)
			{
				$value=$data->number_of_sick_live_days;
			}
			else
			{
				$value=set_value('number_of_sick_live_days');
			} ?>
			<?= form_input(['name'=>'number_of_sick_live_days','class'=>'form-control','value'=>$value]);?>
			<div class="form-error"><?= form_error('number_of_sick_live_days'); ?></div>
		</div>
		
		<div class="form-group col-sm-4">
			<label for="number_of_emergence_days" class=" form-control-label">Number of emergence days </label>
			<?php if($data)
			{
				$value=$data->number_of_emergence_days;
			}
			else
			{
				$value=set_value('number_of_emergence_days');
			} ?>
			<?= form_input(['name'=>'number_of_emergence_days','class'=>'form-control','value'=>$value]);?>
			<div class="form-error"><?= form_error('number_of_emergence_days'); ?></div>
		</div>
		
		
		<div class="form-group col-sm-4">
			<label for="file_type" class=" form-control-label">File type</label>
			<?php if($data)
			{
				$value=$data->file_type;
			}
			else
			{
				$value=set_value('file_type');
			} ?>
			<?= form_input(['name'=>'file_type','class'=>'form-control','value'=>$value]);?>
			<div class="form-error"><?= form_error('file_type'); ?></div>
		</div>
		
		<div class="form-group col-sm-4">
			<label for="file_title" class=" form-control-label">File title</label>
			<?php if($data)
			{
				$value=$data->file_title;
			}
			else
			{
				$value=set_value('file_title');
			} ?>
			<?= form_input(['name'=>'file_title','class'=>'form-control','value'=>$value]);?>
			<div class="form-error"><?= form_error('file_title'); ?></div>
		</div>
	
	  	<div class="form-group col-sm-4">
			<label for="upload_file" class=" form-control-label">Upload File</label>
			<?php if($data)
			{
				$value=$data->upload_file;
			}
			else
			{
				$value=set_value('upload_file');
			} ?>
			<?= form_upload(['name'=>'upload_file','class'=>'form-control','value'=>$value]);?>
			<?= $value; ?>
			<div class="form-error"><?= form_error('upload_file'); ?></div>
	  	</div>
	  	

	  </div>
	  </div>

	 
	
		<div class="card">
	  <div class="card-footer">

	 <?php 
	 if(isset($datas[14][5]) && $datas[14][5] == 1){
	 	
	 	echo form_submit(['id'=>'addcustomer','value'=>'Submit','class'=>'btn btn-primary btn-lg']);
	 }
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
$(' #dob').datetimepicker({  format: 'yyyy-mm-dd',  minView: 2, pickTime: false, autoclose: true,startDate: '20-12-1988'});
});

$('#other_employee_type').css({'display':'none'});  
$('#employee_type').change(function(){
   if ($(this).val() == 'other') {
	   $('#other_employee_type').css({'display':'block'});           
   }else { $('#other_employee_type').css({'display':'none'});   }
});    

$('#other_identification_types').css({'display':'none'});  
$('#identification_types').change(function(){
   if ($(this).val() == 'other') {
	   $('#other_identification_types').css({'display':'block'});           
   }else { $('#other_identification_types').css({'display':'none'}); }
});   
</script>