            <footer>
            	<div class="container">
                    <div class="row">
                        <div class="col-sm-3 wow bounceInLeft">
                        	<ul class="foolinks">
                              
                                <li><a href="<?php echo base_url(); ?>about_us">About Us</a></li>
                                <li><a href="<?php echo base_url(); ?>services">Legal Services</a></li>
                                <li><a href="<?php echo base_url(); ?>news">Social Responsibility</a></li>
                                <li><a href="<?php echo base_url(); ?>jobs">Join us</a></li>
							</ul>
                        </div>
                        <div class="col-sm-3 wow bounceInDown">
                        	<ul class="foolinks">
                                <li><a href="<?php echo base_url(); ?>training">Training</a></li>
                                <li><a href="<?php echo base_url(); ?>privacy">Privacy Policy</a></li>
                                <li><a href="<?php echo base_url(); ?>tandc">Terms & Conditions</a></li>
								<li><a href="<?php echo base_url('contact_us'); ?>">Contact</a></li>
							</ul>
                        </div>
                        <div class="col-sm-6 wow bounceInRight" align="center">
                        	<ul class="socialLinks">
                            	<li><a href="#"><img src="<?=base_url('assets/front/assets/images/facebook.png');?>" alt="" border="0"></a></li>
                            	<li><a href="#"><img src="<?=base_url('assets/front/assets/images/twitter.png');?>" alt="" border="0"></a></li>
                            	<li><a href="#"><img src="<?=base_url('assets/front/assets/images/linkedin.png');?>" alt="" border="0"></a></li>
                            	<li><a href="#"><img src="<?=base_url('assets/front/assets/images/gplus.png');?>" alt="" border="0"></a></li>
                            	<li><a href="#"><img src="<?=base_url('assets/front/assets/images/youtube.png');?>" alt="" border="0"></a></li>
                            </ul>
                            <div class="clearfix"></div>
                            <!--<div class="copyright">&copy; 2018 Albarakati Law ,Powered by <a href="http://hstait.com" target="_blank">hstait.com</a></div>-->
                        </div>
                    </div>
				</div>
            </footer>

        <!-- Scripts -->
 <script src="<?=base_url('assets/front/assets/js/jquery-1.12.3.min.js');?>"></script>
		<script src="<?= base_url('assets/js/audio/app.js'); ?>"></script>
    <script src="<?= base_url('assets/js/audio/Fr.voice.js'); ?>"></script>
    <script src="<?= base_url('assets/js/audio/jquery.js'); ?>"></script>
    <script src="<?= base_url('assets/js/audio/libmp3lame.min.js'); ?>"></script>
    <script src="<?= base_url('assets/js/audio/mp3Worker.js'); ?>"></script>
    <script src="<?= base_url('assets/js/audio/recorder.js'); ?>"></script>
        <script src="<?=base_url('assets/front/assets/js/bootstrap.min.js');?>"></script>
        <!--<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.10.0/js/bootstrap-select.min.js"></script>-->
        <script src="<?=base_url('assets/front/assets/js/owl.carousel.min.js');?>"></script>
        <script src="<?=base_url('assets/front/assets/js/wow.js');?>"></script>
		<script src="<?=base_url('assets/front/assets/js/script.js');?>"></script>
        <script src="<?=base_url('assets/js/bootstrap-datepicker.js')?>"></script>
		<script src="<?= base_url('assets/js/jquery.countdown.min.js'); ?>"></script>
		<script>
 
		</script>
		<script>
	$('#email').on('keyup', function(e){   //  e.preventDefault();
			var email  = $('#email').val(); 
           $.ajax({
                type: 'POST',
                url: '<?php echo base_url('front/email_check'); ?>',
                data: {email:email},
                success: function(response) {
					if(response == 'false'){ 
						$("#answers").html('Email already exist');  
					} 
					else 
					{ 
						$("#answers").html(''); 
					}
				}
            });
			 
        });
		$('#id_numbers').on('keyup', function(e){   //  e.preventDefault();
			var id_numbers  = $('#id_numbers').val(); 
           $.ajax({
                type: 'POST',
                url: '<?php echo base_url('front/id_numbers_check'); ?>',
                data: {id_numbers:id_numbers},
                success: function(response) {
					if(response == 'false'){ 
						$("#answersid").html('ID already exist');  
					} 
					else 
					{ 
						$("#answersid").html(''); 
					}
				}
            });
			 
        });
$('#sendf').on('click', function() {
	
	var password = $('#password').val();
	var  confirm_password= $('#confirm_password').val();

	if(confirm_password != password ){
		$("#cpass").html('Password Not Match');   return false;
	} else { $("#cpass").html(''); }
	
    if($('#answers').html() == '') {
            return true; alert($('#answers').val());
        } else { return false; alert(1); }

});
           $("#formlogin").submit(function(event) {
               var recaptcha = $("#g-recaptcha-response").val();
               if (recaptcha === "") {
                  event.preventDefault();
                  $('#g-recaptcha').html('<span style="color:red">Please check the recaptcha</span>');
               }
            });

</script>
<?php if(isset($_GET['popup'])) { ?>
<div class="modal fade " id="myModalpopup" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
       <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
			<div id="teamCarousel1" class="carousel slide teamCarousel" data-ride="carousel">
			<div class="carousel-inner" role="listbox">
			<?php 
			$i=0;foreach($data  as $team) { 
			?>

			<div class="item <?php if($i==0){ ?>active<?php } ?>">     
				<img src="<?= base_url('uploads/banner/'.$team['image']); ?>" alt="" border="0" class="img-responsive">

			   
			</div>
			<?php $i++; } ?>
			</div>

			<!-- Controls -->
			<a class="left carousel-control" href="#teamCarousel1" role="button" data-slide="prev">
			<span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
			<span class="sr-only">Previous</span>
			</a>
			<a class="right carousel-control" href="#teamCarousel1" role="button" data-slide="next">
			<span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
			<span class="sr-only">Next</span>
			</a>
			</div>
        </div>
      </div>
      
    </div>
</div><?php } ?>
<div class="modal fade otppopup" id="myModal1" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
      
        <div class="modal-body">
          <div class="loginBox ">
		  <h2 align="center">Enter OTP</h2>
<?php echo form_open('front/otp_verify',['class' => 'otpform','id'=>'formlogin']); ?>
<div class="col-sm-12">
<div class="input-group">
<p>Please enter the OTP which has been sent to the registered mobile number <span class="otpmo"></span>
<label>Enter OTP  <span class="otpget"></span></label>
<?php echo form_input(['name' => 'otp', 'class' => 'form-control']); ?>
<span style="color:red" class="otperror"></span>
</div>
<div class="input-group">
<?php echo form_submit(['value' => 'Submit', 'class' => 'form-control']); ?>
<?php echo form_submit(['value' => 'Resend OTP', 'class' => 'form-control grayBtn']); ?>
</div>
</div>
<div class="clear"></div>
</form>
</div>
        </div>
        <button type="button" class="btn btn-default closeBtn" data-dismiss="modal"><i class="fa fa-close"></i></button>
      </div>
      
    </div>
  </div>
<script>
<?php if(isset($_GET['popup'])) { ?>
jQuery('#myModalpopup').modal('show');
<?php } ?>
jQuery('.formlogin').on('submit', function (e) {
e.preventDefault();
$('.loginworking').html('<div class="alert alert-success">Please wait login in process</div>');
var url="<?= base_url('front/login_check'); ?>"; 
jQuery.ajax({
type:'ajax',
method:'post',
url:url,
data: $('#formlogin').serialize(),
success:function(data){
if(data == ''){
	$('.lgerror').html('Invalid ID and Password');
	$('.loginworking').html('');
	$('.caerror').html('');
}
else if(data == 'cfalse'){

	$('.caerror').html('Invalid captcha');
	$('.loginworking').html('');
	$('.lgerror').html('');
	
}

else if(data == 'block'){
	$('.blockerror').html('You are blocked. Please contact to administrator for more information.');
	$('.loginworking').html('');
	$('.lgerror').html('');
}
else{
$('#myModal').modal('hide');
var JSONObject = JSON.parse(data);
$(".otpget").html(JSONObject.otp);
$(".otpmo").html(JSONObject.phone);
$('#myModal1').modal('show');
}
},
});
});



jQuery('.formrigister').on('submit', function (e) {
e.preventDefault();  
var val = jQuery("#password").val();
 var expr = /^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{8,}$/;

    if (!expr.test(val)) { 
        $('#errPass').text('Enter alphabet, number, special character and Not Less then 6 and more then 8');
		return false;  
    }
    else {  
        $('#errPass').hide();
    }
 
if($('#answersid').html() != '') {  
return false;  
}
if($('#tremscheck').is(':checked') == false) {  
$('#tremerror').html('Please accept Terms and conditions');
$('.registreworking').html('');
return false;  
}
var formData = new FormData(this);
var url="<?= base_url('front/store_details'); ?>"; 
$('.registreworking').html('<div class="alert alert-success">Please wait register in process</div>');
jQuery.ajax({
url:url,
type: 'POST',
data: formData,
success:function(data){
if(data == 'cfalse'){
	$('.caerrorre').html('Invalid captcha');
	$('.loginworking').html('');
	$('.registreworking').html('');
 
	
} else {
$('#myModal').modal('hide');
var JSONObject = JSON.parse(data);
$(".otpget").html(JSONObject.otp);
$(".otpmo").html(JSONObject.phone);
localStorage.setItem('popupdata','true');
$('#myModal1').modal('show');
}
},
cache: false,
contentType: false,
processData: false
});
});



jQuery('.otpform').on('submit', function (e) { 
e.preventDefault();
if(localStorage.getItem('popupdata')){ morevalue = "true"; } else { morevalue = "false"; }
var url="<?= base_url('front/otp_verify'); ?>"; 
jQuery.ajax({
type:'ajax',
method:'post',
url:url,
data: $('.otpform').serialize() + "&regsucc=" + morevalue,
success:function(data){
if(data == 'true'){
	if(localStorage.getItem('popupdata')){
		localStorage.removeItem('popupdata');
		window.location.href = '<?php echo base_url("front/home"); ?>?popup=true';
	} else {
		window.location.href = '<?php echo base_url("front/home"); ?>';
	}
	
} else {
	$(".otperror").html("OTP Not Match");
}

},
});
});
</script>
<script>
$(document).ready(function(){
    $('.refreshCaptcha,#logpop,.regNow').on('click', function(){
        $.get('<?php echo base_url().'front/refresh'; ?>', function(data){
            $('#captImg').html(data);
        });
    });
});
$(document).ready(function(){
    $('.refreshCaptchaRe,#logpopRe').on('click', function(){
        $.get('<?php echo base_url().'front/refresh'; ?>', function(data){
            $('#captImgRe').html(data);
        });
    });
});
</script>
<!--Start of Tawk.to Script-->
<script type="text/javascript">
var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
(function(){
var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
s1.async=true;
s1.src='https://embed.tawk.to/5c2b6a9c7a79fc1bddf2dae9/default';
s1.charset='UTF-8';
s1.setAttribute('crossorigin','*');
s0.parentNode.insertBefore(s1,s0);
})();
</script>
<!--End of Tawk.to Script-->
    </body>
</html>