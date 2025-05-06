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
                       <li class="active">Dashboard/Contract appointment</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

   	<div class="col-xl-12">
      <div id="msg" class="sufee-alert alert with-close alert-success alert-dismissible fade show success"></div>
			<div class="card">
				<div class="card-header">
				  <strong class="card-title">Contract List</strong>
          <strong class="float-right"><a class="btn btn-success" href="<?=base_url('admin/contract/add_contract');?>">Add</a></strong>
        </div>
				<div class="card-body">
          <table id="m_datatable" class="table table-striped table-bordered">
            <thead>
              <tr>
                <th>No.</th>
                <th>Contract Start Date</th>
                <th>Ending Contract Date</th>
                <th>Contract Number</th>
                <th>Client Name</th>
                 <th>Client File Number</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              <?php 
              $count=1;
              foreach($data as $contract){  ?>
              <tr class="hide<?php echo $contract['id'] ?>">
                <td><?= $count++ ?></td>
                <td><?= $contract['contract_start_date'] ?></td>
                <td><?= $contract['ending_contract_date'] ?></td>
                <td><?= $contract['contract_number'] ?></td>
                <td><?= $contract['client_name'] ?></td>
                <td><?= $contract['client_file_number'] ?></td>
		            <td class="action">
                    <a href=<?= base_url("admin/contract/find_contract/{$contract['id']}") ?> class="btn btn-outline-primary fa fa-pencil-square-o editadmin" id=<?= $contract['id'] ?>></a>
                    <a href="javascript:;" class="btn btn-outline-danger fa fa-trash delete_contract" id=<?= $contract['id'] ?>></a>
				    <a href=<?= base_url("admin/contract/view_contract/{$contract['id']}") ?>  title="View Case " class="fa fa-eye btn btn-outline-success" target="_blnak"></a>
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

  $('.delete_contract').click(function(){
    
    var id=$(this).attr("id");

    var url="<?= base_url('admin/contract/delete_contract'); ?>"; 
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
