<?php
include('header.php');

?>
<style>
    .bootbox-confirm .modal-dialog {
       max-width: 500px;
    }
</style>
    <div class="m-grid__item m-grid__item--fluid m-wrapper">


        <!-- END: Subheader -->
        <div class="m-content">

            <!--begin::Portlet-->
            <div class="m-portlet lp-theme-card bg-transparent">
            <div id="custom-search-container"></div>
                <div class="m-portlet__head">
                    <div class="m-portlet__head-caption">
                        <!-- <div class="m-portlet__head-title">
                            <h3 class="m-portlet__head-text">
                                <?php echo $this->lang->line('HR_E_services');?>
                            </h3>
                        </div> -->
                        <div class="theme-new-nav-menu">
                            <h3 class="m-portlet__title" style="margin-right: 70px; font-size:24px !important;">
                                <?php echo $this->lang->line('HR_Services');?>
                            </h3>
                            <ul style="gap: 30px;">
                                <!-- <li> <a href="http://lexport.demosbywpsqr.com/admin/employee/list_employee">HR</a> </li> -->
                                <li> <a href="http://lexport.demosbywpsqr.com/admin/hr/list_hr_eservice"><?php echo $this->lang->line('e-services');?></a> </li>
                                <li> <a href="http://lexport.demosbywpsqr.com/admin/hr/list_hr_fine"><?php echo $this->lang->line('Fine');?></a> </li>
                                <li class="active"> <a href="http://lexport.demosbywpsqr.com/admin/employee/list_employee"><?php echo $this->lang->line('Employees');?></a> </li>
                                <!-- <li> <a href="http://lexport.demosbywpsqr.com/admin/finance">Financial</a> </li> -->
                                <!-- <li> <a href="http://lexport.demosbywpsqr.com/admin/finance/transaction">Transaction</a> </li> -->
                            </ul>

                            <a class="btn btn-primary" href="<?=base_url('admin/employee/add_employee');?>"> <i class="fa fa-plus"></i> <?php echo $this->lang->line('Add_Employee');?></a>
                        </div>
                    </div>
                </div>


                <div class="m-portlet__body">
                    <div class="row">
                        <div class="col-xl-12 order-2 order-xl-1">
                            <div id="msg" class="sufee-alert alert with-close alert-success alert-dismissible fade show success"></div>
                        </div>
                    </div>

                  


                    <div class="table-responsive">
                                    <table class="lp-theme-table lp-large-theme" id="m_datatable">
                        <thead>
                      <tr class="netTr" style="text-align:left;"> 
                        <th class="nameColumn sorting"><?php echo $this->lang->line('Serial_No');?><img class="nameSortIcon serialSortIcon" src="/assets/images/img/unfold_more.svg" height="18px"></th>
                        <th class="nameColumn sorting"><?php echo $this->lang->line('Name');?><img class="nameSortIcon serialSortIcon" src="/assets/images/img/unfold_more.svg" height="18px"></th>
                        <th class="nameColumn sorting"><?php echo $this->lang->line('Department');?><img class="nameSortIcon serialSortIcon" src="/assets/images/img/unfold_more.svg" height="18px"></th>
                        <th class="nameColumn sorting"><?php echo $this->lang->line('branch');?><img class="nameSortIcon serialSortIcon" src="/assets/images/img/unfold_more.svg" height="18px"></th>
                        <th class="nameColumn sorting"><?php echo $this->lang->line('Employee_Type');?><img class="nameSortIcon serialSortIcon" src="/assets/images/img/unfold_more.svg" height="18px"></th>
                        <th></th>
                      </tr>
                    </thead>
                    <tbody>
                     
                  <?php 
                     $count=1;
                  foreach($data as $emp){ ?>
                     <tr class="hide<?php echo $emp['id'] ?>" style="text-align:left">
                        <td><?= sprintf("#%02d", $count++) ?></td>
                        <td><?= $emp['name'] ?></td>
                        <td><?php echo getDepartmentName($emp['department_id'] ); ?></td>
                        <td><? echo getBranchName($emp['branch']); ?></td>
                        <td><?= $emp['employee_type'] ?></td>
						<td class="action" style="text-align:left;">
                            
						<a href="<?= base_url("admin/employee/view_employee/{$emp['id']}") ?>"  
                            title="<?php echo $this->lang->line('View_Employee');?>"> 
                            <img src="<?= base_url('assets/images/img/eye-solid.svg') ?>" alt="View" class="img-eye">
                        </a>
                        <a href="<?= base_url("admin/employee/find_employee/{$emp['id']}") ?>" 
                            title="<?php echo $this->lang->line('Edit_Employee');?>" 
                            class="editadmin" 
                            id="<?= $emp['id'] ?>">
                            <img src="<?= base_url('assets/images/img/pen-solid.svg') ?>" alt="Edit" class="img-pen">
                        </a>
                        <a href="javascript:;" title="<?php echo $this->lang->line('delete_employee');?>" class="fa fa-trash delete_employee" id=<?= $emp['id'] ?>> </a>
						</td>
                      </tr>
                  <?php } ?>

                            </tbody>
                        </table>
 
                    </div>


                </div>
            </div>


        </div>

    </div>

<?php include "footer.php";?>

<script type="text/javascript">

$(document).ready(function()
{
  $('#msg').hide();
   $('#customers-table').DataTable();
});
</script>

 <script type="text/javascript">

$("#m_datatable").on("click", ".delete_employee", function() {
   var id=$(this).attr("id");
  var url="<?= base_url('admin/employee/delete_employee'); ?>"; 
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
//$('.hide'+id).hide(200);
return true;
  }
  else
  {
      $('#msg').show();
       $('#msg').html('delete failed');
  }
    })
    });

    $(document).ready(function() {
    var table = $('#m_datatable').DataTable();

    // Move the search bar (filter input)
    var searchInput = $('.dataTables_filter');
    searchInput.detach().prependTo('#custom-search-container');

    // Add placeholder to the search input field
    $('.dataTables_filter input').attr('placeholder', 'Search Client, E-Services........');
});

function updateSortIcons() {
    $(".nameColumn").each(function () {
        var icon = $(this).find("img.nameSortIcon");

        if ($(this).hasClass("sorting_desc")) {
            icon.attr("src", "/assets/images/img/arrow_down1.svg");
        } else if ($(this).hasClass("sorting_asc")) {
            icon.attr("src", "/assets/images/img/arrow_up1.svg");
        } else {
            icon.attr("src", "/assets/images/img/unfold_more.svg");
        }
    });
}

// Initial call on page load
$(document).ready(function () {
    updateSortIcons();
});

// If sorting class changes dynamically on click
$(".nameColumn").click(function () {
    setTimeout(updateSortIcons, 10); // Allow time for sorting class to update before checking
});
</script>