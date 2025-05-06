<!--Start Add  Modal -->
<div class="modal fade lp-theme-modal" id="add-meeting-modal" tabindex="-1" role="dialog" aria-labelledby="modalTitle" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="modalTitle">Add New Meeting</h5>
                                
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

<?php echo form_open_multipart('admin/mission_visiting/store_mission',['id'=>'customer','class'=>'m-form m-form--fit m-form--label-align-right m-form--group-seperator-dashed']);
//sub
 $sub_mission_id=set_value('sub_mission_id',$this->uri->segment(5));
 if($sub_mission_id){ 
     
         echo form_hidden('sub_mission_id',$sub_mission_id); 
 }
 //sub
 if($data) $temp_app_id = $data->id; else  $temp_app_id = "0"; 
 echo form_hidden('id','');
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
                    <!-- <h3><?php echo $this->lang->line('Visiting_information');?></h3> -->
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
                        <label for="session_date" class=" form-control-label"><?php echo $this->lang->line('Visiting_Date');?>*</label>
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
                        
                        <?= form_input(['name'=>'session_date','id'=>'session_date','class'=>'form-control appdate','value'=>$value]);?>

                    
                        <div class="form-error"><?= form_error('session_date'); ?></div>
                    </div>

                    <div class="form-group col-sm-6">
                        <label for="session_time" class=" form-control-label"><?php echo $this->lang->line('Visiting_Time');?>*</label>
                        <?php if($data)
                        {
                            $value=$data->session_time;
                        }
                        else
                        {
                            $value=set_value('session_time');
                        } ?>

                        
                        
                        <?= form_input(['type'=>'time','name'=>'session_time','id'=>'session_time','required'=>'required','autocomplete'=>'off','class'=>'deedate form-control','value'=>$value]);?>
                        
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

                                <?= form_input(['name'=>'session_end_date','id'=>'session_end_date','class'=>'form-control appdate','value'=>$value]);?>
                        
                        
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

                    
                                <?= form_input(['type'=>'time','name'=>'session_end_time','id'=>'session_end_time','required'=>'required','autocomplete'=>'off','class'=>'form-control deedate','value'=>$value]);?>
                        
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
                        <label for="session_code" class=" form-control-label"><?php echo $this->lang->line('Visiting_Status');?>*</label>
                        <select name="session_code" class="form-control" >
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
                <?= form_textarea(['name'=>'note','class'=>'form-control','rows'=>'4','value'=>$value]);?>
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
        <input type="hidden" name="session_number" value="<?php echo "VN". str_pad(rand(0, 999999), 6, '0', STR_PAD_LEFT); ?> ">
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
                <!-- end add modal -->
 