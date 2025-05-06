<?php
$nvc = "white-nav sticky shrink modern hover4 radius-drop";
$pageTitle = $this->lang->line('PLEADER_GUID');
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
              <?php echo $this->lang->line('PLEADER_GUID');?>
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
		  	
		  		  <div class="row container">

        <!-- Col -->
        <div class="col-md-12 col-sm-12 mt mb">
		  <ul class="latestNewsPage">
		      <?php
		      $data=$this->db->order_by("id", "desc")->get('evidence_list')->result_array();
		      if(empty($data)){
		      echo "<p style='text-align:center'>".$this->lang->line('')."</p>";
		      }?>
				<?php foreach ($data as $data) { ?>
				    <li style="border-bottom: 1px dashed gray;padding: 20px 0;">
				     
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
    						    <h3><a href="<?= base_url('front/evidence_details/'.$data['id']); ?>"><?= $title; ?></a></h3>
    						    <p><?= substr($description,0,150); ?><?php if(strlen($description) > 150){?><a href="<?= base_url('front/article_details/'.$data['id']); ?>">...<?php echo $this->lang->line('read_more');?></a><?php } ?></p>
    						 
    						</div>
				 
					</li>
				<?php } ?>
			</ul>
		</div>
        <!-- End Col -->


    </div>
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