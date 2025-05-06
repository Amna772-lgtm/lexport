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
                                <?php echo $this->lang->line('Edit_Employee');?>
                            </h3>
                        </div>
                    </div>
                </div>
 <?php	if($success=$this->session->flashdata('addemployee')) 
 {?> <div class="sufee-alert alert with-close alert-success alert-dismissible fade show success"><?php
 	echo $success;?></div><?php
 }?>
 

<?php echo form_open_multipart('admin/employee/store_employee',['id'=>'employer','class'=>"m-form m-form--fit m-form--label-align-right m-form--group-seperator-dashed"]);
	echo form_hidden('id',$emp['user_id']);
 ?>

                <!--begin::Form-->
 
                    <div class="m-portlet__body">

                        <div class="row thh">
                            <div class="col-lg-12">
                                <h3><?php echo $this->lang->line('Personal_Information');?></h3>
                            </div>
                        </div>
                        <div class="in_fo">
                            <div class="form-group m-form__group row">
                            <div class="form-group col-sm-12">
			<?php  $value = set_value('name', $emp['name']); ?>
			<label for="name" class=" form-control-label"><?php echo $this->lang->line('Full_Name');?></label>
			<?= form_input(['id'=>'name','name'=>'name','class'=>'form-control','value'=>$value]);?>
			<div class="form-error"><?= form_error('name'); ?></div>
		</div>
		
		<div class="form-group col-sm-4">
		<?php  $value = set_value('dob', $emp['dob']); ?>
			<label for="dob" class=" form-control-label"><?php echo $this->lang->line('Date_Of_Birth');?></label>
			<?= form_input(['id'=>'dob','name'=>'dob','class'=>'form-control','value'=>$value]);?>
			<div class="form-error"><?php echo form_error('dob'); ?></div>
			
		</div>
		<div class="form-group col-sm-4">
			<?php  $value = set_value('address', $emp['address']); ?>
			<label for="address" class=" form-control-label"><?php echo $this->lang->line('Address');?></label>
			<?= form_input(['id'=>'address','name'=>'address','class'=>'form-control','value'=>$value]);?>
			<div class="form-error"><?php echo form_error('address'); ?></div>
		</div>
		<div class="form-group col-sm-4">
			<?php  $value = set_value('phone', $emp['phone']); ?>
			<label for="phone" class=" form-control-label"><?php echo $this->lang->line('Phone');?></label>

			<?= form_input(['id'=>'phone','name'=>'phone','class'=>'form-control','maxlength'=>'10','value'=>$value]);?>
			<div class="form-error"><?php echo form_error('phone'); ?></div>
		</div>
		<div class="form-group col-sm-4">
			<?php  $value = set_value('email', $emp['email']); ?>
			<label for="email" class="email" form-control-label"><?php echo $this->lang->line('Email');?></label>
			<?= form_input(['id'=>'email','name'=>'email','class'=>'form-control','value'=>$value,'disabled'=>'disabled']);?>
			<div class="form-error"><?php echo form_error('email'); ?></div>		
		</div>

                            </div>
                        </div>


                        <div class="row thh">
                            <div class="col-lg-12">
                                <h3><?php echo $this->lang->line('Employee_Information');?></h3>
                            </div>
                        </div>
                        <div class="in_fo">
                            <div class="form-group m-form__group row">
                         <div class="form-group col-sm-4">
			<?php  $value = set_value('branch', $emp['branch']); ?>
			<label for="branch" class="form-control-label"><?php echo $this->lang->line('branch');?></label>
		<select name="branch" id="branch" class="form-control" required>
		<option value=""><?php echo $this->lang->line('Please_select_branch');?>*</option>
		<?php foreach(branch() as $branch) { ?>
		<option value="<?= $branch['id']; ?>"<?php if($value==$branch['id']) echo "selected=selected";?>><?= $branch['name']; ?></option>
		<?php } ?>
		</select>		
		</div>
		<div class="form-group col-sm-4">
			<?php  $value = set_value('bank_accounts', $emp['bank_accounts']); ?>
			<label for="bank_accounts" class=" form-control-label"><?php echo $this->lang->line('Bank_Accounts');?></label>
			<?= form_input(['id'=>'bank_accounts','name'=>'bank_accounts','class'=>'form-control','value'=>$value]);?>
			<div class="form-error"><?= form_error('bank_accounts'); ?></div>
		</div>
		<div class="form-group col-sm-4">
			<?php  $value = set_value('bank_name', $emp['bank_name']); ?>
			<label for="bank_name" class=" form-control-label"><?php echo $this->lang->line('Bank_Name');?></label>
			<?= form_input(['id'=>'bank_name','name'=>'bank_name','class'=>'form-control','value'=>$value]);?>
			<div class="form-error"><?= form_error('bank_name'); ?>	</div>
		</div>
		<div class="form-group col-sm-6">
			<?php  $value = set_value('monthly_salary', $emp['monthly_salary']); ?>
			<label for="monthly_salary" class=" form-control-label"><?php echo $this->lang->line('Monthly_Salary');?></label>
				<?= form_input(['id'=>'monthly_salary','name'=>'monthly_salary','class'=>'form-control','value'=>$value]);?>
			<div class="form-error"><?= form_error('monthly_salary'); ?></div>	
		</div>
		
		<div class="form-group col-sm-6">
			<?php  $value = set_value('amount', $emp['amount']); ?>
			<label for="amount" class=" form-control-label"><?php echo $this->lang->line('Amount');?></label>
			<?= form_input(['id'=>'amount','name'=>'amount','class'=>'form-control','value'=>$value]);?>
			<div class="form-error"><?= form_error('amount'); ?></div>
		</div>
		<div class="form-group col-sm-6">
			<?php  $value = set_value('employee_type', $emp['employee_type']); ?>
			<label for="employeetype" class=" form-control-label"><?php echo $this->lang->line('Employee_Type');?></label>
			<select name="employee_type" id="employee_type" class="form-control">
				<?php foreach(employee_type() as $branch) { ?>
				<option value="<?= $branch['d_name']; ?>"<?php if($value==$branch['d_name']) echo "selected=selected";?>><?= $branch['d_name']; ?></option>
				<?php } ?>
		</select>
		</div>
		<div class="form-group col-sm-6">
			<?php  $value = set_value('department_id', $emp['department_id']); ?>
			<label for="department" class="form-control-label"><?php echo $this->lang->line('Department');?></label>
			<select name="department_id" id="department_id" class="form-control">
				<option value="0"><?php echo $this->lang->line('Please_select_Department');?></option>
				<?php
				foreach($dep as $department) {?>
					<option value="<?= $department['id']?>"<?php if($value== $department['id']) echo "selected=selected";?>><?= $department['d_name'] ?></option>
				}
			<?php	} ?>
				
			</select>
		</div>
                            </div>
                        </div>

                        <div class="row thh">
                            <div class="col-lg-12">
                                <h3><?php echo $this->lang->line('File_Upload');?></h3>
                            </div>
                        </div>
                        <div class="in_fo">
                            <div class="form-group m-form__group row">
            <div class="form-group col-sm-6">
			<label for="contractfile" class="form-control-label"><?php echo $this->lang->line('Contract_File');?></label> <div class="custom-file">
	<?php
       echo form_upload(['name'=>'contract_file','id'=>'contract_file','class'=>'form-control custom-file-input']); 
       echo $emp['contract_file'];
       if(isset($upload_error))
    {
        echo $upload_error; 
    }
    ?>
			
	<label class="custom-file-label" for="customFile"><?php echo $this->lang->line('Choose_file');?></label></div>	</div>
		<div class="form-group col-sm-6">
			<label for="governmentalidfile" class="form-control-label"><?php echo $this->lang->line('Governmental_Id_File');?></label> <div class="custom-file">
	<?php
       echo form_upload(['name'=>'governmental_id_file','id'=>'governmental_id_file','class'=>'form-control custom-file-input']); 
        echo $emp['governmental_id_file'];
        if(isset($upload_error))
    {
        echo $upload_error; 
    }
    ?>
	<label class="custom-file-label" for="customFile"><?php echo $this->lang->line('Choose_file');?></label></div>	</div>
		<div class="form-group col-sm-6">
			<label for="certificatefile" class="form-control-label"><?php echo $this->lang->line('Certificate_File');?></label> <div class="custom-file">
	<?php
       echo form_upload(['name'=>'certificate_file','id'=>'certificate_file','class'=>'form-control custom-file-input']);
  		 echo $emp['certificate_file']; 
        if(isset($upload_error))
    {
        echo $upload_error; 
    }
    ?>
	<label class="custom-file-label" for="customFile"><?php echo $this->lang->line('Choose_file');?></label></div>	</div>
		<div class="form-group col-sm-6">
			<label for="employeesphoto" class="form-control-label"><?php echo $this->lang->line('Employer_Photo');?></label> <div class="custom-file">
	<?php
       echo form_upload(['name'=>'employees_photo','id'=>'employees_photo','class'=>'form-control custom-file-input']);
        echo $emp['employees_photo'];  
         if(isset($upload_error))
    {
        echo $upload_error; 
    }?>
	<label class="custom-file-label" for="customFile"><?php echo $this->lang->line('Choose_file');?></label></div>	</div>
                            </div>
                        </div>
 
                        
                    </div>
                    <div class="m-portlet__foot m-portlet__no-border m-portlet__foot--fit">
                        <div class="m-form__actions m-form__actions--solid">
                            <div class="row">
                                <div class="col-lg-6">
						<?php 
						$edit=$this->lang->line('Edit');
	 	echo form_submit(['name'=>'editemployee','id'=>'editemployee','value'=>$edit,'class'=>'btn btn-primary btn-lg']);
	 ?>
                                   
                                </div>
 
                            </div>
                        </div>
                    </div>
                </form>

                <!--end::Form-->
            </div>

            <!--end::Portlet-->
        </div>
    </div>
    </div>


<?php

include('footer.php');