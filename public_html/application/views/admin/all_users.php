<?php
include('header.php');

?>

<style>
    .bootbox-confirm .modal-dialog{
        max-width: 500px;
    }
    </style>
    <div class="m-grid__item m-grid__item--fluid m-wrapper">


        <!-- END: Subheader -->
        <div class="m-content">
<div id="msg" class="sufee-alert alert with-close alert-success alert-dismissible fade show success"></div>
            <!--begin::Portlet-->
            <div class="m-portlet lp-theme-card bg-transparent">
            <div id="custom-search-container"></div>
                <div class="m-portlet__head">
                    <div class="m-portlet__head-caption">
                    <!-- <div class="m-portlet__head-title">
                            <h3 class="m-portlet__head-text">
                            <?php echo $this->lang->line('Users');?>
                            </h3>
                        </div> -->
                    <div class="theme-new-nav-menu">
                        <h3 class="m-portlet__title" style="margin-right: 70px; font-size:24px !important;">
                                <?php echo $this->lang->line('All_Users_List');?>
                            </h3>
                            <ul style="gap: 40px;">
                                <!-- <li class="active"> <a href="http://lexport.demosbywpsqr.com/admin/c_case/padding_list">Waiting list</a> </li>
                                <li> <a href="http://lexport.demosbywpsqr.com/admin/customer/list_customer">List Customers</a> </li>
                                <li> <a href="http://lexport.demosbywpsqr.com/admin/mission_session/list_mission">Cases</a> </li>
                                <li> <a href="http://lexport.demosbywpsqr.com/admin/mission_writings/list_mission">Writing</a> </li>
                                <li> <a href="http://lexport.demosbywpsqr.com/admin/mission_consultation/list_mission">Consultation</a> </li>
                                <li> <a href="http://lexport.demosbywpsqr.com/admin/mission_visiting/list_mission">Meeting</a> </li>
                                <li> <a href="http://lexport.demosbywpsqr.com/admin/mission_general/list_mission">General</a> </li>
                                <li> <a href="http://lexport.demosbywpsqr.com/admin/assignment">Assignment</a> </li>
                                <li> <a href="http://lexport.demosbywpsqr.com/admin/archive/list_archive">Archives</a> </li>
                                <li> <a href="http://lexport.demosbywpsqr.com/admin/admin/audio_list">Audio Record</a> </li>
                                <li> <a href="http://lexport.demosbywpsqr.com/admin/admin/list_note">Note List</a> </li> -->
                                <!-- <li> <a href="http://lexport.demosbywpsqr.com/admin/admin/chat">Inbox</a> </li>
								<li class="active"> <a href="http://lexport.demosbywpsqr.com/admin/admin/all_users">User List</a> </li> -->

                            </ul>
                            <!-- <a class="btn btn-primary" href="#"> <i class="fa fa-plus"></i> Assign</a> -->
                        </div>
                    </div>
                </div>


                <div class="m-portlet__body">

                    
                    <div class="row align-items-center dataTables_wrapper dt-bootstrap4 no-footer" style="margin-bottom: 20px">

<style>
.nedbtn .btn {
    margin-right: 10px !important;
}
</style>
                       
                        <div class="col-xl-12 order-2 order-xl-1 nedbtn">

                            <div class="form-group m-form__group align-items-right" style="margin-bottom: 0">
									<a class="btn btn-info"href="<?=base_url('admin/admin/all_users');?>"><?php echo $this->lang->line('Registered_List');?> <span class="badge badge-danger noticount admin"><?php echo userNotification(); ?></span></a>
									<a class="btn btn-success"href="<?=base_url('admin/c_case/padding_case');?>"><?php echo $this->lang->line('Pending_E_Service');?> <span class="badge badge-danger noticount admin"><?php echo casePendingNotification(); ?></span></a>
									 <a href="<?=base_url('admin/c_case/reject_case_list');?>" class="btn btn-danger"><?php echo $this->lang->line('Reject_E_Service_List');?></a>
									 <a href="<?=base_url('admin/c_case/opponent_list');?>" class="btn btn-info"><?php echo $this->lang->line('Opponent_List');?></a> 

                            </div>

                        </div>

               

                    </div>




                    <div class="m_datatable m-datatable m-datatable--default m-datatable--loaded" style="">
						<a href="javascript:;" id="smspopup" class="btn btn-info">Send message</a> 
                        <div class="table-responsive">
                        <table class="lp-theme-table lp-large-theme" id="m_datatable">
                            <thead>
                            <tr class="netTr" style="text-align:left;">
               
                        <th></th>
                        <th class="sortable"><?php echo $this->lang->line('Serial_No');?><img class="sortIcon" src="../../assets/images/img/arrow_up1.svg" height="18px"></th>
						   <th class="sortable"><?php echo $this->lang->line('Name');?><img class="sortIcon" src="../../assets/images/img/arrow_up1.svg" height="18px"></th>
                        <th class="sortable"><?php echo $this->lang->line('identification_number');?><img class="sortIcon" src="../../assets/images/img/arrow_up1.svg" height="18px"></th>
                     
                        <th class="sortable"><?php echo $this->lang->line('Email');?><img class="sortIcon" src="../../assets/images/img/arrow_up1.svg" height="18px"></th>
                        <th class="sortable"><?php echo $this->lang->line('Contact_No');?><img class="sortIcon" src="../../assets/images/img/arrow_up1.svg" height="18px"></th>
                        <th class="sortable"><?php echo $this->lang->line('Created_Date');?><img class="sortIcon" src="../../assets/images/img/arrow_up1.svg" height="18px"></th>
                          <th class="sortable"><?php echo $this->lang->line('Device');?><img class="sortIcon" src="../../assets/images/img/arrow_up1.svg" height="18px"></th>
                        <th></th>
                    
                            </tr>
                            </thead>
                            <tbody>
				<?php $count=1;  $user_id=$this->session->userdata('admin_id'); ?>
                      <?php foreach($all_users as $admin){ ?>
                      <tr class="hide<?php echo $admin['id'] ?>" style="text-align:left;">
                        <td>
						<input type="checkbox" name="sendsms" value="<?php echo $admin['country_code'].$admin['phone']; ?>" id="sendsms"></td>
                        <td><?=sprintf("#%02d", $count++) ?>
						<?php if($admin['is_read'] == 0) { echo "<i class='fa fa-bell' style='color: red;'></i>"; } ?>
						</td>
                        <td><?= $admin['name'] ?></td>
                        <td><?= $admin['id_numbers'] ?></td>
                        <td><?= $admin['email'] ?> </td>
                        <td><?= "(".$admin['country_code'].") ".$admin['phone'] ?></td>
                        <td><?= $admin['created'] ?></td>
                        <td><?php if($admin['device_type'] == 0){ echo "Web"; } if($admin['device_type'] == 1){ echo "Android"; } if($admin['device_type'] == 2){ echo "iOS"; } ?></td>
						<td class="action" style="text-align:left;">
						<a  href="javascript:;" data-user="<?= $user_id; ?>" id="<?= $admin['id'] ?>" class="fa fa-envelope assign_case" title="<?php echo $this->lang->line('Send_Notification');?>"> </a> 
						<?php if($admin['status'] == 1) { ?>
						
						<a href=<?= base_url("admin/admin/block_user/{$admin['id']}") ?> class="fa fa-lock" title="<?php echo $this->lang->line('Block_User');?>" id=<?= $admin['id'] ?>></a>
						<?php } ?>
						<?php if($admin['status'] == 0) { ?>
						<a href=<?= base_url("admin/admin/unblock_user/{$admin['id']}") ?> class="fa fa-unlock"  title="<?php echo $this->lang->line('Un_Block_User');?>" id=<?= $admin['id'] ?>></a>
						<?php } ?>
						<a href=<?= base_url("admin/admin/view_user/{$admin['id']}") ?> title="<?php echo $this->lang->line("View_User");?>" id=<?= $admin['id'] ?>><img src="<?= base_url('assets/images/img/eye-solid.svg') ?>" alt="View" class="img-eye"> </a>
						<a href="javascript:;" class="fa fa-trash delete_case"  title="<?php echo $this->lang->line('Delete_User');?>" id=<?= $admin['id'] ?>> </a>
					</td>
                      </tr>
                    <?php } ?>
                            </tbody>
                        </table>

                       
                    </div>
                        </div>

                </div>
            </div>


        </div>




    </div>

<?php include "footer.php";?>
<script src="<?= base_url('assets/js/ajax.js'); ?>"></script>
<script type="text/javascript">
$("#m_datatable").on("click", ".delete_case", function() {
var id=$(this).attr("id");
var url="<?= base_url('admin/admin/delete_user'); ?>"; 
bootbox.confirm("Are you sure?", function(result){
if(result){
    $.ajax({
    type:'ajax',
    method:'post',
    url:url,
    data:{"id" : id},
    success:function(data){
       $('#msg').show();
         if(data == "true"){ $('.hide'+id).hide(200); $('#msg').html('E-service delete successfully');  } else { $('#msg').addClass('alert-warning'); $('#msg').html(data); }
      },
  });

return true;
}
else
{
$('#msg').show();
	$('#msg').html('delete failed');
}
})
});

$(document).ready(function()
{
  $('#msg').hide();
   $('#customers-table').DataTable();
});


$("#m_datatable").on("click", ".assign_case", function() {
var customers_id=$(this).attr("id");
var send_from=$(this).data("user");

var msg= $('#note_dialog').html();
var url="<?= base_url('admin/admin/send_cust_msg'); ?>"; 
bootbox.confirm('<div class="assignpopup"><textarea placeholder="Write Message" rows="5" name="message" id="message" class="form-control col-md-12"></textarea></div>', function(result){
if(result){

	var  following_employee_id = $('#following_employee_id :selected').val();
	var  message = $('#message').val();
    $.ajax({
    type:'ajax',
    method:'post',
    url:url,
    data:{"customers_id":customers_id,"send_from":send_from,'message':message},
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
	$('#msg').html('Sending Failed');
}
})
});
$(".m_datatable").on("click", "#smspopup", function() {
 var oTable = $('#m_datatable').dataTable();
  var favorite = [];
var rowcollection = oTable.$("#sendsms:checked", {"page": "all"});
rowcollection.each(function(index,elem){
var checkbox_value = $(elem).val();
favorite.push(checkbox_value);
//Do something with 'checkbox_value' 

});
var customers_id = favorite.join(", ");
 if(customers_id == ""){
		$('#msg').show();
		$('#msg').html("Select user to send message");
		return false;
	}
var msg= $('#note_dialog').html();
var url="<?= base_url('admin/admin/send_selceted_msg'); ?>"; 
bootbox.confirm('<div class="assignpopup"><textarea placeholder="Write Message" rows="5" name="messages" id="messages" class="form-control col-md-12"></textarea><span id="msgval" style=" color: red; "></span></div>', function(result){
if(result){
	var  message = $('#messages').val();
	if(message == ""){
		 $('#msgval').html("Message can't empty");
		return false;
	}
    $.ajax({
    type:'ajax',
    method:'post',
    url:url,
    data:{"customers_id":customers_id,'message':message},
    success:function(data){
       $('#msg').show();
         $('#msg').html("SMS send successfully");
      },
  });

return true;
}
else
{
$('#msg').show();
	$('#msg').html('Sending Failed');
}
})
});
$(".sendtoall").on("click", function() {
var customers_id=0;
var send_from=$(this).data("user");

var msg= $('#note_dialog').html();
var url="<?= base_url('admin/admin/send_cust_msg'); ?>"; 
bootbox.confirm('<div class="assignpopup"><textarea placeholder="Write Message" rows="5" name="messagetoall" id="messagetoall" class="form-control col-md-12"></textarea></div>', function(result){
if(result){


	var  messagetoall = $('#messagetoall').val();
    $.ajax({
    type:'ajax',
    method:'post',
    url:url,
    data:{"customers_id":customers_id,"send_from":send_from,'message':messagetoall,'status':'all'},
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
	$('#msg').html('Sending Failed');
}
})
});

$(document).ready(function() {
    var table = $('#m_datatable').DataTable();

    // Move the search bar (filter input)
    var searchInput = $('.dataTables_filter');
    searchInput.detach().prependTo('#custom-search-container');

    // Add placeholder to the search input field
    $('.dataTables_filter input').attr('placeholder', 'Search Client, E-Services........');
});

function updateSortIcons() {
    $(".sortable").each(function () {
        var icon = $(this).find("img.sortIcon");

        if ($(this).hasClass("sorting_desc")) {
            icon.attr("src", "../../assets/images/img/arrow_down1.svg");
        } else if ($(this).hasClass("sorting_asc")) {
            icon.attr("src", "../../assets/images/img/arrow_up1.svg");
        } else {
            icon.attr("src", "../../assets/images/img/unfold_more.svg");
        }
    });
}

// Initial call on page load
$(document).ready(function () {
    updateSortIcons();
});

// If sorting class changes dynamically on click
$(".sortable").click(function () {
    setTimeout(updateSortIcons, 10); // Allow time for sorting class to update before checking
});
</script>
