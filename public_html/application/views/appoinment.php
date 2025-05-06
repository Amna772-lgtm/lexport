<?php if($this->session->userdata('verify') == 'false' || $this->session->userdata('verify') == '' ) { redirect('/front', 'refresh'); }?><?php include "header.php";?>
	<script src="https://www.google.com/recaptcha/api.js"></script>
        	<!-- Header Section -->
            <div class="innerHeader">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-5 wow bounceInLeft">
                            <h1>Book Appointment</h1>
                        </div>
                    </div>
                </div>
            </div>
<div class="container">
<div class="col-md-9">
    <?php if($error=$this->session->flashdata('flashSuccess')): ?>
    <div class="col-lg-12">
      <div class="alert alert-danger">
        <?= $error ?>
      </div>
    </div>
<?php endif; ?>

	<div class="casedata-block">
			<?php echo form_open('front/appoinment_data', ['class' => 'front-text']); ?>
			<div class="form-group col-sm-6">Consenting Type
		
				<?php echo form_input(['name' => 'consenting_type', 'class' => 'form-control']); ?>
		</div>
		<div class="form-group col-sm-6">Name
				<?php echo form_input(['name' => 'name', 'class' => 'form-control']); ?>
		</div>
		<div class="form-group col-sm-6">Email
				<?php echo form_input(['name' => 'email', 'class' => 'form-control']); ?>
		</div><div class="form-error"><?php echo form_error('email'); ?></div>

		<div class="form-group col-sm-6">Phone
				<?php echo form_input(['name' => 'phone', 'class' => 'form-control']); ?>
		</div>

		<div class="form-group col-sm-6">Date
				<?php echo form_input(['name' => 'date', 'id' => 'date', 'class' => 'form-control']); ?>
		</div>
		<div class="form-group col-sm-6">
		Check Captcha 
				<div class="g-recaptcha" data-sitekey="6LdsaWEUAAAAACMarK6aOBBJ5LFcltoLKt3Vo6Nv"></div>
		</div>
		<div class="form-group col-sm-12">
			
			<?php echo form_submit(['value' => 'Book Appointment', 'class' => 'btn btn-primary btn-lg', 'readonly'=>'true']); ?>
		</div>
		<?php echo form_close(); ?>
	</div>
</div>
<?php include "sidebar.php"; ?>
</div>

<?php include "footer1.php";?>
<script type="text/javascript">
	$('#date').datepicker({format: "yyyy-mm-dd"});
</script>
