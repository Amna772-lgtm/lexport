<?php
include('header.php');

?>
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
                         <?php  if($data){ ?>
					Edit User
			<?php	} else { ?>
					<?php echo $this->lang->line('Add_User');?>
		<?php } ?>
                            </h3>
                        </div>
                    </div>
                </div>

                <!--begin::Form-->
			<?php echo form_open_multipart('super_admin/administrator/add_user',['id'=>'']);
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
		<div class="row">
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
			<label for="name" class=" form-control-label">ID Number</label>
			<?php if($data)
			{
				$value=$data->id_numbers;
			}
			else
			{
				$value=set_value('id_numbers');
			} ?>
			<?= form_input(['id'=>'id_numbers','name'=>'id_numbers','class'=>'form-control','value'=>$value]);?>
			<?= form_error('id_numbers'); ?>
			
		</div>
		<div class="form-group col-sm-4">
			<label for="id_type" class=" form-control-label">ID Type</label>
			<select name="id_type" id="identification_types" class="form-control m-input" style="" required="" <?php echo $disabled; ?>>
			<option value="CR" <?php if($value1 == "CR") echo "selected"; ?>><?php echo $this->lang->line("CR"); ?></option>
			<option value="National Id" <?php if($value1 == "National Id") echo "selected"; ?>><?php echo $this->lang->line("National_ID"); ?></option>
			<option value="Aqama" <?php if($value1 == "Aqama") echo "selected"; ?>><?php echo $this->lang->line("Aqama"); ?></option>
			<option value="Other" <?php if($value1 == "Other") echo "selected"; ?>><?php echo $this->lang->line("Other"); ?></option>
			</select>
		
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
	  </div>
	  </div>
	  <div class="col-lg-12">
									<?php  
										$submit=$this->lang->line('Submit');
									echo form_submit(['id'=>'addadmin','value'=>$submit,'class'=>'btn btn-primary btn-lg']);
							 
									?>
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