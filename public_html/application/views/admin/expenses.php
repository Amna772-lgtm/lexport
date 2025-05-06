<?php include "header.php"; ?>
<div class="breadcrumbs">
<div class="col-sm-4">
	<div class="page-header float-left">
		<div class="page-title">
			<h1>Expenses</h1>
		</div>
	</div>
</div>
<div class="col-sm-8">
	<div class="page-header float-right">
		<div class="page-title">
			<ol class="breadcrumb text-right">
	
			<li class="active">Dashboard/Expenses</li>
		
			</ol>
		</div>
	</div>
	
</div>
</div>
<div id="success" class="sufee-alert alert with-close alert-success alert-dismissible fade show success"></div>
<?php echo form_open_multipart('admin/finance/process_expenses',['id'=>'inv']);?>
<div class="col-md-12">
<div class="alert alert-warning">
<strong>#<?php echo $case_data->invoice_no;?></strong> Invoice is <?php echo $case_data->payment_status ?>.
</div>
<div class="card">
  <div class="card-header"><strong>Edit Invoice #<?php echo $case_data->invoice_no;?></strong></div>
  <div class="card-body card-block">
<?php
 echo form_hidden('invoice_id',$case_data->invoice_id); 
 echo form_hidden('id',$case_data->id); 
		$case_id = ''; 
		if($case_data)
		{
			$case_id = $case_data->id;
		} else {
			$case_id = $case_data->id;
		}
		echo form_hidden('case_id',$case_id); 
	?>
<style>
.tdhead{background-color:#421F23; color:#ffffff; margin:0px 10px 0px 0px; padding:10px 10px 10px 20px; border-radius:30px 0px 0px 30px; font-weight:bold;}
.tdbody{  background-color:#f3f3f3; color:#333333; padding:10px 10px 10px 10px; border-radius:0px 30px 30px 0px; }
</style>
<table cellpadding="0" cellspacing="0" border="0" width="1000" style="font-size:15px;">
<tr><td height="10"></td></tr>  
<tr>
	<td width="155" class="tdhead" style="">File Number</td>
	<td width="235" class="tdbody" ><?php echo $case_data->client_file_number;?></td>
	<td width="50">&nbsp;</td>
	<td width="155" class="tdhead">Case Number</td>
	<td width="235" class="tdbody" ><?php echo $case_data->case_number;?></td>
</tr>
 <tr><td height="10"></td></tr>  
<tr>
	<td width="155" class="tdhead" style="">Client Name</td>
	<td width="235" class="tdbody" ><?php echo $case_data->client_name;?></td>
	<td width="50">&nbsp;</td>
	<td width="155" class="tdhead">Contact Number</td>
	<td width="235" class="tdbody" ><?php echo $case_data->contact_number;?></td>
</tr>
 <tr><td height="10"></td></tr>  
<tr>
	<td width="155" class="tdhead" style="">Created Date</td>
	<td width="235" class="tdbody" ><?php $timestamp = strtotime($case_data->create_date); echo  date("d-m-Y",$timestamp);  ?></td>
	<td width="50">&nbsp;</td>
	<td width="155" class="tdhead">Created Time</td>
	<td width="235" class="tdbody" ><?php $timestamp = strtotime($case_data->create_date); echo  date("G:i",$timestamp); ?></td>
</tr>
 <tr><td height="10"></td></tr>  
<tr>
	<td width="155" class="tdhead" style="">Created By</td>
	<td width="235" class="tdbody" ><?php echo getEmployeeName($case_data->created_by);?></td>
	<td width="50">&nbsp;</td>
	
</tr>
</table>
</div>
<hr>
	<div class="col-md-12">
	<div class="form-group col-sm-6">
		<label for="name" class=" form-control-label">Invoice Title</label>
		<?php if($case_data)
		{
			$value=$case_data->invoice_title;
		}
		else
		{
			$value=set_value('invoice_title');
		} ?>
		<?= form_input(['id'=>'invoice_title','name'=>'invoice_title','class'=>'form-control','value'=>$value]);?>
		<?= form_error('invoice_title'); ?>
		
	</div>
	<div class="form-group col-sm-3">
		<label for="name" class=" form-control-label">Total Amount</label>
		<?php if($case_data)
		{
			$value=$case_data->main_total;
		}
		else
		{
			$value=set_value('total_amount');
		} ?>
		<?= form_input(['id'=>'total_amount','name'=>'total_amount','class'=>'form-control','value'=>$value]);?>
		<?= form_error('total_amount'); ?>
		<span id="totalerror" style="color:red"></span>
	</div>
	<div class="form-group col-sm-3">
		<label for="name" class=" form-control-label">Financial Payments </label>
		<?php if($case_data)
		{
			$value=$case_data->financial_payments ;
		}
		else
		{
			$value=set_value('financial_payments');
		} ?>
		<select name="financial_payments"  id="" class="form-control" required>
		<option value="0" >Select Financial Payments</option>
		<option value="1"<?php if($value=="2") echo "selected=selected";?>>1 invoice</option>
		<option value="2"<?php if($value=="2") echo "selected=selected";?>>2 invoice</option>
		<option value="3"<?php if($value=="3") echo "selected=selected";?>>3 invoice</option>
		<option value="4"<?php if($value=="4") echo "selected=selected";?>>4 invoice</option>
		<option value="5"<?php if($value=="5") echo "selected=selected";?>>5 invoice</option>
		</select>		
	</div>
	
</div>
<hr>
 <div class="col-md-12" id="payment_details"> 
 <div class="form-group col-sm-2"> 
 <label for="name" class=" form-control-label">Status</label>
 <?php if($case_data)
		{
			$value=$case_data->payment_status ;
		}
		else
		{
			$value=set_value('payment_status');
		} ?>
 <select name="payment_status" id="payment_status" class="form-control"> 
 <option value="">Select Status</option>
 <option value="paid" <?php if($value=="paid") echo "selected=selected";?>>Paid</option> 
 <option value="unpaid" <?php if($value=="unpaid") echo "selected=selected";?>>UnPaid</option> 
 <option value="hold" <?php if($value=="hold") echo "selected=selected";?>>Hold</option> 
 <option value="process" <?php if($value=="process") echo "selected=selected";?>>In Process</option>
 </select> 
 </div> 
 <div class="form-group col-sm-4">
 <?php if($case_data)
		{
			$value=$case_data->invoice_no ;
		}
		else
		{
			$value=set_value('invoice_no');
		} ?>
 <label for="invoice_no" class="form-control-label" >Invoice Number</label> 
 <input type="text" name="invoice_no" value="<?php echo $value;?>" class="form-control" readonly required> </div>
 <div class="form-group col-sm-3"> 
 <?php if($case_data)
		{
			$value=$case_data->due_date ;
		}
		else
		{
			$value=set_value('due_date');
		} ?>
 <label for="due_date" class="form-control-label">Due Date</label> 
 <input type="text" name="due_date" value="<?php echo $value;?>" id="due_date" class="form-control" readonly required> </div>
 <div class="form-group col-sm-3">
 <?php if($case_data)
		{
			$value=$case_data->due_time ;
		}
		else
		{
			$value=set_value('due_time');
		} ?>
 <label for="due_time" class="form-control-label">Due Time</label> 
 <input type="text" name="due_time" id="due_time" value="<?php echo $value;?>" class="form-control" readonly required> 
 </div> 
 </div>	
<hr>
<div class="col-sm-12"> 
<div class="form-group col-sm-4"> 
<label class="form-control-label"><b>Service Name</b></label> 
</div> 
<div class="form-group col-sm-2"> 
<label class="form-control-label"><b>Total</b></label> 
</div> <div class="form-group col-sm-1">
<label class="form-control-label"></label> 
</div> 
<div class="form-group col-sm-2"> 
<label class="form-control-label"><b>VAT</b></label> 
</div> <div class="form-group col-sm-1"> 
<label class="form-control-label"></label> 
</div>
<div class="form-group col-sm-2"> 
<label class="form-control-label"><b>Grad Total</b></label> 
</div> 
</div>
<div class="col-sm-12"> <div class="form-group col-sm-4"> <label class="form-control-label"><?php echo $case_data->service_types;?></label> </div> <div class="form-group col-sm-2"> <label class="form-control-label"><?php echo $case_data->subtotal; ?></label> </div> <div class="form-group col-sm-1"><label class="form-control-label">+</label> </div> <div class="form-group col-sm-2"> <label class="form-control-label">VAT 5%</label> </div> <div class="form-group col-sm-1"> <label class="form-control-label">=</label> </div> <div class="form-group col-sm-2"> <label class="form-control-label" tyle="text-align:center"><?php echo $case_data->total; ?></label> </div> </div>	

<hr>
<div class="note-section">
	<div class="form-group col-sm-12">
		<h4>Notes</h4><br>
		<div class="addnewhtml">
		<?php foreach($note_data as $cn) { ?>
		<div class="alert alert-<?php if($cn['role_id'] == 1) echo "info"; if($cn['role_id'] == 2) 	echo "warning"; if($cn['role_id'] == 4) echo "success"; ?>">
		<?php echo $cn['note']; ?> <small><i class="float-right"><?php echo getEmployeeName($cn['user_id']);?> &nbsp;<?php $timestamp = strtotime($cn['create_date']); echo  date("d M Y G:i",$timestamp);?></i></small>
		</div>
		<?php } ?>
		</div>	
		<textarea value="" rows="4" id="comment" class="form-control"></textarea>
		<span class="commenterror" style="color:red"></span>
		<br>
		<a href="javascript:;" class="btn btn-success btn-lg" id="btncmt">Add New Note</a>
	</div>	
</div>	
<div class="word-section">
	<script src="https://cdn.ckeditor.com/4.11.1/standard/ckeditor.js"></script>
<hr>
<div class="form-group col-sm-12">
<h4>Report</h4><br>
<?php if($case_data)
		{
			$value=$case_data->report;
		}
		else
		{
			$value=set_value('report');
		} ?>
<textarea name="report" id="report"><?php echo $value ?></textarea>
	<script>
		CKEDITOR.replace( 'report' );
	</script>
</div>
</div>


</div>	
<div class="card">
<div class="card-footer">
<?php 
if($this->session->userdata('role_id') == 1){ 
echo form_submit(['id'=>'addcustomer','value'=>'Submit','class'=>'btn btn-primary btn-lg']);
echo form_submit(['name'=>'close_app','value'=>'Close','class'=>'btn btn-success btn-lg']);
?>
<a href="<?php echo base_url(); ?>admin/finance/delete_invoice_single/<?php echo $case_data->id; ?>" class="btn btn-danger btn-lg pull-right" title="Edit Invoice">Delete</a>
<?php

} else {
echo form_submit(['id'=>'addcustomer','value'=>'Save','class'=>'btn btn-primary btn-lg']);
}
?>
</div>
</div>

<?php form_close(); ?>
</div>

<?php include "footer.php"; ?>

<script type="text/javascript">
$(document).ready(function(){
//by default generate html based on the default selected value.
$('#groups').empty();
$('#groups2').empty();
var number = parseInt($("#amount").val());
createHTML(number);

$('#amount').change(function(){
$('#groups').empty();    
$('#groups2').empty();    
number = parseInt($(this).val());
  if($('#total_amount').val()==''){
  $('#totalerror').html('Please Enter Amount');   
 this.selected = true;
  
  return false;
}    
createHTML(number);
createHTML2(number);
  $('#totalerror').html('');   
});
});
$("#total_amount").on("keypress", function () {
$('#amount option').prop('selected', function() {
	return this.defaultSelected;
});
});
function createHTML(number){
var group = '';
for(var i=1;i<=number;i++){
var min=1000000000; 
var max=9999999999;  
var random =Math.floor(Math.random() * (+max - +min)) + +min; 
var total = parseInt($('#total_amount').val());
totaldiv = total/number;
group += '<div class="col-md-12" id="payment_details"> <div class="form-group col-sm-2"> <label for="name" class=" form-control-label">Status</label><select name="payment_status[]" id="payment_status" class="form-control"> <option value="paid">Paid</option> <option value="unpaid">UnPaid</option> <option value="hold">Hold</option> <option value="process">In Process</option> </select> </div> <div class="form-group col-sm-4"> <label for="invoice_no" class="form-control-label">Invoice Number</label> <input type="text" name="invoice_no[]" value="IN'+random+'" class="form-control" readonly required> </div> <div class="form-group col-sm-3"> <label for="due_date" class="form-control-label">Due Date</label> <input type="text" name="due_date[]" value=""id="due_date" class="form-control" readonly required> </div> <div class="form-group col-sm-3"> <label for="due_time" class="form-control-label">Due Time</label> <input type="text" name="due_time[]" id="due_time" class="form-control" readonly required> </div> </div>';
}
$('#groups').append(group);
$( "input[name^=due_date]" ).trigger( "click" );

}

function createHTML2(number){
var group2 = '';
for(var i=1;i<=number;i++){
var min=1000000000; 
var max=9999999999;  
var random =Math.floor(Math.random() * (+max - +min)) + +min; 
var total = parseFloat($('#total_amount').val());
total = (total / number).toFixed(2);
var grandtotal1 = total * 5 / 100;
grandtotal = parseFloat(total) + parseFloat(grandtotal1);
//grandtotal = (grandtotal).toFixed(2);
group2 += '<div class="col-sm-12"> <div class="form-group col-sm-4"> <label class="form-control-label"><?php echo getServiceName($case_data->service_types);?></label> </div> <div class="form-group col-sm-2"> <label class="form-control-label">'+total+'</label> </div> <div class="form-group col-sm-1"><label class="form-control-label">+</label> </div> <div class="form-group col-sm-2"> <label class="form-control-label">VAT 5%</label> </div> <div class="form-group col-sm-1"> <label class="form-control-label">=</label> </div> <div class="form-group col-sm-2"> <label class="form-control-label" tyle="text-align:center">'+grandtotal.toFixed(2)+'</label> </div> </div>';
}
$('#groups2').append(group2);


}


jQuery('#btncmt').on('click', function (e) {
var note = $("#comment").val();
if(note == ''){
$('.commenterror').html("Comment field is empty");
return false;
}
var case_id = <?php echo $case_data->id; ?>; 
var url="<?= base_url('admin/assignment/add_note'); ?>"; 
jQuery.ajax({
type:'ajax',
method:'post',
url:url,
data: {'note':note,'case_id':case_id,'type':'invoice' },
success:function(data){
$('.commenterror').html("");
$('.addnewhtml').append(data);
$('#comment').val('');
},
});
});

$(document).ready(function()
{
$('#success').hide();
});


$("#groups").on("click", function() {

$("input[name^=due_date]").datetimepicker({  format: 'yyyy-mm-dd',  minView: 2, pickTime: false, autoclose: true,startDate: new Date()});
});
$("#groups").on("click", function() {
$("input[name^=due_time]" ).datetimepicker({
pickDate: false,
minuteStep: 15,
pickerPosition: 'bottom-right',
format: 'HH:ii p',
autoclose: true,
showMeridian: true,
startView: 1,
maxView: 1,
});
});  
</script>