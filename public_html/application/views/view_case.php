<?php $nvc = "white-nav sticky shrink modern hover4 radius-drop"; 
$pageTitle = $this->lang->line("View_E_Service");
include('header.php');
	$case_id = isset($data->case_id) ? $data->case_id : $data->id;
?>
 </section>
<?php
include('header_welcome.php');
?>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="<?php echo base_url('assets/');?>vendors/bootstrap/dist/js/bootstrap.min.js" type="text/javascript"></script>


<!-- END: Left Aside -->
<style>
    .m-form.m-form--fit .m-form__content, .m-form.m-form--fit .m-form__heading, .m-form.m-form--fit .m-form__group {
        padding-left: 0px;
        padding-right: 0px;
    }
    .m-portlet__body{
        padding: 30px !important;
    }
	.in_fo {
    padding: 0px 30px;
}
span.down_img{
        background: #1866a9;
        border-radius: 100%;
        align-items: center;
        width: 26px;
        height: 26px;
    }
    .c_tab {
        display: none;
    }
</style>
 <style>
     span.m-widget4__ext {
    padding-right: 15px;
}
.ar_body  span.dwndelbtn {
    float: left;
}
.view-case .m-portlet__body{
    padding-left: 0 !important;
    padding-right: 0 !important;
}
 </style>
    <div class="m-grid__item m-grid__item--fluid m-wrapper">
        <!-- END: Subheader -->
        <div class="m-content view-case">
            <!--begin::Portlet-->
            <div class="m-portlet lp-theme-card bg-transparent">
                <div class="m-portlet__head">
                    <div class="m-portlet__head-caption">
                        <!-- <div class="m-portlet__head-title">
                            <h3 class="m-portlet__head-text">
                               <?php echo $this->lang->line('E_Service_Number');?> #<?php echo $data->case_number;?>
                            </h3>
                        </div> -->

                        <div class="theme-new-nav-menu">
                            <a class="back-link" href="/case_list">
                                <svg width="16" height="14" viewBox="0 0 16 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M7.70679 13.7006C7.51926 13.888 7.26495 13.9934 6.99979 13.9934C6.73462 13.9934 6.48031 13.888 6.29279 13.7006L0.292786 7.70057C0.105315 7.51304 0 7.25874 0 6.99357C0 6.72841 0.105315 6.4741 0.292786 6.28657L6.29279 0.286571C6.48139 0.104413 6.73399 0.00361876 6.99619 0.00589718C7.25838 0.0081756 7.5092 0.113345 7.6946 0.298753C7.88001 0.484161 7.98518 0.734973 7.98746 0.99717C7.98974 1.25937 7.88894 1.51197 7.70679 1.70057L3.41379 5.99357H14.9998C15.265 5.99357 15.5194 6.09893 15.7069 6.28646C15.8944 6.474 15.9998 6.72835 15.9998 6.99357C15.9998 7.25879 15.8944 7.51314 15.7069 7.70068C15.5194 7.88821 15.265 7.99357 14.9998 7.99357H3.41379L7.70679 12.2866C7.89426 12.4741 7.99957 12.7284 7.99957 12.9936C7.99957 13.2587 7.89426 13.513 7.70679 13.7006Z" fill="#333333"/>
                                </svg>
                            Back</a>
                            <ul>
                                <li class="c_navs active" id="service"> <a href="#"><?php echo $this->lang->line('Details')?></a> </li>
                                <li class="c_navs"  id="session"> <a href="#"><?php echo $this->lang->line('Cases')?></a> </li>
                                <li class="c_navs"  id="writing"> <a href="#" ><?php echo $this->lang->line('Writings')?></a> </li>
                                <li class="c_navs"  id="consultation"> <a href="#"><?php echo $this->lang->line('Consultation')?></a> </li>
                                <li id="general"  class="c_navs"> <a href="#"><?php echo $this->lang->line('General')?></a> </li>
                                <li class="c_navs"  id="files"> <a href="#"><?php echo $this->lang->line('Files')?></a> </li>
                                <li class="c_navs"  id="reports"> <a href="#"><?php echo $this->lang->line('Reports')?></a> </li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="c_tab service tab_active case">
                    <div class="m-portlet__body">
                        <div class="m-portlet lp-theme-card">
                            <!--begin::Form-->
                            <form class="m-form m-form--fit m-form--label-align-right m-form--group-seperator-dashed">
                                <div class="row">
                                    <div class="col-lg-4">
                                        <div class="form-field-container detail-content-box client-info-box">
                                            <h3 style="font-size:21px;"><?php echo $this->lang->line('E-Service_Information')?></h3>
    
                                            <div class="client-info-box-head">
                                                <a class="btn btn-primary" href="<?= base_url("front/find_case/{$data->case_id}") ?>">
                                                    <?php echo $this->lang->line('Edit');?>
                                                    <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M11.5733 1.59788C11.7578 1.40686 11.9785 1.2545 12.2225 1.14968C12.4665 1.04486 12.7289 0.989688 12.9945 0.98738C13.2601 0.985073 13.5234 1.03568 13.7692 1.13624C14.015 1.2368 14.2383 1.38531 14.4261 1.57309C14.6139 1.76088 14.7624 1.98418 14.8629 2.22997C14.9635 2.47577 15.0141 2.73913 15.0118 3.00468C15.0095 3.27024 14.9543 3.53268 14.8495 3.77669C14.7447 4.0207 14.5923 4.24139 14.4013 4.42588L13.6083 5.21888L10.7803 2.39088L11.5733 1.59788ZM9.3663 3.80488L0.987305 12.1839V15.0119H3.8153L12.1953 6.63288L9.3663 3.80488Z" fill="white"/>
                                                    </svg>
                                                </a>
    
    
                                            </div>
    
                                            <div class="client-info-box-body">
                                                <ul>
                                                    <?php
                                                        $firstSession = $session[0]; // Assuming $sessions is your array of session
                                                    ?>
                                                    <li><?php echo $this->lang->line('branch');?><b><?php echo getBranchName($data->branch); ?></b></li>
                                                    <li><?php echo $this->lang->line('Session_Number');?> <b><?= $firstSession['session_number'] ?></b> </li>
                                                    <li><?php echo $this->lang->line('Session_Time');?> <b><?= $firstSession['session_end_time'] ?></b> </li>
                                                    <li><?php echo $this->lang->line('E_Service_Type');?> <b><?php echo getCaseType($data->case_type); ?></b> </li>
                                                    <li><?php echo $this->lang->line('E_Service_Number');?> <b><?php echo $data->case_number;?></b> </li>
                                                    <li><?php echo $this->lang->line('E_Service_Date');?> <b><?php echo $data->case_date;?></b> </li>
                                                    <li><?php echo $this->lang->line('E_Service_Start_Date');?> <b><?php echo $data->case_start_date;?></b> </li>
                                                    <li><?php echo $this->lang->line('Contract_number');?> <b><?php echo $data->contract_number;?></b> </li>

                                                </ul>
                                            </div>
                                
                                        </div>
                                    </div>
                                    
                                    <div class="col-lg-8">
                                        <div class="client-information">
                                            <ul>
                                                <li><?php echo $this->lang->line('Client_Name');?><b><?php echo $data->client_name; ?></b></li>
                                                <li><?php echo $this->lang->line('client_File_number');?> <b><?php echo $data->client_file_number; ?></b> </li>
                                                <li><?php echo $this->lang->line('Identification_Numbers');?> <b><?php echo $data->identification_number; ?></b> </li>
                                                <li><?php echo $this->lang->line('identification_types');?> <b><?php echo $data->identification_types; ?></b> </li>    
                                            </ul>
                                        </div>
                                        <div class="row mt-30">
                                            <div class="col-lg-6">
                                                <div class="form-field-container detail-content-box add-info" style="height:247px;">
                                                    <div style="border-bottom:2px solid #7575751A">
                                                        <h3 class="main-title pb-20"><?php echo $this->lang->line('Requirements'); ?></h3>
                                                    </div>
                                                    <br>
                                                    <p><?php echo $data->note; ?></p>
                                                    <br><br><br>
                                                </div>
                                            </div>
                                            <div class="col-lg-6 ">
                                                <div class="form-field-container detail-content-box">
                                                    <div style="border-bottom:2px solid #7575751A">
                                                        <h3 class="main-title pb-20"><?php echo $this->lang->line('Audio_Files'); ?></h3>
                                                    </div>
                                                    <div class="attachment-audio-files">
                                                        <?php
                                                        $cisd = $data->doc_id;
                                                        $audio = $this->db->select('audio,id')->where('audioid',$cisd)->get('uploads')->result_array();
                                                        foreach ($audio as $audio) { ?>
                                                        <div class="docloopa">
                                                            <?php echo "<b>" . $audio['audio']."</b>"; ?>
                                                            <span class="dwndelbtn">
                                                            <a href="<?=base_url('uploads/audio/' . $audio["audio"]);?>" class='btn btn-success btn-sm' download><?php echo $this->lang->line('Download');?></a> 
                                                            <!--<a href="<?=base_url('front/delete_audio_files/' . $audio["audio"].'/'.$cisd);?>" class='btn btn-danger  btn-sm'>Delete</a>-->
                                                            </span>
                                                        </div>
                                                        <?php }?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">

                                            <div class="col-lg-6 ">
                                                <div class="form-field-container detail-content-box">
                                                    <div style="border-bottom:2px solid #7575751A">
                                                        <h3 class="main-title pb-20"><?php echo $this->lang->line('Files'); ?></h3>
                                                    </div>
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
                                </div>
                            </form>
                        </div>
                    </div>
                    
                </div>

                <div class="m-portlet__body">

                    <!-- table Session start -->
                    <div class="tab-content session c_tab" >
                        <div class="tab-pane active" id="m_tabs_1_1" role="tabpanel">
                            <div class="m-portlet__body">
                            <!-- <a style="margin-bottom: 25px; color: #fff !important;" class="btn btn-primary add_session_modal" data-toggle="modal" data-target="#add-session-modal"> <i class="fa fa-plus"></i><?php echo $this->lang->line('ADD_SESSION')?></a> -->
                                <div class="m_datatable m-datatable m-datatable--default m-datatable--loaded " style="">

                                    <div class="table-responsive">
                                        <table class="lp-theme-table lp-large-theme m_datatable paginated-table" id="m_table_1">
                                            <thead>
                                                <tr class="netTr" style="text-align:left;">
                                                    <th ><?php echo $this->lang->line('Serial_No');?>  </th>
                                                    <th ><?php echo $this->lang->line('E-Service_Name');?> </th>
                                                    <th ><?php echo $this->lang->line('Session_Date_and_Time');?> </th>
                                                    <th ><?php echo $this->lang->line('Subject');?> </th>
                                                    <th ><?php echo $this->lang->line('Judicial_Circuit');?>
                                                    
                                                    </th>
                                                    <th ><?php echo $this->lang->line('E-Service_No');?> </th>
                                                    <th ><?php echo $this->lang->line('Due_Date_and_Time');?> </th>
                                                    <th></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php 
                                                $count=1;
                                                if ( !empty($session) ){
                                                foreach($session as $appoinment){  ?>
                                                <tr class="<?php if(getMissionCount( $appoinment['id'],"session_mission") > 0) echo 'issubm'; ?>" style="text-align:left;">
                                                    <?php $serial_number = sprintf("#%02d", $count++); ?>
                                                    <td data-sort="<?= $count - 1 ?>"><?= $serial_number ?></td> 
                                                    <td><?php echo $appoinment['client_name']; ?></td>
                                                    <td><?php 
                                                    $date = DateTime::createFromFormat('d/m/Y', $appoinment['session_date']);
                                                    echo $date ? $date->format('Y-m-d') : ''; 
                                                    ?>:
                                                    <?= $appoinment['session_time'] ?></td>
                                                    <td><?= $appoinment['subject'] ?></td>
                                                    <td><?= $appoinment['department']; ?></td>
                                                    <td><?= $appoinment['case_number']; ?></td>

                                                    <td ><span class="date_time"><?php 
                                                    $date = DateTime::createFromFormat('d/m/Y', $appoinment['session_end_date']);
                                                    echo $date ? $date->format('Y-m-d') : ''; 
                                                    ?>,
                                                    <?= $appoinment['session_end_time'] ?></span>
                                                    </td>
                                                    <td class="action">
                                                    
                                                        <a href="<?= base_url("front/view_appoinment/{$appoinment['id']}") ?>">
                                                            <span class="arrow_img">
                                                                
                                                                <img class="icon-dir-ltr" src="<?= base_url('assets/images'); ?>/img/arrow_right.svg"  alt="arrow">
                                                                <img class="icon-dir-rtl" src="<?= base_url('assets/images'); ?>/img/arrow_left1.svg"  alt="arrow">
                                                            </span>
                                                        </a>
                                                    </td>
                                                    <style>
                                                        .icon-dir-rtl {
                                                            display: none;
                                                        }

                                                        html[dir="rtl"] .icon-dir-ltr {
                                                            display: none;
                                                        }

                                                        html[dir="rtl"] .icon-dir-rtl {
                                                            display: inline;
                                                        }
                                                    </style>
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

                    <!-- table Writing start -->
                    <div class="tab-content writing c_tab"  >
                        <div class="tab-pane active" id="m_tabs_1_1" role="tabpanel">
                            <div class="m-portlet__body">
                                <!-- <a style="margin-bottom: 25px; color: #fff !important;" class="btn btn-primary add_writing_modal" data-toggle="modal" data-target="#add-writing-modal"> <i class="fa fa-plus"></i><?php echo $this->lang->line('ADD_WRITINGS')?></a> -->
                                <div class="m_datatable m-datatable m-datatable--default m-datatable--loaded" style="">
                                    <div class="table-responsive">
                                        <table class="lp-theme-table lp-large-theme m_datatable paginated-table" id="m_table_2">
                                            <thead>
                                                <tr class="netTr" style="text-align:left;">
                                                    <th ><?php echo $this->lang->line('Serial_No');?>  </th>
                                                    <th ><?php echo $this->lang->line('E-Service_Name');?> </th>
                                                    <th ><?php echo $this->lang->line('Writing_Date_and_Time');?> </th>
                                                    <th ><?php echo $this->lang->line('Subject');?> </th>
                                                    <th ><?php echo $this->lang->line('Writings_Type');?>
                                                    
                                                    </th>
                                                    <th ><?php echo $this->lang->line('E-Service_No');?> </th>
                                                    <th ><?php echo $this->lang->line('Due_Date_and_Time');?> </th>
                                                    <th></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php 
                                                $count=1;
                                                if ( !empty($writings) ){
                                                foreach($writings as $appoinment){  ?>
                                                <tr style="text-align: left;" class="<?php if(getMissionCount( $appoinment['id'],"writing_misssion") > 0) echo 'issubm'; ?>">
                                                    <?php $serial_number = sprintf("#%02d", $count++); ?>
                                                    <td data-sort="<?= $count - 1 ?>"><?= $serial_number ?></td> 
                                                    
                                                    <td><?= getServiceType($appoinment['service_types']); ?></td>

                                                    <td><?php 
                                                        $date = DateTime::createFromFormat('d/m/Y', $appoinment['session_date']);
                                                        echo $date ? $date->format('Y-m-d') : ''; 
                                                        ?>:

                                                    <?= $appoinment['session_time'] ?></td>
                                                    <td><?= $appoinment['subject'] ?></td>
                                                    <td><?= getGeneralType($appoinment['writing_type']); ?></td>
                                                    <td><?= $appoinment['case_number']; ?></td>

                                                    <td ><span class="date_time"><?php 
                                                    $date = DateTime::createFromFormat('d/m/Y', $appoinment['session_end_date']);
                                                    echo $date ? $date->format('Y-m-d') : ''; 
                                                    ?>,
                                                    <?= $appoinment['session_end_time'] ?></span>
                                                    </td>
                                                    <td class="action">
                                                        <a href="<?= base_url("front/view_writings_appoinment/{$appoinment['id']}") ?>">
                                                            <span class="arrow_img">
                                                                
                                                                <img class="icon-dir-ltr" src="<?= base_url('assets/images'); ?>/img/arrow_right.svg"  alt="arrow">
                                                                <img class="icon-dir-rtl" src="<?= base_url('assets/images'); ?>/img/arrow_left1.svg"  alt="arrow">
                                                            </span>
                                                        </a>
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


                    <!-- table Consultation start -->
                    <div class="tab-content consultation c_tab"  >
                        <div class="tab-pane active" id="m_tabs_1_2" role="tabpanel">
                            <div class="m-portlet__body">
                            <!-- <a style="margin-bottom: 25px; color: #fff !important;" class="btn btn-primary add_consultation_modal" data-toggle="modal" data-target="#add-consultation-modal"> <i class="fa fa-plus"></i><?php echo $this->lang->line('ADD_CONSULTATION')?></a> -->

                                <div class="m_datatable m-datatable m-datatable--default m-datatable--loaded" style="">

                                    <div class="table-responsive">
                                        <table class="lp-theme-table lp-large-theme m_datatable paginated-table" id="m_table_3">
                                            <thead>
                                                <tr class="netTr" style="text-align:left;">
                                                    <th ><?php echo $this->lang->line('Serial_No');?>  </th>
                                                    <th ><?php echo $this->lang->line('E-Service_Name');?> </th>
                                                    <th ><?php echo $this->lang->line('Consultation_Date_and_Time');?> </th>
                                                    <th ><?php echo $this->lang->line('Subject');?> </th>
                                                    <th ><?php echo $this->lang->line('Consultation_Type');?>
                                                    
                                                    </th>
                                                    <th ><?php echo $this->lang->line('E-Service_No');?> </th>
                                                    <th ><?php echo $this->lang->line('Due_Date_and_Time');?> </th>
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
                                                    <td><?php 
                                                    $date = DateTime::createFromFormat('d/m/Y', $appoinment['session_date']);
                                                    echo $date ? $date->format('Y-m-d') : ''; 
                                                    ?>:
                                                    <?= $appoinment['session_time'] ?></td>
                                                    <td><?= $appoinment['subject'] ?></td>
                                                    <td><?= $appoinment['consultation_type'] ?></td>
                                                    <td><?= $appoinment['case_number']; ?></td>
                                        

                                                    <td ><span class="date_time"><?php 
                                                    $date = DateTime::createFromFormat('d/m/Y', $appoinment['session_end_date']);
                                                    echo $date ? $date->format('Y-m-d') : ''; 
                                                    ?>,
                                                    <?= $appoinment['session_end_time'] ?></span>
                                                    </td>
                                                    <td class="action">
                                                        <a href="<?= base_url("front/view_consultation_appoinment/{$appoinment['id']}") ?>">
                                                            <span class="arrow_img">
                                                                
                                                                <img class="icon-dir-ltr" src="<?= base_url('assets/images'); ?>/img/arrow_right.svg"  alt="arrow">
                                                                <img class="icon-dir-rtl" src="<?= base_url('assets/images'); ?>/img/arrow_left1.svg"  alt="arrow">
                                                            </span>
                                                        </a>
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


                    <!-- table General start -->
                    <div class="tab-content general c_tab"  >
                        <div class="tab-pane active" id="m_tabs_1_1" role="tabpanel">
                            <div class="m-portlet__body">
                            <!-- <a style="margin-bottom: 25px; color: #fff !important;" class="btn btn-primary add_general_modal" data-toggle="modal" data-target="#add-general-modal"> <i class="fa fa-plus"></i><?php echo $this->lang->line('ADD_GENERAL')?></a> -->
                                <div class="m_datatable m-datatable m-datatable--default m-datatable--loaded" style="">

                                    <div class="table-responsive">
                                        <table class="lp-theme-table lp-large-theme m_datatable paginated-table" id="m_table_4">
                                            <thead>
                                                <tr class="netTr" style="text-align:left;">
                                                    <th ><?php echo $this->lang->line('Serial_No');?>  </th>
                                                    <th ><?php echo $this->lang->line('E-Service_Name');?> </th>
                                                    <th ><?php echo $this->lang->line('General_Date_and_Time');?> </th>
                                                    <th ><?php echo $this->lang->line('Subject');?> </th>
                                                    <th ><?php echo $this->lang->line('General_Type');?>
                                                    
                                                    </th>
                                                    <th ><?php echo $this->lang->line('E-Service_No');?> </th>
                                                    <th ><?php echo $this->lang->line('Due_Date_and_Time');?> </th>
                                                    <th></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php 
                                                if (!empty($general)){
                                                $count=1;
                                                foreach($general as $appoinment){  ?>
                                                <tr class="<?php if(getMissionCount( $appoinment['id'],"general_mission") > 0) echo 'issubm'; ?>" style="text-align:left;">
                                                    <?php $serial_number = sprintf("#%02d", $count++); ?>
                                                    <td data-sort="<?= $count - 1 ?>"><?= $serial_number ?></td> 
                                                    <td><?php echo $appoinment['case_number']; ?></td>
                                                    <td><?php 
                                                        $date = DateTime::createFromFormat('d/m/Y', $appoinment['session_date']);
                                                        echo $date ? $date->format('Y-m-d') : ''; 
                                                        ?>:

                                                    <?= $appoinment['session_time'] ?></td>
                                                    <td><?= $appoinment['subject'] ?></td>
                                                    <td><?= getGeneralType($appoinment['general_type']); ?></td>
                                                    <td><?= $appoinment['case_number']; ?></td>

                                                    <td ><span class="date_time"><?php 
                                                    $date = DateTime::createFromFormat('d/m/Y', $appoinment['session_end_date']);
                                                    echo $date ? $date->format('Y-m-d') : ''; 
                                                    ?>,
                                                    <?= $appoinment['session_end_time'] ?></span>
                                                    </td>
                                                    <td class="action">
                                                        <a href="<?= base_url("front/view_general_appoinment/{$appoinment['id']}") ?>">
                                                            <span class="arrow_img">
                                                                
                                                                <img class="icon-dir-ltr" src="<?= base_url('assets/images'); ?>/img/arrow_right.svg" alt="arrow">
                                                                <img class="icon-dir-rtl" src="<?= base_url('assets/images'); ?>/img/arrow_left1.svg"  alt="arrow">
                                                            </span>
                                                        </a>
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


                    <!-- table Files start -->
                    <div class="tab-content files c_tab"  >
                        <div class="tab-pane active" id="m_tabs_1_1" role="tabpanel">
                            <div class="m-portlet__body">
                                <div class="m_datatable m-datatable m-datatable--default m-datatable--loaded" style="">

                                    <div class="table-responsive">
                                        <table class="lp-theme-table lp-large-theme m_datatable paginated-table" id="m_table_5">
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
                                                    <td>
                                                    <?php echo date('Y-m-d', strtotime($doc['created'])); ?>

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
                    

                    <!-- table Reports start -->
                    <div class="tab-content reports c_tab"  >
                        <div class="tab-pane active" id="m_tabs_1_1" role="tabpanel">
                            <div class="m-portlet__body">
                                <div class="m_datatable m-datatable m-datatable--default m-datatable--loaded" style="">

                                    <div class="table-responsive">
                                        <table class="lp-theme-table lp-large-theme m_datatable paginated-table" id="m_table_5">
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
                                                        <?php echo date('Y-m-d', strtotime($doc['created'])); ?>

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

                </div>

            </div>
        </div>
    </div>
<?php

include('footer.php');

?>

<script>
$(document).ready(function () {
    $('.c_tab').hide(); // Hide all tabs
    $('.c_tab.service').show(); // Show default tab

    $('.c_navs a').on('click', function (e) {
        e.preventDefault(); // Prevent anchor from navigating

        let currentID = $(this).parent().attr('id'); // Get parent <li> ID
        $('.c_navs').removeClass('active');
        $('#' + currentID).addClass('active');

        $('.c_tab').hide();
        $('.c_tab.' + currentID).show();
    });
});
</script>

<script>
$(document).ready(function () {
    var itemsPerPage = 10; // You can customize this per table if needed

    $('table.paginated-table').each(function () {
        var $table = $(this);
        var $tableRows = $table.find('tbody tr');
        var currentPage = 1;
        var $paginationContainer = $('<div id="pagination" class="pagination-wrapper text-center mt-3"></div>');
        $table.after($paginationContainer);

        function showTablePage(page) {
            var start = (page - 1) * itemsPerPage;
            var end = start + itemsPerPage;

            $tableRows.hide().slice(start, end).show();
            updateTablePagination(page);
        }

        function updateTablePagination(currentPage) {
            var totalPages = Math.ceil($tableRows.length / itemsPerPage);
            var paginationHtml = '';

            if (totalPages > 1) {
                // Left arrow
                paginationHtml += `<a href="#" class="page-link prev" data-page="${currentPage - 1}" 
                    ${currentPage === 1 ? 'style="pointer-events:none;opacity:0.5;"' : ''}>&lt;</a> `;

                for (var i = 1; i <= totalPages; i++) {
                    if (i <= 3 || i === totalPages) {
                        paginationHtml += `<a href="#" class="page-link ${i === currentPage ? 'active' : ''}" data-page="${i}">${i}</a> `;
                    } else if (i === 4) {
                        paginationHtml += `... `;
                    }
                }

                // Right arrow
                paginationHtml += `<a href="#" class="page-link next" data-page="${currentPage + 1}" 
                    ${currentPage === totalPages ? 'style="pointer-events:none;opacity:0.5;"' : ''}>&gt;</a>`;
            }

            $paginationContainer.html(paginationHtml);
        }

        // Pagination click handler (scoped to this table)
        $paginationContainer.on('click', '.page-link', function (e) {
            e.preventDefault();
            var newPage = parseInt($(this).data('page'));
            var totalPages = Math.ceil($tableRows.length / itemsPerPage);
            if (!isNaN(newPage) && newPage >= 1 && newPage <= totalPages) {
                currentPage = newPage;
                showTablePage(currentPage);
            }
        });

        showTablePage(currentPage);
    });
});
</script>
<!-- 
<script>
$(document).ready(function () {
    var itemsPerPage = 10; // Change this to your desired rows per page
    var currentPage = 1;
    var $tableRows = $('#m_table_1 tbody tr');
    var $paginationContainer = $('<div id="pagination" class="pagination-wrapper text-center mt-3"></div>');
    $('#m_table_1').after($paginationContainer);

    function showTablePage(page) {
        var start = (page - 1) * itemsPerPage;
        var end = start + itemsPerPage;

        $tableRows.hide().slice(start, end).show();
        updateTablePagination();
    }

    function updateTablePagination() {
    var totalPages = Math.ceil($tableRows.length / itemsPerPage);
    var paginationHtml = '';

    if (totalPages > 1) {
        // Left arrow
        paginationHtml += `<a href="#" class="page-link prev" data-page="${currentPage - 1}" 
            ${currentPage === 1 ? 'style="pointer-events:none;opacity:0.5;"' : ''}>
            &lt;
        </a> `;

        // Page numbers
        for (var i = 1; i <= totalPages; i++) {
            if (i <= 3 || i === totalPages) { // Show first 3 and last
                paginationHtml += `<a href="#" class="page-link ${i === currentPage ? 'active' : ''}" data-page="${i}">${i}</a> `;
            } else if (i === 4) {
                paginationHtml += `... `;
            }
        }

        // Right arrow
        paginationHtml += `<a href="#" class="page-link next" data-page="${currentPage + 1}" 
            ${currentPage === totalPages ? 'style="pointer-events:none;opacity:0.5;"' : ''}>
            &gt;
        </a>`;
    }

    $('#pagination').html(paginationHtml);
}


    $(document).on('click', '.page-link', function (e) {
        e.preventDefault();
        var newPage = parseInt($(this).data('page'));
        var totalPages = Math.ceil($tableRows.length / itemsPerPage);
        if (!isNaN(newPage) && newPage >= 1 && newPage <= totalPages) {
            currentPage = newPage;
            showTablePage(currentPage);
        }
    });

    showTablePage(currentPage);
});
</script> -->
