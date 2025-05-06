<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" dir="<?php  if($this->session->userdata('admin_site_lang')=="arabic" OR $this->session->userdata('admin_site_lang')=="" )  echo "rtl"; else echo ""; ?>" xml:lang="en" lang="<?php  if($this->session->userdata('admin_site_lang')=="arabic" OR $this->session->userdata('admin_site_lang')=="" ) echo "ar"; else echo "en"; ?>">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo $this->lang->line('ALBARAKATI_LAW');?></title>
</head>

<body>
<table cellpadding="0" cellspacing="0" border="0" width="1000" align="center" style="padding:0px 0px 140px 0px; font-family:Arial, Helvetica, sans-serif; font-size:14px; line-height:22px; font-weight:normal; background:#ffffff">
	<tr>
    	<td style="background:#ffffff; padding:20px 20px 20px 20px;">
        	<table cellpadding="0" cellspacing="0" border="0" width="1000">
            	<tr>
					<td width="500"></td>
                	<td align="right" width="500" style="text-align:right;"><img src="<?php echo base_url();?>uploads/report/albarakatilaw.png" alt="" height="80" border="0" style="display:block; margin:0px;" /></td>
                </tr>
            </table>
        </td>
    </tr>
	<tr>
    	<td style="background:#ffffff; padding:20px 20px 20px 20px;" width="800">
        	<table cellpadding="0" cellspacing="0" border="0" width="1000">
            	<tr>
                	<td align="left" style="color:#CAA457; font-size:28px; font-weight:bold;"><?php echo $this->lang->line('EXPENSES');?> <?php echo $this->lang->line('invoice');?></td>
                </tr>
            </table>
        </td>
    </tr>
    
    <tr>
    	<td style="background:#ffffff; padding:20px 20px 5px 20px;" width="800">
        	<table cellpadding="0" cellspacing="0" border="0" width="1000">
            	<tr>
                	<td width="300">
                    	<table cellpadding="0" cellspacing="0" border="0" width="400">
                            <tr>
                                <td width="60" style="color:#333333; margin:0px 10px 0px 0px; padding:10px 10px 0px 0px; font-weight:bold;"><?php echo $this->lang->line('Created_Date');?>:</td>
                                <td width="240" style="color:#333333; padding:10px 10px 0px 0px; border-bottom:solid 1px #cccccc;"><?php $timestamp = strtotime($case_data->exp_create_date); echo  date("d-m-Y",$timestamp);  ?></td>
                            </tr>
                        </table>
                    </td>
                    <td width="50"></td>
                	<td width="450">
                    	<table cellpadding="0" cellspacing="0" border="0" width="600">
                            <tr>
                                <td width="120" style="color:#333333; margin:0px 10px 0px 0px; padding:10px 10px 0px 0px; font-weight:bold;"><?php echo $this->lang->line('E_Service_Name');?>:</td>
                                <td width="280" style="color:#333333; padding:10px 10px 0px 0px; border-bottom:solid 1px #cccccc;"><?php echo $case_data->case_title;?></td>
                            </tr>
                        </table>
                    </td>
                </tr>
            </table>
        </td>
    </tr> 
    
    <tr>
    	<td style="background:#ffffff; padding:0px 20px 5px 20px;" width="800">
        	<table cellpadding="0" cellspacing="0" border="0" width="1000">
            	<tr>
                	<td>
                    	<table cellpadding="0" cellspacing="0" border="0" width="450">
                            <tr>
                                <td width="90" style="color:#333333; margin:0px 10px 0px 0px; padding:10px 10px 0px 0px; font-weight:bold;"><?php echo $this->lang->line('client_File_number');?>:</td>
                                <td width="310" style="color:#333333; padding:10px 10px 0px 0px; border-bottom:solid 1px #cccccc;"><?php echo $case_data->client_file_number;?></td>
                            </tr>
                        </table>
                    </td>
                    <td width="50"></td>
                	<td>
                    	<table cellpadding="0" cellspacing="0" border="0" width="300">
                            <tr>
                                <td width="120" style="color:#333333; margin:0px 10px 0px 0px; padding:10px 10px 0px 0px; font-weight:bold;"><?php echo $this->lang->line('E_Service_Number');?>:</td>
                                <td width="180" style="color:#333333; padding:10px 10px 0px 0px; border-bottom:solid 1px #cccccc;"><?php echo $case_data->case_number;?></td>
                            </tr>
                        </table>
                    </td>
                </tr>
            </table>
        </td>
    </tr> 
    
	<tr>
    	<td style="padding:5px 15px 10px 15px;">
        	<table cellpadding="0" cellspacing="0" border="0" width="1000" style="font-size:15px;">
            	<tr>
                	<td style="color:#333333; background:#ecdfc4; padding:10px 10px 10px 10px; font-weight:bold;" align="center"><?php echo $this->lang->line('Client_Name');?></td>
                </tr>
            	<tr>
                	<td style="color:#333333; background:#ffffff; border:solid 1px #cccccc; padding:10px 10px 10px 10px; font-weight:normal;" align="center"><?php echo $case_data->client_file_number;?></td>
                </tr>
            </table>
        </td>
    </tr>     
    
	<tr>
    	<td style="padding:10px 15px 10px 15px;">
        	<table cellpadding="0" cellspacing="0" border="0" width="1000" style="font-size:15px;">
            	<tr>
                	<td width="70%" style="color:#333333; background:#ecdfc4; padding:10px 10px 10px 10px; font-weight:bold;" align="center"><?php echo $this->lang->line('Expenses_Title');?></td>
                	<td width="15%" style="color:#333333; background:#ecdfc4; padding:10px 10px 10px 10px; font-weight:bold;" align="center"><?php echo $this->lang->line('Expenses_Date');?></td>
                	<td width="15%" style="color:#333333; background:#ecdfc4; padding:10px 10px 10px 10px; font-weight:bold;" align="center"><?php echo $this->lang->line('Total_Cost');?>(In SAR)</td>
                </tr>
					<?php 	foreach($expense_details as $expense_detail) {  ?>
            	<tr>
                	<td style="color:#333333; background:#ffffff; border:solid 1px #cccccc; padding:10px 10px 10px 10px; font-weight:normal;">
                    <?php echo $expense_detail['expenses_title']; ?>
                    </td>
                	<td style="color:#333333; background:#ffffff; border:solid 1px #cccccc; padding:10px 10px 10px 10px; text-align:center; font-weight:normal;" align="center">
                   <?php echo $expense_detail['expenses_date']; ?>
                    </td>
                	<td style="color:#333333; background:#ffffff; border:solid 1px #cccccc; padding:10px 10px 10px 10px; font-weight:normal;" align="center">
                    <?php echo $expense_detail['expenses_amount']; ?>
                    </td>
                </tr>
				<?php } ?>
             
            </table>
        </td>
    </tr>       
    
	<tr>
    	<td style="padding:10px 15px 10px 15px;">
        	<table cellpadding="0" cellspacing="0" border="0" width="1000" style="font-size:15px;">
            	<tr>
                	<td style="color:#333333; background:#ecdfc4; padding:10px 10px 10px 10px; font-weight:bold;" align="center"><?php echo $this->lang->line('Report');?></td>
                </tr>
            	<tr>
                	<td style="color:#333333; background:#ffffff; border:solid 1px #cccccc; padding:10px 10px 10px 10px; font-weight:normal;">
                    <?php echo $case_data->report; ?>
                    </td>
                </tr>
            </table>
        </td>
    </tr>
    
    <tr>
    	<td style="padding:5px 15px 5px 15px;">
            <table cellpadding="0" cellspacing="0" border="0" width="1000" style="font-size:15px;">
                <tr>
                    <td style="border-top:solid 1px #cccccc; border-bottom:solid 1px #cccccc;" width="1000">
                        <table cellpadding="0" cellspacing="0" border="0" width="1000" style="font-size:15px;">
                            <tr>
                                <td width="400" style="padding:10px 15px 10px 15px; color:#333333; font-weight:bold;"> <?php echo $this->lang->line('Total_Amount');?>(In SAR)</td>
                                <td width="600" style="background:#f3f3f3; text-align:right; padding:0px 30px 0px 0px;" align="right"><?php echo getExpenseTotal($case_data->id); ?></td>
                            </tr>
                        </table>
                    </td>
                </tr>
            </table>
        </td>
    </tr>
    
    <tr>
    	<td style="background:#ffffff; padding:20px 20px 0px 20px;">
        	<table cellpadding="0" cellspacing="0" border="0" width="1000">
            	<tr>
                	<td>
                    	<table cellpadding="0" cellspacing="0" border="0" width="400">
                            <tr>
                                <td width="120" style="color:#333333; margin:0px 10px 0px 0px; padding:10px 10px 0px 0px; font-weight:bold;"><?php echo $this->lang->line('Created_Time');?>:</td>
                                <td width="280" style="color:#333333; padding:10px 10px 0px 0px; border-bottom:solid 1px #cccccc;"><?php $timestamp = strtotime($case_data->exp_create_date); echo  date("G:i",$timestamp); ?></td>
                            </tr>
                        </table>
                    </td>
                    <td width="50"></td>
                	<td>
                    	<table cellpadding="0" cellspacing="0" border="0" width="600">
                            <tr>
                                <td width="200" style="color:#333333; margin:0px 10px 0px 0px; padding:10px 10px 0px 0px; font-weight:bold;"><?php echo $this->lang->line('Created_By');?>:</td>
                                <td width="400" style="color:#333333; padding:10px 10px 0px 0px; border-bottom:solid 1px #cccccc;"><?php echo getEmployeeName($case_data->created_by);?></td>
                            </tr>
                        </table>
                    </td>
                </tr>
            </table>
        </td>
    </tr>
    
	<tr>
    	<td style="background:#ffffff; padding:20px 20px 0px 20px;" width="1000" align="center">
        	<table cellpadding="0" cellspacing="0" border="0" width="1000" align="center">
            	<tr>
                	<td colspan="2" align="center" style="padding:0px 0px 5px 0px; color:#666666; font-size:16px; text-align:center;" width="100%">
                        If you have any questions about this invoice, please contact
					</td>
                </tr>
            	<tr>
                	<td colspan="2" align="center" style="padding:0px 0px 5px 0px; color:#0F2A4E; font-size:16px; text-align:center; font-weight:bold;" width="100%">
                        Thank You For Your Business!
					</td>
                </tr>
            	<tr>
                	<td colspan="2" align="center" style="padding:0px 0px 20px 0px; color:#666666; font-size:16px; text-align:center;" width="100%">
                        info@albarakatilaw.com
					</td>
                </tr>
				 
            </table>
        </td>
    </tr>
   
    
</table>
</body>
</html>
