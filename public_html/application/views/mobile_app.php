<?php
$nvc = "white-nav sticky shrink modern hover4 radius-drop";
$pageTitle = $this->lang->line('Download_the_App');
include('header.php');
?>

<style>
    .list.list-side>li {
        display: list-item;
    }

</style>

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

    <section class="t-center pt relative">
        <div class="container relative zi-1" style="z-index: 1;">
            <!-- Title -->
            <p class="gray6 font-16 xxs-mt">
             <?php echo $this->lang->line('Download_the_App');?>
            </p>
            <div class="title-strips-over dark"></div>
        </div>
    </section>


<section id="content" class="sm-pb xxs-mb">

    <div class="row container">

        <!-- Col -->
        <div class="col-md-12 col-sm-12">
		
<section id="content" class="sm-pb xxs-mb">

     <div id="works" class="t-center">

            <!-- Strips -->
            <!-- Description -->
            <p class="description">
				<?php echo $this->lang->line('Download_the_App_p1');?>
				<br class="hidden-xs">
            </p>


            <div class="product mt-50 relative fullwidth height-auto" style="margin-top: 50px;">
                <!-- Your Product Image -->
                <div class="mockups">
                    <img src="https://albarakatilaw.com/assets/images/img/bg_apps2.jpg" alt="" usemap="#Map">
<map name="Map" id="Map">
    <area alt="Play Store" title="Play Store" href="https://play.google.com/store/apps/details?id=com.albarakati.android" shape="poly" coords="52,289,55,352,259,345,243,284">
    <area alt="App Store" title="App Store" href="" shape="poly" coords="38,191,39,253,250,250,245,198">
 
</map>
 
                    </div>
                    
            </div>

        </div>

</section>
		</div>
        <!-- End Col -->


    </div>

</section>


<?php

include('footer.php');