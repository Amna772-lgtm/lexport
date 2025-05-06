 <?php include "header.php"; ?>
 <div class="breadcrumbs">
   <div class="col-sm-4">
     <div class="page-header float-left">
       <div class="page-title">
         <h1>Close List</h1>
       </div>
     </div>
   </div>
   <div class="col-sm-8">
     <div class="page-header float-right">
       <div class="page-title">
         <ol class="breadcrumb text-right">
           <li class="active">Dashboard/Close List</li>
         </ol>
       </div>
     </div>
   </div>
 </div>

 <div class="col-xl-12">
   <div id="msg" class="sufee-alert alert with-close alert-success alert-dismissible fade show success"></div>
   <div class="card">
     <div class="card-header">
       <strong class="card-title">
         <div class="employeeFilterTop">

           <div class="employeeFilter">
             <strong class=" ">
               <a class="<?php if ($this->uri->segment(3) == "list_session_responsible") echo "btn btn-primary";
                          else {
                            echo "btn";
                          } ?>" href="<?= base_url('admin/appoinment/list_session_responsible'); ?>">Responsible Employee</a> <a href="<?= base_url('admin/appoinment/list_session_follow_up'); ?>" class="<?php if ($this->uri->segment(3) == "list_session_follow_up") echo "btn btn-primary";
                                                                                                                                                                                                                                                                                                                else {
                                                                                                                                                                                                                                                                                                                  echo "btn";
                                                                                                                                                                                                                                                                                                                } ?>">Following Employee</a> <a class="<?php if ($this->uri->segment(3) == "list_pending_appoinment") echo "btn btn-primary";
                                                                                                                                                                                                                                                                                                                                                                                                                                                                else {
                                                                                                                                                                                                                                                                                                                                                                                                                                                                  echo "btn";
                                                                                                                                                                                                                                                                                                                                                                                                                                                                } ?>" href="<?= base_url('admin/appoinment/list_pending_appoinment'); ?>">Pending</a> <a class="<?php if ($this->uri->segment(3) == "list_session_close_mission") echo "btn btn-primary";
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                      else {
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                        echo "btn";
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                      } ?>" href="<?= base_url('admin/appoinment/list_session_close_mission'); ?>">Close Mission</a> </strong>
           </div>

         </div>
       </strong>
     </div>
     <div class="card-body">
       <table id="m_datatable" class="table table-striped table-bordered">
         <thead>
           <tr>
             <th>Sr No.</th>
             <th>Client Name</th>
             <th>Date</th>
             <th>Time</th>
             <th>Client Type</th>
             <th>Opponent Name</th>
             <th>Case Title</th>
             <th>Incoming Entry</th>
             <th>Outgoing Entry</th>
             <th>Court Name</th>
             <th>Judicial Circuit</th>
             <th>Responsible Employee</th>
             <th>Requirement</th>
             <th>Action</th>
           </tr>
         </thead>
         <tbody>
           <?php
            $count = 1;
            foreach ($data as $appoinment) {  ?>
             <tr class="hide<?php echo $appoinment['id'] ?>">
               <td><?= $count++ ?></td>
               <td><?= $appoinment['client_name'] ?></td>
               <td><?= $appoinment['session_date'] ?></td>
               <td><?= $appoinment['session_time'] ?></td>
               <td><?php $row = $this->db->select('*')->where('client_file_number', $appoinment['client_file_number'])->get('customers')->row();
                    if ($row) {
                      echo $row->type_of_customer;
                    } ?></td>
               <td><?= $appoinment['opponent_full_name'] ?></td>
               <td><?= $appoinment['case_title'] ?></td>
               <td><?= $appoinment['import_entry_no'] ?></td>
               <td><?= $appoinment['export_entry_no'] ?></td>
               <td><?= $appoinment['court_name'] ?></td>
               <td><?= $appoinment['department'] ?></td>
               <td><?= getEmployeeName($appoinment['responsible_employee']) ?></td>
               <td><?= $appoinment['note'] ?></td>
               <td class="action"><a href="#" title="Close" class=" btn btn-danger">Close</a></td>
             </tr>
           <?php } ?>
         </tbody>
       </table>
     </div>
   </div>

 </div>

 <?php include "footer.php"; ?>

 <script type="text/javascript">
   <?php if (isset($datas[3][3]) && $datas[3][3] == 1) { ?>
     $('.dataTables_filter').show();
   <?php } else { ?>
     $('.dataTables_filter').hide();
   <?php } ?>

   $(document).ready(function() {
     $('#msg').hide();
     $('#customers-table').DataTable();
   });

   $('.delete_appoinment').click(function() {

     var id = $(this).attr("id");

     var url = "<?= base_url('admin/appoinment/delete_appoinment'); ?>";
     bootbox.confirm("Are you sure?", function(result) {
       if (result) {
         $.ajax({
           type: 'ajax',
           method: 'post',
           url: url,
           data: {
             "id": id
           },
           success: function(data) {
             $('#msg').show();
             $('#msg').html(data);
           },
         });
         $('.hide' + id).hide(200);
         return true;
       } else {
         $('#msg').show();
         $('#msg').html('delete failed');
       }
     })
   });
 </script>