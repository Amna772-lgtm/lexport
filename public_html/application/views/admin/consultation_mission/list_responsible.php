<?php include __DIR__ . "/../header.php"; $control="mission_consultation";?>
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
                    <div class="m-portlet__head-title">
                        <h3 class="m-portlet__head-text">
                            <?php echo $this->lang->line('Consultation');?>
                        </h3>
                    </div>
                    <div class="theme-new-nav-menu">
                            <a class="back-link" href="#">
<svg width="16" height="14" viewBox="0 0 16 14" fill="none" xmlns="http://www.w3.org/2000/svg">
<path fill-rule="evenodd" clip-rule="evenodd" d="M7.70679 13.7006C7.51926 13.888 7.26495 13.9934 6.99979 13.9934C6.73462 13.9934 6.48031 13.888 6.29279 13.7006L0.292786 7.70057C0.105315 7.51304 0 7.25874 0 6.99357C0 6.72841 0.105315 6.4741 0.292786 6.28657L6.29279 0.286571C6.48139 0.104413 6.73399 0.00361876 6.99619 0.00589718C7.25838 0.0081756 7.5092 0.113345 7.6946 0.298753C7.88001 0.484161 7.98518 0.734973 7.98746 0.99717C7.98974 1.25937 7.88894 1.51197 7.70679 1.70057L3.41379 5.99357H14.9998C15.265 5.99357 15.5194 6.09893 15.7069 6.28646C15.8944 6.474 15.9998 6.72835 15.9998 6.99357C15.9998 7.25879 15.8944 7.51314 15.7069 7.70068C15.5194 7.88821 15.265 7.99357 14.9998 7.99357H3.41379L7.70679 12.2866C7.89426 12.4741 7.99957 12.7284 7.99957 12.9936C7.99957 13.2587 7.89426 13.513 7.70679 13.7006Z" fill="#333333"/>
</svg>
 Back</a>
                            <ul>
                                <li> <a href="http://lexport.demosbywpsqr.com/admin/c_case/padding_list">Waiting list</a> </li>
                                <li> <a href="http://lexport.demosbywpsqr.com/admin/customer/list_customer">List Customers</a> </li>
                                <li> <a href="http://lexport.demosbywpsqr.com/admin/mission_session/list_mission">Cases</a> </li>
                                <li> <a href="http://lexport.demosbywpsqr.com/admin/mission_writings/list_mission">Writing</a> </li>
                                <li class="active"> <a href="http://lexport.demosbywpsqr.com/admin/mission_consultation/list_mission">Consultation</a> </li>
                                <li> <a href="http://lexport.demosbywpsqr.com/admin/mission_visiting/list_mission">Meeting</a> </li>
                                <li> <a href="http://lexport.demosbywpsqr.com/admin/mission_general/list_mission">General</a> </li>
                                <li> <a href="http://lexport.demosbywpsqr.com/admin/assignment">Assignment</a> </li>
                                <li> <a href="http://lexport.demosbywpsqr.com/admin/archive/list_archive">Archives</a> </li>
                                <li> <a href="http://lexport.demosbywpsqr.com/admin/admin/audio_list">Audio Record</a> </li>
                                <li> <a href="http://lexport.demosbywpsqr.com/admin/admin/list_note">Note List</a> </li>
                            </ul>

                            <a class="btn btn-primary" href="#"> <i class="fa fa-plus"></i> Assign</a>
                        </div>
                </div>
            </div>

            <div class="m-portlet__body">

                <!-- SUb -->
					<?php 
					if($this->uri->segment(4)){ 
					    $subid = $this->uri->segment(4);
					} else {
					     $subid ='';
					}
					?>
					<!-- Sub --><ul class="nav nav-tabs" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link <?php if($this->uri->segment(3) == "list_mission") echo "active";?>" data-toggle="" href="<?=base_url("admin/$control/list_mission/$subid");?>" data-target="#m_tabs_1_1"><?php echo $this->lang->line('All');?></a>
                    </li> 
					<li class="nav-item">
                        <a class="nav-link <?php if($this->uri->segment(3) == "list_responsible") echo "active";?>" data-toggle="" href="<?=base_url("admin/$control/list_responsible/$subid");?>" data-target="#m_tabs_1_1"><?php echo $this->lang->line('Responsible_Employee');?> <span class="num_tab"><?php echo ResponsibleNotification('consultation_mission'); ?></span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php if($this->uri->segment(3) == "list_follow_up") echo "active";?>" data-toggle="" href="<?=base_url("admin/$control/list_follow_up/$subid");?>" data-target="#m_tabs_1_2"><?php echo $this->lang->line('Following_Employee');?> <span class="num_tab"><?php echo FollowNotification('consultation_mission'); ?></span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php if($this->uri->segment(3) == "list_pending_misssion") echo "active";?>" data-toggle="" href="<?=base_url("admin/$control/list_pending_misssion/$subid");?>" data-target="#m_tabs_1_3"><?php echo $this->lang->line('Pending');?> <span class="num_tab"><?php echo PendingNotification('consultation_mission'); ?></span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php if($this->uri->segment(3) == "list_close_mission") echo "active";?>" data-toggle="" href="<?=base_url("admin/$control/list_close_mission/$subid");?>" data-target="#m_tabs_1_4"><?php echo $this->lang->line('Close_Mission');?> <span class="num_tab"><?php echo CloseNotification('consultation_mission'); ?></span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php if($this->uri->segment(3) == "list_review") echo "active";?>" data-toggle="" href="<?=base_url("admin/$control/list_review/$subid");?>" data-target="#m_tabs_1_5"><?php echo $this->lang->line('In_Review');?> <span class="num_tab"><?php echo ReviewNotification('consultation_mission'); ?></span></a>
                    </li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane active" id="m_tabs_1_1" role="tabpanel">
                        <div class="m-portlet__body">
                            <div id="msg" class="sufee-alert alert with-close alert-success alert-dismissible fade show success" style="display:none;"></div>
                            <div class="m_datatable m-datatable m-datatable--default m-datatable--loaded" style="">

                            <div class="table-responsive">
                                    <table class="lp-theme-table lp-large-theme" id="m_datatable">
                                        <thead>
                                       <tr class="netTr">
					<th><?php echo $this->lang->line('SR_NO');?></th>
					<th><?php echo $this->lang->line('File_Number');?></th>
					<th><?php echo $this->lang->line('Client_Type');?></th>
					<th><?php echo $this->lang->line('Client_Name');?></th>
					<th><?php echo $this->lang->line('E_Service_Number');?></th>
					   <!-- sub -->
                    <?php if(empty($this->uri->segment(4))){ ?>
                    <th><?php echo $this->lang->line('Sub_Mission');?> <br><i class="fa fa-arrow-up" style="font-size: 10px;font-weight: normal"></i><i class="fa fa-arrow-down" style="font-size: 10px;font-weight: normal"></i></th>
                	<?php } ?>
					<th><?php echo $this->lang->line('Consultation_Type');?></th>
					<th><?php echo $this->lang->line('Subject');?></th>		
					<th><?php echo $this->lang->line('Responsible_Employee');?></th>
					<th><?php echo $this->lang->line('End_Date');?></th>
					<th><?php echo $this->lang->line('End_Time');?></th> 
					<th><?php echo $this->lang->line('Due_Time');?></th>
					<th><?php echo $this->lang->line('ACTION');?></th>
                                        </tr>
                                        </thead>
                                        <tbody>
            <?php 
              $count=1;
              foreach($data as $appoinment){  ?>
				<tr class="hide<?php echo $appoinment['id'] ?>">
                 <td>
                     <?php  
		if($this->session->userdata('role_id') == 1){
			if($appoinment['read_admin'] == 0) echo "<i class='fa fa-dot-circle-o singnoti'></i>"; echo $count++; 
        } else if(in_array($this->session->userdata('admin_id'),getFileManager())){
			if($appoinment['read_manager'] == 0) echo "<i class='fa fa-dot-circle-o singnoti'></i>"; echo $count++; 
        } 
        else { 
			if($appoinment['read_follow'] == 0){ echo "<i class='fa fa-dot-circle-o singnoti'></i>"; echo $count++; } else {
			if($appoinment['read_response'] == 0) echo "<i class='fa fa-dot-circle-o singnoti'></i>"; echo $count++; }
		}
 
		?>
                     
                 </td>
                <td><?= $appoinment['client_file_number'] ?></td>
				<td><?php   $row = $this->db->select('*')->where('client_file_number',$appoinment['client_file_number'])->get('customers')->row();   if($row){ echo $row->type_of_customer; }?></td>
                <td><?= $appoinment['client_name']; ?></td>
                <td><?= $appoinment['case_number']; ?></td>
				<!-- sub -->
			    <?php if(empty($this->uri->segment(4))){ ?>
			    <td><a href="https://albarakatilaw.com/admin/mission_consultation/list_mission/<?php echo $appoinment['id'] ?>" class="num_tab" style="background-color: green;"><?php echo	getMissionCount( $appoinment['id'],"consultation_mission"); ?></a> </td>
				<?php  } ?>
				<!-- sub -->
            <td><?= $appoinment['consultation_type']; ?></td>
            <td><?= $appoinment['subject'] ?></td>
	<td><?php echo getEmployeeName($appoinment['responsible_employee']); ?></td>
                <td><span class='hidetd'><?php echo getdateforshorting($appoinment['session_end_date']); ?></span><?php echo getTheDayAndDateFromDatePan($appoinment['session_end_date']); ?></td>
                <td><?= $appoinment['session_end_time'] ?></td>
 
				<td><span class='countdown' style=" color: #0e8a00; font-weight: bold; " value='<?php echo mission_due_time($appoinment['session_end_date'],$appoinment['session_end_time']);?>' data-countdown='<?php echo mission_due_time($appoinment['session_end_date'],$appoinment['session_end_time']);?>'></span></td>

		       		            <td class="action">
					<span style="overflow: visible; position: relative;"> 
					<?php if( isset($datas[4][1]) && $datas[4][1] == 1 ){ ?>
					<a href="<?= base_url("admin/$control/find_mission/{$appoinment['id']}") ?>" class="m-portlet__nav-link btn m-btn m-btn--hover-warning m-btn--icon m-btn--icon-only m-btn--pill" title="<?php echo $this->lang->line('Edit');?>">
					<i class="fa fa-edit"></i>
					</a>
                <?php  } ?>
				    <?php if( isset($datas[4][2]) && $datas[4][2] == 1 ){ ?>
                    
					<a href="javascript:;" class="m-portlet__nav-link btn m-btn m-btn--hover-warning m-btn--icon m-btn--icon-only m-btn--pill delete_appoinment"  id="<?= $appoinment['id'] ?>" title="<?php echo $this->lang->line('Delete');?>">
					<i class="fa fa-trash"></i>
					</a>
					 <?php  } ?>
					  
				<?php if(isset($datas[4][3]) && $datas[4][3] == 1) { ?>
					<a href="<?= base_url("admin/$control/view_mission/{$appoinment['id']}") ?>" class="m-portlet__nav-link btn m-btn m-btn--hover-danger m-btn--icon m-btn--icon-only m-btn--pill" title="<?php echo $this->lang->line('View');?>">
					<i class="fa fa-eye"></i>
					</a>
				<?php } ?>
					</span>
					<?php if(isset($datas[4][4]) && $datas[4][4] == 1) { ?>
					<span style="overflow: visible; position: relative;">
					<a href="javascript:;" data-user="<?= $appoinment['case_id'] ?>" id="<?= $appoinment['id'] ?>"  class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill convert_case" title="<?php echo $this->lang->line('Convert_Case');?>">
					<i class="fa fa-refresh"></i>
					</a>
					</span>
					 <?php  } ?>
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
            </div>

        </div>


    </div>

</div>
 
<?php include __DIR__ . "/../footer.php"; ?>
<script type="text/javascript">
$("#m_datatable").on("click", ".convert_case", function() {
var id=$(this).attr("id");
var case_id=$(this).data("user");

var msg= $('#note_dialog').html();
var url="<?= base_url("admin/appoinment/convert_mission"); ?>";  
bootbox.confirm('<div class="assignpopup"><select class="form-control" id="eid" name="eid"><option>Select Following Employee </option><?php  foreach ($employees as $employee) { ?><option value="<?php echo $employee["id"]?>"><?php echo $employee["name"]?></option><?php } ?></select><select class="form-control" id="reason" name="reason"><option>Reason to convert</option><option value="Passing the date">Passing the date</option><option value="Unsuffienet time">Unsuffienet time</option></select><textarea placeholder="Notes" name="note" id="notes" class="form-control col-md-12"></textarea></div>', function(result){
if(result){
	var  empid = $('#employee_id :selected').val();
	var  eid = $('#eid :selected').val();  
	var  reason = $('#reason :selected').val();
	var  notes = $('#notes').val();

    $.ajax({
    type:'ajax',
    method:'post',
    url:url,
    data:{"id" : id,"case_id" : case_id,'empid':empid,'eid':eid,'reason':reason,'notes':notes,'type':'consultation',},
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
	$('#msg').html('Convert Failed');
}
})
});
  <?php if(isset($datas[3][3]) && $datas[3][3] == 1){?>
    $('.dataTables_filter').show();
  <?php }else{?>
    $('.dataTables_filter').hide();
  <?php } ?>

  $(document).ready(function()
  {
    $('#msg').hide();
    $('#customers-table').DataTable();
  });

$("#m_datatable").on("click", ".delete_appoinment", function() {
    
    var id=$(this).attr("id");

    var url="<?= base_url("admin/$control/delete_mission"); ?>"; 
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
 
