<?php
$nvc = "white-nav sticky shrink modern hover4 radius-drop";
$pageTitle = "404 Page Not Found";
include('header.php');
?>
 
<section id="home" class="fullscreen white fullwidth bg-cover bg-center moving-container loaded" data-background="images/backgrounds/background_21.jpg" style="background-image: url(&quot;images/backgrounds/background_21.jpg&quot;); height: 387px; perspective: 1500px; transform-style: preserve-3d;">
        <!-- Container -->
        <div class="container t-center relative v-center">
           <div class="skrollr skrollable skrollable-between" data-0="opacity:1;" data-300="opacity:0;" style="opacity: 1;">
                <div class="moving bg-dark container-sm bg-transparent bg-soft bg-soft-black py bs-lg hover-in hover-3d" style="perspective: 1500px; transform-style: preserve-3d; transform: rotateY(0.705882deg) rotateX(0.235294deg) scale(1.04);">
                    <h1 class="fs-200 oswald text-mobile-extreme lh-190 extrabold ls-7 translatez-xs text-background bg-gradient1" data-color="#fff" style="font-size: 200px; line-height: 190px; letter-spacing: 7px; color: rgb(255, 255, 255);">404!</h1>
                    <h2 class="oswald uppercase translatez-sm gray2">Page Not Fount</h2>
                    <h5 class="normal translatez-md gray4">Ooops! The page you are looking for, couldn't be found.</h5>
                    
                    <div class="bold uppercase translatez-lg">
                        <a href="<?php echo base_url(); ?>" class="lg-btn white radius-lg font-12 bs-lg-hover slow qdr-hover-6" data-bgcolor="#ff7200" style="background-color: rgb(255, 114, 0);">
                            <i class="fa fa-arrow-left mini-mr"></i>
                            Go back home
                        </a>
                    </div>
                </div>
           </div>
        </div>
        <!-- End Container -->
    </section>
 

 

<?php

include('footer.php');

?>