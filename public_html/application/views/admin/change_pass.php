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
            text-transform: uppercase;
            padding: 10px;
            -webkit-border-top-left-radius: 20px !important;
            -webkit-border-top-right-radius: 20px !important;
            -moz-border-radius-topleft: 20px !important;
            -moz-border-radius-topright: 20px !important;
            border-top-left-radius: 20px !important;
            border-top-right-radius: 20px !important;
            margin: 30px 30px 0 30px;
        }
        .in_fo{
            box-shadow: 0px 5px 10px 0px #cccccc !important;
            margin: 0 30px;
            padding-bottom: 25px;
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
    </style>

    <div class="m-grid__item m-grid__item--fluid m-wrapper">


        <!-- END: Subheader -->
        <div class="m-content">

            <!--begin::Portlet-->
            <div class="m-portlet lp-theme-card bg-transparent">
                <div class="m-portlet__head">
                    <div class="m-portlet__head-caption">
                        <div class="m-portlet__head-title">
                            <h3 class="m-portlet__head-text">
                                <?php echo $this->lang->line('CHANGE_PASSWORD');?>
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
								<li class="active"> <a href="http://lexport.demosbywpsqr.com/admin/admin/change_pass">Reset Password</a> </li>
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
								<li> <a href="http://lexport.demosbywpsqr.com/admin/admin/block_list">Block List</a> </li>
								<li> <a href="http://lexport.demosbywpsqr.com/admin/admin/marketing_banner">Marketing Banner</a> </li>
								<li> <a href="http://lexport.demosbywpsqr.com/admin/permission/add_permission">Permission</a> </li>
								<li> <a href="http://lexport.demosbywpsqr.com/admin/admin/chat">Support Chat</a> </li>
								<li> <a href="http://lexport.demosbywpsqr.com/admin/admin/send_notification">Send Notification</a> </li>
                            </ul>

                        </div>
                    </div>
                </div>

<?php 

if($_GET['status']){ 
  echo ' <div id="msg" class="sufee-alert alert with-close alert-success alert-dismissible fade show success">Password change successfully</div>';
}


if($_GET['infosuccess']){ 
  echo ' <div id="msg" class="sufee-alert alert with-close alert-success alert-dismissible fade show success">Information change successfully</div>';
}
 ?>

                <!--begin::Form-->
                <div class="m-form m-form--fit m-form--label-align-right m-form--group-seperator-dashed">
                <div class="m-portlet__body theme-inner-form">

                      
                        <div class="form-field-container">
                        <h3><?php echo $this->lang->line('User_Selection');?></h3>
                            <div class="form-group m-form__group row">
                               <?php if ($this->uri->segment(3) == 'change_pass'||  $this->uri->segment(3) == 'change_password' ): 
			$st = isset($_GET['select_type'])?$_GET['select_type']:'';
			?>
			<div class="col-lg-6">
			<form method="GET">
					<label><?php echo $this->lang->line('Select_User_Type');?> </label>
			<select class="form-control" id="select_type" name="select_type" onchange="this.form.submit()">
		    	<option><?php echo $this->lang->line('Select_User_Type');?> </option>
		    	<option value="1" <?php if($st == 1) echo "selected=selected"; ?>><?php echo $this->lang->line('Employee');?></option>
		    	<option value="2"  <?php if($st == 2) echo "selected=selected"; ?>><?php echo $this->lang->line('Customer');?></option>
		    </select> 
			</form>
			</div>
			<?php endif; ?>	<div class="col-lg-6">
			<?php echo form_open('admin/admin/change_info', ['class' => 'front-text']); ?>
			<label><?php echo $this->lang->line('Select_User');?> </label>
			<?php if ($st== '1'): ?>
		
		    <select class="form-control" id="user_id" name="user_id">
		    	<option><?php echo $this->lang->line('Select_Employee');?> </option>
			<?php  foreach ($employees as $employee) {?>
		    	<option value="<?php echo $employee['id']?>"><?php echo $employee['name']?></option>
			<?php }?>	    
		    </select> 
		
			<?php endif; ?>
			<?php if ($st == '2'): ?>
			<select class="form-control" id="user_id" name="user_id">
		    	<option><?php echo $this->lang->line('Select_Customer');?> </option>
			<?php  foreach ($customer as $customer) {?>
		    	<option value="<?php echo $customer['id']?>"><?php echo $customer['name']?></option>
			<?php }?>	    
		    </select>
			<?php endif; ?>
				</div> 
                            </div>
                        </div>


                        <div class="form-field-container">
                        <h3><?php echo $this->lang->line('Change_Details');?></h3>
                            <div class="form-group m-form__group row">
                                 <div class="col-md-6">
			<label for=""><?php echo $this->lang->line('Name');?></label>
			<?php echo form_input(['name' => 'name','id' => 'name', 'placeholder' => '', 'class' => 'form-control', 'Disabled ' => 'Disabled']);
			?> 
			</div>	
			<div class="col-md-6">
			<label for=""><?php echo $this->lang->line('Identification_Numbers');?></label>
			<?php echo form_input(['name' => 'id_numbers','id' => 'id_numbers', 'placeholder' => '', 'class' => 'form-control', 'Disabled ' => 'Disabled']);
			?> 
			</div>	
			<div class="col-md-6">
			<label for=""><?php echo $this->lang->line('Email');?></label>
			<?php echo form_input(['name' => 'email','id' => 'email', 'placeholder' => '', 'class' => 'form-control',"required"=>"required"]);
			?> 
			</div>	
			<div class="col-md-6">
			<label for=""><?php echo $this->lang->line('Contact_Number');?></label>
			<?php echo form_input(['name' => 'phone', 'id' => 'phone', 'placeholder' => '', 'class' => 'form-control',"required"=>"required"]);
			?> 
			</div>	
			<div class="col-md-6 "><br>
			<label for=""><?php echo $this->lang->line('Total_Number_Of_Case');?></label> : <b><span class="ttnofc"></span></b>
			</div>	
			<div class="col-md-6 "><br><?php echo $this->lang->line('Block');?>: <input type="checkbox" name="block" value="0" id="block">
			</div>	
<div class="next-btn"> 
			<div class="col-md-12"><br>
			<?php echo form_submit(['name' => 'submit', 'value' =>  $this->lang->line('Update_Information'), 'class' => 'btn btn-primary btn-lg']); ?>	
			</div>
			</div>		<?php echo form_close(); ?>
                            </div>
                        </div>
						
                        <div class="form-field-container">
                        <h3><?php echo $this->lang->line('CHANGE_PASSWORD');?></h3>
                            <?php echo form_open('admin/admin/change_password', ['class' => 'front-text']); ?>
                            <div class="form-group m-form__group row">
							
				<input type="hidden" name="user_id" value="<?php echo set_value('user_id'); ?>" id="hid">
			<div class="col-md-6">
			<label for=""><?php echo $this->lang->line('Enter_New_Password');?></label>
			<?php echo form_password(['name' => 'new_password', 'placeholder' => 'Enter New Passsword', 'class' => 'form-control']);
			?> <span style="color:red"> <?php echo form_error('new_password'); ?></span>
						</div>
			<div class="col-md-6">	
			<label for=""><?php echo $this->lang->line('Enter_Confirm_Password');?></label>
			<?php echo form_password(['name' => 'confirm_password', 'placeholder' => 'Enter Confirm Passsword', 'class' => 'form-control']);
			?> <span style="color:red"><?php echo form_error('confirm_password'); ?></span>
                    </div><br>
					    <div class="col-lg-12 next-btn">
						<br>
                                  <?php 
								  $submit=$this->lang->line('Save');
								  echo form_submit(['name' => 'submit', 'value' => $submit, 'class' => 'btn btn-primary btn-lg']); ?>
                                  												 
						</div>		<?php echo form_close(); ?>
                    </div>
                    </div>
                    </div>
 
                </div>

                <!--end::Form-->
            </div>

            <!--end::Portlet-->
        </div>
    </div>


<?php

include('footer.php');
?>
<script>
$('#user_id').on('change', function() {
	var id=$(this).val();
	$.ajax({
		 type: 'POST',
		url: "<?php echo base_url('admin/admin/find_note_user'); ?>", // <-- properly quote this line
		cache: false,
		data: {id: id}, // <-- provide the branch_id so it will be used as $_POST['branch_id']
		dataType: 'JSON', // <-- add json datatype
		success: function(data) {
				$("#name").val(data['name']);
				$("#email").val(data['email']);
				$("#phone").val(data['phone']);
				$("#id_numbers").val(data['id_numbers']);
				$("#hid").val(id);
				$(".ttnofc").text(data['nof']);
				if(data['status'] == 0){ $('#block').prop('checked', true); } else { $('#block').prop('checked', false); }
				
		},
		error:function(){

 
		},
});
});
</script>