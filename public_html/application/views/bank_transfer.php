<?php $nvc = "white-nav sticky shrink modern hover4 radius-drop"; 
$pageTitle = $this->lang->line("Wallet");
include('header.php');
?>
 </section>
<?php
include('header_welcome.php');
function invoices_due_time($date, $time)
{
    $date = explode('/', $date);
    $date = $date[2] . '/' . $date[1] . '/' . $date[0];
    $datetime = $date . " " . str_replace(array(' am', ' pm'), array('', ''), $time) . ":" . rand(0, 59) . substr($time, -3);
    return $datetime;
}
?>
<style>
    .c_tabs {
        display: none;
    }

    .tab_active {
        display: block;
    }
    .bank_section {
        font-family: 'Roboto';
    }
    .bank_section .m-portlet {
        min-height: 240px;
    }
    .bank_cards .m-portlet .m-portlet__head,
    .bank_section .m-portlet .m-portlet__head {
        background: #1594d3;
        border-bottom-right-radius: 30px
    }
    .bank_cards .m-portlet .m-portlet__head .m-portlet__head-caption .m-portlet__head-title,
    .bank_section .m-portlet .m-portlet__head .m-portlet__head-caption .m-portlet__head-title {
        padding: 20px 40px;
    }
    .bank_cards .m-portlet .m-portlet__head .m-portlet__head-caption .m-portlet__head-title .m-portlet__head-text,
    .bank_section .m-portlet .m-portlet__head .m-portlet__head-caption .m-portlet__head-title .m-portlet__head-text {
        color: #fff;
    }
    .bank_cards .m-portlet .m-portlet__body,
    .bank_section .m-portlet .m-portlet__body {
        padding: 20px 40px;
    }
    .bank_cards .m-portlet .m-portlet__body > div,
    .bank_section .m-portlet .m-portlet__body > div {
        padding: 10px 0;
    }
    .bank_cards .m-portlet .m-portlet__body > div:first-child,
    .bank_section .m-portlet .m-portlet__body > div:first-child {
        border-bottom: 1px solid #bdc3d4;
    }
    .bank_cards .m-portlet .m-portlet__body h4,
    .bank_section .m-portlet .m-portlet__body h4 {
        padding: 0 0 7px;
    }
    .m-content ul.nav-pills.nav-fill li.nav-item .nav-link:not(.active){
        color: #172b4c !important;
    } 
    .m-content ul.nav-pills.nav-fill li.nav-item .nav-link.active:hover{
        color: #fff !important;
    } 
</style>
<!-- END: Left Aside -->
<div class="m-grid__item m-grid__item--fluid m-wrapper">

	<?php echo $this->session->flashdata('payment_msg'); ?>
    <!-- END: Subheader -->
    <div class="m-content wallet">
  <!--begin::Portlet-->
            <div class="m-portlet lp-theme-card bg-transparent">
                <div class="m-portlet__head">
                    <div class="m-portlet__head-caption">
                        <div class="theme-new-nav-menu">
                            <ul>
                                <li> <h3 ><?php echo $this->lang->line('Invoice')?></h3> </li>
                                <li class="c_nav active" id="wallet"> <a href="#"><?php echo $this->lang->line('Wallet')?></a> </li>
                                <li class="c_nav" id="bank"> <a href="#" ><?php echo $this->lang->line('Bank_Transfer')?></a> </li>
                            </ul>
                        </div>
                    </div>
                </div>


    	        <div class="m-form m-form--fit m-form--label-align-right m-form--group-seperator-dashed" >
                    <div class="m-portlet__body">
                        <div class="c_tabs wallet tab_active form-group m-form__group row">
                            <div class="m_datatable m-datatable m-datatable--default m-datatable--loaded">
                                <div class="table-responsive">
                                    <table class="lp-theme-table lp-large-theme m_datatable" id="m_table_1">
                                        <thead>
                                        <tr class="netTr">

                                            <th class="sortable"><?php echo $this->lang->line('Invoice_No');?></th>
                                            <th><?php echo $this->lang->line('Created_By');?></th>
                                        
                                            <th class="sortable"><?php echo $this->lang->line('Invoice_Title');?></th>
                                            <th class="sortable"><?php echo $this->lang->line('Due_Date');?></th>
                                            <th class="sortable"><?php echo $this->lang->line('Total_Cost');?></th>
                                            <th class="sortable"><?php echo $this->lang->line('VAT_0_5');?></th>
                                            <th class="sortable"><?php echo $this->lang->line('Total_Amount');?></th>
                                            <th class="sortable"><?php echo $this->lang->line('Status');?></th>
                                            <th class="sortable"><?php echo $this->lang->line('ACTION');?></th>

                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php $i=0; foreach ($data as $invoice){ $i++; ?>
                                        <tr style="text-align: center;">
                                        <td><?= $invoice['invoice_no'] ?></td>
                                        <td><?php echo getEmployeeName($invoice['created_by']); ?></td>
                                        <td><?= $invoice['invoice_title'] ?></td>
                                        <td><span class='date_time'> <?= $invoice['due_date'] . ' - ' . $invoice['due_time']; ?></span></td>
                                        <!-- <td>
                                            <span class='countdown' style=" color: #0E8A00; font-weight: bold; display: inline-block; min-width: 200px;" value="<?php echo ($invoice['due_date'].'-'.$invoice['due_time']);?>" data-countdown="<?php echo ($invoice['due_date'].'-'.$invoice['due_time']);?>">
                                            -- days --:--:--
                                            </span></td> -->
                                        <td><?php echo $vat = $invoice['main_total']/$invoice['financial_payments']; ?></td>
                                        <td><?php echo ($vat * 5) / 100;  ?></td>
                                        <td><?= $invoice['total'] ?></td>
                                        <th><?php if($invoice['payment_status'] == 'paid'){ $dd = "success"; } else if($invoice['payment_status'] == 'process') { $dd="warning"; } else { 	$dd="danger"; } ?><span class="m-badge  m-badge--<?php echo $dd; ?> m-badge--wide"><?php if($invoice['payment_status'] == 'paid'){ echo $this->lang->line("Paid"); }else if($invoice['payment_status'] == 'process'){ echo $this->lang->line("In_Process");}else{ echo $this->lang->line("Unpaid");} ?></span></th>
                                        <th class="action">	
                                        <span style="overflow: visible; position: relative;">
                                            <?php if($invoice['payment_status'] == 'unpaid'){ ?>
                                            <!-- <a  href='<?= base_url("front/payment/{$invoice['id']}"); ?>'class="" title="<?php echo $this->lang->line('Pay_Invoice');?>"><img style="width:22px;" src="<?php echo base_url('assets/images/img/pay.svg') ?>" /></a> -->
                                            <a  data-target="#pay_now" class="view_pay_now" data-id="<?php echo $invoice['id']; ?>" data-toggle="modal" title="<?php echo $this->lang->line('Pay_Invoice');?>"><img style="width:22px;" src="<?php echo base_url('assets/images/img/pay.svg') ?>" /></a>
                                            <?php } ?>
                                            <a href="<?= base_url("front/generate_invoice/{$invoice['id']}"); ?>" title="<?php echo $this->lang->line('Download_Invoice');?>">
                                            <img style="width:22px;" src="<?php echo base_url('assets/images/img/downloads.svg'); ?>" />
                                            </a>
                                        </span>
                                        </th>
                                        </tr>
                                        <?php } ?>

                                        </tbody>
                                    </table>
                                    <!-- <div id="pagination" class="pagination-wrapper text-center mt-3"></div> -->
                                </div>
                            </div>
    
                        </div>

                        <!-- Bank Section -->
                        <div class="c_tabs bank row m-content bank_section">

                            <div class="col-md-6">

                                <div class="m-portlet">
                                    <div class="m-portlet__head">
                                        <div class="m-portlet__head-caption">
                                            <div class="m-portlet__head-title">
                                                <h3 class="m-portlet__head-text">
                                                    <?php echo $this->lang->line('Alinma_Bank');?>
                                                </h3>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="m-portlet__body">
                                        <div><h4><?php echo $this->lang->line('Account_Numbers');?></h4><p class="account_number"> 68201635555004</p></div>
                                        <div>
                                            <h4><?php echo $this->lang->line('IBAN_Numbers');?></h4><p class="account_number">SA6105000068201635555004</p>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div class="col-md-6">

                                <div class="m-portlet">
                                    <div class="m-portlet__head">
                                        <div class="m-portlet__head-caption">
                                            <div class="m-portlet__head-title">
                                                <h3 class="m-portlet__head-text">
                                                    <?php echo $this->lang->line('NCB_bank');?>
                                                </h3>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="m-portlet__body">
                                        <div><h4><?php echo $this->lang->line('Account_Numbers');?></h4><p class="account_number"> 00800000011105</p></div>
                                        <div>
                                            <h4><?php echo $this->lang->line('IBAN_Numbers');?></h4><p class="account_number">SA1510000000800000011105</p>
                                        </div>
                                        
                                    </div>
                                </div>

                            </div>

                            </div>
                        <!-- End Bank Section -->


                    </div>
                    
                </div>

            </div> <!-- lp-theme-card -->


        </div>



        
        </div>
        <!--End::Section-->
    </div>
</div>
</div>

<!-- Modals for Payment -->

<!--Start Add Writing  Modal -->
<div class="modal fade lp-theme-modal" id="pay_now" tabindex="-1" role="dialog" aria-labelledby="modalTitle" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content" style="background: #fff;">
            <div class="modal-header">
                <h5 class="modal-title" id="modalTitle"> <?php echo $this->lang->line( 'Pay' ); ?></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    
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
                                <div class="m-portlet__head-caption">
                                    
                                </div>
                            </div>
                            <div class="m-portlet__body" >
                                <div class="m-widget28">
                                    <div class="m-widget28__pic"></div>
                                        <div class="m-widget28__container">
                                            <!-- begin::Nav pills -->
                                            <ul class="m-widget28__nav-items nav nav-pills nav-fill" role="tablist">
                                            
                                                <li class="m-widget28__nav-item nav-item">
                                                    <a class="nav-link active show" data-toggle="pill" href="#menu31"><span><i class="fa fa-credit-card"></i></span><span><?php echo $this->lang->line("Credit_Card");?></span></a>
                                                </li>
                                                <li class="m-widget28__nav-item nav-item">
                                                    <a class="nav-link" data-toggle="pill" href="#menu41"><span><i class="fa fa-university"></i></span><span><?php echo $this->lang->line("Bank_Transfer");?></span></a>
                                                </li>
                                            </ul>
                                            <!-- end::Nav pills -->

                                            <!-- begin::Tab Content -->
                                            <div class="m-widget28__tab tab-content">

                                                <div id="menu11" class="m-widget28__tab-container tab-pane fade">
                                                    <div class="m-widget28__tab-items">

                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <form>
                                                                    <div class="form-group">
                                                                        <label for="username"><?php echo $this->lang->line("on_the_card");?> </label>
                                                                        <input type="text" class="form-control" name="username" placeholder="" required="">
                                                                    </div> <!-- form-group.// -->

                                                                    <div class="form-group">
                                                                        <label for="cardNumber"><?php echo $this->lang->line("Card_number");?></label>
                                                                        <input type="text" class="form-control" name="cardNumber" placeholder="">
                                                                        </span>
                                                                    </div> <!-- form-group.// -->
                                                                    <div class="row">
                                                                        <div class="col-sm-6">
                                                                            <div class="form-group">
                                                                                <label><span class="hidden-xs"><?php echo $this->lang->line("Expiration");?></span> </label>
                                                                                <div class="input-group">
                                                                                    <div class="row">
                                                                                        <div class="col-sm-6">
                                                                                            <input type="number" class="form-control" placeholder="MM" name="">
                                                                                        </div>
                                                                                        <div class="col-sm-6">
                                                                                            <input type="number" class="form-control" placeholder="YY" name="">
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-6">
                                                                            <label><span class="hidden-xs">CCV</span> </label>
                                                                            <input type="number" class="form-control" placeholder="CCV" name="">
                                                                        </div>
                                                                    </div> <!-- row.// -->
                                                                    <div class="row">
                                                                        <div class="col-md-12">
                                                                            <button class="btn btn-primary btn-block btn-lg" type="button"><?php echo $this->lang->line("PAY_NOW");?></button>
                                                                        </div>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>

                                                <div id="menu21" class="m-widget28__tab-container tab-pane fade">

                                                    <div class="m-widget28__tab-items">

                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <form role="form" method="post" enctype="multipart/form-data">
                                                                        <input type="hidden" name="via" value="cheque">
                                                                        <div class="form-group">
                                                                        <label for="username"><?php echo $this->lang->line("Cheque_Name");?></label>
                                                                        <input type="text" class="form-control" name="name" placeholder="" required="">
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="username"><?php echo $this->lang->line("Cheque_Number");?></label>
                                                                        <input type="text" class="form-control" name="number" placeholder="" required="">
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="username"><?php echo $this->lang->line("Note");?></label>
                                                                        <textarea type="text" class="form-control" name="note"></textarea>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="username"><?php echo $this->lang->line("Upload_chquue_receipt");?></label>
                                                                        <div class="custom-file">
                                                                            <input type="file" name="image" class="custom-file-input" id="customFile" required>
                                                                            <label class="custom-file-label" for="customFile"><?php echo $this->lang->line("Choose_file");?></label>
                                                                        </div>
                                                                    </div>
                                                                    <br>
                                                                    <div class="row">
                                                                        <div class="col-md-12">
                                                                            <button class="btn btn-primary btn-block btn-lg" type="submit"><?php echo $this->lang->line("PAY_NOW");?></button>
                                                                        </div>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                        </div>

                                                    </div>

                                                </div>

                                                <div id="menu31" class="m-widget28__tab-container tab-pane fade active show">
                                                    <div class="m-widget28__tab-items">

                                                        <div class="row">
                                                            <div class="col-md-12">

                                                                <p><?php echo $this->lang->line("Paypal_is_easiest_way_to_pay_online");?></p><br><br>
                                                                <p>
                                                                <!--      <a href="<?php echo base_url("front/pay_pal/").$this->uri->segment(3);?>" class="btn btn-primary btn-lg"> <i class="fa fa-paypal"></i> <?php echo $this->lang->line("Log_in_my_Paypal");?> </a>
                                                                --> 
                                                                <a href="<?php echo base_url("front/telr/").$this->uri->segment(3);?>" class="btn btn-primary btn-lg btn-cardPayment"><?php echo $this->lang->line("PAY_NOW");?></a>
                                                                
                                                                </p>
                                                            
                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>

                                                <div id="menu41" class="m-widget28__tab-container tab-pane fade">

                                                    <div class="m-widget28__tab-items">

                                                        <div class="row">
                                                            <div class="col-md-12 ">
                                                                <h4><?php echo $this->lang->line("Bank_account_details");?></h4><br>
                                                                <div class="d-flex bank_cards">
                                                                    <div class="col-md-6">

                                                                        <div class="m-portlet">
                                                                            <div class="m-portlet__head">
                                                                                <div class="m-portlet__head-caption">
                                                                                    <div class="m-portlet__head-title">
                                                                                        <h3 class="m-portlet__head-text">
                                                                                            <?php echo $this->lang->line('Alinma_Bank');?>
                                                                                        </h3>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="m-portlet__body">
                                                                                <div><h4><?php echo $this->lang->line('Account_Numbers');?></h4><p class="account_number"> 68201635555004</p></div>
                                                                                <div>
                                                                                    <h4><?php echo $this->lang->line('IBAN_Numbers');?></h4><p class="account_number">SA6105000068201635555004</p>
                                                                                </div>
                                                                            </div>
                                                                        </div>

                                                                    </div>
                                                                    <div class="col-md-6">

                                                                        <div class="m-portlet">
                                                                            <div class="m-portlet__head">
                                                                                <div class="m-portlet__head-caption">
                                                                                    <div class="m-portlet__head-title">
                                                                                        <h3 class="m-portlet__head-text">
                                                                                            <?php echo $this->lang->line('NCB_bank');?>
                                                                                        </h3>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="m-portlet__body">
                                                                                <div><h4><?php echo $this->lang->line('Account_Numbers');?></h4><p class="account_number"> 00800000011105</p></div>
                                                                                <div>
                                                                                    <h4><?php echo $this->lang->line('IBAN_Numbers');?></h4><p class="account_number">SA1510000000800000011105</p>
                                                                                </div>
                                                                                
                                                                            </div>
                                                                        </div>

                                                                    </div>
                                                                </div>    
                                                                <br>
                                                                <style>
                                                                    .custom-file-label::after { content: "<?php echo $this->lang->line("Browse");?>"; }
                                                                </style>
                                                                <form role="form" class="bank_payment_form" method="post" enctype="multipart/form-data">
                                                                    <input type="hidden" name="via" value="bank transfer">
                                                                    <div class="form-group">
                                                                        <label for="username"><?php echo $this->lang->line("Upload_bank_transfer_receipt");?></label>
                                                                        <div class="custom-file">
                                                                            <input type="file" name="image" class="custom-file-input" id="file-input" required>
        
                                                                            <label class="custom-file-label" for="customFile"><?php echo $this->lang->line("Choose_file");?></label>
                                                                        </div>
                                                                    </div>
                                                                    <p><strong><?php // echo $this->lang->line("Note");?></strong> <?php //echo $this->lang->line("Our_bank_account_numbers_p1");?></p>
                                                                    <br>
                                                                    <div class="row">
                                                                        <div class="col-md-12">
                                                                            <button class="btn btn-primary btn-block btn-lg" type="submit"> <?php echo $this->lang->line("PAY_NOW");?>  </button>
                                                                        </div>
                                                                    </div>
                                                                </form>

                                                            </div>
                                                        </div>

                                                    </div>

                                                </div>

                                            </div>
                                            <!-- end::Tab Content -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--end::Portlet-->
                </div>

            </div>

            <!-- <div class="modal-footer">
                <div class="modal-btn-group">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Add General</button>
                    <button type="button" class="btn btn-primary">Save General</button>
                </div>
            </div> -->
        </div>
    </div>
</div>
<!-- End Modals for Payment -->


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


    jQuery( document ).ready(function($){
        $('.c_nav').on('click', function (e) {
            e.preventDefault();
            currentID = $(this).attr('id');
            $('.c_nav').removeClass('active');
            $(this).addClass('active');
            $('.c_tabs').hide();
            if ( currentID == 'bank' ) {
                $('div.' + currentID).css('display', 'flex');
            } else {
                $('div.' + currentID).show();
            }
        })
        $('.view_pay_now').on('click', function(){
            const id = $(this).attr('data-id');
            $('.btn-cardPayment').attr('href', '<?php echo base_url('front/telr/') ?>'+id );
            $('.bank_payment_form').attr('action', '<?php echo base_url('front/payment/') ?>'+id);
        })
    });
</script>
