<?php if($this->session->userdata('verify') == 'false' || $this->session->userdata('verify') == '' ) { redirect('/front/login', 'refresh'); }?><?php include "header.php";?>
<div class="head-bread">
    
<?php include "header_welcome.php"; ?>
    <div class="heading-bread">
        <div class="container">
        <h3>Case files</h3>
    	<p>This page enables you to upload and browse files that support your case, be it audio files or documents depending on the extensions allowed from your computer or phone.</p>
        </div>
    </div>
    
</div>
<div class="container">
    	<div class="attced-block case-block">
		<div class="form-group col-sm-12">
		        <div class="upload-block">
	                <div id="image"></div> <div class="upload-area"></div>
	            </div>
	</div>	
	</div>
		<div class="form-group col-sm-6">
	<div class="casedata-block">
		<h3> Attached files</h3>
		
		<?php foreach ($files as $files) {?>
			<div class="docloopa">
				<?php	echo "<b>" . $files['name']."</b>"; ?>
				<span class="dwndelbtn">
<a href="<?=base_url('uploads/' . $files["name"]);?>" class='btn btn-success btn-sm' download>Download</a>
	<a href="<?=base_url('front/delete_upload_files/' . $files["name"]);?>" class='btn btn-danger  btn-sm'>Delete</a>
	</span></div>
<?php }?>
	</div>
	</div>
		<div class="form-group col-sm-6">
			<div class="casedata-block">
		<div style="padding: 10px 20px" class="text-info">
				<h3>   <i class="fa fa-check-square-o fa-1x padding-10" aria-hidden="true"></i>
                                <font style="vertical-align: inherit;"><font style="vertical-align: inherit;"> Allowed extensions are:  </font></font> </h3>
                                <div style="padding-right:30px;">
                                                    <i class="fa fa-file-image-o" aria-hidden="true"></i><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">
Pictures                                                </font></font><br>
                                                <i class="fa fa-file-pdf-o" aria-hidden="true"></i><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">
PDF files                                                </font></font><br>
                                                <i class="fa fa-file-word-o" aria-hidden="true"></i><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">
Word files                                                </font></font><br>
                                                    <i class="fa fa-file-audio-o" aria-hidden="true"></i><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">
Audio files                                                </font></font><br>
                                                <i class="fa fa-file-text-o" aria-hidden="true"></i><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">
Text files                                                </font></font><br>
                                </div>
                        <div class="padding-5"></div>

                        <i class="fa fa-check-square-o fa-1x padding-10" aria-hidden="true"></i>
                            <b><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Maximum file size:   </font></font></b>
                            <b class="text-danger"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">
10.00 MB 
                            </font></font></b>
                            <br>
                        <i class="fa fa-check-square-o fa-1x padding-10" aria-hidden="true"></i>
                                <b><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">The maximum number of files is: </font></font></b>
                                <b class="text-danger"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">
                                    20
                                </font></font></b>
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
    statusBarWidth:500,
    dragdropWidth:540,
	uploadStr:"Or click here to view the files",
	});
});

</script>