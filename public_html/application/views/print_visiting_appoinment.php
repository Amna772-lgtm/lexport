<table>
	<tr>
		<td style="width: 33%"><strong>Case ID: </strong><?php echo $data->id; ?></td>
		<td style="width: 33%"><strong>Date: </strong><?php echo $data->createdate; ?></td>
	</tr>
	<tr>		
		<td>Visiting Appoinment Information</td>
	</tr>
	<tr>	
		<td style="width: 33%"><strong>Identification Number: </strong><?php echo $data->identification_number; ?></td>
		<td style="width: 33%"><strong>Identification Types: </strong><?php echo $data->identification_types; ?></td>
		<td style="width: 33%"><strong>Client File Number: </strong><?php echo $data->client_file_number; ?></td><td style="width: 33%"><strong>Client Name: </strong><?php echo $data->client_name; ?></td>	
	</tr>
	<tr>	
		<td style="width: 33%"><strong>Branch: </strong><?php echo getBranchName($data->branch); ?></td>
		<td style="width: 33%"><strong>Total of Visiting Number: </strong><?php echo $data->total_of_visiting_number;?></td>
		<td style="width: 33%"><strong>Visiting Number: </strong><?php echo $data->visiting_number; ?></td>
	</tr>
	<tr>	
		<td style="width: 33%"><strong>Visiting Date: </strong><?php echo $data->visiting_code; ?></td>	
		<td style="width: 33%"><strong>Visiting Time: </strong><?php echo $data->visiting_time; ?></td>	
		<td style="width: 33%"><strong>Visiting Code: </strong><?php echo $data->visiting_code;?></td>	
	</tr>
	<tr>	
		<td style="width: 33%"><strong>Case Code: </strong><?php echo $data->case_code;?></td>	
		<td style="width: 33%"><strong>Case Type: </strong><?php echo $data->case_type; ?></td>	
		<td style="width: 33%"><strong>Case Number: </strong><?php echo $data->case_number; ?></td>	
	</tr>
	<tr>	
		<td style="width: 33%"><strong>Case Title: </strong><?php echo $data->case_title; ?></td>	
		<td style="width: 33%"><strong>Case Date: </strong><?php echo $data->case_date; ?></td>	
		<td style="width: 33%"><strong>Case Start Date: </strong><?php echo $data->case_start_date; ?></td>	
	</tr>
	<tr>		
		<td style="width: 33%"><strong>Contract number: </strong><?php echo $data->contact_number; ?></td>	
		<td style="width: 33%"><strong>Opponent Full Name: </strong><?php echo $data->opponent_full_name; ?></td>
		<td style="width: 33%"><strong>Opponent Note: </strong><?php echo $data->opponent_note; ?></td>	
	</tr>
	<tr>	
		<td style="width: 33%"><strong>Opponent Phone: </strong><?php echo $data->opponent_phone; ?></td>	
		<td style="width: 33%"><strong>Court Name: </strong><?php echo $data->court_number; ?></td>	
		<td style="width: 33%"><strong>Court Number: </strong><?php echo $data->court_number; ?></td>	
	</tr>
	<tr>	
		<td style="width: 33%"><strong>Court Address: </strong><?php echo $data->court_address; ?></td>	
		<td style="width: 33%"><strong>Judge Name: </strong><?php echo $data->judge_name; ?></td>	
		<td style="width: 33%"><strong>Opponent Lawyer Name: </strong><?php echo $data->opponent_lawyer_name; ?></td>
	</tr>
	<tr>		
		<td style="width: 33%"><strong>Responsible Employee: </strong><?php echo $data->responsible_employee; ?></td>
		<td style="width: 33%"><strong>Follow-up Employee: </strong><?php echo $data->follow_up_employee; ?></td>
		<td style="width: 33%"><strong>Note: </strong><?php echo $data->note; ?></td>	
	</tr>
	<tr>		
		<td style="width: 33%"><strong>Uploaded File: </strong><img src="<?php echo base_url();?>/uploads/<?php echo $data->upload_file; ?>" width="200"></td>
	</tr>		
</table>