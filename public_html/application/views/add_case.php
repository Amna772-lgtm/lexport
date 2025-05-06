<?php $nvc = "white-nav sticky shrink modern hover4 radius-drop"; 
if($data){ $pageTitle = $this->lang->line("EDIT_E_SERVICES") ;	} else { $pageTitle =  $this->lang->line("ADD_E_SERVICES"); } 
include('header.php');
?>
<?php 
$user_id = $this->session->userdata('user_id');
$idtype = $this->db->select('*')->where("(id=$user_id)", NULL, FALSE)->get('users')->row_array();
if($idtype['id_type'] =='' OR  $idtype['id_numbers']==""){ 
    //redirect("modify_case?updateprofile=true"); 
}
?>
 </section>
<?php
include('header_welcome.php');
?>
<!-- END: Left Aside -->

    <div class="m-grid__item m-grid__item--fluid m-wrapper">

        <!-- END: Subheader -->
        <div class="m-content">

            <!--begin::Portlet-->
            <div class="m-portlet lp-theme-card bg-transparent">
                <div class="m-portlet__head">
                    <div class="m-portlet__head-caption">
                        <!-- <div class="m-portlet__head-title">
                            <h3 class="m-portlet__head-text">
                            <?php   if($data){ echo $this->lang->line("Update_E_Service");	} else { echo $this->lang->line("Create_New_E_Service"); } ?>
                            </h3>
                        </div> -->
                    </div>
                </div>
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
            width: 97.2%;
        }
		.m-body .m-content {
    padding: 29px 45px;
}
    </style>	<style>
		div#armanage ul.nav.nav-tabs li {
    padding: 10px;
    border: 1px solid #e2e1e1;
    border-bottom: 0px;
    width: 130px;
    text-align: center;
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
div#image {
    float: left !important;
}
.ajax-upload-dragdrop {
    height: 300px !important;
    padding-top: 200px !important;
    text-align: center !important;
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

    width: 375px !important;
}
.ajax-file-upload-container {
    overflow-y: scroll;
}
.ajax-file-upload-container:before {
    content: "<?php echo $this->lang->line('Upload_Area');?>";
    background: #1f3958;
    text-align: left;
    color: #fff;
    position: absolute;
    width: 42.6%;
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
}.page-loader.bg-white { display: none; }.docloopa {
    height: 50px;width:100%;
}

.file-attachments span.dwndelbtn {
 margin-top: -2px;
}
.ar_body span.dwndelbtn {
    float: left;
    margin-top: -5px;
}
</style>
							<!--begin::Form--><?php 
					// echo '<pre>';
					// print_r($data);exit;
						
					echo form_open_multipart('front/store_case',['id'=>'customer',"class"=>"m-form m-form--fit m-form--label-align-right m-form--group-seperator-dashed"]);
					if($data)
						{
							$readonly = 'readonly';
							echo form_hidden('id',$data->id); 
								$doc_id = $data->doc_id; 
							//echo form_hidden('is_reject',$data->is_reject); 
						}
						else
						{
							$readonly ='';
							echo form_hidden('id',''); 
							$doc_id = "DI".rand();
							echo form_hidden('doc_id',$doc_id); 
						}
						$case_id = isset($data->case_id) ? $data->case_id  :'';
						$case_id1 = isset($data->case_id) ? $data->case_id  :'0';
						echo form_hidden('case_id',$case_id); 
						
					// echo '<pre>'; print_r($data);exit;
					?>

                    <div class="row">
						<div class="col-lg-9">
							<div class="m-portlet__body theme-inner-form add-case-box">
								<div class="form-field-container">
									<div class="d-flex justify-content-between align-items-center">
										<h3><?php echo $this->lang->line('Customer_Information');?></h3>
										
										<!-- Save Button (Aligned to the Right) -->
										<button type="submit" class="btn btn-primary btn-lg"><?php echo $this->lang->line('Save');?></button>
									</div>
									<div class="form-group m-form__group row">
										<div class="form-group col-sm-3">
											<label for="identification_number" class=" form-control-label"><?php echo $this->lang->line('ID');?></label>
											<?php if($data)
											{
												$value=$data->identification_number;
											}
											else
											{
												$value=set_value('identification_number');
											} 
											$value = $user['id_numbers'];

											?>
											<?= form_input(['name'=>'identification_number','class'=>'form-control m-input','value'=>$value,'readonly'=>'readonly']);?>
											<div class="form-error"><?= form_error('identification_number'); ?></div>
										</div>
										<div class="form-group col-sm-3">
											<label for="identification_types" class="form-control-label"><?php echo $this->lang->line('identification_types');?></label>
											<?php echo form_input(['name'=>'identification_types','value'=>$user['id_type'],'id'=>'identification_types','class'=>'form-control m-input','readonly'=>'readonly']); ?>
										</div>
										<div class="form-group col-sm-3">
											<label for="client_file_number" class="form-control-label"><?php echo $this->lang->line('client_File_number');?></label>
											<?php 
											$dbValue = $this->session->userdata('user_id'); 
											$ccn =  $dbValue = "CU".str_pad($dbValue, 6, "0", STR_PAD_LEFT); 
											if($data)
											{
												$value2=$data->client_file_number;
											}
											else
											{
												$value2=set_value('client_file_number',$ccn);
											} 
											//$value2 = "CU".$this->session->userdata('user_id');
											
											?>
											<?= form_input(['name'=>'client_file_number','class'=>'form-control m-input','value'=>$value2,'readonly'=>'readonly']);?>
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
											} 
											$value = $user['name'];
											?>
											<?= form_input(['name'=>'client_name','class'=>'form-control m-input','value'=>$value,'readonly'=>'readonly']);?>
											<div class="form-error"><?= form_error('client_name'); ?></div>
										</div>
									</div>
								</div>
							</div>
							<div class="m-portlet__body theme-inner-form add-case-box">
								<div class="form-field-container">
									<div class="form-group m-form__group row">
										<div class="col-lg-12">
											<h3><?php echo $this->lang->line('E-Service_Information');?></h3>
										</div>
										<div class="form-group col-sm-4">
											<label for="branch" class=" form-control-label"><?php echo $this->lang->line('branch');?></label>
											<?php if($data)
											{
												$value=$data->branch;
											}
											else
											{
												$value=set_value('branch');
											} ?>
											<select name="branch" id="branch" class="form-control" required>
											<option value=""><?php echo $this->lang->line('Please_select_branch');?></option>
											<?php foreach(branch() as $branch) { ?>
											<option value="<?= $branch['id']; ?>"<?php if($value==$branch['id']) echo "selected=selected";?>><?= $branch['name']; ?></option>
											<?php } ?></select>
											<div class="form-error"><?= form_error('branch'); ?></div>
										</div>
										<div class="form-group col-sm-4">
											<label for="service_types" class="form-control-label">
												<?php echo $this->lang->line('Select_E_Service_Name'); ?>
											</label>

											<select name="service_types" id="service_types" class="form-control" required <?php if ($data) { ?>readonly<?php } ?>>
												<option value="">
													<?php echo $this->lang->line('Select_E_Service_Name'); ?>
												</option>

												<?php
												$site_lang = $this->session->userdata('site_lang');

												foreach ($service as $service_item) {
													$service_id = $service_item['id'];
													$name_ar = $service_item['name'];
													$name_en = $service_item['name_en'];

													// Use Arabic if available, otherwise fall back to English
													$display_name = ($site_lang == "arabic" && !empty($name_ar)) ? $name_ar : $name_en;

													// Optional debug comment to find missing Arabic names
													if ($site_lang == "arabic" && empty($name_ar)) {
														echo "<!-- Missing Arabic name for service ID: {$service_id} -->";
													}

													// Handle selection state
													$selected = ($data && $data->service_types == $service_id) ? 'selected="selected"' : '';
												?>
													<option value="<?= $service_id; ?>" <?= $selected; ?>>
														<?= htmlspecialchars($display_name, ENT_QUOTES, 'UTF-8'); ?>
													</option>
												<?php } ?>
											</select>
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
											<select name="case_type" id="case_type" class="form-control"  >
												<?php foreach($case_type as $case_type) { 
												if($value==$case_type['id']) { ?>
														<option value="<?= $case_type['id']; ?>"<?php  echo "selected=selected";?>><?= $case_type['name']; ?></option>
												<?php } } ?>
											</select>
											<div class="form-error"><?= form_error('case_type'); ?></div>
										</div>
	
										<div class="form-group col-sm-4">
											<label for="case_number" class=" form-control-label"><?php echo $this->lang->line('E_Service_Number');?></label>
											<?php 
											$cnomain = getCaseNumber(0);
											if($data)
											{
												$value=$data->case_number;
											}
											else
											{
												$value=set_value('case_number',$cnomain );
											} 
											
											?>
											<?= form_input(['name'=>'case_number','class'=>'form-control m-input','value'=>$value,'readonly'=>'readonly']);?>
											<div class="form-error"><?= form_error('case_number'); ?></div>
										</div>
										<div class="form-group col-sm-4">
											<label for="contact_number" class=" form-control-label"><?php echo $this->lang->line('Contract_number');?></label>
											<?php if($data)
											{
												$value=$data->contract_number;
											}
											else
											{
												$value=set_value('contract_number',"C".$cnomain);
											} ?>
											<?= form_input(['name'=>'contract_number','class'=>'form-control m-input','value'=>$value,'readonly'=>'readonly']);?>
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
											<?= form_input(['name'=>'case_start_date','class'=>'form-control date','id'=>'case_start_date','readonly'=>'readonly','value'=>$value,$readonly=>'']);?>
											<div class="form-error"><?= form_error('case_start_date'); ?></div>
										</div>
									</div>
								</div>
							</div>
							<div class="m-portlet__body theme-inner-form add-case-box">
								<div class="form-field-container">
									<div class="form-group m-form__group row">
										<div class="col-lg-12">
											<h3><?php echo $this->lang->line('Requirements');?></h3>
										</div>
										<div class="card-body card-block">
											<?php if($data)
											{
												$value=$data->note;
											}
											else
											{
												$value=set_value('note');
											} ?>
											<?= form_input(['name'=>'note','class'=>'form-control m-input','value'=>$data->note]);?>
											<div class="form-error"><?= form_error('note'); ?></div>
										</div>
									</div>
								</div>
								<div class="form-field-container d-flex justify-content-between align-items-center mb-2">
									<h3 class="mb-0"><?php echo $this->lang->line('File_Upload'); ?></h3>
									<span class="add_attachment" onclick="addAttachment()" style="cursor:pointer; text-decoration: underline;">
										Add Attachment
									</span>
								</div>		
	
								<!-- Hidden file input for selecting files -->
								<input type="file" id="fileInput" style="display: none;" onchange="handleFileSelect(event)">
								<div class="col responsive-table-container">
									<div class="file-attachments">
										<?php 
										$case_id_add = $this->db->select_max('id')
											->get('c_case')
											->row_array();
										$case_id_add = $case_id_add['id'] + 1;
										$cisd = isset($data->id) ? $data->id  : $case_id_add;
										$files = $this->db->select('*')->where("(temp_app_id = '$doc_id'  AND cat_id = 1)", NULL, FALSE)->get('document')->result_array();
										foreach ($files as $files) { ?>
											<div class="docloopa">
												<?php	
												$emp=$this->db->select('*')->where('id',$files['user_id'])->get('users')->row_array();
												echo "<b>" . $files['name']."</b>";
												if($emp){ echo "<span class='empnm'>(Uploaded By ".$emp['name'].")</span>";} ?>
												<span class="dwndelbtn">
													<a href="<?=base_url('uploads/case_file/' . $files["name"]);?>" class='btn btn-success btn-sm' download>
														<?php echo $this->lang->line('Download');?>
													</a> 
													<!--<a href="<?=base_url('front/delete_upload_files/' . $files["name"].'/'.$cisd);?>" class='btn btn-danger btn-sm'>Delete</a>-->
												</span>
											</div>
										<?php }?>
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
							</div>
						</div>
					</div>
				</form>
 			</div>
		</div>
	</div>
<span class="type" id="case"></span> 
 <span class="sessionid" id="<?php echo $this->session->userdata('user_id'); ?>"></span>
  <span class="audioid" id="<?php echo $doc_id; ?>"></span>
<span class="audioocaseid" id="<?php echo $doc_id; ?>"></span>
<?php //if($data) { include "footer.php"; } 
include "footer.php";  ?>

<script src="<?=base_url('assets/js/jquery-1.12.3.min.js');?>"></script>
<script src="<?= base_url('assets/js/audio/jquery.js'); ?>"></script>
<script src="<?= base_url('assets/js/audio/app.js'); ?>"></script>
<script src="<?= base_url('assets/js/audio/Fr.voice.js'); ?>"></script>
<script src="<?= base_url('assets/js/audio/libmp3lame.min.js'); ?>"></script>
<script src="<?= base_url('assets/js/audio/mp3Worker.js'); ?>"></script>
<script src="<?= base_url('assets/js/audio/recorder.js'); ?>"></script>
<link href=<?php echo base_url('assets/css/uploadfile.css'); ?> rel="stylesheet">
<script src=<?php echo base_url('assets/js/jquery.uploadfile.min.js'); ?>></script> 
<?php 
$case_id_add = $this->db->select_max('id')
	->get('c_case')
	->row_array();
$case_id_add = $case_id_add['id'] + 1;
$cisd = isset($data->id) ? $data->id  : $case_id_add;
?>
<script src="<?= base_url('assets/js/hijri/jquery.calendars.js') ?>"></script>
<script src="<?= base_url('assets/js/hijri/jquery.calendars.plus.min.js') ?>"></script>
<script src="<?= base_url('assets/js/hijri/jquery.plugin.min.js') ?>"></script>
<script src="<?= base_url('assets/js/hijri/jquery.calendars.picker.js') ?>"></script>
<script src="<?= base_url('assets/js/hijri/jquery.calendars.ummalqura.min.js') ?>"></script>
<link href="<?= base_url('assets/js/hijri/jquery.calendars.picker.css') ?>" rel="stylesheet"/>

<script>
/*(function($) {
	'use strict';
	$.calendars.calendars.islamic.prototype.regionalOptions.ar = {
		name: 'Islamic',
		epochs: ['BAM', 'AM'],
		monthNames: 'محرم_صفر_ربيع الأول_ربيع الثاني_جمادى الأول_جمادى الآخر_رجب_شعبان_رمضان_شوال_ذو القعدة_ذو الحجة'.split('_'),
		monthNamesShort: 'محرم_صفر_ربيع1_ربيع2_جمادى1_جمادى2_رجب_شعبان_رمضان_شوال_القعدة_الحجة'.split('_'),
		dayNames: ['الأحد', 'الإثنين', 'الثلاثاء', 'الأربعاء', 'الخميس', 'الجمعة', 'السبت'],
		dayNamesShort: 'أحد_إثنين_ثلاثاء_أربعاء_خميس_جمعة_سبت'.split('_'),
		dayNamesMin: 'ح_ن_ث_ر_خ_ج_س'.split('_'),
		digits: $.calendars.substituteDigits(['٠', '١', '٢', '٣', '٤', '٥', '٦', '٧', '٨', '٩']),
		dateFormat: 'dd/mm/yyyy',
		firstDay: 1,
		isRTL: true
	};
})(jQuery);*/

function addAttachment() {
    document.getElementById('fileInput').click();
}

function handleFileSelect(event) {
    const file = event.target.files[0];
    if (!file) return;

    const fileContainer = document.createElement('div');
    fileContainer.classList.add('docloopa');

    const fileName = document.createElement('b');
    fileName.textContent = file.name;

    const actionButtons = document.createElement('span');
    actionButtons.className = 'dwndelbtn';

    const dummyDownload = document.createElement('a');
    dummyDownload.href = '#';
    dummyDownload.className = 'btn btn-secondary btn-sm disabled';
    dummyDownload.textContent = 'Download';

    actionButtons.appendChild(dummyDownload);

    fileContainer.appendChild(fileName);
    // fileContainer.appendChild(uploadedBy);
    fileContainer.appendChild(actionButtons);

    document.querySelector('.file-attachments').appendChild(fileContainer);
}

 (function ($) {
	'use strict';
	$.calendars.calendars.ummalqura.prototype.regionalOptions.ar = {
		name: 'UmmAlQura', // The calendar name
		epochs: ['BAM', 'AM'],
		monthNames: 'محرم_صفر_ربيع الأول_ربيع الثاني_جمادى الأول_جمادى الآخر_رجب_شعبان_رمضان_شوال_ذو القعدة_ذو الحجة'.split('_'),
		monthNamesShort: 'محرم_صفر_ربيع1_ربيع2_جمادى1_جمادى2_رجب_شعبان_رمضان_شوال_القعدة_الحجة'.split('_'),
		dayNames: ['الأحد', 'الإثنين', 'الثلاثاء', 'الأربعاء', 'الخميس', 'الجمعة', 'السبت'],
		dayNamesShort: 'أحد_إثنين_ثلاثاء_أربعاء_خميس_جمعة_سبت'.split('_'),
		dayNamesMin: 'ح_ن_ث_ر_خ_ج_س'.split('_'),
		digits: $.calendars.substituteDigits(['٠', '١', '٢', '٣', '٤', '٥', '٦', '٧', '٨', '٩']),
		dateFormat: 'dd/mm/yyyy',
		firstDay: 1,
		isRTL: true
	};
})(jQuery);

$('#case_start_date').calendarsPicker({
  calendar: $.calendars.instance('<?php if($this->session->userdata('site_lang')=="arabic" ) echo "ummalqura"; else echo ""; ?>','<?php if($this->session->userdata('site_lang')=="arabic" ) echo "ar"; else echo "en"; ?>'),
        showOtherMonths: true, 
        dateFormat: 'dd/mm/yyyy',
        minDate:0, 
       <?php if($this->session->userdata('site_lang')=="arabic" ) { ?> 
     //   defaultDate: +1,
        <?php } ?>
        selectDefaultDate:true,
  onSelect: function (date) {
	
  }
});
$(document).ready(function()
{
	
	$("#image").uploadFile({
	url:"<?=base_url('front/modify_upload_file');?>",
	fileName:"image",
	dragDropStr: "<div class='drage-file'><b><?php echo $this->lang->line('Drag_the_files_here');?></div>",
    abortStr:"Cancel",
    statusBarWidth:300,
	formData: {"fid":'<?php echo $doc_id; ?>',"cat_id":1},
    dragdropWidth:420,
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
	url:"<?=base_url('front/modify_upload_file');?>",
	fileName:"image",
	dragDropStr: "<div class='drage-file'><b><?php echo $this->lang->line('Drag_the_files_here');?></div>",
    abortStr:"Cancel",
    statusBarWidth:300,
	formData: {"fid":'<?php echo $doc_id; ?>',"cat_id":2},
    dragdropWidth:420,
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
	url:"<?=base_url('front/modify_upload_file');?>",
	fileName:"image",
	dragDropStr: "<div class='drage-file'><b><?php echo $this->lang->line('Drag_the_files_here');?></div>",
    abortStr:"Cancel",
    statusBarWidth:300,
	formData: {"fid":'<?php echo $doc_id; ?>',"cat_id":3},
    dragdropWidth:360,
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
	url:"<?=base_url('front/modify_upload_file');?>",
	fileName:"image",
	dragDropStr: "<div class='drage-file'><b><?php echo $this->lang->line('Drag_the_files_here');?></div>",
    abortStr:"Cancel",
    statusBarWidth:300,
	formData: {"fid":'<?php echo $doc_id; ?>',"cat_id":4},
    dragdropWidth:360,
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
	url:"<?=base_url('front/modify_upload_file');?>",
	fileName:"image",
	dragDropStr: "<div class='drage-file'><b><?php echo $this->lang->line('Drag_the_files_here');?></div>",
    abortStr:"Cancel",
    statusBarWidth:300,
	formData: {"fid":'<?php echo $doc_id; ?>',"cat_id":5},
    dragdropWidth:360,
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
	url:"<?=base_url('front/modify_upload_file');?>",
	fileName:"image",
	dragDropStr: "<div class='drage-file'><b><?php echo $this->lang->line('Drag_the_files_here');?></div>",
    abortStr:"Cancel",
    statusBarWidth:300,
	formData: {"fid":'<?php echo $doc_id; ?>',"cat_id":6},
    dragdropWidth:360,
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
	url:"<?=base_url('front/modify_upload_file');?>",
	fileName:"image",
	dragDropStr: "<div class='drage-file'><b><?php echo $this->lang->line('Drag_the_files_here');?></div>",
    abortStr:"Cancel",
    statusBarWidth:300,
	formData: {"fid":'<?php echo $doc_id; ?>',"cat_id":7},
    dragdropWidth:360,
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
$('#service_types').on('change', function() {
var url="<?= base_url('front/ajax_case_type'); ?>"; 
var id = this.value;
$.ajax({
  type:'ajax',
  method:'post',
  url:url,
  data:{"id" : id},
  success:function(data){
 
	$('#case_type').html(data);
  },
});
});
</script>
	<script>
$(document).ready(function() {
	   setInterval(function(){
 
	var url="<?=base_url('front/read_notification_status');?>";
   $.ajax({
		type:'ajax',
		method:'post',
		url:url,
		success:function(data){
		  $('.noticount').html(data);
		}
	});
	}, 1000);
});
</script>
<?php //if(!$data) { include "footer.php"; } ?>