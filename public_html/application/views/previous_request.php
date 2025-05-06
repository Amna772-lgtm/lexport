<?php if($this->session->userdata('verify') == 'false' || $this->session->userdata('verify') == '' ) { redirect('/front', 'refresh'); }?><?php include "header.php";?>
<div class="head-bread">
    <div class="heading-bread">
        <div class="container">
        <h3>Case files</h3>
    	<p>This page enables you to upload and browse files that support your case, be it audio files or documents depending on the extensions allowed from your computer or phone.</p>
        </div>
    </div>
    
</div>
<div class="container">
	 <ul class="progress-dots progress-dots--large">
                    <li class="is-complete first" data-step="1">
                        <h5><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Case data</font></font></h5>
                    </li>
                    <li class="is-complete  second" data-step="2">
                        <h5><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Password</font></font></h5>
                    </li>
                    <li class="is-complete third" data-step="3">
                        <h5><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Attach the files</font></font></h5>
                    </li>
                    <li class="is-active fourth" data-step="4">
                        <h5><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Preview the request</font></font></h5>
                    </li>
                    <li class=" fifth" data-step="5">
                        <h5><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Dashboard</font></font></h5>
                    </li>
                </ul>

	<?php echo form_open('', ['class' => 'front-text']); ?>
	<div class="casedata-block">
		<h3>Contact detail</h3>
			<div class="form-group col-sm-6">
				Full name<?php echo form_input(['name' => 'name', 'class' => 'form-control', 'value' => $request['name'], 'readonly' => 'true']); ?>
			</div>
			<div class="form-group col-sm-6">
				Email<?php echo form_input(['name' => 'email', 'class' => 'form-control', 'value' => $request['email'], 'readonly' => 'true']); ?>
			</div>
			<div class="form-group col-sm-6">
				ID type<?php echo form_input(['name' => 'id_type', 'class' => 'form-control', 'value' => $request['id_type'], 'readonly' => 'true']); ?>
			</div>
			<div class="form-group col-sm-6">
				
			ID numbers<?php echo form_input(['name' => 'id_numbers', 'class' => 'form-control', 'value' => $request['id_numbers'], 'readonly' => 'true']); ?>
			</div>

			<div class="form-group col-sm-6">
				Contact number<?php echo form_input(['name' => 'phone', 'class' => 'form-control', 'value' => $request['phone'], 'readonly' => 'true']); ?>
			</div>
			<div class="form-group col-sm-6">
				City<?php echo form_input(['name' => 'city', 'class' => 'form-control', 'value' => $request['city'], 'readonly' => 'true']); ?>
			</div>
			<div class="form-group col-sm-6">
				Address<?php echo form_input(['name' => 'address', 'class' => 'form-control', 'value' => $request['address'], 'readonly' => 'true']); ?>
			</div>
			<div class="form-group col-sm-6">
				<img src="<?php echo base_url();?>uploads/profile/<?php echo $request['image']; ?>" width="200"> 
			</div>

	</div>


		<div class="casedata-block">
				<h3>Application data</h3>
			<div class="form-group col-sm-6">
				Service classification<?php
echo form_input(['name' => 'service_type', 'class' => 'form-control', 'value' => $request['service_types'], 'readonly' => 'true']); ?>
			</div>
			<div class="form-group col-sm-6">
			Case Title<?php echo form_input(['name' => 'case_title', 'class' => 'form-control', 'value' => $request['case_title'], 'rows' => 5, 'readonly' => 'true']); ?>
			</div>
				<div class="form-group col-sm-6">
			Case details<?php echo form_textarea(['name' => 'identification_types', 'class' => 'form-control', 'value' => $request['identification_types'], 'rows' => 5, 'readonly' => 'true']); ?>
			</div>
			
	 	</div>
	 		<div class="casedata-block">
			    	    	<div class="form-group col-sm-12">
			<h3> Attechted Document</h3>
			<?php 
			    foreach ($doc as $doc) {
			        echo "<div class='col-md-2 att-doc'>";
			        $ext = pathinfo($doc['name'], PATHINFO_EXTENSION);
                 	if($ext == 'jpeg' || $ext == 'jpg' || $ext == 'png'){
                 	    $src = base_url()."uploads/case_file/".$doc['name'];
                 	   echo "<img src='".$src."'>"; 
                 	  
                 	}
                 	else if($ext == 'avi' || $ext == 'mp4' || $ext == 'flv' || $ext == 'mov' || $ext == 'wmv' || $ext == '3gp' ){
                 	    echo "<div class='datafiles'><i class='fa fa-video-camera 5x'></i></div>";
                 	}
                 	else if($ext == 'mp3' || $ext == 'wav' || $ext == 'ogg' || $ext == 'aac' || $ext == 'mpc' ){
                 	    echo "<div class='datafiles'><i class='fa fa-microphone 5x'></i></div>";
                 	} else {
                 	     echo "<div class='datafiles'><i class='fa fa-file 5x'></i></div>";
                 	}
                	echo "<p>".$doc['name']."</p>";
                 	
                	echo "</div>";
                } ?>
			</div>		</div>	

	 <div class="next-btn" >     
			<?php	echo anchor('front/law_suite_view', 'Next', ['class' => 'btn btn-primary btn-lg']) ?>
	  </div>   

</div>
</body>
</html>
<?php include "footer1.php";?>