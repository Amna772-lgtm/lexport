<?php
include('header.php');
?>

<style>
  .modal .modal-dialog{
    width: 600px;
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
                                <?php echo $this->lang->line('Transaction');?>
                            </h3>
                        </div> -->
                        <div class="theme-new-nav-menu">
                        <h3 class="m-portlet__title" style="margin-right: 70px; font-size:24px !important;">
                                <?php echo $this->lang->line('Invoice');?>
                            </h3>
                            <ul style="gap:30px;">
                                <li> <a href="http://lexport.demosbywpsqr.com/admin/finance"><?php echo $this->lang->line('List');?></a> </li>
                                <li > <a href="http://lexport.demosbywpsqr.com/admin/finance/expenses_list"><?php echo $this->lang->line('Expense');?></a> </li>
                                <li class="active"> <a href="http://lexport.demosbywpsqr.com/admin/finance/transaction"><?php echo $this->lang->line('Transaction');?></a> </li>
                                <!-- <li> <a href="http://lexport.demosbywpsqr.com/admin/hr/list_hr_fine">Payment Methods</a> </li> -->
                                
                            </ul>

                            </div>
                    </div>
                </div>
                <div class="m-portlet__body">
                    <div class="m_datatable m-datatable m-datatable--default m-datatable--loaded" style="">

                    <div class="table-responsive">
                                    <table class="lp-theme-table lp-large-theme" id="m_datatable">
						<thead>
						<tr class="netTr" style="text-align:left;">
              <th class="sortable"><?php echo $this->lang->line('Serial_No');?><img class="sortIcon" src="../../assets/images/img/unfold_more.svg" height="18px"></th>
              <th class="sortable"><?php echo $this->lang->line('Case_No');?><img class="sortIcon" src="../../assets/images/img/unfold_more.svg" height="18px"></th>
              <th class="sortable"><?php echo $this->lang->line('File_No');?><img class="sortIcon" src="../../assets/images/img/unfold_more.svg" height="18px"></th>
              <th class="sortable"><?php echo $this->lang->line('Client_Name');?><img class="sortIcon" src="../../assets/images/img/unfold_more.svg" height="18px"></th>
              <th class="sortable"><?php echo $this->lang->line('Invoice_No');?><img class="sortIcon" src="../../assets/images/img/unfold_more.svg" height="18px"></th> 
              <th class="sortable"><?php echo $this->lang->line('Created_By');?><img class="sortIcon" src="../../assets/images/img/unfold_more.svg" height="18px"></th>
              <th class="sortable"><?php echo $this->lang->line('Total_Cost');?><img class="sortIcon" src="../../assets/images/img/unfold_more.svg" height="18px"></th>
              <th class="sortable"><?php echo $this->lang->line('Total_Amount');?><img class="sortIcon" src="../../assets/images/img/unfold_more.svg" height="18px"></th>
              <th class="sortable"><?php echo $this->lang->line('Payment_Method');?><img class="sortIcon" src="../../assets/images/img/unfold_more.svg" height="18px"></th>
              <th class="sortable"><?php echo $this->lang->line('Create_Date');?><img class="sortIcon" src="../../assets/images/img/unfold_more.svg" height="18px"></th>
              <th class="sortable"><?php echo $this->lang->line('Status');?><img class="sortIcon" src="../../assets/images/img/unfold_more.svg" height="18px"></th>
              <th style="text-align:left;"><?php echo $this->lang->line('ACTION');?></th>
						</tr>
						</thead>
						<tbody>

						<?php $i=0;  foreach ($invoice as $invoice){ $i++; ?>
                      <tr class="hide<?php echo $invoice['id'] ?>" style="text-align:left">
                      <?php $serial_number = sprintf("#%02d", $i); ?>
                      <td data-sort="<?= $count - 1 ?>">
                          <?php 
                              if ($invoice['is_read'] == 0) {
                                  echo "<i class='fa fa-circle' style='color: red; margin-right: 5px;'></i>";
                              }
                              echo $serial_number;
                          ?>
                      </td>

                        <td><?= $invoice['case_number'] ?></td>
                        <td><?= $invoice['client_file_number'] ?></td>
						<td><?php echo getEmployeeName($invoice['customer_id']); ?></td>
						<td><?= $invoice['invoice_no'] ?></td>
						<td><?php echo getEmployeeName($invoice['created_by']); ?></td>
						<td><?php  $vat = $invoice['main_total']/$invoice['financial_payments']; echo number_format((float)$vat, 2, '.', '');?></td>
						<td><?= $invoice['total'] ?></td>
						<td><?= $invoice['payment_method'] ?></td>
						<td><?php  $date= date("d/m/Y", strtotime($invoice['create_date'])); echo getTheDayAndDateFromDatePan($date); ?> </td>
						<td id="stus<?= $invoice['sub_invoice_id'] ?>"><?= $invoice['payment_status'] ?></td>
						<td class="action">
							<div class="flex">
              <?php if($invoice['payment_method']=="Paypal"){ ?>
							<a href="javascript:;" data-toggle="modal" id="<?= $invoice['tid'] ?>" data-target="#myModal2" class="btn btn-info pp_dd btn-sm" title="<?php echo $this->lang->line('Mission');?>">Paypal Detail</a>
							<?php } ?>
							<?php if($invoice['receipt']){ ?>
							<a  href='<?= base_url("uploads/payment/{$invoice['receipt']}"); ?>' target="_blank" class="fa fa-receipt btn btn-success btn-sm" title="<?php echo $this->lang->line('View_Receipt');?>"><?php echo $this->lang->line('View_Receipt');?></a><br> 
							<?php } ?>
							<a href="javascript:;" data-toggle="modal" id="<?= $invoice['sub_invoice_id'] ?>" data-target="#myModal" class="btn btn-info assign_type btn-sm" title="<?php echo $this->lang->line('Mission');?>"><?php echo $this->lang->line('Change_Status');?></a>
							<?php if($invoice['payment_method']=="cheque"){ ?>
							<a href="javascript:;" data-toggle="modal" id="<?= $invoice['tid'] ?>" data-target="#myModal1" class="btn btn-warning getchecque btn-sm" title="<?php echo $this->lang->line('Mission');?>"><?php echo $this->lang->line('View_Cheque_Detail');?></a>
							<?php } ?>
              </div>
		 
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
<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <svg width="17" height="17" viewBox="0 0 17 17" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path opacity="0.5" fill-rule="evenodd" clip-rule="evenodd" d="M0.39988 0.803673C0.656 0.54763 1.00333 0.403793 1.36548 0.403793C1.72763 0.403793 2.07496 0.54763 2.33108 0.803673L8.19434 6.66693L14.0576 0.803673C14.1836 0.673228 14.3343 0.56918 14.5009 0.497602C14.6676 0.426023 14.8468 0.388346 15.0281 0.38677C15.2095 0.385194 15.3893 0.419751 15.5572 0.488423C15.725 0.557095 15.8775 0.658508 16.0057 0.786744C16.134 0.91498 16.2354 1.06747 16.3041 1.23532C16.3727 1.40317 16.4073 1.58301 16.4057 1.76436C16.4041 1.94571 16.3665 2.12492 16.2949 2.29155C16.2233 2.45818 16.1192 2.60889 15.9888 2.73487L10.1255 8.59813L15.9888 14.4614C16.2376 14.719 16.3753 15.064 16.3721 15.4221C16.369 15.7802 16.2254 16.1227 15.9722 16.376C15.7189 16.6292 15.3764 16.7728 15.0183 16.7759C14.6602 16.779 14.3152 16.6414 14.0576 16.3926L8.19434 10.5293L2.33108 16.3926C2.07349 16.6414 1.7285 16.779 1.3704 16.7759C1.01229 16.7728 0.669742 16.6292 0.416517 16.376C0.163291 16.1227 0.0196542 15.7802 0.0165424 15.4221C0.0134306 15.064 0.151093 14.719 0.39988 14.4614L6.26314 8.59813L0.39988 2.73487C0.143837 2.47875 0 2.13143 0 1.76927C0 1.40712 0.143837 1.05979 0.39988 0.803673Z" fill="#1B2A39"/>
          </svg>
        </button>
      </div>
      <div class="modal-body">
        <select class="form-control" id="type" name="type">
			<option value=""><?php echo $this->lang->line('Select_Status');?></option>
			<option value="paid"><?php echo $this->lang->line('Paid');?></option> 
			<option value="unpaid"><?php echo $this->lang->line('Unpaid');?></option> 
			<option value="hold"><?php echo $this->lang->line('Hold');?></option> 
			<option value="process"><?php echo $this->lang->line('In_Process');?></option> 
        </select>
        <input type="hidden" value="" id="inv_id" name="inv_id">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" id="invclick" data-dismiss="modal"><?php echo $this->lang->line('Submit');?></button>
        <button type="button" class="btn btn-default" data-dismiss="modal"><?php echo $this->lang->line('Close');?></button>
      </div>
    </div>

  </div>
</div>
<div id="myModal1" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
	  <?php echo $this->lang->line('Cheque_Detail');?>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <div class="modal-body">
		<div id="getchqdetail"></div> 
      </div>
      <div class="modal-footer"> 
        <button type="button" class="btn btn-default" data-dismiss="modal"><?php echo $this->lang->line('Close');?></button>
      </div>
    </div>

  </div>
</div>
<div id="myModal2" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
		<h4>Paypal Payment Details</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <div class="modal-body">
		<div id="getpaypaldetail"></div> 
      </div>
      <div class="modal-footer"> 
        <button type="button" class="btn btn-default" data-dismiss="modal"><?php echo $this->lang->line('Close');?></button>
      </div>
    </div>

  </div>
</div>
<?php include "footer.php";?>
 <script type="text/javascript">
$(document).ready(function() {
	$('#msg').hide();
});

$('.getchecque').click(function(){
	var id=$(this).attr("id");
	var url="<?= base_url('admin/finance/get_cheque_detail'); ?>"; 
		 $.ajax({
				type:'ajax',
				method:'post',
				url:url,
				data:{"id" : id},
				success:function(data){
				    $('#getchqdetail').html(data);
				},
			});
	});

$('.pp_dd').click(function(){
	var id=$(this).attr("id");  
	var url="<?= base_url('admin/finance/get_paypal_detail'); ?>"; 
		 $.ajax({
				type:'ajax',
				method:'post',
				url:url,
				data:{"id" : id},
				success:function(data){
				    $('#getpaypaldetail').html(data);
				},
			});
	});

</script>
<script type="text/javascript">
$("#invclick").on("click", function() {
	var type = $('#type').val();
	var id = $('#inv_id').val();
	var url="<?= base_url('admin/finance/update_status'); ?>"; 
	$.ajax({
    type:'ajax',
    method:'post',
    url:url,
    data:{"id":id,"type":type},
    success:function(data){
         $('#msg').show();
         $('#stus'+id).html(type);
         $('#msg').html("Status Change Succesfully");
      },
  });
});
$(".assign_type").on("click", function() {
    var id=$(this).attr("id");
    $('#inv_id').val(id);
});

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
$(document).ready(function () {
    updateSortIcons();
});

// If sorting class changes dynamically on click
$(".sortable").click(function () {
    setTimeout(updateSortIcons, 10); // Allow time for sorting class to update before checking
});
</script> 