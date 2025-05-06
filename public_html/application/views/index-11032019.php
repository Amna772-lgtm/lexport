<?php
$pageTitle = "Home";
$nvc = "white-nav shrink start-dark modern dashed radius-drop";
include('header.php');

?>

      <style>
        body{
            margin-bottom: 60px;
        }

<?php if($this->session->userdata('site_lang')=="arabic") { ?>
        .pph{
            padding-right: 13% !important;
        }
        .pph2{
            padding-right: 30% !important;
        }
        .pph3{
            padding-right: 40% !important;
        }
        .pph33{
            padding-right: 30% !important;
        }
        .pph4{
            padding-right: 10% !important;
        }
        .pph44{
            padding-right: 39% !important;
        }

        #home2 .home-boxes .slick-arrow{
            left: 0;
            top: 40%;
        }
        #home2 .home-boxes .slick-arrow.slick-next{
            left: auto;
            right: 0px;
        }
        <?php }else{ ?>
        .pph{
            padding-left: 10% !important;
            padding-right: 10% !important;
        }
        .pph2{
            padding-left: 12% !important;
            padding-right: 12% !important;
        }
        .pph3{
            padding-left: 16% !important;
            padding-right: 16% !important;
        }
        .pph33{
            padding-left: 15% !important;
            padding-right: 15% !important;
        }
        .pph4{
            padding-left: 20% !important;
            padding-right: 20% !important;
        }
        .pph44{
            padding-left: 19% !important;
            padding-right: 19% !important;
        }

        #home2 .home-boxes .slick-arrow{
            left: 0;
            top: 40%;
        }
        #home2 .home-boxes .slick-arrow.slick-next{
            left: auto;
            right: 0px;
        }
        <?php } ?>
        .quadra_fixed_modal_top div{
            *text-align: inherit;
        }
    </style>

    <!-- HOME SECTION -->
    <section id="home" class="rev_slider_wrapper fullscreen-container">
        <!-- Start Slider -->
        <div id="home_slider" class="rev_slider fullwidthabanner">
            <!-- Slider Container -->
            <ul>
                <!-- Slide -->
                <li class="t-left" data-masterspeed="1200" data-transition="boxfade" data-thumb="<?=base_url('assets/');?>content/etna/images/home_01.jpg" data-saveperformance="off"  data-title="Intro" data-description="Home Slider">
                    <!-- Background Image -->
                    <img src="<?=base_url('assets/');?>content/etna/images/home_01.jpg"  alt=""  data-bgposition="center center" data-bgfit="cover" data-bgrepeat="no-repeat" data-bgparallax="10" class="rev-slidebg" data-no-retina>
                    <!-- Layer -->

                    <div class="tp-caption gray5 light badscript rs-parallaxlevel-0 pph"
                         data-x="['left','left','left','left']"
                         data-y="['middle','middle','middle','middle']"
                         data-start="1600"
                         data-fontsize="['20','20','20','20']"
                         data-letterspacing="1"
                         data-frames='[{"delay":"+1200","speed":2000,"frame":"0","from":"y:50px;opacity:0;fb:20px;","to":"o:1;fb:0;","ease":"Power4.easeOut"},{"delay":"wait","speed":300,"frame":"999","to":"opacity:0;fb:0;","ease":"Power3.easeInOut"}]'
                         data-hoffset="['0','40','40','40']"
                         data-voffset="['-80','-80','-80','-70']">
						 <?php //echo $this->lang->line('We_establish_our_works_in_accordance_with_strategic');?>
                        
                    </div>
                    <!-- Layer -->
                    <div class="tp-caption uppercase gray7 nowrap rs-parallaxlevel-0 pph2"
                         data-x="['left','left','left','left']"
                         data-y="['middle','middle','middle','middle']"
                         data-start="1800"
                         data-fontsize="['38','35','30','30']"
                         data-frames='[{"delay":"+1400","speed":2000,"frame":"0","from":"y:50px;opacity:0;fb:20px;","to":"o:1;fb:0;","ease":"Power4.easeOut"},{"delay":"wait","speed":300,"frame":"999","to":"opacity:0;fb:0;","ease":"Power3.easeInOut"}]'
                         data-hoffset="['0','40','40','40']"
                         data-voffset="['-30','-30','-30','-30']">
						 <?php //echo $this->lang->line('To_provide_the_best');?>
                       
                    </div>
                    <!-- Layer -->
                    <div class="tp-caption uppercase gray7 nowrap rs-parallaxlevel-0 pph3"
                         data-x="['left','left','left','left']"
                         data-y="['middle','middle','middle','middle']"
                         data-start="2000"
                         data-fontsize="['38','35','30','30']"
                         data-frames='[{"delay":"+1600","speed":2000,"frame":"0","from":"y:50px;opacity:0;fb:20px;","to":"o:1;fb:0;","ease":"Power4.easeOut"},{"delay":"wait","speed":300,"frame":"999","to":"opacity:0;fb:0;","ease":"Power3.easeInOut"}]'
                         data-hoffset="['0','40','40','40']"
                         data-voffset="['25','20','20','15']">
						 <?php // echo $this->lang->line('legal_services');?>
						 <?php echo $this->lang->line('Law_in_its_newest_perspective');?>
						 
                    </div>
                    <!-- Layer -->
                    <div class="tp-caption rs-parallaxlevel-0 pph4"
                         data-x="['left','left','left','left']"
                         data-y="['middle','middle','middle','middle']"
                         data-start="2200"
                         data-frames='[{"delay":"+1800","speed":2000,"frame":"0","from":"y:50px;opacity:0;fb:20px;","to":"o:1;fb:0;","ease":"Power4.easeOut"},{"delay":"wait","speed":300,"frame":"999","to":"opacity:0;fb:0;","ease":"Power3.easeInOut"}]'
                         data-hoffset="['0','40','40','40']"
                         data-voffset="['84','75','75','65']">
                        <a href="#about" class="qdr-hover-2-rotate md-btn bg-colored normal white nowrap uppercase">
						<?php echo $this->lang->line('who_we_are');?>
                           
                        </a>
                    </div>

                </li>

                <!-- Slide -->
                <li class="t-left" data-masterspeed="1200" data-transition="boxfade" data-thumb="<?=base_url('assets/');?>content/etna/images/home_02.jpg" data-saveperformance="off"  data-title="Intro" data-description="Home Slider">
                    <!-- Background Image -->
                    <img src="<?=base_url('assets/');?>content/etna/images/home_02.jpg"  alt=""  data-bgposition="center center" data-bgfit="cover" data-bgrepeat="no-repeat" data-bgparallax="10" class="rev-slidebg" data-no-retina>
                    <!-- Layer -->
                    <div class="tp-caption gray7 light ls-1 badscript nowrap rs-parallaxlevel-0 pph33"
                         data-x="['left','left','left','left']"
                         data-y="['middle','middle','middle','middle']"
                         data-start="1600"
                         data-fontsize="['20','20','20','20']"
                         data-frames='[{"delay":"+1200","speed":2000,"frame":"0","from":"x:-70px;opacity:0;fb:20px;","to":"o:1;fb:0;","ease":"Power4.easeOut"},{"delay":"wait","speed":300,"frame":"999","to":"opacity:0;fb:0;","ease":"Power3.easeInOut"}]'
                         data-hoffset="['0','40','40','40']"
                         data-voffset="['-80','-80','-80','-70']">
						 <?php //echo $this->lang->line('Comprehensive_legal_management');?>
                        
                    </div>
                    <!-- Layer -->
                    <div class="tp-caption gray7 uppercase rs-parallaxlevel-0 pph2"
                         data-x="['left','left','left','left']"
                         data-y="['middle','middle','middle','middle']"
                         data-start="1800"
                         data-fontsize="['38','35','30','30']"
                         data-frames='[{"delay":"+1300","speed":2000,"frame":"0","from":"x:-70px;opacity:0;fb:20px;","to":"o:1;fb:0;","ease":"Power4.easeOut"},{"delay":"wait","speed":300,"frame":"999","to":"opacity:0;fb:0;","ease":"Power3.easeInOut"}]'
                         data-hoffset="['0','40','40','40']"
                         data-voffset="['-30','-30','-30','-30']">
						 <?php echo $this->lang->line('We_support_creative_ideas_to');?>
						 <?php //echo $this->lang->line('For_companies_and');?>
                        
                    </div>
                    <!-- Layer -->
                    <div class="tp-caption gray7 uppercase rs-parallaxlevel-0 pph3"
                         data-x="['left','left','left','left']"
                         data-y="['middle','middle','middle','middle']"
                         data-start="2000"
                         data-fontsize="['38','35','30','30']"
                         data-frames='[{"delay":"+1600","speed":2000,"frame":"0","from":"x:-70px;opacity:0;fb:20px;","to":"o:1;fb:0;","ease":"Power4.easeOut"},{"delay":"wait","speed":300,"frame":"999","to":"opacity:0;fb:0;","ease":"Power3.easeInOut"}]'
                         data-hoffset="['0','40','40','40']"
                         data-voffset="['25','20','20','15']">
						 <?php echo $this->lang->line('reach_business_solutions');?>
						 <?php //echo $this->lang->line('business_men');?>
                        
                    </div>
                    <!-- Layer -->
                    <div class="tp-caption light gray1 nowrap rs-parallaxlevel-0 pph4"
                         data-x="['left','left','left','left']"
                         data-y="['middle','middle','middle','middle']"
                         data-start="2200"
                         data-frames='[{"delay":"+1800","speed":2000,"frame":"0","from":"x:-70px;opacity:0;fb:20px;","to":"o:1;fb:0;","ease":"Power4.easeOut"},{"delay":"wait","speed":300,"frame":"999","to":"opacity:0;fb:0;","ease":"Power3.easeInOut"}]'
                         data-hoffset="['0','40','40','40']"
                         data-voffset="['84','75','75','65']">
                        <a href="#categories" class="qdr-hover-1-bottom px-30 py-7 bg-colored white nowrap uppercase">
						<?php echo $this->lang->line('who_we_are');?>
                            
                        </a>
                    </div>
                </li>
                <!-- Slide -->
                <li class="t-left" data-masterspeed="1200" data-transition="boxfade" data-thumb="<?=base_url('assets/');?>content/etna/images/home_03.jpg" data-saveperformance="off"  data-title="Intro" data-description="Home Slider">
                    <!-- Background Image -->
                    <img src="<?=base_url('assets/');?>content/etna/images/home_03.jpg"  alt=""  data-bgposition="center center" data-bgfit="cover" data-bgrepeat="no-repeat" data-bgparallax="10" class="rev-slidebg" data-no-retina>
                    <!-- Layer -->
                    <div class="tp-caption gray7 badscript rs-parallaxlevel-0 pph44"
                         data-x="['left','left','left','left']"
                         data-y="['middle','middle','middle','middle']"
                         data-start="1600"
                         data-fontsize="['20','20','20','20']"
                         data-letterspacing="1"
                         data-frames='[{"delay":"+1200","speed":2000,"frame":"0","from":"x:-70px;opacity:0;fb:20px;","to":"o:1;fb:0;","ease":"Power4.easeOut"},{"delay":"wait","speed":300,"frame":"999","to":"opacity:0;fb:0;","ease":"Power3.easeInOut"}]'
                         data-hoffset="['0','40','40','40']"
                         data-voffset="['-80','-80','-80','-70']">
						 <?php //echo $this->lang->line('Encourage_innovative_ideas');?>
                        
                    </div>
                    <!-- Layer -->
                    <div class="tp-caption uppercase gray7 rs-parallaxlevel-0 pph2"
                         data-x="['left','left','left','left']"
                         data-y="['middle','middle','middle','middle']"
                         data-start="1800"
                         data-fontsize="['38','35','30','30']"
                         data-frames='[{"delay":"+1300","speed":2000,"frame":"0","from":"x:-70px;opacity:0;fb:20px;","to":"o:1;fb:0;","ease":"Power4.easeOut"},{"delay":"wait","speed":300,"frame":"999","to":"opacity:0;fb:0;","ease":"Power3.easeInOut"}]'
                         data-hoffset="['0','40','40','40']"
                         data-voffset="['-30','-30','-30','-30']">
						 <?php //echo $this->lang->line('To_reach_commercial');?>
						 <?php echo $this->lang->line('We_provide_comprehensive_legal_management');?>
                        
                    </div>
                    <!-- Layer -->
                    <div class="tp-caption uppercase gray7 rs-parallaxlevel-0 pph4"
                         data-x="['left','left','left','left']"
                         data-y="['middle','middle','middle','middle']"
                         data-start="2000"
                         data-fontsize="['38','35','30','30']"
                         data-frames='[{"delay":"+1600","speed":2000,"frame":"0","from":"x:-70px;opacity:0;fb:20px;","to":"o:1;fb:0;","ease":"Power4.easeOut"},{"delay":"wait","speed":300,"frame":"999","to":"opacity:0;fb:0;","ease":"Power3.easeInOut"}]'
                         data-hoffset="['0','40','40','40']"
                         data-voffset="['25','20','20','15']">
						 <?php //echo $this->lang->line('solutions');?>
						 <?php echo $this->lang->line('for_corporations_and_businesspersons');?>
                        
                    </div>
                    <!-- Layer -->
                    <div class="tp-caption gray7 rs-parallaxlevel-0 pph4"
                         data-x="['left','left','left','left']"
                         data-y="['middle','middle','middle','middle']"
                         data-start="2200"
                         data-frames='[{"delay":"+1800","speed":2000,"frame":"0","from":"x:-70px;opacity:0;fb:20px;","to":"o:1;fb:0;","ease":"Power4.easeOut"},{"delay":"wait","speed":300,"frame":"999","to":"opacity:0;fb:0;","ease":"Power3.easeInOut"}]'
                         data-hoffset="['0','40','40','40']"
                         data-voffset="['84','75','75','65']">
                        <a href="#about" class="qdr-hover px-30 py-7 bg-colored white nowrap uppercase">
						<?php echo $this->lang->line('who_we_are');?>
                            
                        </a>
                    </div>
                </li>
            </ul>
            <!-- End Container -->
        </div>
        <!-- End Slider -->
    </section>
    <!-- END HOME SECTION -->

    <!-- Home Page Notes -->
    <div id="etna_home_notes" class="bg-gray white bb-1 border-solid border-gray">

        <div id="about" class="notes clearfix">

            <!-- Left Note -->
            <div class="left-note uppercase">
                <!-- Note -->
                <p><?php echo $this->lang->line("WELCOME_HOME");?></p>
            </div>
            <!-- End left mini note -->

            <!-- Home big content -->
            <div class="home-content calculate-height clearfix">

                <!-- Left, animated area (will be same heighted with right area)-->
                <div class="left bg-soft-colored bg-soft bg-animated bg-scroll cover" data-background="<?=base_url('assets/');?>content/etna/images/about_01.jpg">
                    <!-- Vertical centered inner -->
                    <div>
                        <!-- Title -->
                        <h1 class="uppercase">
                            <?php echo $this->lang->line('about_us');?> <br class="hidden-xs">
                          
                        </h1>
                        <!-- Description -->
                        <p class="xxs-my font-17 normal">
						<?php echo $this->lang->line('Look_at_p1');?>
                           
                        </p>

                        <div>

                            <a href="https://youtu.be/ZLNO2c7nqjw" class="lightbox inline-block text-center" style="margin-top: 10px;">
                                <span class="icon-md icon-mobile-md icon-animated1 colored circle icon fa fa-play bg-white border-colored scale-hover font-16"></span>
                                <span class="underline-hover uppercase" style="margin-left: 10px;font-size: 20px;"><?php echo $this->lang->line('See_Our_Video');?></span>
                            </a>

                        </div>
                    </div>
                </div>
                <!-- End left area -->

                <!-- Right, big content (will be same heighted with left area) -->
                <div class="right bg-soft bg-soft-colored1 cover" data-background="<?=base_url('assets/');?>content/etna/images/about_02.jpg">
                    <!-- Vertical Centered 2 column boxes --><div class="content-boxes vertical-center qdr-col-3 gap-7 clearfix t-center" style="margin-top: -94px;">
                        <!-- Box -->
                        <a href="#services" class="mb-30" style="margin-bottom: 30px;">
                            <i class="fa fa-eye"></i>
                            <h2><?php echo $this->lang->line("our_vision");?></h2>
                            <p><?php echo $this->lang->line('home_our_vision_detail'); ?></p>
                        </a>

                        <!-- Box -->
                        <a href="#categories">
                            <i class="fa fa-window-restore"></i>
                            <h2><?php echo $this->lang->line('our_mission');?></h2>
                            <p><?php echo $this->lang->line('home_our_mission_detail');?></p>
                        </a>

                        <!-- Box -->
                        <a href="#about" class="mb-30" style="margin-bottom: 30px;">
                            <i class="fa fa-check"></i>
                            <h2><?php echo $this->lang->line('our_values');?></h2>
                            <p></p>
                        </a>
                    </div>
               
                    <!-- End Boxes -->
                </div>
                <!-- End Right area -->

            </div>
            <!-- End Big Content -->

        </div>
        <!-- End Notes Container -->

        <div class="about-notes container t-center relative top--40" style="top: -40px;">
            <div>
                <!-- Title Slider Texts - For #type span. -->
                <div id="type-get" style="display: none;">
                    <p><?php echo $this->lang->line('MORE_THAN');?> <b class="colored">20</b> <?php echo $this->lang->line('PARTNERS');?></p>
                    <p><?php echo $this->lang->line('MORE_THAN');?> <b class="colored">50</b> <?php echo $this->lang->line('Years_Experience');?></p>
                    <p><b class="colored">3</b> <?php echo $this->lang->line('BRANCHES');?></p>
                </div>
                <!-- Title -->
                <h1 class="extrabold-title gray6" style="font-family: 'Tajawal-Regular';letter-spacing: 1px;"><?php echo $this->lang->line('We_Have');?> <span id="type"></span></h1>
                <div class="title-strips-over dark"></div>
            </div>
        </div>

    </div>
    <!-- End Home Page Notes -->

    <!-- QUADRA FIXED MODAL -->
    <section id="quadra_fixed_modal" class="bg-white slow-qdr clickable" data-showme="#categories" data-hideme="#testimonials">
        <!-- Modal title and title -->
        <div class="quadra_fixed_modal_top slow-qdr no-border">
            <!-- Button, select your color and background color. you can use data-color="#" attribute. -->
            <div id="qfm_button" class="white" data-bgcolor="#888f99" style="background-color: rgb(136, 143, 153);">
                <!-- Comp. Hide Modal -->
                <span class="hide-modal"></span>
            <span>    <?php echo $this->lang->line('Download_the_App'); ?></span>
                   <i class="fa fa-apple"></i>
                <i class="fa fa-android"></i>
            </div>
            <!-- Title, select your color and background color. you can use data-color="#" attribute. -->
            <div data-bgcolor="#fafafa" id="qfm_title" class="dark">
                <i class="fa fa-close close_modal"></i>
                <span class="modal_title"><?php echo $this->lang->line('Download_the_App'); ?></span>
             
            </div>
        </div>
        <!-- PORTFOLIO SECTION - You can add filters with the #filters ID -->
        <div id="works" class="t-center sm-pt">

            <!-- Strips -->
            <div class="title-strips"></div>
            <!-- Description -->
            <p class="description">
				<?php echo $this->lang->line('Download_the_App_p1');?>
                <br class="hidden-xs">
				<?php //echo $this->lang->line('index_p2');?>
                
            </p>


            <div class="product mt-50 relative fullwidth height-auto">
                <!-- Your Product Image -->
                <div class="mockups">
                    <img src="<?=base_url('assets/images/');?>img/bg_apps2.jpg" alt="" usemap="#Map" />
<map name="Map" id="Map">
    <area alt="Play Store" title="Play Store" href="https://play.google.com/store/apps/details?id=com.albarakati.android" shape="poly" coords="52,289,55,352,259,345,243,284" />
    <area alt="App Store" title="App Store" href="" shape="poly" coords="38,191,39,253,250,250,245,198" />
 
</map>
 
                    </div>
                    
            </div>

        </div>
    </section>
    <!-- END QUADRA FIXED MODAL -->



    <!-- HOME SECTION -->
    <section id="home2" class="relative feronia-amblem t-center bg-animated bg-center bg-repeatx bg-scroll loaded" data-background="<?=base_url('assets/');?>content/etna/images/background_animated.jpg" style="height: 870px; background-image: url('<?=base_url('assets/');?>content/etna/images/background_animated.jpg');">

        <h1 class="title" style="padding-top: 5%;color: #ffffff">
            <?php echo $this->lang->line('services');?>
        </h1>

        <div class="title-strips"></div>
        <!-- Description -->
        <p class="description white">
			<?php echo $this->lang->line('our_services_p1');?>
             <br class="hidden-xs">
			<?php //echo $this->lang->line('our_services_p2');?>
            
        </p>

<div id="transformation" class="transformation">
            <!-- Transformation Items -->
            <div id="transformer" class="box-slider-container sm-mt bs-xl no-px">
                <div class="twentytwenty-wrapper twentytwenty-horizontal"><div class="twentytwenty-container" style="height: 112.703px;">
                    <img src="<?=base_url('assets/images/');?>img/left_image3.jpg" class="img-responsive twentytwenty-before" alt="" style="clip: rect(0px, 0px, 112.703px, 0px);">
                    <img src="<?=base_url('assets/images/');?>img/right_image3.jpg" class="img-responsive twentytwenty-after" alt="" usemap="#Map_r">
                    <map name="Map_r" id="Map_r">
                        <area alt="" title="login" href="#" shape="rect" coords="457,25,405,46">
                        <area alt="" title="register" href="#" shape="rect" coords="481,55,404,73">
                        <area alt="" title="google play" href="#" shape="rect" coords="371,23,230,72">
                        <area alt="" title="app store" href="#" shape="rect" coords="197,23,64,74">
                    </map>
                <div class="twentytwenty-overlay"><div class="twentytwenty-before-label"></div><div class="twentytwenty-after-label"></div></div><div class="twentytwenty-handle" style="left: 0px;"><span class="twentytwenty-left-arrow"></span><span class="twentytwenty-right-arrow"></span></div></div></div>
            </div>
        </div>
 

        <!-- Home Box Slider -->
        <div class="box-slider-container">
            <!-- Home Page Note -->
            <div class="home-boxes custom-slider c-grab" data-slick='{"slidesToShow": 3, "arrows": true, "slidesToScroll": 1, "draggable": true, "responsive":[ {"breakpoint": 1480,"settings":{"slidesToShow": 3}}, {"breakpoint": 1024,"settings":{"slidesToShow": 2}}, {"breakpoint": 700,"settings":{"slidesToShow": 1}} ]}'>

                <!-- Item -->
                <div class="item clearfix light">
                    <!-- Number -->
                    <div class="gray number"><img src="<?=base_url('assets/images/');?>img/bt3_b.svg" width="45"/></div>
                    <!-- Texts -->
                    <div class="f-left fullheight texts">
                        <!-- Title -->
                        <h3 class="gray"><?php echo $this->lang->line('Law_consultancy_and_studie');?></h3>
                        <!-- Description -->
                        <p class="gray2"><?php echo substr($this->lang->line('Law_consultancy_and_studie_p1'),0,93)."...";?></p>
                    </div>
                    <!-- End Texts -->
                </div>
                <!-- End Item -->


                <!-- Item -->
                <div class="item clearfix light">
                    <!-- Number -->
                    <div class="gray number"><img src="<?=base_url('assets/images/');?>img/bt3_b.svg" width="45"/></div>
                    <!-- Texts -->
                    <div class="f-left fullheight texts">
                        <!-- Title -->
                        <h3 class="gray"><?php echo $this->lang->line('Contracts_and_Agreements');?></h3><br>
                        <!-- Description -->
                        <p class="gray2"><?php echo substr($this->lang->line('Contracts_and_Agreements_p1'),0,89)."...";?></p>
                    </div>
                    <!-- End Texts -->
                </div>
                <!-- End Item -->

                <!-- Item -->
                <div class="item clearfix light active">
                    <!-- Number -->
                    <div class="gray number"><img src="<?=base_url('assets/images/');?>img/bt3_b.svg" width="45"/></div>
                    <!-- Texts -->
                    <div class="f-left fullheight texts">
                        <!-- Title -->
                        <h3 class="gray"><?php echo $this->lang->line('Litigation');?></h3><br>
                        <!-- Description -->
                        <p class="gray2"><?php echo substr($this->lang->line('Litigation_p1')
						,0,97)."...";?></p>
                    </div>
                    <!-- End Texts -->
                </div>
                <!-- End Item -->

                <!-- Item -->
                <div class="item clearfix light">
                    <!-- Number -->
                    <div class="gray number"><img src="<?=base_url('assets/images/');?>img/bt3_b.svg" width="45"/></div>
                    <!-- Texts -->
                    <div class="f-left fullheight texts">
                        <!-- Title -->
                        <h3 class="gray"><?php echo $this->lang->line('Companies_and_Trade_Business');?></h3>
                        <!-- Description -->
                        <p class="gray2"><?php echo substr($this->lang->line('Companies_and_Trade_Business_p1'),0,107)."...";?></p>
                    </div>
                    <!-- End Texts -->
                </div>
                <!-- End Item -->

                <!-- Item -->
                <div class="item clearfix light">
                    <!-- Number -->
                    <div class="gray number"><img src="<?=base_url('assets/images/');?>img/bt3_b.svg" width="45"/></div>
                    <!-- Texts -->
                    <div class="f-left fullheight texts">
                        <!-- Title -->
                        <h3 class="gray"><?php echo $this->lang->line('Execution_of_Judgments_and_Collection_of_Debts');?></h3>
                        <!-- Description -->
                        <p class="gray2"><?php echo substr($this->lang->line('Execution_of_Judgments_and_Collection_of_Debts_p1'),0,109)."...";?></p>
                    </div>
                    <!-- End Texts -->
                </div>
                <!-- End Item -->

                <!-- Item -->
                <div class="item clearfix light">
                    <!-- Number -->
                    <div class="gray number"><img src="<?=base_url('assets/images/');?>img/bt3_b.svg" width="45"/></div>
                    <!-- Texts -->
                    <div class="f-left fullheight texts">
                        <!-- Title -->
                        <h3 class="gray"><?php echo $this->lang->line('Liquidation_of_Legacies_and_Management_of_Endowments');?></h3>
                        <!-- Description -->
                        <p class="gray2"><?php echo substr($this->lang->line('Liquidation_of_Legacies_and_Management_of_Endowments_p1'),0,109)."...";?></p>
                    </div>
                    <!-- End Texts -->
                </div>
                <!-- End Item -->

                <!-- Item -->
                <div class="item clearfix light">
                    <!-- Number -->
                    <div class="gray number"><img src="<?=base_url('assets/images/');?>img/bt3_b.svg" width="45"/></div>
                    <!-- Texts -->
                    <div class="f-left fullheight texts">
                        <!-- Title -->
                        <h3 class="gray"><?php echo $this->lang->line('Documentation');?></h3><br>
                        <!-- Description -->
                        <p class="gray2"><?php echo substr($this->lang->line('Documentation_p1'),0,92)."...";?></p>
                    </div>
                    <!-- End Texts -->
                </div>
                <!-- End Item -->

                <!-- Item -->
                <div class="item clearfix light">
                    <!-- Number -->
                    <div class="gray number"><img src="<?=base_url('assets/images/');?>img/bt3_b.svg" width="45"/></div>
                    <!-- Texts -->
                    <div class="f-left fullheight texts">
                        <!-- Title -->
                        <h3 class="gray"><?php echo $this->lang->line('Arbitration_and_Mediation');?></h3><br>
                        <!-- Description -->
                        <p class="gray2"><?php echo substr($this->lang->line('Arbitration_and_Mediation_p1'),0,103)."...";?></p>
                    </div>
                    <!-- End Texts -->
                </div>
                <!-- End Item -->

            </div>

        </div>
        <!-- End Home Box Slider -->


        <div class="bg-animator"></div>
    </section>
    <!-- END HOME SECTION -->

    <!-- TEAM SECTION - -->
    <section id="team" class="team-type-2 py">

        <!-- Title -->
        <h1 class="title">
            <?php echo $this->lang->line('our_team'); ?>
        </h1>
        <!-- Strips -->
        <div class="title-strips"></div>


        <!-- Container -->
        <div class="container custom-slider">
		 <?php $i=0;foreach($team  as $team) { if($i <= 3 ) { ?>
					<!-- Member -->
					<div class="member">
						<!-- Container for details -->
						<div class="member-body">
							<img src="<?= base_url('uploads/team/'.$team['image']); ?>" alt="team member">
							<!-- Socials -->
						<!--	<div class="member-socials">
								<div><a href="#" class="linkedin"><i class="fa fa-linkedin"></i></a></div>
								<div><a href="#" class="twitter"><i class="fa fa-twitter"></i></a></div>
								<div><a href="#" class="instagram"><i class="fa fa-instagram"></i></a></div>
							</div>-->
						</div>
						<!-- Description -->
						<div class="member-description">
							<h2><?= $team['name']; ?></h2>
							<h4 class="colored"><?= $team['designation']; ?></h4>
						</div>
						<!-- Progress Bars -->
						<!-- End Progress Bars -->
					</div>
		  <?php $i++; } } ?>
            <!-- Member -->
             
        </div>
        <!-- End Team Slider -->
    </section>
    <!-- END TEAM -->


<?php
include('footer.php');