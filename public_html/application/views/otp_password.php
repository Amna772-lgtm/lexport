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
                          
                        	<div class="loginBox">
                                <?php echo form_open('front/otp_verify'); ?>
                                    <div class="input-group">
										<p>Please enter the OTP which has been sent to the registered mobile number xxxxxxxx8873.
                                        <label>Enter OTP  <?php echo  $this->session->userdata('otp');?></label>
                                       <?php echo form_input(['name' => 'otp', 'class' => 'form-control']); ?>
                                    </div>
                                    <div class="input-group">
                                            <?php echo form_submit(['value' => 'Submit', 'class' => 'form-control']); ?>
                                            <?php echo form_submit(['value' => 'Resed OTP', 'class' => 'form-control']); ?>
                                    </div>
                                   
                                 
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <section id="mobileApp" class="module parallax parallax-1 mobileApp">
            	<div class="blackWrap">
	            	<div class="container">
                        <div class="row">
                            <div class="col-sm-5 wow bounceInDown">
                                <div class="title-box">
                                    <p class="section-subtitle">Download our</p>
                                    <h2 class="section-title">Mobile App</h2>
                                </div>
                                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>
                                <div class="mobileAppBtn">
                                    <a href="#"><img src="<?=base_url('assets/front/assets/images/btn1.png');?>" alt="" border="0"></a>
                                    <a href="#"><img src="<?=base_url('assets/front/assets/images/btn2.png');?>" alt="" border="0"></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        	<!-- Application -->

        	<!-- Contact -->
            <div id="contact" class="contact footertop">
            	<div class="row noMP">
                    <div class="col-sm-7 noPad">
                        <!--<iframe src="https://www.google.com/maps/d/embed?mid=1b7-dJ7VaMJ5UDpNxlsryd1ORZzotEqqO&hl=en" width="100%" height="480" frameborder="0"></iframe>-->
                               <div class="homeMap">
                        <div class="homeMapOffices">
                            <div class="mapOfficeIcon mapOffice-HongKong">
                                <div class="mapOfficeOpen"><div class="tooltip-arrow-bottom"><a href="/offices/new-york">Hong Kong</a></div></div>
                            </div>
                            <div class="mapOfficeIcon mapOffice-Tokyo">
                                <div class="mapOfficeOpen"><div class="tooltip-arrow-bottom"><a href="/offices/tokyo">Mecca, Saudi Arabia
</a></div></div>
                            </div>
                            <div class="mapOfficeIcon mapOffice-Beijing">
                                <div class="mapOfficeOpen"><div class="tooltip-arrow-bottom"><a href="/offices/beijing">Jeddah, Saudi Arabia

</a></div></div>
                            </div>

                        </div>
                        <img src="http://timelyhub.com/law_admin/assets/front/assets/images/map.png" alt="" border="0" class="img-responsive" style="margin:25px 0px 0px 50px;">
                    </div>
                    </div>
                    <div class="col-sm-5">
                        <div class="contactInformation">
                            <div class="contactItem contactPhone">Feel Free to Call Us Now <span>920002916</span></div>
                            <div class="contactItem contactCalendar">Working Hours <span>Mon-Fri 9.00am - 4.00pm</span></div>
                            <div><a href="#" class="btn btn-black">Contact Us</a></div>
                        </div>
                    </div>
                </div>
            </div>
<?php include "footer1.php";?>
 <script>
 
       $(document).ready(function(){
 
           $('.captcha-refresh').on('click', function(){
 
               $.get('<?php echo base_url().'captcha/refresh'; ?>', function(data){
 
                   $('#image_captcha').html(data);
 
               });
 
           });
 
       });
 
   </script>
 
