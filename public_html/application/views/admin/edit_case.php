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
        .col-lg-3 {
            margin-top: 10px;
        }
		.ajax-upload-dragdrop {
    width: 376px !important;
    text-align: center !important;
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
		
.form-control:disabled, .form-control[readonly] {
    background-color: #f1f1f1;
    opacity: 1;
}
.att-docs {
    height: 100px;
}
.datafiles .fa {
    font-size: 80px;
}
.col-md-2.att-doc {
    text-align: center;
}


.ajax-file-upload-container {
    float: left !important;
}
div#image, #data, #report, #referrals, #procuation, #contaract {
    float: left !important;
}
.ajax-upload-dragdrop {
    height: 300px !important;
    padding-top: 200px !important;
    text-align: center !important;
}
div.upload-block:before {
    content: "\f093 ";
    font-family: FontAwesome;
    font-size: 100px;
    position: absolute;
    text-align: center;
    left: 21%;
    color: #c5c5c5;
	top: 27%;
}
.ajax-file-upload-container {
    border: 1px solid rgba(66, 31, 35, 0.47);
    margin-left: 15px !important;
    margin-top: 0 !important;
    height: 300px !important;
    width: 44%;
}
.drage-file {
    margin-top: -85px;
    color: #524a4a !important;
    font-size: 20px !important;
}
.ajax-file-upload-statusbar {
    border: 0 !important;
}
.ajax-file-upload-bar {
    background-color: #546eb2 !important;
}
.ajax-file-upload-progress {

    width: 260px !important;
}
.ajax-file-upload-container {
    overflow-y: scroll;
}
.ajax-file-upload-container:before {
    content: "<?php echo $this->lang->line('Upload_Area');?>";
    background: #546eb2;
    text-align: left;
    color: #fff;
    position: absolute;
    width: 42%;
    padding: 10px;
    margin-top: 0px !important;
    font-size: 16px;
}
.ajax-file-upload-statusbar:first-child {
    margin-top: 50px;
}
.next-btn {
    clear: both;
    float: right;
}
.next-btn .btn {
    margin-bottom: 25px;
    padding: 12px 50px;
    border-radius: 2px;
}
.ajax-file-upload {
    padding: 20px !important;
    line-height: 0 !important;
}
.casedata-block {
    overflow: hidden;
    background: rgba(234, 234, 234, 0.7019607843137254);
    padding: 20px;
    margin-top: 30px;
    border-top: 5px solid #546eb2;
    margin-bottom: 30px;
}
.right-panel .breadcrumbs {
    display: flex !important;
    margin-bottom: 15px;
}
.docloopa {
    padding: 13px 0;
    margin: 0;
    border-bottom: 1px solid #b1acac;
}
.docloopa .btn {
    float: right;
    margin: 3px;
    margin-bottom: 0;
    padding: 1px 10px;
}span.empnm {
    color: #5cb85c;
    margin-left: 5px;    font-size: 12px;
}
.clear {
    clear: both;
}.page-loader.bg-white { display: none; }
    </style>

    <div class="m-grid__item m-grid__item--fluid m-wrapper">


        <!-- END: Subheader -->
        <div class="m-content">

            <!--begin::Portlet-->
            <div class="m-portlet lp-theme-card bg-transparent">
                <div class="m-portlet__head">
                    <div class="m-portlet__head-caption">
                        <div class="m-portlet__head-title">
                            <h3 class="m-portlet__head-text">
                                <?php echo $this->lang->line('EDIT_E_SERVICES');?>
                            </h3>
                        </div>
                    </div>
                </div>
				
				<form class="m-form m-form--fit m-form--label-align-right m-form--group-seperator-dashed" enctype="multipart/form-data" method="post" accept-charset="utf-8"> 
					<?php 

					$id=$this->uri->segment(4); 	
					$cisd=$this->uri->segment(4); 	
					$case_id=$this->uri->segment(4); 
					echo form_hidden('customers_id',$data->customers_id); 
					echo form_hidden('doc_id',$data->doc_id); 
					echo  form_hidden('user_id',$data->user_id); 		
					$doc_id = $data->doc_id; 
					?>
                	<!--begin::Form-->
					<div class="m-portlet__body theme-inner-form">
						<div class="form-field-container">
							<h3><?php echo $this->lang->line('Customer_Information');?></h3>
                            <div class="form-group m-form__group row">
                               	<div class="form-group col-sm-3">
									<label for="identification_number" class=" form-control-label"><?php echo $this->lang->line('Identification_Numbers');?></label>
						
										<?php  $value = set_value('identification_number', $data->identification_number); ?>
									<?= form_input(['name'=>'identification_number','id'=>'id_numbers','class'=>'form-control','value'=>$value]);?>
									<div class="form-error"><?= form_error('identification_number'); ?></div>
								</div>

								<div class="form-group col-sm-3">
									<label for="identification_types" class=" form-control-label"><?php echo $this->lang->line('identification_types');?>*</label>

									<?php  $value = set_value('identification_types', $data->identification_types); ?>
									
									<?= form_input(['name'=>'identification_types','id'=>'identification_types','class'=>'form-control m-input','value'=>$value,"readonly"=>"readonly"]);?>
									
									<div class="form-error"><?= form_error('identification_types'); ?></div> 	
								</div>

								<div class="form-group col-sm-3">
									<label for="client_file_number" class=" form-control-label"><?php echo $this->lang->line('client_File_number');?></label>
								
									<?php  $value = set_value('client_file_number', $data->client_file_number); ?>
									<?= form_input(['name'=>'client_file_number','class'=>'form-control','value'=>$value,'readonly'=>'readonly']);?>
									<div class="form-error"><?= form_error('client_file_number'); ?></div>
								</div>

								<div class="form-group col-sm-3">
									<label for="client_name" class=" form-control-label"><?php echo $this->lang->line('client_full_name');?></label>
									<?php  $value = set_value('client_name', $data->client_name); ?>
									<?= form_input(['name'=>'client_name','id'=>'name','id'=>'name','onkeypress'=>'return (event.charCode > 64 && event.charCode < 91) || (event.charCode > 96 && event.charCode < 123)','class'=>'form-control','value'=>$value]);?>
									<div class="form-error"><?= form_error('client_name'); ?></div>
								</div>
                            </div>
                        </div>


                        <div class="form-field-container">
							<h3><?php echo $this->lang->line('E-Service_Information');?></h3>
                            <div class="form-group m-form__group row">
                                <div class="form-group col-sm-4">
									<label for="branch" class=" form-control-label"><?php echo $this->lang->line('branch');?></label>
								
									<?php  $value = set_value('branch', $data->branch); ?>
									<select name="branch" id="branch" class="form-control m-bootstrap-select m-bootstrap-select--air m-bootstrap-select--pill m_selectpicker" required>
									<option value=""><?php echo $this->lang->line('Please_select_branch');?>*</option>
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
									<?php  $value = set_value('service_types', $data->service_types); ?>
									<label for="service_types" class="form-control-label"><?php echo $this->lang->line('Please_Select_E_Service_Name');?></label>
									<select name="service_types" id="service_types" class="form-control m-bootstrap-select m-bootstrap-select--air m-bootstrap-select--pill m_selectpicker"   >
										<option value=""><?php echo $this->lang->line('Please_Select_E_Service_Name');?></option>
										<?php foreach($ser as $service) { ?>
													<option value="<?= $service['id']; ?>" <?php if($value==$service['id']) echo "selected=selected";?>><?php if($this->session->userdata('admin_site_lang')=="arabic" OR $this->session->userdata('admin_site_lang')=="") { echo $service['name']; }else{ echo $service['name_en']; } ?></option>

										<?php } ?>
									</select>
								</div>
								<div class="form-group col-sm-4">
									<label for="case_type" class=" form-control-label"><?php echo $this->lang->line('E_Service_Type');?>*</label>
									<?php  $value = set_value('case_type', $data->case_type); ?>
									<select name="case_type" id="case_type" class="form-control m-bootstrap-select m-bootstrap-select--air m-bootstrap-select--pill m_selectpicker"  >
										<option value=""><?php echo $this->lang->line('Please_Select_Case_Type');?></option>
									<?php foreach($case_type as $case_type) {
									if($value == $case_type['id']){ ?>
									<option value="<?= $case_type['id']; ?>"<?php if($value==$case_type['id']) echo "selected=selected";?>><?= $case_type['name']; ?></option>
									<?php } } ?>
									</select>
									<div class="form-error"><?= form_error('case_type'); ?></div>
								</div>

								<div class="form-group col-sm-4">
									<label for="case_number" class=" form-control-label"><?php echo $this->lang->line('E_Service_Number');?>*</label>
									<?php if($data)
									{
										$value3=$data->case_number;
									}
									else
									{
										$value3=set_value('case_number');
									} 
							

									?>
									<?php  $value = set_value('identification_number', $data->identification_number); ?>
									<?= form_input(['name'=>'case_number','class'=>'form-control','value'=>$value3,'readonly'=>'readonly']);?>
									<div class="form-error"><?= form_error('case_number'); ?></div>
								</div>
								<div class="form-group col-sm-4">
									<label for="case_date" class=" form-control-label"><?php echo $this->lang->line('E_Service_Date');?>*</label>

									<?php  $value = set_value('case_date', $data->case_date); 
										echo form_hidden('case_date',$value);
													$parts = explode('/', $value);
													if($this->session->userdata('admin_site_lang')=="arabic" OR $this->session->userdata('admin_site_lang')=="") { 
														$value = Greg2Hijri($parts[0], $parts[1], $parts[2],true);
													}
									
									?>
									<?= form_input(['id'=>'case_date','readonly'=>'readonly','class'=>'form-control date','value'=>$value]);?>
									<div class="form-error"><?= form_error('case_date'); ?></div>
								</div>
								<div class="form-group col-sm-4">
									<label for="case_start_date" class=" form-control-label"><?php echo $this->lang->line('E_Service_Start_Date');?>*</label>
									<?php  $value = set_value('case_start_date', $data->case_start_date);
									
										$parts = explode('/', $value);
										if($this->session->userdata('admin_site_lang')=="arabic" OR $this->session->userdata('admin_site_lang')=="") { 
										$value = Greg2Hijri($parts[0], $parts[1], $parts[2],true);
										}
									
									?>
									<?= form_input(['name'=>'case_start_date','class'=>'form-control appdate','id'=>'','readonly'=>'readonly','value'=>$value]);?>
									<div class="form-error"><?= form_error('case_start_date'); ?></div>
								</div>

								<div class="form-group col-sm-4">
									<label for="contract_number" class=" form-control-label"><?php echo $this->lang->line('Contract_number');?>*</label>
									<?php  $value = set_value('contact_number', $data->contract_number); ?>
									<?= form_input(['name'=>'contract_number','class'=>'form-control','value'=>$value,"readonly"=>"readonly"]);?>
									<div class="form-error"><?= form_error('contract_number'); ?></div>
								</div>
								<div class="form-group col-sm-4">
									<?php  $value = set_value('case_status', $data->case_status); ?>
									<label for="case_status" class=" form-control-label"><?php echo $this->lang->line('E_Service_Status');?></label>
									<select name="case_status" class="form-control m-bootstrap-select m-bootstrap-select--air m-bootstrap-select--pill m_selectpicker"  >
										<option value=""><?php echo $this->lang->line('Please_Select_E_Service_Status');?></option>
											<option value="active"<?php if($value == 'active') echo "selected=selected"; ?>><?php echo $this->lang->line('Active');?></option>
											<option value="inactive"<?php if($value == 'inactive') echo "selected=selected"; ?>><?php echo $this->lang->line('Inactive');?></option>
											<option value="reactivated"<?php if($value == 'reactivated') echo "selected=selected"; ?>><?php echo $this->lang->line('Reactive');?></option>
									</select><div class="form-error"><?= form_error('case_status'); ?></div>
								</div>
                            </div>
                        </div>



                        <div class="form-field-container">
							<h3><?php echo $this->lang->line('Court_Information');?></h3>
                            <div class="form-group m-form__group row">
								<div class="form-group col-sm-3">
									<label for="opponent_full_name" class=" form-control-label"><?php echo $this->lang->line('Opponent_Full_Name');?></label>
									<?php  $value = set_value('opponent_full_name', $data->opponent_full_name); ?>
									<?= form_input(['name'=>'opponent_full_name','class'=>'form-control','value'=>$value]);?>
									<div class="form-error"><?= form_error('opponent_full_name'); ?></div>
								</div>

								<div class="form-group col-sm-3">
									<label for="opponent_identification_types" class=" form-control-label"><?php echo $this->lang->line('Opponent_Number');?></label>
									<?php  $value = set_value('opponent_identification_types', $data->opponent_identification_types); ?>
									<select name="opponent_identification_types" id="opponent_identification_types" class="form-control m-bootstrap-select m-bootstrap-select--air m-bootstrap-select--pill m_selectpicker" required >
											<option value="CR" <?php if($value=='CR') echo "selected=selected";?>><?php echo $this->lang->line('CR');?></option>
											<option value="National Id" <?php if($value=='National Id') echo "selected=selected";?>><?php echo $this->lang->line('National_ID');?></option>
											<option value="Aqama" <?php if($value=='Aqama') echo "selected=selected";?>><?php echo $this->lang->line('Aqama');?></option>
											<option value="Governmental" <?php if($value=='Governmental') echo "selected=selected";?>><?php echo $this->lang->line('Governmental');?></option>
											<option value="Other" <?php if($value=='Other') echo "selected=selected";?>><?php echo $this->lang->line('Other');?></option> 		
									</select>
									<div class="form-error"><?= form_error('opponent_identification_types'); ?></div>
								</div>

								<div class="form-group col-sm-3">
									<label for="opponent_number" class=" form-control-label"><?php echo $this->lang->line('Opponent_Number');?></label>
									<?php  $value = set_value('opponent_number', $data->opponent_number); ?>
									<?= form_input(['name'=>'opponent_number','class'=>'form-control','value'=>$value]);?>
									<div class="form-error"><?= form_error('opponent_number'); ?></div>
								</div>

								<div class="form-group col-sm-3">
									<label for="opponent_note" class=" form-control-label"><?php echo $this->lang->line('Opponent_Note');?></label>
									<?php  $value = set_value('opponent_note', $data->opponent_note); ?>
									<?= form_input(['name'=>'opponent_note','class'=>'form-control','value'=>$value]);?>
									<div class="form-error"><?= form_error('opponent_note'); ?></div>
								</div>

								<div class="form-group col-sm-3">
									<label for="opponent_phone" class=" form-control-label"><?php echo $this->lang->line('Opponent_Phone');?></label>
									<?php  $value = set_value('opponent_phone', $data->opponent_phone); ?>
									<?= form_input(['name'=>'opponent_phone','class'=>'form-control','value'=>$value]);?>
									<div class="form-error"><?= form_error('opponent_phone'); ?></div>
								</div>

								<div class="form-group col-sm-3">
									<label for="court_name" class=" form-control-label"><?php echo $this->lang->line('Court_Name');?></label>
									<?php  $value = set_value('court_name', $data->court_name); ?>
									<select name="court_name" id="court_name" class="form-control"   >
										<option value=""><?php echo $this->lang->line('Please_select_court');?></option>
										<?php foreach(gtCourtList() as $service) { ?>
											<option value="<?= $service['id']; ?>" <?php if($value==$service['id']) echo "selected=selected";?>><?= $service['name']; ?></option>
										<?php } ?>
									</select>
									<div class="form-error"><?= form_error('court_name'); ?></div>
								</div>

								<div class="form-group col-sm-3">
									<label for="court_number" class=" form-control-label"><?php echo $this->lang->line('Court_Number');?></label>
									<?php  $value = set_value('court_number', $data->court_number); ?>
									<?= form_input(['name'=>'court_number','id'=>'court_number','class'=>'form-control','value'=>$value]);?>
									<div class="form-error"><?= form_error('court_number'); ?></div>
								</div>

								<div class="form-group col-sm-3">
									<label for="court_address" class=" form-control-label"><?php echo $this->lang->line('Court_Address');?></label>
									<?php  $value = set_value('court_address', $data->court_address); ?>
									<?= form_input(['name'=>'court_address','id'=>'court_address','class'=>'form-control','value'=>$value]);?>
									<div class="form-error"><?= form_error('court_address'); ?></div>
								</div>

								<div class="form-group col-sm-3">
									<label for="judge_name" class=" form-control-label"><?php echo $this->lang->line('Judge_Name');?></label>
									<?php  $value = set_value('judge_name', $data->judge_name); ?>
										<select name="judge_name" id="judge_name" class="form-control"   >
										<option value=""><?php echo $this->lang->line('Please_select_judge');?></option>
										<?php foreach(getJudgeList() as $service) { ?>
											<option value="<?= $service['judge_name']; ?>" <?php if($value==$service['judge_name']) echo "selected=selected";?>><?= $service['judge_name']; ?></option>
										<?php } ?>
									</select>
									<div class="form-error"><?= form_error('judge_name'); ?></div>
								</div>

							
								<div class="form-group col-sm-3">
									<label for="opponent_lawyer" class=" form-control-label"><?php echo $this->lang->line('Opponent_Lawyer');?></label>
									<?php  $value = set_value('opponent_lawyer', $data->opponent_lawyer); ?>
									<?= form_input(['name'=>'opponent_lawyer','class'=>'form-control','value'=>$value]);?>
									<div class="form-error"><?= form_error('opponent_lawyer'); ?></div>
								</div>
								<div class="form-group col-sm-3">
									<label for="objection_number" class=" form-control-label"><?php echo $this->lang->line('Objection_Number');?></label>
									<?php  $value = set_value('objection_number', $data->objection_number); ?>
									<?= form_input(['name'=>'objection_number','class'=>'form-control','value'=>$value]);?>
									<div class="form-error"><?= form_error('objection_number'); ?></div>
								</div>

								<div class="form-group col-sm-3">
									<label for="objection_date" class=" form-control-label"><?php echo $this->lang->line('Objection_Date');?></label>
								
									<?php  $value = set_value('objection_date', $data->objection_date); ?>
									<?= form_input(['name'=>'objection_date','class'=>'form-control appdate','id'=>'objection_date','readonly'=>'readonly','value'=>$value]);?>
									<div class="form-error"><?= form_error('objection_date'); ?></div>
								</div>

                            </div>
                        </div>
                        <div class="form-field-container">
							<h3><?php echo $this->lang->line('Requirements');?></h3>
                            <div class="form-group m-form__group row">
                                <div class="col-lg-12">
									<?php  $value = set_value('note', $data->note); ?>
									<?= form_textarea(['name'=>'note','class'=>'form-control', 'rows'=> '5','value'=>$value]);?>
									<div class="form-error"><?= form_error('note'); ?></div>
                                </div>
                            </div>
                        </div>

                       
                        <div class="form-field-container">
						<h3><?php echo $this->lang->line('File_Upload');?></h3>
                            <div class="form-group m-form__group row">

                                <div class="col-md-12">
                                    <ul class="nav nav-tabs" role="tablist">
                                        <li class="nav-item">
                                            <a class="nav-link active" data-toggle="tab" href="#" data-target="#m_tabs_1_1"><?php echo $this->lang->line('Documentation');?></a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" data-toggle="tab" href="#" data-target="#m_tabs_1_2"><?php echo $this->lang->line('Data');?></a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" data-toggle="tab" href="#" data-target="#m_tabs_1_3"><?php echo $this->lang->line('Report');?></a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" data-toggle="tab" href="#" data-target="#m_tabs_1_4"><?php echo $this->lang->line('Procuation');?></a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" data-toggle="tab" href="#" data-target="#m_tabs_1_5"><?php echo $this->lang->line('Referrals');?></a>
                                        </li>
										<?php if($this->session->userdata('role_id') ==1) { ?>
                                        <li class="nav-item">
                                            <a class="nav-link" data-toggle="tab" href="#" data-target="#m_tabs_1_6"><?php echo $this->lang->line('Contract');?></a>
                                        </li><?php } ?>
                                    </ul>
                                </div>

                                <div class="tab-content">

                                    <div class="tab-pane active" id="m_tabs_1_1" role="tabpanel">
                                        <div class="row">

                                            <div class="col-lg-12 col-md-12 col-sm-12">

                                             <div class="attced-block case-block">
												<div class="upload-block flex">
												<div id="image"></div>
												<div class="upload-area"></div>
											</div>
											</div>
                                                </div>
								
                                                <br>

                                            </div>
											<div class="col-lg-12 col-md-12 col-sm-12">
                                                <div class="m-portlet__head2" style="margin-top: 10px;"><?php echo $this->lang->line('Attached_files');?>
												</div>
                                                <div class="m_bo uploaded-files-list">
												
													<div class="row">

														<div class="col-12">
															<ul>
																<?php
																	$files = $this->db->select('*')->where("(temp_app_id = '$doc_id' AND cat_id = 1)", NULL, FALSE)->get('document')->result_array();
																	foreach ($files as $files) { ?>
																	<li>
																		<?php	
																		$emp=$this->db->select('*')->where('id',$files['user_id'])->get('users')->row_array();


																		echo "<b>" . $files['name']."</b>";if($emp){ echo "<span class='empnm'>(Upoded By ".$emp['name'].")</span>";} ?>
																		<div class="list-files-action">
																			<a href="<?=base_url('uploads/case_file/' . $files["name"]);?>" class='btn btn-success btn-sm' download><?php echo $this->lang->line('Download');?></a> 
																			<a href="<?php echo base_url('admin/c_case/delete_upload_files/' . $files["name"].'/'.$files["id"]);?>" class='btn btn-danger  btn-sm'><?php echo $this->lang->line('Delete');?></a>
																		</div>
																	</li>
																<?php }?>
															</ul>
														</div>
												
											
													</div>
												</div>
												 

                                        	</div>
                                    	</div>

                                    	<div class="tab-pane" id="m_tabs_1_2" role="tabpanel">
                                        	<div class="row">

                                            	<div class="col-lg-12 col-md-12 col-sm-12">

                                             		<div class="attced-block case-block">
														<div class="upload-block">
															<div id="data"></div> <div class="upload-area"></div>
														</div>
													</div>
                                                </div>
                                            </div>
											<div class="col-lg-12 col-md-12 col-sm-12">
                                                <div class="m-portlet__head2" style="margin-top: 10px;"><?php echo $this->lang->line('Attached_files');?></div>
                                                <div class="m_bo" style="padding: 10px;">
												<?php
												$files = $this->db->select('*')->where("(temp_app_id = '$doc_id' AND cat_id = 2)", NULL, FALSE)->get('document')->result_array();
												foreach ($files as $files) { ?>
												<div class="row" style="margin-bottom: 10px"><div class="col-md-8">
												<?php	
												$emp=$this->db->select('*')->where('id',$files['user_id'])->get('users')->row_array();


												echo "<b>" . $files['name']."</b>";if($emp){ echo "<span class='empnm'>(Upoded By ".$emp['name'].")</span>";} ?>
												</div><div class="col-md-4">
												<a href="<?=base_url('uploads/case_file/' . $files["name"]);?>" class='btn btn-success btn-sm' download><?php echo $this->lang->line('Download');?></a> 
												<a href="<?php echo base_url('admin/c_case/delete_upload_files/' . $files["name"].'/'.$files["id"]);?>" class='btn btn-danger  btn-sm'><?php echo $this->lang->line('Delete');?></a>
												</div></div>
												<?php }?>

													</div>
												 

                                        </div>
                                    </div>

                                    <div class="tab-pane" id="m_tabs_1_3" role="tabpanel">
                                        <div class="row">

                                            <div class="col-lg-12 col-md-12 col-sm-12">

                                             <div class="attced-block case-block">
											<div class="upload-block">
												<div id="report"></div> <div class="upload-area"></div>
											</div>
											</div>
                                                </div>
								
                                                <br>

                                            </div>
											<div class="col-lg-12 col-md-12 col-sm-12">
                                                <div class="m-portlet__head2" style="margin-top: 10px;"><?php echo $this->lang->line('Attached_files');?></div>
                                                <div class="m_bo" style="padding: 10px;">
												<?php
												$files = $this->db->select('*')->where("(temp_app_id = '$doc_id' AND cat_id = 4)", NULL, FALSE)->get('document')->result_array();
												foreach ($files as $files) { ?>
												<div class="row" style="margin-bottom: 10px"><div class="col-md-8">
												<?php	
												$emp=$this->db->select('*')->where('id',$files['user_id'])->get('users')->row_array();


												echo "<b>" . $files['name']."</b>";if($emp){ echo "<span class='empnm'>(Upoded By ".$emp['name'].")</span>";} ?>
												</div><div class="col-md-4">
												<a href="<?=base_url('uploads/case_file/' . $files["name"]);?>" class='btn btn-success btn-sm' download><?php echo $this->lang->line('Download');?></a> 
												<a href="<?php echo base_url('admin/c_case/delete_upload_files/' . $files["name"].'/'.$files["id"]);?>" class='btn btn-danger  btn-sm'><?php echo $this->lang->line('Delete');?></a>
												</div></div>
												<?php }?>

													</div>
												 

                                        </div>
                                    </div>

                                    <div class="tab-pane" id="m_tabs_1_4" role="tabpanel">
                                       <div class="row">

                                            <div class="col-lg-12 col-md-12 col-sm-12">

                                             <div class="attced-block case-block">
											<div class="upload-block flex">
												<div id="procuation"></div>
												<div class="upload-area"></div>
											</div>
											</div>
                                                </div>
								
                                                <br>

                                            </div>
											<div class="col-lg-12 col-md-12 col-sm-12">
                                                <div class="m-portlet__head2" style="margin-top: 10px;"><?php echo $this->lang->line('Attached_files');?></div>
                                                <div class="m_bo" style="padding: 10px;">
												<?php
											
												$files = $this->db->select('*')->where("(temp_app_id = '$doc_id' AND cat_id = 6)", NULL, FALSE)->get('document')->	result_array();
												foreach ($files as $files) { ?>
												<div class="row" style="margin-bottom: 10px"><div class="col-md-8">
												<?php	
												$emp=$this->db->select('*')->where('id',$files['user_id'])->get('users')->row_array();


												echo "<b>" . $files['name']."</b>";if($emp){ echo "<span class='empnm'>(Upoded By ".$emp['name'].")</span>";} ?>
												</div><div class="col-md-4">
												<a href="<?=base_url('uploads/case_file/' . $files["name"]);?>" class='btn btn-success btn-sm' download><?php echo $this->lang->line('Download');?></a> 
												<a href="<?php echo base_url('admin/c_case/delete_upload_files/' . $files["name"].'/'.$files["id"]);?>" class='btn btn-danger  btn-sm'><?php echo $this->lang->line('Delete');?></a>
												</div></div>
												<?php }?>

													</div>
												 

                                        </div>
                                    </div>

                                    <div class="tab-pane" id="m_tabs_1_5" role="tabpanel">
                                        <div class="row">

                                            <div class="col-lg-12 col-md-12 col-sm-12">

                                             <div class="attced-block case-block">
											<div class="upload-block flex">
												<div id="referrals"></div>
												<div class="upload-area"></div>
											</div>
											</div>
                                                </div>
								
                                                <br>

                                            </div>
											<div class="col-lg-12 col-md-12 col-sm-12">
                                                <div class="m-portlet__head2" style="margin-top: 10px;"><?php echo $this->lang->line('Attached_files');?></div>
                                                <div class="m_bo" style="padding: 10px;">
												<?php
											$files = $this->db->select('*')->where("(temp_app_id = '$doc_id' AND cat_id = 7)", NULL, FALSE)->get('document')->result_array();
												foreach ($files as $files) { ?>
												<div class="row" style="margin-bottom: 10px"><div class="col-md-8">
												<?php	
												$emp=$this->db->select('*')->where('id',$files['user_id'])->get('users')->row_array();


												echo "<b>" . $files['name']."</b>";if($emp){ echo "<span class='empnm'>(Upoded By ".$emp['name'].")</span>";} ?>
												</div><div class="col-md-4">
												<a href="<?=base_url('uploads/case_file/' . $files["name"]);?>" class='btn btn-success btn-sm' download><?php echo $this->lang->line('Download');?></a> 
												<a href="<?php echo base_url('admin/c_case/delete_upload_files/' . $files["name"].'/'.$files["id"]);?>" class='btn btn-danger  btn-sm'><?php echo $this->lang->line('Delete');?></a>
												</div></div>
												<?php }?>

													</div>
												 

                                        </div>
                                    </div><?php if($this->session->userdata('role_id') ==1) { ?>
                                    <div class="tab-pane" id="m_tabs_1_6" role="tabpanel">
                                        <div class="row">

                                            <div class="col-lg-12 col-md-12 col-sm-12">

                                             <div class="attced-block case-block">
											<div class="upload-block">
												<div id="contaract"></div> <div class="upload-area"></div>
											</div>
											</div>
                                                </div>
								
                                                <br>

                                            </div>
											<div class="col-lg-12 col-md-12 col-sm-12">
                                                <div class="m-portlet__head2" style="margin-top: 10px;"><?php echo $this->lang->line('Attached_files');?></div>
                                                <div class="m_bo" style="padding: 10px;">
												<?php
												$files = $this->db->select('*')->where("(temp_app_id = '$doc_id' AND cat_id = 3)", NULL, FALSE)->get('document')->result_array();
												foreach ($files as $files) { ?>
												<div class="row" style="margin-bottom: 10px"><div class="col-md-8">
												<?php	
												$emp=$this->db->select('*')->where('id',$files['user_id'])->get('users')->row_array();


												echo "<b>" . $files['name']."</b>";if($emp){ echo "<span class='empnm'>(Upoded By ".$emp['name'].")</span>";} ?>
												</div><div class="col-md-4">
												<a href="<?=base_url('uploads/case_file/' . $files["name"]);?>" class='btn btn-success btn-sm' download><?php echo $this->lang->line('Download');?></a> 
												<a href="<?php echo base_url('admin/c_case/delete_upload_files/' . $files["name"].'/'.$files["id"]);?>" class='btn btn-danger  btn-sm'><?php echo $this->lang->line('Delete');?></a>
												</div></div>
												<?php }?>

													</div>
												 

                                        </div>
                                    </div>
									<?php } ?>
                                </div>

                            </div>
                        </div>

                        <div class="form-field-container">
						<h3><?php echo $this->lang->line('Audio_Upload');?></h3>
                            <div class="form-group m-form__group row">
                                <div class="col-lg-6">
                                    <div class="m-portlet m-portlet--tab">
                                        <div class="m-portlet__head2"><?php echo $this->lang->line('Record_Audio');?></div>
                                        <div class="m_bo" style="padding: 20px;">

                                          <label for="note" class=" form-control-label"><?php echo $this->lang->line('Enter_Audio_File_Name');?></label>
			<?= form_input(['id'=>'audio_name','class'=>'form-control audio_name']);?>
		 
			<audio class="mt-4 mb-2" controls id="audio" name="audio"></audio>
		<div class="btn-group">
			<a class="btn btn-primary  recordButton" id="record"><?php echo $this->lang->line('Record');?></a>
			<a class="btn btn-primary  disabled one" id="pause"><?php echo $this->lang->line('Pause');?></a>
			<a class="btn btn-primary  disabled one" id="stop"><?php echo $this->lang->line('Reset');?></a>
		</div>  
		<div>  
		<input class="" type="checkbox" id="live"/>
		<label for="live"><?php echo $this->lang->line('Live_Output');?></label><br/>
		<label><?php echo $this->lang->line('WAV_Controls');?>:</label>
		<div class="btn-group" data-type="wav">
			<a class="btn btn-primary  disabled one" id="play"><?php echo $this->lang->line('Play');?></a>
			<a class="btn btn-primary disabled one" id="download"><?php echo $this->lang->line('Download');?></a>
			<a class="btn btn-primary  disabled one" id="save"><?php echo $this->lang->line('Upload_to_Audio');?></a>
		</div>
		</div>
		<br>
		<canvas id="level" height="100" width="400"></canvas> 

        </div>
    </div>
</div>
                                <div class="col-lg-6">

                                    <div class="m-portlet m-portlet--tab">
                                        <div class="m-portlet__head2"><?php echo $this->lang->line('Audio_Record_List');?></div>
    <div class="m_bo">
        <?php
		$audio = $this->db->select('audio,id,user_id,create_date')->where('audioid',$doc_id)->get('uploads')->result_array();
		foreach ($audio as $audio) {  $timestamp = strtotime($audio['create_date']); $date  =   date("d M Y G:i",$timestamp); ?>
		<div class="docloopa">
			<?php echo "<b>" . $audio['audio']."</b>"; ?>
			<?php echo "<small>&nbsp;&nbsp; Uploaded By " .getEmployeeName($audio['user_id'])."</small>"; ?>
			<?php echo "<small>&nbsp;&nbsp;" .$date."</small>"; ?>
			<span class="dwndelbtn">
			<a href="<?=base_url('uploads/audio/' . $audio["audio"]);?>" class='btn btn-success btn-sm' download><?php echo $this->lang->line('Download');?></a> 
			<!--<a href="<?=base_url('front/delete_audio_files/' . $audio["audio"].'/'.$case_id);?>" class='btn btn-danger  btn-sm'>Delete</a>-->
			</span>
		</div>
	<?php }?>
	<div class="putaudiores"></div>
                                        </div>
                                    </div>

                                </div>
                            </div>
							
                        </div>
<span class="type" id="case"></span>
<span class="audioocaseid" id="<?php echo $doc_id; ?>"></span>
<span class="sessionid" id="<?php echo $this->session->userdata('admin_id'); ?>"></span>
<span class="audioid" id="<?php echo $doc_id; ?>"></span>
<div class="clear"></div>
                    </div>
					<div class="col-12">
							<?php echo form_submit(['id'=>'addcustomer','value'=>$this->lang->line('Submit'),'class'=>'btn btn-primary btn-lg']);  ?>
					</div>
                </form>

                <!--end::Form-->
            </div>

            <!--end::Portlet-->
        </div>
    </div>
<?php
include('footer.php');
?>
<script src="<?= base_url('assets/js/audio/app.js'); ?>"></script>
<script src="<?= base_url('assets/js/audio/Fr.voice.js'); ?>"></script>
<script src="<?= base_url('assets/js/audio/libmp3lame.min.js'); ?>"></script>
<script src="<?= base_url('assets/js/audio/mp3Worker.js'); ?>"></script>
<script src="<?= base_url('assets/js/audio/recorder.js'); ?>"></script>
<link href=<?php echo base_url('assets/css/uploadfile.css'); ?> rel="stylesheet">
<script src=<?php echo base_url('assets/js/jquery.uploadfile.min.js'); ?>></script>
<link href=<?php echo base_url('assets/css/uploadfile.css'); ?> rel="stylesheet">
<script src=<?php echo base_url('assets/js/jquery.uploadfile.min.js'); ?>></script>
 <script type="text/javascript">
$( document ).ready(function() {
	var id=<?php echo $data->customers_id;?>;
	$.ajax({
		 type: 'POST',
		url: "<?php echo base_url('admin/admin/find_note_user'); ?>",  
		cache: false,
		data: {id: id},  
		dataType: 'JSON',  
		success: function(data) {
				$("#name").val(data['name']);
			$("#id_numbers").val(data['id_numbers']);
$("#identification_types").val(data['id_type']);
if(data['name']) { $('#name').attr('readonly', true); }
if(data['id_numbers']) { $('#id_numbers').attr('readonly', true); }
},
/* 		error:function(){

/* $('#name').attr('readonly', false);
$('#id_type').attr('readonly', false);
$('#id_numbers').attr('readonly', false);
$('#identification_types ').attr('disabled', false);
$("#name").val("");
$("#id_type").val("");
$("#id_numbers").val("");
$('#identification_types option[value="0"]').attr('selected','selected');
 
}, */
});
});
</script>
<script>
$(document).ready(function()
{
	$("#image").uploadFile({
	url:"<?=base_url('admin/c_case/admin_modify_upload_file');?>",
	fileName:"image",
	dragDropStr: "<div class='drage-file'><b><?php echo $this->lang->line('Drag_the_files_here');?></div>",
    abortStr:"Cancel",
    statusBarWidth:250,
	formData: {"fid":'<?php echo $doc_id; ?>',"cat_id":1,"customer_id":<?php echo $id; ?>},
    dragdropWidth:440,
	uploadStr:"<?php echo $this->lang->line('Or_click_here_to_view_the_files');?>",
allowedTypes:"jpg,jpeg,png,gif,ico,mp3,m4a,ogg,wav,psd,xls,xlsx,odt,ppt,pptx,pps,ppsx,doc,docx,pdf",
showDelete: true,
	deleteCallback: function (data, pd) {  obj = JSON.parse(data); 
		$.post("<?=base_url('admin/c_case/delete_admin_modify_upload_file');?>", {op: "delete",name: obj.name},
			function (resp,textStatus, jqXHR) { 
			});
		pd.statusbar.hide(); 
	},
	});
	$("#data").uploadFile({
	url:"<?=base_url('admin/c_case/admin_modify_upload_file');?>",
	fileName:"image",
	dragDropStr: "<div class='drage-file'><b><?php echo $this->lang->line('Drag_the_files_here');?></div>",
    abortStr:"Cancel",
    statusBarWidth:250,
	formData: {"fid":'<?php echo $doc_id; ?>',"cat_id":2,"customer_id":<?php echo $id; ?>},
    dragdropWidth:440,
	uploadStr:"<?php echo $this->lang->line('Or_click_here_to_view_the_files');?>",
allowedTypes:"jpg,jpeg,png,gif,ico,mp3,m4a,ogg,wav,psd,xls,xlsx,odt,ppt,pptx,pps,ppsx,doc,docx,pdf",
showDelete: true,
	deleteCallback: function (data, pd) {  obj = JSON.parse(data); 
		$.post("<?=base_url('admin/c_case/delete_admin_modify_upload_file');?>", {op: "delete",name: obj.name},
			function (resp,textStatus, jqXHR) { 
			});
		pd.statusbar.hide(); 
	},
	});
	$("#contaract").uploadFile({
	url:"<?=base_url('admin/c_case/admin_modify_upload_file');?>",
	fileName:"image",
	dragDropStr: "<div class='drage-file'><b><?php echo $this->lang->line('Drag_the_files_here');?></div>",
    abortStr:"Cancel",
    statusBarWidth:250,
	formData: {"fid":'<?php echo $doc_id; ?>',"cat_id":3,"customer_id":<?php echo $id; ?>},
    dragdropWidth:440,
	uploadStr:"<?php echo $this->lang->line('Or_click_here_to_view_the_files');?>",
allowedTypes:"jpg,jpeg,png,gif,ico,mp3,m4a,ogg,wav,psd,xls,xlsx,odt,ppt,pptx,pps,ppsx,doc,docx,pdf",
showDelete: true,
	deleteCallback: function (data, pd) {  obj = JSON.parse(data); 
		$.post("<?=base_url('admin/c_case/delete_admin_modify_upload_file');?>", {op: "delete",name: obj.name},
			function (resp,textStatus, jqXHR) { 
			});
		pd.statusbar.hide(); 
	},
	});
	$("#report").uploadFile({
	url:"<?=base_url('admin/c_case/admin_modify_upload_file');?>",
	fileName:"image",
	dragDropStr: "<div class='drage-file'><b><?php echo $this->lang->line('Drag_the_files_here');?></div>",
    abortStr:"Cancel",
    statusBarWidth:250,
	formData: {"fid":'<?php echo $doc_id; ?>',"cat_id":4,"customer_id":<?php echo $id; ?>},
    dragdropWidth:440,
	uploadStr:"<?php echo $this->lang->line('Or_click_here_to_view_the_files');?>",
	allowedTypes:"jpg,jpeg,png,gif,ico,mp3,m4a,ogg,wav,psd,xls,xlsx,odt,ppt,pptx,pps,ppsx,doc,docx,pdf",
	showDelete: true,
	deleteCallback: function (data, pd) {  obj = JSON.parse(data); 
		$.post("<?=base_url('admin/c_case/delete_admin_modify_upload_file');?>", {op: "delete",name: obj.name},
			function (resp,textStatus, jqXHR) { 
			});
		pd.statusbar.hide(); 
	},
	});
	$("#procuation").uploadFile({
	url:"<?=base_url('admin/c_case/admin_modify_upload_file');?>",
	fileName:"image",
	dragDropStr: "<div class='drage-file'><b><?php echo $this->lang->line('Drag_the_files_here');?></div>",
    abortStr:"Cancel",
    statusBarWidth:250,
	formData: {"fid":'<?php echo $doc_id; ?>',"cat_id":6,"customer_id":<?php echo $id; ?>},
    dragdropWidth:440,
	uploadStr:"<?php echo $this->lang->line('Or_click_here_to_view_the_files');?>",
	allowedTypes:"jpg,jpeg,png,gif,ico,mp3,m4a,ogg,wav,psd,xls,xlsx,odt,ppt,pptx,pps,ppsx,doc,docx,pdf",
	showDelete: true,
	deleteCallback: function (data, pd) {  obj = JSON.parse(data); 
		$.post("<?=base_url('admin/c_case/delete_admin_modify_upload_file');?>", {op: "delete",name: obj.name},
			function (resp,textStatus, jqXHR) { 
			});
		pd.statusbar.hide(); 
	},
	});
	
	$("#referrals").uploadFile({
	url:"<?=base_url('admin/c_case/admin_modify_upload_file');?>",
	fileName:"image",
	dragDropStr: "<div class='drage-file'><b><?php echo $this->lang->line('Drag_the_files_here');?></div>",
    abortStr:"Cancel",
    statusBarWidth:250,
	formData: {"fid":'<?php echo $doc_id; ?>',"cat_id":7,"customer_id":<?php echo $id; ?>},
    dragdropWidth:440,
	uploadStr:"<?php echo $this->lang->line('Or_click_here_to_view_the_files');?>",
allowedTypes:"jpg,jpeg,png,gif,ico,mp3,m4a,ogg,wav,psd,xls,xlsx,odt,ppt,pptx,pps,ppsx,doc,docx,pdf",
showDelete: true,
	deleteCallback: function (data, pd) {  obj = JSON.parse(data); 
		$.post("<?=base_url('admin/c_case/delete_admin_modify_upload_file');?>", {op: "delete",name: obj.name},
			function (resp,textStatus, jqXHR) { 
			});
		pd.statusbar.hide(); 
	},
	});
	
	$("#tuning").uploadFile({
	url:"<?=base_url('admin/c_case/admin_modify_upload_file');?>",
	fileName:"image",
	dragDropStr: "<div class='drage-file'><b><?php echo $this->lang->line('Drag_the_files_here');?></div>",
    abortStr:"Cancel",
    statusBarWidth:250,
	formData: {"fid":'<?php echo $doc_id; ?>',"cat_id":5,"customer_id":<?php echo $id; ?>},
    dragdropWidth:440,
	uploadStr:"<?php echo $this->lang->line('Or_click_here_to_view_the_files');?>",
allowedTypes:"jpg,jpeg,png,gif,ico,mp3,m4a,ogg,wav,psd,xls,xlsx,odt,ppt,pptx,pps,ppsx,doc,docx,pdf",
showDelete: true,
	deleteCallback: function (data, pd) {  obj = JSON.parse(data); 
		$.post("<?=base_url('admin/c_case/delete_admin_modify_upload_file');?>", {op: "delete",name: obj.name},
			function (resp,textStatus, jqXHR) { 
			});
		pd.statusbar.hide(); 
	},
	});
	
});
   $("#court_name").change(function(){  
	var  id = $('#court_name :selected').val();  
	$.ajax({
		 type: 'POST',
		url: "<?php echo base_url('admin/admin/get_court_details'); ?>",  
		cache: false,
		data: {id: id},  
		dataType: 'JSON',  
		success: function(data) {
		$("#court_number").val(data['number']);
		$("#court_address").val(data['address']);
		 
		if(data['number']) { $('#court_number').attr('readonly', true); }
		if(data['address']) { $('#court_address').attr('readonly', true); }
 
		},
		error:function(){
		$('#court_number').attr('readonly', false);
		$('#court_address').attr('readonly', false);
		$("#court_number").val("");
		$("#court_address").val("");
	},
	});
});
</script>
<script type="text/javascript">
$(document).ready(function()
{
$('#success').hide();
$('#service_types').on('change', function() {
var url="<?= base_url('admin/admin/ajax_case_type'); ?>"; 
var id = this.value;
$.ajax({
  type:'ajax',
  method:'post',
  url:url,
  data:{"id" : id},
  success:function(data){
 
	$('#case_type').html(data);
	$('select').selectpicker('refresh');
  },
});
});
});
</script>