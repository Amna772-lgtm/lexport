 <?php include "header.php";?>
        <div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>Contract Report</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                           <li class="active">Dashboard/Contract Report</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

    <div class="card">
        <div class="card-header">
          <strong class="card-title">PDF and PRINT Contract</strong>
		  			<strong class="float-right"><a class="btn btn-success" href="">PDF</a>&nbsp;<a class="btn btn-success" href="" onclick="window.print()">Print</a></strong>
        </div>
        <div class="card-body">
			<div class="rehead">
			<div class="float-right">
			<label for="court_name" class=" form-control-label"><strong>Contract ID: </strong><?php echo $data->id; ?></label>
			<br><label for="court_name" class=" form-control-label"><strong>Date: </strong><?php echo $data->createdate;?></label>
			</div>
			</div>
			<div class="reheadbody">
			<div class="form-group col-sm-4">
			<label for="court_name" class=" form-control-label"><strong>Contract start date: </strong><?php echo $data->contract_start_date; ?></label>
			</div>
			<div class="form-group col-sm-4">
				<label for="court_name" class=" form-control-label"><strong>Ending contract date: </strong><?php echo $data->ending_contract_date; ?></label>
			</div>
			<div class="form-group col-sm-4">
			<label for="court_name" class=" form-control-label"><strong>Contract number: </strong><?php echo $data->contract_number; ?></label>
			</div>
			<div class="form-group col-sm-4">	
		<label for="court_name" class=" form-control-label"><strong>Contract type: </strong><?php echo $data->contract_type; ?></label>
			</div>

	
		<div class="form-group col-sm-4">
			<label for="court_name" class=" form-control-label"><strong>Service: </strong><?php  echo getServiceName($data->service_types);?></label>
		</div>
		<div class="form-group col-sm-4">
			<label for="court_name" class=" form-control-label"><strong>Client name: </strong><?php  echo $data->client_name; ?></label>
		</div>
		<div class="form-group col-sm-4">
			<label for="court_name" class=" form-control-label"><strong>Identification Number: </strong><?php  echo $data->identification_number; ?></label>
		</div>
		<div class="form-group col-sm-4">
			<label for="court_name" class=" form-control-label"><strong>Identification Types: </strong><?php echo $data->identification_types; ?></label>
		</div>
		<div class="form-group col-sm-4">
			<label for="court_name" class=" form-control-label"><strong>Number of cases: </strong><?php  echo $data->number_of_cases; ?></label>
		</div>
		<div class="form-group col-sm-4">
			<label for="court_name" class=" form-control-label"><strong>Number of legal consultation: </strong><?php  echo $data->legal_consultation; ?></label>
		</div>
		<div class="form-group col-sm-4">
			<label for="court_name" class=" form-control-label"><strong>Contract price: </strong><?php  echo $data->contract_start_date; ?></label>
		</div>
		<div class="form-group col-sm-4">
			<label for="court_name" class=" form-control-label"><strong>Contract Note: </strong><?php echo $data->contract_price; ?></label>
		</div>
		<div class="form-group col-sm-4">
			<label for="court_name" class=" form-control-label"><strong>Responsible employee: </strong><?php echo $data->contract_start_date; ?></label>
		</div>
		<div class="form-group col-sm-4">
			<label for="court_name" class=" form-control-label"><strong>Case Status: </strong><?php  echo $data->contract_start_date;; ?></label>
		</div>
		<div class="form-group col-sm-4">
			<label for="court_name" class=" form-control-label"><strong>File type: </strong><?php  echo $data->contract_start_date; ?></label>
		</div>
		<div class="form-group col-sm-4">
			<label for="court_name" class=" form-control-label"><strong>File title: </strong><?php  echo $data->contract_start_date; ?></label>
		</div>
		<div class="form-group col-sm-4">	
			<label for="court_name" class=" form-control-label"><strong>Contract File: </strong><img src="<?php echo base_url();?>/uploads/contract/<?php echo $data->contract_file; ?>" width="200"> <?php echo $data->contract_file; ?></label>
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
