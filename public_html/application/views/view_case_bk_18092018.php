<?php include "header.php";?>
	<div class="head-bread">
	 	<div class="heading-bread">
	        <div class="container">
	        <h3>List case </h3>
	    	</div>
	    </div>
	</div>
	<div class="container">
		<div class="casedata-block">
    		<div class="card">
        		<div class="card-body">
					<div class="rehead">
						<div class="float-right">
						<label for="court_name" class=" form-control-label"><strong>Case ID: </strong><?php echo $data->id; ?></label>
						<br><label for="court_name" class=" form-control-label"><strong>Date: </strong><?php echo $data->createdate; ?></label>
						</div>
					</div>
					
					<div class="reheadsub">Customer Information</div>
					<div class="reheadbody">
						<div class="form-group col-sm-4">
							<label for="court_name" class=" form-control-label"><strong>Identification Number: </strong><?php echo $data->identification_number; ?></label>
						</div>
						<div class="form-group col-sm-4">
							<label for="court_name" class=" form-control-label"><strong>Identification Types: </strong><?php echo $data->identification_types; ?></label>
						</div>
						<div class="form-group col-sm-4">
							<label for="court_name" class=" form-control-label"><strong>Client File Number: </strong><?php echo $data->client_file_number; ?></label>
						</div>
						<div class="form-group col-sm-4">	
							<label for="court_name" class=" form-control-label"><strong>Client Name: </strong><?php echo $data->client_name; ?></label>
						</div>
			<div class="form-group col-sm-4">	
			<label for="court_name" class=" form-control-label"><strong>Branch: </strong><?php echo getBranchName($data->branch); ?></label>
			</div>
			<div class="form-group col-sm-4">
			<label for="court_name" class=" form-control-label"><strong>Total of Case Number: </strong><?php echo $data->total_of_case_number;?></label>
			</div>
			<div class="form-group col-sm-4">
				<label for="court_name" class=" form-control-label"><strong>Service: </strong><?php echo getServiceName($data->service_types); ?></label>
			</div>
			<div class="form-group col-sm-4">
			<label for="court_name" class=" form-control-label"><strong>Case Code: </strong><?php echo $data->case_code; ?></label>
			</div>
			<div class="form-group col-sm-4">	
			<label for="court_name" class=" form-control-label"><strong>Case Type: </strong><?php echo $data->case_type; ?></label>
			</div>
			<div class="form-group col-sm-4">	
			<label for="court_name" class=" form-control-label"><strong>Case Number: </strong><?php echo $data->case_number;?></label>
			</div>
			<div class="form-group col-sm-4">	
			<label for="court_name" class=" form-control-label"><strong>Case Title: </strong><?php echo $data->case_title;?></label>
			</div>
			<div class="form-group col-sm-4">	
			<label for="court_name" class=" form-control-label"><strong>Case Date: </strong><?php echo $data->case_date; ?></label>
			</div>
			<div class="form-group col-sm-4">	
			<label for="court_name" class=" form-control-label"><strong>Case Start Date: </strong><?php echo $data->case_start_date; ?></label>
			</div>
			<div class="form-group col-sm-4">	
			<label for="court_name" class=" form-control-label"><strong>Contract number: </strong><?php echo $data->contact_number; ?></label>
			</div>
			<div class="form-group col-sm-4">	
			<label for="court_name" class=" form-control-label"><strong>Opponent Full Name: </strong><?php echo $data->opponent_full_name; ?></label>
			</div>
			<div class="form-group col-sm-4">	
			<label for="court_name" class=" form-control-label"><strong>Opponent Note: </strong><?php echo $data->opponent_note; ?></label>
			</div>
			<div class="form-group col-sm-4">	
			<label for="court_name" class=" form-control-label"><strong>Opponent Phone: </strong><?php echo $data->opponent_phone; ?></label>
			</div>
			<div class="form-group col-sm-4">	
			<label for="court_name" class=" form-control-label"><strong>Court Name: </strong><?php echo $data->court_name; ?></label>
			</div>
			<div class="form-group col-sm-4">	
			<label for="court_name" class=" form-control-label"><strong>Court Number: </strong><?php echo $data->court_number; ?></label>
			</div>
			<div class="form-group col-sm-4">	
			<label for="court_name" class=" form-control-label"><strong>Court Address: </strong><?php echo $data->court_address; ?></label>
			</div>
			<div class="form-group col-sm-4">	
			<label for="court_name" class=" form-control-label"><strong>Judge Name: </strong><?php echo $data->judge_name; ?></label>
			</div>
			<div class="form-group col-sm-4">	
			<label for="court_name" class=" form-control-label"><strong>Opponent Lawyer: </strong><?php echo $data->opponent_lawyer; ?></label>
			</div>
			<div class="form-group col-sm-4">	
			<label for="court_name" class=" form-control-label"><strong>Referral number: </strong><?php echo $data->referral_number; ?></label>
			</div>
			<div class="form-group col-sm-4">	
			<label for="court_name" class=" form-control-label"><strong>Referral Title: </strong><?php echo $data->referral_title; ?></label>
			</div>
			<div class="form-group col-sm-4">	
			<label for="court_name" class=" form-control-label"><strong>Referral Date: </strong><?php echo $data->referral_date; ?></label>
			</div>
			<div class="form-group col-sm-4">	
			<label for="court_name" class=" form-control-label"><strong>Verdict Number: </strong><?php echo $data->verdict_number; ?></label>
			</div>
			<div class="form-group col-sm-4">	
			<label for="court_name" class=" form-control-label"><strong>Verdict Date: </strong><?php echo $data->verdict_date; ?></label>
			</div>
			<div class="form-group col-sm-4">	
			<label for="court_name" class=" form-control-label"><strong>Objection Number: </strong><?php echo $data->objection_number; ?></label>
			</div>
			<div class="form-group col-sm-4">	
			<label for="court_name" class=" form-control-label"><strong>Objection Date: </strong><?php echo $data->objection_date; ?></label>
			</div>
			<div class="form-group col-sm-4">	
			<label for="court_name" class=" form-control-label"><strong>Objection Number: </strong><?php echo $data->objection_number; ?></label>
			</div>
			<div class="form-group col-sm-4">	
			<label for="court_name" class=" form-control-label"><strong>Case Status: </strong><?php echo $data->case_status; ?></label>
			</div>
			<div class="form-group col-sm-4">	
			<label for="court_name" class=" form-control-label"><strong>Note: </strong><?php echo $data->note; ?></label>
			</div>
			<div class="form-group col-sm-4">	
			<label for="court_name" class=" form-control-label"><strong>Uploaded File: </strong><img src="<?php echo base_url();?>/uploads/<?php echo $data->upload_file; ?>" width="200"> </label>
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
		</div>

	</div>
</div>
<?php include "footer1.php";?>
<script src="<?= base_url('assets/js/ajax.js'); ?>"></script>
