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
            <div class="m-portlet">
                <div class="m-portlet__head">
                    <div class="m-portlet__head-caption">
                        <div class="m-portlet__head-title">
                            <h3 class="m-portlet__head-text">
                             Add evidence<?php //echo $this->lang->line('JOB');?>
                            </h3>
                        </div>
                    </div>
                </div>
 
<?php echo form_open_multipart('web_management/cms/store_evidence',['class'=>"m-form m-form--fit m-form--label-align-right m-form--group-seperator-dashed"]); 
			if($data)
			{
				 echo form_hidden('id',$data['id']); 
			}
			else
			{
				 echo form_hidden('id',''); 
			}
		?>

                <!--begin::Form-->
 
                    <div class="m-portlet__body">

                        
                            <div class="form-group m-form__group row">
                          <div class="form-group col-sm-12">
			<?php if($data)	{
				$value=$data['title'];
			} else {
				$value=set_value('title');
			} ?>
				<label for="" class=" form-control-label"><?php echo $this->lang->line('Title');?> (En)</label><?php echo form_input(['name' => 'title', 'class' => 'form-control','value'=>$value,'required'=>'required']); ?>
			</div>	
			
			 <div class="form-group col-sm-12">
			<?php if($data)	{
				$value=$data['title_ar'];
			} else {
				$value=set_value('title_ar');
			} ?>
				<label for="" class=" form-control-label"><?php echo $this->lang->line('Title');?> (Ar)</label><?php echo form_input(['name' => 'title_ar', 'class' => 'form-control','value'=>$value,'required'=>'required']); ?>
			</div>	
			
			<div class="form-group col-sm-12">
			<?php if($data)	{
				$value=$data['description'];
			} else {
				$value=set_value('description');
			} ?>
			<label for="" class=" form-control-label"><?php echo $this->lang->line('Description_in_english');?></label><br>
			<?php echo form_textarea(['name' => 'description','rows'=>5,'cols'=>100,'id'=>'reporten', 'class' => 'form-control','value'=>$value]); ?>
			</div>
		
		    <div class="form-group col-sm-12">
			<?php if($data)	{
				$value=$data['description_ar'];
			} else {
				$value=set_value('description_ar');
			} ?>
			<label for="" class=" form-control-label"><?php echo $this->lang->line('Description_in_arabic');?></label><br>
			<?php echo form_textarea(['name' => 'description_ar','rows'=>5,'id'=>'reportar','cols'=>100, 'class' => 'form-control','value'=>$value]); ?>
			</div>
		
		
		<!--	<div class="form-group col-sm-6">
			<label for="" class=" form-control-label"><?php echo $this->lang->line('Image');?></label><?php echo form_upload(['name' => 'image', 'class' => 'form-control']); 
				echo $data['image']; ?>
			</div>
		 -->

                            </div>
                

 
                        
                    </div>
                    <div class="m-portlet__foot m-portlet__no-border m-portlet__foot--fit">
                        <div class="m-form__actions m-form__actions--solid">
                            <div class="row">
                                <div class="col-lg-6">
	<?php 
	$submit=$this->lang->line('Submit');
	echo form_submit(['value' =>$submit ,'class' => 'btn btn-primary btn-lg']);
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
<script src="https://cdn.ckeditor.com/4.11.1/standard/ckeditor.js"></script>
<script>
	CKEDITOR.replace( 'reportar' );
	CKEDITOR.replace( 'reporten' );
</script>