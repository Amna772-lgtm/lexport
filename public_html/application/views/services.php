<?php
$nvc = "white-nav sticky shrink modern hover4 radius-drop";
$pageTitle = $this->lang->line('Practices');
include('header.php');
?>

<style>
    .list.list-side>li {
        display: list-item;
    }
</style>

<!-- CONTENT -->
<section id="home" class="sm-py white fullwidth  bg-soft-colored bg-soft bg-scroll cover" data-background="<?php echo base_url('assets'); ?>/content/etna/images/about_01.jpg">
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
            <?php echo $this->lang->line("our_service_text_top"); ?>
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
                    <ul class="nav nav-tabs modern-tabs vertical-tabs col-sm-3 col-12 xxs-px-mobile font-11 bg-white gray8 uppercase bold xs-mt practicesLeftList" role="tablist">

                        <li role="presentation"><a href="#tab1f" aria-controls="tab1f" role="tab" data-toggle="tab" class="bg-colored border-colored white show active">
                                <?php echo $this->lang->line('Practices_The_Legal_Department'); ?></a></li>
                        <li role="presentation"><a href="#tab2f" aria-controls="tab2f" role="tab" data-toggle="tab" class="bg-colored border-colored white">
                                <?php echo $this->lang->line('Practices_Commercial_Litigation'); ?></a></li>
                        <li role="presentation"><a href="#tab3f" aria-controls="tab3f" role="tab" data-toggle="tab" class="bg-colored border-colored white">
                                <?php echo $this->lang->line('Practices_Companies_and_Entrepreneurs'); ?></a></li>
                        <li role="presentation"><a href="#tab4f" aria-controls="tab4f" role="tab" data-toggle="tab" class="bg-colored border-colored white">
                                <?php //echo $this->lang->line('Execution_of_Judgments_and_Collection_of_Debts');
                                echo $this->lang->line('Practices_Arbitration_and_Mediation'); ?></a></li>
                        <li role="presentation"><a href="#tab5f" aria-controls="tab5f" role="tab" data-toggle="tab" class="bg-colored border-colored white">
                                <?php echo $this->lang->line('Practices_Accommodation_and_Food'); ?></a></li>
                        <li role="presentation"><a href="#tab6f" aria-controls="tab6f" role="tab" data-toggle="tab" class="bg-colored border-colored white">
                                <?php echo $this->lang->line('Practices_Execution_of_judgments'); ?></a></li>
                        <li role="presentation"><a href="#tab7f" aria-controls="tab7f" role="tab
" data-toggle="tab" class="bg-colored border-colored white">
                                <?php echo $this->lang->line('Practices_Maritime_Trade'); ?></a></li>
                        <li role="presentation"><a href="#tab8f" aria-controls="tab8f" role="tab" data-toggle="tab" class="bg-colored border-colored white">
                                <?php echo $this->lang->line('Practices_E-Commerce'); ?></a></li>
                        <li role="presentation"><a href="#tab9f" aria-controls="tab9f" role="tab" data-toggle="tab" class="bg-colored border-colored white">
                                <?php echo $this->lang->line('Practices_Real_Estate'); ?></a></li>
                        <li role="presentation"><a href="#tab10f" aria-controls="tab10f" role="tab" data-toggle="tab" class="bg-colored border-colored white">
                                <?php echo $this->lang->line('Practices_Finance'); ?></a></li>
                        <li role="presentation"><a href="#tab11f" aria-controls="tab11f" role="tab" data-toggle="tab" class="bg-colored border-colored white">
                                <?php echo $this->lang->line('Practices_Merger_and_Acquisition'); ?></a></li>
                        <li role="presentation"><a href="#tab12f" aria-controls="tab12f" role="tab" data-toggle="tab" class="bg-colored border-colored white">
                                <?php echo $this->lang->line('Practices_Intellectual_property'); ?></a></li>
                        <li role="presentation"><a href="#tab13f" aria-controls="tab13f" role="tab" data-toggle="tab" class="bg-colored border-colored white">
                                <?php echo $this->lang->line('Practices_Banking_Operations'); ?></a></li>
                        <li role="presentation"><a href="#tab14f" aria-controls="tab14f" role="tab" data-toggle="tab" class="bg-colored border-colored white">
                                <?php echo $this->lang->line('Practices_Bankruptcy'); ?></a></li>
                        <li role="presentation"><a href="#tab15f" aria-controls="tab15f" role="tab" data-toggle="tab" class="bg-colored border-colored white">
                                <?php echo $this->lang->line('Practices_Insurance'); ?></a></li>
                        <li role="presentation"><a href="#tab16f" aria-controls="tab16f" role="tab" data-toggle="tab" class="bg-colored border-colored white">
                                <?php echo $this->lang->line('Practices_Labor_relations'); ?></a></li>
                        <li role="presentation"><a href="#tab17f" aria-controls="tab17f" role="tab" data-toggle="tab" class="bg-colored border-colored white">
                                <?php echo $this->lang->line('Practices_Foreign_Investment'); ?></a></li>
                        <li role="presentation"><a href="#tab18f" aria-controls="tab18f" role="tab" data-toggle="tab" class="bg-colored border-colored white">
                                <?php echo $this->lang->line('Practices_Communications_and_Information_Technology'); ?></a></li>
                        <li role="presentation"><a href="#tab19f" aria-controls="tab19f" role="tab" data-toggle="tab" class="bg-colored border-colored white">
                                <?php echo $this->lang->line('Practices_Authentication'); ?></a></li>
                        <li role="presentation"><a href="#tab20f" aria-controls="tab20f" role="tab" data-toggle="tab" class="bg-colored border-colored white">
                                <?php echo $this->lang->line('Practices_Administrative_Litigation'); ?></a></li>
                        <li role="presentation"><a href="#tab21f" aria-controls="tab21f" role="tab" data-toggle="tab" class="bg-colored border-colored white">
                                <?php echo $this->lang->line('Practices_Trade_and_Supply'); ?></a></li>
                        <li role="presentation"><a href="#tab22f" aria-controls="tab22f" role="tab" data-toggle="tab" class="bg-colored border-colored white">
                                <?php echo $this->lang->line('Practices_Contracting_and_Construction'); ?></a></li>
                        <li role="presentation"><a href="#tab23f" aria-controls="tab23f" role="tab" data-toggle="tab" class="bg-colored border-colored white">
                                <?php echo $this->lang->line('Practices_Legacies'); ?></a></li>
                        <li role="presentation"><a href="#tab24f" aria-controls="tab24f" role="tab" data-toggle="tab" class="bg-colored border-colored white">
                                <?php echo $this->lang->line('Practices_Healthcare'); ?></a></li>
                        <li role="presentation"><a href="#tab25f" aria-controls="tab25f" role="tab" data-toggle="tab" class="bg-colored border-colored white">
                                <?php echo $this->lang->line('Practices_Taxes'); ?></a></li>
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
                                                <span class="playfair"><?php echo $this->lang->line('Practices_The_Legal_Department'); ?></span>
                                            </h1>
                                            <h4 class="xs-my gray6 text-justify">
                                                <?php echo  $this->lang->line('Practices_The_Legal_Department_details'); ?>
                                            </h4>
                                        </div>
                                        <!-- End Right Texts -->
                                    </div>
                                </div>
                            </div>

                            <!-- Tab -->
                            <div id="tab2f" role="tabpanel" class="tab-pane">
                                <div class="tab-container dropcap dropcap-bg dropcap-lg primary-bg dropcap-radius">
                                    <div class="row">
                                        <!-- Right Texts -->
                                        <div class="col-md-12 col-12">
                                            <h1 class="bold-title ">
                                                <span class="playfair"><?php echo $this->lang->line('Practices_Commercial_Litigation'); ?></span>
                                            </h1>
                                            <h4 class="xs-my gray6 text-justify">
                                                <?php echo  $this->lang->line('Practices_Commercial_Litigation_details'); ?>
                                            </h4>
                                        </div>
                                        <!-- End Right Texts -->
                                    </div>
                                </div>
                            </div>

                            <!-- Tab -->
                            <div id="tab3f" role="tabpanel" class="tab-pane">
                                <div class="tab-container dropcap dropcap-bg dropcap-lg primary-bg dropcap-radius">
                                    <div class="row">
                                        <!-- Right Texts -->
                                        <div class="col-md-12 col-12">
                                            <h1 class="bold-title ">
                                                <span class="playfair"><?php echo $this->lang->line('Practices_Companies_and_Entrepreneurs'); ?></span>
                                            </h1>
                                            <h4 class="xs-my gray6 text-justify">
                                                <?php echo  $this->lang->line('Practices_Companies_and_Entrepreneurs_details'); ?>
                                            </h4>
                                        </div>
                                        <!-- End Right Texts -->
                                    </div>
                                </div>
                            </div>

                            <!-- Tab -->
                            <div id="tab4f" role="tabpanel" class="tab-pane">
                                <div class="tab-container dropcap dropcap-bg dropcap-lg primary-bg dropcap-radius">
                                    <div class="row">
                                        <!-- Right Texts -->
                                        <div class="col-md-12 col-12">
                                            <h1 class="bold-title ">
                                                <span class="playfair"><?php echo $this->lang->line('Practices_Arbitration_and_Mediation'); ?></span>
                                            </h1>
                                            <h4 class="xs-my gray6 text-justify">
                                                <?php echo  $this->lang->line('Practices_Arbitration_and_Mediation_details'); ?>
                                            </h4>
                                        </div>
                                        <!-- End Right Texts -->
                                    </div>
                                </div>
                            </div>

                            <!-- Tab -->
                            <div id="tab5f" role="tabpanel" class="tab-pane">
                                <div class="tab-container dropcap dropcap-bg dropcap-lg primary-bg dropcap-radius">
                                    <div class="row">
                                        <!-- Right Texts -->
                                        <div class="col-md-12 col-12">
                                            <h1 class="bold-title ">
                                                <span class="playfair"><?php echo $this->lang->line('Practices_Accommodation_and_Food'); ?></span>
                                            </h1>
                                            <h4 class="xs-my gray6 text-justify">
                                                <?php echo  $this->lang->line('Practices_Accommodation_and_Food_details'); ?>
                                            </h4>
                                        </div>
                                        <!-- End Right Texts -->
                                    </div>
                                </div>
                            </div>

                            <!-- Tab -->
                            <div id="tab6f" role="tabpanel" class="tab-pane">
                                <div class="tab-container dropcap dropcap-bg dropcap-lg primary-bg dropcap-radius">
                                    <div class="row">
                                        <!-- Right Texts -->
                                        <div class="col-md-12 col-12">
                                            <h1 class="bold-title ">
                                                <span class="playfair"><?php echo $this->lang->line('Practices_Execution_of_judgments'); ?></span>
                                            </h1>
                                            <h4 class="xs-my gray6 text-justify">
                                                <?php echo  $this->lang->line('Practices_Execution_of_judgments_details'); ?>
                                            </h4>
                                        </div>
                                        <!-- End Right Texts -->
                                    </div>
                                </div>
                            </div>

                            <!-- Tab -->
                            <div id="tab7f" role="tabpanel" class="tab-pane">
                                <div class="tab-container dropcap dropcap-bg dropcap-lg primary-bg dropcap-radius">
                                    <div class="row">
                                        <!-- Right Texts -->
                                        <div class="col-md-12 col-12">
                                            <h1 class="bold-title ">
                                                <span class="playfair"><?php echo $this->lang->line('Practices_Maritime_Trade'); ?></span>
                                            </h1>
                                            <h4 class="xs-my gray6 text-justify">
                                                <?php echo  $this->lang->line('Practices_Maritime_Trade_details'); ?>
                                            </h4>
                                        </div>
                                        <!-- End Right Texts -->
                                    </div>
                                </div>
                            </div>

                            <!-- Tab -->
                            <div id="tab8f" role="tabpanel" class="tab-pane">
                                <div class="tab-container dropcap dropcap-bg dropcap-lg primary-bg dropcap-radius">
                                    <div class="row">
                                        <!-- Right Texts -->
                                        <div class="col-md-12 col-12">
                                            <h1 class="bold-title ">
                                                <span class="playfair"><?php echo $this->lang->line('Practices_E-Commerce'); ?></span>
                                            </h1>
                                            <h4 class="xs-my gray6 text-justify">
                                                <?php echo  $this->lang->line('Practices_E-Commerce_details'); ?>
                                            </h4>
                                        </div>
                                        <!-- End Right Texts -->
                                    </div>
                                </div>
                            </div>

                            <!-- Tab -->
                            <div id="tab9f" role="tabpanel" class="tab-pane">
                                <div class="tab-container dropcap dropcap-bg dropcap-lg primary-bg dropcap-radius">
                                    <div class="row">
                                        <!-- Right Texts -->
                                        <div class="col-md-12 col-12">
                                            <h1 class="bold-title ">
                                                <span class="playfair"><?php echo $this->lang->line('Practices_Real_Estate'); ?></span>
                                            </h1>
                                            <h4 class="xs-my gray6 text-justify">
                                                <?php echo  $this->lang->line('Practices_Real_Estate_details'); ?>
                                            </h4>
                                        </div>
                                        <!-- End Right Texts -->
                                    </div>
                                </div>
                            </div>

                            <!-- Tab -->
                            <div id="tab10f" role="tabpanel" class="tab-pane">
                                <div class="tab-container dropcap dropcap-bg dropcap-lg primary-bg dropcap-radius">
                                    <div class="row">
                                        <!-- Right Texts -->
                                        <div class="col-md-12 col-12">
                                            <h1 class="bold-title ">
                                                <span class="playfair"><?php echo $this->lang->line('Practices_Finance'); ?></span>
                                            </h1>
                                            <h4 class="xs-my gray6 text-justify">
                                                <?php echo  $this->lang->line('Practices_Finance_details'); ?>
                                            </h4>
                                        </div>
                                        <!-- End Right Texts -->
                                    </div>
                                </div>
                            </div>

                            <!-- Tab -->
                            <div id="tab11f" role="tabpanel" class="tab-pane">
                                <div class="tab-container dropcap dropcap-bg dropcap-lg primary-bg dropcap-radius">
                                    <div class="row">
                                        <!-- Right Texts -->
                                        <div class="col-md-12 col-12">
                                            <h1 class="bold-title ">
                                                <span class="playfair"><?php echo $this->lang->line('Practices_Merger_and_Acquisition'); ?></span>
                                            </h1>
                                            <h4 class="xs-my gray6 text-justify">
                                                <?php echo  $this->lang->line('Practices_Merger_and_Acquisition_details'); ?>
                                            </h4>
                                        </div>
                                        <!-- End Right Texts -->
                                    </div>
                                </div>
                            </div>

                            <!-- Tab -->
                            <div id="tab12f" role="tabpanel" class="tab-pane">
                                <div class="tab-container dropcap dropcap-bg dropcap-lg primary-bg dropcap-radius">
                                    <div class="row">
                                        <!-- Right Texts -->
                                        <div class="col-md-12 col-12">
                                            <h1 class="bold-title ">
                                                <span class="playfair"><?php echo $this->lang->line('Practices_Intellectual_property'); ?></span>
                                            </h1>
                                            <h4 class="xs-my gray6 text-justify">
                                                <?php echo  $this->lang->line('Practices_Intellectual_property_details'); ?>
                                            </h4>
                                        </div>
                                        <!-- End Right Texts -->
                                    </div>
                                </div>
                            </div>

                            <!-- Tab -->
                            <div id="tab13f" role="tabpanel" class="tab-pane">
                                <div class="tab-container dropcap dropcap-bg dropcap-lg primary-bg dropcap-radius">
                                    <div class="row">
                                        <!-- Right Texts -->
                                        <div class="col-md-12 col-12">
                                            <h1 class="bold-title ">
                                                <span class="playfair"><?php echo $this->lang->line('Practices_Banking_Operations'); ?></span>
                                            </h1>
                                            <h4 class="xs-my gray6 text-justify">
                                                <?php echo  $this->lang->line('Practices_Banking_Operations_details'); ?>
                                            </h4>
                                        </div>
                                        <!-- End Right Texts -->
                                    </div>
                                </div>
                            </div>

                            <!-- Tab -->
                            <div id="tab14f" role="tabpanel" class="tab-pane">
                                <div class="tab-container dropcap dropcap-bg dropcap-lg primary-bg dropcap-radius">
                                    <div class="row">
                                        <!-- Right Texts -->
                                        <div class="col-md-12 col-12">
                                            <h1 class="bold-title ">
                                                <span class="playfair"><?php echo $this->lang->line('Practices_Bankruptcy'); ?></span>
                                            </h1>
                                            <h4 class="xs-my gray6 text-justify">
                                                <?php echo  $this->lang->line('Practices_Bankruptcy_details'); ?>
                                            </h4>
                                        </div>
                                        <!-- End Right Texts -->
                                    </div>
                                </div>
                            </div>

                            <!-- Tab -->
                            <div id="tab15f" role="tabpanel" class="tab-pane">
                                <div class="tab-container dropcap dropcap-bg dropcap-lg primary-bg dropcap-radius">
                                    <div class="row">
                                        <!-- Right Texts -->
                                        <div class="col-md-12 col-12">
                                            <h1 class="bold-title ">
                                                <span class="playfair"><?php echo $this->lang->line('Practices_Insurance'); ?></span>
                                            </h1>
                                            <h4 class="xs-my gray6 text-justify">
                                                <?php echo  $this->lang->line('Practices_Insurance_details'); ?>
                                            </h4>
                                        </div>
                                        <!-- End Right Texts -->
                                    </div>
                                </div>
                            </div>

                            <!-- Tab -->
                            <div id="tab16f" role="tabpanel" class="tab-pane">
                                <div class="tab-container dropcap dropcap-bg dropcap-lg primary-bg dropcap-radius">
                                    <div class="row">
                                        <!-- Right Texts -->
                                        <div class="col-md-12 col-12">
                                            <h1 class="bold-title ">
                                                <span class="playfair"><?php echo $this->lang->line('Practices_Labor_relations'); ?></span>
                                            </h1>
                                            <h4 class="xs-my gray6 text-justify">
                                                <?php echo  $this->lang->line('Practices_Labor_relations_details'); ?>
                                            </h4>
                                        </div>
                                        <!-- End Right Texts -->
                                    </div>
                                </div>
                            </div>

                            <!-- Tab -->
                            <div id="tab17f" role="tabpanel" class="tab-pane">
                                <div class="tab-container dropcap dropcap-bg dropcap-lg primary-bg dropcap-radius">
                                    <div class="row">
                                        <!-- Right Texts -->
                                        <div class="col-md-12 col-12">
                                            <h1 class="bold-title ">
                                                <span class="playfair"><?php echo $this->lang->line('Practices_Foreign_Investment'); ?></span>
                                            </h1>
                                            <h4 class="xs-my gray6 text-justify">
                                                <?php echo  $this->lang->line('Practices_Foreign_Investment_details'); ?>
                                            </h4>
                                        </div>
                                        <!-- End Right Texts -->
                                    </div>
                                </div>
                            </div>

                            <!-- Tab -->
                            <div id="tab18f" role="tabpanel" class="tab-pane">
                                <div class="tab-container dropcap dropcap-bg dropcap-lg primary-bg dropcap-radius">
                                    <div class="row">
                                        <!-- Right Texts -->
                                        <div class="col-md-12 col-12">
                                            <h1 class="bold-title ">
                                                <span class="playfair"><?php echo $this->lang->line('Practices_Communications_and_Information_Technology'); ?></span>
                                            </h1>
                                            <h4 class="xs-my gray6 text-justify">
                                                <?php echo  $this->lang->line('Practices_Communications_and_Information_Technology_details'); ?>
                                            </h4>
                                        </div>
                                        <!-- End Right Texts -->
                                    </div>
                                </div>
                            </div>

                            <!-- Tab -->
                            <div id="tab19f" role="tabpanel" class="tab-pane">
                                <div class="tab-container dropcap dropcap-bg dropcap-lg primary-bg dropcap-radius">
                                    <div class="row">
                                        <!-- Right Texts -->
                                        <div class="col-md-12 col-12">
                                            <h1 class="bold-title ">
                                                <span class="playfair"><?php echo $this->lang->line('Practices_Authentication'); ?></span>
                                            </h1>
                                            <h4 class="xs-my gray6 text-justify">
                                                <?php echo  $this->lang->line('Practices_Authentication_details'); ?>
                                            </h4>
                                        </div>
                                        <!-- End Right Texts -->
                                    </div>
                                </div>
                            </div>

                            <!-- Tab -->
                            <div id="tab20f" role="tabpanel" class="tab-pane">
                                <div class="tab-container dropcap dropcap-bg dropcap-lg primary-bg dropcap-radius">
                                    <div class="row">
                                        <!-- Right Texts -->
                                        <div class="col-md-12 col-12">
                                            <h1 class="bold-title ">
                                                <span class="playfair"><?php echo $this->lang->line('Practices_Administrative_Litigation'); ?></span>
                                            </h1>
                                            <h4 class="xs-my gray6 text-justify">
                                                <?php echo  $this->lang->line('Practices_Administrative_Litigation_details'); ?>
                                            </h4>
                                        </div>
                                        <!-- End Right Texts -->
                                    </div>
                                </div>
                            </div>

                            <!-- Tab -->
                            <div id="tab21f" role="tabpanel" class="tab-pane">
                                <div class="tab-container dropcap dropcap-bg dropcap-lg primary-bg dropcap-radius">
                                    <div class="row">
                                        <!-- Right Texts -->
                                        <div class="col-md-12 col-12">
                                            <h1 class="bold-title ">
                                                <span class="playfair"><?php echo $this->lang->line('Practices_Trade_and_Supply'); ?></span>
                                            </h1>
                                            <h4 class="xs-my gray6 text-justify">
                                                <?php echo  $this->lang->line('Practices_Trade_and_Supply_details'); ?>
                                            </h4>
                                        </div>
                                        <!-- End Right Texts -->
                                    </div>
                                </div>
                            </div>

                            <!-- Tab -->
                            <div id="tab22f" role="tabpanel" class="tab-pane">
                                <div class="tab-container dropcap dropcap-bg dropcap-lg primary-bg dropcap-radius">
                                    <div class="row">
                                        <!-- Right Texts -->
                                        <div class="col-md-12 col-12">
                                            <h1 class="bold-title ">
                                                <span class="playfair"><?php echo $this->lang->line('Practices_Contracting_and_Construction'); ?></span>
                                            </h1>
                                            <h4 class="xs-my gray6 text-justify">
                                                <?php echo  $this->lang->line('Practices_Contracting_and_Construction_details'); ?>
                                            </h4>
                                        </div>
                                        <!-- End Right Texts -->
                                    </div>
                                </div>
                            </div>

                            <!-- Tab -->
                            <div id="tab23f" role="tabpanel" class="tab-pane">
                                <div class="tab-container dropcap dropcap-bg dropcap-lg primary-bg dropcap-radius">
                                    <div class="row">
                                        <!-- Right Texts -->
                                        <div class="col-md-12 col-12">
                                            <h1 class="bold-title ">
                                                <span class="playfair"><?php echo $this->lang->line('Practices_Legacies'); ?></span>
                                            </h1>
                                            <h4 class="xs-my gray6 text-justify">
                                                <?php echo  $this->lang->line('Practices_Legacies_details'); ?>
                                            </h4>
                                        </div>
                                        <!-- End Right Texts -->
                                    </div>
                                </div>
                            </div>

                            <!-- Tab -->
                            <div id="tab24f" role="tabpanel" class="tab-pane">
                                <div class="tab-container dropcap dropcap-bg dropcap-lg primary-bg dropcap-radius">
                                    <div class="row">
                                        <!-- Right Texts -->
                                        <div class="col-md-12 col-12">
                                            <h1 class="bold-title ">
                                                <span class="playfair"><?php echo $this->lang->line('Practices_Healthcare'); ?></span>
                                            </h1>
                                            <h4 class="xs-my gray6 text-justify">
                                                <?php echo  $this->lang->line('Practices_Healthcare_details'); ?>
                                            </h4>
                                        </div>
                                        <!-- End Right Texts -->
                                    </div>
                                </div>
                            </div>

                            <!-- Tab -->
                            <div id="tab25f" role="tabpanel" class="tab-pane">
                                <div class="tab-container dropcap dropcap-bg dropcap-lg primary-bg dropcap-radius">
                                    <div class="row">
                                        <!-- Right Texts -->
                                        <div class="col-md-12 col-12">
                                            <h1 class="bold-title ">
                                                <span class="playfair"><?php echo $this->lang->line('Practices_Taxes'); ?></span>
                                            </h1>
                                            <h4 class="xs-my gray6 text-justify">
                                                <?php echo  $this->lang->line('Practices_Taxes_details'); ?>
                                            </h4>
                                        </div>
                                        <!-- End Right Texts -->
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
