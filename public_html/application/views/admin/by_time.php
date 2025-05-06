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
                                <?php echo $this->lang->line('By_Time');?>
                            </h3>
                        </div> -->
                        <div class="theme-new-nav-menu">
                        <h3 class="m-portlet__title" style="margin-right: 70px; font-size:24px !important;">
                                <?php echo $this->lang->line('Report');?>
                            </h3>
                            <ul>
                                <li> <a href="http://lexport.demosbywpsqr.com/admin/report/by_employees">By Employees</a> </li>
                                <li> <a href="http://lexport.demosbywpsqr.com/admin/report/by_cost">By Cost</a> </li>
                                <li class="active"> <a href="http://lexport.demosbywpsqr.com/admin/report/by_time">By Time</a> </li>
                                <li> <a href="http://lexport.demosbywpsqr.com/admin/report/by_task">By Task</a> </li>
                                <li> <a href="http://lexport.demosbywpsqr.com/admin/report/by_evaluation">By Evaluation</a> </li>
                            </ul>

                            <!-- <a class="btn btn-primary" href="#"> <i class="fa fa-plus"></i> Assign</a> -->
                        </div>
                    </div>
                </div>
 

<?php echo form_open_multipart('admin/report/by_time',['id'=>'employer','class'=>"m-form m-form--fit m-form--label-align-right m-form--group-seperator-dashed"]);
 
 ?>

                <!--begin::Form-->
 
                <div class="m-portlet__body theme-inner-form">
                        <div class="form-field-container">
                        <h3><?php echo $this->lang->line('Generate_Report');?></h3>
					<div class="form-group m-form__group row">
					<div class="form-group col-sm-12">
						<label>
						<?php echo $this->lang->line('From');?></label>
						<?= form_input(['id'=>'from','name'=>'from','class'=>'form-control',"required"=>"required"]);?>
                        <?php 
								$submit=$this->lang->line('Submit');
								echo form_submit(['id'=>'addadmin','value'=>$submit,'class'=>'btn btn-primary mt-4 ']);
						 ?>
						<div class="form-error"><?php echo form_error('from'); ?></div>
					</div>
			
					</div>
				</div>
				
					<div class="form-field-container">
                    <h3><?php echo $this->lang->line('Report_Summery');?></h3>
						<div class="col-md-12">
						<div class="form-group m-form__group row" style=" text-align: center; margin: auto; ">
						<?php if($data) {  ?>
								
									<div class="col-md-8">
								<canvas id="myChart" width="200" height="200"></canvas></div>
									<div class="col-md-4">
									<strong>Total User: </strong><?php echo $data['total_user'] ?><br>
									<strong>Total Employee: </strong><?php echo $data['total_emp'] ?><br>
									<strong>Block User: </strong><?php echo $data['block_user'] ?><br>
									<strong>Total Case: </strong><?php echo $data['total_case'] ?><br>
									</div>
						<?php } ?>

						</div>
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
    </div>

<?php include "footer.php"; ?>
<script type="text/javascript" src="https://cdn.jsdelivr.net/jquery/latest/jquery.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
<script type="text/javascript">

$(function() {

    var start = moment().subtract(29, 'days');
    var end = moment();
    function cb(start, end) {
        $('#from span').html(start.format('YYYY-D-MMMM') + ' - ' + end.format('YYYY-D-MMMM'));
    }

    $('#from').daterangepicker({
        startDate: start,
        endDate: end,
		dateFormat: 'yy-dd-mm',
        alwaysShowCalendars: true,
        ranges: {
           'Today': [moment(), moment()],
           'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
           'Last 7 Days': [moment().subtract(6, 'days'), moment()],
           'Last 30 Days': [moment().subtract(29, 'days'), moment()],
           'This Month': [moment().startOf('month'), moment().endOf('month')],
           'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')],
		   "This Year": [
					"<?php echo date('m/d/Y', mktime(0,0,0,1,1,date("Y")));?>",
					"<?php echo date('m/d/Y', mktime(0,0,0,date("m"),1,date("Y")+1)-1);?>"
				],
				"Last Year": [
					"<?php echo date('m/d/Y', mktime(0,0,0,1,1,date("Y")-1));?>",
					"<?php echo date('m/d/Y', mktime(0,0,0,1,1,date("Y"))-1);?>"
				],
        }
    }, cb);

    cb(start, end);

});

</script>
<script>
var ctx = document.getElementById('myChart').getContext('2d');
ctx.height = 500;
data = {
    datasets: [{
        data: [<?php echo $data['total_user'] ?>,<?php echo $data['total_emp'] ?>,<?php echo $data['block_user'] ?>,<?php echo $data['total_case'] ?>],
			 backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(193, 91, 91, 0.85)',
 
            ],
    }],

    // These labels appear in the legend and in the tooltips when hovering different arcs
    labels: [
        'Total User',
        'Total Employee',
        'Block User',
        'Total Case'
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