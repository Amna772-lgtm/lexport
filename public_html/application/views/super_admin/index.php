<?php
include('header.php');
?>
<style>
	h3.m-portlet__head-text {
    color: #1f3959 !important;
}
.m-portlet {
    border-radius: 0 !important;
}
m-widget4.m-widget4--progress .m-widget4__progress {
    padding-left: 1rem;
    padding-right: 1rem;
}
.m-portlet .m-portlet__head {
   
    background: none !important; 
}
        .m-widget25 .m-widget25__price {
            color: #CAA459 !important;
        }
        .st_img{
            width: 100%;
            background: #1F3958;
            padding: 15px;
            border-radius: 30px;
        }
        .m-widget17 .m-widget17__stats {
            display: table;
            width: 100%;
            margin-top: 15px;
        }
        .m-widget17 .m-widget17__stats .m-widget17__items .m-widget17__item {
            position: unset !important;
            margin-top: 0 !important;
            margin-bottom: 40px !important;
            height: 11rem !important;
            padding-bottom: 10px !important;
        }
        .m-widget17__item:hover{
            background: #f3f3f3 !important;
        }
        .m-timeline-3 .m-timeline-3__item .m-timeline-3__item-desc .m-timeline-3__item-text {
            font-size: 1.5rem;
        }
        .m-timeline-3 .m-timeline-3__item .m-timeline-3__item-desc {
            display: block;
        }
        .m-timeline-3 .m-timeline-3__item .m-timeline-3__item-time {
            padding-top: 3px;
        }
    </style>

 <div class="m-content">
			
    <!-- END: Left Aside -->
    <div class="m-grid__item m-grid__item--fluid m-wrapper">
			<div class="m-portlet transparent-body">
							<div class="m-portlet__body  m-portlet__body--no-padding">
								<div class="row m-row--col-separator-xl">
									<div class="col-xl-8">
                                    <div class="m-portlet lp-theme-card">
									<div class="m-portlet__head">
										<div class="m-portlet__head-caption">
											<div class="m-portlet__head-title">
												<h3 class="m-portlet__head-text">
													Active Users
												</h3><div style="color: #f00;right: 10px;position: absolute;">Auto Refere every 5 Second</div>
											</div>
										</div>
								
									</div>
										<!--begin:: Widgets/Stats2-1 -->
										<div class="m-widget1 lp-active-users-list" id="activitidata">
											<div class="m-widget1__item">
												<div class="tab-content" style=" overflow: auto; height: 495px; ">
											<div class="tab-pane active" id="m_widget4_tab1_content">
											  
												<div class="m-widget4 m-widget4--progress">
												<?php if($active_user){ foreach ($active_user as $ac) {
												if($ac['role_id'] == 1) { $rl = "Admin"; $abt = "success"; } else if($ac['role_id'] == 2) { $rl = "Employee";  $abt = "info"; } else { $rl = "Customer"; $abt = "warning"; } 
						
										$roletype = "<span class='btn btn-$abt btn-sm rlbtn m-widget17__progress-label' style='margin-left: 2px; '>".$rl."</span>";
												
												?>
													<div class="m-widget4__item">
														<div class="m-widget4__img m-widget4__img--pic">
															<img src="https://albarakatilaw.com//uploads/profile/defualt_profile.png" alt="">
														</div>
														<div class="m-widget4__info">
															<span class="m-widget4__title">
																<?php echo $ac['name']; ?>
																
															</span><br>
															<span class="m-widget4__sub">
															IP:<?php echo $ac['ip']; ?>
															</span>
														</div>
														<div class="m-widget4__progress">
															<div class="m-widget4__progress-wrapper">
																<?php echo $roletype ?>
																<span class="m-widget17__progress-label btn btn-success btn-sm rlbtn time-zime">Active Time: <b>
																<?php 
																$date1 =   date("Y-m-d G:i:s");
																  $date2 =$ac['last_login_time'];

															 


$date1 = strtotime($date1);  
$date2 = strtotime($date2);  

 $diff = abs($date1 - $date2);  
 

$years = floor($diff / (365*60*60*24));  
  
  

$months = floor(($diff - $years * 365*60*60*24) 
                               / (30*60*60*24));  

$days = floor(($diff - $years * 365*60*60*24 -  
             $months*30*60*60*24)/ (60*60*24)); 
  
  

$hours = floor(($diff - $years * 365*60*60*24  
       - $months*30*60*60*24 - $days*60*60*24) 
                                   / (60*60));  

$minutes = floor(($diff - $years * 365*60*60*24  
         - $months*30*60*60*24 - $days*60*60*24  
                          - $hours*60*60)/ 60);  
  

$seconds = floor(($diff - $years * 365*60*60*24  
         - $months*30*60*60*24 - $days*60*60*24 
                - $hours*60*60 - $minutes*60));  
				echo $hours."H ".$minutes."M ".$seconds."s" ?></b></span>
																 
															</div>
														</div>
														<div class="m-widget4__ext">
											<a href="<?php echo base_url("super_admin/dashboard/activity/".$ac['id']); ?>" class="m-btn m-btn--hover-brand m-btn--pill btn btn-sm btn-secondary">Activity</a>
														</div>
													</div> 
												<?php } } else { ?>
    											No One online...
												<?php } ?>
												</div>
											</div>
											<div class="tab-pane" id="m_widget4_tab2_content">
											</div>
											<div class="tab-pane" id="m_widget4_tab3_content">
											</div>
										</div>
											</div>
										 
											 
										</div>
                                        </div>
										<!--end:: Widgets/Stats2-1 -->
									</div>
							
									<div class="col-xl-4">
										<!--begin:: Widgets/Profit Share-->
                                        <div class="m-portlet lp-theme-card">
										 <div class="m-widget17">
                                            <div class="m-widget17__stats">

                                                <div class="row">
											<div class="tab-content">
											<div class="tab-pane active" id="m_widget4_tab1_content">
											<div class="col">
											 
								<canvas id="myChart" width="50" height="50"></canvas>
							  				</div><div class="col">
											 
								 	<canvas id="eservice" width="50" height="50"></canvas>
											</div>
												<div class="m-widget4 m-widget4--progress">
												<?php foreach ($today_active_users_re as $ac) { ?>
													  	<div class="m-widget12__item" style="border-bottom: 0.07rem dashed #ebedf2;    padding: 9px 0;">
														<div class="m-widget12__info">
															<span class="m-widget4__title">
															<?php echo $ac['name']; ?>
																
															</span><br>
															<span class="m-widget4__sub">
															IP:<?php echo $ac['ip']; ?>
															</span>
														</div>
														</div>
														   
												<?php } ?>
												</div>
											</div>
											<div class="tab-pane" id="m_widget4_tab2_content">
											</div>
											<div class="tab-pane" id="m_widget4_tab3_content">
											</div>
										</div>
                                                   
                                                </div>

                                            </div>
                                        </div>
                                                </div>
										</div>
										<!--end:: Widgets/Profit Share-->
									</div>
								</div>
							
								
								
							</div>
				 	<div class="row">
							<div class="col-lg-6">
				 				<div class="m-portlet m-portlet--tab lp-theme-card">
									<div class="m-portlet__head">
										<div class="m-portlet__head-caption mb-4">
											<div class="m-portlet__head-title">
												<span class="m-portlet__head-icon m--hide">
													<i class="la la-gear"></i>
												</span>
												<h3 class="m-portlet__head-text">
													Invoice Amount Graph
												</h3>
											</div>
										</div>
									</div>
									<div class="m-portlet__body">
										<div id="m_amcharts_7" style="">
										<?php //print_r($invoice_data); ?>	
											<canvas id="myChartB" width="400" height="400"></canvas>
										</div>
									</div>
								</div>
 
							</div>
							<div class="col-lg-6">
				 				<div class="m-portlet lp-theme-card m-portlet--tab">
									<div class="m-portlet__head mb-4">
										<div class="m-portlet__head-caption">
											<div class="m-portlet__head-title">
												<span class="m-portlet__head-icon m--hide">
													<i class="la la-gear"></i>
												</span>
												<h3 class="m-portlet__head-text">
													Number Of Invocie Graph
												</h3>
											</div>
										</div>
									</div>
									<div class="m-portlet__body">
										<div id="m_amcharts_7" style="">
									 
											<canvas id="myChartBB" width="400" height="400"></canvas>
										</div>
									</div>
								</div>
 
							</div>
						</div>
						<div class="m-portlet lp-theme-card">
							<div class="m-portlet__body  m-portlet__body--no-padding">
								<div class="row m-row--no-padding m-row--col-separator-xl">
								<?php // print_r($mission_data); ?>	
									<div class="col">
										<h3 style=" text-align: center; padding: 10px 0; ">Session Mission</h3>
										<canvas id="session" width="200" height="200"></canvas>
									</div>
									<div class="col"> 
										<h3 style=" text-align: center; padding: 10px 0; ">Writing Mission</h3>
										<canvas id="writing" width="200" height="200"></canvas>
									 </div> 
									<div class="col"> 
										<h3 style=" text-align: center; padding: 10px 0; ">Consultation Mission</h3>
										<canvas id="consultation" width="200" height="200"></canvas>
									</div> 
									<div class="col"> 
										<h3 style=" text-align: center; padding: 10px 0; ">Visiting Mission</h3>
										<canvas id="visiting" width="200" height="200"></canvas>
									</div> 
									<div class="col"> 
										<h3 style=" text-align: center; padding: 10px 0; ">General Mission</h3>
										<canvas id="general" width="200" height="200"></canvas>
									</div> 
									</div>
								</div>
							
								
								
							</div>
        
	</div>
    <!-- END: Left Aside -->
    <div class="m-grid__item m-grid__item--fluid m-wrapper"   style="display:none;">


        <!-- END: Subheader -->
        <div class="m-content">

            <div class="row">
			<?php if($this->session->userdata('role_id') == 1){ ?>
                <div class="col-xl-4">
                    <!--begin:: Widgets/Product Sales-->
                    <div class="m-portlet m-portlet--bordered-semi m-portlet--space m-portlet--full-height ">
                        <div class="m-portlet__body">
                            <div class="m-widget25">
								<a href="<?php  echo base_url('admin/employee/list_employee');?>">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <img src="<?php echo base_url('assets/images/'); ?>img/icons/V333.png" class="st_img" />
                                        </div>
                                        <div class="col-md-8" style="padding-top: 7%;">
                                            <span class="m-widget25__price m--font-brand"><?=$no_of_emp?></span><br>
                                            <span class="m-widget25__desc"><?php echo strtoupper($this->lang->line('Total_Employees'));?></span>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                    <!--end:: Widgets/Product Sales-->
                </div><?php } ?>
                <div class="col-xl-4">
                    <!--begin:: Widgets/Product Sales-->
                    <div class="m-portlet m-portlet--bordered-semi m-portlet--space m-portlet--full-height ">
                        <div class="m-portlet__body">
                            <div class="m-widget25">

                                <a href="<?php  echo base_url('admin/customer/list_customer');?>">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <img src="<?php echo base_url('assets/images/'); ?>img/icons/V333.png" class="st_img" />
                                        </div>
                                        <div class="col-md-8" style="padding-top: 7%;">
                                            <span class="m-widget25__price m--font-brand"><?=$no_of_cus?></span><br>
                                            <span class="m-widget25__desc"><?php echo $this->lang->line('TOTAL_CUSTOMERS');?></span>
                                        </div>
                                    </div>
                                </a>

                            </div>
                        </div>
                    </div>
                    <!--end:: Widgets/Product Sales-->
                </div>
                <div class="col-xl-4">
                    <!--begin:: Widgets/Product Sales-->
                    <div class="m-portlet m-portlet--bordered-semi m-portlet--space m-portlet--full-height ">
                        <div class="m-portlet__body">
                            <div class="m-widget25">

                                <a href="<?php  echo base_url('admin/c_case/list_case');?>">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <img src="<?php echo base_url('assets/images/'); ?>img/icons/E-111.png" class="st_img" />
                                        </div>
                                        <div class="col-md-8" style="padding-top: 7%;">
                                            <span class="m-widget25__price m--font-brand"><?=$no_of_case?></span><br>
                                            <span class="m-widget25__desc"><?php echo $this->lang->line('TOTAL_E_SERVICES');?></span>
                                        </div>
                                    </div>
                                </a>

                            </div>
                        </div>
                    </div>
                    <!--end:: Widgets/Product Sales-->
                </div>	
				
            </div>

            <div class="row" style="">

                <div class="col-xl-12 col-lg-12">

                    <!--Begin::Portlet-->
                    <div class="m-portlet  m-portlet--full-height  m-portlet--rounded">
                        <div class="m-portlet__head">
                            <div class="m-portlet__head-caption">
                                <div class="m-portlet__head-title">
                                    <h3 class="m-portlet__head-text">
                                        <?php echo $this->lang->line('Reminders_&_Alerts');?>
                                    </h3>
                                </div>
                            </div>

                        </div>

                        <div class="m-portlet__body">

                            <div class="m_datatable m-datatable m-datatable--default m-datatable--loaded" style="">

                                <div class="table-responsive">
                                <table class="table table-hover table-striped">
                                    <thead>
                                    <tr class="netTr">

                                        <th><?php echo $this->lang->line('PROJECT_PLANING');?></th>
                                      
                                        <th><?php echo $this->lang->line('Consultation');?></th>
                                        <th><?php echo $this->lang->line('Visiting');?></th>
                                        <th><?php echo $this->lang->line('WRITING');?></th>
                                        <th><?php echo $this->lang->line('Session');?></th>
                                        <th><?php echo $this->lang->line('GENERAL');?></th>
                                        <th></th>

                                    </tr>
                                    </thead>
                                    <tbody>
		<?php foreach ($all_report as $value) {?>
            <tr style="text-align: center;">
                <td><a href="<?php echo base_url("admin/project/list_project");?> "><?php echo $value[1]; ?></a></td>
                <td><a href="<?php echo base_url("admin/mission_consultation/list_mission");?> "><?php echo $value[3]; ?></a></td>
                <td><a href="<?php echo base_url("admin/mission_visiting/list_mission");?> "><?php echo $value[4]; ?></a></td>
                <td><a href="<?php echo base_url("admin/mission_writings/list_mission");?> "><?php echo $value[5]; ?></a></td>
                <td><a href="<?php echo base_url("admin/mission_session/list_mission");?> "><?php echo $value[6]; ?></a></td>
                <td><a href="<?php echo base_url("admin/mission_general/list_mission");?> "><?php echo $value[7]; ?></a></td>
				<td><b><?php echo $value[8]; ?></b></td>
                
            </tr>
        <?php } ?>
                                    </tbody>
                                </table>
								
								<table class="table table-hover table-striped">
                                    <thead>
                                    <tr class="netTr">
                                    
                                         <th><?php echo $this->lang->line('Consultation');?></th>
                                        <th><?php echo $this->lang->line('Visiting');?></th>
                                        <th><?php echo $this->lang->line('WRITING');?></th>
                                        <th><?php echo $this->lang->line('Session');?></th>
                                        <th><?php echo $this->lang->line('GENERAL');?></th>
                                             <th><?php echo $this->lang->line('ASSIGNMENT');?></th>
                                        <th></th>

                                    </tr>
                                    </thead>
                                    <tbody>
									<?php foreach ($all_report_re as $value) {?>
										<tr style="text-align: center;">
										        
           
												<td><a href="<?php echo base_url("admin/mission_consultation/list_mission");?> "><?php echo $value[3]; ?></a></td>
											<td><a href="<?php echo base_url("admin/mission_visiting/list_mission");?> "><?php echo $value[4]; ?></a></td>
											<td><a href="<?php echo base_url("admin/mission_writings/list_mission");?> "><?php echo $value[5]; ?></a></td>
											<td><a href="<?php echo base_url("admin/mission_session/list_mission");?> "><?php echo $value[6]; ?></a></td>
											<td><a href="<?php echo base_url("admin/mission_general/list_mission");?> "><?php echo $value[7]; ?></a></td>
											 <td><a href="<?php echo base_url("admin/assignment/list_assignment_case");?> "><?php echo $value[8]; ?></a></td>
											<td><b><?php echo $value[9]; ?></b></td>
											
										</tr>
									<?php } ?>
                                    </tbody>
                                </table>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

                <div class="col-xl-6 col-lg-12">

                    <!--Begin::Portlet-->
                    <div class="m-portlet  m-portlet--full-height  m-portlet--rounded">
                        <div class="m-portlet__head">
                            <div class="m-portlet__head-caption">
                                <div class="m-portlet__head-title">
                                    <h3 class="m-portlet__head-text">
                                        <?php echo $this->lang->line('Recent_E_Services');?>
                                    </h3>
                                </div>
                            </div>
                            <div class="m-portlet__head-tools">
                                <ul class="nav nav-pills nav-pills--brand m-nav-pills--align-right m-nav-pills--btn-pill m-nav-pills--btn-sm" role="tablist">
                                    <li class="nav-item m-tabs__item">
                                        <a href="<?php echo base_url('admin/c_case/list_case'); ?>" class="btn btn-primary btn-sm pull-right"><?php echo $this->lang->line('View_all');?></a>
                                    </li>
                                </ul>
                            </div>
                        </div>

                        <div class="m-portlet__body">

                            <div class="col-xl-12">
                                <!--begin:: Widgets/Activity-->
                                <div class="">
                                    <div class="">
                                        <div class="m-widget17">
                                            <div class="m-widget17__stats">

                                                <div class="row">
<?php $count=0; foreach ($recent_case as $recent_case) { $count++; ?>
                                                    <div class="col-md-4">
                                                        <a href="<?php echo base_url('admin/c_case/customer_case_list/'.$recent_case['customers_id']);?>">
                                                            <div class="m-widget17__items m-widget17__items-col1">
                                                                <div class="m-widget17__item">
                                                            <span class="m-widget17__icon"><?php if($recent_case['is_reject'] == 1){ ?>
								<span class="m-badge  m-badge--danger m-badge--wide"><?php echo $this->lang->line('Reject');?></span>
								<?php } else if(isset($recent_case['case_id'])) { ?>
								<span class="m-badge  m-badge--warning m-badge--wide"><?php echo $this->lang->line('Pending');?></span>
								<?php }else{ ?>
								<span class="m-badge  m-badge--success m-badge--wide"><?php echo $this->lang->line('Approve');?></span>
								<?php }?>
                                                            </span>
                                                                    <span class="m-widget17__subtitle"><?= getServiceName($recent_case['service_types']) ?></span>
                                                                    <span class="m-widget17__desc"><?php echo $this->lang->line('Number');?>: <?=$recent_case['case_number'];?></span>
                                                                </div>
                                                            </div>
                                                        </a>
                                                    </div>
<?php } ?>
                                                   
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!--end:: Widgets/Activity-->
                            </div>
                        </div>
                    </div>

                    <!--End::Portlet-->
                </div>

                <div class="col-xl-6 col-lg-12">
                    <!--Begin::Portlet-->
                    <div class="m-portlet m-portlet--full-height ">

                        <div class="m-portlet__head">
                            <div class="m-portlet__head-caption">
                                <div class="m-portlet__head-title">
                                    <h3 class="m-portlet__head-text">
                                        <?php echo $this->lang->line('New_Customers');?>
                                    </h3>
                                </div>
                            </div>
                            <div class="m-portlet__head-tools">
                                <ul class="nav nav-pills nav-pills--brand m-nav-pills--align-right m-nav-pills--btn-pill m-nav-pills--btn-sm" role="tablist">
                                    <li class="nav-item m-tabs__item">
                                        <a href="<?php echo base_url('admin/customer/list_customer'); ?>" class="btn btn-primary btn-sm pull-right"><?php echo $this->lang->line('View_all');?></a>
                                    </li>
                                </ul>
                            </div>
                        </div>

                        <div class="m-portlet__body">
						<?php  $count=0; foreach ($new_cus as $new_cus) { $count++; ?>
                            <div class="m-timeline-3" style="<?php if ($count % 2 == 0) echo "background: #f3f3f3;";  ?> padding: 8px 10px 1px 5px;">
                                <div class="m-timeline-3__items">
                                    <div class="m-timeline-3__item m-timeline-3__item--brand">
                                        <span class="m-timeline-3__item-time"><?=$new_cus['id'];?></span>
                                        <div class="m-timeline-3__item-desc">
                                            <div class="row">
                                                <div class="col-md-10">
                                                    <span class="m-timeline-3__item-text"><?=$new_cus['client_name'];?></span>
                                                </div>
                                                <div class="col-md-2" style="text-align: right;">
                                                    <a href="<?php echo base_url('admin/customer/view_customer/'.$new_cus['id']);?>" class="m-link m-link--metal m-timeline-3__item-link"><i class="fa fa-eye"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
	<?php } ?>
                       
                        </div>
                    </div>
                    <!--End::Portlet-->
                </div>
				 <div class="col-xl-6 col-lg-12">
                    <!--Begin::Portlet-->
                    <div class="m-portlet m-portlet--full-height ">

                        <div class="m-portlet__head">
                            <div class="m-portlet__head-caption">
                                <div class="m-portlet__head-title">
                                    <h3 class="m-portlet__head-text">
                                     <?php    //echo $this->lang->line('New_Customers');?> Functional works
                                    </h3>
                                </div>
                            </div>
                            <div class="m-portlet__head-tools">
                                 
                            </div>
                        </div>
		<style>
		 
.todotop{
	    background: green;
    color: #fff;
    padding: 0 5px;
    font-size: 10px;
    border-radius: 5px 5px 0px 0px;
}
		</style>
	<div class="m-portlet__body" style=" overflow: auto;    height: 300px; ">
		<span class="addtext"></span>
	<?php  $count=0; foreach ($todo_list as $tl) { $count++; ?>
	<div class="todotop" style="<?php if ($tl['admin_id']!=0) echo "background: #1f3959;font-weight: bold;";  ?>"><?php $timestamp = strtotime($tl['create_date']); echo  date("d M Y G:i",$timestamp); ?><span style=" float: right; "><?php if($tl['admin_id']!=0) { echo "By ".getEmployeeName($tl['admin_id']); } else {echo "By You"; } if($this->session->userdata('role_id') == 1){ echo " | Send to ".getEmployeeName($tl['user_id']);  } ?></span></div>
                            <div class="" style="background: #f3f3f3; padding: 8px 10px 1px 5px;">
							 
                                    <div class="m-timeline-3__item m-timeline-3__item--brand">
										<?php echo $tl['note']; ?>
                                    </div>
                               
                            </div>
							<br>
	<?php } ?>
					
                       
                        </div>
							<br>
					<br>
					<br>
                    </div>
				
					 <div class="m-portlet__foot m-portlet__no-border m-portlet__foot--fit" style=" background: #f3f3f3; padding: 10px; margin-top: -85px; border-radius: 0px 0px 20px 20px; ">
                        <div class="m-form__actions m-form__actions--solid">
                            <div class="row">
                                <div class="col-lg-9">
								 <?php if($this->session->userdata('role_id') == 1){ ?> <select class="form-control" style=" margin-bottom: 5px; " id="employee_id" name="employee_id"><option value="">Select employee </option><?php  foreach ($emp_name as $employee) { ?><option value="<?php echo $employee["id"]?>"><?php echo $employee["name"]?></option><?php } ?></select>
								 <span class="err" style="color:red"></span>
								<?php }    ?>  	 
								<div class="col-lg-3">
                                </div>
                                </div>
								
                                <div class="col-lg-9">
                                
								<?php  echo form_input(['id'=>'addtodotext','placeholder'=>'Note','type'=>'text','class'=>'form-control']);  ?>  
								<span class="errn" style="color:red"></span>								
                                </div>
								 <div class="col-lg-3">
								 <?php echo form_submit(['id'=>'addtodo','value'=>$this->lang->line('Submit'),'class'=>'btn btn-primary btn-lg']);  ?>  	
                                </div>
                            
                            </div>
                        </div>
                    </div>
                    <!--End::Portlet-->
                </div>
                <div class="col-xl-6 col-lg-12">
                    <!--Begin::Portlet-->
                    <div class="m-portlet m-portlet--full-height ">

                        <div class="m-portlet__head">
                            <div class="m-portlet__head-caption">
                                <div class="m-portlet__head-title">
                                    <h3 class="m-portlet__head-text">
                                     <?php    //echo $this->lang->line('New_Customers');?> Notification
                                    </h3>
                                </div>
                            </div>
                            <div class="m-portlet__head-tools">
                                 
                            </div>
                        </div>
		<style>
		.empnotificion span.m-timeline-3__item-text {
    font-size: 15px !important;
}
		</style>
	
                        <div class="m-portlet__body empnotificion">
						<?php    $count=0; foreach ($employee_notification as $en) { $count++; ?>
                            <div class="m-timeline-3" style="<?php if ($count % 2 == 0) echo "background: #f3f3f3;";  ?> padding: 8px 10px 1px 5px;">
                                <div class="m-timeline-3__items">
                                    <div class="m-timeline-3__item m-timeline-3__item--brand">
                                        <span class="m-timeline-3__item-time"><?php $timestamp = strtotime($en['create_date']); echo  date("G:i",$timestamp);?></span>
                                        <div class="m-timeline-3__item-desc">
                                            <div class="row">
											<?php 
													$type = $en['type'];
													if($type == "session"){
														$mt = "You have new message in session mission";
														$link = "mission_session/find_mission/".$en['app_id'];
													}
													if($type == "consultati"){
														$mt = "You have new message in consultation mission";
														$link = "mission_consultation/find_mission/".$en['app_id'];
													}
													if($type == "general"){
														$mt = "You have new message in general mission";
														$link = "mission_general/find_mission/".$en['app_id'];
													}
													if($type == "visiting"){
														$mt = "You have new message in visiting mission";
														$link = "mission_visiting/find_mission/".$en['app_id'];
													}
													if($type == "writing"){
														$mt = "You have new message in writing mission";
														$link = "mission_writings";
													}
													if($type == "fine"){
														$mt = "You have new fine";
														$link = "hr/list_hr_fine";
													}
													if($type == "hre"){
														$mt = "Your HR service has been ".$en['note'];
														$link = "hr/list_hr_eservice";
													}
													if($type == "project"){
														$mt = "You have new message in project";
														$link = "project/find_project/".$en['app_id'];
													}
													?>
													
                                                <div class="col-md-10">
                                                    <span class="m-timeline-3__item-text" style="<?php if ($en['view'] == 0){ echo "font-weight:bold;"; }?> padding: 8px 10px 1px 5px;"><?php echo $mt ?></span>
                                                </div>
                                                <div class="col-md-2" style="text-align: right;">
                                                    <a href="<?php echo base_url("admin/$link");?>" class="m-link m-link--metal m-timeline-3__item-link" data-read="<?php echo $en['id']; ?>" id="readnotificaion"><i class="fa fa-eye"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
	<?php } ?>
                       
                        </div>
                    </div>
                    <!--End::Portlet-->
                </div>
               
            </div>


            <!--End::Section-->
        </div>
    </div>



<?php

include('footer.php');
?>
<script>

var ctx1 = document.getElementById('session').getContext('2d');
 
data = {
    datasets: [{
        data: [<?php echo $mission_data['data']['mission_total']['session'];?>,<?php echo $mission_data['data']['mission_close']['session'];?>],
			 backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
            ],
    }],
    labels: [
        'Total Mission',
        'Close Mission',
       
    ],
	options: {
    responsive: true,
    maintainAspectRatio: false,
    scales: {
        yAxes: [{
            ticks: {
                beginAtZero:true
            }
        }]
    }
}

};

var myPieChart1 = new Chart(ctx1, {
    type: 'doughnut',
    data: data

});

var ctx1 = document.getElementById('writing').getContext('2d');
 
data = {
    datasets: [{
        data: [<?php echo $mission_data['data']['mission_total']['writing'];?>,<?php echo $mission_data['data']['mission_close']['writing'];?>],
			 backgroundColor: [
                'rgba(188, 255, 99, 0.4)',
                'rgba(255, 153, 0, 0.4)',
            ],
    }],
    labels: [
        'Total Mission',
        'Close Mission',
       
    ],
	options: {
    responsive: true,
    maintainAspectRatio: false,
    scales: {
        yAxes: [{
            ticks: {
                beginAtZero:true
            }
        }]
    }
}

};

var myPieChart1 = new Chart(ctx1, {
    type: 'doughnut',
    data: data

});

var ctx1 = document.getElementById('general').getContext('2d');
 
data = {
    datasets: [{
        data: [<?php echo $mission_data['data']['mission_total']['general'];?>,<?php echo $mission_data['data']['mission_close']['general'];?>],
			 backgroundColor: [
                'rgba(23, 20, 222, 0.4)',
                'rgba(222, 20, 123, 0.4)',
            ],
    }],
    labels: [
        'Total Mission',
        'Close Mission',
       
    ],
	options: {
    responsive: true,
    maintainAspectRatio: false,
    scales: {
        yAxes: [{
            ticks: {
                beginAtZero:true
            }
        }]
    }
}

};

var myPieChart1 = new Chart(ctx1, {
    type: 'doughnut',
    data: data

});

var myPieChart1 = new Chart(ctx1, {
    type: 'doughnut',
    data: data

});

var ctx1 = document.getElementById('consultation').getContext('2d');
 
data = {
    datasets: [{
        data: [<?php echo $mission_data['data']['mission_total']['consultation'];?>,<?php echo $mission_data['data']['mission_close']['consultation'];?>],
			 backgroundColor: [
                'rgba(11, 86, 79, 0.4)',
                'rgba(71, 86, 11, 0.4)',
            ],
    }],
    labels: [
        'Total Mission',
        'Close Mission',
       
    ],
	options: {
    responsive: true,
    maintainAspectRatio: false,
    scales: {
        yAxes: [{
            ticks: {
                beginAtZero:true
            }
        }]
    }
}

};

var myPieChart1 = new Chart(ctx1, {
    type: 'doughnut',
    data: data

});
var ctx1 = document.getElementById('visiting').getContext('2d');
 
data = {
    datasets: [{
        data: [<?php echo $mission_data['data']['mission_total']['visiting'];?>,<?php echo $mission_data['data']['mission_close']['visiting'];?>],
			 backgroundColor: [
                'rgba(123, 11, 11, 0.4)',
                'rgba(21, 212, 255, 0.4)',
            ],
    }],
    labels: [
        'Total Mission',
        'Close Mission',
       
    ],
	options: {
    responsive: true,
    maintainAspectRatio: false,
    scales: {
        yAxes: [{
            ticks: {
                beginAtZero:true
            }
        }]
    }
}

};

var myPieChart1 = new Chart(ctx1, {
    type: 'doughnut',
    data: data

});

var ctx = document.getElementById("myChartBB").getContext("2d");

var data = {
  labels: ["Number Of Invocie"],
  datasets: [
 
  {
	backgroundColor: "#1e6760",
    label: "Paid",
	data: [<?php echo $invoice_data['data']['count']['paid']?>]
  },
  {
	backgroundColor: "#a77b19",
    label: "UnPaid",
	data: [<?php echo $invoice_data['data']['count']['unpaid']?>]
  },
  {
	backgroundColor: "#233e4a",
    label: "Hold",
	data: [<?php echo $invoice_data['data']['count']['hold']?>]
  },
  {
	backgroundColor: "#1b5435",
    label: "Process",
	data: [<?php echo $invoice_data['data']['count']['hold']?>]
  },
  
  ]
};

var myBarChart = new Chart(ctx, {
  type: 'bar',
  data: data,
  options: {
    barValueSpacing: 20,
    scales: {
      yAxes: [{
        ticks: {
          min: 0,
        }
      }]
    }
  }
});

 new Chart(document.getElementById("myChartB"),{"type":"line",
 
 "data":{
	 "labels":["Paid","UnPaid","Hold","Process"],
	 
	 "datasets":[{
		 "label":"Amount",
		 "data":[<?php echo $invoice_data['data']['amount']['paid_amount']?>,<?php echo $invoice_data['data']['amount']['paid_amount']?>,<?php echo $invoice_data['data']['amount']['unpaid_amount']?>,<?php echo $invoice_data['data']['amount']['process_amount']?>],
		 "fill":true,
		 "backgroundColor":["rgba(255, 99, 132, 0.2)","rgba(255, 159, 64, 0.2)","rgba(255, 205, 86, 0.2)","rgba(75, 192, 192, 0.2)","rgba(54, 162, 235, 0.2)","rgba(153, 102, 255, 0.2)","rgba(201, 203, 207, 0.2)"],
		 "borderColor":["rgb(255, 99, 132)","rgb(255, 159, 64)","rgb(255, 205, 86)","rgb(75, 192, 192)","rgb(54, 162, 235)","rgb(153, 102, 255)","rgb(201, 203, 207)"],"borderWidth":1}]},
		 "options":{"scales":{"yAxes":[{"ticks":{"beginAtZero":true}}]}}});
		 
 new Chart(document.getElementById("eservice"),{"type":"line",
 
 "data":{
	 "labels":["Reject","Total","Pending"],
 
	 "datasets":[{
		 "label":"E-Service Status",
		 "data":[<?php echo $e_service_data['data']['reject']?>,<?php echo $e_service_data['data']['total']?>,<?php echo $e_service_data['data']['padding']?>],
		 "fill":true,
		 "backgroundColor":["rgba(11, 220, 143, 0.41)","rgba(11, 220, 143, 0.41)","rgba(11, 220, 143, 0.41)","rgba(11, 220, 143, 0.41)","rgba(11, 220, 143, 0.41)","rgba(11, 220, 143, 0.41)","rgba(11, 220, 143, 0.41)"],
		 "borderColor":["rgb(255, 99, 132)","rgb(255, 159, 64)","rgb(255, 205, 86)","rgb(75, 192, 192)","rgb(54, 162, 235)","rgb(153, 102, 255)","rgb(201, 203, 207)"],"borderWidth":1}]},
		 "options":{"scales":{"yAxes":[{"ticks":{"beginAtZero":true}}]}}});

var ctx = document.getElementById('myChart').getContext('2d');
ctx.height = 40;
data = {
    datasets: [{
        data: [<?php echo $count_today_active_users; ?> ,<?php echo $count_active_user; ?>],
			 backgroundColor: [
                '#00c5dc',
                '#ffb822',
            ],
    }],
labels: [
        'Today Active',
        'Currunt Active',
   
    ],
    // These labels appear in the legend and in the tooltips when hovering different arcs
    
	options: {
    responsive: true,
    maintainAspectRatio: false,
    scales: {
        yAxes: [{
            ticks: {
                beginAtZero:true
            }
        }]
    }
}

};
var myPieChart = new Chart(ctx, {
    type: 'pie',
    data: data,
		
		

}); 

window.setInterval(function(){
var url="<?= base_url('super_admin/dashboard/dashboard_activity_ajax'); ?>"; 
 $.ajax({
    type:'ajax',
    method:'post',
    url:url,
    success:function(data){
   
         $('#activitidata').html(data);

      },
  });
}, 5000);
</script>