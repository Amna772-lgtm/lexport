 <?php include "header.php";?>
        <div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>HR Report</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                           <li class="active">Dashboard/HR Report</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

    <div class="card">
        <div class="card-header">
          <strong class="card-title">PDF and PRINT HR</strong>
		  			<strong class="float-right"><a class="btn btn-success" href="">PDF</a>&nbsp;<a class="btn btn-success" href="" onclick="window.print()">Print</a></strong>
        </div>
        <div class="card-body">
			<div class="rehead">
			<div class="float-right">
			<label for="court_name" class=" form-control-label"><strong>HR ID: </strong><?php echo $data->id; ?></label>
			<br><label for="court_name" class=" form-control-label"><strong>Date: </strong><?php echo $data->createdate;?></label>
			</div>
			</div>
			<div class="reheadsub">HR Information</div>
			<div class="reheadbody">
			<div class="form-group col-sm-4">
			<label for="court_name" class=" form-control-label"><strong>Client full name: </strong><?php echo $data->client_full_name; ?></label>
			</div>
			<div class="form-group col-sm-4">
				<label for="court_name" class=" form-control-label"><strong>Identification Number: </strong><?php echo $data->identification_number; ?></label>
			</div>
			<div class="form-group col-sm-4">
			<label for="court_name" class=" form-control-label"><strong>Identification Types: </strong><?php echo $data->identification_types; ?></label>
			</div>
			<div class="form-group col-sm-4">	
		<label for="court_name" class=" form-control-label"><strong>Date of birth: </strong><?php echo $data->dob; ?></label>
			</div>

	
		<div class="form-group col-sm-4">
			<label for="court_name" class=" form-control-label"><strong>Address: </strong><?php  echo $data->address;?></label>
		</div>
		<div class="form-group col-sm-4">
			<label for="court_name" class=" form-control-label"><strong>Main mobile number: </strong><?php  echo $data->main_mobile_number; ?></label>
		</div>
		<div class="form-group col-sm-4">
			<label for="court_name" class=" form-control-label"><strong>Other mobile number: </strong><?php  echo $data->other_mobile_number; ?></label>
		</div>
		<div class="form-group col-sm-4">
			<label for="court_name" class=" form-control-label"><strong>Employee bank name: </strong><?php echo $data->employee_bank_name; ?></label>
		</div>
		<div class="form-group col-sm-4">
			<label for="court_name" class=" form-control-label"><strong>IBAN: </strong><?php  echo $data->iban; ?></label>
		</div>
		<div class="form-group col-sm-4">
			<label for="court_name" class=" form-control-label"><strong>Monthly salary: </strong><?php  echo $data->monthly_salary; ?></label>
		</div>
		<div class="form-group col-sm-4">
			<label for="court_name" class=" form-control-label"><strong>Employee Type: </strong><?php  echo $data->employee_type; ?></label>
		</div>
		<div class="form-group col-sm-4">
			<label for="court_name" class=" form-control-label"><strong>Employee positions: </strong><?php echo $data->employee_positions; ?></label>
		</div>
		<div class="form-group col-sm-4">
			<label for="court_name" class=" form-control-label"><strong>Job position name: </strong><?php echo $data->job_position_name; ?></label>
		</div>
		<div class="form-group col-sm-4">
			<label for="court_name" class=" form-control-label"><strong>Contract number: </strong><?php  echo $data->contract_number;; ?></label>
		</div>
		<div class="form-group col-sm-4">
			<label for="court_name" class=" form-control-label"><strong>Case Status: </strong><?php  echo $data->case_status;; ?></label>
		</div>
		<div class="form-group col-sm-4">
			<label for="court_name" class=" form-control-label"><strong>Date of starting work: </strong><?php  echo $data->date_of_starting_work;; ?></label>
		</div>
		<div class="form-group col-sm-4">
			<label for="court_name" class=" form-control-label"><strong>Contract ending date: </strong><?php  echo $data->contract_ending_date;; ?></label>
		</div>
		<div class="form-group col-sm-4">
			<label for="court_name" class=" form-control-label"><strong>Employee faile number: </strong><?php  echo $data->employee_fail_number;; ?></label>
		</div>
		<div class="form-group col-sm-4">
			<label for="court_name" class=" form-control-label"><strong>Department: </strong><?php  echo $data->department;; ?></label>
		</div>
		<div class="form-group col-sm-4">
			<label for="court_name" class=" form-control-label"><strong>Branch: </strong><?php  echo getBranchName($data->branch); ?></label>
		</div>
		<div class="form-group col-sm-4">
			<label for="court_name" class=" form-control-label"><strong>Number of Annual vacation date: </strong><?php  echo $data->number_of_annual_vacation_date;; ?></label>
		</div>
		<div class="form-group col-sm-4">
			<label for="court_name" class=" form-control-label"><strong>Number of expiations date: </strong><?php  echo $data->expiations_date;; ?></label>
		</div>
		<div class="form-group col-sm-4">
			<label for="court_name" class=" form-control-label"><strong>Number of working days: </strong><?php  echo $data->number_of_working_days;; ?></label>
		</div>
		<div class="form-group col-sm-4">
			<label for="court_name" class=" form-control-label"><strong>Number of sick live days: </strong><?php  echo $data->number_of_sick_live_days;; ?></label>
		</div>
		<div class="form-group col-sm-4">
			<label for="court_name" class=" form-control-label"><strong>Number of emergence days: </strong><?php  echo $data->number_of_emergence_days;; ?></label>
		</div>
		<div class="form-group col-sm-4">
			<label for="court_name" class=" form-control-label"><strong>File type: </strong><?php  echo $data->file_type; ?></label>
		</div>
		<div class="form-group col-sm-4">
			<label for="court_name" class=" form-control-label"><strong>File title: </strong><?php  echo $data->file_title; ?></label>
		</div>
		<div class="form-group col-sm-12">	
			<label for="court_name" class=" form-control-label"><strong>Contract File: </strong><img src="<?php echo base_url();?>/uploads/hr/<?php echo $data->upload_file; ?>" width="200"> <?php echo $data->upload_file; ?></label>
			</div>
		</div>
	<div class="reheadfoot">
		<div class="form-group col-sm-4">
			<label for="court_name" class=" form-control-label"><strong>Email: </strong><?php echo $this->session->userdata('admin_email');  ?></label>
		</div>
		<div class="form-group col-sm-4">
			<label for="court_name" class=" form-control-label"><strong>Contact No: </strong><?php  echo $this->session->userdata('admin_phone'); ?></label>
		</div>
		<div class="form-group col-sm-4">
			<label for="court_name" class=" form-control-label"><strong>Address: </strong><?php echo $this->session->userdata('admin_address'); ?></label>
		</div>
		</div>
	</div>
		


<?php include "footer.php";?>
<script src="<?= base_url('assets/js/ajax.js'); ?>"></script>
