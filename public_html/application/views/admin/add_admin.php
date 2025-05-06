<?php include "header.php"; ?>
<div class="breadcrumbs">
	<div class="col-sm-4">
		<div class="page-header float-left">
			<div class="page-title">
			<?php  if($data){ ?>
				<h1>Edit Admin</h1>
			<?php	} else { ?>
				<h1>Add Admin</h1>
			<?php } ?>
				
			</div>
		</div>
	</div>
	<div class="col-sm-8">
		<div class="page-header float-right">
			<div class="page-title">
				<ol class="breadcrumb text-right">
					<?php  if($data){ ?>
				<li class="active">Dashboard/Edit admin</li>
			<?php	} else { ?>
					<li class="active">Dashboard/Add admin</li>
		<?php } ?>
			
				</ol>
			</div>
		</div>
		
	</div>
</div>
<div id="success" class="sufee-alert alert with-close alert-success alert-dismissible fade show success"></div>
<div class="col-md-12">

<?php echo form_open('',['id'=>'employer']);

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
	  <div class="card-header"><strong>
	  	<?php  if($data){ ?>
					Edit Admin
			<?php	} else { ?>
					Add Admin
		<?php } ?>
	  </strong><small></small></div>
	  <div class="card-body card-block">
		<div class="form-group col-sm-12">
			<label for="name" class=" form-control-label">Full Name</label>
			<?php if($data)
			{
				$value=$data->name;
			}
			else
			{
				$value=set_value('name');
			} ?>
			<?= form_input(['id'=>'name','name'=>'name','class'=>'form-control','value'=>$value]);?>
			<?= form_error('name'); ?>
			
		</div>
		
		<div class="form-group col-sm-4">
			<label for="dob" class=" form-control-label">Date Of Birth</label>
			<?php if($data)
			{
				$value=$data->dob;
			}
			else
			{
				$value=set_value('dob');
			} ?>
			<?= form_input(['id'=>'dob','name'=>'dob','class'=>'form-control','value'=>$value]);?>
			<?php echo form_error('dob'); ?>
			
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
			<?= form_input(['id'=>'address','name'=>'address','class'=>'form-control','value'=>$value]);?>
			<?php echo form_error('address'); ?>
		
		</div>
		<div class="form-group col-sm-4">
			<label for="phone" class=" form-control-label">Phone</label>
			<?php if($data)
			{
				$value=$data->phone;
			}
			else
			{
				$value=set_value('phone');
			} ?>
			<?= form_input(['id'=>'phone','name'=>'phone','class'=>'form-control','maxlength'=>'10','value'=>$value]);?>
			<?php echo form_error('phone'); ?>
		</div>
		<div class="form-group col-sm-4">
			<label for="email" class="email" form-control-label">Email</label>
			<?php if($data)
			{
				$value=$data->email;
			}
			else
			{
				$value=set_value('email');
			} ?>
			<?= form_input(['id'=>'email','name'=>'email','class'=>'form-control','value'=>$value]);?>
			<?php echo form_error('email'); ?>			
		</div>
		<div class="form-group col-sm-4">
			<label for="password" class=" form-control-label">Password</label>
			<?= form_password(['id'=>'password','name'=>'password','class'=>'form-control']);?>
			<?= form_error('password'); ?>			
		</div>
		<div class="form-group col-sm-4">
			<label for="cpassword" class=" form-control-label">Confirm Password</label>
			<?= form_password(['id'=>'cpassword','name'=>'cpassword','class'=>'form-control']);?>
			<?= form_error('cpassword'); ?>
		</div>
	  </div>
	</div>
	<div class="card">
	  <div class="card-footer">

	  	 <?php 
	 	echo form_submit(['name'=>'addadmin','id'=>'addadmin','value'=>'Submit','class'=>'btn btn-primary btn-lg']);
	 ?>
	  <?php 
	 	echo form_reset(['name'=>'reset','id'=>'reset','value'=>'Reset','class'=>'btn btn-danger btn-lg']);
	 ?>
	  </div>
	</div>
	<p id="msg"></p>
<?php form_close(); ?>
</div>

<?php include "footer.php"; ?>
<script type="text/javascript">
	
$(document).ready(function()
{
$('#success').hide();
$("#addadmin").click(function()
{	
	$('#employer').attr('action',"<?php echo base_url('admin/admin/store_admin') ?>");
	
	var url=$('#employer').attr('action');
	var data=$('#employer').serialize();
	$.ajax({
			type:'ajax',
			method:'post',
			url:url,
			data:data,
			async:false, 
			dataType: 'json',
			success:function(data){
			$('#success').show();
			$('#success').html(data);
			$("#name").val("");
			$("#dob").val("");
			$("#phone").val("");
			$("#address").val("");
			$("#email").val("");
			$("#password").val("");
			$("#cpassword").val("");
 						
			},
			error:function(){
				  $('#input').html(value);
				
			},
			

	});
 	
	return false;
});
  
});
jQuery('#dob').datepicker({format: "yyyy-mm-dd"});
</script>