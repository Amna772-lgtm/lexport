<?php
$nvc = "white-nav sticky shrink modern hover4 radius-drop";
$pageTitle = $this->lang->line('Forgot_password');
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


    <!-- Content -->
    <section id="content" class="md-pt md-pb xxs-mb">
        <!-- Container to details -->
        <div class="container" align="center">
			 
               
					<p style="color:green"><?php echo isset($_GET['status'])?$this->lang->line('f_pass_msg'):''; ?></p>  <?php if(isset($_GET['status']))  { ?> <div class="sidebar-button"><br></vbr>	<div class=""><span style="display: inline" class="regNow login_ca_bu"><?php echo $this->lang->line("LOGIN");?></span></div></div>
                        <br>
                        <?php } ?>
                    <?php if(!isset($_GET['status'])) {?>
                           	<h1><?php echo $this->lang->line('Reset_Password');?></h1>
                        	 
                                <?php echo form_open('front/check_forgotpassword',["style"=>" width: 50%;"]); ?>
                                     
                                        <p><?php  echo $this->lang->line('Please_enter_Email');?></p><br>
                                       <?php echo form_input(['name' => 'email', 'class' => 'form-control',"required"=>"required"]); ?><br>
                                    
                                            <?php echo form_submit(['value' => $this->lang->line("Reset_Password"), 'class' => 'btn btn-info form-control']); ?><br>
                                            <?php form_close(); ?>
                                        
                                  
                                </form>
                                <?php } ?>
                        
     </div>
        <!-- End Container to details -->
    </section>
    <!-- End Content -->
 


<?php

include('footer.php');

