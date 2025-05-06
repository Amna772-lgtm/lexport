 <?php include "header.php";?>
        <div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>Team List</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                           <li class="active">Dashboard/Team List</li>
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
					<strong class="card-title">Team List</strong><strong class="float-right"><a class="btn btn-success" href="<?=base_url('admin/admin/add_clients');?>">Add</a></strong>
				</div>
				<div class="card-body">
                  <table id="m_datatable" class="table table-striped table-bordered">
                    <thead>
                      <tr>
                        <th>No.</th>
                        <th>Name</th>
                        <th>Designation</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      
                      <?php $count=1;?>
                      <?php foreach($data as $data){ ?>
                      <tr class="hide<?php echo $data['id'] ?>">
                        <td><?= $count++ ?></td>
                        <td><?= $data['name'] ?></td>
                        <td><?= $data['designation'] ?> </td>
            <td class="action">
              <a href=<?= base_url("admin/admin/find_team_members/{$data['id']}") ?> class="btn btn-outline-primary fa fa-pencil-square-o editadmin">Edit</a>
           
            <a href="javascript:;" title="delete admin" class="btn btn-outline-danger fa fa-trash delete_team_members" id=<?= $data['id'] ?>>Delete</a>

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

    $('.delete_team_members').click(function(){
  var id=$(this).attr("id");
  var url="<?= base_url('admin/admin/delete_team_members'); ?>"; 
   bootbox.confirm("Are you sure to delete members?", function(result){
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