<?php
include('header.php');

?>
<style>
   #add-client-modal .m-portlet__body.theme-inner-form {
        margin-top: 0;
        padding-top: 10px !important;
    }

    #add-client-modal .modal-header {
        padding-bottom: 0 !important;
    }

    #add-client-modal .modal-body {
        padding-left: 0 !important;
        padding-right: 0 !important;
    }
    #add-client-modal .bootstrap-select .dropdown-toggle .caret {
        right: unset;
    }
</style>

    <div class="m-grid__item m-grid__item--fluid m-wrapper">

        <!-- END: Subheader -->
        <div class="m-content">

<div id="msg" class="sufee-alert alert with-close alert-success alert-dismissible fade show success" style="display:none;"></div>
            <!--begin::Portlet-->
            <div class="m-portlet lp-theme-card bg-transparent">
            <div id="custom-search-container"></div>
                <div class="m-portlet__head">
                    <div class="m-portlet__head-caption">
                    <!-- <div class="m-portlet__head-title">
                            <h3 class="m-portlet__head-text">
                            <?php echo $this->lang->line('List_Customers');?>
                            </h3>
                        </div> -->
                        <div class="theme-new-nav-menu">
                            <ul style="gap:30px">
                                <li class="active"> <a href="http://lexport.demosbywpsqr.com/admin/customer/list_customer"><?php echo $this->lang->line('All_Clients');?></a> </li>
                                <li> <a href="http://lexport.demosbywpsqr.com/admin/admin/block_list"><?php echo $this->lang->line('Blocked_Clients');?></a> </li>
                                <!-- <li> <a href="http://lexport.demosbywpsqr.com/admin/mission_writings/list_mission">Writing</a> </li>
                                <li> <a href="http://lexport.demosbywpsqr.com/admin/mission_consultation/list_mission">Consultation</a> </li>
                                <li> <a href="http://lexport.demosbywpsqr.com/admin/mission_visiting/list_mission">Meeting</a> </li>
                                <li> <a href="http://lexport.demosbywpsqr.com/admin/mission_general/list_mission">General</a> </li>
                                <li> <a href="http://lexport.demosbywpsqr.com/admin/assignment">Assignment</a> </li>
                                <li> <a href="http://lexport.demosbywpsqr.com/admin/archive/list_archive">Archives</a> </li>
                                <li> <a href="http://lexport.demosbywpsqr.com/admin/admin/audio_list">Audio Record</a> </li>
                                <li> <a href="http://lexport.demosbywpsqr.com/admin/admin/list_note">Note List</a> </li> -->
                            </ul>
                            
                            <a style="color:#fff !important" class="btn btn-primary add-client-modal" data-target="#add-client-modal" data-toggle="modal">
                                <?php echo $this->lang->line('Add_New_Client'); ?>
                            </a>
                        </div>
                    </div>
                </div>

                <div class="m-portlet__body">
						<div class="m_datatable m-datatable m-datatable--default m-datatable--loaded" style="">

                        <div class="table-responsive">
                        <table class="lp-theme-table lp-large-theme dataTable no-footer " id="m_datatable" role="grid" aria-describedby="m_datatable_info">
                            <thead>
                           <tr class="netTr" style="text-align:left;">
                                <th class="sortable"><?php echo $this->lang->line('Serial_No');?>
                                <img class="sortIcon" src="../../assets/images/img/unfold_more.svg" height="18px">
                            </th>
                                <th class="sortable"><?php echo $this->lang->line('Name');?>
                                <img class="sortIcon" src="../../assets/images/img/unfold_more.svg" height="18px">
                            </th> 
                                <th class="sortable"><?php echo $this->lang->line('E_Service_Name');?>
                                <img class="sortIcon" src="../../assets/images/img/unfold_more.svg" height="18px">
                            </th>
                                <th class="sortable"><?php echo $this->lang->line('Contract_No');?>
                                <img class="sortIcon" src="../../assets/images/img/unfold_more.svg" height="18px">
                            </th>
                                <th class="sortable"><?php echo $this->lang->line('E_Service_No');?>
                                <img class="sortIcon" src="../../assets/images/img/unfold_more.svg" height="18px">
                            </th>
                                <th class="sortable" style="text-align:left;"><?php echo $this->lang->line('Client_File_No');?>
                                <img class="sortIcon" src="../../assets/images/img/unfold_more.svg" height="18px">
                            </th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>
                                <?php 
                                $count = 0; 
                                foreach ($list_customer as $list_customer) {   
                                    $count++;
                                    $serial_number = sprintf("#%02d", $count);
                                    
                                    // Find first contract number for this customer from $case_list
                                    $first_contract_no = '';
                                    foreach ($case_list as $case) {
                                        if ($case['customers_id'] == $list_customer['customers_id']) {
                                            $first_contract_no = $case['contract_number']; 
                                            $first_eservice_no = $case['case_number'];
                                            break;
                                        }
                                    }
                                ?>
                                    <tr style="text-align: left;" class="hide<?php echo $list_customer['id'] ?>">
                                        <td data-sort="<?= $count - 1 ?>"><?= $serial_number ?></td>
                                        <td>
                                            <?= strlen($list_customer['client_name']) > 20 
                                                ? substr($list_customer['client_name'], 0, 20) . '...' 
                                                : $list_customer['client_name'] ?>
                                        </td>

                                        <td><?php echo getCustomerCaseServices($list_customer['customers_id']); ?></td>
                                        <td><?= $first_contract_no ?></td> <!-- Display first contract number -->
                                        <td><?= $first_eservice_no ?></td>
                                        <td style="text-align:left;"><?= $list_customer['client_file_number'] ?></td>
                                        <td>
                                            <a href="<?= base_url("admin/customer/view_customer/{$list_customer['id']}") ?>">
                                                <span class="arrow_img" style="background: #1866a9; border-radius: 100%; align-items: center; display: inline-block; padding: 1px;">
                                                    
                                                    <img class="icon-dir-ltr" src="<?= base_url('assets/images'); ?>/img/arrow_right.svg" width="25px" height="25px" alt="arrow">
                                                    <img class="icon-dir-rtl" src="<?= base_url('assets/images'); ?>/img/arrow_left1.svg" width="25px" height="25px" alt="arrow">
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
                                <?php } ?>
                                </tbody>

                        </table>
                        </div>
                    


                </div>


                <!-- Start Create Invoice Modal -->
                <div class="modal fade lp-theme-modal" id="add-client-modal" tabindex="-1" role="dialog" aria-labelledby="modalTitle" aria-hidden="true">
                        <div class="modal-dialog invoice-list-modal" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="modalTitle"><?php echo $this->lang->line('Add_Customer');?></h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        
                                        <svg width="17" height="17" viewBox="0 0 17 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path opacity="0.5" fill-rule="evenodd" clip-rule="evenodd" d="M0.39988 0.803673C0.656 0.54763 1.00333 0.403793 1.36548 0.403793C1.72763 0.403793 2.07496 0.54763 2.33108 0.803673L8.19434 6.66693L14.0576 0.803673C14.1836 0.673228 14.3343 0.56918 14.5009 0.497602C14.6676 0.426023 14.8468 0.388346 15.0281 0.38677C15.2095 0.385194 15.3893 0.419751 15.5572 0.488423C15.725 0.557095 15.8775 0.658508 16.0057 0.786744C16.134 0.91498 16.2354 1.06747 16.3041 1.23532C16.3727 1.40317 16.4073 1.58301 16.4057 1.76436C16.4041 1.94571 16.3665 2.12492 16.2949 2.29155C16.2233 2.45818 16.1192 2.60889 15.9888 2.73487L10.1255 8.59813L15.9888 14.4614C16.2376 14.719 16.3753 15.064 16.3721 15.4221C16.369 15.7802 16.2254 16.1227 15.9722 16.376C15.7189 16.6292 15.3764 16.7728 15.0183 16.7759C14.6602 16.779 14.3152 16.6414 14.0576 16.3926L8.19434 10.5293L2.33108 16.3926C2.07349 16.6414 1.7285 16.779 1.3704 16.7759C1.01229 16.7728 0.669742 16.6292 0.416517 16.376C0.163291 16.1227 0.0196542 15.7802 0.0165424 15.4221C0.0134306 15.064 0.151093 14.719 0.39988 14.4614L6.26314 8.59813L0.39988 2.73487C0.143837 2.47875 0 2.13143 0 1.76927C0 1.40712 0.143837 1.05979 0.39988 0.803673Z" fill="#1B2A39"/>
                                        </svg>

                                    </button>
                                </div>
                                <div class="modal-body">
                                    <div class="m-portlet__body theme-inner-form">
                                        <!--begin::Form-->
                                                <form class="m-form m-form--fit m-form--label-align-right m-form--group-seperator-dashed" enctype="multipart/form-data" method="post" accept-charset="utf-8">
                                            <?php echo form_hidden('id',''); ?>

                                                    <div class="m-portlet__body theme-inner-form">
                                                    
                                                        <div class="form-field-container">
                                                        <h3><?php echo $this->lang->line('Customer_Information');?></h3>
                                                            <div class="form-group m-form__group row">
                                                                <div class="col-lg-4">
                                                                    <?php if($data)
                                                                    {
                                                                        $value=set_value('type_of_customer',$data->type_of_customer);
                                                                    }
                                                                    else
                                                                    {
                                                                        $value=set_value('type_of_customer');
                                                                    } ?>
                                                                    <label class=""><?php echo $this->lang->line('Types_Of_Customer');?>*</label>
                                                                    <select name="type_of_customer" class="form-control m-bootstrap-select m-bootstrap-select--air m-bootstrap-select--pill m_selectpicker" id="exampleSelect1">
                                                                        <option value=""><?php echo $this->lang->line('Please_select_Customer_Type');?></option>
                                                                        <option value="Individuals"<?php if($value=='Individuals') echo "selected=selected";?>><?php echo $this->lang->line('Individuals');?></option>
                                                                        <option value="Establishment"<?php if($value=='Establishment') echo "selected=selected";?>><?php echo $this->lang->line('Establishment');?></option>
                                                                        <option value="a_company"<?php if($value=='a_company') echo "selected=selected";?>><?php echo $this->lang->line('a_company');?></option>
                                                                        <option value="Governments"<?php if($value=='Governments') echo "selected=selected";?>><?php echo $this->lang->line('Governments');?></option>
                                                                        <option value="organization"<?php if($value=='organization') echo "selected=selected";?>><?php echo $this->lang->line('organization');?></option>
                                                                        <option value="other"<?php if($value=='other') echo "selected=selected";?>><?php echo $this->lang->line('Other');?></option>
                                                                    </select>
                                                                    <div class="form-error"><?= form_error('type_of_customer'); ?></div>
                                                                </div>
                                                                <div class="col-lg-4">
                                            <?php if($data)
                                            {
                                                echo $value=set_value('client_status',$data->client_status);
                                            }
                                            else
                                            {
                                                $value=set_value('client_status');
                                            } ?>
                                                                    <label class=""><?php echo $this->lang->line('client_status');?>*</label>
                                                                    <select name="client_status" class="form-control m-bootstrap-select m-bootstrap-select--air m-bootstrap-select--pill m_selectpicker" id="exampleSelect1">
                                                    <option value=""><?php echo $this->lang->line('Please_Select_Client_Status');?></option>
                                                    <option value="active"<?php if($value=='active') echo "selected=selected";?>><?php echo $this->lang->line('Active');?></option>
                                                    <option value="inactive"<?php if($value=='inactive') echo "selected=selected";?>><?php echo $this->lang->line('Inactive');?></option>
                                                    <option value="close"<?php if($value=='close') echo "selected=selected";?>><?php echo $this->lang->line('Close');?></option>
                                                    <option value="other" <?php if($value=='close') echo "selected=selected";?>><?php echo $this->lang->line('Other');?></option>
                                                                    </select>
                                                                </div>
                                                                <div class="col-lg-4">
                                                                    <label><?php echo $this->lang->line('client_File_number');?>*</label>
                                                                            <?php if($data)
                                            {
                                                $value=$data->client_file_number;
                                            }
                                            else
                                            {
                                                $value=set_value('client_file_number');
                                            } ?>
                                            <?= form_input(['name'=>'client_file_number','class'=>'form-control m-input','value'=>$value,'required'=>'required']);?>
                                            <div class="form-error"><?= form_error('client_file_number'); ?></div> 
                                                                </div>
                                            <div class="col-lg-4">
                                            <?php if($data)
                                            {
                                                $value=set_value('branch',$data->branch);
                                            }

                                            else
                                            {
                                                $value=set_value('branch');
                                            } ?>
                                            <label class=""><?php echo $this->lang->line('branch');?>*</label>
                                            <select name="branch" class="form-control m-bootstrap-select m-bootstrap-select--air m-bootstrap-select--pill m_selectpicker" id="exampleSelect1" required>
                                            <option value=""><?php echo $this->lang->line('Please_select_branch');?></option>
                                            <?php foreach(branch() as $branch) { ?>
                                            <option value="<?= $branch['id']; ?>"<?php if($value==$branch['id']) echo "selected=selected";?>><?= $branch['name']; ?></option>
                                            <?php } ?>
                                            </select>
                                            <div class="form-error"><?= form_error('branch'); ?></div>

                                        </div>
                                        <div class="col-lg-4">
                                            <label for="identification_number" class=" form-control-label"><?php echo $this->lang->line('identification_number');?>*</label>
                                            <?php if($data)
                                            {
                                                $value=set_value('identification_number',$data->identification_number);
                                            }
                                            else
                                            {
                                                $value=set_value('identification_number');
                                            } ?>
                                            <?= form_input(['name'=>'identification_number','id'=>'id_numbers','class'=>'form-control m-input','value'=>$value,'required'=>'required']);?>  
                                            <div class="form-error"><?= form_error('identification_number'); ?></div>
                                        </div>
                                                                
                                                                <div class="col-lg-4">
                                                                <label for="identification_types" class=" form-control-label"><?php echo $this->lang->line('identification_types');?>*</label>
                                                                    <?php if($data)
                                                                {
                                                                    $value=set_value('identification_types',$data->identification_types);
                                                                }
                                                                else
                                                                {
                                                                    $value=set_value('identification_types');
                                                                } ?>
                                                                <select name="identification_types" class="form-control m-bootstrap-select m-bootstrap-select--air m-bootstrap-select--pill m_selectpicker" id="exampleSelect1" required>
                                                                    <option value=""><?php echo $this->lang->line('Please_Select_Identification_Types');?></option>
                                                                    <option value="CR"<?php if($value=="CR") echo "selected=selected";?>><?php echo $this->lang->line('CR');?></option>
                                                                    <option value="National_id"<?php if($value=="National_id") echo "selected=selected";?>><?php echo $this->lang->line('National_ID');?></option>
                                                                    <option value="Aqama"<?php if($value=="Aqama") echo "selected=selected";?>><?php echo $this->lang->line('Aqama');?></option>
                                                                    <option value="Governmental"<?php if($value=="Governmental") echo "selected=selected";?>><?php echo $this->lang->line('Governmental');?></option>
                                                                    <option value="other"<?php if($value=="other") echo "selected=selected";?>><?php echo $this->lang->line('Other');?></option>
                                                                
                                                                </select>
                                                                
                                                                <?php echo form_input(['name'=>'other_identification_types','id'=>'other_identification_types','class'=>'form-control', 'style'=>'display:none;']); ?><div class="form-error"><?= form_error('identification_types'); ?></div>
                                                                
                                                                </div>
                                                                <div class="col-lg-4">
                                                                    <label><?php echo $this->lang->line('client_full_name');?>*</label>
                                    
                                                                        <?php if($data)
                                            {
                                                $value=set_value('client_name',$data->client_name);
                                            }
                                            else
                                            {
                                                $value=set_value('client_name');
                                            } ?>
                                            <?= form_input(['name'=>'client_name','id'=>'name','class'=>'form-control m-input','value'=>$value,'required'=>'required']);?>
                                            <div class="form-error"><?= form_error('client_name'); ?></div>
                                                                </div>
                                                                <div class="col-lg-4">
                                                                    <label class=""><?php echo $this->lang->line('Nationality');?>*</label>
                                                                    <?php if($data)
                                            {
                                                $value=set_value('nationality',$data->nationality);
                                            }
                                            else
                                            {
                                                $value=set_value('nationality');
                                            } ?>
                                            <select name="nationality" class="form-control m-bootstrap-select m-bootstrap-select--air m-bootstrap-select--pill m_selectpicker" id="nationality"   >
                                            <option value=""><?php echo $this->lang->line('Select_country');?></option>
                                            <?php  foreach($countries as $country) { ?>
                                            <option value="<?= $country->id; ?>" <?php if($value==$country->id)echo "selected=selected"; ?> ><?= $country->name; ?></option>
                                            <?php } ?>
                                            </select>
                                                    
                                            <div class="form-error"><?= form_error('nationality'); ?></div>
                                                                    
                                            </div>
                                                                <div class="col-lg-4">
                                                                
                                
                                            <label for="gender" class=" form-control-label"><?php echo $this->lang->line('Gender');?>*</label>
                                            <?php if($data)
                                            {
                                                $value=set_value('gender',$data->gender);
                                            }
                                            else
                                            {
                                                $value=set_value('gender');
                                            } ?>
                                            <select name="gender" class="form-control m-bootstrap-select m-bootstrap-select--air m-bootstrap-select--pill m_selectpicker" id="exampleSelect1">
                                                <option value=""><?php echo $this->lang->line('Please_Select_Gender');?></option>
                                                <option value="Male"<?php if($value=="Male")echo "selected=selected"; ?>><?php echo $this->lang->line('Male');?></option>
                                                <option value="Female"<?php if($value=="Female")echo "selected=selected"; ?>><?php echo $this->lang->line('Female');?></option>
                                <option value="Other"<?php if($value=="Other") echo "selected=selected"; ?>><?php echo $this->lang->line('Other');?></option>

                                            </select><div class="form-error"><?= form_error('gender'); ?></div>
                                                                </div>
                                                            </div>

                                                        </div>


                                                    
                                                        <div class="form-field-container">
                                                        <h3><?php echo $this->lang->line('Customer_address');?></h3>
                                                            <div class="form-group m-form__group row">
                                        <div class="form-group col-lg-4">
                                            <label for="street_name" class=" form-control-label"><?php echo $this->lang->line('Street_name');?></label>
                                            <?php if($data)
                                            {
                                                $value=set_value('street_name',$data->street_name);
                                            }
                                            else
                                            {
                                                $value=set_value('street_name');
                                            } ?>
                                            <?= form_input(['name'=>'street_name','class'=>'form-control m-input','value'=>$value]);?>
                                            <div class="form-error"><?= form_error('street_name'); ?></div>
                                        </div>

                                        <div class="form-group col-lg-4">
                                            <label for="building_number" class=" form-control-label"><?php echo $this->lang->line('building_number');?></label>
                                            <?php if($data)
                                            {
                                                $value=set_value('building_number',$data->building_number);
                                            }
                                            else
                                            {
                                                $value=set_value('building_number');
                                            } ?>
                                            <?= form_input(['name'=>'building_number','class'=>'form-control m-input','value'=>$value]);?>
                                            <div class="form-error"><?= form_error('building_number'); ?></div>
                                        </div>

                                        <div class="form-group col-lg-4">
                                            <label for="district" class=" form-control-label"><?php echo $this->lang->line('district');?></label>
                                            <?php if($data)
                                            {
                                                $value=set_value('district',$data->district);
                                            }
                                            else
                                            {
                                                $value=set_value('district');
                                            } ?>
                                            <?= form_input(['name'=>'district','class'=>'form-control m-input','value'=>$value]);?>
                                            <div class="form-error"><?= form_error('district'); ?></div>
                                        </div>

                                                            <div class="form-group col-sm-4">
                                            <label for="country" class=" form-control-label"><?php echo $this->lang->line('Country');?>*</label>
                                            <?php
                                            if($data)
                                            {
                                                $value=set_value('country',$data->country);
                                            }
                                            else
                                            {
                                                $value=set_value('country');
                                            } ?>
                                            <select name="country" id="country" class="form-control m-bootstrap-select m-bootstrap-select--air m-bootstrap-select--pill m_selectpicker">
                                            <option value=""><?php echo $this->lang->line('Select_country');?></option>
                                            <?php  foreach($countries as $country) { ?>
                                            <option data-id="<?= $country->id; ?>" value="<?= $country->name; ?>" <?php if($country->name == $value) echo "selected";?>><?= $country->name; ?></option>
                                            <?php } ?>
                                            </select>
                                            <div class="form-error"><?= form_error('country'); ?></div>
                                        </div>
                                        <div class="form-group col-sm-4">
                                            <label for="city" class=" form-control-label"><?php echo $this->lang->line('State');?>*</label>
                                            <?php if($data)
                                            {
                                                $value=set_value('state',$data->state);
                                            }
                                            else
                                            {
                                                $value=set_value('state');
                                            } ?>
                                        <select name="state" id="state" class="form-control m-bootstrap-select m-bootstrap-select--air m-bootstrap-select--pill m_selectpicker" >
                                    <option  data-sid="<?= $country->id; ?>" value="<?php echo $value ?>"><?php 
                                    if($value) echo getStateByID($value); else{ echo "Select Option";}; ?></option>
                                </select>
                                            <div class="form-error"><?= form_error('city'); ?></div>
                                        </div>
                                        <div class="form-group col-sm-4">
                                            <label for="city" class=" form-control-label"><?php echo $this->lang->line('City');?>*</label>
                                            <?php if($data)
                                            {
                                                $value=set_value('city',$data->city);
                                            }
                                            else
                                            {
                                                $value=set_value('city');
                                            } ?>
                                            <select name="city" id="city" class="form-control m-bootstrap-select m-bootstrap-select--air m-bootstrap-select--pill m_selectpicker">
                                                <option value="<?php echo $value ?>"><?php  if($value) echo getCityByID($value); else{ echo "Select Option";};  ?></option>
                                            </select>
                                            <div class="form-error"><?= form_error('city'); ?></div>
                                        </div>
                                                            </div>
                                                        </div>

                                                    
                                                        <div class="form-field-container">
                                                        <h3><?php echo $this->lang->line('Postal_Address');?></h3>
                                                            <div class="form-group m-form__group row">
                                                            <div class="form-group col-sm-6">
                                            <label for="po_box" class=" form-control-label"><?php echo $this->lang->line('PO_Box');?></label>
                                            <?php if($data)
                                            {
                                                $value=set_value('po_box',$data->po_box);
                                            }
                                            else
                                            {
                                                $value=set_value('po_box');
                                            } ?>
                                            <?= form_input(['name'=>'po_box','class'=>'form-control m-input','value'=>$value]);?>
                                            <div class="form-error"><?= form_error('po_box'); ?></div>
                                        </div>

                                        <div class="form-group col-sm-6">
                                            <label for="postal_code" class=" form-control-label"><?php echo $this->lang->line('Postal_Code');?></label>
                                            <?php if($data)
                                            {
                                                $value=set_value('postal_code',$data->postal_code);
                                            }
                                            else
                                            {
                                                $value=set_value('postal_code');
                                            } ?>
                                            <?= form_input(['name'=>'postal_code','class'=>'form-control m-input','value'=>$value]);?>
                                            <div class="form-error"><?= form_error('postal_code'); ?></div>
                                        </div>

                                        
                                <div class="form-group col-sm-12">
                                            <label for="work_address" class=" form-control-label"><?php echo $this->lang->line('Work_Address');?></label>
                                            <?php if($data)
                                            {
                                                $value=set_value('work_address',$data->work_address);
                                            }
                                            else
                                            {
                                                $value=set_value('work_address');
                                            } ?>
                                            <?= form_textarea(['name'=>'work_address','class'=>'form-control m-input','cols'=>5,'rows'=>5,'value'=>$value]);?>
                                            <div class="form-error"><?= form_error('work_address'); ?></div>
                                        </div>
                                                                
                                                            </div>
                                                        </div>

                                                    
                                                        <div class="form-field-container">
                                                        <h3><?php echo $this->lang->line('Wasell_Address');?></h3>
                                                            <div class="form-group m-form__group row">
                                                                <div class="form-group col-sm-4">
                                            <label for="building_number" class=" form-control-label"><?php echo $this->lang->line('building_numbers');?></label>
                                            <?php if($data)
                                            {
                                                $value=set_value('building_number',$data->building_number);
                                            }
                                            else
                                            {
                                                $value=set_value('building_number');
                                            } ?>
                                            <?= form_input(['name'=>'building_number','class'=>'form-control m-input','value'=>$value]);?>
                                            <div class="form-error"><?= form_error('building_number'); ?></div>
                                        </div>

                                        <div class="form-group col-sm-4">
                                            <label for="street_name" class=" form-control-label"><?php echo $this->lang->line('Street_Name');?></label>
                                            <?php if($data)
                                            {
                                                $value=set_value('street_name',$data->street_name);
                                            }
                                            else
                                            {
                                                $value=set_value('street_name');
                                            } ?>
                                            <?= form_input(['name'=>'street_name','class'=>'form-control m-input','value'=>$value]);?>
                                            <div class="form-error"><?= form_error('street_name'); ?></div>
                                        </div>

                                        <div class="form-group col-sm-4">
                                            <label for="unit_number" class=" form-control-label"><?php echo $this->lang->line('Unit_Number');?></label>
                                            <?php if($data)
                                            {
                                                $value=set_value('unit_number',$data->unit_number);
                                            }
                                            else
                                            {
                                                $value=set_value('unit_number');
                                            } ?>
                                            <?= form_input(['name'=>'unit_number','class'=>'form-control m-input','value'=>$value]);?>
                                            <div class="form-error"><?= form_error('unit_number'); ?></div>
                                        </div>

                                        <div class="form-group col-sm-4">
                                            <label for="extra_number" class=" form-control-label"><?php echo $this->lang->line('Extra_Number');?></label>
                                            <?php if($data)
                                            {
                                                $value=set_value('extra_number',$data->extra_number);
                                            }
                                            else
                                            {
                                                $value=set_value('extra_number');
                                            } ?>
                                            <?= form_input(['name'=>'extra_number','class'=>'form-control m-input','value'=>$value]);?>
                                            <div class="form-error"><?= form_error('extra_number'); ?></div>
                                        </div>

                                        <div class="form-group col-sm-4">
                                            <label for="district" class=" form-control-label"><?php echo $this->lang->line('district');?></label>
                                            <?php if($data)
                                            {
                                                $value=set_value('district',$data->district);
                                            }
                                            else
                                            {
                                                $value=set_value('district');
                                            } ?>
                                            <?= form_input(['name'=>'district','class'=>'form-control m-input','value'=>$value]);?>
                                            <div class="form-error"><?= form_error('district'); ?></div>
                                        </div>
                                
                                                            </div>
                                                        </div>

                                                        <div class="form-field-container">
                                                            <h3><?php echo $this->lang->line('Contact_Numbers');?></h3>
                                                            <div class="form-group m-form__group row">
                                                                <div class="form-group col-sm-6">
                                            <?php if($data)
                                            {
                                                $value=set_value('contact_type',$data->contact_type);
                                            }
                                            else
                                            {
                                                $value=set_value('contact_type');
                                            } ?>
                                            <label for="select_contact_type" class=" form-control-label"><?php echo $this->lang->line('Select_Contact_Type');?>*</label>
                                            <select name="contact_type" id="contact_type" class="form-control m-bootstrap-select m-bootstrap-select--air m-bootstrap-select--pill m_selectpicker">
                                                <option value=""><?php echo $this->lang->line('Please_select_type');?></option>
                                                <option value="Mobile"<?php if($value=='Mobile') echo "selected=selected"; ?>><?php echo $this->lang->line('Mobile');?></option>
                                                <option value="Business_Phone"<?php if($value=='Business_Phone') echo "selected=selected"; ?>><?php echo $this->lang->line('Business_phone');?></option>
                                                <option value="Home_Phone"<?php if($value=='Home_Phone') echo "selected=selected"; ?>><?php echo $this->lang->line('Home_phone');?></option>
                                                <option value="Fax"<?php if($value=='Fax') echo "selected=selected"; ?>><?php echo $this->lang->line('Fax');?></option>
                                                <option value="Other"<?php if($value=='Other') echo "selected=selected"; ?>><?php echo $this->lang->line('Other');?></option>
                                        
                                            </select>
                                        </div>
                                        <div class="form-group col-sm-6">
                                            <label for="contact_number" class=" form-control-label"><?php echo $this->lang->line('Contact_Number');?>*</label>
                                            <?php if($data)
                                            {
                                                $value=set_value('contact_number',$data->contact_number);
                                            }
                                            else
                                            {
                                                $value=set_value('contact_number');
                                            } ?>
                                            <?= form_input(['name'=>'contact_number','class'=>'form-control m-input','value'=>$value]);?>
                                            <div class="form-error"><?= form_error('contact_number'); ?></div>
                                        </div>
                                        <div class="clear"></div>
                                        <div class="form-group col-sm-6">
                                            <?php if($data)
                                            {
                                                $value=set_value('contact_type1',$data->contact_type1);
                                            }
                                            else
                                            {
                                                $value=set_value('contact_type1');
                                            } ?>
                                            <label for="select_contact_type" class=" form-control-label"><?php echo $this->lang->line('Select_Contact_Type');?></label>
                                            <select name="contact_type1" id="contact_type1" class="form-control m-bootstrap-select m-bootstrap-select--air m-bootstrap-select--pill m_selectpicker">
                                                <option value=""><?php echo $this->lang->line('Please_select_type');?></option>
                                                <option value="Mobile"<?php if($value=='Mobile') echo "selected=selected"; ?>><?php echo $this->lang->line('Mobile');?></option>
                                                <option value="Business_Phone"<?php if($value=='Business_Phone') echo "selected=selected"; ?>><?php echo $this->lang->line('Business_phone');?></option>
                                                <option value="Home_Phone"<?php if($value=='Home_Phone') echo "selected=selected"; ?>><?php echo $this->lang->line('Home_phone');?></option>
                                                <option value="Fax"<?php if($value=='Fax') echo "selected=selected"; ?>><?php echo $this->lang->line('Fax');?></option>
                                                <option value="Other"<?php if($value=='Other') echo "selected=selected"; ?>><?php echo $this->lang->line('Other');?></option>
                                        
                                            </select>
                                        </div>
                                        <div class="form-group col-sm-6">
                                            <label for="contact_number1" class=" form-control-label"><?php echo $this->lang->line('Contact_Number');?></label>
                                            <?php if($data)
                                            {
                                                $value=set_value('contact_number1',$data->contact_number1);
                                            }
                                            else
                                            {
                                                $value=set_value('contact_number1');
                                            } ?>
                                            <?= form_input(['name'=>'contact_number1','class'=>'form-control m-input','value'=>$value]);?>
                                            <div class="form-error"><?= form_error('contact_number1'); ?></div>
                                        </div>
                                        <div class="clear"></div>
                                        <div class="form-group col-sm-6">
                                            <?php if($data)
                                            {
                                                $value=set_value('contact_type2',$data->contact_type2);
                                            }
                                            else
                                            {
                                                $value=set_value('contact_type2');
                                            } ?>
                                            <label for="select_contact_type2" class=" form-control-label"><?php echo $this->lang->line('Select_Contact_Type');?></label>
                                            <select name="contact_type2" id="contact_type2" class="form-control m-bootstrap-select m-bootstrap-select--air m-bootstrap-select--pill m_selectpicker" >
                                                <option value=""><?php echo $this->lang->line('Please_select_type');?></option>
                                                <option value="Mobile"<?php if($value=='Mobile') echo "selected=selected"; ?>><?php echo $this->lang->line('Mobile');?></option>
                                                <option value="Business_Phone"<?php if($value=='Business_Phone') echo "selected=selected"; ?>><?php echo $this->lang->line('Business_phone');?></option>
                                                <option value="Home_Phone"<?php if($value=='Home_Phone') echo "selected=selected"; ?>><?php echo $this->lang->line('Home_phone');?></option>
                                                <option value="Fax"<?php if($value=='Fax') echo "selected=selected"; ?>><?php echo $this->lang->line('Fax');?></option>
                                                <option value="Other"<?php if($value=='Other') echo "selected=selected"; ?>><?php echo $this->lang->line('Other');?></option>
                                        
                                            </select>
                                                
                                        
                                        </div>
                                        <div class="form-group col-sm-6">
                                            <label for="contact_number2" class=" form-control-label"><?php echo $this->lang->line('Contact_Number');?></label>
                                            <?php if($data)
                                            {
                                                $value=set_value('contact_number2',$data->contact_number2);
                                            }
                                            else
                                            {
                                                $value=set_value('contact_number2');
                                            } ?>
                                            <?= form_input(['name'=>'contact_number2','class'=>'form-control m-input','value'=>$value]);?>
                                            <div class="form-error"><?= form_error('contact_number2'); ?></div>
                                        </div>
                                        <div class="clear"></div>
                                        <div class="form-group col-sm-6">
                                            <?php if($data)
                                            {
                                                $value=set_value('contact_type3',$data->contact_type3);
                                            }
                                            else
                                            {
                                                $value=set_value('contact_type3');
                                            } ?>
                                            <label for="select_contact_type3" class=" form-control-label"><?php echo $this->lang->line('Select_Contact_Type');?></label>
                                            <select name="contact_type3" id="contact_type3" class="form-control m-bootstrap-select m-bootstrap-select--air m-bootstrap-select--pill m_selectpicker">
                                                <option value=""><?php echo $this->lang->line('Please_select_type');?></option>
                                                <option value="Mobile"<?php if($value=='Mobile') echo "selected=selected"; ?>><?php echo $this->lang->line('Mobile');?></option>
                                                <option value="Business_Phone"<?php if($value=='Business_Phone') echo "selected=selected"; ?>><?php echo $this->lang->line('Business_phone');?></option>
                                                <option value="Home_Phone"<?php if($value=='Home_Phone') echo "selected=selected"; ?>><?php echo $this->lang->line('Home_phone');?></option>
                                                <option value="Fax"<?php if($value=='Fax') echo "selected=selected"; ?>><?php echo $this->lang->line('Fax');?></option>
                                                <option value="Other"<?php if($value=='Other') echo "selected=selected"; ?>><?php echo $this->lang->line('Other');?></option>
                                        
                                            </select>
                                            
                                        </div>
                                        <div class="form-group col-sm-6">
                                            <label for="contact_number3" class=" form-control-label"><?php echo $this->lang->line('Contact_Number');?></label>
                                            <?php if($data)
                                            {
                                                $value=set_value('contact_number3',$data->contact_number3);
                                            }
                                            else
                                            {
                                                $value=set_value('contact_number3');
                                            } ?>
                                            <?= form_input(['name'=>'contact_number3','class'=>'form-control m-input','value'=>$value]);?>
                                            <div class="form-error"><?= form_error('contact_number3'); ?></div>
                                        </div>
                                            <div class="col-lg-6">
                                                <label><?php echo $this->lang->line('Customer_image');?>*</label>
                                                <div class="custom-file">
                                                <?= form_upload(['name'=>'customer_image','class'=>'form-control m-input custom-file-input','value'=>$value]);?>
                                                        
                                                    <label class="custom-file-label" for="customFile"><?php echo $this->lang->line('Choose_file');?></label>
                                                </div>
                                            </div>
                                    
                                        <div class="form-group col-sm-12">
                                            <label for="notes" class=" form-control-label"><?php echo $this->lang->line('Note');?>*</label>
                                            <?php if($data)
                                            {
                                                $value=set_value('notes',$data->notes);
                                            }
                                            else
                                            {
                                                $value=set_value('notes');
                                            } ?>
                                            <?= form_textarea(['name'=>'notes','class'=>'form-control m-input','rows'=>5,'cols'=>5,'value'=>$value]);?>
                                            <div class="form-error"><?= form_error('notes'); ?></div>
                                        </div>
                                                            </div>
                                                        </div>
                                                        <button type="submit" class="btn btn-primary"><?php echo $this->lang->line('Submit');?></button>
                                                    </div>
                                                
                                                </form>

                                                <!--end::Form-->

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                        <!-- End Create Invoice modal -->


            </div>


        </div>

    </div>

<?php

include('footer.php');

?>

<script type="text/javascript">
$(function(){
//$('.assign_case').click(function(){
$("#m_datatable").on("click", ".assign_case", function() {
var id=$(this).attr("id");
var msg= $('#note_dialog').html();
var url="<?= base_url('admin/customer/assign_customer'); ?>"; 
bootbox.confirm('<select class="form-control" id="employee_id" name="user_id"><option>Select employee </option><?php  foreach ($employees as$employee) { ?><option value="<?php echo $employee["id"]?>"><?php echo $employee["name"]?></option><?php } ?></select><label class="nterr1" style="color:red"></label> <br> <textarea name="nnote" class="form-control" placeholder="Note*"  id="nnote"></textarea> <label class="nterr" style="color:red"></label>', function(result){
if(result){ 	 var nnote=$('#nnote').val();

var  empid = $('#employee_id :selected').val();
if(empid =='Select employee'){
	$('.nterr1').html('Employee is required');
	return false;
}
if(nnote==''){
	$('.nterr').html('Note is required');
	return false;
}
    $.ajax({
    type:'ajax',
    method:'post',
    url:url,
    data:{"id" : id,'empid':empid, "nnote":nnote},
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
});
</script>
 <script type="text/javascript">
$("#m_datatable").on("click", ".delete_customer", function() {
  var id=$(this).attr("id");
  var url="<?=base_url('admin/customer/delete_customer');?>";
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
       if(data ==  1){
           $('#msg').html('<?php echo $this->lang->line('Delete_all_service'); ?>');
       }else{
           $('.hide'+id).hide(200);
           $('#msg').html('<?php echo $this->lang->line('customer_delete_successfully'); ?>');
       }
        
      },
  });

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

<script type="text/javascript">

$(document).ready(function()
{
  $('#msg').hide();

$("#country").change(function()
{
  var id= $('option:selected', this).data('id');
 
  var url="<?= base_url('admin/admin/country_list'); ?>"; 

  $.ajax({
    type:'ajax',
    method:'post',
    url:url,
    data:{"id" : id},
    dataTyppe: 'json',
  
    success:function(data){
			
          $('#state').html('');
          $('#state').append(data);
		  jQuery('select').selectpicker('refresh');

      },
  });
 
return true;
 });
$("#state").change(function()
{
  var id= $('option:selected', this).data('sid');

  var url="<?= base_url('admin/admin/city_list'); ?>"; 

  $.ajax({
    type:'ajax',
    method:'post',
    url:url,
    data:{"id" : id},
    dataTyppe: 'json',
  
    success:function(data){
			
          $('#city').html('');
          $('#city').append(data);
		  jQuery('select').selectpicker('refresh');

      },
  });
 
return true;
 });
});
    
</script>