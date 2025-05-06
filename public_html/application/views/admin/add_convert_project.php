<?php
include('header.php');

?>

<style>
	.m-form.m-form--group-seperator-dashed .m-form__group {
		border-bottom: 0px dashed #ebedf2;
	}

	.thh h3 {
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

	.in_fo {
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

	.m-portlet .m-form.m-form--fit>.m-portlet__body {
		padding-bottom: 40px !important;
	}

	.nav {
		display: -webkit-box;
	}

	.in_fo {
		padding: 20px;
	}
</style>
<style>
	.button {
		display: inline-block;
		vertical-align: middle;
		margin: 0px 5px;
		padding: 5px 12px;
		cursor: pointer;
		outline: none;
		font-size: 13px;
		text-decoration: none !important;
		text-align: center;
		color: #fff;
		background-color: #4D90FE;
		background-image: linear-gradient(top, #4D90FE, #4787ED);
		background-image: -ms-linear-gradient(top, #4D90FE, #4787ED);
		background-image: -o-linear-gradient(top, #4D90FE, #4787ED);
		background-image: linear-gradient(top, #4D90FE, #4787ED);
		border: 1px solid #4787ED;
		box-shadow: 0 1px 3px #BFBFBF;
	}

	a.button {
		color: #fff;
	}

	.button:hover {
		box-shadow: inset 0px 1px 1px #8C8C8C;
	}

	.button.disabled {
		box-shadow: none;
		opacity: 0.7;
	}

	canvas {
		display: block;
	}

	.form-control:disabled,
	.form-control[readonly] {
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
		content: "Upload Area";
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
	}

	span.empnm {
		color: #5cb85c;
		margin-left: 5px;
		font-size: 12px;
	}

	.clear {
		clear: both;
	}

	.page-loader.bg-white {
		display: none;
	}
</style>

<div class="m-grid__item m-grid__item--fluid m-wrapper">


	<!-- END: Subheader -->
	<div class="m-content">

		<!--begin::Portlet-->
		<div class="m-portlet">
			<div class="m-portlet__head">
				<div class="m-portlet__head-caption">
					<div class="m-portlet__head-title">
						<h3 class="m-portlet__head-text">
							Convert Project
						</h3>
					</div>
				</div>
			</div>

			<!--begin::Form-->
			<?php echo form_open_multipart('admin/project/store_convert_project', ['id' => 'customer', 'class' => 'm-form m-form--fit m-form--label-align-right m-form--group-seperator-dashed']);
			echo form_open_multipart('admin/project/store_convert_project', ['id' => 'customer']);
			if ($data) {
				echo form_hidden('id', $data->id);
			} else {
				echo form_hidden('id', '');
			}
			?>
			<div class=" ">

				<div class="row thh">
					<div class="col-lg-12">
						<h3>Customer Information</h3>
					</div>
				</div>
				<div class="in_fo">
					<div class="form-group m-form__group row">
						<div class="form-group col-sm-4">
							<label for="project_number" class=" form-control-label">Project Number</label>
							<?php if ($data) {
								$value = $data->project_number;
							} else {
								$value = set_value('project_number');
							} ?>
							<?= form_input(['name' => 'project_number', 'class' => 'form-control', 'value' => $value]); ?>
							<div class="form-error"><?= form_error('project_number'); ?></div>
						</div>

						<div class="form-group col-sm-4">
							<label for="employee_name" class=" form-control-label">Employee Name</label>
							<?php if ($data) {
								$value = $data->employee_name;
							} else {
								$value = set_value('employee_name');
							} ?>
							<?= form_input(['name' => 'employee_name', 'class' => 'form-control', 'value' => $value]); ?>
							<div class="form-error"><?= form_error('employee_name'); ?></div>
						</div>

						<div class="form-group col-sm-4">
							<label for="employee_number" class=" form-control-label">Employee Number</label>
							<?php if ($data) {
								$value = $data->employee_number;
							} else {
								$value = set_value('employee_number');
							} ?>
							<?= form_input(['name' => 'employee_number', 'class' => 'form-control', 'value' => $value]); ?>
							<div class="form-error"><?= form_error('employee_number'); ?></div>
						</div>

						<div class="form-group col-sm-4">
							<label for="current_achievement_ratio" class=" form-control-label">Current Achievement Ratio</label>
							<?php if ($data) {
								$value = $data->current_achievement_ratio;
							} else {
								$value = set_value('current_achievement_ratio');
							} ?>
							<?= form_input(['name' => 'current_achievement_ratio', 'class' => 'form-control', 'value' => $value]); ?>
							<div class="form-error"><?= form_error('current_achievement_ratio'); ?></div>
						</div>

						<div class="form-group col-sm-4">
							<label for="designated_employee_name" class=" form-control-label">Designated Employee Name</label>
							<?php if ($data) {
								$value = $data->designated_employee_name;
							} else {
								$value = set_value('designated_employee_name');
							} ?>
							<?= form_input(['name' => 'designated_employee_name', 'class' => 'form-control', 'value' => $value]); ?>
							<div class="form-error"><?= form_error('designated_employee_name'); ?></div>
						</div>

						<div class="form-group col-sm-4">
							<label for="expected_completion_rate" class=" form-control-label">Expected Completion rate</label>
							<?php if ($data) {
								$value = $data->expected_completion_rate;
							} else {
								$value = set_value('expected_completion_rate');
							} ?>
							<?= form_input(['name' => 'expected_completion_rate', 'class' => 'form-control', 'value' => $value]); ?>
							<div class="form-error"><?= form_error('expected_completion_rate'); ?></div>
						</div>

						<div class="form-group col-sm-4">
							<label for="department" class=" form-control-label">Department</label>
							<?php if ($data) {
								$value = $data->department;
							} else {
								$value = set_value('department');
							} ?>
							<?= form_input(['name' => 'department', 'class' => 'form-control', 'value' => $value]); ?>
							<div class="form-error"><?= form_error('department'); ?></div>
						</div>

						<div class="form-group col-sm-4">
							<label for="branch" class=" form-control-label">Branch</label>
							<?php if ($data) {
								$value = $data->branch;
							} else {
								$value = set_value('branch');
							} ?>
							<?= form_input(['name' => 'branch', 'class' => 'form-control', 'value' => $value]); ?>
							<div class="form-error"><?= form_error('branch'); ?></div>
						</div>

						<div class="form-group col-sm-4"><?php if ($data) {
																$value = $data->task_status;
															} else {
																$value = set_value('task_status');
															} ?>
							<label for="task_status" class=" form-control-label">Task Status</label>
							<select name="task_status" class="form-control">
								<option value="">Please Select Tsak Status</option>
								<option value="active" <?php if ($value == "active") echo "selected=selected"; ?>>Active</optino>
								<option value="inactive" <?php if ($value == "inactive") echo "selected=selected"; ?>>Inactive</optino>
								<option value="ending" <?php if ($value == "ending") echo "selected=selected"; ?>>Ending</optino>
								<option value="reactive" <?php if ($value == "reactive") echo "selected=selected"; ?>>Reactive</optino>
								<option value="other" <?php if ($value == "other") echo "selected=selected"; ?>>Other</optino>

							</select>
						</div>

						<div class="form-group col-sm-4">
							<label for="starting_date" class=" form-control-label">Starting Date</label>
							<?php if ($data) {
								$value = $data->starting_date;
							} else {
								$value = set_value('starting_date');
							} ?>
							<?= form_input(['name' => 'starting_date', 'id' => 'date', 'class' => 'form-control', 'value' => $value]); ?>
							<div class="form-error"><?= form_error('starting_date'); ?></div>
						</div>

						<div class="form-group col-sm-4">
							<label for="ending_date" class=" form-control-label">Ending Date</label>
							<?php if ($data) {
								$value = $data->ending_date;
							} else {
								$value = set_value('ending_date');
							} ?>
							<?= form_input(['name' => 'ending_date', 'id' => "date", 'class' => 'form-control', 'value' => $value]); ?>
							<div class="form-error"><?= form_error('ending_date'); ?></div>
						</div>

						<div class="form-group col-sm-4">
							<label for="start_time" class=" form-control-label">Start Time</label>
							<?php if ($data) {
								$value = $data->start_time;
							} else {
								$value = set_value('start_time');
							} ?>
							<?= form_input(['name' => 'start_time', 'class' => 'form-control', 'value' => $value]); ?>
							<div class="form-error"><?= form_error('start_time'); ?></div>
						</div>

						<div class="form-group col-sm-4">
							<label for="ending_time" class=" form-control-label">Ending Time</label>
							<?php if ($data) {
								$value = $data->ending_time;
							} else {
								$value = set_value('ending_time');
							} ?>
							<?= form_input(['name' => 'ending_time', 'class' => 'form-control', 'value' => $value]); ?>
							<div class="form-error"><?= form_error('ending_time'); ?></div>
						</div>

						<div class="form-group col-sm-4">
							<label for="reminder_and_alerts" class=" form-control-label">Reminder & alerts</label>
							<?php if ($data) {
								$value = $data->reminder_and_alerts;
							} else {
								$value = set_value('reminder_and_alerts');
							} ?>
							<?= form_input(['name' => 'reminder_and_alerts', 'class' => 'form-control', 'value' => $value]); ?>
							<div class="form-error"><?= form_error('reminder_and_alerts'); ?></div>
						</div>

						<div class="form-group col-sm-4">
							<label for="reminder_and_alerts_type" class=" form-control-label">Reminder & alerts Type</label>
							<?php if ($data) {
								$value = $data->reminder_and_alerts_type;
							} else {
								$value = set_value('reminder_and_alerts_type');
							} ?>
							<?= form_input(['name' => 'reminder_and_alerts_type', 'class' => 'form-control', 'value' => $value]); ?>
							<div class="form-error"><?= form_error('reminder_and_alerts_type'); ?></div>
						</div>

						<div class="form-group col-sm-4">
							<label for="list_of_tasks" class=" form-control-label">List of Tasks</label>
							<?php if ($data) {
								$value = $data->list_of_tasks;
							} else {
								$value = set_value('list_of_tasks');
							} ?>
							<?= form_input(['name' => 'list_of_tasks', 'class' => 'form-control', 'value' => $value]); ?>
							<div class="form-error"><?= form_error('list_of_tasks'); ?></div>
						</div>

						<div class="form-group col-sm-4">
							<label for="responsible_employee" class=" form-control-label">Responsible Employee</label>
							<?php if ($data) {
								$value = $data->responsible_employee;
							} else {
								$value = set_value('responsible_employee');
							} ?>
							<?= form_input(['name' => 'responsible_employee', 'class' => 'form-control', 'value' => $value]); ?>
							<div class="form-error"><?= form_error('responsible_employee'); ?></div>
						</div>

						<div class="form-group col-sm-4">
							<label for="follow_up_employee" class=" form-control-label">Follow-up Employee</label>
							<?php if ($data) {
								$value = $data->follow_up_employee;
							} else {
								$value = set_value('follow_up_employee');
							} ?>
							<?= form_input(['name' => 'follow_up_employee', 'class' => 'form-control', 'value' => $value]); ?>
							<div class="form-error"><?= form_error('follow_up_employee'); ?></div>
						</div>



						<div class="form-group col-sm-4">
							<label for="note" class=" form-control-label">Note</label>
							<?php if ($data) {
								$value = $data->note;
							} else {
								$value = set_value('note');
							} ?>
							<?= form_input(['name' => 'note', 'class' => 'form-control', 'value' => $value]); ?>
							<div class="form-error"><?= form_error('note'); ?></div>
						</div>

						<div class="form-group col-sm-4">
							<label for="note" class=" form-control-label">Upload Files</label>
							<?= form_upload(['name' => 'upload_file', 'class' => 'form-control']); ?>
							<?php if ($data) {
								echo $upload_file;
							} ?>
						</div>

					</div>
				</div>
			</div>
			<br>
			<div class="m-portlet__foot m-portlet__no-border m-portlet__foot--fit">
				<div class="m-form__actions m-form__actions--solid">
					<div class="row">
						<div class="col-lg-6">

							<?php $submit = $this->lang->line('Submit');
							echo form_submit(['id' => 'addcustomer', 'value' => $submit, 'class' => 'btn btn-primary btn-lg']);  ?>
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

<?php

include('footer.php');
?>
<script type="text/javascript">
	$(document).ready(function() {
		$('#success').hide();
		$('#date').datepicker({
			format: "yyyy-mm-dd"
		});
	});
</script>s