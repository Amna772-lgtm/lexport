<?php $nvc = "white-nav sticky shrink modern hover4 radius-drop"; 
$pageTitle = $this->lang->line("Edit_Profile");
include('header.php');
?>
 </section>
<?php
include('header_welcome.php');
?>
<style>
    .modify_case .change_password,
    .modify_case .edit_profile {
        /* margin: auto; */
        background: #1866A9;
        border: none;
        border-radius: 100px;
        font-family: "Roboto";
        font-weight: 500;
        font-size: 14px;
        line-height: 20px;
        letter-spacing: 0px;
        text-align: center;
        padding: 7px 40px;
    }
    
    .modify_case .change_password_tab,
    .modify_case .edit_profile_tab {
        display:none;
    }
    
    .modify_case .edit_profile_tab .edit_profile {
        margin: unset;
        background: #1866A9;
        border: none;
        border-radius: 100px;
        font-family: "Roboto";
        font-weight: 500;
        font-size: 14px;
    }

    .modify_case .m-portlet .m-portlet__body .cancel_profile {
        margin: unset;
        color: #1866A9;
        box-shadow: unset !important;
        border-color: #1866A9 !important;
        border: 1px solid #1866A9;
        border-radius: 100px;
        font-family: "Roboto";
        font-weight: 500;
        font-size: 14px;
    }
    .modify_case .m-portlet .m-portlet__body .btn.btn-secondary.m-btn.cancel_profile:hover{
        background: #1866A9 !important;
        border: 1px solid #1866A9 !important;
    }
    .gap_14 {
        gap: 10px
    }
    span.card_label {
        font-size: 18px;
        color: #000;
        font-weight: bold;
    }

    .modify_case span.value {
        font-size: 18px;
        color: #1B2A39;
    }
    .modify_case .m-portlet .m-portlet__body h3{
        margin-bottom: 0 !important;
    }

    .modify_case .m-portlet .m-portlet__body .btn.btn-secondary.cancel_profile{
        border-radius: 50px;
        font-family: "Roboto";
        font-weight: 500;
        font-size: 14px;
        line-height: 10px;
        padding: 10px 23px;
    }
</style>
<!-- END: Left Aside -->
<div class="m-grid__item m-grid__item--fluid m-wrapper">


        <!-- END: Subheader -->
        <div class="m-content modify_case">
            <div class="row">
                <div class="col-xl-12 col-lg-12">
                    <div class="m-portlet m-portlet--full-height  ">
                        <div class="m-portlet__body theme-inner-form">
                            <div class="d-flex">
                                <div class="m-card-profile">
                                    <div class="m-card-profile__title m--hide">
                                    <?php echo $this->lang->line("Your_Profile"); ?>
                                    </div>
                                    <div class="m-card-profile__details d-flex flex-column col-xl-12" style="gap:14px">
                                        <h3 class="m-card-profile__name" style="text-align:left;"><?php echo $request['name']; ?></h3>
                                        <span style="text-align:left;font-family:'Roboto';"><?php echo $request['email']; ?></span>
                                        <div>
                                            <button class="btn btn-primary edit_profile"><?php echo $this->lang->line("Edit"); ?></button>
                                            <button class="btn btn-primary change_password"><?php echo $this->lang->line("CHANGE_PASSWORD"); ?></button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                           
                            
                            <div class="m-portlet__body-separator"></div>
                            <div class="form-group m-form__group row form-field-container view_profile">
                                <div class="col-lg-3 d-flex flex-column gap_14 my-4">
                                    <span class="card_label"><?php echo $this->lang->line("Full_name"); ?></span>
                                    <span class="value"><?php echo $request['name']; ?></span>
                                </div>
                                <div class="col-lg-3 d-flex flex-column gap_14 my-4">
                                    <span class="card_label"><?php echo $this->lang->line("Email"); ?></span>
                                    <span class="value"><?php echo $request['email']; ?></span>
                                </div>
                                <div class="col-lg-3 d-flex flex-column gap_14 my-4">
                                    <span class="card_label"><?php echo $this->lang->line("ID_type"); ?></span>
                                    <span class="value"><?php echo $request['id_type']; ?></span>
                                </div>
                                <div class="col-lg-3 d-flex flex-column gap_14 my-4">
                                    <span class="card_label"><?php echo $this->lang->line("ID_Number"); ?></span>
                                    <span class="value"><?php echo $request['id_numbers']; ?></span>
                                </div>
                                <div class="col-lg-3 d-flex flex-column gap_14 my-4">
                                    <span class="card_label"><?php echo $this->lang->line("Contact_Number"); ?></span>
                                    <span class="value"><?php echo $request['phone']; ?></span>
                                </div>
                                <div class="col-lg-3 d-flex flex-column gap_14 my-4">
                                    <span class="card_label"><?php echo $this->lang->line("City"); ?></span>
                                    <span class="value"><?php echo $request['city']; ?></span>
                                </div>
                                <div class="col-lg-3 d-flex flex-column gap_14 my-4">
                                    <span class="card_label"><?php echo $this->lang->line("district"); ?></span>
                                    <span class="value"><?php echo $request['district']; ?></span>
                                </div>
                                <div class="col-lg-3 d-flex flex-column gap_14 my-4">
                                    <span class="card_label"><?php echo $this->lang->line("Address"); ?></span>
                                    <span class="value"><?php echo $request['address']; ?></span>
                                </div>
                            </div>

                            <div class="edit_profile_tab">
                                <div class="col-lg-12 pl-0">
                                    <h3><?php echo $this->lang->line('Edit_Profile') ?></h3>
                                </div>
                                <?php 
									echo form_open_multipart('front/modify_case', ['class' => 'm-form m-form--fit m-form--label-align-right front-text updateprofile form-group m-form__group row form-field-container']); 
									if(isset($_GET['mode'])){$mod = $_GET['mode']; } else { $mod =''; }
									if($mod == 'edit'){ 
									    echo form_hidden('mode','edit');  $readonly = '';
									} else {
									    $readonly = 'readonly';
									}
                                    if($request['id_numbers'] != ''){ 	$disabled  = 'disabled '; }
								?>
                                    <div class="col-lg-3 d-flex flex-column gap_14 my-4">
                                        <span class="card_label"><?php echo $this->lang->line("Full_name"); ?></span>
                                        <input type="text" class="form-control m-input" name="name" value="<?php echo $request['name']; ?>">
                                    </div>
                                    <div class="col-lg-3 d-flex flex-column gap_14 my-4">
                                        <span class="card_label"><?php echo $this->lang->line("Email"); ?></span>
                                        <input type="email" class="form-control m-input" name="email" value="<?php echo $request['email']; ?>">
                                    </div>
                                    <div class="col-lg-3 d-flex flex-column gap_14 my-4">
                                        <span class="card_label"><?php echo $this->lang->line("ID_type"); ?></span>
                                        <?php  $value1 = set_value('id_type', $request['id_type']); ?>
                                        <select name="id_type" id="identification_types" class="form-control m-input" style="" required="" <?php echo $disabled; ?>>
                                            <option value="CR" <?php if($value1 == "CR") echo "selected"; ?>><?php echo $this->lang->line("CR"); ?></option>
                                            <option value="National Id" <?php if($value1 == "National_id") echo "selected"; ?>><?php echo $this->lang->line("National_ID"); ?></option>
                                            <option value="Aqama" <?php if($value1 == "Aqama") echo "selected"; ?>><?php echo $this->lang->line("Aqama"); ?></option>
                                            <option value="Other" <?php if($value1 == "Other") echo "selected"; ?>><?php echo $this->lang->line("Other"); ?></option>
                                        </select>
                                    </div>
                                    <div class="col-lg-3 d-flex flex-column gap_14 my-4">
                                        <span class="card_label"><?php echo $this->lang->line("ID_Number"); ?></span>
                                        <?php  $id_number = set_value('id_numbers', $request['id_numbers']); ?>
                                        <?php echo form_input(['name' => 'id_numbers', 'class' => 'form-control m-input', 'value' => $id_number,$disabled=>'']); ?>
                                    </div>
                                    <div class="col-lg-3 d-flex flex-column gap_14 my-4">
                                        <span class="card_label"><?php echo $this->lang->line("Contact_Number"); ?></span>
                                        <?php  $phone = set_value('phone', $request['phone']); ?>
                                        <?php echo form_input(['name' => 'phone', 'class' => 'phones form-control m-input', 'value' => $phone,$readonly=>'']); ?>  
                                    </div>
                                    <div class="col-lg-3 d-flex flex-column gap_14 my-4">
                                        <span class="card_label"><?php echo $this->lang->line("City"); ?></span>
                                        <?php  $city = set_value('city', $request['city']); ?>
                                        <?php echo form_input(['name' => 'city', 'class' => 'form-control m-input', 'value' =>$city,$readonly=>'']); ?>
                                    </div>
                                    <div class="col-lg-3 d-flex flex-column gap_14 my-4">
                                        <span class="card_label"><?php echo $this->lang->line("district"); ?></span>
                                        <?php  $value = set_value('district', $request['district']); ?>
                                        <?php echo form_input(['name' => 'district', 'class' => 'form-control', 'value' => $value ]); ?>
                                    </div>
                                    <div class="col-lg-6 d-flex flex-column gap_14">
                                        <span class="card_label"><?php echo $this->lang->line("Address"); ?></span>
                                        <?php  $address = set_value('address', $request['address']); ?>
                                        <textarea name="address" class="form-control m-input" id="exampleTextarea" rows="3"><?php echo $address;?></textarea>
                                    </div>
                                    <div class="col-lg-12 d-flex gap_14 mt-4">
                                        <button type="submit" class="btn btn-accent m-btn m-btn--air m-btn--custom edit_profile"><?php echo $this->lang->line("Save_changes"); ?></button>
                                        <button  class="btn btn-secondary m-btn m-btn--air m-btn--custom cancel_profile"><?php echo $this->lang->line("Cancel"); ?></button>
                                    </div>
                                </form>
                            </div>

                            <div class="change_password_tab">
                                <!-- <div class="m-portlet__body"> -->
                                    <div class="erorr"></div>
                                        <div class="col-lg-12 pl-0">
                                            <h3><?php echo $this->lang->line('CHANGE_PASSWORD') ?></h3>
                                        </div>    
                                        <div class="m-portlet__body-separator"></div>
                                        <?php echo form_open('front/change_password', ['id'=>'change_pass','class' => 'm-form m-form--fit m-form--label-align-right front-text']); ?>
                                        <div class="form-group">
                                            <?php echo form_password(['name' => 'current_password', 'placeholder' => $this->lang->line('Current_Passsword'), 'class' => 'form-control','required'=>'required']);?> 
                                            <span style="color:red"> <?php echo form_error('current_password'); ?></span>
                                            <span style="color:red"> <?php echo isset($_GET['pwd'])?"Incorect Password":''; ?></span>
                                        </div>
                                        <div class="form-group">
                                            <?php echo form_password(['name' => 'new_password','id' => 'new_password', 'placeholder' => $this->lang->line('New_Passsword'), 'class' => 'form-control','required'=>'required']);?> 
                                            <span style="color:red"> <?php echo form_error('new_password'); ?></span>
                                            <span style="color:red" id="errPass"></span>
                                        </div>
                                        <div class="form-group ">
                                            <?php echo form_password(['name' => 'confirm_password','id' => 'confirm_password', 'placeholder' => $this->lang->line('Confirm_Passsword'), 'class' => 'form-control','required'=>'required']); ?> 
                                            <span id ="cpass" style="color:red"><?php echo form_error('confirm_password'); ?></span>
                                        </div>
                                        <div class="form-group col-md-3">
                                        <div class="next-btn d-flex gap_14 mt-4" style="margin-left:-13px;">     
                                                <?php echo form_submit(['name' => 'submit', 'value' => $this->lang->line('Change'), 'class' => 'btn btn-primary btn-lg change_password']); ?>
                                                <button  type="button" class="btn btn-secondary cancel_profile"><?php echo $this->lang->line("Cancel"); ?></button>
                                        </div>   
                                        </form>
                                    </div>
                                <!-- </div> -->
                            </div>
                        </div>
                    </div>
                </div>

        </div>
</div>
	<div class="modal fade otppopup" id="myModal2" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
      
        <div class="modal-body">
          <div class="loginBox ">
		  <h2 align="center"><?php echo $this->lang->line("Enter_OTP"); ?></h2>
<?php echo form_open('front/otp_verify',['class' => 'otpformmu','id'=>'']); ?>
<div class="col-sm-12">
<div class="input-group">
<p> <?php echo $this->lang->line("Enter_OTP_Detail"); ?><span class="otpmo"></span>
<label> <?php echo $this->lang->line("Enter_OTP"); ?> <span class="otpgetm"></span></label>
<?php echo form_input(['name' => 'getotp', 'class' => 'otpsendm form-control']); ?>
<span style="color:red" class="otperrorm"></span>
</div>
 <div class="input-group"  style="text-align:center;    display: block; margin-top:10px;" >
 <a href="javascript:;"class="btn btn-primary btn-lg" id="getmootp"><?php echo $this->lang->line("Submit"); ?></a>
</div>

</div>
<div class="clear"></div>

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
<script>
jQuery(document).ready(function(){
jQuery('#change_pass').on('submit', function (e) {
e.preventDefault();  
var password = jQuery("#new_password").val();
 var expr = /^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{8,}$/;

    if (!expr.test(password)) { 
        $('#errPass').text('Enter alphabet, number, special character and Not Less then 6 and more then 8');
		return false;  
    }
    else {  
        $('#errPass').hide();
    }
 
 var  confirm_password= $('#confirm_password').val();

	if(confirm_password != password ){
		$("#cpass").html('Password Not Match');   return false;
	} else { $("#cpass").html(''); }
 
var formData = new FormData(this);
var url="<?= base_url('front/change_password'); ?>"; 

jQuery.ajax({
url:url,
type: 'POST',
data: formData,
success:function(data){
if(data == 'failed'){

	$('.erorr').html('<div class="alert alert-danger">Password Does Not Match</div>');
	
} else {
 	$('.erorr').html('<div class="alert alert-success">Password Updated Successfully</div>');
} 
},
cache: false,
contentType: false,
processData: false
});
});

jQuery('#clicktoupdate').on('click', function (e) {
var phone = $('#update_no').val();

$(".otpmo").html(phone);
var url="<?= base_url('front/update_otp_verify'); ?>"; 
jQuery.ajax({
type:'ajax',
method:'post',
url:url,
data: {'phone':phone},
success:function(data){ //alert(data);
var JSONObject = JSON.parse(data);
$(".otpgetm").html(JSONObject.otp);
var otpsend = $('.otpsendm').val();
$('#myModal2').modal('show');
},
});
});

$('#getmootp').on('click', function (e) {
e.preventDefault();
var getotp = $('.otpsendm').val();
var url="<?= base_url('front/check_otp_verify'); ?>"; 
jQuery.ajax({
type:'ajax',
method:'post',
url:url,
data: {'getotp':getotp},
success:function(data){ //alert(data);
if(data == 'true'){
$(".updatemobile").submit();
$('.erorrphone').html('<div class="alert alert-success">Mobile Number Updated Successfully</div>');
} else {
	$(".otperrorm").html("OTP Not Match");
}

},
});
});

$('.m-card-profile__details .edit_profile').on('click',function(e){
    e.preventDefault(); 
    $('.view_profile').hide();
    $('.change_password_tab').hide();
    $('.edit_profile_tab').show();
});

$('.cancel_profile').on('click',function(e){
    e.preventDefault(); 
    $('.edit_profile_tab').hide();
    $('.change_password_tab').hide();
    $('.view_profile').show();
});
$('.change_password').on('click',function(e){
    e.preventDefault(); 
    $('.view_profile').hide();
    $('.edit_profile_tab').hide();
    $('.change_password_tab').show();
});

});
</script>