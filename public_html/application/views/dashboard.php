<?php $nvc = 'white-nav sticky shrink modern hover4 radius-drop';
$pageTitle = $this->lang->line( 'Dashboard' );
$is_dashboard = true;
require 'header.php';
?>
</section>
<?php
require 'header_welcome.php';
?>
<!-- END: Left Aside -->
<div class="m-grid__item m-grid__item--fluid m-wrapper">


	<!-- END: Subheader -->
	<div class="m-content client_dashboard">
		<div class="row">
			<div class="col-lg-12">

				<!--Begin::Portlet-->
				<div class="m-portlet  m-portlet--full-height">
					<div class="m-portlet__head">
						<div class="m-portlet__head-caption">
							<div class="m-portlet__head-title">
								<h3 class="m-portlet__head-text heading">
									<?php echo $this->lang->line( 'Recent_Services' ); ?>
								</h3>
							</div>
							<div class="m-portlet__head-title view_all">
								<a href="<?php echo base_url( 'case_list' ); ?>">
									<span class="m-nav__link-text">
									<?php echo $this->lang->line( 'View_all' ); ?>

									</span>
								</a>
							</div>
						</div>

					</div>

					<div   class="m-portlet__body" >
						<div class="row">
								<div class="col responsive-table-container">
									<table class="lp-theme-table lp-large-theme m_datatable">
										<thead>
											<tr class="netTr" style="text-align:left;">
												<th class="sortable"><?php echo $this->lang->line( 'E_Service_Number' ); ?> </th>
												<th class="sortable"><?php echo $this->lang->line( 'Name' ); ?> </th>
												<th class="sortable"><?php echo $this->lang->line( 'E_Service_Name' ); ?> </th>
												<th class="sortable"><?php echo $this->lang->line( 'E_Service_Type' ); ?> </th>
												<th class="sortable"><?php echo $this->lang->line( 'Contract_number' ); ?></th>
												<th></th>
											</tr>
										</thead>
										<tbody>
											<?php
											$count = 1;
											if ( ! empty( $data ) ) {
												foreach ( $data as $appoinment ) {
													?>
                                                    <tr class="hide<?php echo $appoinment['id']; ?>" style="text-align:left;">
                                                        <td><?php echo $appoinment['case_number']; ?></td>
                                                        <td style="color:#333333;"><?php echo $appoinment['client_name']; ?></td>
                                                        <td><?= getServiceType($appoinment['service_types']) ?></td>
                                                        <td><?php echo getCaseType($appoinment['case_type']); ?></td>
                                                        <td><?php echo $appoinment['contract_number']; ?></td>
                                                        <td class="ext-link"><a href="<?php echo base_url( 'front/view_case/' . $appoinment['id'] ); ?>">...</a></td>
                                                    </tr>
													<?php
												}
											} else {
												?>
													<tr colspan="7">
														<td><?php echo $this->lang->line( 'No_data_available_in_table' ); ?><td>
													</tr>
												<?php } ?>

										</tbody>
									</table>
								</div>
						</div>
					</div>
				</div>

				<!--End::Portlet-->
			</div>
			<div class="col-lg-12">

				<!--Begin::Portlet-->
				<div class="m-portlet m-portlet--full-height">
					<div class="m-portlet__head">
						<div class="m-portlet__head-caption">
							<div class="m-portlet__head-title">
								<h3 class="m-portlet__head-text heading">
									<?php echo $this->lang->line( 'Recent_Activity' ); ?>
								</h3>
							</div>
							<div class="m-portlet__head-title view_all">
								<a href="<?php echo base_url( 'all_activities' ); ?>">
									<span class="m-nav__link-text">
									<?php echo $this->lang->line( 'View_all' ); ?>
									
									</span>
								</a>
							</div>
						</div>
					</div>
					<div class="m-portlet__body activities">

						<div class="row  align-items-center">
							<div  data-height="285" data-mobile-height="300" style="width: 100%;">

								<!--Begin::Timeline 2 -->
								<div class="m-timeline-2" id="m-timeline-2">
									<div class="m-timeline-2__items responsive-table-container">
									<table class="lp-theme-table lp-large-theme m_datatable">
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

				<!--End::Portlet-->
			</div>
		</div>


		<!--End::Section-->
	</div>
</div>
</div>



<?php

require 'footer.php';

?>
<script>
/* 
$('[id="readnotificaion"]').on('click', function(){
	var id=$(this).data("read");  
	var url="<?php echo base_url( 'front/read_notification_status' ); ?>";
	$.ajax({
		type:'ajax',
		method:'post',
		url:url,
		data:{"id" : id},
		success:function(data){
			$('.noticount').html(data);
		}
	});
});*/
</script>
<script type="text/javascript">
	$(window).on('load',function(){
		$('#m_modal_1').modal('show');
	});
</script>
<style>
.notireaded div {
	font-weight: bold !important;
	cursor: pointer;
}
.notireaded {
	font-weight: bold !important;
	cursor: pointer;
}
	.con-bar-top{
		background: #000000;
		padding: 10px;
	}
	.minSl{
		padding: 50px;
		background: #ffffff;
		border-radius: 20px;
	}
	.con{
		background: #ffffff url(<?php echo base_url( 'assets/images' ); ?>/img/slIc/bg-1.png);
		background-repeat: no-repeat;
		background-position: center top;
		background-size: 50%;
		*height: 800px;
	}
	.modal {
		top: 0;
	}
	.text-slider{
		text-align: center;
		margin-top: 10%;
		margin-bottom: 10%;
	}
	.text-slider h3{
		font-family: sans-serif;
		font-weight: bold;
		margin-bottom: 10px;
		font-size: 30px;
		color: #1F3959;
	}
	.text-slider p{
		font-family: sans-serif;
		font-size: 16px;
	}
	.carousel-indicators li {
		background-color: #f3f3f3;
		width: 10px;
		height: 10px;
		border-radius: 50%;
	}
	.carousel-indicators .active {
		background-color: #ccc;
	}
	.carousel-indicators {
		bottom: 15%;
	}
	.sr-only {
		position: unset;
	}
	.carousel-control-next, .carousel-control-prev {
		position: unset;
		width: 15%;
		color: #000;
		opacity: unset;
		margin: auto;
	}
	.carousel-control-next span{
		border: 1px solid #CAA457;
		border-radius: 20px;
		font-family: sans-serif;
		color: #CAA457;
		padding: 10px 50px;
	}
	.carousel-control-next:hover span{
		border: 1px solid #CAA457;
		color: #ffffff;
		background: #CAA457;
	}
</style>
<?php if ( isset( $_GET['popup'] ) ) { ?>
<div class="modal hide fade" id="m_modal_1" tabindex="-1" role="dialog" aria-labelledby="ModalLabel" style="display: block;">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-body">

				<div id="carouselControls" class="carousel slide" data-ride="carousel">

					<div class="con-bar-top" style="display: none">
						<button type="button" style="color: #fff;background: transparent;" data-dismiss="modal">
							<span class="fa fa-close" aria-hidden="true"></span>
						</button>
					</div>

					<ol class="carousel-indicators">
						<li data-target="#carouselControls" data-slide-to="0" class="active"></li>
						<li data-target="#carouselControls" data-slide-to="1"></li>
						<li data-target="#carouselControls" data-slide-to="2"></li>
						<li data-target="#carouselControls" data-slide-to="3"></li>
						<li data-target="#carouselControls" data-slide-to="4"></li>
						<li data-target="#carouselControls" data-slide-to="5"></li>
					</ol>


					<div class="minSl">

						<div class="carousel-inner">
							<div class="con">

								<div class="carousel-item active">
									<div class="img-slider">
										<img src="<?php echo base_url( 'assets/images' ); ?>/img/slIc/1/animat-rocket-color.gif" style="width: 50%;margin: auto;display: block;" />
									</div>
									<div class="text-slider">
										<h3><?php echo $this->lang->line( 'Shortcut_the_Time' ); ?></h3>
										<p><?php echo $this->lang->line( 'Start_your_legal_services_quickly' ); ?></p>
									</div>
								</div>

								<div class="carousel-item">
									<div class="img-slider">
										<img src="<?php echo base_url( 'assets/images' ); ?>/img/slIc/2/animat-checkmark-color.gif" style="width: 50%;margin: auto;display: block;" />
									</div>
									<div class="text-slider">
										<h3><?php echo $this->lang->line( 'Continuous_Achievement' ); ?></h3>
										<p><?php echo $this->lang->line( 'Keep_up_with_the_services_and_be_aware_of_what_has_been_done' ); ?></p>
									</div>
								</div>

								<div class="carousel-item">
									<div class="img-slider">
										<img src="<?php echo base_url( 'assets/images' ); ?>/img/slIc/3/animat-responsive-color.gif" style="width: 50%;margin: auto;display: block;" />
									</div>
									<div class="text-slider">
										<h3><?php echo $this->lang->line( 'Flexible_Use' ); ?></h3>
										<p><?php echo $this->lang->line( 'Flexible_Use_P1' ); ?></p>
									</div>
								</div>

								<div class="carousel-item">
									<div class="img-slider">
										<img src="<?php echo base_url( 'assets/images' ); ?>/img/slIc/4/animat-search-color.gif" style="width: 50%;margin: auto;display: block;" />
									</div>
									<div class="text-slider">
										<h3><?php echo $this->lang->line( 'Easy_Access' ); ?></h3>
										<p><?php echo $this->lang->line( 'Search_for_your_request_with_one_click' ); ?></p>
									</div>
								</div>

								<div class="carousel-item">
									<div class="img-slider">
										<img src="<?php echo base_url( 'assets/images' ); ?>/img/slIc/5/animat-lightbulb-color.gif" style="width: 50%;margin: auto;display: block;" />
									</div>
									<div class="text-slider">
										<h3><?php echo $this->lang->line( 'We_are_closer' ); ?></h3>
										<p><?php echo $this->lang->line( 'We_are_closer_p1' ); ?></p>
									</div>
								</div>

								<div class="carousel-item">
									<div class="img-slider">
										<img src="<?php echo base_url( 'assets/images' ); ?>/img/slIc/6/animat-customize-color.gif" style="width: 50%;margin: auto;display: block;" />
									</div>
									<div class="text-slider">
										<h3><?php echo $this->lang->line( 'Personal_Control' ); ?></h3>
										<p><?php echo $this->lang->line( 'Personal_Control_P1' ); ?></p>
									</div>
								</div>

							</div>
						</div>

						<a class="carousel-control-prev" href="#carouselControls" role="button" data-slide="prev" style="display: none">
							<span class="carousel-control-prev-icon" aria-hidden="true"></span>
							<span class="sr-only"><?php echo $this->lang->line( 'Previous' ); ?></span>
						</a>
						<a class="carousel-control-next" href="#carouselControls" role="button" data-dismiss="modal">
							<span class=""><?php echo $this->lang->line( 'Skip' ); ?></span>
						</a>

					</div>


				</div>

			</div>
		</div>
	</div>
</div>
<?php } ?>
