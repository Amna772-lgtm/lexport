<?php if($this->session->userdata('verify') == 'false' || $this->session->userdata('verify') == '' ) { redirect('/front', 'refresh'); }?><?php include "header.php";?>
<div class="head-bread">
    
<?php include "header_welcome.php"; ?>
    <div class="heading-bread">
        <div class="container">
        <h3>Change Password</h3>
    
        </div>
    </div>
    
</div>
<div class="container">
<div class="col-md-9">
	<div class="casedata-block">
			<?php echo form_open('front/change_password', ['class' => 'front-text']); ?>
			<div class="form-group col-sm-12">
				Enter Old Password<?php echo form_password(['name' => 'current_password', 'placeholder' => 'Enter current Passsword', 'class' => 'form-control']);
?> <span style="color:red"> <?php echo form_error('current_password'); ?></span>
<span style="color:red"> <?php echo isset($_GET['pwd'])?"Incorect Password":''; ?></span>
			</div>
			<div class="form-group col-sm-12">
				Enter New Passsword<?php echo form_password(['name' => 'new_password', 'placeholder' => 'Enter New Passsword', 'class' => 'form-control']);
?> <span style="color:red"> <?php echo form_error('new_password'); ?></span>
			</div>
				<div class="form-group col-sm-12">
				Enter Confirm Passsword	<?php echo form_password(['name' => 'confirm_password', 'placeholder' => 'Enter Confirm Passsword', 'class' => 'form-control']);
?> <span style="color:red"><?php echo form_error('confirm_password'); ?></span>
			</div>
			<div class="form-group col-sm-12">
	   <div class="next-btn">     
	  		<?php echo form_submit(['name' => 'submit', 'value' => 'Change', 'class' => 'btn btn-primary btn-lg']); ?>
	  </div>   
	  
	</div>
	</div>
</div>

<?php include('sidebar.php'); ?>
</div>

<?php include "footer1.php";?>