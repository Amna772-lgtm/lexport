<?php
$nvc = "white-nav sticky shrink modern hover4 radius-drop";
$pageTitle = $this->lang->line('Training');
include('header.php');
?>

<style>
    .list.list-side>li {
        display: list-item;
    }

    .latestNewsPage h3{ margin:0px; padding:0px 0px 10px 0px;}
    .latestNewsPage .imgThumb img{ width:100%;}
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
             <?php echo $this->lang->line('Training_List');?>
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
            		  <ul class="latestNewsPage">
            			<?php foreach ($data as $data) { ?>
            			    <li style="border-bottom: 1px dashed gray;padding: 20px 0;">
            			    <div class="row clearfix">
        				        <div class="col-md-2 col-sm-12">
        				            <div class="imgThumb">
        				                <img src="<?php echo base_url('uploads/training/'.$data['image']);?>">
        				            </div>
        				        </div>
        					    <div class="col-md-10 col-sm-12">
        					         <?php 
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
                                ?>
        						    <h3><a href="<?= base_url('front/training_details/'.$data['id']); ?>"><?= $title; ?></a></h3>
        						    <p><?= substr($description,0,150); ?><?php if(strlen($description) > 150){ ?><a href="<?= base_url('front/training_details/'.$data['id']); ?>">...<?php echo $this->lang->line('read_more');?></a><?php }?></p>
        						    <a href="<?php echo base_url('front/job_employment/training/'.$data['id']);?>" class="bg-colored1 sm-btn font-12 xxs-mt slow width-auto click-effect white bold qdr-hover-6 radius-lg"><?php echo $this->lang->line('Apply_Now');?></a>
        						</div>
    						</div>
            				</li>
            			<?php } ?>
            				
            			</ul>
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