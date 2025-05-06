<?php if($this->session->userdata('verify') == 'false' || $this->session->userdata('verify') == '' ) { redirect('/front', 'refresh'); }?><?php include "header.php";?>
<div class="head-bread">
    <div class="heading-bread">
        <div class="container">
        <h3>Preview the request</h3>
    	<p>This page enables you to upload and browse files that support your case, be it audio files or documents depending on the extensions allowed from your computer or phone.</p>
        </div>
    </div>
    
</div>

<div class="container">
   <ul class="progress-dots progress-dots--large">
                    <li class="is-complete first" data-step="1">
                        <h3><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Case data</font></font></h3>
                    </li>
                    <li class="is-complete second" data-step="2">
                        <h3><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Password</font></font></h3>
                    </li>
                    <li class="is-active  third" data-step="3">
                        <h3><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Attach the files</font></font></h3>
                    </li>
                    <li class=" fourth" data-step="4">
                        <h3><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Preview the request</font></font></h3>
                    </li>
                    <li class=" fifth" data-step="5">
                        <h3><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Dashboard</font></font></h3>
                    </li>
                </ul>
     <div id="alert-msg" class="scroll-to">
        <div class="alert alert-success">
            <a class="close" data-dismiss="alert"><span class="glyphicon glyphicon-remove-circle"></span></a>
                <i class="fa fa-key fa-2x" aria-hidden="true"></i>
                        <b><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"> Password successfully created.</font></font></b>
                        <br><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">
                        Now you can upload the required documents to the case.
                    </font></font></div>
    </div>
	<div class="case-block">
		<div class="form-group col-sm-12">
		        <div class="upload-block">
		            
	                <div id="image"></div> <div class="upload-area"></div>
	            </div>
	   <div class="next-btn" >     
	  <a href="<?=base_url('front/previous_request');?>" class="btn btn-primary btn-lg">Next</a>
	  </div>   
	  
	</div>
	
	
	</div>
</div>

<?php include "footer1.php";?>
<link href=<?php echo base_url('assets/css/uploadfile.css'); ?> rel="stylesheet">
<script src=<?php echo base_url('assets/js/jquery.uploadfile.min.js'); ?>></script>
<script>
$(document).ready(function()
{
	$("#image").uploadFile({
	url:"<?=base_url('front/modify_upload_file');?>",
	fileName:"image",
	dragDropStr: "<div class='drage-file'><b>Drag the files here</div>",
    abortStr:"Cancel",
	formData: {"fid":<?php echo $this->session->userdata('case_number'); ?>},
    statusBarWidth:500,
    dragdropWidth:540,
	uploadStr:"Or click here to view the files",
	
	});
});

$('#dob').datepicker({format: "yyyy-mm-dd"});

</script>
