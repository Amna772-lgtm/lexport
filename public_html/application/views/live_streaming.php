<?php
$nvc = "white-nav sticky shrink modern hover4 radius-drop";
$pageTitle = $this->lang->line("LIVE_BROADCAST");
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
              <?php echo $this->lang->line('LIVE_BROADCAST');?>
            </p>
            <div class="title-strips-over dark"></div>
        </div>
    </section>


<section id="content" class="sm-pb xxs-mb">

    <div class="row container">

        <!-- Col -->
        <div class="col-md-12 col-sm-12 mt mb">
		
<section id="content" class="sm-pb xxs-mb">

    <div class="row container">

        <!-- Col -->
        <div class="col-md-12 col-sm-12 mt mb">

		  		  <h2 style="text-align: center;"><?php echo $this->lang->line('Coming_Soon');?></h2>
		</div>
        <!-- End Col -->


    </div>

</section>
		</div>
        <!-- End Col -->


    </div>

</section>


<?php

include('footer.php');