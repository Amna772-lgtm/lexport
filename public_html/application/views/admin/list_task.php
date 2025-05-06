 <?php include "header.php";?>
    <div class="breadcrumbs">
        <div class="col-sm-4">
            <div class="page-header float-left">
                <div class="page-title">
                    <h1>Dashboard</h1>
                </div>
            </div>
        </div>
        <div class="col-sm-8">
            <div class="page-header float-right">
                <div class="page-title">
                    <ol class="breadcrumb text-right">
                       <li class="active">Dashboard/Task</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

   	<div class="col-xl-12">
      <div id="msg" class="sufee-alert alert with-close alert-success alert-dismissible fade show success"></div>
			<div class="card">
				<div class="card-header">
				  <strong class="card-title">Task List</strong>
          <?php if(isset($datas[9][1]) && $datas[9][1] == 1){?>
          <strong class="float-right"><a class="btn btn-success" href="<?=base_url('admin/task/add_task');?>">Add</a></strong>
          <?php } ?>
        </div>
				<div class="card-body">
          <table id="m_datatable" class="table table-striped table-bordered">
            <thead>
              <tr>
                <th>No.</th>
                <th>Employee Name</th>
                <th>Task Type</th>
                <th>Client</th>
                <th>Project</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              <?php 
              $count=1;
              foreach($data as $task){  ?>
              <tr class="hide<?php echo $task['id'] ?>">
                <td><?= $count++ ?></td>
                <td><?= $task['employee_name'] ?></td>
                <td><?= $task['task_type'] ?></td>
                <td><?= $task['client'] ?></td>
                <td><?= $task['project'] ?></td>
		            <td class="action">
                    <?php if(isset($datas[9][2]) && $datas[9][2] == 1){?>
                    <a href=<?= base_url("admin/task/find_task/{$task['id']}") ?> class="btn btn-outline-primary fa fa-pencil-square-o editadmin" id=<?= $task['id'] ?>></a>
                    <?php } ?>
                    <a href="javascript:;" class="btn btn-outline-danger fa fa-trash delete_task" id=<?= $task['id'] ?>></a>
				    <a href=<?= base_url("admin/task/view_task/{$task['id']}") ?>  title="View Case " class="fa fa-eye btn btn-outline-success" target="_blnak"></a>
				    <?php if($this->session->userdata('role_id') == 1){?> <a  href="javascript:;" id="<?= $task['id'] ?>" class="btn btn-outline-success assign_task" title="Edit Case">Assign</a><?php } ?>

                </td>
              </tr>
            <?php } ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>

<?php include "footer.php";?>

<script type="text/javascript">

    <?php if(isset($datas[9][3]) && $datas[9][3] == 1){?>
      $('.dataTables_filter').show();
    <?php }else{?>
      $('.dataTables_filter').hide();
    <?php } ?>

  $(document).ready(function()
  {
    $('#msg').hide();
    $('#customers-table').DataTable();
  });

  $('.delete_task').click(function(){
    
    var id=$(this).attr("id");

    var url="<?= base_url('admin/task/delete_task'); ?>"; 
    bootbox.confirm("Are you sure?", function(result){
      if(result)
      {
        $.ajax({
          type:'ajax',
          method:'post',
          url:url,
          data:{"id" : id},
          success:function(data){
            $('#msg').show();
            $('#msg').html(data);
          },
        });
        $('.hide'+id).hide(200);
        return true;
      }
      else
      {
        $('#msg').show();
        $('#msg').html('delete failed');
      }
    })
  });
  
  
$('.assign_task').click(function(){
var id=$(this).attr("id");

var msg= $('#note_dialog').html();
var url="<?= base_url('admin/task/assign_task'); ?>"; 
bootbox.confirm('<select class="form-control" id="employee_id" name="user_id"><option>Select employee </option><?php  foreach ($employees as$employee) { ?><option value="<?php echo $employee["id"]?>"><?php echo $employee["name"]?></option><?php } ?></select>', function(result){
if(result){
  var  empid = $('#employee_id :selected').val();
    $.ajax({
    type:'ajax',
    method:'post',
    url:url,
    data:{"id" : id,'empid':empid},
    success:function(data){
       $('#msg').show();
         $('#msg').html(data);
      },
  });

return true;
}
else
{
$('#msg').show();
  $('#msg').html('Assign Failed');
}
})
});

</script>
