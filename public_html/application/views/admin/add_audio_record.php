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
								 <?php echo $this->lang->line('Edit_Audio');?> 
							<?php	} else { ?>
								 <?php echo $this->lang->line('Add_Audio');?> 
							<?php } ?>
                            </h3>
                        </div>
						<!-- <div class="theme-new-nav-menu"> -->
                            <!-- <a class="back-link" href="http://lexport.demosbywpsqr.com/admin/admin/audio_list">
								<svg width="16" height="14" viewBox="0 0 16 14" fill="none" xmlns="http://www.w3.org/2000/svg">
								<path fill-rule="evenodd" clip-rule="evenodd" d="M7.70679 13.7006C7.51926 13.888 7.26495 13.9934 6.99979 13.9934C6.73462 13.9934 6.48031 13.888 6.29279 13.7006L0.292786 7.70057C0.105315 7.51304 0 7.25874 0 6.99357C0 6.72841 0.105315 6.4741 0.292786 6.28657L6.29279 0.286571C6.48139 0.104413 6.73399 0.00361876 6.99619 0.00589718C7.25838 0.0081756 7.5092 0.113345 7.6946 0.298753C7.88001 0.484161 7.98518 0.734973 7.98746 0.99717C7.98974 1.25937 7.88894 1.51197 7.70679 1.70057L3.41379 5.99357H14.9998C15.265 5.99357 15.5194 6.09893 15.7069 6.28646C15.8944 6.474 15.9998 6.72835 15.9998 6.99357C15.9998 7.25879 15.8944 7.51314 15.7069 7.70068C15.5194 7.88821 15.265 7.99357 14.9998 7.99357H3.41379L7.70679 12.2866C7.89426 12.4741 7.99957 12.7284 7.99957 12.9936C7.99957 13.2587 7.89426 13.513 7.70679 13.7006Z" fill="#333333"/>
								</svg>
								Back</a> -->
                            <!-- <ul>
                                <li> <a href="http://lexport.demosbywpsqr.com/admin/c_case/padding_list">Waiting list</a> </li>
                                <li> <a href="http://lexport.demosbywpsqr.com/admin/customer/list_customer">List Customers</a> </li>
                                <li> <a href="http://lexport.demosbywpsqr.com/admin/mission_session/list_mission">Cases</a> </li>
                                <li> <a href="http://lexport.demosbywpsqr.com/admin/mission_writings/list_mission">Writing</a> </li>
                                <li> <a href="http://lexport.demosbywpsqr.com/admin/mission_consultation/list_mission">Consultation</a> </li>
                                <li> <a href="http://lexport.demosbywpsqr.com/admin/mission_visiting/list_mission">Meeting</a> </li>
                                <li> <a href="http://lexport.demosbywpsqr.com/admin/mission_general/list_mission">General</a> </li>
                                <li> <a href="http://lexport.demosbywpsqr.com/admin/assignment">Assignment</a> </li>
                                <li> <a href="http://lexport.demosbywpsqr.com/admin/archive/list_archive">Archives</a> </li>
                                <li class="active"> <a href="http://lexport.demosbywpsqr.com/admin/admin/audio_list">Audio Record</a> </li>
                                <li> <a href="http://lexport.demosbywpsqr.com/admin/admin/list_note">Note List</a> </li>
                            </ul>

                            <a class="btn btn-primary" href="#"> <i class="fa fa-plus"></i> Assign</a> -->
                        <!-- </div> -->
                    </div>
                </div>

                <!--begin::Form-->
               
<?php echo form_open_multipart('admin/admin/add_audio_record',['id'=>'employer','class'=>'m-form m-form--fit m-form--label-align-right m-form--group-seperator-dashed']);

	if($data)
			{
				 echo form_hidden('id',$data['id']); 
				 $doc_id = $data['file_name'];
				 
			}
			else
			{
				$doc_id = "AUI".rand();
				 echo form_hidden('id',''); 
			}
			echo form_hidden('file_name',$doc_id); 
		?>
                    <div class="m-portlet__body theme-inner-form">
						<div class="form-field-container">
                        	<div class="form-group m-form__group row">
								<div class="col-lg-6">
									<label for="User Id" class=" form-control-label"> <?php echo $this->lang->line('User_Id');?></label>
								
									<?php
									
									
									if($data)
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
									
									<select class="form-control m-bootstrap-select m-bootstrap-select--air m-bootstrap-select--pill m_selectpicker"  id="clientsel" name="user_id">
										<option value=""><?php echo $this->lang->line('Select_Customer');?> </option>
										<?php  foreach ($users as $get_per_clients) {?>
											<?php if($this->session->userdata('role_id') == 1){ ?>
												<option value="<?php echo $get_per_clients['id']?>" <?php if($value==$get_per_clients['id']){ echo "selected=selected";}?>><?php echo $get_per_clients['name']?></option>
											<?php } else {?>
											
												<option value="<?php echo $get_per_clients['customers_id']?>" <?php if($value==$get_per_clients['customers_id']){ echo "selected=selected"; }?>><?php echo $get_per_clients['client_name']?></option>
											<?php } } ?>	    
									</select>
									<div class="form-error"><?= form_error('user_id'); ?></div>
									
								</div>
		  
								<div class="col-lg-6">
									<label for="audio_name" class=" form-control-label"><?php echo $this->lang->line('Audio_Name');?></label>
	
									<?php if($data)
									{
										$value=$data['audio_name'];
									}
									else
									{
										$value=set_value('audio_name');
									} ?>
									<?= form_input(['id'=>'audio_name','name'=>'audio_name','class'=>'form-control','value'=>$value,'rows'=>5,'cols'=>5]);?>
									<div class="form-error"><?= form_error('audio_name'); ?></div>
		
								</div>
								<div class="col-lg-6" style="margin-top: 30px">
									<label for="date" class=" form-control-label"><?php echo $this->lang->line('Date');?></label>
									<?php if($data)
									{
										$value=$data['date'];
									}
									else
									{
										$value=set_value('date');
									} ?>
									<?= form_input(['id'=>'','name'=>'date','class'=>'form-control appdate','value'=>$value,"readonly"=>"readonly"]);?>
									<div class="form-error"><?= form_error('date'); ?></div>
									
								</div>

								<div class="col-lg-12" style="margin-top: 30px">
									<label for="note" class=" form-control-label"><?php echo $this->lang->line('Description');?> / <?php echo $this->lang->line('Note');?></label>
									<?php if($data)
									{
										$value=$data['note'];
									}
									else
									{
										$value=set_value('note');
									} ?>
									<?= form_textarea(['id'=>'note','name'=>'note','class'=>'form-control','value'=>$value,'rows'=>5,'cols'=>5]);?>
									<div class="form-error"><?= form_error('note'); ?></div>
		
								</div>
								
								<div class="col-lg-12" style="margin-top: 30px">
									<div class="form-field-container">
										<h3><?php echo $this->lang->line('Record_Audio');?></h3>
										<div class="form-group m-form__group row">
											<div class="col-12">
												<label for="note" class=" form-control-label"><?php echo $this->lang->line('Enter_Audio_File_Name');?></label>
												<?= form_input(['id'=>'audio_name','class'=>'form-control audio_name']);?>

												<div class="theme-audio-play-box">
													<audio controls id="audio" name="audio" style="margin: 20px 0;"></audio>
													<div class="btn-group">
														<a class="btn btn-primary btn-sm recordButton" id="record"><?php echo $this->lang->line('Record');?></a>
														<a class="btn btn-primary btn-sm recordButton" id="recordFor5"><?php echo $this->lang->line('Record_For_5_Seconds');?></a>
														<a class="btn btn-primary btn-sm disabled one" id="pause"><?php echo $this->lang->line('Pause');?></a>
														<a class="btn btn-primary btn-sm disabled one" id="stop"><?php echo $this->lang->line('Reset');?></a>
													</div>
												</div>
												<div>
													<input class="button" type="checkbox" id="live"/>
													<label for="live"><?php echo $this->lang->line('Live_Output');?></label>
												</div>
												<div data-type="wav" style="margin: 20px 0;">
													<p><?php echo $this->lang->line('WAV_Controls');?>:</p>
													<a class="btn btn-primary btn-sm disabled one" id="play"><?php echo $this->lang->line('Play');?></a>
													<a class="btn btn-primary btn-sm disabled one" id="download"><?php echo $this->lang->line('Download');?></a>
													<a class="btn btn-primary btn-sm disabled one" id="base64"><?php echo $this->lang->line('Base64_URL');?></a>
													<a class="btn btn-primary btn-sm disabled one" id="save"><?php echo $this->lang->line('Upload_to_Server');?></a>
												</div>                                                                                                                                                                                      
												<div data-type="mp3">
													<p><?php echo $this->lang->line('MP3_Controls');?>:</p>
													<a class="btn btn-primary btn-sm disabled one" id="play"><?php echo $this->lang->line('Play');?></a>
													<a class="btn btn-primary btn-sm disabled one" id="download"><?php echo $this->lang->line('Download');?></a>
													<a class="btn btn-primary btn-sm disabled one" id="base64"><?php echo $this->lang->line('Base64_URL');?></a>
													<a class="btn btn-primary btn-sm disabled one" id="save"><?php echo $this->lang->line('Upload_to_Server');?></a>
													<canvas id="level" height="200" width="400"></canvas> 
												</div>
											</div>
										</div>
									</div>
								</div>
								
								<div class="col-lg-12">
                                	<div class="form-field-container">
										<h3><?php echo $this->lang->line('Audio_Record_List');?></h3>
										<div class="m-widget4">

											<div class="form-group m-form__group row">
												<div class="col-md-12">
													<?php
														$audio = $this->db->select('audio,id,user_id,create_date')->where('audioid',$doc_id)->get('uploads')->result_array();
														foreach ($audio as $audio) {  $timestamp = strtotime($audio['create_date']); $date  =   date("d M Y G:i",$timestamp); ?>
														<div class="docloopa">
															<?php echo "<b>" . $audio['audio']."</b>"; ?>
															<?php echo "<small>&nbsp;&nbsp; Uploaded By " .getEmployeeName($audio['user_id'])."</small>"; ?>
															<?php echo "<small>&nbsp;&nbsp;" .$date."</small>"; ?>
															<span class="dwndelbtn">
															<a href="<?=base_url('uploads/audio/' . $audio["audio"]);?>" class='btn btn-success btn-sm' download><?php echo $this->lang->line('Download');?></a> 
												
															</span>
														</div>
													<?php }?>
													<div class="putaudiores"></div>
                                        		</div>
                                    		</div>
                            			</div>

                       				</div>

                    			</div>
								
						</div>
					</div>
					<div class="m-portlet__foot m-portlet__no-border m-portlet__foot--fit">
				<div class="m-form__actions m-form__actions--solid">
					<div class="row">
						<div class="col-lg-6">
						
							<?php $submit=$this->lang->line('Submit'); echo form_submit(['id'=>'addcustomer','value'=>$submit,'class'=>'btn btn-primary btn-lg']);  ?> <!--														<button type="reset" class="btn btn-secondary">Cancel</button>-->
						</div>
						
					</div>
				</div>
			</div>
               	</form>
				   
                <!--end::Form-->
            </div>
				<span class="audioid" id="<?php echo $doc_id; ?>"></span>
				<span class="audioocaseid" id=""></span>
				<span class="type" id="audio"></span>
				<span class="sessionid" id="<?php echo $this->session->userdata('admin_id'); ?>"></span>
            <!--end::Portlet-->
        	</div>
			
    </div>

<style>
		.button{
			display: inline-block;
			vertical-align: middle;
			margin: 0px 5px;
			padding: 5px 12px;
			cursor: pointer;
			outline: none;
			font-size: 13px;
			text-decoration: none !important;
			text-align: center;
			color:#fff;
			background-color: #4D90FE;
			background-image: linear-gradient(top,#4D90FE, #4787ED);
			background-image: -ms-linear-gradient(top,#4D90FE, #4787ED);
			background-image: -o-linear-gradient(top,#4D90FE, #4787ED);
			background-image: linear-gradient(top,#4D90FE, #4787ED);
			border: 1px solid #4787ED;
			box-shadow: 0 1px 3px #BFBFBF;
		}
		a.button{
			color: #fff;
		}
		.button:hover{
			box-shadow: inset 0px 1px 1px #8C8C8C;
		}
		.button.disabled{
			box-shadow:none;
			opacity:0.7;
		}
    canvas{
      display: block;
    }
		</style>
<?php include "footer.php"; ?>
 
<script src="<?= base_url('assets/js/audio/app.js'); ?>"></script>
<script src="<?= base_url('assets/js/audio/Fr.voice.js'); ?>"></script>
<script src="<?= base_url('assets/js/audio/libmp3lame.min.js'); ?>"></script>
<script src="<?= base_url('assets/js/audio/mp3Worker.js'); ?>"></script>
<script src="<?= base_url('assets/js/audio/recorder.js'); ?>"></script>
<script type="text/javascript">
	
 

</script>