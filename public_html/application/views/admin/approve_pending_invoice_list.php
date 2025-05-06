<?php
include('header.php');

?>
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
                <div class="m-portlet__head">
                    <div class="m-portlet__head-caption">
                        <div class="m-portlet__head-title">
                            <h3 class="m-portlet__head-text">
                                <?php echo $this->lang->line('Financial');?>
                            </h3>
                        </div>
                        <div class="theme-new-nav-menu">
                            <a class="back-link" href="#">
<svg width="16" height="14" viewBox="0 0 16 14" fill="none" xmlns="http://www.w3.org/2000/svg">
<path fill-rule="evenodd" clip-rule="evenodd" d="M7.70679 13.7006C7.51926 13.888 7.26495 13.9934 6.99979 13.9934C6.73462 13.9934 6.48031 13.888 6.29279 13.7006L0.292786 7.70057C0.105315 7.51304 0 7.25874 0 6.99357C0 6.72841 0.105315 6.4741 0.292786 6.28657L6.29279 0.286571C6.48139 0.104413 6.73399 0.00361876 6.99619 0.00589718C7.25838 0.0081756 7.5092 0.113345 7.6946 0.298753C7.88001 0.484161 7.98518 0.734973 7.98746 0.99717C7.98974 1.25937 7.88894 1.51197 7.70679 1.70057L3.41379 5.99357H14.9998C15.265 5.99357 15.5194 6.09893 15.7069 6.28646C15.8944 6.474 15.9998 6.72835 15.9998 6.99357C15.9998 7.25879 15.8944 7.51314 15.7069 7.70068C15.5194 7.88821 15.265 7.99357 14.9998 7.99357H3.41379L7.70679 12.2866C7.89426 12.4741 7.99957 12.7284 7.99957 12.9936C7.99957 13.2587 7.89426 13.513 7.70679 13.7006Z" fill="#333333"/>
</svg>
 Back</a>
                            <ul>
                                <li> <a href="http://lexport.demosbywpsqr.com/admin/employee/list_employee">HR</a> </li>
                                <li> <a href="http://lexport.demosbywpsqr.com/admin/hr/list_hr_eservice">HR E-Services</a> </li>
                                <li> <a href="http://lexport.demosbywpsqr.com/admin/hr/list_hr_fine">Fine</a> </li>
                                <li class="active"> <a href="http://lexport.demosbywpsqr.com/admin/finance">Financial</a> </li>
                                <li> <a href="http://lexport.demosbywpsqr.com/admin/finance/transaction">Transaction</a> </li>
                            </ul>
                        </div>
                    </div>
                </div>
				<?php echo $this->session->flashdata('showMsg'); ?>
                <div class="m-portlet__body">
                    <!-- Sec tabs --->
                    <ul class="nav nav-tabs" role="tablist">
                       <li class="nav-item">
                            <a class="nav-link" data-toggle="" href="<?php echo base_url('admin/finance'); ?>" data-target="#m_tabs_1_1"><?php echo $this->lang->line('List');?></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="" href="<?php echo base_url('admin/finance/expenses_list'); ?>" data-target="#m_tabs_1_2"><?php echo $this->lang->line('Expense_List');?></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" href="<?php echo base_url('admin/finance/approve_pending_invoice_list'); ?>" data-target=" "><?php echo $this->lang->line('Pending_Invoice');?></a>
                        </li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane active" id="m_tabs_1_1" role="tabpanel">
                            <div class="">
 
                                <div class="m_datatable m-datatable m-datatable--default m-datatable--loaded" style="">

                                <div class="table-responsive">
                                    <table class="lp-theme-table lp-large-theme" id="m_datatable">
                                            <thead>
                                            <tr class="netTr">

                                                <th><?php echo $this->lang->line('SR_NO');?> <br><i class="fa fa-arrow-up" style="font-size: 10px;font-weight: normal"></i><i class="fa fa-arrow-down" style="font-size: 10px;font-weight: normal"></i></th>
                                                <th><?php echo $this->lang->line('Case_No');?> <br><i class="fa fa-arrow-up" style="font-size: 10px;font-weight: normal"></i><i class="fa fa-arrow-down" style="font-size: 10px;font-weight: normal"></i></th>
                                                <th><?php echo $this->lang->line('File_No');?> <br><i class="fa fa-arrow-up" style="font-size: 10px;font-weight: normal"></i><i class="fa fa-arrow-down" style="font-size: 10px;font-weight: normal"></i></th>
                                                <th><?php echo $this->lang->line('Client_Name');?> <br><i class="fa fa-arrow-up" style="font-size: 10px;font-weight: normal"></i><i class="fa fa-arrow-down" style="font-size: 10px;font-weight: normal"></i></th>
                                                <th><?php echo $this->lang->line('Phone');?> <br><i class="fa fa-arrow-up" style="font-size: 10px;font-weight: normal"></i><i class="fa fa-arrow-down" style="font-size: 10px;font-weight: normal"></i></th>
                                                  <th>Main <?php echo $this->lang->line('Invoice_No');?> <br><i class="fa fa-arrow-up" style="font-size: 10px;font-weight: normal"></i><i class="fa fa-arrow-down" style="font-size: 10px;font-weight: normal"></i></th>
                                                <th><?php echo $this->lang->line('Invoice_No');?> <br><i class="fa fa-arrow-up" style="font-size: 10px;font-weight: normal"></i><i class="fa fa-arrow-down" style="font-size: 10px;font-weight: normal"></i></th>
                                                <th><?php echo $this->lang->line('Created_Date');?> <br><i class="fa fa-arrow-up" style="font-size: 10px;font-weight: normal"></i><i class="fa fa-arrow-down" style="font-size: 10px;font-weight: normal"></i></th>
                                                <th><?php echo $this->lang->line('Created_Time');?> <br><i class="fa fa-arrow-up" style="font-size: 10px;font-weight: normal"></i><i class="fa fa-arrow-down" style="font-size: 10px;font-weight: normal"></i></th>
                                                <th><?php echo $this->lang->line('Due_Date');?> <br><i class="fa fa-arrow-up" style="font-size: 10px;font-weight: normal"></i><i class="fa fa-arrow-down" style="font-size: 10px;font-weight: normal"></i></th>
                                                <th><?php echo $this->lang->line('Due_Time');?> <br><i class="fa fa-arrow-up" style="font-size: 10px;font-weight: normal"></i><i class="fa fa-arrow-down" style="font-size: 10px;font-weight: normal"></i></th>
                                                <th><?php echo $this->lang->line('Created_By');?> <br><i class="fa fa-arrow-up" style="font-size: 10px;font-weight: normal"></i><i class="fa fa-arrow-down" style="font-size: 10px;font-weight: normal"></i></th>
                                                <th><?php echo $this->lang->line('Invoice_Title');?> <br><i class="fa fa-arrow-up" style="font-size: 10px;font-weight: normal"></i><i class="fa fa-arrow-down" style="font-size: 10px;font-weight: normal"></i></th>
                                                <th><?php echo $this->lang->line('Total_Cost');?> <br><i class="fa fa-arrow-up" style="font-size: 10px;font-weight: normal"></i><i class="fa fa-arrow-down" style="font-size: 10px;font-weight: normal"></i></th>
                                                <th><?php echo $this->lang->line('VAT_0_5');?> <br><i class="fa fa-arrow-up" style="font-size: 10px;font-weight: normal"></i><i class="fa fa-arrow-down" style="font-size: 10px;font-weight: normal"></i></th>
                                                <th><?php echo $this->lang->line('Total_Amount');?> <br><i class="fa fa-arrow-up" style="font-size: 10px;font-weight: normal"></i><i class="fa fa-arrow-down" style="font-size: 10px;font-weight: normal"></i></th>
                                                <th><?php echo $this->lang->line('Status');?> <br><i class="fa fa-arrow-up" style="font-size: 10px;font-weight: normal"></i><i class="fa fa-arrow-down" style="font-size: 10px;font-weight: normal"></i></th>
                                                
                                                <th><?php echo $this->lang->line('ACTION');?></th>

                                            </tr>
                                            </thead>
                                            <tbody>
						 <?php $i=0; foreach ($invoice as $invoice){ $i++; ?>
                      <tr class="hide<?php echo $invoice['id'] ?>">
                        <td><?= $i; ?></td>
                        <td><?= $invoice['case_number'] ?></td>
                        <td><?= $invoice['client_file_number'] ?></td>
                        <td><?= $invoice['client_name'] ?></td>
             <td><?= getCustomerMobile($invoice['customers_id']) ?></td>
                             <td><?= $invoice['main_invoice_no'] ?></td>
						<td><?= $invoice['invoice_no'] ?></td>
                    	<td><?php $timestamp = strtotime($invoice['create_date']); echo  getTheDayAndDateFromDatePan(date("d/m/Y",$timestamp));?></td>
						<td><?php $timestamp = strtotime($invoice['create_date']); echo  date("h:i a",$timestamp);?></td>
                        <td><?= $invoice['due_date'] ?></td>
                        <td><?= $invoice['due_time'] ?></td>
                        <td><?php echo getEmployeeName($invoice['created_by']); ?></td>
						<td><?= $invoice['invoice_title'] ?></td>
						<td><?php  $vat = $invoice['main_total']/$invoice['financial_payments']; echo number_format((float)$vat, 2, '.', '');?></td>
						<td><?php $assd=  ($vat * 5) / 100;  echo number_format((float)$assd, 2, '.', '');?></td>
						<td><?= $invoice['total'] ?></td>
						<td><?= $invoice['payment_status'] ?></td>
				
						<td class="action">
						    		<?php if($invoice['is_reject'] == 1) { ?>
						    			<span class="m-badge  m-badge--danger m-badge--wide"><?php echo $this->lang->line('Reject');?></span>
							
						    		<?php } else { ?>
						<a  href='<?= base_url("admin/finance/edit_invoice/{$invoice['id']}"); ?>' class="fa fa-edit" title="Edit Invoice"></a>
					<?php if($invoice['created_by'] == $this->session->userdata('admin_id') || $this->session->userdata('role_id') == 1){  ?>
					<a href=<?= base_url("admin/finance/approve_pending_invoice/{$invoice['id']}") ?>  title="Approve " class="fa fa-check-circle"></a>  
			
					<a href=<?= base_url("admin/finance/reject_pending_invoice/{$invoice['id']}") ?>  title="Reject " class="fa fa-ban"></a> 
					<?php } } ?>
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

<?php

include('footer.php');

?> <script type="text/javascript">
$(document).ready(function() {
	$('#msg').hide();
});
</script>
<script type="text/javascript">

<?php if(isset($datas[2][3]) && $datas[2][3] == 1){?>
  $('.dataTables_filter').show();
<?php }else{?>
  $('.dataTables_filter').hide();
<?php } ?>
$("#m_datatable").on("click", ".delete_case", function() {
var id=$(this).attr("id");
var url="<?= base_url('admin/finance/delete_invoice'); ?>"; 
bootbox.confirm("Are you sure?", function(result){
if(result){
    $.ajax({
    type:'ajax',
    method:'post',
    url:url,
    data:{"id" : id},
    success:function(data){
       $('#msg').show();
         $('#msg').html(data);
      },
  });
$('.hide'+id).hide(200);
return true;
}
else
{
$('#msg').show();
	$('#msg').html('delete failed');
}
})
});
$('#clientsel').on('change', function() {
var url="<?= base_url('admin/archive/select_case'); ?>"; 
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

$(document).ready(function() {
    var table = $('#m_datatable').DataTable();

    // Move the search bar (filter input)
    var searchInput = $('.dataTables_filter');
    searchInput.detach().prependTo('#custom-search-container');

    // Add placeholder to the search input field
    $('.dataTables_filter input').attr('placeholder', 'Search Client, E-Services........');
});
</script> 