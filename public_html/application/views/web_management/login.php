<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang=""> <!--<![endif]-->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title><?php echo $this->lang->line('Albarakati_Login');?></title>
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

</head>

<body class="bg-dark">


    <div class="sufee-login d-flex align-content-center flex-wrap">
        <div class="container">
            <div class="login-content">     <div class="login-form">
    <div class="login-logo">
                    <a href="index.html">
				<img src="<?= base_url('assets/images/img/logo.svg'); ?>" alt="" border="0">
                    </a>
                </div>
           
                <?= form_open('web_management/cms/login_check'); ?>
                        <div class="form-group">
                            <label><?php echo $this->lang->line('Email_address');?></label>
             <?= form_input(['id'=>'email','name'=>'email','class'=>'form-control','value'=>set_value('email'),'placeholder'=>'Email','required'=>'required']);?>
				<?php echo form_error('email'); ?>  
                           
                        </div>
                        <div class="form-group">
                            <label><?php echo $this->lang->line('Password');?></label>
            <?= form_password(['id'=>'password','name'=>'password','class'=>'form-control','placeholder'=>'Enter Password']);?>
            <?= form_error('password'); ?>
                        </div>
                        <div class="checkbox">
                            <label>
                                <input type="checkbox"> <?php echo $this->lang->line('Remember_Me');?>
                            </label>
                            <label class="pull-right">
                                
                            </label>

                        </div>
                        <?php $submit=$this->lang->line('Sign_in'); echo form_submit(['name'=>'submit','value'=>$submit,'class'=>'btn btn-success btn-flat m-b-30 m-t-30']); ?>
                    <?= form_close(); ?>
                </div>
            </div>
        </div>
    </div>


    <script src="<?= base_url('assets/js/vendor/jquery-2.1.4.min.js'); ?>"></script>
    <script src="<?= base_url('assets/js/popper.min.js'); ?>"></script>
    <script src="<?= base_url('assets/js/plugins.js'); ?>"></script>
    <script src="<?= base_url('assets/js/main.js'); ?>"></script>


</body>
</html>

