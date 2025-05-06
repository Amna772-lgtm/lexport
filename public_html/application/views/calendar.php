<?php $nvc = "white-nav sticky shrink modern hover4 radius-drop"; 
$pageTitle = $this->lang->line("Calendar");
include('header.php');
?>
 </section>
<?php
include('header_welcome.php');
?>
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
    .fc-event-time, .fc-event-title{
        color: #fff;
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
						</div>
					</div>
				</div>
			</div>

		</div>


	</div>

</div>

<script>
    var data = <?php echo json_encode( $data ); ?>;

    document.addEventListener('DOMContentLoaded', function () {
        const flatData = data ? Object.values(data).flatMap(inner => Object.values(inner)) : [];

        var calendarEl = document.getElementById('calendar');
        var calendar = new FullCalendar.Calendar(calendarEl, {
            initialView: 'timeGridWeek',
            headerToolbar: {
                left: 'prev,next today',
                center: 'title',
                right: 'timeGridDay,timeGridWeek,dayGridMonth'
            },
            views: {
                timeGridDay: { buttonText: 'Day' },
                timeGridWeek: { buttonText: 'Week' },
                dayGridMonth: { buttonText: 'Month' }
            },
            events: flatData.map(item => {
                const startDate = moment(`${item.session_date} ${item.session_time}`, "DD/MM/YYYY hh:mm a").toDate();
                const endDate = moment(`${item.session_date} ${item.session_end_time}`, "DD/MM/YYYY hh:mm a").toDate();

                return {
                    title: item.note,
                    start: startDate,
                    end: endDate,
                    extendedProps: { item }
                };
            }),
            slotDuration: '01:00:00',
            slotLabelInterval: '01:00:00',
            allDaySlot: false,
            height: 'auto',
        });

        calendar.render();
    });
</script>
