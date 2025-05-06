<?php include "header.php";?>


        	<!-- Header Section -->
            <div class="innerHeader">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-5 wow bounceInLeft">
                            <h1>Our Clients</h1>
                        </div>
                    </div>
                </div>
            </div>



            <section id="team" class="team">
                <div class="container">
                    <div class="row">
                        <?php foreach($data as $data){ ?>
                        <div class="col-sm-4  wow slideInRight">
                            <div class="team-box">

                                <img class="img-responsive img-full" src="<?=base_url('uploads/clients/'.$data['image']);?>" alt="team" height="300" width="300">
                                <div class="team-detail">
                                    <ul>
                                        <li><h3><?= $data['title']; ?></h3></li>
                                        <li><h4><?= $data['discription']; ?></h4></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    <?php } ?>                       
                    </div>
                </div>
            </section>

            <section id="mobileApp" class="module parallax parallax-1 mobileApp">
            	<div class="blackWrap">
	            	<div class="container">
                        <div class="row">
                            <div class="col-sm-5 wow bounceInDown">
                                <div class="title-box">
                                    <p class="section-subtitle">Download our</p>
                                    <h2 class="section-title">Mobile App</h2>
                                </div>
                                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>
                                <div class="mobileAppBtn">
                                	<a href="#"><img src="<?=base_url('assets/front/assets/images/btn1.png');?>" alt="" border="0"></a> <a href="#"><img src="<?=base_url('assets/front/assets/images/btn1.png');?>" alt="" border="0"></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        	<!-- Application -->

        	<!-- Contact -->
            <div id="contact" class="contact footertop">
            	<div class="row noMP">
                    <div class="col-sm-7 noPad">
                        <!--<iframe src="https://www.google.com/maps/d/embed?mid=1b7-dJ7VaMJ5UDpNxlsryd1ORZzotEqqO&hl=en" width="100%" height="480" frameborder="0"></iframe>-->
                        <img src="<?=base_url('assets/front/assets/images/map.png');?>" alt="" border="0" class="img-responsive" style="margin:25px 0px 0px 50px;">
                    </div>
                    <div class="col-sm-5">
                        <div class="contactInformation">
                            <div class="contactItem contactPhone">Feel Free to Call Us Now <span>920002916</span></div>
                            <div class="contactItem contactCalendar">Working Hours <span>Mon-Fri 9.00am - 4.00pm</span></div>
                            <div><a href="#" class="btn btn-black">Contact Us</a></div>
                        </div>
                    </div>
                </div>
            </div>
<?php include "footer1.php";?>