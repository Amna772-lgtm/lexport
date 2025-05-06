<?php include "header.php";?>
<!DOCTYPE HTML>
<html>
	<head>
		<title>JOB</title>
		<link href="<?=base_url('assets/editor/editor.css');?>" type="text/css" rel="stylesheet"/>
	</head>
	<body>
				<div class="container">
					<div class="card-body card-block">
						<?php echo form_open_multipart('admin/admin/store_job'); 
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
			<?php if($data)	{
				$value=$data['title'];
			} else {
				$value=set_value('title');
			} ?>
				<label for="" class=" form-control-label">Title</label><?php echo form_input(['name' => 'title', 'class' => 'form-control','value'=>$value]); ?>
			</div>	
			<div class="form-group col-sm-12">
			<?php if($data)	{
				$value=$data['description'];
			} else {
				$value=set_value('description');
			} ?>
			<label for="" class=" form-control-label">Description</label><br>
			<?php echo form_textarea(['name' => 'description','rows'=>5,'cols'=>100, 'class' => 'form_control','value'=>$value]); ?>
			</div>
		
			<div class="form-group col-sm-6">
			<label for="" class=" form-control-label">Image</label><?php echo form_upload(['name' => 'image', 'class' => 'form-control']); 
				echo $data['image']; ?>
			</div>
			<div class="form-group col-sm-12">
				<?php echo form_submit(['value' => 'Submit','class' => 'btn btn-primary btn-lg']);
			echo form_reset(['value' => 'Reset', 'class' => 'btn btn-danger btn-lg']); ?>
			</div>
			<?php form_close();?>
		</div>
		</div>
<?php include "footer.php";?>
