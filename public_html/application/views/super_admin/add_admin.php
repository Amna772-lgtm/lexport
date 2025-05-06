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
		.setper {
    padding: 5px 2px;
    margin: 0px 7px;
    display: block;
    float: left;
}
.sublab {
    margin-right: 5px;
}
</style>
    <div class="m-grid__item m-grid__item--fluid m-wrapper">

        <!-- END: Subheader -->
        <div class="m-content">

            <!--begin::Portlet-->
            <div class="m-portlet lp-theme-card bg-transparent">
               

                <!--begin::Form-->
			<?php echo form_open_multipart('super_admin/administrator/store_admin',['id'=>'hr']);
			if($data)
			{
				 echo form_hidden('id',$data->id); 
			}
			else
			{
				 echo form_hidden('id',''); 
			}
	?>
	 
	 <div class="m-portlet__body theme-inner-form">
	 <div class="form-field-container">
	 <h3 class="m-portlet__head-text">
                         <?php  if($data){ ?>
					Edit Admin
			<?php	} else { ?>
					Add Admin
		<?php } ?>
                            </h3>
                        <div class="form-group m-form__group row">
                          <div class="form-group col-sm-4">
			<label for="name" class=" form-control-label">Full Name</label>
			<?php if($data)
			{
				$value=$data->name;
			}
			else
			{
				$value=set_value('name');
			} ?>
			<?= form_input(['id'=>'name','name'=>'name','class'=>'form-control','value'=>$value]);?>
			<?= form_error('name'); ?>
			
		</div>
		 
		<div class="form-group col-sm-4">
			<label for="address" class=" form-control-label">Address</label>
			<?php if($data)
			{
				$value=$data->address;
			}
			else
			{
				$value=set_value('address');
			} ?>
			<?= form_input(['id'=>'address','name'=>'address','class'=>'form-control','value'=>$value]);?>
			<?php echo form_error('address'); ?>
		
		</div>
		<div class="form-group col-sm-4">
			<label for="phone" class=" form-control-label">Phone</label>
			<?php if($data)
			{
				$value=$data->phone;
			}
			else
			{
				$value=set_value('phone');
			} ?>
			<?= form_input(['id'=>'phone','name'=>'phone','class'=>'form-control','maxlength'=>'10','value'=>$value]);?>
			<?php echo form_error('phone'); ?>
		</div>
		<div class="form-group col-sm-4">
			<label for="email" class="email" form-control-label">Email</label>
			<?php if($data)
			{
				$value=$data->email;
			}
			else
			{
				$value=set_value('email');
			} ?>
			<?= form_input(['id'=>'email','name'=>'email','class'=>'form-control','value'=>$value]);?>
			<?php echo form_error('email'); ?>			
		</div>
		<div class="form-group col-sm-4">
			<label for="password" class=" form-control-label">Password</label>
			<?= form_password(['id'=>'password','name'=>'password','class'=>'form-control']);?>
			<?= form_error('password'); ?>			
		</div>
		<div class="form-group col-sm-4">
			<label for="cpassword" class=" form-control-label">Confirm Password</label>
			<?= form_password(['id'=>'cpassword','name'=>'cpassword','class'=>'form-control']);?>
			<?= form_error('cpassword'); ?>
		</div>
		</div></div>
		
	
		<div class="form-field-container">
			<div class="title-with-radio">
				<h3>Set Permission</h3>
				<div class="theme-radio-btn">
					<label for="ckbCheckAll"><input type="radio" name="Set-Permission" id="ckbCheckAll" /> Check All</label>
					<label for="unckbCheckAll"><input type="radio" name="Set-Permission"  id="unckbCheckAll" />  UnCheck All</label>
				</div>
			</div>
<?php $ck   = json_decode($admin_permissions,true); //print_r($check_data);?>
<div class="row">
<div class="form-group m-form__group col-md-12">		
	<div class="setper"><input type="checkbox" value="1" id="1" class="sublab" name="pm[1]" 
<?php if(isset($ck[1]) && $ck[1] == 1){ echo "checked"; } ?>><?php echo $this->lang->line('Pending_List'); ?> </div>
<div class="setper"><input type="checkbox" value="2" id="2" class="sublab" name="pm[2]" <?php if(isset($ck[2]) && $ck[2] == 2){ echo "checked"; } ?>><?php echo $this->lang->line('List_Customers'); ?> </div>
<div class="setper"><input type="checkbox" value="3" id="3" class="sublab" name="pm[3]" <?php if(isset($ck[3]) && $ck[3] == 3){ echo "checked"; } ?>><?php echo $this->lang->line('Session'); ?> </div>
<div class="setper"><input type="checkbox" value="4" id="4" class="sublab" name="pm[4]" <?php if(isset($ck[4]) && $ck[4] == 4){ echo "checked"; } ?>><?php echo $this->lang->line('WRITING'); ?> </div>
<div class="setper"><input type="checkbox" value="5" id="5" class="sublab" name="pm[5]" <?php if(isset($ck[5]) && $ck[5] == 5){ echo "checked"; } ?>><?php echo $this->lang->line('Consultation'); ?> </div>
<div class="setper"><input type="checkbox" value="6" id="6" class="sublab" name="pm[6]" <?php if(isset($ck[6]) && $ck[6] == 6){ echo "checked"; } ?>><?php echo $this->lang->line('Visiting'); ?> </div>
<div class="setper"><input type="checkbox" value="7" id="7" class="sublab" name="pm[7]" <?php if(isset($ck[7]) && $ck[7] == 7){ echo "checked"; } ?>><?php 	echo $this->lang->line('GENERAL'); ?>  </div>
<div class="setper"><input type="checkbox" value="8" id="8" class="sublab" name="pm[8]" <?php if(isset($ck[8]) && $ck[8] == 8){ echo "checked"; } ?>><?php 	echo $this->lang->line('ASSIGNMENT'); ?> </div>
<div class="setper"><input type="checkbox" value="9" id="9" class="sublab" name="pm[9]" <?php if(isset($ck[9]) && $ck[9] == 9){ echo "checked"; } ?>><?php 	echo $this->lang->line('Archives'); ?> </div>
<div class="setper"><input type="checkbox" value="10"id="10"  class="sublab" name="pm[10]" <?php if(isset($ck[10]) && $ck[10] == 10){ echo "checked"; } ?>><?php 	echo $this->lang->line('Audio_Record'); ?> </div>
<div class="setper"><input type="checkbox" value="11" id="11"  class="sublab" name="pm[11]" <?php if(isset($ck[11]) && $ck[11] == 11){ echo "checked"; } ?>><?php 	echo $this->lang->line('Note_List'); ?> </div>
<div class="setper"><input type="checkbox" value="12" id="12"  class="sublab" name="pm[12]" <?php if(isset($ck[12]) && $ck[12] == 12){ echo "checked"; } ?>><?php 	echo $this->lang->line('Financial'); ?> </div>
<div class="setper"><input type="checkbox" value="13" id="13"  class="sublab" name="pm[13]" <?php if(isset($ck[13]) && $ck[13] == 13){ echo "checked"; } ?>><?php 	echo $this->lang->line('Management'); ?> </div>
<div class="setper"><input type="checkbox" value="14" id="14"  class="sublab" name="pm[14]" <?php if(isset($ck[14]) && $ck[14] == 14){ echo "checked"; } ?>><?php 	echo $this->lang->line('HR'); ?> </div>
<div class="setper"><input type="checkbox" value="15" id="15"  class="sublab" name="pm[15]" <?php if(isset($ck[15]) && $ck[15] == 15){ echo "checked"; } ?>><?php 	echo $this->lang->line('HR_E_services'); ?> </div>
<div class="setper"><input type="checkbox" value="16" id="16"  class="sublab" name="pm[16]" <?php if(isset($ck[16]) && $ck[16] == 16){ echo "checked"; } ?>><?php 	echo $this->lang->line('Fine'); ?> </div>
<div class="setper"><input type="checkbox" value="17" id="17"  class="sublab" name="pm[17]" <?php if(isset($ck[17]) && $ck[17] == 17){ echo "checked"; } ?>><?php 	echo $this->lang->line('Financial'); ?> </div>
<div class="setper"><input type="checkbox" value="18" id="18"  class="sublab" name="pm[18]" <?php if(isset($ck[18]) && $ck[18] == 18){ echo "checked"; } ?>><?php 	echo $this->lang->line('Transaction'); ?> </div>
<div class="setper"><input type="checkbox" value="19" id="19"  class="sublab" name="pm[19]" <?php if(isset($ck[19]) && $ck[19] == 19){ echo "checked"; } ?>><?php 	echo $this->lang->line('Report'); ?> </div>
<div class="setper"><input type="checkbox" value="20" id="20"  class="sublab" name="pm[20]" <?php if(isset($ck[20]) && $ck[20] == 20){ echo "checked"; } ?>><?php 	echo $this->lang->line('Settings'); ?> </div>
	<div class="setper"><input type="checkbox" value="21" id="21"  class="sublab" name="pm[21]" <?php if(isset($ck[21]) && $ck[21] == 21){ echo "checked"; } ?>><?php 	echo $this->lang->line('Project_planning'); ?> </div>
		</div>
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
					echo form_submit(['id'=>'addadmin','value'=>$submit,'class'=>'btn btn-primary btn-lg']);
			 
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


<?php

include('footer.php');

?> 
<script>
$(document).ready(function () {
    $("#ckbCheckAll").click(function () {
            $(".sublab").prop('checked', true);
    });
	    $("#unckbCheckAll").click(function () {
       $(".sublab").prop('checked', false);
    });
});
</script>