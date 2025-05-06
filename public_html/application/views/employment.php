<?php
$nvc = "white-nav sticky shrink modern hover4 radius-drop";
$segment = $this->uri->segment(3);
if($segment == "job"){$pageTitle = $this->lang->line('Join_us');}else if($segment == "training"){ $pageTitle = $this->lang->line('Training'); }else{ $pageTitle = "";}
include('header.php');
?>
<script src="https://www.google.com/recaptcha/api.js"></script>
<!-- CONTENT -->
<section id="home" class="sm-py white fullwidth  bg-soft-colored bg-soft bg-scroll cover" data-background="<?php echo base_url('assets');?>/content/etna/images/about_01.jpg">
    <!-- Container -->
    <div class="container">
        <div class="row calculate-height">
            <div class="t-left t-center-xs col-sm-12 col-xs-12">
				<h2><?= $pageTitle; ?></h2>
            </div>
        </div>
    </div>
    <!-- End Container -->
</section>
<!-- END CONTENT -->

<section id="content" class="sm-pb xxs-mb">
    
    
    
    <div class="container">
        
        <div class="t-center">
            <h1 class="bold-title lh-sm mt">
                <?php echo $this->lang->line('Drop_Us_a_Message');?>
            </h1>
        </div>

        <!-- Col -->
		<form class="loginform" method="post" enctype="multipart/form-data" action="<?php echo base_url('front/employment_data');?>">
		    
		    <div class="col-md-12 col-sm-12" style="margin:20px 0px;">
			<?php if($success=$this->session->flashdata('success')){ ?><span class="text-success"><?php echo $success; ?></span><?php } ?>
			</div>
		    
		    <!-- Half Inputs -->
            <div class="row no-mx">
                <div class="col-sm-6 col-xs-12 no-pl mini-pr">
                    <!-- Name -->
                    <label><?php echo $this->lang->line('First_Name');?><span style="color:red;">*</span></label>
				    <input type="text" class="classic_form big radius-lg bg-white bs-light-focus" name="first_name" id="first_name" placeholder=""  required />
                    
                </div>
                <div class="col-sm-6 col-xs-12 no-pr mini-pl">
                    <label><?php echo $this->lang->line('Last_Name');?><span style="color:red;">*</span></label>
				    <input type="text" class="classic_form big radius-lg bg-white bs-light-focus" name="last_name" id="last_name" placeholder="" required />
                </div>
            </div>
            
            <!-- Half Inputs -->
            <div class="row no-mx">
                <div class="col-sm-6 col-xs-12 no-pl mini-pr">
                    <label><?php echo $this->lang->line('Email');?><span style="color:red;">*</span></label>
				    <input type="email" class="classic_form big radius-lg bg-white bs-light-focus" name="email" id="email" placeholder="" required />
                </div>
                <div class="col-sm-6 col-xs-12 no-pr mini-pl">
                    <label><?php echo $this->lang->line('Phone');?><span style="color:red;">*</span></label>
				    <input type="text" class="classic_form big radius-lg bg-white bs-light-focus" name="phone" id="phone" onkeypress="return isNumberKey(event)" placeholder="" required />
                </div>
            </div>
            
            <!-- Half Inputs -->
            <div class="row no-mx">
                <div class="col-sm-6 col-xs-12 no-pl mini-pr">
                    <label><?php echo $this->lang->line('Education');?><span style="color:red;">*</span></label>
				    <input type="text" class="classic_form big radius-lg bg-white bs-light-focus" name="education" id="education" placeholder="Education" required />
                </div>
                <?php if($this->uri->segment(3) != 'training'){ ?>
                <div class="col-sm-6 col-xs-12 no-pr mini-pl">
                    <label><?php echo $this->lang->line('Total_Work_Experience');?><span style="color:red;">*</span></label>
    				<select class="classic_form big radius-lg bg-white bs-light-focus" name="work_experience" id="work_experience" required > 
    					<option value=""><?php echo $this->lang->line('Select_Work_Experience');?></option>
    					<option value="0"><?php echo $this->lang->line('Less_than_one_year');?></option>
    					<option value="1">1 <?php echo $this->lang->line('Year');?></option>
    					<option value="2">2 <?php echo $this->lang->line('years');?></option>
    					<option value="3">3 <?php echo $this->lang->line('years');?></option>
    					<option value="4">4 <?php echo $this->lang->line('years');?></option>
    					<option value="5">5 <?php echo $this->lang->line('years');?></option>
    					<option value="6">6 <?php echo $this->lang->line('years');?></option>
    					<option value="7">7 <?php echo $this->lang->line('years');?></option>
    					<option value="8">8 <?php echo $this->lang->line('years');?></option>
    					<option value="9">9 <?php echo $this->lang->line('years');?></option>
    					<option value="10">10+ <?php echo $this->lang->line('years');?></option>
    				</select>
                </div>
                <?php } ?>
            </div>
            
            <!-- Half Inputs -->
            <div class="row no-mx">
                <div class="col-sm-6 col-xs-12 no-pl mini-pr">
                    <label><?php echo $this->lang->line('Upload_Resume');?><span style="color:red;">*</span></label>
    				<input type="file" name="resume" id="resume" class="classic_form big radius-lg bg-white bs-light-focus" required />
    				<?php if($error=$this->session->flashdata('error')){ ?><span class="text-danger"><?php echo $error; ?></span><?php } ?>
                </div>
                <div class="col-sm-6 col-xs-12 no-pr mini-pl">
                    <input type="hidden" name="job_id" value="<?php echo $job_id;?>">
				    <input type="hidden" name="employment" value="<?php echo $employment;?>">
                </div>
            </div>
            
            
            
            <div class="row no-mx">
                <div class="col-sm-6 col-xs-12 no-pl mini-pr">
                    
                    <div class="form-group col-sm-12"><?php echo $this->lang->line('Check_Captcha');?><br>
					    <div class="g-recaptcha" data-sitekey="6Le4PCMUAAAAAHGAJKRqKgIeXOT38O9bcUrJKNnI"></div>
					</div>
                    
                    <input type="submit" class="bg-colored1 xl-btn font-12 long-btn xxs-mt slow width-auto click-effect white bold qdr-hover-6 radius-lg" value="<?php echo $this->lang->line('Submit');?>">
                </div>
            </div>
		    
		</form>	
        <!-- End Col -->


    </div>

</section>


<?php

include('footer.php');

?>
<script type="application/javascript">

  function isNumberKey(evt)
      {
         var charCode = (evt.which) ? evt.which : event.keyCode
         if (charCode > 31 && (charCode < 48 || charCode > 57))
            return false;

         return true;
      }

</script>