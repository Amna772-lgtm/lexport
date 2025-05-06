<?php include __DIR__ . "/../header.php"; $control="mission_general";?>
<style>
    .nav {
        display: -webkit-box;
    }

    .bootbox-confirm .modal-dialog{
        width: 500px;
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
                            <?php echo $this->lang->line('GENERAL');?>
                        </h3>
                    </div> -->
                    <div class="theme-new-nav-menu">
                                
                                <ul>
                                    <li> <a href="http://lexport.demosbywpsqr.com/admin/customer/list_customer"><?php echo $this->lang->line('Client_Info')?></a> </li>
                                    <!-- <li> <a href="#">Service Details</a> </li> -->
                                    <li > <a href="http://lexport.demosbywpsqr.com/admin/mission_session/list_mission"><?php echo $this->lang->line('Cases')?></a> </li>
                                    <li> <a href="http://lexport.demosbywpsqr.com/admin/mission_writings/list_mission"><?php echo $this->lang->line('Writings')?></a> </li>
                                    <li> <a href="http://lexport.demosbywpsqr.com/admin/mission_consultation/list_mission"><?php echo $this->lang->line('Consultation')?></a> </li>
                                    <li class="active"> <a href="#"><?php echo $this->lang->line('General')?></a> </li>
                                    <li> <a href="http://lexport.demosbywpsqr.com/admin/archive/list_archive"><?php echo $this->lang->line('Files')?></a> </li>
                                    <li> <a href="http://lexport.demosbywpsqr.com/admin/report/by_employees"><?php echo $this->lang->line('Reports')?></a> </li>
                                    <li> <a href="http://lexport.demosbywpsqr.com/admin/admin/list_note"><?php echo $this->lang->line('Notes')?></a> </li>
                                    <li> <a href="http://lexport.demosbywpsqr.com/admin/finance"><?php echo $this->lang->line('Financial')?></a> </li>
                                </ul>

                            <a class="btn btn-primary" style="background: #1Faa5e;" href="#"> <i class="fa fa-plus"></i> <?php echo $this->lang->line('Assign')?></a>
                        </div>

                        <div class="theme-new-nav-menu2" style="background-color:#e0eaf7;">
                    
                            <ul>
                                <li class="active"> <a href="http://lexport.demosbywpsqr.com/admin/mission_general/list_mission"><?php echo $this->lang->line('General')?></a> </li>
                                <li> <a href="http://lexport.demosbywpsqr.com/admin/mission_general/list_mission"><?php echo $this->lang->line('Sub_Mission')?></a> </li>
                                
                            </ul>

                            <a style="display: none;" href="http://lexport.demosbywpsqr.com/admin/mission_general/find_mission/0"><i class="fa fa-plus"></i> Add General </a>
                            <a class="btn btn-primary add_general" href="#" data-toggle="modal" data-target="#add-modal"><i class="fa fa-plus"></i> <?php echo $this->lang->line('ADD_GENERAL')?> </a>
                        </div>
                </div>
            </div>

            <div class="m-portlet__body">
<!-- Assign -->
			<!-- <div id="msg" class="sufee-alert alert with-close alert-success alert-dismissible fade show success"></div> -->
					<!-- Assign -->
                <!-- SUb -->
					<?php 
					if($this->uri->segment(4)){ 
					    $subid = $this->uri->segment(4);
					} else {
					     $subid ='';
					}
					?>
					<!-- Sub -->
                     <!-- <ul class="nav nav-tabs" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link <?php if($this->uri->segment(3) == "list_mission") echo "active";?>" data-toggle="" href="<?=base_url("admin/$control/list_mission/$subid");?>" data-target="#m_tabs_1_1"><?php echo $this->lang->line('All');?></a>
                    </li> 
					<li class="nav-item">
                        <a class="nav-link <?php if($this->uri->segment(3) == "list_responsible") echo "active";?>" data-toggle="" href="<?=base_url("admin/$control/list_responsible/$subid");?>" data-target="#m_tabs_1_1"><?php echo $this->lang->line('Responsible_Employee');?> <span class="num_tab"><?php echo ResponsibleNotification('general_mission'); ?></span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php if($this->uri->segment(3) == "list_follow_up") echo "active";?>" data-toggle="" href="<?=base_url("admin/$control/list_follow_up/$subid");?>" data-target="#m_tabs_1_2"><?php echo $this->lang->line('Following_Employee');?> <span class="num_tab"><?php echo FollowNotification('general_mission'); ?></span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php if($this->uri->segment(3) == "list_pending_misssion") echo "active";?>" data-toggle="" href="<?=base_url("admin/$control/list_pending_misssion/$subid");?>" data-target="#m_tabs_1_3"><?php echo $this->lang->line('Pending');?> <span class="num_tab"><?php echo PendingNotification('general_mission'); ?></span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php if($this->uri->segment(3) == "list_close_mission") echo "active";?>" data-toggle="" href="<?=base_url("admin/$control/list_close_mission/$subid");?>" data-target="#m_tabs_1_4"><?php echo $this->lang->line('Close_Mission');?> <span class="num_tab"><?php echo CloseNotification('general_mission'); ?></span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php if($this->uri->segment(3) == "list_review") echo "active";?>" data-toggle="" href="<?=base_url("admin/$control/list_review/$subid");?>" data-target="#m_tabs_1_5"><?php echo $this->lang->line('In_Review');?> <span class="num_tab"><?php echo ReviewNotification('general_mission'); ?></span></a>
                    </li>
                </ul> -->
                <div class="tab-content">
                    <div class="tab-pane active" id="m_tabs_1_1" role="tabpanel">
                        <div class="m-portlet__body">
                            <div class="m_datatable m-datatable m-datatable--default m-datatable--loaded" style="">

                            <div class="table-responsive">
                                    <table class="lp-theme-table lp-large-theme" id="m_datatable">
                                        <thead>
                                        <tr class="netTr" style="text-align:left;">
                                            <th class="sortable"><?php echo $this->lang->line('Serial_No');?><img class="sortIcon" src="../../assets/images/img/unfold_more.svg" height="18px"> </th>
                                            <th class="sortable"><?php echo $this->lang->line('E-Service_Name');?><img class="sortIcon" src="../../assets/images/img/unfold_more.svg" height="18px"></th>
                                            <th class="sortable"><?php echo $this->lang->line('General_Date_and_Time');?><img class="sortIcon" src="../../assets/images/img/unfold_more.svg" height="18px"></th>
                                            <th class="sortable"><?php echo $this->lang->line('Subject');?><img class="sortIcon" src="../../assets/images/img/unfold_more.svg" height="18px"></th>
                                            <th class="sortable"><?php echo $this->lang->line('General_Type');?>
                                            <img class="sortIcon" src="../../assets/images/img/unfold_more.svg" height="18px">
                                            </th>
                                            <th class="sortable"><?php echo $this->lang->line('E-Service_No');?><img class="sortIcon" src="../../assets/images/img/unfold_more.svg" height="18px"></th>
                                            <th class="sortable"><?php echo $this->lang->line('Due_Date_and_Time');?><img class="sortIcon" src="../../assets/images/img/unfold_more.svg" height="18px"></th>
                                            <td></td>

                                       
                                            <!-- <th><?php echo $this->lang->line('Serial_No');?></th>
                                            <th><?php echo $this->lang->line('File_Number');?><br><i class="fa fa-arrow-up" style="font-size: 10px;font-weight: normal"></i><i class="fa fa-arrow-down" style="font-size: 10px;font-weight: normal"></i></th>
                                            <th><?php echo $this->lang->line('Client_Type');?><br><i class="fa fa-arrow-up" style="font-size: 10px;font-weight: normal"></i><i class="fa fa-arrow-down" style="font-size: 10px;font-weight: normal"></i></th>
                                            <th><?php echo $this->lang->line('Client_Name');?><br><i class="fa fa-arrow-up" style="font-size: 10px;font-weight: normal"></i><i class="fa fa-arrow-down" style="font-size: 10px;font-weight: normal"></i></th>
                                            <th><?php echo $this->lang->line('E_Service_Number');?><br><i class="fa fa-arrow-up" style="font-size: 10px;font-weight: normal"></i><i class="fa fa-arrow-down" style="font-size: 10px;font-weight: normal"></i></th>
					  sub -->
                                            <!-- <?php if(empty($this->uri->segment(4))){ ?>
                                            <th><?php echo $this->lang->line('Sub_Mission');?> <br><i class="fa fa-arrow-up" style="font-size: 10px;font-weight: normal"></i><i class="fa fa-arrow-down" style="font-size: 10px;font-weight: normal"></i></th>
                                        	<?php } ?>
                                            <th><?php echo $this->lang->line('General_Type');?><br><i class="fa fa-arrow-up" style="font-size: 10px;font-weight: normal"></i><i class="fa fa-arrow-down" style="font-size: 10px;font-weight: normal"></i></th>
                                        <th><?php echo $this->lang->line('Subject');?> <br><i class="fa fa-arrow-up" style="font-size: 10px;font-weight: normal"></i><i class="fa fa-arrow-down" style="font-size: 10px;font-weight: normal"></i></th>	<th><?php echo $this->lang->line('Responsible_Employee');?><br><i class="fa fa-arrow-up" style="font-size: 10px;font-weight: normal"></i><i class="fa fa-arrow-down" style="font-size: 10px;font-weight: normal"></i></th>
                                            <th><?php echo $this->lang->line('Following_Employee');?> <br><i class="fa fa-arrow-up" style="font-size: 10px;font-weight: normal"></i><i class="fa fa-arrow-down" style="font-size: 10px;font-weight: normal"></i></th>
                                            <th><?php echo $this->lang->line('End_Date');?><br><i class="fa fa-arrow-up" style="font-size: 10px;font-weight: normal"></i><i class="fa fa-arrow-down" style="font-size: 10px;font-weight: normal"></i></th>
                                            <th><?php echo $this->lang->line('End_Time');?><br><i class="fa fa-arrow-up" style="font-size: 10px;font-weight: normal"></i><i class="fa fa-arrow-down" style="font-size: 10px;font-weight: normal"></i></th>
                                            <th><?php echo $this->lang->line('Requirement');?><br><i class="fa fa-arrow-up" style="font-size: 10px;font-weight: normal"></i><i class="fa fa-arrow-down" style="font-size: 10px;font-weight: normal"></i></th>
                                            <th><?php echo $this->lang->line('Due_Time');?><br><i class="fa fa-arrow-up" style="font-size: 10px;font-weight: normal"></i><i class="fa fa-arrow-down" style="font-size: 10px;font-weight: normal"></i></th>
                                            <th><?php echo $this->lang->line('ACTION');?><br><i class="fa fa-arrow-up" style="font-size: 10px;font-weight: normal"></i><i class="fa fa-arrow-down" style="font-size: 10px;font-weight: normal"></i></th>
                                        </tr> -->
                                        </thead>
                                        <tbody>
             <?php 
              $count=1;
              foreach($data as $appoinment){  ?>
					<tr class="hide<?php echo $appoinment['id'] ?>" style="text-align:left;">
                    <?php $serial_number = sprintf("#%02d", $count++); ?>
    <td data-sort="<?= $count - 1 ?>"><?= $serial_number ?></td> 
    <td></td>
                <td><span class='hidetd'><?php echo getdateforshorting($appoinment['session_end_date']); ?></span><?php echo getTheDayAndDateFromDatePan($appoinment['session_end_date']); ?>
                <?= $appoinment['session_end_time'] ?></td>
                <td><?= $appoinment['subject'] ?></td>
                <td><?= getGeneralType($appoinment['general_type']); ?></td>
                <td><?= $appoinment['case_number']; ?></td>

                <td>
				    
				    <?php 
				    if($appoinment['is_close']==1){
				        echo clsoe_diff($appoinment['session_end_date'],$appoinment['session_end_time'],$appoinment['close_date']);
				    } else {
				    ?> 
				    <span class='countdown' style=" color: #0e8a00; font-weight: bold; " 
				  value='<?php echo mission_due_time($appoinment['session_end_date'],$appoinment['session_end_time']);?>' data-countdown='<?php echo mission_due_time($appoinment['session_end_date'],$appoinment['session_end_time']);?>'></span>
				  <?php } ?>
				  </td>


                <!-- <td><?= $appoinment['client_file_number'] ?></td> -->
				<!-- <td><?php   $row = $this->db->select('*')->where('client_file_number',$appoinment['client_file_number'])->get('customers')->row();   if($row){ echo $row->type_of_customer; }?></td> -->
                <!-- <td><?= $appoinment['client_name']; ?></td> -->
                
				<!-- sub -->
			    <!-- <?php if(empty($this->uri->segment(4))){ ?>
			    <td><a href="https://albarakatilaw.com/admin/mission_general/list_mission/<?php echo $appoinment['id'] ?>" class="num_tab" style="background-color: green;"><?php echo	getMissionCount( $appoinment['id'],"general_mission"); ?></a> </td>
				<?php  } ?> -->
				<!-- sub -->
				
				
				 <!-- <td>
				<?php  if($appoinment['responsible_employee'] != ''){ echo getEmployeeName($appoinment['responsible_employee']); } ?>
				</td>
					<td><?php echo getEmployeeName($appoinment['follow_up_employee']); ?></td>
                
				<td><?= $appoinment['note'] ?></td> -->
				
			<td class="action">
				<!-- ASSIGN -->
			
				<!-- <a href="javascript:;"  data-user="<?= $appoinment['customers_id'] ?>" id="<?= $appoinment['id'] ?>"  class="hideass<?php // $case['id'] ?> fa fa-user-plus assign_case" data-case="<?= $appoinment['case_id'] ?>" title="Assign Follow Up Employee">
				</a> -->
			
			<!-- ASSIGN -->
                <?php if(isset($datas[6][3]) && $datas[6][3] == 1) { ?>
					<a data-target="#view-modal" class="viewing-modal" data-toggle="modal" data-id="<?= $appoinment['id'] ?>" title="<?php echo $this->lang->line('View');?>">
                    <img src="<?= base_url('assets/images/img/eye-solid.svg') ?>" alt="View" class="img-eye">
					</a>
				<?php } ?>
				

				<?php if( isset($datas[6][1]) && $datas[6][1] == 1 ){ ?>
					<!-- <a href="<?= base_url("admin/$control/find_mission/{$appoinment['id']}") ?>" title="<?php echo $this->lang->line('Edit');?>"> -->
					<a data-target="#edit-modal" class="editing-modal" data-toggle="modal" data-id="<?= $appoinment['id'] ?>" title="<?php echo $this->lang->line('Edit');?>">
                        <div style="display:none" class="appointment_data" data-array='<?php echo json_encode( $appoinment ); ?>'></div>
                    <img src="<?= base_url('assets/images/img/pen-solid.svg') ?>" alt="Edit" class="img-pen">
					</a>
                <?php  } ?>

				    <?php if($this->session->userdata('role_id') == 1  ){ ?>
                    
					<a href="javascript:;" class="fa fa-trash delete_appoinment"  id="<?= $appoinment['id'] ?>" title="<?php echo $this->lang->line('Delete');?>">
					</a>
					 <?php  } ?>
					  
				
				
					<!-- <?php if(isset($datas[6][4]) && $datas[6][4] == 1) { ?>
					<span style="overflow: visible; position: relative;">
					<a href="javascript:;" data-user="<?= $appoinment['case_id'] ?>" id="<?= $appoinment['id'] ?>"  class="fa fa-refresh" title="<?php echo $this->lang->line('Convert_Case');?>">
					</a>
			
					 <?php  } ?> -->
                </td>
              </tr>
            <?php } ?>
                                        </tbody>
                                    </table>

                                    <!--Start Add  Modal -->
    <div class="modal fade lp-theme-modal" id="add-modal" tabindex="-1" role="dialog" aria-labelledby="modalTitle" aria-hidden="true">
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
                            echo form_hidden('case_id',$case_id); 
                            echo form_hidden('client_file_number',$case_data->client_file_number); 
                        ?>
                                    <div class="m-portlet__body theme-inner-form">

                                        <div class="form-field-container">
                                        <!-- <h3><?php echo $this->lang->line('General_Information');?></h3> -->
                                            <div class="form-group m-form__group row">
                                            <div class="form-group col-sm-4">
                            <label for="session_number" class=" form-control-label"><?php echo $this->lang->line('General_Number');?></label>
                            <?php if($data)
                            {
                                $session_number = set_value('session_number', 'GN' . rand(100000, 999999));
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
                            <?= form_input(['id'=>'session_number','name'=>'session_number','class'=>'form-control','value'=>$session_number,'readonly'=>'readonly']);?>
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

                            
                            <!-- <div class="input-group date"> -->
                                    <?= form_input(['id'=>'session_date','name'=>'session_date','readonly'=>'readonly','class'=>'form-control appdate','value'=>$value]);?>
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

                                    <?= form_input(['name'=>'session_time','type'=>'time','id'=>'session_time','required'=>'required','autocomplete'=>'off','class'=>'form-control deedate','value'=>$value]);?>
                            
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
                                    <?= form_input(['name'=>'session_end_date','id'=>'session_end_date','readonly'=>'readonly','class'=>'form-control appdate','value'=>$value]);?>
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

                            
                                    <?= form_input(['name'=>'session_end_time','type'=>'time','id'=>'session_end_time','required'=>'required','autocomplete'=>'off','class'=>'form-control deedate','value'=>$value]);?>
                            
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
                            <select name="session_code" class="form-control" id="session_code" >
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
                            <select class="form-control" id="responsible_employee" name="responsible_employee" value=""><option  value=""><?php echo $this->lang->line('Select_Employee');?> </option><?php  foreach ($employees as $employee) { ?><option value="<?php echo $employee["id"]?>"  <?php if($value ==  $employee["id"]) echo "selected=selected";?><?php if($case_data->responsible_employee ==  $employee["id"]) echo "selected=selected";?> ><?php echo $employee["name"]?></option><?php } ?></select>
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
                            <?= form_input(['id'=>'entry_no','name'=>'entry_no','class'=>'form-control','value'=>$value]);?>
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
                            <?= form_input(['id'=>'export_entry_no','name'=>'export_entry_no','class'=>'form-control','value'=>$value]);?>
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
                            <?= form_input(['id'=>'import_entry_no','name'=>'import_entry_no','class'=>'form-control','value'=>$value]);?>
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
                                        <?= form_textarea(['id'=>'requirement','name'=>'note','class'=>'form-control','rows'=>'4','value'=>$value,"required"=>"required"]);?>
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
    <div class="modal fade lp-theme-modal" id="edit-modal" tabindex="-1" role="dialog" aria-labelledby="modalTitle" aria-hidden="true">
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
    echo form_hidden('case_id',$case_id); 
    echo form_hidden('client_file_number',$case_data->client_file_number); 
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

    
    <!-- <div class="input-group date"> -->
    <?= form_input(['id'=>'session_date','name'=>'session_date','id'=>'session_date','readonly'=>'readonly','class'=>'form-control appdate session_date','value'=>$value]);?>
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

    
             <?= form_input(['name'=>'session_time','type'=>'time','id'=>'session_time','required'=>'required','autocomplete'=>'off','class'=>'form-control deedate session_time','value'=>$value]);?>
   
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
             <?= form_input(['name'=>'session_end_date','id'=>'session_end_date','readonly'=>'readonly','class'=>'form-control appdate session_end_date','value'=>$value]);?>
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

    
             <?= form_input(['name'=>'session_end_time','type'=>'time','id'=>'session_end_time','required'=>'required','autocomplete'=>'off','class'=>'form-control deedate session_end_time','value'=>$value]);?>
    
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
    <select class="form-control responsible_employee" id="responsible_employee" name="responsible_employee" value=""><option  value=""><?php echo $this->lang->line('Select_Employee');?> </option><?php  foreach ($employees as $employee) { ?><option value="<?php echo $employee["id"]?>"  <?php if($value ==  $employee["id"]) echo "selected=selected";?><?php if($case_data->responsible_employee ==  $employee["id"]) echo "selected=selected";?> ><?php echo $employee["name"]?></option><?php } ?></select>
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
    

<select class="form-control employee_id" id="employee_id" name="follow_up_employee" value=""><option  value=""><?php echo $this->lang->line('Select_Employee');?> </option><?php  foreach ($employees as $employee) { ?><option value="<?php echo $employee["id"]?>"  <?php if($value ==  $employee["id"]) echo "selected=selected";?> <?php if($case_data->follow_up_employee ==  $employee["id"]) echo "selected=selected";?> ><?php echo $employee["name"]?></option><?php } ?></select>
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
    <?= form_input(['id'=>'entry_no','name'=>'entry_no','class'=>'form-control','value'=>$value]);?>
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
    <?= form_input(['id'=>'export_entry_no','name'=>'export_entry_no','class'=>'form-control export_entry_no','value'=>$value]);?>
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
    <?= form_input(['id'=>'import_entry_no','name'=>'import_entry_no','class'=>'form-control entry_no','value'=>$value]);?>
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
                <?= form_textarea(['id'=>'requirement','name'=>'note','class'=>'form-control requirement','rows'=>'4','value'=>$value,"required"=>"required"]);?>
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
    <textarea name="report" id="report" class="report"><?php echo $value ?></textarea>
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
                <?= form_textarea(['name'=>'decision','id'=>'decision','class'=>'form-control decision','rows'=>'4','value'=>$value]);?>
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
    <div class="modal fade lp-theme-modal" id="view-modal" tabindex="-1" role="dialog" aria-labelledby="modalTitle" aria-hidden="true">
        <div class="modal-dialog" role="document">
            
        </div>
    </div>
         <!-- End View Modal -->




                                </div>
 
                            </div>


                        </div>
                    </div>
                    
                    </div>
                </div>
            </div>

        </div>


    </div>

</div>


<?php include __DIR__ . "/../footer.php"; ?>

<script type="text/javascript">

$("#m_datatable").on("click", ".assign_case", function() {
var id=$(this).attr("id");
var customers_id=$(this).data("user");
var case_id=$(this).data("case");
<?php 
date_default_timezone_set('Asia/Riyadh');
if($this->session->userdata('admin_site_lang')=="arabic" OR $this->session->userdata('admin_site_lang')==""){
$start_date = explode('-',date('Y-d-m'));
$start_date = Greg2Hijri($start_date[1],$start_date[2],$start_date[0],true); 

} else {
	$start_date = date('d/m/Y');
}
?>
var msg= $('#note_dialog').html();
var url="<?= base_url('admin/admin/assign_mission_following_emp'); ?>"; 

bootbox.confirm('<div class="assignpopup"><h3>Assign Following Employee</h3><select class="form-control employee_id" id="following_employee_id" name="following_employee_id" ><option value="0">Select Following Employee </option><?php  foreach (getEmployeeList() as $employee) { ?><option value="<?php echo $employee["id"]?>"><?php echo $employee["name"]?></option><?php } ?></select><!--<input type="text" placeholder="Start date" class="form-control col-md-6" name="start_date" id="start_date" value="<?php echo $start_date; ?>" readonly><input type="text" name="start_time" value="<?php echo date('h:i') ?>" placeholder="Start time" id="start_time" class="form-control  col-md-6" readonly>--><textarea placeholder="Notes*" name="note" id="notes" class="form-control col-md-12" required></textarea><label class="nterr" style="color:red"></label></div>', function(result){
if(result){
 
	var  following_employee_id = $('#following_employee_id :selected').val();
	var  start_date = $('#start_date').val();
	var  end_date = $('#end_date').val();
	var  start_time = $('#start_time').val();
	var  end_time = $('#end_time').val();
	var  notes = $('#notes').val();
if(notes==''){
	$('.nterr').html('Note is required');
	return false;
}
$('.nterr').html('');
    $.ajax({
    type:'ajax',
    method:'post',
    url:url,
    data:{"id" : id,"customers_id" : customers_id,'following_employee_id':following_employee_id,'start_date':start_date,'end_date':end_date,'start_time':start_time,'end_time':end_time,'notes':notes,type:'general_mission',case_id:case_id},
    success:function(data){
       $('#msg').show();
	   //alert(data);
		$('#msg').html(data);
	//	$('.hideass'+id).hide();
      },
  });

return true;
}
else
{
$('#msg').show();
	$('#msg').html('Assign Failed');
}
})
});
  <?php if(isset($datas[3][3]) && $datas[3][3] == 1){?>
    $('.dataTables_filter').show();
  <?php }else{?>
    $('.dataTables_filter').hide();
  <?php } ?>

  jQuery(document).ready(function($)
  {

    $(document).on( 'click', '.editing-modal', function(){
        var id = $(this).attr('data-id');
        var data = $(this).find('.appointment_data').data('array');
        $('.data_id').val(id);
        $('#case_id').val(data.case_number);
        $('.session_number').val(data.session_number);
        $('.session_date').val(data.session_date);
        $('.session_time').val(data.session_time);
        $('.session_end_date').val(data.session_end_date);
        $('.session_end_time').val(data.session_end_time);
        $('.session_code').val(data.session_code);
        $('.responsible_employee').val(data.responsible_employee);
        $('.employee_id').val(data.follow_up_employee);
        $('.entry_no').val(data.entry_no);
        $('.export_entry_no').val(data.export_entry_no);
        $('.import_entry_no').val(data.import_entry_no);
        $('.requirement').val(data.note);
        $('.decision').val(data.decision);
        $('.report').val(data.report);
    });

    $(document).on( 'click', '.viewing-modal', function(){
        var id = $(this).attr('data-id');
        var url="<?= base_url("admin/mission_general/view_mission/"); ?>" + id; 
        $.ajax({
          type:'ajax',
          url:url,
          success:function(data){
            $('#view-modal div').html(data);
          },
        });
    });

    $('.add_general').click(function(){
        $('.data_id').val('');
        $('#case_id').val('');
    });


    $('#msg').hide();
    $('#customers-table').DataTable();
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

$("#m_datatable").on("click", ".delete_appoinment", function() {
    
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
  $(document).ready(function() {
    var table = $('#m_datatable').DataTable();

    // Move the search bar (filter input)
    var searchInput = $('.dataTables_filter');
    searchInput.detach().prependTo('#custom-search-container');

    // Add placeholder to the search input field
    $('.dataTables_filter input').attr('placeholder', 'Search Client, E-Services........');
});
</script>

<style>
    .modal .modal-content .modal-header .close:before {
        content: "X";
        font-family: arial;
    }
    .modal .modal-content {
        background: #ffffff;
    }
</style>
 
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
$('.back-link').click(function() {
    window.history.back();
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