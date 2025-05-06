<?php include "header.php";?>
<div class="breadcrumbs">
	<div class="col-sm-4">
		<div class="page-header float-left">
			<div class="page-title">
				<h1>Judge Master</h1>
			</div>
		</div>
	</div>
	<div class="col-sm-8">
		<div class="page-header float-right">
			<div class="page-title">
				<ol class="breadcrumb text-right">
				<li class="active">Dashboard/Judge</li>
				</ol>
			</div>
		</div>
		
	</div>
</div>
<div id="msg" class="sufee-alert alert with-close alert-success alert-dismissible fade show success"></div>

<!--*****************************display services****************************************-->


<div class="col-md-6">
	<div class="card">
		<div class="card-header">
			<strong class="card-title">Judge List</strong>
		</div>
		<div class="card-body">
		  <table id="m_datatable" class="table table-striped table-bordered tablecase">
			<thead>
			  <tr>
				<th>Sr.No.</th>
				<th>Name</th>
 
			  </tr>
			</thead>
			<tbody>
			 <?php $ct = 0; foreach ($judge_name as $ser) { $ct++;?>
			 	<tr class="hide<?= $ser->id ?>">
			 		<td><?= $ct; ?></td>
			 		<td><?= $ser->judge_name; ?></td>
 
			 		<td class="">
			 			<a href=<?= base_url("admin/admin/find_court_master/{$ser->id}") ?> class="btn btn-primary" title="Edit Task">Edit</a>&nbsp;
			 			<a href="javascript:;" class="btn btn-danger deleteservices" id='<?= $ser->id; ?>' title="Delete Task">Delete</td>
			 		</tr>
			<?php } ?>   
			</tbody>
		  </table>
		</div>
	</div>
</div>



<!--***************************Add store_judge*******************************-->


<div class="col-md-6">
<?php echo form_open('admin/admin/store_judge',['id'=>'store_judge']); 
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
				Edit Judge
	<?php	} else { ?>
				Add Judge
	<?php } ?>
		</strong><small></small></div>
	  <div class="card-body card-block">
		<div class="form-group col-sm-12">
			<label for="judge_names" class=" form-control-label">Judge name</label>
	<?php if($data)
			{
				$value=$data->judge_name;
			}
			else
			{
				$value=set_value('judge_name');
			}
			echo form_input(['name'=>'judge_name','class'=>'form-control','id'=>'judge_name','value'=>$value]); ?>	
			<?= form_error('judge_name'); ?>		
		</div>
		
	
		

	</div>
	<div class="card ">
	  <div class="card-footer pull-right">
	  <?php 
		
			 echo form_submit([ 'value'=>'Submit','class'=>'btn btn-primary btn-lg addservices']);
  ?> 
	  </div>
	</div>
<?= form_close(); ?>
</div>
<?php include "footer.php";?>


<script type="text/javascript">

$(document).ready(function()
{
  $('#msg').hide();
$("#m_datatable").on("click", ".deleteservices", function() {
 
{
  var id=$(this).attr("id");
  var url="<?= base_url('admin/admin/delete_court_master'); ?>"; 
bootbox.confirm("Are you sure?", function(result){
if(result){
  $.ajax({
    type:'ajax',
    method:'post',
    url:url,
    data:{"id" : id},
    dataTyppe: 'json',
  
    success:function(data){
       $('#msg').show();
          $('#msg').html(data);

      },
  });
$('.hide'+id).hide(200);location.reload();
return true;
}
else
{
$('#msg').show();
	$('#msg').html('Delete Failed');
}
})
 });
});
    
</script>