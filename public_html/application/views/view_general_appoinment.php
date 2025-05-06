<?php $nvc = "white-nav sticky shrink modern hover4 radius-drop"; 
$pageTitle = $this->lang->line("General_Mission");
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
	.view_general_appointment {
		font-family: 'Roboto';
	}
	.view_general_appointment .m-portlet.lp-theme-card {
		background: unset;
		box-shadow: unset;
		padding: 0;
		border-radius: 0;
	}
	.view_general_appointment .m-portlet.lp-theme-card .m-portlet__body .in_fo {
		background: #fff;
		margin-left: 0;
	}
	.view_general_appointment span.card_label {
        font-size: 16px;
        color: #868DA6;
        font-weight: bold;
    }

    .view_general_appointment span.value {
        font-size: 15px;
        color: #1B2A39;
    }
	.gap_14 {
        gap: 10px
    }
	.view_general_appointment .m-portlet__body .in_fo {
		border-radius: 20px;
	}

	html[dir="rtl"] .view_general_appointment .m-portlet__body .in_fo {
		margin-right: 0;
	}

	.view_general_appointment .form-group.m-form__group.row.sub-missions{
		padding-left: 15px;
		padding-right: 15px;
	}
	.view_general_appointment .m-portlet__head .m-portlet__head-title{
		gap: 20px;
	}
	html[dir="rtl"] .view_general_appointment .m-portlet__head a.back-link svg {
		transform: rotate(-180deg);
	}
 </style>
<?php
include('header_welcome.php');
?>
<!-- END: Left Aside -->
<div class="m-grid__item m-grid__item--fluid m-wrapper">
        <!-- END: Subheader -->
        <div class="m-content view_general_appointment">

            <!--begin::Portlet-->
			<div class="m-portlet__head">
				<div class="m-portlet__head-caption">
					<div class="m-portlet__head-title d-flex">
						<a class="back-link mt-1" href="<?= base_url("front/view_case/{$data->case_id}") ?>">
							<svg width="16" height="14" viewBox="0 0 16 14" fill="none" xmlns="http://www.w3.org/2000/svg">
							<path fill-rule="evenodd" clip-rule="evenodd" d="M7.70679 13.7006C7.51926 13.888 7.26495 13.9934 6.99979 13.9934C6.73462 13.9934 6.48031 13.888 6.29279 13.7006L0.292786 7.70057C0.105315 7.51304 0 7.25874 0 6.99357C0 6.72841 0.105315 6.4741 0.292786 6.28657L6.29279 0.286571C6.48139 0.104413 6.73399 0.00361876 6.99619 0.00589718C7.25838 0.0081756 7.5092 0.113345 7.6946 0.298753C7.88001 0.484161 7.98518 0.734973 7.98746 0.99717C7.98974 1.25937 7.88894 1.51197 7.70679 1.70057L3.41379 5.99357H14.9998C15.265 5.99357 15.5194 6.09893 15.7069 6.28646C15.8944 6.474 15.9998 6.72835 15.9998 6.99357C15.9998 7.25879 15.8944 7.51314 15.7069 7.70068C15.5194 7.88821 15.265 7.99357 14.9998 7.99357H3.41379L7.70679 12.2866C7.89426 12.4741 7.99957 12.7284 7.99957 12.9936C7.99957 13.2587 7.89426 13.513 7.70679 13.7006Z" fill="#333333"/>
							</svg>
						</a>
						<h3 class="m-portlet__head-text">
							<?php echo $this->lang->line('General_Details');?>
						</h3>
					</div>
				</div>
			</div>
            <div class="m-portlet lp-theme-card">

				<form class="m-form m-form--fit m-form--label-align-right m-form--group-seperator-dashed">
				<div class="m-portlet__body">
		
					<div class="in_fo pt-4 mb-8">		
						<div class="form-group m-form__group row">
							<div class="form-group col-sm-2 d-flex flex-column gap_14 my-4">
								<span class="card_label"><?php echo $this->lang->line('E_Service_Number');?></span>
								<span class="value"><?php echo $data->case_number; ?></span>
							</div>
							<div class="form-group col-sm-2 d-flex flex-column gap_14 my-4">
								<span class="card_label"><?php echo $this->lang->line('E_Service_Type');?></span>
								<span class="value"><?php echo getCaseType($data->case_type); ?></span>
							</div>
							<div class="form-group col-sm-2 d-flex flex-column gap_14 my-4">
								<span class="card_label"><?php echo $this->lang->line('Client_Name');?></span>
								<span class="value"><?php echo $data->client_name; ?></span>
							</div>
							<div class="form-group col-sm-2 d-flex flex-column gap_14 my-4">
								<span class="card_label"><?php echo $this->lang->line('General_Number');?></span>
								<span class="value"><?php echo $data->session_number; ?></span>
							</div>
							<div class="form-group col-sm-2 d-flex flex-column gap_14 my-4">
								<span class="card_label"><?php echo $this->lang->line('General_Date');?></span>
								<span class="value"><?php echo getTheDayAndDateFromDatePanFront($data->session_date); ?></span>
							</div>
							<div class="form-group col-sm-2 d-flex flex-column gap_14 my-4">
								<span class="card_label"><?php echo $this->lang->line('General_Time');?></span>
								<span class="value"><?php echo $data->session_time; ?></span>
							</div>
							<div class="form-group col-sm-2 d-flex flex-column gap_14 my-4">
								<span class="card_label"><?php echo $this->lang->line('client_File_number');?></span>
								<span class="value"><?php echo $data->client_file_number; ?></span>
							</div>
							
							<div class="form-group col-sm-2 d-flex flex-column gap_14 my-4">
								<span class="card_label"><?php echo $this->lang->line('E_Service_Date');?></span>
								<span class="value"><?php echo getTheDayAndDateFromDatePanFront($data->case_date); ?></span>
							</div>
							<div class="form-group col-sm-4 d-flex flex-column gap_14 my-4">
								<span class="card_label"><?php echo $this->lang->line('Attached_files');?></span>
								<?php $temp_app_id = $data->id;
								$files = $this->db->select('*')->where("(temp_app_id = '$temp_app_id' AND cat_id = 8 AND type='general')", NULL, FALSE)->get('document')->result_array(); 
								if ( !empty( $files ) ){
								?>
								<span class="value d-flex" style="gap: 8px;align-items: baseline;"><a href="<?=base_url('uploads/case_file/' . $files[0]["name"]);?>"><?php echo $files[0]['name']; ?> <i class="fa fa-download"></i></a></span> <?php } ?>
							</div>
							<div class="form-group col-sm-12 d-flex flex-column gap_14 my-4">
								<span class="card_label"><?php echo $this->lang->line('Description');?></span>
								<span class="value"><?php echo $data->note; ?></span>
							</div>
						</div>
					</div>

					<?php 
						$id = $this->session->userdata('user_id');
						$appoinments =  $this->db->select("writing_misssion.*,c_case.id as case_id,c_case.client_name,c_case.case_number,c_case.opponent_full_name,c_case.case_title,c_case.court_name,c_case.judge_name")
						->join('c_case', "c_case.id = writing_misssion.case_id", 'left')
						->where("(c_case.customers_id = $id  AND status=0)", NULL, FALSE)->where("writing_misssion.sub_mission_id",$temp_app_id)
						->get('writing_misssion')
						->result_array();
						if ( !empty ( $appoinments ) ) {
							?>
					<div class="my-12">
						<h3><?php echo $this->lang->line('Sub_Mission') ?></h3>
					</div>
					<div class="form-group m-form__group row sub-missions">
						<?php
								foreach ( $appoinments as $appoinment ) {
						?>
						<div class="in_fo my-8 col-sm-4">
							<div class="form-group m-form__group row">
								<div class="form-group col-sm-6 d-flex flex-column gap_14 my-4">
									<span class="card_label"><?php echo $this->lang->line('Decision');?></span>
									<span class="value"><?php echo $appoinment['decision']; ?></span>
								</div>
								<div class="form-group col-sm-6 d-flex flex-column gap_14 my-4">
									<span class="card_label"><?php echo $this->lang->line('Date');?></span>
									<span class="value"><?php echo $appoinment['session_date']; ?></span>
								</div>
								<div class="form-group col-sm-12 d-flex flex-column gap_14 my-4">
									<span class="card_label"><?php echo $this->lang->line('Reports');?></span>
									<span class="value" style="word-wrap: break-word;"><?php echo $appoinment['report']; ?></span>
								</div>
							</div>
						</div>
						<?php } } ?>
					</div>


				</div>
			</div>
        </div> <!-- End content -->
    </div>
</div>


<?php

include('footer.php');

?>
