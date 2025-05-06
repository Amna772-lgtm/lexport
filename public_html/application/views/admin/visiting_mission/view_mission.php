<?php include __DIR__ . "/../header.php"; ?>

    <style>
        .m-form.m-form--group-seperator-dashed .m-form__group {
            border-bottom: 0px dashed #ebedf2;
        }
        .thh h3{
            background: #1F3958;
            color: #fff;
            font-weight: bold;
            font-size: 15px;
            text-transform: uppercase;
            padding: 10px 10px 10px 29px;
            -webkit-border-top-left-radius: 20px !important;
            -webkit-border-top-right-radius: 20px !important;
            -moz-border-radius-topleft: 20px !important;
            -moz-border-radius-topright: 20px !important;
            border-top-left-radius: 20px !important;
            border-top-right-radius: 20px !important;
            margin: 15px 15px 0 15px;
        }
        .in_fo{
            box-shadow: 0px 5px 10px 0px #cccccc !important;
            margin: 0 15px;
            padding-bottom: 20px;
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
        .m-portlet {
            margin-bottom: 0;
        }
        .m-widget4 .m-widget4__item .m-widget4__info {
            width: 97.2%;
        }
    </style>

    <div class="m-grid__item m-grid__item--fluid m-wrapper">


        <!-- END: Subheader -->
        <div class="m-content">

            <!--begin::Portlet-->
            <div class="m-portlet">
                <div class="m-portlet__head">
                    <div class="m-portlet__head-caption">
                        <div class="m-portlet__head-title">
                            <h3 class="m-portlet__head-text">
                                <?php echo $this->lang->line('View');?>
                            </h3>
                        </div>
                    </div>
                </div>


                <div class="m-portlet__body" style="padding-bottom: 0 !important;">
                    <div class="row">
                        <div class="col-md-6">
                            <ul>
                                <li><h3><b><?php echo $this->lang->line('client_File_number');?>:</b> <?php echo $data->client_file_number; ?></h3></li>
                              <li><h3><b><?php echo $this->lang->line('Date');?>:</b> <?php  echo getTheDayAndDateFromDatePan($data->session_date); ?></h3></li>
                            </ul>
                        </div>
                           <!--    <div class="col-md-6" style="text-align: right">
                            <a href="<?= base_url("admin/mission_visiting/print_pdf/{$data->id}") ?>" class="btn btn-success" download=""><?php echo $this->lang->line('PDF');?></a>
                            <a href="#" onclick="window.print()" class="btn btn-success" download=""><?php echo $this->lang->line('Print');?></a>
                        </div> -->
                    </div>
                </div>

                <!--begin::Form-->
                <form class="m-form m-form--fit m-form--label-align-right m-form--group-seperator-dashed">
                    <div class="m-portlet__body">

                        <div class="row thh">
                            <div class="col-lg-12">
                                <h3><?php echo $this->lang->line('Information');?></h3>
                            </div>
                        </div>
                        <div class="in_fo">
                            <div class="form-group m-form__group row">
           	<div class="form-group col-sm-4">
			<label for="court_name" class=" form-control-label"><strong><?php echo $this->lang->line('Identification_Numbers');?>: </strong><?php echo $data->identification_number; ?></label>
			</div>
			<div class="form-group col-sm-4">
				<label for="court_name" class=" form-control-label"><strong><?php echo $this->lang->line('identification_types');?>: </strong><?php echo $data->identification_types; ?></label>
			</div>
			<div class="form-group col-sm-4">
			<label for="court_name" class=" form-control-label"><strong><?php echo $this->lang->line('client_File_number');?>: </strong><?php echo $data->client_file_number; ?></label>
			</div>
			<div class="form-group col-sm-4">	
			<label for="court_name" class=" form-control-label"><strong><?php echo $this->lang->line('Client_Name');?>: </strong><?php echo $data->client_name; ?></label>
			</div>
			<div class="form-group col-sm-4">	
			<label for="court_name" class=" form-control-label"><strong><?php echo $this->lang->line('branch');?>: </strong><?php echo getBranchName($data->branch); ?></label>
			</div>
			 
			<div class="form-group col-sm-4">
				<label for="court_name" class=" form-control-label"><strong><?php echo $this->lang->line('Visiting_Number');?>: </strong><?php echo $data->session_number; ?></label>
			</div>
			<div class="form-group col-sm-4">
			<label for="court_name" class=" form-control-label"><strong><?php echo $this->lang->line('Visiting_Date');?>: </strong><?php  echo getTheDayAndDateFromDatePan($data->session_date); ?></label>
			</div>
			<div class="form-group col-sm-4">	
			<label for="court_name" class=" form-control-label"><strong><?php echo $this->lang->line('Visiting_Time');?>: </strong><?php echo $data->session_time; ?></label>
			</div>
			<div class="form-group col-sm-4">	
			<label for="court_name" class=" form-control-label"><strong><?php echo $this->lang->line('Visiting_End_Date');?>: </strong><?php echo getTheDayAndDateFromDatePan($data->session_end_date);  ?></label>
			</div>
			<div class="form-group col-sm-4">	
			<label for="court_name" class=" form-control-label"><strong><?php echo $this->lang->line('Visiting_End_Time');?>: </strong><?php echo $data->session_end_time; ?></label>
			</div>
			<div class="form-group col-sm-4">	
			<label for="court_name" class=" form-control-label"><strong><?php echo $this->lang->line('Mission_Status');?>: </strong><?php echo $data->session_code;?></label>
			</div>
				<!--<div class="form-group col-sm-4">	
			<label for="court_name" class=" form-control-label"><strong><?php echo $this->lang->line('Mission_Status');?>: </strong><?php echo $data->session_code;?></label>
			</div>
		    <div class="form-group col-sm-4">	
			<label for="court_name" class=" form-control-label"><strong>Case Code: </strong><?php echo $data->case_code;?></label>
			</div>-->
			<div class="form-group col-sm-4">	
			<label for="court_name" class=" form-control-label"><strong><?php echo $this->lang->line('E_Service_Type');?>: </strong><?php echo getCaseType($data->case_type); ?></label>
			</div>
			<div class="form-group col-sm-4">	
			<label for="court_name" class=" form-control-label"><strong><?php echo $this->lang->line('E_Service_Number');?>: </strong><?php echo $data->case_number; ?></label>
			</div>
			<!--<div class="form-group col-sm-4">	
			<label for="court_name" class=" form-control-label"><strong>Case Title: </strong><?php echo $data->case_title; ?></label>
			</div>-->
			<div class="form-group col-sm-4">	
			<label for="court_name" class=" form-control-label"><strong><?php echo $this->lang->line('E_Service_Date');?>: </strong><?php  echo getTheDayAndDateFromDatePan($data->case_date); ?></label>
			</div>
			<div class="form-group col-sm-4">	
			<label for="court_name" class=" form-control-label"><strong><?php echo $this->lang->line('E_Service_Start_Date');?>: </strong><?php echo getTheDayAndDateFromDatePan($data->case_start_date); ?></label>
			</div>
			<div class="form-group col-sm-4">	
			<label for="court_name" class=" form-control-label"><strong><?php echo $this->lang->line('Contract_number');?>: </strong><?php echo $data->contract_number; ?></label>
			</div>
			<div class="form-group col-sm-4">	
			<label for="court_name" class=" form-control-label"><strong><?php echo $this->lang->line('Opponent_Full_Name');?>: </strong><?php echo $data->opponent_full_name; ?></label>
			</div>
			<div class="form-group col-sm-4">	
			<label for="court_name" class=" form-control-label"><strong><?php echo $this->lang->line('Opponent_Note');?>: </strong><?php echo $data->opponent_note; ?></label>
			</div>
			<div class="form-group col-sm-4">	
			<label for="court_name" class=" form-control-label"><strong><?php echo $this->lang->line('Opponent_Phone');?>: </strong><?php echo $data->opponent_phone; ?></label>
			</div>
			<div class="form-group col-sm-4">	
			<label for="court_name" class=" form-control-label"><strong><?php echo $this->lang->line('Opponent_Lawyer_Name');?>: </strong><?php echo $data->opponent_lawyer; ?></label>
			</div>
			<div class="form-group col-sm-4">	
			<label for="court_name" class=" form-control-label"><strong><?php echo $this->lang->line('Court_Name');?>: </strong><?php echo $data->court_number; ?></label>
			</div>
			<div class="form-group col-sm-4">	
			<label for="court_name" class=" form-control-label"><strong><?php echo $this->lang->line('Court_Number');?>: </strong><?php echo $data->court_number; ?></label>
			</div>
			<div class="form-group col-sm-4">	
			<label for="court_name" class=" form-control-label"><strong><?php echo $this->lang->line('Court_Address');?>: </strong><?php echo $data->court_address; ?></label>
			</div>
			<div class="form-group col-sm-4">	
			<label for="court_name" class=" form-control-label"><strong><?php echo $this->lang->line('Judge_Name');?>: </strong><?php echo $data->judge_name; ?></label>
			</div>
			<div class="clear"></div>
			<div class="form-group col-sm-4">	
			<label for="court_name" class=" form-control-label"><strong><?php echo $this->lang->line('Judicial_Circuit');?> </strong><?php echo $data->department; ?></label>
			</div>
			<div class="form-group col-sm-4">	
			<label for="court_name" class=" form-control-label"><strong><?php echo $this->lang->line('Visiting_Place');?>: </strong><?php echo $data->visiting_place; ?></label>
			</div>
			<div class="form-group col-sm-4">	
			<label for="court_name" class=" form-control-label"><strong><?php echo $this->lang->line('Who_visit_to_who');?>: </strong><?php echo $data->who_visit; ?></label>
			</div>
		
			<div class="form-group col-sm-4">	
			<label for="court_name" class=" form-control-label"><strong><?php echo $this->lang->line('Responsible_Employee');?>: </strong><?php echo getEmployeeName($data->responsible_employee); ?></label>
			</div>
			<div class="form-group col-sm-4">	
			<label for="court_name" class=" form-control-label"><strong><?php echo $this->lang->line('Follow_up_Employee');?>: </strong><?php echo getEmployeeName($data->follow_up_employee); ?></label>
			</div>
			<div class="form-group col-sm-4">	
			<label for="court_name" class=" form-control-label"><strong><?php echo $this->lang->line('Requirement');?>: </strong><?php echo $data->note; ?></label>
			</div>
                                <div class="col-lg-12" style=" margin-bottom: 30px; ">
                                    <label class=""><?php echo $this->lang->line('Report');?></label>
                                    <div class="form-control m-input" style="height: 100%;" readonly><?php echo $data->report; ?></div>
                                </div>

                            </div>
                        </div>



                        <div class="row thh">
                            <div class="col-lg-12">
                                <h3><?php echo $this->lang->line('Audio_Record_List');?></h3>
                            </div>
                        </div>
                        <div class="in_fo">

<?php   $temp_app_id = $data->id; ?>
<?php  $case_id = $data->session_number; ?>
                       <div class="form-group m-form__group row">
							<?php 
			$cisd = $data->case_id;

			$audio = $this->db->select('audio,id')->where('audioid',$case_id)->where('type','visiting')->get('uploads')->result_array();
			foreach ($audio as $audio) { ?>
			
                                <div class="col-md-4">
                                    <h3>	<?php	echo "<b>" . $audio['audio']."</b>"; ?></h3>
                                </div>
                                <div class="col-md-4">
                           			<audio controls style="height: 35px;">
				  <source src="<?php echo base_url()."/uploads/audio/".$audio['audio']; ?>" type="audio/mpeg">
				  <?php echo $this->lang->line('Your_browser_does_not_support_the_audio_element');?>
				
				</audio>
                                </div>
                                <div class="col-md-4" style="text-align: right">
                                    <a href="<?=base_url('uploads/audio/' . $audio["audio"]);?>"  target="_blank" class="btn btn-success" download=""><?php echo $this->lang->line('Download');?></a>
                                </div>
												<?php }?>
                            </div>

                        </div>
                        </div>


                        <div class="row thh"  id="attechmntrec">
                            <div class="col-lg-12">
                                <h3><?php echo $this->lang->line('Attached_Files_List');?></h3>
                            </div>
                        </div>
                        <div class="in_fo">    
						<div class="m-widget4">
						    <?php  
				            $files = $this->db->select('*')->where("(temp_app_id = '$temp_app_id' AND cat_id = 8 AND type='visiting')", NULL, FALSE)->get('document')->result_array();
								foreach ($files as $files) { ?>
											   

                                <div class="m-widget4__item">
                                    <div class="m-widget4__info">
                                        <span class="m-widget4__title"><?php echo "<b>" . $files['name']."</b>";?></span><br>
                                        <span class="m-widget4__sub"><?php  echo "<span class='empnm'>(Upoded By ".getEmployeeName($files['user_id']).")</span>";?></span>
                                    </div>
                                    <span class="m-widget4__ext">
                                        <span class="m-widget4__number m--font-brand">
                                            <a href="<?=base_url('uploads/case_file/' . $files["name"]);?>"  target="_blank" class="btn btn-success"><i class="fa fa-download"></i></a>
                                        </span>
                                    </span>
                                </div>			
                            <?php }?>
                                

                            </div>

                        </div>
                                
                    </div>
                </form>

                <!--end::Form-->
            </div>

            <!--end::Portlet-->
        </div>
    </div>
<?php include __DIR__ . "/../footer.php"; ?>