 <?php include "header.php";?>
        <div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>Finance List</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                           <li class="active">Dashboard/Finance List</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

   	<div class="col-xl-12">   
	<?php echo $this->session->flashdata('showMsg'); ?>
      <div id="msg" class="sufee-alert alert with-close alert-success alert-dismissible fade show success"></div>
			<div class="card">
				<div class="card-header">
				<div class="col-xl-2">
				<strong class="card-title">Finance List</strong></div><?php echo form_open("admin/finance",['id'=>'archive']); ?><div class="col-xl-3"><select id="clientsel" class="form-control" name="clients">
		    	<option>Select Client</option>
				<?php 
				$c  = isset($_POST['clients'])?$_POST['clients']:'';  
				$t  = isset($_POST['cases'])?$_POST['cases']:'';  
				foreach ($get_per_clients as $get_per_clients) {?>
		    	<option value="<?php echo $get_per_clients['id']?>" <?php if($c==$get_per_clients['id']) echo "selected=selected";?>><?php echo $get_per_clients['name']?></option>
				<?php }?>
				</select></div><div class="col-xl-3"><select class="form-control" id="casesel" name="cases">
		    	<option value="">Select Case</option>
				<?php  foreach ($get_per_case as $get_per_case) {?>
				<option value="<?php echo $get_per_case['id']?>" <?php if($t==$get_per_case['id']) echo "selected=selected";?>><?php echo $get_per_case['case_title']?></option>
				<?php }?>	    
				</select> </div> 
				<div class="col-xl-2"><?php echo form_submit(['id'=>'addcustomer','value'=>'Find','class'=>'btn btn-primary ']); ?><a href="" class="btn btn-danger"  >Reset</a></div></form>
				<a href="<?php echo base_url('admin/finance/pending_invoice_list'); ?>" class="pull-right btn btn-info">Create Invoice</a>
				
				</div>
				<div class="card-body">
                  <table id="m_datatable" class="table table-striped table-bordered tablecase">
                    <thead>
                      <tr>
                        <th>Sr. No.</th>
						<th>Case No.</th>
						<th>File No.</th>
						<th>Client Name</th>
						<th>Phone</th>
						<th>Case Name</th>
                        <th>Invoice No.</th>
                        <th>Created Date</th>
                        <th>Created Time</th>
						<th>Due Date</th>
                        <th>Due Time</th>
                        <th>Created By</th>
                        <th>Invoice Title</th>
                        <th>Total Cost</th>
                        <th>Vat 5%</th>
                        <th>Total Amount</th>
						<th>Status</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                  <?php $i=0; foreach ($invoice as $invoice){ $i++; ?>
                      <tr class="hide<?php echo $invoice['id'] ?>">
                        <td><?= $i; ?></td>
                        <td><?= $invoice['case_number'] ?></td>
                        <td><?= $invoice['client_file_number'] ?></td>
                        <td><?= $invoice['client_name'] ?></td>
                        <td><?= $invoice['contact_number'] ?></td>
                        <td><?= $invoice['case_title'] ?></td>
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
						<td><?= $invoice['payment_status'] ?></td>
						<td class="action">
						<a  href='<?= base_url("admin/finance/edit_invoice/{$invoice['id']}"); ?>' class="btn btn-primary" title="Edit Invoice">Edit</a>
						<a  href='<?= base_url("admin/finance/generate_invoice/{$invoice['id']}"); ?>' class="btn btn-info" title="Generate Invoice">Generate Invoice</a>
						<a href="javascript:;" id="<?= $invoice['id'] ?>" class="btn btn-danger delete_case" title="Delete Invoice">Delete</a>
					</td>

                </tr> 
                <?php } ?>
                </tbody>
                </table>
				</div>
				</div>
            </div>

<?php include "footer.php";?>
 <script type="text/javascript">
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
</script> 