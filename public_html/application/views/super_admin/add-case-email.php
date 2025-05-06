<?php if($this->session->userdata('admin_site_lang')=="arabic" OR $this->session->userdata('admin_site_lang')=="") { ?>



<?php if ($notification_type == 'fine') { ?>
<p><span [removed]="font-weight: bold;">Dear Partner:,</span></p>
<p><span [removed]="font-weight: bold;">You have new fine. reason for fine is <?php echo $status_type; ?> Please check your panel for more details.</span></p>
<?php } ?>

<?php if ($notification_type == 'hre') { ?>
<p><span [removed]="font-weight: bold;">Dear Partner:,</span></p>
<p><span [removed]="font-weight: bold;">Your HR service has been <?php echo $status_type; ?>. Please check your panel for more details.</span></p>
<?php } ?>

<?php if ($notification_type == 'mission_note') { ?>
<p><span [removed]="font-weight: bold;">Dear Partner:,</span></p>
<p><span [removed]="font-weight: bold;">You have new message in <?php echo $msgd; ?><br><?php echo $status_type; ?>. Please check your panel for more details.</span></p>
<?php } ?>

<?php if ($notification_type == 'project') { ?>
<p><span [removed]="font-weight: bold;">Dear Partner:,</span></p>
<p><span [removed]="font-weight: bold;">You have new message in <?php echo $msgd; ?><br><?php echo $status_type; ?>. Please check your panel for more details.</span></p>
<?php } ?>


<?php if ($notification_type == 'invoice' && $status_type == "create") {?>
<p><span [removed]="font-weight: bold;">Hello <?php echo $name; ?>,</span></p>
<p><span [removed]="font-weight: bold;">َأملُ أن تكونَ خدمتنا قد ارْتَقَتْ لمُستوى تَطلُّعاتِكم.لقد صَدرت فاتورة خدمةرقم #<?php echo getCaseNumber($case_id) ;?>، ونقِّدِرُ لكم السداد خلال الساعات القادمة.</span></p>


<?php } ?>

<?php if ($notification_type == 'case' && $status_type == "add") {?>
<p><span [removed]="font-weight: bold;">شريكنا العزيز:,</span></p>
<p><span [removed]="font-weight: bold;">تمت إضافة الخدمة الإلكترونية مؤخرًا #<?php echo getCaseNumber($case_id) ;?> يرجى زيارة حسابك.</span></p>


<?php } ?>

<?php if ($status_type == "reject") {?>
<p><span [removed]="font-weight: bold;">شريكنا العزيز:,</span></p>
<p><span [removed]="font-weight: bold;">لقد تَعذَّر قَبول طلب خدمة قضية رقم: <?php echo getCaseNumber($case_id) ;?>#.لِمَعْرِفَةِ التفاصيل يُرْجَى زيارة إحدى مِنصَّاتِنا الإلكترونِيَّة</span></p>


<?php } ?>


<?php if ($notification_type == 'case' && $status_type == "change-approve") {?>
<p><span [removed]="font-weight: bold;">شريكنا العزيز:,</span></p>
<p><span [removed]="font-weight: bold;">Your E-Service no (#<?php echo getCaseNumber($case_id) ;?>) changes has been approved successfully.  Please visit your account o check your changes .</span></p>


<?php } ?>

<?php if ($notification_type == 'case' && $status_type == "approve") {?>
<p><span [removed]="font-weight: bold;">شريكنا العزيز:,</span></p>
<p><span [removed]="font-weight: bold;">لقد تم قبول طلب خدمة رقم: #<?php echo getCaseNumber($case_id) ;?> ويمكنك مُتابَعة إجراءات تنفيذ الخدمة من خلال الدخول على إحدى منصاتنا الإلكترونية.</span></p>


<?php } ?>

<?php if ($notification_type == 'case' && $status_type == "edit") {?>
<p><span [removed]="font-weight: bold;">شريكنا العزيز:,</span></p>
<p><span [removed]="font-weight: bold;">Your E-Service no (#<?php echo getCaseNumber($case_id) ;?>) has been edit successfully.  Please visit your account to check your changes .</span></p>

<?php }   ?>
<?php if ($notification_type == 'case' && $status_type == "assign") {?>
<p><span [removed]="font-weight: bold;">شريكنا العزيز:,</span></p>
<p><span [removed]="font-weight: bold;">Your E-Service (#<?php echo getCaseNumber($case_id) ;?>. Please visit your account.</span></p>

<?php } ?>

<?php if ($notification_type == 'customer' && $status_type == "assign") {?>
<p><span [removed]="font-weight: bold;">شريكنا العزيز:,</span></p>
<p><span [removed]="font-weight: bold;">You assign as a customer under <?php echo $ename;?>. Please visit your account.</span></p>

<?php } ?>


<?php if ($notification_type == 'general_appoinment' && $status_type == "add") {?>
<p><span [removed]="font-weight: bold;">شريكنا العزيز:,</span></p>
<p><span [removed]="font-weight: bold;">قد تَسَلَّمنا طلب خدمة استشارة قانونية رقم <?php echo getCaseNumber($case_id) ;?> وسَنُوافيكم دومًا بالمُسْتَجَدَّات من خلال زيارتكم لإحدى منصاتنا الإلكترونية.</span></p>

<?php } ?>

<?php if ($notification_type == 'general_appoinment' && $status_type == "close") {?>
<p><span [removed]="font-weight: bold;">شريكنا العزيز:,</span></p>
<p><span [removed]="font-weight: bold;">لقد أكملت # الخدمة العامة بنجاح: ويمكنك رؤية التفاصيل من خلال أحد الأنظمة الأ<?php echo getCaseNumber($case_id) ;?> ساسية لدينا.
"خدمتك ، وشكرًا على ثقتك"</span></p>

<?php } ?>

<?php if ($notification_type == 'session_appoinment' && $status_type == "add") {?>
<p><span [removed]="font-weight: bold;">شريكنا العزيز:,</span></p>
<p><span [removed]="font-weight: bold;">قد تَسَلَّمنا طلب خدمة استشارة قانونية رقم <?php echo getCaseNumber($case_id) ;?> وسَنُوافيكم دومًا بالمُسْتَجَدَّات من خلال زيارتكم لإحدى منصاتنا الإلكترونية.</span></p>

<?php } ?>

<?php if ($notification_type == 'session_appoinment' && $status_type == "close") {?>
<p><span [removed]="font-weight: bold;">شريكنا العزيز:,</span></p>
<p><span [removed]="font-weight: bold;">لقد أُنجِزَتْ مهمةُ جلسة  رقم: <?php echo getCaseNumber($case_id) ;?>بنجاح، ويمكنكم الاطِّلاع على التفاصيل عَبْر إحدى منصاتنا الإلكترونية.
"سْعَدُ بخدمَتكم، ومُمتنُّونَ لثقتكم"
</span></p>

<?php } ?>

<?php if ($notification_type == 'writings_appoinment' && $status_type == "add") {?>
<p><span [removed]="font-weight: bold;">شريكنا العزيز:,</span></p>
<p><span [removed]="font-weight: bold;">شريكنا العزيز
لقد تَسَلَّمنا طلب خدمة كتابة قانونية رقم <?php echo getCaseNumber($case_id) ;?>وسَنُوافيكم دومًا بالمُسْتَجَدَّات من خلال زيارتكم لإحدى منصاتنا الإلكترونية.
 </span></p>
<p><span [remov
ed]="font-weight: bold;">Thanks.....</span></p>
<?php } ?>

<?php if ($notification_type == 'writings_appoinment' && $status_type == "close") {?>
<p><span [removed]="font-weight: bold;">شريكنا العزيز:,</span></p>
<p><span [removed]="font-weight: bold;">لقد أُنجِزَتْ مهمةُ خدمة كتابة قانونية رقم: <?php echo getCaseNumber($case_id) ;?> بنجاح، ويمكنكم الاطِّلاع على التفاصيل عَبْر إحدى منصاتنا الإلكترونية.
"نَسْعَدُ بخدمَتكم، ومُمتنُّونَ لثقتكم"
</span></p>

<?php } ?>

<?php if ($notification_type == 'consultation_appoinment' && $status_type == "add") {?>
<p><span [removed]="font-weight: bold;">شريكنا العزيز:,</span></p>
<p><span [removed]="font-weight: bold;">قد تَسَلَّمنا طلب خدمة استشارة قانونية رقم <?php echo getCaseNumber($case_id) ;?> وسَنُوافيكم دومًا بالمُسْتَجَدَّات من خلال زيارتكم لإحدى منصاتنا الإلكترونية. </span></p>

<?php } ?>

<?php if ($notification_type == 'consultation_appoinment' && $status_type == "close") {?>
<p><span [removed]="font-weight: bold;">شريكنا العزيز:,</span></p>
<p><span [removed]="font-weight: bold;">لقد أُنجِزَتْ مهمةُ خدمة استشارة قانونية رقم: <?php echo getCaseNumber($case_id) ;?>بنجاح، ويمكنكم الاطِّلاع على التفاصيل عَبْر إحدى منصاتنا الإلكترونية.
"بخدمَتكم، ومُمتنُّونَ لثقتكم"
</span></p>

<?php } ?>

<?php if ($notification_type == 'visiting_appoinment' && $status_type == "add") {?>
<p><span [removed]="font-weight: bold;">شريكنا العزيز:,</span></p>
<p><span [removed]="font-weight: bold;">لقد تم قبول طلب خدمة كتابة قانونيَّة رقم <?php echo getCaseNumber($case_id) ;?>  ويمكنك مُتابَعة إجراءات تنفيذ الخدمة من خلال الدخول على إحدى منصاتنا الإلكترونية.</span></p>

<?php } ?>

<?php if ($notification_type == 'visiting_appoinment' && $status_type == "close") {?>
<p><span [removed]="font-weight: bold;">شريكنا العزيز:,</span></p>
<p><span [removed]="font-weight: bold;">لقد أُنجِزَتْ مهمةُ زيارة  رقم: <?php echo getCaseNumber($case_id) ;?>بنجاح، ويمكنكم الاطِّلاع على التفاصيل عَبْر إحدى منصاتنا الإلكترونية.
"نَسْعَدُ بخدمَتكم، ومُمتنُّونَ لثقتكم"
</span></p>

<?php }  }  else { ?>
<?php if ($notification_type == 'invoice' && $status_type == "create") {?>
<p><span [removed]="font-weight: bold;">Dear Partner:</span></p>
<p><span [removed]="font-weight: bold;">We hope that “Nassr” services have fulfilled your expectations.The invoice for service No. #<?php echo getCaseNumber($case_id) ;?> was issued. We appreciate your payment within the next few hours
</span></p>


<?php } ?>

<?php if ($notification_type == 'case' && $status_type == "add") { ?>
<p><span [removed]="font-weight: bold;">Dear Partner:,</span></p>
<p><span [removed]="font-weight: bold;">Your recently E-Service (#<?php echo getCaseNumber($case_id) ;?>) has been added successfully.  Please visit your account.</span></p>


<?php } ?>

<?php if ($notification_type == 'fine') { ?>
<p><span [removed]="font-weight: bold;">Dear Partner:,</span></p>
<p><span [removed]="font-weight: bold;">You have new fine. reason for fine is <?php echo $status_type; ?> Please check your panel for more details.</span></p>
<?php } ?>

<?php if ($notification_type == 'hre') { ?>
<p><span [removed]="font-weight: bold;">Dear Partner:,</span></p>
<p><span [removed]="font-weight: bold;">Your HR service has been <?php echo $status_type; ?>. Please check your panel for more details.</span></p>
<?php } ?>

<?php if ($notification_type == 'mission_note') { ?>
<p><span [removed]="font-weight: bold;">Dear Partner:,</span></p>
<p><span [removed]="font-weight: bold;">You have new message in <?php echo $msgd; ?><br><?php echo $status_type; ?>. Please check your panel for more details.</span></p>
<?php } ?>

<?php if ($notification_type == 'project') { ?>
<p><span [removed]="font-weight: bold;">Dear Partner:,</span></p>
<p><span [removed]="font-weight: bold;">You have new message in <?php echo $msgd; ?><br><?php echo $status_type; ?>. Please check your panel for more details.</span></p>
<?php } ?>

<?php if ($status_type == "reject") {?>
<p><span [removed]="font-weight: bold;">Dear Partner:,</span></p>
<p><span [removed]="font-weight: bold;">The request for No. (#<?php echo getCaseNumber($case_id) ;?>) wasrefused.For details, please visit one of “Nassr” platforms.</span></p>


<?php } ?>


<?php if ($notification_type == 'case' && $status_type == "change-approve") {?>
<p><span [removed]="font-weight: bold;">Dear Partner:,</span></p>
<p><span [removed]="font-weight: bold;">Your E-Service no (#<?php echo getCaseNumber($case_id) ;?>) changes has been approved successfully.  Please visit your account o check your changes .</span></p>


<?php } ?>

<?php if ($notification_type == 'case' && $status_type == "approve") {?>
<p><span [removed]="font-weight: bold;">Dear Partner:,</span></p>
<p><span [removed]="font-weight: bold;">The request for service No. #<?php echo getCaseNumber($case_id) ;?> was accepted. You can follow the procedures for service execution by entering any of “Nassr” platforms.</span></p>


<?php } ?>

<?php if ($notification_type == 'case' && $status_type == "edit") {?>
<p><span [removed]="font-weight: bold;">Dear Partner:,</span></p>
<p><span [removed]="font-weight: bold;">Your E-Service no (#<?php echo getCaseNumber($case_id) ;?>) has been edit successfully.  Please visit your account to check your changes .</span></p>

<?php }   ?>
<?php if ($notification_type == 'case' && $status_type == "assign") {?>
<p><span [removed]="font-weight: bold;">Dear Partner:,</span></p>
<p><span [removed]="font-weight: bold;">Your E-Service (#<?php echo getCaseNumber($case_id) ;?>. Please visit your account.</span></p>

<?php } ?>

<?php if ($notification_type == 'customer' && $status_type == "assign") {?>
<p><span [removed]="font-weight: bold;">Dear Partner:,</span></p>
<p><span [removed]="font-weight: bold;">You assign as a customer under <?php echo $ename;?>. Please visit your account.</span></p>

<?php } ?>


<?php if ($notification_type == 'general_appoinment' && $status_type == "add") {?>
<p><span [removed]="font-weight: bold;">Dear Partner:,</span></p>
<p><span [removed]="font-weight: bold;">We received your request for service No. <?php echo getCaseNumber($case_id) ;?> and will update you. For details, please visit any of “Nassr” platforms.</span></p>

<?php } ?>

<?php if ($notification_type == 'general_appoinment' && $status_type == "close") {?>
<p><span [removed]="font-weight: bold;">Dear Partner:,</span></p>
<p><span [removed]="font-weight: bold;">Dear Partner:Your legal general service task No. <?php echo getCaseNumber($case_id); ?> was successfully accomplished. For details, please visit any of “Nassr” platforms.<br>"We are happy to serve you and we are grateful for your trust"</span></p>

<?php } ?>

<?php if ($notification_type == 'session_appoinment' && $status_type == "add") {?>
<p><span [removed]="font-weight: bold;">Dear Partner:,</span></p>
<p><span [removed]="font-weight: bold;">We received your request for (lawsuit) service (……..) No. <?php echo getCaseNumber($case_id) ;?> and will update you. For details, please visit any of “Nassr” platforms. </span></p>

<?php } ?>

<?php if ($notification_type == 'session_appoinment' && $status_type == "close") {?>
<p><span [removed]="font-weight: bold;">Dear Partner:,</span></p>
<p><span [removed]="font-weight: bold;">Dear Partner:Your legal session service task No. <?php echo getCaseNumber($case_id); ?> was successfully accomplished. For details, please visit any of “Nassr” platforms.<br>"We are happy to serve you and we are grateful for your trust"</span></p>

<?php } ?>

<?php if ($notification_type == 'writings_appoinment' && $status_type == "add") {?>
<p><span [removed]="font-weight: bold;">Dear Partner:,</span></p>
<p><span [removed]="font-weight: bold;">We received your request for legal writing service No. <?php echo getCaseNumber($case_id) ;?> and will update you. For details, please visit any of “Nassr” platforms.  </span></p>
<p><span [remov
ed]="font-weight: bold;">Thanks.....</span></p>
<?php } ?>

<?php if ($notification_type == 'writings_appoinment' && $status_type == "close") {?>
<p><span [removed]="font-weight: bold;">Dear Partner:,</span></p>
<p><span [removed]="font-weight: bold;">Dear Partner:Your legal writing service task No. <?php echo getCaseNumber($case_id); ?> was successfully accomplished. For details, please visit any of “Nassr” platforms.<br>"We are happy to serve you and we are grateful for your trust"</span></p>

<?php } ?>

<?php if ($notification_type == 'consultation_appoinment' && $status_type == "add") {?>
<p><span [removed]="font-weight: bold;">Dear Partner:,</span></p>
<p><span [removed]="font-weight: bold;">We received your request for  consultation service  No. <?php echo getCaseNumber($case_id);?> and will update you. For details, please visit any of “Nassr” platforms.  </span></p>

<?php } ?>

<?php if ($notification_type == 'consultation_appoinment' && $status_type == "close") {?>
<p><span [removed]="font-weight: bold;">Dear Partner:,</span></p>
<p><span [removed]="font-weight: bold;">Dear Partner:Your legal consultation service task No. <?php echo getCaseNumber($case_id); ?> was successfully accomplished. For details, please visit any of “Nassr” platforms.<br>"We are happy to serve you and we are grateful for your trust"</span></p>

<?php } ?>

<?php if ($notification_type == 'visiting_appoinment' && $status_type == "add") {?>
<p><span [removed]="font-weight: bold;">Dear Partner:,</span></p>
<p><span [removed]="font-weight: bold;">We received your visiting request  No. <?php echo getCaseNumber($case_id) ;?> and will update you. For details, please visit any of “Nassr” platforms.</span></p>

<?php } ?>

<?php if ($notification_type == 'visiting_appoinment' && $status_type == "close") {?>
<p><span [removed]="font-weight: bold;">Dear Partner:,</span></p>
<p><span [removed]="font-weight: bold;">Dear Partner:Your legal visiting service task No. <?php echo getCaseNumber($case_id); ?> was successfully accomplished. For details, please visit any of “Nassr” platforms.<br>"We are happy to serve you and we are grateful for your trust"</span></p>

<?php }   } ?>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<table width="auto" border="0" cellpadding="0" cellspacing="0" style="font-family: Tahoma;background: #172b4c">
	<tr>
		<td width="" height="36" style="background: #ffffff;padding-right: 15px;">
			<img src="<?php echo base_url(); ?>/assets/images/img/logo.png" width="210">
		</td>
		<td  width="" height="" style="padding-right: 20px;padding-left: 10px;">
			<span style="color: #ffffff;font-weight: bold;font-size: 17px;">Ahmed Ghena</span><br>
			<span style="color: #ffffff;font-size: 16px;">Marketing Manager</span>
		</td>
		<td  width="" height="" style="font-size: 15px;color: #ffffff;padding-right: 20px">
			<span>M. +966 55 64 777 99</span><br>
			<span>info@albarakatilaw.com</span>
		</td>
		<td  width="" height="" style="font-size: 15px;color: #ffffff;">
			<span>Tel. 9 2 0 0 0 2 9 1 6</span><br>
			<span>Riyadh . Jeddah . Makkah</span>
		</td>
		<td>
			<img src="<?php echo base_url(); ?>/assets/images/ns_sg_bg2.png" width="210" />
		</td>
	</tr>
</table>
<table width="100%" border="0" cellpadding="0" cellspacing="0" style="font-family: Tahoma;margin-top: 20px">
	<tr>
		<td style="font-size: 11px;text-align: justify;color: #ccc;">
			<span>"This message is the property of Albarakati Law, or its affiliates. It may be legally privileged and/or confidential and is intended only for the use of the addressee(s). No addressee should forward, print, copy, or otherwise reproduce this message in any manner that would allow it to be viewed by any individual not originally listed as a recipient. If the reader of this message is not the intended recipient, you are hereby notified that any unauthorized disclosure, dissemination, distribution, copying or the taking of any action in reliance on the information herein is strictly prohibited. If you have received this communication in error, please immediately notify the sender and delete this message"</span>
		</td>
	</tr>
</table>