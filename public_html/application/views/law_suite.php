<?php include "header.php";?>
<!DOCTYPE html>
<div class="head-bread">
    <div class="heading-bread">
        <div class="container">
        <h3>New issue</h3>
    	<p>Add and modify case data. Please make sure your e-mail is correct because it will be used to inform you of the latest developments in your case. Also if you forget your password</p>
        </div>
    </div>
    
</div>
<div class="container">

   <ul class="progress-dots progress-dots--large">
                    <li class="is-active first" data-step="1">
                        <h3><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Case data</font></font></h3>
                    </li>
                    <li class=" second" data-step="2">
                        <h3><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Password</font></font></h3>
                    </li>
                    <li class=" third" data-step="3">
                        <h3><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Attach the files</font></font></h3>
                    </li>
                    <li class=" fourth" data-step="4">
                        <h3><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Preview the request</font></font></h3>
                    </li>
                    <li class=" fifth" data-step="5">
                        <h3><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Dashboard</font></font></h3>
                    </li>
                </ul>
    <div class="media-head"><div class="media">
        <div class="media-left media-top theme-color-1">
            <i class="fa fa-pencil fa-4x" aria-hidden="true"></i>
        </div>
        <div class="media-body">
            <h3 class="media-heading theme-color-1">All data required!</h3>
                Please enter all information correctly and clearly to facilitate review of the case to the Chancellor to determine the value required to address it.
       </div>
    </div>
    <div class="media">
        <div class="media-left media-top theme-color-1">
            <i class="fa fa-microphone fa-5x" aria-hidden="true"></i>
        </div>
        <div class="media-body">
            <h3 class="media-heading-2 theme-color-1">Do not like writing?</h3>
            It's OK .. we'll do it for you. When you reach the Attach Files page, you can attach an audio file showing all the required data, and we will do the rest.
       </div>
    </div></div>
	<?php echo form_open_multipart('front/store_details', ['class' => 'front-text','id'=>'form']); ?>
	<div class="form-head">
        <h3 style="padding-right:10px"><i class="fa fa-book"></i><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"> Create a new issue </font></font></h3>
    </div>
	<div class="casedata-block">
		<h3>Contact detail</h3>
			<div class="form-group col-sm-6">
				Full name* <input type="text" class="form-control" name="firstname" required>
			</div>
            <div class="form-group col-sm-6">
				Email ID* <input type="email" class="form-control" id='email' name="email" required>
			<span id="answers" style=" color: red; "></span></div>
            <div class="form-group col-sm-6">
             ID type*
			 <select name="id_type" id="identification_types" class="form-control" required >
	  	        	<option value="CR">CR</option>
	  				<option value="National Id">National Id</option>
	  				<option value="Aqama">Aqama</option>
	  				<option value="Other">Other</option> 		
	  		</select>
            </div>
            <div class="form-group col-sm-6">
               ID numbers* <input type="text" class="form-control" name="id_numbers" required>
            </div>
			<div class="form-group col-sm-6">
				Contact number* <input type="text" class="form-control" name="phone" maxlength="10" required>
			</div>
			<div class="form-group col-sm-6">
                City* <input type="text" class="form-control" name="city" required>
            </div>
            <div class="form-group col-sm-6">
                Full address* <textarea class="form-control" name="address" required> </textarea> 
            </div>
			<div class="form-group col-sm-6">
			Profile Picture
			<?= form_upload(['name'=>'image','class'=>'form-control' ]);?>
		</div>
	</div>

	<div class="casedata-block">
				<h3>Application Data</h3>
			<div class="form-group col-sm-6">
				Service classification <?php 
echo form_input(['name' => 'service_types', 'value' => $this->session->userdata('service') , 'class' => 'form-control', 'readonly' => 'true']); ?>
			</div>
			<div class="form-group col-sm-6">
				Case Title<?php echo form_input(['name' => 'case_title', 'class' => 'form-control', 'placeholder'=>' ', 'value' => set_value('case_broadcast')]); ?><div class="form-error"><?php
echo form_error('case_broadcast'); ?></div>
			</div>
				<div class="form-group">
			Case details<?php echo form_textarea(['name' => 'identification_types', 'class' => 'form-control', 'placeholder' => 'Case details', 'rows' => 5, 'value' => set_value('case_information')]); ?>
			</div>
		<?php echo form_submit(['name' => 'submit', 'id'=>'sendf' , 'value' => 'Save', 'class' => 'btn btn-primary btn-lg']);
echo form_reset(['name' => 'reset', 'value' => 'Reset', 'class' => 'btn btn-danger btn-lg']); ?>
	</div>
</div>

<?php include "footer1.php";?>
<script>
 $('#email').on('keyup', function(e){   //  e.preventDefault();
			var email  = $('#email').val(); 
           $.ajax({
                type: 'POST',
                url: '<?php echo base_url('front/email_check'); ?>',
                data: {email:email},
                success: function(response) {
					if(response == 'false'){ 
						$("#answers").html('Email already exist');  
					} 
					else 
					{ 
						$("#answers").html(''); 
					}
				}
            });
			 
        });
$('#sendf').on('click', function() {

    if($('#answers').html() == '') {
            return true; alert($('#answers').val());
        } else { return false; alert(1); }

});
</script>
