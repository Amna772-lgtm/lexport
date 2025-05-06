<?php
include('header.php');

?>

    <style>
        .m-form.m-form--group-seperator-dashed .m-form__group {
            border-bottom: 0px dashed #ebedf2;
        }
        .thh h3{
            background: #1F3958;
            color: #fff;
            font-weight: bold;
            font-size: 15px;
            text-transform: uppercase;
            padding: 10px 10px 10px 29px;
            -webkit-border-top-left-radius: 20px !important;
            -webkit-border-top-right-radius: 20px !important;
            -moz-border-radius-topleft: 20px !important;
            -moz-border-radius-topright: 20px !important;
            border-top-left-radius: 20px !important;
            border-top-right-radius: 20px !important;
            margin: 15px 15px 0 15px;
        }
        .in_fo{
            box-shadow: 0px 5px 10px 0px #cccccc !important;
            margin: 0 15px;
            padding-bottom: 20px;
            -webkit-border-bottom-right-radius: 20px;
            -webkit-border-bottom-left-radius: 20px;
            -moz-border-radius-bottomright: 20px;
            -moz-border-radius-bottomleft: 20px;
            border-bottom-right-radius: 20px;
            border-bottom-left-radius: 20px;
        }
        .m-form.m-form--group-seperator-dashed .m-form__group {
            border-bottom: 0px dashed #ebedf2;
            padding-bottom: 0;
            padding-top: 10px;
        }
        .m-portlet .m-form.m-form--fit > .m-portlet__body {
            padding-bottom: 40px !important;
        }
        .nav {
            display: -webkit-box;
        }
        .m-portlet {
            margin-bottom: 0;
        }
        .m-widget4 .m-widget4__item .m-widget4__info {
            width: 97.2%;
        }
		.m-body .m-content {
    padding: 29px 45px;
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
                                <?php echo $this->lang->line('Block_List');?>
                            </h3>
                        </div> -->
                        <div class="theme-new-nav-menu">
                          
                            <ul style="gap:30px;">
                                <li> <a href="http://lexport.demosbywpsqr.com/admin/customer/list_customer"><?php echo $this->lang->line('All_Clients')?></a> </li>
                                <li class="active"> <a href="http://lexport.demosbywpsqr.com/admin/admin/block_list"><?php echo $this->lang->line('Blocked_Clients')?></a> </li>
                                <!-- <li> <a href="http://lexport.demosbywpsqr.com/admin/action_log">Log Information</a> </li>
								<li> <a href="http://lexport.demosbywpsqr.com/admin/admin/change_pass">Reset Password</a> </li>
								<li> <a href="http://lexport.demosbywpsqr.com/admin/services/services">E-Service Name</a> </li>
								<li> <a href="http://lexport.demosbywpsqr.com/admin/admin/case_type">E-Service Type</a> </li>
								<li> <a href="http://lexport.demosbywpsqr.com/admin/admin/task_type">Task Type</a> </li>
								<li> <a href="http://lexport.demosbywpsqr.com/admin/admin/consultation_type">Consultation Type</a> </li>
								<li> <a href="http://lexport.demosbywpsqr.com/admin/admin/writing_type">Writing Type</a> </li>
								<li> <a href="http://lexport.demosbywpsqr.com/admin/admin/fine_type">Fine Type</a> </li>
								<li> <a href="http://lexport.demosbywpsqr.com/admin/admin/add_group">Add Group</a> </li>
								<li> <a href="http://lexport.demosbywpsqr.com/admin/admin/department_type">Department Type</a> </li>
								<li> <a href="http://lexport.demosbywpsqr.com/admin/admin/employee_type">Employee Type</a> </li>
								<li> <a href="http://lexport.demosbywpsqr.com/admin/admin/hr_eservice_type">HR E-Service Type</a> </li>
								<li> <a href="http://lexport.demosbywpsqr.com/admin/admin/project_type">Project Type</a> </li>
								<li> <a href="http://lexport.demosbywpsqr.com/admin/admin/list_judge">Judge</a> </li>
								<li> <a href="http://lexport.demosbywpsqr.com/admin/admin/court_master">Court</a> </li>
								<li> <a href="http://lexport.demosbywpsqr.com/admin/admin/branch">Branch List</a> </li>
								<li> <a href="http://lexport.demosbywpsqr.com/admin/admin/city">Cities List</a> </li>
								<li class="active"> <a href="http://lexport.demosbywpsqr.com/admin/admin/block_list">Block List</a> </li>
								<li> <a href="http://lexport.demosbywpsqr.com/admin/admin/marketing_banner">Marketing Banner</a> </li>
								<li> <a href="http://lexport.demosbywpsqr.com/admin/permission/add_permission">Permission</a> </li>
								<li> <a href="http://lexport.demosbywpsqr.com/admin/admin/chat">Support Chat</a> </li>
								<li> <a href="http://lexport.demosbywpsqr.com/admin/admin/send_notification">Send Notification</a> </li> -->
                            </ul>
                            <a class="btn btn-primary" href="http://lexport.demosbywpsqr.com/admin/customer/manage/0"> <i class="fa fa-plus"></i><?php echo $this->lang->line('Add_New_Client')?></a>

                        </div>
                    </div>
                </div>
 
                <div class="m-portlet__body theme-inner-form"> 
                    
 
	  <?php echo isset($_GET['infosuccess'])?'<div id="msg" class="sufee-alert alert with-close alert-success alert-dismissible fade show success">User Un-Block Successfully</div>':''; ?>
	  <div class="table-responsive transparent-table">
                                    <table class="lp-theme-table lp-large-theme" id="m_datatable">
			<thead>
			  <tr class="netTr" style="text-align:left">
				 <th class="sortable"><?php echo $this->lang->line('Serial_No');?>
                 <img class="sortIcon" src="../../assets/images/img/unfold_more.svg" height="18px">
                </th>
				<th class="sortable"><?php echo $this->lang->line('Name');?>
                <img class="sortIcon" src="../../assets/images/img/unfold_more.svg" height="18px">
            </th>
				<th class="sortable"><?php echo $this->lang->line('City');?>
                <img class="sortIcon" src="../../assets/images/img/unfold_more.svg" height="18px">
            </th>
				<th class="sortable"><?php echo $this->lang->line('ID_Number');?>
                <img class="sortIcon" src="../../assets/images/img/unfold_more.svg" height="18px">
            </th>
				<th class="sortable"><?php echo $this->lang->line('Contact_No');?>
                <img class="sortIcon" src="../../assets/images/img/unfold_more.svg" height="18px">
            </th>
				<th class="sortable"><?php echo $this->lang->line('User_Type');?>
                <img class="sortIcon" src="../../assets/images/img/unfold_more.svg" height="18px">
            </th>
				<th class="sortable"><?php echo $this->lang->line('Create_Date');?>
                <img class="sortIcon" src="../../assets/images/img/unfold_more.svg" height="18px">
            </th>
				<th></th>
			  </tr>
			</thead>
			<tbody>
			 <?php $count=1;?>
                      <?php foreach($list as $admin){ ?>
                      <tr class="hide<?php echo $admin['id'] ?>" style="text-align:left">
                      <?php $serial_number = sprintf("#%02d", $count++); ?>
                      <td data-sort="<?= $count - 1 ?>"><?= $serial_number ?></td>
                        <td><?= $admin['name'] ?></td>
                        <td><?= $admin['city'] ?> </td>
                        <td><?= $admin['id_numbers'] ?> </td>
                        <td><?= $admin['phone'] ?></td>
                        <td><?php if($admin['role_id'] == '1'){ echo "Admin"; }  if($admin['role_id'] == '2'){ echo "Employee"; } if($admin['role_id'] == '3'){ echo "Customer"; } ?></td>
                        <td><?= $admin['created'] ?></td>
				<td class="">
					<a href=<?= base_url("admin/admin/unblock_user/{$admin['id']}") ?> class="btn btn-success editadmin" id=<?= $admin['id'] ?>><i class="fa fa-unlock"></i> <?php echo $this->lang->line('Un_Block');?></a>
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
            


<?php

include('footer.php');
?>

<script src="<?= base_url('assets/js/ajax.js'); ?>"></script>
<script type="text/javascript">

$(document).ready(function()
{
   $('#customers-table').DataTable();
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
