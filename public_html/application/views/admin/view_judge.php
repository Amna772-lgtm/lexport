 <?php include "header.php";?>
        <div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>Judge Report</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                           <li class="active">Dashboard/Judge Report</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

    <div class="card">
        <div class="card-header">
          <strong class="card-title">PDF and PRINT Judge</strong>
		  			<strong class="float-right"><a class="btn btn-success" href="">PDF</a>&nbsp;<a class="btn btn-success" href="" onclick="window.print()">Print</a></strong>
        </div>
        <div class="card-body">
			<div class="rehead">
			<div class="float-right">
			<label for="court_name" class=" form-control-label"><strong>Judge ID: </strong><?php echo $data['id'] ?></label>
			<br><label for="court_name" class=" form-control-label"><strong>Date: </strong><?php echo $data['createdate'] ?></label>
			</div>
			</div>
			<div class="reheadbody">
			<div class="form-group col-sm-6">
			<label for="court_name" class=" form-control-label"><strong>Court name: </strong><?php echo $data['judge_name'] ?></label>
			</div>
			<div class="form-group col-sm-6">
				<label for="court_name" class=" form-control-label"><strong>Judge Name: </strong><?php echo $data['court_name'] ?></label>
			</div>
			<div class="form-group col-sm-6">
			<label for="court_name" class=" form-control-label"><strong>Place: </strong><?php echo $data['place'] ?></label>
			</div>
			<div class="form-group col-sm-6">	
		<label for="court_name" class=" form-control-label"><strong>City: </strong><?php echo $data['city'] ?></label>
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
