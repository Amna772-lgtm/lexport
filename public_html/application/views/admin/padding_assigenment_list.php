<?php
include('header.php');

?>
<style>
    .nav {
        display: -webkit-box;
    }
</style>

<div class="m-grid__item m-grid__item--fluid m-wrapper">


    <!-- END: Subheader -->
    <div class="m-content">

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
                        <a class="nav-link " data-toggle=" " href="<?=base_url('admin/assignment');?>"><?php echo $this->lang->line('File_assignment');?></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" data-toggle="" href="<?=base_url('admin/assignment/list_assignment_case');?>"><?php echo $this->lang->line('E_Service_assignment');?></a>
                    </li>
                </ul>
                <div class="tab-content" style="padding: 0;">
                     <ul class="nav nav-tabs" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link " data-toggle=" " href="<?=base_url('admin/assignment/list_assignment_case');?>" data-target="#m_tabs_1_1"><?php echo $this->lang->line('All');?></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle=" " href="<?=base_url('admin/assignment/list_responsible_employee');?>" data-target="#m_tabs_1_2"><?php echo $this->lang->line('Responsible_Employee');?></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle=" " href="<?=base_url('admin/assignment/list_following_employee');?>" data-target="#m_tabs_1_3"><?php echo $this->lang->line('Following_Employee');?></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link active" data-toggle=" " href="<?=base_url('admin/assignment/padding_assigenment_list');?>" data-target="#m_tabs_1_4"><?php echo $this->lang->line('Pending_Assignment');?></a>
                            </li>
                        </ul>
                            <div class="tab-pane active" id="m_tabs_1_4" role="tabpanel">
                                <div class="m-portlet__body">
 

                                    <div class="m_datatable m-datatable m-datatable--default m-datatable--loaded" style="">

                                    <div class="table-responsive">
                                    <table class="lp-theme-table lp-large-theme" id="m_datatable">
                                                <thead>
                                                <tr class="netTr" style="text-align:left;">
                                                    <th class="sortable"><?php echo $this->lang->line('Serial_No');?><img class="sortIcon" src="../../assets/images/img/arrow_up1.svg" height="18px"></th>
                                                    <th class="sortable"><?php echo $this->lang->line('Name');?><img class="sortIcon" src="../../assets/images/img/arrow_up1.svg" height="18px"></th>
                                                    <th class="sortable"><?php echo $this->lang->line('client_File_number');?><img class="sortIcon" src="../../assets/images/img/arrow_up1.svg" height="18px"></th>
                                                    <th class="sortable"><?php echo $this->lang->line('E_Service_Number');?><img class="sortIcon" src="../../assets/images/img/arrow_up1.svg" height="18px"></th>
                                                    <th class="sortable"><?php echo $this->lang->line('Date');?><img class="sortIcon" src="../../assets/images/img/arrow_up1.svg" height="18px"></th>
                                                   <th><?php echo $this->lang->line('ACTION');?></th>
                                                </tr>
                                                </thead>
                                                <tbody>


                                                	<?php $i=0; foreach ($list as $case){ $i++;?>
						  <tr class="hide<?php echo $case['id'] ?>" style="text-align: left;">
							<td><?= $i; ?></td>
							<td><?= $case['client_name'] ?></td>
							<td><?= $case['client_file_number'] ?> </td>
							<td><?= $case['case_number'] ?></td>
							<td><?= $case['case_date']; echo getTheDayFromDate($appoinment['case_date']);?></td>
							<!--<td><span class='countdown' style=" color: #0e8a00; font-weight: bold; " value='<?php echo mission_due_time($appoinment['session_end_date'],$appoinment['session_end_time']);?>' data-countdown='<?php echo mission_due_time($case['ending_date'],$case['ending_time']);?>'></span></td>-->
							<td class="action">
							
							<a href="<?php echo base_url("admin/c_case/view_case/{$case['case_id']}"); ?>" class="fa fa-eye" title="<?php echo $this->lang->line('View');?>">
							
							</a>
							
							<a href="<?php echo base_url("admin/c_case/approve_case/{$case['case_id']}"); ?>" class="fa fa-check" title="<?php echo $this->lang->line('Approve');?>">
							
							</a>
							<?php  

							if($case['is_reject'] == '0'){
							?>
							<a href="javascript:;" id="<?= $case['case_id'] ?>" class="fa fa-close reject_case" title="<?php echo $this->lang->line('Reject');?>">	</a>
							<?php
							} else {
							?>
							<a href="javascript:;" class="fa fa-bend" title="<?php echo $this->lang->line('Reject');?>"></a>
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
                            </div>
                        </div>

                    </div>
                </div>

            </div>

        </div>


    </div>



<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <div class="modal-body">
        <select class="form-control" id="type" name="type">
           <option value=""><?php echo $this->lang->line('Select_Mission');?></option> 
           <option value="1"><?php echo $this->lang->line('Session');?></option> 
           <option value="2"><?php echo $this->lang->line('Visiting');?></option> 
           <option value="3"><?php echo $this->lang->line('Writings');?></option> 
           <option value="4"><?php echo $this->lang->line('Consultation');?></option> 
           <option value="5"><?php echo $this->lang->line('GENERAL');?></option> 
        </select>
        <input type="hidden" value="" id="case_id" name="case_id">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal"><?php echo $this->lang->line('Close');?></button>
      </div>
    </div>

  </div>
</div>

<div id="note_dialog"></div>
<style>
.assignpopup .form-control {
    float: left;
    margin: 5px 0px;
}
</style>
<?php include "footer.php";?>
 <script type="text/javascript">
$(document).ready(function() {
	$('#msg').hide();

});
</script>
<script type="text/javascript">

$("#m_datatable").on("click", ".convert_case", function() {
var id=$(this).attr("id");
var case_id=$(this).data("user");

var msg= $('#note_dialog').html();
var url="<?= base_url('admin/assignment/convert_assignment'); ?>";  
bootbox.confirm('<div class="assignpopup"><?php if($this->session->userdata('role_id') == 1){ ?> <select class="form-control" id="employee_id" name="employee_id"><option>Select Responsible employee </option><?php  foreach ($employees as $employee) { ?><option value="<?php echo $employee["id"]?>"><?php echo $employee["name"]?></option><?php } ?></select> <?php } ?><select class="form-control" id="eid" name="eid"><option>Select Following Employee </option><?php  foreach ($employees as $employee) { ?><option value="<?php echo $employee["id"]?>"><?php echo $employee["name"]?></option><?php } ?></select><select class="form-control" id="reason" name="reason"><option>Reason to convert</option><option value="Passing the date">Passing the date</option><option value="Unsuffienet time">Unsuffienet time</option></select><textarea placeholder="Notes" name="note" id="notes" class="form-control col-md-12"></textarea></div>', function(result){
if(result){
	var  empid = $('#employee_id :selected').val();
	var  eid = $('#eid :selected').val();  
	var  reason = $('#reason :selected').val();
	var  notes = $('#notes').val();

    $.ajax({
    type:'ajax',
    method:'post',
    url:url,
    data:{"id" : id,"case_id" : case_id,'empid':empid,'eid':eid,'reason':reason,'notes':notes,},
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


$(".assign_type").on("click", function() {
    var id=$(this).attr("id");
    $('#case_id').val(id);
})

$('#type').on('change',function(){

  var type_val = $('#type').val();
  var case_id = $('#case_id').val();
  
  if(type_val == 1)
  {
    window.location.href = "<?php echo base_url('admin/mission_session/add_mission'); ?>/"+case_id;
  }else if(type_val == 2)
  {
    window.location.href = "<?php echo base_url('admin/mission_visiting/add_mission'); ?>/"+case_id;
  }
  else if(type_val == 3)
  {
    window.location.href = "<?php echo base_url('admin/mission_writings/add_mission'); ?>/"+case_id;
  } else if(type_val == 5)
  {
    window.location.href = "<?php echo base_url('admin/mission_general/add_mission'); ?>/"+case_id;
  }else
  {
    window.location.href = "<?php echo base_url('admin/mission_consultation/add_mission'); ?>/"+case_id;
  }
})



$("#m_datatable").on("click", ".assign_case", function() {
var id=$(this).attr("id");
var customers_id=$(this).data("user");

var msg= $('#note_dialog').html();
var url="<?= base_url('admin/assignment/update_assign_case'); ?>"; 
bootbox.confirm('<div class="assignpopup"><select class="form-control" id="following_employee_id" name="following_employee_id"><option>Select Following Employee </option><?php  foreach ($employees as $employee) { ?><option value="<?php echo $employee["id"]?>"><?php echo $employee["name"]?></option><?php } ?></select><textarea placeholder="Notes" name="note" id="notes" class="form-control col-md-12"></textarea></div>', function(result){
if(result){

	var  following_employee_id = $('#following_employee_id :selected').val();
	var  notes = $('#notes').val();
    $.ajax({
    type:'ajax',
    method:'post',
    url:url,
    data:{"id":id,"customers_id":customers_id,'following_employee_id':following_employee_id,'notes':notes},
    success:function(data){
       $('#msg').show();
	   alert(data);
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
 $(document).on("click", ".modal-body", function () {
$('#start_date, #end_date').datetimepicker({  format: 'yyyy-mm-dd',  minView: 2, pickTime: false, autoclose: true,startDate: new Date()});
  $("#start_time,#end_time").datetimepicker({
    pickDate: false,
    minuteStep: 15,
    pickerPosition: 'bottom-right',
    format: 'HH:ii p',
    autoclose: true,
    showMeridian: true,
    startView: 1,
    maxView: 1,
  });
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
<style>
    .modal .modal-content .modal-header .close:before {
        content: "X";
        font-family: arial;
    }
    .modal .modal-content {
        background: #ffffff;
    }
</style> 