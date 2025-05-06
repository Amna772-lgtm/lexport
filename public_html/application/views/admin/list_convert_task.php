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
          <strong class="float-right"><a class="btn btn-success" href="<?=base_url('admin/task/add_convert_task');?>">Add</a></strong>
        </div>
				<div class="card-body">
          <table id="m_datatable" class="table table-striped table-bordered">
            <thead>
              <tr>
                <th>No.</th>
                <th>Employee Name</th>
                <th>Starting Date</th>
                <th>Ending Date</th>
                <th>Task Status</th>
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
                <td><?= $task['starting_date'];  echo getTheDayFromDate($task['starting_date']);?></td>
                <td><?= $task['ending_date'] ?></td>
                <td><?= $task['task_status'] ?></td>
		            <td class="action">
                    <a href=<?= base_url("admin/task/find_convert_task/{$task['id']}") ?> class="btn btn-outline-primary fa fa-pencil-square-o editadmin" id=<?= $task['id'] ?>></a>
                    <a href="javascript:;" class="btn btn-outline-danger fa fa-trash delete_convert_task" id=<?= $task['id'] ?>></a>
				    <a href=<?= base_url("admin/task/view_convert_task/{$task['id']}") ?>  title="View Case " class="fa fa-eye btn btn-outline-success" target="_blnak"></a>
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
  $(document).ready(function()
  {
    $('#msg').hide();
    $('#customers-table').DataTable();
  });

  $('.delete_convert_task').click(function(){
    
    var id=$(this).attr("id");

    var url="<?= base_url('admin/task/delete_convert_task'); ?>"; 
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
</script>
