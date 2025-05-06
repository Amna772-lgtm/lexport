<?php include "header.php"; ?>
<div class="breadcrumbs">
	<div class="col-sm-4">
		<div class="page-header float-left">
			<div class="page-title">
			<?php  if($data){ ?>
				<h1>Edit Clients</h1>
			<?php	} else { ?>
				<h1>Add Clients</h1>
			<?php } ?>
				
			</div>
		</div>
	</div>
	<div class="col-sm-8">
		<div class="page-header float-right">
			<div class="page-title">
				<ol class="breadcrumb text-right">
					<?php  if($data){ ?>
				<li class="active">Dashboard/Edit Clients</li>
			<?php	} else { ?>
					<li class="active">Dashboard/Add Clients</li>
		<?php } ?>
			
				</ol>
			</div>
		</div>
		
	</div>
</div>

<div class="col-md-12">
<div class="card">
	  <div class="card-header"><strong>
	  	<?php  if($data){ ?>
					Edit Clients
			<?php	} else { ?>
					Add Clients
		<?php } ?>
	  </strong><small></small></div>
	  <div class="card-body card-block">
<?php echo form_open_multipart('admin/admin/store_clients',['id'=>'employer']);

	if($data)
			{
				 echo form_hidden('id',$data['id']); 
			}
			else
			{
				 echo form_hidden('id',''); 
			}
		?>

	
		<div class="form-group col-sm-12">
			<label for="name" class=" form-control-label">Title</label>
			<?php if($data)
			{
				$value=$data['title'];
			}
			else
			{
				$value=set_value('title');
			} ?>
			<?= form_input(['id'=>'title','name'=>'title','class'=>'form-control','value'=>$value]);?>
			<?= form_error('title'); ?>
			
		</div>
		
		<div class="form-group col-sm-12">
			<label for="dob" class=" form-control-label">Discription</label>
			<?php if($data)
			{
				$value=$data['discription'];
			}
			else
			{
				$value=set_value('discription');
			} ?>
			<?= form_textarea(['id'=>'discription','name'=>'discription','class'=>'form-control','cols'=>5,'rows'=>5,'value'=>$value]);?>
			<?php echo form_error('discription'); ?>
			
		</div>
		<div class="form-group col-sm-12">
			<label for="dob" class=" form-control-label">Image</label>
			<?php echo form_upload(['name'=>'image','class'=>'form-control']); 
			echo $data['image']; ?>
		</div>
	  </div>
	</div>
	<div class="card">
	  <div class="card-footer">
	  	<?php if(isset($datas[1][5]) && $datas[1][5] == 1){?>
        <?php 
	 		echo form_submit(['value'=>'Submit','class'=>'btn btn-primary btn-lg']);
	 	?>
	 	<?php } ?>	
	  	<?php 
	 		echo form_reset(['value'=>'Reset','class'=>'btn btn-danger btn-lg']);
	 	?>
	  </div>
	</div>
<?php form_close(); ?>
</div>

<?php include "footer.php"; ?>
