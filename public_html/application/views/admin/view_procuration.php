 <?php include "header.php";?>
    <div class="breadcrumbs">
        <div class="col-sm-4">
            <div class="page-header float-left">
                <div class="page-title">
                    <h1>Procuration</h1>
                </div>
            </div>
        </div>
        <div class="col-sm-8">
            <div class="page-header float-right">
                <div class="page-title">
                    <ol class="breadcrumb text-right">
                       <li class="active">Dashboard/ Procuration</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <div class="card">
        <div class="card-header">
	        <strong class="card-title">PDF and PRINT Procuration</strong>
  			<strong class="float-right"><a target="blank" class="btn btn-success" href="<?= base_url("admin/procuration/print_pdf/{$data->id}") ?>">PDF</a>&nbsp;<a class="btn btn-success" href="" onclick="window.print()">Print</a></strong>
        </div>
        <div class="card-body">
			<div class="rehead">
				<div class="float-right">
					<label for="court_name" class=" form-control-label"><strong>Case ID: </strong><?php echo $data->id; ?></label>
				</div>
			</div>
			<div class="reheadsub">Procuration</div>
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
						<label for="court_name" class=" form-control-label"><strong>Case Code: </strong><?php echo $data->case_code; ?></label>
					</div>
					<div class="form-group col-sm-4">
						<label for="court_name" class=" form-control-label"><strong>Case Type: </strong><?php echo $data->case_type; ?></label>
					</div>
					<div class="form-group col-sm-4">
						<label for="court_name" class=" form-control-label"><strong>Case number: </strong><?php echo $data->case_number; ?></label>
					</div>
					<div class="form-group col-sm-4">
						<label for="court_name" class=" form-control-label"><strong>Contact number: </strong><?php echo $data->contact_number; ?></label>
					</div>
					<div class="form-group col-sm-4">
						<label for="court_name" class=" form-control-label"><strong>Procuration title: </strong><?php echo $data->procuration_title; ?></label>
					</div>
					<div class="form-group col-sm-4">
						<label for="court_name" class=" form-control-label"><strong>Procuration code: </strong><?php echo $data->procuration_code; ?></label>
					</div>
					<div class="form-group col-sm-4">
						<label for="court_name" class=" form-control-label"><strong>Procuration type: </strong><?php echo $data->procuration_type; ?></label>
					</div>
					<div class="form-group col-sm-4">
						<label for="court_name" class=" form-control-label"><strong>Procuration number: </strong><?php echo $data->procuration_number; ?></label>
					</div>
					<div class="form-group col-sm-4">
						<label for="court_name" class=" form-control-label"><strong>Total of procuration number: </strong><?php echo $data->total_of_procuration_number; ?></label>
					</div>
					<div class="form-group col-sm-4">
						<label for="court_name" class=" form-control-label"><strong>Procuration date: </strong><?php echo $data->procuration_date; ?></label>
					</div>
					<div class="form-group col-sm-4">
						<label for="court_name" class=" form-control-label"><strong>Procuration status: </strong><?php echo $data->procuration_status; ?></label>
					</div>
					<div class="form-group col-sm-4">
						<label for="court_name" class=" form-control-label"><strong>Responsible employee: </strong><?php echo $data->responsible_employee; ?></label>
					</div>
					<div class="form-group col-sm-4">
						<label for="court_name" class=" form-control-label"><strong>Follow up employee: </strong><?php echo $data->follow_up_employee; ?></label>
					</div>
					<div class="form-group col-sm-4">
						<label for="court_name" class=" form-control-label"><strong>Note: </strong><?php echo $data->note; ?></label>
					</div>
					<div class="form-group col-sm-4">	
						<label for="court_name" class=" form-control-label"><strong>Uploaded File: </strong><img src="<?php echo base_url();?>/uploads/procuration/<?php echo $data->upload_file; ?>" width="200"> </label>
					</div>
				</div>
			</div>
<?php include "footer.php";?>
<script src="<?= base_url('assets/js/ajax.js'); ?>"></script>