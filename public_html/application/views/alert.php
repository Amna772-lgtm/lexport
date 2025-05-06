<?php $nvc = "white-nav sticky shrink modern hover4 radius-drop"; 
$pageTitle = $this->lang->line("Alert");
include('header.php');
	 
?>
 </section>
<?php
include('header_welcome.php');
?>
<!-- END: Left Aside -->
 
      <div class="m-grid__item m-grid__item--fluid m-wrapper">


        <!-- END: Subheader -->
        <div class="m-content">

            <!--begin::Portlet-->
            <div class="m-portlet">
                <div class="m-portlet__head">
                    <div class="m-portlet__head-caption">
                        <div class="m-portlet__head-title">
                            <h3 class="m-portlet__head-text">
                                <?php echo $this->lang->line('Alert');?>
                            </h3>
                        </div>
                    </div>
                </div>


                <div class="m-portlet__body">

  
<?php foreach($data as $msg){ ?>
<div class="alert alert-info">
<?php echo $msg['message']; ?><a href="javascript:;" class='notdate pull-right'><b><?php echo getEmployeeName($msg['send_from']); ?> &nbsp;</b><?php $timestamp = strtotime($msg['creae_date']); echo  date("d M Y G:i",$timestamp);?></a>
</div>
<?php } ?>

                </div>
            </div>


        </div>

    </div>
</div>



<?php

include('footer.php');

?>
