<?php
include('header.php');

?>

<style>
  .bootbox-confirm .modal-dialog {
    max-width: 500px;
}
  </style>
    <div class="m-grid__item m-grid__item--fluid m-wrapper">
    <div style="position:absolute;">
        <img class="custom-search-icon" src="../../../assets/images/img/search-icon.svg" alt="Search">
        <input type="text" id="userSearch" class="form-control" placeholder="Search Client, E-Services........">
    </div>

    <?php
    // echo '<prev>';
    // print_r($data);
    // die();
    ?>
    
        <!-- END: Subheader -->
        <div class="m-content">

            <!--begin::Portlet-->
            <div class="m-portlet lp-theme-card bg-transparent">
                <div class="m-portlet__head">
                    <div class="m-portlet__head-caption">
                        <!-- <div class="m-portlet__head-title">
                            <h3 class="m-portlet__head-text">
                                <?php echo $this->lang->line('Project');?>
                            </h3>
                        </div> -->

                        <div class="theme-new-nav-menu">
                            <h3 class="m-portlet__title" style="margin-right: 70px; font-size:24px !important;">
                                <?php echo $this->lang->line('Project');?>
                            </h3>
                            <ul style="gap:30px;">
                                <li class="active"> <a href="http://lexport.demosbywpsqr.com/admin/project/list_project"><?php echo $this->lang->line('Project');?></a> </li>
                                <li> <a href="http://lexport.demosbywpsqr.com/admin/project/list_convert_project"><?php echo $this->lang->line('Convert_Project');?></a> </li>
                            </ul>

                            <a class="btn btn-primary" href="<?=base_url('admin/project/add_project');?>"><i class="fa fa-plus"></i> <?php echo $this->lang->line('Create_New_Project');?></a>
                        </div>
                    </div>
                </div>
 
                <div class="m-portlet__body">
                    <div class="m_datatable m-datatable m-datatable--default m-datatable--loaded" style="">
                    <div class="table-responsive">
                                    <table class="lp-theme-table lp-large-theme" id="m_datatable">
                            <thead>
                            <tr class="netTr" style="text-align:left;">

                                <th class="sortable"><?php echo $this->lang->line('Serial_No');?>
                                <img class="sortIcon" src="../../assets/images/img/unfold_more.svg" height="18px">
                            </th>
                                <th class="sortable"><?php echo $this->lang->line('Project_Name');?>
                                <img class="sortIcon" src="../../assets/images/img/unfold_more.svg" height="18px">
                            </th>
                                <th class="sortable"><?php echo $this->lang->line('Project_Type');?>
                                <img class="sortIcon" src="../../assets/images/img/unfold_more.svg" height="18px">
                            </th>
                                <th class="sortable"><?php echo $this->lang->line('Project_Team_Manager');?>
                                <img class="sortIcon" src="../../assets/images/img/unfold_more.svg" height="18px">
                            </th>
                                <th class="sortable"><?php echo $this->lang->line('Status');?>
                                <img class="sortIcon" src="../../assets/images/img/unfold_more.svg" height="18px"></th>
                                <th class="sortable"><?php echo $this->lang->line('Project_Added_Date');?>
                                <img class="sortIcon" src="../../assets/images/img/unfold_more.svg" height="18px">
                            </th>
                                <th class="sortable"><?php echo $this->lang->line('Project_Ended_Date');?>
                                <img class="sortIcon" src="../../assets/images/img/unfold_more.svg" height="18px">
                            </th>
                                <th></th>

                            </tr>
                            </thead>
                            <tbody>
 <?php 
              $count=1;
              foreach($data as $consultation){  
              if(in_array($this->session->userdata('admin_id'),getGroupByID($consultation['add_group'])) OR $this->session->userdata('role_id')==1){
              ?>
              <tr class="hide<?php echo $consultation['id'] ?>">
              <?php $serial_number = sprintf("#%03d", $count++); ?>
              <td data-sort="<?= $count - 1 ?>"><?= $serial_number ?></td>
                <td><?= $consultation['project_name'] ?></td>
                <td><?= getProjectTypeName($consultation['project_type']); ?></td>
                <td><?=  getEmployeeName($consultation['project_team_manager']); ?></td>
                <td><?= $consultation['project_status'] ?></td>
                <td><?= $consultation['starting_date'] ?></td>
                <td><?= $consultation['ending_date'] ?></td>
		            <td class="action">
                    <a href=<?= base_url("admin/project/view_project/{$consultation['id']}") ?>  title="<?php echo $this->lang->line('View');?>"><img src="<?= base_url('assets/images/img/eye-solid.svg') ?>" alt="View" class="img-eye"></a>
                  
                    <a href=<?= base_url("admin/project/find_project/{$consultation['id']}") ?> class="editadmin" id=<?= $consultation['id'] ?> title="<?php echo $this->lang->line('Edit');?>"><img src="<?= base_url('assets/images/img/pen-solid.svg') ?>" alt="Edit" class="img-pen"></a>
        
                    <a href="javascript:;" class="fa fa-trash delete_consultation" id=<?= $consultation['id'] ?> title="<?php echo $this->lang->line('Delete');?>"></a>
                   <!-- <a href="javascript:;" class="btn btn-outline-success fa fa-file " id=<?= $appoinment['id'] ?>>Report</a> -->
                </td>
              </tr>
            <?php } } ?>
      

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
  <?php if(isset($datas[10][3]) && $datas[10][3] == 1){?>
      $('.dataTables_filter').show();
    <?php }else{?>
      $('.dataTables_filter').hide();
    <?php } ?>

  $(document).ready(function()
  {
    $('#msg').hide();
    $('#customers-table').DataTable();
  });


  $(".delete_consultation").click(function() {
    var id = $(this).attr("id");
    var url = "<?= base_url('admin/project/delete_project'); ?>";
    

    bootbox.confirm("Are you sure?", function(result) {
        if (result) {
            $.ajax({
                type: 'ajax',
                method: 'post',
                url: url,
                data: { "id": id },
                dataType: 'json',

                success: function(data) {
                    $('#msg').show();
                    $('#msg').html(data);
                },
            });

            $('.hide' + id).hide(200);
            return true;
        } else {
            $('#msg').show();
            $('#msg').html('Delete Failed');
        }
    });
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
