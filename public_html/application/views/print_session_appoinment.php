<table class="main">
	<tr>
    	<td class="main_1">
        	<table cellpadding="0" cellspacing="0" border="0" width="100%">
            	<tr>
                	<td align="center"><img src="<?php echo base_url();?>assets/front/assets/images/logo.png" alt="" height="100" border="0" style="display:block; margin:0px;" /></td>
                </tr>
            </table>
        </td>
    </tr>
    <tr>
    	<td class="main_2">
        	<table cellpadding="0" cellspacing="0" border="0" width="700">
            	<tr>
                	<td valign="top" width="350">
                    	<b>Case ID: </b><?php echo $data->id; ?>
                    </td>
                	<td valign="top" width="350">
                    	<b>Date: </b><?php echo $data->createdate; ?>
                    </td>
                </tr>
            </table>
        </td>
    </tr>		
    <tr><td height="2" style="background:#cccccc;"></td></tr>
    <tr><td height="10"></td></tr>
	<tr>
    	<td style="padding:10px 15px 10px 15px;">
    		<table width="100%" class="blueTable">
					<tr>
						<td style="width: 33%"><strong>Identification Number: </strong><?php echo $data->identification_number; ?></td>
						<td style="width: 33%"><strong>Identification Types: </strong><?php echo $data->identification_types; ?></td>
						<td style="width: 33%"><strong>Client File Number: </strong><?php echo $data->client_file_number; ?></td>
					</tr>
					<tr>	
						<td style="width: 33%"><strong>Client Name: </strong><?php echo $data->client_name; ?></td>
						<td style="width: 33%"><strong>Branch: </strong><?php echo getBranchName($data->branch); ?></td>
						<td style="width: 33%"><strong>Total of Session  Number: </strong><?php echo $data->total_of_session_number;?></td>
					</tr>
					<tr>
						<td style="width: 33%"><strong>Session Number: </strong><?php echo $data->session_number; ?></td>
						<td style="width: 33%"><strong>Session Date: </strong><?php echo $data->session_date; ?></td>
						<td style="width: 33%"><strong>Session Time: </strong><?php echo $data->session_time; ?></td>
					</tr>
					<tr>				
						<td style="width: 33%"><strong>Session Code: </strong><?php echo $data->session_code;?></td>
						<td style="width: 33%"><strong>Case Code: </strong><?php echo $data->case_code;?></td>
						<td style="width: 33%"><strong>Case Type: </strong><?php echo $data->case_type; ?></td>
					</tr>
					<tr>	
						<td style="width: 33%"><strong>Case Number: </strong><?php echo $data->case_number; ?></td>
						<td style="width: 33%"><strong>Case Title: </strong><?php echo $data->case_title; ?></td>
						<td style="width: 33%"><strong>Case Date: </strong><?php echo $data->case_date; ?></td>
					</tr>	
					<tr>
						<td style="width: 33%"><strong>Case Start Date: </strong><?php echo $data->case_start_date; ?></td>
						<td style="width: 33%"><strong>Contract number: </strong><?php echo $data->contact_number; ?></td>
						<td style="width: 33%"><strong>Opponent Full Name: </strong><?php echo $data->opponent_full_name; ?></td>
					</tr>
					<tr>	
						<td style="width: 33%"><strong>Opponent Note: </strong><?php echo $data->opponent_note; ?></td>
						<td style="width: 33%"><strong>Opponent Phone: </strong><?php echo $data->opponent_phone; ?></td>
						<td style="width: 33%"><strong>Court Name: </strong><?php echo $data->court_number; ?></td>
					</tr>
					<tr>	
						<td style="width: 33%"><strong>Court Number: </strong><?php echo $data->court_number; ?></td>
						<td style="width: 33%"><strong>Court Address: </strong><?php echo $data->court_address; ?></td>
						<td style="width: 33%"><strong>Judge Name: </strong><?php echo $data->judge_name; ?></td>
					</tr>
					<tr>	
						<td style="width: 33%"><strong>Opponent Lawyer Name: </strong><?php echo $data->opponent_lawyer_name; ?></td>
						<td style="width: 33%"><strong>Responsible Employee: </strong><?php echo $data->responsible_employee; ?></td>
						<td style="width: 33%"><strong>Follow-up Employee: </strong><?php echo $data->follow_up_employee; ?></td>
					</tr>
					<tr>	
						<td style="width: 33%"><strong>Department: </strong><?php echo $data->department; ?></td>
						<td style="width: 33%"><strong>Note: </strong><?php echo $data->note; ?></td>
						<td style="width: 33%"><strong>Uploaded File: </strong><img src="<?php echo base_url();?>/uploads/<?php echo $data->upload_file; ?>" width="200"> </td>
					</tr>
			</table>
			<table>
				<tr>
					<td style="width: 33%"><strong>Email: </strong><?php echo $this->session->userdata('admin_email');  ?></td>
					<td style="width: 33%"><strong>Contact No: </strong><?php  echo $this->session->userdata('admin_phone'); ?></td>
					<td style="width: 33%"><strong>Address: </strong><?php echo $this->session->userdata('admin_address'); ?>
					</td>
				</tr>
			</table>
		</td>
	</tr>		
</table>
		