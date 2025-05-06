<?php
$nvc = "white-nav sticky shrink modern hover4 radius-drop";
$pageTitle = $this->lang->line("our_team");
include('header.php');
?>

<!-- CONTENT -->
<section id="home" class="sm-py white fullwidth  bg-soft-colored bg-soft bg-scroll cover" data-background="content/etna/images/about_01.jpg">
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

    <!-- TEAM SECTION - -->
    <section id="team" class="team-type-2 py">

        <!-- Container -->
        <div class="container">

            <div class="row">
	<?php foreach($data as $data){ ?>
                <div class="col-md-4">
                    <!-- Member -->
                    <div class="member">
                        <!-- Container for details -->
                        <div class="member-body">
                            <img src="<?php if($data['image']) echo base_url('uploads/team/'.$data['image']); else echo base_url('assets/images/img/no_avatar2.jpg'); ?>" alt="">
                           <!-- <div class="member-socials">
                                <div><a href="#" class="linkedin"><i class="fa fa-linkedin"></i></a></div>
                                <div><a href="#" class="twitter"><i class="fa fa-twitter"></i></a></div>
                                <div><a href="#" class="instagram"><i class="fa fa-instagram"></i></a></div>
                            </div>-->
                        </div>
                        <!-- Description -->
                        <div class="member-description">
                            <h4><?= $data['name']; ?></h4>
                            <h4 class="colored"><?= $data['designation']; ?></h4>
                            <p class="colored"><?= $data['discription']; ?></p>
                        </div>
                        <!-- Progress Bars -->
                        <!-- End Progress Bars -->
                    </div>
                </div>
 <?php } ?>   

            </div>

        </div>
        <!-- End Team Slider -->
    </section>
    <!-- END TEAM -->

<?php

include('footer.php');
