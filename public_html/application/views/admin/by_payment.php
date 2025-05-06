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
            <div class="m-portlet">
                <div class="m-portlet__head">
                    <div class="m-portlet__head-caption">
                        <div class="m-portlet__head-title">
                            <h3 class="m-portlet__head-text">
                                By Payment
                            </h3>
                        </div>
                    </div>
                </div>
 

<?php echo form_open_multipart('admin/report/by_payment',['id'=>'employer','class'=>"m-form m-form--fit m-form--label-align-right m-form--group-seperator-dashed"]);
 
 ?>
 
                    <div class="m-portlet__body">

                        <div class="row thh">
                            <div class="col-lg-12">
                                <h3>Generate Report</h3>
                            </div>
                        </div>
                        <div class="in_fo">
                            <div class="form-group m-form__group row">
                          		<div class="form-group col-sm-4">
			<h4 class="pb-2 display-5">From</h4>
			<?= form_input(['id'=>'from','name'=>'from','class'=>'form-control',"required"=>"required"]);?>
			<div class="form-error"><?php echo form_error('from'); ?></div>
		</div>	 
			<div class="form-group col-sm-4">
				<h4 class="pb-2 display-5">To</h4>
			<?= form_input(['id'=>'to','name'=>'to','class'=>'form-control',"required"=>"required"]);?>
			<div class="form-error"><?php echo form_error('to'); ?></div>
		</div>	 
	 <div class="form-group col-sm-4">
			<h4 class="pb-2 display-5">Transaction Type</h4>
			<select name="type" id="type" class="form-control" required>
				 <option value="">Select type</option><option value="paid">Paid</option> <option value="unpaid">UnPaid</option> <option value="hold">Hold</option> <option value="process">In Process</option> 
			</select>
					<div class="form-error"><?php echo form_error('type'); ?></div>
		</div>

                            </div>
                        </div>

 <?php if($data) { ?>
                        <div class="row thh">
                            <div class="col-lg-12">
                                <h3>Report Summery</h3>
                            </div>
                        </div>
                        <div class="in_fo">
                            
<?php print_r($data)?>
                            </div>
 <?php } ?>
                        </div>

 
                        
                    </div>
                    <div class="m-portlet__foot m-portlet__no-border m-portlet__foot--fit">
                        <div class="m-form__actions m-form__actions--solid">
                            <div class="row">
                                <div class="col-lg-6">
						<?php 
	 	echo form_submit(['value'=>'Submit','class'=>'btn btn-primary btn-lg']);
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
    </div>


<?php

include('footer.php');

?>
<script type="text/javascript">
jQuery('#from').datepicker({format: "yyyy-mm-dd",autoclose:true,endDate: "dateToday"});

jQuery('#to').datepicker({format: "yyyy-mm-dd",autoclose:true,endDate: "dateToday"});
</script>
