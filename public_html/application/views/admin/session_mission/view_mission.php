<?php include __DIR__ . "/../header.php"; ?>

    <style>
        .m-form.m-form--group-seperator-dashed .m-form__group {
            border-bottom: 0px dashed #ebedf2;
        }
        .thh h3{
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
        .m-session {
            font-family: 'Roboto';
            font-weight: 500;
            line-height: 20px;
            color: #333333;
        }
        .m-session .form-field-container.detail-content-box {
            margin-bottom: 5px;
        }
        .m-session table.theme-detail-table {
            margin: 10px 0 0 0;
        }
        .m-session hr {
            background: lightgray;
        }
        .m-session .m-form-25-group {
            gap: 15px;
        }
        .m-session .m-form-dp,
        .m-session .m-form-case-details,
        .m-session .m-form-case-responsibility,
        .m-session .m-form-case-employee-details,
        .m-session .m-form-case-status {
            border-radius: 15px;
            padding: 10px;
            gap: 30px;
        }
        .m-session .m-form-case-status {
            margin: 20px 0;
            padding: 20px 10px 40px;
        }
        .m-session .m-form-dp img {
            width: 40%;
        }
        .m-session .m-form-dp div {
            width: 100%;
            row-gap: 6px;
        }
        .in_fo{
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
        .m-portlet .m-form.m-form--fit > .m-portlet__body {
            padding-bottom: 40px !important;
        }
        .nav {
            display: -webkit-box;
        }
        .m-portlet {
            margin-bottom: 0;
        }
        .m-widget4 .m-widget4__item .m-widget4__info {
            width: 97.2%;
        }
        .m-form .form-control-label, .m-form label{
            margin: 0px 0px 5px 0px;
        }
        .m-session .m-form-case-details-header {
            margin-bottom: 20px;
        }
        .m-session .m-form-case-details-delete-button {
            width: 100%;
            margin: 10px auto;
        }
        .m-session .m-form .m-portlet__body {
            column-gap: 25px;
        }
        .m-session .m-form-case-responsibility,
        .m-session .m-form-case-employee-details {
            padding: 30px 15px 15px 15px;
            height: 100%;
        }
        .m-session .link-primary {
            color: #229AD6;
        }
        .m-session i.fa-solid {
            font-family: FontAwesome !important;
            font-style: normal;
        }

        .m-portlet__body.theme-inner-form2{
            box-shadow: 0px 10px 15px 0px #0C66E40D;
            background: #ffffff30;
            padding: 30px 24px !important;
            border-radius: 20px;
            position: relative;
            margin: 20px 0 0 0;
        }

        h3.client-name{
            margin-left: 20px;
        }
    </style>

    
    
    <!-- New Design Start -->
    <div class="m-grid__item m-grid__item--fluid m-wrapper m-session">

        <div style="position:absolute;">
            <img class="custom-search-icon" src="../../../assets/images/img/search-icon.svg" alt="Search">
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
                            <?php echo $this->lang->line('Session');?>
                        </h3>
                    </div> -->
                <!-- <div class="theme-new-nav-menu">
                            <a class="back-link" href="#">
                                <svg width="16" height="14" viewBox="0 0 16 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M7.70679 13.7006C7.51926 13.888 7.26495 13.9934 6.99979 13.9934C6.73462 13.9934 6.48031 13.888 6.29279 13.7006L0.292786 7.70057C0.105315 7.51304 0 7.25874 0 6.99357C0 6.72841 0.105315 6.4741 0.292786 6.28657L6.29279 0.286571C6.48139 0.104413 6.73399 0.00361876 6.99619 0.00589718C7.25838 0.0081756 7.5092 0.113345 7.6946 0.298753C7.88001 0.484161 7.98518 0.734973 7.98746 0.99717C7.98974 1.25937 7.88894 1.51197 7.70679 1.70057L3.41379 5.99357H14.9998C15.265 5.99357 15.5194 6.09893 15.7069 6.28646C15.8944 6.474 15.9998 6.72835 15.9998 6.99357C15.9998 7.25879 15.8944 7.51314 15.7069 7.70068C15.5194 7.88821 15.265 7.99357 14.9998 7.99357H3.41379L7.70679 12.2866C7.89426 12.4741 7.99957 12.7284 7.99957 12.9936C7.99957 13.2587 7.89426 13.513 7.70679 13.7006Z" fill="#333333"/>
                                </svg>
                                Back</a>
                        <ul>
                            <li> <a href="http://lexport.demosbywpsqr.com/admin/customer/list_customer">Client Info</a> </li>
                            <li class="active"> <a href="#">Service Details</a> </li>
                            <li> <a href="http://lexport.demosbywpsqr.com/admin/mission_session/list_mission">Cases</a> </li>
                            <li> <a href="http://lexport.demosbywpsqr.com/admin/mission_writings/list_mission">Writings</a> </li>
                            <li> <a href="http://lexport.demosbywpsqr.com/admin/mission_consultation/list_mission">Consultations</a> </li>
                            <li> <a href="http://lexport.demosbywpsqr.com/admin/mission_visiting/list_mission">Meetings</a> </li>
                            <li> <a href="http://lexport.demosbywpsqr.com/admin/mission_general/list_mission">General</a> </li>
                            <li> <a href="http://lexport.demosbywpsqr.com/admin/archive/list_archive">Files</a> </li>
                            <li> <a href="http://lexport.demosbywpsqr.com/admin/report/by_employees">Reports</a> </li>
                            <li> <a href="http://lexport.demosbywpsqr.com/admin/admin/list_note">Notes</a> </li>
                            <li> <a href="http://lexport.demosbywpsqr.com/admin/finance">Financial</a> </li>
                        </ul>

                            <a class="btn btn-primary" href="#"> <i class="fa fa-plus"></i> Assign</a>
                        </div> -->
                </div>
            </div>
                <div class="m-portlet__body theme-inner-form2">
                    <!--begin::Form-->
                    <form class="m-form m-form--fit m-form--label-align-right m-form--group-seperator-dashed">
                        <div class="row">
                            
                            <div class="col-md-4 d-flex flex-column m-form-25-group">
                                <div class="m-form-dp bg-white profile-detail-card">
                                    <!-- <img src="http://lexport.demosbywpsqr.com/assets/images/img/flag_ksa.png" alt=""> -->
                                    <div class="d-flex align-items-center justify-content-between" style="height: 125px;">
                                        <h3 class="client-name mb-0"><?php echo $data->client_name; ?></h3>
                                        <a class="btn btn-primary" style="width: 90px;" href=<?= base_url("admin/mission_session/find_mission/{$data->id}") ?>  ><?php echo $this->lang->line('Edit');?><img style="margin-left:-18px; height:16px;" src="<?= base_url('assets/images/img/pen-white.svg') ?>" alt="Edit"></a>
                                    </div>
   
                                </div>
                                <div class="bg-white m-form-case-details">  
                                    <h3 class="m-form-case-details-header"><?php echo $this->lang->line('Case_Details')?></h3>
                                    <form action="">
                                        <div class="d-flex flex-column">
                                            <label for=""><?php echo $this->lang->line('Subject');?></label>
                                            <b><?php echo $data->subject; ?></b>
                                        </div>
                                        <hr class="hr" />
                                        <div class="d-flex flex-column">
                                            <label for=""><?php echo $this->lang->line('Writing_Type');?></label>
                                            <b><?php echo $data->session_number; ?></b>
                                        </div>
                                        <hr class="hr" />
                                        <div class="d-flex flex-column">
                                            <label for=""><?php echo $this->lang->line('Court_Name');?></label>
                                            <b><?php echo gtCourtName($data->court_name); ?></b>
                                        </div>
                                        <hr class="hr" />
                                        <div class="d-flex flex-column">
                                            <label for=""><?php echo $this->lang->line('Judicial_Circuit')?></label>
                                            <b><?php echo $data->department; ?></b>
                                        </div>
                                        <!-- <input type="button" class="btn btn-danger m-form-case-details-delete-button delete_appoinment" value="Delete"> -->
                                    </form>
                                </div>
                            </div>
                            <div class="form-field-container col-md-8">
                            
                                <div class="form-field-container detail-content-box bg-transparent">
                                    <div class="table-responsive">
                                        <table class="theme-detail-table">
                                            <tbody>
                                                <tr>
                                                    <td>
                                                    <?php echo $this->lang->line('Client_Type')?>
                                                        <b><?php echo $data->identification_number; ?></b>
                                                    </td>
                                                    <td>
                                                    <?php echo $this->lang->line('Client_ID')?>
                                                        <b><?php echo $data->identification_types; ?></b>
                                                    </td>
                                                    <td>
                                                    <?php echo $this->lang->line('File_Number')?>
                                                        <b><?php echo $data->client_file_number; ?></b>
                                                    </td>
                                                    <td>
                                                        <?php echo $this->lang->line('E_Service_Number');?>
                                                        <b><?php echo $data->case_number; ?></b>
                                                    </td>
                                                    <td>
                                                        <?php echo $this->lang->line('Sub_Mission');?>
                                                        <b><?php echo $data->sub_mission_id ?></b>
                                                    </td>
                                                    <td>
                                                        <?php echo $this->lang->line('E_Service_Name');?>
                                                        <b><?php echo getCaseType($data->case_type); ?></b>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                    <div class="bg-white m-form-case-responsibility">
                                        <h3 class="m-form-case-details-header"><?php echo $this->lang->line('Case_Timeline')?></h3>
                                        <div class="d-flex flex-column">
                                            <label for=""><?php echo $this->lang->line('Session_Start_Date');?></label>
                                            <b><?php  echo getTheDayAndDateFromDatePan($data->session_date); ?></b>
                                        </div>
                                        <hr class="hr" />
                                        <div class="d-flex flex-column">
                                            <label for=""><?php echo $this->lang->line('Session_Start_Time');?></label>
                                            <b><?php echo $data->session_time; ?></b>
                                        </div>
                                        <hr class="hr" />
                                        <div class="d-flex flex-column">
                                            <label for=""><?php echo $this->lang->line('Due_Date')?></label>
                                            <b><?php echo getTheDayAndDateFromDatePan($data->session_end_date);  ?></b>
                                        </div>
                                    </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="bg-white m-form-case-employee-details">
                                            <h3 class="m-form-case-details-header"><?php echo $this->lang->line('Employee_Responsibilities')?></h3>
                                            <div class="d-flex flex-column">
                                                <label for=""><?php echo $this->lang->line('Responsible_Employee');?></label>
                                                <b><?php echo getEmployeeName($data->responsible_employee); ?></b>
                                            </div>
                                            <hr class="hr" />
                                            <div class="d-flex flex-column">
                                                <label for=""><?php echo $this->lang->line('Follow_up_Employee');?></label>
                                                <b><?php echo getEmployeeName($data->follow_up_employee); ?></b>
                                            </div>
                                            <hr class="hr" />
                                            <div class="d-flex flex-column">
                                                <label for=""><?php echo $this->lang->line('ACTION')?></label>
                                                <b><?php echo $data->note; ?></b>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <div class="bg-white m-form-case-status">
                                            <div class="case-status-box">
                                                <h3 class="m-form-case-details-header"><?php echo $this->lang->line('Case_Status')?> </h3>
                                                <label for=""><?php echo $this->lang->line('Created')?> <?php  echo getTheDayAndDateFromDatePan($data->session_date); ?> <?php echo $this->lang->line('by')?> <?php echo $data->client_name; ?></label>
                                                <!-- <hr class="hr" />
                                                <span>Status Update - Description</span> -->
                                            </div>
                                    </div>
                                    </div>
                                    
                                    
                                </div>

                                
                            </div>
                        </div>
                    </form>
            
                    <!--end::Form-->
                </div>
            </div>

            <!--end::Portlet-->
        </div>
    </div>
    <!-- New Design End -->



<?php include __DIR__ . "/../footer.php"; ?>

<script>
    document.getElementById("userSearch").addEventListener("keyup", function() {
    let searchValue = this.value.toLowerCase();
    let tableRows = document.querySelectorAll(".theme-detail-table tbody tr");

    tableRows.forEach(row => {
        let rowText = row.textContent.toLowerCase();
        row.style.display = rowText.includes(searchValue) ? "" : "none";
    });
});
</script>