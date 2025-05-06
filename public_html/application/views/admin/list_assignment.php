<?php
include('header.php');

?>
<style>
    .nav {
        display: -webkit-box;
    }
    .bootbox-confirm .modal-dialog {
    max-width: 500px;
}
</style>

<div class="m-grid__item m-grid__item--fluid m-wrapper">


    <!-- END: Subheader -->
    <div class="m-content">

<div id="msg" class="sufee-alert alert with-close alert-success alert-dismissible fade show success" style="display:none;"></div>
        <!--begin::Portlet-->
        <div class="m-portlet lp-theme-card bg-transparent">
        <div id="custom-search-container"></div>
            <div class="m-portlet__head">
                <div class="m-portlet__head-caption">
                    <!-- <div class="m-portlet__head-title">
                        <h3 class="m-portlet__head-text">
                            <?php echo $this->lang->line('ASSIGNMENT');?>
                        </h3>
                    </div> -->
                    <div class="theme-new-nav-menu">

                    <h3 class="m-portlet__title" style="margin-right: 70px; font-size:24px !important;">
                            <?php echo $this->lang->line('ASSIGNMENT');?>
                        </h3>
                            <!-- <a class="back-link" href="#">
<svg width="16" height="14" viewBox="0 0 16 14" fill="none" xmlns="http://www.w3.org/2000/svg">
<path fill-rule="evenodd" clip-rule="evenodd" d="M7.70679 13.7006C7.51926 13.888 7.26495 13.9934 6.99979 13.9934C6.73462 13.9934 6.48031 13.888 6.29279 13.7006L0.292786 7.70057C0.105315 7.51304 0 7.25874 0 6.99357C0 6.72841 0.105315 6.4741 0.292786 6.28657L6.29279 0.286571C6.48139 0.104413 6.73399 0.00361876 6.99619 0.00589718C7.25838 0.0081756 7.5092 0.113345 7.6946 0.298753C7.88001 0.484161 7.98518 0.734973 7.98746 0.99717C7.98974 1.25937 7.88894 1.51197 7.70679 1.70057L3.41379 5.99357H14.9998C15.265 5.99357 15.5194 6.09893 15.7069 6.28646C15.8944 6.474 15.9998 6.72835 15.9998 6.99357C15.9998 7.25879 15.8944 7.51314 15.7069 7.70068C15.5194 7.88821 15.265 7.99357 14.9998 7.99357H3.41379L7.70679 12.2866C7.89426 12.4741 7.99957 12.7284 7.99957 12.9936C7.99957 13.2587 7.89426 13.513 7.70679 13.7006Z" fill="#333333"/>
</svg>
 Back</a>
                            <ul>
                                <li> <a href="http://lexport.demosbywpsqr.com/admin/c_case/padding_list">Waiting list</a> </li>
                                <li> <a href="http://lexport.demosbywpsqr.com/admin/customer/list_customer">List Customers</a> </li>
                                <li> <a href="http://lexport.demosbywpsqr.com/admin/mission_session/list_mission">Cases</a> </li>
                                <li> <a href="http://lexport.demosbywpsqr.com/admin/mission_writings/list_mission">Writing</a> </li>
                                <li> <a href="http://lexport.demosbywpsqr.com/admin/mission_consultation/list_mission">Consultation</a> </li>
                                <li> <a href="http://lexport.demosbywpsqr.com/admin/mission_visiting/list_mission">Meeting</a> </li>
                                <li> <a href="http://lexport.demosbywpsqr.com/admin/mission_general/list_mission">General</a> </li>
                                <li class="active"> <a href="http://lexport.demosbywpsqr.com/admin/assignment">Assignment</a> </li>
                                <li> <a href="http://lexport.demosbywpsqr.com/admin/archive/list_archive">Archives</a> </li>
                                <li> <a href="http://lexport.demosbywpsqr.com/admin/admin/audio_list">Audio Record</a> </li>
                                <li> <a href="http://lexport.demosbywpsqr.com/admin/admin/list_note">Note List</a> </li>
                            </ul>

                            <a class="btn btn-primary" href="#"> <i class="fa fa-plus"></i> Assign</a> -->
                        </div>
                </div>
            </div>

            <div class="m-portlet__body">
                <ul class="nav nav-tabs" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" data-toggle=" " href="<?=base_url('admin/assignment');?>"><?php echo $this->lang->line('File_assignment');?></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="" href="<?=base_url('admin/assignment/list_assignment_case');?>"><?php echo $this->lang->line('E_Service_assignment');?></a>
                    </li>
					 <li class="nav-item">
                        <a class="nav-link" data-toggle="" href="<?=base_url('admin/assignment/list_send_assignment');?>"><?php echo $this->lang->line('Send_Assignment');?></a>
                    </li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane active" id="m_tabs_3_1" role="tabpanel">

                        <div class="m-portlet__body">
 
                            <div class="m_datatable m-datatable m-datatable--default m-datatable--loaded" style="">

                            <div class="table-responsive">
                                    <table class="lp-theme-table lp-large-theme" id="m_datatable">
                                    <thead>
                                    <tr class="netTr" style="text-align:left;">
                                        <th class="sortable"><?php echo $this->lang->line('Serial_No');?><img class="sortIcon" src="../../assets/images/img/arrow_up1.svg" height="18px"></th>
                                        <th class="sortable"><?php echo $this->lang->line('Name');?><img class="sortIcon" src="../../assets/images/img/arrow_up1.svg" height="18px"></th>
                                        <th class="sortable"><?php echo $this->lang->line('Customer_File_No');?><img class="sortIcon" src="../../assets/images/img/arrow_up1.svg" height="18px"></th>
                                        <th class="sortable"><?php echo $this->lang->line('Assign_Employee_Name');?><img class="sortIcon" src="../../assets/images/img/arrow_up1.svg" height="18px"></th>
                                        <th class="sortable"><?php echo $this->lang->line('Assign_Note');?><img class="sortIcon" src="../../assets/images/img/arrow_up1.svg" height="18px"></th>
                                        <th><?php echo $this->lang->line('ACTION');?></th>
                                    </tr>
                                    </thead>
                                    <tbody>
      <?php $count=1;
                       foreach($list_customer as $list_customer) {   
					?>
                        <tr class="hide<?php echo $list_customer['id'] ?>" style="text-align: left;">
                        <td><?= $count++ ?></td>
                      
                        <td><?= $list_customer['client_name'] ?></td>
						<td><?= $list_customer['client_file_number'] ?></td>
                        <td><?php echo getEmployeeName($list_customer['user_id']); ?></td>
						<td><?= $list_customer['assign_note'] ?></td>           
						<td class="action"><!--$list_customer['id']-->
	 
						
										<a href="<?=base_url("admin/c_case/add_case/{$list_customer['customers_id']}");?>" class="fa fa-plus" title="<?php echo $this->lang->line('ADD_E_SERVICES');?>">
									
										</a>
					
							<a href="<?=base_url("admin/customer/manage/{$list_customer['id']}");?>" class="fa fa-edit" title="<?php echo $this->lang->line('Edit_On_File');?>">
							
							</a>
					
							<a href="<?= base_url("admin/customer/view_customer/{$list_customer['id']}") ?> " class="fa fa-eye" title="<?php echo $this->lang->line('View');?>">
							
							</a>
						
                   
						<?php if($this->session->userdata('role_id') == 1){ ?>
				 
                       
							<a href="javascript:;" class="fa fa-trash delete_customer" title="<?php echo $this->lang->line("Delete_Customer");?>" id="<?=$list_customer['id']?>">
							
							</a>
							
						<?php } ?>
						<?php if($this->session->userdata('role_id') == 1){ ?>
							<a  href="javascript:;" data-user="<?= $list_customer['id'] ?>" data-convert_from_id="<?= $list_customer['user_id'] ?>" data-convert_from="<?php if($list_customer['user_id'] != 0) echo getEmployeeName($list_customer['user_id']); ?>" id="<?= $list_customer['id'] ?>"  class="fa fa-refresh convert_case" title="<?php echo $this->lang->line('Convert_Customer');?>"  >
						
							</a>
						<?php  } ?> 

                 
                                          
								</td>

								</tr>

								<?php  }?>



                                    </tbody>
                                </table>
 
                            </div>


                        </div>

                    </div>
                  
                            </div>
                        </div>

                    </div>
                </div>

            </div>

        </div>



<?php

include('footer.php');

?>

<style>
    .modal .modal-content .modal-header .close:before {
        content: "X";
        font-family: arial;
    }
    .modal .modal-content {
        background: #ffffff;
    }
</style>
 <script>

$("#m_datatable").on("click", ".convert_case", function() {
var id=$(this).attr("id");
var convert_from=$(this).data("convert_from");
var convert_from_id=$(this).data("convert_from_id");

var msg= $('#note_dialog').html();
var url="<?= base_url('admin/assignment/convert_file_assignment'); ?>";  
bootbox.confirm('<div class="assignpopup"><p><b>Current Employee: </b>'+convert_from+'</p><br><select class="form-control" id="eid" name="eid"><option>Convert To</option><?php  foreach ($employees as $employee) { ?><option value="<?php echo $employee["id"]?>"><?php echo $employee["name"]?></option><?php } ?></select><br><select class="form-control" id="reason" name="reason"><option>Reason to convert</option><option value="Passing the date">Passing the date</option><option value="Unsuffienet time">Unsuffienet time</option></select><br><textarea placeholder="Notes" name="note" id="notes" class="form-control col-md-12"></textarea></div>', function(result){
if(result){
	var  eid = $('#eid :selected').val();  
	var  reason = $('#reason :selected').val();
	var  notes = $('#notes').val();

    $.ajax({
    type:'ajax',
    method:'post',
    url:url,
    data:{"id" : id,"convert_from_id" : convert_from_id,'eid':eid,'reason':reason,'notes':notes,},
    success:function(data){
       $('#msg').show();
	   //alert(data);
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

$(function(){
//$('.assign_case').click(function(){
$("#m_datatable").on("click", ".assign_case", function() {
var id=$(this).attr("id");
var msg= $('#note_dialog').html();
var url="<?= base_url('admin/customer/assign_customer'); ?>"; 
bootbox.confirm('<textarea name="nnote" class="form-control" placeholder="Not"  id="nnote"></textarea> <br><select class="form-control" id="employee_id" name="user_id"><option>Select employee </option><?php  foreach ($employees as$employee) { ?><option value="<?php echo $employee["id"]?>"><?php echo $employee["name"]?></option><?php } ?></select>', function(result){
if(result){ 	 var nnote=$('#nnote').val();
	var  empid = $('#employee_id :selected').val();
    $.ajax({
    type:'ajax',
    method:'post',
    url:url,
    data:{"id" : id,'empid':empid, "nnote":nnote},
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
});
</script>
 <script type="text/javascript">
$("#m_datatable").on("click", ".delete_customer", function() {
  var id=$(this).attr("id");
  var url="<?=base_url('admin/customer/delete_customer');?>";
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