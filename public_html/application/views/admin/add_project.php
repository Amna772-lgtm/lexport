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
        }.in_fo {
    padding: 20px;
}
    </style>
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
.ajax-file-upload-container:before {
    content: "Upload Area";
    background: #546eb2;
    text-align: left;
    color: #fff;
    position: absolute;
    width: 42%;
    padding: 10px;
    margin-top: 0px !important;
    font-size: 16px;
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
							<?php echo $this->lang->line('Project_planning');?>
						</h3>
					</div> -->
				</div>
			</div>
			 <!--begin::Form-->
			 <?php echo form_open_multipart('admin/project/store_project',['id'=>'customer','class'=>'m-form m-form--fit m-form--label-align-right m-form--group-seperator-dashed']);
			if($data)
			{
				echo form_hidden('id',$data->id); 
				$id = $data->id;
				$cisd= $data->id;
				$doc_id  = $data->doc_id;
				echo form_hidden('doc_id',$data->doc_id); 
			}
			else
			{
				echo form_hidden('id',''); 
				$id = 0; $cisd=0;
				$doc_id = "DI".rand();
				echo form_hidden('doc_id',$doc_id); 
			}
			?>
			<div class="row">
				<div class="col-lg-8">
					<div class="m-portlet__body theme-inner-form">
            			<div class="form-field-container">
							<div class="d-flex justify-content-between align-items-center">
								<h3><?php echo $this->lang->line('Project');?></h3>
								
								<!-- Save Button (Aligned to the Right) -->
								<?php $submit = $this->lang->line('Save'); ?>
								<?= form_submit(['id' => 'addcustomer', 'value' => $submit, 'class' => 'btn btn-primary btn-lg']); ?>
							</div>

							<div class="form-group m-form__group row">
								<div class="form-group col-sm-4">
									<label for="project_name" class=" form-control-label"><?php echo $this->lang->line('Project_Name');?></label>
									<?php if($data)
									{
										$value=$data->project_name;
									}
									else
									{
										$value=set_value('project_name');
									} ?>
									<?= form_input(['name'=>'project_name','class'=>'form-control','value'=>$value]);?>
									<div class="form-error"><?= form_error('project_name'); ?></div>
								</div>

								<div class="form-group col-sm-4">
									<label for="project_type" class=" form-control-label"><?php echo $this->lang->line('Project_Type');?>(Master)</label>
									<?php if($data)
									{
										$value=$data->project_type;
									}
									else
									{
										$value=set_value('project_type');
									} ?>
									<select name="project_type" id="project_type" class="form-control" required>
									<option value=""><?php echo $this->lang->line('Please_select_Group');?>*</option>
									<?php foreach(getProjectList() as $froups) { ?>
									<option value="<?= $froups['id']; ?>"<?php if($value==$froups['id']) echo "selected=selected";?>><?= $froups['name']; ?></option>
									<?php } ?>
									</select>
									
									<div class="form-error"><?= form_error('project_type'); ?></div>
								</div>

								<div class="form-group col-sm-4">
									<label for="project_relation" class="form-control-label"><?php echo $this->lang->line('Project_Relation'); ?></label>
									
									<?php 
									if ($data) {
										$value = $data->project_relation;  // Get existing project relation
									} else {
										$value = set_value('project_relation'); // Set user input if form fails
									}
									?>

									<select class="form-control" id="type" name="project_relation">
										<option value=""><?php echo $this->lang->line('Select_Relation'); ?></option> 
										<option value="Session" <?= ($value == 'Session') ? 'selected' : ''; ?>><?php echo $this->lang->line('Session'); ?></option> 
										<option value="Visiting" <?= ($value == 'Visiting') ? 'selected' : ''; ?>><?php echo $this->lang->line('Visiting'); ?></option> 
										<option value="Writings" <?= ($value == 'Writings') ? 'selected' : ''; ?>><?php echo $this->lang->line('Writings'); ?></option> 
										<option value="Consultation" <?= ($value == 'Consultation') ? 'selected' : ''; ?>><?php echo $this->lang->line('Consultation'); ?></option> 
										<option value="Ceneral" <?= ($value == 'Ceneral') ? 'selected' : ''; ?>><?php echo $this->lang->line('GENERAL'); ?></option>
										<option value="Contracts and Agreements" <?= ($value == 'Contracts and Agreements') ? 'selected' : ''; ?>><?php echo $this->lang->line('Contracts and Agreements'); ?></option>
										<option value="Consultancy and Legal_Studies" <?= ($value == 'Consultancy and Legal_Studies') ? 'selected' : ''; ?>><?php echo $this->lang->line('Consultancy and Legal_Studies'); ?></option>
										<option value="Commercial Business" <?= ($value == 'Commercial Business') ? 'selected' : ''; ?>><?php echo $this->lang->line('Commercial Business'); ?></option>
										<option value="Litigation" <?= ($value == 'Litigation') ? 'selected' : ''; ?>><?php echo $this->lang->line('Litigation'); ?></option>
										<option value="Execution_of_judgments_n_collection_of_debts" <?= ($value == 'Execution_of_judgments_n_collection_of_debts') ? 'selected' : ''; ?>><?php echo $this->lang->line('Execution_of_judgments_n_collection_of_debts'); ?></option>
										<option value="Liquidation_of_inheritance_n_management_of_endowments" <?= ($value == 'Liquidation_of_inheritance_n_management_of_endowments') ? 'selected' : ''; ?>><?php echo $this->lang->line('Liquidation_of_inheritance_n_management_of_endowments'); ?></option>
										<option value="Authentication" <?= ($value == 'Authentication') ? 'selected' : ''; ?>><?php echo $this->lang->line('Authentication'); ?></option>
										<option value="Arbitration and Mediation" <?= ($value == 'Arbitration and Mediation') ? 'selected' : ''; ?>><?php echo $this->lang->line('Arbitration and Mediation'); ?></option>
										<option value="Executions" <?= ($value == 'Executions') ? 'selected' : ''; ?>><?php echo $this->lang->line('Executions'); ?></option>
									</select>

									<div class="form-error"><?= form_error('project_relation'); ?></div>
								</div>

							</div>
						</div>

						<div class="form-field-container">
							<h3><?php echo $this->lang->line('Project_Management');?></h3>
							<div class="form-group m-form__group row">
								<div class="form-group col-sm-6">
									<label for="add_group" class=" form-control-label"><?php echo $this->lang->line('Select_Group');?></label>
									<?php if($data)
									{
										$value=$data->add_group;
									}
									else
									{
										$value=set_value('add_group');
									} ?>
									<select name="add_group" id="add_group" class="form-control" required>
									<option value=""><?php echo $this->lang->line('Please_select_Group');?>*</option>
									<?php foreach(getGroupList() as $froups) { ?>
									<option value="<?= $froups['id']; ?>"<?php if($value==$froups['id']) echo "selected=selected";?>><?= $froups['name']; ?></option>
									<?php } ?>
									</select>
									<div class="form-error"><?= form_error('add_group'); ?></div>
								</div>
								<div class="form-group col-sm-6">
									<label for="project_team_manager" class=" form-control-label"><?php echo $this->lang->line('Project_Team_Manager');?></label>
									<?php if($data)
									{
										$value=$data->project_team_manager;
									}
									else
									{
										$value=set_value('project_team_manager');
									} ?>
									
									<select class="form-control" id="" name="project_team_manager" required><option value=""><?php echo $this->lang->line('Select_Employee');?> </option><?php  foreach ($employees as $employee) { ?><option value="<?php echo $employee["id"]?>"  <?php if($value ==  $employee["id"]) echo "selected=selected";?>><?php echo $employee["name"]?></option><?php } ?></select>
									<div class="form-error"><?= form_error('project_team_manager'); ?></div>
								</div>

								<div class="form-group col-sm-6">
									<label for="project_number" class=" form-control-label"><?php echo $this->lang->line('Project_Number');?></label>
									<?php if($data)
									{
										$value=$data->project_number;
									}
									else
									{
										$value=set_value('project_number');
									} ?>
									<?= form_input(['name'=>'project_number','class'=>'form-control','value'=>$value]);?>
									<div class="form-error"><?= form_error('project_number'); ?></div>
								</div>

								<div class="form-group col-sm-6">
									<?php if($data)
									{
										$value=$data->project_status;
									}
									else
									{
										$value=set_value('project_status');
									} ?>
									<label for="case" class=" form-control-label"><?php echo $this->lang->line('Project_Status');?></label>
									<select name="project_status" class="form-control">
										<option value=""><?php echo $this->lang->line('Please_Select_Task_Status');?></option>
										
											<option value="active"<?php if($value=="active") echo "selected=selected"; ?>><?php echo $this->lang->line('Active');?></option>
											<option value="inactive"<?php if($value=="inactive") echo "selected=selected"; ?>><?php echo $this->lang->line('Inactive');?></option>
											<option value="ending"<?php if($value=="ending") echo "selected=selected"; ?>><?php echo $this->lang->line('Ending');?></option>
											<option value="reactive"<?php if($value=="reactive") echo "selected=selected"; ?>><?php echo $this->lang->line('Reactive');?></option>
											<option value="other"<?php if($value=="other") echo "selected=selected"; ?>><?php echo $this->lang->line('Other');?></option>
										
									</select><div class="form-error"><?= form_error('project_status'); ?></div>
								</div>
							
							</div>
						</div>

						<div class="form-field-container">
							<h3><?php echo $this->lang->line('Project_Time_line');?></h3>
							<div class="form-group m-form__group row">
								<div class="form-group col-sm-4">
									<label for="starting_date" class="form-control-label"><?php echo $this->lang->line('Starting_Date');?></label>
									<?php if($data) {
										$value = $data->starting_date;
									} else {
										$value = set_value('starting_date');
									} ?>
									<?= form_input(['name'=>'starting_date', 'readonly'=>'readonly', 'id'=>'starting_date', 'class'=>'form-control', 'value'=>$value]);?>
									<div class="form-error"><?= form_error('starting_date'); ?></div>
								</div>

								<div class="form-group col-sm-4">
									<label for="ending_date" class="form-control-label"><?php echo $this->lang->line('Ending_Date');?></label>
									<?php if($data) {
										$value = $data->ending_date;
									} else {
										$value = set_value('ending_date');
									} ?>
									<?= form_input(['name'=>'ending_date', 'id'=>"ending_date", 'class'=>'form-control', 'value'=>$value]);?>
									<div class="form-error"><?= form_error('ending_date'); ?></div>
								</div>


								<div class="form-group col-sm-4">
									<label for="start_time" class=" form-control-label"><?php echo $this->lang->line('Start_Time');?></label>
									<?php if($data)
									{
										$value=$data->start_time;
									}
									else
									{
										$value=set_value('start_time');
									} ?>
									<?= form_input(['name'=>'start_time','id'=>'start_time','class'=>'form-control','value'=>$value]);?>
									<div class="form-error"><?= form_error('start_time'); ?></div>
								</div>


								<div class="form-group col-sm-4">
									<label for="ending_time" class="form-control-label"><?php echo $this->lang->line('Ending_Time');?></label>
									<?php if($data) {
										$value = $data->ending_time;
									} else {
										$value = set_value('ending_time');
									} ?>
									<?= form_input(['name'=>'ending_time','id'=>'ending_time', 'class'=>'form-control', 'value'=>$value]);?>
									<div class="form-error"><?= form_error('ending_time'); ?></div>
								</div>
							</div>
						</div>

						<div class="form-field-container">
							<h3><?php echo $this->lang->line('Project_Notes');?></h3>
							<div class="form-group m-form__group row">
								<div class="form-group col-sm-12">
									<div class="addnewhtml">
									<?php if($data) { foreach($note_data as $cn) { ?>
										<div class="alert alert-<?php if($cn['role_id'] == 1) echo "info"; if($cn['role_id'] == 2) echo "warning"; if($cn['role_id'] == 4) echo "success"; ?>">
										<?php echo $cn['note']; ?> <small><i class="float-right"><?php echo getEmployeeName($cn['user_id']);?> &nbsp;<?php $timestamp = strtotime($cn['create_date']); echo  date("d M Y G:i",$timestamp);?></i></small>
										</div>
									<?php } } ?>
									</div>	
									<input value="" id="comment" class="form-control"/>
									<span class="commenterror" style="color:red"></span>
									<br>
									<a href="javascript:;" class="btn btn-success btn-lg" id="btncmt"><?php echo $this->lang->line('Add_New_Note');?></a>
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
											<div class="upload-block">
												<div id="image"></div> <div class="upload-area"></div>
											</div>
											</div>
												</div>
								
												<br>

											</div>
											<div class="col-lg-12 col-md-12 col-sm-12">
												<div class="m-portlet__head2" style="margin-top: 10px;"><?php echo $this->lang->line('Attached_files');?></div>
												<div class="m_bo" style="padding: 10px;">
												<?php
												$files = $this->db->select('*')->where("(temp_app_id = '$cisd' AND cat_id = 1 AND type='project')", NULL, FALSE)->get('document')->result_array();
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

									<div class="tab-pane" id="m_tabs_1_2" role="tabpanel">
										<div class="row">

											<div class="col-lg-12 col-md-12 col-sm-12">

											<div class="attced-block case-block">
											<div class="upload-block">
												<div id="data"></div> <div class="upload-area"></div>
											</div>
											</div>
												</div>
								
												<br>

											</div>
											<div class="col-lg-12 col-md-12 col-sm-12">
												<div class="m-portlet__head2" style="margin-top: 10px;"><?php echo $this->lang->line('Attached_files');?></div>
												<div class="m_bo" style="padding: 10px;">
												<?php
												$files = $this->db->select('*')->where("(temp_app_id = '$cisd' AND cat_id = 2  AND type='project')", NULL, FALSE)->get('document')->result_array();
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
												$files = $this->db->select('*')->where("(temp_app_id = '$cisd' AND cat_id = 4  AND type='project')", NULL, FALSE)->get('document')->result_array();
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
											<div class="upload-block">
												<div id="procuation"></div> <div class="upload-area"></div>
											</div>
											</div>
												</div>
								
												<br>

											</div>
											<div class="col-lg-12 col-md-12 col-sm-12">
												<div class="m-portlet__head2" style="margin-top: 10px;"><?php echo $this->lang->line('Attached_files');?></div>
												<div class="m_bo" style="padding: 10px;">
												<?php
											
												$files = $this->db->select('*')->where("(temp_app_id = '$cisd' AND cat_id = 6  AND type='project')", NULL, FALSE)->get('document')->	result_array();
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
											<div class="upload-block">
												<div id="referrals"></div> <div class="upload-area"></div>
											</div>
											</div>
												</div>
								
												<br>

											</div>
											<div class="col-lg-12 col-md-12 col-sm-12">
												<div class="m-portlet__head2" style="margin-top: 10px;"><?php echo $this->lang->line('Attached_files');?></div>
												<div class="m_bo" style="padding: 10px;">
												<?php
											$files = $this->db->select('*')->where("(temp_app_id = '$cisd' AND cat_id = 7 AND type='project')", NULL, FALSE)->get('document')->result_array();
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
												$files = $this->db->select('*')->where("(temp_app_id = '$cisd' AND cat_id = 3)", NULL, FALSE)->get('document')->result_array();
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
					</div>
				</div>

				<div class="col-lg-4 d-flex flex-column">
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
    width: 47%;
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
<link href=<?php echo base_url('assets/css/uploadfile.css'); ?> rel="stylesheet">
<script src=<?php echo base_url('assets/js/jquery.uploadfile.min.js'); ?>></script>
<script src="https://cdn.ckeditor.com/4.11.1/standard/ckeditor.js"></script>
<script>
	CKEDITOR.replace( 'report' );
</script>
<script type="text/javascript">

jQuery('#btncmt').on('click', function (e) {
var note = $("#comment").val();
if(note == ''){
	$('.commenterror').html("Comment field is empty");
	return false;
}
var app_id = <?php  if($data) echo $data->id; else echo "0"; ?>; 
var url="<?= base_url('admin/assignment/add_note'); ?>"; 
jQuery.ajax({
type:'ajax',
method:'post',
url:url,
data: {'note':note,'case_id':'0','type':'project','app_id':app_id},
success:function(data){
$('.commenterror').html("");
$('.addnewhtml').append(data);
$('#comment').val('');
},
});
});
$(document).ready(function()
{
$('#success').hide();
$('#starting_date, #ending_date').datetimepicker({ language: 'ar', format: 'yyyy-mm-dd',  minView: 2, pickTime: false, autoclose: true,startDate: new Date()});
$(document).ready(function(){
  $("#start_time,#ending_time").datetimepicker({
    pickDate: false,
    minuteStep: 15,
    pickerPosition: 'bottom-right',
    format: 'HH:ii p',
    autoclose: true,
    showMeridian: true,
    startView: 1,
    maxView: 1,
  });

  // Function to convert time string to Date object for comparison
	function parseTime(timeStr) {
	const [time, modifier] = timeStr.split(' ');
	let [hours, minutes] = time.split(':');
	hours = parseInt(hours, 10);
	minutes = parseInt(minutes, 10);

	if (modifier == 'pm' && hours !== 12) {
		hours += 12;
	}
	if (modifier == 'am' && hours === 12) {
		hours = 0;
	}

	const date = new Date();
	date.setHours(hours);
	date.setMinutes(minutes);
	date.setSeconds(0);
	return date;
	}

	// Compare times on change
	$('#start_time, #ending_time').on('change', function () {
		const startDate = $('#starting_date').val();
		const endDate = $('#ending_date').val();
		const start = $('#start_time').val();
		const end = $('#ending_time').val();

		if ( startDate != '' && ( startDate == endDate ) && start != '' && end != '' ) {
			const startTime = parseTime(start);
			const endTime = parseTime(end);

			if (endTime <= startTime) {
			alert("Ending time must be greater than start time!");
			$('#ending_time').val(''); // Clear ending time
			}
		}
	});

  });

	// Validation for dates and times
	$('#ending_date').on('change', function() {
        var startDate = $('#starting_date').val();
        var endDate = $(this).val();

        if (endDate < startDate) {
            alert("Ending date cannot be less than starting date.");
            $(this).val(''); // Clear the invalid ending date
        }
    });
});


$(document).ready(function()
{
	$("#image").uploadFile({
	url:"<?=base_url('admin/c_case/admin_modify_upload_file');?>",
	fileName:"image",
	dragDropStr: "<div class='drage-file'><b><?php echo $this->lang->line('Drag_the_files_here');?></div>",
    abortStr:"Cancel",
    statusBarWidth:300,
	formData: {"fid":<?php echo $cisd; ?>,"cat_id":1,"customer_id":"<?php echo $id; ?>","type":"project"},
    dragdropWidth:340,
	uploadStr:"<?php echo $this->lang->line('Or_click_here_to_view_the_files');?>",
	acceptFiles:".csv, application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, application/vnd.ms-excel,.pdf,.doc,.docx,image/*"
	});
	$("#data").uploadFile({
	url:"<?=base_url('admin/c_case/admin_modify_upload_file');?>",
	fileName:"image",
	dragDropStr: "<div class='drage-file'><b><?php echo $this->lang->line('Drag_the_files_here');?></div>",
    abortStr:"Cancel",
    statusBarWidth:390,
	formData: {"fid":<?php echo $cisd; ?>,"cat_id":2,"customer_id":<?php echo $id; ?>,"type":"project"},
    dragdropWidth:340,
	uploadStr:"<?php echo $this->lang->line('Or_click_here_to_view_the_files');?>",
	acceptFiles:".csv, application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, application/vnd.ms-excel,.pdf,.doc,.docx,image/*"
	});
	$("#contaract").uploadFile({
	url:"<?=base_url('admin/c_case/admin_modify_upload_file');?>",
	fileName:"image",
	dragDropStr: "<div class='drage-file'><b><?php echo $this->lang->line('Drag_the_files_here');?></div>",
    abortStr:"Cancel",
    statusBarWidth:300,
	formData: {"fid":<?php echo $cisd; ?>,"cat_id":3,"customer_id":<?php echo $id; ?>,"type":"project"},
    dragdropWidth:340,
	uploadStr:"<?php echo $this->lang->line('Or_click_here_to_view_the_files');?>",
	acceptFiles:".csv, application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, application/vnd.ms-excel,.pdf,.doc,.docx,image/*"
	});
	$("#report").uploadFile({
	url:"<?=base_url('admin/c_case/admin_modify_upload_file');?>",
	fileName:"image",
	dragDropStr: "<div class='drage-file'><b><?php echo $this->lang->line('Drag_the_files_here');?></div>",
    abortStr:"Cancel",
    statusBarWidth:300,
	formData: {"fid":<?php echo $cisd; ?>,"cat_id":4,"customer_id":<?php echo $id; ?>,"type":"project"},
    dragdropWidth:340,
	uploadStr:"<?php echo $this->lang->line('Or_click_here_to_view_the_files');?>",
	acceptFiles:".csv, application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, application/vnd.ms-excel,.pdf,.doc,.docx,image/*"
	});
	$("#procuation").uploadFile({
	url:"<?=base_url('admin/c_case/admin_modify_upload_file');?>",
	fileName:"image",
	dragDropStr: "<div class='drage-file'><b><?php echo $this->lang->line('Drag_the_files_here');?></div>",
    abortStr:"Cancel",
    statusBarWidth:300,
	formData: {"fid":<?php echo $cisd; ?>,"cat_id":6,"customer_id":<?php echo $id; ?>,"type":"project"},
    dragdropWidth:340,
	uploadStr:"<?php echo $this->lang->line('Or_click_here_to_view_the_files');?>",
	acceptFiles:".csv, application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, application/vnd.ms-excel,.pdf,.doc,.docx,image/*"
	});
	$("#referrals").uploadFile({
	url:"<?=base_url('admin/c_case/admin_modify_upload_file');?>",
	fileName:"image",
	dragDropStr: "<div class='drage-file'><b><?php echo $this->lang->line('Drag_the_files_here');?></div>",
    abortStr:"Cancel",
    statusBarWidth:300,
	formData: {"fid":<?php echo $cisd; ?>,"cat_id":7,"customer_id":<?php echo $id; ?>,"type":"project"},
    dragdropWidth:340,
	uploadStr:"<?php echo $this->lang->line('Or_click_here_to_view_the_files');?>",
	acceptFiles:".csv, application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, application/vnd.ms-excel,.pdf,.doc,.docx,image/*"
	});
	$("#tuning").uploadFile({
	url:"<?=base_url('admin/c_case/admin_modify_upload_file');?>",
	fileName:"image",
	dragDropStr: "<div class='drage-file'><b><?php echo $this->lang->line('Drag_the_files_here');?></div>",
    abortStr:"Cancel",
    statusBarWidth:300,
	formData: {"fid":<?php echo $cisd; ?>,"cat_id":5,"customer_id":<?php echo $id; ?>,"type":"project"},
    dragdropWidth:340,
	uploadStr:"<?php echo $this->lang->line('Or_click_here_to_view_the_files');?>",
	acceptFiles:".csv, application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, application/vnd.ms-excel,.pdf,.doc,.docx,image/*"
	});
	
});





</script>
