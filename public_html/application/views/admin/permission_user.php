<?php include "header.php";?>
<div class="breadcrumbs">
	<div class="col-sm-4">
		<div class="page-header float-left">
			<div class="page-title">
				<h1> User </h1>
			</div>
		</div>
	</div>
	<div class="col-sm-8">
		<div class="page-header float-right">
			<div class="page-title">
				<ol class="breadcrumb text-right">
					<li class="active">Dashboard/Add User</li>
				</ol>
			</div>
		</div>
	</div>
</div>
<div class="col-md-12">
	<?php echo form_open_multipart('admin/permission/user_store_permission',['id'=>'permission']);?>
	<div class="card">
		<div class="card-header"><strong>User Info</strong><small></small></div>
		<div class="card-body card-block">
	
<input type="hidden" value="2"  name="role_id">
			<div class="form-group col-sm-6">
		  		<label for="User name" class=" form-control-label">User Name</label>
		  		<?= form_input(['name'=>'name','class'=>'form-control','value'=>'']);?>
		  		<div class="form-error"><?= form_error('name'); ?></div>
		  	</div>
			<div class="form-group col-sm-6">
		  		<label for="user_type" class=" form-control-label">User stauts</label>
		  		<select name="user_type" id="user_type" class="form-control" required >
		  			<option value="">Please Select status</option>
		  			<option value="1">Active</option>
		  			<option value="0">In Active</option>
		  		</select>
		  	</div>
			<div class="form-group col-sm-6">
		  		<label for="email" class=" form-control-label">Email</label>
		  		<?= form_input(['name'=>'email','class'=>'form-control','value'=>'']);?>
		  		<div class="form-error"><?= form_error('email'); ?></div>
		  	</div>
			<div class="form-group col-sm-6">
		  		<label for="phone" class=" form-control-label">Phone</label>
		  		<?= form_input(['name'=>'phone','class'=>'form-control','value'=>'']);?>
		  		<div class="form-error"><?= form_error('phone'); ?></div>
		  	</div>
		<div class="form-group col-sm-6">
			<label for="employeetype" class=" form-control-label">Employee Type</label>
			<select name="employee_type" id="employee_type" class="form-control">
				<option value="">Please select</option>
				<option <?php if(set_value('employee_type')=="temporary"){ echo "selected=selected";} ?> value="temporary">Temporary</option>
				<option <?php if(set_value('employee_type')=="longterm"){ echo "selected=selected";} ?> value="longterm">Long Term</option>
					<option <?php if(set_value('employee_type')=="other"){ echo "selected=selected";} ?> value="other">Other</option>
			</select>
		
		</div>
<div class="form-group col-sm-6">

			<label for="department" class="form-control-label">Department</label>
			<select name="department_id" id="department_id" class="form-control" >
				<option>Please select</option>
				<?php
				foreach($dep as $department) {?>
					<option  <?php if(set_value('department_id')==$department['id']){ echo "selected=selected";} ?>  value="<?= $department['id'] ?>"><?= $department['d_name'] ?></option>
			<?php	} ?>
				
				<option value="other">Other</option>
			</select>
			 
			
		</div>
			<div class="form-group col-sm-6">
		  		<label for="password" class=" form-control-label">Password</label>
		  		<?= form_input(['name'=>'password','class'=>'form-control','value'=>'']);?>
		  		<div class="form-error"><?= form_error('password'); ?></div>
		  	</div>
			<div class="form-group col-sm-6">
		  		<label for="confirm_password" class=" form-control-label">Confirm Password</label>
		  		<?= form_input(['name'=>'confirm_password','class'=>'form-control','value'=>'']);?>
		  		<div class="form-error"><?= form_error('confirm_password'); ?></div>
		  	</div>
		</div>
		<div class="card-header"><strong>Permissions</strong><small></small></div>
		<div class="card-body card-block">
		  	<div class="form-group col-sm-12">
				<?php
				$count = count($permission);
				foreach ($permission as $pm) {?>
				<div>
					<label for="clients" class="form-control-label perlable"><?php echo $pm['name'];?>:</label>
					<input type="checkbox" value="1" id="1<?php echo $pm['id'];?>" class="sublab" name="pm[<?php echo $pm['id'];?>][]">Add 
					<input type="checkbox" value="2" id="2<?php echo $pm['id'];?>" class="sublab" name="pm[<?php echo $pm['id'];?>][]">Modify
					<input type="checkbox" value="3" id="3<?php echo $pm['id'];?>" class="sublab" name="pm[<?php echo $pm['id'];?>][]">Search
					<input type="checkbox" value="4" id="4<?php echo $pm['id'];?>" class="sublab" name="pm[<?php echo $pm['id'];?>][]"> Report 
					<input type="checkbox" value="5" id="5<?php echo $pm['id'];?>" class="sublab" name="pm[<?php echo $pm['id'];?>][]">Save
					<input type="checkbox" value="6" id="6<?php echo $pm['id'];?>" class="sublab" name="pm[<?php echo $pm['id'];?>][]">Defeat
					<input type="checkbox" value="7" id="7<?php echo $pm['id'];?>" class="sublab" name="pm[<?php echo $pm['id'];?>][]">Cancel 
					<?php if($pm['id'] == 3 || $pm['id'] == 4 || $pm['id'] == 5 || $pm['id'] == 6|| $pm['id'] == 10|| $pm['id'] == 18 ) {?>
					<input type="checkbox" value="8" id="8<?php echo $pm['id'];?>" class="sublab" name="pm[<?php echo $pm['id'];?>][]">Reminders & Alerts
					<?php } ?>
				</div>
				<?php } ?>
			</div>
		</div>
		<div class="card-footer">
			<?php 
			 	echo form_submit(['id'=>'user_permissions','value'=>'Submit','class'=>'btn btn-primary btn-lg']);
			?>
			<?php 
			 	echo form_reset(['id'=>'reset','value'=>'Reset','class'=>'btn btn-danger btn-lg']);
			?>
		</div>
	</div>
	<?php form_close(); ?>
</div>
<p id="msg"></p>
<?php include "footer.php";?>
