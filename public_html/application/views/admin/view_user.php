<?php
include('header.php');

?>

    <style>
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
                        <div class="m-portlet__head-title">
                            <h3 class="m-portlet__head-text">
                         <?php echo $this->lang->line('Visiting_User');?>
                            </h3>
                        </div>
                    </div>
                </div>
 

<?php echo form_open_multipart(' ',['id'=>'employer','class'=>"m-form m-form--fit m-form--label-align-right m-form--group-seperator-dashed"]);
 
 ?>

                <!--begin::Form-->
 
                <div class="m-portlet__body theme-inner-form">

                      
                        <div class="form-field-container">
                        <h3><?php echo $this->lang->line('User_Information');?></h3>
                            <div class="form-group m-form__group row">
                          
                          <div class="form-group col-sm-4">
			<label for="court_name" class=" form-control-label"><strong><?php echo $this->lang->line('Name');?>: </strong><?php echo $data->name; ?></label>
			</div>
			<div class="form-group col-sm-4">
				<label for="court_name" class=" form-control-label"><strong><?php echo $this->lang->line('Address');?>: </strong><?php echo $data->address; ?></label>
			</div>
			<div class="form-group col-sm-4">
			<label for="court_name" class=" form-control-label"><strong><?php echo $this->lang->line('City');?>: </strong><?php echo $data->city; ?></label>
			</div>
			<div class="form-group col-sm-4">	
			<label for="court_name" class=" form-control-label"><strong><?php echo $this->lang->line('identification_types');?>: </strong><?php echo $data->id_type; ?></label>
			</div>
			<div class="form-group col-sm-4">	
			<label for="court_name" class=" form-control-label"><strong><?php echo $this->lang->line('Identification_Numbers');?>: </strong><?php echo $data->id_numbers; ?></label>
			</div>
			<div class="form-group col-sm-4">
			<label for="court_name" class=" form-control-label"><strong><?php echo $this->lang->line('Phone');?>: </strong><?php echo $data->phone;?></label>
			</div>
			<div class="form-group col-sm-4">
				<label for="court_name" class=" form-control-label"><strong><?php echo $this->lang->line('Email');?>: </strong><?php echo $data->email; ?></label>
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