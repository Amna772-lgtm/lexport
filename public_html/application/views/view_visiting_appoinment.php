<?php $nvc = "white-nav sticky shrink modern hover4 radius-drop"; 
$pageTitle = $this->lang->line("Visiting_Mission");
include('header.php');
	 
?>
 </section>
  <style>
 <?php if($this->session->userdata('site_lang')=="arabic"  ) { ?>
span.m-widget4__ext {
    padding-left: 15px;
}
    <?php } else {?>
    span.m-widget4__ext {
    padding-right: 15px;
}
    <?php } ?>
 </style>
<?php
include('header_welcome.php');
?>
<!-- END: Left Aside -->
 
      <div class="m-grid__item m-grid__item--fluid m-wrapper">


        <!-- END: Subheader -->
        <div class="m-content">

            <!--begin::Portlet-->
            <div class="m-portlet">
                <div class="m-portlet__head">
                    <div class="m-portlet__head-caption">
                        <div class="m-portlet__head-title">
                            <h3 class="m-portlet__head-text">
                                <?php echo $this->lang->line('Visiting');?>
                            </h3>
                        </div>
                    </div>
                </div>
                <div class="m-portlet__body" style="padding-bottom: 0 !important;">
                    <div class="row">
                        <div class="col-md-6">
                            <ul>
  <!--<li><h3><b><?php echo $this->lang->line('Date');?>:</b> <?php  $date= date("m/d/Y", strtotime($data->createdate)); echo getTheDayAndDateFromDatePanFront($date); ?></h3></li>-->
                            </ul>
                        </div>
                    </div>
                </div> 
				<form class="m-form m-form--fit m-form--label-align-right m-form--group-seperator-dashed">
                    <div class="m-portlet__body">

                        <div class="row thh">
                            <div class="col-lg-12">
                                <h3><?php echo $this->lang->line('Customer_Information');?></h3>
                            </div>
                        </div>
                        <div class="in_fo">
                           
						<div class="form-group col-sm-4">
							<label for="court_name" class=" form-control-label"><strong><?php echo $this->lang->line('Identification_Numbers');?>: </strong><?php echo $data->identification_number; ?></label>
						</div>
						<div class="form-group col-sm-4">
							<label for="court_name" class=" form-control-label"><strong><?php echo $this->lang->line('identification_types');?>: </strong><?php echo $data->identification_types; ?></label>
						</div>
						<div class="form-group col-sm-4">
							<label for="court_name" class=" form-control-label"><strong><?php echo $this->lang->line('client_File_number');?>: </strong><?php echo $data->client_file_number; ?></label>
						</div>
						<div class="form-group col-sm-4">	
							<label for="court_name" class=" form-control-label"><strong><?php echo $this->lang->line('Client_Name');?>: </strong><?php echo $data->client_name; ?></label>
						</div>
 
						 
					 
						</div>	
						 
		 	 
				 
							
		<div class="row thh">
			<div class="col-lg-12">
				<h3><?php echo $this->lang->line('E-Service_Information');?></h3>
			</div>
		</div>
		
		<div class="in_fo">		
		<div class="form-group m-form__group row">
			 
			<div class="form-group col-sm-4">
			<label for="court_name" class=" form-control-label"><strong><?php echo $this->lang->line('Identification_Numbers');?>: </strong><?php echo $data->identification_number; ?></label>
			</div>
			<div class="form-group col-sm-4">
				<label for="court_name" class=" form-control-label"><strong><?php echo $this->lang->line('identification_types');?>: </strong><?php echo $data->identification_types; ?></label>
			</div>
			<div class="form-group col-sm-4">
			<label for="court_name" class=" form-control-label"><strong><?php echo $this->lang->line('client_File_number');?>: </strong><?php echo $data->client_file_number; ?></label>
			</div>
			<div class="form-group col-sm-4">	
			<label for="court_name" class=" form-control-label"><strong><?php echo $this->lang->line('Client_Name');?>: </strong><?php echo $data->client_name; ?></label>
			</div>
			<div class="form-group col-sm-4">	
			<label for="court_name" class=" form-control-label"><strong><?php echo $this->lang->line('branch');?>: </strong><?php echo getBranchName($data->branch); ?></label>
			</div>
			
			<div class="form-group col-sm-4">
				<label for="court_name" class=" form-control-label"><strong><?php echo $this->lang->line('Visiting_Number');?>: </strong><?php echo $data->session_number; ?></label>
			</div>
			<div class="form-group col-sm-4">
			<label for="court_name" class=" form-control-label"><strong><?php echo $this->lang->line('Visiting_Date');?>: </strong><?php echo getTheDayAndDateFromDatePanFront($data->session_date); ?></label>
			</div>
			<div class="form-group col-sm-4">	
			<label for="court_name" class=" form-control-label"><strong><?php echo $this->lang->line('Visiting_Time');?>: </strong><?php echo $data->session_time; ?></label>
			</div>
			<div class="form-group col-sm-4">	
			<label for="court_name" class=" form-control-label"><strong><?php echo $this->lang->line('Mission_Status');?>: </strong><?php echo $data->session_code;?></label>
			</div>
			<!--<div class="form-group col-sm-4">	
			<label for="court_name" class=" form-control-label"><strong>Case Code: </strong><?php echo $data->case_code;?></label>
			</div>-->
			<div class="form-group col-sm-4">	
			<label for="court_name" class=" form-control-label"><strong><?php echo $this->lang->line('E_Service_Type');?>: </strong><?php echo getCaseType($data->case_type); ?></label>
			</div>
			<div class="form-group col-sm-4">	
			<label for="court_name" class=" form-control-label"><strong><?php echo $this->lang->line('E_Service_Number');?>: </strong><?php echo $data->case_number; ?></label>
			</div>
			<!--<div class="form-group col-sm-4">	
			<label for="court_name" class=" form-control-label"><strong>Case Title: </strong><?php echo $data->case_title; ?></label>
			</div>-->
			<div class="form-group col-sm-4">	
			<label for="court_name" class=" form-control-label"><strong><?php echo $this->lang->line('E_Service_Date');?>: </strong><?php echo getTheDayAndDateFromDatePanFront($data->case_date); ?></label>
			</div>
			<div class="form-group col-sm-4">	
			<label for="court_name" class=" form-control-label"><strong><?php echo $this->lang->line('E_Service_Start_Date');?>: </strong><?php echo getTheDayAndDateFromDatePanFront($data->case_start_date); ?></label>
			</div>
			<div class="form-group col-sm-4">	
			<label for="court_name" class=" form-control-label"><strong><?php echo $this->lang->line('Contract_number');?>: </strong><?php echo $data->contract_number; ?></label>
			</div>
			</div>
			</div>
				<!--<div class="casedata-block">	
					<h3>Court Information</h3>
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
			<label for="court_name" class=" form-control-label"><strong>Court Name: </strong><?php echo $data->court_number; ?></label>
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
			<label for="court_name" class=" form-control-label"><strong>Opponent Lawyer Name: </strong><?php echo $data->opponent_lawyer; ?></label>
			</div>
			<div class="form-group col-sm-4">	
			<label for="court_name" class=" form-control-label"><strong>Responsible Employee: </strong> <?php echo getEmployeeName($data->responsible_employee); ?></label>
			</div>
			<div class="form-group col-sm-4">	
			<label for="court_name" class=" form-control-label"><strong>Follow-up Employee: </strong><?php echo getEmployeeName($data->follow_up_employee); ?></label>
			</div>
			<div class="form-group col-sm-4">	
			<label for="court_name" class=" form-control-label"><strong>Department: </strong><?php echo $data->department; ?></label>
			</div>
			</div>-->
				
			<div class="row thh">
				<div class="col-lg-12">
					<h3><?php echo $this->lang->line('Requirement');?></h3>
				</div>
			</div>
			<div class="in_fo">
			<div class="form-group m-form__group row">
			 
			<div class="form-group col-sm-4">	
			<label for="court_name" class=" form-control-label"><?php echo $data->note; ?></label>
			</div>
			</div>
			</div>
						<div class="row thh">
			<div class="col-lg-12">
				<h3><?php echo $this->lang->line('Attached_files');?></h3>
			</div>
		</div>
			<?php $temp_app_id = $data->id;
					$files = $this->db->select('*')->where("(temp_app_id = '$temp_app_id' AND cat_id = 8 AND type='visiting')", NULL, FALSE)->get('document')->result_array();  ?>
		<div class="in_fo">
			<div class="m-widget4">
			<?php
				foreach ($files as $files) { ?>
				<div class="m-widget4__item">
					<div class="m-widget4__info">
						<span class="m-widget4__title"></<?php echo "<b>" . $files['name']."</b>"; 
						?> </span>
						 
						<span class="m-widget4__sub">	
						<?php  echo " (". $this->lang->line('Upoded_By').getEmployeeName($files['user_id']).") ";?></span>
					</div>
							<span class="m-widget4__ext">
								<span class="m-widget4__number m--font-brand">
									<a href="<?=base_url('uploads/case_file/' . $files["name"]);?>" class="btn btn-success"><i class="fa fa-download"></i></a>
								</span>
							</span>
				</div>
				
			<?php }?>
			</div>

		</div>
 
                </div>
            </div>


        </div>

    </div>
</div>
</div>



<?php

include('footer.php');

?>
