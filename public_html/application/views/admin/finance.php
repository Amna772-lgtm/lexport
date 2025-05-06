<?php
include('header.php');

?>
    <style>
        .nav {
            display: -webkit-box;
        }
    </style>
    <style>
        * {
            font-family: 'Roboto';
            font-size: 12px;
            margin: 0;
            padding: 0;
        }

        label {
            margin: 0;
        }

        .display-block {
            display: block;
        }
        .display-grid {
            display: grid;
        }

        .grid-col-2 {
            grid-template-columns: repeat(2, 1fr);
        }

        .grid-col-3 {
            grid-template-columns: repeat(3, 1fr);
        }

        gap-16 {
            gap: 16px;
        }

        .text-transform-upper {
            text-transform: uppercase;
        }

        .text-transform-cap {
            text-transform: capitalize;
        }

        .modal-content {
            padding: 24px;
        }

        .modal .modal-content .modal-header {
            padding: 0 0 24px 0;
        }

        .modal .modal-content .modal-body {
            padding: 24px 0 0 0;
        }


        .modal-header-logo {
            max-height: 90px;
            text-align: end;
        }

        .modal-header-logo img {
            max-height: 100%;

        }

        .modal-header-inner {
            grid-template-columns: 6fr 3fr 3fr;
        }

        .modal-header-title {
            padding-inline-end: 24px;
            border-inline-end: 1px solid #ccc;
        }

        .invoice-headings {
            background-color: #e9ecef;
            opacity: 1;
            padding: 5px;
        }

        .header-title {
            font-size: 40px;
            font-weight: 700;
            color: #1B2A39;
            text-transform: capitalize;
        }

        .modal-header-description {
            padding-inline-start: 24px;
        }

        span.values,
        .detail-section-inner .select,
        .modal-header-description span {
            color: #1B2A39;
        }

        .detail-section-inner .select,
        .detail-section-inner .select select {
            font-size: 14px;
            font-weight: 700;
        }

        .detail-section-inner .select select {
            background: none;
        }

        ul.invoice-detail {
            margin-bottom: 0;
        }

        .invoice-detail label {
            display: block;
        }

        .select-value.select-date input {
            background: none;
        }

        .invoice-billing-section {
            border-bottom: 1px solid #ccc;
        }

        .invoice-billing-section,
        .incoice-check-out-section {
            padding-block: 20px 0;
        }

        .invoice-notes {
            padding-block: 20px;
        }

        .submit-btn {
            margin-top: 20px;
        }

        .billing-headers,
        .billing-body {
            padding: 10px;
        }

        .billing-body {
            border-bottom: 1px solid #ccc;
        }

        .billing-headers {
            border-top: 1px solid #ccc;
            border-bottom: 1px solid #ccc;
            background-color: #ccc;
            border-radius: 5px;
        }

        .billing-body.display-grid,
        .billing-headers.display-grid {
            grid-template-columns: 2fr 2fr 2fr 2fr;
        }

        .incoice-check-out-section.display-grid {
            grid-template-columns: 8fr 4fr;
        }

        .amount::before {
            content: "$ ";
        }

        .total-ammount {
            display: flex;
            flex-direction: column;
            align-items: flex-end;
        }

        .grand-total-amount {
            color: #1B2A39;
            font-weight: 700;
            font-size: 24px;
        }

        .check-out-buttons {
            grid-column: span 2;
            display: flex;
            justify-content: flex-end;
            column-gap: 10px;
            padding-top: 10px;
        }

        .check-out-buttons input{
            cursor: pointer;
            background: none;
            padding: 6px 15px;
            font-weight: 600;
            font-size: 14px;
        }

        input.create {
            background-color: #1866a9;
            border-radius: 50px;
            color: #fff;
        }

        .terms-conditions p {
            font-size: 10px;
        }

        .detail-section-title label {
            display: flex;
        }

        .detail-section-title label::before {
            content: url('data:image/svg+xml,%3Csvg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512" width="10" height="10"%3E%3Cpath fill="%23fff" d="M0 55.2L0 426c0 12.2 9.9 22 22 22c6.3 0 12.4-2.7 16.6-7.5L121.2 346l58.1 116.3c7.9 15.8 27.1 22.2 42.9 14.3s22.2-27.1 14.3-42.9L179.8 320l118.1 0c12.2 0 22.1-9.9 22.1-22.1c0-6.3-2.7-12.3-7.4-16.5L38.6 37.9C34.3 34.1 28.9 32 23.2 32C10.4 32 0 42.4 0 55.2z"/%3E%3C/svg%3E');
        
        display: flex; /* Aligns the content properly */
        justify-content: center;
        align-items: center;

        width: 20px;  /* Outer container size */
        height: 20px;
        background-color: #1866a9; /* Background color */
        border-radius: 50%; /* Circular shape */
        margin-right: 5px;
        }
        
        .invoice-view .invoice-details-section .detail-section-inner {
    background-color: #EBEFF6;
    border: 1px solid #ccc;
    padding: 10px;
    border-radius: 10px;
    height: calc(100% - 24px);

}
        .bootbox-confirm .modal-dialog {
    max-width: 500px;
}
.bootbox-alert .modal-dialog {
    max-width: 600px;
}

.form-control.invoice-form-control {
    border-radius: 4px;
}

    #viewing-invoice-modal table#m_datatable tbody tr td:nth-child(2) {
        max-width: 150px;
        overflow:hidden;
        white-space: nowrap;
        text-overflow:ellipsis;
    }

    #viewing-invoice-modal table#m_datatable tbody tr td:last-child {
        text-align: center;
    }
    #viewing-invoice-modal .modal-dialog.invoice-list-modal{
        max-width: 910px;
    }
    #viewing-invoice-modal .modal-header{
        padding: unset;
    }
    #viewing-invoice-modal .m-portlet__body{
        margin-top: 0;
    }
    </style>
    <div class="m-grid__item m-grid__item--fluid m-wrapper">


        <!-- END: Subheader -->
        <div class="m-content">

            <!--begin::Portlet-->
            <div class="m-portlet lp-theme-card bg-transparent">
            <div id="custom-search-container"></div>
                <div class="m-portlet__head">
                    <div class="m-portlet__head-caption">
                        <!-- <div class="m-portlet__head-title">
                            <h3 class="m-portlet__head-text">
                                <?php echo $this->lang->line('Financial');?>
                            </h3>
                        </div> -->
                        <div class="theme-new-nav-menu">
                            <h3 class="m-portlet__title" style="margin-right: 70px; font-size:24px !important;">
                                <?php echo $this->lang->line('Invoice');?>
                            </h3>
                            <ul style="gap:30px;">
                                <li class="active"> <a href="http://lexport.demosbywpsqr.com/admin/finance"><?php echo $this->lang->line('List');?></a> </li>
                                <li> <a href="http://lexport.demosbywpsqr.com/admin/finance/expenses_list"><?php echo $this->lang->line('Expense');?></a> </li>
                                <li> <a href="http://lexport.demosbywpsqr.com/admin/finance/transaction"><?php echo $this->lang->line('Transaction');?></a> </li>
                                <!-- <li> <a href="http://lexport.demosbywpsqr.com/admin/hr/list_hr_fine">Payment Methods</a> </li> -->
                            </ul>

                            <?php
    // Safe fallback for $value
    if (!isset($value)) {
        $value = ''; // Or set it from POST / SESSION if applicable
    }
?>

<?php if($this->session->userdata('role_id') == 1){ ?>
    <div style="display: flex; align-items: center; gap: 30px; margin-left:auto">
        <select name="payment_status" id="payment_status" class="form-control" style="width:175px; height:30px; border-radius: 0;"> 
            <option value="" <?php echo ($value == '') ? 'selected' : ''; ?>>
                <?php echo $this->lang->line('Status'); ?>
            </option>
            <option value="paid" <?php echo ($value == 'paid') ? 'selected' : ''; ?>>
                <?php echo $this->lang->line('Paid'); ?>
            </option>
            <option value="unpaid" <?php echo ($value == 'unpaid') ? 'selected' : ''; ?>>
                <?php echo $this->lang->line('Unpaid'); ?>
            </option>
            <option value="hold" <?php echo ($value == 'hold') ? 'selected' : ''; ?>>
                <?php echo $this->lang->line('Hold'); ?>
            </option>
            <option value="process" <?php echo ($value == 'process') ? 'selected' : ''; ?>>
                <?php echo $this->lang->line('In_Process'); ?>
            </option>
        </select>
        <a style="color:#fff !important" class="btn btn-primary viewing-invoice-modal" data-target="#viewing-invoice-modal" data-toggle="modal">
            <?php echo $this->lang->line('Create_Invoice'); ?>
        </a>
    </div>
<?php } ?>



                        </div>

                    </div>
                </div>
				<?php echo $this->session->flashdata('showMsg'); 
                ?>
                <div class="m-portlet__body">
                    <!-- Sec tabs --->
                    <!-- <ul class="nav nav-tabs" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" data-toggle=" " href="<?php echo base_url('admin/finance'); ?>" data-target="#m_tabs_1_1"><?php echo $this->lang->line('List');?></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle=" " href="<?php echo base_url('admin/finance/expenses_list'); ?>" data-target="#m_tabs_1_2"><?php echo $this->lang->line('Expense_List');?></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo base_url('admin/finance/approve_pending_invoice_list'); ?>" data-target=" "><?php echo $this->lang->line('Pending_Invoice');?></a>
                        </li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane active" id="m_tabs_1_1" role="tabpanel">
                            <div class="">


                                <div class="align-items-center dataTables_wrapper dt-bootstrap4 no-footer" style="margin-bottom: 20px">
<?php if($this->session->userdata('role_id') == 1){
		$users =  $this->db->select("users.*,chat.create_date,chat.user_id")->join('chat', "chat.user_id = users.id", 'left')
			->where("users.role_id",3)->order_by('chat.create_date', 'DESC')->group_by('users.id')
			->get("users")
			->result_array();
		} ELSE {
			$users =  $this->db->select("customers.*,chat.create_date,chat.user_id")->join('chat', "chat.user_id = customers.user_id", 'left')
			->where("customers.user_id",$this->session->userdata('admin_id'))->order_by('chat.create_date', 'DESC')->group_by('customers.user_id')
			->get("customers")
			->result_array();
		} ?>
                              
                                    <div class="col-md-12">
                                        <div class="row theme-group-form">
                                            <div class="row">
                                            <div class="col-sm-6 col-xl-4">
                                                <?php echo form_open("admin/finance",['id'=>'archive']); ?> 
                <select id="clientsel" class="form-control" name="clients">
		    	<option><?php echo $this->lang->line('Select_Client');?></option>
				
			<?php  foreach ($users as $get_per_all_clients) {?>
			<?php if($this->session->userdata('role_id') == 1){ ?>
		    	<option value="<?php echo $get_per_all_clients['id']?>" <?php if($custo_id==$get_per_all_clients['id']){ echo "selected=selected";}?>><?php echo $get_per_all_clients['name']?></option>
			<?php } else {?>
			
		    	<option value="<?php echo $get_per_all_clients['customers_id']?>" <?php if($custo_id==$get_per_all_clients['customers_id']){  }?>><?php echo $get_per_all_clients['client_name']?></option>
			<?php } } ?>
				<?php /*
				$c  = isset($_POST['clients'])?$_POST['clients']:'';  
				$t  = isset($_POST['cases'])?$_POST['cases']:'';  
				foreach ($users as $get_per_all_clients) {?>
		    	<option value="<?php echo $get_per_all_clients['id']?>" <?php if($c==$get_per_all_clients['id']) echo "selected=selected";?>><?php echo $get_per_all_clients['name']?></option>
				<?php } */?>
				</select>
				</div>
				<div class="col-sm-6 col-xl-4">
				<select class="form-control" id="casesel" name="cases">
		    	<option value=""><?php echo $this->lang->line('Select_E_Service');?></option>
				<?php /* foreach ($get_per_case as $get_per_case) {?>
				<option value="<?php echo $get_per_case['id']?>" <?php if($t==$get_per_case['id']) echo "selected=selected";?>><?php echo $get_per_case['case_number']?></option>
				<?php } */?>	    
				</select> 
                                            </div>

                                            <div class="col-xl-4">
                                                <div class="theme-btn-group">
                                                <?php echo form_submit(['id'=>'addcustomer','value'=>'Find','class'=>'btn btn-primary ']); ?>
                                                <a href="" class="btn btn-danger"  ><?php echo $this->lang->line('Reset');?></a>
                                                <?php if($this->session->userdata('admin_id') == 463 OR $this->session->userdata('admin_id') == 470 OR (isset($datas[1][6]) && $datas[1][6] == 1)){ ?>
											    <a href="<?php echo base_url('admin/finance/pending_invoice_list'); ?>" class="btn btn-success  float-right"><i class="fa fa-plus"></i> Invoice</a>
											<?php } ?>
                                                </div>
                                                
                                            </div>
                                        </div>
                                    </div>
                                    </div>
	</form>
        
                                </div> -->
                                <div class="m_datatable m-datatable m-datatable--default m-datatable--loaded" style="">

                                <div class="table-responsive">
                                    <table class="lp-theme-table lp-large-theme" id="m_datatable">
                                        <thead>
                                            <tr class="netTr" style="text-align:left;">
                                                <th class="sortable">
                                                    <!-- <input type="checkbox" id="select-all"> -->
                                                    <?php echo $this->lang->line('Invoice');?>
                                                    <img class="sortIcon" src="../../assets/images/img/unfold_more.svg" height="18px">
                                                </th>
                                                <th class="sortable">
                                                    <?php echo $this->lang->line('Client_Details');?>
                                                    <img class="sortIcon" src="../../assets/images/img/unfold_more.svg" height="18px">
                                                </th>
                                                <!-- <th class="sortable">
                                                    <?php echo $this->lang->line('Service_Type');?>
                                                    <img class="sortIcon" src="../../assets/images/img/unfold_more.svg" height="18px">
                                                </th> -->
                                                <th class="sortable">
                                                    <?php echo $this->lang->line('Date_Issued');?>
                                                    <img class="sortIcon" src="../../assets/images/img/unfold_more.svg" height="18px">
                                                </th>
                                                <th class="sortable">
                                                    <?php echo $this->lang->line('Due_Date');?>
                                                    <img class="sortIcon" src="../../assets/images/img/unfold_more.svg" height="18px">
                                                </th>
                                                <th class="sortable">
                                                    <?php echo $this->lang->line('Amount');?>
                                                    <img class="sortIcon" src="../../assets/images/img/unfold_more.svg" height="18px">
                                                </th>
                                                <th class="sortable">
                                                    <?php echo $this->lang->line('Status');?>
                                                    <img class="sortIcon" src="../../assets/images/img/unfold_more.svg" height="18px">
                                                </th>
                                                <th></th>
                                            </tr>
                                        </thead>

                                            <tbody>
						<?php $i=0; foreach ($invoice as $invoice){ $i++; ?>
                           
                      <tr class="hide<?php echo $invoice['id'] ?>"  style="text-align: left;">
                        <td>
                            
                            <!-- <input type="checkbox" class="row-checkbox" value="<?= $invoice['id'] ?>"> -->
                            <?= $invoice['invoice_no'] ?>
                        </td>
                        <td style="color:#333333;"><?= $invoice['client_name'] ?></td>
						
						<td><?php $timestamp = strtotime($invoice['create_date']); echo  getTheDayAndDateFromDatePan(date("d/m/Y",$timestamp));?></td>
                        <td><span class="countdown" style="color:#ff6767;"><?= getTheDayAndDateFromDatePan($invoice['due_date']); ?></span></td>

<!--                         
						<td><?= $invoice['invoice_title'] ?></td>
						<td><?php  $vat = $invoice['main_total']/$invoice['financial_payments']; echo number_format((float)$vat, 2, '.', '');?></td>
						<td><?php $assd=  ($vat * 5) / 100;  echo number_format((float)$assd, 2, '.', '');?></td> -->
						<td>$<?= number_format($invoice['total'], 2) ?></td>
						<td>
                            <?php
                                if ($invoice['payment_status'] == 'paid') {
                                    $dd = "success";
                                } else if ($invoice['payment_status'] == 'process') {
                                    $dd = "warning";
                                } else {
                                    $dd = "warning";
                                }

                                // Capitalize the first letter of payment status
                                $capitalized_status = ucfirst($invoice['payment_status']);
                            ?>
                            <span class="m-badge m-badge--<?php echo $dd; ?> m-badge--wide">
                                <?php echo $capitalized_status; ?>
                            </span>
                        </td>
                        <td class="action">
                        <a data-target="#view-modal" class="view-modal" data-toggle="modal" data-id="<?= $invoice['id'] ?>" title="<?php echo $this->lang->line('View');?>">
                            <div style="display:none" class="invoice_data" data-array='<?php echo json_encode( $invoice ); ?>'></div>
                            <div style="display:none" class="invoice_created_by" data-array='<?php echo getEmployeeName( $invoice['created_by'] ); ?>'></div>
                            <div style="display:none" class="invoice_service_types" data-array='<?php echo getServiceType( $invoice['service_types'] ); ?>'></div>
                            <img src="<?= base_url('assets/images/img/eye-solid.svg') ?>" alt="View" class="img-eye">
                        </a>
                        <?php if($invoice['is_reject'] == 1) { ?>
                        <span class="m-badge  m-badge--danger m-badge--wide"><?php echo $this->lang->line('Reject');?></span>
							
			    		<?php } else { ?>
						<a  href='<?= base_url("admin/finance/edit_invoice/{$invoice['id']}"); ?>' 
                            title="<?php echo $this->lang->line('Edit_Invoice');?>">
                            <img src="<?= base_url('assets/images/img/pen-solid.svg') ?>" alt="Edit" class="img-pen">
                        </a>
						<a  href='<?= base_url("admin/finance/generate_invoice/{$invoice['id']}"); ?>' class="fa fa-file-pdf-o" title="<?php echo $this->lang->line('generate_invoice');?>"></a>
						<a href="javascript:;" id="<?= $invoice['id'] ?>" class="fa fa-trash delete_case" title="<?php echo $this->lang->line('delete_invoice');?>"></a>
					<?php } ?>
					</td>

                </tr> 
                <?php } ?> 
                                            </tbody>
                                        </table>
                                        <!-- Start Add Modal -->
                                        <!-- start popup invoice -->
                                        <!-- <div class="modal fade lp-theme-modal show" id="add-modal" tabindex="-1" role="dialog" aria-labelledby="modalTitle" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                            <?php echo form_open_multipart('admin/finance/process_invoice',['id'=>'hr','class'=>'m-form m-form--fit m-form--label-align-right m-form--group-seperator-dashed']); 
                                                echo form_hidden('id', '');
                                                echo form_hidden('case_id', ''); 
			                                    echo form_hidden('customers_id', '');
                                            ?>
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <div class="modal-header-inner display-grid">
                                                            <div class="modal-header-title">
                                                                <h2 class="header-title">Nassar Al barakit</h2>
                                                                <p class="header-e-mail">nassarbarakit@mail.com</p>
                                                            </div>
                                                            <div class="modal-header-description">
                                                                <ul class="invoice-detail">
                                                                    <li>
                                                                        <?php $rand_invoice_no = 'IN' . rand(1000000000, 9999999999); ?>
                                                                        <label for="" class="">Invoice-number:</label>
                                                                        <input type="hidden" name="invoice_no" value="<?php echo $rand_invoice_no; ?>">
                                                                        <span class="invoice-number invoice-headings"><?php echo $rand_invoice_no; ?></span>
                                                                    </li>
                                                                    <li>
                                                                    <label for="" class="">Issued:</label>
                                                                    <span class="invoice-issue-date invoice-headings"><?php echo date("d-m-Y"); ?></span>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                            <div class="modal-header-logo">
                                                                <img src="http://lexport.demosbywpsqr.com//assets/images/img/logo-new-1.svg" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="invoice-details-section display-grid grid-col-2 gap-16">
                                                            <div class="client-detail-section">
                                                                <label><?php echo $this->lang->line('File_Number');?></label>
                                                                <input type="text" class="form-control invoice-form-control m-input" value="" name="client_file_number" readonly placeholder="">
                                                            </div>
                                                            <div class="services-detail-section">
                                                                <label><?php echo $this->lang->line('Client_Name');?></label>
                                                                <input type="text" class="form-control invoice-form-control m-input" name="client_name" value="" readonly placeholder="">
                                                            </div>
                                                            <div class="payment-detail-section">
                                                                <label><?php echo $this->lang->line('Created_By');?></label>
                                                                <input type="text" class="form-control invoice-form-control m-input" value="<?php echo getEmployeeName($this->session->userdata('admin_id'));?>" readonly placeholder="">
                                                            </div>
                                                            <div class="client-detail-section">
                                                                <label><?php echo $this->lang->line('E_Service_Number');?></label>
                                                                <input type="text" class="form-control invoice-form-control m-input" value="" name="case_number" readonly placeholder="">
                                                            </div>
                                                            <div class="services-detail-section">
                                                                <label><?php echo $this->lang->line('Contact_Number');?></label>
                                                                <input type="text" class="form-control invoice-form-control m-input" value="<?php echo getCustomerMobile($case_data->customers_id);?>" readonly placeholder="">
                                                            </div>
                                                            <div class="payment-detail-section">
                                                                <label><?php echo $this->lang->line('Created_Time');?></label>
                                                                <input type="text" class="form-control invoice-form-control m-input" value="<?php echo date('H:i');?>" readonly placeholder="">
                                                            </div>
                                                            <div class="payment-detail-section">
                                                                <label><?php echo $this->lang->line('Due_Date');?></label>
                                                                <input type="date" class="form-control invoice-form-control m-input" name="due_date" value="" placeholder="">
                                                            </div>
                                                            <div class="payment-detail-section">
                                                                <label><?php echo $this->lang->line('Due_Time');?></label>
                                                                <input type="time" class="form-control invoice-form-control m-input" name="due_time" value="" placeholder="">
                                                            </div>
                                                            <div class="client-detail-section">
                                                                <label for="name" class=" form-control-label"><?php echo $this->lang->line('Invoice_Title');?></label>
                                                                <input type="text" class="form-control invoice-form-control m-input" value="" name="invoice_title" required placeholder="">
                                                            </div>
                                                            <div class="services-detail-section">
                                                                <label for="name" class=" form-control-label"><?php echo $this->lang->line('Total_Amount');?></label>
                                                                <input type="text" class="form-control invoice-form-control m-input" value="" name="total_amount" required placeholder="">
                                                            </div>
                                                        </div>
                                                        <div class="display-grid">
                                                            <div class="billing-headers display-grid">
                                                                <label for="" class="text-transform-upper"><?php echo $this->lang->line('Service_Name');?></label>
                                                                <label for="" class="text-transform-upper"><?php echo $this->lang->line('Total');?></label>
                                                                <label for="" class="text-transform-upper"><?php echo $this->lang->line('VAT');?></label>
                                                                <label for="" class="text-transform-upper"><?php echo $this->lang->line('Grad_Total');?></label>
                                                            </div>
                                                            <div class="billing-body display-grid">
                                                                <span>Test 1</span>
                                                                <span>350</span>
                                                                <span>5%</span>
                                                                <span>500</span>
                                                            </div>
                                                        </div>
                                                        <div class="display-grid invoice-notes">
                                                            <h3><?php echo $this->lang->line('Note');?></h3>
                                                            <textarea value="" rows="4" name="comment" id="comment" class="form-control invoice-form-control"></textarea>
                                                            <span class="commenterror" style="color:red"></span>
                                                            <br>
                                                            <div>
                                                                <a href="javascript:;" class="btn btn-primary m-btn btn-cst  m-btn--custom m-btn--icon m-btn--air" id="btncmt">
                                                                    <span>
                                                                        <i class="fa fa-plus"></i>
                                                                        <span><?php echo $this->lang->line('Add_New_Note');?></span>
                                                                    </span>
                                                                </a>
                                                            </div>
                                                        </div>
                                                        <div class="display-grid grid-col-6">
                                                            <h3><?php echo $this->lang->line('Report');?></h3>
                                                            <textarea name="report" id="report"><?php echo $value ?></textarea>
                                                            <script src="https://cdn.ckeditor.com/4.11.1/standard/ckeditor.js"></script>
                                                            <script>
                                                                CKEDITOR.replace( 'report' );
                                                            </script>
                                                        </div>
                                                        <?php 
                                                            $submit=$this->lang->line('Submit');
                                                            echo form_submit(['id'=>'addcustomer','value'=>$submit,'class'=>'btn btn-primary btn-lg submit-btn']);
                                                        ?>
                                                    </div>
                                                </div>
                                            </form>
                                            </div>
                                        </div> -->
                                                
                                        <!-- Start Create Invoice Modal -->
                                        <div class="modal fade lp-theme-modal" id="viewing-invoice-modal" tabindex="-1" role="dialog" aria-labelledby="modalTitle" aria-hidden="true">
                                            <div class="modal-dialog invoice-list-modal" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="modalTitle"><?php echo $this->lang->line('Invoice_List');?></h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            
                                                            <svg width="17" height="17" viewBox="0 0 17 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <path opacity="0.5" fill-rule="evenodd" clip-rule="evenodd" d="M0.39988 0.803673C0.656 0.54763 1.00333 0.403793 1.36548 0.403793C1.72763 0.403793 2.07496 0.54763 2.33108 0.803673L8.19434 6.66693L14.0576 0.803673C14.1836 0.673228 14.3343 0.56918 14.5009 0.497602C14.6676 0.426023 14.8468 0.388346 15.0281 0.38677C15.2095 0.385194 15.3893 0.419751 15.5572 0.488423C15.725 0.557095 15.8775 0.658508 16.0057 0.786744C16.134 0.91498 16.2354 1.06747 16.3041 1.23532C16.3727 1.40317 16.4073 1.58301 16.4057 1.76436C16.4041 1.94571 16.3665 2.12492 16.2949 2.29155C16.2233 2.45818 16.1192 2.60889 15.9888 2.73487L10.1255 8.59813L15.9888 14.4614C16.2376 14.719 16.3753 15.064 16.3721 15.4221C16.369 15.7802 16.2254 16.1227 15.9722 16.376C15.7189 16.6292 15.3764 16.7728 15.0183 16.7759C14.6602 16.779 14.3152 16.6414 14.0576 16.3926L8.19434 10.5293L2.33108 16.3926C2.07349 16.6414 1.7285 16.779 1.3704 16.7759C1.01229 16.7728 0.669742 16.6292 0.416517 16.376C0.163291 16.1227 0.0196542 15.7802 0.0165424 15.4221C0.0134306 15.064 0.151093 14.719 0.39988 14.4614L6.26314 8.59813L0.39988 2.73487C0.143837 2.47875 0 2.13143 0 1.76927C0 1.40712 0.143837 1.05979 0.39988 0.803673Z" fill="#1B2A39"/>
                                                            </svg>

                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="m-grid__item m-grid__item--fluid m-wrapper">
                                                            <div class="m-content">
                                                                <div class="m-portlet lp-theme-card bg-transparent">
                                                                    <div class="m-portlet__body theme-inner-form">
                                                                        <div class="m_datatable m-datatable m-datatable--default m-datatable--loaded" style="">
                                                                            <div class="table-responsive">
                                                                                <table class="lp-theme-table lp-large-theme" id="m_datatable">
                                                                                    <thead>
                                                                                        <tr class="netTr" style="text-align:left;">
                                                                                            <th><?php echo $this->lang->line('Serial_No');?></th>
                                                                                            <th><?php echo $this->lang->line('Name');?></th>
                                                                                            <th><?php echo $this->lang->line('Service_Type');?></th>
                                                                                            <!-- <th>Contact No. </th> -->
                                                                                            <th><?php echo $this->lang->line('Case-No');?></th>
                                                                                            <th><?php echo $this->lang->line('Client_File_No');?></th>
                                                                                            <th style="text-align:left;"><?php echo $this->lang->line('ACTION');?></th>
                                                                                        </tr>
                                                                                    </thead>
                                                                                    <tbody>

                                                                                        <?php $i=0; foreach ($case_list as $case){ $i++; ?>
                                                                                        <tr class="hide<?php echo $case['id'] ?>" style="text-align: left;">
                                                                                            <td><?= $i; ?></td>
                                                                                            <td><?= $case['client_name'] ?></td>
                                                                                            <td><?= getServiceType($case['service_types']) ?></td>
                                                                                            <!-- <td><?= getCustomerMobile($case['customers_id']) ?></td> -->
                                                                                            <td><?= $case['case_number'] ?></td>
                                                                                            <td><?= $case['client_file_number'] ?> </td>
                                                                                            <td class="action">          
                                                                                                <span style="overflow: visible; position: relative;">
                                                                                                    <a href="<?php echo base_url();?>admin/finance/create_invoice/<?= $case['id'] ?>" class="m-portlet__nav-link btn m-btn m-btn--hover-warning m-btn--icon m-btn--icon-only m-btn--pill" title="">
                                                                                                        <i class="fa fa-plus"></i>
                                                                                                    </a>
                                                                                                </span>
                                                                                            </td>
                                                                                        </tr> 
                                                                                        <?php } ?>


                                                                                    </tbody>
                                                                                </table>
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
                        <!-- End Create Invoice modal -->

                        <!--------------- start view modal-------------------------->

                                        <div class="modal fade lp-theme-modal show invoice-view" id="view-modal" tabindex="-1" role="dialog" aria-labelledby="modalTitle" aria-hidden="true" >
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <div class="modal-header-inner display-grid">
                                                            <div class="modal-header-title">
                                                                <h2 class="header-title">Nassar Al barakit</h2>
                                                                <p class="header-e-mail">nassarbarakit@mail.com</p>
                                                            </div>
                                                            <div class="modal-header-description">
                                                                <ul class="invoice-detail">
                                                                    <li>
                                                                        <label for="" class="">Invoice-number:</label>
                                                                        <span class="invoice-number invoice-headings"></span>
                                                                    </li>
                                                                    <li>
                                                                    <label for="" class="">Issued:</label>
                                                                    <span class="invoice-issue-date invoice-headings"></span>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                            <div class="modal-header-logo">
                                                                <img src="http://lexport.demosbywpsqr.com//assets/images/img/logo-new-1.svg" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="invoice-details-section display-grid grid-col-2 gap-16">
                                                            <div class="client-detail-section">
                                                                <label><?php echo $this->lang->line('File_Number');?></label>
                                                                <input type="text" class="form-control invoice-form-control m-input client_file_number" value="" name="client_file_number" readonly placeholder="">
                                                            </div>
                                                            <div class="services-detail-section">
                                                                <label><?php echo $this->lang->line('Client_Name');?></label>
                                                                <input type="text" class="form-control invoice-form-control m-input client_name" name="client_name" value="" readonly placeholder="">
                                                            </div>
                                                            <div class="payment-detail-section">
                                                                <label><?php echo $this->lang->line('Created_By');?></label>
                                                                <input type="text" class="form-control invoice-form-control m-input created_by" value="" readonly placeholder="">
                                                            </div>
                                                            <div class="client-detail-section">
                                                                <label><?php echo $this->lang->line('E_Service_Number');?></label>
                                                                <input type="text" class="form-control invoice-form-control m-input case_number" value="" name="case_number" readonly placeholder="">
                                                            </div>
                                                            <div class="services-detail-section">
                                                                <label><?php echo $this->lang->line('Contact_Number');?></label>
                                                                <input type="text" class="form-control invoice-form-control m-input contact_number" value="<?php echo getCustomerMobile($case_data->customers_id);?>" readonly placeholder="">
                                                            </div>
                                                            <div class="client-detail-section">
                                                                <label for="name" class=" form-control-label"><?php echo $this->lang->line('Invoice_Title');?></label>
                                                                <input type="text" class="form-control invoice-form-control m-input invoice_title" value="" name="invoice_title" readonly placeholder="">
                                                            </div>
                                                            <div class="services-detail-section">
                                                                <label for="name" class=" form-control-label"><?php echo $this->lang->line('Total_Amount');?></label>
                                                                <input type="text" class="form-control invoice-form-control m-input main_total" value="" name="total_amount" readonly placeholder="">
                                                            </div>
                                                            <div class="services-detail-section">
                                                                <label for="name" class=" form-control-label"><?php echo $this->lang->line('Due_Date');?></label>
                                                                <input type="text" class="form-control invoice-form-control m-input due_date" value="" name="due_date" readonly placeholder="">
                                                            </div>
                                                            <div class="services-detail-section">
                                                                <label for="name" class=" form-control-label"><?php echo $this->lang->line('Due_Time');?></label>
                                                                <input type="text" class="form-control invoice-form-control m-input due_time" value="" name="due_time" readonly placeholder="">
                                                            </div>
                                                        </div>
                                                        <div class="display-grid">
                                                            <div class="billing-headers display-grid">
                                                                <label for="" class="text-transform-upper"><?php echo $this->lang->line('Service_Name');?></label>
                                                                <label for="" class="text-transform-upper"><?php echo $this->lang->line('Total');?></label>
                                                                <label for="" class="text-transform-upper"><?php echo $this->lang->line('VAT');?></label>
                                                                <label for="" class="text-transform-upper"><?php echo $this->lang->line('Grad_Total');?></label>
                                                            </div>
                                                            <div class="billing-body display-grid">
                                                                <span class="service_types"></span>
                                                                <span class="subtotal"></span>
                                                                <span>5%</span>
                                                                <span class="grand_total"></span>
                                                            </div>
                                                        </div>
                                                        <div class="display-grid invoice-notes">
                                                            <h3><?php echo $this->lang->line('Note');?></h3>
                                                            <textarea value="" rows="4" name="comment" id="comment" class="form-control invoice-form-control"></textarea>
                                                            <br>
                                                        </div>
                                                        <div class="display-grid grid-col-6">
                                                            <h3><?php echo $this->lang->line('Report');?></h3>
                                                            <textarea rows="4" name="report" class="form-control invoice-form-control" id="view-report"></textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                                
                                            </div>
                                        </div>

                                        <!-- end view modal -->
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

<?php

include('footer.php');

?>
 <script type="text/javascript">
$(document).ready(function() {
	$('#msg').hide();
});
</script>
<script type="text/javascript">

 
$("#m_datatable").on("click", ".delete_case", function() {
    var id = $(this).attr("id");
    var status = $(this).closest('tr').find('td:eq(6)').text().trim(); // Get the status from the table row
    var url = "<?= base_url('admin/finance/delete_invoice'); ?>"; 

    // Check if status is 'paid' or 'process'
    if (status.toLowerCase() === 'paid') {
        bootbox.alert("Invoice cannot be deleted because it is marked as 'Paid'.");
        return false; // Prevent further action
    } else if (status.toLowerCase() === 'process') {
        bootbox.alert("Invoice cannot be deleted because it is currently in 'Process'.");
        return false; // Prevent further action
    }

    bootbox.confirm("Are you sure?", function(result) {
        if (result) {
            $.ajax({
                type: 'ajax',
                method: 'post',
                url: url,
                data: { "id": id },
                success: function(data) {
                    $('#msg').show();
                    $('#msg').html(data);
                }
            });
            $('.hide' + id).hide(200);
            return true;
        } else {
            $('#msg').show();
            $('#msg').html('Delete failed');
        }
    });
});

$('#clientsel').on('change', function() {
var url="<?= base_url('admin/archive/select_case_id'); ?>"; 
var id = this.value;
$.ajax({
  type:'ajax',
  method:'post',
  url:url,
  data:{"id" : id},
  success:function(data){
 
	$('#casesel').html(data);
  },
});
});

// document.getElementById('select-all').addEventListener('change', function() {
//     let checkboxes = document.querySelectorAll('.row-checkbox');
//     checkboxes.forEach(cb => cb.checked = this.checked);
// });

jQuery(document).ready(function() {

    var table = $('#m_datatable').DataTable();

    // Move the search bar (filter input)
    var searchInput = $('.dataTables_filter');
    searchInput.detach().prependTo('#custom-search-container');

    // Add placeholder to the search input field
    $('.dataTables_filter input').attr('placeholder', 'Search Client, E-Services........');

});



$(document).ready(function () {

    // Check if DataTable is already initialized
    var table = $.fn.dataTable.isDataTable('#m_datatable') 
        ? $('#m_datatable').DataTable() 
        : $('#m_datatable').DataTable({
            pageLength: 10,
            responsive: true
        });


    // Custom filter function for payment status (added before DataTable initialization)
    $.fn.dataTable.ext.search.push(
        function (settings, data, dataIndex) {
            var selectedStatus = $('#payment_status').val().toLowerCase();
            var rowStatus = data[5].trim().toLowerCase(); // 6th column (index 6)

            if (selectedStatus === "" || rowStatus === selectedStatus) {
                return true;
            }
            return false;
        }
    );

    // Redraw table on filter change
    $('#payment_status').on('change', function () {
        table.draw();
    });

    // Optional: Hide pagination if filtered results are small
    $('#m_datatable').on('draw.dt', function () {
        var info = table.page.info();
        if (info.recordsDisplay <= info.length) {
            $('.dataTables_paginate').hide();
        } else {
            $('.dataTables_paginate').show();
        }
    });
});


function updateSortIcons() {
    $(".sortable").each(function () {
        var icon = $(this).find("img.sortIcon");

        if ($(this).hasClass("sorting_desc")) {
            icon.attr("src", "../../assets/images/img/arrow_down1.svg");
        } else if ($(this).hasClass("sorting_asc")) {
            icon.attr("src", "../../assets/images/img/arrow_up1.svg");
        } else {
            icon.attr("src", "../../assets/images/img/unfold_more.svg");
        }
    });
}

// Initial call on page load
jQuery(document).ready(function () {
    updateSortIcons();

    $(document).on( 'click', '.view-modal', function(){
        var id = $(this).attr('data-id');
        var data = $(this).find('.invoice_data').data('array');
        var created_by = $(this).find('.invoice_created_by').data('array');
        var service_types = $(this).find('.invoice_service_types').data('array');
        $('#view-modal .invoice-number').text(data.invoice_no);
        $('#view-modal .invoice-issue-date').text(data.create_date);
        $('#view-modal .client_file_number').val(data.client_file_number);
        $('#view-modal .client_name').val(data.client_name);
        $('#view-modal .created_by').val(created_by);
        $('#view-modal .case_number').val(data.case_number);
        $('#view-modal .contact_number').val(data.contact_number);
        $('#view-modal .invoice_title').val(data.invoice_title);
        $('#view-modal .main_total').val("$"+data.main_total);
        $('#view-modal .payment_status').val(data.payment_status);
        $('#view-modal .service_types').text(service_types);
        $('#view-modal .due_date').val(data.due_date);
        $('#view-modal .due_time').val(data.due_time);
        $('#view-modal .grand_total').text('$'+data.total);
        $('#view-modal .subtotal').text('$'+data.subtotal);
        var plainNote = $('<div>').html(data.note).text();
        $('#view-modal #comment').val(plainNote);
        var plainText = $('<div>').html(data.report).text();
        $('#view-modal #view-report').val(plainText);
    });
});

// If sorting class changes dynamically on click
$(".sortable").click(function () {
    setTimeout(updateSortIcons, 10); // Allow time for sorting class to update before checking
});


// $(document).on( 'click', '.viewing-invoice-modal', function(){
        
//     });
</script> 