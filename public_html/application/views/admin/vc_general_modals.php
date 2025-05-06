<!--Start Add  Modal -->
<div class="modal fade lp-theme-modal" id="add-general-modal" tabindex="-1" role="dialog" aria-labelledby="modalTitle" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalTitle">Add New General</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        
                    <svg width="17" height="17" viewBox="0 0 17 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path opacity="0.5" fill-rule="evenodd" clip-rule="evenodd" d="M0.39988 0.803673C0.656 0.54763 1.00333 0.403793 1.36548 0.403793C1.72763 0.403793 2.07496 0.54763 2.33108 0.803673L8.19434 6.66693L14.0576 0.803673C14.1836 0.673228 14.3343 0.56918 14.5009 0.497602C14.6676 0.426023 14.8468 0.388346 15.0281 0.38677C15.2095 0.385194 15.3893 0.419751 15.5572 0.488423C15.725 0.557095 15.8775 0.658508 16.0057 0.786744C16.134 0.91498 16.2354 1.06747 16.3041 1.23532C16.3727 1.40317 16.4073 1.58301 16.4057 1.76436C16.4041 1.94571 16.3665 2.12492 16.2949 2.29155C16.2233 2.45818 16.1192 2.60889 15.9888 2.73487L10.1255 8.59813L15.9888 14.4614C16.2376 14.719 16.3753 15.064 16.3721 15.4221C16.369 15.7802 16.2254 16.1227 15.9722 16.376C15.7189 16.6292 15.3764 16.7728 15.0183 16.7759C14.6602 16.779 14.3152 16.6414 14.0576 16.3926L8.19434 10.5293L2.33108 16.3926C2.07349 16.6414 1.7285 16.779 1.3704 16.7759C1.01229 16.7728 0.669742 16.6292 0.416517 16.376C0.163291 16.1227 0.0196542 15.7802 0.0165424 15.4221C0.0134306 15.064 0.151093 14.719 0.39988 14.4614L6.26314 8.59813L0.39988 2.73487C0.143837 2.47875 0 2.13143 0 1.76927C0 1.40712 0.143837 1.05979 0.39988 0.803673Z" fill="#1B2A39"/>
                    </svg>

                    </button>
                </div>
                <div class="modal-body">
                    <div class="m-grid__item m-grid__item--fluid m-wrapper">


                        <!-- END: Subheader -->
                        <div class="m-content">

                            <!--begin::Portlet-->
                            <div class="m-portlet lp-theme-card bg-transparent">
                                <div class="m-portlet__head">
                                    
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
                                echo form_input(['type' => 'hidden', 'name' => 'id', 'value' => '']); 
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
                            echo form_hidden('case_id',$current_data->case_id); 
                            echo form_hidden('client_file_number',$current_data->client_file_number); 
                        ?>
                                    <div class="m-portlet__body theme-inner-form">

                                        <div class="form-field-container">
                                        <!-- <h3><?php echo $this->lang->line('General_Information');?></h3> -->
                                            <div class="form-group m-form__group row">
                                            <div class="form-group col-sm-6">
                                                <label for="consultation_code" class=" form-control-label"><?php echo $this->lang->line('Client_Name');?></label>
                                                <?= form_input(['id'=>'client_name','placeholder'=>'','class'=>'form-control','value'=>$current_data->client_name,'readonly'=>'readonly']);?>
                                            </div>
                                            <div class="form-group col-sm-6">
                                                <label for="consultation_code" class=" form-control-label"><?php echo $this->lang->line('E_Service_Number');?></label>
                                                <?= form_input(['id'=>'case_id','placeholder'=>'','class'=>'form-control','value'=>$current_data->case_number,'readonly'=>'readonly']);?>
                                            </div>
                            
                                            <div class="form-group col-sm-6">
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

                                                
                                                <!-- <div class="input-group date"> -->
                                                        <?= form_input(['id'=>'session_date','name'=>'session_date','class'=>'form-control appdate','value'=>$value]);?>
                                                <div class="input-group-append">
                                                <span class="input-group-text"><i class="fa fa-calendar-check-o"></i></span>
                                                </div>
                                                <!-- </div> -->
                                                
                                                <div class="form-error"><?= form_error('session_date'); ?></div>
                                            </div>

                                            <div class="form-group col-sm-6">
                                                <label for="session_time" class=" form-control-label"><?php echo $this->lang->line('General_Time');?>*</label>
                                                <?php if($data)
                                                {
                                                    $value=$data->session_time;
                                                }
                                                else
                                                {
                                                    $value=set_value('session_time');
                                                } ?>

                                                        <?= form_input(['type'=>'time','name'=>'session_time','type'=>'time','id'=>'session_time','required'=>'required','autocomplete'=>'off','class'=>'form-control deedate','value'=>$value]);?>
                                                
                                                <div class="form-error"><?= form_error('session_time'); ?></div>
                                            </div>

                                            <div class="form-group col-sm-6">
                                                <label for="session_end_date" class=" form-control-label"><?php echo $this->lang->line('Due_Date');?>*</label>
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

                                                
                                                <!-- <div class="input-group date"> -->
                                                        <?= form_input(['name'=>'session_end_date','id'=>'session_end_date','class'=>'form-control appdate','value'=>$value]);?>
                                                <div class="input-group-append">
                                                <span class="input-group-text"><i class="fa fa-calendar-check-o"></i></span>
                                                </div>
                                                <!-- </div> -->
                                                <div class="form-error"><?= form_error('session_end_date'); ?></div>
                                            </div>
                                            <div class="form-group col-sm-6">
                                                <label for="session_time" class=" form-control-label"><?php echo $this->lang->line('Due_Time');?>*</label>
                                                <?php if($data)
                                                {
                                                    $value=$data->session_end_time;
                                                }
                                                else
                                                {
                                                    $value=set_value('session_end_time');
                                                } ?>

                                                
                                                        <?= form_input(['name'=>'session_end_time','type'=>'time','id'=>'session_end_time','required'=>'required','autocomplete'=>'off','class'=>'form-control deedate','value'=>$value]);?>
                                                
                                                <div class="form-error"><?= form_error('session_end_time'); ?></div>
                                            </div>

                                            <div class="form-group col-sm-6">
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


                                            <div class="form-group col-sm-6">	
                                            <?php if($data)
                                                {
                                                    $value=$data->session_code;
                                                }
                                                else
                                                {
                                                    $value=set_value('session_code');
                                                } ?>
                                                <label for="session_code" class=" form-control-label"><?php echo $this->lang->line('General_Status');?></label>
                                                <select name="session_code" class="form-control" id="session_code" >
                                                        <option value=""><?php echo $this->lang->line('Please_Select_Mission_Status');?></option>
                                                        <option value="active"<?php if($value =='active') echo "selected=selected"; ?>><?php echo $this->lang->line('Active');?></option>
                                                        <option value="inactive"<?php if($value =='inactive') echo "selected=selected"; ?>><?php echo $this->lang->line('Inactive');?></option>
                                                        <option value="reactivated"<?php if($value =='reactivated') echo "selected=selected"; ?>><?php echo $this->lang->line('Reactive');?></option>
                                                </select>
                                                <div class="form-error"><?= form_error('session_code'); ?></div>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="form-field-container">
                                                <h3><?php echo $this->lang->line('Requirements');?></h3>
                                                	
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
                                            <div class="form-field-container d-flex justify-content-between align-items-center mb-2">
                                                <h3 class="mb-0"><?php echo $this->lang->line('Attachment'); ?></h3>

                                                <!-- Styled like underlined text -->
                                                <span class="add_attachment" onclick="addAttachment()">
                                                    Add Attachment
                                                </span>
                                            </div>

                                            <!-- Styled container for attachments (initially hidden) -->
                                            <div class="attachment-list" id="session-attachment-container" style="display: none;">
                                                <div id="session-attachment-list"></div>
                                            </div>
                                            
                                            <?php 
                        //sub 
                        if($this->uri->segment(5)  == '' && $data->sub_mission_id == 0){ ?>
						
						<div class="row" style="margin-top:30px;">
							
							<div class="col-md-6">
								<div class="form-field-container">
									<h3><?php echo $this->lang->line('Add_Sub_Mission');?></h3>
								</div>
							</div>
							<div class="col-12">
                                You can add sub mission after create the prerent mission. Please add mission first after you can edit the mission and add sub miision. 
							</div>


						</div>
                        
                        
                        
                        <?php }
                        
                        //sub 
                        
                        ?>
                                            </div>

                                            <div class="d-flex justify-content-end mt-4">
                                            <button type="button" class="btn btn-secondary mr-2" data-dismiss="modal">
                                                <?php echo $this->lang->line('Cancel');?>
                                            </button>
                                            <?php 
                                                $submit = $this->lang->line('Save');
                                                echo form_submit(['value'=>$submit,'class'=>'btn btn-primary']);
                                                ?>
                                        </div>
                                        <input type="hidden" name="session_number" value="<?php echo "GN". str_pad(rand(0, 999999), 6, '0', STR_PAD_LEFT); ?> ">
                                        <input type="hidden" name="session_code" value="inactive">

                                            
                                            </div> 
                                            </form>

                                <!--end::Form-->
                            </div>
                        </div>

                            <!--end::Portlet-->
                    </div>

                </div>
                <!-- <div class="modal-footer">
                    <div class="modal-btn-group">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Add General</button>
                        <button type="button" class="btn btn-primary">Save General</button>
                    </div>
                </div> -->
            </div>
        </div>
    </div>
    <!-- End Add Modal -->


         <!-- Start Edit Modal -->
    <div class="modal fade lp-theme-modal" id="edit-general-modal" tabindex="-1" role="dialog" aria-labelledby="modalTitle" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalTitle">Edit General</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        
                    <svg width="17" height="17" viewBox="0 0 17 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path opacity="0.5" fill-rule="evenodd" clip-rule="evenodd" d="M0.39988 0.803673C0.656 0.54763 1.00333 0.403793 1.36548 0.403793C1.72763 0.403793 2.07496 0.54763 2.33108 0.803673L8.19434 6.66693L14.0576 0.803673C14.1836 0.673228 14.3343 0.56918 14.5009 0.497602C14.6676 0.426023 14.8468 0.388346 15.0281 0.38677C15.2095 0.385194 15.3893 0.419751 15.5572 0.488423C15.725 0.557095 15.8775 0.658508 16.0057 0.786744C16.134 0.91498 16.2354 1.06747 16.3041 1.23532C16.3727 1.40317 16.4073 1.58301 16.4057 1.76436C16.4041 1.94571 16.3665 2.12492 16.2949 2.29155C16.2233 2.45818 16.1192 2.60889 15.9888 2.73487L10.1255 8.59813L15.9888 14.4614C16.2376 14.719 16.3753 15.064 16.3721 15.4221C16.369 15.7802 16.2254 16.1227 15.9722 16.376C15.7189 16.6292 15.3764 16.7728 15.0183 16.7759C14.6602 16.779 14.3152 16.6414 14.0576 16.3926L8.19434 10.5293L2.33108 16.3926C2.07349 16.6414 1.7285 16.779 1.3704 16.7759C1.01229 16.7728 0.669742 16.6292 0.416517 16.376C0.163291 16.1227 0.0196542 15.7802 0.0165424 15.4221C0.0134306 15.064 0.151093 14.719 0.39988 14.4614L6.26314 8.59813L0.39988 2.73487C0.143837 2.47875 0 2.13143 0 1.76927C0 1.40712 0.143837 1.05979 0.39988 0.803673Z" fill="#1B2A39"/>
                    </svg>

                    </button>
                </div>
                <div class="modal-body">
                <div class="m-grid__item m-grid__item--fluid m-wrapper">


<!-- END: Subheader -->
<div class="m-content">

    <!--begin::Portlet-->
    <div class="m-portlet lp-theme-card bg-transparent">
        <div class="m-portlet__head">
            <div class="m-portlet__head-caption">
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
        echo form_input(['type' => 'hidden', 'name' => 'id', 'value' => $data->id, 'class' => 'data_id']); 
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
    echo form_hidden('case_id',$current_data->case_id); 
    echo form_hidden('client_file_number',$current_data->client_file_number); 
?>
            <div class="m-portlet__body theme-inner-form">

                <div class="form-field-container">
                <!-- <h3><?php echo $this->lang->line('General_Information');?></h3> -->
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
    <?= form_input(['id'=>'session_number','name'=>'session_number','class'=>'form-control session_number','value'=>$session_number,'readonly'=>'readonly']);?>
    <div class="form-error"><?= form_error('session_number'); ?></div>
</div>
<div class="form-group col-sm-4">
    <label for="consultation_code" class=" form-control-label"><?php echo $this->lang->line('E_Service_Number');?></label>
    <?= form_input(['id'=>'case_id','placeholder'=>'','class'=>'form-control','value'=>$current_data->case_number,'readonly'=>'readonly']);?>
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
    <select class="form-control general_type" id="general_type" name="general_type"><option value=""><?php echo $this->lang->line('Select_General_Type');?> </option><?php  foreach ($task_type as $task_type) { ?>
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

    
    <!-- <div class="input-group date"> -->
    <?= form_input(['id'=>'session_date','name'=>'session_date','id'=>'session_date','class'=>'form-control appdate session_date','value'=>$value]);?>
    <div class="input-group-append">
    <span class="input-group-text"><i class="fa fa-calendar-check-o"></i></span>
    </div>
    <!-- </div> -->
    
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

    
             <?= form_input(['type'=>'time','name'=>'session_time','type'=>'time','id'=>'session_time','required'=>'required','autocomplete'=>'off','class'=>'form-control deedate session_time','value'=>$value]);?>
   
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

    
    <!-- <div class="input-group date"> -->
             <?= form_input(['name'=>'session_end_date','id'=>'session_end_date','class'=>'form-control appdate session_end_date','value'=>$value]);?>
    <div class="input-group-append">
    <span class="input-group-text"><i class="fa fa-calendar-check-o"></i></span>
    </div>
    <!-- </div> -->
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

    
             <?= form_input(['type'=>'time','name'=>'session_end_time','type'=>'time','id'=>'session_end_time','required'=>'required','autocomplete'=>'off','class'=>'form-control deedate session_end_time','value'=>$value]);?>
    
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
    <select name="session_code" class="form-control session_code" id="session_code" >
            <option value=""><?php echo $this->lang->line('Please_Select_Mission_Status');?></option>
            <option value="active"<?php if($value =='active') echo "selected=selected"; ?>><?php echo $this->lang->line('Active');?></option>
            <option value="inactive"<?php if($value =='inactive') echo "selected=selected"; ?>><?php echo $this->lang->line('Inactive');?></option>
            <option value="reactivated"<?php if($value =='reactivated') echo "selected=selected"; ?>><?php echo $this->lang->line('Reactive');?></option>
    </select>
    <div class="form-error"><?= form_error('session_code'); ?></div>
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
    <?= form_input(['name'=>'subject','placeholder'=>'','class'=>'form-control subject','value'=>$value]);?>
</div>



                    </div>
                </div>

                

               
                <div class="form-field-container">
                    <h3><?php echo $this->lang->line('Requirements');?>*</h3>
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
                            <?= form_textarea(['id'=>'requirement','name'=>'note','class'=>'form-control requirement','rows'=>'4','value'=>$value,"required"=>"required"]);?>
                            <div class="form-error"><?= form_error('note'); ?></div>

                        </div>
                    </div>
                </div>
            
                <div class="form-field-container d-flex justify-content-between align-items-center mb-2">
                    <h3 class="mb-0"><?php echo $this->lang->line('Attachment'); ?></h3>

                    <!-- Styled like underlined text -->
                    <span class="add_attachment" onclick="addAttachment('edits-attachment-container', 'edits-attachment-list')">
                        Add Attachment
                    </span>
                </div>

                <!-- Styled container for attachments (initially hidden) -->
                <div class="attachment-list" id="edits-attachment-container" style="display: none;">
                    <div id="edits-attachment-list"></div>
                </div>
                

                <?php 
                //sub 
                if($sub_mission_id  == ''  && $data->sub_mission_id == 0){ ?>
            
                        <div class="row" style="margin-top:30px">
							
							<div class="col-md-6">
								<div class="form-field-container">
									<h3><?php echo $this->lang->line('Add_Sub_Mission');?></h3>
								</div>
							</div>

							

							<div class="col-12">
                            <input type="hidden" class="base_url" value="<?php echo base_url("admin/mission_session/add_mission/"); ?>">
							
                            <a href="" class="btn btn-primary btn-lg sb-btn">Add General Sub Mission</a>
                        
				
							</div>


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
                <!-- <div class="modal-footer">
                    <div class="modal-btn-group">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Add General</button>
                        <button type="button" class="btn btn-primary">Save General</button>
                    </div>
                </div> -->
            </div>
        </div>
    </div>
         <!-- End Edit Modal -->


          <!-- Start View Modal -->
    <div class="modal fade lp-theme-modal" id="view-general-modal" tabindex="-1" role="dialog" aria-labelledby="modalTitle" aria-hidden="true">
        <div class="modal-dialog" role="document">
            
        </div>
    </div>
         <!-- End View Modal -->

         <script>
    jQuery(document).ready(function($)
  {
    $(document).on( 'click', '.editing-general-modal', function(){
        var id = $(this).attr('data-id');
        var data = $(this).find('.appointment_data').data('array');
        console.log(data);        
        var service_no = $(this).find('.appointment_data_service_number').data('array');
        $('#edit-general-modal .data_id').val(data.id);
        $('#edit-general-modal .data_case_id').val(data.case_id);
        $('#edit-general-modal .data_client_file_number').val(data.client_file_number);
        $('#edit-general-modal #case_id').val(data.case_number);

        $('#edit-general-modal .client_name').val(data.client_name);
        $('#edit-general-modal .general_type').val(data.general_type);
        $('#edit-general-modal .session_number').val(data.session_number);
        $('#edit-general-modal .session_date').val(data.session_date);
        $('#edit-general-modal .session_time').val(data.session_time);
        $('#edit-general-modal .session_end_date').val(data.session_end_date);
        $('#edit-general-modal .session_end_time').val(data.session_end_time);
        $('#edit-general-modal .session_code').val(data.session_code);
        $('#edit-general-modal .subject').val(data.subject);
        $('#edit-general-modal #entry_no').val(data.entry_no);
        $('#edit-general-modal .export_entry_no').val(data.export_entry_no);
        $('#edit-general-modal .entry_no').val(data.entry_no);
        $('#edit-general-modal #comment').val(data.note);
        $('#edit-general-modal #requirement').val(data.note);
        $('#edit-general-modal .decision').val(data.decision);
        $('#edit-general-modal .report').val(data.report);
        var baseUrl = $('#edit-general-modal .base_url').val();
        $('#edit-general-modal .sb-btn').attr('href', baseUrl + data.case_id + '/' + data.id);
    });

    $(document).on( 'click', '.viewing-general-modal', function(){
        var id = $(this).attr('data-id');
        var url="<?= base_url("admin/mission_general/view_mission/"); ?>" + id; 
        $.ajax({
          type:'ajax',
          url:url,
          success:function(data){
            $('#view-general-modal div').html(data);
          },
        });
    });

    $(document).on("click", ".writing .delete_appoinment", function() {
    
        var id=$(this).attr("id");
        var url="<?= base_url("admin/$control/delete_mission"); ?>"; 
        bootbox.confirm("Are you sure?", function(result){
            if(result)
            {
                $.ajax({
                type:'ajax',
                method:'post',
                url:url,
                data:{"id" : id},
                success:function(data){
                    $('#msg').show();
                    $('#msg').html(data);
                },
                });
                $('.hide'+id).hide(200);
                return true;
            }
            else
            {
                $('#msg').show();
                $('#msg').html('delete failed');
            }
        })
    });

  });
</script>