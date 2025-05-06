<?php include "header.php"; ?>
<div class="breadcrumbs">
	<div class="col-sm-4">
		<div class="page-header float-left">
			<div class="page-title">
				<?php  if($data){ ?>
				<h1>Edit Archives</h1>
			<?php	} else { ?>
				<h1>Add Archives </h1>
		<?php } ?>
			</div>
		</div>
	</div>
	<div class="col-sm-8">
		<div class="page-header float-right">
			<div class="page-title">
				<ol class="breadcrumb text-right">
				<?php  if($data){ ?>
				<li class="active">Dashboard/Edit Archives</li>
			<?php	} else { ?>
					<li class="active">Dashboard/Add Archives</li>
		<?php } ?>
				</ol>
			</div>
		</div>
		
	</div>
</div>
<div id="success" class="sufee-alert alert with-close alert-success alert-dismissible fade show success"></div>
<div class="col-md-12">

<?php echo form_open_multipart('admin/archive/store_archive',['id'=>'archives']);
		if($data)
			{
				 echo form_hidden('id',$data->id); 
			}
			else
			{
				 echo form_hidden('id',''); 
			}
		?>

	<div class="card">
	  <div class="card-header"><strong>Archives Information</strong></div>
	  <div class="card-body card-block">
	  
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
	  		<label for="clients" class=" form-control-label">Clients</label>
	  		<?php if($data)
			{
				$value=$data->clients;
			}
			else
			{
				$value=set_value('clients');
			} ?>
			<select class="form-control" name="clients">
		    	<option>Select Clients </option>
			<?php  foreach ($get_per_clients as $get_per_clients) {?>
		    	<option value="<?php echo $get_per_clients['id']?>" <?php if($value == $get_per_clients['id']){ echo "selected='selected'"; }?>><?php echo $get_per_clients['name']?></option>
			<?php }?>	    
		    </select>
	  	</div>

	  	<div class="form-group col-sm-4">
			<?php if($data)
			{
				$value=$data->cases;
			}
			else
			{
				$value=set_value('cases');
			} ?>
	  		<label for="cases" class=" form-control-label">Cases</label>
	  		<select class="form-control" name="cases">
		    	<option>Select Cases </option>
			<?php  foreach ($get_per_case as $get_per_case) {?>
		    	<option value="<?php echo $get_per_case['id']?>" <?php if($value == $get_per_case['id']){ echo "selected='selected'"; }?>><?php echo $get_per_case['client_name']?></option>
			<?php }?>	    
		    </select>
	  	</div>


	  	<div class="form-group col-sm-4">
	  		<label for="procuration" class=" form-control-label">Procuration</label>
	  		<?php if($data)
			{
				$value=$data->procuration;
			}
			else
			{
				$value=set_value('procuration');
			} ?>
	  			<select class="form-control" name="procuration">
		    	<option>Select Procuration </option>
			<?php  foreach ($get_per_procuration as $get_per_procuration) {?>
		    	<option value="<?php echo $get_per_procuration['id']?>" <?php if($value == $get_per_procuration['id']){ echo "selected='selected'"; }?>><?php echo $get_per_procuration['procuration_title']?></option>
			<?php }?>	    
		    </select>
	  	</div>


	  	<div class="form-group col-sm-4"><?php if($data)
			{
				$value=$data->service_types;
			}
			else
			{
				$value=set_value('service_types');
			} ?>
	  		<label for="service_types" class="form-control-label">Please Select Service</label>
	  		<select name="service_types" class="form-control" >
	  			<option value="">Please select Service Type</option>
	  			<?php foreach($service as $service) { 
	  				?>
	  					<option value="<?= $service['name']; ?>"<?php if($value==$service['name']) echo "selected=selected";?>><?= $service['name']; ?></option>
	  			
	  			<?php } ?>
	  		</select>
	  	</div>

	  	<div class="form-group col-sm-4">
	  		<label for="contract" class=" form-control-label">Contract</label>
	  		<?php if($data)
			{
				$value=$data->contract;
			}
			else
			{
				$value=set_value('contract');
			} ?>
	  			<select class="form-control" name="contract">
		    	<option>Select Contract Number</option>
			<?php  foreach ($get_per_contract as $get_per_contract) {?>
		    	<option value="<?php echo $get_per_contract['id']?>" <?php if($value == $get_per_contract['id']){ echo "selected='selected'"; }?>><?php echo $get_per_contract['contract_number']?></option>
			<?php }?>	    
		    </select>
	  	</div>

		<div class="form-group col-sm-4">
			<label for="notes" class=" form-control-label">Note</label>
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
		
	
	  	<div class="form-group col-sm-4">
	  		<label for="project" class=" form-control-label">Project</label>
	  		<?php if($data)
			{
				$value=$data->project;
			}
			else
			{
				$value=set_value('project');
			} ?>
	  			<select class="form-control" name="project">
		    	<option>Select Project Number</option>
			<?php  foreach ($get_per_project as $get_per_project) {?>
		    	<option value="<?php echo $get_per_project['id']?>" <?php if($value == $get_per_project['id']){ echo "selected='selected'"; }?>><?php echo $get_per_project['project_name']?></option>
			<?php }?>	    
		    </select>
	  	</div>
	  	<div class="form-group col-sm-4">
	  		<label for="task" class=" form-control-label">Task</label>
	  		<?php if($data)
			{
				$value=$data->task;
			}
			else
			{
				$value=set_value('task');
			} ?>
	  			<select class="form-control" name="task">
		    	<option>Select Task Number</option>
			<?php  foreach ($get_per_tasks as $get_per_tasks) {?>
		    	<option value="<?php echo $get_per_tasks['id']?>" <?php if($value == $get_per_tasks['id']){ echo "selected='selected'"; }?>><?php echo $get_per_tasks['project_name']?></option>
			<?php }?>	    
		    </select>
	  	</div>

	  	<div class="form-group col-sm-4">
	  		<label for="others" class=" form-control-label">Others</label>
	  		<?php if($data)
			{
				$value=$data->others;
			}
			else
			{
				$value=set_value('others');
			} ?>
	  		<?= form_input(['name'=>'others','class'=>'form-control','value'=>$value]);?>
	  		<div class="form-error"><?= form_error('others'); ?></div>
	  	</div>

			
		<div class="form-group col-sm-4">	<?php if($data)
			{
				$value=$data->file_status;
			}
			else
			{
				$value=set_value('file_status');
			} ?>
			<label for="file_status" class=" form-control-label">File status</label>
			<select name="file_status" class="form-control">
				<option value="">Please Select Case Status</option>
					<option value="active"<?php if($value =='active') echo "selected=selected"; ?>>Active</option>
					<option value="inactive"<?php if($value =='inactive') echo "selected=selected"; ?>>Inactive</option>
					<option value="reactivated"<?php if($value =='reactivated') echo "selected=selected"; ?>>Reactived</option>
			</select>
			<div class="form-error"><?= form_error('file_status'); ?></div>
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
			<label for="file_note" class=" form-control-label">File Note</label>
			<?php if($data)
			{
				$value=$data->file_note;
			}
			else
			{
				$value=set_value('file_note');
			} ?>
			<?= form_textarea(['name'=>'file_note','class'=>'form-control','rows'=>5,'cols'=>5,'value'=>$value]);?>
			<div class="form-error"><?= form_error('file_note'); ?></div>
		</div>
		<div class="form-group col-sm-4">
			<label for="responsible_employee" class=" form-control-label">Responsible employee</label>
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
	  </div>

	 
	
		<div class="card">
	  <div class="card-footer">

	 <?php 
	 	if(isset($datas[13][5]) && $datas[13][5] == 1){
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
jQuery('#dob').datepicker({format: "yyyy-mm-dd"});
});
</script>