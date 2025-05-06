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
            font-size: 15px;
            text-transform: uppercase;
            padding: 10px 10px 10px 29px;
            -webkit-border-top-left-radius: 20px !important;
            -webkit-border-top-right-radius: 20px !important;
            -moz-border-radius-topleft: 20px !important;
            -moz-border-radius-topright: 20px !important;
            border-top-left-radius: 20px !important;
            border-top-right-radius: 20px !important;
            margin: 15px 15px 0 15px;
        }
        .in_fo{
            box-shadow: 0px 5px 10px 0px #cccccc !important;
            margin: 0 15px;
            padding-bottom: 20px;
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
        .m-portlet {
            margin-bottom: 0;
        }
        .m-widget4 .m-widget4__item .m-widget4__info {
            width: 97.2%;
        }
		.m-body .m-content {
    padding: 29px 45px;
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
                                <?php echo $this->lang->line('PLEADER_GUID');?>
                            </h3>
                        </div>
                    </div>
                </div>


             
        
			<?php echo form_open('admin/admin/evidence',['id'=>'']); ?>
			<!--begin::Form-->
			<?php echo $this->session->flashdata('evidence');   ?>
			<div class="m-form m-form--fit m-form--label-align-right m-form--group-seperator-dashed">
					<div class="m-portlet__body"> <div class="form-group m-form__group row">
				  <div class="form-group col-sm-12">
					<label for="name" class=" form-control-label"><?php echo $this->lang->line('Title');?>(AR)</label>
				    <input type="text" name="title_ar" value="<?php echo $result->title_ar; ?>" class="form-control" style="">	
				    </div>
				    
				  <div class="form-group col-sm-12">
					<label for="name" class=" form-control-label"><?php echo $this->lang->line('Title');?>(EN)</label>
				    <input type="text"  value="<?php echo $result->title_en; ?>"  name="title_en" class="form-control" style="">	
				    </div>
					<div class="form-group col-sm-12">
					<label for="name" class=" form-control-label"><?php echo $this->lang->line('Message');?>(AR)</label>
				    <textarea name="message_ar" class="form-control" style=" height: 200px; "><?php echo $result->message_ar; ?></textarea>		
					</div>
					<div class="form-group col-sm-12">
					<label for="name" class=" form-control-label"><?php echo $this->lang->line('Message');?>(EN)</label>
				    <textarea name="message_en" class="form-control" style=" height: 200px; "><?php echo $result->message_en; ?></textarea>		
					</div>
					<div class="form-group col-sm-12">
						<?php $submit=$this->lang->line('Submit'); echo form_submit([ 'value'=>$submit,'class'=>'btn btn-primary btn-lg addservices']);  ?> 
					</div>
					</div>

			</div>	
			</div>
			</div>
			<?= form_close(); ?>

                        </div>
                        </div>

                    </div>
          
            </div>




<?php

include('footer.php');
?>

<script type="text/javascript">

$(document).ready(function()
{ 

$("#country").change(function()
{
  var id= $('option:selected', this).val();
 
  var url="<?= base_url('admin/admin/country_list'); ?>"; 

  $.ajax({
    type:'ajax',
    method:'post',
    url:url,
    data:{"id" : id},
    dataTyppe: 'json',
  
    success:function(data){
			
          $('#state').html('');
          $('#state').append(data);

      },
  });
 
return true;
 });
$("#state").change(function()
{
  var id= $('option:selected', this).val();
 
  var url="<?= base_url('admin/admin/city_list'); ?>"; 

  $.ajax({
    type:'ajax',
    method:'post',
    url:url,
    data:{"id" : id},
    dataTyppe: 'json',
  
    success:function(data){
			
          $('#city').html('');
          $('#city').append(data);

      },
  });
 
return true;
 });
});
    
</script>