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
            <div class="m-portlet lp-theme-card bg-transparent">
                <div class="m-portlet__head">
                    <div class="m-portlet__head-caption">
                        <div class="m-portlet__head-title">
                            <h3 class="m-portlet__head-text">
                                <?php echo $this->lang->line('Add_Review');?>
                            </h3>
                        </div>
                    </div>
                </div>

<form class="m-form m-form--fit m-form--label-align-right m-form--group-seperator-dashed" id="employer" method="post">
 <input type="hidden" name="mission_type" value="<?php echo $this->uri->segment(5); ?>">
 <input type="hidden" name="mission_id" value="<?php echo $this->uri->segment(4); ?>">
 <input type="hidden" name="master_id" value="<?php echo $data->manager_id; ?>">
 <input type="hidden" name="responsible_id" value="<?php echo $data->responsible_employee; ?>">
 <input type="hidden" name="follow_id" value="<?php echo $data->follow_up_employee; ?>">
  <input type="hidden" name="is_new" value="<?php echo htmlspecialchars($_GET['is_new'], ENT_QUOTES, 'UTF-8'); ?>">
   <input type="hidden" name="eid" value="<?php echo htmlspecialchars($_GET['eid'], ENT_QUOTES, 'UTF-8'); ?>">
   <div class="m-portlet__body theme-inner-form">
   <div class="form-group row" style=" direction: ltr; ">
   
		<?php if($this->session->userdata('role_id') == 1) {?>						<div class="col-lg-6">
					
			
                        <div class="form-field-container">
                        <h3><?php  echo $this->lang->line('Master_Employee');?></h3>
<div class="form-group" style=" direction: ltr; ">
 <label><?php echo getEmployeeName($data->manager_id); ?></label>
  <?php if($p_data->master_rating == 0 OR $p_data->master_rating == "") { ?>
<fieldset class="rating">
    <input type="radio" id="star51" name="master_rating" value="5" /><label class = "full" for="star51" title="Awesome - 5 stars"></label>
    <input type="radio" id="star4half1" name="master_rating" value="4.5" /><label class="half" for="star4half1" title="Pretty good - 4.5 stars"></label>
    <input type="radio" id="star41" name="master_rating" value="4" /><label class = "full" for="star41" title="Pretty good - 4 stars"></label>
    <input type="radio" id="star3half1" name="master_rating" value="3.5" /><label class="half" for="star3half1" title="Meh - 3.5 stars"></label>
    <input type="radio" id="star31" name="master_rating" value="3" /><label class = "full" for="star31" title="Meh - 3 stars"></label>
    <input type="radio" id="star2half1" name="master_rating" value="2.5" /><label class="half" for="star2half1" title="Kinda bad - 2.5 stars"></label>
    <input type="radio" id="star21" name="master_rating" value="2" /><label class = "full" for="star21" title="Kinda bad - 2 stars"></label>
    <input type="radio" id="star1half1" name="master_rating" value="1.5" /><label class="half" for="star1half1" title="Meh - 1.5 stars"></label>
    <input type="radio" id="star11" name="master_rating" value="1" /><label class = "full" for="star11" title="Sucks big time - 1 star"></label>
    <input type="radio" id="starhalf1" name="master_rating" value="0.5" /><label class="half" for="starhalf1" title="Sucks big time - 0.5 stars"></label>
</fieldset>
  <?php } else { ?>
  <span class="ratdata">
  <?php echo $p_data->master_rating ?> <i class="fa fa-star"></i>
  </span>
  <p style=" width: 100%; ">Gives By <?php if($p_data->admin_id != 0) echo getEmployeeName($p_data->admin_id); else echo getEmployeeName($p_data->user_id); ?></p>
  <?php } ?>

                            </div>
                        </div>
                        </div>
		<?php } ?>
   		<div class="col-lg-6">
					
                        <div class="form-field-container">
                        <h3><?php echo $this->lang->line('Responsible_Employee');?></h3>
<div class="form-group m-form__group row" style=" direction: ltr; ">
	 <div style="width: 100%; padding: 5px 10px; color: #1f3958; font-weight: bold;"><?php echo getEmployeeName($data->responsible_employee); ?></div>	
 <?php if($p_data->responsible_rating == "" OR $p_data->responsible_rating == 0) { ?>	 
	<fieldset class="rating">
    <input type="radio" id="star52" name="responsible_rating" value="5" /><label class = "full" for="star52" title="Awesome - 5 stars"></label>
    <input type="radio" id="star4half2" name="responsible_rating" value="4.5" /><label class="half" for="star4half2" title="Pretty good - 4.5 stars"></label>
    <input type="radio" id="star42" name="responsible_rating" value="4" /><label class = "full" for="star42" title="Pretty good - 4 stars"></label>
    <input type="radio" id="star3half2" name="responsible_rating" value="3.5" /><label class="half" for="star3half2" title="Meh - 3.5 stars"></label>
    <input type="radio" id="star32" name="responsible_rating" value="3" /><label class = "full" for="star32" title="Meh - 3 stars"></label>
    <input type="radio" id="star2half2" name="responsible_rating" value="2.5" /><label class="half" for="star2half2" title="Kinda bad - 2.5 stars"></label>
    <input type="radio" id="star22" name="responsible_rating" value="2" /><label class = "full" for="star22" title="Kinda bad - 2 stars"></label>
    <input type="radio" id="star1half2" name="responsible_rating" value="1.5" /><label class="half" for="star1half2" title="Meh - 1.5 stars"></label>
    <input type="radio" id="star12" name="responsible_rating" value="1" /><label class = "full" for="star12" title="Sucks big time - 1 star"></label>
    <input type="radio" id="starhalf2" name="responsible_rating" value="0.5" /><label class="half" for="starhalf2" title="Sucks big time - 0.5 stars"></label>
</fieldset>
  <?php } else { ?>
  <span class="ratdata">
  <?php echo $p_data->responsible_rating ?> <i class="fa fa-star"></i>
  </span>
  <p style=" width: 100%; ">Gives By <?php if($p_data->admin_id != 0) echo getEmployeeName($p_data->admin_id); else echo getEmployeeName($p_data->user_id); ?></p>
  <?php } ?>
                            </div>
                        </div>
                        </div>
                 <div class="col-lg-6">
					
                        <div class="form-field-container">
                        <h3><?php echo $this->lang->line('Follow_up_Employee');?></h3>
<div class="form-group" style=" direction: ltr; ">

 <?php
$found= $this->db->select('*')->where(['app_id'=>$this->uri->segment(4),'type'=>$this->uri->segment(5)])->get('assign_mission')->result_array(); $i = 2;
foreach($found as $fd){
$uar = json_decode($p_data->follow_id);
?>
  <label><?php echo getEmployeeName($fd['following_employee_id']); 
  
  ?></label>
  <?php
if(in_array($uar,$fd['following_employee_id'])) { $i++;?>
<input type="hidden" name="follow_up_id[]" value="<?php echo $fd['following_employee_id']; ?>">
<fieldset class="rating">
    <input type="radio" id="star5<?php echo $i;?>" name="follow_rating[<?php echo $fd['following_employee_id']; ?>]" value="5" />
	<label class = "full" for="star5<?php echo $i;?>" title="Awesome - 5 stars"></label>
    <input type="radio" id="star4half<?php echo $i;?>" name="follow_rating[<?php echo $fd['following_employee_id']; ?>]" value="4.5" />
	<label class="half" for="star4half<?php echo $i;?>" title="Pretty good - 4.5 stars"></label>
    <input type="radio" id="star4<?php echo $i;?>" name="follow_rating[<?php echo $fd['following_employee_id']; ?>]" value="4" />
	<label class = "full" for="star4<?php echo $i;?>" title="Pretty good - 4 stars"></label>
    <input type="radio" id="star3half<?php echo $i;?>" name="follow_rating[<?php echo $fd['following_employee_id']; ?>]" value="3.5" />
	<label class="half" for="star3half<?php echo $i;?>" title="Meh - 3.5 stars"></label>
    <input type="radio" id="star3<?php echo $i;?>" name="follow_rating[<?php echo $fd['following_employee_id']; ?>]" value="3" />
	<label class = "full" for="star3<?php echo $i;?>" title="Meh - 3 stars"></label>
    <input type="radio" id="star2half<?php echo $i;?>" name="follow_rating[<?php echo $fd['following_employee_id']; ?>]" value="2.5" />
	<label class="half" for="star2half<?php echo $i;?>" title="Kinda bad - 2.5 stars"></label>
    <input type="radio" id="star2<?php echo $i;?>" name="follow_rating[<?php echo $fd['following_employee_id']; ?>]" value="2" />
	<label class = "full" for="star2<?php echo $i;?>" title="Kinda bad - 2 stars"></label>
    <input type="radio" id="star1half<?php echo $i;?>" name="follow_rating[<?php echo $fd['following_employee_id']; ?>]" value="1.5" />
	<label class="half" for="star1half<?php echo $i;?>" title="Meh - 1.5 stars"></label>
    <input type="radio" id="star1<?php echo $i;?>" name="follow_rating[<?php echo $fd['following_employee_id']; ?>]" value="1" />
	<label class = "full" for="star1<?php echo $i;?>" title="Sucks big time - 1 star"></label>
    <input type="radio" id="starhalf<?php echo $i;?>" name="follow_rating[<?php echo $fd['following_employee_id']; ?>]" value="0.5" />
	<label class="half" for="starhalf<?php echo $i;?>" title="Sucks big time - 0.5 stars"></label>
</fieldset>
  <?php } else { ?>
  <span class="ratdata">
  <?php $afa = json_decode($p_data->follow_rating); $key = $fd['following_employee_id']; echo $afa->$key;?> <i class="fa fa-star"></i>
  </span>
  <p style=" width: 100%; ">Gives By <?php if($p_data->admin_id != 0) echo getEmployeeName($p_data->admin_id); else echo getEmployeeName($p_data->user_id); ?></p>
  <hr style=" width: 100%; border-top: 1px solid #4e4c4c; ">
  <?php } ?>
  <?php } ?>              </div>
                        </div>
					</div>
			
                 
                        </div>
                        <?php echo form_submit(['id'=>'addcustomer','value'=>$this->lang->line('Submit'),'class'=>'btn btn-primary btn-lg']);  ?> <!--														<button type="reset" class="btn btn-secondary">Cancel</button>-->
                        </div>
                  
                </form>
                    </div>
            

                <!--end::Form-->
            </div>

            <!--end::Portlet-->
        </div>
    </div>
    </div>
 


<style>
 span.ratdata {
    height: 50px;
    width: 50px;
    border: 1px solid green;
    font-size: 16px;
    text-align: center;
    border-radius: 550px;
    padding-top: 12px;
    background: green;
    color: #fff;
	margin: auto;
}
.in_fo {
    text-align: center;
}
fieldset.rating label {
    font-size: 25px;
    cursor: pointer;
}

.rating { 
  border: none;
  float: left;
}

.rating > input { display: none; } 
.rating > label:before { 
  margin: 5px;
  font-size: 1.25em;
  font-family: FontAwesome;
  display: inline-block;
  content: "\f005";
}

.rating > .half:before { 
  content: "\f089";
  position: absolute;
}

.rating > label { 
  color: #ddd; 
 float: right; 
}

/***** CSS Magic to Highlight Stars on Hover *****/

.rating > input:checked ~ label, /* show gold star when clicked */
.rating:not(:checked) > label:hover, /* hover current star */
.rating:not(:checked) > label:hover ~ label { color: #FFD700;  } /* hover previous stars in list */

.rating > input:checked + label:hover, /* hover current star when changing rating */
.rating > input:checked ~ label:hover,
.rating > label:hover ~ input:checked ~ label, /* lighten current selection */
.rating > input:checked ~ label:hover ~ label { color: #FFED85;  } 
  
</style>
<?php

include('footer.php');
?> 

 