<?php include "header.php";?>
<div class="breadcrumbs">
	<div class="col-sm-4">
		<div class="page-header float-left">
			<div class="page-title">
				<h1>Add Employee</h1>
			</div>
		</div>
	</div>
	<div class="col-sm-8">
		<div class="page-header float-right">
			<div class="page-title">
				<ol class="breadcrumb text-right">
				<li class="active">Dashboard/Add Employee</li>

				</ol>
			</div>
		</div>
		
	</div>
</div>
<div class="col-md-12">

<!---**********************Permissions************************-->
<div class="card">
	<div class="card-header"><strong>Select User</strong><small></small></div>
	<div class="card-body card-block">
	    <select class="form-control"><option>User 1</option><option>User 2</option><option>User 3</option><option>User 4</option></select>
	</div>
</div>
<div class="card">
	<div class="card-header"><strong>Permissions</strong><small></small></div>
	<div class="card-body card-block">
	    
	<div>
		<label for="clients" class="form-control-label perlable">Clients:</label><input type="checkbox" class="sublab" name="pclients[]">Add <input type="checkbox" class="sublab" name="pclients[]">Modify<input type="checkbox" class="sublab" name="pclients[]">Search<input type="checkbox" class="sublab" name="pclients[]"> Report <input type="checkbox" class="sublab" name="pclients[]">Save<input type="checkbox" class="sublab" name="pclients[]">Defeat<input type="checkbox" class="sublab" name="pclients[]">Cancel 
	</div>
	<div>
		<label for="clients" class="form-control-label perlable">Cases:</label><input type="checkbox" class="sublab" name="pcase[]">Add <input type="checkbox" class="sublab" name="pcase[]">Modify<input type="checkbox" class="sublab" name="pcase[]">Search<input type="checkbox" class="sublab" name="pcase[]"> Report <input type="checkbox" class="sublab" name="pcase[]">Save<input type="checkbox" class="sublab" name="pcase[]">Defeat<input type="checkbox" class="sublab" name="pcase[]">Cancel
	</div>
	<div>
		<label for="clients" class="form-control-label perlable">Sessions Appointment:</label><input type="checkbox" class="sublab" name="psessionapp[]">Add <input type="checkbox" class="sublab" name="psessionapp[]">Modify<input type="checkbox" class="sublab" name="psessionapp[]">Search<input type="checkbox" class="sublab" name="psessionapp[]"> Report <input type="checkbox" class="sublab" name="psessionapp[]">Save<input type="checkbox" class="sublab" name="psessionapp[]">Defeat<input type="checkbox" class="sublab" name="psessionapp[]">Cancel <input type="checkbox" class="sublab" name="psessionapp[]">Reminders & Alerts 	
	</div>
	<div>
		<label for="clients" class="form-control-label perlable">Writings Appointment:</label><input type="checkbox" class="sublab" name="pwritingsapp[]">Add <input type="checkbox" class="sublab" name="pwritingsapp[]">Modify<input type="checkbox" class="sublab" name="pwritingsapp[]">Search<input type="checkbox" class="sublab" name="pwritingsapp[]"> Report <input type="checkbox" class="sublab" name="pwritingsapp[]">Save<input type="checkbox" class="sublab" name="pwritingsapp[]">Defeat<input type="checkbox" class="sublab" name="pwritingsapp[]">Cancel <input type="checkbox" class="sublab" name="pwritingsapp[]">Reminders & Alerts 
	</div>
	<div>
		<label for="clients" class="form-control-label perlable">Consultation Appointment:</label><input type="checkbox" class="sublab" name="pconsultationapp[]">Add <input type="checkbox" class="sublab" name="pconsultationapp[]">Modify<input type="checkbox" class="sublab" name="pconsultationapp[]">Search<input type="checkbox" class="sublab" name="pconsultationapp[]"> Report <input type="checkbox" class="sublab" name="pconsultationapp[]">Save<input type="checkbox" class="sublab" name="pconsultationapp[]">Defeat<input type="checkbox" class="sublab" name="pconsultationapp[]">Cancel <input type="checkbox" class="sublab" name="pconsultationapp[]">Reminders & Alerts
	</div>
	<div>
		<label for="clients" class="form-control-label perlable">Visiting Appointment:</label><input type="checkbox" class="sublab" name="pvisiting[]">Add <input type="checkbox" class="sublab" name="pvisiting app[]">Modify<input type="checkbox" class="sublab" name="pvisiting[]">Search<input type="checkbox" class="sublab" name="pvisiting[]"> Report <input type="checkbox" class="sublab" name="pvisiting[]">Save<input type="checkbox" class="sublab" name="pvisiting[]">Defeat<input type="checkbox" class="sublab" name="pvisiting[]">Cancel <input type="checkbox" class="sublab" name="pvisiting[]">Reminders & Alerts
	</div>
	</div>
	  <div class="card-footer">
	 
	  </div>
	</div>
</div><p id="msg"></p>
<?php include "footer.php";?>
<script type="text/javascript">
$('#dob, #start_date, #contract_date').datetimepicker({  format: 'yyyy-mm-dd',  minView: 2, pickTime: false, autoclose: true,startDate: new Date()});
</script>