 <?php include "header.php";?>
        <div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>Pending Customer</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                           <li class="active">Dashboard/Customer/Customer Alert</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
<div id="msg" class="sufee-alert alert with-close alert-success alert-dismissible fade show success"></div>
   	<div class="col-xl-12">
			<div class="card">
				<div class="card-header">
					<strong class="card-title">Pending Customer</strong>    <strong class="float-right"><a class="btn btn-success"href="<?=base_url('admin/c_case/padding_case');?>">Pending Case</a>
 	<a class="btn btn-info"href="<?=base_url('admin/admin/all_users');?>">Registered List</a>
<a href="<?=base_url('admin/c_case/reject_case_list');?>" class="btn btn-danger">Reject E-Service List</a><a href="<?=base_url('admin/c_case/opponent_list');?>" class="btn btn-info">Opponent List</a></strong>  
				</div>
				<div class="card-body">
                  <table id="m_datatable" class="table table-striped table-bordered">
                    <thead>
                      <tr>
                        <th>No.</th>
                        <th>Name</th>
                        <th>type</th>
						            <th>City</th>
                        <th>Request Type</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                     <?php $count=1;
                       foreach($list as $Padding_cus) { ?>
                        <tr class="hide<?php echo $Padding_cus['customer_id'] ?>">
                        <td><?= $count++ ?></td>
                        <td><?= $Padding_cus['client_name'] ?></td>
                        <td><?= $Padding_cus['type_of_customer'] ?></td>
                        <td><?= $Padding_cus['city'] ?></td>
                        <td><?php if($Padding_cus['add_edit']==1)
                        {?>
                             <span class="badge badge-pill badge-warning">Request for Edit</span>
                      <?php  } 
                        else
                        { ?>
                          <span class="badge badge-pill badge-primary">Request for add</span>
                     <?php  }  ?>
                    </td>
            <td class="action">
              <a href="javascript:;" class="btn btn-success fa fa-check approve_customer" id="<?= $Padding_cus['customer_id']; ?>">Approve</a>
             &nbsp;
              <?php echo anchor(base_url("admin/customer/approve_customer/{$Padding_cus['customer_id']}"),'view',['class'=>'btn btn-info']); ?>
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

        $(document).ready(function() {
           $('#msg').hide();
          $('#customers-table').DataTable();
        } );
    </script>

  <script type="text/javascript">

$('.approve_customer').click(function(){
  var id=$(this).attr("id");
  var url="<?=base_url('admin/customer/approve_customer');?>";
   
      $.ajax({
    type:'ajax',
    method:'post',
    url:url,
    data:{"id" : id},

    success:function(data){
       $('#msg').show();
         $('#msg').html(data);
         $('.hide'+id).hide(200);
      },
      error:function(){
         $('#msg').show();
       $('#msg').html('approve failed');
      },
  });
});
  
</script>