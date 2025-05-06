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
        .bootbox-confirm .modal-dialog {
            max-width: 500px;
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
                                <?php echo $this->lang->line('Task_Type');?>
                            </h3>
                        </div> -->
                        <div class="theme-new-nav-menu">
                            <h3 class="m-portlet__title" style="margin-right: 70px; font-size:24px !important;">
                                <?php echo $this->lang->line('Tasks');?>
                            </h3>
                            <!-- <ul>
                                <li> <a href="http://lexport.demosbywpsqr.com/admin/action_log">Log Information</a> </li>
								<li> <a href="http://lexport.demosbywpsqr.com/admin/admin/change_pass">Reset Password</a> </li>
								<li> <a href="http://lexport.demosbywpsqr.com/admin/services/services">E-Service Name</a> </li>
								<li> <a href="http://lexport.demosbywpsqr.com/admin/admin/case_type">E-Service Type</a> </li>
								<li class="active"> <a href="http://lexport.demosbywpsqr.com/admin/admin/task_type">Task Type</a> </li>
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
								<li> <a href="http://lexport.demosbywpsqr.com/admin/admin/block_list">Block List</a> </li>
								<li> <a href="http://lexport.demosbywpsqr.com/admin/admin/marketing_banner">Marketing Banner</a> </li>
								<li> <a href="http://lexport.demosbywpsqr.com/admin/permission/add_permission">Permission</a> </li>
								<li> <a href="http://lexport.demosbywpsqr.com/admin/admin/chat">Support Chat</a> </li>
								<li> <a href="http://lexport.demosbywpsqr.com/admin/admin/send_notification">Send Notification</a> </li>
                            </ul> -->

                        </div>
                    </div>
                </div>


             

                <!--begin::Form-->
	<div class="m-form m-form--fit m-form--label-align-right m-form--group-seperator-dashed">
    <div class="m-portlet__body theme-inner-form"> <div class="form-group m-form__group row">

    <div class="col-lg-12">
                        <div class="form-field-container">
                        <?php echo form_open('admin/admin/add_task_type',['id'=>'branch']); 
			if($data)
			{
				 echo form_hidden('id',$data->id); 
			}
			else
			{
				 echo form_hidden('id',''); 
			}
		?>
		<h3>
	<?php  if($data){ ?>
				<?php echo $this->lang->line('Edit_Task_Type');?>
	<?php	} else { ?>
				<?php echo $this->lang->line('ADD_TASK_TYPE');?>
	<?php } ?>
		</h3>
                            <div class="form-group m-form__group row">
                                <div class="form-group col-sm-12">
				<label for="name" class=" form-control-label"><?php echo $this->lang->line('Task_Type_Name');?></label>
	<?php if($data)
			{
				$value=$data->name;
			}
			else
			{
				$value=set_value('name');
			}
			echo form_input(['name'=>'name','class'=>'form-control','id'=>'name','value'=>$value,'required'=>'required']); ?>	
			<?= form_error('name'); ?>		
		</div>
		<div class="col-12">
        <?php 	if($services)
		{
			$edit=$this->lang->line('Edit');
			echo form_submit(['name'=>'submit','value'=>$edit,'class'=>'btn btn-primary btn-lg addservices']);
		}
		else
		{
			$submit=$this->lang->line('Submit');
			 echo form_submit(['name'=>'submit','value'=>$submit,'class'=>'btn btn-primary btn-lg addservices mt-4']);
		}
			?> 
        </div>
			
 		</div>	
                            </div>
                        </div>

 
 

                
                        </div>
     <div class="col-lg-12">
	
	<div class="form-field-container">
    <h3><?php echo $this->lang->line('TASK_TYPE_LIST');?></h3>
	<div class="form-group m-form__group row">
    <div class="table-responsive transparent-table">
                                    <table class="lp-theme-table lp-large-theme" id="m_datatable">
			<thead>
			  <tr class="netTr" style="text-align:left;">
                <th class="nameColumn sorting">
                    <?php echo $this->lang->line('Serial_No'); ?>
                    <img class="nameSortIcon serialSortIcon" src="../../assets/images/img/unfold_more.svg" height="18px">
                </th>
                <th class="nameColumn sorting">
                    <?php echo $this->lang->line('Name'); ?>
                    <img class="nameSortIcon nameSortIconImg" src="../../assets/images/img/unfold_more.svg" height="18px">
                </th>
				<th style="text-align:left;"><?php echo $this->lang->line('ACTION');?></th>
			  </tr>
			</thead>
			<tbody>
                <?php
                usort($task_type, function($a, $b) {
                    $dateA = strtotime($a->createdate);
                    $dateB = strtotime($b->createdate);             
                    return $dateB - $dateA;
                });
			    $ct = 0; foreach ($task_type as $ser) { $ct++;?>
			 	<tr class="hide<?= $ser->id ?>" style="text-align:left">
			 		<td><?=sprintf("#%03d", $ct); ?></td>
			 		<td><?= $ser->name; ?></td>
			 		<td class="action" style="text-align:left;">
			 			<a href=<?= base_url("admin/admin/find_task_type/{$ser->id}") ?> class="fa fa-edit" title="<?php echo $this->lang->line('Edit_Task');?>"></a>&nbsp;
			 			<a href="javascript:;" class="fa fa-trash deleteservices" id='<?= $ser->id; ?>' title="<?php echo $this->lang->line('Delete_Task');?>"></td>
			 		</tr>
			<?php } ?>   
			</tbody>
		  </table></div>
	 </div>
	 </div>
	 </div>
                        </div>

                    </div>
            

                <!--end::Form-->
            </div>

            <!--end::Portlet-->
        </div>
    </div>
    </div>
    </div>


<?php

include('footer.php');
?>


<script type="text/javascript">

$(document).ready(function()
{
  $('#msg').hide();

$("#m_datatable").on("click", ".deleteservices", function() {
  var id=$(this).attr("id");
  var url="<?= base_url('admin/admin/delete_task_type'); ?>"; 
bootbox.confirm("Are you sure?", function(result){
if(result){
  $.ajax({
    type:'ajax',
    method:'post',
    url:url,
    data:{"id" : id},
    dataTyppe: 'json',
  
    success:function(data){
       $('#msg').show();
          $('#msg').html(data);

      },
  });
$('.hide'+id).hide(200);location.reload();
return true;
}
else
{
$('#msg').show();
	$('#msg').html('Delete Failed');
}
})
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
    $(".nameColumn").each(function () {
        var icon = $(this).find("img.nameSortIcon");

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
$(".nameColumn").click(function () {
    setTimeout(updateSortIcons, 10); // Allow time for sorting class to update before checking
});

</script>