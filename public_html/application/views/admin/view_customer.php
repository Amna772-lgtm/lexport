<?php
include('header.php');

$new_service_number = getCaseNumber(0);
?>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.bootcdn.net/ajax/libs/bootbox.js/5.5.2/bootbox.min.js"></script>

    <style>
        .m-form.m-form--fit .m-form__content, .m-form.m-form--fit .m-form__heading, .m-form.m-form--fit .m-form__group {
            padding-left: 0px;
            padding-right: 0px;
        }
        #add-service-modal .modal-dialog.add-service-modal{
            max-width: 1000px;
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
					<div class="m-portlet__head-caption">
					<!-- <div class="m-portlet__head-title">
							<h3 class="m-portlet__head-text">
								<?php echo $this->lang->line( 'Visiting' ); ?>
							</h3>
						</div> -->
					<div class="theme-new-nav-menu justify-content-between">
							<div class="d-flex">
								<a class="back-link" href="<?= base_url("admin/customer/list_customer") ?>">
									<svg width="16" height="14" viewBox="0 0 16 14" fill="none" xmlns="http://www.w3.org/2000/svg">
										<path fill-rule="evenodd" clip-rule="evenodd" d="M7.70679 13.7006C7.51926 13.888 7.26495 13.9934 6.99979 13.9934C6.73462 13.9934 6.48031 13.888 6.29279 13.7006L0.292786 7.70057C0.105315 7.51304 0 7.25874 0 6.99357C0 6.72841 0.105315 6.4741 0.292786 6.28657L6.29279 0.286571C6.48139 0.104413 6.73399 0.00361876 6.99619 0.00589718C7.25838 0.0081756 7.5092 0.113345 7.6946 0.298753C7.88001 0.484161 7.98518 0.734973 7.98746 0.99717C7.98974 1.25937 7.88894 1.51197 7.70679 1.70057L3.41379 5.99357H14.9998C15.265 5.99357 15.5194 6.09893 15.7069 6.28646C15.8944 6.474 15.9998 6.72835 15.9998 6.99357C15.9998 7.25879 15.8944 7.51314 15.7069 7.70068C15.5194 7.88821 15.265 7.99357 14.9998 7.99357H3.41379L7.70679 12.2866C7.89426 12.4741 7.99957 12.7284 7.99957 12.9936C7.99957 13.2587 7.89426 13.513 7.70679 13.7006Z" fill="#333333"/>
									</svg>
									Back</a>
									<h3 class="m-portlet__title" style="font-size:24px !important;">
										<?php echo $this->lang->line('Client_Details');?>
									</h3>
								</div>
								<div>
									<a class="btn btn-primary assign_case" href="javascript:;" id="<?= $data->id ?>" > <i class="fa fa-plus"></i> <?php echo $this->lang->line('Assign_File');?></a>
									<a class="btn btn-primary add_eservice" href="#" data-toggle="modal" data-target="#add-service-modal" data-id="<?= $data->customers_id ?>"> <i class="fa fa-plus"></i> <?php echo $this->lang->line('Create_New_Service');?></a>
								</div>
							</div>
							
					</div>
				</div>
				<div class="m-portlet__body">
					<!--begin::Form-->
					<form class="m-form m-form--fit m-form--label-align-right m-form--group-seperator-dashed">
						<div class="row">
							<div class="col-lg-3">
								<div class="form-field-container detail-content-box client-info-box">
									<h3><?php echo $data->client_name;?> <small><?php echo $data->client_file_number;?></small></h3>

									<div class="client-info-box-head">
										<a class="btn btn-primary" href="<?= base_url("admin/customer/manage/{$data->id}") ?>">
											<?php echo $this->lang->line('Edit');?>
											<svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
											<path d="M11.5733 1.59788C11.7578 1.40686 11.9785 1.2545 12.2225 1.14968C12.4665 1.04486 12.7289 0.989688 12.9945 0.98738C13.2601 0.985073 13.5234 1.03568 13.7692 1.13624C14.015 1.2368 14.2383 1.38531 14.4261 1.57309C14.6139 1.76088 14.7624 1.98418 14.8629 2.22997C14.9635 2.47577 15.0141 2.73913 15.0118 3.00468C15.0095 3.27024 14.9543 3.53268 14.8495 3.77669C14.7447 4.0207 14.5923 4.24139 14.4013 4.42588L13.6083 5.21888L10.7803 2.39088L11.5733 1.59788ZM9.3663 3.80488L0.987305 12.1839V15.0119H3.8153L12.1953 6.63288L9.3663 3.80488Z" fill="white"/>
											</svg>
										</a>


									</div>

									<div class="client-info-box-body">
										<ul>
											<li><b><?php echo $this->lang->line('Service_info');?></b></li>
											<li><?php echo $this->lang->line('Identification_Numbers');?> <b><?php echo $data->identification_number;?></b> </li>
											<li><?php echo $this->lang->line('branch');?> <b><?php echo getBranchName($data->branch);?></b> </li>
											<li><?php echo $this->lang->line('City');?> <b><?php if($data->city){ echo getCityByID($data->city); } ?></b> </li>
											<li><?php echo $this->lang->line('Date');?> <b><?php  $date= date("d/m/Y", strtotime($data->createdate)); echo getTheDayAndDateFromDatePan($date); ?></b> </li>
											<br>
											<li><b><?php echo $this->lang->line('contact');?></b></li>
											<li><?php echo $this->lang->line('Phone');?> <b><?php echo $data->contact_number;?></b> </li>
											<li><?php echo $this->lang->line('Mail');?><b><?php echo $user['email'];?></b> </li>
										</ul>
									</div>
						
								</div>
							</div>
							<div class="col-lg-9">
								<div class="form-field-container detail-content-box client-info-box">
									<div class="client-services-box-head">
										<h3><?php echo $this->lang->line('All_Services');?></h3>
										<!-- <ul>
											<li class="active"> <a href="#">All</a> </li>
											<li> <a href="#">Pending</a> </li>
											<li> <a href="#">Completed</a> </li>
											<li> <a href="#">Overdue</a> </li>
										</ul> -->
									</div>

									<div class="client-services-box-body">
										<div class="client-service-table">
											<h4><?php echo $this->lang->line('E_SERVICES_LIST');?></h4>
											<table>
												<tbody>
												<?php foreach ($case_list as $case){ ?>
													<tr>
														<td></td>
														<td>
															<?php echo $this->lang->line('E_Service_No');?> <b><?= $case['case_number'] ?></b>
														</td>
														<td>
															<?php echo $this->lang->line('Name');?> <b><?= $case['client_name'] ?></b>
														</td>
														<td>
															<?php echo $this->lang->line('E_Service_Name');?> <b><?= getServiceType($case['service_types']) ?></b>
														</td>
														<td>
															<?php echo $this->lang->line('Contract_No');?> <b><?= $case['contract_number'] ?></b>
														</td>
														<td>
															<a href="<?= base_url("admin/c_case/view_case/{$case['id']}"); ?>" class="btn" title="">
																<svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
																<circle cx="10" cy="10" r="10" fill="#1866A9"/>
																<path d="M5.75 9.875C5.75 10.3723 5.55246 10.8492 5.20083 11.2008C4.84919 11.5525 4.37228 11.75 3.875 11.75C3.37772 11.75 2.90081 11.5525 2.54917 11.2008C2.19754 10.8492 2 10.3723 2 9.875C2 9.37772 2.19754 8.90081 2.54917 8.54918C2.90081 8.19754 3.37772 8 3.875 8C4.37228 8 4.84919 8.19754 5.20083 8.54918C5.55246 8.90081 5.75 9.37772 5.75 9.875ZM11.375 9.875C11.375 10.3723 11.1775 10.8492 10.8258 11.2008C10.4742 11.5525 9.99728 11.75 9.5 11.75C9.00272 11.75 8.52581 11.5525 8.17418 11.2008C7.82254 10.8492 7.625 10.3723 7.625 9.875C7.625 9.37772 7.82254 8.90081 8.17418 8.54918C8.52581 8.19754 9.00272 8 9.5 8C9.99728 8 10.4742 8.19754 10.8258 8.54918C11.1775 8.90081 11.375 9.37772 11.375 9.875ZM15.125 11.75C15.6223 11.75 16.0992 11.5525 16.4508 11.2008C16.8025 10.8492 17 10.3723 17 9.875C17 9.37772 16.8025 8.90081 16.4508 8.54918C16.0992 8.19754 15.6223 8 15.125 8C14.6277 8 14.1508 8.19754 13.7992 8.54918C13.4475 8.90081 13.25 9.37772 13.25 9.875C13.25 10.3723 13.4475 10.8492 13.7992 11.2008C14.1508 11.5525 14.6277 11.75 15.125 11.75Z" fill="white"/>
																</svg>
															</a>
														</td>
													</tr> <?php } ?>
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
            </div>

            <!--end::Portlet-->
        </div>
    </div>


	<!--Start Add  Modal -->
	<div class="modal fade lp-theme-modal" id="add-service-modal" tabindex="-1" role="dialog" aria-labelledby="modalTitle" aria-hidden="true">
                    <div class="modal-dialog add-service-modal" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="modalTitle">Add New Service</h5>
                                
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
                                <?php echo $this->lang->line('ADD_E_SERVICES');?>
                            </h3>
                        </div>
                    </div> -->
                </div>

                <!--begin::Form-->
				<?php 
					$customer_id = isset($data->customers_id) ? $data->customers_id : 0;
					echo form_open_multipart("admin/c_case/add_case/$customer_id",['enctype'=>'multipart/form-data','accept-charset'=>'utf-8', 'method'=>'POST','id'=>'actionForm','class'=>'m-form m-form--fit m-form--label-align-right m-form--group-seperator-dashed']);
					$doc_id = 'DI' . mt_rand(1000000000, 9999999999);
					$value=set_value('case_date',date('d/m/Y'));
					echo form_hidden('case_date',$value);
					?>
					<input type="hidden" name="doc_id" value="<?php echo $doc_id; ?>">

					<?php  
					$id=$data->customers_id; 	
					$case_id=$data->customers_id;
					?>
					<div class="row">
						<div class="col-lg-9">
							<div class="m-portlet__body theme-inner-form">
								<div class="form-field-container">
									<div class="d-flex justify-content-between align-items-center">
										<h3><?php echo $this->lang->line('Customer_Information');?></h3>

										<!-- Save Button (Aligned to the Right) -->
										<?php $submit = $this->lang->line('Create'); ?>
										<?= form_submit(['id' => 'addcustomer', 'value' => $submit, 'class' => 'btn btn-primary btn-lg']); ?>
									</div>

									<div class="form-group m-form__group row">
										<div class="form-group col-sm-3">
											<label for="identification_number" class=" form-control-label"><?php echo $this->lang->line('ID');?></label>
											<?php if($data)
											{
												$value=$data->identification_number;
												$doc_id = $data->doc_id; 
											}
											else
											{
												$value=set_value('identification_number');
												$doc_id = "DI".rand();
												echo form_hidden('doc_id',$doc_id); 
											} ?>
											<?= form_input(['name'=>'identification_number','id'=>'id_numbers','class'=>'form-control m-input','value'=>$value]);?>
											<div class="form-error"><?= form_error('identification_number'); ?></div>
										</div>
										<div class="form-group col-sm-3">
											<label for="identification_types" class=" form-control-label"><?php echo $this->lang->line('identification_types');?></label>
												<?php if($data)
											{
												$value=$data->identification_types;
											}
											else
											{
												$value=set_value('identification_types');
											} ?>
											<?= form_input(['name'=>'identification_types','id'=>'identification_types','class'=>'form-control m-input','value'=>$value,"readonly"=>"readonly"]);?>
											<div class="form-error"><?= form_error('identification_types'); ?></div>
										</div>
										<div class="form-group col-sm-3">
											<label for="client_file_number" class=" form-control-label"><?php echo $this->lang->line('client_File_number');?></label>
										
											<?php 
											$readonly = '';
											if($data)
												{
													$value=$data->client_file_number;
												}
												else if(isset($id)){
												
													$value = "CU".str_pad($id, 6, "0", STR_PAD_LEFT);  
													$readonly = 'readonly';
												}
												else
												{
													$value=set_value('client_file_number');
												} ?>
											<?= form_input(['name'=>'client_file_number','class'=>'form-control m-input','value'=>$value,'readonly'=>'readonly']);?>
											<div class="form-error"><?= form_error('client_file_number'); ?></div>
										</div>
										<div class="form-group col-sm-3">
											<label for="client_name" class=" form-control-label"><?php echo $this->lang->line('client_full_name');?></label>
											<?php if($data)
											{
												$value=$data->client_name;
											}
											else
											{
												$value=set_value('client_name');
											} ?>
											<?= form_input(['name'=>'client_name','id'=>'name','id'=>'name','class'=>'form-control m-input','value'=>$value]);?>
											<div class="form-error"><?= form_error('client_name'); ?></div>
										</div>
									</div>
								</div>
							</div>
							<div class="m-portlet__body theme-inner-form">
								<div class="form-field-container">
									<h3><?php echo $this->lang->line('E-Service_Information');?></h3>
									<div class="form-group m-form__group row">
										<div class="form-group col-sm-4">
											<label for="branch" class=" form-control-label"><?php echo $this->lang->line('branch');?></label>
											<?php if($data)
											{
												$value=$data->branch;
											}

											else
											{
											echo	$value=set_value('branch');
											} ?>
											<select name="branch" id="branch" class="form-control m-bootstrap-select m-bootstrap-select--air m-bootstrap-select--pill m_selectpicker" required>
											<option value=""><?php echo $this->lang->line('Please_select_branch');?></option>
											<?php foreach(branch() as $branch) { ?>
											<option value="<?= $branch['id']; ?>"<?php if($value==$branch['id']) echo "selected=selected";?>><?= $branch['name']; ?></option>
											<?php } ?>
											</select>
											<div class="form-error"><?= form_error('branch'); ?></div>
										</div>
										<div class="form-group col-sm-4">
											<?php if($data)
												{
													$value=$data->service_types;
												}
												else
												{
													$value=set_value('service_types');
												} ?>
												<label for="service_types" class="form-control-label"><?php echo $this->lang->line('Select_E_Service_Name');?></label>
												<select name="service_types" id="service_types" class="form-control m-bootstrap-select m-bootstrap-select--air m-bootstrap-select--pill m_selectpicker"   >
													<option value=""><?php echo $this->lang->line('Select_E_Service_Name');?></option>					
													<?php foreach($service as $s) { ?>
													<option value="<?= $s['id']; ?>" <?php if($value==$s['id']) echo "selected=selected";?>><?php if($this->session->userdata('admin_site_lang')=="arabic" OR $this->session->userdata('admin_site_lang')=="") { echo $s['name']; }else{ echo $s['name_en']; } ?></option>

													<?php } ?>
												</select>
											<div class="form-error"><?= form_error('service_types'); ?></div>
										</div>
										<div class="form-group col-sm-4">
											<label for="case_type" class=" form-control-label"><?php echo $this->lang->line('E_Service_Type');?></label>
											<?php if($data)
											{
												$value=$data->case_type;
											}
											else
											{
												$value=set_value('case_type');
											} ?>
										
											<select name="case_type" id="case_type" class="form-control m-bootstrap-select m-bootstrap-select--air m-bootstrap-select--pill m_selectpicker"  >
												<option value=""><?php echo $this->lang->line('Select_Case_Type');?></option>
											<?php foreach($case_type as $case_type) {
											if($value == $case_type['id']){ ?>
											<option value="<?= $case_type['id']; ?>"<?php if($value==$case_type['id']) echo "selected=selected";?>><?= $case_type['name']; ?></option>
											<?php } } ?>
											</select>
											
											<div class="form-error"><?= form_error('case_type'); ?></div>
										</div>
										<div class="form-group col-sm-4">
											<label for="case_number" class=" form-control-label"><?php echo $this->lang->line('E_Service_Number');?></label>

											<?php
												$case_no = $this->db->select_max('case_number')
												->get('c_case')
												->row_array();

												$cnomain = $new_service_number;
												$value3=set_value('case_number',$new_service_number);
											?>
											
											<?= form_input(['name'=>'case_number','class'=>'form-control','value'=>$new_service_number,'readonly'=>'readonly']);?>
											<div class="form-error"><?= form_error('case_number'); ?></div>
										</div>
										<div class="form-group col-sm-4">
											<label for="contract_number" class=" form-control-label"><?php echo $this->lang->line('Contract_number');?></label>
											<?php 
												$value=set_value('contract_number',"C".$new_service_number);
											?>
											<?= form_input(['name'=>'contract_number','class'=>'form-control','value'=>$value,'readonly'=>'readonly']);?>
											<div class="form-error"><?= form_error('contract_number'); ?></div>
										</div>
										<div class="form-group col-sm-4">
											<label for="case_start_date" class=" form-control-label"><?php echo $this->lang->line('E_Service_Start_Date');?></label>
											<?php if($data)
											{
												$value=$data->case_start_date;
											}
											else
											{
												$value=set_value('case_start_date');
											} ?>
											<?= form_input(['name'=>'case_start_date','class'=>'form-control date appdate','id'=>'','readonly'=>'readonly','value'=>$value]);?>
											<div class="form-error"><?= form_error('case_start_date'); ?></div>
										</div>
									</div>
								</div>
							</div>
							<div class="m-portlet__body theme-inner-form">
								<div class="form-field-container">
									<h3><?php echo $this->lang->line('Requirements');?></h3>
									<div class="form-group m-form__group row">
										<div class="col-lg-12">
											<div class="form-group">
												<?php if($data)
												{
													$value=$data->note;
												}
												else
												{
													$value=set_value('note');
												} ?>
												<?= form_input(['name'=>'note','class'=>'form-control','value'=>$value]);?>
												<div class="form-error"><?= form_error('note'); ?></div>
											</div>
										</div>
									</div>
								</div>
								<div class="form-field-container">
									<div class="form-field-container d-flex justify-content-between align-items-center mb-2">
										<h3 class="mb-0"><?php echo $this->lang->line('File_Upload'); ?></h3>

										<!-- Styled like underlined text -->
										<span class="add_attachment" onclick="addAttachment()">
											Add Attachment
										</span>
									</div>

									<!-- Styled container for attachments (initially hidden) -->
									<div class="attachment-list" id="attachment-container" style="display: none;">
										<div id="attachment-list"></div>
									</div>
								</div>
							</div>
						</div>

						<div class="col-lg-3 d-flex flex-column">
							<div class="m-portlet__body theme-inner-form audio-box-card">
								<div class="form-field-container mb-3">
									<h3><?php echo $this->lang->line('Record_Audio');?></h3>

									<div class="form-group m-form__group row">
										<div class="col-12">
											<label for="note" class=" form-control-label"><?php echo $this->lang->line('Enter_Audio_File_Name');?></label>
											<?= form_input(['id'=>'audio_name','class'=>'form-control audio_name']);?>

											<button class="audio-record-btn">
											<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512"><!--!Font Awesome Free 6.7.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2025 Fonticons, Inc.--><path d="M192 0C139 0 96 43 96 96l0 160c0 53 43 96 96 96s96-43 96-96l0-160c0-53-43-96-96-96zM64 216c0-13.3-10.7-24-24-24s-24 10.7-24 24l0 40c0 89.1 66.2 162.7 152 174.4l0 33.6-48 0c-13.3 0-24 10.7-24 24s10.7 24 24 24l72 0 72 0c13.3 0 24-10.7 24-24s-10.7-24-24-24l-48 0 0-33.6c85.8-11.7 152-85.3 152-174.4l0-40c0-13.3-10.7-24-24-24s-24 10.7-24 24l0 40c0 70.7-57.3 128-128 128s-128-57.3-128-128l0-40z"/></svg>
											Record</button>
										<!-- <canvas id="level" height="100" width="300"></canvas> -->
									</div>
								</div>
							</div>
						</div>

						<div class="m-portlet__body theme-inner-form audio-box-card">
							<div class="form-field-container">
								<h3><?php echo $this->lang->line('Audio_Record_List');?></h3>

								<div class="audio-lists" style="display:none;">
									<!-- Audio -->
									<div class="custom-player-container">

										<div class="buttons">
											<div style="display: none;" id="play-button">
											<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512">
												<path d="M73 39c-14.8-9.1-33.4-9.4-48.5-.9S0 62.6 0 80V432c0 17.4 9.4 33.4 24.5 41.9s33.7 8.1 48.5-.9L361 297c14.3-8.7 23-24.2 23-41s-8.7-32.2-23-41L73 39z"></path>
											</svg>
											</div>
											<div id="pause-button">
											<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512">
												<path d="M48 64C21.5 64 0 85.5 0 112V400c0 26.5 21.5 48 48 48H80c26.5 0 48-21.5 48-48V112c0-26.5-21.5-48-48-48H48zm192 0c-26.5 0-48 21.5-48 48V400c0 26.5 21.5 48 48 48h32c26.5 0 48-21.5 48-48V112c0-26.5-21.5-48-48-48H240z"></path>
											</svg>
											</div>
											<div style="opacity: 0;" id="previous-button">
											<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512"> 
												<path d="M267.5 440.6c9.5 7.9 22.8 9.7 34.1 4.4s18.4-16.6 18.4-29V96c0-12.4-7.2-23.7-18.4-29s-24.5-3.6-34.1 4.4l-192 160L64 241V96c0-17.7-14.3-32-32-32S0 78.3 0 96V416c0 17.7 14.3 32 32 32s32-14.3 32-32V271l11.5 9.6 192 160z"></path>
											</svg>
											</div>
											<div style="opacity: 0;" id="next-button">
											<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512"> 
												<path d="M267.5 440.6c9.5 7.9 22.8 9.7 34.1 4.4s18.4-16.6 18.4-29V96c0-12.4-7.2-23.7-18.4-29s-24.5-3.6-34.1 4.4l-192 160L64 241V96c0-17.7-14.3-32-32-32S0 78.3 0 96V416c0 17.7 14.3 32 32 32s32-14.3 32-32V271l11.5 9.6 192 160z"></path>
											</svg>
											</div>
										</div>

		
										<div class="bottom">
											<div class="visualizer-container" id="visualizer-container">
											<div class="bar"></div>
											<div class="bar"></div>
											<div class="bar"></div>
											<div class="bar"></div>
											<div class="bar"></div>
											<div class="bar"></div>
											<div class="bar"></div>
											<div class="bar"></div>
											<div class="bar"></div>
											<div class="bar"></div>
											<div class="bar"></div>
											<div class="bar"></div>
											<div class="bar"></div>
											<div class="bar"></div>
											<div class="bar"></div>
											<div class="bar"></div>
											<div class="bar"></div>
											<div class="bar"></div>
											<div class="bar"></div>
											<div class="bar"></div>
											<div class="bar"></div>
											<div class="bar"></div>
											</div>
											<div class="information-container">
											<div>1:32</div>
											<i> / </i>
											<div>2:58</div>
											</div>
										</div>
									</div>
								</div>

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

					
				</form>

                <!--end::Form-->
            </div>

            <!--end::Portlet-->
        </div>
    </div>

                            </div>
                        </div>
                    <div>
                </div>
                                    <!-- end add modal -->








<?php

include('footer.php');
?>

<script>

    document.getElementById("userSearch").addEventListener("keyup", function() {
    let searchValue = this.value.toLowerCase();
    let tableRows = document.querySelectorAll(".client-service-table tbody tr");

    tableRows.forEach(row => {
        let rowText = row.textContent.toLowerCase();
        row.style.display = rowText.includes(searchValue) ? "" : "none";
    });
});

$('#service_types').on('change', function() {
var url="<?= base_url('admin/admin/ajax_case_type'); ?>"; 
var id = this.value;
$.ajax({
  type:'ajax',
  method:'post',
  url:url,
  data:{"id" : id},
  success:function(data){
 
	$('#case_type').html(data);$('select').selectpicker('refresh');
	$('select').selectpicker('refresh');
  },
});
});

$(document).on("click", ".assign_case", function() {
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
    </script>