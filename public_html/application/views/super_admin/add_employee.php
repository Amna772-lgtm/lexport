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
<style>


        .m-portlet .m-portlet__head {
            border-bottom: 1px solid #ebedf2;
            background: #CAA457 url('<?php echo base_url();?>assets/images/ic.svg');
            background-repeat: no-repeat;
            background-position: right !important;
            color: #fff;
            -webkit-border-top-left-radius: 20px !important;
            -webkit-border-top-right-radius: 20px !important;
            -moz-border-radius-topleft: 20px !important;
            -moz-border-radius-topright: 20px !important;
            border-top-left-radius: 20px !important;
            border-top-right-radius: 20px !important;
        }

        img.m--img-rounded.m--marginless {
            max-width: 30px !important;
            height: 40px !important;
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
                                <?php echo $this->lang->line('Add_Employee');?>
                            </h3>
                        </div>
                    </div>
                </div>
 <?php	if($success=$this->session->flashdata('addemployee')) 
 {?> <div class="sufee-alert alert with-close alert-success alert-dismissible fade show success"><?php
 	echo $success;?></div><?php
 }?>
<?php echo form_open_multipart('super_admin/employee/store_employee',['id'=>'employer','class'=>"m-form m-form--fit m-form--label-align-right m-form--group-seperator-dashed"]);
echo form_hidden('id',''); ?>
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
			<label for="name" class=" form-control-label"><?php echo $this->lang->line('Full_Name');?></label>
			<?= form_input(['id'=>'name','name'=>'name','class'=>'form-control','value'=>set_value('name')]);?>
			<div class="form-error"><?= form_error('name'); ?></div>
		</div>
		
		<div class="form-group col-sm-4">
			<label for="dob" class=" form-control-label"><?php echo $this->lang->line('Date_Of_Birth');?></label>
			<?= form_input(['id'=>'dob','readonly'=>'readonly','name'=>'dob','class'=>'form-control dobdate','value'=>set_value('dob')]);?>
			<div class="form-error"><?php echo form_error('dob'); ?></div>
			
		</div>
		<div class="form-group col-sm-4">
			<label for="address" class=" form-control-label"><?php echo $this->lang->line('Address');?></label>
			<?= form_input(['id'=>'address','name'=>'address','class'=>'form-control','value'=>set_value('address')]);?>
			<div class="form-error"><?php echo form_error('address'); ?></div>
		</div>
		<div class="form-group col-sm-4">
			<label for="phone" class=" form-control-label"><?php echo $this->lang->line('Phone');?></label>

			<?= form_input(['id'=>'phone','name'=>'phone','class'=>'form-control','maxlength'=>'10','value'=>set_value('phone')]);?>
			<div class="form-error"><?php echo form_error('phone'); ?></div>
		</div>
		<div class="form-group col-sm-4">
			<label for="email" class="email" form-control-label"><?php echo $this->lang->line('Email');?></label>
			<?= form_input(['id'=>'email','name'=>'email','class'=>'form-control','value'=>set_value('email')]);?>
			<div class="form-error"><?php echo form_error('email'); ?></div>	
		</div>
		<div class="form-group col-sm-4">
			<label for="password" class=" form-control-label"><?php echo $this->lang->line('Password');?></label>

			<?= form_password(['id'=>'password','name'=>'password','class'=>'form-control']);?>
			<div class="form-error"><?= form_error('password'); ?></div>			
		</div>
		<div class="form-group col-sm-4">
			<label for="cpassword" class=" form-control-label"><?php echo $this->lang->line('Confirm_Password');?></label>
			<?= form_password(['id'=>'cpassword','name'=>'cpassword','class'=>'form-control']);?>
			<div class="form-error"><?= form_error('cpassword'); ?></div>
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
			<label for="contract_date" class="form-control-label"><?php echo $this->lang->line('Contract_Date');?></label>
			<?= form_input(['id'=>'contract_date','name'=>'contract_date','readonly'=>'readonly','class'=>'form-control cd','value'=>set_value('contract_date')]);?>
			<div class="form-error"><?= form_error('contract_date'); ?></div>			
		</div>
		<div class="form-group col-sm-4">
			<label for="start_date" class="form-control-label"><?php echo $this->lang->line('Start_Date');?></label>
			<?= form_input(['id'=>'start_date','name'=>'start_date','readonly'=>'readonly','class'=>'form-control sd','value'=>set_value('start_date')]);?>
			<div class="form-error"><?= form_error('start_date'); ?></div>			
		</div>
			<div class="form-group col-sm-4">
		<label for="branch" class=" form-control-label"><?php echo $this->lang->line('branch');?></label>
		<?php 
			$value=set_value('branch');
			?>

	  	<select name="branch" id="branch" class="form-control" required>
<option value=""><?php echo $this->lang->line('Please_select_branch');?></option>
<?php foreach(branch() as $branch) { ?>
<option value="<?= $branch['id']; ?>"<?php if($value==$branch['id']) echo "selected=selected";?>><?= $branch['name']; ?></option>
<?php } ?>
</select>
	  		<div class="form-error"><?= form_error('branch'); ?></div>
	  	</div>
		<div class="form-group col-sm-4">
			<label for="bank_accounts" class=" form-control-label"><?php echo $this->lang->line('Bank_Accounts');?></label>
			<?= form_input(['id'=>'bank_accounts','name'=>'bank_accounts','class'=>'form-control','value'=>set_value('bank_accounts')]);?>
			<div class="form-error"><?= form_error('bank_accounts'); ?></div>
			
		</div>
		<div class="form-group col-sm-4">
			<label for="bank_name" class=" form-control-label"><?php echo $this->lang->line('Bank_Name');?></label>
			<?= form_input(['id'=>'bank_name','name'=>'bank_name','class'=>'form-control','value'=>set_value('bank_name')]);?>
			<div class="form-error"><?= form_error('bank_name'); ?></div>	
		</div>
		<div class="form-group col-sm-4">
			<label for="monthly_salary" class=" form-control-label"><?php echo $this->lang->line('Monthly_Salary');?></label>
				<?= form_input(['id'=>'monthly_salary','name'=>'monthly_salary','class'=>'form-control','value'=>set_value('monthly_salary')]);?>
			<div class="form-error"><?= form_error('monthly_salary'); ?></div>	
		</div>
		
		<div class="form-group col-sm-4">
			<label for="amount" class=" form-control-label"><?php echo $this->lang->line('Amount');?></label>
			<?= form_input(['id'=>'amount','name'=>'amount','class'=>'form-control','value'=>set_value('amount')]);?>
			<div class="form-error"><?= form_error('amount'); ?></div>
		</div>
		<div class="form-group col-sm-4">
			<label for="employeetype" class=" form-control-label"><?php echo $this->lang->line('Employee_Type');?></label>
			<select name="employee_type" id="employee_type" class="form-control">
				<?php echo $value=set_value('employee_type'); foreach(employee_type() as $branch) { ?>
				<option value="<?= $branch['d_name']; ?>"<?php if($value==$branch['d_name']) echo "selected=selected";?>><?= $branch['d_name']; ?></option>
				<?php } ?>
		</select>
			 
			<?php //echo form_input(['name'=>'other_employee_type','id'=>'other_employee_type','class'=>'form-control']); ?>
		</div>
		<div class="form-group col-sm-4">

			<label for="department" class="form-control-label"><?php echo $this->lang->line('Department');?></label>
			<select name="department_id" id="department_id" class="form-control" >
				<option value="0"><?php echo $this->lang->line('Please_select_Department');?></option>
				<?php
				foreach($dep as $department) {?>
					<option  <?php if(set_value('department_id')==$department['id']){ echo "selected=selected";} ?>  value="<?= $department['id'] ?>"><?= $department['d_name'] ?></option>
			<?php	} ?>
				
				<!--<option value="4">Other</option>-->
			</select>
			 
			<?php //echo form_input(['name'=>'other_department_id','id'=>'other_department_id','class'=>'form-control']); ?>
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
       if(isset($upload_error))
    {
        echo $upload_error; 
    }
    ?>
			<label class="custom-file-label" for="customFile"><?php echo $this->lang->line('Choose_file');?></label></div>
		</div>
		<div class="form-group col-sm-6">
			<label for="governmentalidfile" class="form-control-label"><?php echo $this->lang->line('Governmental_Id_File');?></label> <div class="custom-file">
	<?php
       echo form_upload(['name'=>'governmental_id_file','id'=>'governmental_id_file','class'=>'form-control custom-file-input']); 
        if(isset($upload_error))
    {
        echo $upload_error; 
    }
    ?><label class="custom-file-label" for="customFile"><?php echo $this->lang->line('Choose_file');?></label></div>
		</div>
		<div class="form-group col-sm-6">
			<label for="certificatefile" class="form-control-label"><?php echo $this->lang->line('Certificate_File');?></label> <div class="custom-file">
	<?php
       echo form_upload(['name'=>'certificate_file','id'=>'certificate_file','class'=>'form-control custom-file-input']); 
        if(isset($upload_error))
    {
        echo $upload_error; 
    }
    ?><label class="custom-file-label" for="customFile"><?php echo $this->lang->line('Choose_file');?></label></div>
		</div>
		<div class="form-group col-sm-6">
		<label for="employeesphoto" class="form-control-label"><?php echo $this->lang->line('Employer_Photo');?></label><div class="custom-file">
	<?php
       echo form_upload(['name'=>'employees_photo','id'=>'employees_photo','class'=>'form-control custom-file-input']); 
         if(isset($upload_error))
    {
        echo $upload_error; 
    }
	?>    <label class="custom-file-label" for="customFile"><?php echo $this->lang->line('Choose_file');?></label></div>
		</div>
                            </div>
                        </div>
 
                        
                    </div>
                    <div class="m-portlet__foot m-portlet__no-border m-portlet__foot--fit">
                        <div class="m-form__actions m-form__actions--solid">
                            <div class="row">
                                <div class="col-lg-6">
								<?php 
								$submit=$this->lang->line('Submit');
								echo form_submit(['name'=>'addemployee','id'=>'addemployee','value'=>$submit,'class'=>'btn btn-primary btn-lg']);
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

?>
<script>
    $(document).ready(function () {
    
        $(".cd").calendarsPicker({
			  calendar: $.calendars.instance('<?php if($this->session->userdata('admin_site_lang')=="arabic" OR $this->session->userdata('admin_site_lang')=="") echo "ummalqura"; else echo ""; ?>',
			  '<?php if($this->session->userdata('admin_site_lang')=="arabic" OR $this->session->userdata('admin_site_lang')=="") echo "ar"; else echo "en"; ?>'),
				showOtherMonths: true,  minDate:0, 
				dateFormat: "dd/mm/yyyy",
				<?php if($this->session->userdata('admin_site_lang')=="arabic" OR $this->session->userdata('admin_site_lang')=="") {?> selectDefaultDate:true, <?php } ?>
            onSelect: function (date) {
					
				$( ".calendars-today" ).trigger( "click" );
                var date2 = $('.cd').calendarsPicker('getDate');  
                date2.setDate(date2.getDate() + 1);
                $('.sd').calendarsPicker('setDate', date2);
                //sets minDate to cd date + 1
                $('.sd').calendarsPicker('option', 'minDate', date2);
            }
        });
        $('.sd').calendarsPicker({
			  calendar: $.calendars.instance('<?php if($this->session->userdata('admin_site_lang')=="arabic" OR $this->session->userdata('admin_site_lang')=="") echo "ummalqura"; else echo ""; ?>',
			  '<?php if($this->session->userdata('admin_site_lang')=="arabic"  OR $this->session->userdata('admin_site_lang')=="") echo "ar"; else echo "en"; ?>'),
				showOtherMonths: true,  minDate:0, 
				<?php if($this->session->userdata('admin_site_lang')=="arabic"  OR $this->session->userdata('admin_site_lang')=="") {?>  selectDefaultDate:true, <?php } ?>
				dateFormat: "dd/mm/yyyy",
				onClose: function () {
                var cd = $('.cd').calendarsPicker('getDate');
                console.log(cd);
                var sd = $('.sd').calendarsPicker('getDate');
                if (sd <= cd) {
					alert("Contract date cannot be greater than start date");
                    var minDate = $('.sd').calendarsPicker('option', 'minDate');
                    $('.sd').calendarsPicker('setDate', minDate);
                }
            }
        });
    });

$('.dobdate').calendarsPicker({
  calendar: $.calendars.instance('<?php if($this->session->userdata('admin_site_lang')=="arabic"  OR $this->session->userdata('admin_site_lang')=="") echo "ummalqura"; else echo ""; ?>','<?php if($this->session->userdata('admin_site_lang')=="arabic") echo "ar"; else echo "en"; ?>'),
  showOtherMonths: true,dateFormat: 'dd/mm/yyyy', minDate:0, 
  maxDate:0, <?php if($this->session->userdata('admin_site_lang')=="arabic"  OR $this->session->userdata('admin_site_lang')=="") {?>  selectDefaultDate:true, <?php } ?>
  onSelect: function (date) {
 
  }
});
</script>