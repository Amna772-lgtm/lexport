<?php
$nvc = "white-nav sticky shrink modern hover4 radius-drop";
if($this->session->userdata('site_lang')=="arabic"  )
{
    $title = $data['title_ar'];
    $description = $data['description_ar'];
}
else
{
    $title = $data['title'];
    $description = $data['description'];
}
$pageTitle = $title;
include('header.php');
?>

<style>
    .list.list-side>li {
        display: list-item;
    }
    .detailImg { margin:20px 0px 20px 0px; }
    .detailImg img{ max-width:100%; max-height:400px;}

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
             <?php echo $this->lang->line('Training_Detail'); ?>
            </p>
            <div class="title-strips-over dark"></div>
        </div>
    </section>


<section id="content" class="sm-pb xxs-mb">

    <div class="row container">

        <!-- Col -->
        <div class="col-md-12 col-sm-12 mt mb" style="text-align:<?php if($this->session->userdata('site_lang')=="arabic"  ) echo "right"; else echo "left"; ?>">
		  <h2><?= $title; ?></h2>
         <div class="detailImg">
            <img src="<?php echo base_url('uploads/training/'.$data['image']);?>">
         </div>
		 <p style="margin-top: 40px;"><?= $description; ?></p>
		  
		 <a href="<?php echo base_url('front/job_employment/training/'.$data['id']);?>" class="bg-colored1 xl-btn font-12 xxs-mt slow width-auto click-effect white bold qdr-hover-6 radius-lg"><?php echo $this->lang->line('Apply_Now');?></a>
		</div>
        <!-- End Col -->


    </div>

</section>


<?php

include('footer.php');