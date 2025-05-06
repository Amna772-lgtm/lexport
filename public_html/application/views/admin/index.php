<?php
include('header.php');

?>

    <style>
        .m-widget25 .m-widget25__price {
            color: #CAA459 !important;
        }
        .st_img{
            width: 100%;
            background:rgb(255, 255, 255);
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
.body_rtl input#addtodo {
    padding: 10px;
}
.body_rtl .m-portlet__head-tools {
margin-left: 80px;
    margin-right: 0;
}
.body_rtl .m-portlet .m-portlet__head .m-portlet__head-caption .m-portlet__head-title .m-portlet__head-text {
    font-size: 20px;
}

.span-img{
    background: #fff;
    padding: 6px;
    border-radius: 50%;
    align-items: center;
}

.body_ltr ul.reminders-list li a:after {
    margin: 0 10px 0 10px;
}



    </style>


    <!-- END: Left Aside -->
    <div class="m-grid__item m-grid__item--fluid m-wrapper">
    <div style="position:absolute;">
        <img class="custom-search-icon" src="../../../assets/images/img/search-icon.svg" alt="Search">
        <input type="text" id="userSearch" class="form-control" placeholder="Search Client, E-Services........">
    </div>


        <!-- END: Subheader -->
        <div class="m-content">

            <div class="row">
            <div class="col-12 col-xl-6 col-2xl-5">
                <!-- Row for the two cards -->
                <div class="row">
                    <!-- First Card -->
                    <div class="col col-xs-6">
                        <div class="m-portlet m-portlet--bordered-semi m-portlet--space m-portlet--full-height cards lp-custom-cards">
                            <div class="m-portlet__body">
                                <div class="m-widget25">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="btn-icon-group">
                                                <span class="span-img d-flex justify-content-center"><img src="<?php echo base_url('assets/images');?>/img/user-icon.svg"/></span>
                                                <a class="create-buttons" href="<?=base_url('admin/c_case/padding_case');?>"></i> <?php echo $this->lang->line('Pending_E_Service');?></a>
                                            </div>
                                        </div>    
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Second Card -->
                    <div class="col col-xs-6" >
                        <div class="m-portlet m-portlet--bordered-semi m-portlet--space m-portlet--full-height cards lp-custom-cards" style="display:none;">
                            <div class="m-portlet__body">
                                <div class="m-widget25">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="btn-icon-group">
                                                <span class="span-img d-flex justify-content-center"><img src="<?php echo base_url('assets/images');?>/img/assignment_tasks.svg"/></span>
                                                <a class="create-buttons" href="<?=base_url('admin/admin/task_type');?>"> <?php echo $this->lang->line('Create_Task');?></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
                <div class="col-12 col-xl-6 col-2xl-7">
                <div class="lp-counter-cards">
                    <?php if($this->session->userdata('role_id') == 1){ ?>
                            <!--begin:: Widgets/Product Sales-->
                            <div class="m-portlet m-portlet--bordered-semi m-portlet--space m-portlet--full-height ">
                                <div class="m-portlet__body">
                                    <div class="m-widget25">
                                        <a href="<?php  echo base_url('admin/employee/list_employee');?>">
                                            <div class="row">
                                                <!-- <div class="col-md-4 col-sm-3">
                                                    <img src="<?php //echo base_url('assets/images/'); ?>img/icons/V333.png" class="st_img" />
                                                </div> -->
                                                <div class="col">
                                                    <span class="m-widget25__desc"><?php echo strtoupper($this->lang->line('Total_Employees'));?></span>
                                                    <span class="m-widget25__price m--font-brand count-no"><?=$no_of_emp?></span>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <!--end:: Widgets/Product Sales-->
                        <?php } ?>
                    <!--begin:: Widgets/Product Sales-->
                    <div class="m-portlet m-portlet--bordered-semi m-portlet--space m-portlet--full-height ">
                        <div class="m-portlet__body">
                            <div class="m-widget25">

                                <a href="<?php  echo base_url('admin/customer/list_customer');?>">
                                    <div class="row">
                                        <!-- <div class="col-md-4 col-sm-3">
                                            <img src="<?php //echo base_url('assets/images/'); ?>img/icons/V333.png" class="st_img" />
                                        </div> -->
                                        <div class="col">
                                            
                                            <span class="m-widget25__desc"><?php echo $this->lang->line('TOTAL_CUSTOMERS');?></span>
                                            <span class="m-widget25__price m--font-brand count-no"><?=$no_of_cus?></span>
                                        </div>
                                    </div>
                                </a>

                            </div>
                        </div>
                    </div>
                    <!--end:: Widgets/Product Sales-->
                    <!--begin:: Widgets/Product Sales-->
                    <div class="m-portlet m-portlet--bordered-semi m-portlet--space m-portlet--full-height ">
                        <div class="m-portlet__body">
                            <div class="m-widget25">

                                <a href="<?php  echo base_url('admin/c_case/list_case');?>">
                                    <div class="row">
                                        <!-- <div class="col-md-4 col-sm-3">
                                            <img src="<?php //echo base_url('assets/images/'); ?>img/icons/E-111.png" class="st_img" />
                                        </div> -->
                                        <div class="col">
                                            <span class="m-widget25__desc"><?php echo $this->lang->line('TOTAL_E_SERVICES');?></span>
                                            <span class="m-widget25__price m--font-brand count-no"><?=$no_of_case?></span>
                                        </div>
                                    </div>
                                </a>

                            </div>
                        </div>
                    </div>
                    </div>
                    <!--end:: Widgets/Product Sales-->
                </div>
				
            </div>

            <div class="row">
            <div class="col-12 col-xl-8">

<!--Begin::Portlet-->
<div class="m-portlet m-portlet--rounded lp-theme-card">
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
                    <a href="<?php echo base_url('admin/c_case/list_case'); ?>" class="btn btn-primary btn-sm pull-right"><?php echo $this->lang->line('View');?></a>
                </li>
            </ul>
        </div>
    </div>

    <div class="m-portlet__body">

    <div class="row">
                                <div class="col responsive-table-container">
                                <table class="lp-theme-table">
                                    <thead>
                                        <tr>
                                            <th><?php echo $this->lang->line('Serial_No');?></th>
                                            <th><?php echo $this->lang->line('E_Service_Name');?></th>
                                            <th><?php echo $this->lang->line('Contract_No');?></th>
                                            <th><?php echo $this->lang->line('Client_File_No');?></th>
                                            <th><?php echo $this->lang->line('ACTION');?></th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                    <?php $count=0; foreach ($recent_case as $recent_case) { $count++; ?>
                                        
                                        <tr style="text-align:left;">
                                            <td><?= sprintf("#%03d", $count); ?></td> <!-- Serial Number Column -->
                                            <td>
                                            <a><span class="m-widget17__subtitle"><?= getServiceName($recent_case['service_types']) ?></span></a></td>
                                            <td><span class="m-widget17__desc" style="color: #868da6"><?=$recent_case['contract_number'];?></span></td>
                                            <td><span class="m-widget17__desc" style="color: #868da6"><?=$recent_case['case_number'];?></span></td>
                                            <td style="text-align:left;">
                                            <a href="<?php echo base_url('admin/c_case/view_case/'.$recent_case['id']);?>"><span class="m-widget17__action" style="color: #1866a9; text-decoration: underline;"><?php echo $this->lang->line('View_Details');?></span></a></td>
                                                
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
                <div class="col-12 col-xl-4">

                    <!--Begin::Portlet-->
                    <div class="m-portlet  m-portlet--full-height  m-portlet--rounded lp-theme-card white-bg">
                        <div class="m-portlet__head">
                        <div class="m-portlet__head-caption" style="display: flex; justify-content: space-between; align-items: center;">
                            <div class="m-portlet__head-title">
                                <h3 class="m-portlet__head-text">
                                    <?php echo $this->lang->line('Reminders');?>
                                
                                </h3>
                            </div>
                            <div>
                                <img src="../assets/images/img/dots.svg" alt="Options" height="28px">
                            </div>
                        </div>

                        </div>

                        <div class="m-portlet__body">

                        <ul class="reminders-list">
                        <?php foreach ($all_report as $value) {?>
                            <li><?php echo $this->lang->line('PROJECT_PLANING');?> <a href="<?php echo base_url("admin/project/list_project");?> "> <img src="../assets/images/img/copy-icon.svg" alt=""> <?php echo $value[1]; ?></a> </li>
                            <li><?php echo $this->lang->line('Consultation');?> <a href="<?php echo base_url("admin/mission_consultation/list_mission");?> "><img src="../assets/images/img/copy-icon.svg" alt=""> <?php echo $value[3]; ?></a> </li>
                            <li><?php echo $this->lang->line('Meeting');?> <a href="<?php echo base_url("admin/mission_visiting/list_mission");?> "><img src="../assets/images/img/copy-icon.svg" alt=""> <?php echo $value[4]; ?></a> </li>
                            <li><?php echo $this->lang->line('WRITING');?> <a href="<?php echo base_url("admin/mission_writings/list_mission");?> "><img src="../assets/images/img/copy-icon.svg" alt=""> <?php echo $value[5]; ?></a> </li>
                            <li><?php echo $this->lang->line('Session');?> <a href="<?php echo base_url("admin/mission_session/list_mission");?> "><img src="../assets/images/img/copy-icon.svg" alt=""> <?php echo $value[6]; ?></a> </li>
                            <li><?php echo $this->lang->line('GENERAL');?> <a href="<?php echo base_url("admin/mission_general/list_mission");?> "><img src="../assets/images/img/copy-icon.svg" alt=""> <?php echo $value[7]; ?></a> </li>
                            <li><b><?php echo $value[8]; ?></b></li>
                            <?php } ?>
                        </ul>

                       

                        
                        </div>
                    </div>

                </div>

                

                <div class="col-xl-8">
                    <!--Begin::Portlet-->
                    <div class="m-portlet m-portlet--rounded lp-theme-card">

                        <div class="m-portlet__head">
                            <div class="m-portlet__head-caption">
                                <div class="m-portlet__head-title">
                                    <h3 class="m-portlet__head-text">
                                        <?php echo $this->lang->line('Customer_List');?>
                                    </h3>
                                </div>
                            </div>
                            <div class="m-portlet__head-tools">
                                <ul class="nav nav-pills nav-pills--brand m-nav-pills--align-right m-nav-pills--btn-pill m-nav-pills--btn-sm" role="tablist">
                                    <li class="nav-item m-tabs__item">
                                        <a href="<?php echo base_url('admin/customer/list_customer'); ?>" class="btn btn-primary btn-sm pull-right"><?php echo $this->lang->line('View');?></a>
                                    </li>
                                </ul>
                            </div>
                        </div>

                        <div class="m-portlet__body responsive-table-container">

                        <table class="lp-theme-table">
                                    <thead>
                                        <tr>
                                            <th><?php echo $this->lang->line('Client_Name');?></th>
                                            <th><?php echo $this->lang->line('E_Service_Name');?></th>
                                            <th class="client-id"><?php echo $this->lang->line('E_Service_No');?></th>
                                            <th><?php echo $this->lang->line('TOTAL_E_SERVICES');?></th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        
                                    <?php  $count=0; foreach ($list_customer as $list_customer) { $count++; 
                                    // Find first contract number for this customer from $case_list
                                    $first_eservice_no = '';
                                    foreach ($case_list as $case) {
                                        if ($case['customers_id'] == $list_customer['customers_id']) {
                                            $first_eservice_no = $case['case_number'];
                                            break;
                                        }
                                    }
                                        ?>
                                        
                                        <tr>
                                            <td><?=$list_customer['client_name'];?></td>
                                            <td><?php echo getCustomerCaseServices($list_customer['customers_id']); ?></td>
                                            <td><?= $first_eservice_no ?></td>
                                            <!-- <td><a href="<?php echo base_url('admin/customer/view_customer/'.$new_cus['id']);?>" class="m-link m-link--metal m-timeline-3__item-link"><i class="fa fa-eye"></i></a></td> -->
                                            <?php 
                                        	$case=$this->db->select('*')->where('customers_id',$list_customer['customers_id'])->get('c_case')->row_array();
                                            $this->db->where('customers_id', $list_customer['customers_id']);
                                            $num_rows = $this->db->count_all_results('c_case'); 
                                            $this->db->where(['customers_id'=>$list_customer['customers_id'],'is_reject'=>1]);
                                            $num_rows1 = $this->db->count_all_results('case_temp'); 
                                            //echo $num_rows;
                                            ?>
                                            <td style="text-align:left;">
    <div style="display: flex; justify-content: space-between; align-items: center;">
        <span><?php echo $num_rows - $num_rows1; ?></span>
        <a href="<?= base_url("admin/customer/view_customer/{$list_customer['id']}"); ?>">
            <img class="icon-dir-ltr" src="<?= base_url('assets/images'); ?>/img/right.svg" style="height: 21px;" alt="View">
            <img class="icon-dir-rtl" src="<?= base_url('assets/images'); ?>/img/left.svg" style="height: 21px;" alt="View">
        </a>
    </div>
</td>

<style>
    .icon-dir-rtl {
        display: none;
    }

    html[dir="rtl"] .icon-dir-ltr {
        display: none;
    }

    html[dir="rtl"] .icon-dir-rtl {
        display: inline;
    }
</style>




                                        </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                        </div>
                    </div>
                    <!--End::Portlet-->
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
	
                </div>
                   <div class="col-xl-6 col-lg-12" style="display:none">
                    <!--Begin::Portlet-->
                    <div class="m-portlet m-portlet--auto-height ">

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
	
                        <div class="m-portlet__body empnotificion" style=" height: 400px; overflow: auto; ">
                         <div class="m-scrollable" data-scrollable="true" data-height="350" data-mobile-height="300" style="width: 100%;padding: 15px;">

                                <!--Begin::Timeline 2 -->
                                <div class="m-timeline-2" id="m-timeline-2">
                                    <div class="m-timeline-2__items  m--padding-top-25 m--padding-bottom-30">
									<?php
									
									if($this->session->userdata('role_id') == 1){
									    
									$this->db->select('*');
									$files = $this->db->order_by("id", "desc")->limit(300)->get('notification')->result_array();
									
									} else {
								    $cid = $this->session->userdata('admin_id');
									$this->db->select('*')->where("(user_id='$cid')", NULL, FALSE);
									$files = $this->db->order_by("id", "desc")->get('notification')->result_array();
									}
									foreach ($files as $n) { ?>
									<?php if($n['status_type'] == 'logout'){ ?>
                                        <div id="readnotificaion"  class="m-timeline-2__item <?php if($n['read_status'] == 0) echo "notireaded"; ?>" data-read="<?php echo $n['id'];?>">
                                            <span class="m-timeline-2__item-time"><?php $timestamp = strtotime($n['create_date']); echo  date("G:i",$timestamp);?></span>
                                            <div class="m-timeline-2__item-cricle">
                                                <i class="fa fa-genderless m--font-danger"></i>
                                            </div>
                                            <div class="m-timeline-2__item-text  m--padding-top-5">
                                                <?php echo $this->lang->line('Logged_out_successfully');?>
                                            </div>
                                        </div>
									<?php } ?>
									<?php if($n['status_type'] == 'login'){ ?>
									<?php $dinfo = json_decode($n['device_log']);  ?>
                                        <div id="readnotificaion"  class="m-timeline-2__item <?php if($n['read_status'] == 0) echo "notireaded"; ?>" data-read="<?php echo $n['id'];?>">
                                            <span class="m-timeline-2__item-time"><?php $timestamp = strtotime($n['create_date']); echo  date("G:i",$timestamp);?></span>
                                            <div class="m-timeline-2__item-cricle">
                                                <i class="fa fa-genderless m--font-danger"></i>
                                            </div>
                                            <div class="m-timeline-2__item-text  m--padding-top-5">
                                                <?php echo $this->lang->line('Logged_in_from');?> <?php echo $dinfo->name; echo " "; echo $dinfo->platform; ?> <br> <?php echo $this->lang->line('from_IP');?>: <?php echo $n['login_ip'];?>
                                            </div>
                                        </div>
									<?php } ?>
									
									<?php if($n['status_type'] == 'register'){ ?>
									<?php $dinfo = json_decode($n['device_log']);  ?>
                                        <div id="readnotificaion"  class="m-timeline-2__item  <?php if($n['read_status'] == 0) echo "notireaded"; ?>" data-read="<?php echo $n['id'];?>">
                                            <span class="m-timeline-2__item-time"><?php $timestamp = strtotime($n['create_date']); echo  date("G:i",$timestamp);?></span>
                                            <div class="m-timeline-2__item-cricle">
                                                <i class="fa fa-genderless m--font-danger"></i>
                                            </div>
                                            <div class="m-timeline-2__item-text  m--padding-top-5">
Registration successfully  <?php echo $dinfo->name; echo " "; echo $dinfo->platform; ?>  A<?php echo $this->lang->line('from_IP');?>: <?php echo $n['login_ip'];?>
                                            </div>
                                        </div>
									<?php } ?>
									<?php if($n['notification_type'] == 'msg'){ ?>
                                        <div id="readnotificaion"  class="m-timeline-2__item  <?php if($n['read_status'] == 0) echo "notireaded"; ?>" data-read="<?php echo $n['id'];?>">
                                            <span class="m-timeline-2__item-time"><?php $timestamp = strtotime($n['create_date']); echo  date("G:i",$timestamp);?></span>
                                            <div class="m-timeline-2__item-cricle">
                                                <i class="fa fa-genderless m--font-danger"></i>
                                            </div>
                                            <div class="m-timeline-2__item-text  m--padding-top-5">
                                                <?php echo $this->lang->line('You_have_New_message');?> 
                                            </div>
                                        </div>
			 
									<?php } ?>
									<?php if($n['notification_type'] == 'invoice'){ ?>
                                        <div class="m-timeline-2__item  ">
                                            <span class="m-timeline-2__item-time"><?php $timestamp = strtotime($n['create_date']); echo  date("G:i",$timestamp);?></span>
                                            <div class="m-timeline-2__item-cricle">
                                                <i class="fa fa-genderless m--font-brand"></i>
                                            </div>
                                            <div class="m-timeline-2__item-text m--padding-top-5">
											<a href="<?= base_url("/alert/") ?>" class="<?php if($n['read_status'] == 0) echo "notireaded"; ?>" id="readnotificaion" class="<?php if($n['read_status'] == 0) echo "notireaded"; ?>"  data-read="<?php echo $n['id'];?>">
                                                <?php echo $this->lang->line('Your_invoice_for_case');?> (#<?php echo getCaseNumber($n['case_id']) ;?>)  <?php echo $this->lang->line('has_been_created');?>
												</a>
                                            </div>
                                        </div>
										<?php } ?>
										<?php if($n['notification_type'] == 'case'){ ?>
										<?php if($n['status_type'] == 'add'){ ?>
                                        <div class="m-timeline-2__item  ">
                                            <span class="m-timeline-2__item-time"><?php $timestamp = strtotime($n['create_date']); echo  date("G:i",$timestamp);?></span>
                                            <div class="m-timeline-2__item-cricle">
                                                <i class="fa fa-genderless m--font-warning"></i>
                                            </div>
                                            <div class="m-timeline-2__item-text m--padding-top-5">
											<a href="<?php echo base_url("/front/view_case/{$n['case_id']}") ?>"  class="<?php if($n['read_status'] == 0) echo "notireaded"; ?>"  id="readnotificaion" class="<?php if($n['read_status'] == 0) echo "notireaded"; ?>"  data-read="<?php echo $n['id'];?>"><span  >#<?php echo getCaseNumber($n['case_id']);?> <?php echo $this->lang->line('Your_e_service_has_been_added');?></span></a>
                                            </div>
                                        </div>
										 <?php } ?>
										<?php if($n['status_type'] == 'reject'){ ?>
                                        <div class="m-timeline-2__item  ">
                                            <span class="m-timeline-2__item-time"><?php $timestamp = strtotime($n['create_date']); echo  date("G:i",$timestamp);?></span>
                                            <div class="m-timeline-2__item-cricle">
                                                <i class="fa fa-genderless m--font-warning"></i>
                                            </div>
                                            <div class="m-timeline-2__item-text m--padding-top-5">
										<a href="<?= base_url("/front/view_case/{$n['case_id']}") ?>"  class="<?php if($n['read_status'] == 0) echo "notireaded"; ?>"  id="readnotificaion" class="<?php if($n['read_status'] == 0) echo "notireaded"; ?>"  data-read="<?php echo $n['id'];?>"><span >#<?php echo getCaseNumber($n['case_id']);?> <?php echo $this->lang->line('Your_e_service_has_been_rejected');?></span></a>
                                            </div>
                                        </div>
										 <?php } ?>
										<?php if($n['status_type'] == 'approve'){ ?>
                                        <div class="m-timeline-2__item  ">
                                            <span class="m-timeline-2__item-time"><?php $timestamp = strtotime($n['create_date']); echo  date("G:i",$timestamp);?></span>
                                            <div class="m-timeline-2__item-cricle">
                                                <i class="fa fa-genderless m--font-brand"></i>
                                            </div>
                                            <div class="m-timeline-2__item-text m--padding-top-5">
											<a href="<?= base_url("/front/view_case/{$n['case_id']}") ?>" id="readnotificaion" class="<?php if($n['read_status'] == 0) echo "notireaded"; ?>"  data-read="<?php echo $n['id'];?>"><span style="color:green">#<?php echo getCaseNumber($n['case_id']);?> <?php echo $this->lang->line('Your_e_service_has_been_approved');?></span></a>
                                            </div>
                                        </div>
										<?php } ?>
 
										 <?php } ?>
										<?php if($n['notification_type'] == 'session_appoinment'){ ?>
										<?php if($n['status_type'] == 'add'){ ?>
										  <div class="m-timeline-2__item  ">
                                            <span class="m-timeline-2__item-time"><?php $timestamp = strtotime($n['create_date']); echo  date("G:i",$timestamp);?></span>
                                            <div class="m-timeline-2__item-cricle">
                                                <i class="fa fa-genderless m--font-warning"></i>
                                            </div>
                                            <div class="m-timeline-2__item-text m--padding-top-5">
											<a href="<?= base_url("/front/view_appoinment/{$n['appointment_id']}") ?>" id="readnotificaion" class="<?php if($n['read_status'] == 0) echo "notireaded"; ?>"  data-read="<?php echo $n['id'];?>">
                                               #<?php echo getCaseNumber($n['case_id']);?> <?php echo $this->lang->line('Session_mission_added');?>
											 </a>
                                            </div>
                                        </div>
										 <?php } ?>
										<?php if($n['status_type'] == 'close'){ ?>
										<div class="m-timeline-2__item  ">
                                            <span class="m-timeline-2__item-time"><?php $timestamp = strtotime($n['create_date']); echo  date("G:i",$timestamp);?></span>
                                            <div class="m-timeline-2__item-cricle">
                                                <i class="fa fa-genderless m--font-danger"></i>
                                            </div>
                                            <div class="m-timeline-2__item-text m--padding-top-5">
											<a href="<?= base_url("/front/view_appoinment/{$n['appointment_id']}") ?>" id="readnotificaion" class="<?php if($n['read_status'] == 0) echo "notireaded"; ?>"  data-read="<?php echo $n['id'];?>">
												#<?php echo getCaseNumber($n['case_id']);?> <?php echo $this->lang->line('Session_mission_has_been_close');?>
											</a>
                                            </div>
                                        </div>
									
										 <?php } ?>
										 <?php } ?>
										 
										 
										<?php if($n['notification_type'] == 'general_appoinment'){ ?>
										<?php if($n['status_type'] == 'add'){ ?>
										  <div class="m-timeline-2__item  ">
                                            <span class="m-timeline-2__item-time"><?php $timestamp = strtotime($n['create_date']); echo  date("G:i",$timestamp);?></span>
                                            <div class="m-timeline-2__item-cricle">
                                                <i class="fa fa-genderless m--font-warning"></i>
                                            </div>
                                            <div class="m-timeline-2__item-text m--padding-top-5">
											<a href="<?= base_url("/front/view_general_appoinment/{$n['appointment_id']}") ?>" id="readnotificaion" class="<?php if($n['read_status'] == 0) echo "notireaded"; ?>"  data-read="<?php echo $n['id'];?>">
                                               #<?php echo getCaseNumber($n['case_id']);?> <?php echo $this->lang->line('General_mission_added');?>
											 </a>
                                            </div>
                                        </div>
										 <?php } ?>
										<?php if($n['status_type'] == 'close'){ ?>
										<div class="m-timeline-2__item  ">
                                            <span class="m-timeline-2__item-time"><?php $timestamp = strtotime($n['create_date']); echo  date("G:i",$timestamp);?></span>
                                            <div class="m-timeline-2__item-cricle">
                                                <i class="fa fa-genderless m--font-danger"></i>
                                            </div>
                                            <div class="m-timeline-2__item-text m--padding-top-5">
											<a href="<?= base_url("/front/view_general_appoinment/{$n['appointment_id']}") ?>" id="readnotificaion" class="<?php if($n['read_status'] == 0) echo "notireaded"; ?>"  data-read="<?php echo $n['id'];?>">
												#<?php echo getCaseNumber($n['case_id']);?> <?php echo $this->lang->line('General_mission_has_been_close');?>
											</a>
                                            </div>
                                        </div>
									
										 <?php } ?>
										 <?php } ?>
										 
										 
										 <?php if($n['notification_type'] == 'visiting_appoinment'){ ?>
										<?php if($n['status_type'] == 'add'){ ?>
										  <div class="m-timeline-2__item  ">
                                            <span class="m-timeline-2__item-time"><?php $timestamp = strtotime($n['create_date']); echo  date("G:i",$timestamp);?></span>
                                            <div class="m-timeline-2__item-cricle">
                                                <i class="fa fa-genderless m--font-warning"></i>
                                            </div>
                                            <div class="m-timeline-2__item-text m--padding-top-5">
											<a href="<?= base_url("/front/view_visiting_appoinment/{$n['appointment_id']}") ?>" id="readnotificaion" class="<?php if($n['read_status'] == 0) echo "notireaded"; ?>"  data-read="<?php echo $n['id'];?>">
                                               #<?php echo getCaseNumber($n['case_id']);?> <?php echo $this->lang->line('Visiting_mission_added');?>
											 </a>
                                            </div>
                                        </div>
										 <?php } ?>
										<?php if($n['status_type'] == 'close'){ ?>
										<div class="m-timeline-2__item  ">
                                            <span class="m-timeline-2__item-time"><?php $timestamp = strtotime($n['create_date']); echo  date("G:i",$timestamp);?></span>
                                            <div class="m-timeline-2__item-cricle">
                                                <i class="fa fa-genderless m--font-danger"></i>
                                            </div>
                                            <div class="m-timeline-2__item-text m--padding-top-5">
											<a href="<?= base_url("/front/view_visiting_appoinment/{$n['appointment_id']}") ?>" id="readnotificaion" class="<?php if($n['read_status'] == 0) echo "notireaded"; ?>"  data-read="<?php echo $n['id'];?>">
												#<?php echo getCaseNumber($n['case_id']);?> <?php echo $this->lang->line('Visiting_mission_has_been_close');?>
											</a>
                                            </div>
                                        </div>
									
										 <?php } ?>
										 <?php } ?>
										 
										 <?php if($n['notification_type'] == 'consultation_appoinment'){ ?>
										<?php if($n['status_type'] == 'add'){ ?>
										  <div class="m-timeline-2__item  ">
                                            <span class="m-timeline-2__item-time"><?php $timestamp = strtotime($n['create_date']); echo  date("G:i",$timestamp);?></span>
                                            <div class="m-timeline-2__item-cricle">
                                                <i class="fa fa-genderless m--font-warning"></i>
                                            </div>
                                            <div class="m-timeline-2__item-text m--padding-top-5">
											<a href="<?= base_url("/front/view_consultation_appoinment/{$n['appointment_id']}") ?>" id="readnotificaion" class="<?php if($n['read_status'] == 0) echo "notireaded"; ?>"  data-read="<?php echo $n['id'];?>">
                                               #<?php echo getCaseNumber($n['case_id']);?> <?php echo $this->lang->line('Consultation_mission_added');?>
											 </a>
                                            </div>
                                        </div>
										 <?php } ?>
										<?php if($n['status_type'] == 'close'){ ?>
										<div class="m-timeline-2__item  ">
                                            <span class="m-timeline-2__item-time"><?php $timestamp = strtotime($n['create_date']); echo  date("G:i",$timestamp);?></span>
                                            <div class="m-timeline-2__item-cricle">
                                                <i class="fa fa-genderless m--font-danger"></i>
                                            </div>
                                            <div class="m-timeline-2__item-text m--padding-top-5">
											<a href="<?= base_url("/front/view_consultation_appoinment/{$n['appointment_id']}") ?>" id="readnotificaion" class="<?php if($n['read_status'] == 0) echo "notireaded"; ?>"  data-read="<?php echo $n['id'];?>">
												#<?php echo getCaseNumber($n['case_id']);?> <?php echo $this->lang->line('Consultation_mission_has_been_close');?>
											</a>
                                            </div>
                                        </div>
									
										 <?php } ?>
										 <?php } ?>
										 
										 
										 <?php if($n['notification_type'] == 'writings_appoinment'){ ?>
										<?php if($n['status_type'] == 'add'){ ?>
										  <div class="m-timeline-2__item  ">
                                            <span class="m-timeline-2__item-time"><?php $timestamp = strtotime($n['create_date']); echo  date("G:i",$timestamp);?></span>
                                            <div class="m-timeline-2__item-cricle">
                                                <i class="fa fa-genderless m--font-warning"></i>
                                            </div>
                                            <div class="m-timeline-2__item-text m--padding-top-5">
											<a href="<?= base_url("/front/view_writings_appoinment/{$n['appointment_id']}") ?>" id="readnotificaion" class="<?php if($n['read_status'] == 0) echo "notireaded"; ?>"  data-read="<?php echo $n['id'];?>">
                                               #<?php echo getCaseNumber($n['case_id']);?> <?php echo $this->lang->line('Writing_mission_added');?>
											 </a>
                                            </div>
                                        </div>
										 <?php } ?>
										<?php if($n['status_type'] == 'close'){ ?>
										<div class="m-timeline-2__item  ">
                                            <span class="m-timeline-2__item-time"><?php $timestamp = strtotime($n['create_date']); echo  date("G:i",$timestamp);?></span>
                                            <div class="m-timeline-2__item-cricle">
                                                <i class="fa fa-genderless m--font-danger"></i>
                                            </div>
                                            <div class="m-timeline-2__item-text m--padding-top-5">
											<a href="<?= base_url("/front/view_writings_appoinment/{$n['appointment_id']}") ?>" id="readnotificaion" class="<?php if($n['read_status'] == 0) echo "notireaded"; ?>"  data-read="<?php echo $n['id'];?>">
												#<?php echo getCaseNumber($n['case_id']);?> <?php echo $this->lang->line('Writing_mission_has_been_close');?>
											</a>
                                            </div>
                                        </div>
									
										 <?php } ?>
										 <?php } ?>
										 <?php } ?>
                                    </div>
                                </div>

                                <!--End::Timeline 2 -->
                            </div>      
                        </div>
                    </div>
                    <!--End::Portlet-->
                </div>
                <div class="col-12">
                    
                
                    <!--Begin::Portlet-->
                    
		<style>
		.empnotificion span.m-timeline-3__item-text {
    font-size: 15px !important;
}
		</style>
	
                        


            <!--End::Section-->
        </div>
    </div>



<?php

include('footer.php');
?>
<script>
$('[id="addtodo"]').on('click', function(){
	var val=$('#addtodotext').val();  
	 	var  empid = $('#employee_id :selected').val();
		if(empid == ''){
			$('.err').html('Employee is required'); return false;
		} else {
			$('.err').html(''); 
		}
		if(val==''){
			$('.errn').html('Note is required'); return false;
		} else{
			$('.errn').html(''); 
		}
	var url="<?=base_url('admin/dashboard/to_do_list');?>";
    $.ajax({
		type:'ajax',
		method:'post',
		url:url,
		data:{"note" : val,'user_id':empid},
		success:function(data){
			$(".addtext").after(data);
		 $('#addtodotext').val('');  
		  
		}
	});
});
$('[id="readnotificaion"]').on('click', function(){
	var id=$(this).data("read");  
	var url="<?=base_url('admin/dashboard/read_notification_status');?>";
    $.ajax({
		type:'ajax',
		method:'post',
		url:url,
		data:{"id" : id},
		success:function(data){
		  $('.noticount').html(data);
		}
	});
});

document.getElementById("userSearch").addEventListener("keyup", function() {
    let searchValue = this.value.toLowerCase();
    let tableRows = document.querySelectorAll(".lp-theme-table tbody tr");

    tableRows.forEach(row => {
        let rowText = row.textContent.toLowerCase();
        row.style.display = rowText.includes(searchValue) ? "" : "none";
    });
});
</script>