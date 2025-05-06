<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" dir="<?php  if($this->session->userdata('admin_site_lang')=="arabic" OR $this->session->userdata('admin_site_lang')=="" )  echo "rtl"; else echo ""; ?>" xml:lang="en" lang="<?php  if($this->session->userdata('admin_site_lang')=="arabic" OR $this->session->userdata('admin_site_lang')=="" ) echo "ar"; else echo "en"; ?>">

<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo $this->lang->line('ALBARAKATI_LAW');?></title>
</head>

<body>
<table cellpadding="0" cellspacing="0" border="0" width="800" align="center" style="padding:0px 0px 140px 0px; font-family:Arial, Helvetica, sans-serif; font-size:14px; line-height:22px; font-weight:normal; background:#ffffff">
	<tr>
    	<td style="background:#ffffff; padding:20px 20px 10px 20px;">
        	<table cellpadding="0" cellspacing="0" border="0" width="100%">
            	<tr>
					<td width="400"></td>
                	<td align="right" width="400"><img src="<?php echo base_url('uploads/report/');?>albarakatilaw.png" alt="" height="80" border="0" style="display:block; margin:0px;" /></td>
                </tr>
            </table>
        </td>
    </tr>
	<tr>
    	<td style="background:#ffffff; padding:10px 20px 20px 20px;">
        	<table cellpadding="0" cellspacing="0" border="0" width="100%">
            	<tr>
                	<td align="left" style="color:#CAA457; font-size:28px; font-weight:bold;"><?php echo $this->lang->line('Writing_report');?></td>
                </tr>
            </table>
        </td>
    </tr>    
    
	<tr>
    	<td style="padding:10px 15px 0px 15px;">
        	<table cellpadding="0" cellspacing="0" border="0" width="800" style="font-size:15px;">
            	<tr>
                	<td width="150" style="background-color:#102B4E; color:#CAA457; margin:0px 10px 0px 0px; padding:10px 10px 10px 20px; font-weight:bold;"><?php echo $this->lang->line('Case_Code');?></td>
                	<td width="650" style="color:#333333; padding:10px 10px 10px 10px; border-style:solid; border-width:1px; border-color:#102B4E;">
					<?php echo $data->case_number;?> </td>
                </tr>
            </table>
        </td>
    </tr>    
    
	<tr>
    	<td style="padding:5px 15px 10px 15px;">
        	<table cellpadding="0" cellspacing="0" border="0" width="800" style="font-size:15px;">
            	<tr>
                	<td height="1" width="800" style="background:#CAA457;"></td>
                </tr>
            </table>
        </td>
    </tr>  
	<tr>
    	<td style="padding:5px 15px 5px 15px;">
        	<table cellpadding="0" cellspacing="0" border="0" width="800" style="font-size:15px;">
            	<tr>
                	<td width="150" style="background-color:#102B4E; color:#CAA457; margin:0px 10px 0px 0px; padding:10px 10px 10px 20px; font-weight:bold;"><?php echo $this->lang->line('Client_Name');?></td>
                	<td width="650" style="color:#333333; padding:10px 10px 10px 10px; border-style:solid; border-width:1px; border-color:#102B4E;"><?php echo $data->client_name;?></td>
                </tr>
            </table>
        </td>
    </tr>  
    
	<tr>
    	<td style="padding:5px 15px 10px 15px;">
        	<table cellpadding="0" cellspacing="0" border="0" width="800" style="font-size:15px;">
            	<tr>
                	<td height="1" width="800" style="background:#CAA457;"></td>
                </tr>
            </table>
        </td>
    </tr>  
       
	<tr>
    	<td style="padding:5px 15px 10px 15px;">
        	<table cellpadding="0" cellspacing="0" border="0" width="800" style="font-size:15px;">
            	<tr>
                	<td width="150" style="background-color:#102B4E; color:#CAA457; margin:0px 10px 0px 0px; padding:10px 10px 10px 20px; font-weight:bold;"><?php echo $this->lang->line('Writings_Date');?></td>
                	<td width="650" style="color:#333333; padding:10px 10px 10px 10px; border-style:solid; border-width:1px; border-color:#102B4E;">
					<?php echo getTheDayAndDateFromDatePan($data->session_date);?></td>
                </tr>
            </table>
        </td>
    </tr>   
    
	<tr>
    	<td style="padding:5px 5px 5px 5px;">
        	<table cellpadding="0" cellspacing="0" border="0" width="800" style="font-size:15px;">
            	<tr>
                	<td height="1" width="800" style="background:#CAA457;"></td>
                </tr>
            </table>
        </td>
    </tr>  
     
	<tr>
    	<td style="padding:5px 15px 0px 15px;">
        	<table cellpadding="0" cellspacing="0" border="0" width="800" style="font-size:15px;">
            	<tr>
                	<td width="150" style="background-color:#102B4E; color:#CAA457; margin:0px 10px 0px 0px; padding:10px 10px 10px 20px; font-weight:bold;"><?php echo $this->lang->line('Report');?></td>
                	<td width="650" style="color:#333333; padding:10px 10px 10px 10px; border-style:solid; border-width:1px; border-color:#102B4E;">
					 <p style="width:800px;word-wrap: break-word;"><?php echo $data->report;?></p></td>
                </tr>
            </table>
        </td>
    </tr> 
</table>
</body>
</html>
