<?php
include('header.php');

?>

    <style>
		.datepicker table tr td.disabled, .datepicker table tr td.disabled:hover {

    color: #c5c5c5 !important;

}
        .m-form.m-form--group-seperator-dashed .m-form__group {
            border-bottom: 0px dashed #ebedf2;
        }
        .thh h3{
            background: #1F3958;
            color: #fff;
            font-weight: bold;
            text-transform: uppercase;
            padding: 10px;
            -webkit-border-top-left-radius: 20px !important;
            -webkit-border-top-right-radius: 20px !important;
            -moz-border-radius-topleft: 20px !important;
            -moz-border-radius-topright: 20px !important;
            border-top-left-radius: 20px !important;
            border-top-right-radius: 20px !important;
            margin: 30px 30px 0 30px;
        }
        .in_fo{
            box-shadow: 0px 5px 10px 0px #cccccc !important;
            margin: 0 30px;
            padding-bottom: 25px;
            -webkit-border-bottom-right-radius: 20px;
            -webkit-border-bottom-left-radius: 20px;
            -moz-border-radius-bottomright: 20px;
            -moz-border-radius-bottomleft: 20px;
            border-bottom-right-radius: 20px;
            border-bottom-left-radius: 20px;
        }
        .m-form.m-form--group-seperator-dashed .m-form__group {
            border-bottom: 0px dashed #ebedf2;
            padding-bottom: 0;
            padding-top: 10px;
        }
        .m-portlet .m-form.m-form--fit > .m-portlet__body {
            padding-bottom: 40px !important;
        }
        .nav {
            display: -webkit-box;
        }
    </style>

    <div class="m-grid__item m-grid__item--fluid m-wrapper">


        <!-- END: Subheader -->
        <div class="m-content">

            <!--begin::Portlet-->
            <div class="m-portlet lp-theme-card bg-transparent">
                <div class="m-portlet__head">
                    <div class="m-portlet__head-caption">
                        <!-- <div class="m-portlet__head-title">
                            <h3 class="m-portlet__head-text">
                                <?php echo $this->lang->line('By_Cost');?>
                            </h3>
                        </div> -->
                        <div class="theme-new-nav-menu">
                        <h3 class="m-portlet__title" style="margin-right: 70px; font-size:24px !important;">
                                <?php echo $this->lang->line('Report');?>
                            </h3>
                            
                            <ul >
                                <li> <a href="http://lexport.demosbywpsqr.com/admin/report/by_employees">By Employees</a> </li>
                                <li class="active"> <a href="http://lexport.demosbywpsqr.com/admin/report/by_cost">By Cost</a> </li>
                                <li> <a href="http://lexport.demosbywpsqr.com/admin/report/by_time">By Time</a> </li>
                                <li> <a href="http://lexport.demosbywpsqr.com/admin/report/by_task">By Task</a> </li>
                                <li> <a href="http://lexport.demosbywpsqr.com/admin/report/by_evaluation">By Evaluation</a> </li>
                            </ul>

                            <!-- <a class="btn btn-primary" href="#"> <i class="fa fa-plus"></i> Assign</a> -->
                        </div>
                    </div>
                </div>
 

<?php echo form_open_multipart('admin/report/by_cost',['id'=>'employer','class'=>"m-form m-form--fit m-form--label-align-right m-form--group-seperator-dashed"]);
 
$eid    = isset($_POST['emp']) ? htmlspecialchars($_POST['emp'], ENT_QUOTES, 'UTF-8') : '';
$from   = isset($_POST['from']) ? htmlspecialchars($_POST['from'], ENT_QUOTES, 'UTF-8') : '';
$to     = isset($_POST['to']) ? htmlspecialchars($_POST['to'], ENT_QUOTES, 'UTF-8') : '';
$branch = isset($_POST['branch']) ? htmlspecialchars($_POST['branch'], ENT_QUOTES, 'UTF-8') : '';
?>
 <div class="m-portlet__body theme-inner-form">
                        <div class="form-field-container">
                        <h3><?php echo $this->lang->line('Generate_Report');?></h3>
                            <div class="form-group m-form__group row">
                          		<div class="form-group col-12 col-sm-6 col-lg-3">
			<label><?php echo $this->lang->line('From');?></label>
		<?= form_input(['id'=>'from','name'=>'from','class'=>'form-control','value'=>$from,'autocomplete'=>'off',"required"=>"required"]);?>
			<div class="form-error"><?php echo form_error('from'); ?></div>
		</div>	 
			<div class="form-group col-12 col-sm-6 col-lg-3">
				<label><?php echo $this->lang->line('To');?></label>
			<?= form_input(['id'=>'to','name'=>'to','class'=>'form-control','value'=>$to,'autocomplete'=>'off',"required"=>"required"]);?>
			<div class="form-error"><?php echo form_error('to'); ?></div>
		</div>	 
	<div class="form-group col-12 col-sm-6 col-lg-3">
			<label><?php echo $this->lang->line('Select_Employee');?></label>
			<select name="emp" id="employee_type" class="form-control">
			<option  value=""><?php echo $this->lang->line('All');?></option>
		<?php 
					foreach ($get_per_clients as $get_per_client){ ?>
                        <option value="<?php echo htmlspecialchars($get_per_client['id'], ENT_QUOTES, 'UTF-8'); ?>" 
                            <?php if (htmlspecialchars($eid, ENT_QUOTES, 'UTF-8') == htmlspecialchars($get_per_client['id'], ENT_QUOTES, 'UTF-8')) echo "selected=selected"; ?>>
                            <?php echo htmlspecialchars($get_per_client['name'], ENT_QUOTES, 'UTF-8'); ?>
                        </option>
                    <?php } ?>
			</select>
		</div> 
<div class="form-group col-12 col-sm-6 col-lg-3">
				<label><?php echo $this->lang->line('branch');?></label>
				<select name="branch" id="branch" class="form-control">
				<option  value=""><?php echo $this->lang->line('All');?></option>
				<?php
				foreach (branch() as $b) { ?>
				<option value="<?php echo $b['id']?>" <?php if($branch==$b['id']) echo "selected=selected";?>><?php echo $b['name']?></option>
				<?php } ?>
				</select>
			</div> 		
		<div class="form-group col-sm-12 mt-4">
 								 <?php 
								 
									$submit=$this->lang->line('Submit');
									echo form_submit(['name'=>'addadmin','id'=>'addadmin','value'=>$submit,'class'=>'btn btn-primary btn-lg']);
								 ?>              
	</div>

                            </div>
                        </div>

				<?php if($data) { ?>
					<div class="row thh">
						<div class="col-lg-12">
							<h3><?php echo $this->lang->line('Report_Summery');?></h3>
						</div>
					</div>
					<div class="in_fo">
						
				<div class="form-group m-form__group row">
				          <div class="col-lg-6">
				<canvas id="myChart" width="200" height="200"></canvas>
				</div>
				</div>
						         
					<div class="form-group m-form__group row">
                            <div class="col-lg-12">
                                <h3><?php echo $this->lang->line('Invoice_List');?><br>&nbsp;</h3>
                            </div>
                            <div class="col-lg-12">
                                <div class="m_datatable m-datatable m-datatable--default m-datatable--loaded" style="">
                                    <table class="table table-hover table-striped">
                                        <thead>
                                        <tr class="netTr">
                                            <th><?php echo $this->lang->line('SR_NO');?></th>
                                            <th><?php echo $this->lang->line('Invoice_Title');?></th>
                                            <th><?php echo $this->lang->line('Case_Number');?></th>
                                            <th><?php echo $this->lang->line('Client_Name');?></th>
                                            <th><?php echo $this->lang->line('Invoice_Number');?></th>
                                            <th><?php echo $this->lang->line('Payment_Status');?></th>
                                            <th><?php echo $this->lang->line('Amount');?></th>
                       
                                        </tr>
                                        </thead>
                                        <tbody>
					<?php $itot=0; $at=0; foreach ($invoice as $i){ $at++; ?>
                      <tr style="text-align: center;" class="hide">
                        <td><?php echo $at; ?></td>
						<td><?= $i['invoice_title'] ?></td>
                        <td><?= getCaseNumber($i['case_id']) ?></td>
                        <td><?= getEmployeeName($i['customers_id']) ?></td>
						<td><?= $i['invoice_no'] ?></td>
						<td><?= $i['payment_status'] ?></td>
						<td><?= $i['subtotal'] ?></td>
      
				 <?php $itot +=  $i['subtotal']; ?>
						</tr> <?php }  $tt =$itot; ?>
                                       

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
						<div class="form-group m-form__group row">
                            <div class="col-lg-12">
                                <h3><?php echo $this->lang->line('Expense_List');?><br>&nbsp;</h3>
                            </div>
							 <table class="table table-hover table-striped" id=>
                                            <thead>
                                            <tr class="netTr">

                                                <th><?php echo $this->lang->line('SR_NO');?></th>
                                                <th><?php echo $this->lang->line('Case_No');?></th>
                                                <th><?php echo $this->lang->line('File_No');?></th>
                                                <th><?php echo $this->lang->line('Client_Name');?></th>
                                                <th><?php echo $this->lang->line('Phone');?></th>
                                                <th><?php echo $this->lang->line('Case_Name');?></th>
                                                <th><?php echo $this->lang->line('Created_Date');?></th>
                                                <th><?php echo $this->lang->line('Created_Time');?></th>
                                                <th><?php echo $this->lang->line('Created_By');?></th>
                                                <th><?php echo $this->lang->line('Total_Amount');?></th>
                                    
                                            </tr>
                                            </thead>
                                            <tbody>
						<?php $iex=0; $i=0; foreach ($expense as $expenses){ $i++; ?>
                      <tr class="hide<?php echo $expenses['id'] ?>">
                        <td><?= $i; ?></td>
                        <td><?= $expenses['case_number'] ?></td>
                        <td><?= $expenses['client_file_number'] ?></td>
                        <td><?= $expenses['client_name'] ?></td>
                        <td><?= $expenses['contact_number'] ?></td>
                        <td><?= $expenses['case_title'] ?></td>
						<td><?php $timestamp = strtotime($expenses['exp_create_date']); echo  date("d-m-Y",$timestamp);?></td>
						<td><?php $timestamp = strtotime($expenses['exp_create_date']); echo  date("h:i a",$timestamp);?></td>
                        <td><?php echo getEmployeeName($expenses['created_by']); ?></td>
						<td> <?php echo getExpenseTotal($expenses['id']); ?></td>
					 
						</tr> 
				<?php  $iex += getExpenseTotal($expenses['id']); ?>
                <?php  }   $expt = $iex; ?>
                                            </tbody>
                                        </table>
						</div>
			 
				</div> <?php } ?>
                    </div>
 
                </form>

                <!--end::Form-->
            </div>

            <!--end::Portlet-->
        </div>
    </div>
    </div>


<?php

include('footer.php');

?>
<script type="text/javascript">
jQuery('#from').datepicker({format: "yyyy-mm-dd",autoclose:true,endDate: "dateToday"});

jQuery('#to').datepicker({format: "yyyy-mm-dd",autoclose:true,endDate: "dateToday"});
</script><script>
var ctx = document.getElementById('myChart').getContext('2d');
ctx.height = 500;
data = {
    datasets: [{
        data: [<?php echo $tt-$expt; ?>, <?php echo $expt; ?>, <?php echo $tt; ?>],
			 backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)',
 
            ],
    }],

    // These labels appear in the legend and in the tooltips when hovering different arcs
    labels: [
        'Profit',
        'Expense',
        'Recived Payemt'
    ],
	options: {
    responsive: true,
    maintainAspectRatio: false,
    scales: {
        yAxes: [{
            ticks: {
                beginAtZero:true
            }
        }]
    }
}

};
var myPieChart = new Chart(ctx, {
    type: 'pie',
    data: data,
		
});
</script>
