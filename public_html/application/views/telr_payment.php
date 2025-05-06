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
                <h2> PAYMENT</h2>
            </div>
        </div>
    </div>
    <!-- End Container -->
</section>

<div id="app-features" class="section partnerBenefit">
        <br>    <br>
    <div class="container">
        <div class="col-md-12" align="center" style="margin-bottom:10px;">
            <a href="<?php echo base_url('bank_transfer'); ?>" class="btn btn-primary">Go Back</a>
        </div>
        <div class="col-md-12" align="center" style="margin-bottom:10px;">
            <p style="font-size:25px;">Your payable amount is: <?php echo $currency." ".$payable_amount;?></p>
        </div>
        <iframe src="https://secure.telr.com/gateway/process_framed.html?o=<?php echo $results['order']['ref'] ?>" style="width: 100%;  min-width: 560px;  height: 700px; margin-top:10px;" frameborder="0" scrolling="no"></iframe>
        
    </div>
</div>
<?php
include('footer.php'); ?>