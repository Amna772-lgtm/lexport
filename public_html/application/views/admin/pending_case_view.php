<?php
include('header.php');

?>

    <style>
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
                        <div class="m-portlet__head-title">
                            <h3 class="m-portlet__head-text">
                             <?php echo $this->lang->line('E_Service_Report');?>
                            </h3>
                        </div>
                    </div>
                </div>
 

				<?php echo form_open_multipart('',['id'=>'employer','class'=>"m-form m-form--fit m-form--label-align-right m-form--group-seperator-dashed"]);
				
				?>

                <!--begin::Form-->
 
                    <div class="m-portlet__body theme-inner-form">

                        <div class="form-field-container">
                            <h3 class="mt-4"><?php echo $this->lang->line('E_Service_View');?> </h3>
                            <div class="form-group m-form__group row pp_col">
                          		<div class="col-lg-4">
									<label><?php echo $this->lang->line('identification_number');?>: <?php echo $data->identification_number; ?></label>
								</div>

								<div class="col-lg-4">
									<label><?php echo $this->lang->line('identification_types');?>: <?php echo $data->identification_types; ?></label>
								</div>

								<div class="col-lg-4">
									<label><?php echo $this->lang->line('client_File_number');?>: <?php echo $data->client_file_number; ?></label>
								</div>

								<div class="col-lg-4">	
									<label ><?php echo $this->lang->line('Client_Name');?>: <?php  echo getEmployeeName($data->customers_id);  ?></label>
								</div>

								<div class="col-lg-4">	
									<label ><?php echo $this->lang->line('branch');?>: <?php echo getBranchName($data->branch); ?></label>
								</div>

								<div class="col-lg-4">
									<label ><?php echo $this->lang->line('E_Service');?>: <?php echo getServiceType($data->service_types); ?></label>
								</div>

								<div class="col-lg-4">	
									<label ><?php echo $this->lang->line('E_Service_Type');?>: <?php echo getCaseType($data->case_type); ?></label>
								</div>

								<div class="col-lg-4">	
									<label ><?php echo $this->lang->line('E_Service_Number');?>: <?php echo $data->case_number;?></label>
								</div>

								<div class="col-lg-4">	
									<label ><?php echo $this->lang->line('E_Service_Date');?>: <?php  echo getTheDayAndDateFromDatePan($data->case_date); ?></label>
								</div>

								<div class="col-lg-4">	
									<label ><?php echo $this->lang->line('E_Service_Start_Date');?>: <?php echo getTheDayAndDateFromDatePan($data->case_start_date);?></label>
								</div>

								<div class="col-lg-4">	
									<label ><?php echo $this->lang->line('Contract_number');?>: <?php echo $data->contract_number; ?></label>
								</div>

								<div class="col-lg-4">	
									<label ><?php echo $this->lang->line('Opponent_Full_Name');?>: <?php echo $data->opponent_full_name; ?></label>
								</div>

								<div class="col-lg-4">	
									<label ><?php echo $this->lang->line('Opponent_Note');?>: <?php echo $data->opponent_note; ?></label>
								</div>

								<div class="col-lg-4">	
									<label ><?php echo $this->lang->line('Opponent_Phone');?>: <?php echo $data->opponent_phone; ?></label>
								</div>

								<div class="col-lg-4">	
									<label ><?php echo $this->lang->line('Court_Name');?>: <?php echo gtCourtName($data->court_name); ?></label>
								</div>

								<div class="col-lg-4">	
									<label ><?php echo $this->lang->line('Court_Number');?>: <?php echo $data->court_number; ?></label>
								</div>

								<div class="col-lg-4">	
									<label ><?php echo $this->lang->line('Court_Address');?>: <?php echo $data->court_address; ?></label>
								</div>

								<div class="col-lg-4">	
									<label ><?php echo $this->lang->line('Judge_Name');?>: <?php echo $data->judge_name; ?></label>
								</div>

								<div class="col-lg-4">	
									<label ><?php echo $this->lang->line('Opponent_Lawyer');?>: <?php echo $data->opponent_lawyer; ?></label>
								</div>
								
								<div class="col-lg-4">	
									<label ><?php echo $this->lang->line('Objection_Number');?>: <?php echo $data->objection_number; ?></label>
								</div>

								<div class="col-lg-4">	
									<label ><?php echo $this->lang->line('Objection_Date');?>: <?php echo getTheDayAndDateFromDatePan($data->objection_date);?></label>
								</div>

								<div class="col-lg-4">	
									<label ><?php echo $this->lang->line('E_Service_Status');?>: <?php echo $data->case_status; ?></label>
								</div>

								<div class="col-lg-4">	
									<label ><?php echo $this->lang->line('Note');?>: <?php echo $data->note; ?></label>
								</div> 

                            </div>
                        </div>

                        <div class="form-field-container">
							<h3><?php echo $this->lang->line('Audio_Record'); ?></h3>
                       
                            <div class="form-group m-form__group row pp_col dis_tb">
								<div class="col-lg-12">
									<?php 
										$cisd = $data->doc_id;
										$audio = $this->db->select('audio,id')->where('audioid',$cisd)->get('uploads')->result_array();
										foreach ($audio as $audio) { ?>
										<div class="docloopa row">
											<div class="col-md-5" >
												<?php	echo "<b>" . $audio['audio']."</b>"; ?>
											</div>
											<div class="col-md-5">
												<audio controls>
													<source src="<?php echo base_url()."/uploads/audio/".$audio['audio']; ?>" type="audio/mpeg">
													<?php echo $this->lang->line('Your_browser_does_not_support_the_audio_element');?>
												
												</audio>
											</div>
											<div class="col-md-2">
												<span class="dwndelbtn">
												<a href="<?=base_url('uploads/audio/' . $audio["audio"]);?>" class='btn btn-success btn-sm' download><?php echo $this->lang->line('Download');?></a> 
												<?php if($this->session->userdata('role_id') == 1) { ?>
												<a href="<?=base_url('admin/c_case/delete_audio_files_pan/' . $audio["audio"].'/'.$cisd);?>" class='btn btn-danger  btn-sm'><?php echo $this->lang->line('Delete');?></a>
												<?php } ?>	
													</span>
											</div>
										</div>
									<?php }?>
								</div>
                            </div>
                        </div>
						
						<div class="form-field-container">
							<div class="form-group m-form__group row">
								<div class="col-lg-12">
									<h3><?php echo $this->lang->line('Documentation'); ?><br>&nbsp;</h3>
								</div>
								<div class="col-lg-12">
									<div class="m_datatable m-datatable m-datatable--default m-datatable--loaded" style="">
									<div class="table-responsive">
											<table class="lp-theme-table lp-large-theme">
											<thead>
												<tr class="netTr">
													<th><?php echo $this->lang->line('Thumb'); ?></th>
													<th><?php echo $this->lang->line('File_Name'); ?></th>
													<th><?php echo $this->lang->line('File_Type'); ?></th>
													<th><?php echo $this->lang->line('Modify_Date');?></th>
													<th><?php echo $this->lang->line('Uploaded_Date'); ?></th>
													<th><?php echo $this->lang->line('Uploaded_by'); ?></th>
													<th><?php echo $this->lang->line('ACTION'); ?></th>
												</tr>
											</thead>
											<tbody>
											<?php 
										foreach ($files as $doc) {
											echo "<tr><td>";
											$ext = pathinfo($doc['name'], PATHINFO_EXTENSION);
											if($ext == 'jpeg' || $ext == 'jpg' || $ext == 'png'){
												$src = base_url()."uploads/case_file/".$doc['name'];
											echo "<img src='".$src."' width='70'>"; 
											
											}
											else if($ext == 'avi' || $ext == 'mp4' || $ext == 'flv' || $ext == 'mov' || $ext == 'wmv' || $ext == '3gp' ){
												echo "<div class='datafiles'><i class='fa fa-video-camera 5x'></i></div>";
											}
											else if($ext == 'mp3' || $ext == 'wav' || $ext == 'ogg' || $ext == 'aac' || $ext == 'mpc' ){
												echo "<div class='datafiles'><i class='fa fa-microphone 5x'></i></div>";
											} else {
												echo "<div class='datafiles'><i class='fa fa-file 5x'></i></div>";
											}
											echo "</td>"; 
											echo "<td><p>".$doc['name']."</p></td>";
											?>
											<td><?php echo pathinfo($doc['name'], PATHINFO_EXTENSION); ?></td>
											<?php
											
											echo "<td><p>".$doc['updatedate']."</p></td>";
											echo "<td><p>".$doc['created']."</p></td>";
											echo "<td><p>".getEmployeeName($doc['uploaded_by'])."</p></td>";
											?>
											
											<td>
											<a href="<?=base_url('uploads/case_file/'.$doc["name"]);?>" class='dwnl' target="_blank" download><i class="fa fa-download"></i></a> 
											<a href="<?=base_url('uploads/case_file/'.$doc["name"]);?>" class='dwnl' target="_blank"><i class="fa fa-eye"></i></a>
											</tr>
											
											<?php
											echo "</div>";
											
										} ?>

											</tbody>
										</table></div>
									</div>
								</div>
							</div>
						</div>


						<div class="form-field-container">
							<div class="form-group m-form__group row">
								<div class="col-lg-12">
									<h3><?php echo $this->lang->line('Data'); ?><br>&nbsp;</h3>
								</div>
								<div class="col-lg-12">
									<div class="m_datatable m-datatable m-datatable--default m-datatable--loaded" style="">
										<div class="table-responsive">
											<div class="table-responsive">
												<table class="lp-theme-table lp-large-theme">
													<thead>
														<tr class="netTr">
															<th><?php echo $this->lang->line('Thumb'); ?></th>
															<th><?php echo $this->lang->line('File_Name'); ?></th>
															<th><?php echo $this->lang->line('File_Type'); ?></th>
															<th><?php echo $this->lang->line('Modify_Date');?></th>
															<th><?php echo $this->lang->line('Uploaded_Date'); ?></th>
															<th><?php echo $this->lang->line('Uploaded_by'); ?></th>
															<th><?php echo $this->lang->line('ACTION'); ?></th>
														</tr>
													</thead>
													<tbody>
														<?php

															$files = $this->db->select('*')->where("(temp_app_id = '$cisd' AND cat_id = 2)", NULL, FALSE)->get('document')->result_array();
														?>
														<?php 
															foreach ($files as $doc) {
																echo "<tr><td>";
																$ext = pathinfo($doc['name'], PATHINFO_EXTENSION);
																if($ext == 'jpeg' || $ext == 'jpg' || $ext == 'png'){
																	$src = base_url()."uploads/case_file/".$doc['name'];
																echo "<img src='".$src."' width='70'>"; 
																
																}
																else if($ext == 'avi' || $ext == 'mp4' || $ext == 'flv' || $ext == 'mov' || $ext == 'wmv' || $ext == '3gp' ){
																	echo "<div class='datafiles'><i class='fa fa-video-camera 5x'></i></div>";
																}
																else if($ext == 'mp3' || $ext == 'wav' || $ext == 'ogg' || $ext == 'aac' || $ext == 'mpc' ){
																	echo "<div class='datafiles'><i class='fa fa-microphone 5x'></i></div>";
																} else {
																	echo "<div class='datafiles'><i class='fa fa-file 5x'></i></div>";
																}
																echo "</td>"; 
																echo "<td><p>".$doc['name']."</p></td>";
																?>
																<td><?php echo pathinfo($doc['name'], PATHINFO_EXTENSION); ?></td>
																<?php
															
																echo "<td><p>".$doc['updatedate']."</p></td>";
																echo "<td><p>".$doc['created']."</p></td>";
																			echo "<td><p>".getEmployeeName($doc['uploaded_by'])."</p></td>";
																?>
																
																<td>
																<a href="<?=base_url('uploads/case_file/'.$doc["name"]);?>" class='dwnl' target="_blank" download><i class="fa fa-download"></i></a> 
																<a href="<?=base_url('uploads/case_file/'.$doc["name"]);?>" class='dwnl' target="_blank"><i class="fa fa-eye"></i></a>
																</td>
																</tr>
																
																<?php
																echo "</div>";
																
															} 
														?>
													</tbody>
												</table>
											</div>
										</div>
									</div>
								</div>
							</div>
                    	</div>
						
						<?php if ($data->add_edit == 1) {?>
							<div class="form-field-container">
								<div class="form-group m-form__group row">
									<div class="col-lg-12">
										<h3><?php echo $this->lang->line('Report'); ?><br>&nbsp;</h3>
									</div>

									<div class="col-lg-12">
										<div class="m_datatable m-datatable m-datatable--default m-datatable--loaded" style="">
										<div class="table-responsive">
												<table class="lp-theme-table lp-large-theme">
												<thead>
													<tr class="netTr">
														<th><?php echo $this->lang->line('Thumb'); ?></th>
														<th><?php echo $this->lang->line('File_Name'); ?></th>
														<th><?php echo $this->lang->line('File_Type'); ?></th>
														<th><?php echo $this->lang->line('Modify_Date');?></th>
														<th><?php echo $this->lang->line('Uploaded_Date'); ?></th>
														<th><?php echo $this->lang->line('Uploaded_by'); ?></th>
														<th><?php echo $this->lang->line('ACTION'); ?></th>
													</tr>
												</thead>
												<tbody>
													<?php

														$files = $this->db->select('*')->where("(temp_app_id = '$cisd' AND cat_id = 4)", NULL, FALSE)->get('document')->result_array();

													?>
													<?php 
														foreach ($files as $doc) {
															echo "<tr><td>";
															$ext = pathinfo($doc['name'], PATHINFO_EXTENSION);
															if($ext == 'jpeg' || $ext == 'jpg' || $ext == 'png'){
																$src = base_url()."uploads/case_file/".$doc['name'];
															echo "<img src='".$src."' width='70'>"; 
															
															}
															else if($ext == 'avi' || $ext == 'mp4' || $ext == 'flv' || $ext == 'mov' || $ext == 'wmv' || $ext == '3gp' ){
																echo "<div class='datafiles'><i class='fa fa-video-camera 5x'></i></div>";
															}
															else if($ext == 'mp3' || $ext == 'wav' || $ext == 'ogg' || $ext == 'aac' || $ext == 'mpc' ){
																echo "<div class='datafiles'><i class='fa fa-microphone 5x'></i></div>";
															} else {
																echo "<div class='datafiles'><i class='fa fa-file 5x'></i></div>";
															}
															echo "</td>"; 
															echo "<td><p>".$doc['name']."</p></td>";
															?>
															<td><?php echo pathinfo($doc['name'], PATHINFO_EXTENSION); ?></td>
															<?php
														
															echo "<td><p>".$doc['updatedate']."</p></td>";
															echo "<td><p>".$doc['created']."</p></td>";
																	echo "<td><p>".getEmployeeName($doc['uploaded_by'])."</p></td>";
															?>
															
															<td>
															<a href="<?=base_url('uploads/case_file/'.$doc["name"]);?>" class='dwnl' target="_blank" download><i class="fa fa-download"></i></a> 
															<a href="<?=base_url('uploads/case_file/'.$doc["name"]);?>" class='dwnl' target="_blank"><i class="fa fa-eye"></i></a>
															</td>
															</tr>
															<?php
															echo "</div>";
														} 
													?>
														
												</tbody>
											</table></div>
										</div>
									</div>
								</div>
							</div>
						<?php } ?>


						<?php if($this->session->userdata('role_id') == 1) { ?>
							<div class="form-field-container">
								<div class="form-group m-form__group row">
									<div class="col-lg-12">
										<h3><?php echo $this->lang->line('Contract'); ?><br>&nbsp;</h3>
									</div>
									<div class="col-lg-12">
										<div class="m_datatable m-datatable m-datatable--default m-datatable--loaded" style="">
											<div class="table-responsive">
												<table class="lp-theme-table lp-large-theme">
													<thead>
														<tr class="netTr">
															<th><?php echo $this->lang->line('Thumb'); ?></th>
															<th><?php echo $this->lang->line('File_Name'); ?></th>
															<th><?php echo $this->lang->line('File_Type'); ?></th>
															<th><?php echo $this->lang->line('Modify_Date');?></th>
															<th><?php echo $this->lang->line('Uploaded_Date'); ?></th>
															<th><?php echo $this->lang->line('Uploaded_by'); ?></th>
															<th><?php echo $this->lang->line('ACTION'); ?></th>
														</tr>
													</thead>
													<tbody>
														<?php
															$files = $this->db->select('*')->where("(temp_app_id = '$cisd' AND cat_id = 3)", NULL, FALSE)->get('document')->result_array();
														?>
														<?php 
															foreach ($files as $doc) {
																echo "<tr><td>";
																$ext = pathinfo($doc['name'], PATHINFO_EXTENSION);
																if($ext == 'jpeg' || $ext == 'jpg' || $ext == 'png'){
																	$src = base_url()."uploads/case_file/".$doc['name'];
																echo "<img src='".$src."' width='70'>"; 
																
																}
																else if($ext == 'avi' || $ext == 'mp4' || $ext == 'flv' || $ext == 'mov' || $ext == 'wmv' || $ext == '3gp' ){
																	echo "<div class='datafiles'><i class='fa fa-video-camera 5x'></i></div>";
																}
																else if($ext == 'mp3' || $ext == 'wav' || $ext == 'ogg' || $ext == 'aac' || $ext == 'mpc' ){
																	echo "<div class='datafiles'><i class='fa fa-microphone 5x'></i></div>";
																} else {
																	echo "<div class='datafiles'><i class='fa fa-file 5x'></i></div>";
																}
																echo "</td>"; 
																echo "<td><p>".$doc['name']."</p></td>";
																?>
																<td><?php echo pathinfo($doc['name'], PATHINFO_EXTENSION); ?></td>
																<?php
															
																echo "<td><p>".$doc['updatedate']."</p></td>";
																echo "<td><p>".$doc['created']."</p></td>";
																		echo "<td><p>".getEmployeeName($doc['uploaded_by'])."</p></td>";
																?>
																
																<td>
																<a href="<?=base_url('uploads/case_file/'.$doc["name"]);?>" class='dwnl' target="_blank" download><i class="fa fa-download"></i></a> 
																<a href="<?=base_url('uploads/case_file/'.$doc["name"]);?>" class='dwnl' target="_blank"><i class="fa fa-eye"></i></a>
																</td>
																</tr>
																
																<?php		
															} ?>

													</tbody>
												</table>
											</div>
										</div>
									</div>
								</div>
							</div>
						<?php } ?>

						
						<div class="form-field-container">
							<div class="form-group m-form__group row">
								<div class="col-lg-12">
									<h3><?php echo $this->lang->line('Procuation'); ?><br>&nbsp;</h3>
								</div>
								<div class="col-lg-12">
									<div class="m_datatable m-datatable m-datatable--default m-datatable--loaded" style="">
									<div class="table-responsive">
											<table class="lp-theme-table lp-large-theme">
											<thead>
												<tr class="netTr">
													<th><?php echo $this->lang->line('Thumb'); ?></th>
													<th><?php echo $this->lang->line('File_Name'); ?></th>
													<th><?php echo $this->lang->line('File_Type'); ?></th>
													<th><?php echo $this->lang->line('Modify_Date');?></th>
													<th><?php echo $this->lang->line('Uploaded_Date'); ?></th>
													<th><?php echo $this->lang->line('Uploaded_by'); ?></th>
													<th><?php echo $this->lang->line('ACTION'); ?></th>
												</tr>
											</thead>
											<tbody>
												<?php
													$files = $this->db->select('*')->where("(temp_app_id = '$cisd'  AND cat_id = 6)", NULL, FALSE)->get('document')->result_array();
												?>
												<?php 
													foreach ($files as $doc) {
														echo "<tr><td>";
														$ext = pathinfo($doc['name'], PATHINFO_EXTENSION);
														if($ext == 'jpeg' || $ext == 'jpg' || $ext == 'png'){
															$src = base_url()."uploads/case_file/".$doc['name'];
														echo "<img src='".$src."' width='70'>"; 
														
														}
														else if($ext == 'avi' || $ext == 'mp4' || $ext == 'flv' || $ext == 'mov' || $ext == 'wmv' || $ext == '3gp' ){
															echo "<div class='datafiles'><i class='fa fa-video-camera 5x'></i></div>";
														}
														else if($ext == 'mp3' || $ext == 'wav' || $ext == 'ogg' || $ext == 'aac' || $ext == 'mpc' ){
															echo "<div class='datafiles'><i class='fa fa-microphone 5x'></i></div>";
														} else {
															echo "<div class='datafiles'><i class='fa fa-file 5x'></i></div>";
														}
														echo "</td>"; 
														echo "<td><p>".$doc['name']."</p></td>";
														?>
														<td><?php echo pathinfo($doc['name'], PATHINFO_EXTENSION); ?></td>
														<?php
													
														echo "<td><p>".$doc['updatedate']."</p></td>";
														echo "<td><p>".$doc['created']."</p></td>";
														echo "<td><p>".getEmployeeName($doc['uploaded_by'])."</p></td>";
														?>
														
														<td>
														<a href="<?=base_url('uploads/case_file/'.$doc["name"]);?>" class='dwnl' target="_blank" download><i class="fa fa-download"></i></a> 
														<a href="<?=base_url('uploads/case_file/'.$doc["name"]);?>" class='dwnl' target="_blank"><i class="fa fa-eye"></i></a>
														</td>
														</tr>
														
														<?php
														
														
												} ?>

											</tbody>
										</table></div>
									</div>
								</div>
							</div>
						</div>

						<div class="form-field-container">
							<div class="form-group m-form__group row">
								<div class="col-lg-12">
									<h3><?php echo $this->lang->line('Referrals'); ?><br>&nbsp;</h3>
								</div>
								<div class="col-lg-12">
									<div class="m_datatable m-datatable m-datatable--default m-datatable--loaded" style="">
									<div class="table-responsive">
											<table class="lp-theme-table lp-large-theme">
											<thead>
												<tr class="netTr">
													<th><?php echo $this->lang->line('Thumb'); ?></th>
													<th><?php echo $this->lang->line('File_Name'); ?></th>
													<th><?php echo $this->lang->line('File_Type'); ?></th>
													<th><?php echo $this->lang->line('Modify_Date');?></th>
													<th><?php echo $this->lang->line('Uploaded_Date'); ?></th>
													<th><?php echo $this->lang->line('Uploaded_by'); ?></th>
													<th><?php echo $this->lang->line('ACTION'); ?></th>
												</tr>
											</thead>
											<tbody>
												<?php
													$files = $this->db->select('*')->where("(temp_app_id = '$cisd'  AND cat_id = 7)", NULL, FALSE)->get('document')->result_array();
												?>
												<?php 
													foreach ($files as $doc) {
														echo "<tr><td>";
														$ext = pathinfo($doc['name'], PATHINFO_EXTENSION);
														if($ext == 'jpeg' || $ext == 'jpg' || $ext == 'png'){
															$src = base_url()."uploads/case_file/".$doc['name'];
														echo "<img src='".$src."' width='70'>"; 
														
														}
														else if($ext == 'avi' || $ext == 'mp4' || $ext == 'flv' || $ext == 'mov' || $ext == 'wmv' || $ext == '3gp' ){
															echo "<div class='datafiles'><i class='fa fa-video-camera 5x'></i></div>";
														}
														else if($ext == 'mp3' || $ext == 'wav' || $ext == 'ogg' || $ext == 'aac' || $ext == 'mpc' ){
															echo "<div class='datafiles'><i class='fa fa-microphone 5x'></i></div>";
														} else {
															echo "<div class='datafiles'><i class='fa fa-file 5x'></i></div>";
														}
														echo "</td>"; 
														echo "<td><p>".$doc['name']."</p></td>";
														?>
														<td><?php echo pathinfo($doc['name'], PATHINFO_EXTENSION); ?></td>
														<?php
															if($doc['user_id'] != 0 ){
															$user = $this->db->select('name')->where('id',$doc['user_id'])->get('users')->row();
														} else {
															$user = $this->db->select('name')->where('id',$doc['customer_id'])->get('users')->row();
														}
														echo "<td><p>".$doc['updatedate']."</p></td>";
														echo "<td><p>".$doc['created']."</p></td>";
														echo "<td><p>".$user->name."</p></td>";
														?>
														
														<td>			
														<a href="<?=base_url('uploads/case_file/'.$doc["name"]);?>" class='dwnl' target="_blank" download><i class="fa fa-download"></i></a> 
														<a href="<?=base_url('uploads/case_file/'.$doc["name"]);?>" class='dwnl' target="_blank"><i class="fa fa-eye"></i></a>
														</tr>
														
														<?php
													} 
												?>

											</tbody>
										</table></div>
									</div>
								</div>
							</div>
						</div>

                        
						<div class="form-field-container">
							<div class="form-group m-form__group row">
								<div class="col-lg-12">
									<h3><?php echo $this->lang->line('Session'); ?><br>&nbsp;</h3>
								</div>
								<div class="col-lg-12">
									<div class="m_datatable m-datatable m-datatable--default m-datatable--loaded" style="">
									<div class="table-responsive">
											<table class="lp-theme-table lp-large-theme">
											<thead>
												<tr class="netTr">
													<th><?php echo $this->lang->line('No'); ?></th>
													<th><?php echo $this->lang->line('E_Service_No'); ?></th>
													<th><?php echo $this->lang->line('Sub_Mission'); ?></th>
													<th><?php echo $this->lang->line('Session_Number'); ?></th>
													<th><?php echo $this->lang->line('Session_Date'); ?></th>
													<th><?php echo $this->lang->line('Session_End_Date'); ?></th>
													<th><?php echo $this->lang->line('Client_Name'); ?></th>
													<th><?php echo $this->lang->line('Note'); ?></th>
												</tr>
											</thead>
											<tbody>

											<?php 
												$count=1;
												foreach($session as $appoinment){  ?>
												<tr style="text-align: center;" class="hide<?php echo $appoinment['id'] ?>">
													<td><?= $count++ ?></td>
													<td><?= $appoinment['case_number'] ?></td>
													<td><a href="https://albarakatilaw.com/admin/mission_session/list_mission/<?php echo $appoinment['id'] ?>" class="num_tab" style="background-color: green;"><?php echo	getMissionCount( $appoinment['id'],"session_mission"); ?></a> </td>
													<td><?= $appoinment['session_number'] ?></td>
													
													<td><?php echo getTheDayAndDateFromDatePan($appoinment['session_date']);?></td>
													<td><?php echo getTheDayAndDateFromDatePan($appoinment['session_end_date']) ?></td>
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
												<?php } 
											?>

											</tbody>
										</table></div>
									</div>
								</div>
							</div>
						</div>

						<div class="form-field-container">
							<div class="form-group m-form__group row">
								<div class="col-lg-12">
									<h3><?php echo $this->lang->line('Writings'); ?><br>&nbsp;</h3>
								</div>
								<div class="col-lg-12">
									<div class="m_datatable m-datatable m-datatable--default m-datatable--loaded" style="">
									<div class="table-responsive">
											<table class="lp-theme-table lp-large-theme">
											<thead>
												<tr class="netTr">
													<th><?php echo $this->lang->line('No'); ?></th>
													<th><?php echo $this->lang->line('E_Service_No'); ?></th>
													<th><?php echo $this->lang->line('Sub_Mission'); ?></th>
													<th><?php echo $this->lang->line('Writing_Number'); ?></th>
													<th><?php echo $this->lang->line('Writing_Date'); ?></th>
													<th><?php echo $this->lang->line('Writing_End_Date'); ?></th>
													<th><?php echo $this->lang->line('Client_Name'); ?></th>
													<th><?php echo $this->lang->line('Note'); ?></th>
												</tr>
											</thead>
											<tbody>
												<?php 
												$count=1;
												foreach($writings as $appoinment){  ?>
												<tr style="text-align: center;" class="hide<?php echo $appoinment['id'] ?>">
													<td><?= $count++ ?></td>
													<td><?= $appoinment['case_number'] ?></td>
													<td><a href="https://albarakatilaw.com/admin/mission_writings/list_mission/<?php echo $appoinment['id'] ?>" class="num_tab" style="background-color: green;"><?php echo	getMissionCount( $appoinment['id'],"writing_misssion"); ?></a> </td>
													<td><?= $appoinment['session_number'] ?></td>
													
													<td><?php echo getTheDayAndDateFromDatePan($appoinment['session_date']);?></td>
													<td><?php echo getTheDayAndDateFromDatePan($appoinment['session_end_date']) ?></td>
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
										</table></div>
									</div>
								</div>
							</div>
						</div>                          

						<div class="form-field-container">
							<div class="form-group m-form__group row">
								<div class="col-lg-12">
									<h3><?php echo $this->lang->line('Consultation'); ?><br>&nbsp;</h3>
								</div>
								<div class="col-lg-12">
									<div class="m_datatable m-datatable m-datatable--default m-datatable--loaded" style="">
									<div class="table-responsive">
											<table class="lp-theme-table lp-large-theme">
											<thead>
												<tr class="netTr">
													<th><?php echo $this->lang->line('No'); ?></th>
													<th><?php echo $this->lang->line('E_Service_No'); ?></th>
													<th><?php echo $this->lang->line('Sub_Mission'); ?></th>
													<th><?php echo $this->lang->line('Consultation_Number'); ?></th>
													<th><?php echo $this->lang->line('Consultation_Date'); ?></th>
													<th><?php echo $this->lang->line('Consultation_End_Date'); ?></th>
													<th><?php echo $this->lang->line('Client_Name'); ?></th>
													<th><?php echo $this->lang->line('Note'); ?></th>
												</tr>
											</thead>
											<tbody>
												<?php
												$count=1;
												foreach($consultation as $appoinment){  ?>
												<tr style="text-align: center;" class="hide<?php echo $appoinment['id'] ?>">
												<td><?= $count++ ?></td>
													<td><?= $appoinment['case_number'] ?></td>
													<td><a href="https://albarakatilaw.com/admin/mission_consultation/list_mission/<?php echo $appoinment['id'] ?>" class="num_tab" style="background-color: green;"><?php echo	getMissionCount( $appoinment['id'],"consultation_mission"); ?></a> </td>
												<td><?= $appoinment['session_number'] ?></td>
												
												<td><?php echo getTheDayAndDateFromDatePan($appoinment['session_date']);?></td>
												<td><?php echo getTheDayAndDateFromDatePan($appoinment['session_end_date']) ?></td>
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
										</table></div>
									</div>
								</div>
							</div>
						</div>
             
						<div class="form-field-container">
							<div class="form-group m-form__group row">
								<div class="col-lg-12">
									<h3><?php echo $this->lang->line('Visiting'); ?><br>&nbsp;</h3>
								</div>
								<div class="col-lg-12">
									<div class="m_datatable m-datatable m-datatable--default m-datatable--loaded" style="">
									<div class="table-responsive">
											<table class="lp-theme-table lp-large-theme">
											<thead>
												<tr class="netTr">
													<th><?php echo $this->lang->line('No'); ?></th>
													<th><?php echo $this->lang->line('E_Service_No'); ?></th>
													<th><?php echo $this->lang->line('Sub_Mission'); ?></th>
													<th><?php echo $this->lang->line('Visiting_Number'); ?></th>
													<th><?php echo $this->lang->line('Visiting_Date'); ?></th>
													<th><?php echo $this->lang->line('Visiting_End_Date'); ?></th>
													<th><?php echo $this->lang->line('Client_Name'); ?></th>
													<th><?php echo $this->lang->line('Note'); ?></th>
												</tr>
											</thead>
											<tbody>

												<?php
												$count=1;
												foreach($visiting as $appoinment){  ?>
												<tr style="text-align: center;"  class="hide<?php echo $appoinment['id'] ?>">
												<td><?= $count++ ?></td>
													<td><?= $appoinment['case_number'] ?></td>
													<td><a href="https://albarakatilaw.com/admin/mission_visiting/list_mission/<?php echo $appoinment['id'] ?>" class="num_tab" style="background-color: green;"><?php echo	getMissionCount( $appoinment['id'],"visiting_mission"); ?></a> </td>
												<td><?= $appoinment['session_number'] ?></td>
												
												<td><?php echo getTheDayAndDateFromDatePan($appoinment['session_date']);?></td>
												<td><?php echo getTheDayAndDateFromDatePan($appoinment['session_end_date']) ?></td>
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
										</table></div>
									</div>
								</div>
							</div>
						</div>

                        <div class="form-field-container">
							<div class="form-group m-form__group row">
								<div class="col-lg-12">
									<h3><?php echo $this->lang->line('GENERAL'); ?><br>&nbsp;</h3>
								</div>
								<div class="col-lg-12">
									<div class="m_datatable m-datatable m-datatable--default m-datatable--loaded" style="">
									<div class="table-responsive">
											<table class="lp-theme-table lp-large-theme">
											<thead>
												<tr class="netTr">
													<th><?php echo $this->lang->line('No'); ?></th>
													<th><?php echo $this->lang->line('E_Service_No'); ?></th>
													<th><?php echo $this->lang->line('Sub_Mission'); ?></th>
													<th><?php echo $this->lang->line('General_Number'); ?></th>
													<th><?php echo $this->lang->line('General_Date'); ?></th>
													<th><?php echo $this->lang->line('General_End_Date'); ?></th>
													<th><?php echo $this->lang->line('Client_Name'); ?></th>
													<th><?php echo $this->lang->line('Note'); ?></th>
												</tr>
											</thead>
											<tbody>

												<?php
												$count=1;
												foreach($general as $appoinment){  ?>
												<tr style="text-align: center;"  class="hide<?php echo $appoinment['id'] ?>">
												<td><?= $count++ ?></td>
													<td><?= $appoinment['case_number'] ?></td>
													<td><a href="https://albarakatilaw.com/admin/mission_general/list_mission/<?php echo $appoinment['id'] ?>" class="num_tab" style="background-color: green;"><?php echo	getMissionCount( $appoinment['id'],"general_mission"); ?></a> </td>
												<td><?= $appoinment['session_number'] ?></td>
												
												<td><?php echo getTheDayAndDateFromDatePan($appoinment['session_date']);?></td>
												<td><?php echo getTheDayAndDateFromDatePan($appoinment['session_end_date']) ?></td>
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
						</div>
              
					</div>
                </form>

                <!--end::Form-->
            </div>

            <!--end::Portlet-->
        </div>
    </div>
    


<?php

include('footer.php');