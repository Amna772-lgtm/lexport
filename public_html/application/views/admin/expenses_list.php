<?php
include('header.php');

?>
    <style>
        .nav {
            display: -webkit-box;
        }
        .bootbox-confirm .modal-dialog {
    max-width: 500px;
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
                                <li> <a href="http://lexport.demosbywpsqr.com/admin/finance"><?php echo $this->lang->line('List');?></a> </li>
                                <li class="active"> <a href="http://lexport.demosbywpsqr.com/admin/finance/expenses_list"><?php echo $this->lang->line('Expense');?></a> </li>
                                <li> <a href="http://lexport.demosbywpsqr.com/admin/finance/transaction"><?php echo $this->lang->line('Transaction');?></a> </li>
                                <!-- <li> <a href="http://lexport.demosbywpsqr.com/admin/hr/list_hr_fine">Payment Methods</a> </li> -->
                                
                            </ul>
                        </div>
                    </div>
                </div>
				<?php echo $this->session->flashdata('showMsg'); ?>
                <div class="m-portlet__body">
                    <!-- Sec tabs --->
                    <!-- <ul class="nav nav-tabs" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link " data-toggle=" " href="<?php echo base_url('admin/finance'); ?>" data-target="#m_tabs_1_1"><?php echo $this->lang->line('List');?></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" data-toggle=" " href="<?php echo base_url('admin/finance/expenses_list'); ?>" data-target="#m_tabs_1_2"><?php echo $this->lang->line('Expense_List');?></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo base_url('admin/finance/approve_pending_invoice_list'); ?>" data-target=" "><?php echo $this->lang->line('Pending_Invoice');?></a>
                        </li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane active" id="m_tabs_1_1" role="tabpanel">
                            <div class="">


                                <div class="row align-items-center dataTables_wrapper dt-bootstrap4 no-footer" style="margin-bottom: 20px">

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
                                            <div class="col-md-5">
                                               	<?php echo form_open("admin/finance/expenses_list",['id'=>'archive']); ?> <select id="clientsel" class="form-control" name="clients">
		    	<option><?php echo $this->lang->line('Select_Client');?></option>
				
			<?php  foreach ($users as $get_per_clients) {?>
			<?php if($this->session->userdata('role_id') == 1){ ?>
		    	<option value="<?php echo $get_per_clients['id']?>" <?php if($custo_id==$get_per_clients['id']){ echo "selected=selected";}?>><?php echo $get_per_clients['name']?></option>
			<?php } else {?>
			
		    	<option value="<?php echo $get_per_clients['customers_id']?>" <?php if($custo_id==$get_per_clients['customers_id']){  }?>><?php echo $get_per_clients['client_name']?></option>
			<?php } } ?>
				</select>
				</div>
				<div class="col-md-5">
				<select class="form-control" id="casesel" name="cases">
		    	<option value=""><?php echo $this->lang->line('Select_E_Service');?></option>
				<?php /*  foreach ($get_per_case as $get_per_case) {?>
				<option value="<?php echo $get_per_case['id']?>" <?php if($t==$get_per_case['id']) echo "selected=selected";?>><?php echo $get_per_case['case_number']?></option>
				<?php } */ ?>	    
				</select> 
                                            </div>

                                            <div class="col-md-2">
                                                <div class="theme-btn-group">
                                                <?php echo form_submit(['id'=>'addcustomer','value'=>'Find','class'=>'btn btn-primary ']); ?>
                                                <a href="" class="btn btn-danger"  ><?php echo $this->lang->line('Reset');?></a>
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

                                                
                                                <th class="sortable"><?php echo $this->lang->line('Serial_No');?><img class="sortIcon" src="../../assets/images/img/unfold_more.svg" height="18px"></th>
                                                <th class="sortable"><?php echo $this->lang->line('Case_No');?><img class="sortIcon" src="../../assets/images/img/unfold_more.svg" height="18px"></th>
                                                <th class="sortable"><?php echo $this->lang->line('File_No');?><img class="sortIcon" src="../../assets/images/img/unfold_more.svg" height="18px"></th>
                                                <th class="sortable"><?php echo $this->lang->line('Client_Name');?><img class="sortIcon" src="../../assets/images/img/unfold_more.svg" height="18px"></th>
                                                <th class="sortable"><?php echo $this->lang->line('Created_Date');?><img class="sortIcon" src="../../assets/images/img/unfold_more.svg" height="18px">	</th>
                                                <th class="sortable"><?php echo $this->lang->line('Total_Amount');?><img class="sortIcon" src="../../assets/images/img/unfold_more.svg" height="18px"></th>
                                                <th></th>

                                            </tr>
                                            </thead>
                                            <tbody>
						<?php $i=0; foreach ($expenses_list as $expenses){ $i++; ?>
                      <tr class="hide<?php echo $expenses['id'] ?>">
                      <?php $serial_number = sprintf("#%02d", $i); ?>
                      <td data-sort="<?= $count - 1 ?>"><?= $serial_number ?></td>
                        <td><?= $expenses['case_number'] ?></td>
                        <td><?= $expenses['client_file_number'] ?></td>
                        <td><?= $expenses['client_name'] ?></td>
                        <td> 
						 <?php  $date= date("d/m/Y", strtotime($expenses['exp_create_date'])); echo getTheDayAndDateFromDatePan($date); ?> 
						</td>
                        
						<td>$<?= number_format(getExpenseTotal($expenses['id']), 2) ?></td>

						<td class="action">
							<a  data-target="#edit-modal" class="editing-modal" data-toggle="modal" data-id="<?= $expenses['id'] ?>" title="<?php echo $this->lang->line('Edit_expenses');?>">
                                <div style="display:none" class="expense_data" data-array='<?php echo json_encode( $expenses ); ?>'></div>
                                <img src="<?= base_url('assets/images/img/pen-solid.svg') ?>" alt="Edit" class="img-pen"></a>
							<a  href='<?= base_url("admin/finance/generate_receipt/{$expenses['id']}"); ?>' class="fa fa-file-o" title="<?php echo $this->lang->line("Generate_expenses");?>"></a>
							<a href="javascript:;" id="<?= $expenses['id'] ?>" class="fa fa-trash delete_case" title="<?php echo $this->lang->line('Delete_expenses');?>"></a>

						</td>      
						</tr> 
                <?php } ?>
                                            </tbody>
                                        </table>


                                        <!-- start edit modal -->
                                        <div class="modal fade lp-theme-modal" id="edit-modal" tabindex="-1" role="dialog" aria-labelledby="modalTitle" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="modalTitle"><?php echo $this->lang->line('Edit_Expenses');?></h5>
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
									<div id="image"><div class="ajax-upload-dragdrop" style="vertical-align: top; width: 420px;"><div class="ajax-file-upload" style="position: relative; overflow: hidden; cursor: default;">Or click here to view the files<form method="POST" action="http://lexport.demosbywpsqr.com/admin/c_case/admin_modify_upload_file" enctype="multipart/form-data" style="margin: 0px; padding: 0px;"><input type="file" id="ajax-upload-id-1745325122938" name="image[]" accept="*" multiple="" style="position: absolute; cursor: pointer; top: 0px; width: 100%; height: 100%; left: 0px; z-index: 100; opacity: 0;"></form></div><div class="drage-file"><b>Drag the files here</b></div></div><div></div></div><div class="ajax-file-upload-container"></div>
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
$(document).on('uploadFile', function () {
    $("#image").uploadFile({
        url: "<?= base_url('admin/c_case/admin_modify_upload_file'); ?>",
        fileName: "image",
        dragDropStr: "<div class='drage-file'><b>Drag the files here</div>",
        abortStr: "Cancel",
        statusBarWidth: 300,
        formData: {
            "fid": '<?= $doc_id; ?>',
            "cat_id": 9,
            "type": "expense",
            "customer_id": customer_id
        },
        dragdropWidth: 420,
        uploadStr: "Or click here to view the files",
        allowedTypes: "jpg,jpeg,png,gif,ico,mp3,m4a,ogg,wav,psd,xls,xlsx,odt,ppt,pptx,pps,ppsx,doc,docx,pdf",
    });
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
var case_id = <?php echo !empty($this->uri->segment(4)) ? $this->uri->segment(4) : ''; ?>;
<?php }
?>
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
                                        <!-- End edit Modal -->
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
jQuery(document).ready(function($) {
	$('#msg').hide();
    $(document).on( 'click', '.editing-modal', function(){
        var id = $(this).attr('data-id');
        var data = $(this).find('.expense_data').data('array');
        $('#edit-modal .exp_id').val(data.id)       
        $('#edit-modal .client_name').val(data.client_name)       
        $('#edit-modal .case_number').val(data.case_number)       
        $('#edit-modal #comment').val(data.note)       
        $('#edit-modal #report').val(data.report)       
    });
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
var url="<?= base_url('admin/finance/delete_expenses'); ?>"; 
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