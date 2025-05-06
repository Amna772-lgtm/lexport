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

.modal .eservice-modal{
    max-width: 580px;
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
                                <?php echo $this->lang->line('HR_E_services');?>
                            </h3>
                        </div> -->
                        <div class="theme-new-nav-menu">
                            <h3 class="m-portlet__title" style="margin-right: 70px; font-size:24px !important;">
                                <?php echo $this->lang->line('HR_Services');?>
                            </h3>
                            <ul style="gap: 30px;">
                                <!-- <li> <a href="http://lexport.demosbywpsqr.com/admin/employee/list_employee">HR</a> </li> -->
                                <li class="active"> <a href="http://lexport.demosbywpsqr.com/admin/hr/list_hr_eservice"><?php echo $this->lang->line('e-services');?></a> </li>
                                <li> <a href="http://lexport.demosbywpsqr.com/admin/hr/list_hr_fine"><?php echo $this->lang->line('Fine');?></a> </li>
                                <li> <a href="http://lexport.demosbywpsqr.com/admin/employee/list_employee"><?php echo $this->lang->line('Employees');?></a> </li>
                                <!-- <li> <a href="http://lexport.demosbywpsqr.com/admin/finance">Financial</a> </li> -->
                                <!-- <li> <a href="http://lexport.demosbywpsqr.com/admin/finance/transaction">Transaction</a> </li> -->
                            </ul>

                            <a class="btn btn-primary" href="<?=base_url('admin/hr/add_hr_eservice');?>" data-toggle="modal" data-target="#add-modal"> <i class="fa fa-plus"></i> <?php echo $this->lang->line('Create_HR_E_Service');?></a>
                        </div>
                    </div>
                </div>


                <div class="m-portlet__body">
                    <div class="m_datatable m-datatable m-datatable--default m-datatable--loaded" style="">

                    <div class="table-responsive">
                                    <table class="lp-theme-table lp-large-theme" id="m_datatable">
                            <thead>
                            <tr class="netTr" style="text-align:left;">
                                 <th class="sortable"><?php echo $this->lang->line('Serial_No');?>
                                 <img class="sortIcon" src="../../assets/images/img/unfold_more.svg" height="18px">
                                </th>
                        <th class="sortable"><?php echo $this->lang->line('Service_Type');?>
                        <img class="sortIcon" src="../../assets/images/img/unfold_more.svg" height="18px">
                    </th>
						<!-- <?php if($this->session->userdata('role_id') == 1){ ?>   
                        <th><?php echo $this->lang->line('Employee_Name');?></th> <?php } ?> -->
						<!-- <th class="sortable"><?php echo $this->lang->line('Start_Date');?>
                        <img class="sortIcon" src="../../assets/images/img/unfold_more.svg" height="18px">
                    </th>
						<th class="sortable"><?php echo $this->lang->line('End_Date');?>
                        <img class="sortIcon" src="../../assets/images/img/unfold_more.svg" height="18px">
                    </th> -->
						<th class="sortable"><?php echo $this->lang->line('Reason');?>
                        <img class="sortIcon" src="../../assets/images/img/unfold_more.svg" height="18px">
                    </th>
                        <th class="sortable"><?php echo $this->lang->line('Status');?>
                        <img class="sortIcon" src="../../assets/images/img/unfold_more.svg" height="18px">
                    </th>
						<th></th>
                            </tr>
                            </thead>
                            <tbody>
 <?php $count=1;
                       foreach($data as $Padding_cus) { ?>
                        <tr class="hide<?php echo $Padding_cus['id'] ?>" style="text-align: left;">
                        <?php $serial_number = sprintf("#%03d", $count++); ?>
    <td data-sort="<?= $count - 1 ?>"><?= $serial_number ?></td>
                        <td><?= getHrEserviceName($Padding_cus['service_type']) ?></td>
						<!-- <?php if($this->session->userdata('role_id') == 1){ ?>  <td><?= getEmployeeName($Padding_cus['user_id']) ?></td><?php } ?> -->
                        <!-- <td><?php echo getTheDayAndDateFromDatePan($Padding_cus['start_date']); ?></td>
                        <td><?php echo getTheDayAndDateFromDatePan($Padding_cus['end_date']);?></td> -->
                        <td><?= $Padding_cus['reason'] ?></td>
                        <td><?php 
						if($Padding_cus['status']=="pending" ) { ?> 
						 <span><?php echo $this->lang->line('Pending');?></span>
						<?php }
						if($Padding_cus['status']=="approve") {?> 
						<span><?php echo $this->lang->line('Approved');?></span>
						<?php }
						if($Padding_cus['status']=="reject") {?> 
						<span
                        ><?php echo $this->lang->line('Reject');?></span>
						<?php }?>
						
						</td>
						<?php
						if($this->session->userdata('role_id') == 1){ ?>   
						<td class="action" style="text-align:left;">
						<?php 
						if($Padding_cus['status']=="pending" ) { ?> 
						<a class="btn btn-success" href="<?php echo base_url(); ?>admin/hr/hr_service_status_change/<?php echo $Padding_cus['id'] ; ?>/approve"><?php echo $this->lang->line('Approve');?></a> 
						<a class="btn btn-danger" href="<?php echo base_url(); ?>admin/hr/hr_service_status_change/<?php echo $Padding_cus['id'] ; ?>/reject"><?php echo $this->lang->line('Reject');?></a> 
						<?php } ?>
                        <a data-target="#view-modal" class="view-modal" data-toggle="modal" data-id="<?= $Padding_cus['id'] ?>" title="<?php echo $this->lang->line('View');?>">
                        <img src="<?= base_url('assets/images/img/eye-solid.svg') ?>" alt="View" class="img-eye">
						</a>
						
                        <a data-target="#edit-modal" class="editing-modal" data-toggle="modal" data-id="<?= $Padding_cus['id'] ?>" title="<?php echo $this->lang->line('Edit_On_File');?>">
                            <div style="display:none" class="appointment_data" data-array='<?php echo json_encode( $Padding_cus ); ?>'></div>
                            <img src="<?= base_url('assets/images/img/pen-solid.svg') ?>" alt="Edit" class="img-pen">
                        </a>
                        <a href='javascript:;' id="<?=$Padding_cus['id']?>"  class="fa fa-trash deleteservices" title="<?php echo $this->lang->line('Delete_E_Services');?>">
						<!-- <a class="btn btn-outline-success assign_case" href="<?php echo base_url(); ?>admin/hr/find_hr_eservice/<?php echo $Padding_cus['id'] ; ?>"><?php echo $this->lang->line('Edit');?></a>  -->
						</td> 
						<?php } ?>
                      </tr>
				<?php } ?>
                            </tbody>
                        </table>

                        <!-- Start Add Modal -->
                        <div class="modal fade lp-theme-modal" id="add-modal" tabindex="-1" role="dialog" aria-labelledby="modalTitle" aria-hidden="true">
                            <div class="modal-dialog eservice-modal" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="modalTitle"><?php echo $this->lang->line('Add_HR_E_Service');?></h5>
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
                                                    <?php echo $this->lang->line('Edit_HR_E_Service');?>
                                                <?php	} else { ?>
                                                    <?php echo $this->lang->line('Add_HR_E_Service');?> 
                                            <?php } ?>
                                                                </h3>
                                                            </div>
                                                        </div> -->
                                                    </div>

                                                    <!--begin::Form-->
                                                <?php echo form_open_multipart('admin/hr/store_hr_service',['id'=>'hr']);
                                                if($data)
                                                {
                                                    echo form_hidden('id',''); 
                                                }
                                                else
                                                {
                                                    echo form_hidden('id',''); 
                                                }
                                            ?>
                                            <?php if($data)
                                                {
                                                    $value=$data->service_type;
                                                }
                                                else
                                                {
                                                    $value=set_value('service_type');
                                                } ?>
                                                        <div class="m-portlet__body theme-inner-form">
                                                        <div class="form-field-container">
                                                            <div class="form-group m-form__group row">
                                                                <div class="col-lg-12">
                                                                <label for="service_type" class=" form-control-label"><?php echo $this->lang->line('Select_service');?></label>
                                                                <select name="service_type" class="form-control m-bootstrap-select m-bootstrap-select--air m-bootstrap-select--pill m_selectpicker"  >
                                                                <option value=""><?php echo $this->lang->line('Select_Request_Type');?></option>
                                                                <?php foreach(getHrEservice_list() as $list_data) { ?>
                                                                <option value="<?php echo $list_data['id'] ?>" <?php if($value == $list_data['id']) echo "selected=selected"?>><?php echo $list_data['name'] ?></option>
                                                                <?php } ?>

                                                                </select>	
                                                                <div class="form-error"><?= form_error('service_type'); ?></div>
                                                                </div>
                                                                <div class="col-lg-6">
                                                                <label for="start_date" class=" form-control-label"><?php echo $this->lang->line('Start_Date');?></label>
                                                                    <?php if($data)
                                                                    {
                                                                        $value=$data->start_date;
                                                                    }
                                                                    else
                                                                    {
                                                                        $value=set_value('start_date');
                                                                    } ?>
                                                                    <?= form_input(['name'=>'start_date','id'=>'add_start_date','class'=>'form-control cd appdate','value'=>$value]);?>
                                                                    <div class="form-error"><?= form_error('start_date'); ?></div>
                                                                </div>
                                                                <div class="col-lg-6">
                                                                <label for="end_date" class=" form-control-label"><?php echo $this->lang->line('End_Date');?></label>
                                                                    <?php if($data)
                                                                    {
                                                                        $value=$data->end_date;
                                                                    }
                                                                    else
                                                                    {
                                                                        $value=set_value('end_date');
                                                                    } ?>
                                                                    <?= form_input(['name'=>'end_date','id'=>'add_end_date','class'=>'form-control sd appdate','value'=>$value]);?>
                                                                    <div class="form-error"><?= form_error('end_date'); ?></div>
                                                                    <?php
                                                                    if($data)
                                                                    {
                                                                        echo form_hidden('id',$data->id); 
                                                                    }
                                                                    else
                                                                    {
                                                                        echo form_hidden('id',''); 
                                                                    }
                                                                    ?>
                                                                </div>
                                                                <div class="col-lg-12" style="margin-top: 30px;">
                                                                <label for="reason" class=" form-control-label"><?php echo $this->lang->line('Reason');?></label>
                                                                    <?php if($data)
                                                                    {
                                                                        $value=$data->reason;
                                                                    }
                                                                    else
                                                                    {
                                                                        $value=set_value('reason');
                                                                    } ?>
                                                                    <?= form_input(['name'=>'reason','class'=>'form-control','value'=>$value]);?>
                                                                    <div class="form-error"><?= form_error('reason'); ?></div>
                                                                </div>
                                                            </div>
                                                            
                                                        </div>
                                                        <div class="d-flex justify-content-end mt-4">
                                                <button type="button" class="btn btn-secondary mr-2" data-dismiss="modal">
                                                    <?php echo $this->lang->line('Cancel');?>
                                                </button>
                                                <?php 
                                                    $submit = $this->lang->line('Save');
                                                    echo form_submit(['id'=>'addcustomer','value'=>$submit,'class'=>'btn btn-primary']);
                                                ?>
                                            </div>
                                                    </div>
                                                    
                                                    </form>

                                                    <!--end::Form-->
                                                </div>

                                                <!--end::Portlet-->
                                            </div>

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

                        <!-- End add modal -->

                        <!-- start EDIT MODAL -->
                        <div class="modal fade lp-theme-modal" id="edit-modal" tabindex="-1" role="dialog" aria-labelledby="modalTitle" aria-hidden="true">
                            <div class="modal-dialog eservice-modal" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="modalTitle"><?php echo $this->lang->line('Edit_HR_E_Service');?></h5>
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
                                                    <?php echo form_open_multipart('admin/hr/store_hr_service',['id'=>'edit-hr']);
                                                    if($data)
                                                    {
                                                        echo form_input(['type' => 'hidden', 'name' => 'id', 'value' => $data->id, 'class' => 'data_id']);
                                                    }
                                                    else
                                                    {
                                                        echo form_hidden('id',''); 
                                                    }
                                                ?>
                                                <?php if($data)
                                                    {
                                                        $value=$data->service_type;
                                                    }
                                                    else
                                                    {
                                                        $value=set_value('service_type');
                                                    } ?>
                                                    <div class="m-portlet__body theme-inner-form">
                                                        <div class="form-field-container">
                                                            <div class="form-group m-form__group row">
                                                                <div class="col-lg-12">
                                                                    <label for="service_type" class=" form-control-label"><?php echo $this->lang->line('Select_service');?></label>
                                                                    <select name="service_type" class="form-control m-bootstrap-select m-bootstrap-select--air m-bootstrap-select--pill m_selectpicker service_type">
                                                                    <option value=""><?php echo $this->lang->line('Select_Request_Type');?></option>
                                                                    <?php foreach(getHrEservice_list() as $list_data) { ?>
                                                                    <option value="<?php echo $list_data['id'] ?>" <?php if($value == $list_data['id']) echo "selected=selected"?>><?php echo $list_data['name'] ?></option>
                                                                    <?php } ?>

                                                                    </select>	
                                                                    <div class="form-error"><?= form_error('service_type'); ?></div>
                                                                </div>
                                                                <div class="col-lg-6">
                                                                <label for="start_date" class=" form-control-label"><?php echo $this->lang->line('Start_Date');?></label>
                                                                    <?php if($data)
                                                                    {
                                                                        $value=$data->start_date;
                                                                    }
                                                                    else
                                                                    {
                                                                        $value=set_value('start_date');
                                                                    } ?>
                                                                    <?= form_input(['name'=>'start_date','id'=>'edit_start_date','class'=>'form-control cd appdate start_date','value'=>$value]);?>
                                                                    <div class="form-error"><?= form_error('start_date'); ?></div>
                                                                </div>
                                                                <div class="col-lg-6">
                                                                <label for="end_date" class=" form-control-label"><?php echo $this->lang->line('End_Date');?></label>
                                                                    <?php if($data)
                                                                    {
                                                                        $value=$data->end_date;
                                                                    }
                                                                    else
                                                                    {
                                                                        $value=set_value('end_date');
                                                                    } ?>
                                                                    <?= form_input(['name'=>'end_date','id'=>'edit_end_date','class'=>'form-control sd appdate end_date','value'=>$value]);?>
                                                                    <div class="form-error"><?= form_error('end_date'); ?></div>
                                                                </div>
                                                                <div class="col-lg-12" style="margin-top: 30px;">
                                                                <label for="reason" class=" form-control-label"><?php echo $this->lang->line('Reason');?></label>
                                                                    <?php if($data)
                                                                    {
                                                                        $value=$data->reason;
                                                                    }
                                                                    else
                                                                    {
                                                                        $value=set_value('reason');
                                                                    } ?>
                                                                    <?= form_input(['name'=>'reason','class'=>'form-control reason','value'=>$value]);?>
                                                                    <div class="form-error"><?= form_error('reason'); ?></div>
                                                                </div>
                                                            </div>
                                                            
                                                        </div>
                                                        <div class="d-flex justify-content-end mt-4">
                                            <button type="button" class="btn btn-secondary mr-2" data-dismiss="modal">
                                                <?php echo $this->lang->line('Cancel');?>
                                            </button>
                                            <?php 
                                                $submit = $this->lang->line('Save_changes');
                                                echo form_submit(['id'=>'editcustomer','value'=>$submit,'class'=>'btn btn-primary']);
                                            ?>
                                        </div>
                                                    </div>
                                                    
                                                    </form>

                                                    <!--end::Form-->
                                                </div>

                                                <!--end::Portlet-->
                                            </div>

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
                        <!-- end edit modal -->

                        <!-- Start view Modal -->
                <div class="modal fade lp-theme-modal" id="view-modal" tabindex="-1" role="dialog" aria-labelledby="modalTitle" aria-hidden="true">
                    <div class="modal-dialog eservice-modal" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="modalTitle"><?php echo $this->lang->line('View_HR_E_Service');?></h5>
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
                                    <?php echo form_open_multipart('admin/hr/store_hr_fine',['id'=>'hr','class'=>'m-form m-form--fit m-form--label-align-right m-form--group-seperator-dashed']);
                                ?>
                                    <div class="m-portlet__body theme-inner-form">
                                        <div class="form-field-container">
                                            <div class="form-group m-form__group row">
                                                <div class="form-group col-sm-12">
                                                    <label for="fine_type" class=" form-control-label"><?php echo $this->lang->line('Service_Type');?></label>
                                                    <div>
                                                        <span class="fine_type"></span>
                                                    </div>
                                                </div>	
                                                <div class="form-group col-sm-6">
                                                    <label for="start_date" class=" form-control-label"><?php echo $this->lang->line('Start_Date');?></label>
                                                    <div>
                                                        <span class="start_date"></span>
                                                    </div>
                                                </div>
                                                    <div class="form-group col-sm-6">
                                                    <label for="end_date" class=" form-control-label"><?php echo $this->lang->line('End_Date');?></label>
                                                    <div>
                                                        <span class="end_date"></span>
                                                    </div>
                                                </div>
                                                <div class="form-group col-sm-12">
                                                    <label for="reason" class=" form-control-label"><?php echo $this->lang->line('Reason');?></label>
                                                    <div>
                                                        <span class="reason" id="reason"></span>
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


        </div>

    </div>

<?php

include('footer.php');
?>

<script type="text/javascript">
    jQuery(document).ready(function($) {
    var table = $('#m_datatable').DataTable();

    // Move the search bar (filter input)
    var searchInput = $('.dataTables_filter');
    searchInput.detach().prependTo('#custom-search-container');

    // Add placeholder to the search input field
    $('.dataTables_filter input').attr('placeholder', 'Search Client, E-Services........');

    $('.editing-modal').click( function(){
        var id = $(this).attr('data-id');
        var data = $(this).find('.appointment_data').data('array');
        $('#edit-modal .data_id').val(id);
        $('#edit-modal .service_type').val(data.service_type).change();
        $('#edit-modal .start_date').val(data.start_date);
        $('#edit-modal .end_date').val(data.end_date);
        $('#edit-modal .reason').val(data.reason);
    });

    $('.view-modal').click( function(){
        var id = $(this).attr('data-id');
        var data = $('.editing-modal[data-id="' + id + '"]').find('.appointment_data').data('array');
        var serviceType = '';
        $('#edit-modal .service_type option').each(function() {
            if ($(this).val() == data.service_type) {
                serviceType = $(this).text();
            }
        });
        $('#view-modal .fine_type').text(serviceType);
        $('#view-modal .start_date').text(data.start_date);
        $('#view-modal .end_date').text(data.end_date);
        $('#view-modal .reason').text(data.reason);
        $('#view-modal .status').text(data.status);
        
    });


});


$(".deleteservices").click(function() {
    var id = $(this).attr("id");
    var url = "<?= base_url('admin/hr/delete_hr_service'); ?>";
    

    bootbox.confirm("Are you sure?", function(result) {
        if (result) {
            $.ajax({
                type: 'ajax',
                method: 'post',
                url: url,
                data: { "id": id },
                dataType: 'json',

                success: function(data) {
                    $('#msg').show();
                    $('#msg').html(data);
                },
            });

            $('.hide' + id).hide(200);
            return true;
        } else {
            $('#msg').show();
            $('#msg').html('Delete Failed');
        }
    });
});

$(document).ready(function() {
    $('#addcustomer').click(function(e) {
        e.preventDefault(); // Prevent default form submission

        var formData = new FormData($('#hr')[0]); // Collect form data including files

        $.ajax({
            url: "<?php echo site_url('admin/hr/store_hr_service'); ?>",
            type: 'POST',
            data: formData,
            dataType: 'json', // Expecting a JSON response
            processData: false, // Don't process the data
            contentType: false, // Don't set content type
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
                console.log(error); // Log errors if needed
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

    $('#add_end_date').on('change', function() {
    var startDate = $('#add_start_date').val();
    var endDate = $(this).val();

    // Check if both start and end dates are valid
    if (startDate && endDate) {
        if (endDate < startDate) {
            
            // Optionally, clear the end_date input field to force the user to correct it
            $(this).val('');
        } else {
            // If the validation passes, clear any previous error message
            var $errorDiv = $(this).closest('.col-lg-6').find('.form-error');
            $errorDiv.html('');
        }
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
    $('#editcustomer').on('click', function(e) {
        e.preventDefault();
        var formData = new FormData($('#edit-hr')[0]); // Serialize form data

        $.ajax({
            url: "<?php echo site_url('admin/hr/store_hr_service'); ?>",
            type: 'POST',
            data: formData,
            dataType: 'json', // Expecting a JSON response
            processData: false, // Don't process the data
            contentType: false, // Don't set content type
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
                alert("An error occurred. Please try again.");
            }
        });
    });

    $('#edit_end_date').on('change', function() {
    var startDate = $('#edit_start_date').val();
    var endDate = $(this).val();

    // Check if both start and end dates are valid
    if (startDate && endDate) {
        if (endDate < startDate) {
            
            // Optionally, clear the end_date input field to force the user to correct it
            $(this).val('');
        } else {
            // If the validation passes, clear any previous error message
            var $errorDiv = $(this).closest('.col-lg-6').find('.form-error');
            $errorDiv.html('');
        }
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