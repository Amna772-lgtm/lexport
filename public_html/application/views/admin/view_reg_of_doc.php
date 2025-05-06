 <?php include "header.php";?>
        <div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>Registration Documents</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                           <li class="active">Dashboard/Registration Documents</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

    <div class="card">
        <div class="card-header">
          <strong class="card-title">PDF and PRINT Registration Documents</strong>
		  			<strong class="float-right"><a target="blank" class="btn btn-success" href="<?= base_url("admin/reg_of_doc/print_pdf/{$data->id}") ?>">PDF</a>&nbsp;<a class="btn btn-success" href="" onclick="window.print()">Print</a></strong>
        </div>
        <div class="card-body">
			<div class="rehead">
			<div class="float-right">
			<label for="court_name" class=" form-control-label"><strong>Case ID: </strong><?php echo $data->id; ?></label>
			</div>
			</div>
			<div class="reheadsub">Registration Documents</div>
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
			<label for="court_name" class=" form-control-label"><strong>Contract number: </strong><?php echo $data->contact_number;?></label>
			</div>
			<div class="form-group col-sm-4">
				<label for="court_name" class=" form-control-label"><strong>Case Code: </strong><?php echo $data->case_code; ?></label>
			</div>
			<div class="form-group col-sm-4">
			<label for="court_name" class=" form-control-label"><strong>Document Title: </strong><?php echo $data->document_title; ?></label>
			</div>
			<div class="form-group col-sm-4">	
			<label for="court_name" class=" form-control-label"><strong>Document Code: </strong><?php echo $data->document_code; ?></label>
			</div>
			<div class="form-group col-sm-4">	
			<label for="court_name" class=" form-control-label"><strong>Document Type: </strong><?php echo $data->document_type;?></label>
			</div>
			<div class="form-group col-sm-4">	
			<label for="court_name" class=" form-control-label"><strong>Document Number: </strong><?php echo $data->document_number;?></label>
			</div>
			<div class="form-group col-sm-4">	
			<label for="court_name" class=" form-control-label"><strong>Total of Procuration Number: </strong><?php echo $data->total_of_procuration_number; ?></label>
			</div>
			<div class="form-group col-sm-4">	
			<label for="court_name" class=" form-control-label"><strong>Procuration Date: </strong><?php echo $data->procuration_date; ?></label>
			</div>
			<div class="form-group col-sm-4">	
			<label for="court_name" class=" form-control-label"><strong>Responsible Employee: </strong><?php echo $data->responsible_employee; ?></label>
			</div>
			<div class="form-group col-sm-4">	
			<label for="court_name" class=" form-control-label"><strong>Follow-up Employee: </strong><?php echo $data->follow_up_employee; ?></label>
			</div>
			<div class="form-group col-sm-4">	
			<label for="court_name" class=" form-control-label"><strong>Note: </strong><?php echo $data->note; ?></label>
			</div>
			
			<div class="form-group col-sm-4">	
			<label for="court_name" class=" form-control-label"><strong>Uploaded File: </strong><img src="<?php echo base_url();?>/uploads/reg_of_doc/<?php echo $data->upload_file; ?>" width="200"> </label>
			</div>
			</div>
		</div>
<?php include "footer.php";?>
<script src="<?= base_url('assets/js/ajax.js'); ?>"></script>
