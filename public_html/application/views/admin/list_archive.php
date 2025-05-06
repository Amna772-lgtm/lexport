<?php
include('header.php');

?>
<style>
  .datafiles .fa {
    font-size: 70px;
  }
  span.down_img{
    background: #1866a9;
    border-radius: 100%;
    align-items: center;
    width: 26px;
    height: 26px;
  }
  </style>

<div class="m-grid__item m-grid__item--fluid m-wrapper">
        <div style="position:absolute;">
            <img class="custom-search-icon" src="../../../assets/images/img/search-icon.svg" alt="Search">
            <input type="text" id="userSearch" class="form-control" placeholder="Search Client, E-Services........">
        </div>
        <!-- END: Subheader -->
        <div class="m-content">

            <!--begin::Portlet-->
            <div class="m-portlet lp-theme-card bg-transparent">
              <div id="custom-search-container"></div>
                <div class="m-portlet__head">
                  <div class="m-portlet__head-caption">
                      
                    <div class="theme-new-nav-menu">
                        <h3 class="m-portlet__title" style="margin-right: 70px; font-size:24px !important;">
                            <?php echo $this->lang->line('Archives');?>
                        </h3>
                        <ul style="gap: 30px;">
                            <li class="active"> <a href="http://lexport.demosbywpsqr.com/admin/archive/list_archive"><?php echo $this->lang->line('Files');?></a> </li>
                            <li> <a href="http://lexport.demosbywpsqr.com/admin/admin/audio_list"><?php echo $this->lang->line('Audio');?></a> </li>
                            <li> <a href="http://lexport.demosbywpsqr.com/admin/admin/list_note"><?php echo $this->lang->line('Notes_List');?></a> </li>
                        </ul>
                    </div>
                  </div>
                </div>


                <div class="m-portlet__body">
                  <div class="m_datatable m-datatable m-datatable--default m-datatable--loaded" style="">

                    <div class="table-responsive">
                        <table class="lp-theme-table lp-large-theme" id="m_datatable">
                            <thead>
                            <tr class="netTr" style="text-align:left;">
                                <!-- <th><input type="checkbox" id="select-all"></th> -->
                                <th class="sortable"><?php echo $this->lang->line('Thumb');?> 
                                <img class="sortIcon" src="../../assets/images/img/unfold_more.svg" height="18px">
                              </th>
                                <th class="sortable"><?php echo $this->lang->line('File_Name');?>
                                <img class="sortIcon" src="../../assets/images/img/unfold_more.svg" height="18px">
                              </th>
                                <th class="sortable"><?php echo $this->lang->line('File_Type');?><img class="sortIcon" src="../../assets/images/img/unfold_more.svg" height="18px"></th>
                                <!-- <th class="sortable"><?php echo $this->lang->line('Modify_Date');?><img class="sortIcon" src="../../assets/images/img/unfold_more.svg" height="18px"></th>
                                <th class="sortable"><?php echo $this->lang->line('Uploaded_Date');?><img class="sortIcon" src="../../assets/images/img/unfold_more.svg" height="18px"></th> -->
                                <th class="sortable"><?php echo $this->lang->line('Uploaded_by');?><img class="sortIcon" src="../../assets/images/img/unfold_more.svg" height="18px"></th>
                                <th style="text-align:left;"><?php echo $this->lang->line('ACTION');?></th>
                            </tr>
                            </thead>
                            <tbody>
<?php 
              $count=1;
              foreach($data as $archives){
		 
				$did= getCaseIdByDocId($archives['temp_app_id']);
			
				 if($this->session->userdata('role_id') == 1){
			  ?>
			  
              <tr class="hide<?php echo $archives['id'] ?>" style="text-align:left;">
              <!-- <td><input type="checkbox" class="row-checkbox" value="<?= $archives['id'] ?>"></td> -->

                <td><a href="<?=base_url('uploads/case_file/'.$archives["name"]);?>" class='dwnl' title="<?php echo $this->lang->line('Download');?>" download><?php    $src = '../../assets/images/img/file-icon.svg';
                 	 

 $ext = pathinfo($archives['name'], PATHINFO_EXTENSION);
                 	if($ext == 'jpeg' || $ext == 'jpg' || $ext == 'png'){
                 	    $src = '../../assets/images/img/file-icon.svg';
                 	   echo "<img src='".$src."' width=''>"; 
                 	  
                 	}
                 	else if($ext == 'avi' || $ext == 'mp4' || $ext == 'flv' || $ext == 'mov' || $ext == 'wmv' || $ext == '3gp' ){
                 	    echo "<div class='datafiles'><i class='fa fa-video-camera 5x'></i></div>";
                 	}
                 	else if($ext == 'mp3' || $ext == 'wav' || $ext == 'ogg' || $ext == 'aac' || $ext == 'mpc' ){
                 	    echo "<div class='datafiles'><i class='fa fa-microphone 5x'></i></div>";
                 	} else {
                 	     echo "<div class='datafiles'> <img src='../../assets/images/img/file-icon.svg'> </div>";
                 	}
?></a></td>
                <td><?= $archives['name'] ?></td>
                <td><?php //echo  pathinfo($archives['name'], PATHINFO_EXTENSION); 
				if($archives['cat_id']==1){ echo "Documentation"; }
				if($archives['cat_id']==2){ echo "Data"; }
				if($archives['cat_id']==3){ echo "Contract"; }
				if($archives['cat_id']==4){ echo "Report"; }
				if($archives['cat_id']==5){ echo "Tuning"; }
if($archives['cat_id']==6){ echo "Procuation"; }
if($archives['cat_id']==7){ echo "Referrals"; }
				?></td>
                <!-- <td><?php  $date= date("d/m/Y", strtotime($archives['updatedate'])); echo getTheDayAndDateFromDatePan($date); ?> </td>
                <td> <?php  $date= date("d/m/Y", strtotime($archives['created'])); echo getTheDayAndDateFromDatePan($date); ?> </td> -->
                <td>Nassr Al Barakti <span style="color: #1faa5e;">(<?php echo getEmployeeName($archives['uploaded_by']); ?>)</span></td>


					<td class="action">
					 
          <a href="<?= base_url('uploads/case_file/'.$archives["name"]); ?>" 
   download 
   class="download-file"
   title="<?php echo $this->lang->line('download');?>">
    <span class="down_img d-flex justify-content-center">
        <img src="<?php echo base_url('assets/images/img/vertical_align_bottom.svg'); ?>" 
             alt="Download" width="20" height="20">
    </span>
</a>



		<!--<a href="<?= base_url("admin/c_case/edit_case/{$did}#armanage") ?>" class="m-portlet__nav-link btn m-btn m-btn--hover-warning m-btn--icon m-btn--icon-only m-btn--pill" title="">
			<i class="fa fa-edit"></i>
		</a>-->

                </td>
              </tr>
            <?php } else {
				if($archives['cat_id']!=3){
					 ?>
			  
              <tr class="hide<?php echo $archives['id'] ?>" style="text-align:left;">
              <td><input type="checkbox" class="row-checkbox" value="<?= $archives['id'] ?>"></td>
                <td><a href="<?=base_url('uploads/case_file/'.$archives["name"]);?>" class='dwnl' download><?php    $src = base_url()."uploads/case_file/".$archives['name'];
                 	 

 $ext = pathinfo($archives['name'], PATHINFO_EXTENSION);
                 	if($ext == 'jpeg' || $ext == 'jpg' || $ext == 'png'){
                 	    $src = base_url()."uploads/case_file/".$archives['name'];
                 	   echo "<img src='".$src."' width='70'>"; 
                 	  
                 	}
                 	else if($ext == 'avi' || $ext == 'mp4' || $ext == 'flv' || $ext == 'mov' || $ext == 'wmv' || $ext == '3gp' ){
                 	    echo "<div class='datafiles'><i class='fa fa-video-camera 5x'></i></div>";
                 	}
                 	else if($ext == 'mp3' || $ext == 'wav' || $ext == 'ogg' || $ext == 'aac' || $ext == 'mpc' ){
                 	    echo "<div class='datafiles'><i class='fa fa-microphone 5x'></i></div>";
                 	} else {
                 	     echo "<div class='datafiles'><i class='fa fa-file 5x'></i></div>";
                 	}
?></a></td>
                <td><?= $archives['name'] ?></td>
                <td><?php //echo  pathinfo($archives['name'], PATHINFO_EXTENSION); 
				if($archives['cat_id']==1){ echo "Documentation"; }
				if($archives['cat_id']==2){ echo "Data"; }
				if($archives['cat_id']==3){ echo "Contaract"; }
				if($archives['cat_id']==4){ echo "Report"; }
				if($archives['cat_id']==5){ echo "Tuning"; }
if($archives['cat_id']==6){ echo "Procuation"; }
if($archives['cat_id']==7){ echo "Referrals"; }
				?></td>
                <td><?php  $date= date("d/m/Y", strtotime($archives['updatedate'])); echo getTheDayAndDateFromDatePan($date); ?> </td>
                <td> <?php  $date= date("d/m/Y", strtotime($archives['created'])); echo getTheDayAndDateFromDatePan($date); ?> </td>
                <td><?php echo 'Nasar Al Barakati (' . getEmployeeName($archives['uploaded_by']) . ')'; ?></td>

					<td class="action">
	 
<span style="overflow: visible; position: relative;">
		<a href="javascript:;" class="m-portlet__nav-link btn m-btn m-btn--hover-warning m-btn--icon m-btn--icon-only m-btn--pill delete_contract" id=<?= $archives['id'] ?> title="<?php echo $this->lang->line('Close');?>">
			<i class="fa fa-close"></i>
		</a>
	</span>
<!--<span style="overflow: visible; position: relative;">
		<a href="<?= base_url("admin/c_case/edit_case/{$did}#armanage") ?>" class="m-portlet__nav-link btn m-btn m-btn--hover-warning m-btn--icon m-btn--icon-only m-btn--pill" title="">
			<i class="fa fa-edit"></i>
		</a>
</span>-->
                </td>
              </tr> <?php
				}
			}
			
			} ?>

                            </tbody>
                        </table>

                       
                    </div>


                </div>
            </div>


        </div>

    </div>

<?php

include('footer.php');
?>

<script type="text/javascript">
  <?php if(isset($datas[13][3]) && $datas[13][3] == 1){?>
      $('.dataTables_filter').show();
    <?php }else{?>
      $('.dataTables_filter').hide();
    <?php } ?>
  $(document).ready(function()
  {
    $('#msg').hide();
    $('#customers-table').DataTable();
  });

  $('.delete_contract').click(function(){
    
    var id=$(this).attr("id");

    var url="<?= base_url('admin/archive/delete_archive'); ?>"; 
    bootbox.confirm("Are you sure?", function(result){
      if(result)
      {
        $.ajax({
          type:'ajax',
          method:'post',
          url:url,
          data:{"id" : id},
          success:function(data){
            $('#msg').show();
            $('#msg').html(data);
          },
        });
        $('.hide'+id).hide(200);
        return true;
      }
      else
      {
        $('#msg').show();
        $('#msg').html('delete failed');
      }
    })
  });
$('#clientsel').on('change', function() {
var url="<?= base_url('admin/archive/select_case'); ?>"; 
var id = this.value;
$.ajax({
  type:'ajax',
  method:'post',
  url:url,
  data:{"id" : id},
  success:function(data){
 
	$('#casesel').html(data);
  },
});
});

// document.getElementById('select-all').addEventListener('change', function() {
//     let checkboxes = document.querySelectorAll('.row-checkbox');
//     checkboxes.forEach(cb => cb.checked = this.checked);
// });

$(document).ready(function() {
    var table = $('#m_datatable').DataTable();

    // Move the search bar (filter input)
    var searchInput = $('.dataTables_filter');
    searchInput.detach().prependTo('#custom-search-container');

    // Add placeholder to the search input field
    $('.dataTables_filter input').attr('placeholder', 'Search Client, E-Services........');
});

document.getElementById("userSearch").addEventListener("keyup", function() {
    let searchValue = this.value.toLowerCase();
    let tableRows = document.querySelectorAll(".lp-theme-table tbody tr");

    tableRows.forEach(row => {
        let rowText = row.textContent.toLowerCase();
        row.style.display = rowText.includes(searchValue) ? "" : "none";
    });
});

function updateSortIcons() {
    $(".sortable").each(function () {
        var icon = $(this).find("img.sortIcon");

        if ($(this).hasClass("sorting_desc")) {
            icon.attr("src", "../../assets/images/img/arrow_down1.svg");
        } else if ($(this).hasClass("sorting_asc")) {
            icon.attr("src", "../../assets/images/img/arrow_up1.svg");
        } else {
            icon.attr("src", "../../assets/images/img/unfold_more.svg");
        }
    });
}

// Initial call on page load
$(document).ready(function () {
    updateSortIcons();
});

// If sorting class changes dynamically on click
$(".sortable").click(function () {
    setTimeout(updateSortIcons, 10); // Allow time for sorting class to update before checking
});
</script>
