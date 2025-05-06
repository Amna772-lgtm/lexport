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

.modal .fine-modal{
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
                                <?php echo $this->lang->line('Fine');?>
                            </h3>
                        </div> -->
                        <div class="theme-new-nav-menu">
                            <h3 class="m-portlet__title" style="margin-right: 70px; font-size:24px !important;">
                                <?php echo $this->lang->line('HR_Services');?>
                            </h3>
                            <ul style="gap: 30px;">
                                <!-- <li> <a href="http://lexport.demosbywpsqr.com/admin/employee/list_employee">HR</a> </li> -->
                                <li> <a href="http://lexport.demosbywpsqr.com/admin/hr/list_hr_eservice"><?php echo $this->lang->line('e-services');?></a> </li>
                                <li class="active"> <a href="http://lexport.demosbywpsqr.com/admin/hr/list_hr_fine"><?php echo $this->lang->line('Fine');?></a> </li>
                                <li> <a href="http://lexport.demosbywpsqr.com/admin/employee/list_employee"><?php echo $this->lang->line('Employees');?></a> </li>
                                <!-- <li> <a href="http://lexport.demosbywpsqr.com/admin/finance">Financial</a> </li> -->
                                <!-- <li> <a href="http://lexport.demosbywpsqr.com/admin/finance/transaction">Transaction</a> </li> -->
                            </ul>

                            <a class="btn btn-primary" href="<?=base_url('admin/hr/add_hr_fine');?>" data-toggle="modal" data-target="#add-modal"> <i class="fa fa-plus"></i> <?php echo $this->lang->line('Create_New_Fine');?></a>
                        </div>
                    </div>
                </div>


                <div class="m-portlet__body">

                    <div class="m_datatable m-datatable m-datatable--default m-datatable--loaded" style="">

                    <div class="table-responsive">
                                    <table class="lp-theme-table lp-large-theme" id="m_datatable">
                            <thead>
                            <tr class="netTr" style="text-align: left;">

                                <th class="sortable"><?php echo $this->lang->line('Serial_No');?>
                                <img class="sortIcon" src="../../assets/images/img/unfold_more.svg" height="18px">
                            </th>
                                <th class="sortable"><?php echo $this->lang->line('Employee_Name');?>
                                <img class="sortIcon" src="../../assets/images/img/unfold_more.svg" height="18px">
                            </th>
                                <th class="sortable"><?php echo $this->lang->line('Fine_Type');?>
                                <img class="sortIcon" src="../../assets/images/img/unfold_more.svg" height="18px">
                            </th>
                                <th class="sortable"><?php echo $this->lang->line('Date');?>
                                <img class="sortIcon" src="../../assets/images/img/unfold_more.svg" height="18px"></th>
                                <th class="sortable"><?php echo $this->lang->line('Reason');?>
                                <img class="sortIcon" src="../../assets/images/img/unfold_more.svg" height="18px">
                            </th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>
  <?php $count=1;
                       foreach($data as $Padding_cus) { ?>
                       <tr class="hide<?= $Padding_cus['id']; ?>" style="text-align: left;">
                       <?php $serial_number = sprintf("#%03d", $count++); ?>
                       <td data-sort="<?= $count - 1 ?>"><?= $serial_number ?></td>
                        <td><?= getEmployeeName($Padding_cus['user_id']) ?></td>
                        <td><?= getFineName($Padding_cus['fine_type']) ?></td>
                        <td><?php echo getTheDayAndDateFromDatePan($Padding_cus['start_date']);?></td>
                        <td><?= $Padding_cus['reason'] ?></td>
						<?php   if($this->session->userdata('role_id') == 1){ ?>
						<td class="action">
                        <a data-target="#view-modal" class="view-modal" data-toggle="modal" data-id="<?= $Padding_cus['id'] ?>" title="<?php echo $this->lang->line('View');?>">
                            <img src="<?= base_url('assets/images/img/eye-solid.svg') ?>" alt="View" class="img-eye">
                        </a>
						<a data-target="#edit-modal" class="edit-modal" data-toggle="modal" data-id="<?= $Padding_cus['id'] ?>"  title="<?php echo $this->lang->line('Edit_Fine');?>" id=<?= $Padding_cus['id'] ?>>
                            <div style="display:none" class="appointment_data" data-array='<?php echo json_encode( $Padding_cus ); ?>'></div>
                            <img src="<?= base_url('assets/images/img/pen-solid.svg') ?>" alt="Edit" class="img-pen">
                        </a>
						 <a href="javascript:;" class="fa fa-trash deleteservices" id='<?= $Padding_cus['id']; ?>' title="<?php echo $this->lang->line('Delete_Fine');?>"> </td>
						</td> 
						<?php } ?>
                      </tr>
				<?php } ?> 
                            </tbody>
                        </table>

                        <!-- Start Add Modal -->
                        <div class="modal fade lp-theme-modal" id="add-modal" tabindex="-1" role="dialog" aria-labelledby="modalTitle" aria-hidden="true">
                            <div class="modal-dialog fine-modal" role="document">
                                <div class="modal-content ">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="modalTitle"><?php echo $this->lang->line('Add_New_Fine');?></h5>
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
                                            if($data)
                                                {
                                                    echo form_hidden('id',$data->id); 
                                                }
                                                else
                                                {
                                                    echo form_hidden('id',''); 
                                                }
                                            ?>
                                                        <div class="m-portlet__body theme-inner-form">
                                                        <div class="form-field-container">
                                                            <div class="form-group m-form__group row">
                                                                <div class="form-group col-sm-6">
                                                <?php if($data)
                                                {
                                                    $value=$data->user_id;
                                                }
                                                else
                                                {
                                                    $value=set_value('user_id');
                                                } ?>
                                                <label for="fine_type" class=" form-control-label"><?php echo $this->lang->line('Employee_Name');?></label>
                                                <select id="clientsel" class="form-control" name="user_id">
                                                    <option value=""><?php echo $this->lang->line('Select_Employee');?></option>
                                                    <?php 
                                                    $c  = isset($_POST['clients'])?$_POST['clients']:'';  
                                                    $t  = isset($_POST['cases'])?$_POST['cases']:'';  
                                                    foreach ($get_per_clients as $get_per_client) {?>
                                                    <option value="<?php echo $get_per_client['id']?>" <?php if($value==$get_per_client['id']) echo "selected=selected";?>><?php echo $get_per_client['name']?></option>
                                                    <?php }?>
                                                    </select>
                                                                <div class="form-error"><?= form_error('user_id'); ?></div>
                                            </div>	
                                            <div class="form-group col-sm-6">
                                                <?php if($data)
                                                {
                                                    $value=$data->fine_type;
                                                }
                                                else
                                                {
                                                    $value=set_value('fine_type');
                                                } ?>
                                                <label for="fine_type" class=" form-control-label"><?php echo $this->lang->line('Fine_Type');?></label>
                                                <select name="fine_type" class="form-control"  >
                                                    <option value=""><?php echo $this->lang->line('Select_fine_type');?></option>
                                                    <?php foreach(getFine_list() as $list_data) { ?>
                                                        <option value="<?php echo $list_data['id'] ?>" <?php if($value == $list_data['id']) echo "selected=selected"?>><?php echo $list_data['name'] ?></option>
                                                    <?php } ?>
                                                    
                                                </select>
                                                            <div class="form-error"><?= form_error('fine_type'); ?></div>
                                            </div>
                                                <div class="form-group col-sm-6">
                                                <label for="start_date" class=" form-control-label"><?php echo $this->lang->line('Date');?></label>
                                                <?php if($data)
                                                {
                                                    $value=$data->start_date;
                                                }
                                                else
                                                {
                                                    $value=set_value('start_date');
                                                } ?>
                                                <?= form_input(['name'=>'start_date','id'=>'start_date','readonly'=>'readonly','class'=>'form-control appdate','value'=>$value]);?>
                                                <div class="form-error"><?= form_error('start_date'); ?></div>
                                            </div>
                                            <div class="form-group col-sm-12">
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

                        <!-- Start edit Modal -->
                        <div class="modal fade lp-theme-modal" id="edit-modal" tabindex="-1" role="dialog" aria-labelledby="modalTitle" aria-hidden="true">
                            <div class="modal-dialog fine-modal" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="modalTitle"><?php echo $this->lang->line('Edit_Fine');?></h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            
                                            <svg width="17" height="17" viewBox="0 0 17 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path opacity="0.5" fill-rule="evenodd" clip-rule="evenodd" d="M0.39988 0.803673C0.656 0.54763 1.00333 0.403793 1.36548 0.403793C1.72763 0.403793 2.07496 0.54763 2.33108 0.803673L8.19434 6.66693L14.0576 0.803673C14.1836 0.673228 14.3343 0.56918 14.5009 0.497602C14.6676 0.426023 14.8468 0.388346 15.0281 0.38677C15.2095 0.385194 15.3893 0.419751 15.5572 0.488423C15.725 0.557095 15.8775 0.658508 16.0057 0.786744C16.134 0.91498 16.2354 1.06747 16.3041 1.23532C16.3727 1.40317 16.4073 1.58301 16.4057 1.76436C16.4041 1.94571 16.3665 2.12492 16.2949 2.29155C16.2233 2.45818 16.1192 2.60889 15.9888 2.73487L10.1255 8.59813L15.9888 14.4614C16.2376 14.719 16.3753 15.064 16.3721 15.4221C16.369 15.7802 16.2254 16.1227 15.9722 16.376C15.7189 16.6292 15.3764 16.7728 15.0183 16.7759C14.6602 16.779 14.3152 16.6414 14.0576 16.3926L8.19434 10.5293L2.33108 16.3926C2.07349 16.6414 1.7285 16.779 1.3704 16.7759C1.01229 16.7728 0.669742 16.6292 0.416517 16.376C0.163291 16.1227 0.0196542 15.7802 0.0165424 15.4221C0.0134306 15.064 0.151093 14.719 0.39988 14.4614L6.26314 8.59813L0.39988 2.73487C0.143837 2.47875 0 2.13143 0 1.76927C0 1.40712 0.143837 1.05979 0.39988 0.803673Z" fill="#1B2A39"/>
                                            </svg>

                                        </button>
                                    </div>
                                    <div class="modal-body">
                                    <div class="m-grid__item m-grid__item--fluid m-wrapper" style="padding-left:unset;">

                                        <!-- END: Subheader -->
                                        <div class="m-content">

                                            <!--begin::Portlet-->
                                            <div class="m-portlet lp-theme-card bg-transparent">
                                                <div class="m-portlet__head">
                                                </div>

                                                <!--begin::Form-->
                                            <?php echo form_open_multipart('admin/hr/store_hr_fine',['id'=>'edit-fine-modal','class'=>'m-form m-form--fit m-form--label-align-right m-form--group-seperator-dashed']);
                                                echo form_input(['type' => 'hidden', 'name' => 'id', 'value' => $data->id, 'class' => 'data_id']); 
                                        ?>
                                                    <div class="m-portlet__body theme-inner-form">
                                                    <div class="form-field-container">
                                                        <div class="form-group m-form__group row">
                                                            <div class="form-group col-sm-6">
                                            <?php if($data)
                                            {
                                                $value=$data->user_id;
                                            }
                                            else
                                            {
                                                $value=set_value('user_id');
                                            } ?>
                                            <label for="fine_type" class=" form-control-label"><?php echo $this->lang->line('Employee_Name');?></label>
                                            <select id="clientsel" class="form-control clientsel" name="user_id">
                                                <option value=""><?php echo $this->lang->line('Select_Employee');?></option>
                                                <?php 
                                                $c  = isset($_POST['clients'])?$_POST['clients']:'';  
                                                $t  = isset($_POST['cases'])?$_POST['cases']:'';  
                                                foreach ($get_per_clients as $get_per_client) {?>
                                                <option value="<?php echo $get_per_client['id']?>"><?php echo $get_per_client['name']?></option>
                                                <?php }?>
                                                </select>
                                                            <div class="form-error"><?= form_error('user_id'); ?></div>
                                        </div>	
                                        <div class="form-group col-sm-6">
                                            <?php if($data)
                                            {
                                                $value=$data->fine_type;
                                            }
                                            else
                                            {
                                                $value=set_value('fine_type');
                                            } ?>
                                            <label for="fine_type" class=" form-control-label"><?php echo $this->lang->line('Fine_Type');?></label>
                                            <select name="fine_type" class="form-control fine_type"  >
                                                <option value=""><?php echo $this->lang->line('Select_fine_type');?></option>
                                                <?php foreach(getFine_list() as $list_data) { ?>
                                                    <option value="<?php echo $list_data['id'] ?>" <?php if($value == $list_data['id']) echo "selected=selected"?>><?php echo $list_data['name'] ?></option>
                                                <?php } ?>
                                                
                                            </select>
                                                        <div class="form-error"><?= form_error('fine_type'); ?></div>
                                        </div>
                                            <div class="form-group col-sm-6">
                                            <label for="start_date" class=" form-control-label"><?php echo $this->lang->line('Date');?></label>
                                            <?php if($data)
                                            {
                                                $value=$data->start_date;
                                            }
                                            else
                                            {
                                                $value=set_value('start_date');
                                            } ?>
                                            <?= form_input(['name'=>'start_date','id'=>'start_date','readonly'=>'readonly','class'=>'form-control appdate start_date','value'=>$value]);?>
                                            <div class="form-error"><?= form_error('start_date'); ?></div>
                                        </div>
                                        <div class="form-group col-sm-12">
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
                                    <!-- <div class="modal-footer">
                                        <div class="modal-btn-group">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                            <button type="button" class="btn btn-primary">Save</button>
                                        </div>
                                    </div> -->
                                </div>
                            </div>
                        </div>

                        <!-- End edit modal -->

                        
                        
                    </div>
                    
                    
                </div>
                <!-- Start view Modal -->
                <div class="modal fade lp-theme-modal" id="view-modal" tabindex="-1" role="dialog" aria-labelledby="modalTitle" aria-hidden="true">
                    <div class="modal-dialog fine-modal" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="modalTitle"><?php echo $this->lang->line('View_Fine');?></h5>
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
                                                    <div class="form-group col-sm-6">
                                                    <label for="fine_type" class=" form-control-label"><?php echo $this->lang->line('Employee_Name');?></label>
                                                    <div>
                                                        <span class="clientsel"></span>
                                                    </div>
                                                </div>	
                                                <div class="form-group col-sm-6">
                                                    <label for="fine_type" class=" form-control-label"><?php echo $this->lang->line('Fine_Type');?></label>
                                                    <div>
                                                        <span class="fine_type"></span>
                                                    </div>
                                                </div>
                                                    <div class="form-group col-sm-12">
                                                    <label for="start_date" class=" form-control-label"><?php echo $this->lang->line('Date');?></label>
                                                    <div>
                                                        <span class="start_date"></span>
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
                                <div class="d-flex justify-content-end mt-4">
                                <button type="button" class="btn btn-primary open-edit-modal" data-id="">
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

<?php

include('footer.php');

?>

<script type="text/javascript">

	$(document).ready(function() {
	   $('#msg').hide();
	  //$('#customers-table').DataTable();
	} );

    $(".deleteservices").click(function()
{
  var id=$(this).attr("id");
  var url="<?= base_url('admin/hr/delete_hr_fine'); ?>"; 
bootbox.confirm("Are you sure?", function(result){
if(result){
  $.ajax({
    type:'ajax',
    method:'post',
    url:url,
    data:{"id" : id},
    dataTyppe: 'json',
  
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
	$('#msg').html('Delete Failed');
}
})
 });

	

jQuery(document).ready(function($) {
    var table = $('#m_datatable').DataTable();

    // Move the search bar (filter input)
    var searchInput = $('.dataTables_filter');
    searchInput.detach().prependTo('#custom-search-container');

    // Add placeholder to the search input field
    $('.dataTables_filter input').attr('placeholder', 'Search Client, E-Services........');
    $('.edit-modal').click( function(){
        var id = $(this).attr('data-id');
        var data = $(this).find('.appointment_data').data('array');        
        $('#edit-modal .data_id').val(id);
        $('#edit-modal #clientsel').val(data.user_id);
        $('#edit-modal .fine_type').val(data.fine_type);
        $('#edit-modal .reason').val(data.reason);
        $('#edit-modal .start_date').val(data.start_date);
    });

    $('.view-modal').click( function(){
        var id = $(this).attr('data-id');

        var data = $('.edit-modal[data-id="' + id + '"]').find('.appointment_data').data('array');
        var userId = '';
        var fineType = '';
        $('#edit-modal .clientsel option').each(function() {
            if ($(this).val() == data.user_id) {
                userId = $(this).text();
            }
        });
        $('#edit-modal .fine_type option').each(function() {
            if ($(this).val() == data.fine_type) {
                fineType = $(this).text();
            }
        });
        $('#view-modal .clientsel').text(userId);
        $('#view-modal .fine_type').text(fineType);
        $('#view-modal .reason').text(data.reason);
        $('#view-modal .start_date').text(data.start_date);

        //Set the same data-id to the edit button inside the view modal
    $('#view-modal .open-edit-modal').attr('data-id', id);

    });
});

$(document).ready(function() {
    // For both add and edit modals
    $('#addcustomer').click(function(e) {
        e.preventDefault(); // Prevent default form submission

        var formData = new FormData($('#hr')[0]); // Collect form data including files

        $.ajax({
            url: "<?php echo site_url('admin/hr/store_hr_fine'); ?>", // The same URL for both add and edit
            type: 'POST',
            data: formData,
            dataType: 'json', // Expecting a JSON response
            processData: false, // Don't process the data
            contentType: false, // Don't set content type
            success: function(response) {
                if (response.status == 'success') {
                    // Close the modal and refresh on success
                    $('#add-modal').modal('hide');
                    location.reload(); // Refresh to reflect changes
                } else if (response.status == 'error') {
                    // Show errors only for fields that have errors
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

                    // Remove error messages for fields that are now valid
                    $('input, select').each(function() {
                        var fieldName = $(this).attr('name');
                        if (!response.errors[fieldName]) {
                            $(this).next('.form-error').html('');
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

$(document).ready(function() {
    $('.open-edit-modal').on('click', function() {
        // Get the data from the view modal
        const employeeName = $('#view-modal .clientsel').text().trim();
        const fineTypeText = $('#view-modal .fine_type').text().trim();
        const date = $('#view-modal .start_date').text().trim();
        const reason = $('#view-modal .reason').text().trim();

        // ✅ Get data-id from the clicked edit button
        const dataId = $(this).attr('data-id');

        // ✅ Set hidden input value in edit modal
        $('#edit-modal .data_id').val(dataId);

        // Set input values
        $('#edit-modal input[name="start_date"]').val(date);
        $('#edit-modal input[name="reason"]').val(reason);

        // Match and set employee name
        $('#edit-modal #clientsel option').each(function() {
            if ($(this).text() === employeeName) {
                $('#edit-modal #clientsel').val($(this).val()).trigger('change');
                return false;
            }
        });

        // Match and set fine type
        $('#edit-modal .fine_type option').each(function() {
            if ($(this).text() === fineTypeText) {
                $('#edit-modal .fine_type').val($(this).val()).trigger('change');
                return false;
            }
        });

        // Show edit modal
        $('#view-modal').modal('hide');
        $('#edit-modal').modal('show');
    });
});



$(document).ready(function() {
    // For both add and edit modals
    $('#editcustomer').click(function(e) {
        debugger;
        e.preventDefault(); // Prevent default form submission

        var formData = new FormData($('#edit-fine-modal')[0]); // Collect form data including files

        $.ajax({
            url: "<?php echo site_url('admin/hr/store_hr_fine'); ?>", // The same URL for both add and edit
            type: 'POST',
            data: formData,
            dataType: 'json', // Expecting a JSON response
            processData: false, // Don't process the data
            contentType: false, // Don't set content type
            success: function(response) {
                if (response.status == 'success') {
                    // Close the modal and refresh on success
                    $('#edit-modal').modal('hide');
                    location.reload(); // Refresh to reflect changes
                } else if (response.status == 'error') {
                    // Show errors only for fields that have errors
                    $.each(response.errors, function(field, error) {
                        var $input = $('[name="' + field + '"]');

                        if ($input.length > 0) {
                            // Check if it's a select input
                            if ($input.is('select')) {
                                // For select fields, find the nearest error div within the form-group
                                $input.closest('.form-group').find('.form-error').html(error);
                            } else {
                                // For input fields, find the next error div after the input
                                $input.closest('.form-group').find('.form-error').html(error);
                            }
                        }
                    });

                    // Remove error messages for fields that are now valid
                    $('input, select').each(function() {
                        var fieldName = $(this).attr('name');
                        if (!response.errors[fieldName]) {
                            $(this).closest('.form-group').find('.form-error').html(''); // Clear error
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
        var $errorDiv = $input.closest('.form-group').find('.form-error');
        if ($errorDiv.length > 0) {
            $errorDiv.html(''); // Clear the error message when the user modifies the field
        }
    });
});


</script>

