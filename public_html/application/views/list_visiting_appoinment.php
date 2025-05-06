<?php $nvc = "white-nav sticky shrink modern hover4 radius-drop"; 
$pageTitle = $this->lang->line("Visiting_Mission");
include('header.php');
	 
?>
 </section>
<?php
include('header_welcome.php');
?>
<style>
	.modal-dialog {
        max-width: 580px !important;
    }
	.modal .modal-content {
    background: #ffffff;
}
</style>
<!-- END: Left Aside -->
 
    <div class="m-grid__item m-grid__item--fluid m-wrapper">


        <!-- END: Subheader -->
        <div class="m-content meetings_list">

            <!--begin::Portlet-->
            <div class="m-portlet lp-theme-card bg-transparent">
                <div class="m-portlet__head">
					<div class="theme-new-nav-menu">
						<ul>
							<li class="active"> <a href="#"><?php echo $this->lang->line('All')?></a> </li>
							
						</ul>
						<div class="custom-meeting-search">
							<img class="meeting-search-icon" src="/assets/images/img/search-icon.svg" alt="Search">
							<input type="text" id="meetingSearch" class="form-control" placeholder="Search">
						</div>
						<!-- <input type="text" id="meetingSearch" class="form-control" placeholder="Search Client, E-Services........"> -->
					</div>
                </div>

               <?php $appoinment = array(); foreach($data as $key=>$appoinment){
				echo form_input(['type' => 'hidden', 'name' => 'id', 'value' => '', 'class' => 'data_id']); 
				echo form_input(['type' => 'hidden', 'name' => 'case_id', 'value' => '', 'class' => 'data_case_id']); 
				echo form_input(['type' => 'hidden', 'name' => 'client_file_number', 'value' => '', 'class' => 'data_client_file_number']);
				?>

	
				<div class="m-portlet__body">
					<div class="tab-content">
						<div class="tab-pane active" id="m_tabs_1_1" role="tabpanel">
							<div class="m-portlet__body">
								<div class="m_datatable m-datatable m-datatable--default m-datatable--loaded" style="">
									<div class="table-responsive">
										<table class="lp-theme-table lp-large-theme m_datatable" id="m_table_1">
											<thead>
												<tr class="netTr" style="text-align:left;">
													<th><?php echo $this->lang->line('Serial_No');?></th>
													<th><?php echo $this->lang->line('Client_Name');?></th>
													<th><?php echo $this->lang->line('File_Number');?></th>
													
													<th><?php echo $this->lang->line('Client_Type');?></th>
													<th><?php echo $this->lang->line('E-Service_No');?></th>
													<th><?php echo $this->lang->line('Date_and_Time');?></th>
													<th></th>
												</tr>
											</thead>
											<tbody>
		
												<?php 
												$count=1; 
												foreach($appoinment as $appoinment){  ?>
													<tr class="<?php if(getMissionCount( $appoinment['id'],"visiting_mission") > 0) echo 'issubm'; ?>" style="text-align:left;" >
														<?php $serial_number = sprintf("#%02d", $count++); ?>
														<td data-sort="<?= $count - 1 ?>"><?= $serial_number ?></td>
														<td><?= $appoinment['client_name'] ?></td>
														<td><?= $appoinment['client_file_number'] ?></td>
														<td><?= $appoinment['meeting_type'] ?></td>
														<td><?= $appoinment['case_number'] ?></td>
														<td><?= $appoinment['session_date']; ?> - <?= $appoinment['session_time'] ?></td>
														<td class="action">
															<a data-target="#view-modal" class="viewing-modal" data-toggle="modal" data-id="<?= $appoinment['id'] ?>" title="<?php echo $this->lang->line('View');?>">
                                                            <div style="display:none" class="appointment_data" data-array='<?php echo json_encode( $appoinment ); ?>'></div>
																
																<img src="<?= base_url('assets/images/img/eye-solid.svg') ?>" alt="View" class="img-eye">
															</a>
														</td>
													</tr>
													<?php 
														$id = $this->session->userdata('user_id');
													$appoinments =  $this->db->select("visiting_mission.*,c_case.id as case_id,c_case.client_name,c_case.case_number,c_case.opponent_full_name,c_case.case_title,c_case.court_name,c_case.judge_name")
													->join('c_case', "c_case.id = visiting_mission.case_id", 'left')
													->where("(c_case.customers_id = $id  AND status=0)", NULL, FALSE)->where("visiting_mission.sub_mission_id",$appoinment["id"])
													->get('visiting_mission')
													->result_array(); 
													?>
													<?php foreach($appoinments as $appoinment){  ?>
														<tr class="submissions" style="text-align: left;">
															<?php $serial_number = sprintf("#%02d", $count++); ?>
															<td data-sort="<?= $count - 1 ?>"><?= $serial_number ?></td>
															<td><?= $appoinment['client_name'] ?></td>
															<td><?= $appoinment['client_file_number'] ?></td>
															<td><?= $appoinment['meeting_type'] ?></td>
															<td><?= $appoinment['case_number'] ?></td>
															<td><?= $appoinment['session_date']; ?> - <?= $appoinment['session_time'] ?></td>
															
															<td class="action">
																<a data-target="#view-modal" class="viewing-modal" data-toggle="modal" data-id="<?= $appoinment['id'] ?>" title="<?php echo $this->lang->line('View');?>">
																	
																	<img src="<?= base_url('assets/images/img/eye-solid.svg') ?>" alt="View" class="img-eye">

																</a>		
															</td>
														</tr>
							
													<?php } ?>
												<?php } ?>
												<input type="hidden" name="session_number" class="session_number">
											</tbody>
										</table>
									</div>
								</div>
								<!-- start view modal -->
								<div class="modal fade lp-theme-modal" id="view-modal" tabindex="-1" role="dialog" aria-labelledby="modalTitle" aria-hidden="true">
									<div class="modal-dialog" role="document">
										<div class="modal-content">
											<div class="modal-header">
												<h5 class="modal-title" id="modalTitle"><?php echo $this->lang->line('View_Details')?></h5>
												<button type="button" class="close" data-dismiss="modal" aria-label="Close">
													
													<svg width="17" height="17" viewBox="0 0 17 17" fill="none" xmlns="http://www.w3.org/2000/svg">
													<path opacity="0.5" fill-rule="evenodd" clip-rule="evenodd" d="M0.39988 0.803673C0.656 0.54763 1.00333 0.403793 1.36548 0.403793C1.72763 0.403793 2.07496 0.54763 2.33108 0.803673L8.19434 6.66693L14.0576 0.803673C14.1836 0.673228 14.3343 0.56918 14.5009 0.497602C14.6676 0.426023 14.8468 0.388346 15.0281 0.38677C15.2095 0.385194 15.3893 0.419751 15.5572 0.488423C15.725 0.557095 15.8775 0.658508 16.0057 0.786744C16.134 0.91498 16.2354 1.06747 16.3041 1.23532C16.3727 1.40317 16.4073 1.58301 16.4057 1.76436C16.4041 1.94571 16.3665 2.12492 16.2949 2.29155C16.2233 2.45818 16.1192 2.60889 15.9888 2.73487L10.1255 8.59813L15.9888 14.4614C16.2376 14.719 16.3753 15.064 16.3721 15.4221C16.369 15.7802 16.2254 16.1227 15.9722 16.376C15.7189 16.6292 15.3764 16.7728 15.0183 16.7759C14.6602 16.779 14.3152 16.6414 14.0576 16.3926L8.19434 10.5293L2.33108 16.3926C2.07349 16.6414 1.7285 16.779 1.3704 16.7759C1.01229 16.7728 0.669742 16.6292 0.416517 16.376C0.163291 16.1227 0.0196542 15.7802 0.0165424 15.4221C0.0134306 15.064 0.151093 14.719 0.39988 14.4614L6.26314 8.59813L0.39988 2.73487C0.143837 2.47875 0 2.13143 0 1.76927C0 1.40712 0.143837 1.05979 0.39988 0.803673Z" fill="#1B2A39"/>
													</svg>

												</button>
											</div>
											<div class="modal-body">
												<div class="m-grid__item m-grid__item--fluid m-wrapper">
													<div class="m-content">
														<!--begin::Portlet-->
														<div class="m-portlet lp-theme-card bg-transparent">
															<div class="m-portlet__head">
																<div class="m-portlet__head-caption">
																	
																</div>
															</div>
															<div class="m-portlet__body theme-inner-form">
																<div class="form-field-container">
																	<div class="form-group m-form__group row">
																		<div class="form-group col-sm-6">
																			<label for="client_name" class=" form-control-label"><?php echo $this->lang->line('Client_Name');?></label>
																			<div>
																				<span class="client_name"></span>
																			</div>
																		</div>
						
																		<div class="form-group col-sm-6">
																			<label for="client_file_number" class=" form-control-label"><?php echo $this->lang->line('File_Number');?></label>
																			<div>
																				<span class="client_file_number"></span>
																			</div>
																		</div>
																		<div class="form-group col-sm-6">
																			<label for="client_type" class=" form-control-label"><?php echo $this->lang->line('Client_Type');?></label>
																			<div>
																				<span class="meeting_type"></span>
																			</div>
																		</div>

																		<div class="form-group col-sm-6">
																			<label for="e-service_no" class=" form-control-label"><?php echo $this->lang->line('E-Service_No');?></label>
																			<div>
																				<span class="case_number"></span>
																			</div>
																		</div>

																		<div class="form-group col-sm-6">
																			<label for="session_end_date" class=" form-control-label"><?php echo $this->lang->line('Date_and_Time');?></label>
																			<div>
																				<span class="session_date"></span>
																			</div>
																		</div>

																		<div class="form-group col-sm-6">	
																			<label for="sub_mission" class=" form-control-label"><?php echo $this->lang->line('Sub_Mission');?></label>
																			<div>
																				<span class="sub_mission"></span>
																			</div>
																		</div>
																		<div class="form-group col-sm-6">
																			<label for="visitor_employee" class=" form-control-label"><?php echo $this->lang->line('Visitor_Employee');?></label>
																			<div>
																				<span class="visitor_employee"></span>
																			</div>
																		</div>
																		<div class="form-group col-sm-6">		
																			<label for="visiting_place" class=" form-control-label"><?php echo $this->lang->line('Visiting_Place');?></label>
																			<div>
																				<span class="visiting_place"></span>
																			</div>
																		</div>
																	</div>
																</div>
															</div>
														</div>
													</div>
												</div>
											</div>
											
										</div>
									</div>
								</div>
								<!-- End View Modal -->

							</div>
						</div>
					</div>
				</div>
				<?php } ?>
            </div>


        </div>

    </div>




<?php

include('footer.php');

?>

<script>
$(document).ready(function () {
    var itemsPerPage = 10; // Change this to your desired rows per page
    var currentPage = 1;
    var $tableRows = $('#m_table_1 tbody tr');
    var $paginationContainer = $('<div id="pagination" class="pagination-wrapper text-center mt-3"></div>');
    $('#m_table_1').after($paginationContainer);

    function showTablePage(page) {
        var start = (page - 1) * itemsPerPage;
        var end = start + itemsPerPage;

        $tableRows.hide().slice(start, end).show();
        updateTablePagination();
    }

    function updateTablePagination() {
    var totalPages = Math.ceil($tableRows.length / itemsPerPage);
    var paginationHtml = '';

    if (totalPages > 1) {
        // Left arrow
        paginationHtml += `<a href="#" class="page-link prev" data-page="${currentPage - 1}" 
            ${currentPage === 1 ? 'style="pointer-events:none;opacity:0.5;"' : ''}>
            &lt;
        </a> `;

        // Page numbers
        for (var i = 1; i <= totalPages; i++) {
            if (i <= 3 || i === totalPages) { // Show first 3 and last
                paginationHtml += `<a href="#" class="page-link ${i === currentPage ? 'active' : ''}" data-page="${i}">${i}</a> `;
            } else if (i === 4) {
                paginationHtml += `... `;
            }
        }

        // Right arrow
        paginationHtml += `<a href="#" class="page-link next" data-page="${currentPage + 1}" 
            ${currentPage === totalPages ? 'style="pointer-events:none;opacity:0.5;"' : ''}>
            &gt;
        </a>`;
    }

    $('#pagination').html(paginationHtml);
}


    $(document).on('click', '.page-link', function (e) {
        e.preventDefault();
        var newPage = parseInt($(this).data('page'));
        var totalPages = Math.ceil($tableRows.length / itemsPerPage);
        if (!isNaN(newPage) && newPage >= 1 && newPage <= totalPages) {
            currentPage = newPage;
            showTablePage(currentPage);
        }
    });

    showTablePage(currentPage);
});
</script>

<script>
	$(document).on( 'click', '.viewing-modal', function(){
		var id = $(this).attr('data-id');
        var data = $(this).find('.appointment_data').data('array');
        var service_no = $(this).find('.appointment_data_service_number').data('array');
        $('#view-modal .client_name').text(data.client_name);
        $('#view-modal .client_file_number').text(data.client_file_number);
        $('#view-modal .meeting_type').text(data.meeting_type);
        $('#view-modal .case_number').text(data.case_number);
        $('#view-modal .session_date').text(data.session_date + ' - ' + data.session_time);
        $('#view-modal .sub_mission').text(data.sub_mission_id);
        $('#view-modal .visitor_employee').text(data.visitor_employee);
        $('#view-modal .visiting_place').text(data.visiting_place);
    });

	$(document).ready(function() {
		$('#meetingSearch').on('keyup', function() {
			var value = $(this).val().toLowerCase().trim();

			$('#m_datatable tbody tr').each(function() {
				var rowText = $(this).text().toLowerCase();
				if (rowText.indexOf(value) > -1) {
					$(this).show();
				} else {
					$(this).hide();
				}
			});
		});
	});

</script>