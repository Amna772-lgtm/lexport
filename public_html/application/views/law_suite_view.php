<?php include "header.php"; error_reporting(0); ?>
<div class="head-bread">
<?php include "header_welcome.php"; ?>
    <div class="heading-bread">
        <div class="container">
        <h3>Follow-up of the case (<?php echo $this->session->userdata('case_number'); ?>)</h3>
    	<p>From here, you can follow the timeline of the events that have been done on your case.</p>
        </div>
    </div>
    
</div>
	<section>
<div class="container att-block">
    <?php if(!$_GET['mode'] == 'edit') { ?>
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
                    <li class="is-complete fourth" data-step="4">
                        <h5><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Preview the request</font></font></h5>
                    </li>
                    <li class="is-active fifth" data-step="5">
                        <h5><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Dashboard</font></font></h5>
                    </li>
                </ul> <?php } ?>
            <div class="">
                <div class="media">
                    <div class="media-left media-top">
                        <i class="fa fa-hourglass-half fa-3x" aria-hidden="true"></i>
                    </div>
                    <div class="media-body">
                        <h3 class="media-heading"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">A counselor is not appointed to follow up your case yet</font></font></h3>
                        <p><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">
                            You will receive an alert via SMS and e-mail immediately after one of our consultants is assigned to follow up the case. </font><font style="vertical-align: inherit;">You will be able to email the advisor if you wish to use the icon assigned to this page.
                        </font></font></p>
                    </div>
                </div>

            </div>

            <div class="media">
                <div class="media-left media-top theme-color-3">
                    <i class="fa fa-calendar-o fa-3x" aria-hidden="true"></i>
                </div>
                <div class="media-body">
                    <h3 class="media-heading theme-color-3"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Schedule of operations</font></font></h3>
                    <p><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">
                        The schedule shows you all the operations performed on your case and the dates of these operations. </font><font style="vertical-align: inherit;">You can modify the case data and attached files as well as change the access code via the links in the list above.
                    </font></font></p>
                </div>
            </div>
            <?php if($request['status']==0){ ?>
			<div class="media">
                <div class="media-left media-top theme-color-3">
                    <i class="fa fa-book fa-3x" aria-hidden="true"></i>
                </div>
                
                <div class="media-body">
                    <h3 class="media-heading theme-color-3"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Approve Pending</font></font></h3>
                    <p><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">
                       <?php  $date=explode(' ',$request['created']); echo $date[0]; ?> </font><font style="vertical-align: inherit;">
                    </font></font></p>
                </div>             
            </div>
              <?php } ?>
              <?php if($request['status']==1){ ?>
            <div class="media">
                <div class="media-left media-top theme-color-3">
                    <i class="fa fa-book fa-3x" aria-hidden="true"></i>
                </div>
                
                <div class="media-body">
                    <h3 class="media-heading theme-color-3"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Approve Case</font></font></h3>
                    <p><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">
                       <?php  $date=explode(' ',$request['modified']); echo $date[0]; ?> </font><font style="vertical-align: inherit;">
                    </font></font></p>
                </div>             
            </div>
              <?php } ?>
    
	<?php echo form_open(); ?>
	<div class="casedata-block">
		<h3>Contact detail</h3>
			<div class="form-group col-sm-6">
                <strong>Name:</strong><br><?php echo $request['name'] ?>
            </div>
            <div class="form-group col-sm-6">
				<strong>Email:</strong><br><?php echo $request['email'] ?>
			</div>
            <div class="form-group col-sm-6">
                <strong>ID type:</strong><br><?php echo $request['id_type'] ?>
            </div>
            <div class="form-group col-sm-6">
                <strong>Id numbers:</strong><br><?php echo $request['id_numbers'] ?>
            </div>
            
			<div class="form-group col-sm-6">
				<strong>Contact number:</strong><br><?php echo $request['phone'] ?>
			</div>
            <div class="form-group col-sm-6">
                <strong>city:</strong><br><?php echo $request['city']; ?>
            </div>
            <div class="form-group col-sm-6">
                <strong>Address:</strong><br><?php echo $request['address']; ?>
            </div>
	</div>


		<div class="casedata-block">
				<h3>Application data</h3>
			<div class="form-group col-sm-6">
				<strong>Service classification:</strong><br><?php
echo $request['service_types']; ?>
			</div>
			<div class="form-group col-sm-6">
				<strong>Case Title:</strong><br><?php echo $request['case_title']; ?>
			</div>

			<div class="form-group col-sm-6">
				<strong>Case details:</strong><br><?php echo $request['identification_types']; ?>
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
</div>
</section>
<?php include "footer1.php";?>