<?php include "header.php";?>
<div class="head-bread">

<?php include "header_welcome.php"; ?>
    <div class="heading-bread">
        <div class="container">
       
      <h3>Access code</h3>
    	<p>Create an access token for your issue so you can sign in and follow it at any time.</p>    </div>
    </div>
    
</div>
<div class="container">
  
	  <ul class="progress-dots progress-dots--large">
                    <li class="is-complete first" data-step="1">
                        <h5><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Case data</font></font></h5>
                    </li>
                    <li class="is-active  second" data-step="2">
                        <h5><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Password</font></font></h5>
                    </li>
                    <li class=" third" data-step="3">
                        <h5><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Attach the files</font></font></h5>
                    </li>
                    <li class=" fourth" data-step="4">
                        <h5><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Preview the request</font></font></h5>
                    </li>
                    <li class=" fifth" data-step="5">
                        <h5><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Dashboard</font></font></h5>
                    </li>
                </ul>
    <div id="alert-msg" class="scroll-to">
        <div class="alert alert-success">
            <a class="close" data-dismiss="alert"><span class="glyphicon glyphicon-remove-circle"></span></a>
                <i class="fa fa-check-circle-o fa-2x" aria-hidden="true"></i>
                        <b><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">The case was successfully created.  </font></font></b>
                        <br><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">
                        Please create a password for this issue so you can follow it at any time.
                    </font></font></div>
    </div>
	<div class="casedata-block">
	    	<h3>Create Password</h3>
		<?php echo form_open('front/insert_password', ['class' => 'front-text']); ?>
			<div class="form-group">
				Case#:<?php echo form_input(['name' => 'case_number', 'class' => 'form-control', 'value' => $this->session->userdata('case_number'), 'readonly' => true]); ?>
			</div>
			<div class="form-group col-sm-6">
		Password* <?php echo form_password(['name' => 'password', 'class' => 'form-control']); ?><div class="form-error"><?php echo form_error('password'); ?></div>
			</div>
				<div class="form-group col-sm-6">
				Confirm Password* <?php echo form_password(['name' => 'confirm_password', 'class' => 'form-control']); ?>
				<div class="form-error"><?php echo form_error('confirm_password'); ?></div>
				</div>
				<div class="form-group col-sm-6">
				<a href= "<?php echo base_url('front/modify_case?mode=edit');?>" class="btn btn-default btn-lg"><i class="fa fa-angle-double-left fa-lg" style="margin:0 5px 5px 0" aria-hidden="true"></i>Back</a>
				<?php echo form_submit(['name' => 'submit', 'value' => 'Save Your Password', 'class' => 'btn btn-primary btn-lg']); ?>

				</div>
				<?php form_close();?>
	</div>
</div>
<?php include "footer1.php";?>
<script>
history.pushState(null, document.title, location.href);
window.addEventListener('popstate', function (event)
{ 
	alert("Please use back button");
  history.pushState(null, document.title, location.href);
});
</script>