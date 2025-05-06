<?php $nvc = "white-nav sticky shrink modern hover4 radius-drop"; 
$pageTitle = $this->lang->line('e-services');
include('header.php');
?>
 </section>
<?php
include('header_welcome.php');
?>
<!-- END: Left Aside -->
<style>    
    .modal .modal-content .modal-header .close:before {
        content: "X";
        font-family: arial;
    }
    .modal .modal-content {
        background: #ffffff;
    }
    .ar_body  .fa{
    left:-7px !important;
    }
    .servive-v2 .services-wrapper {
    min-height: 522px;
    border-radius: 20px;
    background-color: #ffffff5e;
    box-shadow: 0px 10px 15px 0px #0C66E40D;

}

.servive-v2 .services-inner-section.row {
    padding: 10px 4px;
    margin-left: 0;
    margin-right: 0;
}

.servive-v2 .services-inner-section.row .column {
    padding: 20px;
}

.servive-v2 .service-detail-section {
    height: 100%;
    border-radius: 15px;
    border-width: 1px;
    background-color: #ffffff;
    border: 1px solid #FFFFFF;
    box-shadow: 0px 7px 14px 1px #3962FF0F;
    padding: 16px 13px 13px 13px;
}

.servive-v2 .service-info {
    border-inline-start: 3px solid #1866A9;
    padding-inline-start: 6px;
    margin-bottom: 12px;
}

.servive-v2  .service-detail.row {
    margin-inline: 0;
}

.servive-v2 .service-detail.row .col-4 {
    padding: 0;
    padding-inline-end: 5px;
}

.servive-v2 .service-detail-settings {
    width: 13px;
    height: 3px;
    /* top: 24px; */
    right: 25px;
    cursor: pointer;
}

.servive-v2 .body_rtl .service-detail-settings {
    right: unset;
    left: 25px;
}

.servive-v2 .service-detail-settings svg {
    fill: #333333;
}

.servive-v2 .service-tag {
    font-weight: 500;
    font-size: 9px;
    line-height: 18.5px;
    letter-spacing: 0px;
    vertical-align: middle;
    background-color: #3333331A;
    padding: 3px 4px;
    color: #333;
    border-radius: 4px;
}

.servive-v2 .service-info-title {
    vertical-align: middle;
    color: #333333;
}

.servive-v2 span.label-title {
    font-size: 8px;
    line-height: 18.5px;
    letter-spacing: 0px;
    vertical-align: middle;

}

.servive-v2 span.detail-data {
    font-weight: 500;
    font-size: 10px;
    line-height: 18.5px;
    letter-spacing: 0px;
    vertical-align: middle;

}
#add-service-modal .modal-dialog.add-service-modal{
            max-width: 1000px;
        }


.servive-v2 .paginate_button.page-item a:hover {
  color: #ffffff !important;
}

</style>


<div class="m-grid__item m-grid__item--fluid m-wrapper">
    <!-- END: Subheader -->
    <div class="m-content servive-v2">
            <div class="m-portlet lp-theme-card bg-transparent">
                <div class="m-portlet__head">
                    <div class="theme-new-nav-menu">
                        
                        <ul>
                            <li class="c_nav active" id="all_service"> <a href="javascript:;"><?php echo $this->lang->line('All')?></a> </li>
                            <li class="c_nav" id="pend_services"> <a href="javascript:void(0);"><?php echo $this->lang->line('Pending')?></a> </li>
                            <li class="c_nav" id="rej_services"> <a href="javascript:void(0);"><?php echo $this->lang->line('Reject')?></a> </li>
                            <li class="c_nav" id="app_services"> <a href="javascript:void(0);"><?php echo $this->lang->line('Approved')?></a> </li>
                            
                        </ul>
                    
                            <a class="btn btn-primary create-buttons" href="<?=base_url('add_case');?>" >
                                <?= $this->lang->line('Request_New_E_Service') ?>
                            </a>
                    
                    </div>
                </div>


                <div class="m-portlet__body">
                    <div class="services-wrapper">
                        <div class="services-inner-section row align-items-stretch">
                            <?php foreach ($data as $case) { ?>
                                <?php
                                // Determine status & border color
                                if ($case['is_reject'] == 1) {
                                    $status = $this->lang->line('Reject');
                                    $borderColor = '#ff6767';
                                    $statusKey = 'reject';
                                } elseif (isset($case['case_id'])) {
                                    $status = $this->lang->line('Pending');
                                    $borderColor = '#1866A9';
                                    $statusKey = 'pending';
                                } else {
                                    $status = $this->lang->line('Approve');
                                    $borderColor = '#1faa5e';
                                    $statusKey = 'approved';
                                }
                                ?>
                                <div class="column col-12 col-sm-6 col-xl-4 service-card"
                                    data-type="<?= getServiceType($case['service_types']); ?>"
                                    data-client="<?= getEmployeeName($case['customers_id']); ?>"
                                    data-status="<?= $statusKey ?>">

                                    <div class="service-detail-section position-relative">
                                        <div class="service-detail-settings position-absolute">
                                        <a href=<?= base_url("front/view_case/{$case['id']}") ?>>
                                            <img class="dot-icon" src="../../../assets/images/img/dot.svg" alt="dots">
                                        </a>
                                        </div>
                                        
                                        <div class="service-info" style="border-color: <?= $borderColor ?>;">
                                            <div class="service-info-title">
                                                <span><?= getEmployeeName($case['customers_id']); ?></span>
                                            </div>
                                            <div class="service-info-tages">
                                                <span class="service-tag"><?= $status; ?></span>
                                                <span class="service-tag" style="margin-right:5px;"><?= getCaseType($case['case_type']); ?></span>
                                                <span class="service-tag"><?= $case['client_file_number']; ?></span>
                                            </div>
                                        </div>
                                        <div class="service-detail row">
                                            <div class="col-4 d-flex flex-column">
                                                <span class="label-title"><?php echo $this->lang->line('E_Service_Name');?></span>
                                                <span class="detail-data"><?= getServiceType($case['service_types']); ?></span>
                                            </div>
                                            <div class="col-4 d-flex flex-column">
                                                <span class="label-title"><?php echo $this->lang->line('Responsible_Employee');?></span>
                                                <span class="detail-data"><?= getEmployeeName($case['responsible_employee']); ?></span>
                                            </div>
                                            <div class="col-4 d-flex flex-column">
                                                <span class="label-title"><?php echo $this->lang->line('Due_Date');?></span>
                                                <span class="detail-data"><?= $case['case_date']; ?></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>
                            
                        </div> 
                        <!-- End of .services-inner-section -->
                        <div>
                            <p id="no-data-msg" class="text-center" style="display:none; font-weight: bold;">
                                <?= $this->lang->line('No_data_available') ?: 'No data available'; ?>
                            </p>

                        </div>
                    </div>
                </div>
                <div id="pagination" class="pagination-wrapper text-center mt-3"></div>
        <!--End::Section-->
    </div>
</div>
</div>

</div>

<?php

include('footer.php');

?>
<script type="text/javascript">
 
  $(document).ready( function() {
    $('#m_table_11').dataTable({ 
        "lengthChange": true,
        "aaSorting": [],
          language: {
    paginate: {
            <?php if($this->session->userdata('site_lang')=="arabic" ) {  ?>
      next: '<i class="fa fa-angle-left"></i>', // or '→'
      previous: '<i class="fa fa-angle-right"></i>', // or '←' 
       <?php } else { ?>
        next: '<i class="fa fa-angle-right"></i>', // or '→'
      previous: '<i class="fa fa-angle-left"></i>', // or '←' 
        <?php } ?>
    },
    <?php if($this->session->userdata('site_lang')=="arabic" ) {  ?>
    "sProcessing":   "جارٍ التحميل...",
    "sLengthMenu":   "أظهر _MENU_ ",
    "sZeroRecords":  "لم يعثر على أية سجلات",
    "sInfo":         "إظهار _START_ إلى _END_ من أصل _TOTAL_ مدخل",
    "sInfoEmpty":    "يعرض 0 إلى 0 من أصل 0 سجل",
    "sInfoFiltered": "(منتقاة من مجموع _MAX_ مُدخل)",
    "sInfoPostFix":  "",
    "sSearch":       "ابحث:",
    "sUrl":          "",
    <?php } else { ?>
        "sLengthMenu":   "Show  _MENU_ ",
    <?php  } ?>
  }
    });
})

$(document).ready(function() {
    $('.c_nav a').click(function(e) {
        e.preventDefault();

        $('.c_nav').removeClass('active');
        $(this).parent().addClass('active');

        var tabId = $(this).parent().attr('id');
        var $cards = $('.service-card');

        if (tabId === 'all_service') {
            $cards.show();
        } else {
            $cards.hide();
            var selector = '';
            if (tabId === 'pend_services') selector = '[data-status="pending"]';
            else if (tabId === 'rej_services') selector = '[data-status="reject"]';
            else if (tabId === 'app_services') selector = '[data-status="approved"]';

            $cards.filter(selector).show();
        }

        // Show/hide "No data available" message
        if ($('.service-card:visible').length === 0) {
            $('#no-data-msg').show();
        } else {
            $('#no-data-msg').hide();
        }
    });
});



    $(document).ready(function() {
        $('#msg').hide();
    });

    $('.rejectr').click(function(){
        var id=$(this).attr("id");
        var url="<?= base_url('front/get_reject_case_reason'); ?>"; 
		     $.ajax({
                    type:'ajax',
                    method:'post',
                    url:url,
                    data:{"id" : id},
                    success:function(data){
                     //  bootbox.alert(data);
                        bootbox.alert({
                        message:data, 
                        buttons: {
                          ok: {
                            label: '<?php echo $this->lang->line('OK');?>'
                          }
                        }
                        })
                    },
                });
        });

</script>     <script src="<?=base_url('assets/bootbox.min.js')?>"></script>