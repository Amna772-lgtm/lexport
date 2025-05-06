<?php include "header.php";?>
<div class="head-bread">
    <div class="heading-bread">
        <div class="container">
        <h3>Terms And Condition</h3>
    	<p>Please read the terms and conditions for using the site and agree to proceed with the service request.</p>
        </div>
    </div>
    
</div>

<div class="container">

<div class="tcblock">
    <div class="websuiteblock">
    <h2><i class="fa fa-balance-scale fa-2x" aria-hidden="true"></i><span>Thank you for choosing "Website Suit" </span></h2>
    <p>Please read the terms and conditions below and press "AGREE" to start applying.</p>
    </div>
    <div class="agreeblock">
		<font color="red"><h3>First: The site is committed to the customer as follows: </h3></font>
		<p>1.do not disclose any customer information directly or indirectly.</p>
	<p>2.To provide due diligence in accordance with the principles and professional practices in providing legal and legal advice, in a manner that serves the interests of the client and the right destination, which is supported by the documents in his possession.</p>
		<p>3.The role of the site is limited to the provision of electronic consultation or drafting only, and does not cover the judicial and procedural representation services to any government or private inside or outside the Kingdom, except in the case of the customer chose service.</p>

			<font color="orange"><h3>Second: The customer is committed to the site thus: </h3></font>
			<p>1. Provide the site with all documents proving the validity of its claim</p>
			<p>2. The accuracy of the data and documents provided by the site and does not bear any consequences if proven otherwise</p>
			<p>3. Do not require the site to return images of electronic documents that have been sent.</p>
<p class="agreebtn">
<?php echo anchor('front/select_services', '<i class="fa fa-thumbs-up fa-lg" style="margin:0 5px 5px 0" aria-hidden="true"></i> I agree', ['class' => 'btn btn-primary btn-lg']); ?>

<?php echo anchor('front', '<i class="fa fa-thumbs-down fa-lg" style="margin:0 5px 5px 0" aria-hidden="true"></i> Dis agree', ['class' => 'btn btn-primary btn-danger btn-lg']); ?>
</p></div></div>
</div>
<?php include "footer1.php";?>
