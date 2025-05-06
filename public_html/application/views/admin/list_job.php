 <?php include "header.php";?>
        <div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>Job List</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                           <li class="active">Dashboard/Jobs List</li>
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
					<strong class="card-title">Job List</strong>  <strong class="float-right"><a class="btn btn-success" href="<?=base_url('admin/admin/add_job');?>">Add</a></strong>
				</div>
				<div class="card-body">
                  <table id="m_datatable" class="table table-striped table-bordered">
                    <thead>
                      <tr>
                        <th>No.</th>
                        <th>Title</th>
                        <th>Description</th>
                        <th>Image</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php $count=1;?>
                      <?php foreach($data as $data){ ?>
                      <tr class="hide<?php echo $data['id'] ?>">
                        <td><?= $count++ ?></td>
                        <td><?= $data['title'] ?></td>
                        <td><?php echo substr($data['description'],0,200); ?></td>
                         <td><img src="<?= base_url('uploads/job/'.$data['image']);?>" height="70" width="80"></td>
            <td class="action">
              <a href=<?= base_url("admin/admin/find_job/{$data['id']}") ?> class="btn btn-outline-primary fa fa-pencil-square-o editadmin">Edit</a>
           
            <a href="javascript:;" title="delete admin" class="btn btn-outline-danger fa fa-trash delete_news" id=<?= $data['id'] ?>>Delete</a>

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

    $('.delete_news').click(function(){
  var id=$(this).attr("id");
  var url="<?= base_url('admin/admin/delete_job'); ?>"; 
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