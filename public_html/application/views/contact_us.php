<?php
$nvc = "white-nav sticky shrink modern hover4 radius-drop";
$pageTitle = $this->lang->line("CONTACT_US");
include('header.php');
?>
<script src="https://www.google.com/recaptcha/api.js"></script>
<!-- CONTENT -->
<section id="home" class="sm-py white fullwidth  bg-soft-colored bg-soft bg-scroll cover" data-background="<?php echo base_url('assets');?>/content/etna/images/about_01.jpg">
    <!-- Container -->
    <div class="container">
        <div class="row calculate-height">
            <div class="t-left t-center-xs col-sm-12 col-xs-12">
                <h2><?= $pageTitle; ?></h2>
            </div>
        </div>
    </div>
    <!-- End Container -->
</section>
<!-- END CONTENT -->

<!-- BOXES -->
<section id="boxes" class="py">
    <!-- Container for boxes -->
    <div class="container">
        <!-- BOXES -->
        <div class="t-center row clearfix">
            <!-- Box -->
            <div class="col-sm-4 col-xs-12 sm-mt-mobile">
                <div data-toggle="modal" data-target="#modal1" class="c-pointer bg-gray1-hover border-1 border-gray2 slow sm-py click-effect dark-effect block">
                    <!-- Icon -->
                    <div class="inline-block colored1">
                        <i class="icon-phone text-lg1"></i>
                    </div>
                    <h4 class="xxs-mt bold-subtitle">
                        <?php echo $this->lang->line('FREE_TO_CALL_US');?>
                    </h4>
                    <h4 class="bold-subtitle xxs-mt" style="min-height:62px;">
                        <a href="tel:00966920002916" class="bold-subtitle underline-hover mini-mt block">920002916</a>
                    </h4>
                </div>
            </div>
            <!-- End Box -->
            <!-- Box -->
            <!-- Box -->
            <div class="col-sm-4 col-xs-12 sm-mt-mobile">
                <div data-toggle="modal" data-target="#modal3" class="c-pointer bg-gray1-hover border-1 border-gray2 slow sm-py click-effect dark-effect block">
                    <!-- Icon -->
                    <div class="inline-block colored1">
                        <i class="icon-envelope text-lg1"></i>
                    </div>
                    <h4 class="xxs-mt bold-subtitle">
                        <?php echo $this->lang->line('E_MAIL_US');?>
                    </h4>
                    <h4 class="bold-subtitle lh-sm xxs-mt" style="min-height:63px;">
                        <a href="">info@albarakatilaw.com</a>
                    </h4>
                </div>
            </div>
            <!-- End Box -->
            <div class="col-sm-4 col-xs-12 sm-mt-mobile">
                <div data-toggle="modal" data-target="#modal2" class="c-pointer bg-gray1-hover border-1 border-gray2 slow sm-py click-effect dark-effect block">
                    <!-- Icon -->
                    <div class="inline-block colored1">
                        <i class="icon-calendar text-lg1"></i>
                    </div>
                    <h4 class="xxs-mt bold-subtitle">
                        <?php echo $this->lang->line('WORKING_HOURS');?>
                    </h4>
                    <h4 class="bold-subtitle lh-sm xxs-mt">
                        <?php echo $this->lang->line('Sat_Thu');?><br>
                        <div class="a_ltr">9:00 AM - 1:30 PM
						<br>5:00 PM - 9:30 PM </div>
                    </h4>
                </div>
            </div>
            <!-- End Box -->
        </div>

    </div>
</section>


<!-- CONTACT SECTION -->
<section id="contact" class="py relative border-1 border-gray1 bg-gray1">
    <!-- Divider - Parent section should have .relative class -->
    <a href="#contact" class="icon-divider icon-md font-18 extrabold-subtitle gray5 bg-white border-1 border-gray1 circle">
        <i class="icon-envelope-letter"></i>
    </a>

    <div class="t-center">
        <h1 class="bold-title lh-sm">
            <?php echo $this->lang->line('Drop_Us_a_Message');?>
        </h1>
    </div>

    <!-- Container for form -->
    <div class="container">
        <!-- Form -->
        <div id="form" class="sm-mt t-center gray7">
            <!-- Contact Form -->
            <form id=" " action="front/contact_us_data" name="contact_form" method="post" data-max-file-size="2000000" data-max-file-size-error="File size must be less than 2mb" enctype="multipart/form-data">
                <!-- Half Inputs -->
                <div class="row no-mx">
                    <div class="col-sm-6 col-xs-12 no-pl mini-pr">
                        <!-- Name -->
                        <input type="text" name="name" id="name" required placeholder="<?php echo $this->lang->line('contact_form_name');?>" class="classic_form big radius-lg bg-white bs-light-focus">
                    </div>
                    <div class="col-sm-6 col-xs-12 no-pr mini-pl">
                        <!-- Email -->
                        <input type="email" name="email" id="email" required placeholder="<?php echo $this->lang->line('contact_form_email');?>" class="classic_form big radius-lg bg-white bs-light-focus">
                    </div>
                </div>
                <div class="row no-mx">
                    <div class="col-sm-6 col-xs-12 no-pr mini-pl">
                       
                        <input type="text" name="subject" id="subject" required placeholder="<?php echo $this->lang->line('contact_form_subject');?>" class="classic_form big radius-lg bg-white bs-light-focus">
                    </div>
                
                    <div class="col-sm-6 col-xs-12 no-pr mini-pl">
                       
                        <input type="text" name="phone" id="subject" required placeholder="<?php echo $this->lang->line('contact_form_phone');?>" class="classic_form big radius-lg bg-white bs-light-focus">
                    </div>
                </div>
                <!-- Message -->
                <textarea name="message" id="message" placeholder="<?php echo $this->lang->line('contact_form_message');?>" class="classic_form big radius bg-white bs-light-focus"></textarea>
				  <div class="form-group col-sm-12"><?php echo $this->lang->line('Check_Captcha');?><br>
					<div class="g-recaptcha" data-sitekey="6Le4PCMUAAAAAHGAJKRqKgIeXOT38O9bcUrJKNnI"></div>
				</div>
                <button type="submit" id="submit" class="bg-colored1 xl-btn font-12 long-btn xxs-mt slow width-auto click-effect white bold qdr-hover-6 radius-lg">
                    <?php echo $this->lang->line('SEND_MESSAGE');?>
                </button>
            </form>
            <!-- End Form -->
        </div>
        <!-- End #form div -->
    </div>

</section>
<!-- END CONTACT SECTION -->


<div class="row" id="maps">
    <div class="col-md-4">
        <div style="text-align: center;padding: 10px;font-size: 16px;background: #ffffff;color: #000000;"><?php echo $this->lang->line('Mecca');?></div>
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3715.8523348940375!2d39.87170931493819!3d21.356318985821794!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2zMjHCsDIxJzIyLjgiTiAzOcKwNTInMjYuMCJF!5e0!3m2!1sen!2ssa!4v1545139021715" width="100%" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
    </div>
    <div class="col-md-4">
        <div style="text-align: center;padding: 10px;font-size: 16px;background: #ffffff;color: #000000;"><?php echo $this->lang->line('Jeddah');?></div>
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3710.6141530567506!2d39.16279058505824!3d21.561937485711965!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x15c3d00c68db9685%3A0x6f901a23f470e1f1!2z2LTYsdmD2Kkg2YbYtdixINin2YTYqNix2YPYp9iq2Yog2YjYtNix2YPYp9mHINmE2YTZhdit2KfZhdin2Kkg2YjYp9mE2KfYs9iq2LTYp9ix2KfYqiDYp9mE2K3ZgtmI2YLZitip!5e0!3m2!1sar!2ssa!4v1545139059533" width="100%" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
    </div>
    <div class="col-md-4">
        <div style="text-align: center;padding: 10px;font-size: 16px;background: #ffffff;color: #000000;"><?php echo $this->lang->line('Riyadh');?></div>
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3623.219126077033!2d46.64054468499934!3d24.753674984104396!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2zMjTCsDQ1JzEzLjIiTiA0NsKwMzgnMTguMSJF!5e0!3m2!1sar!2ssa!4v1545139090916" width="100%" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
    </div>
</div>

<!-- END GOOGLE MAP -->

<?php
include('footer.php');
?>


