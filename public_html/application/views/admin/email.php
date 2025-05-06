<?php if ($role_id == 1 && $sub == 'forgot') {?>

	<h1> Forgot password</h1>

<p><span [removed]="font-weight: bold;">Hi Mr.<?php echo $to_email; ?>,</span></p>
<p><span [removed]="font-weight: bold;">You recently requested a forgot password. We've received the request and your password has been changed.</span></p>
<p><span [removed]="font-weight: bold;">Your account type is : Admin<br></span></p>
<p><span [removed]="font-weight: bold;">Your new password is :-[[<?php echo $password; ?>]]</span></p>
<p>Click Here<a href="http://timelyhub.com/law_admin/admin/login">Login</a></p>
<p><span [removed]="font-weight: bold;">Thanks.....</span></p>

<?php }?>

<?php if ($role_id == 1 && $sub == "change") {?>

	<h1>Password change</h1>
<p><span [removed]="font-weight: bold;">Hii Mr.<?php echo $to_email; ?>,</span></p>
<p><span [removed]="font-weight: bold;">You recently requested a Change password. We've received the request and your password has been changed.</span></p>
<p><span [removed]="font-weight: bold;">Your account type is :Admin<br></span></p>
<p><span [removed]="font-weight: bold;">Your new password is : [[<?php echo $password; ?>]]</span></p>
<p><span [removed]="font-weight: bold;">Thanks........</span></p>
<?php } ?>
<?php if ($sub == 'new') {?>

<p><span [removed]="font-weight: bold;">Hello Mr.<?php echo $to_email; ?>,</span></p>
<p><span [removed]="font-weight: bold;">Thank you for joining at our site:-&nbsp;</span>Albarakati<span [removed]="font-weight: bold;">.</span></p>
<p><span [removed]="font-weight: bold;">Your account type is : User</span></p>
<p><span [removed]="font-weight: bold;">Case Number is : [<?php echo $case_number; ?>]</span></p>
<p>Login from here : <a href="<?php echo base_url('admin/login'); ?>">Login</a></p>
<p>&nbsp;Best wishes.....</p>
<p><br></p>
<p><span [removed]="font-weight: bold;">Thanks.....</span></p>
<?php }?>
