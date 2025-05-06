<?php $nvc = "white-nav shrink start-dark modern dashed radius-drop"; if($this->session->userdata('verify') == 'false' || $this->session->userdata('verify') == '' ) { redirect('/front', 'refresh'); }?><?php include "header.php";?>
<div class="head-bread">
     
<?php include "header_welcome.php"; ?>

 	<div class="heading-bread">
        <div class="container">
        	<div class="row">
        	<div class="col-md-12">
        		<h3>Home</h3>
        	</div>
        	</div>
    	</div>                                                                                              	
    </div>
</div>
<div class="container">
<div class="row">	
<style>
.marbanner img {
    width: 100%;
    height: 395px !important;
}
</style>
<div class="col-md-9">
<div class="marbanner">
<br>
<div id="teamCarousel" class="carousel slide teamCarousel" data-ride="carousel">
<div class="carousel-inner" role="listbox">
<?php 
$i=0;foreach($data  as $team) { 
?>

<div class="item <?php if($i==0){ ?>active<?php } ?>">     
	<img src="<?= base_url('uploads/banner/'.$team['image']); ?>" alt="" border="0" class="img-responsive">

   
</div>
<?php $i++; } ?>
</div>

<!-- Controls -->
<a class="left carousel-control" href="#teamCarousel" role="button" data-slide="prev">
<span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
<span class="sr-only">Previous</span>
</a>
<a class="right carousel-control" href="#teamCarousel" role="button" data-slide="next">
<span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
<span class="sr-only">Next</span>
</a>
</div>
</div>
<div class="clearfix"></div>
<br>
<br>
<div class="col-md-6"><a href="<?php echo base_url('add_case');?>" class="btn btn-info btn-lg" style="width:100%;">Add New E-Service</a></div>
<div class="col-md-6"><a href="<?php echo base_url('case_list');?>" class="btn btn-success btn-lg" style="width:100%;">Check Your Current E-Service</a></div>
</div>
<?php include "sidebar.php"; ?>
</div>

</div>
<?php include "footer.php";?>
 <script src="<?=base_url('assets/front/assets/js/csript.js');?>"></script>