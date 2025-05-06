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
            text-transform: uppercase;
            padding: 10px;
            -webkit-border-top-left-radius: 20px !important;
            -webkit-border-top-right-radius: 20px !important;
            -moz-border-radius-topleft: 20px !important;
            -moz-border-radius-topright: 20px !important;
            border-top-left-radius: 20px !important;
            border-top-right-radius: 20px !important;
            margin: 30px 30px 0 30px;
        }
        .in_fo{
            box-shadow: 0px 5px 10px 0px #cccccc !important;
            margin: 0 30px;
            padding-bottom: 25px;
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
    </style>

    <div class="m-grid__item m-grid__item--fluid m-wrapper">
		<div style="position:absolute;">
			<img class="custom-search-icon" src="/assets/images/img/search-icon.svg" alt="Search">
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
                                <?php echo $this->lang->line('ADD_E_SERVICES');?>
                            </h3>
                        </div>
                    </div> -->
                </div>

                <!--begin::Form-->
				<form class="m-form m-form--fit m-form--label-align-right m-form--group-seperator-dashed" enctype="multipart/form-data" method="post" accept-charset="utf-8"> 
					<?php
					$doc_id = 'DI' . mt_rand(1000000000, 9999999999);
					?>
					<input type="hidden" name="doc_id" value="<?php echo $doc_id; ?>">
					<?php  
					$value=set_value('case_date',date('d/m/Y'));
					echo form_hidden('case_date',$value);
					

					$id=$this->uri->segment(4); 	
					$cisd=0;
					$case_id=getCaseID();

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
												} 
												?>
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

												$cnomain = getCaseNumber(0);
												if($data)
												{
													$value3=$data->case_number;
												}
												else
												{
													$value3=set_value('case_number',$cnomain);
												} 
									
											?>
											
											<?= form_input(['name'=>'case_number','class'=>'form-control','value'=>$value3,'readonly'=>'readonly']);?>
											<div class="form-error"><?= form_error('case_number'); ?></div>
										</div>
										<div class="form-group col-sm-4">
											<label for="contract_number" class=" form-control-label"><?php echo $this->lang->line('Contract_number');?></label>
											<?php if($data)
											{
												$value=$data->contract_number;
											}
											else
											{
												$value=set_value('contract_number',"C".$cnomain);
											} ?>
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
	<style>
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
    width: 23.7%;
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
 <script type="text/javascript">
$( document ).ready(function() {
	var id=<?php echo $id;?>;
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
		error:function(){

$('#name').attr('readonly', false);
$('#id_type').attr('readonly', false);
$('#id_numbers').attr('readonly', false);
$('#identification_types ').attr('disabled', false);
$("#name").val("");
$("#id_type").val("");
$("#id_numbers").val("");
$('#identification_types option[value="0"]').attr('selected','selected');

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

function addAttachment(containerId = 'attachment-container', listId = 'attachment-list') {
    const attachmentContainer = document.getElementById(containerId);
    const attachmentList = document.getElementById(listId);

    // Create hidden input
    const input = document.createElement('input');
    input.type = 'file';
    input.name = 'attachments[]';
    input.className = 'd-none';
    document.body.appendChild(input);

    input.addEventListener('change', function () {
        const fileName = input.files[0]?.name;
        if (fileName) {
            // Show styled box
            attachmentContainer.style.display = 'block';
            attachmentContainer.style.padding = '5px 12px';

            const wrapper = document.createElement('div');
            wrapper.className = 'd-flex justify-content-between align-items-center mb-2';

            const fileLabel = document.createElement('span');
            fileLabel.textContent = fileName;
            fileLabel.className = 'ms-2';

            const deleteIcon = document.createElement('a');
            deleteIcon.href = 'javascript:;';
            deleteIcon.className = 'fa fa-trash text-danger';
            deleteIcon.title = 'Delete';
            deleteIcon.onclick = function () {
                wrapper.remove();
                if (attachmentList.children.length === 0) {
                    attachmentContainer.style.display = 'none';
                }
            };

            wrapper.appendChild(fileLabel);
            wrapper.appendChild(deleteIcon);
            wrapper.appendChild(input);

            attachmentList.appendChild(wrapper);
        } else {
            input.remove(); // If user cancels
        }
    });

    input.click();
}

</script>
<script>
$(document).ready(function()
{
	$("#image").uploadFile({
	url:"<?=base_url('admin/c_case/admin_modify_upload_file');?>",
	fileName:"image",
	dragDropStr: "<div class='drage-file'><b><?php echo $this->lang->line('Drag_the_files_here');?></div>",
    abortStr:"Cancel",
    statusBarWidth:181,
	formData: {"fid":'<?php echo $doc_id; ?>',"cat_id":1,"customer_id":<?php echo $id; ?>},
    dragdropWidth:385,
    allowedTypes:"jpg,jpeg,png,gif,ico,mp3,m4a,ogg,wav,psd,xls,xlsx,odt,ppt,pptx,pps,ppsx,doc,docx,pdf",
	uploadStr:"<?php echo $this->lang->line('Or_click_here_to_view_the_files');?>",
	acceptFiles:".csv, application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, application/vnd.ms-excel,.pdf,.doc,.docx,image/*",
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
    statusBarWidth:385,
	formData: {"fid":'<?php echo $doc_id; ?>',"cat_id":2,"customer_id":<?php echo $id; ?>},
    dragdropWidth:385,
	uploadStr:"<?php echo $this->lang->line('Or_click_here_to_view_the_files');?>",
	allowedTypes:"jpg,jpeg,png,gif,ico,mp3,m4a,ogg,wav,psd,xls,xlsx,odt,ppt,pptx,pps,ppsx,doc,docx,pdf",
	acceptFiles:".csv, application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, application/vnd.ms-excel,.pdf,.doc,.docx,image/*",
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
    statusBarWidth:300,
	formData: {"fid":'<?php echo $doc_id; ?>',"cat_id":3,"customer_id":<?php echo $id; ?>},
    dragdropWidth:385,
	uploadStr:"<?php echo $this->lang->line('Or_click_here_to_view_the_files');?>",
	allowedTypes:"jpg,jpeg,png,gif,ico,mp3,m4a,ogg,wav,psd,xls,xlsx,odt,ppt,pptx,pps,ppsx,doc,docx,pdf",
	acceptFiles:".csv, application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, application/vnd.ms-excel,.pdf,.doc,.docx,image/*",
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
    statusBarWidth:300,
	formData: {"fid":'<?php echo $doc_id; ?>',"cat_id":4,"customer_id":<?php echo $id; ?>},
    dragdropWidth:385,
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
    statusBarWidth:300,
	formData: {"fid":'<?php echo $doc_id; ?>',"cat_id":6,"customer_id":<?php echo $id; ?>},
    dragdropWidth:385,
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
    statusBarWidth:300,
	formData: {"fid":'<?php echo $doc_id; ?>',"cat_id":7,"customer_id":<?php echo $id; ?>},
    dragdropWidth:385,
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
    statusBarWidth:300,
	formData: {"fid":'<?php echo $doc_id; ?>',"cat_id":5,"customer_id":<?php echo $id; ?>},
    dragdropWidth:385,
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

</script>
<script type="text/javascript">
$(document).ready(function()
{
$('#success').hide();
$('#case_date, #case_start_date, #referral_date, #verdict_date').datetimepicker({  format: 'dd/mm/yyyy',  minView: 2, pickTime: false, autoclose: true,startDate: new Date()});
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

$(document).ready(function() {
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
});
</script>