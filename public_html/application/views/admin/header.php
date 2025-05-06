<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" dir="<?php if($this->session->userdata('admin_site_lang')=="english") echo ""; else echo "rtl"; ?>" xml:lang="en" lang="<?php if($this->session->userdata('admin_site_lang')=="english") echo "en"; else echo "ar"; ?>">
<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">

    
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title><?= (isset($pageTitle)) ? $pageTitle . ' |' : ''; ?><?php echo $this->lang->line('');?>Albarakati Law</title>
    <meta name="description" content="" />
    <!--Keywords -->
    <meta name="keywords" content="" />
    <meta name="author" content="Abdulhakim" />
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
	<link href="<?=base_url('assets');?>/vendors/perfect-scrollbar/css/perfect-scrollbar.css" rel="stylesheet" type="text/css"/>
	<link href="<?=base_url('assets');?>/vendors/socicon/css/socicon.css" rel="stylesheet" type="text/css"/>
    <link href="<?=base_url('assets');?>/vendors/vendors/flaticon/css/flaticon.css" rel="stylesheet" type="text/css"/>
    <link href="<?=base_url('assets');?>/vendors/jstree/dist/themes/default/style.css" rel="stylesheet" type="text/css"/>
    <link href="<?=base_url('assets');?>/vendors/vendors/metronic/css/styles.css" rel="stylesheet" type="text/css"/>
    <link href="<?=base_url('assets');?>/vendors/chartist/dist/chartist.min.css" rel="stylesheet" type="text/css"/>
    <link href="<?=base_url('assets');?>/vendors/dropzone/dist/dropzone.css" rel="stylesheet" type="text/css"/>

    <link href="<?=base_url('assets');?>/vendors/bootstrap-select/dist/css/bootstrap-select.css" rel="stylesheet" type="text/css" />
    <link href="<?=base_url('assets');?>/vendors/select2/dist/css/select2.css" rel="stylesheet" type="text/css" />

    <link href="<?=base_url('assets');?>/vendors/bootstrap-datepicker/dist/css/bootstrap-datepicker3.min.css" rel="stylesheet" type="text/css" />
    <link href="<?=base_url('assets');?>/vendors/bootstrap-datetime-picker/css/bootstrap-datetimepicker.min.css" rel="stylesheet" type="text/css" />

	
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
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    
<?php if($this->session->userdata('admin_site_lang')=="arabic" OR $this->session->userdata('admin_site_lang')=="" ) { ?>
	    <link rel="stylesheet" href="<?php echo base_url('assets/demo/base/style.bundle.rtl.css');?>" /> 
    <link rel="stylesheet" href="<?php echo base_url('assets/');?>css/admin-responsive.css?v=2.4"/>
	    <style>table .fa {
    margin-left: 8px;
}</style>
	<?php } ?>
<?php
$ck = json_decode($this->session->userdata('admin_permission'), true);
 
if ($this->session->userdata('permission')) {
	$datas = json_decode($this->session->userdata('permission'), true);  
} else {
    $datas =json_decode('{"1":{"1":1,"2":1,"3":1,"4":1,"5":1,"6":1,"7":1},"2":{"1":1,"2":1,"3":1,"4":1,"5":0,"6":0,"7":0},"3":{"1":1,"2":1,"3":1,"4":1,"5":0,"6":0,"7":0},"4":{"1":1,"2":1,"3":1,"4":1,"5":0,"6":0,"7":0},"5":{"1":1,"2":1,"3":1,"4":1,"5":0,"6":0,"7":0},"6":{"1":1,"2":1,"3":1,"4":1,"5":0,"6":0,"7":0}}', true);;
}
 
?>
    <!-- End Page Styles -->
 
  <style>
  .body_rtl table .fa {
    right: 4px !important;
}
  .dataTables_info {
    display: none;
}
  .hidetd{display:none;}
  .assignpopup .form-control {
    float: left;
    margin: 5px 0px;
}.calendars-popup {
    z-index: 99999 !important;
}
  .ajax-file-upload-error {
    width: 400px;
    word-wrap: break-word;
}
.form-error p {
color: red;
}
div#m_datatable_wrapper {
    width: 100%;
}
.m_datatable, .m-datatable--loaded {
    width: 100%;
}
	.m-stack.m-stack--desktop.m-stack--ver > .m-stack__item.m-stack__item--fluid {
            background: #f3f3f3;
        }

        .m-aside-menu .m-menu__nav {
            list-style: none;
            padding: 0px 0 30px 0;
        }

        .m-badge.m-badge--brand {
            background-color: #CAA457;
        }

        .m-aside-menu .m-menu__nav > .m-menu__item > .m-menu__link {
            padding: 9px 30px;
            border-bottom: 0px solid #172b4c;
        }

        .m-aside-menu .m-menu__nav > .m-menu__item {
            border-bottom: 1px solid #172b4c;
        }

        .m-portlet .m-portlet__head {
            border-bottom: 1px solid #ebedf2;
            background: #CAA457 url('<?=base_url('assets/images');?>/ic.svg');
            background-repeat: no-repeat;
            background-position: right !important;
            color: #fff;
            -webkit-border-top-left-radius: 20px !important;
            -webkit-border-top-right-radius: 20px !important;
            -moz-border-radius-topleft: 20px !important;
            -moz-border-radius-topright: 20px !important;
            border-top-left-radius: 20px !important;
            border-top-right-radius: 20px !important;
        }

        img.m--img-rounded.m--marginless {
            max-width: 30px !important;
            height: 40px !important;
        }

        .link_men_bg {
            background-repeat: no-repeat !important;
            background-position: left !important;
            background-size: 10% !important;
            margin-left: 10px !important;
        }

        .dbg {
            background: url('<?php echo base_url('assets/images/'); ?>img/icons/D1-1.png');
        }

        .dbg2 {
            background: url('<?php echo base_url('assets/images/');?>img/icons/E-111.png');
        }

        .dbg3 {
            background: url('<?php echo base_url('assets/images/');?>img/icons/Ar1-1.png');
        }

        .dbg4 {
            background: url('<?php echo base_url('assets/images/');?>img/icons/S222.png');
        }

        .dbg5 {
            background: url('<?php echo base_url('assets/images/');?>img/icons/Wr1-1.png');
        }

        .dbg6 {
            background: url('<?php echo base_url('assets/images/');?>img/icons/Co1-1.png');
        }

        .dbg7 {
            background: url('<?php echo base_url('assets/images/');?>img/icons/V333.png');
        }

        .calendar {
            background: url('<?php echo base_url('assets/images/');?>img/icons/calendar.png');
        }


        .dbg8 {
            background: url('<?php echo base_url('assets/images/');?>img/icons/G222.png');
        }

        .dbg9 {
            background: url('<?php echo base_url('assets/images/');?>img/icons/W-111.png');
        }

        .dbg10 {
            background: url('<?php echo base_url('assets/images/');?>img/icons/C1-1.png');
        }

        .btn:hover{
            color: #fff !important;
            background-color: #CAA455 !important;
            border-color: #CAA455 !important;
        }
        .tab-content .m-portlet__body {
            padding: 0;
        }
        .fa-arrow-down:before {
            content: "\2193";
            font-family: Flaticon;
        }

        .btn-primary {
            color: #fff;
            background-color: #102b4e;
            border-color: #102b4e;
        }

        .btn-primary:hover {
            background-color: #172b4c;
            border-color: #172b4c;
        }

        a:hover {
            color: #172b4c !important;
        }

        .m-menu__link-icon:hover {
            color: #172b4c !important;
        }

        .m-menu__link-text:hover {
            color: #f3f3f3 !important;
        }

        .client-list li a {
            width: 100%;
            padding: 50px;
        }
		
		.btn{
			font-family: inherit;
		}

        .client-list li a img {
            max-width: 100%;
        }

        /* FERONIA HOME */
        #home2 .box-slider-container {
            position: relative;
            width: 94%;
            left: 3%;
            top: 7%;
        }

        #home2 .home-boxes {
            position: absolute;
            width: 100%;
            height: auto;
            z-index: 30;
            margin: 0 auto;
        }

        #home2 .home-boxes .item {
            background-color: rgba(26, 26, 26, 0.5);
            padding: 35px 25px 32px 15px;
            -webkit-transition: all 0.5s;
            -moz-transition: all 0.5s;
            transition: all 0.5s;
            min-height: 200px;
            text-align: left;
        }

        #home2 .home-boxes .item .number {
            width: 75px;
            line-height: 1;
            font-size: 50px;
            padding-right: 15px;
            float: left;
            text-align: right;
            height: 100%;
        }

        #home2 .home-boxes .item .texts {
            width: 70%;
            width: calc(100% - 75px);
        }

        #home2 .home-boxes .item .texts h3 {
            font-size: 18px;
            margin: 0;
            margin-bottom: 8px;
            text-transform: uppercase;
            padding: 0;
        }

        #home2 .home-boxes .item .texts p {
            font-size: 16px;
        }

        #home2 .home-boxes .slick-arrow {
            background: transparent;
            border: none;
            position: absolute;
            color: white;
            bottom: -100px;
            left: 50%;
            width: 50px;
            height: 55px;
            opacity: 0.2;
            text-indent: -999px;
            overflow: hidden;
            background-position: center center;
            background-repeat: no-repeat;
            -webkit-transition: all 0.5s;
            -moz-transition: all 0.5s;
            transition: all 0.5s;
        }

        #home2:hover .home-boxes .slick-arrow {
            opacity: 1;
        }

        #home2 .home-boxes .slick-arrow.slick-prev {
            margin-left: -50px;
            background-image: url(<?=base_url('assets/images');?>/white-left-big.png);
        }

        #home2 .home-boxes .slick-arrow.slick-next {
            margin-right: -50px;
            background-image: url(<?=base_url('assets/images');?>/white-right-big.png);
        }

        @media only screen and (max-height: 860px) {
            #home2 .home-boxes .slick-arrow {
                bottom: -60px;
            }
        }

        @media only screen and (max-width: 480px) {
            #home2 .box-slider-container {
                bottom: 37%;
            }

            #home2 .home-boxes .item {
                padding: 22px 15px 25px 3px;
            }

            #home2 .home-boxes .item .texts h3 {
                font-size: 17px;
                margin-bottom: 8px;
            }

            #home2 .home-boxes .slick-arrow {
                width: 40px;
                height: 40px;
                background-size: 12px 26px;
                bottom: -50px;
            }

            #home2 .home-boxes .item .texts p {
                font-size: 15px;
                line-height: 17px;
            }
        }

        @media only screen and (max-height: 500px) {
            #home2 .box-slider-container {
                bottom: 33%;
            }

            #home2 .home-boxes .slick-arrow {
                display: none !important;
            }

            #home2 .home-boxes .item {
                padding: 15px 15px 15px 12px;
            }

            #home2 .home-boxes .item .texts h3 {
                font-size: 14px;
            }

            #home2 .home-boxes .item .texts p {
                font-size: 14px;
                line-height: 16px;
            }
        }

        #home2 .home-boxes .item:hover,
        #home2 .home-boxes .item.active,
        #home2 .home-boxes .slick-arrow:hover {
            background-color: rgba(202, 164, 87, 0.7);
        }

        .bg-soft-colored:before {
            background-color: rgba(202, 164, 87, 0.7);
        }

        .bg-soft-colored1:before {
            background-color: rgba(109, 110, 113, 0.9);
        }

        /* Before After Styles */
        .twentytwenty-overlay:hover {
            background: rgba(0, 0, 0, 0);
        }

        .twentytwenty-container img {
            width: 100%;
        }

        .twentytwenty-horizontal .twentytwenty-handle:before, .twentytwenty-horizontal .twentytwenty-handle:after {
            background-color: #000;
            box-shadow: none;
            width: 5px;
            opacity: 0.5;
        }

        .twentytwenty-horizontal .twentytwenty-handle:before {
            margin-bottom: 28px;
        }

        .twentytwenty-horizontal .twentytwenty-handle:after {
            margin-top: 28px;
        }

        .twentytwenty-handle {
            background-color: #fff;
            border-color: #fff;
            box-shadow: 0px 0px 0px 5px rgba(255, 255, 255, 0.2);
            opacity: 1;
            width: 50px;
            height: 50px;
            margin: -27px 0 0 -27px;
            -webkit-transition: opacity 0.3s;
            -moz-transition: opacity 0.3s;
            transition: opacity 0.3s;
        }

        .twentytwenty-handle:active {
            background-color: #3D3D3D;
            border-color: #3D3D3D;
        }

        .twentytwenty-handle:active .twentytwenty-left-arrow {
            border-right-color: #ddd;
        }

        .twentytwenty-handle:active .twentytwenty-right-arrow {
            border-left-color: #ddd;
        }

        .twentytwenty-container:hover .twentytwenty-handle {
            opacity: 1;
        }

        .twentytwenty-left-arrow {
            border-right-color: #777;
        }

        .twentytwenty-right-arrow {
            border-left-color: #777;
        }

        .twentytwenty-before-label:before, .twentytwenty-after-label:before {
            background-color: transparent;
            font-weight: 600;
            font-size: 2;
            text-transform: uppercase;
            font-family: 'Open Sans', sans-serif;
        }

        .gray7, .gray7-hover:hover {
            color: #6d6e71 !important;
        }

        .bg-colored, .bg-colored-hover:hover {
            background-color: #caa457 !important;
        }

        .gray5, .gray5-hover:hover {
            color: #6d6e71 !important;
        }

        .colored, .colored-hover:hover {
            color: #caa457 !important;
        }

        .qdr-hover:after, .qdr-hover-1:before, .qdr-hover-1-left:before, .qdr-hover-1-right:before, .qdr-hover-1-bottom:before, .qdr-hover-2:before, .qdr-hover-2-vertical:before, .qdr-hover-2-rotate:before {
            background-color: #caa457;
            color: #ffffff !important;
        }

        div#sidebar {
            background-color: #ffffff;
        }

        #sidebar {
            background-color: #ffffff;
            color: #000;
        }

        #back-to-top {
            bottom: 125px !important;
        }

        #back-to-top, .drop-msg {
            bottom: 70px;
        }

        .twentytwenty-container img {
            width: 100%;
        }

        #qfm_button span.hide-modal {
            display: none;
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
            right: 20px;
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

        #navigation.modern.scrolled {
            height: 75px;
            line-height: 75px;
        }

        .card_by {
            height: 170px;
            float: right;
            position: absolute;
            right: 0;
            top: -58px;
        }

        .inline-block a:hover {
            text-decoration: none !important;
            border: 0;
        }

        .bg-soft-white:before, .bg-soft-white-hover:hover:before, .bg-soft-white9:before, .bg-soft-white9-hover:hover:before {
            background-color: rgba(255, 255, 255, 0.9);
            min-height: 1000px;
        }

        .bold-subtitle {
            letter-spacing: 0px;
        }

        @media only screen and (max-width: 568px) {
            .mobile-nb {
                display: block;
            }

            #navigation.modern .columns .nav-menu, #navigation.modern .columns .nav-elements {
                display: none;
            }

            #navigation .sidebar-button, #mobile-navigation .sidebar-button {
                display: none !important;
            }

            #navigation.modern .columns ul li a, #navigation.modern .columns ul li button {
                padding: 0 10px;
            }
        }

        @media only screen and (max-width: 1120px) {
            .mobile-nb {
                display: none;
            }

            #navigation.modern .columns .nav-menu, #navigation.modern .columns .nav-elements {
                display: block;
            }

            #navigation .sidebar-button, #mobile-navigation .sidebar-button {
                display: block !important;
            }

            #navigation.modern .columns ul li a, #navigation.modern .columns ul li button {
                padding: 0 10px;
            }
        }

        .nav {
            display: inherit;
        }

        .m-portlet__head-tools {
            margin-right: 80px;
            color: #ffffff !important;
        }

        ul.nav.nav-pills.nav-pills--brand.m-nav-pills--align-right.m-nav-pills--btn-pill.m-nav-pills--btn-sm {
            margin-right: 20px;
        }

        .m-portlet__head-tools a {
            color: #ffffff !important;
        }

        .nav.nav-pills.nav-pills--brand .nav-link.active {
            background: #1F3959;
        }

        .m--font-brand {
            color: #1F3959 !important;
        }

        .m-timeline-3__item.m-timeline-3__item--brand:before {
            background: #1F3959;
        }

        .m--font-brand {
            color: #1F3959 !important;
        }

        .m-widget3 .m-widget3__item {
            border-bottom: 0.07rem solid #ebedf2;
            padding-bottom: 10px;
        }

        .m-widget3 .m-widget3__item .m-widget3__header .m-widget3__info {
            padding-left: 0;
        }

        .m-topbar .m-topbar__nav.m-nav > .m-nav__item > .m-nav__link .m-topbar__username {
            text-transform: none;
            font-size: 15px;
        }

        .m-body .m-content {
            padding: 30px 100px;
        }

        .m-subheader {
            padding: 30px 100px 0 100px;
        }

        .m-topbar .m-topbar__nav.m-nav > .m-nav__item > .m-nav__link .m-nav__link-icon > i:before {
            background: -webkit-gradient(linear, left top, left bottom, color-stop(25%, #CAA457), color-stop(50%, #CAA457), color-stop(75%, #CAA457), to(#CAA457));
            background: linear-gradient(180deg, #CAA457 25%, #CAA457 50%, #CAA457 75%, #CAA457 100%);
            background-clip: text;
            text-fill-color: transparent;
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .m-topbar .m-topbar__nav.m-nav > .m-nav__item > .m-nav__link .m-nav__link-icon > i {
            font-size: 1.5rem;
            border: 1px solid #CAA457;
            border-radius: 50%;
            padding: 8px 6px 8px 6px;
            margin-right: 10px;
            margin-left: 10px;
        }

        .m-topbar .m-topbar__nav.m-nav > .m-nav__item > .m-nav__link .m-topbar__userpic img {
            border: 1px solid #CAA457;
        }

        .m-header-menu .m-menu__nav > .m-menu__item {
            padding: 0px;
        }

        .m-timeline-2:before {
            height: 500px;
        }

        .m-topbar .m-topbar__nav.m-nav > .m-nav__item > .m-nav__link .m-nav__link-badge {
            right: 20%;
            left: auto;
            margin-left: 0;
            position: absolute;
            top: 10px;
            padding: 6px 5px 5px 7px;
            background-color: #1F3959;
            width: 20px;
            height: 20px;
        }

        .modal-backdrop.show {
            opacity: 0.9;
        }

        .modal-dialog {
            max-width: 800px;
        }

        .modal-dialog {
            max-width: 800px;
        }

        .modal {
            top: 10%;
        }

        .modal .modal-content {
             
        }

        .carousel-control-next {
            right: -40%;
        }

        .carousel-control-prev {
            left: -40%;
        }

        .carousel-control-next-icon, .carousel-control-prev-icon {
            width: 30px;
            height: 30px;
        }

        .m-messenger .m-messenger__messages .m-messenger__message.m-messenger__message--out .m-messenger__message-content {
            background: #1F3959;
        }

        .m-messenger.m-messenger.m-messenger--message-arrow .m-messenger__message.m-messenger__message--out .m-messenger__message-arrow {
            color: #1F3959;
        }

        .btn-accent {
            color: #fff;
            background-color: #1F3959;
            border-color: #1F3959;
        }

        .btn-accent:hover {
            color: #fff;
            background-color: #284a73;
            border-color: #284a73;
        }

        .btn-accent:focus, .btn-accent.focus {
            -webkit-box-shadow: 0 0 0 0.2rem rgba(46, 84, 131, 0.5);
            box-shadow: 0 0 0 0.2rem rgba(46, 84, 131, 0.5);
        }

        .btn-accent.disabled, .btn-accent:disabled {
            color: #fff;
            background-color: #1F3959;
            border-color: #1F3959;
        }

        .btn-accent:not(:disabled):not(.disabled):active, .btn-accent:not(:disabled):not(.disabled).active,
        .show > .btn-accent.dropdown-toggle {
            color: #fff;
            background-color: #284a73;
            border-color: #284a73;
        }

        .btn-accent:not(:disabled):not(.disabled):active:focus, .btn-accent:not(:disabled):not(.disabled).active:focus,
        .show > .btn-accent.dropdown-toggle:focus {
            -webkit-box-shadow: 0 0 0 0.2rem rgba(46, 84, 131, 0.5);
            box-shadow: 0 0 0 0.2rem rgba(46, 84, 131, 0.5);
        }

        .btn-secondary {
            color: #000000;
        }

        .btn.m-btn--air.btn-default, .btn.m-btn--air.btn-secondary {
            -webkit-box-shadow: 0px 3px 20px 0px rgba(96, 78, 42, 0.17) !important;
            box-shadow: 0px 3px 20px 0px rgba(96, 78, 42, 0.17) !important;
            border-color: #ffffff !important;
        }

        .btn.m-btn--air.btn-default.focus, .btn.m-btn--air.btn-default:focus, .btn.m-btn--air.btn-default:hover:not(:disabled):not(.active), .btn.m-btn--air.btn-secondary.focus, .btn.m-btn--air.btn-secondary:focus, .btn.m-btn--air.btn-secondary:hover:not(:disabled):not(.active) {
            -webkit-box-shadow: 0px 3px 20px 0px rgba(96, 78, 42, 0.17) !important;
            box-shadow: 0px 3px 20px 0px rgba(96, 78, 42, 0.17) !important;
            background: #caa457 !important;
            color: #ffffff !important;
            border-color: #caa457 !important;
        }
        .m-portlet .m-portlet__head .m-portlet__head-caption .m-portlet__head-title .m-portlet__head-text {
            font-size: 2rem;
            font-weight: bold;
        }
        .btn-cst {
            background: #34bfa3;
            border-color: #34bfa3;
        }

        .btn-cst:hover {
            background: #CAA457;
            border-color: #CAA457;
        }


        .netTr{
            background: #1F3958;
            color: #fff;
            text-align: center;
            font-weight: bold;
            text-transform: uppercase;
        }
        .m-datatable > .m-datatable__pager > .m-datatable__pager-nav > li > .m-datatable__pager-link.m-datatable__pager-link--active {
            background: #1F3958;
            color: #ffffff;
        }
        .m-datatable > .m-datatable__pager > .m-datatable__pager-nav > li > .m-datatable__pager-link.m-datatable__pager-link--first:hover, .m-datatable > .m-datatable__pager > .m-datatable__pager-nav > li > .m-datatable__pager-link.m-datatable__pager-link--prev:hover, .m-datatable > .m-datatable__pager > .m-datatable__pager-nav > li > .m-datatable__pager-link.m-datatable__pager-link--next:hover, .m-datatable > .m-datatable__pager > .m-datatable__pager-nav > li > .m-datatable__pager-link.m-datatable__pager-link--last:hover {
            background: #1F3958;
            color: #ffffff !important;
        }
        .m-datatable > .m-datatable__pager > .m-datatable__pager-nav > li > .m-datatable__pager-link:hover {
            background: #1F3958;
            color: #ffffff !important;
        }
        .table.table-striped thead th {
            border: 1px solid #ffffff;
        }
        .table {
            box-shadow: 0px 5px 10px 0px #cccccc !important;
        }
        .table.table-striped tbody th, .table.table-striped tbody td {
            border: 1px solid #ffffff;
        }
        tr.netTr {
            border-top-right-radius: 5px;
        }
        .table{
            border-radius: 20px;
            overflow: hidden;
        }
        .m-portlet{
            border-radius: 20px;
        }
        .table td, .table th{
            vertical-align: middle;
        }
        .table-hover tbody tr:hover {
            background-color: #f7f8fa;
            -moz-box-shadow: 0 0 3px 0 rgba(0, 0, 0, 0.8);
            -webkit-box-shadow: 0 0 3px 0 rgba(0, 0, 0, 0.8);
            box-shadow: 0 0 3px 0 rgba(0, 0, 0, 0.8);
            -webkit-transform:scale(1.01);
            -moz-transform:scale(1.01);
            -ms-transform:scale(1.01);
            -o-transform:scale(1.01);
            transform:scale(1.01);
            z-index: 2;
        }
        .form-control {
            height: 35px;
            border-radius: 20px;
        }
        .m-btn--icon.m-btn--icon-only {
            width: 25px;
            height: 25px;
        }
        .m-nav__link:hover .m-nav__link-text{
            color: #CAA457 !important;
        }
        .m-nav__link:hover .m-nav__link-icon{
            color: #CAA457 !important;
        }
        .m-portlet.m-portlet--rounded {
            border-radius: 20px;
        }
        .alert .close:before {
            content: 'x';
            here is your X(cross) sign. color: #fff;
            font-weight: 300;
            font-family: Arial, sans-serif;
        }
        .alert {
            border-radius: 50px;
            box-shadow: 0px 5px 10px 0px #cccccc !important;
            margin-top: 15px;
            margin-bottom: 30px;
            padding: 15px;
        }
        .alert-info {
 
    }
        .fa-arrow-up:before {
            content: "\2191";
            font-family: Flaticon;
        }
        .fa-arrow-down:before {
            content: "\2193";
            font-family: Flaticon;
        }
        .fa-arrow-down:hover, .fa-arrow-up:hover{
            color: #CAA457;
        }


        .m-widget4__number .btn-danger{
            background-color: transparent !important;
            border-color: transparent !important;
            color: #cccccc !important;
            border-radius: 50%;
        }
        .m-widget4__number .btn-danger:hover{
            background-color: #dc3545 !important;
            border-color: #dc3545 !important;
            color: #ffffff !important;
        }
        .m-widget4__number .btn-success{
            background-color: transparent !important;
            border-color: transparent !important;
            color: #cccccc !important;
            border-radius: 50%;
        }
        .m-widget4__number .btn-success:hover{
            color: #fff !important;
            background-color: #28a745 !important;
            border-color: #28a745 !important;
        }


        .mee{
            display: none;
        }
        .butj{
            display: none;
        }
        .tab-content{
            width: 100%;
            padding: 0 20px;
        }
        .m-portlet__head2 {
            padding: 10px;
            background: #f3f3f3;
            border-bottom: 1px solid #ccc;
        }
        .btn-primary{
            color: #ffffff !important;
        }
        .btn-primary.disabled, .btn-primary:disabled {
            background-color: #102b4e;
            border-color: #102b4e;
        }
        .col-lg-12 h3 {
            margin:0;
            margin-bottom: 10px;
        }
        .custom-file-input:focus{
            border-color: #102b4e !important;
        }
        .m-form.m-form--group-seperator-dashed .m-form__group {
            border-bottom: 0px dashed #ebedf2;
            padding-top: 15px;
            padding-bottom: 15px;
        }
        .table td, .table th {
            padding: 5px;
        }

        .bootstrap-select .dropdown-menu.inner > li.selected > a span.check-mark:before {
            content: " " !important;
        }
        .bootstrap-select > .dropdown-toggle {
            position: relative;
            outline: none !important;
            padding: 8px;
            padding-right: 2rem;
            border-radius: 0.25rem!important;
        }
        .num_tab {
            top: 10px;
            padding: 6px 10px 5px 10px;
            background-color: #1F3959;
            color: #ffffff;
            border-radius: 5px;
            font-size: 12px;
        }
        .m-aside-menu.m-aside-menu--skin-dark .m-menu__nav > .m-menu__item.m-menu__item--open > .m-menu__heading .m-menu__ver-arrow, .m-aside-menu.m-aside-menu--skin-dark .m-menu__nav > .m-menu__item.m-menu__item--open > .m-menu__link .m-menu__ver-arrow {
            color: #ffffff;
        }
        .m-aside-menu.m-aside-menu--skin-dark .m-menu__nav > .m-menu__item.m-menu__item--open {
            background-color: #192e47;
        }
        .m-aside-menu.m-aside-menu--skin-dark .m-menu__nav > .m-menu__item.m-menu__item--open > .m-menu__heading .m-menu__link-text, .m-aside-menu.m-aside-menu--skin-dark .m-menu__nav > .m-menu__item.m-menu__item--open > .m-menu__link .m-menu__link-text {
            color: #f3f3f3;
        }
        .m-aside-menu.m-aside-menu--skin-dark .m-menu__nav > .m-menu__item .m-menu__submenu .m-menu__item > .m-menu__heading .m-menu__link-text, .m-aside-menu.m-aside-menu--skin-dark .m-menu__nav > .m-menu__item .m-menu__submenu .m-menu__item > .m-menu__link .m-menu__link-text {
            color: #f3f3f3;
        }
        .m-aside-menu .m-menu__nav .m-menu__item > .m-menu__heading .m-menu__link-text, .m-aside-menu .m-menu__nav .m-menu__item > .m-menu__link .m-menu__link-text {
            width: 80%;
        }
        .m-aside-menu .m-menu__nav > .m-menu__item .m-menu__submenu .m-menu__item > .m-menu__heading .m-menu__link-badge, .m-aside-menu .m-menu__nav > .m-menu__item .m-menu__submenu .m-menu__item > .m-menu__link .m-menu__link-badge {
            padding: unset;
        }
        .m-menu__link-badge .m-badge.m-badge--danger {
            background-color: #f4516c;
            color: #ffffff;
            margin-top: 10px;
        }
        .m-aside-menu.m-aside-menu--skin-dark .m-menu__nav > .m-menu__item > .m-menu__heading .m-menu__ver-arrow, .m-aside-menu.m-aside-menu--skin-dark .m-menu__nav > .m-menu__item > .m-menu__link .m-menu__ver-arrow {
            color: #f3f3f3;
        }
        .bootstrap-select.show > .dropdown-toggle.btn-light, .bootstrap-select.show > .dropdown-toggle.btn-secondary {
            border-color: #1F3958 !important;
        }
        .bootstrap-select .dropdown-menu.inner > li > a {
            padding: 5px;
        }
        .datepicker-days {
            padding: 10px;
        }
        .datepicker tbody tr > td.day.today {
            background: #CAA457;
        }
        .datepicker tbody tr > td.day.selected, .datepicker tbody tr > td.day.selected:hover, .datepicker tbody tr > td.day.active, .datepicker tbody tr > td.day.active:hover {
            background: #CAA457;
        }
.datetimepicker thead th.prev > span:before {
    content: "\f060" !important;
    font: normal normal normal 14px/1 FontAwesome !important;
}

.datetimepicker thead th.next > span:before {
    content: "\f061" !important;
    font: normal normal normal 14px/1 FontAwesome !important;
}
.datetimepicker tbody tr > td span.hour.active:hover, .datetimepicker tbody tr > td span.hour.active, .datetimepicker tbody tr > td span.minute.active:hover, .datetimepicker tbody tr > td span.minute.active, .datetimepicker tbody tr > td span.month.active:hover, .datetimepicker tbody tr > td span.month.active {
    background: #CAA457;
}
.datepicker thead th.prev i:before {
    font-size: 0.85rem;
content: "\f060" !important;
    font: normal normal normal 14px/1 FontAwesome !important;
}
.datepicker thead th.next i:before {
    font-size: 0.85rem;
content: "\f061" !important;
    font: normal normal normal 14px/1 FontAwesome !important;
}
div.dataTables_wrapper div.dataTables_length label {
    font-weight: normal !important;
    text-align: left !important;
    white-space: nowrap !important;
    padding: 5px !important;
}
div.dataTables_wrapper div.dataTables_length select {
    width: auto !important;
    display: inline-block !important;
}
h3, .h3 {
    font-size: 18px;
}
audio#player {
    height: 35px;
}
.m-list-badge__label.m--font-success.tim_2 {
    font-family: sans-serif;
    font-weight: bold;
}

        @media (max-width: 768px) {
            .m-body .m-content {
                padding: 10px;
            }
            .m-datatable.m-datatable--default.m-datatable--loaded {
                overflow: scroll;
            }
            .sm-py {
                height: 200px;
            }
            .bg-soft-colored:before {
                height: 150px;
            }
            .m-topbar .m-topbar__nav.m-nav > .m-nav__item > .m-nav__link .m-topbar__userpic img {
                max-width: 51px !important;
            }
            .nav-menu{
                display: none !important;
            }
            .mee{
                display: inline-block;
                margin-top: 13%;
            }
            .menu-toggle222 {
                margin: 12px 0 !important;
                width: auto;
                height: auto;
                padding: 0;
            }
            .menu-toggle222 span {
                width: 30px !important;
                height: 2px;
                background: #000;
                margin-bottom: 6px;
                display: block !important;
            }
            #navigation.modern .columns .nav-elements .flag-item + .dropdown-menu, #navigation.modern .columns .nav-elements .flag-item + .dropdown-menu a {
                width: 180px !important;
            }
            .m-header {
                height: 20px !important;
            }
            .butj{
                display: block;
                margin-bottom: 10px;margin-top: 18px;
            }
            .m-topbar .m-topbar__nav.m-nav {
                width: 100%;
                margin: auto;
            }
            .m-topbar .m-topbar__nav.m-nav > .m-nav__item.m-dropdown {
                width: 100%;
            }
            .usWe {
                display: none !important;
            }
            .link_men_bg {
                background-size: 5% !important;
            }
        }
		
		input::-webkit-outer-spin-button,
input::-webkit-inner-spin-button {
    /* display: none; <- Crashes Chrome on hover */
    -webkit-appearance: none;
    margin: 0; /* <-- Apparently some margin are still there even though it's hidden */
}

input[type=number] {
    -moz-appearance:textfield; /* Firefox */
}
        span.m-menu__link-text {
            padding-left: 10px !important;
        }
    .dataTables_wrapper .pagination .page-item.next > .page-link:hover, .dataTables_wrapper .pagination .page-item:hover > .page-link {
    background: #1f3959;
    color: #ffffff !important;
}
@media only screen and (max-width: 768px){
    header.m-header, .m-topbar{ height:auto !important;}
    .m-topbar{ margin-top:0px;}
    .m-topbar .m-topbar__nav.m-nav > .m-nav__item.m-dropdown{ width:auto;}
    .m-topbar .m-topbar__nav.m-nav{ margin-right:20px; text-align:right;}
    .menuTime{ margin-left:20px;}
}
    </style>

</head>
</head>

<?php
// echo '<prev>';
// print_r($this->session->userdata);
// die();
// echo '</prev>';
 $this->session->userdata('admin_id');
include_once('countdownTimer.php');
if (!$this->session->userdata('admin_id')) {
	return redirect('admin/login');
}
if ($this->session->userdata('permission')) {
    
    $datas = json_decode($this->session->userdata('permission'), true);  
}
?>
	<?php if($this->session->userdata('admin_site_lang')=="arabic" OR $this->session->userdata('admin_site_lang')=="" ) { ?>
 	<style> .fbell{ right: 0; } .form-control { height: 45px; border-radius: 20px; }

 	</style>
        <link href="<?=base_url('assets');?>/css/rtl.css" rel="stylesheet" type="text/css" />
    <?php } ?>
<body class="<?php if($this->session->userdata('admin_site_lang')=="english") echo "body_ltr"; else echo "body_rtl"; ?>">
   
<!-- begin:: Page -->
<div class="m-grid m-grid--hor m-grid--root m-page">

    <!-- BEGIN: Header -->
    <header id="m_header" class="m-grid__item    m-header " m-minimize-offset="200" m-minimize-mobile-offset="200">
        <div class="m-container m-container--fluid m-container--full-height">
            <div class="m-stack m-stack--ver m-stack--desktop">

                <div class="m-stack__item m-brand   ">
                    <div class="m-stack m-stack--ver m-stack--general">
                        <div class="m-stack__item m-stack__item--middle m-brand__logo">
                            <a href="<?php echo base_url('admin/dashboard'); ?>" class="m-brand__logo-wrapper">
                                <img alt="" src="<?php echo base_url(); ?>/assets/images/img/logo.svg" width="200px">
                            </a>
                            <a href="javascript:;" id="m_aside_left_offcanvas_toggle" style="float: right;color: #1f3958;" class="m-brand__icon m-brand__toggler m-brand__toggler--left m--visible-tablet-and-mobile-inline-block">
                                <span><i class="fa fa-bars fa-3x"></i></span>
                            </a>
                        </div>

                    </div>
                </div>
                <!-- END: Brand -->
                <div class="m-stack__item m-stack__item--fluid m-header-head" id="m_header_nav">

                    <!-- BEGIN: Topbar -->
                    <div id="m_header_topbar" class="m-topbar  m-stack m-stack--ver m-stack--general m-stack--fluid">
						 
                            <?php
                                $hidden1 = ['dashboard', 'finance'];
                                $hidden2 = ['list_customer', 'list_project', 'list_hr_eservice', 'list_hr_fine', 'list_archive', 'audio_list', 'list_note', 'chat', 'view_case', 'list_case']; 
                            ?>
                            <div class="m-stack__item m-topbar__nav-wrapper">

                                <?php if (!in_array($this->uri->segment(2), $hidden1) && !in_array($this->uri->segment(3), $hidden2)) : ?>
                                    <div class="navbar-brand menuTime" href="./">
                                        <h1 id="clock">00:00:00</h1>
                                    </div>
                                <?php endif; ?>
                            </div>

			
                            <ul class="m-topbar__nav m-nav m-nav--inline ul-topbar">
                                <li class="m-nav__item m-topbar__user-profile m-topbar__user-profile--img  m-dropdown m-dropdown--medium m-dropdown--arrow m-dropdown--header-bg-fill m-dropdown--align-right m-dropdown--mobile-full-width m-dropdown--skin-light" m-dropdown-toggle="click">
                         
										
					
									</li>	
                                    <?php if (!in_array($this->uri->segment(2), $hidden1) && !in_array($this->uri->segment(3), $hidden2)) : ?>
                                        <li class="m-nav__item m-topbar__languages" m-dropdown-toggle="click" aria-expanded="true">
                                            <a href="" class="m-nav__link m-dropdown__toggle">
                                                <span class="m-nav__link-text">
                                                    <span class="m-topbar__username" style="color: black !important;">
                                                        <?php echo $this->lang->line('Welcome'); ?>,
                                                        <b><?php echo getEmployeeName($this->session->userdata('admin_id')); ?></b>
                                                        - <?php if ($this->session->userdata('role_id') == 1) {
                                                                echo "Admin";
                                                            } else if ($this->session->userdata('role_id') == 2) {
                                                                echo "Employee";
                                                            } ?>
                                                    </span>
                                                </span>
                                            </a>
                                        </li>
                                    <?php endif; ?>
<!-- <li class="m-nav__item m-topbar__languages logout-list-item " m-dropdown-toggle="click" aria-expanded="true">
<a href="<?=base_url('admin/logout');?>" class="m-nav__link m-dropdown__toggle">
<span class="m-nav__link-text">
<span class="m-nav__link-icon"><i class="flaticon-logout" style="margin: 0;"></i></span>
</span>
</a>
</li> -->

<li class="language-list-item m-nav__item m-topbar__languages " m-dropdown-toggle="click" aria-expanded="true">
<?php if($this->session->userdata('admin_site_lang')=="arabic" OR $this->session->userdata('admin_site_lang')=="" ) { ?>
		<a href="<?php echo base_url('admin/adminlangswitch/switchLanguage/english'); ?>" class="m-nav__link m-dropdown__toggle">
		<span class="m-nav__link-text">
		<img class="m-topbar__language-selected-img" src="<?php echo base_url('assets/images');?>/img/flag-usa.png" title="English">	
		</span>
		</a>

<?php } else { ?>
 
		<a href="<?php echo base_url('admin/adminlangswitch/switchLanguage/arabic'); ?>" class="m-nav__link m-dropdown__toggle">
		<span class="m-nav__link-text">
		<img class="m-topbar__language-selected-img" src="<?php echo base_url('assets/images');?>/img/flag_ksa.png" title="Arabic">	
		</span>
		</a>
<?php } ?>
	</li>

    
  
    <!-- <li class="profile-list-item m-nav__item m-topbar__languages m-dropdown m-dropdown--small m-dropdown--header-bg-fill m-dropdown--arrow m-dropdown--align-right m-dropdown--mobile-full-width" m-dropdown-toggle="click" aria-expanded="true">
        <a href="#" class="m-nav__link m-dropdown__toggle">
            <span class="m-nav__link-text">
                <img class="m-topbar__language-selected-img" src="<?php echo base_url(); ?>/assets/images/img/notifications.svg">	
            </span>
        </a>
    </li> -->
 
 <li class="profile-list-item m-nav__item m-topbar__languages m-dropdown m-dropdown--small m-dropdown--header-bg-fill m-dropdown--arrow m-dropdown--align-right m-dropdown--mobile-full-width" m-dropdown-toggle="click" aria-expanded="true">
	<a href="#" data-toggle="modal" data-target="#edit-Profile" class="edit_profile_btn m-nav__link m-dropdown__toggle">
		<span class="m-nav__link-text">
			<img class="m-topbar__language-selected-img" src="<?php echo base_url(); ?>/assets/images/img/user-dp.svg">	
		</span>
	</a>
	<div class="m-dropdown__wrapper" style="z-index: 101;">
		<span class="m-dropdown__arrow m-dropdown__arrow--right m-dropdown__arrow--adjust" style="left: auto; right: 5px;"></span>
		<div class="m-dropdown__inner">
			
			<div class="m-dropdown__body">
				<div class="m-dropdown__content">
					<ul class="m-nav m-nav--skin-light">
						<li class="m-nav__item m-nav__item--active">
							<a href="<?php echo base_url('admin/login/change_password'); ?>" class="m-nav__link m-nav__link--active">
								<span class="m-nav__link-icon"><i class="fa fa-key"></i></span>
								<span class="m-nav__link-title m-topbar__language-text m-nav__link-text"><?php echo $this->lang->line('CHANGE_PASSWORD');?></span>
							</a>
						</li>
						<li class="m-nav__item">
							<a href="<?php echo base_url('admin/logout'); ?>" class="m-nav__link m-nav__link--active">
								<span class="m-nav__link-icon"><i class="fa fa-power-off"></i></span>
								<span class="m-nav__link-title m-topbar__language-text m-nav__link-text"><?php echo $this->lang->line('logout');?></span>
							</a>
						</li>
					</ul>
				</div>
			</div>
		</div>
	</div>
</li>


										

						 
	 
                        <!-- Dropdown 
                                        <a href="profile.php">

                                                <span class="m-topbar__userpic">
                                                <img src="" class="m--img-rounded m--marginless" alt=""/>
                                                </span>

                                        </a>

                                    </div>
                                </li>

                            </ul>
                        </div>
                    </div>

                    <!-- END: Topbar -->
                </div>
            </div>
        </div>
    </header>


    <!-- END: Header -->

    <!-- begin::Body -->
    <div class="m-grid__item m-grid__item--fluid m-grid m-grid--ver-desktop m-grid--desktop m-body">

        <!-- BEGIN: Left Aside -->
        <button class="m-aside-left-close  m-aside-left-close--skin-dark " id="m_aside_left_close_btn"><i class="fa fa-close"></i></button>
        <div id="m_aside_left" class="m-grid__item	m-aside-left  m-aside-left--skin-dark ">
            <!-- BEGIN: Aside Menu -->
            <div id="m_ver_menu" class="m-aside-menu  m-aside-menu--skin-dark m-aside-menu--submenu-skin-dark " m-menu-vertical="1" m-menu-scrollable="1" m-menu-dropdown-timeout="500" style="position: relative;">
			<?php if($this->session->userdata('role_id') == 2){ ?>
                <ul class="m-menu__nav  m-menu__nav--dropdown-submenu-arrow">

                <li class="m-menu__item <?php echo ($this->uri->segment(1) == 'admin' && $this->uri->segment(2) == 'dashboard') ? 'm-menu__item--active' : ''; ?>" aria-haspopup="true">
                        <a href="<?=base_url('admin/dashboard');?>" class="m-menu__link link_men_bg dbg">
                            <span class="m-menu__link-text"><?php echo $this->lang->line('Dashboard');?></span>
                        </a>
                    </li>

				    <?php $cls = array('list_mission', 'list_case', 'view_mission'); ?>
					<li class="m-menu__item  m-menu__item--submenu <?php  if(in_array($this->uri->segment('3'),$cls)) echo ' m-menu__item--open m-menu__item--active'; ?> <?php  if(in_array($this->uri->segment('2'),$cls)) echo ' m-menu__item--open m-menu__item--active'; ?>"  aria-haspopup="true" m-menu-submenu-toggle="hover">
                        <a href="<?= base_url('admin/c_case/list_case');?>" class="m-menu__link link_men_bg dbg7 m-menu__toggle">
                            <span class="m-menu__link-text"><?php echo $this->lang->line('Service');?></span>
                            
                        </a>
                        <!-- <div class="m-menu__submenu">
                            <span class="m-menu__arrow"></span>
                            <ul class="m-menu__subnav">

                                <li class="m-menu__item <?php echo ($this->uri->segment(2) == 'customer' && $this->uri->segment(3) == 'list_customer') ? 'm-menu__item--active' : ''; ?>" aria-haspopup="true">
                                    <a href="<?=base_url('admin/customer/list_customer');?>" class="m-menu__link ">
                                        <i class="m-menu__link-bullet m-menu__link-bullet--dot"><span></span></i>
                                        <span class="m-menu__link-text"><?php echo $this->lang->line('List_Customers');?></span>
                                        <?php if( newCustomerNotification()){ ?>   <span class="m-menu__link-badge">
                                                <span class="m-badge m-badge--danger"><?php echo newCustomerNotification(); ?></span> 
                                            </span>
                                        </span>
										<?php } ?>
                                    </a>
                                </li>

                                <li class="m-menu__item <?php echo ($this->uri->segment(2) == 'mission_session' && $this->uri->segment(3) == 'list_mission') ? 'm-menu__item--active' : ''; ?>" aria-haspopup="true">
                                    <a href="<?=base_url('admin/mission_session/list_mission');?>" class="m-menu__link ">
                                        <i class="m-menu__link-bullet m-menu__link-bullet--dot"><span></span></i>
                                        <span class="m-menu__link-text"><?php echo $this->lang->line('Session');?></span>
											<?php if(allMissionNotification('session_mission')){ echo "<span class='m-menu__link-badge'><span class='m-badge m-badge--danger'><i class='fa fa-bell sidenoti'></i></span> </span>"; } ?>
								
                                    </a>
                                </li>

                                <li class="m-menu__item <?php echo ($this->uri->segment(2) == 'mission_writings' && $this->uri->segment(3) == 'list_mission') ? 'm-menu__item--active' : ''; ?>" aria-haspopup="true">
                                    <a href="<?=base_url('admin/mission_writings/list_mission');?>" class="m-menu__link ">
                                        <i class="m-menu__link-bullet m-menu__link-bullet--dot"><span></span></i>
                                        <span class="m-menu__link-text"><?php echo $this->lang->line('WRITING');?></span>
								<?php if(allMissionNotification('writing_misssion')){ echo "<span class='m-menu__link-badge'><span class='m-badge m-badge--danger'><i class='fa fa-bell sidenoti'></i></span> </span>"; } ?>

                                    </a>
                                </li>

                                <li class="m-menu__item <?php echo ($this->uri->segment(2) == 'mission_consultation' && $this->uri->segment(3) == 'list_mission') ? 'm-menu__item--active' : ''; ?>" aria-haspopup="true">
                                    <a href="<?=base_url('admin/mission_consultation/list_mission');?>" class="m-menu__link ">
                                        <i class="m-menu__link-bullet m-menu__link-bullet--dot"><span></span></i>
                                        <span class="m-menu__link-text"><?php echo $this->lang->line('Consultation');?></span>
								<?php if(allMissionNotification('consultation_mission')){ echo "<span class='m-menu__link-badge'><span class='m-badge m-badge--danger'><i class='fa fa-bell sidenoti'></i></span> </span>"; } ?>
                                    </a>
                                </li>

                                <li class="m-menu__item <?php echo ($this->uri->segment(2) == 'mission_visiting' && $this->uri->segment(3) == 'list_mission') ? 'm-menu__item--active' : ''; ?>" aria-haspopup="true">
                                    <a href="<?=base_url('admin/mission_visiting/list_mission');?>" class="m-menu__link ">
                                        <i class="m-menu__link-bullet m-menu__link-bullet--dot"><span></span></i>
                                        <span class="m-menu__link-text"><?php echo $this->lang->line('Visiting');?></span>
				
									<?php if(allMissionNotification('visiting_mission')){ echo "<span class='m-menu__link-badge'><span class='m-badge m-badge--danger'><i class='fa fa-bell sidenoti'></i></span> </span>"; } ?>
					
                                    </a>
                                </li>

                                <li class="m-menu__item <?php echo ($this->uri->segment(2) == 'mission_general' && $this->uri->segment(3) == 'list_mission') ? 'm-menu__item--active' : ''; ?>" aria-haspopup="true">
                                    <a href="<?=base_url('admin/mission_general/list_mission');?>" class="m-menu__link ">
                                        <i class="m-menu__link-bullet m-menu__link-bullet--dot"><span></span></i>
                                        <span class="m-menu__link-text"><?php echo $this->lang->line('GENERAL');?></span>

									<?php if(allMissionNotification('general_mission')){ echo "<span class='m-menu__link-badge'><span class='m-badge m-badge--danger'><i class='fa fa-bell sidenoti'></i></span> </span>"; } ?>
	
                                    </a>
                                </li>

                                <li class="m-menu__item <?php echo ($this->uri->segment(1) == 'admin' && $this->uri->segment(2) == 'assignment') ? 'm-menu__item--active' : ''; ?>" aria-haspopup="true">
                                    <a href="<?=base_url('admin/assignment');?>" class="m-menu__link ">
                                        <i class="m-menu__link-bullet m-menu__link-bullet--dot"><span></span></i>
                                        <span class="m-menu__link-text"><?php echo $this->lang->line('ASSIGNMENT');?></span>
                                    </a>
                                </li>

                                <li class="m-menu__item <?php echo ($this->uri->segment(2) == 'archive' && $this->uri->segment(3) == 'list_archive') ? 'm-menu__item--active' : ''; ?>" aria-haspopup="true">
                                    <a href="<?=base_url('admin/archive/list_archive');?>" class="m-menu__link ">
                                        <i class="m-menu__link-bullet m-menu__link-bullet--dot"><span></span></i>
                                        <span class="m-menu__link-text"><?php echo $this->lang->line('Archives');?></span>
                                    </a>
                                </li>

                                <li class="m-menu__item <?php echo ($this->uri->segment(2) == 'admin' && $this->uri->segment(3) == 'audio_list') ? 'm-menu__item--active' : ''; ?>" aria-haspopup="true">
                                    <a href="<?=base_url('admin/admin/audio_list')?>" class="m-menu__link ">
                                        <i class="m-menu__link-bullet m-menu__link-bullet--dot"><span></span></i>
                                        <span class="m-menu__link-text"><?php echo $this->lang->line('Audio_Record');?></span>
                                    </a>
                                </li>

                                <li class="m-menu__item <?php echo ($this->uri->segment(2) == 'admin' && $this->uri->segment(3) == 'list_note') ? 'm-menu__item--active' : ''; ?>" aria-haspopup="true">
                                    <a href="<?=base_url('admin/admin/list_note');?>" class="m-menu__link ">
                                        <i class="m-menu__link-bullet m-menu__link-bullet--dot"><span></span></i>
                                        <span class="m-menu__link-text"><?php echo $this->lang->line('Note_List');?></span>
                                    </a>
                                </li>

                            </ul>
                        </div> -->
                    </li>
					 
					<li class="m-menu__item <?php echo ($this->uri->segment(1) == 'admin' && $this->uri->segment(2) == 'mission_visiting') ? 'm-menu__item--active' : ''; ?>" aria-haspopup="true">
						<a href="<?=base_url('admin/mission_visiting/list_mission');?>" class="m-menu__link link_men_bg calendar">
							<span class="m-menu__link-text"><?php echo $this->lang->line('Calendar');?></span>
						</a>
					</li>

					<li class="m-menu__item <?php echo ($this->uri->segment(1) == 'admin' && $this->uri->segment(2) == 'finance') ? 'm-menu__item--active' : ''; ?>" aria-haspopup="true">
						<a href="<?=base_url('admin/finance');?>" class="m-menu__link link_men_bg dbg9">
							<span class="m-menu__link-text"><?php echo $this->lang->line('Financial');?></span>
						</a>
					</li>
	 
					<?php
                    $mang = ARRAY('employee','hr','finance');
					$repoy = ARRAY('report'); 
					?>
					
			        <?php $project = ARRAY('project');  ?> 
				    <li class="m-menu__item <?php if (in_array($this->uri->segment('2'), $project)) echo ' m-menu__item--open m-menu__item--active'; ?>" aria-haspopup="true">
                        <a href="<?= base_url('admin/project/list_project'); ?>" class="m-menu__link link_men_bg dbg8">
                            <span class="m-menu__link-text"><?php echo $this->lang->line('Project_planning'); ?></span>
                        </a>
                    </li>
			 

                    <li class="m-menu__item <?php echo ($this->uri->segment(2) == 'hr' && $this->uri->segment(3) == 'list_hr_eservice') ? 'm-menu__item--active' : ''; ?>" aria-haspopup="true">
                        <a href="<?=base_url('admin/hr/list_hr_eservice');?>" class="m-menu__link link_men_bg dbg13">
                            <span class="m-menu__link-text"><?php echo $this->lang->line('HR_E_services');?></span>
                        </a>
                    </li>

                    <li class="m-menu__item <?php echo ($this->uri->segment(2) == 'hr' && $this->uri->segment(3) == 'list_hr_fine') ? 'm-menu__item--active' : ''; ?>" aria-haspopup="true">
                        <a href="<?=base_url('admin/hr/list_hr_fine');?>" class="m-menu__link link_men_bg dbg2">
                            <span class="m-menu__link-text"><?php echo $this->lang->line('Fine');?></span>
                        </a>
                    </li>
                    <li class="m-menu__item <?php echo ($this->uri->segment(2) == 'admin' && $this->uri->segment(3) == 'chat') ? 'm-menu__item--active' : ''; ?>" aria-haspopup="true">
                        <a href="<?=base_url('admin/admin/chat');?>" class="m-menu__link link_men_bg dbg15">
                            <span class="m-menu__link-text"><?php echo $this->lang->line('Support_Chat');?></span>
                        </a>
                    </li>

                </ul>
			<?php } ?>
			
			<?php if($this->session->userdata('role_id') == 1){ ?>
			<ul class="m-menu__nav  m-menu__nav--dropdown-submenu-arrow">

                    <li class="m-menu__item <?php echo ($this->uri->segment(1) == 'admin' && $this->uri->segment(2) == 'dashboard') ? 'm-menu__item--active' : ''; ?>" aria-haspopup="true">
                        <a href="<?=base_url('admin/dashboard');?>" class="m-menu__link link_men_bg dbg">
                            <span class="m-menu__link-text"><?php echo $this->lang->line('Dashboard');?></span>
                        </a>
                    </li>
                    <?php 
                        $ser = array('list_mission', 'view_case', 'list_case', 'view_mission');
                        ?>
                    <?php if (isset($ck[13]) && $ck[13] == 13) { ?>
                        <li class="m-menu__item  <?php echo (in_array($this->uri->segment(3), $ser) && $this->uri->segment(2) !== 'mission_visiting') ? ' m-menu__item--open m-menu__item--active' : ''; ?>"  aria-haspopup="true">
                            <a href="<?= base_url('admin/c_case/list_case');?>" class="m-menu__link link_men_bg dbg7">
                                <span class="m-menu__link-text"><?php echo $this->lang->line('Service'); ?></span>
                            </a>
                        </li>
                    
                    <?php } ?>
                    <?php 
                        $cls = array('list_customer', 'block_list');
                        ?>

                        <li class="m-menu__item <?php echo ($this->uri->segment(1) == 'admin' && $this->uri->segment(2) == 'mission_visiting') ? 'm-menu__item--active' : ''; ?>" aria-haspopup="true">
                            <a href="<?=base_url('admin/mission_visiting/list_mission');?>" class="m-menu__link link_men_bg calendar">
                                <span class="m-menu__link-text"><?php echo $this->lang->line('Calendar');?></span>
                            </a>
                        </li>

                        <li class="m-menu__item <?php  if(in_array($this->uri->segment('3'),$cls)) echo ' m-menu__item--open m-menu__item--active'; ?>"  aria-haspopup="true">
                            <a href="<?= base_url('admin/customer/list_customer'); ?>" class="m-menu__link link_men_bg dbg11">
                                <span class="m-menu__link-text"><?php echo $this->lang->line('Clients'); ?></span>
                            </a>
                        </li>

                    <?php
                        $mang = array('finance');
                        $repoy = array('report');
                        ?>

                        <?php if (isset($ck[14]) && $ck[14] == 14) { ?>
                            <li class="m-menu__item <?php if (in_array($this->uri->segment('2'), $mang)) echo 'm-menu__item--open m-menu__item--active'; ?>" aria-haspopup="true">
                                <a href="<?= base_url('admin/finance'); ?>" class="m-menu__link link_men_bg dbg9">
                                    <span class="m-menu__link-text"><?php echo $this->lang->line('Financial'); ?></span>
                                </a>
                            </li>
                    <?php } ?>

					<?php 
                        $project = array('project'); 
                        if (isset($ck[15]) && $ck[15] == 15) { ?> 
                            <li class="m-menu__item <?php if (in_array($this->uri->segment('2'), $project)) echo ' m-menu__item--open m-menu__item--active'; ?>" aria-haspopup="true">
                                <a href="<?= base_url('admin/project/list_project'); ?>" class="m-menu__link link_men_bg dbg8">
                                    <span class="m-menu__link-text"><?php echo $this->lang->line('Project_planning'); ?></span>
                                </a>
                            </li>
                    <?php } ?>


                    <?php
                        $mang = array('list_hr_eservice', 'list_hr_fine', 'list_employee');
                        // $repoy = array('report');
                        ?>

                        <?php if (isset($ck[16]) && $ck[16] == 16) { ?>
                            <li class="m-menu__item <?php if (in_array($this->uri->segment('3'), $mang)) echo 'm-menu__item--open m-menu__item--active'; ?>" aria-haspopup="true">
                                <a href="<?= base_url('admin/hr/list_hr_eservice'); ?>" class="m-menu__link link_men_bg dbg13">
                                    <span class="m-menu__link-text"><?php echo $this->lang->line('HR'); ?></span>
                                </a>
                            </li>
                    <?php } ?>

                    <?php
                        $mang = array('list_archive','list_note','audio_list', 'add_audio_record', 'add_note');
                        // $repoy = array('report');
                        ?>

                        <?php if (isset($ck[17]) && $ck[17] == 17) { ?>
                            <li class="m-menu__item <?php if (in_array($this->uri->segment('3'), $mang)) echo 'm-menu__item--open m-menu__item--active'; ?>" aria-haspopup="true">
                                <a href="<?= base_url('admin/archive/list_archive'); ?>" class="m-menu__link link_men_bg dbg12">
                                    <span class="m-menu__link-text"><?php echo $this->lang->line('Archives'); ?></span>
                                </a>
                            </li>
                    <?php } ?>
                    <?php
                        $chat = array('chat', 'all_users');
                        // $repoy = array('report');
                        ?>
					
					<?php if(isset($ck[18]) && $ck[18] == 18){ ?>
                        <li class="m-menu__item <?php if (in_array($this->uri->segment('3'), $chat)) echo 'm-menu__item--open m-menu__item--active'; ?>" aria-haspopup="true">
                            <a href="<?=base_url('admin/admin/chat');?>" class="m-menu__link link_men_bg dbg15">
                                <!-- <i class="m-menu__ver-arrow fa fa-comments"></i> -->
                                <span class="m-menu__link-text"><?php echo $this->lang->line('Support_Chat');?></span>
                            </a>
                        </li>
                    <?php } ?>

                 
                </ul>
			<?php } ?>

            <a class="side-logout-menu" href="<?=base_url('admin/logout');?>"> <img src="<?php echo base_url(); ?>/assets/images/img/logout-icon.svg" alt=""><?php echo $this->lang->line('logout');?></a>
            </div>

            <!-- END: Aside Menu -->
        </div>


    <!-- Modal -->
<div class="modal fade lp-theme-modal profile-modal" id="edit-Profile" tabindex="-1" role="dialog" aria-labelledby="modalTitle" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalTitle">Profile</h5>
                <button type="button" class="close cancel_profile_btn" data-dismiss="modal" aria-label="Close">
                    <svg width="17" height="17" viewBox="0 0 17 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path opacity="0.5" fill-rule="evenodd" clip-rule="evenodd" d="M0.39988 0.803673C0.656 0.54763 1.00333 0.403793 1.36548 0.403793C1.72763 0.403793 2.07496 0.54763 2.33108 0.803673L8.19434 6.66693L14.0576 0.803673C14.1836 0.673228 14.3343 0.56918 14.5009 0.497602C14.6676 0.426023 14.8468 0.388346 15.0281 0.38677C15.2095 0.385194 15.3893 0.419751 15.5572 0.488423C15.725 0.557095 15.8775 0.658508 16.0057 0.786744C16.134 0.91498 16.2354 1.06747 16.3041 1.23532C16.3727 1.40317 16.4073 1.58301 16.4057 1.76436C16.4041 1.94571 16.3665 2.12492 16.2949 2.29155C16.2233 2.45818 16.1192 2.60889 15.9888 2.73487L10.1255 8.59813L15.9888 14.4614C16.2376 14.719 16.3753 15.064 16.3721 15.4221C16.369 15.7802 16.2254 16.1227 15.9722 16.376C15.7189 16.6292 15.3764 16.7728 15.0183 16.7759C14.6602 16.779 14.3152 16.6414 14.0576 16.3926L8.19434 10.5293L2.33108 16.3926C2.07349 16.6414 1.7285 16.779 1.3704 16.7759C1.01229 16.7728 0.669742 16.6292 0.416517 16.376C0.163291 16.1227 0.0196542 15.7802 0.0165424 15.4221C0.0134306 15.064 0.151093 14.719 0.39988 14.4614L6.26314 8.59813L0.39988 2.73487C0.143837 2.47875 0 2.13143 0 1.76927C0 1.40712 0.143837 1.05979 0.39988 0.803673Z" fill="#1B2A39"/>
                    </svg>
                </button>
            </div>
            <div class="modal-body">
                <div class="lp-profile-body">
                    <div class="text-field">
                        <label for="">Profile Name</label>
                        <div class="fields">
                            <input type="text" value="<?= getEmployeeName($this->session->userdata('admin_id')); ?>" readonly>
                        </div>
                    </div>

                    <div class="text-field">
                        <label for="">Mail</label>
                        <div class="fields">
                            <input type="text" value="<?=$this->session->userdata('admin_email'); ?>" readonly>
                        </div>
                    </div>

                    <!-- Change Password Form -->
                    <?php echo form_open_multipart('admin/login/change_passsword_check', ['id'=>'change_password_popup', 'class'=>"m-form"]); ?>
                    
                    <div class="text-field">
                        <label for="">Current Password</label>
                        <div class="fields">
                            <?= form_password(['id'=>'popup_current_password','name'=>'current_password']);?>
                            <?= form_error('current_password'); ?>                        
                        </div>
                    </div>

                    <div class="text-field">
                        <label for="">New Password</label>
                        <div class="fields">
                            <?= form_password(['id'=>'popup_new_password','name'=>'new_password']);?>
                            <?= form_error('new_password'); ?>
                        </div>
                    </div>

                    <div class="text-field">
                        <label for="">Confirm Password</label>
                        <div class="fields">
                            <?= form_password(['id'=>'popup_confirm_password','name'=>'confirm_password']);?>
                            <?= form_error('confirm_password'); ?>         
                        </div>
                    </div>

                    <div class="modal-footer">
                        <a class="logout" href="<?=base_url('admin/logout');?>"> 
                            <img src="<?php echo base_url(); ?>/assets/images/img/logout-icon.svg" alt=""> <?php echo $this->lang->line('logout');?>
                        </a>
                        <div class="modal-btn-group">
                            <button type="button" class="btn btn-secondary cancel_profile_btn" data-dismiss="modal">Cancel</button>
                            <button type="submit" class="btn btn-primary">Save</button>
                        </div>
                    </div>

                    </form> <!-- Close Form -->
                </div>
            </div>
        </div>
    </div>
</div>

<!-- jQuery AJAX Script for Password Change -->
<script>
jQuery(document).ready(function($){
    $("#change_password_popup").submit(function(e){
        e.preventDefault(); // Prevent default form submission

        $.ajax({
            url: "<?= base_url('admin/login/change_passsword_check'); ?>",
            type: "POST",
            data: $(this).serialize(),
            success: function(response) {
                alert("Password changed successfully!");
                $("#edit-Profile").modal('hide'); // Hide modal after success
                location.reload(); // Refresh page if needed
            },
            error: function() {
                alert("Error changing password. Please try again.");
            }
        });
    });
});
</script>
