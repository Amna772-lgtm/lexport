<?php include "header.php";?>
<!DOCTYPE html>
<html>
<head>
	<title>Select Package</title>
</head>
<body>
	<section>
<div class="container">
	<div class="card-header"><h1>Select Package</h1></div>
	<div class="card-body card-block">
		<?php foreach ($package as $package) {?>
			<div class="form-group col-sm-6">
					<font color="green"><h3><?=$package['package_name'];?></h3></font>
					<hr>
					<h5>Amount=<?=$package['amount'];?></h5>
				<a href="<?=base_url('front/select_package/' . $package['id']);?>" class="btn btn-primary btn-lg">Select</a>
			</div>
		<?php }?>

	</div>
</div>
</section>
</body>
</html>
<?php include "footer1.php";?>