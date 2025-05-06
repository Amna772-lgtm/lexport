<?php
require 'header.php';

?>

	<style>
	.datepicker table tr td.disabled, .datepicker table tr td.disabled:hover {

	color: #c5c5c5 !important;

}
		.m-form.m-form--group-seperator-dashed .m-form__group {
			border-bottom: 0px dashed #ebedf2;
		}
		.thh h3{
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
		.in_fo{
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
		.m-portlet .m-form.m-form--fit > .m-portlet__body {
			padding-bottom: 40px !important;
		}
		.nav {
			display: -webkit-box;
		}
		.nopadonlist .col-lg-12 {
	padding: 0 !important;
}
	</style>

	<div class="m-grid__item m-grid__item--fluid m-wrapper">


		<!-- END: Subheader -->
		<div class="m-content">

			<!--begin::Portlet-->
			<div class="m-portlet lp-theme-card bg-transparent">
				<div class="m-portlet__head">
					<div class="m-portlet__head-caption">
						<!-- <div class="m-portlet__head-title">
							<h3 class="m-portlet__head-text">
							<?php echo $this->lang->line( 'By_Task' ); ?>
							</h3>
						</div> -->
						<div class="theme-new-nav-menu">
						<h3 class="m-portlet__title" style="margin-right: 70px; font-size:24px !important;">
								<?php echo $this->lang->line( 'Report' ); ?>
							</h3>
							<ul>
								<li> <a href="http://lexport.demosbywpsqr.com/admin/report/by_employees">By Employees</a> </li>
								<li> <a href="http://lexport.demosbywpsqr.com/admin/report/by_cost">By Cost</a> </li>
								<li> <a href="http://lexport.demosbywpsqr.com/admin/report/by_time">By Time</a> </li>
								<li class="active"> <a href="http://lexport.demosbywpsqr.com/admin/report/by_task">By Task</a> </li>
								<li> <a href="http://lexport.demosbywpsqr.com/admin/report/by_evaluation">By Evaluation</a> </li>
							</ul>

							<!-- <a class="btn btn-primary" href="#"> <i class="fa fa-plus"></i> Assign</a> -->
						</div>
					</div>
				</div>
 

<?php
echo form_open_multipart(
	'admin/report/by_task',
	array(
		'id'    => 'employer',
		'class' => 'm-form m-form--fit m-form--label-align-right m-form--group-seperator-dashed',
	)
);

?>

				<!--begin::Form-->
 
				<div class="m-portlet__body theme-inner-form">

						<div class="form-field-container">
						<h3><?php echo htmlspecialchars( $this->lang->line( 'Generate_Report' ), ENT_QUOTES, 'UTF-8' ); ?></h3>
						<?php
						$eid    = isset( $_POST['emp'] ) ? $_POST['emp'] : '';
						$from   = isset( $_POST['from'] ) ? html_escape( $_POST['from'] ) : '';
						$to     = isset( $_POST['to'] ) ? $_POST['to'] : '';
						$branch = isset( $_POST['branch'] ) ? $_POST['branch'] : '';
						?>
			<div class="form-group m-form__group row">
				<div class="form-group col-md-6">
				<label><?php echo $this->lang->line( 'From' ); ?></label>
				<?php
				echo form_input(
					array(
						'id'           => 'from',
						'name'         => 'from',
						'class'        => 'form-control',
						'value'        => $from,
						'autocomplete' => 'off',
						'required'     => 'required',
					)
				);
				?>
				<div class="form-error"><?php echo htmlspecialchars( form_error( 'from' ), ENT_QUOTES, 'UTF-8' ); ?></div>
			</div>	

		
			<div class="form-group col-sm-6 col-md-3">
				<label><?php echo $this->lang->line( 'branch' ); ?></label>
				<select name="branch" id="branch" class="form-control">
				<option  value=""><?php echo $this->lang->line( 'All' ); ?></option>
				<?php
				foreach (branch() as $b) { ?>
					<option value="<?php echo html_escape($b['id'])?>" <?php if($branch==$b['id']) echo "selected=selected";?>><?php echo html_escape($b['name'])?></option>
					<?php } ?>
				</select>
			</div> 		
				
			<div class="form-group col-sm-6 col-md-3">
			<label><?php echo $this->lang->line( 'Select_Employee' ); ?></label>
			<select name="emp" id="employee_type" class="form-control">
			<option  value=""><?php echo $this->lang->line( 'All' ); ?></option>
		<?php

		foreach ( $get_per_clients as $get_per_clients ) {
			?>
						<option value="<?php echo $get_per_clients['id']; ?>" 
													<?php
													if ( $eid == $get_per_clients['id'] ) {
														echo 'selected=selected';}
													?>
						><?php echo $get_per_clients['name']; ?></option>
					<?php } ?>
			</select>
		</div> 		<div class="form-group col-sm-12 mt-4">
								<?php
									$submit = $this->lang->line( 'Submit' );
									echo form_submit(
										array(
											'name'  => 'addadmin',
											'id'    => 'addadmin',
											'value' => $submit,
											'class' => 'btn btn-primary btn-lg',
										)
									);
									?>
									</div>
 
</div>

<?php if ( $data ) { ?>
<div class="row">
<div class="col-lg-8">
	<div class="row thh">
		<div class="col-lg-12">
			<h3><?php echo $this->lang->line( 'Graph' ); ?></h3>
		</div>
	</div>
	<div class="in_fo">
		<div class="form-group m-form__group row">
				<canvas id="myChart" width="200" height="200"></canvas>
		</div>
	</div>
</div>
<div class="col-lg-4 " style=" margin: 0; padding: 0; ">
	<div class="row thh">
		<div class="col-lg-12">
			<h3><?php echo $this->lang->line( 'Report_Calculation' ); ?></h3>
		</div>
	</div> 
	<div class="in_fo nopadonlist">
		<div class="form-group m-form__group row">
		<div class="col-lg-12">
			<label class=""><?php echo $this->lang->line( 'Assign_Case' ); ?>:<b> <?php echo $asign_case; ?></b></label>  
			</div>
		<div class="col-lg-12">
			<label class=""><?php echo $this->lang->line( 'Following_File' ); ?>:<b> <?php echo $following_file; ?></b></label> 
		</div>
		<div class="col-lg-12">
			<label class=""><?php echo $this->lang->line( 'Responsible_File' ); ?>:<b> <?php echo $responsible_file; ?></b></label> 
		</div>
		<div class="col-lg-12">
			<label class=""><?php echo $this->lang->line( 'File_Convert' ); ?>:<b> <?php echo $convert_file; ?></b></label> 
		</div>
		<div class="col-lg-12">
			<label class=""><?php echo $this->lang->line( 'E_Service_Convert' ); ?>:<b> <?php echo $convert_case; ?></b></label> 
		</div>
		<div class="col-lg-12">
			<label class=""><?php echo $this->lang->line( 'Session_Convert' ); ?>:<b> <?php echo $convert_session; ?></b></label> 
		</div>
		<div class="col-lg-12">
			<label class=""><?php echo $this->lang->line( 'Writing_Convert' ); ?>:<b> <?php echo $convert_writing; ?></b></label> 
		</div>
		<div class="col-lg-12">
			<label class=""><?php echo $this->lang->line( 'Consultation_Convert' ); ?>:<b> <?php echo $convert_consultation; ?></b></label> 
		</div>
		<div class="col-lg-12">
			<label class=""><?php echo $this->lang->line( 'Visiting_Convert' ); ?>:<b> <?php echo $convert_visiting; ?></b></label> 
		</div>
		<div class="col-lg-12">
			<label class=""><?php echo $this->lang->line( 'General_Convert' ); ?>:<b> <?php echo $convert_general; ?></b></label> 
		</div> 
		</div>
	</div>
</div>
</div></div>
</div>
 
						<div class="row thh">
							<div class="col-lg-12">
								<h3><?php echo $this->lang->line( 'Report_Summery' ); ?></h3>
							</div>
						</div>
						<div class="in_fo">
				  
						<div class="form-group m-form__group row">
							<div class="col-lg-12">
								<h3><?php echo $this->lang->line( 'Session' ); ?><br>&nbsp;</h3>
							</div>
							<div class="col-lg-12">
								<div class="m_datatable m-datatable m-datatable--default m-datatable--loaded" style="">
									<table class="table table-hover table-striped">
										<thead>
										<tr class="netTr">
											<th><?php echo $this->lang->line( 'No' ); ?></th>
											<th><?php echo $this->lang->line( 'E_Service_No' ); ?></th>
											<th><?php echo $this->lang->line( 'Session_Number' ); ?></th>
											<th><?php echo $this->lang->line( 'Session_Date' ); ?></th>
											<th><?php echo $this->lang->line( 'Session_End_Date' ); ?></th>
											<th><?php echo $this->lang->line( 'Client_Name' ); ?></th>
											<th><?php echo $this->lang->line( 'Following_Employee' ); ?></th>
											<th><?php echo $this->lang->line( 'Responsible_Employee' ); ?></th>
										</tr>
										</thead>
										<tbody>

										<?php
											$count = 1;
										foreach ( $session as $appoinment ) {
											?>
				<tr style="text-align: center;" class="hide<?php echo $appoinment['id']; ?>">
				<td><?php echo $count++; ?></td>
				<td><?php echo $appoinment['case_number']; ?></td>
				<td><?php echo $appoinment['session_number']; ?></td>
				
				<td>
											<?php
											echo $appoinment['session_date'];
											echo getTheDayFromDate( $appoinment['session_date'] );
											?>
											</td>
				<td>
											<?php
											echo $appoinment['session_end_date'];
											echo getTheDayFromDate( $appoinment['session_end_date'] );
											?>
				</td>
				<td><?php echo $appoinment['client_name']; ?></td>
				<td><?php echo getEmployeeName( $appoinment['responsible_employee'] ); ?></td>
				<td><?php echo getEmployeeName( $appoinment['follow_up_employee'] ); ?></td>
		
				</tr>
											<?php } ?>

										</tbody>
									</table>
								</div>
							</div>
						</div>

						<div class="form-group m-form__group row">
							<div class="col-lg-12">
								<h3><?php echo $this->lang->line( 'Writings' ); ?><br>&nbsp;</h3>
							</div>
							<div class="col-lg-12">
								<div class="m_datatable m-datatable m-datatable--default m-datatable--loaded" style="">
									<table class="table table-hover table-striped">
										<thead>
										<tr class="netTr">
											<th><?php echo $this->lang->line( 'No' ); ?></th>
											<th><?php echo $this->lang->line( 'E_Service_No' ); ?></th>
											<th><?php echo $this->lang->line( 'Writing_Number' ); ?></th>
											<th><?php echo $this->lang->line( 'Writing_Date' ); ?></th>
											<th><?php echo $this->lang->line( 'Writing_End_Date' ); ?></th>
											<th><?php echo $this->lang->line( 'Client_Name' ); ?></th>
											<th><?php echo $this->lang->line( 'Following_Employee' ); ?></th>
											<th><?php echo $this->lang->line( 'Responsible_Employee' ); ?></th>
							  
										</tr>
										</thead>
										<tbody>


											<?php
											$count = 1;
											foreach ( $writings as $appoinment ) {
												?>
				<tr style="text-align: center;" class="hide<?php echo $appoinment['id']; ?>">
				<td><?php echo $count++; ?></td>
					<td><?php echo $appoinment['case_number']; ?></td>
				<td><?php echo $appoinment['session_number']; ?></td>
				<td>
												<?php
												echo $appoinment['session_date'];
												echo getTheDayFromDate( $appoinment['session_date'] );
												?>
												</td>
				<td>
												<?php
												echo $appoinment['session_end_date'];
												echo getTheDayFromDate( $appoinment['session_end_date'] );
												?>
				</td>
				<td><?php echo $appoinment['client_name']; ?></td>
				<td><?php echo getEmployeeName( $appoinment['responsible_employee'] ); ?></td>
				<td><?php echo getEmployeeName( $appoinment['follow_up_employee'] ); ?></td>
			 
				</tr>
											<?php } ?>

										</tbody>
									</table>
								</div>
							</div>
						</div>

						<div class="form-group m-form__group row">
							<div class="col-lg-12">
								<h3><?php echo $this->lang->line( 'Consultation' ); ?><br>&nbsp;</h3>
							</div>
							<div class="col-lg-12">
								<div class="m_datatable m-datatable m-datatable--default m-datatable--loaded" style="">
									<table class="table table-hover table-striped">
										<thead>
										<tr class="netTr">
											<th><?php echo $this->lang->line( 'No' ); ?></th>
											<th><?php echo $this->lang->line( 'E_Service_No' ); ?></th>
											<th><?php echo $this->lang->line( 'Consultation_Number' ); ?></th>
											<th><?php echo $this->lang->line( 'Consultation_Date' ); ?></th>
											<th><?php echo $this->lang->line( 'Consultation_End_Date' ); ?></th>
											<th><?php echo $this->lang->line( 'Client_Name' ); ?></th>
											<th><?php echo $this->lang->line( 'Following_Employee' ); ?></th>
											<th><?php echo $this->lang->line( 'Responsible_Employee' ); ?></th>
								
										</tr>
										</thead>
										<tbody>
		<?php
				$count = 1;
		foreach ( $consultation as $appoinment ) {
			?>
				<tr style="text-align: center;" class="hide<?php echo $appoinment['id']; ?>">
				<td><?php echo $count++; ?></td>
					<td><?php echo $appoinment['case_number']; ?></td>
				<td><?php echo $appoinment['session_number']; ?></td>
				<td>
				<?php
				echo $appoinment['session_date'];
				echo getTheDayFromDate( $appoinment['session_date'] );
				?>
				</td>
				<td>
				<?php
				echo $appoinment['session_end_date'];
				echo getTheDayFromDate( $appoinment['session_end_date'] );
				?>
				</td>
				<td><?php echo $appoinment['client_name']; ?></td>
				<td><?php echo getEmployeeName( $appoinment['responsible_employee'] ); ?></td>
				<td><?php echo getEmployeeName( $appoinment['follow_up_employee'] ); ?></td>    
			 
				
				</tr>
			<?php } ?>
										</tbody>
									</table>
								</div>
							</div>
						</div>

						<div class="form-group m-form__group row">
							<div class="col-lg-12">
								<h3><?php echo $this->lang->line( 'Visiting' ); ?><br>&nbsp;</h3>
							</div>
							<div class="col-lg-12">
								<div class="m_datatable m-datatable m-datatable--default m-datatable--loaded" style="">
									<table class="table table-hover table-striped">
										<thead>
										<tr class="netTr">
											<th><?php echo $this->lang->line( 'No' ); ?></th>
											<th><?php echo $this->lang->line( 'E_Service_No' ); ?></th>
											<th><?php echo $this->lang->line( 'Visiting_Number' ); ?></th>
											<th><?php echo $this->lang->line( 'Visiting_Date' ); ?></th>
											<th><?php echo $this->lang->line( 'Visiting_End_Date' ); ?></th>
											<th><?php echo $this->lang->line( 'Client_Name' ); ?></th>
											<th><?php echo $this->lang->line( 'Following_Employee' ); ?></th>
											<th><?php echo $this->lang->line( 'Responsible_Employee' ); ?></th>
										
										</tr>
										</thead>
										<tbody>

										<?php
										$count = 1;
										foreach ( $visiting as $appoinment ) {
											?>
				<tr style="text-align: center;"  class="hide<?php echo $appoinment['id']; ?>">
				<td><?php echo $count++; ?></td>
					<td><?php echo $appoinment['case_number']; ?></td>
				<td><?php echo $appoinment['session_number']; ?></td>
				<td>
											<?php
											echo $appoinment['session_date'];
											echo getTheDayFromDate( $appoinment['session_date'] );
											?>
											</td>
				<td>
											<?php
											echo $appoinment['session_end_date'];
											echo getTheDayFromDate( $appoinment['session_end_date'] );
											?>
				</td>
				<td><?php echo $appoinment['client_name']; ?></td>
				<td><?php echo getEmployeeName( $appoinment['responsible_employee'] ); ?></td>
				<td><?php echo getEmployeeName( $appoinment['follow_up_employee'] ); ?></td>      
			   
				</tr>
										<?php } ?>

									   
										</tbody>
									</table>
								</div>
							</div>
						</div>


						<div class="form-group m-form__group row">
							<div class="col-lg-12">
								<h3><?php echo $this->lang->line( 'GENERAL' ); ?><br>&nbsp;</h3>
							</div>
							<div class="col-lg-12">
								<div class="m_datatable m-datatable m-datatable--default m-datatable--loaded" style="">
									<table class="table table-hover table-striped">
										<thead>
										<tr class="netTr">
											<th><?php echo $this->lang->line( 'No' ); ?></th>
											<th><?php echo $this->lang->line( 'E_Service_No' ); ?></th>
											<th><?php echo $this->lang->line( 'General_Number' ); ?></th>
											<th><?php echo $this->lang->line( 'General_Date' ); ?></th>
											<th><?php echo $this->lang->line( 'General_End_Date' ); ?></th>
											<th><?php echo $this->lang->line( 'Client_Name' ); ?></th>
											<th><?php echo $this->lang->line( 'Following_Employee' ); ?></th>
											<th><?php echo $this->lang->line( 'Responsible_Employee' ); ?></th>
									  
										</tr>
										</thead>
										<tbody>

										<?php
										$count = 1;
										foreach ( $general as $appoinment ) {
											?>
				<tr style="text-align: center;"  class="hide<?php echo $appoinment['id']; ?>">
				<td><?php echo $count++; ?></td>
					<td><?php echo $appoinment['case_number']; ?></td>
				<td><?php echo $appoinment['session_number']; ?></td>
				<td>
											<?php
											echo $appoinment['session_date'];
											echo getTheDayFromDate( $appoinment['session_date'] );
											?>
											</td>
				<td>
											<?php
											echo $appoinment['session_end_date'];
											echo getTheDayFromDate( $appoinment['session_end_date'] );
											?>
				</td>
				<td><?php echo $appoinment['client_name']; ?></td>
				<td><?php echo getEmployeeName( $appoinment['responsible_employee'] ); ?></td>
				<td><?php echo getEmployeeName( $appoinment['follow_up_employee'] ); ?></td>
			 
				</tr>
										<?php } ?>
										</tbody>
									</table>
								</div>
							</div>
						</div>
 

							</div>
<?php } ?>
 
						
					</div>

				</form>

				<!--end::Form-->
			</div>

			<!--end::Portlet-->
		</div>
	</div>
	</div>
<?php

require 'footer.php';
?>
<script type="text/javascript" src="https://cdn.jsdelivr.net/jquery/latest/jquery.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
<script type="text/javascript">

$(function() {

	var start = moment().subtract(29, 'days');
	var end = moment();
	function cb(start, end) {
		$('#from span').html(start.format('YYYY-D-MMMM') + ' - ' + end.format('YYYY-D-MMMM'));
	}

	$('#from').daterangepicker({
		startDate: start,
		endDate: end,
		dateFormat: 'yy-dd-mm',
		alwaysShowCalendars: true,
		ranges: {
			'Today': [moment(), moment()],
			'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
			'Last 7 Days': [moment().subtract(6, 'days'), moment()],
			'Last 30 Days': [moment().subtract(29, 'days'), moment()],
			'This Month': [moment().startOf('month'), moment().endOf('month')],
			'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')],
			"This Year": [
					"<?php echo date( 'm/d/Y', mktime( 0, 0, 0, 1, 1, date( 'Y' ) ) ); ?>",
					"<?php echo date( 'm/d/Y', mktime( 0, 0, 0, date( 'm' ), 1, date( 'Y' ) + 1 ) - 1 ); ?>"
				],
				"Last Year": [
					"<?php echo date( 'm/d/Y', mktime( 0, 0, 0, 1, 1, date( 'Y' ) - 1 ) ); ?>",
					"<?php echo date( 'm/d/Y', mktime( 0, 0, 0, 1, 1, date( 'Y' ) ) - 1 ); ?>"
				],
		}
	}, cb);

	cb(start, end);

});

</script><script>
var ctx = document.getElementById('myChart').getContext('2d');
ctx.height = 500;
data = {
	datasets: [{
		data: [<?php echo $asign_case; ?>, <?php echo $following_file; ?>, <?php echo $responsible_file; ?>, <?php echo $convert_file; ?>, <?php echo $convert_case; ?>, <?php echo $convert_session; ?>, <?php echo $convert_writing; ?>, <?php echo $convert_consultation; ?>, <?php echo $convert_visiting; ?>, <?php echo $convert_general; ?>],
			backgroundColor: [
				'rgba(255, 99, 132, 0.2)',
				'rgba(54, 162, 235, 0.2)',
				'rgba(255, 206, 86, 0.2)',
				'rgb(146, 81, 117)',
				'rgb(81, 146, 140)',
				'rgb(100, 146, 81)',
				'rgb(130, 120, 35)',
				'rgb(33, 150, 243)',
				'rgb(63, 81, 181)',
				'rgb(96, 125, 139)',
 
			],
	}],

	// These labels appear in the legend and in the tooltips when hovering different arcs
	labels: [
		'Assign Case',
		'Following File',
		'Responsible File',
		'File Convert',		
		'E-Service Convert',		
		'Session Convert',		
		'Writing Convert',	
		'Consultation Convert',	
		'Visiting Convert',	
		'General Convert',	
	],
	options: {
	responsive: true,
	maintainAspectRatio: false,
	scales: {
		yAxes: [{
			ticks: {
				beginAtZero:true
			}
		}]
	}
}

};
var myPieChart = new Chart(ctx, {
	type: 'pie',
	data: data,
		
});
</script>