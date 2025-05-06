<?php include "header.php"; ?>
<div class="breadcrumbs">
	<div class="col-sm-4">
		<div class="page-header float-left">
			<div class="page-title">
				<?php  if($data){ ?>
				<h1>Edit Team Members</h1>
			<?php	} else { ?>
				<h1>Add Team Members</h1>
			<?php } ?>
						
			</div>
		</div>
	</div>
	<div class="col-sm-8">
		<div class="page-header float-right">
			<div class="page-title">
				<ol class="breadcrumb text-right">
					<?php  if($data){ ?>
						<li class="active">Dashboard/Edit Team Members</li>
					<?php	} else { ?>
						<li class="active">Dashboard/Add Team Members</li>
					<?php } ?>
					
				</ol>
			</div>
		</div>
		
	</div>
</div>
<div class="col-md-12">

<?php echo form_open_multipart('admin/admin/store_team_members',['id'=>'employer']); 
if($data)
	{
		 echo form_hidden('id',$data['id']); 
	}
	else
	{
		 echo form_hidden('id',''); 
	}
?>
	<div class="card">
	  <div class="card-header"><strong>
			<?php  if($data){ ?>
					Edit Team Members
			<?php	} else { ?>
					Add Team members
			<?php } ?>
	  </strong><small></small></div>
	  <div class="card-body card-block">
		<div class="form-group col-sm-12">
			<label for="name" class=" form-control-label">Full Name</label>
			<?php if($data)
			{
				$value=$data['name'];
			}
			else
			{
				$value=set_value('name');
			} ?>
			<?= form_input(['id'=>'name','name'=>'name','class'=>'form-control','value'=>$value]);?>
			<div class="form-error"><?= form_error('name'); ?></div>
		</div>
		<div class="form-group col-sm-12">
			<label for="designation" class=" form-control-label">Designation</label>
			<?php if($data)
			{
				$value=$data['designation'];
			}
			else
			{
				$value=set_value('designation');
			} ?>
			<?= form_input(['id'=>'designation','name'=>'designation','class'=>'form-control','value'=>$value]);?>
			<?= form_error('designation'); ?>
		</div>
		<div class="form-group col-sm-12">
			<label for="discription" class=" form-control-label">Discription</label>
			<?php if($data)
			{
				$value=$data['discription'];
			}
			else
			{
				$value=set_value('discription');
			} ?>
			<?= form_textarea(['id'=>'discription','name'=>'discription','rows'=>5,'cols'=>5,'class'=>'form-control','value'=>$value]);?>
			<?= form_error('discription'); ?>
		</div>
		<div class="form-group col-sm-12">
			<label for="image" class=" form-control-label">Image</label>
			 <?php echo form_upload(['name'=>'image','class'=>'form-control']); ?>
			<?php if($data)
			{
				echo $data['image'];
			} ?>
		</div>

		
	  </div>
	</div>
	<div class="card">
	  <div class="card-footer">
	  	
	   <?php 
	 	echo form_submit(['value'=>'Submit','class'=>'btn btn-primary btn-lg']);
	 ?>
	  <?php 
	 	echo form_reset(['value'=>'Reset','class'=>'btn btn-danger btn-lg']);
	 ?>
	  </div>
	</div>
	
<?php form_close(); ?>
</div>

<?php include "footer.php"; ?>
