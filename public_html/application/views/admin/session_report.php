<table cellpadding="0" cellspacing="0" border="0" width="800" align="center" style="background:#ffffff; font-family:Arial, Helvetica, sans-serif; font-size:14px; line-height:22px; font-weight:normal;">
	<tr>
    	<td style="background:#f3f3f3; padding:20px 15px 20px 15px;">
        	<table cellpadding="0" cellspacing="0" border="0" width="800">
            	<tr>
                	<td align="left" width="400"><img src="<?php echo base_url();?>assets/front/assets/images/pdf-logo.png" alt="" height="100" border="0" style="display:block; margin:0px;" /></td>
                	<td align="right" width="400" style="font-size:30px; color:#421F23; font-weight:bold; text-align:right;">Session Report</td>
                </tr>
            </table>
        </td>
    </tr>
    
	<tr>
    	<td style="padding:20px 15px 20px 15px;">
        	<table cellpadding="0" cellspacing="0" border="0" width="800" style="font-size:15px;">
            	<tr>
                	<td width="155" style="background-color:#421F23; color:#ffffff; margin:0px 10px 0px 0px; padding:10px 10px 10px 20px; border-radius:30px 0px 0px 30px; font-weight:bold;">Opponent Name</td>
                	<td width="235" style="background-color:#f3f3f3; color:#333333; padding:10px 10px 10px 10px; border-radius:0px 30px 30px 0px;"><?php echo $case_data->opponent_full_name;?></td>
                    <td width="50">&nbsp;</td>
                	<td width="125" style="background-color:#421F23; color:#ffffff; margin:0px 10px 0px 0px; padding:10px 10px 10px 20px; border-radius:30px 0px 0px 30px; font-weight:bold;">Client Name</td>
                	<td width="235" style="background-color:#f3f3f3; color:#333333; padding:10px 10px 10px 10px; border-radius:0px 30px 30px 0px;"><?php echo $case_data->client_name;?></td>
                </tr>
            </table>
        </td>
    </tr>
    
    <tr><td style="border-top:dotted 5px #f3f3f3;"></td></tr>
    <tr><td height="10"></td></tr>  
	<tr>
    	<td style="padding:20px 15px 10px 15px;">
        	<table cellpadding="0" cellspacing="0" border="0" width="800" style="font-size:15px;">
            	<tr>
                	<td width="155" style="background-color:#421F23; color:#ffffff; margin:0px 10px 0px 0px; padding:10px 10px 10px 20px; border-radius:30px 0px 0px 30px; font-weight:bold;">Judicial Circuit</td>
                	<td width="235" style="background-color:#f3f3f3; color:#333333; padding:10px 10px 10px 10px; border-radius:0px 30px 30px 0px;"><?php echo $data->department;?></td>
                    <td width="50">&nbsp;</td>
                	<td width="125" style="background-color:#421F23; color:#ffffff; margin:0px 10px 0px 0px; padding:10px 10px 10px 20px; border-radius:30px 0px 0px 30px; font-weight:bold;">Court</td>
                	<td width="235" style="background-color:#f3f3f3; color:#333333; padding:10px 10px 10px 10px; border-radius:0px 30px 30px 0px;"><?php echo $data->court_name;?></td>
                </tr>
            </table>
        </td>
    </tr>
    
    
	<tr>
    	<td style="padding:10px 15px 20px 15px;">
        	<table cellpadding="0" cellspacing="0" border="0" width="800" style="font-size:15px;">
            	<tr>
                	<td width="155" style="background-color:#421F23; color:#ffffff; margin:0px 10px 0px 0px; padding:10px 10px 10px 20px; border-radius:30px 0px 0px 30px; font-weight:bold;">Entry Number</td>
                	<td width="645" style="background-color:#f3f3f3; color:#333333; padding:10px 10px 10px 10px; border-radius:0px 30px 30px 0px;"><?php echo $data->entry_no;?></td>
                </tr>
            </table>
        </td>
    </tr>
    
    
    <tr><td style="border-top:dotted 5px #f3f3f3;"></td></tr>
    <tr><td height="10"></td></tr>
    
    <tr>
    	<td style="padding:20px 15px 20px 15px;">
        	<table cellpadding="0" cellspacing="0" border="0" width="800" style="font-size:15px;">
            <?php $i = 0; foreach($session_date as $sd)  {   ?> 	
			<?php if(time() >= strtotime($sd['session_date'])) { $i++; ?>	
			<?php if($i == 1) { ?>
				<tr>
                	<td width="170" style="background-color:#421F23; color:#ffffff; margin:0px 10px 0px 0px; padding:10px 10px 10px 20px; border-radius:30px 30px 30px 30px; font-weight:bold;">Session Date</td>
                    <td width="10">&nbsp;</td>
				<?php } ?>	
				
                	<td width="200" style="background-color:#f3f3f3; color:#333333; padding:10px 10px 10px 10px; border-radius:30px 30px 30px 30px;"><?php echo $sd['session_date'];?></td>
                    <td width="10">&nbsp;</td>
			
				<?php if($i == 1) { ?>	
                </tr>
				<?php } ?>
				<?php if($i >= 3 ) { $i =0 ; ?> <tr><td height="15" colspan="7"></td></tr> <?php  } ?>	
				<?php } ?>
				<?php } ?>
    			<tr><td height="15" colspan="7"></td></tr>
				<?php $i = 0; foreach($session_date as $sd)  {    ?> 	
					<?php if(time() < strtotime($sd['session_date'])) { $i++; ?>	
				<?php if($i == 1) { ?>
				<tr>
                	<td width="170" style="background-color:#421F23; color:#ffffff; margin:0px 10px 0px 0px; padding:10px 10px 10px 20px; border-radius:30px 30px 30px 30px; font-weight:bold;">Next Session Date</td>
                    <td width="10">&nbsp;</td>
				<?php } ?>	

                	<td width="200" style="background-color:#f3f3f3; color:#333333; padding:10px 10px 10px 10px; border-radius:30px 30px 30px 30px;"><?php echo $sd['session_date'];?></td>
                    <td width="10">&nbsp;</td>
				<?php  if($i == 1) { ?>	
                </tr>
				<?php } ?>
				<?php if($i >= 3 ) { $i =0 ; ?> <tr><td height="15" colspan="7"></td></tr> <?php  } ?>	
				<?php } ?>             
				<?php } ?>             
            </table>
        </td>
    </tr>
    
    <tr><td style="border-top:dotted 5px #f3f3f3;"></td></tr>
    <tr><td height="10"></td></tr>
    
	<tr>
    	<td style="padding:20px 15px 5px 15px;">
        	<table cellpadding="0" cellspacing="0" border="0" width="800" style="font-size:15px;">
            	<tr>
                	<td width="150" style="background-color:#421F23; color:#ffffff; margin:0px 10px 0px 0px; padding:10px 10px 10px 20px; border-radius:30px 0px 0px 30px; font-weight:bold;">Decision</td>
                	<td width="650" style="background-color:#f3f3f3; color:#333333; padding:10px 10px 10px 10px; border-radius:0px 30px 30px 0px;"><?php echo $data->decision;?></td>
                </tr>
            </table>
        </td>
    </tr>
    
	<tr>
    	<td style="padding:5px 15px 10px 15px;">
        	<table cellpadding="0" cellspacing="0" border="0" width="800" style="font-size:15px;">
            	<tr>
                	<td width="150" style="background-color:#421F23; color:#ffffff; margin:0px 10px 0px 0px; padding:10px 10px 10px 20px; border-radius:30px 0px 0px 30px; font-weight:bold;">Requirement</td>
                	<td width="650" style="background-color:#f3f3f3; color:#333333; padding:10px 10px 10px 10px; border-radius:0px 30px 30px 0px;"><?php echo $data->note;?></td>
                </tr>
            </table>
        </td>
    </tr>
    
    
	<tr>
    	<td style="padding:10px 15px 5px 15px;">
        	<table cellpadding="0" cellspacing="0" border="0" width="800" style="font-size:15px;">
            	<tr>
                	<td width="150" style="background-color:#421F23; color:#ffffff; margin:0px 10px 0px 0px; padding:10px 10px 10px 20px; border-radius-left:30px; font-weight:bold;">Report</td>
                    <td width="650"></td>
                </tr>
            </table>
        </td>
    </tr>
    
    
	<tr>
    	<td style="padding:5px 15px 20px 15px;">
        	<table cellpadding="0" cellspacing="0" border="0" width="800" style="font-size:15px;">
            	<tr>
                	<td width="800" style="background-color:#f3f3f3; color:#333333; padding:10px 10px 10px 10px; border-radius:30px 30px 30px 30px;"><?php echo $data->report;?></td>
                </tr>
            </table>
        </td>
    </tr>
    
	<tr>
    	<td style="padding:20px 15px 20px 15px;">
        	<table cellpadding="0" cellspacing="0" border="0" width="800">
            	<tr>
                	<td width="50" height="25" style="background:#421F23"></td>
                	<td width="30" height="25" style="background:#cccccc"></td>
                	<td width="720" height="25" style="background:#d19f46"></td>
                </tr>
            </table>
        </td>
    </tr>
</table>