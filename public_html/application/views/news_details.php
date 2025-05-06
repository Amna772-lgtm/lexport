<?php
$nvc = "white-nav sticky shrink modern hover4 radius-drop";
if($this->session->userdata('site_lang')=="arabic"  )
{
    $title = $data['title_ar'];
    $description = $data['discription_ar'];
}
else
{
    $title = $data['title'];
    $description = $data['discription'];
}
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
    <section id="home44" class="sm-py white fullwidth  bg-soft-colored bg-soft bg-scroll cover" data-background="content/etna/images/about_01.jpg">
        <!-- Container -->
        <div class="container">
            <div class="row calculate-height">
                <div class="t-left t-center-xs col-sm-12 col-xs-12">
                    <h2><?= $title; ?></h2>
                    <p>Published on: <font style="vertical-align: inherit;"><?= $data['date']; ?>
                </div>
            </div>
        </div>
        <!-- End Container -->
    </section>
    <!-- END CONTENT -->
    <section id="team" class="py" style="text-align:<?php if($this->session->userdata('site_lang')=="arabic"  ) echo "right"; else echo "left"; ?>">

        <!-- Row -->
        <div class="container">

            <div class="row">
<?php  if(isset($data['image']) && $data['image'] != ''){    ?>
<img src="<?php echo base_url('uploads/news/'.$data['image']); ?>" style=" max-width: 500px; max-height: 500px; margin: auto; ">

<br>
<br>
<?php }  ?>
    <p style="margin-top: 40px;">
		<?php echo $description?>
	</p>
        </div>    
    <?php if(isset($next)) { ?>
    <a href="https://albarakatilaw.com/front/news_details/<?php echo $next ?>" class="pagination right"> <?php echo $this->lang->line("Next");?> &nbsp;<i class="fa fa-arrow-right" aria-hidden="true"></i></a>
    <?php } if(isset($prev)) { ?>
    <a href="https://albarakatilaw.com/front/news_details/<?php echo $prev ?>" class="pagination left"><i class="fa fa-arrow-left" aria-hidden="true"></i>  &nbsp; <?php echo $this->lang->line("Previous");?></a>
    <?php } ?>
        </div>   
        <!-- End Row -->


    </section>


<?php include "footer.php"; ?>