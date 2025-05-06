<?php include "header.php";?>
<div class="breadcrumbs">
	<div class="col-sm-4">
		<div class="page-header float-left">
			<div class="page-title">
				<h1>Package</h1>
			</div>
		</div>
	</div>
	<div class="col-sm-8">
		<div class="page-header float-right">
			<div class="page-title">
				<ol class="breadcrumb text-right">
				<li class="active">Dashboard/Package</li>
				</ol>
			</div>
		</div>

	</div>
</div>


<!--******************************package nu list diaplay karva mate*************************-->


<div class="col-md-6">
	<div class="card">
		<div class="card-header">
			<strong class="card-title">Package List</strong>
		</div>
<div id="msgdelete" class="sufee-alert alert with-close alert-success alert-dismissible fade show success"></div>
		<div class="card-body">
		  <table id="m_datatable" class="table table-striped table-bordered tablecase">
			<thead>
			  <tr>
				<th>Name</th>
				<th>Price</th>
				<th>Action</th>
			  </tr>
			</thead>
			<tbody>
		<?php foreach ($data as $package) {?>
			<tr class="hide<?php echo $package['id'] ?>">
				<td><?=$package['package_name']?></td>
				<td><?=$package['amount']?></td>
				<td class="">
					<a href="<?=base_url("admin/packages/find_package/{$package['id']}");?>" class="btn btn-outline-primary"title="Edit Task"><i class="fa fa-pencil-square-o"></i></a>&nbsp;
					<a href="javascript:;" class="btn btn-outline-danger deletepackage" id=<?=$package['id']?> title="Delete Task"><i class="fa fa-trash"></i></a></td>
			  </tr>

		<?php }?>
			</tbody>
		  </table>
		</div>
	</div>
</div>

<!--**************************************Package add karva mte*********************************-->


<div class="col-md-6">
<?php echo form_open('admin/packages/add_packages', ['id' => 'employeer']);
if ($info) {
	echo form_hidden('id', $info['id']);
} else {
	echo form_hidden('id', '');
}
?>
<form name="employer" method="post" action="">
	<div class="card">
	  <div class="card-header"><strong>
	  	<?php if ($info) {?>
	  		Edit Package
	  	<?php } else {?>
	  		Add Package
	  	<?php }?>
	 </strong><small></small></div>
	  <div class="card-body card-block">
	  	<div class="form-group col-sm-12">
			<label for="package_name" class=" form-control-label">Select Service</label>
			<select name="service_id" class="form-control" required>
			<option value="">Please select service</option>
			<?php
foreach ($service as $service) {
	if ($info) {
		?>
						<option value="<?=$service['id']?>"
				<?php
if ($info['service_id'] == $service['id']) {
			echo "selected=selected";
		}
		?>
						>
				<?=$service['name']?></option>service
				<?php
} else {?>
				<option value="<?=$service['id']?>"><?=$service['name']?></option>
			<?php }}?>
			</select>
		</div>
		<div class="form-group col-sm-12">
			<label for="package_name" class=" form-control-label">Package Name</label>
			<?php if ($info) {
	$value = $info['package_name'];
} else {
	$value = set_value('package_name');
}?>
		<?php echo form_input(['id' => 'package_name', 'name' => 'package_name', 'class' => 'form-control', 'value' => $value]); ?><div class="form-error"><?php echo form_error('package_name') ?></div>
		</div>
		<div class="form-group col-sm-12">
			<label for="description" class=" form-control-label">Description</label>
			<?php if ($info) {
	$value = $info['description'];
} else {
	$value = set_value('description');
}?>
			<?php echo form_textarea(['id' => 'description', 'name' => 'description', 'rows' => 3, 'class' => 'form-control', 'value' => $value]); ?><div class="form-error"><?php echo form_error('description'); ?></div>
		</div>
			<div class="form-group col-sm-6">
			<label for="duration" class=" form-control-label">Duration</label>
			<?php $duration[1] = '';if ($info) {

	$duration = explode(' ', $info['duration']);
	$value =

		$duration[0];

} else {
	$value = set_value('duration');
}?>
			<?php echo form_input(['id' => 'duration', 'name' => 'duration', 'class' => 'form-control', 'value' => $value]); ?><div class="form-error"><?php echo form_error('duration'); ?></div>
		</div>
		<div class="form-group col-sm-6">
				<label for="distance" class=" form-control-label">distance</label>
			<select name="distance" class="form-control" required>
				<option value="">Please select distance</option>
						<option value="year"<?php if ($duration[1] == 'year') {
	echo "selected=selected";
}
?>>Year</option>
						<option value="month"<?php if ($duration[1] == 'month') {
	echo "selected=selected";
}
?>>Month</option>
						<option value="day"<?php if ($duration[1] == 'day') {
	echo "selected=selected";
}
?>>Day</option>
					</select>
		</div>
		<div class="form-group col-sm-12">
			<label for="amount" class=" form-control-label">amount</label>
			<?php if ($info) {
	$value = $info['amount'];
} else {
	$value = set_value('amount');
}?>
			<?php echo form_input(['id' => 'amount', 'name' => 'amount', 'class' => 'form-control', 'value' => $value]); ?><div class="form-error"><?php echo form_error('amount'); ?> </div>

		</div>
	  </div>

	<div class="card ">
	  <div class="card-footer pull-right">
	  	<?php echo form_submit(['value' => 'Submit', 'class' => 'btn btn-primary btn-lg']);
echo form_reset(['value' => 'Reset', 'class' => 'btn btn-danger btn-lg']);
echo form_close(); ?>

	  </div>
	</div>
</form>
</div>
<?php include "footer.php";?>
<script>
jQuery('#dob').datepicker();

var $container = $('.addpackges');
var $row = $('.addpackgesgroup');
var $add = $('#addButton');
var $remove = $('#removeButton');
var $focused;

$container.on('click', 'input', function () {
    $focused = $(this);
});

$add.on('click', function () {
    var $newRow = $row.clone().insertAfter('.addpackgesgroup:last');
    $newRow.find('input').each(function () {
        this.value = '';
    });
});

$remove.on('click', function () {
    if (!$focused) {
        alert('Select a row to delete (click en input with it)');
        return;
    }

    var $currentRow = $focused.closest('.addpackgesgroup');
	if ($currentRow.index() === 0) {
        // don't remove first row
        alert("You can't remove first row");
    } else {
    	$currentRow.remove();
        $focused=null;
    }
});
</script>
<!--**********************************package delete krava mate***************************************-->
<script type="text/javascript">
$(document).ready(function()
{
	$('#msgdelete').hide();
	$('.deletepackage').click(function(){
		var id=$(this).attr('id');
		 var url="<?=base_url('admin/packages/delete_packages');?>";
		$.ajax({
   				 type:'ajax',
    			method:'post',
   				 url:url,
   				 data:{"id" : id},

   				 success:function(data){
       				$('#msgdelete').show();
        		  $('#msgdelete').html(data);

     		 },
 		 });
		$('.hide'+id).hide(200);
		return true;
	});
});
</script>