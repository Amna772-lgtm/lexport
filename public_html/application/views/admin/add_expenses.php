<?php
include('header.php');

?>

    <div class="m-grid__item m-grid__item--fluid m-wrapper">

        <!-- END: Subheader -->
        <div class="m-content">

            <!--begin::Portlet-->
            <div class="m-portlet lp-theme-card bg-transparent">
                <div class="m-portlet__head">
                    <div class="m-portlet__head-caption">
                        <div class="m-portlet__head-title">
                            <h3 class="m-portlet__head-text">
                            <?php  if($case_data){ ?>
				 <?php echo $this->lang->line('Edit_Expenses');?> 
			<?php	} else { ?>
				 <?php echo $this->lang->line('Add_Expenses');?> 
		<?php } ?>
                            </h3>
                        </div>
                    </div>
                </div>

                <!--begin::Form-->
  <?php echo form_open_multipart('admin/finance/process_expenses',['id'=>'inv']);?>
  <?php

		$case_id = ''; 
		if($case_data)
		{
			$case_id = $case_data->id;
			echo form_hidden('exp_id',$case_data->id); 
			$doc_id = $case_data->doc_id; 
		} else {
			$doc_id = "EX".rand();
			echo form_hidden('doc_id',$doc_id); 
		}
	?>
                    <div class="m-portlet__body theme-inner-form">
                    <div class="form-field-container row">
                            <div class="col-md-6">
                                <label><?php echo $this->lang->line('Select_Client');?></label>
                                
                                	<input type="hidden" name="clients" value="<?php echo $eid; ?>" class="form-control" readonly>
                                    <input type="text"  value="<?php echo getEmployeeName($eid); ?>" class="form-control" readonly>

                              <!-- <select id="clientsel" class="form-control" name="clients">
<option><?php echo $this->lang->line('Select_Client');?></option>
<?php 
$c  = isset($case_data->customer_id)?$case_data->customer_id:'';  
$t  = isset($case_data->case_id)?$case_data->case_id:'';  
foreach ($get_per_clients as $get_per_clients) {?>
<option value="<?php echo $get_per_clients['id']?>" <?php if($c==$get_per_clients['id']) echo "selected=selected";?>><?php echo $get_per_clients['name']?></option>
<?php }?>
</select>-->
                     
                            </div>
                            <div class="col-md-6">
                                <label><?php echo $this->lang->line('Select_E_Service');?></label>
                                           	<input type="hidden" name="cases" value="<?php echo $cid; ?>" class="form-control" readonly>
                                    <input type="text"  value="<?php echo getCaseNumber($cid); ?>" class="form-control" readonly>
                                <!--<select class="form-control" id="casesel" name="cases">
								<option value=""><?php echo $this->lang->line('Select_E_Service');?></option>
								<?php  foreach ($get_per_case as $get_per_case) {?>
								<option value="<?php echo $get_per_case['id']?>" <?php if($t==$get_per_case['id']) echo "selected=selected";?>><?php echo $get_per_case['case_number']?></option>
								<?php }?>	    
								</select> -->
							</div>

<div  class="col-md-12" id="getwexp"> 
<?php 
	if($case_data){
	foreach($expense_details as $expense_detail) { 
	 echo form_hidden('expense_id[]',$expense_detail['id']); 
	?>
		<div  id="exppencess_details" class="hide<?php echo $expense_detail['id'] ?> form-group m-form__group row"> 
			<div class="form-group col-sm-4">
				<label for="expenses_title" class="form-control-label" ><?php echo $this->lang->line('Expenses_Title');?></label> 
				<input type="text" name="expenses_title[]" value="<?php echo $expense_detail['expenses_title']; ?>" class="form-control">
			</div>
			<div class="form-group col-sm-3">
				<label for="expenses_amount" class="form-control-label" ><?php echo $this->lang->line('Expenses_Amount');?></label> 
				<input type="text" name="expenses_amount[]" value="<?php echo $expense_detail['expenses_amount']; ?>" class="form-control">
			</div>
			 <div class="form-group col-sm-3"> 
				<label for="expenses_date" class="form-control-label"><?php echo $this->lang->line('Expenses_Date');?></label> 
				<input type="text" name="expenses_date[]" value="<?php echo $expense_detail['expenses_date']; ?>" id="expenses_date" class="form-control" readonly> 
			</div>
			<div style="" class="form-group col-sm-2"> 
				<label for="" class="form-control-label" style="width:100%">&nbsp;</label> 
				<a  class="btn btn-danger pull-right delete_case" href="jaascript:;" id="<?= $expense_detail['id'] ?>" ><i class="fa fa-trash-o"></i> <?php echo $this->lang->line('Delete');?></a>
			</div>
		</div>	
	<?php }
	}
	?>

<div  id="exppencess_details" class="form-group m-form__group row"> 
	<div class="form-group col-sm-4">
		<label for="expenses_title" class="form-control-label" ><?php echo $this->lang->line('Expenses_Title');?></label> 
		<input type="text" name="expenses_title[]" value="" class="form-control" required>
	</div>
	<div class="form-group col-sm-3">
		<label for="expenses_amount" class="form-control-label" ><?php echo $this->lang->line('Expenses_Amount');?></label> 
		<input type="text" name="expenses_amount[]" value="" class="form-control" required>
	</div>
	 <div class="form-group col-sm-3"> 
		<label for="expenses_date" class="form-control-label"><?php echo $this->lang->line('Expenses_Date');?></label> 
		<input type="text" name="expenses_date[]" value="" id="expenses_date" class="form-control" readonly required> 
	</div>
	<div style="display:none;" class="form-group col-sm-2 remove_btn"> 
	 	<label for="" class="form-control-label" style="width:100%">&nbsp;</label> 
		<a  class="btn btn-danger pull-right" href="jaascript:;" ><i class="fa fa-trash-o"></i> <?php echo $this->lang->line('Delete');?></a>
	</div>
</div>	
<div id="clone_here"> </div>	
<div class="form-group col-sm-2" style=" float: right; margin-top: -90px; "> 
	<label for="" class="form-control-label" style="width:100%">&nbsp;</label> 
	<a href="jaascript:;" id="add_expenses" class="btn btn-success pull-right" title="Add Expenses"><i class="fa fa-plus"></i> <?php echo $this->lang->line('Add');?></a>
</div>
</div>	
                            <div class="col-lg-12" style="margin-top: 30px">
                                <h3><?php echo $this->lang->line('Note');?></h3>
                            </div>
                            <div class="col-lg-12" style="margin-top: 30px">
                                <div class="addnewhtml">
								<?php foreach($note_data as $cn) { ?>
								<div class="alert alert-<?php if($cn['role_id'] == 1) echo "info"; if($cn['role_id'] == 2) 	echo "warning"; if($cn['role_id'] == 4) echo "success"; ?>">
								<?php echo $cn['note']; ?> <small><i class="float-right"><?php echo getEmployeeName($cn['user_id']);?> &nbsp;<?php $timestamp = strtotime($cn['create_date']); echo  date("d M Y G:i",$timestamp);?></i></small>
								</div>
								<?php } ?>
								</div>	
								<textarea value="" rows="4" id="comment" class="form-control"></textarea>
                                <br>
                                <a href="javascript:;" id="btncmt" class="btn btn-primary m-btn btn-cst  m-btn--custom m-btn--icon m-btn--air" style="border-radius: 20px;">
                                        <span>
                                            <i class="fa fa-plus"></i>
                                        <span><?php echo $this->lang->line('Add_New_Note');?></span>
                                        </span>
                                </a>
                            </div>

                            <div class="col-lg-12 mt-4">
                                <h3><?php echo $this->lang->line('Expenses_File_Upload');?></h3>
                                <div class="form-field-container">
							<div class="attced-block case-block">
								<div class="upload-block flex">
									<div id="image"></div>
                                    <div class="upload-area"></div>
								</div>
								</div>
								 
                            </div>
                            </div>
                            
										<div class="col-lg-12 col-md-12 col-sm-12">

                                        <div class="m-portlet m-portlet--tab">
                                            <div class="m-portlet__head2"><?php echo $this->lang->line('File_List');?></div>
                                            <div class="m_bo">
 
                                            <?php if($case_data){
												 	$cisd = $case_data->case_id;
													$files = $this->db->select('*')->where("(temp_app_id = '$doc_id' AND type='expense' )", NULL, FALSE)->get('document')->result_array(); 
													foreach ($files as $files) { ?>
													  <div class="row" style="margin-bottom: 10px">
                                                    <div class="col-md-8"><?php
													echo "<b>" . $files['name']."</b>";echo "<span class='empnm'>(Upoded By ".getEmployeeName($case_data->created_by).")</span>"; ?></div>
                                                    <div class="col-md-4" style="text-align: right">
                                                     	<a href="<?=base_url('uploads/case_file/' . $files["name"]);?>" class='btn btn-success btn-sm' download><?php echo $this->lang->line('Download');?></a> 
                                                    </div>
                                                </div>
													<?php } }?>
                                            </div>
                                        </div>

                                    </div>
                          
                            <div class="col-lg-12">
                            <div class="form-field-container">
                            <h3><?php echo $this->lang->line('Report');?></h3>
                                <?php if($case_data)
		{
			$value=$case_data->report;
		}
		else
		{
			$value=set_value('report');
		} ?>
			<script src="https://cdn.ckeditor.com/4.11.1/standard/ckeditor.js"></script>
<textarea name="report" id="report"><?php echo $value ?></textarea>
	<script>
		CKEDITOR.replace( 'report' );
	</script></div>
                            </div>

                        </div>
                        <?php 
									$submit=$this->lang->line('Submit');
									$close=$this->lang->line('Close');
									
										if($this->session->userdata('role_id') == 1){ 
										echo form_submit(['id'=>'addcustomer','value'=>$submit,'class'=>'btn btn-primary btn-lg']);
										echo form_submit(['name'=>'close_app','value'=>$close,'class'=>'btn btn-success btn-lg']);
										if($case_data){
										?>
										<a href="<?php echo base_url(); ?>admin/finance/delete_expenses/<?php echo $case_data->id; ?>" class="btn btn-danger btn-lg pull-right" title="Edit Invoice"><?php echo $this->lang->line('Delete');?></a>
										<?php
										}
										} else {
										echo form_submit(['id'=>'addcustomer','value'=>'Save','class'=>'btn btn-primary btn-lg']);
										}
										?>
                    </div>
                   
                </form>

                <!--end::Form-->
            </div>

            <!--end::Portlet-->
        </div>
    </div>

	<style>
		.button{
		display: inline-block;
		vertical-align: middle;
		margin: 0px 5px;
		padding: 5px 12px;
		cursor: pointer;
		outline: none;
		font-size: 13px;
		text-decoration: none !important;
		text-align: center;
		color:#fff;
		background-color: #4D90FE;
		background-image: linear-gradient(top,#4D90FE, #4787ED);
		background-image: -ms-linear-gradient(top,#4D90FE, #4787ED);
		background-image: -o-linear-gradient(top,#4D90FE, #4787ED);
		background-image: linear-gradient(top,#4D90FE, #4787ED);
		border: 1px solid #4787ED;
		box-shadow: 0 1px 3px #BFBFBF;
		}
		a.button{
		color: #fff;
		}
		.button:hover{
		box-shadow: inset 0px 1px 1px #8C8C8C;
		}
		.button.disabled{
		box-shadow:none;
		opacity:0.7;
		}
		canvas{
		display: block;
		}div#getwexp {
    margin-top: 20px;
}
.form-control:disabled, .form-control[readonly] {
    background-color: #f1f1f1;
    opacity: 1;
}
.att-docs {
    height: 100px;
}
.datafiles .fa {
    font-size: 80px;
}
.col-md-2.att-doc {
    text-align: center;
}


.ajax-file-upload-container {
    float: left !important;
}
div#image {
    float: left !important;
}
.ajax-upload-dragdrop {
    height: 300px !important;
    padding-top: 200px !important;
    text-align: center !important;
}
div.upload-block:before {
    content: "\f093 ";
    font-family: FontAwesome;
    font-size: 100px;
    position: absolute;
    text-align: center;
    left: 21%;
    color: #c5c5c5;
	top: 27%;
}
.ajax-file-upload-container {
    border: 1px solid rgba(66, 31, 35, 0.47);
    margin-left: 15px !important;
    margin-top: 0 !important;
    height: 300px !important;
    width: 44%;
}
.drage-file {
    margin-top: -85px;
    color: #524a4a !important;
    font-size: 20px !important;
}
.ajax-file-upload-statusbar {
    border: 0 !important;
}
.ajax-file-upload-bar {
    background-color: #546eb2 !important;
}
.ajax-file-upload-progress {

    width: 260px !important;
}
.ajax-file-upload-container {
    overflow-y: scroll;
}
.ajax-file-upload-container:before {
    content: "Upload Area";
    background: #546eb2;
    text-align: left;
    color: #fff;
    position: absolute;
    width: 42.4%;
    padding: 10px;
    margin-top: 0px !important;
    font-size: 16px;
}
.ajax-file-upload-statusbar:first-child {
    margin-top: 50px;
}
.next-btn {
    clear: both;
    float: right;
}
.next-btn .btn {
    margin-bottom: 25px;
    padding: 12px 50px;
    border-radius: 2px;
}
.ajax-file-upload {
    padding: 20px !important;
    line-height: 0 !important;
}
.casedata-block {
    overflow: hidden;
    background: rgba(234, 234, 234, 0.7019607843137254);
    padding: 20px;
    margin-top: 30px;
    border-top: 5px solid #546eb2;
    margin-bottom: 30px;
}
.right-panel .breadcrumbs {
    display: flex !important;
    margin-bottom: 15px;
}
.docloopa {
    padding: 13px 0;
    margin: 0;
    border-bottom: 1px solid #b1acac;
}
.docloopa .btn {
    float: right;
    margin: 3px;
    margin-bottom: 0;
    padding: 1px 10px;
}span.empnm {
    color: #5cb85c;
    margin-left: 5px;    font-size: 12px;
}
.clear {
    clear: both;
}.page-loader.bg-white { display: none; }
</style>
<?php

include('footer.php');
?>
<link href=<?php echo base_url('assets/css/uploadfile.css'); ?> rel="stylesheet">
<script src=<?php echo base_url('assets/js/jquery.uploadfile.min.js'); ?>></script>
<script type="text/javascript">
$("#getwexp").on("click", ".delete_case", function() {
var id=$(this).attr("id");
var url="<?= base_url('admin/finance/delete_expenses_details'); ?>"; 
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
$('.hide'+id).remove();
return true;
}
else
{
$('#msg').show();
	$('#msg').html('delete failed');
}
})
});
 var customer_id = $('#clientsel :selected').val();
$("#image").uploadFile({
url:"<?=base_url('admin/c_case/admin_modify_upload_file');?>",
fileName:"image",
dragDropStr: "<div class='drage-file'><b>Drag the files here</div>",
abortStr:"Cancel",
statusBarWidth:300,
formData: {"fid":'<?php echo $doc_id; ?>',"cat_id":9,"type":"expense","customer_id":customer_id},
dragdropWidth:420,
uploadStr:"Or click here to view the files",
allowedTypes:"jpg,jpeg,png,gif,ico,mp3,m4a,ogg,wav,psd,xls,xlsx,odt,ppt,pptx,pps,ppsx,doc,docx,pdf",
});



$('#casesel').on('change', function() {
var case_id = $('#casesel :selected').val();
var url="<?= base_url('admin/finance/find_case'); ?>"; 
$.ajax({
  type:'ajax',
  method:'post',
  url:url,
  data:{"case_id" : case_id},
  success:function(data){
	var obj = jQuery.parseJSON(data);
	$('.fileno').html(obj.client_file_number);
	$('.caseno').html(obj.case_number);
	$('.clientname').html(obj.client_name);
	$('.connumber').html(obj.contact_number);
  },
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
jQuery('#btncmt').on('click', function (e) {
var note = $("#comment").val();
	<?php if($case_id){
		?>
		var case_id = <?php echo $case_data->case_id; ?>;
		<?php 

	} else  { ?>
var case_id = <?php echo $this->uri->segment(4); ?>;
	<?php } ?>
if(note == ''){
$('.commenterror').html("Comment field is empty");
return false;
}
var url="<?= base_url('admin/assignment/add_note'); ?>"; 
jQuery.ajax({
type:'ajax',
method:'post',
url:url,
data: {'note':note,'case_id':case_id,'type':'expense' },
success:function(data){
$('.commenterror').html("");
$('.addnewhtml').append(data);
$('#comment').val('');
},
});
});
$("#getwexp").on("click", function() {
$("input[name^=expenses_date]").calendarsPicker({
  calendar: $.calendars.instance('<?php if($this->session->userdata('admin_site_lang')=="ummalqura" OR $this->session->userdata('admin_site_lang')=="") echo "islamic"; else echo ""; ?>','<?php if($this->session->userdata('admin_site_lang')=="arabic" OR $this->session->userdata('admin_site_lang')=="" ) echo "ar"; else echo "en"; ?>'),
  showOtherMonths: true,dateFormat: 'dd/mm/yyyy',
  onSelect: function (date) {
	
  }
});
});
$(document).ready(function() {
  var div_clone = null;
  div_clone = $('#exppencess_details').clone();
  $('#add_expenses').click(function(e) {
$('.remove_btn').show();
    var _elm = div_clone.clone();
    _elm.find('.remove_btn').hide();

_elm.find('.add_expenses').show();
    _elm.appendTo('#clone_here');
     var $e = $(e.currentTarget);
  })

  $(document).on("click", ".remove_btn", function(e) {
    var $e = $(e.currentTarget);
    $e.closest('#exppencess_details').remove();

  });
});
</script>