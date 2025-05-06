<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="icon" href="<?=base_url('assets/front/assets/images/favicon.ico');?>" type="image/png">
        <title>Albarakati Law</title>
        <link href="<?=base_url('assets/front/assets/css/bootstrap.min.css');?>" rel="stylesheet">
        <link href="<?=base_url('assets/css/bootstrap-select.min.css');?>" rel="stylesheet">
        <link href="<?=base_url('assets/css/ionicons.min.css');?>" rel="stylesheet">
    	<link href="<?=base_url('assets/front/assets/css/font-awesome.min.css');?>" rel="stylesheet" type="text/css">
        <link href="<?=base_url('assets/front/assets/css/owl.carousel.css');?>" rel="stylesheet">
        <link href="<?=base_url('assets/front/assets/css/owl.carousel.theme.min.css');?>" rel="stylesheet">
        <link href="<?=base_url('assets/front/assets/css/main.css');?>" rel="stylesheet">
        <link href="<?=base_url('assets/front/assets/css/animate.css');?>" rel="stylesheet">
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->

    </head>
    <body data-spy="scroll" data-target="#main-navbar">

		
            <div class="headerBar">
                <div class="container">
                    <div class="row">
                        <div class="col-md-2 col-sm-6 col-xs-6">
                        <a href="<?=base_url();?>"><img class="img-responsive mainLoog" src="<?=base_url('assets/front/assets/images/logo.png');?>" alt="logo"></a>
                        </div>
                        <div class="col-md-10 col-sm-12" align="right">
                            <ul class="topTags">
                            <li>
                            	<a href="<?=base_url();?>"><i class="fa fa-home"></i></a>
                            </li>
                                <li><a href="<?=base_url('front/login');?>"><i class="fa fa-lock"></i></a></li>
                                <li>
                                	 <a href='<?php echo base_url('langswitch/switchLanguage/english'); ?>'>En</a>
                                    <a href='<?php echo base_url('langswitch/switchLanguage/arabic'); ?>'>Ar</a>
                                </li>
                            </ul>
                            <nav class="navbar navbar-default">
                                <div class="navbar-header">
                                  <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#main-navbar" aria-expanded="false">
                                    <span class="sr-only">Toggle navigation</span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                  </button>
                                  <div class="collapse navbar-collapse pull-right" id="navbarSupportedContent">
                                        <ul class="navbar-nav mr-auto">
                                            <!--<li class="nav-item active"><a class="nav-link" href="<?= base_url('front'); ?>">Home <span class="sr-only">(current)</span></a></li>-->
                                            <li class="nav-item"><a href="<?= base_url('/front/about_us'); ?>">About us</a></li>
 <li class="nav-item"><a href="<?= base_url('/front/ourteam'); ?>">Team Staff</a></li>
 <li class="nav-item"><a href="<?= base_url('/front/news'); ?>">Social Responsibility</a></li>
                                            <li class="nav-item"><a href="<?= base_url('#services'); ?>">E-services</a></li>
                                            <li class="nav-item"><a href="<?= base_url('#contact'); ?>">Contact</a></li>
                                        </ul>
                                   </div>
                                </div>
                			</nav>
                        </div>
                    </div>
                </div>
            </div>

        	<!-- NavigationBar Section -->