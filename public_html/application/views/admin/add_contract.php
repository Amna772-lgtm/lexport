<?php include "header.php"; ?>
<div class="breadcrumbs">
	<div class="col-sm-4">
		<div class="page-header float-left">
			<div class="page-title">
				<?php  if($data){ ?>
				<h1>Edit Contract</h1>
			<?php	} else { ?>
				<h1>Add Contract</h1>
		<?php } ?>
			</div>
		</div>
	</div>
	<div class="col-sm-8">
		<div class="page-header float-right">
			<div class="page-title">
				<ol class="breadcrumb text-right">
				<?php  if($data){ ?>
				<li class="active">Dashboard/Edit Contract</li>
			<?php	} else { ?>
					<li class="active">Dashboard/Add Contract</li>
		<?php } ?>
				</ol>
			</div>
		</div>
		
	</div>
</div>
<div id="success" class="sufee-alert alert with-close alert-success alert-dismissible fade show success"></div>
<div class="col-md-12">
<div class="card">
	  <div class="card-header"><strong>Contract Information</strong></div>
	  <div class="card-body card-block">
	  	<div class="form-group col-sm-12">
	  		<label>Enter Customer Id#</label>
	  		<?= form_input(['id'=>'user_id','name'=>'user_id','placeholder'=>'Customer ID#','class'=>'form-control','value'=>'']);?>
	  	</div>
	  	<div class="formSeparator"><hr /></div>
               <?php echo form_open_multipart('admin/contract/store_contract',['id'=>'contract']);
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
	  		<label for="contract_start_date" class=" form-control-label">Contract start date*</label>
	  		<?php if($data)
			{
				$value=$data->contract_start_date;
			}
			else
			{
				$value=set_value('contract_start_date');
			} ?>
	  		<?= form_input(['name'=>'contract_start_date','id'=>'contract_start_date','readonly'=>'readonly','class'=>'form-control','value'=>$value]);?>
	  		<div class="form-error"><?= form_error('contract_start_date'); ?></div>
	  	</div>

	  	<div class="form-group col-sm-4">
	  		<label for="ending_contract_date" class=" form-control-label">Ending contract date*</label>
	  		<?php if($data)
			{
				$value=$data->ending_contract_date;
			}
			else
			{
				$value=set_value('ending_contract_date');
			} ?>
	  		<?= form_input(['name'=>'ending_contract_date','id'=>'ending_contract_date','readonly'=>'readonly','class'=>'form-control','value'=>$value]);?>
	  		<div class="form-error"><?= form_error('ending_contract_date'); ?></div>
	  	</div>

	  	<div class="form-group col-sm-4">
	  		<label for="contract_number" class=" form-control-label">Contract number*</label>
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
	  		<label for="contract_type" class=" form-control-label">Contract type*</label>
	  		<?php if($data)
			{
				$value=$data->contract_type;
			}
			else
			{
				$value=set_value('contract_type');
			} ?>
	  		<?= form_input(['name'=>'contract_type','class'=>'form-control','value'=>$value]);?>
	  		<div class="form-error"><?= form_error('contract_type'); ?></div>
	  	</div>


	  	<div class="form-group col-sm-4">
	  		<label for="service_types" class="form-control-label">Please Select Service*</label>
				<?php if($data)
			{
				$value=$data->service_types;
			}
			else
			{
				  $value=set_value('service_types');
			} ?>
	  		<select name="service_types" id="service_types" class="form-control" >
	  			<option value="">Please select Service Type</option>
	  			<?php foreach($service as $service) { 
	  				 ?>
	  					<option value="<?php echo $service['name']; ?>"<?php if($value == $service['name']) echo "selected=selected";?>><?= $service['name']; ?></option>
	  				
	  			<?php } ?>
				
	  		 	<option value="other">Other</option>
	  		</select>
			
			<?php echo form_input(['name'=>'other_service_types','id'=>'other_service_types','class'=>'form-control']); ?>
			<div class="form-error"><?= form_error('service_types'); ?></div>
	  	</div>
		<div class="formSeparator"><hr /></div>
	  	<div class="form-group col-sm-4">
	  		<label for="client_name" class=" form-control-label">Client name*</label>
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
	  		<label for="client_file_number" class=" form-control-label">Client File Number*</label>
	  		<?php if($data)
			{
				$value=$data->client_file_number;
			}
			else
			{
				$value=set_value('client_file_number');
			} ?>
	  		<?= form_input(['name'=>'client_file_number','class'=>'form-control','value'=>$value]);?>
	  		<div class="form-error"><?= form_error('client_name'); ?></div>
	  	</div>

	  	<div class="form-group col-sm-4">
	  		<label for="identification_number" class=" form-control-label">Identification Number*</label>
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
	  		<label for="identification_types" class=" form-control-label">Identification Types*</label>
				<?php if($data)
			{
				$value=$data->identification_types;
			}
			else
			{
				$value=set_value('identification_types');
			} ?>
	  		<select name="identification_types" id="identification_types" class="form-control"  >
	  			<option value="">Please Select Identification Types</option>	  
	  			<option value="CR"<?php if($value=="CR") echo "selected=selected";?>>CR</option>
	  			<option value="National_id"<?php if($value=="National_id") echo "selected=selected";?>>National Id</option>
	  			<option value="Aqama"<?php if($value=="Aqama") echo "selected=selected";?>>Aqama</option>
				<option value="Governmental"<?php if($value=="Governmental") echo "selected=selected";?>>Governmental</option>
	  			<option value="other"<?php if($value=="other") echo "selected=selected";?>>Other</option>
	  		
	  		</select>
			
			<?php echo form_input(['name'=>'other_identification_types','id'=>'other_identification_types','class'=>'form-control']); ?>
					<div class="form-error"><?= form_error('identification_types'); ?></div>
	  	</div>

		<div class="form-group col-sm-4">
			<label for="number_of_cases" class=" form-control-label">Number of cases* </label>
			<?php if($data)
			{
				$value=$data->number_of_cases;
			}
			else
			{
				$value=set_value('number_of_cases');
			} ?>
			<?= form_input(['name'=>'number_of_cases','class'=>'form-control','value'=>$value]);?>
			<div class="form-error"><?= form_error('number_of_cases'); ?></div>
			
		</div>
		<div class="form-group col-sm-4">
			<label for="legal_consultation" class=" form-control-label">Number of legal consultation*  </label>
			<?php if($data)
			{
				$value=$data->legal_consultation;
			}
			else
			{
				$value=set_value('legal_consultation');
			} ?>
			<?= form_input(['name'=>'legal_consultation','class'=>'form-control','value'=>$value]);?>
			<div class="form-error"><?= form_error('legal_consultation'); ?></div>
		</div>

		<div class="form-group col-sm-4">
			<label for="contract_price" class=" form-control-label">Contract price*</label>
			<?php if($data)
			{
				$value=$data->contract_price;
			}
			else
			{
				$value=set_value('contract_price');
			} ?>
			<?= form_input(['name'=>'contract_price','class'=>'form-control','value'=>$value]);?>
			<div class="form-error"><?= form_error('contract_price'); ?></div>
		</div>
		

		<div class="form-group col-sm-4">
			<label for="responsible_employee" class=" form-control-label">Responsible employee*</label>
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
			<label for="case_status" class=" form-control-label">Case Status*</label>
				<?php if($data)
			{
				$value=$data->case_status;
			}
			else
			{
				$value=set_value('case_status');
			} ?>
			<select name="case_status" class="form-control">
				<option value="">Please Select Case Status</option>
					<option value="active"<?php if($value =='active') echo "selected=selected"; ?>>Active</option>
					<option value="inactive"<?php if($value =='inactive') echo "selected=selected"; ?>>Inactive</option>
					<option value="reactivated"<?php if($value =='reactivated') echo "selected=selected"; ?>>Reactived</option>
				
			</select>
			<div class="form-error"><?= form_error('case_status'); ?></div>
		</div>
			<div class="form-group col-sm-12">
			<label for="notes" class=" form-control-label">Contract Note*</label>
			<?php if($data)
			{
				$value=$data->notes;
			}
			else
			{
				$value=set_value('notes');
			} ?>
			<?= form_textarea(['name'=>'notes','class'=>'form-control','rows'=>5,'cols'=>5,'value'=>$value]);?>
			<div class="form-error"><?= form_error('notes'); ?></div>
	  	</div>
		<div class="formSeparator"><hr /></div>
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
			<label for="contract_file" class=" form-control-label">Contract File</label>
			<?php if($data)
			{
				$value=$data->contract_file;
			}
			else
			{
				$value=set_value('contract_file');
			} ?>
			<?= form_upload(['name'=>'contract_file','class'=>'form-control','value'=>$value]);?>
			<?= $value; ?>
			<div class="form-error"><?= form_error('contract_file'); ?></div>
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
});
$(' #contract_start_date, #ending_contract_date').datetimepicker({  format: 'yyyy-mm-dd',  minView: 2, pickTime: false, autoclose: true,startDate: new Date()});
   $('#other_service_types').css({'display':'none'});  
       $('#service_types').change(function(){
           if ($(this).val() == 'other') {
               $('#other_service_types').css({'display':'block'});           
           }else { $('#other_service_types').css({'display':'none'});   }
        });       

		$('#other_identification_types').css({'display':'none'});  
        $('#identification_types').change(function(){
           if ($(this).val() == 'other') {
               $('#other_identification_types').css({'display':'block'});           
           }else { $('#other_identification_types').css({'display':'none'}); }
        });    
</script>