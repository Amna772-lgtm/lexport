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
                       <li class="active">Dashboard/Registration Documents </li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

   	<div class="col-xl-12">
      <div id="msg" class="sufee-alert alert with-close alert-success alert-dismissible fade show success"></div>
			<div class="card">
				<div class="card-header">
				  <strong class="card-title">Registration Documents  List</strong>
          <?php if(isset($datas[8][1]) && $datas[8][1] == 1){?>
            <strong class="float-right"><a class="btn btn-success" href="<?=base_url('admin/reg_of_doc/add_reg_of_doc');?>">Add</a></strong>
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
                <th>Case Code</th>
					<th>Total of Procuration Number</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              <?php 
              $count=1;
              foreach($data as $reg_of_doc){  ?>
              <tr class="hide<?php echo $reg_of_doc['id'] ?>">
                <td><?= $count++ ?></td>
                <td><?= $reg_of_doc['identification_number'] ?></td>
                <td><?= $reg_of_doc['identification_types'] ?></td>
                <td><?= $reg_of_doc['client_name'] ?></td>
                <td><?= $reg_of_doc['client_file_number'] ?></td>
                <td><?= $reg_of_doc['case_code'] ?></td>
                <td><?= $reg_of_doc['total_of_procuration_number'] ?></td>
		            <td class="action">
                  
                  <?php if(isset($datas[8][2]) && $datas[8][2] == 1){?>
                  <a href=<?= base_url("admin/reg_of_doc/find_reg_of_doc/{$reg_of_doc['id']}") ?> class="btn btn-outline-primary fa fa-pencil-square-o editadmin" id=<?= $reg_of_doc['id'] ?>></a>
                  <?php } ?>
                  <a href="javascript:;" class="btn btn-outline-danger fa fa-trash delete_reg_of_doc" id=<?= $reg_of_doc['id'] ?>></a>
                   <a href=<?= base_url("admin/reg_of_doc/view_reg_of_doc/{$reg_of_doc['id']}") ?>  title="View Registration Documents" class="fa fa-eye btn btn-outline-success" target="_blnak"></a>
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

  <?php if(isset($datas[8][3]) && $datas[8][3] == 1){?>
      $('.dataTables_filter').show();
    <?php }else{?>
      $('.dataTables_filter').hide();
    <?php } ?>

  $(document).ready(function()
  {
    $('#msg').hide();
    $('#customers-table').DataTable();
  });

  $('.delete_reg_of_doc').click(function(){
    
    var id=$(this).attr("id");

    var url="<?= base_url('admin/reg_of_doc/delete_reg_of_doc'); ?>"; 
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
