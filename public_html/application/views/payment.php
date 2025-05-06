<?php $nvc = "white-nav sticky shrink modern hover4 radius-drop"; 
$pageTitle = $this->lang->line("Payment");
include('header.php');
?>
 </section>
<?php
include('header_welcome.php');
?>
<!-- END: Left Aside -->

    <style>
      
        .col-md-offset-3{
            margin-left: 25%;
        }
        .m-widget28 .m-widget28__pic {
            background-color: #102b4e;
        }
        .m-widget28 .m-widget28__container .m-widget28__nav-items .m-widget28__nav-item > a.active {
            background-color: #CAA457;
            border-color: #CAA457;
        }
        .nav-item:hover{
            background-color: #CAA457 !important;
            border-color: #CAA457 !important;
        }
        .m-widget28 .m-widget28__container .m-widget28__nav-items .m-widget28__nav-item {
            vertical-align: middle;
        }
        .m-widget28 .m-widget28__container .m-widget28__nav-items .m-widget28__nav-item > a{
            min-height: 100px;
        }
        @media (max-width: 768px) {
            .col-md-offset-3{
                margin-left: auto;
            }
        }
    </style>
<div class="m-grid__item m-grid__item--fluid m-wrapper">
  <div class="m-grid__item m-grid__item--fluid m-wrapper">


        <!-- END: Subheader -->
        <div class="m-content">

            <div class="row">

                <div class="col-md-6 col-md-offset-3">
                    <!--begin:: Widgets/Blog-->
                    <div class="m-portlet m-portlet--head-overlay m-portlet--full-height   m-portlet--rounded-force">
                        <div class="m-portlet__head m-portlet__head--fit">
                            <div class="m-portlet__head-caption">
                                <div class="m-portlet__head-title">
                                    <h3 class="m-portlet__head-text m--font-light">
                                        <?php echo $this->lang->line("Pay");?>
                                    </h3>
                                </div>
                            </div>
                            <div class="m-portlet__head-tools"></div>
                        </div>
                        <div class="m-portlet__body" >
                            <div class="m-widget28">
                                <div class="m-widget28__pic m-portlet-fit--sides" style="margin-left: -2.3rem; margin-right: -2.4rem;"></div>
                                <div class="m-widget28__container">
                                    <!-- begin::Nav pills -->
                                    <ul class="m-widget28__nav-items nav nav-pills nav-fill" role="tablist">
                                       <!-- <li class="m-widget28__nav-item nav-item">
                                            <a class="nav-link" data-toggle="pill" href="#menu11"><span><i class="fa fa-credit-card"></i></span><span><?php echo $this->lang->line("Credit_Card");?></span></a>
                                        </li>
                                        <li class="m-widget28__nav-item nav-item">
                                            <a class="nav-link" data-toggle="pill" href="#menu21"><span><i class="fa fa-money"></i></span><span><?php echo $this->lang->line("Cheque_Payment");?></span></a>
                                        </li>-->
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
                                                        <a href="<?php echo base_url("front/telr/").$this->uri->segment(3);?>" class="btn btn-primary btn-lg"><?php echo $this->lang->line("PAY_NOW");?></a>
                                                          
                                                        </p>
                                                       
                                                    </div>
                                                </div>

                                            </div>
                                        </div>

                                        <div id="menu41" class="m-widget28__tab-container tab-pane fade">

                                            <div class="m-widget28__tab-items">

                                                <div class="row">
                                                    <div class="col-md-12">

                                                        <p><?php echo $this->lang->line("Bank_account_details");?></p><br>
                                                        <dl class="param">
                                                            <dt><?php echo $this->lang->line("BANK");?>: </dt>
                                                            <dd> <?php echo $this->lang->line('Alinma_Bank');?></dd>
                                                        </dl>
                                                        <dl class="param">
                                                            <dt><?php echo $this->lang->line('Account_Numbers');?>: </dt>
                                                            <dd>68201635555004</dd>
                                                        </dl>
                                                        <dl class="param">
                                                            <dt><?php echo $this->lang->line('IBAN_Numbers');?>: </dt>
                                                            <dd>  SA6105000068201635555004</dd>
                                                        </dl>
                                                        <dl class="param">
                                                            <dt><?php echo $this->lang->line("BANK");?>: </dt>
                                                            <dd> <?php echo $this->lang->line('NCB_bank');?></dd>
                                                        </dl>
                                                        <dl class="param">
                                                            <dt><?php echo $this->lang->line('Account_Numbers');?>: </dt>
                                                            <dd>00800000011105</dd>
                                                        </dl>
                                                        <dl class="param">
                                                            <dt><?php echo $this->lang->line('IBAN_Numbers');?>: </dt>
                                                            <dd>SA1510000000800000011105</dd>
                                                        </dl>
                                                        <br>
                                                        <style>
                                                            .custom-file-label::after { content: "<?php echo $this->lang->line("Browse");?>"; }
                                                        </style>
                                                        <form role="form" method="post" enctype="multipart/form-data">
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
                    <!--end:: Widgets/Blog-->


                </div>

            </div>


        </div>



    </div>
</div>
</div>



<?php

include('footer.php');

?>
 