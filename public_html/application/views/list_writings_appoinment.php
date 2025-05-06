<?php $nvc = "white-nav sticky shrink modern hover4 radius-drop"; 
$pageTitle = $this->lang->line("Writing_Mission");
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
                                <?php echo $this->lang->line('Writings');?>
                            </h3>
                        </div>
                    </div>
                </div>


               <?php $appoinment = array(); foreach($data as $key=>$appoinment){?>

			<div class="row thh">
			<div class="col-lg-12">
			<h3><?php echo $this->lang->line('E_Service_No'); echo " #".getCaseNumber($key); ?></h3>
			</div>
			</div>
			<div class="in_fo">
			<div class="" style=" padding: 10px; ">
			<div class="m_datatable m-datatable m-datatable--default m-datatable--loaded" style="">

                        <table  id=""  class="table table-hover table-striped">
					<thead>
		 
						 <tr class="netTr">
						<th><?php echo $this->lang->line('SR_NO');?></th>
						<th><?php echo $this->lang->line('E_Service_Number');?></th>
						<th><?php echo $this->lang->line('Writing_Date');?></th>
						<th><?php echo $this->lang->line('Writing_Time');?></th>
						<th><?php echo $this->lang->line('Subject');?></th>
						<th><?php echo $this->lang->line('writing_type');?></th>
						<th><?php echo $this->lang->line('Due_Time');?></th>
						<th><?php echo $this->lang->line('Sub_Mission');?></th>
						<th><?php echo $this->lang->line('ACTION');?></th>
					  </tr>
				 
					</thead>
					<tbody>
 
			<?php 
              $count=1;  
              foreach($appoinment as $appoinment){  ?>
              <tr class="<?php if(getMissionCount( $appoinment['id'],"writing_misssion") > 0) echo 'issubm'; ?>">
			  <td><?= $count++ ?></td>
			    <td><?= $appoinment['case_number'] ?></td>
                <td><?= getTheDayAndDateFromDatePanFront($appoinment['session_date']); ?></td>
                
				<td><?= $appoinment['session_time'] ?></td>
				<td><?= $appoinment['subject'] ?></td>
                <td><?= $appoinment['writing_type'] ?></td>
                <td class="smalltxtdata">
                <?php 
                if($appoinment[is_close]==1){
                echo clsoe_diff($appoinment['session_end_date'],$appoinment['session_end_time'],$appoinment['close_date']);
                } else {
                ?> 
                <span class='countdownmin' style=" color: #0e8a00; font-weight: bold; " 
                value='<?php echo mission_due_time($appoinment['session_end_date'],$appoinment['session_end_time']);?>'></span>
                <?php } ?>
                </td>
                <td><a href="" class="num_tab" style="background-color: green;"><?php echo	getMissionCount( $appoinment['id'],"writing_misssion"); ?></a> </td>

				<td class="action">
				    <a href=<?= base_url("front/view_writings_appoinment/{$appoinment['id']}") ?>  title="<?php echo $this->lang->line('View');?>" class="m-portlet__nav-link btn m-btn m-btn--hover-danger m-btn--icon m-btn--icon-only m-btn--pill " target="_blnak"><i class="fa fa-eye"></i></a><br>

					<?php if($appoinment['report_file']) {?>
					<a href=<?= base_url("/uploads/case_file/{$appoinment['report_file']}") ?>  title="<?php echo $this->lang->line('Report');?>" class="m-portlet__nav-link btn m-btn m-btn--hover-warning m-btn--icon m-btn--icon-only m-btn--pill  " target="_blnak" download> <i class="fa fa-download"></i></a><br>
					<?php } ?>
					<?php
					$files = $this->db->select('*')->where("(temp_app_id = '{$appoinment["id"]}' AND cat_id = 8 AND type='writing')", NULL, FALSE)->get('document')->row(); 
					if($files){
					?>
					<a href=<?= base_url("/uploads/case_file/{$files->name}") ?>  title="<?php echo $this->lang->line('Attachment');?>" class="m-portlet__nav-link btn m-btn m-btn--hover-success m-btn--icon m-btn--icon-only m-btn--pill   " target="_blnak" download> <i class="fa fa-file-o "></i> </a>
					<?php } ?>

                </td>
              </tr>
              		  <?php 
	$id = $this->session->userdata('user_id');
$appoinments =  $this->db->select("writing_misssion.*,c_case.id as case_id,c_case.client_name,c_case.case_number,c_case.opponent_full_name,c_case.case_title,c_case.court_name,c_case.judge_name")
->join('c_case', "c_case.id = writing_misssion.case_id", 'left')
->where("(c_case.customers_id = $id  AND status=0)", NULL, FALSE)->where("writing_misssion.sub_mission_id",$appoinment["id"])
->get('writing_misssion')
->result_array(); 
?>
<?php foreach($appoinments as $appoinment){  ?>
              <tr class="submissions" style="text-align: center;">
			  <td><?= $count++ ?></td>
                <td><?= $appoinment['case_number'] ?></td>
				<td><?= getTheDayAndDateFromDatePanFront($appoinment['session_date']); ?></td>
            	<td><?= $appoinment['session_time'] ?></td>
                <td><?= $appoinment['subject'] ?></td>
                <td><?= $appoinment['writing_type'] ?></td>
			    <td><?= $appoinment['department'] ?></td>
               
                <td><?= $appoinment['note'] ?></td>
			    <td class="smalltxtdata">
<?php 
if($appoinment[is_close]==1){
echo clsoe_diff($appoinment['session_end_date'],$appoinment['session_end_time'],$appoinment['close_date']);
} else {
?> 
<span class='countdownmin' style=" color: #0e8a00; font-weight: bold; " 
value='<?php echo mission_due_time($appoinment['session_end_date'],$appoinment['session_end_time']);?>'></span>
<?php } ?>
</td> 

<td class="action">
	<a href=<?= base_url("front/view_writings_appoinment/{$appoinment['id']}") ?>  title="<?php echo $this->lang->line('View');?>" class="m-portlet__nav-link btn m-btn m-btn--hover-danger m-btn--icon m-btn--icon-only m-btn--pill " target="_blnak"><i class="fa fa-eye"></i></a><br>

	<?php if($appoinment['report_file']) {?>
	<a href=<?= base_url("/uploads/case_file/{$appoinment['report_file']}") ?>  title="<?php echo $this->lang->line('Report');?>" class="m-portlet__nav-link btn m-btn m-btn--hover-warning m-btn--icon m-btn--icon-only m-btn--pill  " target="_blnak" download> <i class="fa fa-download"></i></a><br>
	<?php } ?>
	<?php
	$files = $this->db->select('*')->where("(temp_app_id = '{$appoinment["id"]}' AND cat_id = 8 AND type='writing')", NULL, FALSE)->get('document')->row(); 
	if($files){
	?>
	<a href=<?= base_url("/uploads/case_file/{$files->name}") ?>  title="<?php echo $this->lang->line('Attachment');?>" class="m-portlet__nav-link btn m-btn m-btn--hover-sucess m-btn--icon m-btn--icon-only m-btn--pill  " target="_blnak" download> <i class="fa fa-file-o "></i></a>
	<?php } ?>

</td>
              </tr>
               
 <?php } ?>
            <?php } ?>


					</tbody>
				</table>

			
                         
                    </div>
			</div>
			</div>
<?php } ?>
            </div>


        </div>

    </div>
</div>



<?php

include('footer.php');

?>
