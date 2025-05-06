<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" dir="<?php  if($this->session->userdata('site_lang')=="arabic"  )  echo "rtl"; else echo ""; ?>" xml:lang="en" lang="<?php  if($this->session->userdata('site_lang')=="arabic"  ) echo "ar"; else echo "en"; ?>">
<head>
<?php // (isset($pageTitle)) ? $pageTitle . ' |' : ''; ?>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
 <title>الرئيسية | نصر البركاتي وشركاؤه للمحاماة</title>
<meta name="description" content="تأسست شركتنا لتكون امتدادًا لخبرةٍ قانونيةٍ استمرت لأكثر من خمسين عامًا (بدأت منذ عام 1954م)،-مشهود لها بجودة صياغتها وقوة ممارستها، فجعلنا منهاج الخبرة أساسًا لرسالتنا، ومنطلقًا لرؤيتنا، دامجين إليها أنفع المستجدات القانونية ،لمقاصد رفيعة هدفها حماية عملائنا، وإبداء الحلول ، وتفعيل المعالجات لمختلف الوقائع والقضايا ،مبتكرين وسائل إلكترونية لخدمة عملائنا، وتنفيذًا لأعمالنا." />
<!--Keywords -->
<meta name="keywords" content=" نصر البركاتي وشركاؤه للمحاماة" />
<meta name="author" content="نصر البركاتي" />
    <meta name="author" content="NASSR ALBARAKATI" />
    <meta name="viewport" content="width=device-width,initial-scale=1.0,maximum-scale=1" />
    <!-- favicon -->
    <link rel="apple-touch-icon" sizes="57x57" href="<?=base_url('assets/images');?>/favicon/apple-icon-57x57.png">
    <link rel="apple-touch-icon" sizes="60x60" href="<?=base_url('assets/images');?>/favicon/apple-icon-60x60.png">
    <link rel="apple-touch-icon" sizes="72x72" href="<?=base_url('assets/images');?>/favicon/apple-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="76x76" href="<?=base_url('assets/images');?>/favicon/apple-icon-76x76.png">
    <link rel="apple-touch-icon" sizes="114x114" href="<?=base_url('assets/images');?>/favicon/apple-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="120x120" href="<?=base_url('assets/images');?>/favicon/apple-icon-120x120.png">
    <link rel="apple-touch-icon" sizes="144x144" href="<?=base_url('assets/images');?>/favicon/apple-icon-144x144.png">
    <link rel="apple-touch-icon" sizes="152x152" href="<?=base_url('assets/images');?>/favicon/apple-icon-152x152.png">
    <link rel="apple-touch-icon" sizes="180x180" href="<?=base_url('assets/images');?>/favicon/apple-icon-180x180.png">
    <link rel="icon" type="image/png" sizes="192x192"  href="<?=base_url('assets/images');?>/favicon/android-icon-192x192.png">
    <link rel="icon" type="image/png" sizes="32x32" href="<?=base_url('assets/images');?>/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="96x96" href="<?=base_url('assets/images');?>/favicon/favicon-96x96.png">
    <link rel="icon" type="image/png" sizes="16x16" href="<?=base_url('assets/images');?>/favicon/favicon-16x16.png">
    <link rel="manifest" href="<?=base_url('assets/images');?>/favicon/manifest.json">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="<?=base_url('assets/images');?>/favicon/ms-icon-144x144.png">
    <meta name="theme-color" content="#ffffff">
	
	<link href="<?=base_url('assets');?>/vendors/socicon/css/socicon.css" rel="stylesheet" type="text/css"/>
    <link href="<?=base_url('assets');?>/vendors/vendors/flaticon/css/flaticon.css" rel="stylesheet" type="text/css"/>
    <link href="<?=base_url('assets');?>/vendors/jstree/dist/themes/default/style.css" rel="stylesheet" type="text/css"/>
    <link href="<?=base_url('assets');?>/vendors/vendors/metronic/css/styles.css" rel="stylesheet" type="text/css"/>
    <link href="<?=base_url('assets');?>/vendors/chartist/dist/chartist.min.css" rel="stylesheet" type="text/css"/>
    <link href="<?=base_url('assets');?>/vendors/dropzone/dist/dropzone.css" rel="stylesheet" type="text/css"/>

    <link href="<?= base_url('assets'); ?>/demo/base/style.bundle.css?v=<?= time(); ?>" rel="stylesheet" type="text/css"/>

    <!-- CSS Files -->
    <link rel="stylesheet" href="<?php echo base_url('assets/');?>css/plugins.css?v=2.4"/>
    <!-- Component for sidebar -->
    <link rel="stylesheet" href="<?php echo base_url('assets/');?>css/components/sidebar.min.css"/>
    <!-- Revolution Slider -->
    <link rel="stylesheet" href="<?php echo base_url('assets/');?>css/revolutionslider/settings.css" />
    <!-- Theme Styles -->
    <link rel="stylesheet" href="<?php echo base_url('assets/');?>css/theme.css?v=2.4"/>
    <!-- Page Styles -->
    <link rel="stylesheet" href="<?php echo base_url('assets/');?>content/etna/css/etna.css" />
    <link rel="stylesheet" href="<?php echo base_url('assets/');?>css/ev.css" />
    <link rel="stylesheet" href="<?php echo base_url('assets/');?>css/components/twentytwenty.css" />
    <!-- Custom Styles -->
    <link rel="stylesheet" href="<?php echo base_url('assets/');?>css/uploadfile.css" />
    <link rel="stylesheet" href="<?php echo base_url('assets/');?>css/custom.css" />
    <link rel="stylesheet" href="<?php echo base_url('assets/');?>css/intlTelInput.css" />
    <!-- End Page Styles -->
<style>
a.pagination.right {
    float: right;
}

a.pagination.left {
    float: left;
}
.intl-tel-input input {
    height: 39px;
}
.intl-tel-input .flag-dropdown {
    top: 1px;
}
.regNow {cursor: pointer;}
input[type="number"]::-webkit-outer-spin-button, input[type="number"]::-webkit-inner-spin-button {
    -webkit-appearance: none;
    margin: 0;
}
tr.submissions {
    background: #cbe2cb !important;
}
.dataTables_info {
    display: none;
}
.dwndelbtn .btn-success {
    color: #fff !important;
    background-color: #28a745 !important;
    border-color: #28a745 !important;
}
.dwndelbtn {
    margin-top:10px;
}

.putaudiores .dwndelbtn {
    margin-top:0px;
}
.bootbox-close-button{
    font-size:40px !important;
}
a.num_tab {
    padding: 7px 10px;
    border-radius: 2px;
    color: #fff !important;
}
 .login_ca_bu {
    padding: 10px;
    background: #caa457;
    color: #ffffff;
}
input[type="number"] {
    -moz-appearance: textfield;
}
.ajax-file-upload-error {
    width: 400px;
    word-wrap: break-word;
}
.drop-msg2 {
    width: 45px;
    opacity: .5;
    height: 45px;
    line-height: 45px;
    z-index: 100;
    display: block;
    position: fixed;
    cursor: pointer;
    right: 75px;
    bottom: 70px;
    border-radius: 7px;
    border-width: 1px;
    border-style: solid;
    text-align: center;
    color: #777;
    background: white;
    border-color: #ddd;
    -webkit-transition: transform 0.8s cubic-bezier(0.77, 0, 0.2, 1) !important;
    -moz-transition: transform 0.8s cubic-bezier(0.77, 0, 0.2, 1) !important;
    transition: transform 0.8s cubic-bezier(0.77, 0, 0.2, 1) !important;
    -webkit-transform: translateZ(0);
    transform: translateZ(0);
}
</style>
<?php if($this->session->userdata('site_lang')=="arabic"  ) { ?>
     <link rel="stylesheet" href="<?php echo base_url('assets/');?>css/rtl.css?v=<?= time(); ?>" />
<style>
.ar_body .modal .modal-body .close{
right:initial;
background: transparent;
top: 10px; 
left:10px;
}
.action i.fa {
    margin-left: -15px !important;
}
</style>
<?php } ?>
</head>

<!-- BODY START -->
<body class="<?php if($this->session->userdata('site_lang')=="arabic"  ) { echo "ar_body"; }?>">

<!-- LOADER -->

<?php if($this->session->userdata('verify') == 'false' || $this->session->userdata('verify') == '' ) { ?>
<div class="page-loader bg-white">
    <div class="v-center t-center">
        <div class="spinner">
            <div class="spinner__item1 bg-colored1"></div>
            <div class="spinner__item2 bg-colored1"></div>
            <div class="spinner__item3 bg-colored1"></div>
            <div class="spinner__item4 bg-colored1"></div>
        </div>
    </div>
</div>
<!-- SIDEBAR -->
<div id="sidebar" class="ui right sidebar vertical overlay menu styled bg-soft bg-soft-white cover" data-background="<?php echo base_url('assets');?>/content/etna/images/about_02.jpg">
    <div class="sidebar-container">
        <!-- Title -->
        <h3 class=" uppercase colored"><?php echo $this->lang->line("ALBARAKATI_E_SERVICES");?></h3>

        <br>

        <nav>
            <div class="nav nav-tabs" id="nav-tab" role="tablist">
                <a class="nav-item inline-block nav-link active" id="nav-login-tab" data-toggle="tab" href="#nav-login" role="tab" aria-controls="nav-home" aria-selected="true"><?php echo $this->lang->line("LOGIN");?></a>
                <a class="nav-item inline-block nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-reg" role="tab" aria-controls="nav-profile" aria-selected="false"><?php echo $this->lang->line("Register");?></a>
            </div>
        </nav>
        <div class="tab-content xs-mt" id="nav-tabContent">
            <div class="tab-pane fade show active" id="nav-login" role="tabpanel" aria-labelledby="nav-home-tab">
                <!-- Title -->
				<span class="loginworking"></span>  
				<p class="blockerror" style="color:red"></p>
				
                <h4 class="subtitle uppercase"><?php echo $this->lang->line("LOGIN");?></h4>
				<span class="lgerror" style="color:red"></span><br>
              <?php echo form_open('front/login_check', ['class' => 'formlogin','id'=>'formlogin']); ?>
                    <!-- Half Inputs -->
                    <!-- Company -->
					
                      <label for="company"><?php echo $this->lang->line("Email_or_Mobile");?></label>
                  
					<?php echo form_input(['name' => 'email','type' => 'text', 'class' => 'classic_form','required'=>true]); ?>
					   
                    <label for="company2"><?php echo $this->lang->line("Password");?></label>
                   <?php echo form_password(['name' => 'password', 'class' => 'classic_form','required'=>true]); ?>
  
					<p id="captImg" style="margin-top:8px;    float: left;"></p>
				<!--	
				<p style="text-align:left;">Can't read the image? click <a href="javascript:void(0);" class="refreshCaptcha">here</a> to refresh.<br>Enter the code (Case Sensitive): </p>
					-->
            <p style=" float: left;margin-top: 24px; margin-left: 5px;"><a href="javascript:void(0);" class="refreshCaptcha"> <i class="fa fa-refresh" aria-hidden="true" style="color: #caa457; font-size: 20px;"></i> </a>  </p>
					<input type="text" name="captcha" value="" class="classic_form"/ autocomplete="off" style=" margin-top: 5px; ">  <span class="error" id='err_name'><?php echo form_error('captcha'); ?></span>
					<span class="caerror" style="color:red"></span><br>
					 
                      <!-- Half -->

                    <div class="t-center xs-mt">
            
							<?php echo form_submit(['value' => $this->lang->line("LOGIN"), 'class' => 'qdr-hover-1-bottom px-30 py-7 bg-colored white nowrap uppercase']); ?>
                    </div>
                </form>

                <P style="text-align: center;margin-top: 10px"><a href="<?= base_url('forgotPassword'); ?>"><?php echo $this->lang->line("Forgot_password");?></a></P>
            </div>
            <div class="tab-pane fade" id="nav-reg" role="tabpanel" aria-labelledby="nav-reg-tab">
			<span class="registreworking"></span>
                <h4 class="subtitle uppercase"><?php echo $this->lang->line("Register");?></h4>

                <?php echo form_open_multipart('front/store_details', ['class' => 'formrigister front-text valform','id'=>'formrigister']); ?>
                    <!-- Half Inputs -->
                    <!-- Company -->
					<div id="opnamefound" class="" style=" color: red;"></div> 
                    <label for="company"><?php echo $this->lang->line("Full_name");?>*</label>
                  
					<input type="text" class="classic_form" name="firstname" minlength="15" maxlength="45" required>
							<span id="fnamereq" style="color: red;margin-top: -18px;display: block;margin-bottom: -26px;"></span><br>
                    <label for="company2"><?php echo $this->lang->line("Email_ID");?>*</label>
                    <input type="email" class="classic_form" id='email' name="email" required>
					<span id="answers" style=" color: red; "></span><br>
					
                    <!-- Half -->

             <!--       <label for="company2"><?php echo $this->lang->line("ID_type");?>*</label>
                    <select name="id_type" id="identification_types" class="classic_form" style="border-radius: 0;" required="">
                        <option value="CR">CR</option>
                        <option value="National Id">National Id</option>
                        <option value="Aqama">Aqama</option>
                        <option value="Other">Other</option>
                    </select>

                    <label for="company2"><?php echo $this->lang->line("ID_numbers");?>*</label>
                    <input type="text" class="classic_form" id="id_numbers" name="id_numbers" pattern=".{10,10}"  maxlength="10" onkeyup="this.value=this.value.replace(/[^\d]/,'')" required title="ID numbers must be 10"> 
				<span id="answersid" style=" color: red; "></span><br>
                    <!-- Half -->

                    <div class="row">
                        <div class="col-md-5">
                            <label for="company2"><?php echo $this->lang->line("Country_Code");?>*</label>
							<input type="text" class="classic_form" name="ctcode" id="mobile-number" value="" readonly>
                            
                        </div>
                        <div class="col-md-7">
                            <label for="company2"><?php echo $this->lang->line("Contact_number");?>*</label>
                            	<input type="number" class="classic_form" name="phone" id="clno" required>
                            	<div id="errclno" style="color: red; font-size: 12px; margin-bottom: 4px; margin-top: -17px !important;"></div>
                        </div>
                    
                    </div>

                    <label for="company2"><?php echo $this->lang->line("Password");?>*</label>
 
					<?php echo form_password(['name' => 'password','id'=>'password', 'class' => 'classic_form','required'=>TRUE]); ?>
					<span id="errPass" style="color:red; font-size: 11px;"></span><br>
                    <!-- Half -->

                    <label for="company2"><?php echo $this->lang->line("Confirm_Password");?>*</label>
					<?php echo form_password(['name' => 'confirm_password', 'id' => 'confirm_password', 'class' => 'classic_form','required'=>TRUE]); ?>
				<span id="cpass" style=" color: red; "></span><br>
                    <!-- Half -->
					
                     <input type="checkbox" id="tremscheck"><a href="<?php echo base_url('/tandc'); ?>" target="_blank"><?php echo $this->lang->line("Accept_Terms");?></a><span id="tremerror" style=" color: red; "></span>
                    <!-- Half -->
									<p id="captImgRe" style="margin-top:8px;float: left"></p>
									<p style=" float: left;margin-top: 24px; margin-left: 5px;"><a href="javascript:void(0);" class="refreshCaptchaRe"> <i class="fa fa-refresh" aria-hidden="true" style="color: #caa457; font-size: 20px;"></i> </a>  </p>
		
								<!--	<p style="text-align:left;">Can't read the image? click <a href="javascript:void(0);" class="refreshCaptchaRe">here</a> to refresh.<br>Enter the code (Case Sensitive): </p>-->
									<input type="text" class="classic_form" name="captcha" value="" autocomplete="off"/ style=" margin-top: 5px; ">  <span class="error" id='err_name'><?php echo form_error('captcha'); ?></span>
									<span class="caerrorre" style="color:red"></span><br>
                    <div class="t-center ">
                        
						<?php echo form_submit(['name' => 'submit', 'id'=>'sendf' , 'value' => $this->lang->line("Register"), 'class' => 'qdr-hover-1-bottom px-30 py-7 bg-colored white nowrap uppercase']); ?>
                    </div>
                </form>
            </div>
        </div>


    </div>
</div>
<?php } ?>
<!-- END SIDEBAR -->


<!-- ALL THEME -->
<section id="all" class="pusher" >

    <!-- NAVIGATION - Select nav color and offset -->
    <?php if($this->session->userdata('user_id') == '') { ?>
    <nav id="navigation" class="<?= $nvc; ?>" data-offset="55" >
        <!-- Columns -->
        <div class="columns clearfix container-xl">
            <!-- Logo -->
            <div class="logo" data-infocard="#infocard">
                <a href="<?php echo base_url();?>">
                    <img src="<?php echo base_url('assets/images');?>/img/logo.svg" style="width: 200px;" data-second-logo="<?php echo base_url('assets/images');?>/img/logo.svg" alt="">
                </a>
            </div>
            <!-- Infocard -->
            <div id="infocard" class="infocard radius bg-white dark box-shadow radius-lg radius-no-rb o-hidden lh-normal" style="border-radius: 0 !important;">
                <div class="row calculate-height">
                    <!-- Left Details -->
                    <?php if($this->session->userdata('site_lang')=="arabic"  ) { ?>
                        <!-- right design -->
                    <div class="col-5" style="padding: 0;">
                        <img src="<?=base_url('assets/images/');?>img/bg_logo.png" class="card_by" />
                    </div>
                    <div class="col-7 font-14 t-left xs-py xs-pl">
                        <!-- Map -->
                        <a href="<?php echo base_url('front/map#maps');?>" data-iframe="true" class="lightbox merriweather gray8 italic light qdr-hover-5 text-primary inline-block">
                            Find us on Google Map
                        </a>
                        <!-- Details -->
                        <div class="font-13">
                            <p>920002916</p>
                            <a href="mailto:info@albarakatilaw.com" class="no-pm opacity-hover gray8">info@albarakatilaw.com</a>
                        </div>
                    </div>
                
                    <?php } else { ?>
                       <div class="col-7 font-14 t-left xs-py xs-pl">
                        <!-- Map -->
                        <a href="<?php echo base_url('front/map#maps');?>" data-iframe="true" class="lightbox merriweather gray8 italic light qdr-hover-5 text-primary inline-block">
                            Find us on Google Map
                        </a>
                        <!-- Details -->
                        <div class="font-13">
                            <p>920002916</p>
                            <a href="mailto:info@albarakatilaw.com" class="no-pm opacity-hover gray8">info@albarakatilaw.com</a>
                        </div>
                    </div>
                    <!-- right design -->
                    <div class="col-5" style="padding: 0;">
                        <img src="<?=base_url('assets/images/');?>img/bg_logo.png" class="card_by" />
                    </div>
                    <?php } ?>
                </div>
            </div>
            <!-- End Infocard -->
            <!-- Right Elements; Nav Button, Language Button, Search .etc -->
            <div class="nav-elements">
                <ul class="clearfix nav">
                    <!-- Search Button -->
                    <!-- Item With Dropdown -->
                    <li class="dropdown-toggle">
                        <?php if($this->session->userdata('site_lang')=="arabic"  ) { ?>
                        <a href="<?php echo base_url('langswitch/switchLanguage/english'); ?>" class="flag-item"><img src="<?php echo base_url('assets/images');?>/img/flag-usa.png" alt=""> <span>EN</span></a>
                        <?php } else { ?>
                        <a href="<?php echo base_url('langswitch/switchLanguage/arabic'); ?>" class="flag-item"><img src="<?php echo base_url('assets/images');?>/img/flag_ksa.png" style="border-radius: 50%;width: 20px;height: 22px;" alt=""> <span>Ar</span></a>
                        <?php } ?>
                        <!-- Dropdown -->      
                    </li>
                    <!-- Sidebar Button -->
                    <li class="loginMobileMenuSidebar">
                        <div class="sidebar-button">
							<?php if($this->session->userdata('user_id') != '' && $this->session->userdata('verify') == 'true') { ?>
							<a href="<?php echo base_url('front/dashboard');?>" title="Dashboard"><span style="display: inline" class="login_ca_bu"><?php echo  $this->lang->line("Dashboard");?></span></a>
							<?php } else { ?> 
							<div class=""><span style="display: inline" class="regNow login_ca_bu"><?php echo $this->lang->line("Sign_in");?></span></div>
							<?php } ?>
                            
                        </div>
                    </li>
                    <li><a href="https://www.albarakatilaw.com/admin/login"><i class="fa fa-group"></i></a></li>
                </ul>
            </div>
             
                        <div class="sidebar-button loginDeskMenuSidebar">
							<?php if($this->session->userdata('user_id') != '' && $this->session->userdata('verify') == 'true') { ?>
							<a href="<?php echo base_url('front/dashboard');?>" title="Dashboard"><span style="display: inline" class="login_ca_bu"><?php echo  $this->lang->line("Dashboard");?></span></a>
							<?php } else { ?> 
							<div class=""><span style="display: inline" class="regNow login_ca_bu"><?php echo $this->lang->line("Sign_in");?></span></div>
							<?php } ?>
                            
                        </div>
                    
            <!-- End Navigation Elements -->
            <!-- Navigation Menu -->
            <div class="nav-menu">
                <ul class="nav clearfix uppercase">
                    <li><a href="<?php echo base_url(); ?>"><?php echo  $this->lang->line("home");?></a></li>
                    <li><a href="<?= base_url('about_us'); ?>"><?php echo  $this->lang->line("about_us");?></a></li>
                    <li><a href="<?= base_url('services'); ?>"><?php echo  $this->lang->line("Practices");?></a></li>
                                <li><a href="<?= base_url('ourteam'); ?>"><?php echo  $this->lang->line("team_staff");?></a></li>
                    <li><a href="<?= base_url('news'); ?>"><?php echo  $this->lang->line("social_responsibility");?></a></li>
        
                    <li><a href="<?= base_url('contact_us'); ?>"><?php echo  $this->lang->line("Contact_Us");?></a></li>
                </ul>
            </div>
            <!-- End Navigation Menu -->
        </div>
        <!-- End Columns -->
    </nav>
    <?php } ?>
    <!-- END NAVIGATION -->