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
																<span class="m-widget17__progress-label btn btn-success btn-sm rlbtn" style=" background: #00c5dc; ">Active Time: <b>
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
										 