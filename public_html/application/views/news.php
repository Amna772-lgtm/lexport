<?php
$nvc = "white-nav sticky shrink modern hover4 radius-drop";
$pageTitle = $this->lang->line("Social_Responsibility");
include('header.php');
?>

<style>
    .bg-soft-gradient1:before {
        opacity: 0.9;
        background: #caa457;
        background: -moz-linear-gradient(45deg, #caa457 0%, #e1b763 100%);
        background: -webkit-linear-gradient(45deg, #caa457 0%,#e1b763 100%);
        background: linear-gradient(to 45deg, #caa457 0%,#e1b763 100%);
    }
</style>

    <!-- CONTENT -->
    <section id="home44" class="sm-py white fullwidth  bg-soft-colored bg-soft bg-scroll cover" data-background="<?php echo base_url('assets');?>/content/etna/images/about_01.jpg">
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


    <!-- CONTENTS -->
    <section id="contents" class="contents xxs-px white">

        <!-- Row -->
        <div class="row calculate-height block-links o-hidden">
            <!-- Box -->
            <div class="content-box col-lg-6 col-12 bg-gradient animated" data-animation="fadeInUp" data-animation-delay="100">
                <!-- Centered align details -->
                <div class="inner">
                    <a href="" class="inline-block animated fadeInUp visible" data-animation="fadeInUp" data-animation-delay="100" style="margin-bottom: 20px;">
                        <span class="icon-lg icon-animated1 border-white circle icon bg-white colored scale-hover font-16"><i class="fa fa-play"></i></span>
                    </a>
                    <h2 class="playfair bold"><?php echo $this->lang->line('LIVE_BROADCAST');?></h2>
                    <h4 class="lh-md light"><?php echo $this->lang->line('LIVE_BROADCAST_p1');?></h4>
                    <div style="margin-top: 20px;">
                        <a href="https://www.youtube.com/watch?v=rs0bQ3cYzrg&feature=youtu.be<?php //echo base_url('/front/live_streaming');?>"  class="stay xl-btn border-btn border-gray3 bs-lg-hover bg-colored-hover white-hover radius-lg slow xxs-mt"><?php echo $this->lang->line('LEARN_MORE');?></a>
                    </div>
                </div>
            </div>
            <!-- End Box -->
            <!-- Box for image -->
            <div class="content-box col-lg-3 col-12 bg-cover bg-center animated" data-background="<?php echo base_url('assets/images');?>/img/con1.jpg" data-animation="fadeInUp" data-animation-delay="200"></div>
            <!-- End Box -->
            <!-- Box -->
            <div class="content-box col-lg-3 col-12 bg-dark t-center animated" data-animation="fadeInUp" data-animation-delay="300">
                <div class="inner">
                    <div class="inline-block">
                        <i class="fa fa-book h1"></i>
                    </div>
                    <h3 class="playfair bold"><?php echo $this->lang->line('PLEADER_GUID');?></h3>
                    <p class="lh-md xxs-mt font-17 gray3 light"><?php echo $this->lang->line('PLEADER_GUID_p1');?></p>
                    <div style="margin-top: 20px;">
                        <a href="<?php echo base_url('/front/entrepreneurs_guide');?>" class="stay xl-btn border-btn border-gray3 bs-lg-hover bg-colored-hover white-hover radius-lg slow xxs-mt"><?php echo $this->lang->line('LEARN_MORE');?></a>
                    </div>
                </div>
            </div>
            <!-- End Box -->
        </div>
        <!-- End Row -->


        <!-- Row -->
        <div class="row calculate-height o-hidden">
            <!-- Box for image -->
            <div class="content-box col-lg-3 col-12 bg-cover bg-center animated" data-background="<?php echo base_url('assets/images');?>/img/con2.jpg"  data-animation="fadeInUp" data-animation-delay="100"></div>
            <!-- End Box -->
            <!-- Box -->
            <div class="content-box col-lg-3 col-12 bg-white t-center animated" data-animation="fadeInUp" data-animation-delay="200">
                <div class="inner">
                    <div class="inline-block">
                        <i class="fa fa-trophy h1" style="color:gray !important;"></i>
                    </div>
                    <h3 class="playfair dark bold"><?php echo $this->lang->line('Training');?></h3>
                    <p class="lh-md xxs-mt font-17 light dark"><?php echo $this->lang->line('Training_p1');?></p>
                    <div style="margin-top:20px;">
                        <a href="<?php echo  base_url('/training'); ?>" style="color: gray !important;" class="stay gray xl-btn border-btn border-gray3 bs-lg-hover bg-colored-hover white-hover radius-lg slow xxs-mt"><?php echo $this->lang->line('LEARN_MORE');?></a>
                    </div>
                </div>
            </div>
            <!-- End Box -->
            <!-- Box for image -->
            <div class="content-box col-lg-6 col-12 no-pd animated" data-animation="fadeInUp" data-animation-delay="300">
                <img src="<?php echo base_url('assets/images');?>/img/content_05_1.jpg" alt=""> <ul class="custom-slider no-pm qdr-controls-2" data-slick='{"arrows": true, "draggable": true, "autoplay": false, "fade":true, "speed": 700, "slidesToShow": 1, "slidesToScroll": 1,  "responsive":[{"breakpoint": 1024,"settings":{"slidesToShow": 1}}]}'>
                    <li></li>
                </ul>
            </div>
            <!-- End Box -->
        </div>
        <!-- End Row -->


        <!-- Row -->
        <div class="row calculate-height o-hidden">
            <!-- Box -->
            <div class="content-box col-lg-3 col-12 bg-gradient t-center litle-pd animated" data-animation="fadeInUp" data-animation-delay="100">
                <div class="inner">
                    <div class="inline-block">
                        <i class="fa fa-file-text-o  h1"></i>
                    </div>
                    <h2 class="lh-md playfair bold"><?php echo $this->lang->line('ARTICALS');?></h2>
                    <p><?php echo $this->lang->line('ARTICALS_p1');?></p>
                    <div style="margin-top: 20px;">
                        <a href="<?php echo  base_url('/front/article'); ?>" class="stay gray xl-btn border-btn border-gray3 bs-lg-hover bg-colored-hover white-hover radius-lg slow xxs-mt"><?php echo $this->lang->line('LEARN_MORE');?></a>
                    </div>
                </div>
            </div>
            <!-- End Box -->
            <!-- Box -->
            <div class="content-box col-lg-3 col-12 bg-soft bg-soft-gradient1 t-center litle-pd bg-cover bg-center animated" data-background="<?php echo base_url('assets/images');?>/img/content_06.jpg"  data-animation="fadeInUp" data-animation-delay="200">
                <div class="inner">
                    <div class="inline-block">
                        <i class="fa fa-money  h1"></i>
                    </div>
                    <!-- Item -->
                    <div class="fact" data-source="1620">
                        <!-- Texts -->
                        <div class="texts">
                            <div>
                                <!-- Fact Texts -->
                                <h2 class="lh-md playfair bold"><?php echo $this->lang->line('Download_the_App2');?><?php //echo $this->lang->line('BUSINESSMEN_GUID');?></h2>
                                <p><?php //echo $this->lang->line('BUSINESSMEN_GUID_p1');?><?php echo $this->lang->line('Download_the_App_p1');?></p>
                                <div style="margin-top: 20px;">
                                    <a href="<?php echo  base_url('/front/mobile_app'); ?>" class="stay gray xl-btn border-btn border-gray3 bs-lg-hover bg-colored-hover white-hover radius-lg slow xxs-mt"><?php echo $this->lang->line('LEARN_MORE');?></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End Item -->
                </div>
            </div>
            <!-- End Box -->
            <!-- Box for image -->
            <div class="content-box col-lg-3 col-12 bg-cover bg-center animated" data-background="<?php echo base_url('assets/images');?>/img/regulation.jpg" data-animation="fadeInUp" data-animation-delay="300"></div>
            <!-- End Box -->
            <!-- Box -->
            <div class="content-box col-lg-3 col-12 bg-gradient2 t-center animated"  data-animation="fadeInUp" data-animation-delay="400">
                <div class="inner">
                    <div class="inline-block">
                        <i class="fa fa-cogs  h1" style="color: gray !important;"></i>
                    </div>
                    <h3 class="playfair dark bold"><?php echo $this->lang->line('SYSTEM_SOFTWARE');?></h3>
                    <p class="lh-md xxs-mt font-17 light dark"><?php echo $this->lang->line('SYSTEM_SOFTWARE_p1');?></p>
                    <div style="margin-top: 20px;">
                        <a href="https://www.youtube.com/channel/UC36m7L2wXsNImQoAJqbv6sg" style="color: gray !important;" class="stay gray xl-btn border-btn border-gray3 bs-lg-hover bg-colored-hover white-hover radius-lg slow xxs-mt"><?php echo $this->lang->line('LEARN_MORE');?></a>
                    </div>
                </div>
            </div>
            <!-- End Box -->
        </div>
        <!-- End Row -->


    </section>
    <!-- END CONTENTS -->


<?php

include('footer.php');