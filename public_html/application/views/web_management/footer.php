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
<script src="<?= base_url('assets/admin/js/hijri/jquery.calendars.islamic.min.js') ?>"></script>
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
</style>
  <style>span.aftertime { color: red; }</style>
<script>
$('#m_datatable').DataTable({
  "lengthChange": true,
  language: {
    paginate: {
      next: '<i class="fa fa-angle-right"></i>', // or '→'
      previous: '<i class="fa fa-angle-left"></i>', // or '←' 
      
    }
  }
}); 
</script>

</body>
</html>
