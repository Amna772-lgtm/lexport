<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd"> 
<html>
<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">

<title>Albarakati Law</title>
<link href="https://fonts.googleapis.com/css?family=Dosis:300,400,500,700&display=swap" rel="stylesheet">
</head>
<body>
<table cellpadding="0" cellspacing="0" border="0" width="700" align="center" style="border:solid 1px #cccccc; font-family: 'Dosis', sans-serif, Arial;">
<tr><td height="20"></td></tr>
<tr>
<td align="center"><img src="https://albarakatilaw.com/assets/images/logo.png" alt="albarakatilaw" width="300" border="0" /></td>
</tr>
<tr><td height="20"></td></tr>


<?php if($this->session->userdata('admin_site_lang')=="arabic" OR $this->session->userdata('admin_site_lang')=="") { ?>


<?php if ($notification_type == 'mission' && $status_type == "mission_asssign") { ?> 
<!-- Email Body -->
<tr>
	<td style="color:#c8a458; font-size:32px;" align="center"> تعيين مهمة</td>
</tr>
<tr>
	<td style="color:#7a7b7e; font-size:18px; padding:20px 100px 20px 100px; line-height:28px;" align="center">
	شريكنا العزيز<br />
	تم تعيين المهمة.<?php echo $msg ?>نرجو الاطلاع على لوحة التحكم المعرفة التفاصيل
	</td>
	</td>
</tr>
<tr>
	<!--<td align="center"><img src="<?php echo base_url('assets/images/email/');?>lawsuit-invoice.jpg" alt="albarakatilaw" border="0" /></td>-->
</tr>
 <!-- Email Body -->

<?php } ?>

<?php if ($notification_type == 'payment_status' && $status_type == "paid") { ?> 
<!-- Email Body -->
<tr>
	<td style="color:#c8a458; font-size:32px;" align="center"> تمت عملية الدفع بنجاح</td>
</tr>
<tr>
	<td style="color:#7a7b7e; font-size:18px; padding:20px 100px 20px 100px; line-height:28px;" align="center">
     شريكنا العزيز<br /> 
     شريكنا العزيز:  نفيدكم بأنه تمت عملية الدفع بنجاح للفاتورة رقم <?php echo $case_id ?> كما سيباشر الفريق المختص على إجراءات تقديم الخدمة القانونية نسعد بخدمتكم، وممتنون لثقتكم
	</td>
	</td>
</tr>
<tr>
	<!--<td align="center"><img src="<?php echo base_url('assets/images/email/');?>lawsuit-invoice.jpg" alt="albarakatilaw" border="0" /></td>-->
</tr>
 <!-- Email Body -->

<?php } ?>



<?php if ($notification_type == 'case' && $status_type == "case_convert") {?> 
<!-- Email Body -->
<tr>
	<td style="color:#c8a458; font-size:32px;" align="center">العميل المحَّول</td>
</tr>
<tr>
	<td style="color:#7a7b7e; font-size:18px; padding:20px 100px 20px 100px; line-height:28px;" align="center">
	شريكنا العزيز<br />
    لقد تم تعيينك كموظف محول إليه. لمزيدٍ من التفاصيل يرجى زيارة لوحة التحكم الخاصة بك.
	</td>
	</td>
</tr>
<tr>
	<!--<td align="center"><img src="<?php echo base_url('assets/images/email/');?>lawsuit-invoice.jpg" alt="albarakatilaw" border="0" /></td>-->
</tr>
 <!-- Email Body -->

<?php } ?>



<?php if ($notification_type == 'case' && $status_type == "case_res_emp") {?> 
<!-- Email Body -->
<tr>
	<td style="color:#c8a458; font-size:32px;" align="center"> تعيين خدمة الكترونية</td>
</tr>
<tr>
	<td style="color:#7a7b7e; font-size:18px; padding:20px 100px 20px 100px; line-height:28px;" align="center">
	شريكنا العزيز<br />
	لقد تم تعيينك كموظف مسئول عن الخدمة الإلكترونية رقم.


	</td>
	</td>
</tr>
<tr>
	<!--<td align="center"><img src="<?php echo base_url('assets/images/email/');?>lawsuit-invoice.jpg" alt="albarakatilaw" border="0" /></td>-->
</tr>
 <!-- Email Body -->

<?php } ?> 



<?php if ($notification_type == 'case' && $status_type == "case_follow_emp") {?> 
<!-- Email Body -->
<tr>
	<td style="color:#c8a458; font-size:32px;" align="center">تعين خدمة لموظف متابع</td>
</tr>
<tr>
	<td style="color:#7a7b7e; font-size:18px; padding:20px 100px 20px 100px; line-height:28px;" align="center">
	شريكنا العزيز<br />
    شريكنا العزيز لقد تم تعيينك كموظف متابع بخصوص الخدمة الإلكترونية رقم.<?php echo getCaseNumber($case); ?>
	</td>
	</td>
</tr>
<tr>
	<!--<td align="center"><img src="<?php echo base_url('assets/images/email/');?>lawsuit-invoice.jpg" alt="albarakatilaw" border="0" /></td>-->
</tr>
 <!-- Email Body -->


<?php } ?>


<?php if ($notification_type == 'fine') { ?>
<!-- Email Body -->
<tr>
	<td style="color:#c8a458; font-size:32px;" align="center">جزاء</td>
</tr>
<tr>
	<td style="color:#7a7b7e; font-size:18px; padding:20px 100px 20px 100px; line-height:28px;" align="center">
	شريكنا العزيز,<br />
لقد تم إيقاع جزاء . بسبب <?php echo $status_type; ?>​ ،  ولمزيدٍ من التفاصيل يرجى زيارة لوحة التحكم الخاصة بك.<br /> 
	</td>
</tr>
<tr>
	<!--<td align="center"><img src="<?php echo base_url('assets/images/email/');?>task-invoice.jpg" alt="albarakatilaw" border="0" /></td>-->
</tr>
 <!-- Email Body -->

<?php } ?>

<?php if ($notification_type == 'hre') { ?>
<p><span [removed]="font-weight: bold;">Dear Partner:,</span></p>

<!-- Email Body -->
<tr>
	<td style="color:#c8a458; font-size:32px;" align="center">خدمة الموارد البشرية</td>
</tr>
<tr>
	<td style="color:#7a7b7e; font-size:18px; padding:20px 100px 20px 100px; line-height:28px;" align="center">
	شريكنا العزيز<br />
	لقد تم <?php echo getCaseNumber($case_id); ?>​خدمة الموارد البشرية الخاصة بك. لمزيدٍ من التفاصيل يُرجى زيارة لوحة التحكم الخاصة بك.<br /> 
	</td>
</tr>
<tr>
	<!--<td align="center"><img src="<?php echo base_url('assets/images/email/');?>task-invoice.jpg" alt="albarakatilaw" border="0" /></td>-->
</tr> 
<?php } ?>

<?php if ($notification_type == 'mission_note') { ?>

<!-- Email Body -->
<tr>
	<td style="color:#c8a458; font-size:32px;" align="center"><?php echo $msgd; ?></td>
</tr>
<tr>
	<td style="color:#7a7b7e; font-size:18px; padding:20px 100px 20px 100px; line-height:28px;" align="center">
	شريكنا العزيز<br />
	لديك رسالة جديدة في  <?php echo $msgd; ?> <?php echo $status_type; ?>​  لمزيدٍ من التفاصيل يُرجى زيارة الملف الخاص بك<br>
 	</td>
</tr>
<tr>
	<!--<td align="center"><img src="<?php echo base_url('assets/images/email/');?>task-invoice.jpg" alt="albarakatilaw" border="0" /></td>-->
</tr> 

<?php } ?>

<?php if ($notification_type == 'project') { ?>

<!-- Email Body -->
<tr>
	<td style="color:#c8a458; font-size:32px;" align="center">المشروع </td>
</tr>
<tr>
	<td style="color:#7a7b7e; font-size:18px; padding:20px 100px 20px 100px; line-height:28px;" align="center">
	شريكنا العزيز<br />
	لديك رسالة جديدة في  <?php echo $msgd; ?><br><?php echo $status_type; ?>​ لمزيدٍ من التفاصيل يُرجى الرجوع إلى الملف الخاص بك.
	</td>
</tr>
<tr>
	<!--<td align="center"><img src="<?php echo base_url('assets/images/email/');?>task-invoice.jpg" alt="albarakatilaw" border="0" /></td>-->
</tr> 
<!-- Email Body -->

<?php } ?>


<?php if ($notification_type == 'invoice' && $status_type == "create") {?>
<!-- Email Body -->
<tr>
	<td style="color:#c8a458; font-size:32px;" align="center">صدرت فاتورة للخدمة رقم <?php echo getCaseNumber($case_id) ;?></td>
</tr>
<tr>
	<td style="color:#7a7b7e; font-size:18px; padding:20px 100px 20px 100px; line-height:28px;" align="center">
	شريكنا العزيز:<br />
 نأمل أن تكون خدمتنا قد ارتقت لمستوى تطلعاتكم. لقد صدرت فاتورة للخدمة رقم <?php echo getCaseNumber($case_id) ;?> ونقدر لكم السداد خلال الساعات القادمة.
 </tr>
<tr>
	<td align="center"><img src="<?php echo base_url('assets/images/email/');?>task-invoice.jpg" alt="albarakatilaw" border="0" /></td>
</tr>
 <!-- Email Body -->

<?php } ?>

<?php if ($notification_type == 'case' && $status_type == "add") {?> 
<!-- Email Body -->
<tr>
	<td style="color:#c8a458; font-size:32px;" align="center"> تسلم خدمة قانونية</td>
</tr>
<tr>
	<td style="color:#7a7b7e; font-size:18px; padding:20px 100px 20px 100px; line-height:28px;" align="center">
  تسلم خدمة إلكترونية <br> 
لقد تسلَّمنا طلب خدمة قانونية رقم <?php echo getCaseNumber($case_id) ;?>​وسنوافيكم دومًا بالمستجدات من خلال زيارتكم لإحدى منصاتنا الإلكترونية.<br>	</br>
	</td>
</tr>
<tr>
	<!--<td align="center"><img src="<?php echo base_url('assets/images/email/');?>lawsuit-invoice.jpg" alt="albarakatilaw" border="0" /></td>-->
</tr>
 <!-- Email Body -->


<?php } ?>




<?php if ($status_type == "reject") {?>

<!-- Email Body -->
<tr>
	<td style="color:#c8a458; font-size:32px;" align="center">رفض الخدمة القانونية</td>
</tr>
<tr>  
	<td style="color:#7a7b7e; font-size:18px; padding:20px 100px 20px 100px; line-height:28px;" align="center">
    شريكنا العزيز:<br>
    لقد تعذر قبول طلب الخدمة القانونية رقم: <?php echo getCaseNumber($case_id)  ?> لمعرفة التفاصيل يرجى زيارة إحدى منصاتنا الإلكترونية<br>
    
    </td>
</tr>
<tr>
	<td align="center"><img src="<?php echo base_url('assets/images/email/');?>task-service-rejection.jpg" alt="albarakatilaw" border="0" /></td>
</tr>
 <!-- Email Body -->
 

<?php } ?>


<?php if ($notification_type == 'case' && $status_type == "change-approve") {?>

<p><span [removed]="font-weight: bold;">شريكنا العزيز:,</span></p>
<p><span [removed]="font-weight: bold;">Your E-Service no (#<?php echo getCaseNumber($case_id) ;?>) changes has been approved successfully.  Please visit your account o check your changes .</span></p>


<?php } ?>

<?php if ($notification_type == 'case' && $status_type == "approve") {?>

<!-- Email Body -->
<tr>
	<td style="color:#c8a458; font-size:32px;" align="center">قبول الخدمة القانونية</td>
</tr>
<tr>
	<td style="color:#7a7b7e; font-size:18px; padding:20px 100px 20px 100px; line-height:28px;" align="center">
شريكنا العزيز:<br>
 تم قبول طلب الخدمة القانونية رقم: <?php echo getCaseNumber($case_id)  ?> لمعرفة التفاصيل يرجى زيارة إحدى منصاتنا الإلكترونية<br /> 
	</td>
</tr>
<tr>
	<td align="center"><img src="<?php echo base_url('assets/images/email/');?>visit-complete2.jpg" alt="albarakatilaw" border="0" /></td>
</tr>
 <!-- Email Body -->



<?php } ?>

<?php if ($notification_type == 'case' && $status_type == "edit") {?>
<p><span [removed]="font-weight: bold;">شريكنا العزيز:,</span></p>
<p><span [removed]="font-weight: bold;">Your E-Service no (#<?php echo getCaseNumber($case_id) ;?>) has been edit successfully.  Please visit your account to check your changes .</span></p>

<?php }   ?>
<?php if ($notification_type == 'case' && $status_type == "assign") {?>
 
<!-- Email Body -->
    <tr>
    	<td style="color:#c8a458; font-size:32px;" align="center">التعيين على خدمة إلكترونية</td>
    </tr>
    <tr>
    	<td style="color:#7a7b7e; font-size:18px; padding:20px 100px 20px 100px; line-height:28px;" align="center">
		شريكنا العزيز<br />
        لقد تم تعيينك كموظف مُتَابَع بخصوص الخدمة الإلكترونية رقم. <?php echo getCaseNumber($case_id); ?>
  		<br /> 
		</td>
    </tr>
    <tr>
            </tr>
    
    <!-- End Email Body -->   
<?php } ?>

<?php if ($notification_type == 'customer' && $status_type == "assign") {?>
<p><span [removed]="font-weight: bold;">شريكنا العزيز:,</span></p>
<p><span [removed]="font-weight: bold;">You assign as a customer under <?php echo $ename;?>. Please visit your account.</span></p>

<?php } ?>


<?php if ($notification_type == 'general_appoinment' && $status_type == "add") {?>


<!-- Email Body -->
    <tr>
    	<td style="color:#c8a458; font-size:32px;" align="center">إنشاء مهمة عامة</td>
    </tr>
    <tr>
    	<td style="color:#7a7b7e; font-size:18px; padding:20px 100px 20px 100px; line-height:28px;" align="center">
	         شريكنا العزيز:<br />
	         لقد أنشئت  مهمة للخدمة رقم <?php echo getCaseNumber($case_id); ?> وسنوافيكم دومًا بالمستجدات من خلال زيارتكم لإحدى منصاتنا الإلكترونية.
    	</td>
    </tr>
    <tr>
        <td align="center"><img src="<?php echo base_url('assets/images/email/');?>general-service.jpg" alt="albarakatilaw" border="0" /></td>
    </tr>
    
    <!-- End Email Body -->   
<?php } ?>

<?php if ($notification_type == 'general_appoinment' && $status_type == "close") {?>

<!-- Email Body -->
<tr>
	<td style="color:#c8a458; font-size:32px;" align="center"> إنجاز المهمة عامة       </td>
</tr>
<tr>
	<td style="color:#7a7b7e; font-size:18px; padding:20px 100px 20px 100px; line-height:28px;" align="center">
	شريكنا العزيز:<br />
	لقد أنجزت مهمة الخدمة رقم: <?php echo getCaseNumber($case_id); ?> ، ويمكنكم الاطِّلاع على التفاصيل عبر إحدى منصاتنا الإلكترونية. "نسعد بخدمتكم، وممتنون لثقتكم"
    </td>
</tr>
<tr>
	<td align="center"><img src="<?php echo base_url('assets/images/email/');?>general-service.jpg" alt="albarakatilaw" border="0" /></td>
</tr>

<!-- End Email Body -->    

<?php } ?>

<?php if ($notification_type == 'session_appoinment' && $status_type == "add") {?>

<!-- Email Body -->
    <tr>
    	<td style="color:#c8a458; font-size:32px;" align="center">جلسة جديدة للخدمة رقم <?php echo getCaseNumber($case_id); ?></td>
    </tr>
    <tr>
    	<td style="color:#7a7b7e; font-size:18px; padding:20px 100px 20px 100px; line-height:28px;" align="center">
		شريكنا العزيز<br />
        لقد أنشئت مهمة جلسة للخدمة رقم <?php echo getCaseNumber($case_id); ?>​ وسنوافيكم دومًا بالمستجدات من خلال زيارتكم لإحدى منصاتنا الإلكترونية.<br>
 		</td>
    </tr>
    <tr>
        <td align="center"><img src="<?php echo base_url('assets/images/email/');?>hearing-service.jpg" alt="albarakatilaw" border="0" /></td>
    </tr>
    
    <!-- End Email Body -->  
  
<?php } ?>

<?php if ($notification_type == 'session_appoinment' && $status_type == "close") {?>

<!-- Email Body -->
<tr>
	<td style="color:#c8a458; font-size:32px;" align="center">انجاز مهمة قضايا</td>
</tr>
<tr>
<td style="color:#7a7b7e; font-size:18px; padding:20px 100px 20px 100px; line-height:28px;" align="center">
شريكنا العزيز:<br>

لقد أنجزت مهمةُ الجلسة للخدمة رقم: <?php echo getCaseNumber($case_id); ?>​، ويمكنكم الاطِّلاع على التفاصيل عبر إحدى منصاتنا الإلكترونية.

"نسعد بخدمتكم، وممتنون لثقتكم"
</td>
</tr>
<tr>
	<td align="center"><img src="<?php echo base_url('assets/images/email/');?>hearing-complete.jpg" alt="albarakatilaw" border="0" /></td>
</tr>
 <!-- Email Body -->
 
<?php } ?>

<?php if ($notification_type == 'writings_appoinment' && $status_type == "add") {?>
 
    <!-- Email Body -->
    <tr>
    	<td style="color:#c8a458; font-size:32px;" align="center">  <?php echo getCaseNumber($case_id)  ?>للخدمة رقم إنشاء مهمة كتابة</td>
    </tr>
    <tr>
    	<td style="color:#7a7b7e; font-size:18px; padding:20px 100px 20px 100px; line-height:28px;" align="center">
        شريشريكنا العزيز:<br />
        لقد أنشئت مهمة كتابة قانونية للخدمة رقم <?php echo getCaseNumber($case_id); ?>​ وسنوافيكم دومًا بالمستجدات من خلال زيارتكم لإحدى منصاتنا الإلكترونية.
		</td>
    </tr>
    <tr>
        <td align="center"><img src="<?php echo base_url('assets/images/email/');?>writing-service.jpg" alt="albarakatilaw" border="0" /></td>
    </tr>
    
    <!-- End Email Body --> 
<p><span [removed]="font-weight: bold;">:,</span></p>
<p><span [removed]="font-weight: bold;">
 </span></p>
<p><span [remov
ed]="font-weight: bold;">Thanks.....</span></p>
<?php } ?>

<?php if ($notification_type == 'writings_appoinment' && $status_type == "close") {?>

<!-- Email Body -->
<tr>
	<td style="color:#c8a458; font-size:32px;" align="center"> إنجاز المهمة كتابة</td>
</tr>
<tr>
	<td style="color:#7a7b7e; font-size:18px; padding:20px 100px 20px 100px; line-height:28px;" align="center">
شريكنا العزيز:<br>
لقد أنجزت مهمةُ الكتابة القانونية للخدمة رقم: <?php echo getCaseNumber($case_id); ?>​، ويمكنكم الاطِّلاع على التفاصيل عبر إحدى منصاتنا الإلكترونية.
"نسعد بخدمتكم، وممتنون لثقتكم"
<br/> 
	</td>
</tr>
<tr>
	<td align="center"><img src="<?php echo base_url('assets/images/email/');?>writing-service-complete.jpg" alt="albarakatilaw" border="0" /></td>
</tr>

<!-- End Email Body -->  
<?php } ?>

<?php if ($notification_type == 'consultation_appoinment' && $status_type == "add") {?>
<!-- Email Body -->
    <tr>
    	<td style="color:#c8a458; font-size:32px;" align="center"> انشاء استشارة</td>
    </tr>
    <tr>
    	<td style="color:#7a7b7e; font-size:18px; padding:20px 100px 20px 100px; line-height:28px;" align="center">
            شريكنا العزيز<br> 
 		    شريكنا العزيز: لقد أنشئت مهمة استشارة للخدمة رقم <?php echo getCaseNumber($case_id); ?> وسنوافيكم دومًا بالمستجدات من خلال زيارتكم لإحدى منصاتنا الإلكترونية.
 		</td>
    </tr>
    <tr>
        <td align="center"><img src="<?php echo base_url('assets/images/email/');?>legal-service.jpg" alt="albarakatilaw" border="0" /></td>
    </tr>
    
    <!-- End Email Body --> 
<?php } ?>

<?php if ($notification_type == 'consultation_appoinment' && $status_type == "close") {?>

<!-- Email Body -->
<tr>
	<td style="color:#c8a458; font-size:32px;" align="center">إنجاز المهمة استشارة </td>
</tr>
<tr>
<td style="color:#7a7b7e; font-size:18px; padding:20px 100px 20px 100px; line-height:28px;" align="center">
شريكنا العزيز:<br> 
شريكنا العزيز: لقد أنجزت مهمةُ الاستشارة  للخدمة  رقم: <?php echo getCaseNumber($case_id); ?> بنجاح، ويمكنكم الاطِّلاع على التفاصيل عبر إحدى منصاتنا الإلكترونية. "نسعد بخدمتكم، وممتنون لثقتكم"
</td>
</tr>
<tr>
	<td align="center"><img src="<?php echo base_url('assets/images/email/');?>consulting-complete.jpg" alt="albarakatilaw" border="0" /></td>
</tr>

<!-- End Email Body -->   

<?php } ?>

<?php if ($notification_type == 'visiting_appoinment' && $status_type == "add") {?>

<!-- Email Body -->
    <tr>
    	<td style="color:#c8a458; font-size:32px;" align="center">اجتماع  جديد للخدمة رقم <?php echo getCaseNumber($case_id); ?></td>
    </tr>
    <tr>
    	<td style="color:#7a7b7e; font-size:18px; padding:20px 100px 20px 100px; line-height:28px;" align="center">
 	    شريكنا العزيز<br>
 	    لقد أنشئت  مهمة اجتماع  للخدمة رقم <?php echo getCaseNumber($case_id); ?>​ وسنوافيكم دومًا بالمستجدات من خلال زيارتكم لإحدى منصاتنا الإلكترونية.<br>
 		</td>
    </tr>
    <tr>
        <td align="center"><img src="<?php echo base_url('assets/images/email/');?>visiting-service.jpg" alt="albarakatilaw" border="0" /></td>
    </tr>
    
    <!-- End Email Body -->  


<?php } ?>

<?php if ($notification_type == 'visiting_appoinment' && $status_type == "close") {?>

<!-- Email Body -->
<tr>
	<td style="color:#c8a458; font-size:32px;" align="center">انجاز مهمة اجتماع</td>
</tr>
<tr>
	<td style="color:#7a7b7e; font-size:18px; padding:20px 100px 20px 100px; line-height:28px;" align="center">
	شريشريكنا العزيز<br />
	لقد أنجزت مهمةُ الاجتماع للخدمة  رقم: <?php echo getCaseNumber($case_id)  ?> ويمكنكم الاطِّلاع على التفاصيل عبر إحدى منصاتنا الإلكترونية. "نسعد بخدمتكم، وممتنون لثقتكم"
	</td>
</tr>
<tr>
	<td align="center"><img src="<?php echo base_url('assets/images/email/');?>visit-complete.jpg" alt="albarakatilaw" border="0" /></td>
</tr>
 <!-- Email Body -->

<?php }  }  else { ?>


<?php if ($notification_type == 'payment_status' && $status_type == "paid") { ?> 
<!-- Email Body -->
<tr>
	<td style="color:#c8a458; font-size:32px;" align="center">Your payment received successfully </td>
</tr>
<tr>
	<td style="color:#7a7b7e; font-size:18px; padding:20px 100px 20px 100px; line-height:28px;" align="center">
    Dear Partner : <br>
Dear partner: We hope that "nassr service have fulfilled your expectations" we received your payment successfully for invoice #<?php echo $case_id ?>  and we process your legal E-service to the initiated appropriate team<br>

"We are happy to serve you and we are grateful for your trust"<br>
    </td>
	</td>
</tr>
<tr>
	<!--<td align="center"><img src="<?php echo base_url('assets/images/email/');?>lawsuit-invoice.jpg" alt="albarakatilaw" border="0" /></td>-->
</tr>
 <!-- Email Body -->

<?php } ?>
<?php if ($notification_type == 'mission' && $status_type == "mission_asssign") { ?> 
<!-- Email Body -->
<tr>
	<td style="color:#c8a458; font-size:32px;" align="center"><?php echo $msg ?></td>
</tr>
<tr>
	<td style="color:#7a7b7e; font-size:18px; padding:20px 100px 20px 100px; line-height:28px;" align="center">
	Dear Partner<br />
    You have assigen as folowing employee in <?php echo $msg ?>. Please check your panel for more details.
	</td>
	</td>
</tr>
<tr>
	<!--<td align="center"><img src="<?php echo base_url('assets/images/email/');?>lawsuit-invoice.jpg" alt="albarakatilaw" border="0" /></td>-->
</tr>
 <!-- Email Body -->

<?php } ?>

<?php if ($notification_type == 'case' && $status_type == "case_convert") { ?> 
<!-- Email Body -->
<tr>
	<td style="color:#c8a458; font-size:32px;" align="center">Converted Customer</td>
</tr>
<tr>
	<td style="color:#7a7b7e; font-size:18px; padding:20px 100px 20px 100px; line-height:28px;" align="center">
	Dear Partner,<br />
    You have been assigned as a converted employee. Please check your panel for more details.
	</td>
	</td>
</tr>
<tr>
	<!--<td align="center"><img src="<?php echo base_url('assets/images/email/');?>lawsuit-invoice.jpg" alt="albarakatilaw" border="0" /></td>-->
</tr>
 <!-- Email Body -->

<?php } ?>


<?php if ($notification_type == 'case' && $status_type == "case_follow_emp") {?> 
<!-- Email Body -->
<tr>
	<td style="color:#c8a458; font-size:32px;" align="center">Assigen E-service</td>
</tr>
<tr>
	<td style="color:#7a7b7e; font-size:18px; padding:20px 100px 20px 100px; line-height:28px;" align="center">
	Dear Partner<br />
    You have assigen as followeup employee on E-service No. <?php echo getCaseNumber($case); ?>
	</td>
	</td>
</tr>
<tr>
	<!--<td align="center"><img src="<?php echo base_url('assets/images/email/');?>lawsuit-invoice.jpg" alt="albarakatilaw" border="0" /></td>-->
</tr>
 <!-- Email Body -->


<?php } ?>


<?php if ($notification_type == 'case' && $status_type == "case_res_emp") {?> 
<!-- Email Body -->
<tr>
	<td style="color:#c8a458; font-size:32px;" align="center">E-Service Created</td>
</tr>
<tr>
	<td style="color:#7a7b7e; font-size:18px; padding:20px 100px 20px 100px; line-height:28px;" align="center">
	Dear Partner<br />
    You have assigen as responsible employee on E-service No. <?php echo getCaseNumber($case); ?>
	</td>
	</td>
</tr>
<tr>
	<!--<td align="center"><img src="<?php echo base_url('assets/images/email/');?>lawsuit-invoice.jpg" alt="albarakatilaw" border="0" /></td>-->
</tr>
 <!-- Email Body -->


<?php } ?>



<?php if ($notification_type == 'invoice' && $status_type == "create") {?>
<!-- Email Body -->
<tr>
	<td style="color:#c8a458; font-size:32px;" align="center">Invoice for service number <?php echo getCaseNumber($case_id) ;?> </td>
</tr>
<tr>
	<td style="color:#7a7b7e; font-size:18px; padding:20px 100px 20px 100px; line-height:28px;" align="center">
 Dear Partner:<br> We hope that  our services have  met your expectations. The invoice for the Legal service number <?php echo getCaseNumber($case_id) ;?> was issued. We appreciate your payment within the next few hours.
 	</td>
</tr>
<tr>
	<td align="center"><img src="<?php echo base_url('assets/images/email/');?>task-invoice.jpg" alt="albarakatilaw" border="0" /></td>
</tr>
 <!-- Email Body -->

<?php } ?>

<?php if ($notification_type == 'case' && $status_type == "add") { ?>

<!-- Email Body -->
<tr>
	<td style="color:#c8a458; font-size:32px;" align="center">E-Service delivery</td>
</tr>
<tr>
	<td style="color:#7a7b7e; font-size:18px; padding:20px 100px 20px 100px; line-height:28px;" align="center">
	Dear Partner:<br />
	We received your request for legal service No.<?php echo getCaseNumber($case_id) ;?> and we will always update you. For details, please visit any of “Nassr” platforms. <br /> 
	</td>
</tr>
<tr>
	<!--<td align="center"><img src="<?php echo base_url('assets/images/email/');?>lawsuit-invoice.jpg" alt="albarakatilaw" border="0" /></td>-->
</tr>
 <!-- Email Body -->

<?php } ?>

<?php if ($notification_type == 'fine') { ?>

<!-- Email Body -->
<tr>
	<td style="color:#c8a458; font-size:32px;" align="center">Fine</td>
</tr>
<tr>
	<td style="color:#7a7b7e; font-size:18px; padding:20px 100px 20px 100px; line-height:28px;" align="center">
	Dear Partner,<br />
	You have new fine. reason for fine is <?php echo $status_type; ?>. Please check your panel for more details.<br /> 
	</td>
</tr>
<tr>
	<!--<td align="center"><img src="<?php echo base_url('assets/images/email/');?>task-invoice.jpg" alt="albarakatilaw" border="0" /></td>-->
</tr>
 <!-- Email Body -->
<?php } ?>

<?php if ($notification_type == 'hre') { ?>

<!-- Email Body -->
<tr>
	<td style="color:#c8a458; font-size:32px;" align="center">HR services</td>
</tr>
<tr>
	<td style="color:#7a7b7e; font-size:18px; padding:20px 100px 20px 100px; line-height:28px;" align="center">
	Dear Partner,<br />
    Your HR service has been <?php echo $status_type; ?> Please check your panel for more details.<br /> 
	</td>
</tr>
<tr>
	<!--<td align="center"><img src="<?php echo base_url('assets/images/email/');?>task-invoice.jpg" alt="albarakatilaw" border="0" /></td>-->
</tr> 
<?php } ?>

<?php if ($notification_type == 'mission_note') { ?>

<!-- Email Body -->
<tr>
	<td style="color:#c8a458; font-size:32px;" align="center"><?php echo $msgd; ?></td>
</tr>
<tr>
	<td style="color:#7a7b7e; font-size:18px; padding:20px 100px 20px 100px; line-height:28px;" align="center">
	Dear Partner<br />
	You have new message in <?php echo $msgd; ?> <?php echo $status_type; ?> Please check your panel for more details.
 	</td>
</tr>
<tr>
	<!--<td align="center"><img src="<?php echo base_url('assets/images/email/');?>task-invoice.jpg" alt="albarakatilaw" border="0" /></td>-->
</tr> 

<?php } ?>

<?php if ($notification_type == 'project') { ?>

<!-- Email Body -->
<tr>
	<td style="color:#c8a458; font-size:32px;" align="center">Project </td>
</tr>
<tr>
	<td style="color:#7a7b7e; font-size:18px; padding:20px 100px 20px 100px; line-height:28px;" align="center">
	Dear Partner<br />
	You have new message in <?php echo $msgd; ?><br><?php echo $status_type; ?> Please check your panel for more details.
	</td>
</tr>
<tr>
	<!--<td align="center"><img src="<?php echo base_url('assets/images/email/');?>task-invoice.jpg" alt="albarakatilaw" border="0" /></td>-->
</tr> 
<!-- Email Body -->
<?php } ?>

<?php if ($status_type == "reject") {?>

<!-- Email Body -->
<tr>
	<td style="color:#c8a458; font-size:32px;" align="center">E-service Rejected</td>
</tr>
<tr>
	<td style="color:#7a7b7e; font-size:18px; padding:20px 100px 20px 100px; line-height:28px;" align="center">
	Dear Partner:<br />
        The request for E service No.<?php echo getCaseNumber($case_id)  ?> was refused. For details, please visit one of “Nassr” platforms.
<br>
 	</td>
</tr>
<tr>
	<td align="center"><img src="<?php echo base_url('assets/images/email/');?>task-service-rejection.jpg" alt="albarakatilaw" border="0" /></td>
</tr>
 <!-- Email Body -->
 
<?php } ?>


<?php if ($notification_type == 'case' && $status_type == "change-approve") {?>
<p><span [removed]="font-weight: bold;">Dear Partner:,</span></p>
<p><span [removed]="font-weight: bold;">Your E-Service no (#<?php echo getCaseNumber($case_id) ;?>) changes has been approved successfully.  Please visit your account o check your changes .</span></p>


<?php } ?>

<?php if ($notification_type == 'case' && $status_type == "approve") {?>
<!-- Email Body -->
<tr>
	<td style="color:#c8a458; font-size:32px;" align="center">E service approved</td>
</tr>
<tr>
	<td style="color:#7a7b7e; font-size:18px; padding:20px 100px 20px 100px; line-height:28px;" align="center">
	Dear Partner<br />
 	The request for E service No.<?php echo getCaseNumber($case_id) ;?> was approved. For details, please visit one of “Nassr” platforms.
	</td>
</tr>
<tr>
	<td align="center"><img src="<?php echo base_url('assets/images/email/');?>visit-complete2.jpg" alt="albarakatilaw" border="0" /></td>
</tr>
 <!-- Email Body -->
<?php } ?>

<?php if ($notification_type == 'case' && $status_type == "edit") {?>
<p><span [removed]="font-weight: bold;">Dear Partner:,</span></p>
<p><span [removed]="font-weight: bold;">Your E-Service no (#<?php echo getCaseNumber($case_id) ;?>) has been edit successfully.  Please visit your account to check your changes .</span></p>

<?php }   ?>
<?php if ($notification_type == 'case' && $status_type == "assign") {?>

<!-- Email Body -->
    <tr>
    	<td style="color:#c8a458; font-size:32px;" align="center">E-service Assign</td>
    </tr>
    <tr>
    	<td style="color:#7a7b7e; font-size:18px; padding:20px 100px 20px 100px; line-height:28px;" align="center">
	    Dear Partner,<br>
	    You have been assigned as a followed-up employee on E-service No.<?php echo getCaseNumber($case_id) ;?>
    	<br /> 
	    </td>
    </tr>
    <tr>
    </tr>
    
    <!-- End Email Body --> 
<?php } ?>

<?php if ($notification_type == 'customer' && $status_type == "assign") {?>
<p><span [removed]="font-weight: bold;">Dear Partner:,</span></p>
<p><span [removed]="font-weight: bold;">You assign as a customer under <?php echo $ename;?>.  For details, please visit any of “Nassr” platforms.</span></p>

<?php } ?>


<?php if ($notification_type == 'general_appoinment' && $status_type == "add") {?>

<!-- Email Body -->
    <tr>
    	<td style="color:#c8a458; font-size:32px;" align="center">General Tasks Creation</td>
    </tr>
    <tr>
    	<td style="color:#7a7b7e; font-size:18px; padding:20px 100px 20px 100px; line-height:28px;" align="center">
		Dear Partner:<br />
        Task service No <?php echo getCaseNumber($case_id); ?> has been created and we will always update you. For details, please visit any of “Nassr” platforms.    <br /> 
		</td>
    </tr>
    <tr>
        <td align="center"><img src="<?php echo base_url('assets/images/email/');?>general-service.jpg" alt="albarakatilaw" border="0" /></td>
    </tr> 
 
<?php } ?>

<?php if ($notification_type == 'general_appoinment' && $status_type == "close") {?>

<!-- Email Body -->
<tr>
	<td style="color:#c8a458; font-size:32px;" align="center">General task accomplishment</td>
</tr>
<tr>
	<td style="color:#7a7b7e; font-size:18px; padding:20px 100px 20px 100px; line-height:28px;" align="center">
    Dear Partner:<br />
    Your service task No. <?php echo getCaseNumber($case_id); ?> was successfully accomplished. For details, please visit any of “Nassr” platforms.
    <br />
    "We are happy to serve you and we are grateful for your trust"
    <br />
    </td>
</tr>
<tr>
	<td align="center"><img src="<?php echo base_url('assets/images/email/');?>general-service.jpg" alt="albarakatilaw" border="0" /></td>
</tr>

<!-- End Email Body -->    

<?php } ?>

<?php if ($notification_type == 'session_appoinment' && $status_type == "add") {?>
<!-- Email Body -->
    <tr>
    	<td style="color:#c8a458; font-size:32px;" align="center">New session for E service No.<?php echo getCaseNumber($case_id); ?></td>
    </tr>
    <tr>
    	<td style="color:#7a7b7e; font-size:18px; padding:20px 100px 20px 100px; line-height:28px;" align="center">
		Dear Partner:<br />
		A Hearing task has been created for service No. <?php echo getCaseNumber($case_id); ?> and we will always update you. For details, please visit any of “Nassr” platforms.<br>
	 		</td>
    </tr>
    <tr>
        <td align="center"><img src="<?php echo base_url('assets/images/email/');?>hearing-service.jpg" alt="albarakatilaw" border="0" /></td>
    </tr>
    
    <!-- End Email Body -->  

<?php } ?>

<?php if ($notification_type == 'session_appoinment' && $status_type == "close") {?>


<!-- Email Body -->
<tr>
	<td style="color:#c8a458; font-size:32px;" align="center">Your case successfully accomplished</td>
</tr>
<tr>
	<td style="color:#7a7b7e; font-size:18px; padding:20px 100px 20px 100px; line-height:28px;" align="center">
Dear Partner<br />
Your case for e service No.<?php echo getCaseNumber($case_id); ?> was successfully accomplished. For details, please visit any of “Nassr” platforms.<br />
"We are happy to serve you and we are grateful for your trust"<br />

	</td>
</tr>
<tr>
	<td align="center"><img src="<?php echo base_url('assets/images/email/');?>hearing-complete.jpg" alt="albarakatilaw" border="0" /></td>
</tr>
 <!-- Email Body -->

<?php } ?>

<?php if ($notification_type == 'writings_appoinment' && $status_type == "add") {?>
 <!-- Email Body -->
    <tr>
    	<td style="color:#c8a458; font-size:32px;" align="center">Writing Task Creation Service No. <?php echo getCaseNumber($case_id); ?></td>
    </tr>
    <tr>
    	<td style="color:#7a7b7e; font-size:18px; padding:20px 100px 20px 100px; line-height:28px;" align="center">
        Dear Partner:<br />
        A legal writing task has been created for service No. <?php echo getCaseNumber($case_id); ?> and we will always update you. For details, please visit any of “Nassr” platforms.<br />

	</td>
    </tr>
    <tr>
        <td align="center"><img src="<?php echo base_url('assets/images/email/');?>writing-service.jpg" alt="albarakatilaw" border="0" /></td>
    </tr>
    
    <!-- End Email Body --> 
	 
<?php } ?>

<?php if ($notification_type == 'writings_appoinment' && $status_type == "close") {?>

<!-- Email Body -->
<tr>
	<td style="color:#c8a458; font-size:32px;" align="center">Writing Task Accomplishment </td>
</tr>
<tr>
	<td style="color:#7a7b7e; font-size:18px; padding:20px 100px 20px 100px; line-height:28px;" align="center">
	Dear Partner:<br />
	Your legal writing service task No.  <?php echo getCaseNumber($case_id); ?>  was successfully accomplished. For details, please visit any of “Nassr” platforms.<br />
"We are happy to serve you and we are grateful for your trust"<br />
 	</td>
</tr>
<tr>
	<td align="center"><img src="<?php echo base_url('assets/images/email/');?>writing-service-complete.jpg" alt="albarakatilaw" border="0" /></td>
</tr>

<!-- End Email Body -->  

<?php } ?>

<?php if ($notification_type == 'consultation_appoinment' && $status_type == "add") {?>
<!-- Email Body -->
    <tr>
    	<td style="color:#c8a458; font-size:32px;" align="center"> Consultation Service Application Receipt Message </td>
    </tr>
    <tr>
    	<td style="color:#7a7b7e; font-size:18px; padding:20px 100px 20px 100px; line-height:28px;" align="center">
		Dear Partner:<br />
    	A legal consulting task has been created for service number <?php echo getCaseNumber($case_id); ?> and we will always keep you updated . For more details, kindly visit any of “Nassr” platforms.

	</td>
    </tr>
    <tr>
        <td align="center"><img src="<?php echo base_url('assets/images/email/');?>legal-service.jpg" alt="albarakatilaw" border="0" /></td>
    </tr>
    
    <!-- End Email Body -->  


<?php } ?>

<?php if ($notification_type == 'consultation_appoinment' && $status_type == "close") {?>

<!-- Email Body -->
<tr>
	<td style="color:#c8a458; font-size:32px;" align="center">Consulting Task Accomplishment</td>
</tr>
<tr>
	<td style="color:#7a7b7e; font-size:18px; padding:20px 100px 20px 100px; line-height:28px;" align="center">
    Dear Partner:<br />
    Your legal consulting service task No. <?php echo getCaseNumber($case_id); ?> was successfully accomplished. For details, please visit any of “Nassr” platforms.
    <br />
    "We are happy to serve you and we are grateful for your trust"

    <br />
</td>
</tr>
<tr>
	<td align="center"><img src="<?php echo base_url('assets/images/email/');?>consulting-complete.jpg" alt="albarakatilaw" border="0" /></td>
</tr>

<!-- End Email Body -->   

<?php } ?>

<?php if ($notification_type == 'visiting_appoinment' && $status_type == "add") {?>

<!-- Email Body -->
<tr>
	<td style="color:#c8a458; font-size:32px;" align="center">New meeting for service No.<?php echo getCaseNumber($case_id) ;?></td>
</tr>
<tr>
	<td style="color:#7a7b7e; font-size:18px; padding:20px 100px 20px 100px; line-height:28px;" align="center">
	Dear Partner:<br />
	A meeting task for service No. <?php echo getCaseNumber($case_id); ?> Has been created and we will always update you. For details, please visit any of “Nassr” platforms.<br /> 
	</td>
</tr>
<tr>
	<td align="center"><img src="<?php echo base_url('assets/images/email/');?>visiting-service.jpg" alt="albarakatilaw" border="0" /></td>
</tr>

<!-- End Email Body -->  

<?php } ?>

<?php if ($notification_type == 'visiting_appoinment' && $status_type == "close") {?>

<!-- Email Body -->
<tr>
	<td style="color:#c8a458; font-size:32px;" align="center">Your meeting successfully accomplished</td>
</tr>
<tr>
	<td style="color:#7a7b7e; font-size:18px; padding:20px 100px 20px 100px; line-height:28px;" align="center">
	Dear Partner:<br />
 Your meeting service task No.<?php echo getCaseNumber($case_id); ?>. was successfully accomplished. For details, please visit any of “Nassr” platforms.<br>
"We are happy to serve you and we are grateful for your trust"<br>

	</td>
</tr>
<tr>
	<td align="center"><img src="<?php echo base_url('assets/images/email/');?>visit-complete.jpg" alt="albarakatilaw" border="0" /></td>
</tr>

<!-- End Email Body -->   

<?php }   } ?>


<!-- Footer -->
    
	<tr><td height="20"></td></tr>
    <tr>
    	<td align="center" style="background:#102b4e;">
        	<table cellpadding="0" cellspacing="0" border="0" width="700" align="center" style="background:#102b4e;">
				<tr><td height="20"></td></tr>
            	<tr>
                	<td align="center"><img src="<?php echo base_url('assets/images/email/');?>start-service.jpg" alt="albarakatilaw" border="0" /></td>
                </tr>
                <tr><td height="10"></td></tr>
                <tr>
                    <?php if($this->session->userdata('admin_site_lang')=="arabic" OR $this->session->userdata('admin_site_lang')=="") { ?>
                    <td style="color:#c8a458; font-size:28px;" align="center">LAW FIRM WITH A NEWER PERSPECTIVE</td>
                    <?php } else { ?>
                     <td style="color:#c8a458; font-size:28px;" align="center">المحاماة بمنظورها الأحدث</td>
                    <?php } ?>
                </tr>
                <tr><td height="40"></td></tr>
                <tr>
                    <td style="color:#c8a458; font-size:22px;" align="center">Questions? Call</td>
                </tr>
                <tr><td height="10"></td></tr>
                <tr>
                    <td style="color:#ffffff; font-size:20px;" align="center">Tel. 920002916 Riyad . Jeddah . Makkah</td>
                </tr>
                <tr><td height="40"></td></tr>
                <tr>
                    <td style="color:#c8a458; font-size:22px;" align="center">Connect With Us</td>
                </tr>
                <tr><td height="10"></td></tr>
                <tr>
                    <td style="color:#ffffff; font-size:20px;" align="center" valign="middle"><a href="https://www.facebook.com/Albarakatilaw/"><img src="<?php echo base_url('assets/images/email/');?>fb.jpg" alt="albarakatilaw" border="0" style="vertical-align:middle;" /></a> <a href="https://twitter.com/albarakatilaw?lang=ar"><img src="<?php echo base_url('assets/images/email/');?>twitter.jpg" alt="albarakatilaw" border="0" style="vertical-align:middle;" /></a> <a href="https://ae.linkedin.com/company/nassr-albarakati-law-firm"><img src="<?php echo base_url('assets/images/email/');?>linkedin.jpg" alt="albarakatilaw" border="0" style="vertical-align:middle;" /></a> <span style="vertical-align:middle;">ALBARAKATILAW</span></td>
                </tr>
                <tr><td height="40"></td></tr>
            </table>
        </td>
    </tr>
    <tr>
    	<td align="center">
        	<table cellpadding="0" cellspacing="0" border="0" width="700" align="center" style="padding:15px 0px 15px 0px; font-size:13px;">
            	<tr>
                	<td width="233" align="center"><a href="#" style="text-decoration:none; color:#7a7b7e;">Was this tutorial useful?</a></td>
                	<td width="233" align="center"><a href="https://albarakatilaw.com/" style="text-decoration:none; color:#7a7b7e;">www.albarakatilaw.com</a></td>
                	<td width="233" align="center"><a href="#" style="text-decoration:none; color:#7a7b7e;">You can unsubscribe</a></td>
                </tr>
            </table>
        </td>
    </tr>
</table>
</body> 
</html>