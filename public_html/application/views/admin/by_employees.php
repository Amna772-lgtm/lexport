<?php
include('header.php');

?>

    <style>
	.datepicker table tr td.disabled, .datepicker table tr td.disabled:hover {

    color: #c5c5c5 !important;

}
        .m-form.m-form--group-seperator-dashed .m-form__group {
            border-bottom: 0px dashed #ebedf2;
        }
        .thh h3{
            background: #1F3958;
            color: #fff;
            font-weight: bold;
            text-transform: uppercase;
            padding: 10px;
            -webkit-border-top-left-radius: 20px !important;
            -webkit-border-top-right-radius: 20px !important;
            -moz-border-radius-topleft: 20px !important;
            -moz-border-radius-topright: 20px !important;
            border-top-left-radius: 20px !important;
            border-top-right-radius: 20px !important;
            margin: 30px 30px 0 30px;
        }
        .in_fo{
            box-shadow: 0px 5px 10px 0px #cccccc !important;
            margin: 0 30px;
            padding-bottom: 25px;
            -webkit-border-bottom-right-radius: 20px;
            -webkit-border-bottom-left-radius: 20px;
            -moz-border-radius-bottomright: 20px;
            -moz-border-radius-bottomleft: 20px;
            border-bottom-right-radius: 20px;
            border-bottom-left-radius: 20px;
        }
        .m-form.m-form--group-seperator-dashed .m-form__group {
            border-bottom: 0px dashed #ebedf2;
            padding-bottom: 0;
            padding-top: 10px;
        }
        .m-portlet .m-form.m-form--fit > .m-portlet__body {
            padding-bottom: 40px !important;
        }
        .nav {
            display: -webkit-box;
        }
    </style>

    <div class="m-grid__item m-grid__item--fluid m-wrapper">


        <!-- END: Subheader -->
        <div class="m-content">

            <!--begin::Portlet-->
            <div class="m-portlet lp-theme-card bg-transparent">
                <div class="m-portlet__head">
                    <div class="m-portlet__head-caption">
                        <!-- <div class="m-portlet__head-title">
                            <h3 class="m-portlet__head-text">
                                <?php echo $this->lang->line('By_Employees');?>
                            </h3>
                        </div> -->
                        <div class="theme-new-nav-menu">
                            <h3 class="m-portlet__title" style="margin-right: 70px; font-size:24px !important;">
                                <?php echo $this->lang->line('Report');?>
                            </h3>
                            <ul>
                                <li class="active"> <a href="http://lexport.demosbywpsqr.com/admin/report/by_employees">By Employees</a> </li>
                                <li> <a href="http://lexport.demosbywpsqr.com/admin/report/by_cost">By Cost</a> </li>
                                <li> <a href="http://lexport.demosbywpsqr.com/admin/report/by_time">By Time</a> </li>
                                <li> <a href="http://lexport.demosbywpsqr.com/admin/report/by_task">By Task</a> </li>
                                <li> <a href="http://lexport.demosbywpsqr.com/admin/report/by_evaluation">By Evaluation</a> </li>
                            </ul>

                            <!-- <a class="btn btn-primary" href="#"> <i class="fa fa-plus"></i> Assign</a> -->
                        </div>
                    </div>
                </div>
 

<?php echo form_open_multipart('admin/report/by_employees',['id'=>'employer','class'=>"m-form m-form--fit m-form--label-align-right m-form--group-seperator-dashed"]);
 
 ?>

                <!--begin::Form-->
 
                    <div class="m-portlet__body theme-inner-form">
                        <div class="form-field-container">
                        <h3><?php echo htmlspecialchars($this->lang->line('Generate_Report'), ENT_QUOTES, 'UTF-8'); ?></h3>
						<?php 
        $eid    = isset($_POST['emp']) ? htmlspecialchars($_POST['emp'], ENT_QUOTES, 'UTF-8') : '';
        $from   = isset($_POST['from']) ? htmlspecialchars($_POST['from'], ENT_QUOTES, 'UTF-8') : '';
        $to     = isset($_POST['to']) ? htmlspecialchars($_POST['to'], ENT_QUOTES, 'UTF-8') : '';
        $branch = isset($_POST['branch']) ? htmlspecialchars($_POST['branch'], ENT_QUOTES, 'UTF-8') : '';
        ?>
			<div class="form-group m-form__group row">
				<div class="form-group col-12 col-sm-6 col-lg-3">
				<label><?php echo htmlspecialchars($this->lang->line('From'), ENT_QUOTES, 'UTF-8'); ?></label>
				<?= form_input(['id'=>'from','name'=>'from','class'=>'form-control','value'=>$from,'autocomplete'=>'off',"required"=>"required"]);?>
				<div class="form-error"><?php echo form_error('from'); ?></div>
			</div>	

			<div class="form-group col-12 col-sm-6 col-lg-3">
			<label><?php echo htmlspecialchars($this->lang->line('To'), ENT_QUOTES, 'UTF-8'); ?></label>
			<?= form_input(['id'=>'to','name'=>'to','class'=>'form-control','value'=>$to,'autocomplete'=>'off',"required"=>"required"]);?>
			<div class="form-error"><?php echo form_error('to'); ?></div>
			</div>
			<div class="form-group col-12 col-sm-6 col-lg-3">
				<label><?php echo htmlspecialchars($this->lang->line('branch'), ENT_QUOTES, 'UTF-8'); ?></label>
				<select name="branch" id="branch" class="form-control">
				<option  value=""><?php echo $this->lang->line('All');?></option>
				<?php
				foreach (branch() as $b) { ?>
				<option value="<?php echo $b['id']?>" <?php if($branch==$b['id']) echo "selected=selected";?>><?php echo $b['name']?></option>
				<?php } ?>
				</select>
			</div> 		
 				
	 		<div class="form-group col-12 col-sm-6 col-lg-3">
			<label><?php echo $this->lang->line('Select_Employee');?></label>
			<select name="emp" id="employee_type" class="form-control">
			<option  value=""><?php echo $this->lang->line('All');?></option>
		<?php 

		foreach ($get_per_clients as $get_per_clients) {?>
						<option value="<?php echo $get_per_clients['id']?>" <?php if($eid==$get_per_clients['id']) echo "selected=selected";?>><?php echo $get_per_clients['name']?></option>
					<?php }?>
			</select>
		</div> 		<div class="form-group col-sm-12 mt-4">
 								 <?php 
									$submit=$this->lang->line('Submit');
									echo form_submit(['name'=>'addadmin','id'=>'addadmin','value'=>$submit,'class'=>'btn btn-primary btn-lg']);
								 ?>              
	</div>
 
</div>

 <?php if($data) { ?>
 <div class="row">
<div class="col-lg-6">

	<div class="form-field-container">
    <h3><?php echo $this->lang->line('Graph');?></h3>
		<div class="form-group m-form__group row">
				<canvas id="myChart" width="200" height="200"></canvas>
		</div>
	</div>
</div>
<div class="col-lg-6">
	
	<div class="form-field-container">
    <h3><?php echo $this->lang->line('Report_Calculation');?></h3>
		<div class="form-group m-form__group row">
		<div class="col-lg-6">
			<label class=""><?php echo $this->lang->line('Assign_Case');?>:<b> <?php echo $asign_case; ?></b></label>  
			</div>
		<div class="col-lg-6">
			<label class=""><?php echo $this->lang->line('Following_File');?>:<b> <?php echo $following_file; ?></b></label> 
		</div>
		<div class="col-lg-6">
			<label class=""><?php echo $this->lang->line('Responsible_File');?>:<b> <?php echo $responsible_file; ?></b></label> 
		</div>
		<div class="col-lg-6">
			<label class=""><?php echo $this->lang->line('File_Convert');?>:<b> <?php echo $convert_file; ?></b></label> 
		</div>
		<div class="col-lg-6">
			<label class=""><?php echo $this->lang->line('E_Service_Convert');?>:<b> <?php echo $convert_case; ?></b></label> 
		</div>
		<div class="col-lg-6">
			<label class=""><?php echo $this->lang->line('Session_Convert');?>:<b> <?php echo $convert_session; ?></b></label> 
		</div>
		<div class="col-lg-6">
			<label class=""><?php echo $this->lang->line('Writing_Convert');?>:<b> <?php echo $convert_writing; ?></b></label> 
		</div>
		<div class="col-lg-6">
			<label class=""><?php echo $this->lang->line('Consultation_Convert');?>:<b> <?php echo $convert_consultation; ?></b></label> 
		</div>
		<div class="col-lg-6">
			<label class=""><?php echo $this->lang->line('Visiting_Convert');?>:<b> <?php echo $convert_visiting; ?></b></label> 
		</div>
		<div class="col-lg-6">
			<label class=""><?php echo $this->lang->line('General_Convert');?>:<b> <?php echo $convert_general; ?></b></label> 
		</div> 
		</div>
	</div>
</div>
</div>
 
                        <div class="row thh">
                            <div class="col-lg-12">
                                <h3><?php echo $this->lang->line('Report_Summery');?></h3>
                            </div>
                        </div>
                        <div class="in_fo">
                            
						<div class="form-group m-form__group row">
                            <div class="col-lg-12">
                                <h3><?php echo $this->lang->line('E_SERVICES_LIST');?><br>&nbsp;</h3>
                            </div>
                            <div class="col-lg-12">
                                <div class="m_datatable m-datatable m-datatable--default m-datatable--loaded" style="">
                                <div class="table-responsive">
                                    <table class="lp-theme-table lp-large-theme">
                                        <thead>
                                        <tr class="netTr">
                                            <th><?php echo $this->lang->line('E_Service_No');?></th>
                                            <th><?php echo $this->lang->line('Name');?></th>
                                            <th><?php echo $this->lang->line('E_Service_Name');?></th>
                                            <th><?php echo $this->lang->line('Contract_No');?></th>
                                            <th><?php echo $this->lang->line('ACTION');?></th>
                                        </tr>
                                        </thead>
                                        <tbody>
										   <?php foreach ($case_list as $case){ ?>
                      <tr style="text-align: center;" class="hide<?php echo $case['id'] ?>">
                        <td><?= $case['case_number'] ?></td>
                        <td><?= $case['client_name'] ?></td>
                        <td><?= getServiceName($case['service_types']) ?></td>
                        <td><?= $case['contact_number'] ?></td>
					<td>
						<span style="overflow: visible; position: relative;">
							<a href="<?= base_url("admin/c_case/edit_case/{$case['id']}"); ?>#armanage" class="btn btn-primary" title=""><?php echo $this->lang->line('Archives');?></a>
						</span>
					</td>
                </tr> <?php } ?>
                                       

                                        </tbody>
                                    </table>
                                           </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-group m-form__group row">
                            <div class="col-lg-12">
                                <h3><?php echo $this->lang->line('Session');?><br>&nbsp;</h3>
                            </div>
                            <div class="col-lg-12">
                                <div class="m_datatable m-datatable m-datatable--default m-datatable--loaded" style="">
                                <div class="table-responsive">
                                    <table class="lp-theme-table lp-large-theme">
                                        <thead>
                                        <tr class="netTr">
                                            <th><?php echo $this->lang->line('No');?></th>
                                            <th><?php echo $this->lang->line('E_Service_No');?></th>
                                            <th><?php echo $this->lang->line('Session_Number');?></th>
                                            <th><?php echo $this->lang->line('Session_Date');?></th>
                                            <th><?php echo $this->lang->line('Session_End_Date');?></th>
                                            <th><?php echo $this->lang->line('Client_Name');?></th>
                                            <th><?php echo $this->lang->line('Note');?></th>
                                        </tr>
                                        </thead>
                                        <tbody>

                                         <?php 
              $count=1;
              foreach($session as $appoinment){  ?>
              <tr style="text-align: center;" class="hide<?php echo $appoinment['id'] ?>">
                <td><?= $count++ ?></td>
				<td><?= $appoinment['case_number'] ?></td>
                <td><?= $appoinment['session_number'] ?></td>
                
                <td><?= $appoinment['session_date']; echo getTheDayFromDate($appoinment['session_date']);?></td>
                <td><?= $appoinment['session_end_date']; echo getTheDayFromDate($appoinment['session_end_date']) ?></td>
                <td><?= $appoinment['client_name'] ?></td>
                <td><?= $appoinment['note'] ?></td>
       
		        <!--      <td class="action">
                    <?php if(isset($datas[3][2]) && $datas[3][2] == 1){?>
                    <a href=<?= base_url("admin/appoinment/find_session_appoinment/{$appoinment['id']}") ?> class="btn btn-outline-primary fa fa-pencil-square-o editadmin" id=<?= $appoinment['id'] ?>></a>
                   <?php  } ?>
                    <a href="javascript:;" class="btn btn-outline-danger fa fa-trash delete_appoinment" id=<?= $appoinment['id'] ?>></a>
        				    <a href=<?= base_url("admin/appoinment/view_session_appoinment/{$appoinment['id']}") ?>  title="View Case " class="fa fa-eye btn btn-outline-success" target="_blnak"></a>
                </td> -->
              </tr>
            <?php } ?>

                                        </tbody>
                                    </table>
                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-group m-form__group row">
                            <div class="col-lg-12">
                                <h3><?php echo $this->lang->line('Writings');?><br>&nbsp;</h3>
                            </div>
                            <div class="col-lg-12">
                                <div class="m_datatable m-datatable m-datatable--default m-datatable--loaded" style="">
                                <div class="table-responsive">
                                    <table class="lp-theme-table lp-large-theme">
                                        <thead>
                                        <tr class="netTr">
                                            <th><?php echo $this->lang->line('No');?></th>
                                            <th><?php echo $this->lang->line('E_Service_No');?></th>
                                            <th><?php echo $this->lang->line('Writing_Number');?></th>
                                            <th><?php echo $this->lang->line('Writing_Date');?></th>
                                            <th><?php echo $this->lang->line('Writing_End_Date');?></th>
                                            <th><?php echo $this->lang->line('Client_Name');?></th>
                                            <th><?php echo $this->lang->line('Note');?></th>
                                        </tr>
                                        </thead>
                                        <tbody>


                                            <?php 
              $count=1;
              foreach($writings as $appoinment){  ?>
              <tr style="text-align: center;" class="hide<?php echo $appoinment['id'] ?>">
                <td><?= $count++ ?></td>
				   <td><?= $appoinment['case_number'] ?></td>
                <td><?= $appoinment['session_number'] ?></td>
                <td><?= $appoinment['session_date']; echo getTheDayFromDate($appoinment['session_date']);?></td>
                <td><?= $appoinment['session_end_date']; echo getTheDayFromDate($appoinment['session_end_date']) ?></td>
                <td><?= $appoinment['client_name'] ?></td>
                <td><?= $appoinment['note'] ?></td>
               
		          <!--    <td class="action">
                  <?php if(isset($datas[4][2]) && $datas[4][2] == 1){?> 
                  <a href=<?= base_url("admin/appoinment/find_writings_appoinment/{$appoinment['id']}") ?> class="btn btn-outline-primary fa fa-pencil-square-o editadmin" id=<?= $appoinment['id'] ?>></a>
                  <?php } ?>
                  <a href="javascript:;" class="btn btn-outline-danger fa fa-trash delete_writings" id=<?= $appoinment['id'] ?>></a>
                 <a href=<?= base_url("admin/appoinment/view_writings_appoinment/{$appoinment['id']}") ?>  title="View Case " class="fa fa-eye btn btn-outline-success" target=""></a>
                </td>-->
              </tr>
            <?php } ?>

                                        </tbody>
                                    </table>
                  </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-group m-form__group row">
                            <div class="col-lg-12">
                                <h3><?php echo $this->lang->line('Consultation');?><br>&nbsp;</h3>
                            </div>
                            <div class="col-lg-12">
                                <div class="m_datatable m-datatable m-datatable--default m-datatable--loaded" style="">
                                <div class="table-responsive">
                                    <table class="lp-theme-table lp-large-theme">
                                        <thead>
                                        <tr class="netTr">
                                            <th><?php echo $this->lang->line('No');?></th>
                                            <th><?php echo $this->lang->line('E_Service_No');?></th>
                                            <th><?php echo $this->lang->line('Consultation_Number');?></th>
                                            <th><?php echo $this->lang->line('Consultation_Date');?></th>
                                            <th><?php echo $this->lang->line('Consultation_End_Date');?></th>
                                            <th><?php echo $this->lang->line('Client_Name');?></th>
                                            <th><?php echo $this->lang->line('Note');?></th>
                                        </tr>
                                        </thead>
                                        <tbody>
  <?php 
              $count=1;
              foreach($consultation as $appoinment){  ?>
              <tr style="text-align: center;" class="hide<?php echo $appoinment['id'] ?>">
                <td><?= $count++ ?></td>
				   <td><?= $appoinment['case_number'] ?></td>
                <td><?= $appoinment['session_number'] ?></td>
                <td><?= $appoinment['session_date']; echo getTheDayFromDate($appoinment['session_date']);?></td>
                <td><?= $appoinment['session_end_date']; echo getTheDayFromDate($appoinment['session_end_date']) ?></td>
                <td><?= $appoinment['client_name'] ?></td>
                <td><?= $appoinment['note'] ?></td>
             
		         <!--     <td class="action">
                <?php if(isset($datas[5][2]) && $datas[5][2] == 1){?>
                  <a href=<?= base_url("admin/appoinment/find_consultation_appoinment/{$appoinment['id']}") ?> class="btn btn-outline-primary fa fa-pencil-square-o editadmin" id=<?= $appoinment['id'] ?>></a>
                <?php } ?>  
                  <a href="javascript:;" class="btn btn-outline-danger fa fa-trash delete_consultation" id=<?= $appoinment['id'] ?>></a>
                  <a href=<?= base_url("admin/appoinment/view_consultation_appoinment/{$appoinment['id']}") ?>  title="View Case " class="fa fa-eye btn btn-outline-success" target=""></a>
                </td> -->
              </tr>
            <?php } ?>
                                        </tbody>
                                    </table>
                </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-group m-form__group row">
                            <div class="col-lg-12">
                                <h3><?php echo $this->lang->line('Visiting');?><br>&nbsp;</h3>
                            </div>
                            <div class="col-lg-12">
                                <div class="m_datatable m-datatable m-datatable--default m-datatable--loaded" style="">
                                <div class="table-responsive">
                                    <table class="lp-theme-table lp-large-theme">
                                        <thead>
                                        <tr class="netTr">
                                            <th><?php echo $this->lang->line('No');?></th>
                                            <th><?php echo $this->lang->line('E_Service_No');?></th>
                                            <th><?php echo $this->lang->line('Visiting_Number');?></th>
                                            <th><?php echo $this->lang->line('Visiting_Date');?></th>
                                            <th><?php echo $this->lang->line('Visiting_End_Date');?></th>
                                            <th><?php echo $this->lang->line('Client_Name');?></th>
                                            <th><?php echo $this->lang->line('Note');?></th>
                                        </tr>
                                        </thead>
                                        <tbody>

                                       <?php 
              $count=1;
              foreach($visiting as $appoinment){  ?>
              <tr style="text-align: center;"  class="hide<?php echo $appoinment['id'] ?>">
                <td><?= $count++ ?></td>
				   <td><?= $appoinment['case_number'] ?></td>
                <td><?= $appoinment['session_number'] ?></td>
                <td><?= $appoinment['session_date']; echo getTheDayFromDate($appoinment['session_date']);?></td>
                <td><?= $appoinment['session_end_date']; echo getTheDayFromDate($appoinment['session_end_date']) ?></td>
                <td><?= $appoinment['client_name'] ?></td>
                <td><?= $appoinment['note'] ?></td>
               
		         <!--     <td class="action">
                  <?php if(isset($datas[6][2]) && $datas[6][2] == 1){?>
                  <a href=<?= base_url("admin/appoinment/find_visiting_appoinment/{$appoinment['id']}") ?> class="btn btn-outline-primary fa fa-pencil-square-o editadmin" id=<?= $appoinment['id'] ?>></a>
                  <?php }?>
                  <a href="javascript:;" class="btn btn-outline-danger fa fa-trash delete_visiting" id=<?= $appoinment['id'] ?>></a>
				   <a href=<?= base_url("admin/appoinment/view_visiting_appoinment/{$appoinment['id']}") ?>  title="View Case " class="fa fa-eye btn btn-outline-success" target=""></a>
                </td> -->
              </tr>
            <?php } ?>

                                       
                                        </tbody>
                                    </table>
                  </div>
                                </div>
                            </div>
                        </div>


                        <div class="form-group m-form__group row">
                            <div class="col-lg-12">
                                <h3><?php echo $this->lang->line('GENERAL');?><br>&nbsp;</h3>
                            </div>
                            <div class="col-lg-12">
                                <div class="m_datatable m-datatable m-datatable--default m-datatable--loaded" style="">
                                <div class="table-responsive">
                                    <table class="lp-theme-table lp-large-theme">
                                        <thead>
                                        <tr class="netTr">
                                            <th><?php echo $this->lang->line('No');?></th>
                                            <th><?php echo $this->lang->line('E_Service_No');?></th>
                                            <th><?php echo $this->lang->line('General_Number');?></th>
                                            <th><?php echo $this->lang->line('General_Date');?></th>
                                            <th><?php echo $this->lang->line('General_End_Date');?></th>
                                            <th><?php echo $this->lang->line('Client_Name');?></th>
                                            <th><?php echo $this->lang->line('Note');?></th>
                                        </tr>
                                        </thead>
                                        <tbody>

                                       <?php 
              $count=1;
              foreach($general as $appoinment){  ?>
              <tr style="text-align: center;"  class="hide<?php echo $appoinment['id'] ?>">
                <td><?= $count++ ?></td>
				   <td><?= $appoinment['case_number'] ?></td>
                <td><?= $appoinment['session_number'] ?></td>
                <td><?= $appoinment['session_date']; echo getTheDayFromDate($appoinment['session_date']);?></td>
                <td><?= $appoinment['session_end_date']; echo getTheDayFromDate($appoinment['session_end_date']) ?></td>
                <td><?= $appoinment['client_name'] ?></td>
                <td><?= $appoinment['note'] ?></td>
            
		         <!--     <td class="action">
                  <?php if(isset($datas[6][2]) && $datas[6][2] == 1){?>
                  <a href=<?= base_url("admin/appoinment/find_visiting_appoinment/{$appoinment['id']}") ?> class="btn btn-outline-primary fa fa-pencil-square-o editadmin" id=<?= $appoinment['id'] ?>></a>
                  <?php }?>
                  <a href="javascript:;" class="btn btn-outline-danger fa fa-trash delete_visiting" id=<?= $appoinment['id'] ?>></a>
				   <a href=<?= base_url("admin/appoinment/view_visiting_appoinment/{$appoinment['id']}") ?>  title="View Case " class="fa fa-eye btn btn-outline-success" target=""></a>
                </td> -->
              </tr>
            <?php } ?>
                                        </tbody>
                                    </table>
                  </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-group m-form__group row">
                            <div class="col-lg-12">
                                <h3><?php echo $this->lang->line('Project_List');?><br>&nbsp;</h3>
                            </div>
                            <div class="col-lg-12">
                                <div class="m_datatable m-datatable m-datatable--default m-datatable--loaded" style="">
                                <div class="table-responsive">
                                    <table class="lp-theme-table lp-large-theme">
                                        <thead>
                                        <tr class="netTr">
                                            <th><?php echo $this->lang->line('No');?></th>
                                            <th><?php echo $this->lang->line('Project_Name');?></th>
                                            <th><?php echo $this->lang->line('E_Service');?></th>
                                            <th><?php echo $this->lang->line('Client_Name');?></th>
                                            <th><?php echo $this->lang->line('Status');?></th>
                                        </tr>
                                        </thead>
                                        <tbody>

                                         <?php 
              $count=1;
              foreach($project as $project){  ?>
              <tr style="text-align: center;"   class="hide<?php echo $project['id'] ?>">
                <td><?= $count++ ?></td>
                <td><?= $project['project_name'] ?></td>
                <td><?= $project['case'] ?></td>
                <td><?= $project['client_name'] ?></td>
                <td><?= $project['project_status'] ?></td>
		          <!--    <td class="action">
                  <?php if(isset($datas[10][2]) && $datas[10][2] == 1){?>
                    <a href=<?= base_url("admin/project/find_project/{$project['id']}") ?> class="btn btn-outline-primary fa fa-pencil-square-o editadmin" id=<?= $project['id'] ?>></a>
                  <?php } ?>
                  <a href="javascript:;" class="btn btn-outline-danger fa fa-trash delete_consultation" id=<?= $project['id'] ?>></a>
                   <a href=<?= base_url("admin/project/view_project/{$project['id']}") ?>  title="View project" class="fa fa-eye btn btn-outline-success" target="_blnak"></a>
                  <!-- <a href="javascript:;" class="btn btn-outline-success fa fa-file " id=<?= $appoinment['id'] ?>>Report</a> 
                </td>-->
              </tr>
            <?php } ?>


                                        </tbody>
                                    </table>
                  </div>
                                </div>
                            </div>
                        </div>

                            </div>
 <?php } ?>
 
                        
                    </div>

                </form>

                <!--end::Form-->
            </div>

            <!--end::Portlet-->
        </div>
    </div>
    </div>


<?php

include('footer.php');
?>


<script type="text/javascript">
jQuery('#from').datepicker({format: "yyyy-mm-dd",autoclose:true,endDate: "dateToday"});

jQuery('#to').datepicker({format: "yyyy-mm-dd",autoclose:true,endDate: "dateToday"});
</script><script>
var ctx = document.getElementById('myChart').getContext('2d');
ctx.height = 500;
data = {
    datasets: [{
        data: [<?php echo $asign_case; ?>, <?php echo $following_file; ?>, <?php echo $responsible_file; ?>, <?php echo $convert_file; ?>, <?php echo $convert_case; ?>, <?php echo $convert_session; ?>, <?php echo $convert_writing; ?>, <?php echo $convert_consultation; ?>, <?php echo $convert_visiting; ?>, <?php echo $convert_general; ?>],
			 backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)',
				'rgb(146, 81, 117)',
				'rgb(81, 146, 140)',
				'rgb(100, 146, 81)',
				'rgb(130, 120, 35)',
				'rgb(33, 150, 243)',
				'rgb(63, 81, 181)',
				'rgb(96, 125, 139)',
 
            ],
    }],

    // These labels appear in the legend and in the tooltips when hovering different arcs
    labels: [
		'Assign Case',
        'Following File',
        'Responsible File',
		'File Convert',		
		'E-Service Convert',		
		'Session Convert',		
		'Writing Convert',	
		'Consultation Convert',	
		'Visiting Convert',	
		'General Convert',	
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
var myPieChart = new Chart(ctx, {
    type: 'pie',
    data: data,
		
});
</script>