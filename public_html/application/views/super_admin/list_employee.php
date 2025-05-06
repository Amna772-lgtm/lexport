<?php
include('header.php');

?><style>


        .m-portlet .m-portlet__head {
            border-bottom: 1px solid #ebedf2;
            background: #CAA457 url('<?php echo base_url();?>assets/images/ic.svg');
            background-repeat: no-repeat;
            background-position: right !important;
            color: #fff;
            -webkit-border-top-left-radius: 20px !important;
            -webkit-border-top-right-radius: 20px !important;
            -moz-border-radius-topleft: 20px !important;
            -moz-border-radius-topright: 20px !important;
            border-top-left-radius: 20px !important;
            border-top-right-radius: 20px !important;
        }

        img.m--img-rounded.m--marginless {
            max-width: 30px !important;
            height: 40px !important;
        }
</style>
    <div class="m-grid__item m-grid__item--fluid m-wrapper">


        <!-- END: Subheader -->
        <div class="m-content">

            <!--begin::Portlet-->
            <div class="m-portlet lp-theme-card">
            <div id="custom-search-container"></div>
                <div class="m-portlet__head">
                <div class="m-portlet__head-caption">
                        <div class="m-portlet__head-title title-with-btn">
                            <h3 class="m-portlet__head-text">
                                <?php echo $this->lang->line('HR_E_services');?>
                            </h3>
                            <a href="<?=base_url('super_admin/employee/add_employee');?>" class="btn btn-primary m-btn btn-cst  m-btn--custom m-btn--icon m-btn--air" style="border-radius: 20px;">
                                        <span>
                                            <i class="fa fa-plus"></i>
                                        <span><?php echo $this->lang->line('Add_Employee');?></span>
                                        </span>
                                    </a>
                        </div>
                    </div>
                </div>


                <div class="m-portlet__body">
                    <div class="m_datatable m-datatable m-datatable--default m-datatable--loaded" style="">

                    <div class="table-responsive transparent-table">
                                    <table class="lp-theme-table lp-large-theme" id="m_datatable">
                        <thead>
                      <tr class="netTr"> 
                        <th><?php echo $this->lang->line('No');?></th>
                        <th><?php echo $this->lang->line('Name');?></th>
                        <th><?php echo $this->lang->line('Department');?></th>
                        <th><?php echo $this->lang->line('branch');?></th>
                        <th><?php echo $this->lang->line('Employee_Type');?></th>
                        <th><?php echo $this->lang->line('ACTION');?></th>
                      </tr>
                    </thead>
                    <tbody>
                     
                  <?php 
                     $count=1;
                  foreach($data as $emp){ ?>
                     <tr class="hide<?php echo $emp['id'] ?>" style="text-align:center">
                        <td><?= $count++ ?></td>
                        <td><?= $emp['name'] ?></td>
                        <td><?php echo getDepartmentName($emp['department_id'] ); ?></td>
                        <td><? echo getBranchName($emp['branch']); ?></td>
                        <td><?= $emp['employee_type'] ?></td>
						<td class="action">  <a href=<?= base_url("admin/employee/find_employee/{$emp['id']}") ?> title="<?php echo $this->lang->line('Edit_Employee');?>" class="fa fa-pencil-square-o editadmin" id=<?= $emp['id'] ?>></a>
						<a href="javascript:;" title="<?php echo $this->lang->line('delete_employee');?>" class="fa fa-trash delete_employee" id=<?= $emp['id'] ?>></a>
						<a href=<?= base_url("admin/employee/view_employee/{$emp['id']}") ?>  title="<?php echo $this->lang->line('View_Employee');?>" class="fa fa-eye" target="_blnak"></a>
						</td>
                      </tr>
                  <?php } ?>

                            </tbody>
                        </table></div>
 
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

$('.delete_employee').click(function(){
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

    $(document).ready(function() {
        var table = $('#m_datatable').DataTable();

        // Move the search bar (filter input)
        var searchInput = $('.dataTables_filter');
        searchInput.detach().prependTo('#custom-search-container');

        // Add placeholder to the search input field
        $('.dataTables_filter input').attr('placeholder', 'Search Client, E-Services........');
    });
</script>