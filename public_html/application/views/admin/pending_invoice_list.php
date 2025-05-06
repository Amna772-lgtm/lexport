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
                        <div class="m-portlet__head-title">
                            <h3 class="m-portlet__head-text">
                                Invoice list
                            </h3>
                        </div>
                    </div>
                </div>


                <div class="m-portlet__body theme-inner-form">


                    <div class="m_datatable m-datatable m-datatable--default m-datatable--loaded" style="">

                    <div class="table-responsive">
                                    <table class="lp-theme-table lp-large-theme" id="m_datatable">
                            <thead>
                            <tr class="netTr">
                                <th>Sr.No <br><i class="fa fa-arrow-up" style="font-size: 10px;font-weight: normal"></i><i class="fa fa-arrow-down" style="font-size: 10px;font-weight: normal"></i></th>
                                <th>Name <br><i class="fa fa-arrow-up" style="font-size: 10px;font-weight: normal"></i><i class="fa fa-arrow-down" style="font-size: 10px;font-weight: normal"></i></th>
                                <th>Service Type <br><i class="fa fa-arrow-up" style="font-size: 10px;font-weight: normal"></i><i class="fa fa-arrow-down" style="font-size: 10px;font-weight: normal"></i></th>
                                <th>Contact No. <br><i class="fa fa-arrow-up" style="font-size: 10px;font-weight: normal"></i><i class="fa fa-arrow-down" style="font-size: 10px;font-weight: normal"></i></th>
                                <th>Case No. <br><i class="fa fa-arrow-up" style="font-size: 10px;font-weight: normal"></i><i class="fa fa-arrow-down" style="font-size: 10px;font-weight: normal"></i></th>
                                <th>Client File Number <br><i class="fa fa-arrow-up" style="font-size: 10px;font-weight: normal"></i><i class="fa fa-arrow-down" style="font-size: 10px;font-weight: normal"></i></th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
 
				<?php $i=0; foreach ($case_list as $case){ $i++; ?>
				  <tr class="hide<?php echo $case['id'] ?>" style="text-align: center;">
                        <td><?= $i; ?></td>
                        <td><?= $case['client_name'] ?></td>
                        <td><?= getServiceType($case['service_types']) ?></td>
                        <td><?= getCustomerMobile($case['customers_id']) ?></td>
						<td><?= $case['case_number'] ?></td>
                        <td><?= $case['client_file_number'] ?> </td>
						<td class="action">          
							<span style="overflow: visible; position: relative;">
								<a href="<?php echo base_url();?>admin/finance/create_invoice/<?= $case['id'] ?>" class="m-portlet__nav-link btn m-btn m-btn--hover-warning m-btn--icon m-btn--icon-only m-btn--pill" title="">
									<i class="fa fa-plus"></i>
								</a>
							</span>
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
$(".assign_type").on("click", function() {
    var id=$(this).attr("id");
    $('#case_id').val(id);
})

<?php if(isset($datas[2][3]) && $datas[2][3] == 1){?>
  $('.dataTables_filter').show();
<?php }else{?>
  $('.dataTables_filter').hide();
<?php } ?>
$("#m_datatable").on("click", ".delete_case", function() {
var id=$(this).attr("id");
var url="<?= base_url('admin/c_case/delete_case'); ?>"; 
bootbox.confirm("Are you sure?", function(result){
if(result){
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

 $(document).on("click", ".modal-body", function () {
$('#start_date, #end_date').datetimepicker({  format: 'yyyy-mm-dd',  minView: 2, pickTime: false, autoclose: true,startDate: new Date()});
  $("#start_time,#end_time").datetimepicker({
    pickDate: false,
    minuteStep: 15,
    pickerPosition: 'bottom-right',
    format: 'HH:ii p',
    autoclose: true,
    showMeridian: true,
    startView: 1,
    maxView: 1,
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
</script> 