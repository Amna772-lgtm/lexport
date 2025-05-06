<?php
$nvc = "white-nav sticky shrink modern hover4 radius-drop";
$pageTitle = $this->lang->line('our_service');
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
                <?php echo $this->lang->line("our_service_text_top");?>
            </p>
            <div class="title-strips-over dark"></div>
        </div>
    </section>


<section id="content" class="sm-pb xxs-mb">

    <div class="row container">

        <!-- Col -->
        <div class="col-md-12 col-sm-12 mt mb">

            <!-- Nav tabs -->
            <div class="modern-tabs-container clearfix t-left no-border ">
                <div class="row border-gray2">
                    <ul class="nav nav-tabs modern-tabs vertical-tabs col-sm-3 col-12 xxs-px-mobile font-11 bg-white gray8 uppercase bold xs-mt" role="tablist">
                        <li role="presentation"><a href="#tab1f" aria-controls="tab1f" role="tab" data-toggle="tab" class="bg-colored border-colored white show active"><?php echo $this->lang->line('Law_consultancy_and_studie');?></a></li>
                        <li role="presentation"><a href="#tab2f" aria-controls="tab2f" role="tab" data-toggle="tab" class="bg-colored border-colored white"><?php echo $this->lang->line('Contracts_and_Agreements');?></a></li>
                        <li role="presentation"><a href="#tab3f" aria-controls="tab3f" role="tab" data-toggle="tab" class="bg-colored border-colored white"><?php echo $this->lang->line('Execution_of_Judgments_and_Collection_of_Debts');?></a></li>
                        <li role="presentation"><a href="#tab4f" aria-controls="tab4f" role="tab" data-toggle="tab" class="bg-colored border-colored white"><?php echo $this->lang->line('Liquidation_of_Legacies_and_Management_of_Endowments');?></a></li>
                        <li role="presentation"><a href="#tab5f" aria-controls="tab5f" role="tab" data-toggle="tab" class="bg-colored border-colored white"><?php echo $this->lang->line('Companies_and_Trade_Business');?></a></li>
                        <li role="presentation"><a href="#tab6f" aria-controls="tab6f" role="tab" data-toggle="tab" class="bg-colored border-colored white"><?php echo $this->lang->line('Arbitration_and_Mediation');?></a></li>
                        <li role="presentation"><a href="#tab7f" aria-controls="tab7f" role="tab" data-toggle="tab" class="bg-colored border-colored white"><?php echo $this->lang->line('Litigation');?></a></li>
                        <li role="presentation"><a href="#tab8f" aria-controls="tab8f" role="tab" data-toggle="tab" class="bg-colored border-colored white"><?php echo $this->lang->line('Documentation');?></a></li>
                    </ul>
                    <!-- Tab panes -->
                    <div class="tab-content slide-effect col-sm-9 col-12 t-left xs-mt">

                        <!-- Container for vertical panes -->
                        <div class="relative">
                            <!-- Tab -->
                            <div id="tab1f" role="tabpanel" class="tab-pane active">
                                <div class="tab-container dropcap dropcap-bg dropcap-lg primary-bg dropcap-radius">
                                    <div class="row">
                                        <!-- Right Texts -->
                                        <div class="col-md-12 col-12">
                                            <h1 class="bold-title ">
                                                <span class="playfair italic"><?php echo $this->lang->line('Law_consultancy_and_studie');?></span>
                                            </h1>
                                            <h4 class="xs-my gray6">
                                               <?php echo  $this->lang->line('Law_consultancy_and_studie_p1');?>
                                            </h4>
                                            <ul class="list list-circle xs-pt underline-hover-links font-16 bold-subtitle">
                                                <?php echo $this->lang->line("Law_consultancy_and_studie_p2");?>
                                            </ul>
                                        </div>
                                        <!-- End Right Texts -->
                                    </div>
                                </div>
                            </div>
                            <!-- Tab -->
                            <div id="tab2f" role="tabpanel" class="tab-pane">
                                <div class="tab-container dropcap dropcap-bg dropcap-lg warning-bg dropcap-radius">
                                    <div class="row">
                                        <!-- Right Texts -->
                                        <div class="col-md-12 col-12">
                                            <h1 class="bold-title ">
                                                <span class="playfair italic"><?php echo $this->lang->line('Contracts_and_Agreements');?></span>
                                            </h1>
                                            <h4 class="xs-my gray6">
                                               <?php echo $this->lang->line('Contracts_and_Agreements_p1');?>
                                            </h4>
                                            <ul class="list list-circle xs-pt underline-hover-links font-16 bold-subtitle">
                                               <?php echo $this->lang->line('Contracts_and_Agreements_p2');?>
                                            </ul>
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <!-- Tab -->
                            <div id="tab3f" role="tabpanel" class="tab-pane">
                                <div class="tab-container dropcap dropcap-bg dropcap-lg danger-bg dropcap-radius">
                                    <div class="row">
                                        <!-- Right Texts -->
                                        <div class="col-md-12 col-12">
                                            <h1 class="bold-title ">
                                                <span class="playfair italic"><?php echo $this->lang->line('Execution_of_Judgments_and_Collection_of_Debts');?></span>
                                            </h1>
                                            <h4 class="xs-my gray6">
												<?php echo $this->lang->line('Execution_of_Judgments_and_Collection_of_Debts_p1');?>
                                            </h4>
                                            <ul class="list list-circle xs-pt underline-hover-links font-16 bold-subtitle">
                                                <?php echo $this->lang->line('Execution_of_Judgments_and_Collection_of_Debts_p2');?>
                                            </ul>
                                        </div>
                                        <!-- End Right Texts -->
                                    </div>
                                </div>
                            </div>
                            <!-- Tab -->
                            <div id="tab4f" role="tabpanel" class="tab-pane">
                                <div class="tab-container dropcap dropcap-bg dropcap-lg dropcap-border light-bg dropcap-radius">
                                    <div class="row">
                                        <!-- Right Texts -->
                                        <div class="col-md-12 col-12">
                                            <h1 class="bold-title ">
                                                <span class="playfair italic"><?php echo $this->lang->line('Liquidation_of_Legacies_and_Management_of_Endowments');?></span>
                                            </h1>
                                            <h4 class="xs-my gray6">
												<?php echo $this->lang->line('Liquidation_of_Legacies_and_Management_of_Endowments_p1');?>
                                                
                                            </h4>
                                            <ul class="list list-circle xs-pt underline-hover-links font-16 bold-subtitle">
                                                <?php echo $this->lang->line('Liquidation_of_Legacies_and_Management_of_Endowments_p2');?>
                                            </ul>
                                        </div>
                                        <!-- End Right Texts -->

                                    </div>
                                </div>
                            </div>
                            <!-- Tab -->
                            <div id="tab5f" role="tabpanel" class="tab-pane">
                                <div class="tab-container dropcap dropcap-bg dropcap-lg secondary-bg dropcap-radius">
                                    <div class="row">
                                        <!-- Right Texts -->
                                        <div class="col-md-12 col-12">
                                            <h1 class="bold-title ">
                                                <span class="playfair italic"><?php echo $this->lang->line('Companies_and_Trade_Business');?></span>
                                            </h1>
                                            <h4 class="xs-my gray6">
                                                <?php echo $this->lang->line('Companies_and_Trade_Business_p1');?>
                                            </h4>
                                            <ul class="list list-circle xs-pt underline-hover-links font-16 bold-subtitle">
                                                <?php echo $this->lang->line('Companies_and_Trade_Business_p2');?>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div id="tab6f" role="tabpanel" class="tab-pane">
                                <div class="tab-container dropcap dropcap-bg dropcap-lg secondary-bg dropcap-radius">
                                    <div class="row">
                                        <!-- Right Texts -->
                                        <div class="col-md-12 col-12">
                                            <h1 class="bold-title ">
                                                <span class="playfair italic"><?php echo $this->lang->line('Arbitration_and_Mediation');?></span>
                                            </h1>
                                            <h4 class="xs-my gray6">
                                                <?php echo $this->lang->line('Arbitration_and_Mediation_p1');?>
                                            </h4>
                                            <ul class="list list-circle xs-pt underline-hover-links font-16 bold-subtitle">
                                                <?php echo $this->lang->line('Arbitration_and_Mediation_p2');?>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div id="tab7f" role="tabpanel" class="tab-pane">
                                <div class="tab-container dropcap dropcap-bg dropcap-lg secondary-bg dropcap-radius">
                                    <div class="row">
                                        <!-- Right Texts -->
                                        <div class="col-md-12 col-12">
                                            <h1 class="bold-title ">
                                                <span class="playfair italic"><?php echo $this->lang->line('Litigation');?></span>
                                            </h1>
                                            <h4 class="xs-my gray6">
                                               <?php echo $this->lang->line('Litigation_p1');?>
                                            </h4>
                                            <ul class="list list-circle xs-pt underline-hover-links font-16 bold-subtitle">
                                                <?php echo $this->lang->line('Litigation_p2');?>
                                            </ul>
                                        </div>
                                        <!-- End Right Texts -->
                                    </div>
                                </div>
                            </div>

                            <div id="tab8f" role="tabpanel" class="tab-pane">
                                <div class="tab-container dropcap dropcap-bg dropcap-lg secondary-bg dropcap-radius">
                                    <div class="row">
                                        <!-- Right Texts -->
                                        <div class="col-md-12 col-12">
                                            <h1 class="bold-title ">
                                                <span class="playfair italic"><?php echo $this->lang->line('Documentation');?></span>
                                            </h1>
                                            <h4 class="xs-my gray6">
                                                <?php echo $this->lang->line('Documentation_p1');?>
                                            </h4>
                                            <ul class="list list-circle xs-pt underline-hover-links font-16 bold-subtitle">
                                                <?php echo $this->lang->line('Documentation_p2');?>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <!-- End Container for vertical panes -->

                    </div>
                    <!-- End Tab panes -->
                </div>
            </div>

        </div>
        <!-- End Col -->

    </div>

</section>


<?php

include('footer.php');