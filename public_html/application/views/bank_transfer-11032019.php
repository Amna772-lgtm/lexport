<?php $nvc = "white-nav sticky shrink modern hover4 radius-drop"; 
$pageTitle = $this->lang->line("Wallet");
include('header.php');
?>
 </section>
<?php
include('header_welcome.php');
?>
<!-- END: Left Aside -->
<div class="m-grid__item m-grid__item--fluid m-wrapper">

	<?php echo $this->session->flashdata('payment_msg'); ?>
    <!-- END: Subheader -->
    <div class="m-content">
  <!--begin::Portlet-->
            <div class="m-portlet">
                <div class="m-portlet__head">
                    <div class="m-portlet__head-caption">
                        <div class="m-portlet__head-title">
                            <h3 class="m-portlet__head-text">
                                <?php echo $this->lang->line('Wallet');?>
                            </h3>
                        </div>
                    </div>
                </div>


    	<div class="m-form m-form--fit m-form--label-align-right m-form--group-seperator-dashed">
                    <div class="m-portlet__body">
					<div class="form-group m-form__group row">
                        <table class="table table-hover table-striped">
                            <thead>
                            <tr class="netTr">

                                <th><?php echo $this->lang->line('Invoice_No');?></th>
                                <th><?php echo $this->lang->line('Created_Date');?></th>
                                <th><?php echo $this->lang->line('Created_Time');?></th>
                                <th><?php echo $this->lang->line('Due_Date');?></th>
                                <th><?php echo $this->lang->line('Due_Time');?></th>
                                <th><?php echo $this->lang->line('Created_By');?></th>
                                <th><?php echo $this->lang->line('Invoice_Title');?></th>
                                <th><?php echo $this->lang->line('Total_Cost');?></th>
                                <th><?php echo $this->lang->line('VAT_0_5');?></th>
                                <th><?php echo $this->lang->line('Total_Amount');?></th>
                                <th><?php echo $this->lang->line('Status');?></th>
                                <th><?php echo $this->lang->line('ACTION');?></th>

                            </tr>
                            </thead>
                            <tbody>
						<?php $i=0; foreach ($data as $invoice){ $i++; ?>
						<tr style="text-align: center;">
						<td><?= $invoice['invoice_no'] ?></td>
						<td><?php $timestamp = strtotime($invoice['create_date']); echo  date("d-m-Y",$timestamp);?></td>
						<td><?php $timestamp = strtotime($invoice['create_date']); echo  date("h:i a",$timestamp);?></td>
                        <td><?= $invoice['due_date'] ?></td>
                        <td><?= $invoice['due_time'] ?></td>
                        <td><?php echo getEmployeeName($invoice['created_by']); ?></td>
						<td><?= $invoice['invoice_title'] ?></td>
						<td><?php echo $vat = $invoice['main_total']/$invoice['financial_payments']; ?></td>
						<td><?php echo ($vat * 5) / 100;  ?></td>
						<td><?= $invoice['total'] ?></td>
						<th><?php if($invoice['payment_status'] == 'paid'){ $dd = "success"; } else if($invoice['payment_status'] == 'process') { $dd="warning"; } else { 	$dd="warning"; } ?><span class="m-badge  m-badge--<?php echo $dd; ?> m-badge--wide"><?php echo $invoice['payment_status'] ?></span></th>
						<th>	
						<span style="overflow: visible; position: relative;">
						<a href="<?= base_url("front/generate_invoice/{$invoice['id']}"); ?>" class="m-portlet__nav-link btn m-btn m-btn--hover-warning m-btn--icon m-btn--icon-only m-btn--pill" title="Download Invoice">
						<i class="fa fa-download"></i>
						</a>
						<?php if($invoice['payment_status'] == 'unpaid'){ ?>
						<a  href='<?= base_url("front/payment/{$invoice['id']}"); ?>'class="btn btn-success" title="Pay Invoice"><?php echo $this->lang->line('Pay');?></a>
						<?php } ?>
						</span>
						</th>
						</tr>
					<?php } ?>

                            </tbody>
                        </table>
 
                    </div>


                </div>
                </div>
            </div>


        </div>

        <div class="m-content">
            <div class="m-portlet">
                <div class="m-portlet__head">
                    <div class="m-portlet__head-caption">
                        <div class="m-portlet__head-title">
                            <h3 class="m-portlet__head-text">
                                Our bank account numbers
                            </h3>
                        </div>
                    </div>
                </div>
                <div class="m-portlet__body">
                    <p>You may transfer to our accounts at any to the of following banks. Taking into account payment of the full amount without the charge of transfer fees between local banks.</p>
                </div>
            </div>
        </div>



        <div class="row m-content">

            <div class="col-md-4">

                <div class="m-portlet">
                    <div class="m-portlet__head">
                        <div class="m-portlet__head-caption">
                            <div class="m-portlet__head-title">
                                <h3 class="m-portlet__head-text">
                                    Al Rajhi Bank
                                </h3>
                            </div>
                        </div>
                    </div>
                    <div class="m-portlet__body">
                        <p>Account number: 39875304894539457043.</p>
                        <p>IBAN: SA0007836459348753947589.</p>
                    </div>
                </div>

            </div>
            <div class="col-md-4">

                <div class="m-portlet">
                    <div class="m-portlet__head">
                        <div class="m-portlet__head-caption">
                            <div class="m-portlet__head-title">
                                <h3 class="m-portlet__head-text">
                                    The nation Bank
                                </h3>
                            </div>
                        </div>
                    </div>
                    <div class="m-portlet__body">
                        <p>Account number: 39875304894539457043.</p>
                        <p>IBAN: SA0007836459348753947589.</p>
                    </div>
                </div>

            </div>
            <div class="col-md-4">

                <div class="m-portlet">
                    <div class="m-portlet__head">
                        <div class="m-portlet__head-caption">
                            <div class="m-portlet__head-title">
                                <h3 class="m-portlet__head-text">
                                    Raj Bank
                                </h3>
                            </div>
                        </div>
                    </div>
                    <div class="m-portlet__body">
                        <p>Account number: 39875304894539457043.</p>
                        <p>IBAN: SA0007836459348753947589.</p>
                    </div>
                </div>

            </div>

        </div>
        </div>
        <!--End::Section-->
    </div>
</div>
</div>



<?php

include('footer.php');

?>
