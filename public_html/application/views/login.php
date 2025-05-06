<?php include "header.php";?>



        	<!-- Header Section -->
            <div class="innerHeader">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-5 wow bounceInLeft">
                            <h1>Login</h1>
                        </div>
                    </div>
                </div>
            </div>



            <section class="login">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-5 wow slideInLeft">
                           	<h1>Login Now!</h1>
                        	<div class="loginBox">
                                <?php echo form_open('front/login_check'); ?>
                                    <div class="input-group">
                                        <label>Email</label>
                                       <?php echo form_input(['name' => 'email', 'class' => 'form-control','placeholder'=>'National ID or Case numbers or Email','required'=>true]); ?>
                                    </div>
                                    <div class="input-group">
                                        <label>Password</label>
                                       <?php echo form_password(['name' => 'password', 'class' => 'form-control','required'=>true]); ?>
                                    </div>
									
                                    <div class="input-group">
                                    
									<script src="https://www.google.com/recaptcha/api.js"></script>
									<div class="g-recaptcha" data-sitekey="6Le4PCMUAAAAAHGAJKRqKgIeXOT38O9bcUrJKNnI"></div>
									<div id="g-recaptcha"></div>
                                    </div>
                                     <div class="input-group">
                                       <input type="checkbox" name="rememberme"> Remember Me</input>
                                    </div>
                                    <div class="input-group">
                                            <?php echo form_submit(['value' => 'Login', 'class' => 'form-control']); ?>
                                    </div>
                                   
                                    <div class="input-group forgotPassword">
                                        <a href="<?= base_url('front/forgotPassword'); ?>">Forgot your password?</a>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="col-sm-7 wow slideInRight">
                           	<h1>Sign Up Now!</h1>
                        	<div class="registrationBox loginBox">
                            	<p>Is characterized by the quality of its legal services to be a specialized office to provide information and legal advice in light of the momentum enjoyed by the areas of life of the diverse legal needs of commercial establishments and others</p>
                                <div align="right"><a href="<?=base_url('front/terms');?>" class="btn">Start Your Case</a></div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

           <section id="mobileApp" class="module parallax parallax-1 mobileApp">
                <div class="blackWrap">
                    <div class="container">
                        <div class="row">
                            <div class="col-sm-7"></div>
                            <div class="col-sm-5 wow bounceInDown">
                                <div class="title-box">
                                    <p class="section-subtitle">Download our</p>
                                    <h2 class="section-title">Mobile App</h2>
                                </div>
                                <p>We create the first integrated E-law service platform to help you with your law services and make your life match easier and faster, download the application now and start your E-service with us.</p>
                                <div class="mobileAppBtn">
                                    <a href="#"><img src="<?=base_url('assets/front/assets/images/btn1.png');?>" alt="" border="0"></a>
                                    <a href="#"><img src="<?=base_url('assets/front/assets/images/btn2.png');?>" alt="" border="0"></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <div class="clear"></div>
            <!-- Application -->

        	 <!-- Contact -->
           <div id="contact" class="contact footerbot">
                <div class="row noMP">
                    <div class="col-sm-4">
                        <div class="contactInformation">
                            <div class="contactItem contactPhone">Feel Free to Call Us Now <span>920002916</span></div>
                            <div class="contactItem contactCalendar">Working Hours <span>Sunday-Thursday 9:00 AM - 4:00 PM</span></div>
                            <div><a href="<?=base_url('front/contact_us');?>" class="btn btn-black">Contact Us</a></div>
                        </div>
                    </div>
                    <div class="col-sm-8">
                        <div class="contactInformation">						
						<div class="">
							<?php if($error=$this->session->flashdata('flashSuccess')): ?>
							<div class="col-lg-12">
							  <div class="alert alert-danger">
								<?= $error ?>
							  </div>
							</div>
						<?php endif; ?>
							<div class="">
									<?php echo form_open('front/home_contact_us_data', ['class' => 'front-text']); ?>
								<div class="form-group col-sm-6">
										<?php echo form_input(['name' => 'name', 'class' => 'form-control', 'placeholder' => 'Name*','required'=>true]); ?>
								</div>
								<div class="form-group col-sm-6">
										<?php echo form_input(['name' => 'phone', 'class' => 'form-control', 'placeholder' => 'Phone*','required'=>true]); ?>
								</div>
								<div class="form-group col-sm-6">
										<?php echo form_input(['name' => 'email',   'type'  => 'email','class' => 'form-control', 'placeholder' => 'Email*','required'=>true]); ?>
								</div>
								<div class="form-group col-sm-6">
										<?php echo form_input(['name' => 'subject', 'class' => 'form-control', 'placeholder' => 'Subject*','required'=>true]); ?>
								</div>
								<div class="form-group col-sm-12">
										<?php echo form_textarea(['name' => 'message', 'class' => 'form-control', 'rows' => 5, 'placeholder' => 'Message*','required'=>true]); ?>
								</div>
								<div class="form-group col-sm-12">
									 <div class="g-recaptcha" data-sitekey="6Le4PCMUAAAAAHGAJKRqKgIeXOT38O9bcUrJKNnI"></div>
									  <div id="g-recaptcha"></div>
								</div>
								<div class="form-group col-sm-12">
									<?php echo form_submit(['value' => 'Send', 'class' => 'btn btn-primary btn-lg']); ?>
								</div>
								<?php echo form_close(); ?>
							</div>
						</div>
                        </div>
                    </div>
                </div>
            </div>
<?php include "footer1.php";?>
 <script>
            $("form").submit(function(event) {
               var recaptcha = $("#g-recaptcha-response").val();
               if (recaptcha === "") {
                  event.preventDefault();
                  $('#g-recaptcha').html('<span style="color:red">Please check the recaptcha</span>');
               }
            });
       $(document).ready(function(){
 
           $('.captcha-refresh').on('click', function(){
 
               $.get('<?php echo base_url().'captcha/refresh'; ?>', function(data){
 
                   $('#image_captcha').html(data);
 
               });
 
           });
 
       });
 
   </script>
 
