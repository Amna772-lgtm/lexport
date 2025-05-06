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
                               <?php echo $this->lang->line('By_Evaluation');?>
                            </h3>
                        </div> -->
                        <div class="theme-new-nav-menu">
                        <h3 class="m-portlet__title" style="margin-right: 70px; font-size:24px !important;">
                                <?php echo $this->lang->line('Report');?>
                            </h3>
                            <ul>
                                <li> <a href="http://lexport.demosbywpsqr.com/admin/report/by_employees">By Employees</a> </li>
                                <li> <a href="http://lexport.demosbywpsqr.com/admin/report/by_cost">By Cost</a> </li>
                                <li> <a href="http://lexport.demosbywpsqr.com/admin/report/by_time">By Time</a> </li>
                                <li> <a href="http://lexport.demosbywpsqr.com/admin/report/by_task">By Task</a> </li>
                                <li class="active"> <a href="http://lexport.demosbywpsqr.com/admin/report/by_evaluation">By Evaluation</a> </li>
                            </ul>

                            <!-- <a class="btn btn-primary" href="#"> <i class="fa fa-plus"></i> Assign</a> -->
                        </div>
                    </div>
                </div>
 

<?php echo form_open_multipart('admin/report/by_evaluation',['id'=>'employer','class'=>"m-form m-form--fit m-form--label-align-right m-form--group-seperator-dashed"]);
 
 ?>
<?php
$eid  = isset($_POST['emp']) ? htmlspecialchars($_POST['emp'], ENT_QUOTES, 'UTF-8') : '';
$from = isset($_POST['from']) ? htmlspecialchars($_POST['from'], ENT_QUOTES, 'UTF-8') : '';
$to   = isset($_POST['to']) ? htmlspecialchars($_POST['to'], ENT_QUOTES, 'UTF-8') : '';  
?>
                <!--begin::Form-->
 
                <div class="m-portlet__body theme-inner-form">

                        <div class="form-field-container">
                        <h3><?php echo htmlspecialchars($this->lang->line('Generate_Report'), ENT_QUOTES, 'UTF-8'); ?></h3>
                            <div class="form-group m-form__group row">
								
          <div class="form-group col-sm-6">
			<label><?php //echo $this->lang->line('From');?> Select Date</label>
		<?= form_input(['id'=>'from','name'=>'from','class'=>'form-control','value'=>$from,'autocomplete'=>'off',"required"=>"required"]);?>
			<div class="form-error"><?php echo form_error('from'); ?></div>
		</div>	 
 
		<div class="form-group col-sm-6">
			<label><?php echo $this->lang->line('Employee');?> 	</label>
			<select name="employee" id="employee" class="form-control">
				<option value=""><?php echo $this->lang->line('All_employee_Select');?></option>
				<?php foreach ($emp as $emp) 
				{ ?>
					<option value="<?= $emp['id']; ?>" <?php if($eid==$emp['id']) echo "selected=selected";?>><?= $emp['name']; ?></option>
		<?php	} ?>
			</select>
	
		</div>
<!--<div class="form-group col-sm-3">
				<label><?php echo $this->lang->line('branch');?></label>
				<select name="branch" id="branch" class="form-control">
				<option  value=""><?php echo $this->lang->line('All');?></option>
				<?php
				foreach (branch() as $b) { ?>
				<option value="<?php echo $b['id']?>" <?php if($branch==$b['id']) echo "selected=selected";?>><?php echo $b['name']?></option>
				<?php } ?>
				</select>
			</div> 		-->
	<div class="form-group col-sm-12 mt-4">
	
		 <?php 
		 $submit=$this->lang->line('Submit');
		 echo form_submit(['name'=>'submit','id'=>'monthly','value'=>$submit,'class'=>'btn btn-primary btn-lg']); ?>
		 	</div>
		<!-- <div class="form-group col-sm-4">
			<label>Department</label>
			<select name="department" id="department" class="form-control">
				<option value="0">All department select</option>
				<?php foreach ($dep as $dep) 
				{ ?>
					<option value="<?= $dep['id']; ?>"><?= $dep['d_name']; ?></option>
		<?php	} ?>
			</select>
		</div>
		 <div class="form-group col-sm-4">
			<label>branch</label>
			<select name="branch" id="branch" class="form-control">
				<option value="0">All branch select</option>
				<?php foreach ($branch as $branch) 
				{ ?>
					<option value="<?= $branch['branch']; ?>"><?= $branch['branch']; ?></option>
		<?php	} ?>
			</select>
		</div>-->
                            </div>
                        </div>


					<div class="form-field-container">
                    <h3><?php echo $this->lang->line('Report_Summery');?></h3>
						<div class="col-md-12">
						<div class="form-group m-form__group row" style=" text-align: center; margin: auto; ">
						<?php if($emp_mission) {  ?>
									<div class="col-md-8">
								<canvas id="myChart" width="200" height="200"></canvas></div>
						<?php } ?>
						<?php if($all_mission) { ?>
						<canvas id="myChartB" width="400" height="400"></canvas>

						<?php } ?>
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

var ctx = document.getElementById("myChartB").getContext("2d");

var data = {
  labels: ["Evaluation"],
  datasets: [
	<?php foreach($all_mission as $key=>$value){ ?>
  {
	backgroundColor: "<?php echo sprintf('#%06X', mt_rand(0, 0xFFFFFF)); ?>",
    label: "<?php echo getEmployeeName($key);  ?>",
	data: [<?php echo$value['sum']/$value['count'];
	?>]
  },
  <?php } ?>
  ]
};

var myBarChart = new Chart(ctx, {
  type: 'bar',
  data: data,
  options: {
    barValueSpacing: 20,
    scales: {
      yAxes: [{
        ticks: {
          min: 0,
        }
      }]
    }
  }
});


</script>
<script>
var ctx = document.getElementById('myChart').getContext('2d');
ctx.height = 500;
data = {
    datasets: [{
        data: [<?php if($emp_mission['master_rating_no']== "0")  echo 0; else $emp_mission['master_rating']/ $emp_mission['master_rating_no']; ?>,<?php if($emp_mission['responsible_rating_no']== "0")  echo 0; else echo $emp_mission['responsible_rating']/$emp_mission['responsible_rating_no']; ?>,<?php if($emp_mission['follow_rating_no']== "0")  echo 0; else echo $emp_mission['follow_rating']/$emp_mission['follow_rating_no']; ?>],
			 backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)',
 
            ],
    }],

    // These labels appear in the legend and in the tooltips when hovering different arcs
    labels: [
        'Super Employee Rating',
        'Responsible Rating',
        'Follow Up Rating'
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