 <?php include "header.php";?>
        <div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>Clients List</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                           <li class="active">Dashboard/Clients List</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

   	<div class="col-xl-12">
<div id="msg" class="sufee-alert alert with-close alert-success alert-dismissible fade show success"></div>
  
      </div>

			<div class="card">
				<div class="card-header">
					<strong class="card-title">Clients List</strong><strong class="float-right"><a class="btn btn-success" href="<?=base_url('admin/admin/add_clients');?>">Add</a></strong>
				</div>
				<div class="card-body">
                  <table id="m_datatable" class="table table-striped table-bordered">
                    <thead>
                      <tr>
                        <th>No.</th>
                        <th>Title</th>
                        <th>Symbol</th>
                        <th>Discription</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php $count=1;?>
                      <?php foreach($data as $data){ ?>
                      <tr class="hide<?php echo $data['id'] ?>">
                        <td><?= $count++ ?></td>
                        <td><?= $data['title'] ?></td>
                        <td><img src="<?= base_url('uploads/clients/'.$data['image']);?>" height="70" width="80"></td>
                        <td><?= $data['discription'] ?></td>
              <td class="action">
              <?php if(isset($datas[1][2]) && $datas[1][2] == 1){?>
                <a href=<?= base_url("admin/admin/find_clients/{$data['id']}") ?> class="btn btn-outline-primary fa fa-pencil-square-o editadmin">Edit</a>
              <?php } ?>
              <a href="javascript:;" title="delete admin" class="btn btn-outline-danger fa fa-trash delete_clients" id=<?= $data['id'] ?>>Delete</a>

               </td>
                      </tr>
                    <?php } ?>
                      
                    </tbody>
                  </table>
                        </div>
                    </div>
            </div>

<?php include "footer.php";?>
<script src="<?= base_url('assets/js/ajax.js'); ?>"></script>
<script type="text/javascript">

<?php if(isset($datas[1][3]) && $datas[1][3] == 1){?>
  $('.dataTables_filter').show();
<?php }else{?>
  $('.dataTables_filter').hide();
<?php } ?>

$(document).ready(function()
{
  $('#msg').hide();
   $('#customers-table').DataTable();
});
</script>

 <script type="text/javascript">

    $('.delete_clients').click(function(){
  var id=$(this).attr("id");
  var url="<?= base_url('admin/admin/delete_clients'); ?>"; 
   bootbox.confirm("Are you sure to delete clients?", function(result){
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