 <?php include "header.php";?>
        <div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>Appoinment List </h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                           <li class="active">Dashboard/Appoinment List </li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
			<div class="card">
				<div class="card-header">
					<strong class="card-title">Appoinment List </strong>
				</div>
				<div class="card-body">
                  <table id="m_datatable" class="table table-striped table-bordered">
                    <thead>
                      <tr>
                        <th>Sr.no</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Contact No.</th>
                        <th>Consenting Type</th>
                      </tr>
                    </thead>
                    <tbody>

                      <?php $count = 1;?>
                      <?php foreach ($data as $data) {?>
                      <tr>
                        <td><?=$count++?></td>
                        <td><?=$data['name']?></td>
                        <td><?=$data['email']?> </td>
                        <td><?=$data['phone']?></td>
                        <td><?=$data['consenting_type']?></td>
                      </tr>
                    <?php }?>

                    </tbody>
                  </table>
                        </div>
                    </div>
            </div>

<?php include "footer.php";?>