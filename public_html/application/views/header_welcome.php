<?php 

$is_dashboard = !empty( $is_dashboard ) ? $is_dashboard : '';
if($this->session->userdata('verify') == 'false' || $this->session->userdata('verify') == '' ) { redirect('/front', 'refresh'); }?>
<script src="https://ajax.googleapis.com/ajax/libs/webfont/1.6.16/webfont.js"></script><script>
        WebFont.load({
            google: {"families": ["Poppins:300,400,500,600,700", "Roboto:300,400,500,600,700"]},
            active: function () {
                sessionStorage.fonts = true;
            }
        });
    </script>

    <!--end::Web font -->

    <!--begin:: Global Mandatory Vendors -->
    <link href="<?=base_url('assets');?>/vendors/perfect-scrollbar/css/perfect-scrollbar.css" rel="stylesheet" type="text/css"/>

    <!--end:: Global Mandatory Vendors -->

    <!--begin:: Global Optional Vendors -->

    <!--begin::Global Theme Styles -->
   
    <link href="<?=base_url('assets');?>/vendors/socicon/css/socicon.css" rel="stylesheet" type="text/css"/>
    <link href="<?=base_url('assets');?>/vendors/vendors/flaticon/css/flaticon.css" rel="stylesheet" type="text/css"/>
    <link href="<?=base_url('assets');?>/vendors/jstree/dist/themes/default/style.css" rel="stylesheet" type="text/css"/>
    <link href="<?=base_url('assets');?>/vendors/vendors/metronic/css/styles.css" rel="stylesheet" type="text/css"/>
    <link href="<?=base_url('assets');?>/vendors/chartist/dist/chartist.min.css" rel="stylesheet" type="text/css"/>
    <link href="<?=base_url('assets');?>/vendors/dropzone/dist/dropzone.css" rel="stylesheet" type="text/css"/>

    <!--end:: Global Optional Vendors -->
<?php if($this->session->userdata('site_lang')=="arabic"  ) { ?>
        <link href="<?=base_url('assets');?>/css/style.bundle.rtl.css?v="<?= time(); ?> rel="stylesheet" type="text/css" />
	
    <?php } ?>


    <style>
    td {
    text-align: center;
}
span.dwndelbtn {
    float: right;
}
    .smalltxtdata {
            font-size: 11px;
    }
        .dataTables_wrapper .pagination .page-item.next > .page-link:hover, .dataTables_wrapper .pagination .page-item:hover > .page-link {
    background: #1f3959;
    color: #ffffff !important;
}

       .m-form.m-form--group-seperator-dashed .m-form__group {
            border-bottom: 0px dashed #ebedf2;
        }
        .thh h3{
            background: #1F3958;
            color: #fff;
            font-weight: bold;
            font-size: 15px;
            text-transform: uppercase;
            padding: 10px 10px 10px 29px;
            -webkit-border-top-left-radius: 20px !important;
            -webkit-border-top-right-radius: 20px !important;
            -moz-border-radius-topleft: 20px !important;
            -moz-border-radius-topright: 20px !important;
            border-top-left-radius: 20px !important;
            border-top-right-radius: 20px !important;
            margin: 15px 15px 0 15px;
        }
        .in_fo{
            box-shadow: 0px 5px 10px 0px #cccccc !important;
            margin: 0 15px;
            padding-bottom: 20px;
            -webkit-border-bottom-right-radius: 20px;
            -webkit-border-bottom-left-radius: 20px;
            -moz-border-radius-bottomright: 20px;
            -moz-border-radius-bottomleft: 20px;
            border-bottom-right-radius: 20px;
            border-bottom-left-radius: 20px;
        }
        .m-form.m-form--group-seperator-dashed .m-form__group {
            border-bottom: 0px dashed #ebedf2;
            padding-bottom: 0;
            padding-top: 10px;
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
            background: #CAA457 url('<?php echo base_url('assets/images');?>ic.svg');
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

        span.m-menu__link-text {
            padding-left: 10px !important;
        }

     .dbg {
            background: url('<?php echo base_url('assets/images');?>/img/icons/D1-1.png');
        }

        .dbg2 {
            background: url('<?php echo base_url('assets/images');?>/img/icons/E-111.png');
        }

        .dbg3 {
            background: url('<?php echo base_url('assets/images');?>/img/icons/Ar1-1.png');
        }

        .dbg4 {
            background: url('<?php echo base_url('assets/images');?>/img/icons/S222.png');
        }

        .dbg5 {
            background: url('<?php echo base_url('assets/images');?>/img/icons/Wr1-1.png');
        }

        .dbg6 {
            background: url('<?php echo base_url('assets/images');?>/img/icons/Co1-1.png');
        }

        .dbg7 {
            background: url('<?php echo base_url('assets/images');?>/img/icons/V333.png');
        }

        .dbg8 {
            background: url('<?php echo base_url('assets/images');?>/img/icons/G222.png');
        }

        .dbg9 {
            background: url('<?php echo base_url('assets/images');?>/img/icons/W-111.png');
        }

        .dbg10 {
            background: url('<?php echo base_url('assets/images');?>/img/icons/C1-1.png');
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
            background: #CAA457 url('ic.svg');
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

        span.m-menu__link-text {
            padding-left: 10px !important;
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
            color: #172b4c !important;;
        }

        .m-menu__link-icon:hover {
            color: #172b4c !important;
        }

        .m-menu__link-text:hover {
            color: #172b4c !important;
        }

        .client-list li a {
            width: 100%;
            padding: 50px;
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
            background-image: url(../images/white-left-big.png);
        }

        #home2 .home-boxes .slick-arrow.slick-next {
            margin-right: -50px;
            background-image: url(../images/white-right-big.png);
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
            background: transparent;
            -webkit-box-shadow: 0px 0px 0px 0px rgba(69, 65, 78, 0.2);
            box-shadow: 0px 0px 0px 0px rgba(69, 65, 78, 0.2);
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
       
        tr.submissions td {
           border-top: 1px solid #000;
        }
      .table.table-striped tbody td {
         border: 1px solid #ffffff;
        }
.table.table-striped tbody tr.submissions {
    border-top: 1px solid #000 !important;
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
       /* .table-hover tbody tr:hover {
            background-color: #f7f8fa;
            -moz-box-shadow: 0 0 3px 0 rgba(0, 0, 0, 0.8);
            -webkit-box-shadow: 0 0 3px 0 rgba(0, 0, 0, 0.8);
            box-shadow: 0 0 3px 0 rgba(0, 0, 0, 0.8);
            -webkit-transform:scale(1.0);
            -moz-transform:scale(1.05);
            -ms-transform:scale(1.05);
            -o-transform:scale(1.05);
            transform:scale(1.04);
            z-index: 2;
        }*/
        .form-control {
            height: 50px;
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
        .mee{
            display: none;
        }
        .butj{
            display: none;
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
		 .fbell{ left: 0; }
    </style>
<?php if($this->session->userdata('site_lang')=="arabic"  ) { ?>
 	<style> .fbell{ right: 0; }</style>
        <link href="<?=base_url('assets');?>/css/rtl.css" rel="stylesheet" type="text/css" />
    <?php } ?>


	
    <!-- Container -->
<!-- <?php $user=$this->db->select('*')->where('id',$this->session->userdata('user_id'))->get('users')->row_array();?>	
<section id="home" class="sm-py white fullwidth bg-soft-colored bg-soft bg-scroll cover loaded" data-background="<?php echo base_url('assets/');?>/content/etna/images/about_01.jpg" style="background-image: url(../content/etna/images/about_01.jpg);">
    <div class="container">
        <div class="row calculate-height">
            <div class="t-center t-center-xs col-sm-12 col-xs-12" style="height: 44px;">
                <h2><?php echo $pageTitle;?></h2>
            </div>
        </div>
    </div>
</section> -->
<!-- End Container -->

<section>
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
                    <div class="m-stack__item m-stack__item--fluid m-header-head d-flex justify-content-between" id="m_header_nav">

                        <!-- BEGIN: Horizontal Menu -->
                        <button class="m-aside-header-menu-mobile-close  m-aside-header-menu-mobile-close--skin-dark "
                                id="m_aside_header_menu_mobile_close_btn"><i class="la la-close"></i>
                        </button>
                        <div id="m_header_menu"
                             class="m-header-menu">
                            <ul class="m-menu__nav  m-menu__nav--submenu-arrow ">
                                
                                <li class="m-menu__item  m-menu__item--rel">
                                    <span class="m-topbar__username" style="color: black !important;"><?php echo $this->lang->line('Welcome');?>! <?php echo $user['name']; ?></b> </span>
                                </li>
                                <?php if ( $is_dashboard ) { ?>
                                <li class="m-menu__item  m-menu__item--rel" m-menu-submenu-toggle="click"
                                    m-menu-link-redirect="1" aria-haspopup="true">
                                    <span class="m-menu__link-text">
                                        <?php 
                                            $user_id = $this->session->userdata('user_id');
                                            $idtype = $this->db->select('*')->where("(id=$user_id)", NULL, FALSE)->get('users')->row_array();
                                            //if($idtype['id_type'] =='' OR  $idtype['id_numbers']==""){ $url = "modify_case?updateprofile=true"; } else { $url =base_url()."add_case"; }
                                         $url =base_url()."add_case"; 
                                        ?>
                                        <a href="<?php echo $url; ?>" class="btn btn-primary m-btn m-btn--custom m-btn--icon m-btn-request" style="border-radius: 20px;">
                                            <span>
                                                <i class="fa fa-plus"></i>
                                                <span><?php echo $this->lang->line('Request_New_E_Service');?></span>
                                            </span>
                                        </a>
                                    </span>
                                </li>
                                <?php } ?>

                            </ul>
                        </div>

                        <!-- END: Horizontal Menu -->

                        <!-- BEGIN: Topbar -->
                        <div id="m_header_topbar"
                             class="m-topbar  m-stack m-stack--ver m-stack--general m-stack--fluid">
                            <div class="m-stack__item m-topbar__nav-wrapper">
                                <ul class="m-topbar__nav m-nav m-nav--inline">
                                    <li class="language-list-item m-nav__item m-topbar__languages " m-dropdown-toggle="click" aria-expanded="true">
                                    <?php if($this->session->userdata('site_lang')=="arabic" ) { ?>
                                            <a href="<?php echo base_url('langswitch/switchLanguage/english'); ?>" class="m-nav__link m-dropdown__toggle">
                                            <span class="m-nav__link-text">
                                            <img class="m-topbar__language-selected-img" src="<?php echo base_url('assets/images');?>/img/flag-usa.png" title="English">	
                                            </span>
                                            </a>

                                    <?php } else { ?>
                                    
                                            <a href="<?php echo base_url('langswitch/switchLanguage/arabic'); ?>" class="m-nav__link m-dropdown__toggle">
                                            <span class="m-nav__link-text">
                                            <img class="m-topbar__language-selected-img" src="<?php echo base_url('assets/images');?>/img/flag_ksa.png" title="Arabic">	
                                            </span>
                                            </a>
                                    <?php } ?>
                                    </li>
                                    <li class="m-nav__item profile-list-item">
                                        <div class="m-nav__link">

                                            <a href="<?= base_url('modify_case'); ?>">
                                                <span class="m-nav__link-text">
                                                    <img class="m-topbar__language-selected-img" width="26px" src="<?php echo base_url(); ?>/assets/images/img/user-dp.svg">	
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

        <div class="row butj">
            <div class="col-md-12">

                <div>
                    <a href="#" data-toggle="collapse" data-target="#menk">
                        <div class="menu-toggle222" align="center">
                            <span></span>
                            <span></span>
                            <span></span>
                        </div>
                    </a>
                    <div id="menk" class="collapse" style="background: #1F3958;">
                        <div id="m_ver_menu" class="m-aside-menu  m-aside-menu--skin-dark m-aside-menu--submenu-skin-dark " m-menu-vertical="1" m-menu-scrollable="1" m-menu-dropdown-timeout="500" style="position: relative;">
                            <ul class="m-menu__nav  m-menu__nav--dropdown-submenu-arrow ">

                                <li class="m-menu__item" aria-haspopup="true">
                                    <a href="<?= base_url('dashboard'); ?>" class="m-menu__link link_men_bg dbg">
                                        <span class="m-menu__link-text"><?php echo $this->lang->line('Dashboard');?></span>
                                    </a>
                                </li>

                                <li class="m-menu__item" aria-haspopup="true">
                                    <a href="<?= base_url('case_list'); ?>" class="m-menu__link link_men_bg dbg2">
                                        <span class="m-menu__link-text"><?php echo $this->lang->line('E_service');?></span>
                                    </a>
                                </li>

                                <li class="m-menu__item" aria-haspopup="true">
                                    <a href="<?= base_url('list_session_appoinment'); ?>" class="m-menu__link link_men_bg dbg4">
                                        <span class="m-menu__link-text"><?php echo $this->lang->line('Session');?></span>
                                    </a>
                                </li>

                                <li class="m-menu__item" aria-haspopup="true">
                                    <a href="<?= base_url('bank_transfer'); ?>" class="m-menu__link link_men_bg dbg9">
                                        <span class="m-menu__link-text"><?php echo $this->lang->line('Wallet');?></span>
                                    </a>
                                </li>

                                <li class="m-menu__item" aria-haspopup="true">
                                    <a href="<?= base_url('list_consultation_appoinment'); ?>" class="m-menu__link link_men_bg dbg6">
                                        <span class="m-menu__link-text"><?php echo $this->lang->line('Consultation');?></span>
                                    </a>
                                </li>

                                <li class="m-menu__item" aria-haspopup="true">
                                    <a href="<?= base_url('list_visiting_appoinment'); ?>" class="m-menu__link link_men_bg dbg7">
                                        <span class="m-menu__link-text"><?php echo $this->lang->line('Visiting');?></span>
                                    </a>
                                </li>

                                <li class="m-menu__item" aria-haspopup="true">
                                    <a href="<?= base_url('list_general_misssion'); ?>" class="m-menu__link link_men_bg dbg8">
                                        <span class="m-menu__link-text"><?php echo $this->lang->line('GENERAL');?></span>
                                    </a>
                                </li>
                                
                                 <li class="m-menu__item" aria-haspopup="true">
                                    <a href="<?= base_url('archive_list'); ?>" class="m-menu__link link_men_bg dbg3">
                                        <span class="m-menu__link-text"><?php echo $this->lang->line('Archives');?></span>
                                    </a>
                                </li>

                                <li class="m-menu__item" aria-haspopup="true">
                                    <a href="<?= base_url('alert'); ?>" class="m-menu__link link_men_bg">
                                       <i class="m-nav__link-icon fa fa-bell" style=" color: #ffffffd9; position: absolute; left: 0; font-size: 24px; "></i> <span class="m-menu__link-text"><?php echo $this->lang->line('Notifications');?></span>
                                    </a>
                                </li>

                                <li class="m-menu__item" aria-haspopup="true">
                                    <a href="<?= base_url('bank_transfer'); ?>" class="m-menu__link link_men_bg dbg9">
                                        <span class="m-menu__link-text"><?php echo $this->lang->line('Wallet');?></span>
                                    </a>
                                </li>

                                <li class="m-menu__item" aria-haspopup="true">
                                    <a href="<?= base_url('front/chat'); ?>" class="m-menu__link link_men_bg dbg10">
                                        <span class="m-menu__link-text"><?php echo $this->lang->line('Chatting');?></span>
                                    </a>
                                </li>

                            </ul>
                        </div>
                    </div>
                </div>

                <div class="m-menu__link-text" align="center">
                    
                        <span class="m-menu__link-text">
                            <?php 
                                $user_id = $this->session->userdata('user_id');
                                $idtype = $this->db->select('*')->where("(id=$user_id)", NULL, FALSE)->get('users')->row_array();
                                if($idtype['id_type'] =='' OR  $idtype['id_numbers']==""){ $url = "modify_case?updateprofile=true"; } else { $url =base_url()."add_case"; }
                            ?>
                            <a href="<?php echo $url; ?>" class="btn btn-primary m-btn btn-cst  m-btn--custom m-btn--icon m-btn--air" style="border-radius: 20px;">
                                <span>
                                    <i class="fa fa-plus"></i>
                                <span><?php echo $this->lang->line('Request_New_E_Service');?></span>
                                </span>
                            </a>
                        </span>
                    
                </div>
            </div>
        </div>


        <div class="m-grid__item m-grid__item--fluid m-grid m-grid--ver-desktop m-grid--desktop m-body">

            <!-- BEGIN: Left Aside -->
            <button class="m-aside-left-close  m-aside-left-close--skin-dark " id="m_aside_left_close_btn"><i
                        class="la la-close"></i></button>
            <div id="m_aside_left" class="m-grid__item	m-aside-left  m-aside-left--skin-dark ">

                <!-- BEGIN: Aside Menu -->
                <div id="m_ver_menu" class="m-aside-menu  m-aside-menu--skin-dark m-aside-menu--submenu-skin-dark " m-menu-vertical="1" m-menu-scrollable="1" m-menu-dropdown-timeout="500" style="position: relative;">
                    <ul class="m-menu__nav  m-menu__nav--dropdown-submenu-arrow ">

                        <li class="m-menu__item <?php echo ($this->uri->segment(1) == 'dashboard') ? 'm-menu__item--active' : ''; ?>" aria-haspopup="true">
                            <a href="<?= base_url('dashboard'); ?>" class="m-menu__link link_men_bg dbg">
                                <span class="m-menu__link-text"><?php echo $this->lang->line('Dashboard');?></span>
                            </a>
                        </li>

                        <li class="m-menu__item <?php echo ($this->uri->segment(1) == 'case_list' || $this->uri->segment(2) == 'view_case') ? 'm-menu__item--active' : ''; ?>" aria-haspopup="true">
                            <a href="<?= base_url('case_list'); ?>" class="m-menu__link link_men_bg dbg7">
                                <span class="m-menu__link-text"><?php echo $this->lang->line('Service');?></span>
                            </a>
                        </li>

                        
                        <li class="m-menu__item <?php echo ($this->uri->segment(1) == 'list_session_appoinment') ? 'm-menu__item--active' : ''; ?>" aria-haspopup="true">
                            <a href="<?= base_url('calendar'); ?>" class="m-menu__link link_men_bg calendar">
                                <span class="m-menu__link-text"><?php echo $this->lang->line('Calendar');?></span>
                            </a>
                        </li>

                        <li class="m-menu__item <?php echo ($this->uri->segment(1) == 'bank_transfer') ? 'm-menu__item--active' : ''; ?>" aria-haspopup="true">
                            <a href="<?= base_url('bank_transfer'); ?>" class="m-menu__link link_men_bg dbg17">
                                <span class="m-menu__link-text"><?php echo $this->lang->line('Wallet');?></span>
                            </a>
                        </li>


                        <li class="m-menu__item <?php echo ($this->uri->segment(1) == 'list_visiting_appoinment') ? 'm-menu__item--active' : ''; ?>" aria-haspopup="true">
                            <a href="<?= base_url('list_visiting_appoinment'); ?>" class="m-menu__link link_men_bg dbg16">
                                <span class="m-menu__link-text"><?php echo $this->lang->line('Meeting');?></span>
                            </a>
                        </li>
                        
                        <li class="m-menu__item <?php echo ($this->uri->segment(1) == 'archive_list') ? 'm-menu__item--active' : ''; ?>" aria-haspopup="true">
                            <a href="<?= base_url('archive_list'); ?>" class="m-menu__link link_men_bg dbg12 archive">
                                <span class="m-menu__link-text"><?php echo $this->lang->line('Archives');?></span>
                            </a>
                        </li>

                        <li class="m-menu__item <?php echo ($this->uri->segment(1) == 'front' && $this->uri->segment(2) == 'chat') ? 'm-menu__item--active' : ''; ?>" aria-haspopup="true">
                            <a href="<?= base_url('front/chat'); ?>" class="m-menu__link link_men_bg dbg15">
                                <span class="m-menu__link-text"><?php echo $this->lang->line('Support_Chat');?></span>
                            </a>
                        </li>

                    </ul>
            <a class="side-logout-menu" href="<?=base_url('front/logout');?>"> <img src="<?php echo base_url(); ?>/assets/images/img/logout-icon.svg" alt=""><?php echo $this->lang->line('logout');?></a>

                </div>

                <!-- END: Aside Menu -->
            </div>