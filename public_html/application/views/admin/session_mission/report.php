<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" dir="<?php  if($this->session->userdata('admin_site_lang')=="arabic" OR $this->session->userdata('admin_site_lang')=="" )  echo "rtl"; else echo ""; ?>" xml:lang="en" lang="<?php  if($this->session->userdata('admin_site_lang')=="arabic" OR $this->session->userdata('admin_site_lang')=="" ) echo "ar"; else echo "en"; ?>">

<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo $this->lang->line('ALBARAKATI_LAW');?></title>
</head>

<body>
<table cellpadding="0" cellspacing="0" border="0" width="800" align="center" style="padding:0px 0px 140px 0px; font-family:Arial, Helvetica, sans-serif; font-size:14px; line-height:22px; font-weight:normal; background:#ffffff">   
    
 
	<tr>
    	<td style="background:#ffffff; padding:20px 20px 20px 20px;">
        	<table cellpadding="0" cellspacing="0" border="0" width="100%">
            	<tr>
                	<td align="right" width="400" style="padding-top:10px;"><img src="<?php echo base_url('uploads/report/'); ?>albarakatilaw.png" alt="" height="80" border="0" style="display:block; margin:0px;" /></td>
                </tr>
            </table>
        </td>
    </tr>
	<tr>
    	<td style="background:#ffffff; padding:20px 50px 0px 50px;">
        	<table cellpadding="0" cellspacing="0" border="0" width="100%">
            	<tr>
                	<td align="left" style="color:#CAA457; font-size:28px; font-weight:bold;"><?php echo $this->lang->line('Session_report');?></td>
                </tr>
            </table>
        </td>
    </tr>    
    	<tr>
    	<td style="padding:5px 15px 10px 15px;" align="center">
        	<table cellpadding="0" cellspacing="0" border="0" width="700" align="center" style="font-size:15px; padding:0px 10px 0px 10px;">
				<tr>
					<td style="color:#333333; background:#ecdfc4; padding:10px 10px 10px 10px; font-weight:bold;" align="center"><?php echo $this->lang->line('Client_Name');?></td>
				</tr>
				<tr>
					<td style="color:#333333; background:#ffffff; border:solid 1px #cccccc; padding:10px 10px 10px 10px; font-weight:normal;">
					<?php  echo $data->client_name; ?>
					</td>
				</tr>
            </table>
        </td>
    </tr>       
	  
		<tr>
    	<td style="padding:5px 15px 10px 15px;" align="center">
        	<table cellpadding="0" cellspacing="0" border="0" width="700" align="center" style="font-size:15px; padding:0px 10px 0px 10px;">
				<tr>
					<td style="color:#333333; background:#ecdfc4; padding:10px 10px 10px 10px; font-weight:bold;" align="center"><?php echo $this->lang->line('Court');?></td>
				</tr>
				<tr>
					<td style="color:#333333; background:#ffffff; border:solid 1px #cccccc; padding:10px 10px 10px 10px; font-weight:normal;">
					<?php  echo gtCourtName($data->court_name);?>
					</td>
				</tr>
            </table>
        </td>
    </tr>      
		<tr>
    	<td style="padding:5px 15px 10px 15px;" align="center">
        	<table cellpadding="0" cellspacing="0" border="0" width="700" align="center" style="font-size:15px; padding:0px 10px 0px 10px;">
				<tr>
					<td style="color:#333333; background:#ecdfc4; padding:10px 10px 10px 10px; font-weight:bold;" align="center"><?php echo $this->lang->line('Judicial_Circuit');?></td>
				</tr>
				<tr>
					<td style="color:#333333; background:#ffffff; border:solid 1px #cccccc; padding:10px 10px 10px 10px; font-weight:normal;">	
					<?php  echo $data->department;?>
					</td>
				</tr>
            </table>
        </td>
    </tr>        
		<tr>
    	<td style="padding:5px 15px 10px 15px;" align="center">
        	<table cellpadding="0" cellspacing="0" border="0" width="700" align="center" style="font-size:15px; padding:0px 10px 0px 10px;">
				<tr>
					<td style="color:#333333; background:#ecdfc4; padding:10px 10px 10px 10px; font-weight:bold;" align="center"><?php echo $this->lang->line('Entry_No');?></td>
				</tr>
				<tr>
					<td style="color:#333333; background:#ffffff; border:solid 1px #cccccc; padding:10px 10px 10px 10px; font-weight:normal;">
					<?php  echo $data->entry_no;?>
					</td>
				</tr>
            </table>
        </td>
    </tr>          
		<tr>
    	<td style="padding:5px 15px 10px 15px;" align="center">
        	<table cellpadding="0" cellspacing="0" border="0" width="700" align="center" style="font-size:15px; padding:0px 10px 0px 10px;">
				<tr>
					<td style="color:#333333; background:#ecdfc4; padding:10px 10px 10px 10px; font-weight:bold;" align="center"><?php echo $this->lang->line('Session_Date');?></td>
				</tr>
				<tr>
					<td style="color:#333333; background:#ffffff; border:solid 1px #cccccc; padding:10px 10px 10px 10px; font-weight:normal;">
					<?php echo getTheDayAndDateFromDatePan($data->session_date);?>
					</td>
				</tr>
            </table>
        </td>
    </tr>       
		<tr>
    	<td style="padding:5px 15px 10px 15px;" align="center">
        	<table cellpadding="0" cellspacing="0" border="0" width="700" align="center" style="font-size:15px; padding:0px 10px 0px 10px;">
				<tr>
					<td style="color:#333333; background:#ecdfc4; padding:10px 10px 10px 10px; font-weight:bold;" align="center"><?php echo $this->lang->line('Requirement');?></td>
				</tr>
				<tr>
					<td style="color:#333333; background:#ffffff; border:solid 1px #cccccc; padding:10px 10px 10px 10px; font-weight:normal;">
					<?php  echo $data->note; ?>
					</td>
				</tr>
            </table>
        </td>
    </tr>     
	
    
	<tr>
    	<td style="padding:10px 15px 10px 15px;" align="center">
        	<table cellpadding="0" cellspacing="0" border="0" width="700" align="center" style="font-size:15px; padding:0px 10px 0px 10px;">
				<tr>
					<td style="color:#333333; background:#ecdfc4; padding:10px 10px 10px 10px; font-weight:bold;" align="center"><?php echo $this->lang->line('E_Service_No');?></td>
				</tr>
				<tr>
					<td style="color:#333333; background:#ffffff; border:solid 1px #cccccc; padding:10px 10px 10px 10px; font-weight:normal;">
					<?php  echo $data->case_number;?><br />
					</td>
				</tr>
            </table>
        </td>
    </tr>       
     
		<tr>
    	<td style="padding:5px 15px 10px 15px;" align="center">
        	<table cellpadding="0" cellspacing="0" border="0" width="700" align="center" style="font-size:15px; padding:0px 10px 0px 10px;">
				<tr>
					<td style="color:#333333; background:#ecdfc4; padding:10px 10px 10px 10px; font-weight:bold;" align="center"><?php echo $this->lang->line('Opponent_Full_Name');?></td>
				</tr>
				<tr>
					<td style="color:#333333; background:#ffffff; border:solid 1px #cccccc; padding:10px 10px 10px 10px; font-weight:normal;">
					<?php  echo $data->opponent_full_name; ?>
					</td>
				</tr>
            </table>
        </td>
    </tr>       
	<tr>
    	<td style="padding:10px 15px 10px 15px;" align="center">
        	<table cellpadding="0" cellspacing="0" border="0" width="700" align="center" style="font-size:15px; padding:0px 10px 0px 10px;">
				<tr>
					<td style="color:#333333; background:#ecdfc4; padding:10px 10px 10px 10px; font-weight:bold;" align="center"><?php echo $this->lang->line('Report');?></td>
				</tr>
				<tr>
					<td style="color:#333333; background:#ffffff; border:solid 1px #cccccc; padding:10px 10px 10px 10px; font-weight:normal;">
					<?php echo $data->report;?>
					</td>
				</tr>
            </table>
        </td>
    </tr>    
 
</table>
</body>
</html>
