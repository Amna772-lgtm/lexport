<?php
include('header.php');

?>

<style>
.servive-v2 > * {
    font-family: Roboto;
}

.servive-v2 i.fa-solid {
    font-family: FontAwesome !important;
    font-weight: 300;
    font-size: 16px;
    font-style: normal;
    /* font: normal normal normal 14px/1 FontAwesome !important; */
}

.servive-v2 .add-service-button,
.servive-v2 .service-info-title {
    font-weight: 500;
    font-size: 14px;
    line-height: 20px;
    letter-spacing: 0%;
}

.servive-v2 .add-service-button {
    text-align: center;
    background-color: #1866A9;
    padding: 10px 16px;
    border-radius: 100px;
    column-gap: 8px;

}

.servive-v2 .theme-new-nav-menu.justify-content-between {
    padding: 15px 34px 14px 21px !important;
}

.servive-v2 .service-select-options.d-flex {
    column-gap: 11px;
}

.servive-v2 .service-select-options select {
    font-size: 12px;
    line-height: 20px;
    font-weight: 500;
    color: #33333380;
    width: 147px;
    height: 28px;
    border-radius: 4px;
    padding: 4px 6px;
    border: 0.5px solid #1B2A394D;
}

.servive-v2 .services-wrapper {
    min-height: 522px;
    border-radius: 20px;
    background-color: #ffffff5e;
    box-shadow: 0px 10px 15px 0px #0C66E40D;

}

.servive-v2 .services-inner-section.row {
    padding: 10px 4px;
    margin-left: 0;
    margin-right: 0;
}

.servive-v2 .services-inner-section.row .column {
    padding: 20px;
}

.servive-v2 .service-detail-section {
    height: 100%;
    border-radius: 15px;
    border-width: 1px;
    background-color: #ffffff;
    border: 1px solid #FFFFFF;
    box-shadow: 0px 7px 14px 1px #3962FF0F;
    padding: 16px 13px 13px 13px;
}

.servive-v2 .service-info {
    border-inline-start: 3px solid #1866A9;
    padding-inline-start: 6px;
    margin-bottom: 12px;
}

.servive-v2  .service-detail.row {
    margin-inline: 0;
}

.servive-v2 .service-detail.row .col-4 {
    padding: 0;
    padding-inline-end: 5px;
}

.servive-v2 .service-detail-settings {
    width: 13px;
    height: 3px;
    /* top: 24px; */
    right: 25px;
    cursor: pointer;
}

.servive-v2 .body_rtl .service-detail-settings {
    right: unset;
    left: 25px;
}

.servive-v2 .service-detail-settings svg {
    fill: #333333;
}

.servive-v2 .service-tag {
    font-weight: 500;
    font-size: 9px;
    line-height: 18.5px;
    letter-spacing: 0px;
    vertical-align: middle;
    background-color: #3333331A;
    padding: 3px 4px;
    color: #333;
    border-radius: 4px;
}

.servive-v2 .service-info-title {
    vertical-align: middle;
    color: #333333;
}

.servive-v2 span.label-title {
    font-size: 8px;
    line-height: 18.5px;
    letter-spacing: 0px;
    vertical-align: middle;

}

.servive-v2 span.detail-data {
    font-weight: 500;
    font-size: 10px;
    line-height: 18.5px;
    letter-spacing: 0px;
    vertical-align: middle;

}
#add-service-modal .modal-dialog.add-service-modal{
            max-width: 1000px;
        }


.servive-v2 .paginate_button.page-item a:hover {
  color: #ffffff !important;
}


</style>


<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<div class="m-grid__item m-grid__item--fluid m-wrapper">

    <div style="position:absolute;">
        <img class="custom-search-icon" src="../../../assets/images/img/search-icon.svg" alt="Search">
        <input type="text" id="userSearch" class="form-control" placeholder="Search Client, E-Services........">
    </div>
    <div class="m-content servive-v2">
        <div class="m-portlet lp-theme-card bg-transparent">
            <div id="custom-search-container"></div>
            <div class="m-portlet__head">
                <div class="m-portlet__head-caption">
                    <div class="theme-new-nav-menu justify-content-between">
                        <div class="service-select-options d-flex">
                            <select id="select-type" class="form-select select-type">
                                <option value=""><?php echo $this->lang->line('Select_Type');?></option>
                                <?php 
                                $serviceTypes = []; 
                                foreach ($list as $cases) { 
                                    $serviceType = getServiceType($cases['service_types']);
                                    if (!in_array($serviceType, $serviceTypes)) {
                                        $serviceTypes[] = $serviceType;
                                        echo "<option value='$serviceType'>$serviceType</option>";
                                    }
                                }
                                ?>
                            </select>

                            <select id="select-client" class="form-select select-client">
                                <option value=""><?php echo $this->lang->line('Select_Client');?></option>
                                <?php 
                                $clients = []; 
                                foreach ($list as $cases) { 
                                    $clientName = getEmployeeName($cases['customers_id']);
                                    if (!in_array($clientName, $clients)) {
                                        $clients[] = $clientName;
                                        echo "<option value='$clientName'>$clientName</option>";
                                    }
                                }
                                ?>
                            </select>
                        </div>
                        <div>
                            <a class="btn btn-primary create-buttons" href="<?=base_url('admin/c_case/padding_case');?>" >
                                <?= $this->lang->line('Pending_E_Service') ?>
                            </a>
                        </div>

                    </div>
                </div>
            </div>

            <div class="m-portlet__body">
                <div class="services-wrapper">
                    <div class="services-inner-section row align-items-stretch">
                        <?php foreach ($list as $case) { ?>
                            <?php if($case['is_reject'] == 0) { ?>
                                <div class="column col-12 col-sm-6 col-xl-4 service-card" 
                                        data-type="<?= getServiceType($case['service_types']); ?>" 
                                        data-client="<?= getEmployeeName($case['customers_id']); ?>">

                                    <div class="service-detail-section position-relative">
                                        <div class="service-detail-settings position-absolute">
                                        <a href=<?= base_url("admin/c_case/view_case/{$case['id']}") ?>>
                                            <img class="dot-icon" src="../../../assets/images/img/dot.svg" alt="dots">
                                        </a>
                                        </div>
                                        <div class="service-info" style="border-color: #1866A9">
                                            <div class="service-info-title">
                                                <span><?= getEmployeeName($case['customers_id']); ?></span>
                                            </div>
                                            <div class="service-info-tages">
                                                <span class="service-tag" style="margin-right:5px;"><?= getCaseType($case['case_type']); ?></span>
                                                <span class="service-tag"><?= $case['client_file_number']; ?></span>
                                            </div>
                                        </div>
                                        <div class="service-detail row">
                                            <div class="col-4 d-flex flex-column">
                                                <span class="label-title"><?php echo $this->lang->line('E_Service_Name');?></span>
                                                <span class="detail-data"><?= getServiceType($case['service_types']); ?></span>
                                            </div>
                                            <div class="col-4 d-flex flex-column">
                                                <span class="label-title"><?php echo $this->lang->line('Responsible_Employee');?></span>
                                                <span class="detail-data"><?= getEmployeeName($case['responsible_employee']); ?></span>
                                            </div>
                                            <div class="col-4 d-flex flex-column">
                                                <span class="label-title"><?php echo $this->lang->line('Due_Date');?></span>
                                                <span class="detail-data"><?= $case['case_date']; ?></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>
                        <?php } ?>
                    </div>
                </div>
                
            </div>
            <div id="pagination" class="pagination-wrapper text-center mt-3"></div>
        </div>
    </div>
</div>

<script>

$(document).ready(function () {
    var itemsPerPage = 9;
    var currentPage = 1;
    var cards = $('.service-card').toArray();

    function showPage(page) {
        var start = (page - 1) * itemsPerPage;
        var end = start + itemsPerPage;

        $('.service-card').hide();
        $(cards.slice(start, end)).show();

        updatePagination();
    }

    function updatePagination() {
        var totalPages = Math.ceil(cards.length / itemsPerPage);
        var paginationHtml = '';

        if (totalPages > 1) {
            var isRTL = $('html').attr('dir') === 'rtl';

            paginationHtml += `<a href="#" class="page-link prev" data-page="${currentPage - 1}" 
                ${currentPage === 1 ? 'style="pointer-events:none;opacity:0.5;"' : ''}>
                ${isRTL ? '&gt;' : '&lt;'}
            </a> `;

            if (totalPages <= 5) {
                for (var i = 1; i <= totalPages; i++) {
                    paginationHtml += `<a href="#" class="page-link ${i === currentPage ? 'active' : ''}" data-page="${i}">${i}</a> `;
                }
            } else {
                paginationHtml += `<a href="#" class="page-link ${currentPage === 1 ? 'active' : ''}" data-page="1">1</a> `;
                if (currentPage > 3) {
                    paginationHtml += `<span class="ellipsis">...</span> `;
                }

                var startPage = Math.max(2, currentPage - 1);
                var endPage = Math.min(totalPages - 1, currentPage + 1);

                for (var i = startPage; i <= endPage; i++) {
                    paginationHtml += `<a href="#" class="page-link ${i === currentPage ? 'active' : ''}" data-page="${i}">${i}</a> `;
                }

                if (currentPage < totalPages - 1) {
                    if (currentPage < totalPages - 2) {
                        paginationHtml += `<span class="ellipsis">...</span> `;
                    }
                    paginationHtml += `<a href="#" class="page-link" data-page="${totalPages}">${totalPages}</a> `;
                }
            }

            paginationHtml += `<a href="#" class="page-link next" data-page="${currentPage + 1}" 
                ${currentPage === totalPages ? 'style="pointer-events:none;opacity:0.5;"' : ''}>
                ${isRTL ? '&lt;' : '&gt;'}
            </a>`;
        }

        $('#pagination').empty().append($(paginationHtml));
    }



    $(document).on('click', '.page-link', function (e) {
        e.preventDefault();
        var newPage = parseInt($(this).data('page'));
        if (!isNaN(newPage) && newPage > 0 && newPage <= Math.ceil(cards.length / itemsPerPage)) {
            currentPage = newPage;
            showPage(currentPage);
        }
    });

    function filterCards() {
        var selectedType = $('#select-type').val().toLowerCase();
        var selectedClient = $('#select-client').val().toLowerCase();
        var searchQuery = $('#userSearch').val().toLowerCase();

        cards = $('.service-card').filter(function () {
            var cardType = $(this).attr('data-type').toLowerCase();
            var cardClient = $(this).attr('data-client').toLowerCase();
            var cardText = $(this).text().toLowerCase();

            var typeMatch = (selectedType === "" || cardType.includes(selectedType));
            var clientMatch = (selectedClient === "" || cardClient.includes(selectedClient));
            var searchMatch = (searchQuery === "" || cardText.includes(searchQuery));

            return typeMatch && clientMatch && searchMatch;
        }).toArray();

        currentPage = 1;
        showPage(currentPage);
    }

    $('#select-type, #select-client, #userSearch').on('input change', filterCards);

    showPage(currentPage);
});

document.addEventListener('DOMContentLoaded', function () {
    var selectElement = document.getElementById('select-client');
    
    // Get the first option (Select Client) and save it
    var firstOption = selectElement.querySelector('option[value=""]');
    
    // Convert the other options into an array (exclude the first option)
    var optionsArray = Array.from(selectElement.options).filter(function(option) {
        return option !== firstOption;
    });
    
    // Sort options array using localeCompare (locale-aware sorting)
    optionsArray.sort(function(a, b) {
        return a.text.localeCompare(b.text, 'ar', { sensitivity: 'base' }); // 'ar' for Arabic locale
    });

    // Clear the select element and re-add the first option at the top
    selectElement.innerHTML = '';
    selectElement.appendChild(firstOption);

    // Append the sorted options back to the select
    optionsArray.forEach(function(option) {
        selectElement.appendChild(option);
    });
});

</script>



<style>
.assignpopup .form-control {
    float: left;
    margin: 5px 0px;
}

.calendars-popup {
    z-index: 99999 !important;
}
</style>
<?php include "footer.php";?>


<style>
.modal .modal-content .modal-header .close:before {
    content: "X";
    font-family: arial;
}

.modal .modal-content {
    background: #ffffff;
}

.col-md-12,
.col-md-6 {
    margin-bottom: 10px;
}

html[dir="rtl"] #pagination {
    direction: ltr;
    text-align: right;
}
html[dir="rtl"] .page-link {
    margin: 0 4px;
    float: right;
}

#pagination {
  margin-top: 15px;
}

.page-link {
  display: inline-block;
  padding: 6px 12px;
  margin: 0 4px;
  border: 1px solid #1866A9;
  border-radius: 4px;
  color: #1866A9;
  text-decoration: none;
  cursor: pointer;
}

.page-link.active {
  background-color: #1866A9;
  color: white;
}

.page-link:hover {
  background-color: #1866A9;
  color: white;
}

.ellipsis {
  padding: 6px 10px;
  color: #1866A9;
}

</style>