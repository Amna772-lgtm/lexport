<!-- Right Panel -->
<?php $login_time=$this->db->select('login_time')->where('id',$this->session->userdata('activity_id'))->get('activity')->row_array();
$time=explode(' ',$login_time['login_time']);
#
$DateTime = new DateTime();
$DateTime->modify('-10 hours');
$d =  $DateTime->format("H:i:s");
$now = date('H:i:s');
$date_a = new DateTime($time[1]);
$date_b = new DateTime($d);

$interval = date_diff($date_a,$date_b);

$explode=$interval->format('%h:%i:%s');
$last_time=explode(':',$explode);

?>
<!--******************************Note Dialog**************************-->
<?php
 date_default_timezone_set('Asia/Kolkata');
 $now=date('Y-m-d');
 $note=$this->db->select(['discription','date'])->where(['added_id'=>$this->session->userdata('admin_id'),'date'=>$now])->get('note')->result_array();
 ?>
 <?php if($note) { ?>
 <div id='note_dialog' style="display: none;" class="">
 <h5>Note Alret</h5>
 <table border=1 class="autonote">
  <tr>
    <th>No.</th>
    <th>discription</th>
    <th>date</th>
  </tr>
  <?php $count=0;foreach ($note as $note) { $count++; ?>
    <tr>
    <th><?= $count; ?></th>
    <th><?= $note['discription']; ?></th>
    <th><?= $note['date']; ?></th>
    </tr>
  <?php } ?>
 </table>
</div>
 <?php }?>
<!--******************************session_appoinment_dialog**************************-->
<?php

 $now=date('Y-m-d');
 $appoinment=$this->db->select(['id','client_file_number','session_number','session_date'])->where(['user_id'=>$this->session->userdata('admin_id'),'session_date'=>$now])->where('is_close',0)->where('is_dialog_close',0)->get('session_mission')->result_array();
 ?>
 <?php if($appoinment) { ?>
 <div id='session_appoinment_dialog' style="display: none;" class="">
 <h5>Session Appoinment Alret</h5>
 <table border=1 class="autonote">
  <tr>
    <th>ID#</th>
    <th>Client File Number</th>
    <th>Session No.</th>
    <th>Date</th>
  </tr>
  <?php $count=0;foreach ($appoinment as $appoinment) { $count++; ?>
    <tr>
    <th><?= $appoinment['id']; ?></th>
    <th><?= $appoinment['client_file_number']; ?></th>
    <th><?= $appoinment['session_number']; ?></th>
    <th><?= $appoinment['session_date']; ?></th>
    </tr>
  <?php } ?>
 </table>
</div>
 <?php }?>
<!--******************************visiting_appoinment_dialog**************************-->
<?php

 $now=date('Y-m-d');
 $visiting_appoinment=$this->db->select(['id','client_file_number','session_number','session_date'])->where(['user_id'=>$this->session->userdata('admin_id'),'session_date'=>$now])->where('is_close',0)->where('is_dialog_close',0)->get('visiting_mission')->result_array();
 ?>
 <?php if($visiting_appoinment) { ?>
 <div id='visiting_appoinment_dialog' style="display: none;" class="">
 <h5>Visiting Appoinment Alret</h5>
 <table border=1 class="autonote">
  <tr>
    <th>ID#</th>
    <th>Client File Number</th>
    <th>Session No.</th>
    <th>Visiting Date</th>
  </tr>
  <?php  foreach ($visiting_appoinment as $visiting_appoinment) { ?>
    <tr>
    <th><?= $visiting_appoinment['id']; ?></th>
    <th><?= $visiting_appoinment['client_file_number']; ?></th>
    <th><?= $visiting_appoinment['session_number']; ?></th>
    <th><?= $visiting_appoinment['session_date']; ?></th>
    </tr>
  <?php } ?>
 </table>
</div>
 <?php } ?>
<!--******************************writings_appoinment**************************-->
<?php

 $now=date('Y-m-d');
 $writings_appoinment=$this->db->select(['id','client_file_number','session_number','session_date'])->where(['user_id'=>$this->session->userdata('admin_id'),'session_date'=>$now])->where('is_close',0)->where('is_dialog_close',0)->get('writing_misssion')->result_array();
 ?>
 <?php if($writings_appoinment) { ?>
 <div id='writings_appoinment_dialog' style="display: none;" class="">
 <h5>Writings Appoinment Alret</h5>
 <table border=1 class="autonote">
  <tr>
    <th>ID#</th>
    <th>Client File Number</th>
    <th>Session No.</th>
    <th>Visiting Date</th>
  </tr>
  <?php  foreach ($writings_appoinment as $writings_appoinment) { ?>
    <tr>
    <th><?= $writings_appoinment['id']; ?></th>
    <th><?= $writings_appoinment['client_file_number']; ?></th>
    <th><?= $writings_appoinment['session_number']; ?></th>
    <th><?= $writings_appoinment['session_date']; ?></th>
    </tr>
  <?php } ?>
 </table>
</div>
 <?php } ?>
<!--******************************consultation_appoinment_dialog**************************-->
<?php

 $now=date('Y-m-d');
 $consultation_appoinment=$this->db->select(['id','client_file_number','session_number','session_date'])->where(['user_id'=>$this->session->userdata('admin_id'),'session_date'=>$now])->where('is_close',0)->where('is_dialog_close',0)->get('consultation_mission')->result_array();
 ?>
 <?php if($consultation_appoinment) { ?>
 <div id='consultation_appoinment_dialog' style="display: none;" class="">
 <h5>Consultation Appoinment Alret</h5>
 <table border=1 class="autonote">
  <tr>
    <th>ID#</th>
    <th>Client File No.</th>
    <th>Session No.</th>
    <th>Visiting Date</th>
  </tr>
  <?php  foreach ($consultation_appoinment as $consultation_appoinment) { ?>
    <tr>
    <th><?= $consultation_appoinment['id']; ?></th>
    <th><?= $consultation_appoinment['client_file_number']; ?></th>
    <th><?= $consultation_appoinment['session_number']; ?></th>
    <th><?= $consultation_appoinment['session_date']; ?></th>
    </tr>
  <?php } ?>
 </table>
</div>
 <?php } ?>
<!--******************************project**************************-->
<?php

 $now=date('Y-m-d');
 $project_dialog=$this->db->select(['id','project_name','client_name','starting_date'])->where(['user_id'=>$this->session->userdata('admin_id'),'starting_date'=>$now])->get('add_project')->result_array();
 ?>
 <?php if($project_dialog) { ?>
 <div id='project_dialog' style="display: none;" class="">
 <h5>Project Alret</h5>
 <table border=1 class="autonote">
  <tr>
    <th>ID#</th>
    <th>Client File Number</th>
    <th>Client Name</th>
    <th>Visiting Date</th>
  </tr>
  <?php  foreach ($project_dialog as $project_dialog) { ?>
    <tr>
    <th><?= $project_dialog['id']; ?></th>
    <th><?= $project_dialog['project_name']; ?></th>
    <th><?= $project_dialog['client_name']; ?></th>
    <th><?= $project_dialog['starting_date']; ?></th>
    </tr>
  <?php } ?>
 </table>
</div>
 <?php } ?>
<audio id="myAudio">
<source src="<?= base_url('assets/sound/alert.mp3'); ?>" type="audio/ogg">
</audio>
<script type="text/javascript">

<?php if(isset($datas[10][8]) && $datas[10][8] == 1){ if($project_dialog) { ?>
setInterval(function() {
    bootbox.dialog({
	message: $('#project_dialog').html(),
	closeButton: true,
	className: 	'notesdialogset'
});
var x = document.getElementById("myAudio"); 
x.play();
}, 260000);
<?php } } ?>
<?php if(isset($datas[5][8]) && $datas[5][8] == 1){ if($consultation_appoinment) { ?>
setInterval(function() {
    bootbox.dialog({
	message: $('#consultation_appoinment_dialog').html(),
	closeButton: true,
	className: 	'notesdialogset'
});
var x = document.getElementById("myAudio"); 
x.play();
}, 240000);
<?php } } ?>

<?php if(isset($datas[6][8]) && $datas[6][8] == 1){ if($visiting_appoinment) { ?>
setInterval(function() {
    bootbox.dialog({
	message: $('#visiting_appoinment_dialog').html(),
	closeButton: true,
	className: 	'notesdialogset'
});
var x = document.getElementById("myAudio"); 
x.play();
}, 220000);
<?php } } ?>

<?php if(isset($datas[4][8]) && $datas[4][8] == 1){ if($writings_appoinment) { ?>
setInterval(function() {
    bootbox.dialog({
	message: $('#writings_appoinment_dialog').html(),
	closeButton: true,
	className: 	'notesdialogset'
});
var x = document.getElementById("myAudio"); 
x.play();
}, 200000);
<?php } } ?>

<?php if(isset($datas[3][8]) && $datas[3][8] == 1){ if($appoinment) { ?>
setInterval(function() {
    bootbox.dialog({
	message: $('#session_appoinment_dialog').html(),
	closeButton: true,
	className: 	'notesdialogset'
});
var x = document.getElementById("myAudio"); 
x.play();
}, 190000);
<?php } } ?>

<?php if($note) { ?>
setInterval(function() {
    bootbox.dialog({
	message: $('#note_dialog').html(),
	closeButton: true,
	className: 	'notesdialogset'
});
var x = document.getElementById("myAudio"); 
x.play();
}, 180000);
<?php } ?>
      
</script>
   </div>

<!-- end:: Body -->
</div>

<!-- end:: Page -->

<!-- end::Quick Sidebar -->

<!-- begin::Scroll Top -->
<div id="m_scroll_top" class="m-scroll-top">
    <i class="fa fa-arrow-up"></i>
</div>

<!-- jQuery -->
<script type="text/javascript" src="<?php echo base_url('assets/');?>js/jquery.min.js?v=2.4"></script>

<!--begin:: Global Mandator vendors -->
<script src="<?php echo base_url('assets/');?>vendors/popper.js/dist/umd/popper.js" type="text/javascript"></script>
<script src="<?php echo base_url('assets/');?>vendors/bootstrap/dist/js/bootstrap.min.js" type="text/javascript"></script>
<script src="<?php echo base_url('assets/');?>vendors/js-cookie/src/js.cookie.js" type="text/javascript"></script>
<script src="<?php echo base_url('assets/');?>vendors/moment/min/moment.min.js" type="text/javascript"></script>
<script src="<?php echo base_url('assets/');?>vendors/tooltip.js/dist/umd/tooltip.min.js" type="text/javascript"></script>
<script src="<?php echo base_url('assets/');?>vendors/perfect-scrollbar/dist/perfect-scrollbar.js" type="text/javascript"></script>
<script src="<?php echo base_url('assets/');?>vendors/wnumb/wNumb.js" type="text/javascript"></script>
<script src="<?php echo base_url('assets/');?>vendors/chartist/dist/chartist.js" type="text/javascript"></script>
<script src="<?php echo base_url('assets/');?>vendors/chart.js/dist/Chart.bundle.js" type="text/javascript"></script>
<script src="<?php echo base_url('assets/');?>vendors/js/framework/components/plugins/charts/chart.init.js" type="text/javascript"></script>
<script src="<?php echo base_url('assets/');?>vendors/dropzone/dist/dropzone.js" type="text/javascript"></script>
<script src="<?php echo base_url('assets/');?>vendors/vendors/bootstrap-multiselectsplitter/bootstrap-multiselectsplitter.min.js" type="text/javascript"></script>
<script src="<?php echo base_url('assets/');?>vendors/bootstrap-select/dist/js/bootstrap-select.js" type="text/javascript"></script>
<script src="<?php echo base_url('assets/');?>vendors/select2/dist/js/select2.full.js" type="text/javascript"></script>

<script src="<?php echo base_url('assets/');?>vendors/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js" type="text/javascript"></script>
<script src="<?php echo base_url('assets/');?>vendors/js/framework/components/plugins/forms/bootstrap-datepicker.init.js" type="text/javascript"></script>
<script src="<?php echo base_url('assets/');?>vendors/bootstrap-datetime-picker/js/bootstrap-datetimepicker.min.js" type="text/javascript"></script>
<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.37/js/bootstrap-datetimepicker.min.js"></script> -->
<script src="<?= base_url('assets/bootbox.min.js') ?>"></script>

<!--begin::Global Theme Bundle -->
<script src="<?php echo base_url('assets/');?>/demo/base/scripts.bundle.js" type="text/javascript"></script>

<!--end::Global Theme Bundle -->

<!--begin::Page <?php echo base_url('assets/');?>vendors -->
<script src="<?php echo base_url('assets/');?>vendors/custom/fullcalendar/fullcalendar.bundle.js" type="text/javascript"></script>

<script src="<?php echo base_url('assets/js/');?>bootstrap-select.js" type="text/javascript"></script>

<!--begin::Page Scripts -->
<script src="<?php echo base_url('assets/js/');?>bootstrap-datepicker.js" type="text/javascript"></script>
<script src="<?php echo base_url('assets/js/');?>bootstrap-datetimepicker2.js" type="text/javascript"></script>
<!--end::Page Scripts -->


<script src="<?= base_url('assets/admin/js/jquery.countdown.min.js'); ?>"></script>
<!--end::Page <?php echo base_url('assets/');?>vendors -->

<!--begin::Page Scripts -->
<script src="<?php echo base_url('assets/');?>/app/js/dashboard.js" type="text/javascript"></script>
    <link rel="stylesheet" href="<?php echo base_url('assets/');?>vendors/custom/datatables/datatables.bundle.css" />
<script src="<?php echo base_url('assets/');?>vendors/custom/datatables/datatables.bundle.js" type="text/javascript"></script>

<script src="<?= base_url('assets/admin/js/hijri/jquery.calendars.js') ?>"></script>
<script src="<?= base_url('assets/admin/js/hijri/jquery.calendars.plus.min.js') ?>"></script>
<script src="<?= base_url('assets/admin/js/hijri/jquery.plugin.min.js') ?>"></script>
<script src="<?= base_url('assets/admin/js/hijri/jquery.calendars.picker.js') ?>"></script>
<script src="<?= base_url('assets/js/hijri/jquery.calendars.ummalqura.min.js') ?>"></script>
<link href="<?= base_url('assets/admin/js/hijri/jquery.calendars.picker.css') ?>" rel="stylesheet"/>


</body>
<!-- Body End -->
</html>

<script type="text/javascript">
    $(window).on('load',function(){
        $('#myModalAlert').modal('show');
    });
</script>

<style>
 
    .alertM .modal-dialog {
        position: fixed;
        bottom: 30px;
        right: 30px;
        margin: 0px;
        width: 300px !important;
        background: #ffffff;
        border: 1px solid #ccc;
        border-radius: 10px;
        box-shadow: 0 0 10px #ccc;
    }
    /*@media (min-width: 768px){*/
        /*.alertM .modal-dialog {*/
            /*width: 600px;*/
            /*margin: 30px auto;*/
        /*}*/
    /*}*/

    .alertM .modal-content .modal-header .close:before {
        content: "\f00d";
        font: normal normal normal 14px/1 FontAwesome;
    }

    .modal-backdrop.show {
        opacity: 0.2;
    }

    .alertM .modal-content .modal-header .modal-title {
        color: #3f4047;
        font-family: sans-serif;
        font-weight: bold;
    }
    .alertM .modal-content .modal-header {
        padding: 15px;
    }
 table.dataTable thead .sorting:before, table.dataTable thead .sorting_asc:before, table.dataTable thead .sorting_desc:before, table.dataTable thead .sorting_asc_disabled:before, table.dataTable thead .sorting_desc_disabled:before {
    right: 6px !important;  display:none;
 }
 table.dataTable thead .sorting:after, table.dataTable thead .sorting_asc:after, table.dataTable thead .sorting_desc:after, table.dataTable thead .sorting_asc_disabled:after, table.dataTable thead .sorting_desc_disabled:after {
    right: 0 !important; display:none;
 }
 table.dataTable thead > tr > th.sorting_asc, table.dataTable thead > tr > th.sorting_desc, table.dataTable thead > tr > th.sorting, table.dataTable thead > tr > td.sorting_asc, table.dataTable thead > tr > td.sorting_desc, table.dataTable thead > tr > td.sorting {
    padding-right: 0px !important;
 }
 .dataTables_wrapper .pagination .page-item.active > .page-link {
    background: #1f3958;
    color: #ffffff;
}
button.bootbox-close-button.close {
    font-size: 50px;
}
.bootbox-body {
    margin-top: 25px;
}
<?php if($this->session->userdata('admin_site_lang')=="arabic") {?>
 

.calendars-month td .calendars-selected {
    background-color: #f0c0c0;
}<?php } ?>
</style>
  <style>span.aftertime { color: red; }</style>
<script>
$('#m_datatable').DataTable({
  "lengthChange": true,
  language: {
    paginate: {
      next: '<i class="fa fa-angle-right"></i>', // or '→'
      previous: '<i class="fa fa-angle-left"></i>', // or '←' 
    },
    <?php if($this->session->userdata('admin_site_lang')=="arabic" OR $this->session->userdata('admin_site_lang')=="") {  ?>
    "sProcessing":   "جارٍ التحميل...",
    "sLengthMenu":   "أظهر _MENU_ مدخلات",
    "sZeroRecords":  "لم يعثر على أية سجلات",
    "sInfo":         "إظهار _START_ إلى _END_ من أصل _TOTAL_ مدخل",
    "sInfoEmpty":    "يعرض 0 إلى 0 من أصل 0 سجل",
    "sInfoFiltered": "(منتقاة من مجموع _MAX_ مُدخل)",
    "sInfoPostFix":  "",
    "sSearch":       "ابحث:",
    "sUrl":          "",
    <?php } ?> 
    
  },
	rowCallback: function(nRow) {
    $(nRow).find('[data-countdown]').each(function() {
      $(this).countdown($(this).attr('value'), {elapse: true})
    .on('update.countdown', function(event) {
        var $this = $(this);
      if (event.elapsed) {
            $this.html(event.strftime('<span class="aftertime">-%D <?php echo $this->lang->line('days');?> %H:%M:%S</span>'));
      } else {
            $this.html(event.strftime('%D <?php echo $this->lang->line('days');?> %H:%M:%S'));
      }
      });
    }); 
      }
});

 (function ($) {
	'use strict';
	$.calendars.calendars.ummalqura.prototype.regionalOptions.ar = {
		name: 'UmmAlQura', // The calendar name
		epochs: ['BAM', 'AM'],
		monthNames: 'محرم_صفر_ربيع الأول_ربيع الثاني_جمادى الأول_جمادى الآخر_رجب_شعبان_رمضان_شوال_ذو القعدة_ذو الحجة'.split('_'),
		monthNamesShort: 'محرم_صفر_ربيع1_ربيع2_جمادى1_جمادى2_رجب_شعبان_رمضان_شوال_القعدة_الحجة'.split('_'),
		dayNames: ['الأحد', 'الإثنين', 'الثلاثاء', 'الأربعاء', 'الخميس', 'الجمعة', 'السبت'],
		dayNamesShort: 'أحد_إثنين_ثلاثاء_أربعاء_خميس_جمعة_سبت'.split('_'),
		dayNamesMin: 'ح_ن_ث_ر_خ_ج_س'.split('_'),
		digits: $.calendars.substituteDigits(['٠', '١', '٢', '٣', '٤', '٥', '٦', '٧', '٨', '٩']),
		dateFormat: 'dd/mm/yyyy',
		firstDay: 1,
		isRTL: true
	};
})(jQuery);

$('.appdate').calendarsPicker({
  calendar: $.calendars.instance('<?php if($this->session->userdata('admin_site_lang')=="arabic" or $this->session->userdata('admin_site_lang')=="") echo "ummalqura"; else echo ""; ?>','<?php if($this->session->userdata('admin_site_lang')=="arabic") echo "ar"; else echo "en"; ?>'),
  showOtherMonths: true,dateFormat: 'dd/mm/yyyy',
  minDate:0, 
  selectDefaultDate:true,
  onSelect: function (date) {
 
  }
});
 
//$('#m_datatable .countdown').each(function(){
 $(nRow).find(' data-countdown]').each(function() {
	$(this).countdown($(this).attr('value'), {elapse: true})
.on('update.countdown', function(event) {
	  var $this = $(this);
  if (event.elapsed) {
        $this.html(event.strftime('<span class="aftertime">-%D days %H:%M:%S</span>'));
  } else {
        $this.html(event.strftime('%D days %H:%M:%S'));
  }
	});
}); 
 
/*
var fiveSeconds = $('.countdown').attr('value'); 
$('.countdown').countdown(fiveSeconds, {elapse: true})
.on('update.countdown', function(event) {
  var $this = $(this);
  if (event.elapsed) {
    $this.html(event.strftime('After end: <span>%H:%M:%S</span>'));
  } else {
    $this.html(event.strftime('To end: <span>%H:%M:%S</span>'));
  }
});*/
</script>
    <script type="text/javascript">
    var h1 = document.getElementsByTagName('h1')[0],
    start = document.getElementById('start'),
    seconds = <?php echo $last_time['2']; ?>, minutes = <?php echo $last_time['1']; ?>, hours = <?php echo $last_time['0']; ?>,t;

function add() {
    seconds++;
    if (seconds >= 60) {
        seconds = 0;
        minutes++;
        if (minutes >= 60) {
            minutes = 0;
            hours++;
        }
    }
    
textContent = (hours ? (hours > 9 ? hours : "0" + hours) : "00") + ":" + (minutes ? (minutes > 9 ? minutes : "0" + minutes) : "00") + ":" + (seconds > 9 ? seconds : "0" + seconds);

$('#clock').html(textContent);
    timer();
}
function timer() {
    t = setTimeout(add, 1000);
}
timer();
/* Start button */
//start.onclick = timer;
</script>
<script type="text/javascript">
$('#user_id').on('input', function() {
	var id=$(this).val();
	$.ajax({
		 type: 'POST',
		url: "<?php echo base_url('admin/admin/find_note_user'); ?>", // <-- properly quote this line
		cache: false,
		data: {id: id}, // <-- provide the branch_id so it will be used as $_POST['branch_id']
		dataType: 'JSON', // <-- add json datatype
		success: function(data) {
				$("#name").val(data['name']);
			$("#id_numbers").val(data['id_numbers']);
				$('#identification_types option[value="'+data['id_type']+'"]').attr('selected','selected');
if(data['name']) { $('#name').attr('readonly', true); }
if(data['id_numbers']) { $('#id_numbers').attr('readonly', true); }
if(data['id_type']) { $('#identification_types ').attr('disabled', true); }
		},
		error:function(){

$('#name').attr('readonly', false);
$('#id_type').attr('readonly', false);
$('#id_numbers').attr('readonly', false);
$('#identification_types ').attr('disabled', false);
			$("#name").val("");
			$("#id_type").val("");
			$("#id_numbers").val("");
			$('#identification_types option[value="0"]').attr('selected','selected');

		},
});
});
</script>

<script type="module" src="<?= base_url('assets/admin/js/audio/audio-player.js') ?>"></script>
</body>
</html>
