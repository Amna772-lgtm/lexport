 <?php include "header.php";?>
        <div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1><?php echo $this->lang->line('');?>Pending E-Service</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                           <li class="active"><?php echo $this->lang->line('Dashboard');?>/<?php echo $this->lang->line('$lang["E_service"] = "E-service";');?>/<?php echo $this->lang->line('E_Service_Alert');?></li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

   	<div class="col-xl-12">
			<div class="card">
				<div class="card-header">
					<strong class="card-title"><?php echo $this->lang->line('Pending_E_Service');?></strong><strong class="float-right">
					
				<a class="btn btn-info"href="<?=base_url('admin/admin/all_users');?>"><?php echo $this->lang->line('Registered_List');?> <span class="badge badge-danger noticount admin"><?php echo userNotification(); ?></span></a>
				<a class="btn btn-success"href="<?=base_url('admin/c_case/padding_case');?>"><?php echo $this->lang->line('Pending_E_Service');?> <span class="badge badge-danger noticount admin"><?php echo casePendingNotification(); ?></span></a>
				 <a href="<?=base_url('admin/c_case/reject_case_list');?>" class="btn btn-danger"><?php echo $this->lang->line('Reject_E_Service_List');?></a>
				 <a href="<?=base_url('admin/c_case/opponent_list');?>" class="btn btn-info"><?php echo $this->lang->line('Opponent_List');?></a></strong>  
				</div>
				<div class="card-body">
                  <table id="m_datatable" class="table table-striped table-bordered">
                    <thead>
                      <tr>
                        <th><?php echo $this->lang->line('No');?></th>
                        <th><?php echo $this->lang->line('Name');?></th>
                        <th><?php echo $this->lang->line('Service_Type');?></th>
						<th><?php echo $this->lang->line('Contact_Number');?></th>
                        <th><?php echo $this->lang->line('Request_Type');?></th>
                        <th><?php echo $this->lang->line('ACTION');?></th>
                      </tr>
                    </thead>
                    <tbody>
                <?php $count = 1; foreach ($padding_case as $padding_case) {	?>
                      <tr>
                        <td><?=$count++?><?php if($padding_case['is_read'] == 0) { echo "<i class='fa fa-bell' style='color: red;'></i>"; } ?></td>
                        <td><?=$padding_case['client_name'];?></td>
                        <td><?= getServiceName($padding_case['service_types']); ?></td>
                        <td><?= getCustomerMobile($padding_case['customers_id']);?></td>
                       <td><?php if ($padding_case['add_edit'] == 1) {?>
                          <span class="badge badge-pill badge-warning"><?php echo $this->lang->line('Request_for_Edit');?></span>
                      <?php } else {?>
                          <span class="badge badge-pill badge-primary"><?php echo $this->lang->line('Request_for_add');?></span>
                     <?php }?>
                    </td>
						<td class="action">

              <?php echo anchor(base_url("admin/c_case/approve_case/{$padding_case['case_id']}"), 'Approve', ['class' => 'btn btn-success fa fa-check']); ?>&nbsp;
              <?php echo anchor(base_url("admin/c_case/pending_case_view/{$padding_case['case_id']}"), 'view', ['class' => 'btn btn-info']);
			if($padding_case['is_reject'] == '0'){
				?>
				<a href="javascript:;" id="<?= $padding_case['case_id'] ?>" class="btn btn-danger reject_case" title="Reject E-Service"><?php echo $this->lang->line('Reject');?></a>
				<?php
			} else {
				?>
					<a href="javascript:;" class="btn btn-danger" title="Reject Case"><?php echo $this->lang->line('Reject');?></a>
				<?php 
			}
			  ?>
			  

                      </tr>
            <?php }?>
                    </tbody>
                  </table>
                        </div>
                    </div>
            </div>

<?php include "footer.php";?>

    <script type="text/javascript">

$("#m_datatable").on("click", ".reject_case", function() {
var id=$(this).attr("id");


var msg= $('#note_dialog').html();
var url="<?= base_url('admin/c_case/reject_case'); ?>"; 
bootbox.confirm('<div class="assignpopup"><b>Reason For Reject Case</b><textarea placeholder="Notes" name="note" id="notes" class="form-control col-md-12"></textarea></div>', function(result){
if(result){
var  notes = $('#notes').val();

    $.ajax({
    type:'ajax',
    method:'post',
    url:url,
    data:{"id": id,'notes':notes},
    success:function(data){
       $('#msg').show();
	  
         $('#msg').html(data);
      },
  });

return true;
}
else
{
$('#msg').show();
	$('#msg').html('Assign Failed');
}
})
});
        $(document).ready(function() {
          $('#customers-table').DataTable();
        } );
    </script>\