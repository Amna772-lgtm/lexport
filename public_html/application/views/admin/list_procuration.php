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
                       <li class="active">Dashboard/procuration </li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

   	<div class="col-xl-12">
      <div id="msg" class="sufee-alert alert with-close alert-success alert-dismissible fade show success"></div>
			<div class="card">
				<div class="card-header">
				  <strong class="card-title">Procuration  List</strong>
          <?php if(isset($datas[7][1]) && $datas[7][1] == 1){?>  
          
          <strong class="float-right"><a class="btn btn-success" href="<?=base_url('admin/procuration/add_procuration');?>">Add</a></strong>
          <?php } ?>
        </div>
				<div class="card-body">
          <table id="m_datatable" class="table table-striped table-bordered">
            <thead>
              <tr>
                <th>No.</th>
                <th>Identification Number</th>
                <th>Identification Types</th>
                <th>Client Name</th>
                <th>Client File Number</th>
                <th>Procuration Code</th>
                <th>Case Code</th>
				<th>Total of Procuration Number</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              <?php 
              $count=1;
              foreach($data as $procuration){  ?>
              <tr class="hide<?php echo $procuration['id'] ?>">
                <td><?= $count++ ?></td>
                <td><?= $procuration['identification_number'] ?></td>
                <td><?= $procuration['identification_types'] ?></td>
                <td><?= $procuration['client_name'] ?></td>
                <td><?= $procuration['client_file_number'] ?></td>
                <td><?= $procuration['procuration_code'] ?></td>
                <td><?= $procuration['case_code'] ?></td>
                <td><?= $procuration['total_of_procuration_number'] ?></td>
		            <td class="action">
                  <?php if(isset($datas[7][2]) && $datas[7][2] == 1){?>

                  <a href=<?= base_url("admin/procuration/find_procuration/{$procuration['id']}") ?> class="btn btn-outline-primary fa fa-pencil-square-o editadmin" id=<?= $procuration['id'] ?>></a>
                  <?php }?>
                  <a href="javascript:;" class="btn btn-outline-danger fa fa-trash delete_procuration" id=<?= $procuration['id'] ?>></a>
                  <a href=<?= base_url("admin/procuration/view_procuration/{$procuration['id']}") ?>  title="View Procuration" class="fa fa-eye btn btn-outline-success" target="_blnak"></a>
                  <!-- <a href="javascript:;" class="btn btn-outline-success fa fa-file " id=<?= $procuration['id'] ?>>Report</a> -->
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

   <?php if(isset($datas[7][3]) && $datas[7][3] == 1){?>
      $('.dataTables_filter').show();
    <?php }else{?>
      $('.dataTables_filter').hide();
    <?php } ?>

  $(document).ready(function()
  {
    $('#msg').hide();
    $('#customers-table').DataTable();
  });

  $('.delete_procuration').click(function(){
    
    var id=$(this).attr("id");

    var url="<?= base_url('admin/procuration/delete_procuration'); ?>"; 
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
