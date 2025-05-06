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
                        <div class="m-portlet__head-title">
                            <h3 class="m-portlet__head-text">
                                <?php echo $this->lang->line('Department_Type');?>
                            </h3>
                        </div>
                        <div class="theme-new-nav-menu">
                            <a class="back-link" href="#">
<svg width="16" height="14" viewBox="0 0 16 14" fill="none" xmlns="http://www.w3.org/2000/svg">
<path fill-rule="evenodd" clip-rule="evenodd" d="M7.70679 13.7006C7.51926 13.888 7.26495 13.9934 6.99979 13.9934C6.73462 13.9934 6.48031 13.888 6.29279 13.7006L0.292786 7.70057C0.105315 7.51304 0 7.25874 0 6.99357C0 6.72841 0.105315 6.4741 0.292786 6.28657L6.29279 0.286571C6.48139 0.104413 6.73399 0.00361876 6.99619 0.00589718C7.25838 0.0081756 7.5092 0.113345 7.6946 0.298753C7.88001 0.484161 7.98518 0.734973 7.98746 0.99717C7.98974 1.25937 7.88894 1.51197 7.70679 1.70057L3.41379 5.99357H14.9998C15.265 5.99357 15.5194 6.09893 15.7069 6.28646C15.8944 6.474 15.9998 6.72835 15.9998 6.99357C15.9998 7.25879 15.8944 7.51314 15.7069 7.70068C15.5194 7.88821 15.265 7.99357 14.9998 7.99357H3.41379L7.70679 12.2866C7.89426 12.4741 7.99957 12.7284 7.99957 12.9936C7.99957 13.2587 7.89426 13.513 7.70679 13.7006Z" fill="#333333"/>
</svg>
 Back</a>
                            <ul>
                                <li> <a href="http://lexport.demosbywpsqr.com/admin/action_log">Log Information</a> </li>
								<li> <a href="http://lexport.demosbywpsqr.com/admin/admin/change_pass">Reset Password</a> </li>
								<li> <a href="http://lexport.demosbywpsqr.com/admin/services/services">E-Service Name</a> </li>
								<li> <a href="http://lexport.demosbywpsqr.com/admin/admin/case_type">E-Service Type</a> </li>
								<li> <a href="http://lexport.demosbywpsqr.com/admin/admin/task_type">Task Type</a> </li>
								<li> <a href="http://lexport.demosbywpsqr.com/admin/admin/consultation_type">Consultation Type</a> </li>
								<li> <a href="http://lexport.demosbywpsqr.com/admin/admin/writing_type">Writing Type</a> </li>
								<li> <a href="http://lexport.demosbywpsqr.com/admin/admin/fine_type">Fine Type</a> </li>
								<li> <a href="http://lexport.demosbywpsqr.com/admin/admin/add_group">Add Group</a> </li>
								<li class="active"> <a href="http://lexport.demosbywpsqr.com/admin/admin/department_type">Department Type</a> </li>
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
                            </ul>

                        </div>
                    </div>
                </div>


             

                <!--begin::Form-->
	<div class="m-form m-form--fit m-form--label-align-right m-form--group-seperator-dashed">
    
    <div class="m-portlet__body theme-inner-form"> <div class="form-group m-form__group row">
     <div class="col-lg-12">
	
    <div class="form-field-container">
    <h3><?php echo $this->lang->line('DEPARTMENT_LIST');?></h3>
	<div class="form-group m-form__group row">
    <div class="table-responsive transparent-table">
                                    <table class="lp-theme-table lp-large-theme" id="m_datatable">
			<thead>
			  <tr class="netTr">
				<th><?php echo $this->lang->line('SR_NO');?></th>
				<th><?php echo $this->lang->line('Name');?></th>
				<th><?php echo $this->lang->line('ACTION');?></th>
			  </tr>
			</thead>
			<tbody>
			  <?php $ct = 0; foreach ($department_type as $ser) { $ct++;?>
			 	<tr class="hide<?= $ser->id ?>" style="text-align:center">
			 		<td><?= $ct; ?></td>
			 		<td><?= $ser->d_name; ?></td>
			 		<td class="action">
			 			<a href=<?= base_url("admin/admin/find_department_type/{$ser->id}") ?> class="fa fa-edit" title="<?php echo $this->lang->line('Edit_Task');?>"></a>&nbsp;
			 			<a href="javascript:;" class="fa fa-trash deleteservices" id='<?= $ser->id; ?>' title="<?php echo $this->lang->line('Delete_Task');?>"></td>
			 		</tr>
			<?php } ?>   
			</tbody>
		  </table></div>
	 </div>
	 </div>
	 </div>
     <div class="col-lg-12">
                        <div class="form-field-container">
                        <?php echo form_open('admin/admin/department_type',['id'=>'branch']); 
			if($data)
			{
				 echo form_hidden('id',$data->id); 
			}
			else
			{
				 echo form_hidden('id',''); 
			}
		?>
		<h3><?php  if($data){ ?>
				<?php echo $this->lang->line('Edit_Department_Type');?>
	<?php	} else { ?>
				<?php echo $this->lang->line('ADD_DEPARTMENT_TYPE');?>
	<?php } ?></h3>
                            <div class="form-group m-form__group row">
                                <div class="form-group col-sm-12">
		<label for="name" class=" form-control-label"><?php echo $this->lang->line('Department_Name');?></label>
	<?php if($data)
			{
				$value=$data->d_name;
			}
			else
			{
				$value=set_value('d_name');
			}
			echo form_input(['name'=>'d_name','class'=>'form-control','id'=>'name','value'=>$value]); ?>	
			<?= form_error('d_name'); ?>			
	<br>
		 <?php  
 
		$submit=$this->lang->line('Submit');
			 echo form_submit([ 'value'=>$submit,'class'=>'btn btn-primary btn-lg addservices']);
  ?> 
			
 		</div>	
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
  var url="<?= base_url('admin/admin/delete_department_type'); ?>"; 
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
</script>