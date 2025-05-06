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
                <div class="m-portlet__head">
                    <div class="m-portlet__head-caption">
                        <div class="m-portlet__head-title">
                            <h3 class="m-portlet__head-text">
                                <?php echo $this->lang->line('Employee_Report');?>
                            </h3>
                        </div>
                    </div>
                </div>


   <!--           
<div class="form-group m-form__group row align-items-right"><div class="col-lg-12" style=" margin-top: 15px; margin-left: -20px; ">
<strong class="float-right"><a class="btn btn-success" href="<?= base_url("admin/employee/print_employee_pdf/{$emp['user_id']}") ?>"><?php echo $this->lang->line('PDF');?></a>&nbsp;<a class="btn btn-success" href="" onclick="window.print()"><?php echo $this->lang->line('Print');?></a></strong>  
</div>    
</div>    -->
                <!--begin::Form-->
<?php echo form_open_multipart(' ',['id'=>'employer','class'=>"m-form m-form--fit m-form--label-align-right m-form--group-seperator-dashed"]);
 
 ?>
   <div class="m-portlet__body">
                
						<div class="row thh">
                            <div class="col-lg-12">
                                
                            </div>
                        </div>
                        <div class="form-field-container detail-content-box">
                        <h3><?php echo $this->lang->line('Personal_Information');?></h3>
                        <table class="theme-detail-table">
                            <tbody>
                                <tr>
                                    <td>
                                        <?php echo $this->lang->line('Full_Name');?>
                                        <b><?php echo $emp['name']; ?></b>
                                    </td>
                                    <td>
                                        <?php echo $this->lang->line('Date_Of_Birth');?>
                                        <b><?php  if($emp['dob'] !='0000-00-00') echo getTheDayAndDateFromDatePan($emp['dob']); ?></b>
                                    </td>
                                    <td>
                                        <?php echo $this->lang->line('Address');?>
                                       <b> <?php echo $emp['address'] ?></b>
                                    </td>
                                   
                                    
                                </tr>
                                <tr>
                                    <td>
                                        <?php echo $this->lang->line('Phone');?>
                                        <b><?php echo $emp['phone'] ?></b>
                                    </td>
                                    <td>
                                        <?php echo $this->lang->line('branch');?>
                                        <b><?php echo $emp['branch'] ?></b>
                                    </td>
                                    <td>
                                        <?php echo $this->lang->line('Email');?>
                                        <b><?php echo $emp['email'] ?></b>
                                    </td>
                                    <td></td>
                                    
                                </tr>
                            </tbody>
                        </table>
        
                        </div>
 
                        <div class="form-field-container detail-content-box">
                        <h3><?php echo $this->lang->line('Case_Information');?></h3>

                        <table class="theme-detail-table">
                            <tbody>
                                <tr>
                                    <td>
                                        <?php echo $this->lang->line('Bank_Accounts');?>
                                        <b><?php echo $emp['bank_accounts'] ?></b>
                                    </td>
                                    <td>
                                        <?php echo $this->lang->line('Bank_Name');?>
                                        <b><?php echo $emp['bank_name'] ?></b>
                                    </td>
                                    <td>
                                        <?php echo $this->lang->line('Monthly_Salary');?>
                                        <b><?php echo $emp['monthly_salary'] ?></b>
                                    </td>
                                    
                                </tr>
                                <tr>
                                    <td>
                                        <?php echo $this->lang->line('Employee_Type');?>
                                        <b><?php echo $emp['employee_type'] ?></b>
                                    </td>
                                    <td>
                                        <?php echo $this->lang->line('Department');?>
                                        <b><?php echo getDepartmentName($emp['department_id']); ?></b>
                                    </td>
                                    <td>
                                        <?php echo $this->lang->line('Amount');?>
                                        <b><?php echo $emp['amount'] ?></b>
                                    </td>
                                    
                                </tr>
                            </tbody>
                        </table>
                         
                        </div>
 
                        <div class="form-field-container detail-content-box">
                        <h3><?php echo $this->lang->line('File_List');?></h3>
                        <table class="theme-detail-table">
                            <tbody>
                                <tr>
                                    <td>
                                        <?php echo $this->lang->line('Contract_File');?>
                                        <b>
                                        <?php if($emp['contract_file']) { ?>
                                            <a href="<?php echo base_url();?>/uploads/<?php echo $emp['contract_file'];?>" target='_blank'><i class="fa fa-eye"></i></a><?php } ?>
                                        </b>
                                    </td>
                                    <td>
                                        <?php echo $this->lang->line('Governmental_Id_File');?>
                                        <b><?php if($emp['governmental_id_file']) { ?><a href="<?php echo base_url();?>/uploads/<?php echo $emp['governmental_id_file'];?>" target='_blank'><i class="fa fa-eye"></i></a><?php } ?></b>
                                    </td>
                                    <td>
                                        <?php echo $this->lang->line('Certificate_File');?>
                                        <b>
                                            <?php if($emp['certificate_file']) { ?>
                                            <a href="<?php echo base_url();?>/uploads/<?php echo $emp['certificate_file'];?>" target='_blank'><i class="fa fa-eye"></i></a><?php } ?>
                                        </b>
                                    </td>
                                    <td>
                                        <?php echo $this->lang->line('Employer_Photo');?>
                                        <b>
                                        <?php if($emp['employees_photo']) { ?>
                                            <a href="<?php echo base_url();?>/uploads/<?php echo $emp['employees_photo'];?>" target='_blank'><i class="fa fa-eye"></i></a><?php } ?>
                                        </b>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                           
                        </div>
  
 

                 
                        </div>

                    </div>
            

                <!--end::Form-->
            </div>

            <!--end::Portlet-->
        </div>
    </div>
    </div>
 


<?php

include('footer.php');
?>
<script type="text/javascript">
	jQuery('#date').datepicker({format: "yyyy-mm-dd"});
	
</script>

 