 <?php include "header.php";?>
        <div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>Admin List</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                           <li class="active">Dashboard/Admin List</li>
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
					<strong class="card-title">Admin List</strong>
				</div>
				<div class="card-body">
                  <table id="m_datatable" class="table table-striped table-bordered">
                    <thead>
                      <tr>
                        <th>No.</th>
                        <th>Name</th>
                        <th>Date Of Birth</th>
                        <th>Contact No.</th>
                        <th>Create Date</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      
                      <?php $count=1;?>
                      <?php foreach($list as $admin){ ?>
                      <tr class="hide<?php echo $admin['id'] ?>">
                        <td><?= $count++ ?></td>
                        <td><?= $admin['name'] ?></td>
                        <td><?= $admin['dob'] ?> </td>
                        <td><?= $admin['phone'] ?></td>
                        <td><?= $admin['created'] ?></td>
            <td class="action">
              <a href=<?= base_url("admin/admin/find_admin/{$admin['id']}") ?> class="btn btn-outline-primary fa fa-pencil-square-o editadmin" id=<?= $admin['id'] ?>>Edit</a>
           
            <a href="javascript:;" title="delete admin" class="btn btn-outline-danger fa fa-trash delete_admin" id=<?= $admin['id'] ?>>Delete</a>

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

$(document).ready(function()
{
  $('#msg').hide();
   $('#customers-table').DataTable();
});
</script>

 <script type="text/javascript">

    $('.delete_admin').click(function(){
  var id=$(this).attr("id");
  var url="<?= base_url('admin/admin/delete_admin'); ?>"; 
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