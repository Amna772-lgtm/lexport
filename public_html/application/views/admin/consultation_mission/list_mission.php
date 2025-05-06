<?php include __DIR__ . "/../header.php"; $control="mission_consultation";?>
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
                            <?php echo $this->lang->line('Consultation');?>
                        </h3>
                    </div> -->
                <div class="theme-new-nav-menu">
                <ul>
                        <li> <a href="http://lexport.demosbywpsqr.com/admin/customer/list_customer"><?php echo $this->lang->line('Client_Info')?></a> </li>
                        <!-- <li> <a href="#">Service Details</a> </li> -->
                        <li> <a href="http://lexport.demosbywpsqr.com/admin/mission_session/list_mission"><?php echo $this->lang->line('Cases')?></a> </li>
                        <li> <a href="http://lexport.demosbywpsqr.com/admin/mission_writings/list_mission"><?php echo $this->lang->line('Writings')?></a> </li>
                        <li class="active"> <a href="#"><?php echo $this->lang->line('Consultation')?></a> </li>
                        <li> <a href="http://lexport.demosbywpsqr.com/admin/mission_general/list_mission"><?php echo $this->lang->line('General')?></a> </li>
                        <li> <a href="http://lexport.demosbywpsqr.com/admin/archive/list_archive"><?php echo $this->lang->line('Files')?></a> </li>
                        <li> <a href="http://lexport.demosbywpsqr.com/admin/report/by_employees"><?php echo $this->lang->line('Reports')?></a> </li>
                        <li> <a href="http://lexport.demosbywpsqr.com/admin/admin/list_note"><?php echo $this->lang->line('Notes')?></a> </li>
                        <li> <a href="http://lexport.demosbywpsqr.com/admin/finance"><?php echo $this->lang->line('Financial')?></a> </li>
                    </ul>

                    <a class="btn btn-primary" style="background: #1Faa5e;" href="#"> <i class="fa fa-plus"></i> <?php echo $this->lang->line('Assign')?></a>
                </div>
                <div class="theme-new-nav-menu2" style="background-color:#e0eaf7;">
                    
                    <ul>
                        <li class="active"> <a href="http://lexport.demosbywpsqr.com/admin/mission_consultation/list_mission"><?php echo $this->lang->line('Consultation')?></a> </li>
                        <li> <a href="http://lexport.demosbywpsqr.com/admin/mission_consultation/list_mission"><?php echo $this->lang->line('Sub_Mission')?></a> </li>
                        
                    </ul>

                    <a class="btn btn-primary " href="#" data-toggle="modal" data-target="#add-modal"> <i class="fa fa-plus"></i> <?php echo $this->lang->line('ADD_CONSULTATION')?></a>
                </div>
                </div>
            </div>

            <div class="m-portlet__body">
   <!-- <div id="msg" class="sufee-alert alert with-close alert-success alert-dismissible fade show success"></div> -->
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
                        <a class="nav-link <?php if($this->uri->segment(3) == "list_responsible") echo "active";?>" data-toggle="" href="<?=base_url("admin/$control/list_responsible/$subid");?>" data-target="#m_tabs_1_1"><?php echo $this->lang->line('Responsible_Employee');?> <span class="num_tab"><?php echo ResponsibleNotification('consultation_mission'); ?></span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php if($this->uri->segment(3) == "list_follow_up") echo "active";?>" data-toggle="" href="<?=base_url("admin/$control/list_follow_up/$subid");?>" data-target="#m_tabs_1_2"><?php echo $this->lang->line('Following_Employee');?> <span class="num_tab"><?php echo FollowNotification('consultation_mission'); ?></span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php if($this->uri->segment(3) == "list_pending_misssion") echo "active";?>" data-toggle="" href="<?=base_url("admin/$control/list_pending_misssion/$subid");?>" data-target="#m_tabs_1_3"><?php echo $this->lang->line('Pending');?> <span class="num_tab"><?php echo PendingNotification('consultation_mission'); ?></span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php if($this->uri->segment(3) == "list_close_mission") echo "active";?>" data-toggle="" href="<?=base_url("admin/$control/list_close_mission/$subid");?>" data-target="#m_tabs_1_4"><?php echo $this->lang->line('Close_Mission');?> <span class="num_tab"><?php echo CloseNotification('consultation_mission'); ?></span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php if($this->uri->segment(3) == "list_review") echo "active";?>" data-toggle="" href="<?=base_url("admin/$control/list_review/$subid");?>" data-target="#m_tabs_1_5"><?php echo $this->lang->line('In_Review');?> <span class="num_tab"><?php echo ReviewNotification('consultation_mission'); ?></span></a>
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
                                            <th class="sortable"><?php echo $this->lang->line('Serial_No');?> <img class="sortIcon" src="/assets/images/img/unfold_more.svg" height="18px"></th>
                                            <th class="sortable"><?php echo $this->lang->line('E-Service_Name');?><img class="sortIcon" src="/assets/images/img/unfold_more.svg" height="18px"></th>
                                            <th class="sortable"><?php echo $this->lang->line('Consultation_Date_and_Time');?><img class="sortIcon" src="/assets/images/img/unfold_more.svg" height="18px"></th>
                                            <th class="sortable"><?php echo $this->lang->line('Subject');?><img class="sortIcon" src="/assets/images/img/unfold_more.svg" height="18px"></th>
                                            <th class="sortable"><?php echo $this->lang->line('Consultation_Type');?>
                                            <img class="sortIcon" src="/assets/images/img/unfold_more.svg" height="18px">
                                            </th>
                                            <th class="sortable"><?php echo $this->lang->line('E-Service_No');?><img class="sortIcon" src="/assets/images/img/unfold_more.svg" height="18px"></th>
                                            <th class="sortable"><?php echo $this->lang->line('Due_Date_and_Time');?><img class="sortIcon" src="/assets/images/img/unfold_more.svg" height="18px"></th>
                                            <th></th>
                                            
 					<!-- <th><?php echo $this->lang->line('SR_NO');?><br><i class="fa fa-arrow-up" style="font-size: 10px;font-weight: normal"></i><i class="fa fa-arrow-down" style="font-size: 10px;font-weight: normal"></i></th>
					<th><?php echo $this->lang->line('File_Number');?><br><i class="fa fa-arrow-up" style="font-size: 10px;font-weight: normal"></i><i class="fa fa-arrow-down" style="font-size: 10px;font-weight: normal"></i></th>
					<th><?php echo $this->lang->line('Client_Type');?><br><i class="fa fa-arrow-up" style="font-size: 10px;font-weight: normal"></i><i class="fa fa-arrow-down" style="font-size: 10px;font-weight: normal"></i></th>
					<th><?php echo $this->lang->line('Client_Name');?><br><i class="fa fa-arrow-up" style="font-size: 10px;font-weight: normal"></i><i class="fa fa-arrow-down" style="font-size: 10px;font-weight: normal"></i></th>
					<th><?php echo $this->lang->line('E_Service_Number');?><br><i class="fa fa-arrow-up" style="font-size: 10px;font-weight: normal"></i><i class="fa fa-arrow-down" style="font-size: 10px;font-weight: normal"></i></th> -->
					   <!-- sub -->
					<!-- <?php if(empty($this->uri->segment(4))){ ?>
					<th><?php echo $this->lang->line('Sub_Mission');?> <br><i class="fa fa-arrow-up" style="font-size: 10px;font-weight: normal"></i><i class="fa fa-arrow-down" style="font-size: 10px;font-weight: normal"></i></th>
					<?php } ?>
					<th><?php echo $this->lang->line('Consultation_Type');?><br><i class="fa fa-arrow-up" style="font-size: 10px;font-weight: normal"></i><i class="fa fa-arrow-down" style="font-size: 10px;font-weight: normal"></i></th>
				
                    <th><?php echo $this->lang->line('Subject');?> <br><i class="fa fa-arrow-up" style="font-size: 10px;font-weight: normal"></i><i class="fa fa-arrow-down" style="font-size: 10px;font-weight: normal"></i></th>	<th><?php echo $this->lang->line('Responsible_Employee');?><br><i class="fa fa-arrow-up" style="font-size: 10px;font-weight: normal"></i><i class="fa fa-arrow-down" style="font-size: 10px;font-weight: normal"></i></th>
					 <th><?php echo $this->lang->line('Following_Employee');?> <br><i class="fa fa-arrow-up" style="font-size: 10px;font-weight: normal"></i><i class="fa fa-arrow-down" style="font-size: 10px;font-weight: normal"></i></th>
					<th><?php echo $this->lang->line('End_Date');?><br><i class="fa fa-arrow-up" style="font-size: 10px;font-weight: normal"></i><i class="fa fa-arrow-down" style="font-size: 10px;font-weight: normal"></i></th>
					<th><?php echo $this->lang->line('End_Time');?><br><i class="fa fa-arrow-up" style="font-size: 10px;font-weight: normal"></i><i class="fa fa-arrow-down" style="font-size: 10px;font-weight: normal"></i></th>
				 	<th><?php echo $this->lang->line('Due_Time');?><br><i class="fa fa-arrow-up" style="font-size: 10px;font-weight: normal"></i><i class="fa fa-arrow-down" style="font-size: 10px;font-weight: normal"></i></th>
					<th><?php echo $this->lang->line('ACTION');?><br><i class="fa fa-arrow-up" style="font-size: 10px;font-weight: normal"></i><i class="fa fa-arrow-down" style="font-size: 10px;font-weight: normal"></i></th>                                          -->
                                        </tr>
                                        </thead>
                                        <tbody>
            <?php 
              $count=1;
              foreach($data as $appoinment){  ?>
				<tr class="hide<?php echo $appoinment['id'] ?>" style="text-align:left;">
                <?php $serial_number = sprintf("#%02d", $count++); ?>
                <td data-sort="<?= $count - 1 ?>"><?= $serial_number ?></td>
                <td><?= getServiceType($appoinment['service_types']); ?></td>
                 
                 <td><span class='hidetd'><?php echo getdateforshorting($appoinment['session_end_date']); ?></span><?php  echo getTheDayAndDateFromDatePan($appoinment['session_end_date']); ?>
                 <?= $appoinment['session_end_time'] ?></td>
                 <td><?= $appoinment['subject'] ?></td>
                 <td><?= $appoinment['consultation_type']; ?></td>
                 <td><?= $appoinment['case_number']; ?></td>
                 <td>
                 <?php 
				    if($appoinment[is_close]==1){
				        echo clsoe_diff($appoinment['session_end_date'],$appoinment['session_end_time'],$appoinment['close_date']);
				    } else {
				    ?> 
				    <span class='countdown' style=" color: #0e8a00; font-weight: bold; " 
				  value='<?php echo mission_due_time($appoinment['session_end_date'],$appoinment['session_end_time']);?>' data-countdown='<?php echo mission_due_time($appoinment['session_end_date'],$appoinment['session_end_time']);?>'></span>
				  <?php } ?>
				  </td>


                <!-- <td><?= $appoinment['client_file_number'] ?></td>
				<td><?php   $row = $this->db->select('*')->where('client_file_number',$appoinment['client_file_number'])->get('customers')->row();   if($row){ echo $row->type_of_customer; }?></td>
                <td><?= $appoinment['client_name']; ?></td>
                 -->
				<!-- sub -->
			    <!-- <?php if(empty($this->uri->segment(4))){ ?>
			    <td><a href="https://albarakatilaw.com/admin/mission_consultation/list_mission/<?php echo $appoinment['id'] ?>" class="num_tab" style="background-color: green;"><?php echo	getMissionCount( $appoinment['id'],"consultation_mission"); ?></a> </td>
				<?php  } ?> -->
				<!-- sub -->
            
            
				 <!-- <td>
				<?php  if($appoinment['responsible_employee'] != ''){ echo getEmployeeName($appoinment['responsible_employee']); } ?>
				</td> -->
					<!-- <td><?php echo getEmployeeName($appoinment['follow_up_employee']); ?></td>
                
			 
							<td> -->
				    
				    			 
				  <td class="action">
				  <!-- ASSIGN -->
			<!-- <span style="overflow: visible; position: relative;">
				<a href="javascript:;"  data-user="<?= $appoinment['customers_id'] ?>" id="<?= $appoinment['id'] ?>"  class="hideass<?php // $case['id'] ?> m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill assign_type dropdown assign_case" data-case="<?= $appoinment['case_id'] ?>" title="Assign Follow Up Employee">
					<i class="fa fa-user-plus"></i>
				</a>
			</span> -->
			<!-- ASSIGN -->
            <!-- <a href="javascript:;"  data-user="<?= $appoinment['customers_id'] ?>" id="<?= $appoinment['id'] ?>"  class="fa fa-user-plus assign_case" data-case="<?= $appoinment['case_id'] ?>" title="Assign Follow Up Employee">
            </a> -->
					<span style="overflow: visible; position: relative;"> 
                    <?php if(isset($datas[4][3]) && $datas[4][3] == 1) { ?>
					<a data-target="#view-modal" class="view-modal" data-toggle="modal" data-id="<?= $appoinment['id'] ?>" title="<?php echo $this->lang->line('View');?>">
					<img src="<?= base_url('assets/images/img/eye-solid.svg') ?>" alt="View" class="img-eye">
					</a>
				<?php } ?>

				<?php if((isset($datas[4][1]) && $datas[4][1] == 1)){ ?>
					<a data-target="#edit-modal" class="editing-modal" data-toggle="modal" data-id="<?= $appoinment['id'] ?>" title="<?php echo $this->lang->line('Edit');?>">
                        <div style="display:none" class="appointment_data" data-array='<?php echo json_encode( $appoinment ); ?>'></div>
                        <img src="<?= base_url('assets/images/img/pen-solid.svg') ?>" alt="Edit" class="img-pen">
					</a>
                <?php  } ?>

				    <?php if($this->session->userdata('role_id') == 1){ ?>
                    
					<a href="javascript:;" class="fa fa-trash delete_appoinment"  id="<?= $appoinment['id'] ?>" title="<?php echo $this->lang->line('Delete');?>">
					
					</a>
					 <?php  } ?>
					  
				
					</span>
					<!-- <?php if(isset($datas[4][4]) && $datas[4][4] == 1) { ?>
					<span style="overflow: visible; position: relative;">
					<a href="javascript:;" data-user="<?= $appoinment['case_id'] ?>" id="<?= $appoinment['id'] ?>"  class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill convert_case" title="<?php echo $this->lang->line('Convert_Case');?>">
					<i class="fa fa-refresh"></i>
					</a>
					</span> -->
					 <!-- <?php  } ?> -->
                </td>
              </tr>
            <?php } ?>
                                        </tbody>
                                    </table>


                <!-- start add modal -->
                <div class="modal fade lp-theme-modal" id="add-modal" tabindex="-1" role="dialog" aria-labelledby="modalTitle" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="modalTitle">Add New Consultation</h5>
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
                       <?php if($data){ ?>
                            <?php echo $this->lang->line('Edit_Consultation');?>
                        <?php	} else { ?>
                            <?php //sub
                            if($this->uri->segment(5)){
                            echo "Add Consultation Sub Mission For #".getMissionNumber($this->uri->segment(5),"consultation_mission");
                            } else {
                                echo $this->lang->line('ADD_CONSULTATION'); 
                            } 
                            //sub
                            ?>
                        
                    <?php } ?>
                    </h3>
                </div> -->
            </div>
        </div>

        <!--begin::Form-->

<?php echo form_open_multipart('admin/mission_consultation/store_mission',['id'=>'customer','class'=>'m-form m-form--fit m-form--label-align-right m-form--group-seperator-dashed']);
//sub
 $sub_mission_id=set_value('sub_mission_id',$this->uri->segment(5));
 if($sub_mission_id){ 
         echo form_hidden('sub_mission_id',$sub_mission_id); 
 }
 //sub
 if($data) $temp_app_id = $data->id; else  $temp_app_id = "0"; 
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
?>      <div class="m-portlet__body theme-inner-form">

                
                    <div class="form-field-container">
                        <!-- <h3><?php echo $this->lang->line('Consultation_Information');?></h3> -->
                    
                    <div class="form-group m-form__group row">
                        <div class="form-group col-sm-6">
                            <label for="consultation_code" class=" form-control-label"><?php echo $this->lang->line('Client_Name');?></label>
                            <?= form_input(['id'=>'client_name','placeholder'=>'','class'=>'form-control client_name','value'=>$case_data->client_name,'readonly'=>'readonly']);?>
                        </div>

                        <div class="form-group col-sm-6">
                            <label for="consultation_code" class=" form-control-label"><?php echo $this->lang->line('E_Service_Number');?></label>
                            <?= form_input(['id'=>'case_id','placeholder'=>'','class'=>'form-control case_id','value'=>$case_data->case_number,'readonly'=>'readonly']);?>
                        </div>
                        <div class="form-group col-sm-6">
                            <label for="session_date" class=" form-control-label"><?php echo $this->lang->line('Consultation_Date');?>*</label>
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
                                <?= form_input(['name'=>'session_date','id'=>'session_date','readonly'=>'readonly','class'=>'form-control appdate','value'=>$value]);?>
                            <div class="input-group-append">
                            <span class="input-group-text"><i class="fa fa-calendar-check-o"></i></span>
                            </div>
                            <!-- </div> -->
                            <div class="form-error"><?= form_error('session_date'); ?></div>
                        </div>

                        <div class="form-group col-sm-6">
                            <label for="session_time" class=" form-control-label"><?php echo $this->lang->line('Consultation_Time');?>*</label>
                            <?php if($data)
                            {
                                $value=$data->session_time;
                            }
                            else
                            {
                                $value=set_value('session_time');
                            } ?>
                        <?= form_input(['name'=>'session_time', 'type'=> 'time', 'id'=>'session_time','class'=>'form-control','value'=>$value]);?>
                            
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
                                    <?= form_input(['name'=>'session_end_date','id'=>'session_end_date','readonly'=>'readonly','class'=>'form-control appdate','value'=>$value]);?>
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

                            
                            
                                <?= form_input(['name'=>'session_end_time','type'=>'time', 'id'=>'session_end_time','autocomplete'=>'off','required'=>'required','class'=>'form-control','value'=>$value]);?>
                            
                            
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
                            <label for="consultation_type" class=" form-control-label"><?php echo $this->lang->line('Consultation_Type');?></label>
                            <?php if($data)
                            {
                                $value=$data->consultation_type;
                            }
                            else
                            {
                                $value=set_value('consultation_type');
                            } ?>
                            

                            <select class="form-control" id="employee_id" name="consultation_type" ><option  value=""><?php echo $this->lang->line('Select_Consultation_Type');?> </option><?php  foreach (getConsultationType() as $employee) { ?><option value="<?php echo $employee["name"]?>"  <?php if($value ==  $employee["name"]) echo "selected=selected";?>><?php echo $employee["name"]?></option><?php } ?></select>
                            <div class="form-error"><?= form_error('consultation_type'); ?></div>
                        </div>
                        
                    </div>

                </div>
            

                <div class="form-field-container">
                    <h3><?php echo $this->lang->line('Description');?></h3>
                        
                    <textarea value=""  id="comment" class="form-control"></textarea> 
                    
                </div>
                <div class="form-field-container d-flex justify-content-between align-items-center mb-2">
    <h3 class="mb-0"><?php echo $this->lang->line('Attachment'); ?></h3>

    <!-- Styled like underlined text -->
    <span class="add_attachment" onclick="addAttachment('edit-attachment-container', 'edit-attachment-list')">
        Add Attachment
    </span>
</div>

<!-- Styled container for attachments (initially hidden) -->
<div class="attachment-list" id="edit-attachment-container" style="display: none;">
    <div id="edit-attachment-list"></div>
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
                                        <input type="hidden" name="session_number" value="<?php echo "WN". str_pad(rand(0, 999999), 6, '0', STR_PAD_LEFT); ?> ">
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


                <!-- start edit modal -->
                <div class="modal fade lp-theme-modal" id="edit-modal" tabindex="-1" role="dialog" aria-labelledby="modalTitle" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="modalTitle">Edit Consultation</h5>
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
                                                <?php if($data){ ?>
                                    <?php echo $this->lang->line('Edit_Consultation');?>
                                <?php	} else { ?>
                                    <?php //sub
                                    if($this->uri->segment(5)){
                                    echo "Add Consultation Sub Mission For #".getMissionNumber($this->uri->segment(5),"consultation_mission");
                                    } else {
                                        echo $this->lang->line('ADD_CONSULTATION'); 
                                    } 
                                    //sub
                                    ?>
                                
                            <?php } ?>
                                                </h3>
                                            </div> -->
                                        </div>
                                    </div>

                                    <!--begin::Form-->

                            <?php echo form_open_multipart('admin/mission_consultation/store_mission',['id'=>'customer','class'=>'m-form m-form--fit m-form--label-align-right m-form--group-seperator-dashed']);
                            //sub
                            $sub_mission_id=set_value('sub_mission_id',$this->uri->segment(5));
                            if($sub_mission_id){ 
                                    echo form_hidden('sub_mission_id',$sub_mission_id); 
                            }
                            //sub
                            if($data) $temp_app_id = $data->id; else  $temp_app_id = "0"; 
                                echo form_input(['type' => 'hidden', 'name' => 'id', 'value' => $data->id, 'class' => 'data_id']);
                            ?>
                            <?php
                                $case_id = ''; 
                                if($case_data)
                                {
                                    $case_id = $case_data->id;
                                } else {
                                    $case_id = $case_data->id;
                                }
                                echo form_input(['type' => 'hidden', 'name' => 'case_id', 'value' => $case_id, 'class' => 'case_id']);
                                echo form_input(['type' => 'hidden', 'name' => 'client_file_number', 'value' => $case_data->client_file_number, 'class' => 'client_file_number']); 
                            ?>      <div class="m-portlet__body theme-inner-form">

                
                    <div class="form-field-container">
                        <!-- <h3><?php echo $this->lang->line('Consultation_Information');?></h3> -->
                    
                    <div class="form-group m-form__group row">
                        <div class="form-group col-sm-6">
                            <label for="consultation_code" class=" form-control-label"><?php echo $this->lang->line('Client_Name');?></label>
                            <?= form_input(['id'=>'client_name','placeholder'=>'','class'=>'form-control client_name','value'=>$case_data->client_name,'readonly'=>'readonly']);?>
                        </div>
                        <div class="form-group col-sm-6">
                            <label for="consultation_code" class=" form-control-label"><?php echo $this->lang->line('E_Service_Number');?></label>
                            <?= form_input(['id'=>'case_id','placeholder'=>'','class'=>'form-control case_id','value'=>$case_data->case_number,'readonly'=>'readonly']);?>
                        </div>
                        <div class="form-group col-sm-6">
                            <label for="session_date" class=" form-control-label"><?php echo $this->lang->line('Consultation_Date');?>*</label>
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
                                <?= form_input(['name'=>'session_date','id'=>'session_date','readonly'=>'readonly','class'=>'form-control appdate session_date','value'=>$value]);?>
                            <div class="input-group-append">
                            <span class="input-group-text"><i class="fa fa-calendar-check-o"></i></span>
                            </div>
                            <!-- </div> -->
                            <div class="form-error"><?= form_error('session_date'); ?></div>
                        </div>

                        <div class="form-group col-sm-6">
                            <label for="session_time" class=" form-control-label"><?php echo $this->lang->line('Consultation_Time');?>*</label>
                            <?php if($data)
                            {
                                $value=$data->session_time;
                            }
                            else
                            {
                                $value=set_value('session_time');
                            } ?>
                    
                            
                                <?= form_input(['name'=>'session_time','type'=>'time', 'id'=>'session_time','required'=>'required','autocomplete'=>'off','class'=>'form-control session_time','value'=>$value]);?>
                            
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
                                    <?= form_input(['name'=>'session_end_date','id'=>'session_end_date','readonly'=>'readonly','class'=>'form-control appdate session_end_date','value'=>$value]);?>
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

                            
                            
                                <?= form_input(['name'=>'session_end_time','type'=>'time','id'=>'session_end_time','autocomplete'=>'off','required'=>'required','class'=>'form-control session_time','value'=>$value]);?>
                            
                           
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
                            <?= form_input(['name'=>'subject','placeholder'=>'','class'=>'form-control subject','value'=>$value]);?>
                        </div>

                        <div class="form-group col-sm-6">		
                            <label for="consultation_type" class=" form-control-label"><?php echo $this->lang->line('Consultation_Type');?></label>
                            <?php if($data)
                            {
                                $value=$data->consultation_type;
                            }
                            else
                            {
                                $value=set_value('consultation_type');
                            } ?>
                            

                            <select class="form-control consultation_type" id="employee_id" name="consultation_type" ><option  value=""><?php echo $this->lang->line('Select_Consultation_Type');?> </option><?php  foreach (getConsultationType() as $employee) { ?><option value="<?php echo $employee["name"]?>"  <?php if($value ==  $employee["name"]) echo "selected=selected";?>><?php echo $employee["name"]?></option><?php } ?></select>
                            <div class="form-error"><?= form_error('consultation_type'); ?></div>
                        </div>
                    </div>
                        </div>
                    <div class="form-field-container">
                    <h3><?php echo $this->lang->line('Description');?></h3>
                        
                    <textarea value=""  id="comment" class="form-control"></textarea> 
                    
                </div>
                <div class="form-field-container d-flex justify-content-between align-items-center mb-2">
    <h3 class="mb-0"><?php echo $this->lang->line('Attachment'); ?></h3>

    <!-- Styled like underlined text -->
    <span class="add_attachment" onclick="addAttachment('edit1-attachment-container', 'edit1-attachment-list')">
        Add Attachment
    </span>
</div>

<!-- Styled container for attachments (initially hidden) -->
<div class="attachment-list" id="edit1-attachment-container" style="display: none;">
    <div id="edit1-attachment-list"></div>
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
                                        <input type="hidden" name="session_number" value="<?php echo "WN". str_pad(rand(0, 999999), 6, '0', STR_PAD_LEFT); ?> ">
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
                <!-- End edit Modal -->

                <!-- start view modal -->
                <div class="modal fade lp-theme-modal" id="view-modal" tabindex="-1" role="dialog" aria-labelledby="modalTitle" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="modalTitle">View Consultation</h5>
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
                                                <?php if($data){ ?>
                                    <?php echo $this->lang->line('Edit_Consultation');?>
                                <?php	} else { ?>
                                    <?php //sub
                                    if($this->uri->segment(5)){
                                    echo "Add Consultation Sub Mission For #".getMissionNumber($this->uri->segment(5),"consultation_mission");
                                    } else {
                                        echo $this->lang->line('ADD_CONSULTATION'); 
                                    } 
                                    //sub
                                    ?>
                                
                            <?php } ?>
                                                </h3>
                                            </div> -->
                                        </div>
                                    </div>

                                    <!--begin::Form-->

                            <?php echo form_open_multipart('admin/mission_consultation/store_mission',['id'=>'customer','class'=>'m-form m-form--fit m-form--label-align-right m-form--group-seperator-dashed']);

                            ?>      <div class="m-portlet__body theme-inner-form">

                
                    <div class="form-field-container">
                        <h3><?php echo $this->lang->line('Consultation_Information');?></h3>
                    
                    <div class="form-group m-form__group row">
                        
                        <div class="form-group col-sm-12">
                            <label for="consultation_code" class=" form-control-label"><?php echo $this->lang->line('E_Service_Number');?></label>
                            <div>
                                <span class="case_id"></span>
                            </div>
                        </div>
                        <div class="form-group col-sm-6">
                            <label for="session_date" class=" form-control-label"><?php echo $this->lang->line('Consultation_Date');?>*</label>
                            <div>
                                <span class="session_date"></span>
                            </div>
                        </div>

                        <div class="form-group col-sm-6">
                            <label for="session_time" class=" form-control-label"><?php echo $this->lang->line('Consultation_Time');?>*</label>
                            <div>
                                <span class="session_time"></span>
                            </div>
                        </div>

                        <div class="form-group col-sm-6">
                            <label for="session_end_date" class=" form-control-label"><?php echo $this->lang->line('Consultation_End_Date');?>*</label>
                            <div>
                                <span class="session_end_date"></span>
                            </div>
                        </div>

                        <div class="form-group col-sm-6">
                            <label for="session_time" class=" form-control-label"><?php echo $this->lang->line('Consultation_End_Time');?>*</label>
                            <div>
                                <span class="session_end_time"></span>
                            </div>
                        </div>

                        <div class="form-group col-sm-6">	
                            <label for="session_code" class=" form-control-label"><?php echo $this->lang->line('Consultation_Status');?>*</label>
                            <div>
                                <span class="session_code"></span>
                            </div>
                        </div>
                        <?php 

                            $assginuser= $this->db->select('user_id')->where('client_file_number',$case_data->client_file_number)->get('customers')->row();
                            if(isset($assginuser)){
                            if($assginuser->user_id == $this->session->userdata('admin_id')|| $this->session->userdata('role_id') == 1){  ?> 
                        <div class="form-group col-sm-6">
                            <label for="responsible_employee" class=" form-control-label"><?php echo $this->lang->line('Responsible_Employee');?></label>
                            <div>
                                <span class="responsible_employee"></span>
                            </div>
                        </div>
                        <div class="form-group col-sm-6">		
                            <label for="follow_up_employee" class=" form-control-label"><?php echo $this->lang->line('Follow_up_Employee');?></label>
                            <div>
                                <span class="follow_up_employee"></span>
                            </div>
                        </div>
                        <?php } ?>
                        <?php } ?>
                         <!-- <div class="clear"></div> -->
                        <div class="form-group col-sm-6">		
                            <label for="consultation_type" class=" form-control-label"><?php echo $this->lang->line('Consultation_Type');?></label>
                            <div>
                                <span class="consultation_type"></span>
                            </div>
                        </div>
                        <div class="form-group col-sm-6">
                            <label for="subject" class=" form-control-label"><?php echo $this->lang->line('Subject');?></label>
                            <div>
                                <span class="subject"></span>
                            </div>
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
                    <textarea value="" rows="4" id="comment" class="form-control" disabled></textarea> 
                    <div class="row col-md-12"><span class="commenterror" style="color:red"></span>	</div>
     
                        <a href="javascript:;" class="btn btn-primary" style="margin-top:20px" id="btncmt"><?php echo $this->lang->line('Add_New_Note');?></a>
                    </div>
                </div>
                            
                <div class="form-field-container">
                    <h3><?php echo $this->lang->line('Report');?></h3>
                    
                    <div class="form-group">
                        <textarea name="report" id="report" class="report" disabled></textarea>
                        <span style="color:red" id="reporterorr"></span>
                        <!-- <script>
                            CKEDITOR.replace( 'report' );
                        </script> -->
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-6">
                        
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

bootbox.confirm('<div class="assignpopup"><h3>Assign Following Employee</h3><select class="form-control" id="following_employee_id" name="following_employee_id" ><option value="0">Select Following Employee </option><?php  foreach (getEmployeeList() as $employee) { ?><option value="<?php echo $employee["id"]?>"><?php echo $employee["name"]?></option><?php } ?></select><!--<input type="text" placeholder="Start date" class="form-control col-md-6" name="start_date" id="start_date" value="<?php echo $start_date; ?>" readonly><input type="text" name="start_time" value="<?php echo date('h:i') ?>" placeholder="Start time" id="start_time" class="form-control  col-md-6" readonly>--><textarea placeholder="Notes*" name="note" id="notes" class="form-control col-md-12" required></textarea><label class="nterr" style="color:red"></label></div>', function(result){
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
    data:{"id" : id,"customers_id" : customers_id,'following_employee_id':following_employee_id,'start_date':start_date,'end_date':end_date,'start_time':start_time,'end_time':end_time,'notes':notes,type:'consultation_mission',case_id:case_id},
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
    $('#msg').hide();
    $('#customers-table').DataTable();

    $(document).on( 'click', '.editing-modal', function(){
        var id = $(this).attr('data-id');
        var data = $(this).find('.appointment_data').data('array');       
        $('#edit-modal .data_id').val(id);
        $('#edit-modal .client_name').val(data.client_name);

        $('#edit-modal .session_number').val(data.session_number);
        $('#edit-modal #case_id').val(data.case_number);

        $('#edit-modal .session_date').val(data.session_date);
        $('#edit-modal .session_time').val(data.session_time);
        $('#edit-modal .session_end_date').val(data.session_end_date);
        $('#edit-modal .session_end_time').val(data.session_end_time);
        $('#edit-modal .session_code').val(data.session_code);
        $('#edit-modal .consultation_type').val(data.consultation_type);
        $('#edit-modal .responsible_employee').val(data.responsible_employee);
        $('#edit-modal .follow_up_employee').val(data.follow_up_employee);
        $('#edit-modal .subject').val(data.subject);
        $('#edit-modal #comment').val(data.note);
        $('#edit-modal .report').val(data.report);
    });

    $(document).on( 'click', '.view-modal', function(){
        var id = $(this).attr('data-id');
        var data = $('.editing-modal[data-id="' + id + '"]').find('.appointment_data').data('array');
        $('#view-modal .session_number').text(data.session_number);
        $('#view-modal .case_id').text(data.case_number);
        $('#view-modal .session_date').text(data.session_date);
        $('#view-modal .session_time').text(data.session_time);
        $('#view-modal .session_end_date').text(data.session_end_date);
        $('#view-modal .session_end_time').text(data.session_end_time);
        $('#view-modal .session_code').text(data.session_code);
        $('#view-modal .consultation_type').text(data.consultation_type);
        $('#view-modal .responsible_employee').text(data.responsible_employee);
        $('#view-modal .follow_up_employee').text(data.follow_up_employee);
        $('#view-modal .subject').text(data.subject);
        $('#view-modal #comment').text(data.note);
        $('#view-modal .report').text(data.report);       
    });

    $('.back-link').click(function() {
        window.history.back();
    });

  });

  function updateSortIcons() {
    $(".sortable").each(function () {
        var icon = $(this).find("img.sortIcon");

        if ($(this).hasClass("sorting_desc")) {
            icon.attr("src", "/assets/images/img/arrow_down1.svg");
        } else if ($(this).hasClass("sorting_asc")) {
            icon.attr("src", "/assets/images/img/arrow_up1.svg");
        } else {
            icon.attr("src", "/assets/images/img/unfold_more.svg");
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

function addAttachment(containerId = 'attachment-container', listId = 'attachment-list') {
    const attachmentContainer = document.getElementById(containerId);
    const attachmentList = document.getElementById(listId);

    // Create hidden input
    const input = document.createElement('input');
    input.type = 'file';
    input.name = 'attachments[]';
    input.className = 'd-none';
    document.body.appendChild(input);

    input.addEventListener('change', function () {
        const fileName = input.files[0]?.name;
        if (fileName) {
            // Show styled box
            attachmentContainer.style.display = 'block';
            attachmentContainer.style.padding = '5px 12px';

            const wrapper = document.createElement('div');
            wrapper.className = 'd-flex justify-content-between align-items-center mb-2';

            const fileLabel = document.createElement('span');
            fileLabel.textContent = fileName;
            fileLabel.className = 'ms-2';

            const deleteIcon = document.createElement('a');
            deleteIcon.href = 'javascript:;';
            deleteIcon.className = 'fa fa-trash text-danger';
            deleteIcon.title = 'Delete';
            deleteIcon.onclick = function () {
                wrapper.remove();
                if (attachmentList.children.length === 0) {
                    attachmentContainer.style.display = 'none';
                }
            };

            wrapper.appendChild(fileLabel);
            wrapper.appendChild(deleteIcon);
            wrapper.appendChild(input);

            attachmentList.appendChild(wrapper);
        } else {
            input.remove(); // If user cancels
        }
    });

    input.click();
}

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
 
