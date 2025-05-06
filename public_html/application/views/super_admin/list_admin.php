<?php
include('header.php');

?>
<style>


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
                                <?php echo $this->lang->line('Admin');?>
                            </h3>


                            <a href="<?=base_url('super_admin/administrator/add_admin');?>" class="btn btn-primary m-btn btn-cst  m-btn--custom m-btn--icon m-btn--air" style="border-radius: 20px;">
                                        <span>
                                            <i class="fa fa-plus"></i>
                                        <span>Add_Admin<?php echo $this->lang->line('Add_Admin');?></span>
                                        </span>
                                    </a>
                        </div>
                    </div>
                </div>


                <div class="m-portlet__body">
                    <div class="row">
                        <div class="col-xl-12 order-2 order-xl-1">
                            <?php echo showMsg(); ?>                          
                        </div>
                    </div>
 



                    <div class="m_datatable m-datatable m-datatable--default m-datatable--loaded" style="">

                    <div class="table-responsive transparent-table">
                                    <table class="lp-theme-table lp-large-theme" id="m_datatable">
                            <thead>
                            <tr class="netTr">
                             
                      <tr class="netTr">
                        <th>No.</th>
                        <th>Name</th>
                        <th>Email</th>
                        
                        <th>Create Date</th>
                        <th>Action</th>
                      </tr>
                    
                            </tr>
                            </thead>
                            <tbody>
			<?php $count=1; foreach($list as $admin){ ?>
                      <tr class="hide<?php echo $admin['id'] ?>">
                        <td><?= $count++ ?></td>
                        <td><?= $admin['name'] ?></td>
                        <td><?= $admin['email'] ?> </td>
                        <td><?= $admin['created'] ?></td>
            <td class="action">
              <a href=<?= base_url("super_admin/administrator/find_admin/{$admin['id']}") ?> class="fa fa-pencil-square-o" id=<?= $admin['id'] ?>>
			  </a>
           
            <a href="javascript:;" title="delete admin" class="fa fa-trash" id=<?= $admin['id'] ?>></a>

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

    </div>

<?php

include('footer.php');
?>

 <script type="text/javascript">

    $('.delete_admin').click(function(){
  var id=$(this).attr("id");
  var url="<?= base_url('super_admin/administrator/delete_admin'); ?>"; 
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
       $('#msg').html('Delete Failed');
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