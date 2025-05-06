<?php
include('header.php');

?>

<style>
    html[dir="rtl"] {
        .modal.lp-theme-modal .modal-dialog .modal-content .modal-header button.close {
            left: 30px;
            right: unset;
        }
    }

    #view-modal .m-content {
        padding-inline: 0 !important;
    }

    #view-modal .modal-header {
        padding-bottom: 0;
    }

    #view-modal .modal-dialog {
        max-width: 600px;
    }

    #view-modal .m-portlet__body.theme-inner-form {
        margin: 0;
        padding: 0 !important;
        box-shadow: none;
        background-color: transparent;
    }

    #view-modal .m-portlet__body.theme-inner-form::before,
    #view-modal .m-portlet__body.theme-inner-form::after {
        display: none;
    }

    .bootbox-confirm .modal-dialog {
        max-width: 500px;
    }
</style>
    <div class="m-grid__item m-grid__item--fluid m-wrapper">


        <!-- END: Subheader -->
        <div class="m-content">

            <!--begin::Portlet-->
            <div class="m-portlet lp-theme-card bg-transparent">
            <div id="custom-search-container"></div>
                <div class="m-portlet__head">
                    <div class="m-portlet__head-caption">
                        <!-- <div class="m-portlet__head-title">
                            <h3 class="m-portlet__head-text">
                                <?php echo $this->lang->line('Audio_List');?>
                            </h3>
                        </div> -->
                        <div class="theme-new-nav-menu">
                            <h3 class="m-portlet__title" style="margin-right: 70px; font-size:24px !important;">
                                <?php echo $this->lang->line('Archives');?>
                            </h3>
                            <ul style="gap:30px;">
                                <!-- <li> <a href="http://lexport.demosbywpsqr.com/admin/c_case/padding_list">Waiting list</a> </li>
                                <li> <a href="http://lexport.demosbywpsqr.com/admin/customer/list_customer">List Customers</a> </li>
                                <li> <a href="http://lexport.demosbywpsqr.com/admin/mission_session/list_mission">Cases</a> </li>
                                <li> <a href="http://lexport.demosbywpsqr.com/admin/mission_writings/list_mission">Writing</a> </li>
                                <li> <a href="http://lexport.demosbywpsqr.com/admin/mission_consultation/list_mission">Consultation</a> </li>
                                <li> <a href="http://lexport.demosbywpsqr.com/admin/mission_visiting/list_mission">Meeting</a> </li>
                                <li> <a href="http://lexport.demosbywpsqr.com/admin/mission_general/list_mission">General</a> </li>
                                <li> <a href="http://lexport.demosbywpsqr.com/admin/assignment">Assignment</a> </li> -->
                                <li> <a href="http://lexport.demosbywpsqr.com/admin/archive/list_archive"><?php echo $this->lang->line('Files');?></a> </li>
                                <li class="active"> <a href="http://lexport.demosbywpsqr.com/admin/admin/audio_list"><?php echo $this->lang->line('Audio');?></a> </li>
                                <li> <a href="http://lexport.demosbywpsqr.com/admin/admin/list_note"><?php echo $this->lang->line('Notes_List');?></a> </li>
                            </ul>

                            <a class="btn btn-primary add_audio" href="#" data-toggle="modal" data-target="#add-modal"><i class="fa fa-plus"></i> <?php echo $this->lang->line('Create_new_audio');?></a>
                        </div>
                    </div>
                </div>


                <div class="m-portlet__body">
                    <div class="m_datatable m-datatable m-datatable--default m-datatable--loaded" style="">

                    <div class="table-responsive">
                                    <table class="lp-theme-table lp-large-theme" id="m_datatable">
                            <thead>
                            <tr class="netTr" style="text-align:left;">
							<th class="sortable"><?php echo $this->lang->line('Serial_No');?><img class="sortIcon" src="../../assets/images/img/unfold_more.svg" height="18px"></th>
							<th class="sortable"><?php echo $this->lang->line('Audio_Name');?><img class="sortIcon" src="../../assets/images/img/unfold_more.svg" height="18px"></th>
							<th class="sortable"><?php echo $this->lang->line('Client_Name');?><img class="sortIcon" src="../../assets/images/img/unfold_more.svg" height="18px"></th>
                            <th class="sortable"><?php echo $this->lang->line('Added_Date');?><img class="sortIcon" src="../../assets/images/img/unfold_more.svg" height="18px"></th>
							<th class="sortable"><?php echo $this->lang->line('Note');?><img class="sortIcon" src="../../assets/images/img/unfold_more.svg" height="18px"></th>
                            <th class="sortable"><?php echo $this->lang->line('Uploaded_by');?><img class="sortIcon" src="../../assets/images/img/unfold_more.svg" height="18px"></th>
							<th></th>
                            </tr>
                            </thead>
                            <tbody>
					<?php $count=1;
                       foreach($data as $ado) { 

                        ?>
                       
                        <tr class="" style="text-align: left;">
                        <?php $serial_number = sprintf("#%02d", $count++); ?>
    <td data-sort="<?= $count - 1 ?>"><?= $serial_number ?></td>
                        <td><?= $ado['audio_name'] ?></td>
						<td><?= getEmployeeName($ado['user_id']); ?></td>
                        <td><?= getTheDayAndDateFromDatePan($ado['date']); ?></td>
                        <td><?= $ado['note'] ?></td>
                        <td></td>
                        <td class="action">
                        <a data-target="#view-modal" class="view-modal" data-toggle="modal" data-id="<?= $ado['id'] ?>" title="<?php echo $this->lang->line('View');?>">
                            <img src="<?= base_url('assets/images/img/eye-solid.svg') ?>" alt="View" class="img-eye">
                        </a>
						<a data-target="#edit-modal" class="editing-modal" data-toggle="modal" data-id="<?= $ado['id'] ?>">
                            <div style="display:none" class="appointment_data" data-array='<?php echo json_encode( $ado ); ?>'></div>
                            <img src="<?= base_url('assets/images/img/pen-solid.svg') ?>" alt="Edit" class="img-pen"></a> 
						<a href="javascript:;" class="fa fa-trash delete_note" id='<?=$ado['id']; ?>' title="<?php echo $this->lang->line('Delete_Audio');?>">
						</td>
                      </tr>
				<?php } ?>
                            </tbody>
                        </table>

                         <!-- Start Edit Modal -->
                        <div class="modal fade lp-theme-modal" id="edit-modal" tabindex="-1" role="dialog" aria-labelledby="modalTitle" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="modalTitle">Edit Audio</h5>
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
                                                        <!-- <div class="m-portlet__head-caption">
                                                            <div class="m-portlet__head-title">
                                                                <h3 class="m-portlet__head-text">
                                                                <?php  if($data){ ?>
                                                                    <?php echo $this->lang->line('Edit_Audio');?> 
                                                                <?php	} else { ?>
                                                                    <?php echo $this->lang->line('Add_Audio');?> 
                                                                <?php } ?>
                                                                </h3>
                                                            </div>
                                                        </div> -->
                                                    </div>

                                                        <!--begin::Form-->
            
                                                        <?php echo form_open_multipart('admin/admin/add_audio_record',['id'=>'employer','class'=>'m-form m-form--fit m-form--label-align-right m-form--group-seperator-dashed']);

                                                            echo form_input(['type' => 'hidden', 'name' => 'id', 'value' => $data->id, 'class' => 'data_id']);
                                                            $doc_id = "AUI".rand(); 
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
                                                                        <?= form_input(['id'=>'audio_name','name'=>'audio_name','class'=>'form-control audio_name','value'=>$value,'rows'=>5,'cols'=>5]);?>
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
                                                                        <?= form_input(['id'=>'','name'=>'date','class'=>'form-control appdate date','value'=>$value,"readonly"=>"readonly"]);?>
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
                                                                        <?= form_textarea(['id'=>'note','name'=>'note','class'=>'form-control note','value'=>$value,'rows'=>5,'cols'=>5]);?>
                                                                        <div class="form-error"><?= form_error('note'); ?></div>

                                                                    </div>
                                                                    
                                                                    <div class="col-lg-12" style="margin-top: 30px">
                                                                        <div class="form-field-container">
                                                                            <h3><?php echo $this->lang->line('Record_Audio');?></h3>
                                                                            <div class="form-group m-form__group row">
                                                                                <div class="col-12">
                                                                                    <label for="note" class=" form-control-label"><?php echo $this->lang->line('Enter_Audio_File_Name');?></label>
                                                                                    <?= form_input(['id'=>'audio_name','class'=>'form-control file_name']);?>

                                                                                    <div class="theme-audio-play-box">
                                                                                        <audio controls class="note" id="audio" name="audio" style="margin: 20px 0;"></audio>
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
                                                        
                                                        <div class="d-flex justify-content-end mt-4">
                                            <button type="button" class="btn btn-secondary mr-2" data-dismiss="modal">
                                                <?php echo $this->lang->line('Cancel');?>
                                            </button>
                                            <?php 
                                                $submit = $this->lang->line('Save_changes');
                                                echo form_submit(['value'=>$submit,'class'=>'btn btn-primary']);
                                            ?>
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

                            <!-- start add modal -->
                        <div class="modal fade lp-theme-modal" id="add-modal" tabindex="-1" role="dialog" aria-labelledby="modalTitle" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="modalTitle">Add Audio</h5>
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
                                                            <!-- <div class="m-portlet__head-title">
                                                                <h3 class="m-portlet__head-text">
                                                                <?php  if($data){ ?>
                                                                    <?php echo $this->lang->line('Edit_Audio');?> 
                                                                <?php	} else { ?>
                                                                    <?php echo $this->lang->line('Add_Audio');?> 
                                                                <?php } ?>
                                                                </h3>
                                                            </div> -->
                
                                                        </div>
                                                    </div>

                                                    <!--begin::Form-->
       
                                                    <?php echo form_open_multipart('admin/admin/add_audio_record',['id'=>'add','class'=>'m-form m-form--fit m-form--label-align-right m-form--group-seperator-dashed']);

                                                        echo form_hidden('id',''); 
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
                                                            <div class="d-flex justify-content-end mt-4">
                                            <button type="button" class="btn btn-secondary mr-2" data-dismiss="modal">
                                                <?php echo $this->lang->line('Cancel');?>
                                            </button>
                                            <?php 
                                                $submit = $this->lang->line('Save');
                                                echo form_submit(['value'=>$submit,'class'=>'btn btn-primary']);
                                            ?>
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
                            <!-- End add Modal -->


                            <!-- Start View Modal -->
                        <div class="modal fade lp-theme-modal" id="view-modal" tabindex="-1" role="dialog" aria-labelledby="modalTitle" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="modalTitle">View Audio</h5>
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
                                            <?php echo form_open('admin/admin/store_note',['id'=>'employer','class'=>'m-form m-form--fit m-form--label-align-right m-form--group-seperator-dashed']);

                                                    if($this->session->userdata('role_id') == 1){
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
                                                                    <label for="name" class=" form-control-label"><?php echo $this->lang->line('Audio_Name');?></label>
                                                                    <div>
                                                                        <span class="audio_name"></span>
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-6">
                                                                    <label for="name" class=" form-control-label"><?php echo $this->lang->line('Client_Name');?></label>
                                                                    <div>
                                                                        <span class="user_id"></span>
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-6" >
                                                                    <label for="date" class=" form-control-label"><?php echo $this->lang->line('Added_Date');?></label>
                                                                    <div>
                                                                        <span class="date"></span>
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-6">
                                                                    <label for="name" class=" form-control-label"><?php echo $this->lang->line('Uploaded_By');?></label>
                                                                    <div>
                                                                        <span class="customer_type"></span>
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-12">
                                                                    <label for="discription" class=" form-control-label"><?php echo $this->lang->line('Note');?></label>
                                                                    <div>
                                                                        <span class="discription"></span>
                                                                    </div>
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
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- End View modal -->

                       
                    </div>


                </div>
            </div>


        </div>

    </div>

<?php

include('footer.php');
?>

 <script type="text/javascript">

jQuery(document).ready(function($) {
    $("#m_datatable").on("click", ".delete_note", function() {
        var id=$(this).attr("id");
        var url="<?= base_url('admin/admin/delete_audio'); ?>"; 
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
                    $('#msg').html(data);location.reload();

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

    var table = $('#m_datatable').DataTable();

    // Move the search bar (filter input)
    var searchInput = $('.dataTables_filter');
    searchInput.detach().prependTo('#custom-search-container');

    // Add placeholder to the search input field
    $('.dataTables_filter input').attr('placeholder', 'Search Client, E-Services........');
    $('.editing-modal').click( function(){
        var id = $(this).attr('data-id');
        var data = $(this).find('.appointment_data').data('array');   
        console.log(data);             
        $('#edit-modal .data_id').val(id);
        $('#edit-modal #clientsel').val(data.user_id).change();
        $('#edit-modal .audio_name').val(data.audio_name);
        $('#edit-modal .date').val(data.date);
        $('#edit-modal .note').val(data.note);
        $('#edit-modal .file_name').val(data.file_name);
    });
    $('.view-modal').click( function(){
        var id = $(this).attr('data-id');
        var data = $('.editing-modal[data-id="' + id + '"]').find('.appointment_data').data('array');
        var userId = '';
        $('#edit-modal #clientsel option').each(function() {
            if ($(this).val() == data.user_id) {
                userId = $(this).text();
            }
        });
        $('#view-modal .user_id').text(userId);
        $('#view-modal .audio_name').text(data.audio_name);
        $('#view-modal .date').text(data.date);
        $('#view-modal .discription').text(data.note);
    });
});

$(document).ready(function() {
    $('#add').on('submit', function(e) {
        e.preventDefault();  // Prevent the default form submission

        var form = $(this);
        var formData = new FormData(this);  // Get the form data, including files

        $.ajax({
            type: 'POST',
            url: form.attr('action'),  // URL for the AJAX request
            data: formData,  // The form data
            dataType: 'json',
            processData: false,  // Prevent jQuery from automatically converting data
            contentType: false,  // Do not set content type (FormData handles it)
              
            success: function(response) {
                if (response.status == 'success') {
                    // Close the modal instead of redirecting
                    $('#add-modal').modal('hide');
                    location.reload(); // Refresh to reflect changes
                } else if (response.status == 'error') {
                    // Clear all previous errors
                    $('.form-error').html('');

                    $.each(response.errors, function(field, error) {
                        var $input = $('[name="' + field + '"]');

                        if ($input.length > 0) {
                            if ($input.is('select')) {
                                // For select fields, find the nearest error div
                                $input.closest('.form-group').find('.form-error').html(error);
                            } else {
                                // For input fields, find the next error div
                                $input.next('.form-error').html(error);
                            }
                        }
                    });
                }
            },
            error: function(xhr, status, error) {
                console.log('AJAX error:', error);
                alert('An error occurred. Please try again.');
            }
        });
    });

    // Automatically remove error messages when the user interacts with the fields
    $(document).on('input change', '.form-control', function() {
        var $input = $(this);
        var $errorDiv = $input.next('.form-error');
        if ($errorDiv.length > 0) {
            $errorDiv.html(''); // Clear the error message when the user modifies the field
        }
    });
});


// Add Modal - clear errors on open and reset on close
$('#add-modal').on('show.bs.modal', function () {
    $(this).find('.form-error').html(''); // Clear error messages
});

$('#add-modal').on('hidden.bs.modal', function () {
    $(this).find('form')[0].reset(); // Reset form fields
    $(this).find('.m_selectpicker').selectpicker('refresh'); // Refresh Bootstrap select pickers
    $(this).find('.form-error').html(''); // Clear error messages again for safety
});

// Edit Modal - clear errors on open and reset on close
$('#edit-modal').on('show.bs.modal', function () {
    $(this).find('.form-error').html(''); // Clear error messages
});

$('#edit-modal').on('hidden.bs.modal', function () {
    $(this).find('form')[0].reset(); // Reset form fields
    $(this).find('.m_selectpicker').selectpicker('refresh'); // Refresh Bootstrap select pickers
    $(this).find('.form-error').html(''); // Clear error messages again
});

$(document).ready(function() {
    $('#employer').on('submit', function(e) {
        e.preventDefault();  // Prevent the default form submission

        var form = $(this);
        var formData = new FormData(this);  // Get the form data, including files

        $.ajax({
            type: 'POST',
            url: form.attr('action'),  // URL for the AJAX request
            data: formData,  // The form data
            dataType: 'json',
            processData: false,  // Prevent jQuery from automatically converting data
            contentType: false,  // Do not set content type (FormData handles it)
              
            success: function(response) {
                if (response.status == 'success') {
                    // Close the modal instead of redirecting
                    $('#edit-modal').modal('hide');
                    location.reload(); // Refresh to reflect changes
                } else if (response.status == 'error') {
                    // Clear all previous errors
                    $('.form-error').html('');

                    $.each(response.errors, function(field, error) {
                        var $input = $('[name="' + field + '"]');

                        if ($input.length > 0) {
                            if ($input.is('select')) {
                                // For select fields, find the nearest error div
                                $input.closest('.form-group').find('.form-error').html(error);
                            } else {
                                // For input fields, find the next error div
                                $input.next('.form-error').html(error);
                            }
                        }
                    });
                }
            },
            error: function(xhr, status, error) {
                console.log('AJAX error:', error);
                alert('An error occurred. Please try again.');
            }
        });
    });

    // Automatically remove error messages when the user interacts with the fields
    $(document).on('input change', '.form-control', function() {
        var $input = $(this);
        var $errorDiv = $input.next('.form-error');
        if ($errorDiv.length > 0) {
            $errorDiv.html(''); // Clear the error message when the user modifies the field
        }
    });
});

function updateSortIcons() {
    $(".sortable").each(function () {
        var icon = $(this).find("img.sortIcon");

        if ($(this).hasClass("sorting_desc")) {
            icon.attr("src", "../../assets/images/img/arrow_down1.svg");
        } else if ($(this).hasClass("sorting_asc")) {
            icon.attr("src", "../../assets/images/img/arrow_up1.svg");
        } else {
            icon.attr("src", "../../assets/images/img/unfold_more.svg");
        }
    });
}

// Initial call on page load
$(document).ready(function () {
    updateSortIcons();
});

// If sorting class changes dynamically on click
$(".sortable").click(function () {
    setTimeout(updateSortIcons, 10); // Allow time for sorting class to update before checking
});
</script>