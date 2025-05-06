<?php
include('header.php');

?>
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
            width: 97.7%;
        }
        
    </style>

    <div class="m-grid__item m-grid__item--fluid m-wrapper">
    <div style="position:absolute;">
        <img class="custom-search-icon" src="../../../assets/images/img/search-icon.svg" alt="Search">
        <input type="text" id="userSearch" class="form-control" placeholder="Search Client, E-Services........">
    </div>

        <!-- END: Subheader -->
        <div class="m-content">
            

            <!--begin::Portlet-->
            <div class="m-portlet lp-theme-card bg-transparent">
                <div class="m-portlet__head">
                    <!-- <div class="m-portlet__head-caption">
                        <div class="m-portlet__head-title">
                            <h3 class="m-portlet__head-text">
                          Project
                            </h3>
                        </div>
                    </div> -->
                </div>

                <!--begin::Form-->
                <form class="m-form m-form--fit m-form--label-align-right m-form--group-seperator-dashed">
                    
                    <div class="m-portlet__body">
					
                        <div class="form-field-container detail-content-box">
                            <div class="d-flex justify-content-between align-items-center">
                                <h3><?php echo $this->lang->line('Project');?></h3>
                                <a class="btn btn-primary" href="<?= base_url("admin/project/find_project/{$data->id}");?>"><?php echo $this->lang->line('Edit');?><img style="margin-left:6px; height:16px;" src="<?= base_url('assets/images/img/pen-white.svg') ?>" alt="Edit"></a>

                            </div>

                            <table class="theme-detail-table">
                                <tbody>
                                    <tr>
                                        <td>
                                        <?php echo $this->lang->line('Project_Name');?>
                                        <b><?php echo $data->project_name; ?></b>
                                        </td>
                                        <td>
                                            <?php echo $this->lang->line('Project_Type');?>
                                        <b><?php echo getProjectTypeName($data->project_type); ?></b>
                                        </td>
                                        <td>
                                            <?php echo $this->lang->line('Project_Relation');?>
                                            <b><?php echo $this->lang->line($data->project_relation); ?></b>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>


                        <div class="form-field-container detail-content-box">
                        <h3><?php echo $this->lang->line('Project_Management');?></h3>
                        <table class="theme-detail-table">
                            <tbody>
                                <tr>
                                    <td>
                                        <?php echo $this->lang->line('Group'); ?>
                                        <?php foreach(getGroupList() as $froups) { 
                                            if ( $data->add_group==$froups['id'] ) {
                                            ?>
                                            <b><?php echo $froups['name'] ?> <b>
                                        <?php } } ?>
                                    </td>
                                    <td>
                                    <?php echo $this->lang->line('Project_Team_Manager');?>
                                        <b><?php echo getEmployeeName($data->project_team_manager); ?></b>
                                    </td>
                                    <td>
                                        <?php echo $this->lang->line('Project_Number');?>
                                        <b><?php echo $data->project_number; ?></b>
                                    </td>
                                    <td>
                                        <?php echo $this->lang->line('Project_Status');?>
                                        <b><?php echo $data->project_status; ?></b>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                          
                        </div>


                        <div class="form-field-container detail-content-box">
                        <h3><?php echo $this->lang->line('Project_Time_line');?></h3>

                        <table class="theme-detail-table">
                            <tbody>
                                <tr>
                                    <td>
                                    <?php echo $this->lang->line('Starting_Date');?>
                                    <b><?php echo getTheDayAndDateFromDatePan($data->starting_date); ?></b>
                                    </td>
                                    <td>
                                        <?php echo $this->lang->line('Ending_Date');?>
                                        <b><?php echo getTheDayAndDateFromDatePan($data->ending_date); ?></b>
                                    </td>
                                    <td>
                                        <?php echo $this->lang->line('Start_Time');?>
                                        <b><?php echo $data->start_time; ?></b>
                                    </td>
                                    <td>
                                        <?php echo $this->lang->line('Ending_Time');?>
                                        <b><?php echo $data->ending_time; ?></b>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                       
                        </div>


 
                                </div>
                            </div>
                        </div>
                        
                    </div>
                </form>

                <!--end::Form-->
            </div>

   

<?php

include('footer.php');
?>

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