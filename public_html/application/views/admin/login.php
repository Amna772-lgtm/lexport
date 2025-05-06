<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang=""> <!--<![endif]-->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Albarakati - Login</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel=apple-touch-icon" href="<?= base_url('apple-icon.png'); ?>">
    <link rel="shortcut icon" href="<?= base_url('favicon.ico'); ?>">

    <link rel="stylesheet" href="<?= base_url('assets/admin/css/normalize.css'); ?>">
    <link rel="stylesheet" href="<?= base_url('assets/admin/css/bootstrap.min.css'); ?>">
    <link rel="stylesheet" href="<?= base_url('assets/admin/css/font-awesome.min.css'); ?>">
    <link rel="stylesheet" href="<?= base_url('assets/admin/css/themify-icons.css'); ?>">
    <link rel="stylesheet" href="<?= base_url('assets/admin/css/flag-icon.min.css'); ?>">
    <link rel="stylesheet" href="<?= base_url('assets/admin/css/cs-skin-elastic.css'); ?>">
    <!-- <link rel="stylesheet" href="<?= base_url('assets/admin/css/bootstrap-select.less'); ?>"> -->
    <link rel="stylesheet" href="<?= base_url('assets/admin/scss/style.css'); ?>">

    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>

    <!-- <script type="text/javascript" src="https://cdn.jsdelivr.net/html5shiv/3.7.3/html5shiv.min.js"></script> -->
<style>
span#err_name p {
    color: red;
}
</style>
</head>

<body class="bg-dark">


    <div class="sufee-login d-flex align-content-center flex-wrap">
        <div class="container">
            <div class="login-content">
                
                <div class="login-form">
<div class="login-logo">
                    <a href="index.html">
				<img src="<?= base_url('assets/images/img/logo.svg'); ?>" alt="" border="0">
                    </a>
                </div>
                <!--<div><h1>Under maintenance</h1></div>-->
                <div style="display:block">
                <?= form_open('admin/login/login_check'); ?>
                	<?php if(form_error('password') != '' || form_error('email') !=''){ ?>
                	<div class="alert alert-danger loginErrorBox">
                		<?php echo form_error('email'); ?>
                		<?php echo form_error('password'); ?>
                	</div>
                	<?php
                	}
                	?>
                        <div class="form-group">
                            <label>Email address</label>
             <?= form_input(['id'=>'email','name'=>'email','class'=>'form-control','value'=>set_value('email')]);?>
				
                           
                        </div>
                        <div class="form-group">
                            <label>Password</label>
            <?= form_password(['id'=>'password','name'=>'password','class'=>'form-control']);?>
           
                        </div>
                         
						 <div class="row form-group">
						
						 <div class="col-md-4 ">
									<p id="captImg" style="margin-top:8px;"><?php echo $captchaImg; ?></p>	</div>
									 <div class="col-md-8 row"><p style="text-align:left;">Can't read the image? click <a href="javascript:void(0);" class="refreshCaptcha"><b>here</b></a> to refresh.<br>Enter the code (Case Sensitive): </p>		</div>
									  <div class="col-md-12 ">
									<input type="text" placeholder="Enter Captcha" name="captcha" value="" autocomplete="off" />  
									<span class="error" style="color:red" id='err_name'><?php echo form_error('captcha'); ?></span>
									</div>
						
							</div>
                        <?= form_submit(['name'=>'submit','value'=>'Sign in','class'=>'btn btn-success btn-flat m-b-30 m-t-30']); ?>
                    <?= form_close(); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <script src="<?= base_url('assets/js/jquery.min.js'); ?>"></script>
 
<script>
$(document).ready(function(){
    $('.refreshCaptcha').on('click', function(){
        $.get('<?php echo base_url().'admin/login/refresh'; ?>', function(data){
            $('#captImg').html(data);
        });
    });
});
</script>

</body>
</html>

