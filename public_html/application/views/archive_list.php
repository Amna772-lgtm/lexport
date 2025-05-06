<?php $nvc = "white-nav sticky shrink modern hover4 radius-drop"; 
$pageTitle = $this->lang->line("Archives");
include('header.php');
?>
 </section>
<?php
include('header_welcome.php');
?>

<style>
    span.down_img{
    background: #1866a9;
    border-radius: 100%;
    align-items: center;
    width: 26px;
    height: 26px;
  }
  td {
    text-align: left !important;
  }
  .case-select-options.d-flex {
    column-gap: 11px;
}
  .case-select-options select {
    font-size: 14px;
    line-height: 20px;
    font-weight: 500;
    color:rgb(140, 138, 138);
    width: 170px;
    height: 30px;
    border-radius: 4px;
    padding: 4px 6px;
    border: 0.5px solid rgb(140, 138, 138);
}
.filter_btn {
    gap: 5px;
}
</style>
<!-- END: Left Aside -->
<div class="m-grid__item m-grid__item--fluid m-wrapper">

<?php 
                    $c = isset($_POST['file_type'])?$_POST['file_type']:''; 
                    $case_id = isset($_POST['case_id'])?$_POST['case_id']:''; 
                    echo form_open("front/archive_list",['id'=>'archive']); 
                    ?>
    <!-- END: Subheader -->
    <div class="m-content">
        <!--begin::Portlet-->
        <div class="m-portlet lp-theme-card bg-transparent">
            <div class="m-portlet__head">
                <div class="m-portlet__head-caption">
                    <div class="theme-new-nav-menu">
                        <h3 class="m-portlet__title" style="margin-right: 30px; font-size:20px !important;">
                            <?php echo $this->lang->line('Archives');?>
                        </h3>
                        <div class="case-select-options d-flex">
                            <select name="case_id" id="case_id" class="form-select"  >
                                <option  value=""><?php echo $this->lang->line('Select_E_Service_No');?></option>
                                <?php foreach($case_data as $cd) { ?>
                                        <option value="<?= $cd['doc_id']; ?>"<?php if($case_id==$cd['doc_id']) echo "selected=selected";?>><?= $cd['case_number']; ?></option>
                                <?php } ?>
                            </select>
                            <select id="" class="form-select" name="file_type"><option  value=""><?php echo $this->lang->line('File_Type');?></option>
                                <option value="1" <?php if($c==1) echo "selected=selected";?>><?php echo $this->lang->line('Documentation');?></option>
                                <option value="2" <?php if($c==2) echo "selected=selected";?>><?php echo $this->lang->line('Data');?></option>
                                <option value="3" <?php if($c==3) echo "selected=selected";?>><?php echo $this->lang->line('Contract');?></option>
                                <option value="4" <?php if($c==4) echo "selected=selected";?>><?php echo $this->lang->line('Report');?></option>
                                <option value="6" <?php if($c==6) echo "selected=selected";?>><?php echo $this->lang->line('Procuation');?></option>
                                <option value="7" <?php if($c==7) echo "selected=selected";?>><?php echo $this->lang->line('Referrals');?></option>
                            </select>
                            <div class="d-flex filter_btn"><?php $find=$this->lang->line('Find'); echo form_submit(['id'=>'addcustomer','value'=>$find,'class'=>'btn btn-primary ', 'style'=>'padding: 0 15px;']); ?><a href="" class="btn btn-danger" style="padding: 4px 15px;"  ><?php echo $this->lang->line('Reset');?></a>
                            </div>
                            </form>
                        </div>
                    </div>
                        
                </div>
            </div>
            <div class="m-portlet__body">
                <div class="m_datatable m-datatable m-datatable--default m-datatable--loaded" style="">
                    <div class="table-responsive">
                        <table class="lp-theme-table lp-large-theme m_datatable" id="m_table_1">
                            <thead>
                            <tr class="netTr" style="text-align:left;">
                                    <th><?php echo $this->lang->line('Thumb');?></th>
                                    <th><?php echo $this->lang->line('File_Name');?></th>
                                    <th><?php echo $this->lang->line('File_Type');?></th>
                                    <th class="sortable"><?php echo $this->lang->line('Uploaded_Date');?></th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                    $count=1;
                                    foreach($data as $archives){

                                    if($archives['user_id'] != 0 ){
                                    $user = $this->db->select('name')->where('id',$archives['user_id'])->get('users')->row();
                                    } else {
                                    $user = $this->db->select('name')->where('id',$archives['customer_id'])->get('users')->row();
                                    }

                                ?>
                            
                                    <tr class="hide<?php echo $archives['user_id'] ?>" style="text-align: left;">
                                        <td>
                                            <?php    $src = base_url()."uploads/case_file/".$archives['name'];
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
                                                    echo "<div class='datafiles'> <img src='../../assets/images/img/file-icon.svg'> </div>";
                                                }
                                            ?></a>
                                        </td>
                                        <td><?= $archives['name'] ?></td>
                                        <td><?php echo $ext; ?></td>
                                        <td>
                                        <?= date('Y-m-d', strtotime($archives['created'])) ?>
                                        </td>
                                        <td  class="action">
                                            <span style="overflow: visible; position: relative;">
                                                <a href="<?= $src ?>" class="m-portlet__nav-link btn m-btn m-btn--hover-warning m-btn--icon m-btn--icon-only m-btn--pill" title="<?php echo $this->lang->line('Download');?>">
                                                <span class="down_img d-flex justify-content-center">
                                                    <img src="<?php echo base_url('assets/images/img/vertical_align_bottom.svg'); ?>" 
                                                        alt="Download" width="20" height="20">
                                                </span>
                                                </a>
                                            </span>
                                        </td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                    
                    <!--End::Section-->
                </div>
            </div>
        </div>
    </div>
</div>


<?php

include('footer.php');

?>
<script>
$(document).ready(function () {
    var itemsPerPage = 10; // Change this to your desired rows per page
    var currentPage = 1;
    var $tableRows = $('#m_table_1 tbody tr');
    var $paginationContainer = $('<div id="pagination" class="pagination-wrapper text-center mt-3"></div>');
    $('#m_table_1').after($paginationContainer);

    function showTablePage(page) {
        var start = (page - 1) * itemsPerPage;
        var end = start + itemsPerPage;

        $tableRows.hide().slice(start, end).show();
        updateTablePagination();
    }

    function updateTablePagination() {
    var totalPages = Math.ceil($tableRows.length / itemsPerPage);
    var paginationHtml = '';

    if (totalPages > 1) {
        // Left arrow
        paginationHtml += `<a href="#" class="page-link prev" data-page="${currentPage - 1}" 
            ${currentPage === 1 ? 'style="pointer-events:none;opacity:0.5;"' : ''}>
            &lt;
        </a> `;

        // Page numbers
        for (var i = 1; i <= totalPages; i++) {
            if (i <= 3 || i === totalPages) { // Show first 3 and last
                paginationHtml += `<a href="#" class="page-link ${i === currentPage ? 'active' : ''}" data-page="${i}">${i}</a> `;
            } else if (i === 4) {
                paginationHtml += `... `;
            }
        }

        // Right arrow
        paginationHtml += `<a href="#" class="page-link next" data-page="${currentPage + 1}" 
            ${currentPage === totalPages ? 'style="pointer-events:none;opacity:0.5;"' : ''}>
            &gt;
        </a>`;
    }

    $('#pagination').html(paginationHtml);
}


    $(document).on('click', '.page-link', function (e) {
        e.preventDefault();
        var newPage = parseInt($(this).data('page'));
        var totalPages = Math.ceil($tableRows.length / itemsPerPage);
        if (!isNaN(newPage) && newPage >= 1 && newPage <= totalPages) {
            currentPage = newPage;
            showTablePage(currentPage);
        }
    });

    showTablePage(currentPage);
});
</script>