<?php
include('header.php');

?>
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
                                <?php echo $this->lang->line('Opponent_List');?>
                            </h3>
                        </div> -->

                        <div class="theme-new-nav-menu">
                            <h3 class="m-portlet__title" style="margin-right: 70px; font-size:24px !important;">
                            <?php echo $this->lang->line('Opponent_List');?>
                            </h3>
                            <!-- <a class="back-link" href="#">
<svg width="16" height="14" viewBox="0 0 16 14" fill="none" xmlns="http://www.w3.org/2000/svg">
<path fill-rule="evenodd" clip-rule="evenodd" d="M7.70679 13.7006C7.51926 13.888 7.26495 13.9934 6.99979 13.9934C6.73462 13.9934 6.48031 13.888 6.29279 13.7006L0.292786 7.70057C0.105315 7.51304 0 7.25874 0 6.99357C0 6.72841 0.105315 6.4741 0.292786 6.28657L6.29279 0.286571C6.48139 0.104413 6.73399 0.00361876 6.99619 0.00589718C7.25838 0.0081756 7.5092 0.113345 7.6946 0.298753C7.88001 0.484161 7.98518 0.734973 7.98746 0.99717C7.98974 1.25937 7.88894 1.51197 7.70679 1.70057L3.41379 5.99357H14.9998C15.265 5.99357 15.5194 6.09893 15.7069 6.28646C15.8944 6.474 15.9998 6.72835 15.9998 6.99357C15.9998 7.25879 15.8944 7.51314 15.7069 7.70068C15.5194 7.88821 15.265 7.99357 14.9998 7.99357H3.41379L7.70679 12.2866C7.89426 12.4741 7.99957 12.7284 7.99957 12.9936C7.99957 13.2587 7.89426 13.513 7.70679 13.7006Z" fill="#333333"/>
</svg>
 Back</a>
                            <ul>
                                <li class="active"> <a href="http://lexport.demosbywpsqr.com/admin/c_case/padding_list">Waiting list</a> </li>
                                <li> <a href="http://lexport.demosbywpsqr.com/admin/customer/list_customer">List Customers</a> </li>
                                <li> <a href="http://lexport.demosbywpsqr.com/admin/mission_session/list_mission">Cases</a> </li>
                                <li> <a href="http://lexport.demosbywpsqr.com/admin/mission_writings/list_mission">Writing</a> </li>
                                <li> <a href="http://lexport.demosbywpsqr.com/admin/mission_consultation/list_mission">Consultation</a> </li>
                                <li> <a href="http://lexport.demosbywpsqr.com/admin/mission_visiting/list_mission">Meeting</a> </li>
                                <li> <a href="http://lexport.demosbywpsqr.com/admin/mission_general/list_mission">General</a> </li>
                                <li> <a href="http://lexport.demosbywpsqr.com/admin/assignment">Assignment</a> </li>
                                <li> <a href="http://lexport.demosbywpsqr.com/admin/archive/list_archive">Archives</a> </li>
                                <li> <a href="http://lexport.demosbywpsqr.com/admin/admin/audio_list">Audio Record</a> </li>
                                <li> <a href="http://lexport.demosbywpsqr.com/admin/admin/list_note">Note List</a> </li>
                            </ul>

                            <a class="btn btn-primary" href="#"> <i class="fa fa-plus"></i> Assign</a> -->
                        </div>
                    </div>
                </div>


                <div class="m-portlet__body">


                    <div class="row align-items-center dataTables_wrapper dt-bootstrap4 no-footer" style="margin-bottom: 20px">

<style>
.nedbtn .btn {
    margin-right: 10px !important;
}
</style>
                        
                        <div class="col-xl-12 order-2 order-xl-1 nedbtn">

                            <div class="form-group m-form__group align-items-right" style="margin-bottom: 0">
								<a class="btn btn-info"href="<?=base_url('admin/admin/all_users');?>"><?php echo $this->lang->line('Registered_List');?> <span class="badge badge-danger noticount admin"><?php echo userNotification(); ?></span></a>
				<a class="btn btn-success"href="<?=base_url('admin/c_case/padding_case');?>"><?php echo $this->lang->line('Pending_E_Service');?> <span class="badge badge-danger noticount admin"><?php echo casePendingNotification(); ?></span></a>
				 <a href="<?=base_url('admin/c_case/reject_case_list');?>" class="btn btn-danger"><?php echo $this->lang->line('Reject_E_Service_List');?></a>
				 <a href="<?=base_url('admin/c_case/opponent_list');?>" class="btn btn-info"><?php echo $this->lang->line('Opponent_List');?></a>

                            </div>

                        </div>

               

                    </div>




                    <div class="m_datatable m-datatable m-datatable--default m-datatable--loaded" style="">

                    <div class="table-responsive">
                        <table class="lp-theme-table lp-large-theme" id="m_datatable">
                            <thead>
                            <tr class="netTr" style="text-align:left;">
						<th class="sortable"><?php echo $this->lang->line('Serial_No');?><img class="sortIcon" src="../../assets/images/img/arrow_up1.svg" height="18px"></th>
                        <th class="sortable"><?php echo $this->lang->line('Name');?><img class="sortIcon" src="../../assets/images/img/arrow_up1.svg" height="18px"></th>
                        <th class="sortable"><?php echo $this->lang->line('Note');?><img class="sortIcon" src="../../assets/images/img/arrow_up1.svg" height="18px"></th>
						<th class="sortable"><?php echo $this->lang->line('Phone');?><img class="sortIcon" src="../../assets/images/img/arrow_up1.svg" height="18px">	</th>
                        <th class="sortable"><?php echo $this->lang->line('Lawyer');?><img class="sortIcon" src="../../assets/images/img/arrow_up1.svg" height="18px"></th>
						<th class="sortable"><?php echo $this->lang->line('identification_types');?><img class="sortIcon" src="../../assets/images/img/arrow_up1.svg" height="18px"></th>
                        <th class="sortable"><?php echo $this->lang->line('Opponent_Number');?><img class="sortIcon" src="../../assets/images/img/arrow_up1.svg" height="18px"></th>
 
                            </tr>
                            </thead>
                            <tbody>
   <?php $count=0;
                       foreach($data as $Padding_cus) { $count++ ?>
                        <tr class="" style="text-align:left;">
                        <?php $serial_number = sprintf("#%02d", $count); ?>
                        <td data-sort="<?= $count - 1 ?>"><?= $serial_number ?></td>
                        <td><?= $Padding_cus['opponent_full_name'] ?></td>
                        <td><?= $Padding_cus['opponent_note'] ?></td>
                        <td><?= $Padding_cus['opponent_phone'] ?></td>
                        <td><?= $Padding_cus['opponent_lawyer'] ?></td>
                        <td><?= $Padding_cus['opponent_identification_types'] ?></td>
                        <td style="text-align:left;"><?= $Padding_cus['opponent_number'] ?></td>
                        
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

        $(document).ready(function() {
           $('#msg').hide();
          $('#customers-table').DataTable();
        } );
    </script>

  <script type="text/javascript">

$('.approve_customer').click(function(){
  var id=$(this).attr("id");
  var url="<?=base_url('admin/customer/approve_customer');?>";
   
      $.ajax({
    type:'ajax',
    method:'post',
    url:url,
    data:{"id" : id},

    success:function(data){
       $('#msg').show();
         $('#msg').html(data);
         $('.hide'+id).hide(200);
      },
      error:function(){
         $('#msg').show();
       $('#msg').html('approve failed');
      },
  });
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