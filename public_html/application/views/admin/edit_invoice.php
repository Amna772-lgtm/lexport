<?php
include('header.php');

?>

    <div class="m-grid__item m-grid__item--fluid m-wrapper">

        <!-- END: Subheader -->
        <div class="m-content">

            <div class="row">
                <div class="col-md-12">
                    <div class="alert alert-info">
                        <h3>
                        <strong>#<?php echo $case_data->invoice_no;?></strong> <?php echo $this->lang->line('Invoice_is');?> <?php echo $case_data->payment_status ?>.
                        </h3>
                    </div>
                </div>
            </div>

            <!--begin::Portlet-->
            <div class="m-portlet lp-theme-card bg-transparent">
                <div class="m-portlet__head">
                    <div class="m-portlet__head-caption">
                        <div class="m-portlet__head-title">
                            <h3 class="m-portlet__head-text">
                                <?php echo $this->lang->line('Edit_Invoice');?>
                            </h3>
                        </div>
                    </div>
                </div>
                <!--begin::Form-->
             <?php echo form_open_multipart('admin/finance/process_invoice_edit',['id'=>'inv']);?>
		<?php	  echo form_hidden('invoice_id',$case_data->invoice_id); 
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
                    <div class="m-portlet__body theme-inner-form">
                        <div class="form-group m-form__group row form-field-container">
                            <div class="col-lg-3">
                                <label><?php echo $this->lang->line('File_Number');?></label>
                                <input type="text" class="form-control m-input" value="<?php echo $case_data->client_file_number;?>" readonly placeholder="">
                            </div>
                            <div class="col-lg-3">
                                <label><?php echo $this->lang->line('Client_Name');?></label>
                                <input type="text" class="form-control m-input" value="<?php echo $case_data->client_name;?>" readonly placeholder="">
                            </div>
                            <div class="col-lg-3">
                                <label><?php echo $this->lang->line('Created_Date');?></label>
                                <div class="input-group date">
                                    <input type="text" class="form-control m-input" readonly value="<?php $timestamp = strtotime($case_data->create_date); echo  date("d-m-Y",$timestamp);  ?>" id="m_datepicker_2" />
                                    <div class="input-group-append">
                                        <span class="input-group-text"><i class="fa fa-calendar-check-o"></i></span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <label><?php echo $this->lang->line('Created_By');?></label>
                                <input type="text" class="form-control m-input" value="<?php echo getEmployeeName($case_data->created_by);?>" readonly placeholder="">
                            </div>
                            <div class="col-lg-3">
                                <label><?php echo $this->lang->line('Case_Number');?></label>
                                <input type="text" class="form-control m-input" value="<?php echo $case_data->case_number;?>" readonly placeholder="">
                            </div>
                            <div class="col-lg-3">
                                <label><?php echo $this->lang->line('Contact_Number');?></label>
                                <input type="text" class="form-control m-input" value="<?php echo $case_data->contact_number;?>" readonly placeholder="">
                            </div>
                            <div class="col-lg-3">
                                <label><?php echo $this->lang->line('Created_Time');?></label>
                                <div class="input-group date">
                                    <input type="text" class="form-control m-input" readonly value="<?php $timestamp = strtotime($case_data->create_date); echo  date("G:i",$timestamp); ?>"  id="m_datetimepicker_7" />
                                    <div class="input-group-append">
                                        <span class="input-group-text"><i class="fa fa-clock-o"></i></span>
                                    </div>
                                </div>
                            </div>


                            <div class="col-lg-6">
                            		<label for="name" class=" form-control-label"><?php echo $this->lang->line('Invoice_Title');?></label>
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
                            <div class="col-lg-3">
                               <label for="name" class=" form-control-label"><?php echo $this->lang->line('Total_Amount');?></label>
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
                            <div class="col-lg-3">
                               <label for="name" class=" form-control-label"><?php echo $this->lang->line('Financial_Payments');?> </label>
		<?php if($case_data)
		{
			$value=$case_data->financial_payments ;
		}
		else
		{
			$value=set_value('financial_payments');
		} ?>
		<select name="financial_payments"  id="" class="form-control" required>
		<option value="0" ><?php echo $this->lang->line('Select_Financial_Payments');?></option>
		<option value="1"<?php if($value=="2") echo "selected=selected";?>>1 <?php echo $this->lang->line('invoice');?></option>
		<option value="2"<?php if($value=="2") echo "selected=selected";?>>2 <?php echo $this->lang->line('invoice');?> </option>
		<option value="3"<?php if($value=="3") echo "selected=selected";?>>3 <?php echo $this->lang->line('invoice');?> </option>
		<option value="4"<?php if($value=="4") echo "selected=selected";?>>4 <?php echo $this->lang->line('invoice');?> </option>
		<option value="5"<?php if($value=="5") echo "selected=selected";?>>5 <?php echo $this->lang->line('invoice');?> </option>
		</select>	
                            </div>

                            <div class="form-group col-sm-2">
                                <label for="name" class=" form-control-label"><?php echo $this->lang->line('Status');?></label>
<?php if($case_data)
		{
			$value=$case_data->payment_status ;
		}
		else
		{
			$value=set_value('payment_status');
		} ?>
 <select name="payment_status" id="payment_status" class="form-control"> 
 <option value=""><?php echo $this->lang->line('Select_Status');?></option>
 <option value="paid" <?php if($value=="paid") echo "selected=selected";?>><?php echo $this->lang->line('Paid');?></option> 
 <option value="unpaid" <?php if($value=="unpaid") echo "selected=selected";?>><?php echo $this->lang->line('Unpaid');?></option> 
 <option value="hold" <?php if($value=="hold") echo "selected=selected";?>><?php echo $this->lang->line('Hold');?></option> 
 <option value="process" <?php if($value=="process") echo "selected=selected";?>><?php echo $this->lang->line('In_Process');?></option>
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
 <label for="invoice_no" class="form-control-label" ><?php echo $this->lang->line('Invoice_Number');?></label> 
 <input type="text" name="invoice_no" value="<?php echo $value;?>" class="form-control" readonly required> </div>
                            <div class="form-group col-sm-3">
   <?php if($case_data)
		{
			$value=$case_data->due_date ;
			            $parts = explode('/', $value);
         
            if($this->session->userdata('admin_site_lang')=="arabic" OR $this->session->userdata('admin_site_lang')=="") { 
                $value = Greg2Hijri($parts[0], $parts[1], $parts[2],true);  
            }
		}
		else
		{
			$value=set_value('due_date');


		} ?>
 <label for="due_date" class="form-control-label"><?php echo $this->lang->line('Due_Date');?></label> 
 <input type="text" name="due_date" value="<?php echo $value;?>" id="due_date" class="form-control" readonly required>
								</div>
                            <div class="form-group col-sm-3">
                               <?php if($case_data)
		{
			$value=$case_data->due_time ;
		}
		else
		{
			$value=set_value('due_time');
		} ?>
 <label for="due_time" class="form-control-label"><?php echo $this->lang->line('Due_Time');?></label> 
 <input type="text" name="due_time" id="due_time" value="<?php echo $value;?>" class="form-control" readonly required> 
                            </div>

                            <div class="col-md-12" style="margin-top: 50px;">
                                <div class="jumbotron">
                                    <div class="row">
                                        <div class="col-12">
                                            <table>
                                                <tbody>
                                                    <tr>
                                                        <td>
                                                            <b><?php echo $this->lang->line('Service_Name');?></b>
                                                            <?php echo getServiceType($case_data->service_types);?>
                                                        </td>
                                                        <td>
                                                            <b><?php echo $this->lang->line('Total');?></b>
                                                            <?php echo $case_data->subtotal; ?>
                                                        </td>
                                                        <td>
                                                            <b><?php echo $this->lang->line('VAT');?></b>
                                                            <?php echo $this->lang->line('VAT_0_5');?>
                                                        </td>
                                                        <td>
                                                            <b><?php echo $this->lang->line('Grad_Total');?></b>
                                                            <?php echo $case_data->total; ?>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <div class="col-lg-12">
                                <h3><?php echo $this->lang->line('Note');?></h3>
                            </div>
                            <div class="col-md-12">
							<div class="addnewhtml">
					<?php foreach($note_data as $cn) { ?>
					<div class="alert alert-<?php if($cn['role_id'] == 1) echo "info"; if($cn['role_id'] == 2) 	echo "warning"; if($cn['role_id'] == 4) echo "success"; ?>">
					<?php echo $cn['note']; ?> <small><i class="float-right"><?php echo getEmployeeName($cn['user_id']);?> &nbsp;<?php $timestamp = strtotime($cn['create_date']); echo  date("d M Y G:i",$timestamp);?></i></small>
					</div>
					<?php } ?> 

                    <textarea value="" rows="4" id="comment" class="form-control"></textarea>
					<span class="commenterror" style="color:red"></span>
                                <br>
                                <a href="javascript:;" class="btn btn-primary m-btn btn-cst  m-btn--custom m-btn--icon m-btn--air" id="btncmt" style="border-radius: 20px;">
                                        <span>	 
                                            <i class="fa fa-plus"></i>
                                        <span><?php echo $this->lang->line('Add_New_Note');?></span>
                                        </span>
                                </a>
										</div>
                          
                            
                            <div class="form-field-container mt-5">
                            <h3><?php echo $this->lang->line('Report');?></h3>
                            <?php if($case_data)
		{
			$value=$case_data->report;
		}
		else
		{
			$value=set_value('report');
		} ?>
<textarea name="report" id="report"><?php echo $value ?></textarea>
                            </div>
                         

                        </div>

                    </div>
                    <div class="m-portlet__foot m-portlet__no-border m-portlet__foot--fit">
                        <div class="m-form__actions m-form__actions--solid">
                            <div class="row">
                                <div class="col-lg-12">
                                  <?php 
if($this->session->userdata('role_id') == 1){ 
$submit=$this->lang->line('Submit');
$close=$this->lang->line('Close');

echo form_submit(['id'=>'addcustomer','value'=>$submit,'class'=>'btn btn-primary btn-lg']);
echo form_submit(['name'=>'close_app','value'=>$close,'class'=>'btn btn-success btn-lg']);
?>
<a href="<?php echo base_url(); ?>admin/finance/delete_invoice_single/<?php echo $case_data->id; ?>" class="btn btn-danger btn-lg pull-right" title="Edit Invoice"><?php echo $this->lang->line('Delete');?></a>
<?php

} else {
echo form_submit(['id'=>'addcustomer','value'=>'Save','class'=>'btn btn-primary btn-lg']);
}
?>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>

                <!--end::Form-->
            </div>

            <!--end::Portlet-->
        </div>
    </div>


<?php

include('footer.php');

?>
<script src="https://cdn.ckeditor.com/4.11.1/standard/ckeditor.js"></script>
	<script>
		CKEDITOR.replace( 'report' );
	</script>
<script type="text/javascript">
$(document).ready(function(){


    $('#inv').find('input[type="submit"]').prop('disabled', true);

// Monitor changes in the form
$('#inv').on('input change', 'input, select, textarea', function() {
    // Enable the submit button when any field changes
    $('#inv').find('input[type="submit"]').prop('disabled', false);
});

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