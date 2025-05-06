<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" dir="<?php  if($this->session->userdata('admin_site_lang')=="arabic" OR $this->session->userdata('admin_site_lang')=="" )  echo "rtl"; else echo ""; ?>" xml:lang="en" lang="<?php  if($this->session->userdata('admin_site_lang')=="arabic" OR $this->session->userdata('admin_site_lang')=="" ) echo "ar"; else echo "en"; ?>">

<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">

<title><?php echo $this->lang->line('ALBARAKATI_LAW');?></title>
</head>
<style>p { hyphens: auto; }</style>
<body>
<table cellpadding="0" cellspacing="0" border="0" width="800" align="center" style="padding:0px 0px 140px 0px; font-family:Arial, Helvetica, sans-serif; font-size:14px; line-height:22px; font-weight:normal; background:#ffffff">
	<tr>
    	<td style="background:#ffffff; padding:20px 20px 20px 20px;">
        	<table cellpadding="0" cellspacing="0" border="0" width="800">
            	<tr>
					<td width="400"></td>
                	<td align="right" style="text-align:right;" width="400"><img src="<?php echo base_url('uploads/report/');?>albarakatilaw.png" alt="" height="80" border="0" style="display:block; margin:0px;" /></td>
                </tr>
            </table>
        </td>
    </tr>
	<tr>
    	<td style="background:#ffffff; padding:0px 20px 10px 20px;">
        	<table cellpadding="0" cellspacing="0" border="0" width="100%">
            	<tr>
                	<td align="left" style="color:#CAA457; font-size:28px; font-weight:bold;"><?php echo $this->lang->line('invoice');?></td>
                </tr>
            </table>
        </td>
    </tr>
    
    <tr>
    	<td style="background:#ffffff; padding:20px 20px 20px 20px;">
        	<table cellpadding="0" cellspacing="0" border="0" width="800">
            	<tr>
                	<td>
    	         		<table cellpadding="0" cellspacing="0" border="0" width="375">
                    	    <tr>
                                <td width="100" style="color:#333333; margin:0px 10px 0px 0px; padding:10px 10px 0px 0px; font-weight:bold;"><?php echo $this->lang->line('Subject');?>:</td>
                                <td width="300" style="color:#333333; padding:10px 10px 0px 0px; border-bottom:solid 1px #cccccc;">
                                <?php  echo $case_data->invoice_title; ?></td>
                            </tr>
                        </table>
                    	<table cellpadding="0" cellspacing="0" border="0" width="375">
                            <tr>
                                <td width="100" style="color:#333333; margin:0px 10px 0px 0px; padding:10px 10px 0px 0px; font-weight:bold;"><?php echo $this->lang->line('Created_Date');?>:</td>
                                <td width="300" style="color:#333333; padding:10px 10px 0px 0px; border-bottom:solid 1px #cccccc;"><?php $timestamp = strtotime($case_data->create_date);
							$parts = explode('-', date("d-m-Y",$timestamp));
                         	if($this->session->userdata('admin_site_lang')=="arabic" OR $this->session->userdata('admin_site_lang')=="") { 
                               echo  $value = Greg2Hijri($parts[0], $parts[1], $parts[2],true);
                            } else {
								echo  date("d/m/Y",$timestamp);
								
							}   ?></td>
                            </tr>
                            <tr>
                                <td width="" style="color:#333333; margin:0px 10px 0px 0px; padding:10px 10px 0px 0px; font-weight:bold;"><?php echo $this->lang->line('Due_Date');?>:</td>
                                <td width="" style="color:#333333; padding:10px 10px 0px 0px; border-bottom:solid 1px #cccccc;"><?php 
							$parts = explode('/', $case_data->due_date);
                         	if($this->session->userdata('admin_site_lang')=="arabic" OR $this->session->userdata('admin_site_lang')=="") { 
                               echo $value = Greg2Hijri($parts[0], $parts[1], $parts[2],true);
                            } else {
								
								echo $case_data->due_date;
								
							} ?></td>
                            </tr>
                            <tr>
                                <td width="" style="color:#333333; margin:0px 10px 0px 0px; padding:10px 10px 0px 0px; font-weight:bold;"><?php echo $this->lang->line('Customer_File_No');?>:</td>
                                <td width="" style="color:#333333; padding:10px 10px 0px 0px; border-bottom:solid 1px #cccccc;"><?php echo $case_data->client_file_number;?></td>
                            </tr>
                        </table>
                    </td>
                    <td width="50"></td>
                	<td>
                    	<table cellpadding="0" cellspacing="0" border="0" width="375">
                            <tr>
                                <td width="80" style="color:#333333; margin:0px 10px 0px 0px; padding:10px 10px 0px 0px; font-weight:bold;">#<?php echo $this->lang->line('invoice');?>:</td>
                                <td width="320" style="color:#333333; padding:10px 10px 0px 0px; border-bottom:solid 1px #cccccc;"><?php echo $case_data->invoice_no;?></td>
                            </tr>
                            <tr>
                                <td width="" style="color:#333333; margin:0px 10px 0px 0px; padding:10px 10px 0px 0px; font-weight:bold;"><?php echo $this->lang->line('Due_Time');?>:</td>
                                <td width="" style="color:#333333; padding:10px 10px 0px 0px; border-bottom:solid 1px #cccccc;"><?php echo $case_data->due_time;?></td>
                            </tr>
                            <tr>
                                <td width="" style="color:#333333; margin:0px 10px 0px 0px; padding:10px 10px 0px 0px; font-weight:bold;"><?php echo $this->lang->line('Case_No');?>:</td>
                                <td width="" style="color:#333333; padding:10px 10px 0px 0px; border-bottom:solid 1px #cccccc;"><?php echo $case_data->case_number;?></td>
                            </tr>
                        </table>
                    </td>
                </tr>
            </table>
        </td>
    </tr>       
    
	<tr>
    	<td style="padding:0px 15px 10px 15px;">
        	<table cellpadding="0" cellspacing="0" border="0" width="800" style="font-size:15px;">
            	<tr>
                	<td style="color:#333333; background:#ecdfc4; padding:10px 10px 10px 10px; font-weight:bold;" align="center"><?php echo $this->lang->line('Client_Name');?></td>
                </tr>
            	<tr>
                	<td style="color:#333333; background:#ffffff; border:solid 1px #cccccc; padding:10px 10px 10px 10px; font-weight:normal;" align="center"><?php echo getEmployeeName($case_data->customers_id);?></td>
                </tr>
            </table>
        </td>
    </tr>     
    
	<tr>
    	<td style="padding:10px 15px 10px 15px;">
        	<table cellpadding="0" cellspacing="0" border="0" width="900" style="font-size:15px;">
            	<tr>
                	<td width="700" style="color:#333333; background:#ecdfc4; padding:10px 10px 10px 10px; font-weight:bold;" align="center"><?php echo $this->lang->line('services');?></td>
                	<td width="200" style="color:#333333; background:#ecdfc4; padding:10px 10px 10px 10px; font-weight:bold;" align="center"><?php echo $this->lang->line('Total_Cost_INSAR');?></td>
                </tr>
            	<tr>
                	<td style="color:#333333; background:#ffffff; border:solid 1px #cccccc; padding:10px 10px 10px 10px; font-weight:normal;">
                    <?php echo getServiceType($case_data->service_types); ?>
                    </td>
                	<td style="color:#333333; background:#ffffff; border:solid 1px #cccccc; padding:10px 10px 10px 10px; font-weight:normal;" align="center">
                    <?php  $vat = $case_data->main_total/$case_data->financial_payments; $vat =  $vat * 5 / 100; echo $case_data->total-$vat; ?>
                    </td>
                </tr>
            </table>
        </td>
    </tr>       
    
	<tr>
    	<td style="padding:10px 15px 10px 15px;">
        	<table cellpadding="0" cellspacing="0" border="0" width="800" style="font-size:15px;">
            	<tr>
                	<td style="color:#333333; background:#ecdfc4; padding:10px 10px 10px 10px; font-weight:bold;" align="center"><?php echo $this->lang->line('Report');?></td>
                </tr>
            	<tr>
                	<td style="word-break: break-word;color:#333333; background:#ffffff; border:solid 1px #cccccc; padding:10px 10px 10px 10px; font-weight:normal;">
                      <p><?php echo $case_data->report; ?></p> 
                    </td>
                </tr>
            </table>
        </td>
    </tr>
    
    <tr>
    	<td style="padding:5px 15px 5px 15px;">
            <table cellpadding="0" cellspacing="0" border="0" width="900" style="font-size:15px;">
                <tr>
                    <td style="border-top:solid 1px #cccccc; border-bottom:solid 1px #cccccc;">
                        <table cellpadding="0" cellspacing="0" border="0" width="900" style="font-size:15px;">
                            <tr>
                                <td width="300" style="padding:10px 15px 10px 15px; color:#333333;"><?php echo $this->lang->line('invoice_Vat');?> (5%)</td>
                                <td width="600" style="text-align:right; padding:0px 30px 0px 0px;" align="right"><?php  $vat = $case_data->main_total/$case_data->financial_payments;  echo $vat * 5 / 100; ?></td>
                            </tr>
                        </table>
                    </td>
                </tr>
            </table>
        </td>
    </tr>
    
    <tr>
    	<td style="padding:5px 15px 5px 15px;">
            <table cellpadding="0" cellspacing="0" border="0" width="900" style="font-size:15px;">
                <tr>
                    <td style="border-top:solid 1px #cccccc; border-bottom:solid 1px #cccccc;">
                        <table cellpadding="0" cellspacing="0" border="0" width="900" style="font-size:15px;">
                            <tr>
                                <td width="300" style="padding:10px 15px 10px 15px; color:#333333; font-weight:bold;"> <?php echo $this->lang->line('Total_Amount_inSar');?></td>
                                <td width="600" style="background:#f3f3f3; text-align:right; padding:0px 30px 0px 0px;" align="right"><?php echo $case_data->total;?></td>
                            </tr>
                        </table>
                    </td>
                </tr>
            </table>
        </td>
    </tr>
    
    <tr>
    	<td style="background:#ffffff; padding:20px 20px 0px 20px;">
        	<table cellpadding="0" cellspacing="0" border="0" width="800">
            	<tr>
                	<td>
                    	<table cellpadding="0" cellspacing="0" border="0" width="325">
                            <tr>
                                <td width="120" style="color:#333333; margin:0px 10px 0px 0px; padding:10px 10px 0px 0px; font-weight:bold;"><?php echo $this->lang->line('Created_Time');?>:</td>
                                <td width="230" style="color:#333333; padding:10px 10px 0px 0px; border-bottom:solid 1px #cccccc;"><?php $timestamp = strtotime($case_data->create_date); echo  date("G:i",$timestamp); ?></td>
                            </tr>
                        </table>
                    </td>
                    <td width="50"></td>
                	<td>
                    	<table cellpadding="0" cellspacing="0" border="0" width="425">
                            <tr>
                                <td width="100" style="color:#333333; margin:0px 10px 0px 0px; padding:10px 10px 0px 0px; font-weight:bold;"><?php echo $this->lang->line('Created_By');?>:</td>
                                <td width="325" style="color:#333333; padding:10px 10px 0px 0px; border-bottom:solid 1px #cccccc;"><?php echo getEmployeeName($case_data->created_by);?></td>
                            </tr>
                        </table>
                    </td>
                </tr>
            </table>
        </td>
    </tr>
    
	<tr>
    	<td style="background:#ffffff; padding:20px 20px 0px 20px;">
        	<table cellpadding="0" cellspacing="0" border="0" width="900">
            	<tr>
                	<td align="center" style="padding:0px 0px 5px 0px; color:#666666; font-size:16px; text-align:center;" width="900">
                        If you have any questions about this invoice, please contact
					</td>
                </tr>
            	<tr>
                	<td align="center" style="padding:0px 0px 5px 0px; color:#0F2A4E; font-size:16px; text-align:center; font-weight:bold;" width="900">
                        Thank You For Your Business!
					</td>
                </tr>
            	<tr>
                	<td align="center" style="padding:0px 0px 5px 0px; color:#666666; font-size:16px; text-align:center;" width="900">
                        info@albarakatilaw.com
					</td>
                </tr>
            </table>
        </td>
    </tr>
    
    
</table>
</body>
</html>
