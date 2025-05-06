<?php include __DIR__ . "/../header.php"; ?>

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
		.addnewhtml {
    width: 100%;
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
                               <?php if($data){ ?>
				<?php echo $this->lang->line('Edit_General');?>
			<?php	} else { ?>
				<?php //sub
				if($this->uri->segment(5)){
				echo "Add General Sub Mission For #".getMissionNumber($this->uri->segment(5),"general_mission");
				} else {
				    echo $this->lang->line('ADD_GENERAL'); 
				} 
				//sub
				?>
				 
		<?php } ?>
                            </h3>
                        </div>
                    </div>
                </div>

                <!--begin::Form-->
 
 <?php echo form_open_multipart('admin/mission_general/store_mission',['id'=>'customer','class'=>'m-form m-form--fit m-form--label-align-right m-form--group-seperator-dashed']);
		  //sub
		 	$sub_mission_id=set_value('sub_mission_id',$this->uri->segment(5));
		 if($sub_mission_id){ 
		     
	     	    echo form_hidden('sub_mission_id',$sub_mission_id); 
		 }
		 //sub
		 if($data) $temp_app_id = $data->id; else  $temp_app_id = "0"; 
		if($data)
			{
				 echo form_hidden('id',$data->id); 
			}
			else
			{
				 echo form_hidden('id',''); 
			}
		?>
		<?php
			$case_id = ''; 
			if($case_data)
			{
				$case_id = $case_data->id;
			} else {
				$case_id = $case_data->id;
			}
			echo form_hidden('case_id',$case_id); 
			echo form_hidden('client_file_number',$case_data->client_file_number); 
		?>
                    <div class="m-portlet__body theme-inner-form">

                        <div class="form-field-container">
						<h3><?php echo $this->lang->line('General_Information');?></h3>
                            <div class="form-group m-form__group row">
							<div class="form-group col-sm-4">
			<label for="session_number" class=" form-control-label"><?php echo $this->lang->line('General_Number');?></label>
			<?php if($data)
			{
				$session_number=$data->session_number;
			}
			else
			{
			if($sub_mission_id){
		        $sct = str_pad(getMissionCount($sub_mission_id,"general_mission") + 1, 2, 0, STR_PAD_LEFT);
			    	$session_number=set_value('session_number',getMissionNumber($this->uri->segment(5),'general_mission')."/".$sct);
				} else {
			    	$session_number=set_value('session_number', mission_rand($case_id,'GN'));
				}
			} ?>
			<?= form_input(['name'=>'session_number','class'=>'form-control','value'=>$session_number,'readonly'=>'readonly']);?>
			<div class="form-error"><?= form_error('session_number'); ?></div>
		</div>
		<div class="form-group col-sm-4">
			<label for="consultation_code" class=" form-control-label"><?php echo $this->lang->line('E_Service_Number');?></label>
			<?= form_input(['id'=>'case_id','placeholder'=>'','class'=>'form-control','value'=>$case_data->case_number,'readonly'=>'readonly']);?>
		</div>
			<?php if($data)
			{
				$value=$data->general_type;
			}
			else
			{
				$value=set_value('general_type');
			} ?>
		<div class="form-group col-sm-4">
			<label for="consultation_code" class=" form-control-label"><?php echo $this->lang->line('General_Type');?></label>
			<select class="form-control" id="general_type" name="general_type"><option value=""><?php echo $this->lang->line('Select_General_Type');?> </option><?php  foreach ($task_type as $task_type) { ?>
			<option value="<?php echo $task_type["id"]?>"  <?php if($value ==  $task_type["id"]) echo "selected=selected";?> ><?php echo $task_type["name"]?></option><?php } ?></select>
		</div>
		<div class="form-group col-sm-4">
			<label for="session_date" class=" form-control-label"><?php echo $this->lang->line('General_Date');?>*</label>
			<?php if($data)
			{
				$value=$data->session_date;
				 $parts = explode('/', $value);
            if($this->session->userdata('admin_site_lang')=="arabic" OR $this->session->userdata('admin_site_lang')=="") { 
                $value = Greg2Hijri($parts[0], $parts[1], $parts[2],true);
            }
			}
			else
			{
				$value=set_value('session_date');
			}

			?>

			
			<div class="input-group date">
		 			<?= form_input(['name'=>'session_date','id'=>'session_date','readonly'=>'readonly','class'=>'form-control appdate','value'=>$value]);?>
			<div class="input-group-append">
			<span class="input-group-text"><i class="fa fa-calendar-check-o"></i></span>
			</div>
			</div>
			
			<div class="form-error"><?= form_error('session_date'); ?></div>
		</div>

		<div class="form-group col-sm-4">
			<label for="session_time" class=" form-control-label"><?php echo $this->lang->line('General_Time');?>*</label>
			<?php if($data)
			{
				$value=$data->session_time;
			}
			else
			{
				$value=set_value('session_time');
			} ?>

			
			<div class="input-group date">
		 			<?= form_input(['name'=>'session_time','id'=>'session_time','required'=>'required','autocomplete'=>'off','class'=>'form-control deedate','value'=>$value]);?>
			<div class="input-group-append">
			<span class="input-group-text"><i class="fa fa-clock-o"></i></span>
			</div>
			</div>
			<div class="form-error"><?= form_error('session_time'); ?></div>
		</div>
		
		<div class="form-group col-sm-4">
			<label for="session_end_date" class=" form-control-label"><?php echo $this->lang->line('General_End_Date');?>*</label>
			<?php if($data)
			{
				$value=$data->session_end_date;
			    $parts = explode('/', $value);
                if($this->session->userdata('admin_site_lang')=="arabic" OR $this->session->userdata('admin_site_lang')=="") { 
                    $value = Greg2Hijri($parts[0], $parts[1], $parts[2],true);
                }
			}
			else
			{
				$value=set_value('session_end_date');
			}
			
			?>

			
			<div class="input-group date">
		 			<?= form_input(['name'=>'session_end_date','id'=>'session_end_date','readonly'=>'readonly','class'=>'form-control appdate','value'=>$value]);?>
			<div class="input-group-append">
			<span class="input-group-text"><i class="fa fa-calendar-check-o"></i></span>
			</div>
			</div>
			<div class="form-error"><?= form_error('session_end_date'); ?></div>
		</div>
			<div class="clear"></div>
		<div class="form-group col-sm-4">
			<label for="session_time" class=" form-control-label"><?php echo $this->lang->line('General_End_Time');?>*</label>
			<?php if($data)
			{
				$value=$data->session_end_time;
			}
			else
			{
				$value=set_value('session_end_time');
			} ?>

			
			<div class="input-group date">
		 			<?= form_input(['name'=>'session_end_time','id'=>'session_end_time','required'=>'required','autocomplete'=>'off','class'=>'form-control deedate','value'=>$value]);?>
			<div class="input-group-append">
			<span class="input-group-text"><i class="fa fa-clock-o"></i></span>
			</div>
			</div>
			<div class="form-error"><?= form_error('session_end_time'); ?></div>
		</div>

		<div class="form-group col-sm-4">	
		<?php if($data)
			{
				$value=$data->session_code;
			}
			else
			{
				$value=set_value('session_code');
			} ?>
			<label for="session_code" class=" form-control-label"><?php echo $this->lang->line('General_Status');?></label>
			<select name="session_code" class="form-control" >
					<option value=""><?php echo $this->lang->line('Please_Select_Mission_Status');?></option>
					<option value="active"<?php if($value =='active') echo "selected=selected"; ?>><?php echo $this->lang->line('Active');?></option>
					<option value="inactive"<?php if($value =='inactive') echo "selected=selected"; ?>><?php echo $this->lang->line('Inactive');?></option>
					<option value="reactivated"<?php if($value =='reactivated') echo "selected=selected"; ?>><?php echo $this->lang->line('Reactive');?></option>
			</select>
			<div class="form-error"><?= form_error('session_code'); ?></div>
		</div>
		<?php 
 
		$assginuser= $this->db->select('user_id')->where('client_file_number',$case_data->client_file_number)->get('customers')->row();
 if(isset($assginuser)){
		if($assginuser->user_id == $this->session->userdata('admin_id')|| $this->session->userdata('role_id') == 1){  ?> 
		<div class="form-group col-sm-4">
			<label for="responsible_employee" class=" form-control-label"><?php echo $this->lang->line('Responsible_Employee');?></label>
			<?php if($data)
			{
				$value=$data->responsible_employee;
			}
			else
			{
				$value=set_value('responsible_employee');
			} ?>
			<select class="form-control" id="" name="responsible_employee" value=""><option  value=""><?php echo $this->lang->line('Select_Employee');?> </option><?php  foreach ($employees as $employee) { ?><option value="<?php echo $employee["id"]?>"  <?php if($value ==  $employee["id"]) echo "selected=selected";?><?php if($case_data->responsible_employee ==  $employee["id"]) echo "selected=selected";?> ><?php echo $employee["name"]?></option><?php } ?></select>
			<div class="form-error"><?= form_error('responsible_employee'); ?></div>
		</div>
		<div class="clear"></div>
				<div class="form-group col-sm-6">		
			<label for="follow_up_employee" class=" form-control-label"><?php echo $this->lang->line('Follow_up_Employee');?></label>
			<?php if($data)
			{
				$value=$data->follow_up_employee;
			}
			else
			{
				$value=set_value('follow_up_employee');
			} ?>
			

		<select class="form-control" id="employee_id" name="follow_up_employee" value=""><option  value=""><?php echo $this->lang->line('Select_Employee');?> </option><?php  foreach ($employees as $employee) { ?><option value="<?php echo $employee["id"]?>"  <?php if($value ==  $employee["id"]) echo "selected=selected";?> <?php if($case_data->follow_up_employee ==  $employee["id"]) echo "selected=selected";?> ><?php echo $employee["name"]?></option><?php } ?></select>
			<div class="form-error"><?= form_error('follow_up_employee'); ?></div>
		</div>
		<?php } ?>
		<?php } ?>

		<div class="form-group col-sm-6">
			<label for="export_entry_no" class=" form-control-label"><?php echo $this->lang->line('Entry_No');?></label>
			<?php if($data)
			{
				$value=$data->entry_no;
			}
			else
			{
				$value=set_value('entry_no');
			} ?>
			<?= form_input(['name'=>'entry_no','class'=>'form-control','value'=>$value]);?>
			<div class="form-error"><?= form_error('entry_no'); ?></div>
		</div>
		
		<div class="form-group col-sm-4">
			<label for="export_entry_no" class=" form-control-label"><?php echo $this->lang->line('Outgoing_Entry');?></label>
			<?php if($data)
			{
				$value=$data->export_entry_no;
			}
			else
			{
				$value=set_value('export_entry_no');
			} ?>
			<?= form_input(['name'=>'export_entry_no','class'=>'form-control','value'=>$value]);?>
			<div class="form-error"><?= form_error('export_entry_no'); ?></div>
		</div>
		
		
		
		<div class="form-group col-sm-4">
			<label for="import_entry_no" class=" form-control-label"><?php echo $this->lang->line('Incoming_Entry');?></label>
			<?php if($data)
			{
				$value=$data->import_entry_no;
			}
			else
			{
				$value=set_value('import_entry_no');
			} ?>
			<?= form_input(['name'=>'import_entry_no','class'=>'form-control','value'=>$value]);?>
			<div class="form-error"><?= form_error('import_entry_no'); ?></div>
		</div>
			<div class="form-group col-sm-4">
		    	<?php if($data)
			{
				$value=$data->subject;
			}
			else
			{
				$value=set_value('subject');
			} ?>
			
			<label for="subject" class=" form-control-label"><?php echo $this->lang->line('Subject');?></label>
			<?= form_input(['name'=>'subject','placeholder'=>'','class'=>'form-control','value'=>$value]);?>
		</div>

		<!--<div class="form-group col-sm-4">
			<label for="note" class=" form-control-label">Upload Files</label>
			<?= form_upload(['name'=>'upload_file','class'=>'form-control']);?>
			<?php if($data) {?> 
				<img height="150" width="200"  src=" <?php echo '../../../uploads/appoinment/session_appoinment/'.$data->upload_file ?>"> 
			<?php }	?>
			<div class="form-error"><?= form_error('note'); ?></div>
		</div>-->
	 
                            </div>
                        </div>

                        

                       
						<div class="form-field-container">
						<h3><?php echo $this->lang->line('Requirement');?>*</h3>
						<div class="form-group m-form__group row">
						<div class="col-lg-12">
						<?php if($data)
						{
						$value=$data->note;
						}
						else
						{
						$value=set_value('note');
						} ?>
						<?= form_textarea(['name'=>'note','class'=>'form-control','rows'=>'4','value'=>$value,"required"=>"required"]);?>
						<div class="form-error"><?= form_error('note'); ?></div>

						</div>
						</div>
						</div>
					
                        <div class="form-field-container">
						<h3><?php echo $this->lang->line('Report');?></h3>
                            <div class="form-group row">
 
	<?php if($data)
			{
				$value=$data->report;
			}
			else
			{
				$value=set_value('report');
			} ?>
			<textarea name="report" id="report"><?php echo $value ?></textarea>
			<span style="color:red" id="reporterorr"></span>
		<script>
			CKEDITOR.replace( 'report' );
		</script>
							</div>

                            
                        </div>

						
						<div class="form-field-container">
						<h3><?php echo $this->lang->line('Decision');?>*</h3>
						<div class="form-group m-form__group row">
						<?php if($data)
						{
						$value=$data->decision;
						}
						else
						{
						$value=set_value('decision');
						} ?>
						<div class="col-lg-12">
						<?= form_textarea(['name'=>'decision','id'=>'decision','class'=>'form-control','rows'=>'4','value'=>$value]);?>
						<div class="form-error"><?= form_error('decision'); ?></div>
						<span style="color:red" id="decisionerorr"></span>
						</div>
						</div>
						</div>
                      
                       
                        <div class="form-field-container">
							<h3><?php echo $this->lang->line('Note');?></h3>
                            <div class="form-group row">
 			<div class="addnewhtml">
						<?php if($data){ foreach($note_data as $cn) { ?>
			<div class="alert alert-<?php if($cn['role_id'] == 1) echo "info"; if($cn['role_id'] == 2) echo "warning"; if($cn['role_id'] == 4) echo "success"; ?>">
			<?php echo $cn['note']; ?> <small><i class="float-right"><?php echo getEmployeeName($cn['user_id']);?> &nbsp;<?php $timestamp = strtotime($cn['create_date']); echo  date("d M Y G:i",$timestamp);?></i></small>
			</div>
			<?php } } else {
			$note_data_temp = $this->db->select('*')->where('temp_app_id',$this->session->userdata('temp_app_id'))->get('case_note')->result_array();
			foreach($note_data_temp as $cn) { ?>
			<div class="alert alert-<?php if($cn['role_id'] == 1) echo "info"; if($cn['role_id'] == 2) echo "warning"; if($cn['role_id'] == 4) echo "success"; ?>">
			<?php echo $cn['note']; ?> <small><i class="float-right"><?php echo getEmployeeName($cn['user_id']);?> &nbsp;<?php $timestamp = strtotime($cn['create_date']); echo  date("d M Y G:i",$timestamp);?></i></small>
			</div>
			<?php } } ?>
			</div>	
			<textarea value="" rows="4" id="comment" class="form-control"></textarea> 
			<div class="row col-md-12"><span class="commenterror" style="color:red"></span>	</div>
			 
			<a href="javascript:;" class="btn btn-success btn-lg" style="margin-top:20px" id="btncmt"><?php echo $this->lang->line('Add_New_Note');?></a>
							</div>
							</div>
                        <div class="form-field-container">
						<h3><?php echo $this->lang->line('File_Upload');?></h3>
                            <div class="form-group m-form__group row">
  
 <div class="card-body card-block">
		<div class="attced-block case-block">
		<div class="upload-block">
			<div class="flex">
				<div id="mission"></div>
				<div class="upload-area"></div>
			
			</div>
	</div>
</div>
<div class="clear"></div>
</div>
							</div>

                            
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                             
                                <div class="form-field-container">
								<h3><?php echo $this->lang->line('Record_Audio');?></h3>
                                    <div class="form-group m-form__group row">
                                        <div class="m_bo" style="padding: 20px;width: 100%;">
											<label for="note" class=" form-control-label"><?php echo $this->lang->line('Enter_Audio_File_Name');?></label>
			<?= form_input(['id'=>'audio_name','class'=>'form-control audio_name']);?>
		 
			<audio class="mt-4" style="width: 100%;" controls id="audio" name="audio"></audio>
		<div class="btn-group mt-2">
			<a class="btn btn-primary btn-sm recordButton" id="record"><?php echo $this->lang->line('Record');?></a>
			<a class="btn btn-primary btn-sm disabled one" id="pause"><?php echo $this->lang->line('Pause');?></a>
			<a class="btn btn-primary btn-sm disabled one" id="stop"><?php echo $this->lang->line('Reset');?></a>
		</div>  
		<div style=" margin: 16px; ">  
		<input class="" type="checkbox" id="live"/>
		<label for="live"><?php echo $this->lang->line('Live_Output');?></label><br/>
		<label><?php echo $this->lang->line('WAV_Controls');?>:</label>
		<div class="btn-group" data-type="wav">
			<a class="btn btn-primary btn-sm disabled one" id="play"><?php echo $this->lang->line('Play');?></a>
			<a class="btn btn-primary btn-sm disabled one" id="download"><?php echo $this->lang->line('Download');?></a>
			<a class="btn btn-primary btn-sm disabled one" id="save"><?php echo $this->lang->line('Upload_to_Audio');?></a>
		</div>
		</div>
		<br>
		<canvas id="level" height="150" width="300"></canvas>
		<style>
		div#cke_report {
    width: 100%;
}
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
  <span class="audioocaseid" id="<?php echo $case_id; ?>"></span>
 <span class="sessionid" id="<?php echo $this->session->userdata('admin_id'); ?>"></span> <span class="type" id="general"></span>
 <span class="audioid" id="<?php echo $session_number; ?>"></span>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <div class="col-md-6">

                                <div class="form-field-container">
								<h3><?php echo $this->lang->line('Audio_Record_List');?></h3>
                                    <div class="m-widget4">

                                     
											 <?php
													$audio = $this->db->select('audio,id,user_id,create_date')->where('audioid',$session_number)->where('type','general')->get('uploads')->result_array();
													foreach ($audio as $audio) {  $timestamp = strtotime($audio['create_date']); $date  =   date("d M Y G:i",$timestamp); ?>
													 <div class="m-widget4__item">
														<div class="m-widget4__info">
														<span class="m-widget4__title">	<?php echo "<b>" . $audio['audio']."</b>"; ?></span><br>
													   <span class="m-widget4__sub"><?php echo "<small>Uploaded By " .getEmployeeName($audio['user_id'])."</small>"; ?>
														<?php echo "<small>" .$date."</small>"; ?></span>
														
													</div>
														
														 <span class="m-widget4__ext">
                                                <span class="m-widget4__number m--font-brand">
                                                    <a href="<?=base_url('uploads/audio/' . $audio["audio"]);?>" class="btn btn-success"><i class="fa fa-download"></i></a>
                                                </span>
                                            </span>
														<!--<a href="<?=base_url('front/delete_audio_files/' . $audio["audio"].'/'.$case_id);?>" class='btn btn-danger  btn-sm'>Delete</a>-->
														</span>
													
													</div>
												<?php }?>
                                      <div class="putaudiores"></div>

                                    </div>
                                </div>
                            
                                <div class="form-field-container">
								<h3><?php echo $this->lang->line('Attached_Files_List');?></h3>
                                    <div class="m-widget4">

                                        
											<?php
											$file = $this->db->select('*')->where("(temp_app_id = '$temp_app_id' AND cat_id = 8 AND type='general')", NULL, FALSE)->get('document')->result_array();
											foreach ($file as $files) { ?>
											  <div class="m-widget4__item"> <div class="m-widget4__info">
											    <span class="m-widget4__title"><?php
													echo "<b>" . $files['name']."</b>"; ?></span><br>
											       <span class="m-widget4__sub"><?php
												echo "<span class='empnm'>(Upoded By ".getEmployeeName($files['user_id']).")</span>";?></span>
											 </div>
											    <span class="m-widget4__ext">
												    <span class="m-widget4__number m--font-brand">
												    <a href="<?=base_url('uploads/case_file/' . $files["name"]);?>" class="btn btn-success" download><i class="fa fa-download"></i></a>
													    <a href="<?=base_url('admin/c_case/delete_upload_files/' . $files["name"].'/'.$case_id);?>" class="btn btn-success" download><i class="fa fa-trash"></i></a>
											 
												 </span>
                                            </span> </div>
												<?php }?>
                                            
                                       
                                </div>

                            </div>
                        </div>
                        </div>
 
                        <?php 
                        //sub 
                        if($sub_mission_id  == ''  && $data->sub_mission_id == 0){ ?>
					
                        <div class="form-field-container">
						<h3><?php echo $this->lang->line('Sub_Mission');?></h3>
                        <div class="form-group row">
                        <?php echo $this->uri->segment(5); if($data->id){ ?>
                        <a href="<?php echo base_url("admin/mission_general/add_mission/$case_id/".$data->id); ?>" class="btn btn-primary btn-lg">Add Session Sub Mission</a>
                        <?php  } else { ?>
                        You can add sub mission after create the prerent mission. Please add mission first after you can edit the mission and add sub miision. 
                        <?php } ?> 
							</div>
                        </div>
                        <?php }
                        
                        //sub 
                        
                        ?>

<?php if($data->is_close == 0){ ?>
                 
				 <?php
				 $submit=$this->lang->line('Submit');
				 $close=$this->lang->line('Close');
				 $save=$this->lang->line('Save');
				 if($this->session->userdata('role_id') == 1){
					 echo form_submit(['id'=>'addcustomer','value'=>$submit,'class'=>'btn btn-primary btn-lg']);
					if($sub_mission_id  == ''  && $data->sub_mission_id == 0 AND checkAllMissionClose($data->id,'session_mission') == 0 ){
						 echo form_submit(['name'=>'close_app','id'=>'','value'=>$close,'class'=>'btn btn-danger btn-lg float-right']);
						 echo form_submit(['name'=>'close_app','id'=>'close_app','value'=>$close,'class'=>'btn btn-danger btn-lg float-right',"style"=>"display:none"]);
					  }else if($data->sub_mission_id != 0 ){
						 echo form_submit(['name'=>'close_app','id'=>'','value'=>$close,'class'=>'btn btn-danger btn-lg float-right']);
						 echo form_submit(['name'=>'close_app','id'=>'close_app','value'=>$close,'class'=>'btn btn-danger btn-lg float-right',"style"=>"display:none"]);
				 
					  }  echo form_submit(['name'=>'close_app_new','id'=>'close_app_new','value'=>'Add New Mission','class'=>'btn btn-succuess btn-lg float-right' ]);
					 echo form_submit(['name'=>'close_app_new','id'=>'','value'=>'Add New Mission','class'=>'btn btn-succuess btn-lg float-right',"style"=>"display:none"]);
				 
				   
					 
				 }
				 else if(in_array($this->session->userdata('admin_id'),getFileManager())){
					 echo form_submit(['id'=>'addcustomer','value'=>$save,'class'=>'btn btn-primary btn-lg ']);
					 if(isset($datas[2][2]) && $datas[2][2] == 1){
					 if($sub_mission_id  == ''  && $data->sub_mission_id == 0 AND checkAllMissionClose($data->id,'session_mission') == 0 ){
					 echo form_submit(['name'=>'close_app','id'=>'close_app','value'=>$close,'class'=>'btn btn-danger btn-lg float-right',"style"=>"display:none"]);
					 }else if($data->sub_mission_id != 0 ){
					 echo form_submit(['name'=>'close_app','id'=>'close_app','value'=>$close,'class'=>'btn btn-danger btn-lg float-right',"style"=>"display:none"]);
					 }   
					 echo form_submit(['name'=>'close_app_new','id'=>'close_app_new','value'=>'Add New Mission','class'=>'btn btn-succuess btn-lg float-right' ]);
					 echo form_submit(['name'=>'close_app_new','id'=>'','value'=>'Add New Mission','class'=>'btn btn-succuess btn-lg float-right',"style"=>"display:none"]);
					}
				 }
				 else{
					 echo form_submit(['id'=>'addcustomer','value'=>$save,'class'=>'btn btn-primary btn-lg ']);
				   if($data->id){
						 echo form_submit(['name'=>'onreview','value'=>$submit,'class'=>'btn btn-info btn-lg float-right']);
					 }
				 }
				 ?>
									 <?php } ?>
                    </div> 
                </form>

                <!--end::Form-->
            </div>
            </div>

            <!--end::Portlet-->
        </div>
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
		
		.m-form__actions.m-form__actions--solid .btn {
			margin-right: 10px;
		}
				canvas{
				display: block;
				}
				
		.form-control:disabled, .form-control[readonly] {
			background-color: #f1f1f1;
			opacity: 1;
		}
		.att-docs {
			height: 100px;
		}
		.datafiles .fa {
			font-size: 80px;
		}
		.col-md-2.att-doc {
			text-align: center;
		}


		.ajax-file-upload-container {
			float: left !important;
		}
		div#image {
			float: left !important;
		}
		.ajax-upload-dragdrop {
			height: 300px !important;
			padding-top: 200px !important;
			text-align: center !important;
		}
		div.upload-block:before {
		
		}
		.ajax-file-upload-container {
			border: 1px solid rgba(66, 31, 35, 0.47);
			margin-left: 15px !important;
			margin-top: 0 !important;
			height: 300px !important;
			width: 44%;
		}
		.drage-file {
			margin-top: -85px;
			color: #524a4a !important;
			font-size: 20px !important;
		}
		.ajax-file-upload-statusbar {
			border: 0 !important;
		}
		.ajax-file-upload-bar {
			background-color: #546eb2 !important;
		}
		.ajax-file-upload-progress {

			width: 260px !important;
		}
		.ajax-file-upload-container {
			overflow-y: scroll;
		}
		.ajax-file-upload-container:before {
			content: "<?php echo $this->lang->line('Upload_Area');?>";
			background: #1f3958;
			text-align: left;
			color: #fff;
			position: absolute;
			width: 23.7%;
			padding: 10px;
			margin-top: 0px !important;
			font-size: 16px;
		}
		.ajax-file-upload-statusbar:first-child {
			margin-top: 50px;
		}
		.next-btn {
			clear: both;
			float: right;
		}
		.next-btn .btn {
			margin-bottom: 25px;
			padding: 12px 50px;
			border-radius: 2px;
		}
		.ajax-file-upload {
			padding: 20px !important;
			line-height: 0 !important;
		}
		.casedata-block {
			overflow: hidden;
			background: rgba(234, 234, 234, 0.7019607843137254);
			padding: 20px;
			margin-top: 30px;
			border-top: 5px solid #546eb2;
			margin-bottom: 30px;
		}
		.right-panel .breadcrumbs {
			display: flex !important;
			margin-bottom: 15px;
		}
		.docloopa {
			padding: 13px 0;
			margin: 0;
			border-bottom: 1px solid #b1acac;    overflow: hidden;
		}
		.docloopa .btn {
			float: right;
			margin: 3px;
			margin-bottom: 0;
			padding: 1px 10px;
		}span.empnm {
			color: #5cb85c;
			margin-left: 5px;    font-size: 12px;
		}
		.clear {
			clear: both;
		}.page-loader.bg-white { display: none; }
</style>

<?php include __DIR__ . "/../footer.php"; ?>
<script src="<?= base_url('assets/js/audio/app.js'); ?>"></script>
<script src="<?= base_url('assets/js/audio/Fr.voice.js'); ?>"></script>
<script src="<?= base_url('assets/js/audio/libmp3lame.min.js'); ?>"></script>
<script src="<?= base_url('assets/js/audio/mp3Worker.js'); ?>"></script>
<script src="<?= base_url('assets/js/audio/recorder.js'); ?>"></script>
<link href=<?php echo base_url('assets/css/uploadfile.css'); ?> rel="stylesheet">
<script src=<?php echo base_url('assets/js/jquery.uploadfile.min.js'); ?>></script>
<script src="https://cdn.ckeditor.com/4.11.1/standard/ckeditor.js"></script>
<script>
	CKEDITOR.replace( 'report' );
</script>
<script type="text/javascript">
$('#close_app').click(function(){
event.preventDefault();
if(CKEDITOR.instances.report.getData() == ''){
	 $('#reporterorr').html('Report is required');
	$(window).scrollTop($('#reportscroll').offset().top);
	 return false;
}
if($('#decision').val() == ''){
	 $('#decisionerorr').html('Decision is required');
	$(window).scrollTop($('#decisionscroll').offset().top);
	 return false;
}
$('#customer').submit();
	
});
$("#mission").uploadFile({
url:"<?=base_url('admin/c_case/admin_modify_upload_file');?>",
fileName:"image",
dragDropStr: "<div class='drage-file'><b><?php echo $this->lang->line('Drag_the_files_here');?></div>",
abortStr:"Cancel",
statusBarWidth:300,
//maxFileCount: <?php if(sizeof($file) == 1 ){ echo 0; } else  { echo 1; }?>,
formData: {"fid":<?php echo $case_id; ?>,"cat_id":8, "type":"general","temp_app_id":<?php echo $temp_app_id; ?>, "type":"general"},
dragdropWidth:400,
uploadStr:"<?php echo $this->lang->line('Or_click_here_to_view_the_files');?>",
allowedTypes:"jpg,jpeg,png,gif,ico,mp3,m4a,ogg,wav,psd,xls,xlsx,odt,ppt,pptx,pps,ppsx,doc,docx,pdf",
showDelete: true,
deleteCallback: function (data, pd) {  obj = JSON.parse(data); 
	//alert(obj.name);
   // for (var i = 0; i < data.length; i++) {
        $.post("<?=base_url('admin/c_case/delete_admin_modify_upload_file');?>", {op: "delete",name: obj.name},
            function (resp,textStatus, jqXHR) { 
                //Show Message	
				//alert(resp);
              //  alert("File Deleted");
            });
  //  }
    pd.statusbar.hide(); //You choice.

},
});
jQuery('#btncmt').on('click', function (e) {
var note = $("#comment").val();
if(note == ''){
	$('.commenterror').html("Comment field is empty");
	return false;
}
var case_id = <?php echo $case_id; ?>; 
var app_id = <?php  if($data) echo $data->id; else echo "0"; ?>; 
var url="<?= base_url('admin/assignment/add_note'); ?>"; 
jQuery.ajax({
type:'ajax',
method:'post',
url:url,
data: {'note':note,'case_id':case_id,'type':'general','app_id':app_id},
success:function(data){
$('.commenterror').html("");
$('.addnewhtml').append(data);
$('#comment').val('');
},
});
});
$(document).ready(function()
{
$('#success').hide();
});
$(document).ready(function(){
$('.deedate').keypress(function(e) {
    e.preventDefault();
});
$("#session_time, #session_end_time, #sess_start_time, #sess_end_time, #visitor_start_time, #visitor_end_time, #writing_start_time, #writing_end_time, #consolation_start_time, #consolation_end_time, #general_start_time,#general_end_time").datetimepicker({
    pickDate: false,
    minuteStep: 15,
    pickerPosition: 'bottom-right',
    format: 'HH:ii p',
    autoclose: true,
    showMeridian: true,
    startView: 1,
    maxView: 1,
  });
});
/* $('#session_date,#session_end_date, #case_start_date, #case_date, #sess_start_date, #sess_end_date, #visitor_start_date, #visitor_end_date, #case_date, #writing_start_date, #writing_end_date, #consolation_start_date, #consolation_end_date, #general_start_date, #general_end_date').datetimepicker({  format: 'yyyy-mm-dd',  minView: 2, pickTime: false, autoclose: true,startDate: new Date()});
 */
$('#other_identification_types').css({'display':'none'});  
$('#identification_types').change(function(){
   if ($(this).val() == 'other') {
	   $('#other_identification_types').css({'display':'block'});           
   }else { $('#other_identification_types').css({'display':'none'}); }
});    


</script>