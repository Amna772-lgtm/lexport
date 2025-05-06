<?php
$nvc = "white-nav sticky shrink modern hover4 radius-drop";
$pageTitle = $this->lang->line("about_us");
include('header.php');
?>

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


    <!-- Content -->
    <section id="content" class="md-pt md-pb xxs-mb">
        <!-- Container to details -->
        <div class="container">

            <div class="row aboutData">
                <!-- Left Image -->
                <div class="col-md-6 col-12">
                    <div class="aboutPageImg">
                    <a href="" class="block block-img">
                        <img src="<?php echo base_url('assets');?>/content/etna/images/big-5I4A1037.jpg" data-original="<?php echo base_url('assets');?>/content/etna/images/big-5I4A1037.jpg" style="border-radius: 10px;box-shadow: 0 5px 10px #ccc;" alt="">
                    </a>
                    </div>
                </div>
                <!-- Right Texts -->
                <div class="col-md-6 col-12 xs-py">
                    <h3 class="gray6"><?php echo $this->lang->line("about_us");?></h3>
                    <!--<h1 class="bold-title ">
                        <span class="playfair italic">AlSharif Mubarak bin Nasser bin Salem Al-Barakati</span>
                    </h1>-->
                    <h4 class="xs-my gray6 text-justify">
                        <?php echo $this->lang->line("about_us_details");?>
                    </h4>
                </div>
                <!-- End Right Texts -->

                <!--<div class="col-md-12" style="margin-top: 30px;margin-bottom: 30px;text-align: center">
                    <p class="lh-lg gray7">
                        So, from there his aunt took care of his life and education, she brought him the finest teachers from Yemenis and other around city to memorize the Koran and studied of Shafi'i. AlSharif Mubarak learning arithmetic at his villages in Al-Murshidah and Al-Barqa where the stronghold of his forefathers, and then when he gat 12 years old he got charge of the affairs of his life and property. His father, may God have mercy on him, was one of the founders of agriculture at the area. So, when his father died, he was doubled over the new responsibility from his father's property under the shadow of the hardship and the spoils of life. he gets a famous because of his knowledge in the law and his smart vision in the cases beside his small age as a lawyer. AlSharif Mubarak was not confined himself to this profession, but was a scientist and a gracious and generous. And at the end of his life he suffered from a disease that make him struggled with patiently for several years. His soul was delivered to Allah on 18/9/1430 Hijri, leaving a men to establish NassrAlbarakatiattorny and legal advice Co. to continuing the march in the footsteps of their father In law.
                    </p>
                </div>-->

                <!-- Right Texts -->
                <!--<div class="col-md-6 col-12 xs-py">
                    <p class="lh-lg gray7">
                        So, from that “NassrAlbarakatiattorny and legal advice Co.” has been established on a distinguished legal and intellectual vision, which enabled it to achieve increasing development since its kick off until it became a leading Law Firm in the Kingdom of Saudi Arabia. And in order to achieve the company’s vision regarding geographic expansion to provide its services to its clients all around the Kingdom of Saudi Arabia, the company built it’s headquarter in Holy Makkah and established branches in Riyadh, Jeddah and Cairo in Egypt. we have proven deep experience and achievement in legal work through promotionof cooperation value and exerting the greatest effort to achieve the interest of our clients in addition to effective participation in social awareness activities.
                    </p>
                </div>-->

                <!-- Left Image -->
                <!--<div class="col-md-6 col-12">
                    <a href="" class="block block-img">
                        <img src="content/etna/images/home_01.jpg" data-original="<?php echo base_url('assets');?>/content/etna/images/home_02.jpg" style="border-radius: 10px;box-shadow: 0 5px 10px #ccc;" alt="">
                    </a>
                </div>-->

            </div>
        </div>
        <!-- End Container to details -->
    </section>
    <!-- End Content -->

    <!-- ABOUT SECTION -->
    <section id="about" class="boxes-with-image calculate-height t-left clearfix bg-dark">

        <div class="row no-mx fullwidth">

            <!-- Box -->
            <a href="" class="box relative col-lg-4 col-md-12 qdr-hover-1-bottom click-effect">
                <!-- Overlay - Parent element should have .relative class -->
                <div class="overlay bg-soft bg-soft-dark8 zi--4" data-background="<?php echo base_url('assets');?>/content/etna/images/about-vision.jpg"></div>
                <!-- Texts -->
                <div class="texts">
                    <h2 class="white bold-title"><span class="playfair"><?php echo $this->lang->line("our_vision");?></span></h2>
                    <p class="white xxs-mt text-justify"><?php echo $this->lang->line("our_vision_detail");?></p>
                </div>
            </a>
            <!-- Box -->
            <a href="" class="box relative col-lg-4 col-md-12 qdr-hover-1-bottom click-effect">
                <!-- Overlay - Parent element should have .relative class -->
                <div class="overlay bg-soft bg-soft-dark7 zi--4" data-background="<?php echo base_url('assets');?>/content/etna/images/about-objection.jpg"></div>
                <!-- Texts -->
                <div class="texts">
                    <h2 class="white bold-title"> <span class="playfair"><?php echo $this->lang->line('our_mission');?></span></h2>
                    <p class="white xxs-mt text-justify"><?php echo $this->lang->line('our_mission_detail');?></p>
                </div>
            </a>
            <!-- Box -->
            <a href="" class="box relative col-lg-4 col-md-12 qdr-hover-1-bottom click-effect">
                <!-- Overlay - Parent element should have .relative class -->
                <div class="overlay bg-soft bg-soft-dark8 zi--4" data-background="<?php echo base_url('assets');?>/content/etna/images/about-mission.jpg"></div>
                <!-- Texts -->
                <div class="texts">
                    <h2 class="white bold-title"> <span class="playfair"><?php echo $this->lang->line("our_objectives");?></span></h2>
                    <p class="white xxs-mt text-justify"><?php echo $this->lang->line("our_objectives_details");?></p>
                </div>
            </a>
        </div>
    </section>

    <section id="clients" class="team-type-2 py">
        <h1 class="title">
            <?php echo $this->lang->line('our_clients');?>
        </h1>
        <div class="title-strips"></div>
        <ul class="client-list qdr-col-5 container border-solid border-gray py">
             <?php $i=0;
                    $clients1 =  $this->db->get('clients')->result_array();
                     foreach ($clients1 as $clients) { ?>
                <li>    <a href="#" ><img src="<?= base_url('uploads/clients/'.$clients['image']); ?>" alt="" data-no-retina=""></a></li>
                         <?php $i++; } ?>
             
        </ul>
    </section>

<?php

include('footer.php');

