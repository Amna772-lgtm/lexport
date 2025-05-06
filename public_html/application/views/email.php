<html><head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">

<title></title></head><body><meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" name="viewport"/>
<meta http-equiv="X-UA-Compatible" content="IE=Edge"/>
<meta name="HandheldFriendly" content="true"/>

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

<?php if ($lan =='ar') { ?>

<?php if ($role_id == 3 && $sub == 'welmo') { ?>
    <!-- Email Body -->
    <tr>
    	<td style="color:#c8a458; font-size:32px;" align="center">أهلا بك</td>
    </tr>
    <tr>
    	<td style="color:#7a7b7e; font-size:18px; padding:20px 100px 20px 100px; line-height:28px;" align="center">
شريكنا العزيز:<br>
شكراً لتسجيلكم في منصة "نصر"

ويسعدنا أن نقدم لكم طيفًا من خدمات المحاماة، والأعمال القانونية المتكاملة، ونتطلع لإنجاز أعمالكم بمهنيَّة وفاعليَّة.
<br>
دخول يُرجَى إضاف: <b><?php echo $otp; ?></b>
		</td>
    </tr>
    <tr>
        <td align="center"><img src="<?php echo base_url('assets/images/email/');?>welcome.jpg" alt="albarakatilaw" border="0" /></td>
    </tr>
    
    <!-- End Email Body -->
    

<?php } ?>

<?php if ($status_type == 'success' && $notification_type == 'payment') { ?>
    <!-- Email Body -->
    <tr>
    	<td style="color:#c8a458; font-size:32px;" align="center">عملية دفع مقبولة </td>
    </tr>
    <tr>
    	<td style="color:#7a7b7e; font-size:18px; padding:20px 100px 20px 100px; line-height:28px;" align="center">
 شريكنا العزيز,<br>
نفيدكم بأنه تمت عملية الدفع بنجاح للفاتورة رقم <?php echo  $case_id; ?>
كما سيباشر الفريق المختص على إجراءات تقديم الخدمة القانونية 

نسعد بخدمتكم، وممتنون لثقتكم
		</td>
    </tr>
    <tr>
        <td align="center"><img src="<?php echo base_url('assets/images/email/');?>lawsuit-invoice.jpg" alt="albarakatilaw" border="0" /></td>
    </tr>
    
    <!-- End Email Body -->
    

<?php } ?>
<?php if ($role_id == 3 && $sub == 'otpmo') { ?>

   <tr>
    	<td style="color:#c8a458; font-size:32px;" align="center">Password Reset</td>
    </tr>
    <tr>
    	<td style="color:#7a7b7e; font-size:18px; padding:20px 100px 20px 100px; line-height:28px;" align="center">
    	    Dear Partner:<br>
			To reset your password please enter the activation code:<b><?php echo $otp; ?></b><br>
		</td>
    </tr>
    <tr>
        <td align="center"><img src="<?php echo base_url('assets/images/email/');?>reset-password.jpg" alt="albarakatilaw" border="0" /></td>
    </tr>
    
    <!-- End Email Body -->

<?php } ?>

<?php if ($role_id == 3 && $sub == 'loginotp') { ?>
    <!-- Email Body -->
    <tr>
    	<td style="color:#c8a458; font-size:32px;" align="center">Verification Code</td>
    </tr>
    <tr>
    	<td style="color:#7a7b7e; font-size:18px; padding:20px 100px 20px 100px; line-height:28px;" align="center">
 شريكنا العزيز,<br> 
 شريكنا العزيز: مرحبًا بك في برنامج نصر للدخول يُرجَى إضاف: <?php echo $otp; ?>
		</td>
    </tr>
    <tr>
        <td align="center"><img src="<?php echo base_url('assets/images/email/');?>otp.jpg" alt="albarakatilaw" border="0" /></td>
    </tr>
    
    <!-- End Email Body -->
<?php } ?>

<?php if (  $sub == 'admin_email_service') { ?>
    <!-- Email Body -->
    <tr>
    	<td style="color:#c8a458; font-size:32px;" align="center">خدمة جديدة أضيفت بواسطة <?php echo  $name ?></p></td>
    </tr>
    <tr>
    	<td style="color:#7a7b7e; font-size:18px; padding:20px 100px 20px 100px; line-height:28px;" align="center">
            <p>اسم: <?php echo  $name ?></p>
             <p>البريد الإلكتروني: <?php echo  $email ?></p>
              <p>هاتف: <?php echo  $phone ?></p>
              <p>م الخدمة : <?php echo  $enumber ?></p>
		</td>
    </tr>
     
    
    <!-- End Email Body -->
<?php } ?>
<?php if (  $sub == 'admin_email') { ?>
    <!-- Email Body -->
    <tr>
    	<td style="color:#c8a458; font-size:32px;" align="center">تسجيل مستخدم جديد</td>
    </tr>
    <tr>
    	<td style="color:#7a7b7e; font-size:18px; padding:20px 100px 20px 100px; line-height:28px;" align="center">
            <p>اسم: <?php echo  $name ?></p>
             <p>البريد الإلكتروني: <?php echo  $email ?></p>
              <p>هاتف: <?php echo  $phone ?></p>
		</td>
    </tr>
     
    
    <!-- End Email Body -->
<?php } ?>
<?php } if($lan =='en') { ?>
<?php if (  $sub == 'admin_email') { ?>
    <!-- Email Body -->
    <tr>
    	<td style="color:#c8a458; font-size:32px;" align="center">New user register</td>
    </tr>
    <tr>
    	<td style="color:#7a7b7e; font-size:18px; padding:20px 100px 20px 100px; line-height:28px;" align="center">
            <p>Name: <?php echo  $name ?></p>
             <p>Email: <?php echo  $email ?></p>
              <p>Phone: <?php echo  $phone ?></p>
		</td>
    </tr>
     
    
    <!-- End Email Body -->
<?php } ?>

<?php if (  $sub == 'admin_email_service') { ?>
    <!-- Email Body -->
    <tr>
    	<td style="color:#c8a458; font-size:32px;" align="center">New service added by <?php echo  $name ?></p></td>
    </tr>
    <tr>
    	<td style="color:#7a7b7e; font-size:18px; padding:20px 100px 20px 100px; line-height:28px;" align="center">
            <p>Name: <?php echo  $name ?></p>
             <p>Email: <?php echo  $email ?></p>
              <p>Phone: <?php echo  $phone ?></p>
              <p>E-Service number : <?php echo  $enumber ?></p>
		</td>
    </tr>
     
    
    <!-- End Email Body -->
<?php } ?>
<?php if ($status_type == 'success' && $notification_type == 'payment') { ?>
    <!-- Email Body -->
    <tr>
    	<td style="color:#c8a458; font-size:32px;" align="center">Payment Success</td>
    </tr>
    <tr>
    	<td style="color:#7a7b7e; font-size:18px; padding:20px 100px 20px 100px; line-height:28px;" align="center">
            Dear partner:<br>
We hope that "nassr service have fulfilled your expectations" we received your payment successfully for invoice #<?php echo  $case_id;?>  and we process your legal E-service to the initiated appropriate team   

"We are happy to serve you and we are grateful for your trust
		</td>
    </tr>
    <tr>
        <td align="center"><img src="<?php echo base_url('assets/images/email/');?>lawsuit-invoice.jpg" alt="albarakatilaw" border="0" /></td>
    </tr>
    
    <!-- End Email Body -->
    

<?php } ?>
<?php if ($role_id == 3 && $sub == 'welmo') { ?>
  <!-- Email Body -->
    <tr>
    	<td style="color:#c8a458; font-size:32px;" align="center">Welcome</td>
    </tr>
    <tr>
    	<td style="color:#7a7b7e; font-size:18px; padding:20px 100px 20px 100px; line-height:28px;" align="center">
			Dear Partner,<br>
			We are pleased to offer you an array of legal services and integrated legal consultations and looking forward to finalizing your work professionally and effectively.<br>
			Your activation coe is: <b><?php echo $otp; ?></b> 
		</td>
    </tr>
    <tr>
        <td align="center"><img src="<?php echo base_url('assets/images/email/');?>welcome.jpg" alt="albarakatilaw" border="0" /></td>
    </tr>
    
    <!-- End Email Body -->
    
<?php }?>


<?php if ($role_id == 3 && $sub == 'otpmo') { ?>
<tr>
    	<td style="color:#c8a458; font-size:32px;" align="center">Password Reset</td>
    </tr>
    <tr>
    	<td style="color:#7a7b7e; font-size:18px; padding:20px 100px 20px 100px; line-height:28px;" align="center">
			شريكنا العزيز<br>
			لإعادة تعيين كلمة المرور الخاصة بك، من فضلك أدخل كود التفعيل:<br>
			<b><?php echo $otp; ?></b><br>
		</td>
    </tr>
    <tr>
        <td align="center"><img src="<?php echo base_url('assets/images/email/');?>reset-password.jpg" alt="albarakatilaw" border="0" /></td>
    </tr>
<?php } ?>


<?php if ($role_id == 3 && $sub == 'loginotp') { ?>
    <!-- Email Body -->
    <tr>
    	<td style="color:#c8a458; font-size:32px;" align="center">Verification Code</td>
    </tr>
    <tr>
    	<td style="color:#7a7b7e; font-size:18px; padding:20px 100px 20px 100px; line-height:28px;" align="center">
			Dear Partner: Welcome to “Nassr” platform. Please enter your activation code:<b><?php echo $otp; ?></b><br>
		</td>
    </tr>
    <tr>
        <td align="center"><img src="<?php echo base_url('assets/images/email/');?>otp.jpg" alt="albarakatilaw" border="0" /></td>
    </tr>
    
    <!-- End Email Body -->
    

<?php } ?>


<?php } ?>

<?php if($this->session->userdata('site_lang')=="arabic" ) { ?>

<?php if ($role_id == 3 && $sub == 'new') { ?>
    <!-- Email Body -->
    <tr>
    	<td style="color:#c8a458; font-size:32px;" align="center">Welcome</td>
    </tr>
    <tr>
    	<td style="color:#7a7b7e; font-size:18px; padding:20px 100px 20px 100px; line-height:28px;" align="center">
 شريكنا العزيز,<br>
 شكرًا لتسجيلكم في برنامج &quot;نَصْر&quot;<br>
 ويُسعِدنا أن نقدم لكم طَيفًا من الخدمات القانونيَّة، والاستشارات الحُقوقيَّة المُتكامِلَة، ونَتَطَلَّعُ لإنجاز أعمالِكم
بمِهنيَّة وفاعليَّة. 
		</td>
    </tr>
    <tr>
        <td align="center"><img src="<?php echo base_url('assets/images/email/');?>welcome.jpg" alt="albarakatilaw" border="0" /></td>
    </tr>
    
    <!-- End Email Body -->
    

<?php } ?>


<?php if ($role_id == 3 && $sub == 'otp') { ?>
    <!-- Email Body -->
    <tr>
    	<td style="color:#c8a458; font-size:32px;" align="center">رمز التفعيل</td>
    </tr>
    <tr>
    	<td style="color:#7a7b7e; font-size:18px; padding:20px 100px 20px 100px; line-height:28px;" align="center">
 رمز التحقق: <br>
شريكنا العزيز: مرحبًا بك في منصة نصر

للدخول يرجى إضافة رمز التفعيل:<?php echo $otp; ?>
		</td>
    </tr>
    <tr>
        <td align="center"><img src="<?php echo base_url('assets/images/email/');?>otp.jpg" alt="albarakatilaw" border="0" /></td>
    </tr>
    
    <!-- End Email Body -->
    

<?php } ?>


<?php if ($role_id == 3 && $sub == 'forgot') { ?>

   <tr>
    	<td style="color:#c8a458; font-size:32px;" align="center">نسيان كلمة المرور</td></td>
    </tr>

     <tr>
    	<td style="color:#7a7b7e; font-size:18px; padding:20px 100px 20px 100px; line-height:28px;" align="center">
    شريكنا العزيز<br>
			لقد قمت مؤخرًا بطلب نسيان كلمة المرور الخاصة بك. لقد تلقينا طلبك وتم تغيير كلمة المرور الخاصة بك. كلمة المرور الجديدة هي <br><b><?php echo $password; ?></b><br>
		</td>
    </tr>
    <tr>
        <td align="center"><img src="<?php echo base_url('assets/images/email/');?>welcome.jpg" alt="albarakatilaw" border="0" /></td>
    </tr>
    
    <!-- End Email Body -->

<?php } ?>
<?php if ($role_id == 3 && $sub == 'change') {?>
    <!-- Email Body -->
    <tr>
    	<td style="color:#c8a458; font-size:32px;" align="center">Change Password</td>
    </tr>
    <tr>
    	<td style="color:#7a7b7e; font-size:18px; padding:20px 100px 20px 100px; line-height:28px;" align="center">
        Dear Partner,<br />
        You recently requested changing your password. We've received the request and your password has been changed.  Your new password is:<b><?php echo $password; ?></b>
		</td>
    </tr>
    <tr>
        <td align="center"><img src="<?php echo base_url('assets/images/email/');?>reset-password.jpg" alt="albarakatilaw" border="0" /></td>
    </tr>
    
    <!-- End Email Body -->
    
<?php } ?>
<?php } else { ?>


<?php if ($role_id == 3 && $sub == 'otp') { ?>
    <!-- Email Body -->
    <tr>
    	<td style="color:#c8a458; font-size:32px;" align="center">Verification Code</td>
    </tr>
    <tr>
    	<td style="color:#7a7b7e; font-size:18px; padding:20px 100px 20px 100px; line-height:28px;" align="center">
				Dear Partner: Welcome to “Nassr” platform. Please enter your activation code:<b><?php echo $otp; ?></b><br>
		</td>
    </tr>
    <tr>
        <td align="center"><img src="<?php echo base_url('assets/images/email/');?>otp.jpg" alt="albarakatilaw" border="0" /></td>
    </tr>
    
    <!-- End Email Body -->
    

<?php } ?>



<?php if ($role_id == 3 && $sub == 'new') { ?>
  <!-- Email Body -->
    <tr>
    	<td style="color:#c8a458; font-size:32px;" align="center">Welcome</td>
    </tr>
    <tr>
    	<td style="color:#7a7b7e; font-size:18px; padding:20px 100px 20px 100px; line-height:28px;" align="center">
			Dear Partner,<br>
			Thank you for registering in "“Nassr”"<br>
			We are pleased to offer you an array of legal services and integrated legal consultations and looking forward to finalizing your work professionally and effectively.<br>
		</td>
    </tr>
    <tr>
        <td align="center"><img src="<?php echo base_url('assets/images/email/');?>welcome.jpg" alt="albarakatilaw" border="0" /></td>
    </tr>
    
    <!-- End Email Body -->
    
<?php }?>

<?php if ($role_id == 3 && $sub == 'forgot') { ?>
    <tr>
    	<td style="color:#c8a458; font-size:32px;" align="center">Your forgotten password</td>
    </tr>
    <tr>
    	<td style="color:#7a7b7e; font-size:18px; padding:20px 100px 20px 100px; line-height:28px;" align="center">
			Dear Partner,<br>
			You recently requested a forgot password. We've received the request and your password has been changed.<br>
			Your new password is:<b><?php echo $password; ?></b><br>
		</td>
    </tr>
    <tr>
        <td align="center"><img src="<?php echo base_url('assets/images/email/');?>welcome.jpg" alt="albarakatilaw" border="0" /></td>
    </tr>
    
    <!-- End Email Body -->

<?php } ?>
<?php if ($role_id == 3 && $sub == 'change') {?>

  
    <!-- Email Body -->
    <tr>
    	<td style="color:#c8a458; font-size:32px;" align="center">تغير كلمة المرور</td>
    </tr>
    <tr>
    	<td style="color:#7a7b7e; font-size:18px; padding:20px 100px 20px 100px; line-height:28px;" align="center">
        شريكنا العزيز,<br />
        لقد قمت مؤخرًا بطلب تغيير كلمة المرور الخاصة بك. لقد تم استلام الطلب وتم تغيير كلمة المرور. كلمة المرور الجديدة الخاصة بك هي<br>
		 :<b><?php echo $password; ?></b>
		</td>
    </tr>
    <tr>
        <td align="center"><img src="<?php echo base_url('assets/images/email/');?>reset-password.jpg" alt="albarakatilaw" border="0" /></td>
    </tr>
    
    <!-- End Email Body -->
    
 
<?php }?>
<?php } ?>

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
                    <?php if ($lan =='ar') { ?>
                    <td style="color:#c8a458; font-size:28px;" align="center">LAW FIRM WITH A NEWER PERSPECTIVE</td>
                    <?php } if($lan =='en') { ?>
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