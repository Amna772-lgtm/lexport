<?php include "header.php";?>
<!DOCTYPE HTML>
<html>
	<head>
		<title>News</title>
		<link href="<?=base_url('assets/editor/editor.css');?>" type="text/css" rel="stylesheet"/>
	</head>
	<body>
				<div class="container">
					<div class="card-body card-block">
						<?php echo form_open_multipart('admin/admin/store_news'); 
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
							Title:-<?php echo form_input(['name' => 'title', 'class' => 'form-control','value'=>$value]); ?>
						</div>
						<div class="form-group col-sm-12">
			<?php if($data)	{
				$value=$data['discription'];
			} else {
				$value=set_value('discription');
			} ?>
								Discription:-<?php echo form_textarea(['name' => 'discription','rows'=>5,'cols'=>100, 'class' => 'form_control','value'=>$value]); ?>
						</div>
						<div class="form-group col-sm-6">
							Image:-<?php echo form_upload(['name' => 'image', 'class' => 'form-control']); 
							echo $data['image']; ?>
						</div>
						<div class="form-group col-sm-6">
			<?php if($data)	{
				$value=$data['date'];
			} else {
				$value=set_value('date');
			} ?>
							Date:-<?php echo form_input(['name' => 'date','id'=>'date','class' => 'form-control','value'=>$value]); ?>
						</div>
						<div class="form-group col-sm-6">
							<?php echo form_submit(['value' => 'Submit','class' => 'btn btn-primary btn-lg']);
echo form_reset(['value' => 'Reset', 'class' => 'btn btn-danger btn-lg']); ?>
						</div>
						<?php form_close();?>
		</div>
		</div>
	</body>
</html>
<?php include "footer.php";?>
<script type="text/javascript">
	jQuery('#date').datepicker({format: "yyyy-mm-dd"});
	
</script>

