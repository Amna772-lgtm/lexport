<?php require __DIR__ . '/../header.php';
$control = 'mission_visiting'; ?>

<!-- FullCalendar v5 CSS -->
<link href="https://cdn.jsdelivr.net/npm/fullcalendar@5.11.0/main.min.css" rel="stylesheet" />

<!-- FullCalendar v5 JS -->
<script src="https://cdn.jsdelivr.net/npm/fullcalendar@5.11.0/main.min.js"></script>

<!-- Moment.js (for time parsing) -->
<script src="https://cdn.jsdelivr.net/npm/moment@2.29.1/moment.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>


<style>
    /* General Calendar Styles */
    #calendar {
        border-radius: 10px;
        padding: 20px;
    }

    /* Header Styling (Days and Dates) */
    .fc-toolbar {
        background-color: #229AD6;
        color: white;
        padding: 10px 20px;
        border-radius: 8px;
        margin-bottom: 20px;
    }

    .fc-toolbar h2 {
        font-size: 20px;
        font-weight: bold;
        margin: 0;
    }

    .fc-toolbar .fc-button {
        background-color: #229AD6;
        color: white;
        border-radius: 5px;
        padding: 5px 10px;
        margin-left: 5px;
    }

    .fc-toolbar .fc-button:hover {
        background-color: #2e59d9;
    }

    /* Table-Like Styling for the Calendar Grid */
    .fc-view {
        display: table;
        width: 100%;
    }

    /* Styling for the time grid (like rows in a table) */
    .fc-timegrid {
        display: table-row-group;
    }

    /* Styling for each day cell (like table columns) */
    .fc-day {
        display: table-cell;
        vertical-align: top;
        border-right: 1px solid #ddd; /* Border between columns */
        border-bottom: 1px solid #ddd; /* Add border at the bottom of each day */
    }

    .fc-day-header {
        background-color: #f7f7f7;
        color: #333;
        font-weight: bold;
        padding: 10px;
        text-align: center;
        border-bottom: 2px solid #ddd; /* Border below the header row */
    }

    .fc-day-header.fc-day-today {
        background-color: #e9ecef;
        font-weight: bold;
    }

    /* Event Styling (Like Table Rows) */
    .fc-time-grid-event {
        background-color: #007bff;
        color: white;
        border-radius: 5px;
        padding: 5px;
        font-size: 12px;
        margin-bottom: 5px;
        display: block;
    }

    /* Hover Effect on Events */
    .fc-time-grid-event:hover {
        background-color: #0056b3;
    }


    /* Separator Between Time Slots */
    .fc-timegrid-slot {
        border-bottom: 1px solid #f1f1f1; /* Separator for each row */
    }

    .fc-timegrid .fc-timegrid-slot-label {
        padding-bottom: 15px;
    }

    .fc-timegrid .fc-timegrid-slot {
        padding-bottom: 15px;
    }

    /* Time Slot Styling */
    .fc-timegrid-slot-label {
        background-color: #f7f7f7;
        font-size: 14px;
        font-weight: bold;
        color: #555;
        padding: 10px;
        text-align: right;
        border-right: 1px solid #ddd; /* Border between time slots */
    }

    /* Time Slot Cells (Where Events Go) */
    .fc-timegrid-slot {
        background-color: #fff;
        border-top: 1px solid #ddd;
        padding: 10px;
    }

    /* Customize the Week View */
    .fc-view-timeGridWeek .fc-day-header {
        background-color: #4e73df;
        color: white;
        padding: 10px;
        text-align: center;
        font-weight: bold;
        border-bottom: 2px solid #ddd;
    }

    /* Current Day Highlight */
    .fc-day-today {
        background-color: #e9ecef;
        border-radius: 5px;
    }

    /* Additional adjustments for styling table-like grid */
    .fc-timegrid .fc-timegrid-slot {
        border-bottom: 1px solid #f1f1f1;
    }

    .fc-timegrid-slot {
        padding: 10px;
        border-top: 1px solid #f1f1f1;
        background-color: #ffffff;
    }

    /* Additional Event Styling */
    .fc-event {
        font-size: 12px;
        padding: 0 5px;
        border-radius: 5px;
        margin-bottom: 10px;
        height: max-content;
    }

</style>


<style>
	.nav {
		display: -webkit-box;
	}
</style>

<div class="m-grid__item m-grid__item--fluid m-wrapper">


	<!-- END: Subheader -->
	<div class="m-content">

		<!--begin::Portlet-->
		<div class="m-portlet lp-theme-card bg-transparent">
			<div id="custom-search-container"></div>

				<div class="m-portlet__body">
					<div class="tab-content p-0">
						<div class="tab-pane active" id="m_tabs_1_1" role="tabpanel">
							
							<div class="custom-lp-calander-section">
								<div id="calendar"></div>
							</div>
							<!-- Start view Modal -->
							<div class="modal fade lp-theme-modal small" id="view-modal" tabindex="-1" role="dialog" aria-labelledby="modalTitle" aria-hidden="true">
								<div class="modal-dialog" role="document">
									<div class="modal-content">
										<div class="modal-header">
											<h5 class="modal-title" id="modalTitle">View Meeting</h5>
											<button type="button" class="close" data-dismiss="modal" aria-label="Close" data-bs-dismiss="modal">

												
												<svg width="17" height="17" viewBox="0 0 17 17" fill="none" xmlns="http://www.w3.org/2000/svg">
												<path opacity="0.5" fill-rule="evenodd" clip-rule="evenodd" d="M0.39988 0.803673C0.656 0.54763 1.00333 0.403793 1.36548 0.403793C1.72763 0.403793 2.07496 0.54763 2.33108 0.803673L8.19434 6.66693L14.0576 0.803673C14.1836 0.673228 14.3343 0.56918 14.5009 0.497602C14.6676 0.426023 14.8468 0.388346 15.0281 0.38677C15.2095 0.385194 15.3893 0.419751 15.5572 0.488423C15.725 0.557095 15.8775 0.658508 16.0057 0.786744C16.134 0.91498 16.2354 1.06747 16.3041 1.23532C16.3727 1.40317 16.4073 1.58301 16.4057 1.76436C16.4041 1.94571 16.3665 2.12492 16.2949 2.29155C16.2233 2.45818 16.1192 2.60889 15.9888 2.73487L10.1255 8.59813L15.9888 14.4614C16.2376 14.719 16.3753 15.064 16.3721 15.4221C16.369 15.7802 16.2254 16.1227 15.9722 16.376C15.7189 16.6292 15.3764 16.7728 15.0183 16.7759C14.6602 16.779 14.3152 16.6414 14.0576 16.3926L8.19434 10.5293L2.33108 16.3926C2.07349 16.6414 1.7285 16.779 1.3704 16.7759C1.01229 16.7728 0.669742 16.6292 0.416517 16.376C0.163291 16.1227 0.0196542 15.7802 0.0165424 15.4221C0.0134306 15.064 0.151093 14.719 0.39988 14.4614L6.26314 8.59813L0.39988 2.73487C0.143837 2.47875 0 2.13143 0 1.76927C0 1.40712 0.143837 1.05979 0.39988 0.803673Z" fill="#1B2A39"/>
												</svg>
	
											</button>
										</div>
										<div class="modal-body">
										<div class="m-grid__item m-grid__item--fluid m-wrapper">
	
											<!-- END: Subheader -->
											<div class="m-content">
	
												<!--begin::Portlet-->
												<div class="m-portlet lp-theme-card bg-transparent">
													<div class="m-portlet__head">
													</div>
	
													<!--begin::Form-->
														<div class="m-portlet__body theme-inner-form">
														<div class="form-field-container">
															<div class="form-group m-form__group row">
																<!-- <div class="form-group col-sm-12">
																<label for="case_name" class=" form-control-label">E-Service Name</label>
																<div>
																	<span id="case_name"></span>
																</div>
															</div>	 -->
															<div class="form-group col-sm-6">
																<label for="case_number" class=" form-control-label">E-Service No</label>
																<div>
																	<span id="case_number"></span>
																</div>
															</div>
																<div class="form-group col-sm-6">
																<label for="c_type" class=" form-control-label">Consultation Type</label>
																<div>
																	<span id="c_type">Type</span>
																</div>
															</div>
															<div class="form-group col-sm-6">
																<label for="session_date_time" class=" form-control-label">Consultation Date and Time</label>
																<div>
																	<span id="session_date_time" id="reason"></span>
																</div>
															</div>
															<div class="form-group col-sm-6">
																<label for="due_date_time" class=" form-control-label">Due Date and Time</label>
																<div>
																	<span id="due_date_time" id=""></span>
																</div>
															</div>
															<div class="form-group col-sm-12">
																<label for="subject" class=" form-control-label">Subject</label>
																<div>
																	<span id="subject" id="">N/A</span>
																</div>
															</div>
															<div class="form-group col-sm-12">
																<label for="note" class=" form-control-label">Description</label>
																<div>
																	<span id="note" id=""></span>
																</div>
															</div>
															<?php   $temp_app_id = $data->id; ?>
															<div class="form-group col-sm-12">
																<label for="attachment" class=" form-control-label">Attachment</label>
																<div>
																	<?php  
																		$files = $this->db->select('*')->where("(temp_app_id = '$temp_app_id' AND cat_id = 8 AND type='visiting')", NULL, FALSE)->get('document')->result_array();
																		foreach ($files as $files) { ?>
																					

																		<div class="m-widget4__item">
																			<div class="m-widget4__info">
																				<span class="m-widget4__title"><?php echo "<b>" . $files['name']."</b>";?></span><br>
																				
																			</div>
																			
																		</div>			
																	<?php } ?>
																</div>
															</div>
														</div>
											</div> 
											<div class="d-flex justify-content-end mt-4">
												<button type="button" id="edit_id" class="btn btn-primary open-edit-modal" data-id="">
													<?php echo $this->lang->line('Edit'); ?>
													<img style="margin-left:6px; height:16px;" src="<?= base_url('assets/images/img/pen-white.svg') ?>" alt="Edit">
												</button>
												</div>
											</div>
													
													</form>
	
													<!--end::Form-->
												</div>
	
												<!--end::Portlet-->
											</div>
										</div>
										<!-- <div class="modal-footer">
											<div class="modal-btn-group">
												<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
												<button type="button" class="btn btn-primary">Save</button>
											</div>
										</div> -->
									</div>
								</div>
							</div>
							<!-- End view modal -->
						</div>
					</div>
				</div>
			</div>

		</div>


	</div>

</div>

<?php include('footer.php'); ?>

	<script>
		var data = <?php echo json_encode( $data ); ?>;		
		document.addEventListener('DOMContentLoaded', function () {

			// Initialize FullCalendar v5 (no jQuery)
			var calendarEl = document.getElementById('calendar');
			var calendar = new FullCalendar.Calendar(calendarEl, {
				initialView: 'timeGridWeek', // Show only weeks with time slots
				headerToolbar: {
					left: 'prev,next today',
					center: 'title',
					right: 'timeGridDay,timeGridWeek,dayGridMonth' // You can customize this
				},
				views: {
					timeGridDay: {
						buttonText: 'Day',
					},
					timeGridWeek: {
						buttonText: 'Week',
					},
					dayGridMonth: {
						buttonText: 'Month',
					}
				},
				events: data.map(item => {
					// Use moment.js to parse the times correctly
					const startDate = moment(`${item.session_date} ${item.session_time}`, "DD/MM/YYYY hh:mm a").toDate();
					const endDate = moment(`${item.session_date} ${item.session_end_time}`, "DD/MM/YYYY hh:mm a").toDate();

					return {
						title: item.note,
						start: startDate,
						end: endDate,
						extendedProps: {
							item: item
						},
					};
				}),
				eventClick: function(info) {
					const event = info.event;
					const eventDetails = event.extendedProps.item;
					console.log(eventDetails);					
					document.getElementById('case_number').textContent = eventDetails.case_number;
					document.getElementById('note').textContent = eventDetails.note;
					document.getElementById('edit_id').addEventListener('click', function () {
						window.location.href = 'find_mission/' + eventDetails.id;
					});
					document.getElementById('session_date_time').textContent = eventDetails.session_date + ' ' + eventDetails.session_time;
					document.getElementById('due_date_time').textContent = eventDetails.session_end_date + ' ' + eventDetails.session_end_time;
					var myModal = new bootstrap.Modal(document.getElementById('view-modal'), {});
					myModal.show();			
					
				},
				// Optional: Customize time slot settings
				slotDuration: '01:00:00', // 30-minute time slots
				slotLabelInterval: '01:00:00', // 30-minute intervals
				allDaySlot: false, // Disable all-day slot
				height: 'auto',
			});

			calendar.render();

		});
		jQuery(document).ready(function($){
			var editModal = new bootstrap.Modal(document.getElementById('edit-Profile'), {});
			$('.edit_profile_btn').click(function(){
				editModal.show();
			})
			$('.cancel_profile_btn').click(function(){
				$('#change_password_popup')[0].reset();
				editModal.hide();				
			})
		});
	</script>
