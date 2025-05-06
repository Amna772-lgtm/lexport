<table cellpadding="0" cellspacing="0" border="0" width="700" align="center" style="background:#f3f3f3; font-family:Arial, Helvetica, sans-serif; font-size:14px; font-weight:normal; line-height:22px;">
	<tr>
    	<td style="background:#421F23; padding:20px 20px 20px 20px;">
        	<table cellpadding="0" cellspacing="0" border="0" width="100%">
            	<tr>
                	<td align="center"><img src="<?php echo base_url();?>assets/front/assets/images/logo.png" alt="" height="100" border="0" style="display:block; margin:0px;" /></td>
                </tr>
            </table>
        </td>
    </tr>
	<tr>
    	<td style="padding:20px 15px 10px 15px;">
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
        	<table cellpadding="0" cellspacing="0" border="0" width="700">
            	<tr>
                	<td valign="top" width="233">
                    	<strong>Identification Number:</strong><br />
                    	<?php echo isset($data->identification_number)? $data->identification_number : '-'; ?> <br />
               			<strong style="padding:5px 0px 0px 0px;">Identification Types:</strong><br />
                    	<?php echo isset($data->identification_types)? $data->identification_types : '-'; ?> <br />
               			<strong style="padding:5px 0px 0px 0px;">Client File Number:</strong><br />
                    	<?php echo isset($data->client_file_number)? $data->client_file_number : '-'; ?>
                    </td>
                	<td valign="top">
                        <strong>Client Name: </strong><br />
                    	<?php echo isset($data->client_name)? $data->client_name : '-'; ?> <br />
                    	<strong style="padding:5px 0px 0px 0px;">Branch: </strong><br />
                    	<?php echo isset($data->branch)? getBranchName($data->branch) : '-'; ?> <br />
   			            <strong style="padding:5px 0px 0px 0px;">Total of Case Number: </strong><br />
                    	<?php echo isset($data->total_of_case_number)? $data->total_of_case_number : '-'; ?>
                    </td>
                	<td valign="top" width="233">
                        <strong>Service: </strong><br />
                    	<?php echo isset($data->service_types)? getServiceName($data->service_types) : '-'; ?> <br />
               			<strong style="padding:5px 0px 0px 0px;">Case Code: </strong><br />
                    	<?php echo isset($data->case_code)? $data->case_code : '-'; ?> <br />
               			<strong style="padding:5px 0px 0px 0px;">Case Type: </strong><br />
                    	<?php echo isset($data->case_type)? $data->case_type : '-'; ?>
                    </td>
                </tr>
            </table>
        </td>
    </tr>
    <tr><td height="2" style="background:#cccccc;"></td></tr>
    <tr><td height="10"></td></tr>
	<tr>
    	<td style="padding:10px 15px 10px 15px;">
        	<table cellpadding="0" cellspacing="0" border="0" width="700">
            	<tr>
                	<td valign="top" width="233">
                    	<strong>Case Number: </strong><br />
                    	<?php echo isset($data->case_number)? $data->case_number : '-'; ?> <br />
               			<strong>Case Title: </strong><br />
                    	<?php echo isset($data->case_title)? $data->case_title : '-'; ?> <br />
               			<strong>Case Date: </strong><br />
                    	<?php echo isset($data->case_date)? $data->case_date : '-'; ?>
                    </td>
                	<td valign="top">
                        <strong>Case Start Date: </strong><br />
                    	<?php echo isset($data->case_start_date)? $data->case_start_date : '-'; ?> <br />
               			<strong>Contract number: </strong><br />
                    	<?php echo isset($data->contact_number)? $data->contact_number : '-'; ?> <br />
               			<strong>Opponent Full Name: </strong><br />
                    	<?php echo isset($data->opponent_full_name)? $data->opponent_full_name : '-'; ?>
                    </td>
                	<td valign="top" width="233">
                        <strong>Opponent Note: </strong><br />
                    	<?php echo isset($data->opponent_note)? $data->opponent_note : '-'; ?> <br />
               			<strong>Opponent Phone: </strong><br />
                    	<?php echo isset($data->opponent_phone)? $data->opponent_phone : '-'; ?> <br />
               			<strong>Court Name: </strong><br />
                    	<?php echo isset($data->court_name)? $data->court_name : '-'; ?>
                    </td>
                </tr>
            </table>
        </td>
    </tr>
    
    <tr><td height="2" style="background:#cccccc;"></td></tr>
    <tr><td height="10"></td></tr>
	<tr>
    	<td style="padding:10px 15px 10px 15px;">
        	<table cellpadding="0" cellspacing="0" border="0" width="700">
            	<tr>
                	<td valign="top" width="233">
                    	<strong>Court Number: </strong><br />
                    	<?php echo isset($data->court_number)? $data->court_number : '-'; ?> <br />
               			<strong>Court Address: </strong><br />
                    	<?php echo isset($data->court_address)? $data->court_address : '-'; ?> <br />
               			<strong>Judge Name: </strong><br />
                    	<?php echo isset($data->judge_name)? $data->judge_name : '-'; ?>
                    </td>
                	<td valign="top">
                        <strong>Opponent Lawyer: </strong><br />
                    	<?php echo isset($data->opponent_lawyer)? $data->opponent_lawyer : '-'; ?> <br />
               			<strong>Referral number: </strong><br />
                    	<?php echo isset($data->referral_number)? $data->referral_number : '-'; ?> <br />
               			<strong>Referral Title: </strong><br />
                    	<?php echo isset($data->referral_title)? $data->referral_title : '-'; ?> 
                    </td>
                	<td valign="top" width="233">
                        <strong>Referral Date: </strong><br />
                    	<?php echo isset($data->referral_date)? $data->referral_date : '-'; ?> <br />
               			<strong>Verdict Number: </strong><br />
                    	<?php echo isset($data->verdict_number)? $data->verdict_number : '-'; ?> <br />
               			<strong>Verdict Date: </strong><br />
                    	<?php echo isset($data->verdict_date)? $data->verdict_date : '-'; ?>
                    </td>
                </tr>
            </table>
        </td>
    </tr>
    
    <tr><td height="2" style="background:#cccccc;"></td></tr>
    <tr><td height="10"></td></tr>
	<tr>
    	<td style="padding:10px 15px 10px 15px;">
        	<table cellpadding="0" cellspacing="0" border="0" width="700">
            	<tr>
                	<td valign="top" width="233">
                    	<strong>Objection Number: </strong><br />
                    	<?php echo isset($data->objection_number)? $data->objection_number : '-'; ?> <br />
               			<strong>Objection Date: </strong><br />
                    	<?php echo isset($data->objection_date)? $data->objection_date : '-'; ?> <br />
               			<strong>Objection Number: </strong><br />
                    	<?php echo isset($data->objection_number)? $data->objection_number : '-'; ?> 
                    </td>
                	<td valign="top">
                        <strong>Case Status: </strong><br />
                    	<?php echo isset($data->case_status)? $data->case_status : '-'; ?> <br />
               			<strong>Note: </strong><br />
                    	<?php echo isset($data->note)? $data->note : '-'; ?> <br />
               			<strong>Uploaded File: </strong><br />
                    	<?php
                    	if($data->upload_file){
                    	    ?>
                    	    <img src="<?php echo base_url();?>uploads/case_file/<?php echo $data->upload_file; ?>" width="200">
                    	    <?php
                    	}else{ echo "-";} ?>
                    	
                    </td>
                	<td valign="top" width="233">
                	    <strong>Email: </strong><br />
                	    <?php echo $this->session->userdata('admin_email');  ?> - <br />
            	   		<strong>Contact No: </strong><br />
            	   		<?php  echo $this->session->userdata('admin_phone'); ?> - <br />
            	   		<strong>Address: </strong><br />
            	   		<?php echo $this->session->userdata('admin_address'); ?> - 
                    </td>
                </tr>
            </table>
        </td>
    </tr>
    
	<tr>
    	<td style="padding:10px 15px 10px 15px; background:#421F23; color:#ffffff; text-align:center;">
        	<table cellpadding="0" cellspacing="0" border="0" width="700">
            	<tr>
                	<td align="center">&copy; 2018 Albarakati Law</td>
                </tr>
            	<tr>
                	<td align="center"><a href="#" style="color:#ffffff; text-decoration:none;">Privacy Policy</a> | <a href="#" style="color:#ffffff; text-decoration:none;">Terms & Conditions</a></td>
                </tr>
            </table>
        </td>
    </tr>
</table>