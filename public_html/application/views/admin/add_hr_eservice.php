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
				 <?php echo $this->lang->line('Edit_HR_E_Service');?>
			<?php	} else { ?>
				 <?php echo $this->lang->line('Add_HR_E_Service');?> 
		<?php } ?>
                            </h3>
                        </div>
                    </div>
                </div>

                <!--begin::Form-->
              <?php echo form_open_multipart('admin/hr/store_hr_service',['id'=>'hr']);
			if($data)
			{
				 echo form_hidden('id',$data->id); 
			}
			else
			{
				 echo form_hidden('id',''); 
			}
	?>
		<?php if($data)
			{
				$value=$data->service_type;
			}
			else
			{
				$value=set_value('service_type');
			} ?>
                    <div class="m-portlet__body theme-inner-form">
					<div class="form-field-container">
                        <div class="form-group m-form__group row">
                            <div class="col-lg-4">
							<label for="service_type" class=" form-control-label"><?php echo $this->lang->line('Select_service');?></label>
							<select name="service_type" class="form-control m-bootstrap-select m-bootstrap-select--air m-bootstrap-select--pill m_selectpicker"  >
							<option value=""><?php echo $this->lang->line('Select_Request_Type');?></option>
							<?php foreach(getHrEservice_list() as $list_data) { ?>
							<option value="<?php echo $list_data['id'] ?>" <?php if($value == $list_data['id']) echo "selected=selected"?>><?php echo $list_data['name'] ?></option>
							<?php } ?>

							</select>	
							<div class="form-error"><?= form_error('service_type'); ?></div>
                            </div>
                            <div class="col-lg-4">
                               <label for="start_date" class=" form-control-label"><?php echo $this->lang->line('Start_Date');?></label>
								<?php if($data)
								{
									$value=$data->start_date;
								}
								else
								{
									$value=set_value('start_date');
								} ?>
								<?= form_input(['name'=>'start_date','id'=>'start_date','readonly'=>'readonly','class'=>'form-control cd','value'=>$value]);?>
								<div class="form-error"><?= form_error('start_date'); ?></div>
                            </div>
                            <div class="col-lg-4">
                             <label for="end_date" class=" form-control-label"><?php echo $this->lang->line('End_Date');?></label>
								<?php if($data)
								{
									$value=$data->end_date;
								}
								else
								{
									$value=set_value('end_date');
								} ?>
								<?= form_input(['name'=>'end_date','id'=>'end_date','readonly'=>'readonly','class'=>'form-control sd','value'=>$value]);?>
								<div class="form-error"><?= form_error('end_date'); ?></div>
								<?php
								if($data)
								{
									echo form_hidden('id',$data->id); 
								}
								else
								{
									echo form_hidden('id',''); 
								}
								?>
                            </div>
                            <div class="col-lg-12" style="margin-top: 30px;">
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
						//if(isset($datas[14][5]) && $datas[14][5] == 1){
							$submit=$this->lang->line('Submit');
						echo form_submit(['id'=>'addcustomer','value'=>$submit,'class'=>'btn btn-primary btn-lg mt-4']);
						// }
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

?>
<script>
        $(".cd").calendarsPicker({
			  calendar: $.calendars.instance('<?php if($this->session->userdata('admin_site_lang')=="arabic") echo "islamic"; else echo ""; ?>',
			  '<?php if($this->session->userdata('admin_site_lang')=="arabic") echo "ar"; else echo "en"; ?>'),
				showOtherMonths: true, 
				dateFormat: "dd/mm/yyyy",
				<?php if($this->session->userdata('admin_site_lang')=="arabic") {?> defaultDate: +1,selectDefaultDate:true, <?php } ?>
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
			  calendar: $.calendars.instance('<?php if($this->session->userdata('admin_site_lang')=="arabic") echo "islamic"; else echo ""; ?>',
			  '<?php if($this->session->userdata('admin_site_lang')=="arabic") echo "ar"; else echo "en"; ?>'),
				showOtherMonths: true, 
				<?php if($this->session->userdata('admin_site_lang')=="arabic") {?> defaultDate: +1,selectDefaultDate:true, <?php } ?>
				dateFormat: "dd/mm/yyyy",
				onClose: function () {
                var cd = $('.cd').calendarsPicker('getDate');
                console.log(cd);
                var sd = $('.sd').calendarsPicker('getDate');
                if (sd <= cd) {
					alert("End date can not be greater than start date");
                    var minDate = $('.sd').calendarsPicker('option', 'minDate');
                    $('.sd').calendarsPicker('setDate', minDate);
                }
            }
        });
</script>