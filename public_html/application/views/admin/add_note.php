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
					<?php echo $this->lang->line('Edit_Note');?>
			<?php	} else { ?>
					<?php echo $this->lang->line('Add_Note');?>
		<?php } ?>
                            </h3>
                        </div>
                    </div>
                </div>

                <!--begin::Form-->
              <?php echo form_open('admin/admin/store_note',['id'=>'employer','class'=>'m-form m-form--fit m-form--label-align-right m-form--group-seperator-dashed']);

				if($data)
						{
							echo form_hidden('id',$data['id']); 
						}
						else
						{
							echo form_hidden('id',''); 
						}
					?>
					<?php if($data)
						{
							$value=$data['user_id'];
						}
						else
						{
							$value=set_value('user_id');
						} ?>
						<?php if($this->session->userdata('role_id') == 1){
					$users =  $this->db->select("users.*,chat.create_date,chat.user_id")->join('chat', "chat.user_id = users.id", 'left')
						->where("users.role_id",3)->order_by('chat.create_date', 'DESC')->group_by('users.id')
						->get("users")
						->result_array();
					} ELSE {
						$users =  $this->db->select("customers.*,chat.create_date,chat.user_id")->join('chat', "chat.user_id = customers.user_id", 'left')
						->where("customers.user_id",$this->session->userdata('admin_id'))->order_by('chat.create_date', 'DESC')->group_by('customers.user_id')
						->get("customers")
						->result_array();
					} ?>
                    <div class="m-portlet__body theme-inner-form">
						<div class="form-field-container">
							<div class="form-group m-form__group row">
								<div class="col-lg-6">
									<label for="name" class=" form-control-label"><?php echo $this->lang->line('Select_Customer');?></label>
									<select class="form-control m-bootstrap-select m-bootstrap-select--air m-bootstrap-select--pill m_selectpicker"  id="clientsel" name="user_id">
										<option value=""><?php echo $this->lang->line('Select_Customer');?> </option>
			
										<?php  foreach ($users as $get_per_clients) {?>
										<?php if($this->session->userdata('role_id') == 1){ ?>
											<option value="<?php echo $get_per_clients['id']?>" <?php if($value==$get_per_clients['id']){ echo "selected=selected";}?>><?php echo $get_per_clients['name']?></option>
										<?php } else {?>
										
											<option value="<?php echo $get_per_clients['customers_id']?>" <?php if($value==$get_per_clients['customers_id']){ echo "selected=selected";  }?>><?php echo $get_per_clients['client_name']?></option>
										<?php } } ?>   
									</select>
									<div class="form-error"><?= form_error('user_id'); ?></div>
								</div>
			
								<div class="col-lg-6">
									<label for="name" class=" form-control-label"><?php echo $this->lang->line('Select_E_Service');?></label>
									<?php if($data)
									{
										$value=$data['case_id'];
									}
									else
									{
										$value=set_value('case_id');
									} ?>
									<select class="form-control m-bootstrap-select m-bootstrap-select--air m-bootstrap-select--pill m_selectpicker" id="casesel" name="case_id">
									<option value=""><?php echo $this->lang->line('Select_E_Service');?></option>
									<?php  foreach ($get_per_case as $get_per_case) {?>
									<option value="<?php echo $get_per_case['id']?>"  <?php if($value == $get_per_case['id']) echo "selected"; ?>><?php echo $get_per_case['case_number']?></option>
									<?php }?>	    
									</select> 
									<div class="form-error"><?= form_error('case_id'); ?></div>
								</div>
								<div class="col-lg-6" style="margin-top:30px;">
									<label for="Note Id" class=" form-control-label"> <?php echo $this->lang->line('Select_Appointment');?> / <?php echo $this->lang->line('Mission_Type');?></label>
									<?php if($data)
									{
										$value=$data['mission_type'];
									}
									else
									{
										$value=$mission_type;
									} ?>
									<select class="form-control m-bootstrap-select m-bootstrap-select--air m-bootstrap-select--pill m_selectpicker" id="casesel" name="mission_type">
										<option value=""><?php echo $this->lang->line('Select_Appointment');?> / <?php echo $this->lang->line('Mission_Type');?></option>    
										<option value="Session" <?php if($value == "Session") echo "selected"; ?>><?php echo $this->lang->line('Session');?></option> 
										<option value="Visiting" <?php if($value == "Visiting") echo "selected"; ?>><?php echo $this->lang->line('Visiting');?></option> 
										<option value="Writings" <?php if($value == "Writings") echo "selected"; ?>><?php echo $this->lang->line('Writings');?></option> 
										<option value="Consultation" <?php if($value == "Consultation") echo "selected"; ?>><?php echo $this->lang->line('Consultation');?></option>  
										<option value="General" <?php if($value == "General") echo "selected"; ?>><?php echo $this->lang->line('General');?></option>  
									</select> 
								<div class="form-error"><?= form_error('mission_type'); ?></div>
									
								</div>
								<div class="col-lg-6" style="margin-top:30px;">
									<label for="date" class=" form-control-label"><?php echo $this->lang->line('Date');?></label>
									<?php if($data)
									{
										$value=$data['date'];
									}
									else
									{
										$value=set_value('date');
									} ?>
									<?= form_input(['id'=>'','readonly'=>'readonly','name'=>'date','class'=>'form-control appdate','value'=>$value]);?>
									<div class="form-error"><?= form_error('date'); ?></div>
									
								</div>
								<div class="col-lg-12" style="margin-top:30px;">
									<label for="discription" class=" form-control-label"><?php echo $this->lang->line('Description');?> / <?php echo $this->lang->line('Note');?></label>
									<?php if($data)
									{
										$value=$data['discription'];
									}
									else
									{
										$value=set_value('discription');
									} ?>
									<?= form_textarea(['id'=>'discription','name'=>'discription','class'=>'form-control','value'=>$value,'rows'=>5,'cols'=>5]);?>
									<div class="form-error"><?= form_error('description'); ?></div>
								
								</div>
							</div>

							<?php $submit=$this->lang->line('Submit');
								echo form_submit(['value'=>$submit,'class'=>'btn btn-primary btn-lg mt-4']);
							?>
						</div>
					</div>
                    
                </form>

                <!--end::Form-->
            </div>

            <!--end::Portlet-->
        </div>
    </div>

<?php include "footer.php"; ?>
<script type="text/javascript">
	
$(document).ready(function()
{
	$('#user_id').focusout(function(){
		var id=$(this).val();
		$.ajax({
   			 type: 'POST',
   			url: "<?php echo base_url('admin/admin/find_note_user'); ?>", // <-- properly quote this line
   			cache: false,
    		data: {id: id}, // <-- provide the branch_id so it will be used as $_POST['branch_id']
    		dataType: 'JSON', // <-- add json datatype
    		success: function(data) {
    				$("#name").val(data['name']); 			
    			
      		 	
    		},
    		error:function(){
    			$("#name").val("");
    		},
    });
  });
$('#date').datetimepicker({  format: 'yyyy-mm-dd',  minView: 2, pickTime: false, autoclose: true,startDate: new Date()});
});
$('#clientsel').on('change', function() {
var url="<?= base_url('admin/archive/select_case_id'); ?>"; 
var id = this.value;
$.ajax({
  type:'ajax',
  method:'post',
  url:url,
  data:{"id" : id},
  success:function(data){
 
	$('#casesel').html(data);
  },
});
});
</script>