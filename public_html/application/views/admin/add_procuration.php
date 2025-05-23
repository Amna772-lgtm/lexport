<?php include "header.php"; ?>
<div class="breadcrumbs">
	<div class="col-sm-4">
		<div class="page-header float-left">
			<div class="page-title">
				<?php  if($data){ ?>
				<h1>Edit Procuration Appoinment</h1>
			<?php	} else { ?>
				<h1>Add Procuration Appoinment</h1>
		<?php } ?>
			</div>
		</div>
	</div>
	<div class="col-sm-8">
		<div class="page-header float-right">
			<div class="page-title">
				<ol class="breadcrumb text-right">
				<?php  if($data){ ?>
				<li class="active">Dashboard/Edit Procuration Appoinment</li>
				<?php	} else { ?>
					<li class="active">Dashboard/Add Procuration Appoinment</li>
				<?php } ?>
				</ol>
			</div>
		</div>
		
	</div>
</div>
<div id="success" class="sufee-alert alert with-close alert-success alert-dismissible fade show success"></div>
<div class="col-md-12">
	<div class="card">
	  <div class="card-header"><strong>Customer Information</strong><small><small class="float-right"><?= form_input(['id'=>'user_id','name'=>'user_id','placeholder'=>'Customer ID#','class'=>'form-control','value'=>'']);?></small></small></div>
	  <div class="card-body card-block">

<?php echo form_open_multipart('admin/procuration/store_procuration',['id'=>'customer']);
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

	  	<div class="form-group col-sm-4"><?php if($data)
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
	  		<label for="client_file_number" class=" form-control-label">Client File Number</label>
	  		<?php if($data)
			{
				$value=$data->client_file_number;
			}
			else
			{
				$value=set_value('client_file_number');
			} ?>
	  		<?= form_input(['name'=>'client_file_number','class'=>'form-control','value'=>$value]);?>
	  		<div class="form-error"><?= form_error('client_file_number'); ?></div>
	  	</div>

	  	<div class="form-group col-sm-12">
			<label for="client_name" class=" form-control-label">Client Full Name</label>
			<?php if($data)
			{
				$value=$data->client_name;
			}
			else
			{
				$value=set_value('client_name');
			} ?>
			<?= form_input(['name'=>'client_name','id'=>'name','class'=>'form-control','value'=>$value]);?>
			<div class="form-error"><?= form_error('client_name'); ?></div>
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
			<label for="contact_number" class=" form-control-label">Contract number</label>
			<?php if($data)
			{
				$value=$data->contact_number;
			}
			else
			{
				$value=set_value('contact_number');
			} ?>
			<?= form_input(['name'=>'contact_number','class'=>'form-control','value'=>$value]);?>
			<div class="form-error"><?= form_error('contact_number'); ?></div>
		</div>
		
		<div class="form-group col-sm-4">
			<label for="case_code" class=" form-control-label">Case Code</label>
			<?php if($data)
			{
				$value=$data->case_code;
			}
			else
			{
				$value=set_value('case_code');
			} ?>
			<?= form_input(['name'=>'case_code','class'=>'form-control','value'=>$value]);?>
			<div class="form-error"><?= form_error('case_code'); ?></div>
		</div>

		<div class="form-group col-sm-4">
			<label for="case_type" class=" form-control-label">Case Type</label>
			<?php if($data)
			{
				$value=$data->case_type;
			}
			else
			{
				$value=set_value('case_type');
			} ?>
			<?= form_input(['name'=>'case_type','class'=>'form-control','value'=>$value]);?>
			<div class="form-error"><?= form_error('case_type'); ?></div>
		</div>

		<div class="form-group col-sm-4">
			<label for="case_number" class=" form-control-label">Case Number</label>
			<?php if($data)
			{
				$value=$data->case_number;
			}
			else
			{
				$value=set_value('case_number');
			} ?>
			<?= form_input(['name'=>'case_number','class'=>'form-control','value'=>$value]);?>
			<div class="form-error"><?= form_error('case_number'); ?></div>
		</div>
		
		<div class="form-group col-sm-4">
			<label for="procuration_title" class=" form-control-label">Procuration Title</label>
			<?php if($data)
			{
				$value=$data->procuration_title;
			}
			else
			{
				$value=set_value('procuration_title');
			} ?>
			<?= form_input(['name'=>'procuration_title','id'=>'date','class'=>'form-control','value'=>$value]);?>
			<div class="form-error"><?= form_error('procuration_title'); ?></div>
		</div>

		<div class="form-group col-sm-4">
			<label for="procuration_code" class=" form-control-label">Procuration Code</label>
			<?php if($data)
			{
				$value=$data->procuration_code;
			}
			else
			{
				$value=set_value('procuration_code');
			} ?>
			<?= form_input(['name'=>'procuration_code','class'=>'form-control','value'=>$value]);?>
			<div class="form-error"><?= form_error('procuration_code'); ?></div>
		</div>

		<div class="form-group col-sm-4">
			<label for="procuration_type" class=" form-control-label">Procuration Type</label>
			<?php if($data)
			{
				$value=$data->procuration_type;
			}
			else
			{
				$value=set_value('procuration_type');
			} ?>
			<?= form_input(['name'=>'procuration_type','class'=>'form-control','value'=>$value]);?>
			<div class="form-error"><?= form_error('procuration_type'); ?></div>
		</div>

	  	<div class="form-group col-sm-4">
			<label for="procuration_number" class=" form-control-label">Procuration Number</label>
			<?php if($data)
			{
				$value=$data->procuration_number;
			}
			else
			{
				$value=set_value('procuration_number');
			} ?>
			<?= form_input(['name'=>'procuration_number','class'=>'form-control','value'=>$value]);?>
			<div class="form-error"><?= form_error('procuration_number'); ?></div>
		</div>

		<div class="form-group col-sm-4">
			<label for="total_of_procuration_number" class=" form-control-label">Total of Procuration Number</label>
			<?php if($data)
			{
				$value=$data->total_of_procuration_number;
			}
			else
			{
				$value=set_value('total_of_procuration_number');
			} ?>
			<?= form_input(['name'=>'total_of_procuration_number','class'=>'form-control','value'=>$value]);?>
			<div class="form-error"><?= form_error('total_of_procuration_number'); ?></div>
		</div>

		<div class="form-group col-sm-4">
			<label for="procuration_date" class=" form-control-label">Procuration Date</label>
			<?php if($data)
			{
				$value=$data->procuration_date;
			}
			else
			{
				$value=set_value('procuration_date');
			} ?>
			<?= form_input(['name'=>'procuration_date','id'=>'procuration_date','readonly'=>'readonly','class'=>'form-control','value'=>$value]);?>
			<div class="form-error"><?= form_error('procuration_date'); ?></div>
		</div>

		<div class="form-group col-sm-4">
			<label for="procuration_status" class=" form-control-label">Procuration Status</label>
			<?php if($data)
			{
				$value=$data->procuration_status;
			}
			else
			{
				$value=set_value('procuration_status');
			} ?>
			<?= form_input(['name'=>'procuration_status','class'=>'form-control','value'=>$value]);?>
			<div class="form-error"><?= form_error('procuration_status'); ?></div>
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
			<label for="note" class=" form-control-label">Upload Files</label>
			<?= form_upload(['name'=>'upload_file','class'=>'form-control']);?>
			<?php if($data) {?> 
				<img height="150" width="200"  src=" <?php echo '../../../uploads/procuration/'.$data->upload_file ?>"> 
			<?php }	?>
				</div>

		

	  </div>
	  </div>	
		<div class="card">
	  <div class="card-footer">

	 <?php 
	  	if(isset($datas[7][5]) && $datas[7][5] == 1){
    
	 	echo form_submit(['id'=>'addcustomer','value'=>'Submit','class'=>'btn btn-primary btn-lg']);
	 	  if($data){ echo form_submit(['id'=>'newprocuration','name'=>'newprocuration','value'=>'Submit As New Procuration','class'=>'btn btn-primary btn-lg']); }
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
$('#procuration_date').datetimepicker({ language: 'ar', format: 'yyyy-mm-dd',  minView: 2, pickTime: false, autoclose: true,startDate: new Date()});
});
  $('#other_identification_types').css({'display':'none'});  
$('#identification_types').change(function(){
   if ($(this).val() == 'other') {
	   $('#other_identification_types').css({'display':'block'});           
   }else { $('#other_identification_types').css({'display':'none'}); }
});
</script>