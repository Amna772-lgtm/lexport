 <?php include "header.php";?>
        <div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>Dashboard</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                           <li class="active">Dashboard/Employer/Padding Alert</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

   	<div class="col-xl-12">
			<div class="card">
				<div class="card-header">
					<strong class="card-title">Pending Employee</strong> <strong class="float-right">
					<a class="btn btn-success"href="<?=base_url('admin/c_case/padding_case');?>">Pending E-Service</a>
				
<a class="btn btn-info"href="<?=base_url('admin/admin/all_users');?>">Registered List</a>
<a href="<?=base_url('admin/c_case/reject_case_list');?>" class="btn btn-danger">Reject E-Service List</a><a href="<?=base_url('admin/c_case/opponent_list');?>" class="btn btn-info">Opponent List</a></strong>  
				</div>
				<div class="card-body">
                  <table id="m_datatable" class="table table-striped table-bordered">
                    <thead>
                      <tr>
                        <th>No.</th>
                        <th>Name</th>
                        <th>Department</th>
						<th>Employee Type</th>
                        <th>Request Type</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
              <?php $count=1;
                   foreach($list as $Padding_emp) { ?>
                      <tr>
                        <td><?= $count++ ?></td>
                        <td><?= $Padding_emp['name'] ?></td>
                        <td><?= $Padding_emp['d_name'] ?></td>
                        <td><?= $Padding_emp['employee_type'] ?></td>
                        <td><?php if($Padding_emp['add_edit']==1)
                        {?>
                             <span class="badge badge-pill badge-warning">Request for Edit</span></td>
                      <?php  } 
                        else
                        { ?>
                          <span class="badge badge-pill badge-primary">Request for add</span></td>
                     <?php  }  ?>
                        <td class="action">

              <?php echo anchor(base_url("admin/employee/approve_employee/{$Padding_emp['user_id']}"),'Approve',['class'=>'btn btn-success fa fa-check']); ?>&nbsp;
              <?php echo anchor(base_url("admin/employee/approve_employee/{$Padding_emp['user_id']}"),'view',['class'=>'btn btn-info']); ?>
            </td>
                      </tr>
              <?php } ?>
                    </tbody>
                  </table>
                        </div>
                    </div>
            </div>

<?php include "footer.php";?>

    <script type="text/javascript">

        $(document).ready(function() {
          $('#customers-table').DataTable();
        } );
    </script>