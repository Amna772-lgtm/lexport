<?php $nvc = "white-nav sticky shrink modern hover4 radius-drop"; 
$pageTitle = $this->lang->line("Archives");
include('header.php');
?>
 </section>
<?php
include('header_welcome.php');
?>


<div class="m-grid__item m-grid__item--fluid m-wrapper">


	<!-- END: Subheader -->
	<div class="m-content client_dashboard">
		<div class="row">
			<div class="col-lg-12">
                <div class="m-portlet m-portlet--full-height">
					<div class="m-portlet__head">
						<div class="m-portlet__head-caption">
							<div class="m-portlet__head-title">
								<h3 class="m-portlet__head-text heading">
									<?php echo $this->lang->line('Recent_Activities'); ?>
								</h3>
							</div>
						</div>
					</div>
                <div class="m-portlet__body activities">

                    <div class="row  align-items-center">
                        <div class="m-scrollable" data-scrollable="true" data-height="285" data-mobile-height="300" style="width: 100%;padding: 15px;">

                            <!--Begin::Timeline 2 -->
                            <div class="m-timeline-2" id="m-timeline-2">
                                <div class="m-timeline-2__items  m--padding-top-25 m--padding-bottom-30">
                                <table class="lp-theme-table lp-large-theme m_datatable">
                                <thead>
                                    <tr class="netTr" style="text-align:left;">
                                        <th class="sortable"><?php echo $this->lang->line( 'Client_Name' ); ?> </th>
                                        <th class="sortable"><?php echo $this->lang->line( 'Name' ); ?> </th>
                                        <th class="sortable" style="text-align:center;"><?php echo $this->lang->line('Activity') ?></th>
                                        <th></th>
                                    </tr>
								</thead>
                                    <tbody>
                                <?php
                                $cid = $this->session->userdata( 'user_id' );
                                $this->db->select( '*' )->where( "(customer_id='$cid')", null, false );
                                $files = $this->db->order_by( 'id', 'desc' )->get( 'notification' )->result_array();
                                foreach ( $files as $n ) {
                                    ?>
                                    <tr><td><?php echo getEmployeeName($n['customer_id']); ?></td>
                                    <td><span class="m-timeline-2__item-time">
                                                <?php
                                                $timestamp = ( $n['create_date'] );
                                                // echo date( 'G:i', $timestamp );
                                                echo $timestamp;
                                                ?>
                                    </span></td>
                                    <td>
                                    <?php if ( $n['status_type'] == 'logout' ) { ?>
                                            <div id="readnotificaion"  class="m-timeline-2__item 
                                                <?php
                                                if ( $n['read_status'] == 0 ) {
                                                    echo 'notireaded';}
                                                ?>
                                            " data-read="<?php echo $n['id']; ?>">
                                                <div class="m-timeline-2__item-cricle">
                                                    <i class="fa fa-genderless m--font-danger"></i>
                                                </div>
                                                <div class="m-timeline-2__item-text  m--padding-top-5">
                                                    <?php echo $this->lang->line( 'Logged_out_successfully' ); ?>
                                                </div>
                                            </div>
                                <?php } ?>
                                    <?php if ( $n['status_type'] == 'login' ) { ?>
                                        <?php $dinfo = json_decode( $n['device_log'] ); ?>
                                    <div id="readnotificaion"  class="m-timeline-2__item 
                                        <?php
                                        if ( $n['read_status'] == 0 ) {
                                            echo 'notireaded';}
                                        ?>
                                    " data-read="<?php echo $n['id']; ?>">
                                        <div class="m-timeline-2__item-cricle">
                                            <i class="fa fa-genderless m--font-danger"></i>
                                        </div>
                                        <div class="m-timeline-2__item-text  m--padding-top-5">
                                            <?php echo $this->lang->line( 'Logged_in_from' ); ?> <?php
                                            echo $dinfo->name;
                                            echo ' ';
                                            echo $dinfo->platform;
                                            ?>
                                            <br> <?php echo $this->lang->line( 'from_IP' ); ?>: <?php echo $n['login_ip']; ?>
                                        </div>
                                    </div>
                                <?php } ?>
                                
                                    <?php if ( $n['status_type'] == 'register' ) { ?>
                                        <?php $dinfo = json_decode( $n['device_log'] ); ?>
                                    <div id="readnotificaion"  class="m-timeline-2__item  
                                        <?php
                                        if ( $n['read_status'] == 0 ) {
                                            echo 'notireaded';}
                                        ?>
                                    " data-read="<?php echo $n['id']; ?>">
                                        <div class="m-timeline-2__item-cricle">
                                            <i class="fa fa-genderless m--font-danger"></i>
                                        </div>
                                        <div class="m-timeline-2__item-text  m--padding-top-5">
                                            Registration successfully  
                                        <?php
                                        echo $dinfo->name;
                                        echo ' ';
                                        echo $dinfo->platform;
                                        ?>
                                        A<?php echo $this->lang->line( 'from_IP' ); ?>: <?php echo $n['login_ip']; ?>
                                        </div>
                                    </div>
                                <?php } ?>
                                
                                    <?php if ( $n['status_type'] == 'success' && $n['notification_type'] == 'payment' ) { ?>
                                        <?php $dinfo = json_decode( $n['device_log'] ); ?>
                                    <div id="readnotificaion"  class="m-timeline-2__item  
                                        <?php
                                        if ( $n['read_status'] == 0 ) {
                                            echo 'notireaded';}
                                        ?>
                                    " data-read="<?php echo $n['id']; ?>">
                                        <div class="m-timeline-2__item-cricle">
                                            <i class="fa fa-genderless m--font-danger"></i>
                                        </div>
                                        <div class="m-timeline-2__item-text  m--padding-top-5">
                                                <?php

                                                $row1 = $this->db->where( 'id', $n['appointment_id'] )->get( 'invoice_details' )->row();
                                                echo $this->lang->line( 'payment_is_successful' ) . $row1->invoice_no;

                                                ?>
                                                                                            </div>
                                    </div>
                                <?php } ?>
                                    <?php if ( $n['notification_type'] == 'msg' ) { ?>
                                    <div id="readnotificaion"  class="m-timeline-2__item  
                                        <?php
                                        if ( $n['read_status'] == 0 ) {
                                            echo 'notireaded';}
                                        ?>
                                    " data-read="<?php echo $n['id']; ?>">
                                        <div class="m-timeline-2__item-cricle">
                                            <i class="fa fa-genderless m--font-danger"></i>
                                        </div>
                                        <div class="m-timeline-2__item-text  m--padding-top-5">
                                            <?php echo $this->lang->line( 'You_have_New_message' ); ?> 
                                        </div>
                                    </div>

                                <?php } ?>
                                    <?php if ( $n['notification_type'] == 'invoice' ) { ?>
                                    <div class="m-timeline-2__item  ">
                                        <div class="m-timeline-2__item-cricle">
                                            <i class="fa fa-genderless m--font-brand"></i>
                                        </div>
                                        <div class="m-timeline-2__item-text m--padding-top-5">
                                        <a href="<?php echo base_url( '/alert/' ); ?>" class="
                                                            <?php
                                                            if ( $n['read_status'] == 0 ) {
                                                                echo 'notireaded';}
                                                            ?>
                                        " id="readnotificaion" class="
                                        <?php
                                        if ( $n['read_status'] == 0 ) {
                                            echo 'notireaded';}
                                        ?>
                                        "  data-read="<?php echo $n['id']; ?>">
                                            <?php echo $this->lang->line( 'Your_invoice_for_case' ); ?> <?php echo getCaseNumber( $n['case_id'] ); ?> <?php //echo $this->lang->line('has_been_created'); ?>
                                            </a>
                                        </div>
                                    </div>
                                    <?php } ?>
                                    <?php if ( $n['notification_type'] == 'case' ) { ?>
                                        <?php if ( $n['status_type'] == 'add' ) { ?>
                                    <div class="m-timeline-2__item  ">
                                        <div class="m-timeline-2__item-cricle">
                                            <i class="fa fa-genderless m--font-warning"></i>
                                        </div>
                                        <div class="m-timeline-2__item-text m--padding-top-5">
                                        <a href="<?php echo base_url( "/front/view_case/{$n['case_id']}" ); ?>"  class="
                                                            <?php
                                                            if ( $n['read_status'] == 0 ) {
                                                                echo 'notireaded';}
                                                            ?>
                                        "  id="readnotificaion" class="
                                            <?php
                                            if ( $n['read_status'] == 0 ) {
                                                                                            echo 'notireaded';}
                                            ?>
                                            "  data-read="<?php echo $n['id']; ?>"><span><span class="idleft">
                                            <?php
                                            if ( $this->session->userdata( 'site_lang' ) == 'english' or $this->session->userdata( 'site_lang' ) == '' ) {
                                                                                            echo '#' . getCaseNumber( $n['case_id'] );}
                                            ?>
                                            </span> <?php echo $this->lang->line( 'Your_e_service_has_been_added' ); ?></span></a>
                                        </div>
                                    </div>
                                    <?php } ?>
                                        <?php if ( $n['status_type'] == 'reject' ) { ?>
                                    <div class="m-timeline-2__item  ">
                                        <div class="m-timeline-2__item-cricle">
                                            <i class="fa fa-genderless m--font-warning"></i>
                                        </div>
                                        <div class="m-timeline-2__item-text m--padding-top-5">
                                    <a href="<?php echo base_url( "/front/view_case/{$n['case_id']}" ); ?>"  class="
                                                        <?php
                                                        if ( $n['read_status'] == 0 ) {
                                                            echo 'notireaded';}
                                                        ?>
                                    "  id="readnotificaion" class="
                                            <?php
                                            if ( $n['read_status'] == 0 ) {
                                                                                        echo 'notireaded';}
                                            ?>
                                    "  data-read="<?php echo $n['id']; ?>"><span ><span class="idleft">
                                            <?php
                                            if ( $this->session->userdata( 'site_lang' ) == 'english' or $this->session->userdata( 'site_lang' ) == '' ) {
                                                                                        echo '#' . getCaseNumber( $n['case_id'] );}
                                            ?>
                                            </span> <?php echo $this->lang->line( 'Your_e_service_has_been_rejected' ); ?><span class="idleft">
                                            <?php
                                            if ( $this->session->userdata( 'site_lang' ) == 'arabic' ) {
                                                                                        echo '#' . getCaseNumber( $n['case_id'] );}
                                            ?>
                                            </span></span></a>
                                        </div>
                                    </div>
                                    <?php } ?>
                                        <?php if ( $n['status_type'] == 'approve' ) { ?>
                                    <div class="m-timeline-2__item  ">
                                        <div class="m-timeline-2__item-cricle">
                                            <i class="fa fa-genderless m--font-brand"></i>
                                        </div>
                                        <div class="m-timeline-2__item-text m--padding-top-5">
                                        <a href="<?php echo base_url( "/front/view_case/{$n['case_id']}" ); ?>" id="readnotificaion" class="
                                                            <?php
                                                            if ( $n['read_status'] == 0 ) {
                                                                echo 'notireaded';}
                                                            ?>
                                        "  data-read="<?php echo $n['id']; ?>"><span style="color:green"><span class="idleft">
                                            <?php
                                            if ( $this->session->userdata( 'site_lang' ) == 'english' or $this->session->userdata( 'site_lang' ) == '' ) {
                                                                                            echo '#' . getCaseNumber( $n['case_id'] );}
                                            ?>
                                            </span><?php echo $this->lang->line( 'Your_e_service_has_been_approved' ); ?><span class="idleft">
                                            <?php
                                            if ( $this->session->userdata( 'site_lang' ) == 'arabic' ) {
                                                                                            echo '#' . getCaseNumber( $n['case_id'] );}
                                            ?>
                                            </span></span></a>
                                        </div>
                                    </div>
                                    <?php } ?>

                                    <?php } ?>
                                    <?php if ( $n['notification_type'] == 'session_appoinment' ) { ?>
                                        <?php if ( $n['status_type'] == 'add' ) { ?>
                                        <div class="m-timeline-2__item  ">
                                        <div class="m-timeline-2__item-cricle">
                                            <i class="fa fa-genderless m--font-warning"></i>
                                        </div>
                                        <div class="m-timeline-2__item-text m--padding-top-5">
                                        <a href="<?php echo base_url( "/front/view_appoinment/{$n['appointment_id']}" ); ?>" id="readnotificaion" class="
                                                            <?php
                                                            if ( $n['read_status'] == 0 ) {
                                                                echo 'notireaded';}
                                                            ?>
                                        "  data-read="<?php echo $n['id']; ?>">
                                            <span class="idleft">
                                            <?php
                                            if ( $this->session->userdata( 'site_lang' ) == 'english' or $this->session->userdata( 'site_lang' ) == '' ) {
                                                echo '#' . getCaseNumber( $n['case_id'] );}
                                            ?>
                                            </span> <?php echo $this->lang->line( 'Session_mission_added' ); ?> <span class="idleft">
                                            <?php
                                            if ( $this->session->userdata( 'site_lang' ) == 'arabic' ) {
                                                echo '#' . getCaseNumber( $n['case_id'] );}
                                            ?>
                                            </span>
                                        </a>
                                        </div>
                                    </div>
                                    <?php } ?>
                                        <?php if ( $n['status_type'] == 'close' ) { ?>
                                    <div class="m-timeline-2__item  ">
                                        <div class="m-timeline-2__item-cricle">
                                            <i class="fa fa-genderless m--font-danger"></i>
                                        </div>
                                        <div class="m-timeline-2__item-text m--padding-top-5">
                                        <a href="<?php echo base_url( "/front/view_appoinment/{$n['appointment_id']}" ); ?>" id="readnotificaion" class="
                                                            <?php
                                                            if ( $n['read_status'] == 0 ) {
                                                                echo 'notireaded';}
                                                            ?>
                                        "  data-read="<?php echo $n['id']; ?>">
                                            <span class="idleft">
                                            <?php
                                            if ( $this->session->userdata( 'site_lang' ) == 'english' or $this->session->userdata( 'site_lang' ) == '' ) {
                                                echo '#' . getCaseNumber( $n['case_id'] );}
                                            ?>
                                            </span> <?php echo $this->lang->line( 'Session_mission_has_been_close' ); ?> <span class="idleft">
                                            <?php
                                            if ( $this->session->userdata( 'site_lang' ) == 'arabic' ) {
                                                echo '#' . getCaseNumber( $n['case_id'] );}
                                            ?>
                                            </span>
                                        </a>
                                        </div>
                                    </div>
                                
                                    <?php } ?>
                                    <?php } ?>
                                    
                                    
                                    <?php if ( $n['notification_type'] == 'general_appoinment' ) { ?>
                                        <?php if ( $n['status_type'] == 'add' ) { ?>
                                        <div class="m-timeline-2__item  ">
                                        <div class="m-timeline-2__item-cricle">
                                            <i class="fa fa-genderless m--font-warning"></i>
                                        </div>
                                        <div class="m-timeline-2__item-text m--padding-top-5">
                                        <a href="<?php echo base_url( "/front/view_general_appoinment/{$n['appointment_id']}" ); ?>" id="readnotificaion" class="
                                                            <?php
                                                            if ( $n['read_status'] == 0 ) {
                                                                echo 'notireaded';}
                                                            ?>
                                        "  data-read="<?php echo $n['id']; ?>">
                                            <span class="idleft">
                                            <?php
                                            if ( $this->session->userdata( 'site_lang' ) == 'english' or $this->session->userdata( 'site_lang' ) == '' ) {
                                                echo '#' . getCaseNumber( $n['case_id'] );}
                                            ?>
                                            </span> <?php echo $this->lang->line( 'General_mission_added' ); ?>
                                        <span class="idleft">
                                            <?php
                                            if ( $this->session->userdata( 'site_lang' ) == 'arabic' ) {
                                                echo '#' . getCaseNumber( $n['case_id'] );}
                                            ?>
                                        </span></a>
                                        </div>
                                    </div>
                                    <?php } ?>
                                        <?php if ( $n['status_type'] == 'close' ) { ?>
                                    <div class="m-timeline-2__item  ">
                                        <div class="m-timeline-2__item-cricle">
                                            <i class="fa fa-genderless m--font-danger"></i>
                                        </div>
                                        <div class="m-timeline-2__item-text m--padding-top-5">
                                        <a href="<?php echo base_url( "/front/view_general_appoinment/{$n['appointment_id']}" ); ?>" id="readnotificaion" class="
                                                            <?php
                                                            if ( $n['read_status'] == 0 ) {
                                                                echo 'notireaded';}
                                                            ?>
                                        "  data-read="<?php echo $n['id']; ?>">
                                            <span class="idleft">
                                            <?php
                                            if ( $this->session->userdata( 'site_lang' ) == 'english' or $this->session->userdata( 'site_lang' ) == '' ) {
                                                echo '#' . getCaseNumber( $n['case_id'] );}
                                            ?>
                                            </span> <?php echo $this->lang->line( 'General_mission_has_been_close' ); ?><span class="idleft">
                                            <?php
                                            if ( $this->session->userdata( 'site_lang' ) == 'arabic' ) {
                                                echo '#' . getCaseNumber( $n['case_id'] );}
                                            ?>
                                            </span>
                                        </a>
                                        </div>
                                    </div>
                                
                                    <?php } ?>
                                    <?php } ?>
                                    
                                    
                                    <?php if ( $n['notification_type'] == 'visiting_appoinment' ) { ?>
                                            <?php if ( $n['status_type'] == 'add' ) { ?>
                                        <div class="m-timeline-2__item  ">
                                        </span>
                                        <div class="m-timeline-2__item-cricle">
                                            <i class="fa fa-genderless m--font-warning"></i>
                                        </div>
                                        <div class="m-timeline-2__item-text m--padding-top-5">
                                        <a href="<?php echo base_url( "/front/view_visiting_appoinment/{$n['appointment_id']}" ); ?>" id="readnotificaion" class="
                                                            <?php
                                                            if ( $n['read_status'] == 0 ) {
                                                                echo 'notireaded';}
                                                            ?>
                                        "  data-read="<?php echo $n['id']; ?>">
                                            <span class="idleft">
                                                <?php
                                                if ( $this->session->userdata( 'site_lang' ) == 'english' or $this->session->userdata( 'site_lang' ) == '' ) {
                                                    echo '#' . getCaseNumber( $n['case_id'] );}
                                                ?>
                                            </span> <?php echo $this->lang->line( 'Visiting_mission_added' ); ?> <span class="idleft">
                                                <?php
                                                if ( $this->session->userdata( 'site_lang' ) == 'arabic' ) {
                                                                                                    echo '#' . getCaseNumber( $n['case_id'] );}
                                                ?>
                                            </span>
                                        </a>
                                        </div>
                                    </div>
                                    <?php } ?>
                                            <?php if ( $n['status_type'] == 'close' ) { ?>
                                    <div class="m-timeline-2__item  ">
                                        <div class="m-timeline-2__item-cricle">
                                            <i class="fa fa-genderless m--font-danger"></i>
                                        </div>
                                        <div class="m-timeline-2__item-text m--padding-top-5">
                                        <a href="<?php echo base_url( "/front/view_visiting_appoinment/{$n['appointment_id']}" ); ?>" id="readnotificaion" class="
                                                            <?php
                                                            if ( $n['read_status'] == 0 ) {
                                                                echo 'notireaded';}
                                                            ?>
                                        "  data-read="<?php echo $n['id']; ?>">
                                            <span class="idleft">
                                                <?php
                                                if ( $this->session->userdata( 'site_lang' ) == 'english' or $this->session->userdata( 'site_lang' ) == '' ) {
                                                    echo '#' . getCaseNumber( $n['case_id'] );}
                                                ?>
                                            </span><?php echo $this->lang->line( 'Visiting_mission_has_been_close' ); ?> <span class="idleft">
                                                <?php
                                                if ( $this->session->userdata( 'site_lang' ) == 'arabic' ) {
                                                                                                    echo '#' . getCaseNumber( $n['case_id'] );}
                                                ?>
                                            </span>
                                        </a>
                                        </div>
                                    </div>
                                
                                    <?php } ?>
                                    <?php } ?>
                                    
                                    <?php if ( $n['notification_type'] == 'consultation_appoinment' ) { ?>
                                            <?php if ( $n['status_type'] == 'add' ) { ?>
                                        <div class="m-timeline-2__item  ">
                                        <div class="m-timeline-2__item-cricle">
                                            <i class="fa fa-genderless m--font-warning"></i>
                                        </div>
                                        <div class="m-timeline-2__item-text m--padding-top-5">
                                        <a href="<?php echo base_url( "/front/view_consultation_appoinment/{$n['appointment_id']}" ); ?>" id="readnotificaion" class="
                                                            <?php
                                                            if ( $n['read_status'] == 0 ) {
                                                                echo 'notireaded';}
                                                            ?>
                                        "  data-read="<?php echo $n['id']; ?>">
                                            <span class="idleft">
                                                <?php
                                                if ( $this->session->userdata( 'site_lang' ) == 'english' or $this->session->userdata( 'site_lang' ) == '' ) {
                                                    echo '#' . getCaseNumber( $n['case_id'] );}
                                                ?>
                                            </span> <?php echo $this->lang->line( 'Consultation_mission_added' ); ?> <span class="idleft">
                                                <?php
                                                if ( $this->session->userdata( 'site_lang' ) == 'arabic' ) {
                                                                                                    echo '#' . getCaseNumber( $n['case_id'] );}
                                                ?>
                                            </span>
                                        </a>
                                        </div>
                                    </div>
                                    <?php } ?>
                                            <?php if ( $n['status_type'] == 'close' ) { ?>
                                    <div class="m-timeline-2__item  ">
                                        <div class="m-timeline-2__item-cricle">
                                            <i class="fa fa-genderless m--font-danger"></i>
                                        </div>
                                        <div class="m-timeline-2__item-text m--padding-top-5">
                                        <a href="<?php echo base_url( "/front/view_consultation_appoinment/{$n['appointment_id']}" ); ?>" id="readnotificaion" class="
                                                            <?php
                                                            if ( $n['read_status'] == 0 ) {
                                                                echo 'notireaded';}
                                                            ?>
                                        "  data-read="<?php echo $n['id']; ?>">
                                            <span class="idleft">
                                                <?php
                                                if ( $this->session->userdata( 'site_lang' ) == 'english' or $this->session->userdata( 'site_lang' ) == '' ) {
                                                    echo '#' . getCaseNumber( $n['case_id'] );}
                                                ?>
                                            </span> <?php echo $this->lang->line( 'Consultation_mission_has_been_close' ); ?> <span class="idleft">
                                                <?php
                                                if ( $this->session->userdata( 'site_lang' ) == 'arabic' ) {
                                                                                                    echo '#' . getCaseNumber( $n['case_id'] );}
                                                ?>
                                            </span>
                                        </a>
                                        </div>
                                    </div>
                                
                                    <?php } ?>
                                    <?php } ?>
                                    
                                    
                                    <?php if ( $n['notification_type'] == 'writings_appoinment' ) { ?>
                                            <?php if ( $n['status_type'] == 'add' ) { ?>
                                        <div class="m-timeline-2__item  ">
                                        <div class="m-timeline-2__item-cricle">
                                            <i class="fa fa-genderless m--font-warning"></i>
                                        </div>
                                        <div class="m-timeline-2__item-text m--padding-top-5">
                                        <a href="<?php echo base_url( "/front/view_writings_appoinment/{$n['appointment_id']}" ); ?>" id="readnotificaion" class="
                                                            <?php
                                                            if ( $n['read_status'] == 0 ) {
                                                                echo 'notireaded';}
                                                            ?>
                                        "  data-read="<?php echo $n['id']; ?>">
                                            <span class="idleft">
                                                <?php
                                                if ( $this->session->userdata( 'site_lang' ) == 'english' or $this->session->userdata( 'site_lang' ) == '' ) {
                                                    echo '#' . getCaseNumber( $n['case_id'] );}
                                                ?>
                                            </span><?php echo $this->lang->line( 'Writing_mission_added' ); ?> <span class="idleft">
                                                <?php
                                                if ( $this->session->userdata( 'site_lang' ) == 'arabic' ) {
                                                                                                    echo '#' . getCaseNumber( $n['case_id'] );}
                                                ?>
                                            </span>
                                        </a>
                                        </div>
                                    </div>
                                    <?php } ?>
                                            <?php if ( $n['status_type'] == 'close' ) { ?>
                                    <div class="m-timeline-2__item  ">
                                        <div class="m-timeline-2__item-cricle">
                                            <i class="fa fa-genderless m--font-danger"></i>
                                        </div>
                                        <div class="m-timeline-2__item-text m--padding-top-5">
                                        <a href="<?php echo base_url( "/front/view_writings_appoinment/{$n['appointment_id']}" ); ?>" id="readnotificaion" class="
                                                            <?php
                                                            if ( $n['read_status'] == 0 ) {
                                                                echo 'notireaded';}
                                                            ?>
                                        "  data-read="<?php echo $n['id']; ?>">
                                            <span class="idleft">
                                                <?php
                                                if ( $this->session->userdata( 'site_lang' ) == 'english' or $this->session->userdata( 'site_lang' ) == '' ) {
                                                    echo '#' . getCaseNumber( $n['case_id'] );}
                                                ?>
                                            </span><?php echo $this->lang->line( 'Writing_mission_has_been_close' ); ?> <span class="idleft">
                                                <?php
                                                if ( $this->session->userdata( 'site_lang' ) == 'arabic' ) {
                                                                                                    echo '#' . getCaseNumber( $n['case_id'] );}
                                                ?>
                                            </span>
                                        </a>
                                        </div>
                                    </div>
                                
                                    <?php } ?>
                                    <?php } ?>
                                        </td></tr>
                                    <?php } ?>
                                            </tbody>
                                        </table>
                                </div>
                            </div>

                            <!--End::Timeline 2 -->
                        </div>
                    </div>

                    </div>
            </div>
        </div>
    </div>
</div>