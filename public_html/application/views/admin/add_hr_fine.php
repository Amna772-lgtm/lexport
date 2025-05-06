<?php
include('header.php');

?>

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
				 <?php echo $this->lang->line('Fine');?> 
			<?php	} else { ?>
				 <?php echo $this->lang->line('Add_Fine');?> 
		<?php } ?>
                            </h3>
                        </div>

						
                    </div>
                </div>

                <!--begin::Form-->
              <?php echo form_open_multipart('admin/hr/store_hr_fine',['id'=>'hr','class'=>'m-form m-form--fit m-form--label-align-right m-form--group-seperator-dashed']);
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
                        <div class="form-group m-form__group row">
                           	<div class="form-group col-sm-4">
			<?php if($data)
			{
				$value=$data->user_id;
			}
			else
			{
				$value=set_value('user_id');
			} ?>
			<label for="fine_type" class=" form-control-label"><?php echo $this->lang->line('Select_Employee');?></label>
			<select id="clientsel" class="form-control" name="user_id">
		    	<option value=""><?php echo $this->lang->line('Select_Employee');?></option>
				<?php 
				$c  = isset($_POST['clients'])?$_POST['clients']:'';  
				$t  = isset($_POST['cases'])?$_POST['cases']:'';  
				foreach ($get_per_clients as $get_per_clients) {?>
		    	<option value="<?php echo $get_per_clients['id']?>" <?php if($value==$get_per_clients['id']) echo "selected=selected";?>><?php echo $get_per_clients['name']?></option>
				<?php }?>
				</select>
							<div class="form-error"><?= form_error('user_id'); ?></div>
		</div>	
		<div class="form-group col-sm-4">
			<?php if($data)
			{
				$value=$data->fine_type;
			}
			else
			{
				$value=set_value('fine_type');
			} ?>
			<label for="fine_type" class=" form-control-label"><?php echo $this->lang->line('Select_fine_type');?></label>
			<select name="fine_type" class="form-control"  >
				<option value=""><?php echo $this->lang->line('Select_fine_type');?></option>
				<?php foreach(getFine_list() as $list_data) { ?>
					<option value="<?php echo $list_data['id'] ?>" <?php if($value == $list_data['id']) echo "selected=selected"?>><?php echo $list_data['name'] ?></option>
				<?php } ?>
				
			</select>
						<div class="form-error"><?= form_error('fine_type'); ?></div>
		</div>
			<div class="form-group col-sm-4">
			<label for="start_date" class=" form-control-label"><?php echo $this->lang->line('Date');?></label>
			<?php if($data)
			{
				$value=$data->start_date;
			}
			else
			{
				$value=set_value('start_date');
			} ?>
			<?= form_input(['name'=>'start_date','id'=>'start_date','readonly'=>'readonly','class'=>'form-control appdate','value'=>$value]);?>
			<div class="form-error"><?= form_error('start_date'); ?></div>
		</div>
	  	<div class="form-group col-sm-12">
	  		<label for="reason" class=" form-control-label"><?php echo $this->lang->line('Reason');?></label>
	  		<?php if($data)
			{
				$value=$data->reason;
			}
			else
			{
				$value=set_value('reason');
			} ?>
	  		<?= form_textarea(['name'=>'reason','class'=>'form-control','value'=>$value,'rows'=>'4']);?>
	  		<div class="form-error"><?= form_error('reason'); ?></div>
	  	</div>
		</div>
		<?php 
	 
	 $submit=$this->lang->line('Submit');
	 echo form_submit(['id'=>'addcustomer','value'=>$submit,'class'=>'btn btn-primary btn-lg mt-4']);
 
 ?>
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