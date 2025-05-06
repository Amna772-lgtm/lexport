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
                       <li class="active">Dashboard/HR List</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

   	<div class="col-xl-12">
      <div id="msg" class="sufee-alert alert with-close alert-success alert-dismissible fade show success"></div>
			<div class="card">
				<div class="card-header">
				  <strong class="card-title">HR List</strong>
          <?php if(isset($datas[14][1]) && $datas[14][1] == 1){?>
          <strong class="float-right"><a class="btn btn-success" href="<?=base_url('admin/hr/add_hr');?>">Add</a></strong>
        <?php } ?>
        </div>
				<div class="card-body">
          <table id="m_datatable" class="table table-striped table-bordered">
            <thead>
              <tr>
                <th>No.</th>
                <th>Client Name</th>
                <th>Contract Number</th>
                <th>Date of Starting Work</th>
                <th>Contract Ending Date</th>
                <th>Branch</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              <?php 
              $count=1;
              foreach($data as $hr){  ?>
              <tr class="hide<?php echo $hr['id'] ?>">
                <td><?= $count++ ?></td>
                <td><?= $hr['client_full_name'] ?></td>
                <td><?= $hr['contract_number'] ?></td>
                <td><?= $hr['date_of_starting_work']; echo getTheDayFromDate($hr['date_of_starting_work']); ?></td>
                <td><?= $hr['contract_ending_date']; echo getTheDayFromDate($hr['contract_ending_date']);?></td>
                <td><?= $hr['branch'] ?></td>
		            <td class="action">
                  <?php if(isset($datas[14][2]) && $datas[14][2] == 1){?>
                    <a href=<?= base_url("admin/hr/find_hr/{$hr['id']}") ?> class="btn btn-outline-primary fa fa-pencil-square-o editadmin" id=<?= $hr['id'] ?>></a>
                  <?php } ?>
                    <a href="javascript:;" class="btn btn-outline-danger fa fa-trash delete_contract" id=<?= $hr['id'] ?>></a>
				    <a href=<?= base_url("admin/hr/view_hr/{$hr['id']}") ?>  title="View Case " class="fa fa-eye btn btn-outline-success" target="_blnak"></a>
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
    <?php if(isset($datas[14][3]) && $datas[14][3] == 1){?>
      $('.dataTables_filter').show();
    <?php }else{?>
      $('.dataTables_filter').hide();
    <?php } ?>
  $(document).ready(function()
  {
    $('#msg').hide();
    $('#customers-table').DataTable();
  });

  $('.delete_contract').click(function(){
    
    var id=$(this).attr("id");

    var url="<?= base_url('admin/hr/delete_hr'); ?>"; 
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
