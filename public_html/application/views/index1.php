<?php include "header.php"; ?>

            <div>
                <div id="carousel-example-generic" class="carousel slide homecarousel carousel-fade" data-ride="carousel">
                    <!-- Indicators -->
                    <!-- <ol class="carousel-indicators">
                        <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                        <li data-target="#carousel-example-generic" data-slide-to="1"></li>
                        <li data-target="#carousel-example-generic" data-slide-to="2"></li>
                    </ol>-->

                    <div class="carousel-inner" role="listbox">
                        <div class="item active">
                            <img src="assets/front/assets/images/banner1.jpg" alt="" border="0" class="img-responsive">
                            <div class="carousel-caption">
                                <!--<h5>Services</h5>
                                <p>What is Lorem Ipsum? Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s What is Lorem Ipsum.</p>
                                <p><a class="btn btn-default" href="#services">Our Services</a>
                                    <a class="btn btn-default" href="#video">Video</a>
                                 <a class="btn btn-default" href="#mobileApp">Android App</a>
                              <a class="btn btn-default" href="#mobileApp">ios App</a></p>-->
                            </div>
                        </div>
                        <div class="item">
                            <img src="assets/front/assets/images/banner2.jpg" alt="" border="0" class="img-responsive">
                            <div class="carousel-caption">
                                <!--<h5>Services</h5>
                                <p>What is Lorem Ipsum? Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s What is Lorem Ipsum.</p>
                                <p><a class="btn btn-default" href="<?=base_url('front/terms');?>">Start Your Case</a></p>-->
                            </div>
                        </div>
                        <div class="item">
                            <img src="assets/front/assets/images/banner3.jpg" alt="" border="0" class="img-responsive">
                            <div class="carousel-caption">
                                <!--<h5>Services</h5>
                                <p>What is Lorem Ipsum? Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s What is Lorem Ipsum.</p>
                                <p><a class="btn btn-default" href="<?=base_url('front/terms');?>">Start Your Case</a></p>-->
                            </div>
                        </div>
                        <div class="item">
                            <img src="assets/front/assets/images/banner4.jpg" alt="" border="0" class="img-responsive">
                            <div class="carousel-caption">
                                <!--<h5>Services</h5>
                                <p>What is Lorem Ipsum? Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s What is Lorem Ipsum.</p>
                                <p><a class="btn btn-default" href="<?=base_url('front/terms');?>">Start Your Case</a></p>-->
                            </div>
                        </div>
                    </div>

                    <!-- Controls -->
                    <!-- <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
                        <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
                        <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>-->
                </div>
            </div>

            <!-- GMV -->
            <section class="gmv" id="video">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-1">
                            <div class="gmv-box wow slideInLeft">
                                <img class="img-responsive stepIcon" src="assets/front/assets/images/mission.png" alt="">
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="gmv-box wow slideInLeft">
                                <h2>Our Mission</h2>
                            </div>
                        </div>
                        <div class="col-sm-8">
                            <div class="gmv-box wow slideInRight">
                                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s</p>
                            </div>
                        </div>
                    </div>

                   <!-- <div class="row">
                        <div class="col-sm-6">
                            <iframe width="100%" height="315" src="https://www.youtube.com/embed/ZLNO2c7nqjw" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
                            <h3>Our Profile</h3>
                        </div>
                        <div class="col-sm-6">
                            <iframe width="100%" height="315" src="https://www.youtube.com/embed/ZLNO2c7nqjw" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
                            <h3>Our History</h3>
                        </div>
                    </div>-->

                    <div class="row">
                        <div class="col-sm-1">
                            <div class="gmv-box wow slideInLeft">
                                <img class="img-responsive stepIcon" src="assets/front/assets/images/vision.png" alt="">
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="gmv-box wow slideInLeft">
                                <h2>Our Vision</h2>
                            </div>
                        </div>
                        <div class="col-sm-8">
                            <div class="gmv-box wow slideInRight">
                                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s</p>
                            </div>
                        </div>
                    </div>
                </div>
            </section>


            <section id="whoweare" class="module parallax parallax-1">
                <div class="blackWrap">
                    <div class="container threeBoxes">
                        <div class="row">
                            <div class="col-sm-4 wow slideInLeft">
                                <h2>Event & News</h2>
                                <div class="innerBox">
                                    <ul class="latestNews">
                                        <?php foreach($news as $news) { ?>
                                            <li>
                                            <h4><?= $news['title']; ?></h4>
                                            <p><?php echo substr($news['discription'],0,100); ?></p>
                                        </li>
                                        <?php } ?>
                                    </ul>
                                    <div class="boxBtn"><a href="<?=base_url('front/news');?>" class="btn btn-default">View All</a></div>
                                </div>
                            </div>

                            
    <div class="col-sm-4 wow slideInDown">
                                <h2>Our Team</h2>
                                <div class="innerBox">
                                    <div id="teamCarousel" class="carousel slide teamCarousel" data-ride="carousel">                     <div class="carousel-inner" role="listbox">
                                        <?php 
                                        $i=0;foreach($team  as $team) { 
                                            ?>

                                            <div class="item <?php if($i==0){ ?>active<?php } ?>">     
                                                <img src="<?= base_url('uploads/team/'.$team['image']); ?>" alt="" border="0" class="img-responsive">

                                                <h5><?= $team['name']; ?></h5>
                                                <p><?= $team['designation']; ?></p>
                                            </div>
                                        <?php $i++; } ?>
                                        </div>

                                        <!-- Controls -->
                                        <a class="left carousel-control" href="#teamCarousel" role="button" data-slide="prev">
                                            <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                                            <span class="sr-only">Previous</span>
                                        </a>
                                        <a class="right carousel-control" href="#teamCarousel" role="button" data-slide="next">
                                            <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                                            <span class="sr-only">Next</span>
                                        </a>
                                    </div>
                                    <div class="boxBtn"><a href="<?=base_url('front/view_team');?>" class="btn btn-default">View All</a></div>
                                </div>
                            </div>
                            <div class="col-sm-4 wow slideInRight">
                                <h2>Our Clients</h2>
                                <div class="innerBox">
                                    <div id="pCarousel" class="carousel slide pCarousel" data-ride="carousel">                              
                                      <div class="carousel-inner" role="listbox">
                                        <?php $i=0;foreach ($clients as $clients) { ?>
                                            <div class="item <?php if($i==0){ ?>active<?php } ?>">
                                                <img src="<?= base_url('uploads/clients/'.$clients['image']); ?>" alt="" border="0" class="img-responsive">
                                                <h5><?= $clients['title']; ?></h5>
                                                <p><?= $clients['discription']; ?></p>
                                            </div>
                                        <?php $i++; } ?>
                                            
                                        </div>

                                        <!-- Controls -->
                                        <a class="left carousel-control" href="#pCarousel" role="button" data-slide="prev">
                                            <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                                            <span class="sr-only">Previous</span>
                                        </a>
                                        <a class="right carousel-control" href="#pCarousel" role="button" data-slide="next">
                                            <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                                            <span class="sr-only">Next</span>
                                        </a>
                                    </div>
                                    <div class="boxBtn"><a href="<?= base_url('front/view_clients'); ?>" class="btn btn-default">View All</a></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <!-- Services -->
            <section id="services" class="practice">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-12 wow bounceInDown">
                            <div class="title-box">
                                <p class="section-subtitle">Check out our</p>
                                <h2 class="section-title">Services</h2>
                            </div>
                        </div>
                    </div>

                    <div class="row wow bounceIn servicesBoxes">
                        <div class="col-sm-6 col-md-3 s1">
                            <div class="practice-box" align="center">
                                <img class="img-responsive" src="assets/front/assets/images/s1.png">
                                <h3 class="practice-title">Commercial Business</h3>
                            </div>
                            <div class="box-hover" align="center">
                                <h3 class="practice-title">Commercial Business</h3>
                                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                                <a href="<?=base_url('front/terms');?>" class="btn">Start Your Case</a>
                                <a href="<?=base_url('front/appoinment');?>" class="btn">Book Appointment</a>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-3 s2">
                            <div class="practice-box" align="center">
                                <img class="img-responsive" src="assets/front/assets/images/s2.png">
                                <h3 class="practice-title">Consultancy & Legal Studies</h3>
                            </div>
                            <div class="box-hover" align="center">
                                <h3 class="practice-title">Consultancy & Legal Studies</h3>
                                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                                <a href="<?=base_url('front/terms');?>" class="btn">Start Your Case</a>
                                <a href="<?=base_url('front/appoinment');?>" class="btn">Book Appointment</a>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-3 s3">
                            <div class="practice-box" align="center">
                                <img class="img-responsive" src="assets/front/assets/images/s3.png">
                                <h3 class="practice-title">Contracts & Agreements</h3>
                            </div>
                            <div class="box-hover" align="center">
                                <h3 class="practice-title">Contracts & Agreements</h3>
                                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                                <a href="<?=base_url('front/terms');?>" class="btn">Start Your Case</a>
                                <a href="<?=base_url('front/appoinment');?>" class="btn">Book Appointment</a>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-3 s4">
                            <div class="practice-box" align="center">
                                <img class="img-responsive" src="assets/front/assets/images/s4.png">
                                <h3 class="practice-title">Litigation</h3>
                            </div>
                            <div class="box-hover" align="center">
                                <h3 class="practice-title">Litigation</h3>
                                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                                <a href="<?=base_url('front/terms');?>" class="btn">Start Your Case</a>
                                <a href="<?=base_url('front/appoinment');?>" class="btn">Book Appointment</a>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-3 s5">
                            <div class="practice-box" align="center">
                                <img class="img-responsive" src="assets/front/assets/images/s5.png">
                                <h3 class="practice-title">Execution of judgments & collection of debts</h3>
                            </div>
                            <div class="box-hover" align="center">
                                <h3 class="practice-title">Execution of judgments & collection of debts</h3>
                                <p>Lorem Ipsum is simply dummy text of the printing.</p>
                                <a href="<?=base_url('front/terms');?>" class="btn">Start Your Case</a>
                                <a href="<?=base_url('front/appoinment');?>" class="btn">Book Appointment</a>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-3">
                            <div class="practice-box s6" align="center">
                                <img class="img-responsive" src="assets/front/assets/images/s6.png">
                                <h3 class="practice-title">Liquidation of inheritance & management of endowments</h3>
                            </div>
                            <div class="box-hover" align="center">
                                <h3 class="practice-title">Liquidation of inheritance & management of endowments</h3>
                                <p>Lorem Ipsum is simply dummy text.</p>
                                <a href="<?=base_url('front/terms');?>" class="btn">Start Your Case</a>
                                <a href="<?=base_url('front/appoinment');?>" class="btn">Book Appointment</a>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-3 s7">
                            <div class="practice-box" align="center">
                                <img class="img-responsive" src="assets/front/assets/images/s7.png">
                                <h3 class="practice-title">Authentication</h3>
                            </div>
                            <div class="box-hover" align="center">
                                <h3 class="practice-title">Authentication</h3>
                                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                                <a href="<?=base_url('front/terms');?>" class="btn">Start Your Case</a>
                                <a href="<?=base_url('front/appoinment');?>" class="btn">Book Appointment</a>
                        </div>
                    </div>
                        <div class="col-sm-6 col-md-3 s8">
                            <div class="practice-box" align="center">
                                <img class="img-responsive" src="assets/front/assets/images/s8.png">
                                <h3 class="practice-title">Arbitration & Mediation</h3>
                            </div>
                            <div class="box-hover" align="center">
                                <h3 class="practice-title">Arbitration & Mediation</h3>
                                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                                <a href="<?=base_url('front/terms');?>" class="btn">Start Your Case</a>
                                <a href="<?=base_url('front/appoinment');?>" class="btn">Book Appointment</a>
                            </div>
                        </div>
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
                                    <a href="#"><img src="<?=base_url('assets/front/assets/images/btn1.png');?>" alt="" border="0"></a>
                                    <a href="#"><img src="<?=base_url('assets/front/assets/images/btn2.png');?>" alt="" border="0"></a>
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
                         <!--  <<iframe src="https://www.google.com/maps/d/embed?mid=1b7-dJ7VaMJ5UDpNxlsryd1ORZzotEqqO&hl=en" width="100%" height="480" frameborder="0"></iframe>
                         <!-- <img src="<? //base_url('assets/front/assets/images/map.png');?>" alt="" border="0" class="img-responsive" style="margin:25px 0px 0px 50px;"> -->
                        <div class="homeMap">
                        <div class="homeMapOffices">
                            <div class="mapOfficeIcon mapOffice-HongKong">
                                <div class="mapOfficeOpen"><div class="tooltip-arrow-bottom"><a href="/offices/new-york">Hong Kong</a></div></div>
                            </div>
                            <div class="mapOfficeIcon mapOffice-Tokyo">
                                <div class="mapOfficeOpen"><div class="tooltip-arrow-bottom"><a href="/offices/tokyo">Mecca, Saudi Arabia
</a></div></div>
                            </div>
                            <div class="mapOfficeIcon mapOffice-Beijing">
                                <div class="mapOfficeOpen"><div class="tooltip-arrow-bottom"><a href="/offices/beijing">Jeddah, Saudi Arabia

</a></div></div>
                            </div>

                        </div>
                        <img src="http://timelyhub.com/law_admin/assets/front/assets/images/map.png" alt="" border="0" class="img-responsive" style="margin:25px 0px 0px 50px;">
                    </div>
                    </div>
                    <div class="col-sm-5">
                        <div class="contactInformation">
                            <div class="contactItem contactPhone">Feel Free to Call Us Now <span>920002916</span></div>
                            <div class="contactItem contactCalendar">Working Hours <span>Mon-Fri 9.00am - 4.00pm</span></div>
                            <div><a href="<?=base_url('front/contact_us');?>" class="btn btn-black">Contact Us</a></div>
                        </div>
                    </div>
                </div>
            </div>

            <footer>
                <div class="container">
                    <div class="row">
                        <div class="col-sm-3 wow bounceInLeft">
                            <ul class="foolinks">
                                <li><a href="#">Home</a></li>
                                <li><a href="#">About Us</a></li>
                                <li><a href="#">Services</a></li>
                                <li><a href="#">News & Events</a></li>
                                <li><a href="#">Jobs</a></li>
                            </ul>
                        </div>
                        <div class="col-sm-3 wow bounceInDown">
                            <ul class="foolinks">
                                <li><a href="#">Login</a></li>
                                <li><a href="#">Registration</a></li>
                                <li><a href="#">Training</a></li>
                                <li><a href="#">Privacy Policy</a></li>
                                <li><a href="#">Terms & Conditions</a></li>
                            </ul>
                        </div>
                        <div class="col-sm-6 wow bounceInRight" align="center">
                            <ul class="socialLinks">
                                <li><a href="#"><img src="<?=base_url('assets/front/assets/images/facebook.png');?>" alt="" border="0"></a></li>
                                <li><a href="#"><img src="<?=base_url('assets/front/assets/images/twitter.png');?>" alt="" border="0"></a></li>
                                <li><a href="#"><img src="<?=base_url('assets/front/assets/images/linkedin.png');?>" alt="" border="0"></a></li>
                                <li><a href="#"><img src="<?=base_url('assets/front/assets/images/gplus.png');?>" alt="" border="0"></a></li>
                                <li><a href="#"><img src="<?=base_url('assets/front/assets/images/youtube.png');?>" alt="" border="0"></a></li>
                            </ul>
                            <div class="clearfix"></div>
                            <div class="copyright">&copy; 2018 Albarakati Law ,Powered by <a href="http://hstait.com" target="_blank">hstait.com</a></div>
                        </div>
                    </div>
                </div>
            </footer>

        <!-- Scripts -->
        <script src="<?=base_url('assets/front/assets/js/jquery-1.12.3.min.js');?>"></script>
        <script src="<?=base_url('assets/front/assets/js/bootstrap.min.js');?>"></script>
        <!--<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.10.0/js/bootstrap-select.min.js"></script>-->
        <script src="<?=base_url('assets/front/assets/js/owl.carousel.min.js');?>"></script>
        <script src="<?=base_url('assets/front/assets/js/wow.js');?>"></script>
        <script src="<?=base_url('assets/front/assets/js/script.js');?>"></script>
		

<div class="staticMessagesOutter">
        <div class="staticMessagesMiddle">
            <div class="staticMessagesInner">
                <div id="staticMessages">
                    <div class="quickScrollPLaxLeft">
                        <div class="quickScrollPLaxLeftIn">
                            <div class="quickScrollPLaxHead">
                                <div class="quickScrollPLaxHeadIn">Latest News</div>
                            </div>
                            <div class="quickScrollPLaxCopy">
                                <div class="quickScrollPLaxCopyIn">
                                    <p> K2M to Be Acquired by Stryker for $1.4 Billion
</p>
                                    <a href="#">READ MORE ></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="quickScrollPLaxRight">
                        <div class="quickScrollPLaxRightIn">
					
                            <div class="quickScrollPLaxHead">
                                <div class="quickScrollPLaxHeadIn">Chairman's Message</div>
                            </div>
                            <div class="quickScrollPLaxCopy">
                                <div class="quickScrollPLaxCopyIn">

                                    <p><a href="#">Watch the Video</a><p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
            
        <script>
    
			jQuery(".mapOffice-Beijing").click(function () {
				jQuery(".mapOffice-Beijing .mapOfficeOpen").toggle();
			});
			jQuery(".mapOffice-HongKong").click(function () {
				jQuery(".mapOffice-HongKong .mapOfficeOpen").toggle();
			});
			jQuery(".mapOffice-Tokyo").click(function () {
				jQuery(".mapOffice-Tokyo .mapOfficeOpen").toggle();
			});
	
	
			var quickScrollPLaxLinkLeft = 1; // jump to this section when clicked
	var quickScrollPLaxLinkRight = 2; // jump to this section when clicked
	var quickScrollLinkStaticHeight = 130;
	var quickScrollStaticSpeed = 200;
	//
	$('.quickScrollPLaxLeft, .quickScrollPLaxRight').css('bottom',-quickScrollLinkStaticHeight);
	//
	setQuickScrollBottomBoxes = function(){
		$('.quickScrollPLaxLeft').animate({bottom:-quickScrollLinkStaticHeight}, quickScrollStaticSpeed);
		$('.quickScrollPLaxRight').animate({bottom:-quickScrollLinkStaticHeight}, quickScrollStaticSpeed);
	};
	$('.quickScrollPLaxLeft').mouseenter(function(){
		$(this).animate({bottom:0}, quickScrollStaticSpeed);
	});
	$('.quickScrollPLaxLeft').mouseleave(function(){
		$(this).animate({bottom:-quickScrollLinkStaticHeight}, quickScrollStaticSpeed);
	});
	$('.quickScrollPLaxRight').mouseenter(function(){
		$(this).animate({bottom:0}, quickScrollStaticSpeed);
	});
	$('.quickScrollPLaxRight').mouseleave(function(){
		$(this).animate({bottom:-quickScrollLinkStaticHeight}, quickScrollStaticSpeed);
	});
	// Scroll to section
	$('.quickScrollPLaxLeft').click(function(){
		$("html, body").animate({ 
			scrollTop: $('.plaxSlides'+quickScrollPLaxLinkLeft).offset().top - parallaxScrollTopOffset
		}, 1000, "swing");
	});
	$('.quickScrollPLaxRight').click(function(){
		$("html, body").animate({ 
			scrollTop: $('.plaxSlides'+quickScrollPLaxLinkRight).offset().top - parallaxScrollTopOffset
		}, 1000, "swing");
	});



//// END Doc Ready ////


$(window).resize(function(){
	updateSizes();
});
//// END Resize ////


$(document).scroll(function(){

	parallaxIt();

	//////// Highlight Parallax Nav On Scroll ////////
	var screenTop = $(document).scrollTop() + 250;
	$('.sSectContent').each(function() {
		var parCurrentPosition = $(this).offset().top;
		var thisElemHeight = $(this).height();
		// Assign last class name as a var
		var allClasses = this.className,
			parallaxCurrentShowing = allClasses.split(/\s+/).filter(function (val, index, array) {
				return val.indexOf('plaxSlides') === 0;
		});
		if (screenTop >= parCurrentPosition) {
			$('#parallaxSlideIndicators div').removeClass('active');
			$('#parallaxSlideIndicators .' + parallaxCurrentShowing).addClass('active');
		};
		// If page scrolled to bottom = 
		if($(window).scrollTop() + $(window).height() > $(document).height() - 200) {
			$('#parallaxSlideIndicators div').removeClass('active');
			$('.pLaxLastBullet').addClass('active');
		};
	});

	// Hide homepage bottom links on scroll
	if ($('#staticMessages').is(':visible')) {
		var checkTheScrollHeight = $(document).scrollTop();
		if (checkTheScrollHeight >= 270) {
			$('.quickScrollPLaxLeft, .quickScrollPLaxRight').fadeOut(300);
		} else {
			$('.quickScrollPLaxLeft, .quickScrollPLaxRight').fadeIn(300);
		};
	};


});
//// END Scroll ////


function updateSizes(){
	if ($('.responsiveSliderController').is(':visible')) {
		$('.responsiveSliderSlide').each(function() {
			var thisNewsHeight = $(this).outerHeight();
			if (thisNewsHeight > newsSlideTallestHeight) {
				newsSlideTallestHeight = thisNewsHeight;
			};
		});
		$('.responsiveSliderController, #wF1, #wF2').height(newsSlideTallestHeight);
	};
};

parallaxIt = function(){
	windowsize = $(window).width();
	//check if parrallaxed items are in view
	$(".fullParralaxUp").each(function(e){
		if (isVisible($(this))){
			if (parallaxActive == true) {
				$(this).css("background-position","center "+((topDist($(this))/$(window).height())*(-1*parAmount))+"px");
			} else {
				$(this).css("background-position","center top");
			};
		};
	});
};


//checks to see if an item has come into view
function isVisible(elem){
	var docViewTop = $(window).scrollTop();
	var docViewBottom = docViewTop + $(window).height();
	var elemTop = $(elem).offset().top;
	var elemBottom = elemTop + $(elem).height();
	return ((elemTop < docViewBottom-50));
};

function topDist(elem){
	var docViewTop = $(window).scrollTop();
	var elemTop = $(elem).offset().top;
	return elemTop-docViewTop;
};
$('.carousel').carousel();
        </script>
        <style>

</style>
    </body>
</html>
