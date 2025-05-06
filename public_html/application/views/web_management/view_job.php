<?php
include('header.php');

?>

    <style>
        .m-form.m-form--group-seperator-dashed .m-form__group {
            border-bottom: 0px dashed #ebedf2;
        }
        .thh h3{
            background: #1F3958;
            color: #fff;
            font-weight: bold;
            text-transform: uppercase;
            padding: 10px;
            -webkit-border-top-left-radius: 20px !important;
            -webkit-border-top-right-radius: 20px !important;
            -moz-border-radius-topleft: 20px !important;
            -moz-border-radius-topright: 20px !important;
            border-top-left-radius: 20px !important;
            border-top-right-radius: 20px !important;
            margin: 30px 30px 0 30px;
        }
        .in_fo{
            box-shadow: 0px 5px 10px 0px #cccccc !important;
            margin: 0 30px;
            padding-bottom: 25px;
            -webkit-border-bottom-right-radius: 20px;
            -webkit-border-bottom-left-radius: 20px;
            -moz-border-radius-bottomright: 20px;
            -moz-border-radius-bottomleft: 20px;
            border-bottom-right-radius: 20px;
            border-bottom-left-radius: 20px;
        }
        .m-form.m-form--group-seperator-dashed .m-form__group {
            border-bottom: 0px dashed #ebedf2;
            padding-bottom: 0;
            padding-top: 10px;
        }
        .m-portlet .m-form.m-form--fit > .m-portlet__body {
            padding-bottom: 40px !important;
        }
        .nav {
            display: -webkit-box;
        }
    </style>
	
    <div class="m-grid__item m-grid__item--fluid m-wrapper">


        <!-- END: Subheader -->
        <div class="m-content">

            <!--begin::Portlet-->
            <div class="m-portlet">
                <div class="m-portlet__head">
                    <div class="m-portlet__head-caption">
                        <div class="m-portlet__head-title">
                            <h3 class="m-portlet__head-text">
                             <?php echo $this->lang->line('JOB');?>
                            </h3>
                        </div>
                    </div>
                </div>
				<div class="m-form m-form--fit m-form--label-align-right m-form--group-seperator-dashed">
				    <?php
				    if($this->session->userdata('admin_site_lang')=="arabic" OR $this->session->userdata('admin_site_lang')=="" )
                          {
                              $title = $data['title_ar'];
                              $description = $data['description_ar'];
                          }
                          else
                          {
                              $title = $data['title'];
                              $description = $data['description'];
                          }
                      ?>
					<div class="col-md-12">
						<?php echo $this->lang->line('Job_Title'); ?> :	<?php echo $title;?>
					</div>
					<div class="col-md-12">
						<?php echo $this->lang->line('Job_Description');?> : <?php echo $description;?>
					</div>	
				</div>


                <!--end::Form-->
            </div>

            <!--end::Portlet-->
        </div>
    


        <!-- END: Subheader -->
        <div class="m-content">

            <!--begin::Portlet-->
            <div class="m-portlet">
                <div class="m-portlet__head">
                    <div class="m-portlet__head-caption">
                        <div class="m-portlet__head-title">
                            <h3 class="m-portlet__head-text">
                             <?php echo $this->lang->line('Resumes');?>
                            </h3>
                        </div>
                    </div>
                </div>
				<div class="m-form m-form--fit m-form--label-align-right m-form--group-seperator-dashed" style="margin:10px;">
					<?php $result = $this->db->where('job_id',$data['id'])->get('job_employment')->result_array(); ?>
					 <table id="bootstrap-data-table" class="table table-striped table-bordered tablecase">
						<thead>
							<tr class="netTr">
								<th><?php echo $this->lang->line('No');?></th>
								<th><?php echo $this->lang->line('Name');?></th>
								<th><?php echo $this->lang->line('Email');?></th>
								<th><?php echo $this->lang->line('Phone');?></th>
								<th><?php echo $this->lang->line('Education');?></th>
								<th><?php echo $this->lang->line('Experience');?></th>
								<th><?php echo $this->lang->line('Attachment');?></th>
							</tr>
						</thead>
						<tbody>
							<?php $i="1"; foreach($result as $row) {?>
							<tr>
								<td><?php echo $i++;?></td>
								<td><?php echo $row['first_name']." ".$row['last_name'];?></td>
								<td><?php echo $row['email'];?></td>
								<td><?php echo $row['phone'];?></td>
								<td><?php echo $row['education'];?></td>
								<td><?php echo $row['work_experience'];?> <?php echo $this->lang->line('Year');?></td>
								<td><a href="<?php echo base_url('uploads/resumes/'.$row['resume']);?>" title="<?php echo $this->lang->line('Download_Mission');?>" download><?php echo $row['resume'];?> <i class="fa fa-download" style="font-size:20px;"></i></a></td>
							</tr>
							<?php } ?>
						</tbody>
					</table>
				</div>


                <!--end::Form-->
            </div>

            <!--end::Portlet-->
        </div>
    </div>


<?php

include('footer.php');
?>
<script type="text/javascript">

$(document).ready(function()
{
  
   $('#customers-table').DataTable();
});
</script>