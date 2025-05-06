<?php
$nvc = "white-nav sticky shrink modern hover4 radius-drop";
$pageTitle = $this->lang->line('News');
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
               <?php echo $this->lang->line('News');?>
            </p>
            <div class="title-strips-over dark"></div>
        </div>
    </section>


<section id="content" class="sm-pb xxs-mb">

    <div class="row container">

        <!-- Col -->
        <div class="col-md-12 col-sm-12 mt mb">
		  <ul class="latestNewsPage">
		      <?php if(empty($news)){
		      echo "<p style='text-align:center'><?php echo $this->lang->line('Articles_not_found');?></p>";
		      }?>
			  <?php $newsfoot =  $this->db->select('*')->order_by('id',"desc")->get('news')->result_array(); 
                foreach ($newsfoot as $news) {
if($this->session->userdata('site_lang')=="arabic"  )
{
     $title = $news['title_ar'];
    $description = $news['discription_ar'];
}
else
{
     $title = $news['title'];
     $description = $news['discription'];
}
                
                ?>
				    <li style="border-bottom: 1px dashed gray;padding: 20px 0;">
				        <div class="row clearfix">
    				        <div class="col-md-2 col-sm-12">
    				            <div class="imgThumb">
        <?php if($news['image']) { ?>  <img src="<?php echo base_url('uploads/news/'.$news['image']);?>"> <?php } else { ?>
          <img src="<?php echo base_url('uploads/articles/no_image.png');?>"> 
          <?php } ?>
    				            </div>
    				        </div>
    					    <div class="col-md-10 col-sm-12">
                             
			          <h3 class="bold gray8"><a href="<?= base_url('front/news_details/'.$news['id']); ?>" target="_blank"><?php echo $title; ?></a></h3>
                    <p><?php if(strlen($description) > 260){ echo substr($description,0,260)."<a href=".base_url('front/news_details/'.$news['id'])." target='_blank'>...".$this->lang->line('read_more')."</a>";}else{echo substr($description,0,260);} ?></p>
			 
    						</div>
						</div>
					</li>
				<?php } ?>
			</ul>
		</div>
        <!-- End Col -->


    </div>

</section>


<?php

include('footer.php');