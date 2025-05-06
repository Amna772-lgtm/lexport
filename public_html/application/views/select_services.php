<?php include "header.php";?>
<div class="head-bread">
    <div class="heading-bread">
        <div class="container">
        <h3>Select Service</h3>
    	<p>Choose one of our distinguished services, which is supervised by a team of scientific and practical expertise, to assist in providing all legal services with high efficiency.</p>
        </div>
    </div>
</div>

<div class="container">
	<div class="service-block">
	     <div class="websuiteblock">
            <h2><i class="fa fa-balance-scale fa-2x" aria-hidden="true"></i><span>Thank you for choosing "Website Suit" </span></h2>
            <p>Choose one of our legal services below. For more information, please see the instructions below.</p>
            </div>
            <div class="service-block-inner">
    		<?php foreach ($services as $service) {?>
            <div class="form-group col-md-4">
				<h3><?=$service['name'];?></h3>
					<p><?=$service['description'];?></p>
					<hr>
						<a href="<?=base_url('front/selected_services/new/' . $service['id']);?>" class="btn btn-primary btn-primary">Apply Now</a>
        	</div>
			<?php	}?>
        </div></div>
</div>

<?php

include "footer1.php";?>