 <?php include "header.php";?>
        <div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>Contract Archive</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                           <li class="active">Dashboard/Archive Report</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

    <div class="card">
        <div class="card-header">
          <strong class="card-title">PDF and PRINT Archive</strong>
		  			<strong class="float-right"><a class="btn btn-success" href="">PDF</a>&nbsp;<a class="btn btn-success" href="" onclick="window.print()">Print</a></strong>
        </div>
        <div class="card-body">
			<div class="rehead">
			<div class="float-right">
			<label for="court_name" class=" form-control-label"><strong>Archive ID: </strong><?php echo $data->id; ?></label>
			<br><label for="court_name" class=" form-control-label"><strong>Date: </strong><?php echo $data->createdate;?></label>
			</div>
			</div>
			<div class="reheadbody">
			<div class="form-group col-sm-4">
			<label for="court_name" class=" form-control-label"><strong>File type: </strong><?php echo $data->file_type; ?></label>
			</div>
			<div class="form-group col-sm-4">
				<label for="court_name" class=" form-control-label"><strong>Clients: </strong><?php echo $data->clients; ?></label>
			</div>
			<div class="form-group col-sm-4">
			<label for="court_name" class=" form-control-label"><strong>Cases: </strong><?php echo $data->cases; ?></label>
			</div>
			<div class="form-group col-sm-4">	
		<label for="court_name" class=" form-control-label"><strong>Procuration: </strong><?php echo $data->procuration; ?></label>
			</div>

	
		<div class="form-group col-sm-4">
			<label for="court_name" class=" form-control-label"><strong>Service: </strong><?php  echo getServiceName($data->service_types);?></label>
		</div>
		<div class="form-group col-sm-4">
			<label for="court_name" class=" form-control-label"><strong>Contract: </strong><?php  echo $data->contract; ?></label>
		</div>
		<div class="form-group col-sm-4">
			<label for="court_name" class=" form-control-label"><strong>Note: </strong><?php  echo $data->notes; ?></label>
		</div>
		<div class="form-group col-sm-4">
			<label for="court_name" class=" form-control-label"><strong>Project: </strong><?php echo $data->project; ?></label>
		</div>
		<div class="form-group col-sm-4">
			<label for="court_name" class=" form-control-label"><strong>Task: </strong><?php  echo $data->task; ?></label>
		</div>
		<div class="form-group col-sm-4">
			<label for="court_name" class=" form-control-label"><strong>Others: </strong><?php  echo $data->others; ?></label>
		</div>
		<div class="form-group col-sm-4">
			<label for="court_name" class=" form-control-label"><strong>File status: </strong><?php  echo $data->file_status; ?></label>
		</div>
		<div class="form-group col-sm-4">
			<label for="court_name" class=" form-control-label"><strong>File title: </strong><?php echo $data->file_title; ?></label>
		</div>
		<div class="form-group col-sm-4">
			<label for="court_name" class=" form-control-label"><strong>Responsible employee: </strong><?php echo $data->file_note; ?></label>
		</div>
		<div class="form-group col-sm-4">
			<label for="court_name" class=" form-control-label"><strong>File Note: </strong><?php  echo $data->responsible_employee;; ?></label>
		</div>
		<div class="form-group col-sm-4">	
			<label for="court_name" class=" form-control-label"><strong>Upload File: </strong><img src="<?php echo base_url();?>/uploads/archive/<?php echo $data->upload_file; ?>" width="200"> <?php echo $data->upload_file; ?></label>
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
