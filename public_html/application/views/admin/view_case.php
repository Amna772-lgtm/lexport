<?php
include('header.php');?>
<!-- FullCalendar v5 CSS -->
<link href="https://cdn.jsdelivr.net/npm/fullcalendar@5.11.0/main.min.css" rel="stylesheet" />

<!-- FullCalendar v5 JS -->
<script src="https://cdn.jsdelivr.net/npm/fullcalendar@5.11.0/main.min.js"></script>

<!-- Moment.js (for time parsing) -->
<script src="https://cdn.jsdelivr.net/npm/moment@2.29.1/moment.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="<?php echo base_url('assets/');?>vendors/bootstrap/dist/js/bootstrap.min.js" type="text/javascript"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootbox.js/5.5.2/bootbox.min.js" integrity="sha512-RdSPYh1WA6BF0RhpisYJVYkOyTzK4HwofJ3Q7ivt/jkpW6Vc8AurL1R+4AUcvn9IwEKAPm/fk7qFZW3OuiUDeg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<style>
    .m-form.m-form--group-seperator-dashed .m-form__group {
        border-bottom: 0px dashed #ebedf2;
    }

    .thh h3 {
        background: #1F3958;
        color: #fff;
        font-weight: bold;
        font-size: 15px;
        text-transform: uppercase;
        padding: 10px 10px 10px 29px;
        -webkit-border-top-left-radius: 20px !important;
        -webkit-border-top-right-radius: 20px !important;
        -moz-border-radius-topleft: 20px !important;
        -moz-border-radius-topright: 20px !important;
        border-top-left-radius: 20px !important;
        border-top-right-radius: 20px !important;
        margin: 15px 15px 0 15px;
    }

    .in_fo {
        box-shadow: 0px 5px 10px 0px #cccccc !important;
        margin: 0 15px;
        padding-bottom: 20px;
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

    .m-portlet .m-form.m-form--fit>.m-portlet__body {
        padding-bottom: 40px !important;
    }

    html[dir="rtl"] .m-portlet .m-form.m-form--fit>.m-portlet__body {
        padding-top: 20px !important;
    }

    .nav {
        display: -webkit-box;
    }

    .m-portlet {
        margin-bottom: 0;
    }

    .m-widget4 .m-widget4__item .m-widget4__info {
        width: 97.7%;
    }

    .c_tabs {
        display: none;
    }

    .tab_active {
        display: block;
    }

    div.m_datatable div.dataTables_wrapper .row:first-child {
        display: none;
    }

    #calendar .fc-scroller table.fc-col-header {
        width: 100% !important;
    }
    

    span.down_img{
        background: #1866a9;
        border-radius: 100%;
        align-items: center;
        width: 26px;
        height: 26px;
    }
    td.action {
        position: relative;
        z-index: 999;
    }
    .modal .m-grid__item.m-grid__item--fluid.m-wrapper {
        padding-left: unset;
    }
    .assignpopup{
        margin-top:20px;
    }
    .modal .bootbox-close-button.close{
        top: 0 !important;
        font-size:50px !important;
    }

</style>
<?php
// $notes = $this->db->select('*')->where("(case_id = '1882')", NULL, FALSE)->get('note')->result_array();

?>

<div class="m-grid__item m-grid__item--fluid m-wrapper">
<?php
$current_data = $data;
?>
    <div style="position:absolute;">
        <img class="custom-search-icon" src="/assets/images/img/search-icon.svg" alt="Search">
        <input type="text" id="userSearch" class="form-control" placeholder="Search Client, E-Services........">
    </div>
    
    
    <!-- END: Subheader -->
    <div class="m-content">

        <!--begin::Portlet-->
        <div class="m-portlet lp-theme-card bg-transparent">
            <div class="m-portlet__head">
                <div class="m-portlet__head-caption">
                    <!-- <div class="m-portlet__head-title">
                        <h3 class="m-portlet__head-text">
                            <?php echo $this->lang->line('E_Service_Number'); ?> #<?php echo $data->case_number; ?>
                        </h3>
                    </div> -->

                    <div class="theme-new-nav-menu">
                        <a class="back-link" href="/admin/c_case/list_case">
                            <svg width="16" height="14" viewBox="0 0 16 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M7.70679 13.7006C7.51926 13.888 7.26495 13.9934 6.99979 13.9934C6.73462 13.9934 6.48031 13.888 6.29279 13.7006L0.292786 7.70057C0.105315 7.51304 0 7.25874 0 6.99357C0 6.72841 0.105315 6.4741 0.292786 6.28657L6.29279 0.286571C6.48139 0.104413 6.73399 0.00361876 6.99619 0.00589718C7.25838 0.0081756 7.5092 0.113345 7.6946 0.298753C7.88001 0.484161 7.98518 0.734973 7.98746 0.99717C7.98974 1.25937 7.88894 1.51197 7.70679 1.70057L3.41379 5.99357H14.9998C15.265 5.99357 15.5194 6.09893 15.7069 6.28646C15.8944 6.474 15.9998 6.72835 15.9998 6.99357C15.9998 7.25879 15.8944 7.51314 15.7069 7.70068C15.5194 7.88821 15.265 7.99357 14.9998 7.99357H3.41379L7.70679 12.2866C7.89426 12.4741 7.99957 12.7284 7.99957 12.9936C7.99957 13.2587 7.89426 13.513 7.70679 13.7006Z" fill="#333333"/>
                            </svg>
                        Back</a>
                        <ul>
                            <li class="c_nav active" id="service"> <a ><?php echo $this->lang->line('Service_Details')?></a> </li>
                            <li class="c_nav" id="session"> <a><?php echo $this->lang->line('Cases')?></a> </li>
                            <li class="c_nav" id="writing"> <a ><?php echo $this->lang->line('Writings')?></a> </li>
                            <li class="c_nav" id="consultation"> <a ><?php echo $this->lang->line('Consultation')?></a> </li>
                            <li class="c_nav" id="visiting"> <a ><?php echo $this->lang->line('Meetings')?></a> </li>
                            <li id="general" class="c_nav"> <a ><?php echo $this->lang->line('General')?></a> </li>
                            <li class="c_nav" id="files"> <a ><?php echo $this->lang->line('Files')?></a> </li>
                            <li class="c_nav" id="reports"> <a ><?php echo $this->lang->line('Reports')?></a> </li>
                            <li class="c_nav" id="note"> <a ><?php echo $this->lang->line('Note');?></a> </li>
                        </ul>
                        <?php
                        $disabled = '';
                        $disabled_class = '';
                        $disabled_attr = '';

                        foreach ($list as $case) {
                            if ($data->case_id == $case['case_id']) {
                                if (!empty($case['responsible_employee']) || !empty($case['follow_up_employee'])) {
                                    $disabled_class = 'disabled'; // for styling
                                    $disabled_attr = 'style="pointer-events: none; opacity: 0.6;"'; // for disabling
                                }
                                break;
                            }
                        }
                        ?>
                        <a class="btn btn-primary assign_case <?= $disabled_class ?>" id="<?= $data->case_id ?>" href="javascript:;" <?= $disabled_attr ?>>
                            <i class="fa fa-plus"></i> <?= $this->lang->line('Assign') ?>
                        </a>

                    </div>
                </div>
            </div>
            
            <div class="c_tabs service tab_active case">
                <div class="c_buttons d-flex justify-content-between" style="margin-top: 20px;">
                    <div>
                        <a class="btn btn-primary" id="<?= $data->case_id ?>" href="<?php echo base_url('admin/finance/create_invoice/').$data->case_id; ?>" >
                            <i class="fa fa-plus"></i> <?= $this->lang->line('Create_Invoice') ?>
                        </a>
                        <a class="btn btn-primary" id="<?= $data->case_id ?>" href="<?php echo base_url('admin/finance/add_expenses/').$data->case_id.'/'.$data->customers_id; ?>" >
                            <i class="fa fa-plus"></i> <?= $this->lang->line('Add_Expense') ?>
                        </a>
                    </div>
                    <div>
                        <a class="btn btn-primary" id="<?= $data->case_id ?>" href="<?php echo base_url( 'admin/c_case/find_case/' ).$data->case_id; ?>" >
                            <img style="margin-right:6px; height:15px;" src="<?php echo base_url('/assets/images/img/pen-white.svg')?>" alt="Edit"><?= $this->lang->line('Edit') ?>
                        </a>
                    </div>
                </div>
                <!--begin::Form-->
                <form class="m-form m-form--fit m-form--label-align-right m-form--group-seperator-dashed">
                    <div class="m-portlet__body">
                        <div class="form-field-container detail-content-box">
                            <div class="d-flex justify-content-start align-items-center">
                                <h3 class="client_name"><?php echo $data->client_name; ?></h3>
                                <table class="theme-detail-table mb-0">
                                    <tbody>
                                        <tr class="case_td">
                                            <td>
                                                <?php echo $this->lang->line('Identification_Numbers');?>
                                                <b><?php echo $data->identification_number; ?></b>
                                            </td>
                                            <td>
                                                <?php echo $this->lang->line('identification_types');?>
                                                <b><?php echo $data->identification_types; ?></b>
                                            </td>
                                            <td>
                                                <?php echo $this->lang->line('client_File_number');?>
                                                <b><?php echo $data->client_file_number; ?></b>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-9">
                                <div class="form-field-container detail-content-box">
                                    <h4 class="main-title" ><?php echo $this->lang->line('Case_Information'); ?></h4>
                                    <table class="theme-detail-table">
                                        <tbody>
                                            <tr class="case_td">
                                                <td>
                                                    <?php echo $this->lang->line('branch');?>
                                                    <b><?php echo getBranchName($data->branch); ?></b>
                                                </td>
                                                <?php
                                                    $firstSession = $session[0]; // Assuming $sessions is your array of session

                                                ?>

                                                <td>
                                                    <?php echo $this->lang->line('Session_Number');?>
                                                    <b><?= $firstSession['session_number'] ?></b>
                                                </td>
                                                <td>
                                                    <?php echo $this->lang->line('Session_Start_Date');?>
                                                    <b><?php echo getTheDayAndDateFromDatePan($firstSession['session_date']); ?></b>
                                                </td>
                                                <td>
                                                    <?php echo $this->lang->line('Session_End_Date');?>
                                                    <b><?php echo getTheDayAndDateFromDatePan($firstSession['session_end_date']) ?></b>
                                                </td>
                                                <td>
                                                    <?php echo $this->lang->line('Mission_Status');?>
                                                    <b><?php echo $data->case_status; ?></b>
                                                </td>
                                            </tr>
                                            <tr class="case_td">
                                                <td>
                                                    <?php echo $this->lang->line('E_Service_Type');?>
                                                    <b><?php echo getCaseType($data->case_type); ?></b>
                                                </td>
                                                <td>
                                                    <?php echo $this->lang->line('E_Service_Number');?>
                                                    <b><?php echo $data->case_number; ?></b>
                                                </td>
                                                <td>
                                                    <?php echo $this->lang->line('E_Service_Date');?>
                                                    <b><?php echo getTheDayAndDateFromDatePan($data->case_date); ?></b>
                                                </td>
                                                <td>
                                                    <?php echo $this->lang->line('E_Service_Start_Date');?>
                                                    <b><?php echo getTheDayAndDateFromDatePan($data->case_start_date); ?></b>
                                                </td>
                                                <td>
                                                    <?php echo $this->lang->line('Contract_number');?>
                                                    <b><?php echo $data->contract_number; ?></b>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="form-field-container detail-content-box add-info" style="height:247px;">
                                    <h4 class="main-title"><?php echo $this->lang->line('Additional_Information'); ?></h4>
                                    <br>
                                    <p>Lorem ipsum dolor sit amet, consectetur thikr adipiscing elit, sed do eiusmod tempor.</p>
                                    <br><br><br>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-8">
                                <div class="form-field-container detail-content-box">
                                    <h4 class="main-title"><?php echo $this->lang->line('Court_Information'); ?></h4>
                                    <table class="theme-detail-table">
                                        <tbody>
                                            <tr class="case_td">
                                                <td>
                                                    <?php echo $this->lang->line('Opponent_Full_Name');?>
                                                    <b><?php echo $data->opponent_full_name; ?></b>
                                                </td>
                                                <td>
                                                    <?php echo $this->lang->line('Opponent_Note');?>
                                                    <b><?php echo $data->opponent_note; ?></b>
                                                </td>
                                                <td>
                                                    <?php echo $this->lang->line('Opponent_Phone');?>
                                                    <b><?php echo $data->opponent_phone; ?></b>
                                                </td>
                                                <td>
                                                    <?php echo $this->lang->line('Court_Name');?>
                                                    <b><?php echo gtCourtName($data->court_name) ?></b>
                                                </td>
                                            </tr>
                                            <tr class="case_td">
                                                <td>
                                                    <?php echo $this->lang->line('Court_Address');?>
                                                    <b><?php echo $data->court_address; ?></b>
                                                </td>
                                                <td>
                                                    <?php echo $this->lang->line('Judge_Name');?>
                                                    <b><?php echo $data->judge_name; ?></b>
                                                </td>
                                                <td>
                                                    <?php echo $this->lang->line('Opponent_Lawyer');?>
                                                    <b><?php echo $data->opponent_lawyer; ?></b>
                                                </td>
                                                <td>
                                                    <?php echo $this->lang->line('Objection_Number');?>
                                                    <b><?php echo $data->objection_number; ?></b>
                                                </td>
                                                
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-field-container detail-content-box">
                                    <h4 class="main-title"><?php echo $this->lang->line('Attachments'); ?></h4>
                                    <div class="attachment-detail-table">
                                    <table class="theme-detail-table">
                                        <tbody>
                                            <tr>
                                                <?php
                                                $cisd = $data->doc_id;
                                                $files = $this->db->select('*')->where("(temp_app_id = '$cisd' AND cat_id = 1)", NULL, FALSE)->get('document')->result_array();


                                                foreach ($files as $doc) {
                                                    echo "<tr><td>";
                                                    $ext = pathinfo($doc['name'], PATHINFO_EXTENSION);
                                                    if ($ext == 'jpeg' || $ext == 'jpg' || $ext == 'png') {
                                                        $src = base_url() . "uploads/case_file/" . $doc['name'];
                                                        echo "<img src='" . $src . "' width='70'>";
                                                    } else if ($ext == 'avi' || $ext == 'mp4' || $ext == 'flv' || $ext == 'mov' || $ext == 'wmv' || $ext == '3gp') {
                                                        echo "<div class='datafiles'><i class='fa fa-video-camera 5x'></i></div>";
                                                    } else if ($ext == 'mp3' || $ext == 'wav' || $ext == 'ogg' || $ext == 'aac' || $ext == 'mpc') {
                                                        echo "<div class='datafiles'><i class='fa fa-microphone 5x'></i></div>";
                                                    } else {
                                                        echo "<div class='datafiles'><img src='/assets/images/img/file-icon.svg' width='40' alt='File Icon'></div>";
                                                    }
                                                    echo "</td>";
                                                    echo "<td><p>" . $doc['name'] . "</p></td>";
                                                
                                                    } 
                                                ?>
                                            </tr>
                                            
                                        </tbody>
                                    </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    
                    </div>

                </form> 
            </div>
            <!--end::Form-->

            
            <div class="m-portlet__body">
                <!-- table General start -->
                <div class="tab-content general c_tabs">
                    <div class="tab-pane active" id="m_tabs_1_1" role="tabpanel">
                        <div class="m-portlet__body">
                        <a style="margin-bottom: 25px; color: #fff !important;" class="btn btn-primary add_general_modal" data-toggle="modal" data-target="#add-general-modal"> <i class="fa fa-plus"></i><?php echo $this->lang->line('ADD_GENERAL')?></a>
                            <div class="m_datatable m-datatable m-datatable--default m-datatable--loaded" style="">

                                <div class="table-responsive">
                                    <table class="lp-theme-table lp-large-theme m_datatable">
                                        <thead>
                                            <tr class="netTr" style="text-align:left;">
                                                <th class="sortable"><?php echo $this->lang->line('Serial_No');?>  </th>
                                                <th class="sortable"><?php echo $this->lang->line('E-Service_Name');?> </th>
                                                <th class="sortable"><?php echo $this->lang->line('General_Date_and_Time');?> </th>
                                                <th class="sortable"><?php echo $this->lang->line('Subject');?> </th>
                                                <th class="sortable"><?php echo $this->lang->line('General_Type');?>
                                                 
                                                </th>
                                                <th class="sortable"><?php echo $this->lang->line('E-Service_No');?> </th>
                                                <th class="sortable"><?php echo $this->lang->line('Due_Date_and_Time');?> </th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php 
                                            if (!empty($general)){
                                            $count=1;
                                            foreach($general as $appoinment){  ?>
                                            <tr class="hide<?php echo $appoinment['id'] ?>" style="text-align:left;">
                                                <?php $serial_number = sprintf("#%02d", $count++); ?>
                                                <td data-sort="<?= $count - 1 ?>"><?= $serial_number ?></td> 
                                                <td><?php echo $appoinment['case_number']; ?></td>
                                                <td><span class='hidetd'><?php echo getdateforshorting($appoinment['session_end_date']); ?></span><?php echo getTheDayAndDateFromDatePan($appoinment['session_end_date']); ?>
                                                <?= $appoinment['session_end_time'] ?></td>
                                                <td><?= $appoinment['subject'] ?></td>
                                                <td><?= getGeneralType($appoinment['general_type']); ?></td>
                                                <td><?= $appoinment['case_number']; ?></td>

                                                <td style="text-align:left;">
                                                    
                                                    <?php 
                                                    if($appoinment['is_close']==1){
                                                        echo clsoe_diff($appoinment['session_end_date'],$appoinment['session_end_time'],$appoinment['close_date']);
                                                    } else {
                                                    ?> 
                                                    <span class='countdown' style=" color: #0e8a00; font-weight: bold; " 
                                                value='<?php echo mission_due_time($appoinment['session_end_date'],$appoinment['session_end_time']);?>' data-countdown='<?php echo mission_due_time($appoinment['session_end_date'],$appoinment['session_end_time']);?>'></span>
                                                <?php } ?>
                                                </td>
                                                <td class="action">
                                                <!-- ASSIGN -->
                                            
                                                <a href="javascript:;"  data-user="<?= $appoinment['customers_id'] ?>" id="<?= $appoinment['id'] ?>"  class="hideass<?php // $case['id'] ?> fa fa-user-plus assign_case" data-case="<?= $appoinment['case_id'] ?>" title="Assign Follow Up Employee">
                                                </a>
                                            
                                            <!-- ASSIGN -->
                                                <?php if(isset($datas[6][3]) && $datas[6][3] == 1) { ?>
                                                    <a data-target="#view-general-modal" class="viewing-general-modal" data-toggle="modal" data-id="<?= $appoinment['id'] ?>" title="<?php echo $this->lang->line('View');?>">
                                                    <img src="<?= base_url('assets/images/img/eye-solid.svg') ?>" alt="View" class="img-eye">
                                                    </a>
                                                <?php } ?>
                                                

                                                <?php if( isset($datas[6][1]) && $datas[6][1] == 1 ){ ?>
                                                    <!-- <a href="<?= base_url("admin/$control/find_mission/{$appoinment['id']}") ?>" title="<?php echo $this->lang->line('Edit');?>"> -->
                                                    <a data-target="#edit-general-modal" class="editing-general-modal" data-toggle="modal" data-id="<?= $appoinment['id'] ?>" title="<?php echo $this->lang->line('Edit');?>">
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
                                            <?php
                                                }} else {?>
                                                    <tr colspan="7">
                                                        <td><?php echo $this->lang->line('No_data_available_in_table') ?><td>
                                                    </tr>
                                                <?php } ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>                        
                <!-- table General end -->

                <!-- table Consultation start -->
                <div class="tab-content consultation c_tabs">
                    <div class="tab-pane active" id="m_tabs_1_2" role="tabpanel">
                        <div class="m-portlet__body">
                        <a style="margin-bottom: 25px; color: #fff !important;" class="btn btn-primary add_consultation_modal" data-toggle="modal" data-target="#add-consultation-modal"> <i class="fa fa-plus"></i><?php echo $this->lang->line('ADD_CONSULTATION')?></a>

                            <div class="m_datatable m-datatable m-datatable--default m-datatable--loaded" style="">

                                <div class="table-responsive">
                                    <table class="lp-theme-table lp-large-theme m_datatable" >
                                        <thead>
                                            <tr class="netTr" style="text-align:left;">
                                                <th class="sortable"><?php echo $this->lang->line('Serial_No');?>  </th>
                                                <th class="sortable"><?php echo $this->lang->line('E-Service_Name');?> </th>
                                                <th class="sortable"><?php echo $this->lang->line('Consultation_Date_and_Time');?> </th>
                                                <th class="sortable"><?php echo $this->lang->line('Subject');?> </th>
                                                <th class="sortable"><?php echo $this->lang->line('Consultation_Type');?>
                                                 
                                                </th>
                                                <th class="sortable"><?php echo $this->lang->line('E-Service_No');?> </th>
                                                <th class="sortable"><?php echo $this->lang->line('Due_Date_and_Time');?> </th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php 
                                            $count=1;
                                            if ( !empty($consultation) ){
                                            foreach($consultation as $appoinment){  ?>
                                            <tr class="hide<?php echo $appoinment['id'] ?>" style="text-align:left;">
                                                <?php $serial_number = sprintf("#%02d", $count++); ?>
                                                <td data-sort="<?= $count - 1 ?>"><?= $serial_number ?></td> 
                                                <td><?= getServiceType($appoinment['service_types']); ?></td>
                                                <td><span class='hidetd'><?php echo getdateforshorting($appoinment['session_end_date']); ?></span><?php echo getTheDayAndDateFromDatePan($appoinment['session_end_date']); ?>
                                                <?= $appoinment['session_end_time'] ?></td>
                                                <td><?= $appoinment['subject'] ?></td>
                                                <td><?= $appoinment['consultation_type'] ?></td>
                                                <td><?= $appoinment['case_number']; ?></td>
                                    

                                                <td style="text-align:left;">
                                                    
                                                    <?php 
                                                    if($appoinment['is_close']==1){
                                                        echo clsoe_diff($appoinment['session_end_date'],$appoinment['session_end_time'],$appoinment['close_date']);
                                                    } else {
                                                    ?> 
                                                    <span class='countdown' style=" color: #0e8a00; font-weight: bold; " 
                                                value='<?php echo mission_due_time($appoinment['session_end_date'],$appoinment['session_end_time']);?>' data-countdown='<?php echo mission_due_time($appoinment['session_end_date'],$appoinment['session_end_time']);?>'></span>
                                                <?php } ?>
                                                </td>
                                                <td class="action">
                                                    <!-- ASSIGN -->
                                                
                                                    <a href="javascript:;"  data-user="<?= $appoinment['customers_id'] ?>" id="<?= $appoinment['id'] ?>"  class="hideass<?php // $case['id'] ?> fa fa-user-plus assign_case" data-case="<?= $appoinment['case_id'] ?>" title="Assign Follow Up Employee">
                                                    </a>
                                                        <?php if(isset($datas[4][3]) && $datas[4][3] == 1) { ?>
                                                        <a data-target="#view-consultation-modal" class="viewing-consultation-modal" data-toggle="modal" data-id="<?= $appoinment['id'] ?>" title="<?php echo $this->lang->line('View');?>">
                                                        <img src="<?= base_url('assets/images/img/eye-solid.svg') ?>" alt="View" class="img-eye">
                                                        </a>
                                                    <?php } ?>

                                                    <?php if((isset($datas[4][1]) && $datas[4][1] == 1)){ ?>
                                                        <a data-target="#edit-consultation-modal" class="editing-consultation-modal" data-toggle="modal" data-id="<?= $appoinment['id'] ?>" title="<?php echo $this->lang->line('Edit');?>">
                                                            <div style="display:none" class="appointment_data" data-array='<?php echo json_encode( $appoinment ); ?>'></div>
                                                            <img src="<?= base_url('assets/images/img/pen-solid.svg') ?>" alt="Edit" class="img-pen">
                                                        </a>
                                                    <?php  } ?>

                                                        <?php if($this->session->userdata('role_id') == 1){ ?>
                                                        
                                                        <a href="javascript:;" class="fa fa-trash delete_appoinment"  id="<?= $appoinment['id'] ?>" title="<?php echo $this->lang->line('Delete');?>">
                                                        
                                                        </a>
                                                        <?php  } ?>
                                                        
                                                    
                                                        
                                                    </td>
                                            </tr>
                                            <?php
                                                }} else {?>
                                                    <tr colspan="7">
                                                        <td><?php echo $this->lang->line('No_data_available_in_table') ?><td>
                                                    </tr>
                                                <?php } ?>

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>                        
                <!-- table Consultation end -->

                <!-- table Writing start -->
                <div class="tab-content writing c_tabs">
                    <div class="tab-pane active" id="m_tabs_1_1" role="tabpanel">
                        <div class="m-portlet__body">
                            <a style="margin-bottom: 25px; color: #fff !important;" class="btn btn-primary add_writing_modal" data-toggle="modal" data-target="#add-writing-modal"> <i class="fa fa-plus"></i><?php echo $this->lang->line('ADD_WRITINGS')?></a>
                            <div class="m_datatable m-datatable m-datatable--default m-datatable--loaded" style="">
                                <div class="table-responsive">
                                    <table class="lp-theme-table lp-large-theme m_datatable" >
                                        <thead>
                                            <tr class="netTr" style="text-align:left;">
                                                <th class="sortable"><?php echo $this->lang->line('Serial_No');?>  </th>
                                                <th class="sortable"><?php echo $this->lang->line('E-Service_Name');?> </th>
                                                <th class="sortable"><?php echo $this->lang->line('Writing_Date_and_Time');?> </th>
                                                <th class="sortable"><?php echo $this->lang->line('Subject');?> </th>
                                                <th class="sortable"><?php echo $this->lang->line('Writings_Type');?>
                                                 
                                                </th>
                                                <th class="sortable"><?php echo $this->lang->line('E-Service_No');?> </th>
                                                <th class="sortable"><?php echo $this->lang->line('Due_Date_and_Time');?> </th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php 
                                            $count=1;
                                            if ( !empty($writings) ){
                                            foreach($writings as $appoinment){  ?>
                                            <tr class="hide<?php echo $appoinment['id'] ?>" style="text-align:left;">
                                                <?php $serial_number = sprintf("#%02d", $count++); ?>
                                                <td data-sort="<?= $count - 1 ?>"><?= $serial_number ?></td> 
                                                
                                                <td><?= getServiceType($appoinment['service_types']); ?></td>

                                                <td><span class='hidetd'><?php echo getdateforshorting($appoinment['session_end_date']); ?></span><?php echo getTheDayAndDateFromDatePan($appoinment['session_end_date']); ?>
                                                <?= $appoinment['session_end_time'] ?></td>
                                                <td><?= $appoinment['subject'] ?></td>
                                                <td><?= getGeneralType($appoinment['writing_type']); ?></td>
                                                <td><?= $appoinment['case_number']; ?></td>

                                                <td style="text-align:left;">
                                                    
                                                    <?php 
                                                    if($appoinment['is_close']==1){
                                                        echo clsoe_diff($appoinment['session_end_date'],$appoinment['session_end_time'],$appoinment['close_date']);
                                                    } else {
                                                    ?> 
                                                    <span class='countdown' style=" color: #0e8a00; font-weight: bold; " 
                                                value='<?php echo mission_due_time($appoinment['session_end_date'],$appoinment['session_end_time']);?>' data-countdown='<?php echo mission_due_time($appoinment['session_end_date'],$appoinment['session_end_time']);?>'></span>
                                                <?php } ?>
                                                </td>
                                                <td class="action">


                                                <!-- ASSIGN -->
                                                 <a href="javascript:;"  data-user="<?= $appoinment['customers_id'] ?>" id="<?= $appoinment['id'] ?>"  class="hideass<?php // $case['id'] ?> fa fa-user-plus assign_case" data-case="<?= $appoinment['case_id'] ?>" title="Assign Follow Up Employee">
				</a>
                                                    <?php if(isset($datas[3][3]) && $datas[3][3] == 1) { ?>
                                                        <a data-target="#view-writing-modal" class="viewing-writing-modal" data-toggle="modal" data-id="<?= $appoinment['id'] ?>" title="<?php echo $this->lang->line('View');?>">
                                                        <img src="<?= base_url('assets/images/img/eye-solid.svg') ?>" alt="View" class="img-eye">
                                                        </a>
                                                    <?php } ?>

                                                    <?php if( isset($datas[3][1]) && $datas[3][1] == 1){ ?>
                                                        <a data-target="#edit-writing-modal" class="editing-writing-modal" data-toggle="modal" data-id="<?= $appoinment['case_id'] ?>" title="<?php echo $this->lang->line('Edit');?>">
                                                            <div style="display:none" class="appointment_data" data-array='<?php echo json_encode( $appoinment ); ?>'></div>
                                                            <div style="display:none" class="appointment_data_service_number" data-array='<?php echo getServiceType($appoinment['service_types']); ?>'></div>
                                                            <img src="<?= base_url('assets/images/img/pen-solid.svg') ?>" alt="Edit" class="img-pen">
                                                        </a>
                                                    <?php  } ?>
                                                        <?php if($this->session->userdata('role_id') == 1 ){ ?>
                                                        
                                                        <a href="javascript:;" class="fa fa-trash delete_appoinment"  id="<?= $appoinment['id'] ?>" title="<?php echo $this->lang->line('Delete');?>">
                                                        </a>
                                                        <?php  } ?>
                                                        
                                                    

                                                        <!-- <?php if(isset($datas[3][4]) && $datas[3][4] == 1) { ?>
                                                        <a href="javascript:;" data-user="<?= $appoinment['case_id'] ?>" id="<?= $appoinment['case_id'] ?>"  class="fa fa-refresh" title="<?php echo $this->lang->line('Convert_Case');?>">
                                                        </a>
                                                        <?php  } ?> -->
                                                    </td>
                                            </tr>
                                            <?php
                                                }} else {?>
                                                    <tr colspan="7">
                                                        <td><?php echo $this->lang->line('No_data_available_in_table') ?><td>
                                                    </tr>
                                                <?php } ?>

                                        </tbody>
                                    </table>

                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>                        
                <!-- table Writing end -->

                <!-- table Session start -->
                <div class="tab-content session c_tabs">
                    <div class="tab-pane active" id="m_tabs_1_1" role="tabpanel">
                        <div class="m-portlet__body">
                        <a style="margin-bottom: 25px; color: #fff !important;" class="btn btn-primary add_session_modal" data-toggle="modal" data-target="#add-session-modal"> <i class="fa fa-plus"></i><?php echo $this->lang->line('ADD_SESSION')?></a>
                            <div class="m_datatable m-datatable m-datatable--default m-datatable--loaded" style="">

                                <div class="table-responsive">
                                    <table class="lp-theme-table lp-large-theme m_datatable">
                                        <thead>
                                            <tr class="netTr" style="text-align:left;">
                                                <th class="sortable"><?php echo $this->lang->line('Serial_No');?>  </th>
                                                <th class="sortable"><?php echo $this->lang->line('E_Service_Number');?> </th>
                                                <th class="sortable"><?php echo $this->lang->line('Session_Date_and_Time');?> </th>
                                                <th class="sortable"><?php echo $this->lang->line('Judicial_Circuit');?> </th>
                                                <th class="sortable"><?php echo $this->lang->line('Subject');?> </th>
                                                <th class="sortable"><?php echo $this->lang->line('Requirements');?>
                                                 
                                                </th>
                                                <th class="sortable"><?php echo $this->lang->line('Due_Date_and_Time');?> </th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php 
                                            $count=1;
                                            if ( !empty($session) ){
                                            foreach($session as $appoinment){  ?>
                                            <tr class="hide<?php echo $appoinment['id'] ?>" style="text-align:left;">
                                                <?php $serial_number = sprintf("#%02d", $count++); ?>
                                                <td data-sort="<?= $count - 1 ?>"><?= $serial_number ?></td> 
                                                <td><?php echo $appoinment['case_number']; ?></td>
                                                <td><span class='hidetd'><?php echo getdateforshorting($appoinment['session_end_date']); ?></span><?php echo getTheDayAndDateFromDatePan($appoinment['session_end_date']); ?>
                                                <?= $appoinment['session_end_time'] ?></td>
                                                <td><?= $appoinment['department'] ?></td>
                                                <td><?= $appoinment['subject'] ?></td>
                                                <td><?= $appoinment['note']; ?></td>

                                                <td style="text-align:left;">
                                                    <?php 
                                                        if($appoinment[is_close]==1){
                                                            echo clsoe_diff($appoinment['session_end_date'],$appoinment['session_end_time'],$appoinment['close_date']);
                                                        } else { 
                                                        ?> 
                                                        <span class='countdown' style=" color: #0e8a00; font-weight: bold; "  value='<?php echo mission_due_time($appoinment['session_end_date'],$appoinment['session_end_time']);?>' data-countdown="<?php echo mission_due_time($appoinment['session_end_date'],$appoinment['session_end_time']);?>"
                                                    value='<?php echo mission_due_time($appoinment['session_end_date'],$appoinment['session_end_time']);?>'></span>
                                                    <?php } ?>
                                                </td>
                                                <td class="action">
			                                    <!-- ASSIGN -->
                                                            
                                                                <a href="javascript:;"  data-user="<?= $appoinment['customers_id'] ?>" id="<?= $appoinment['id'] ?>"  class="fa fa-user-plus assign_case" data-case="<?= $appoinment['case_id'] ?>" title="Assign Follow Up Employee">
                                                                </a>
                                                                <?php if(isset($datas[2][3]) && $datas[2][3] == 1) { ?>
                                                                <a href=<?= base_url("admin/mission_session/view_mission/{$appoinment['id']}") ?>  title="<?php echo $this->lang->line('View');?>" ><img src="<?= base_url('assets/images/img/eye-solid.svg') ?>" alt="View" class="img-eye"></a>
                                                                <?php  } ?>
                                                            <?php if($appoinment['is_close'] == 0 ){ ?>
                                                                <?php if( $this->session->userdata('role_id') == 1 ||(isset($datas[2][1]) && $datas[2][1] == 1)){ ?>
                                                                <a class="editing-session-modal" data-toggle="modal" data-target="#edit-session-modal" id=<?= $appoinment['id'] ?> title="<?php echo $this->lang->line('Edit');?>">
                                                                <div style="display:none" class="appointment_data" data-array='<?php echo json_encode( $appoinment ); ?>'></div>
                                                                <div style="display:none" class="appointment_data_service_number" data-array='<?php echo getServiceType($appoinment['service_types']); ?>'></div>
                                                                <img src="<?= base_url('assets/images/img/pen-solid.svg') ?>" alt="Edit" class="img-pen"></a>
                                                            <?php } ?>
                                                                <?php if($this->session->userdata('role_id') == 1){?>
                                                                <a href="javascript:;" class="fa fa-trash delete_appoinment" id=<?= $appoinment['id'] ?> title="<?php echo $this->lang->line('Delete');?>"></a>
                                                                <?php  } ?>
                                                                <?php  } ?>
                                                                
                                                                <?php if($appoinment['is_close'] == 1 ){?>
                                                                    <a href="#" title="<?php echo $this->lang->line('Close');?>" class=" btn btn-danger"><?php echo $this->lang->line('Close');?></a>
                                                                <?php  } ?>
                                                    </td>
                                            </tr>
                                            <?php
                                                }} else {?>
                                                    <tr colspan="7">
                                                        <td><?php echo $this->lang->line('No_data_available_in_table') ?><td>
                                                    </tr>
                                                <?php } ?>

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>                        
                <!-- table Session end -->

                <!-- table Reports start -->
                <div class="tab-content reports c_tabs">
                    <div class="tab-pane active" id="m_tabs_1_1" role="tabpanel">
                        <div class="m-portlet__body">
                            <div class="m_datatable m-datatable m-datatable--default m-datatable--loaded" style="">

                                <div class="table-responsive">
                                    <table class="lp-theme-table lp-large-theme m_datatable">
                                        <thead>
                                            <tr class="netTr" style="text-align:left;">
                                                <th><?php echo $this->lang->line('Thumb'); ?></th>
                                                <th><?php echo $this->lang->line('File_Name'); ?></th>
                                                <th><?php echo $this->lang->line('File_Type'); ?></th>
                                                <th><?php echo $this->lang->line('Uploaded_Date'); ?></th>
                                                <th><?php echo $this->lang->line('Uploaded_by'); ?></th>
                                                <th><?php echo $this->lang->line('ACTION'); ?></th>
                                                <td></td>
                                            </tr>
                                        </thead>
                                        <tbody>
                                                <?php
                                                $files = $this->db->select('*')->where("(temp_app_id = '$cisd' AND cat_id = 4)", NULL, FALSE)->get('document')->result_array();
                                                if ( !empty($files) ){
                                                foreach ($files as $doc) {
                                                    echo "<tr style='text-align: left;'><td>";
                                                    $ext = pathinfo($doc['name'], PATHINFO_EXTENSION);
                                                    if ($ext == 'jpeg' || $ext == 'jpg' || $ext == 'png') {
                                                        $src = base_url() . "uploads/case_file/" . $doc['name'];
                                                        echo "<img src='" . $src . "' width='70'>";
                                                    } else if ($ext == 'avi' || $ext == 'mp4' || $ext == 'flv' || $ext == 'mov' || $ext == 'wmv' || $ext == '3gp') {
                                                        echo "<div class='datafiles'><i class='fa fa-video-camera 5x'></i></div>";
                                                    } else if ($ext == 'mp3' || $ext == 'wav' || $ext == 'ogg' || $ext == 'aac' || $ext == 'mpc') {
                                                        echo "<div class='datafiles'><i class='fa fa-microphone 5x'></i></div>";
                                                    } else {
                                                        echo "<div class='datafiles'><img src='/assets/images/img/file-icon.svg' width='40' alt='File Icon'></div>";
                                                    }
                                                    echo "</td>";
                                                    echo "<td><p>" . $doc['name'] . "</p></td>";
                                                ?>
                                                    <td><?php echo pathinfo($doc['name'], PATHINFO_EXTENSION); ?></td>
                                                    <!-- <td><?php echo pathinfo($doc['name'], PATHINFO_EXTENSION); ?></td> -->
                                                    <td>
                                                        <?php $date = date("d/m/Y", strtotime($doc['created']));
                                                        echo getTheDayAndDateFromDatePan($date); ?>
                                                    </td>
                                                    <?php
                                                    if ($doc['user_id'] != 0) {
                                                        $user = $this->db->select('name')->where('id', $doc['user_id'])->get('users')->row();
                                                    } else {
                                                        $user = $this->db->select('name')->where('id', $doc['customer_id'])->get('users')->row();
                                                    }
                                                    echo "<td><p>" . $user->name . "</p></td>";
                                                    ?>
                                                    <td style="text-align:left;">
                                                        <span style="overflow: visible; position: relative;">
                                                            <a href="<?= base_url('uploads/case_file/' . $doc["name"]); ?>" class="m-portlet__nav-link btn m-btn m-btn--hover-warning m-btn--icon m-btn--icon-only m-btn--pill" title="" download>
                                                                <span class="down_img d-flex justify-content-center">
                                                                    <img src="/assets/images/img/vertical_align_bottom.svg" alt="Download" width="20" height="20">
                                                                </span>
                                                            </a>
                                                        </span>
                                                    </td>
                                                    </tr>
                                                <?php
                                                }} else {?>
                                                    <tr colspan="6">
                                                        <td><?php echo $this->lang->line('No_data_available_in_table') ?><td>
                                                    </tr>
                                                <?php } ?>
                                            </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>                        
                <!-- table Reports end -->

                <!-- table Files start -->
                <div class="tab-content files c_tabs">
                    <div class="tab-pane active" id="m_tabs_1_1" role="tabpanel">
                        <div class="m-portlet__body">
                            <div class="m_datatable m-datatable m-datatable--default m-datatable--loaded" style="">

                                <div class="table-responsive">
                                    <table class="lp-theme-table lp-large-theme m_datatable">
                                        <thead>
                                            <tr class="netTr" style="text-align:left;">
                                                <th><?php echo $this->lang->line('Thumb'); ?></th>
                                                <th><?php echo $this->lang->line('File_Name'); ?></th>
                                                <th><?php echo $this->lang->line('File_Type'); ?></th>
                                                <th><?php echo $this->lang->line('Uploaded_Date'); ?></th>
                                                <th><?php echo $this->lang->line('Uploaded_by'); ?></th>
                                                <th><?php echo $this->lang->line('ACTION'); ?></th>
                                                <td></td>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $files = $this->db->select('*')->where("(temp_app_id = '$cisd' AND cat_id = 1)", NULL, FALSE)->get('document')->result_array();
                                            if ( !empty($files) ){
                                            foreach ($files as $doc) {
                                                echo "<tr><td>";
                                                $ext = pathinfo($doc['name'], PATHINFO_EXTENSION);
                                                if ($ext == 'jpeg' || $ext == 'jpg' || $ext == 'png') {
                                                    $src = base_url() . "uploads/case_file/" . $doc['name'];
                                                    echo "<img src='" . $src . "' width='70'>";
                                                } else if ($ext == 'avi' || $ext == 'mp4' || $ext == 'flv' || $ext == 'mov' || $ext == 'wmv' || $ext == '3gp') {
                                                    echo "<div class='datafiles'><i class='fa fa-video-camera 5x'></i></div>";
                                                } else if ($ext == 'mp3' || $ext == 'wav' || $ext == 'ogg' || $ext == 'aac' || $ext == 'mpc') {
                                                    echo "<div class='datafiles'><i class='fa fa-microphone 5x'></i></div>";
                                                } else {
                                                    echo "<div class='datafiles'><img src='/assets/images/img/file-icon.svg' width='40' alt='File Icon'></div>";
                                                }
                                                echo "</td>";
                                                echo "<td><p>" . $doc['name'] . "</p></td>";
                                            ?>
                                                <td><?php echo pathinfo($doc['name'], PATHINFO_EXTENSION); ?></td>
                                                <td>
                                                    <?php $date = date("d/m/Y", strtotime($doc['created']));
                                                    echo getTheDayAndDateFromDatePan($date); ?>
                                                </td>
                                                <?php
                                                echo "<td><p>" . getEmployeeName($doc['uploaded_by']) . "</p></td>";
                                                ?>
                                                <td style="text-align:left;">
                                                    <span style="overflow: visible; position: relative;">
                                                        <a href="<?= base_url('uploads/case_file/' . $doc["name"]); ?>" class="m-portlet__nav-link btn m-btn m-btn--hover-warning m-btn--icon m-btn--icon-only m-btn--pill" title="" download>
                                                    <span class="down_img d-flex justify-content-center">
                                                        <img src="/assets/images/img/vertical_align_bottom.svg" alt="Download" width="20" height="20">
                                                    </span>
                                                        </a>
                                                    </span>
                                                </td>
                                                </tr>
                                                <?php
                                                }} else {?>
                                                    <tr colspan="6">
                                                        <td><?php echo $this->lang->line('No_data_available_in_table') ?><td>
                                                    </tr>
                                                <?php } ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>                        
                <!-- table Files end -->

                <!-- table Notes start -->
                <div class="tab-content note c_tabs">
                    <div class="tab-pane active" id="m_tabs_1_1" role="tabpanel">
                        <div class="m-portlet__body">
                            <div class="m_datatable m-datatable m-datatable--default m-datatable--loaded" style="">

                                <div class="table-responsive">
                                    <table class="lp-theme-table lp-large-theme m_datatable">
                                        <thead>
                                            <tr class="netTr" style="text-align:left;">
                                                <th><?php echo $this->lang->line('Serial_No'); ?></th>
                                                <th><?php echo $this->lang->line('Client_Name');?></th>
                                                <th><?php echo $this->lang->line('E_Service_Name');?></th>
                                                <th><?php echo $this->lang->line('Added_Date');?></th>
                                                <th><?php echo $this->lang->line('Mission_Type');?></th>
                                                <th style="text-align:left;"><?php echo $this->lang->line('Note');?></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $count = 1;
                                            if ( ! empty( $notes ) ){
                                            foreach ($notes as $data) { ?>
                                                <tr><?php
                                                    $serial_number = sprintf("#%02d", $count++); ?>
                                                    <td data-sort="<?= $count - 1 ?>"><?= $serial_number ?></td>
                                                    <td><?= getEmployeeName($data['user_id']); ?></td>
                                                    <td><?= getCaseNumberById($data['case_id']); ?></td>
                                                    <td><?= getTheDayAndDateFromDatePan($data['date']); ?></td>
                                                    <td><?= $data['mission_type'] ?></td>
                                                    
                                                    <td style="text-align:left;"><?= $data['discription'] ?></td>
                                                </tr>
                                                <?php
                                                }} else {?>
                                                    <tr colspan="6">
                                                        <td><?php echo $this->lang->line('No_data_available_in_table') ?><td>
                                                    </tr>
                                                <?php } ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>                        
                <!-- table Reports end -->

                <!-- table visiting start -->
                <div class="tab-content visiting c_tabs">
                    <div class="tab-pane active" id="m_tabs_1_1" role="tabpanel">
                        <div class="m-portlet__body">
                        <a style="margin-bottom: 25px; color: #fff !important;" class="btn btn-primary add_meeting_modal" data-toggle="modal" data-target="#add-meeting-modal"> <i class="fa fa-plus"></i><?php echo $this->lang->line('ADD_VISITING')?></a>

                            <div class="custom-lp-calander-section">
								<div id="calendar"></div>
							</div>
							<!-- Start view Modal -->
							<div class="modal fade lp-theme-modal small" id="view-modal" tabindex="-1" role="dialog" aria-labelledby="modalTitle" aria-hidden="true">
								<div class="modal-dialog" role="document">
									<div class="modal-content">
										<div class="modal-header">
											<h5 class="modal-title" id="modalTitle">View Meeting</h5>
											<button type="button" class="close" data-dismiss="modal" aria-label="Close" data-bs-dismiss="modal">

												
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
														<div class="m-portlet__body theme-inner-form">
														<div class="form-field-container">
															<div class="form-group m-form__group row">
																<!-- <div class="form-group col-sm-12">
																<label for="case_name" class=" form-control-label">E-Service Name</label>
																<div>
																	<span id="case_name"></span>
																</div>
															</div>	 -->
															<div class="form-group col-sm-6">
																<label for="case_number" class=" form-control-label">E-Service No</label>
																<div>
																	<span id="case_number"></span>
																</div>
															</div>
																<div class="form-group col-sm-6">
																<label for="c_type" class=" form-control-label">Consultation Type</label>
																<div>
																	<span id="c_type">Type</span>
																</div>
															</div>
															<div class="form-group col-sm-6">
																<label for="session_date_time" class=" form-control-label">Consultation Date and Time</label>
																<div>
																	<span id="session_date_time" id="reason"></span>
																</div>
															</div>
															<div class="form-group col-sm-6">
																<label for="due_date_time" class=" form-control-label">Due Date and Time</label>
																<div>
																	<span id="due_date_time" id=""></span>
																</div>
															</div>
															<div class="form-group col-sm-12">
																<label for="subject" class=" form-control-label">Subject</label>
																<div>
																	<span id="subject" id="">N/A</span>
																</div>
															</div>
															<div class="form-group col-sm-12">
																<label for="note" class=" form-control-label">Description</label>
																<div>
																	<span id="note" id=""></span>
																</div>
															</div>
															<?php   $temp_app_id = $data->id; ?>
															<div class="form-group col-sm-12">
																<label for="attachment" class=" form-control-label">Attachment</label>
																<div>
																	<?php  
																		$files = $this->db->select('*')->where("(temp_app_id = '$temp_app_id' AND cat_id = 8 AND type='visiting')", NULL, FALSE)->get('document')->result_array();
																		foreach ($files as $files) { ?>
																					

																		<div class="m-widget4__item">
																			<div class="m-widget4__info">
																				<span class="m-widget4__title"><?php echo "<b>" . $files['name']."</b>";?></span><br>
																				
																			</div>
																			
																		</div>			
																	<?php }?>
																</div>
															</div>
														</div>
											</div> 
											<div class="d-flex justify-content-end mt-4">
												<button type="button" id="edit_id" class="btn btn-primary open-edit-modal" data-id="">
													<?php echo $this->lang->line('Edit'); ?>
													<img style="margin-left:6px; height:16px;" src="<?= base_url('assets/images/img/pen-white.svg') ?>" alt="Edit">
												</button>
												</div>
											</div>
													
													</form>
	
													<!--end::Form-->
												</div>
	
												<!--end::Portlet-->
											</div>
										</div>
										<!-- <div class="modal-footer">
											<div class="modal-btn-group">
												<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
												<button type="button" class="btn btn-primary">Save</button>
											</div>
										</div> -->
									</div>
								</div>
							</div>
							<!-- End view modal -->
                        </div>
                    </div>
                </div>                        
                <!-- table visiting end -->

                
            </div>
            <?php include('vc_writing_modals.php'); ?>
            <?php include('vc_general_modals.php'); ?>
            <?php include('vc_session_modals.php'); ?>
            <?php include('vc_meeting_modals.php'); ?>
            <?php include('vc_consultation_modals.php'); ?>
        </div>
        <!--end::Portlet-->
    </div>
</div>


<script src="<?= base_url('assets/admin/js/hijri/jquery.calendars.js') ?>"></script>
<script src="<?= base_url('assets/admin/js/hijri/jquery.calendars.plus.min.js') ?>"></script>
<script src="<?= base_url('assets/admin/js/hijri/jquery.plugin.min.js') ?>"></script>
<script src="<?= base_url('assets/admin/js/hijri/jquery.calendars.picker.js') ?>"></script>
<script src="<?= base_url('assets/js/hijri/jquery.calendars.ummalqura.min.js') ?>"></script>
<link href="<?= base_url('assets/admin/js/hijri/jquery.calendars.picker.css') ?>" rel="stylesheet"/>
<script>



    var data = <?php echo json_encode( $visiting ); ?>;		
document.addEventListener('DOMContentLoaded', function () {

    // Initialize FullCalendar v5 (no jQuery)   
    var calendarEl = document.getElementById('calendar');
    var calendar = new FullCalendar.Calendar(calendarEl, {
        initialView: 'timeGridWeek', // Show only weeks with time slots
        headerToolbar: {
            left: 'prev,next today',
            center: 'title',
            right: 'timeGridDay,timeGridWeek,dayGridMonth' // You can customize this
        },
        views: {
            timeGridDay: {
                buttonText: 'Day',
            },
            timeGridWeek: {
                buttonText: 'Week',
            },
            dayGridMonth: {
                buttonText: 'Month',
            }
        },
        events: data.map(item => {
            // Use moment.js to parse the times correctly
            const startDate = moment(`${item.session_date} ${item.session_time}`, "DD/MM/YYYY hh:mm a").toDate();
            const endDate = moment(`${item.session_date} ${item.session_end_time}`, "DD/MM/YYYY hh:mm a").toDate();

            return {
                title: item.note,
                start: startDate,
                end: endDate,
                extendedProps: {
                    item: item
                },
            };
        }),
        eventClick: function(info) {
            const event = info.event;
            const eventDetails = event.extendedProps.item;
            document.getElementById('case_number').textContent = eventDetails.case_number;
            document.getElementById('note').textContent = eventDetails.note;
            document.getElementById('edit_id').addEventListener('click', function () {
                let baseUrl = window.location.origin + '/';
                let fullUrl = baseUrl + '/admin/mission_visiting/find_mission/' + eventDetails.id;
                window.location.href = fullUrl;
            });
            document.getElementById('session_date_time').textContent = eventDetails.session_date + ' ' + eventDetails.session_time;
            document.getElementById('due_date_time').textContent = eventDetails.session_end_date + ' ' + eventDetails.session_end_time;
            var myModal = new bootstrap.Modal(document.getElementById('view-modal'), {});
            myModal.show();			
            
        },
        // Optional: Customize time slot settings
        slotDuration: '01:00:00', // 30-minute time slots
        slotLabelInterval: '01:00:00', // 30-minute intervals
        allDaySlot: false, // Disable all-day slot
        height: 'auto',
    });

    calendar.render();

});

$(document).ready(function() {
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
    
    updateSortIcons();
    
    // If sorting class changes dynamically on click
    $(document).on( 'click', '.sortable', function () {
        updateSortIcons();
    });
    
    $('.c_nav').on('click', function () {
        currentID = $(this).attr('id');
        $('.c_nav').removeClass('active');
        $(this).addClass('active');
        $('.c_tabs').hide();
        $('div.' + currentID).show();
    })
    
    

    // Search functionality
    $('#userSearch').on('keyup', function() {
        var searchText = $(this).val().toLowerCase();
        
        // Remove all highlights first
        $('.form-field-container').css({
            'border': 'none',
            'box-shadow': 'none'
        });
        
        if (searchText !== '') {
            // Highlight sections that contain the search text
            $('.form-field-container').each(function() {
                var sectionText = $(this).text().toLowerCase();
                if (sectionText.indexOf(searchText) !== -1) {
                    $(this).css({
                        'border': '2px solid #1F3958',
                        'box-shadow': '0 0 10px rgba(31, 57, 88, 0.3)'
                    });
                }
            });
        }
    });

    $('.countdown').each(function () {
        const $this = $(this);
        const endTimeStr = $this.data('countdown');
        const endTime = new Date(endTimeStr.replace(/-/g, '/'));

        function pad(num) {
            return num.toString().padStart(2, '0');
        }

        function updateCountdown() {
            const now = new Date().getTime();
            let distance = endTime.getTime() - now;
            let isPast = false;

            if (distance < 0) {
                isPast = true;
                distance = Math.abs(distance);
            }

            const days = Math.floor(distance / (1000 * 60 * 60 * 24));
            const hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
            const minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
            const seconds = Math.floor((distance % (1000 * 60)) / 1000);

            const output = `${isPast ? '-' : ''}${pad(days)} days ${pad(hours)}:${pad(minutes)}:${pad(seconds)}`;
            $this.text(output);

            // Set color based on whether it's expired
            if (isPast) {
                $this.css('color', 'red');
            } else {
                $this.css('color', '#0e8a00'); // green
            }
        }

        // Initial call and update every second
        updateCountdown();
        setInterval(updateCountdown, 1000);
    });
    $('.appdate').calendarsPicker({
        calendar: $.calendars.instance('<?php if($this->session->userdata('admin_site_lang')=="arabic" or $this->session->userdata('admin_site_lang')=="") echo "ummalqura"; else echo ""; ?>','<?php if($this->session->userdata('admin_site_lang')=="arabic") echo "ar"; else echo "en"; ?>'),
        showOtherMonths: true,dateFormat: 'dd/mm/yyyy',
        minDate:0, 
        selectDefaultDate:true,
        onSelect: function (date) {
        
        }
    }); 
});

$(document).on("click", ".assign_case", function() {
var id=$(this).attr("id");
var customers_id=$(this).data("user");

var msg= $('#note_dialog').html();
var url="<?= base_url('admin/assignment/update_assign_case'); ?>"; 
bootbox.confirm('<div class="assignpopup"><select class="form-control" id="following_employee_id" name="following_employee_id"><option>Select Following Employee </option><?php  foreach ($employees as $employee) { ?><option value="<?php echo $employee["id"]?>"><?php echo $employee["name"]?></option><?php } ?></select><textarea placeholder="Notes" name="note" id="notes" class="form-control col-md-12"></textarea></div>', function(result){
if(result){

	var  following_employee_id = $('#following_employee_id :selected').val();
	var  notes = $('#notes').val();
    $.ajax({
    type:'ajax',
    method:'post',
    url:url,
    data:{"id":id,"customers_id":customers_id,'following_employee_id':following_employee_id,'notes':notes},
    success:function(data){
       $('#msg').show();
 
         $('#msg').html(data);
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
</script>

