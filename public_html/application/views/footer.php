<!-- FOOTER -->
<style>
    /* Modal backdrop adjustment */
    .modal-backdrop.fade {
        opacity: 0 !important;
        display: none;
    }

    /* Modal styling */
    #exampleModal {
        background: rgba(0, 0, 0, 0.5);
    }

    #exampleModal .modal-dialog {
        max-width: 900px;
        margin: auto;
        min-height: 800px;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    /* Modal content styling */
    #exampleModal .modal-content {
        position: relative;
        background: #fff;
        border-radius: 10px;
        padding: 30px;
        width: 100%;
    }

    #exampleModal h2 {
        line-height: 1.5;
        margin: 0 0 30px;
        font-size: 2.5em;
        font-weight: bold;
        letter-spacing: 0.05em;
        color: black;
    }

    #exampleModal h3 {
        font-size: 1.6em;
        font-weight: normal;
        letter-spacing: 0.03em;
        margin-bottom: 20px;
    }

    /* Close button styling */
    #exampleModal button.close {
        position: absolute;
        right: -7px;
        top: -7px;
        background: #233F62;
        color: #fff;
        font-size: 11px;
        padding: 0;
        width: 25px;
        height: 25px;
        line-height: 27px;
    }

    /* Modal body content */
    #exampleModal .modal-body {
        text-align: center;
        line-height: 30px;
    }

    /* Updated Primary button styling */
    a.primary-btn {
        background: #13294b;
        padding: 15px 100px;
        display: inline-block;
        color: #fff;
        text-transform: capitalize;
        border-radius: 8px;
        margin: 30px 0;
        font-size: 1.5em;
        font-weight: bold;
        transition: background 0.3s ease;
    }

    /* Button hover effect */
    a.primary-btn:hover {
        background: #0056b3;
    }
</style>

<!-- Modal HTML -->
<!-- <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <i class="fa fa-close"></i>
            </button>
            <div class="modal-body">
                <?php if ($this->session->userdata('site_lang') == "arabic") { ?>
                    <h2>انتقلنا لموقعنا الإلكتروني الجديد</h2>
                    <h3>ندعوكم لزيارته واكتشاف الهوية الحديثة للموقع</h3>
                <?php } else { ?>
                    <h2>We moved to our new website</h2>
                    <h3>We invite you to visit it and discover the modern identity of the site</h3>
                <?php } ?>
                <a href="https://new.albarakatilaw.com/" class="primary-btn">
                    <?php if ($this->session->userdata('site_lang') == "arabic") { ?>
                        !اضغط هنا
                    <?php } else { ?>
                        click now!
                    <?php } ?>
                </a>
            </div>
        </div>
    </div>
</div> -->


<footer id="footer" class="classic_footer bg-cover bg-center gray6" data-background="<?php echo base_url('assets/'); ?>content/etna-01/images/footer_01.jpg" style="display:none;">
    <!-- Container -->
    <div class="footer-body container">
        <div class="row clearfix">
            <!-- Column -->
            <div class="col-md-3 col-sm-12 bg-norepeat bg-center sm-mb-mobile">
                <!-- Title -->
                <h4 class="uppercase white extrabold"><?php echo $this->lang->line("Nassr_Albarakati_and_Associates_Law_Firm"); ?></h4><br>
                <!--<h6 class="sm-mt bold gray8"></i><?php echo $this->lang->line("about_us"); ?></h6>-->
                <p class="mini-mt" style=" text-align: justify; ">
                    <?php //echo $this->lang->line("about_us_details");
                    ?></p>
                <!-- Address And Contact -->
                <div class="row clearfix xs-mt">
                    <div class="col-sm-12 col-xs-12">
                        <h6 class="bold gray8"><i class="fa fa-map-marker mini-mr"></i><?php echo $this->lang->line("OUR_ADDRESS"); ?></h6>
                        <p class="mini-mt">Riyadh, Jeddah and Mecca</p>
                        <!-- Google Map -->
                        <a href="<?php echo base_url('front/map/#maps') ?>" data-iframe="true" class="lightbox underline-hover colored-hover">
                            Find us on Google Map
                        </a>
                    </div>
                    <div class="col-sm-12 col-xs-12" style="padding-top:30px;">
                        <h6 class="bold gray8"><i class="fa fa-envelope mini-mr"></i><?php echo $this->lang->line("CONTACT_US"); ?></h6>
                        <p class="mini-mt">Tel: <a href="tel: 920002916" class="underline-hover colored-hover">920002916</a></p>
                        <a href="mailto:info@albarakatilaw.com" class="underline-hover colored-hover">info@albarakatilaw.com</a>
                    </div>
                </div>
                <!-- Space -->

            </div>
            <!-- Column -->
            <div class="col-md-6 col-sm-6 col-xs-12 all-block-links sm-mb-mobile newsSection">
                <h4 class="uppercase white extrabold sm-mb"><a href="<?php echo base_url('front/all_news') ?>"><?php echo $this->lang->line("LATEST_NEWS"); ?></a></h4>

                <div><!-- Sub Title -->
                    <?php $newsfoot =  $this->db->select('*')->order_by('id', "desc")->limit('2')->get('news')->result_array();
                    foreach ($newsfoot as $news) {
                        if ($this->session->userdata('site_lang') == "arabic") {
                            $title = $news['title_ar'];
                            $description = $news['discription_ar'];
                        } else {
                            $title = $news['title'];
                            $description = $news['discription'];
                        }

                    ?>

                        <h3 class="bold gray8"><a href="<?= base_url('front/news_details/' . $news['id']); ?>" target="_blank"><?php echo $title; ?></a></h3>
                        <p><?php if (strlen($description) > 260) {
                                echo substr($description, 0, 260) . "<a href=" . base_url('front/news_details/' . $news['id']) . " target='_blank'>..." . $this->lang->line('read_more') . "</a>";
                            } else {
                                echo substr($description, 0, 260);
                            } ?></p>

                        <br><br>
                    <?php  } ?>
                </div>

                <!-- You can edit footer-news.html file in js/ajax folder. Will be changed on all website -->
            </div>




            <!-- End Column -->
            <!-- Column -->
            <div class="col-md-3 col-sm-6 col-xs-12">
                <!-- Title -->
                <h4 class="uppercase white extrabold no-pm"><?php echo $this->lang->line("SUBSCRIBE_US"); ?></h4>
                <!-- Sub Title -->
                <h6 class="sm-mt bold gray5"><?php echo $this->lang->line("GET_UPDATED"); ?></h6>
                <div id="newsletter-form" class="footer-newsletter clearfix xs-mt">
                    <form id="newsletter_form" name="newsletter_form" method="post" action="<?php echo base_url('front/newsletter'); ?>">
                        <input type="email" name="n-email" id="n-email" required placeholder="Add your E-Mail address" class="font-12 radius-lg bg-night form-control">
                        <button type="submit" id="n-submit" name="submit" class="btn-lg fullwidth radius-lg bg-colored1 white qdr-hover-6 click-effect bold font-12"><?php echo $this->lang->line("SUBSCRIBE"); ?></button>
                    </form>
                </div>
                <!-- End Form -->
                <h6 class="xs-mt xxs-mb bold gray5"><?php echo $this->lang->line("FOLLOW_US"); ?></h6>
                <a href="https://www.facebook.com/Albarakatilaw/" target="_blank" class="icon-xs radius bg-night facebook white-hover slow1"><i class="fa fa-facebook"></i></a>
                <a href="https://twitter.com/albarakatilaw?lang=ar" target="_blank" class="icon-xs radius bg-night twitter white-hover slow1"><i class="fa fa-twitter"></i></a>
                <a href="https://linkedin.com/company/albarakatilawfirm/" target="_blank" class="icon-xs radius bg-night linkedin white-hover slow1"><i class="fa fa-linkedin-square"></i></a>

                <div class="row" style="margin: auto;margin-top: 20px;opacity: 0.7;">
                    <div class="col-md-6">
                        <a href="https://itunes.apple.com/us/app/nassr-%D9%86%D8%B5%D8%B1/id1457047115?ls=1&mt=8" target="_blank">
                            <img src="<?php echo base_url('assets/images/'); ?>img/available_appstore_ios.svg" width="100%" />
                        </a>
                    </div>
                    <div class="col-md-6">
                        <a href="https://play.google.com/store/apps/details?id=com.albarakati.android" target="_blank">
                            <img src="<?php echo base_url('assets/images/'); ?>img/available_google_play.svg" width="100%" />
                        </a>
                    </div>
                </div>
            </div>

            <div class="col-md-12 col-sm-6 col-xs-12">
                <hr class="white xs-mt">
                <!-- Client Slider -->
                <div class="custom-slider footer-clients xs-mt" data-slick='{"dots": false, "arrows": false, "fade": false, "draggable": true, "autoplay": true, "slidesToShow": 5, "slidesToScroll": 1}'>
                    <!--<a href="#" ><img src="<?php echo base_url('assets/images/'); ?>img/cl/cl-1.png" alt="" data-no-retina=""></a>
                    <a href="#" ><img src="<?php echo base_url('assets/images/'); ?>img/cl/cl2.png" alt="" data-no-retina=""></a>
                    <a href="#" ><img src="<?php echo base_url('assets/images/'); ?>img/cl/cl3.png" alt="" data-no-retina=""></a>
 
                    <a href="#" ><img src="<?php echo base_url('assets/images/'); ?>img/cl/cl5.png" alt="" data-no-retina=""></a>
                    <a href="#" ><img src="<?php echo base_url('assets/images/'); ?>img/cl/cl6.png" alt="" data-no-retina=""></a>-->
                    <?php $i = 0;
                    $clients1 =  $this->db->get('clients')->result_array();
                    foreach ($clients1 as $clients) { ?>
                        <a href="#"><img src="<?= base_url('uploads/clients/' . $clients['image']); ?>" alt="" data-no-retina=""></a>
                    <?php $i++;
                    } ?>

                </div>
            </div>

            <!-- End Column -->
            <!-- End Column -->
        </div>
    </div>
    <!-- End Container -->
    <!-- Footer Bottom -->
    <div class="footer-bottom">
        <div class="container">
            <div class="row clearfix">
                <div class="col-md-8 col-xs-12 table-im t-center-xs">
                    <a href="<?php echo base_url(); ?>tandc" target="_blank" class="gray6-hover underline-hover"><?php echo $this->lang->line("tandc"); ?></a>
                    |
                    <a href="<?php echo base_url(); ?>privacy" target="_blank" class="gray6-hover underline-hover"><?php echo $this->lang->line("Privacy_Policy_Tital"); ?></a>
                    |
                    <a href="<?php echo base_url(); ?>contact_us" target="_blank" class="gray6-hover underline-hover"><?php echo $this->lang->line("contact"); ?></a>
                    |
                    <!--<a href="<?php echo base_url(); ?>about_us" target="_blank" class="gray6-hover underline-hover"><?php //echo $this->lang->line("about_us");
                                                                                                                        ?></a>
                    |-->
                    <a href="<?php echo base_url(); ?>news" target="_blank" class="gray6-hover underline-hover"><?php echo $this->lang->line("Social_Responsibility"); ?></a>
                    |
                    <a href="<?php echo base_url(); ?>jobs" target="_blank" class="gray6-hover underline-hover"><?php echo $this->lang->line("Join_us"); ?></a>
                    |
                    <a href="<?php echo base_url(); ?>training" target="_blank" class="gray6-hover underline-hover"><?php echo $this->lang->line("Training"); ?></a>
                    |
                    <a href="<?php echo base_url("front/article"); ?>" target="_blank" class="gray6-hover underline-hover"><?php echo $this->lang->line("ARTICALS"); ?></a>
                </div>
                <!-- Bottom Note -->
                <div class="col-md-4 col-xs-12 table-im t-right t-center-xs">
                    <p class="v-middle">
                        © <?php echo date('Y'); ?>. Albarakati Law Powered By
                        <a href="https://hstait.com" target="_blank" class="colored-hover underline-hover">HSTAIT</a>.
                    </p>
                </div>
            </div>
        </div>
    </div>
</footer>
<!-- END FOOTER -->


<!-- Quick Contact Form -->
<div class="quick-contact-form border-colored">
    <h5 class="uppercase t-center extrabold h4">Drop us a message</h5>
    <p class="t-center normal h5 lh-normal">You're in the right place! Just drop us a message. How can we help?</p>
    <!-- Contact Form -->
    <form class="quick_form" name="quick_form" method="post" action="">
        <!-- Name -->
        <input type="text" name="name" id="name" required placeholder="Name" class="no-mt">
        <!-- Email -->
        <input type="email" name="email" id="email" required placeholder="E-Mail">
        <!-- Message -->
        <textarea name="message" id="message" required placeholder="Message"></textarea>
        <!-- Send Button -->
        <button type="submit" id="submit" class="bg-colored white click-effect qdr-hover-2-rotate uppercase extrabold">Send</button>
        <!-- End Send Button -->
    </form>
    <!-- End Form -->
    <a href="" target="_blank" class="inline-block colored-hover uppercase extrabold h5 no-pm qdr-hover-5">Or see contact page</a>
</div>

<!-- Quick Contact Form -->
<div class="quick-contact-form2 border-colored">
    <h5 class="uppercase t-center extrabold h4"><?php echo $this->lang->line("DOWNLOAD_OUR_MOBILE_APP"); ?></h5>

    <br>
    <div style="text-align:center">
        <a href="https://play.google.com/store/apps/details?id=com.albarakati.android">
            <img src="<?= base_url('assets/images/'); ?>img/available_google_play.svg" />
        </a>
        <br><br>
        <a href="">
            <img src="<?= base_url('assets/images/'); ?>img/available_appstore_ios.svg" />
        </a>
    </div>

</div>
<?php if ($this->session->userdata('verify') == 'true' || $this->session->userdata('verify') != '') { ?>
    <!-- Contact us button
<a href="#" class="drop-msg click-effect dark-effect" target="_blank"><i class="fa fa-envelope-o"></i></a>
<a href="https://wa.me/+966546060840" style="right: 75px; width: 45px; opacity: .5; height: 45px; line-height: 45px; z-index: 100; display: block; position: fixed; cursor: pointer; right: 75px; bottom: 70px; border-radius: 7px; border-width: 1px; border-style: solid; text-align: center; color: #777; background: white; border-color: #ddd; -webkit-transition: transform 0.8s cubic-bezier(0.77, 0, 0.2, 1) !important; -moz-transition: transform 0.8s cubic-bezier(0.77, 0, 0.2, 1) !important; transition: transform 0.8s cubic-bezier(0.77, 0, 0.2, 1) !important; -webkit-transform: translateZ(0); transform: translateZ(0);" target="_blank" style="right: 75px"><i class="fa fa-whatsapp"></i></a>
 --> <?php } ?>
<?php if ($this->session->userdata('verify') == '') { ?>
    <a href="https://wa.me/+966546060840" style="right: 20px; width: 45px; opacity: .5; height: 45px; line-height: 45px; z-index: 100; display: block; position: fixed; cursor: pointer; bottom: 70px; border-radius: 7px; border-width: 1px; border-style: solid; text-align: center; color: #777; background: white; border-color: #ddd; -webkit-transition: transform 0.8s cubic-bezier(0.77, 0, 0.2, 1) !important; -moz-transition: transform 0.8s cubic-bezier(0.77, 0, 0.2, 1) !important; transition: transform 0.8s cubic-bezier(0.77, 0, 0.2, 1) !important; -webkit-transform: translateZ(0); transform: translateZ(0);" target="_blank" style="right: 75px"><i class="fa fa-whatsapp"></i></a>
<?php } ?>
<!-- Back To Top -->
<a id="back-to-top" href="#top"><i class="fa fa-angle-up"></i></a>



</section>
<!-- END ALL SECTIONS -->





<!-- Messages for contact form -->
<div id="error_message" class="clearfix">
    <i class="fa fa-warning"></i>
    <span>Validation error occured. Please enter the fields and submit it again.</span>
</div>
<!-- Submit Message -->
<div id="submit_message" class="clearfix">
    <i class="fa fa-check"></i>
    <span>Thank You ! Your email has been delivered.</span>
</div>

<!-- jQuery -->
<?php if ($pageTitle != "Add E-Service") { ?>
    <script type="text/javascript" src="<?php echo base_url('assets/'); ?>js/jquery.min.js"></script>
<?php } ?>
<!-- Component for Sidebar -->
<script type="text/javascript" src="<?php echo base_url('assets/'); ?>js/components/sidebar.min.js"></script>
<!-- REVOLUTION SLIDER -->
<script type="text/javascript" src="<?php echo base_url('assets/'); ?>js/revolutionslider/jquery.themepunch.revolution.min.js"></script>
<script type="text/javascript" src="<?php echo base_url('assets/'); ?>js/revolutionslider/jquery.themepunch.tools.min.js"></script>
<!-- PAGE OPTIONS - You can find special scripts for this version -->
<!--
<script type="text/javascript" src="<?php echo base_url('assets/'); ?>js/components/jquery.event.move.js"></script>
-->
<script type="text/javascript" src="<?php echo base_url('assets/'); ?>js/components/jquery.twentytwenty.js"></script>
<script type="text/javascript" src="<?php echo base_url('assets/'); ?>content/etna/js/plugins.js"></script>
<script type="text/javascript" src="<?php echo base_url('assets/'); ?>js/tw/plugins.js"></script>
<!-- MAIN SCRIPTS - Classic scripts for all theme -->
<script type="text/javascript" src="<?php echo base_url('assets/'); ?>js/intlTelInput.js"></script>
<script type="text/javascript" src="<?php echo base_url('assets/'); ?>js/custome.js"></script>
<script type="text/javascript" src="<?php echo base_url('assets/'); ?>js/scripts.js?v=2.4"></script>
<script type="text/javascript" src="<?php echo base_url('assets/'); ?>js/jquery.countdown.min.js"></script>
<!-- End JS Files -->




<!--begin:: Global Mandatory Vendors -->
<script src="<?php echo base_url('assets/'); ?>vendors/popper.js/dist/umd/popper.js" type="text/javascript"></script>
<script src="<?php echo base_url('assets/'); ?>vendors/bootstrap/dist/js/bootstrap.min.js" type="text/javascript"></script>
<script src="<?php echo base_url('assets/'); ?>vendors/js-cookie/src/js.cookie.js" type="text/javascript"></script>
<script src="<?php echo base_url('assets/'); ?>vendors/moment/min/moment.min.js" type="text/javascript"></script>
<script src="<?php echo base_url('assets/'); ?>vendors/tooltip.js/dist/umd/tooltip.min.js" type="text/javascript"></script>
<script src="<?php echo base_url('assets/'); ?>vendors/perfect-scrollbar/dist/perfect-scrollbar.js" type="text/javascript"></script>
<!--
<script src="<?php echo base_url('assets/'); ?>vendors/wnumb/wNumb.js" type="text/javascript"></script>
<script src="<?php echo base_url('assets/'); ?>vendors/chartist/dist/chartist.js" type="text/javascript"></script>
<script src="<?php echo base_url('assets/'); ?>vendors/chart.js/dist/Chart.bundle.js" type="text/javascript"></script>
<script src="<?php echo base_url('assets/'); ?>vendors/js/framework/components/plugins/charts/chart.init.js" type="text/javascript"></script>

<script src="<?php echo base_url('assets/'); ?>vendors/dropzone/dist/dropzone.js" type="text/javascript"></script>
 -->
<!--begin::Global Theme Bundle -->
<script src="<?php echo base_url('assets/'); ?>demo/base/scripts.bundle.js" type="text/javascript"></script>


<!--end::Global Theme Bundle -->

<!--begin::Page Vendors -->

<!--end::Page Vendors -->

<!--begin::Page Scripts -->
<script src="<?php echo base_url('assets/'); ?>app/js/dashboard.js" type="text/javascript"></script>
<?php if (isset($_GET['popup'])) { ?>
    <!--<div class="modal fade " id="myModalpopup" role="dialog">
    <div class="modal-dialog">
     
      <div class="modal-content">
       <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
			<div id="teamCarousel1" class="carousel slide teamCarousel" data-ride="carousel">
			<div class="carousel-inner" role="listbox">
			<?php
            $i = 0;
            foreach ($data  as $team) {
            ?>

			<div class="item <?php if ($i == 0) { ?>active<?php } ?>">     
				<img src="<?= base_url('uploads/banner/' . $team['image']); ?>" alt="" border="0" class="img-responsive">

			   
			</div>
			<?php $i++;
            } ?>
			</div>
 
			<a class="left carousel-control" href="#teamCarousel1" role="button" data-slide="prev">
			<span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
			<span class="sr-only">Previous</span>
			</a>
			<a class="right carousel-control" href="#teamCarousel1" role="button" data-slide="next">
			<span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
			<span class="sr-only">Next</span>
			</a>
			</div>
        </div>
      </div>
      
    </div>
</div>--><?php } ?>
<div class="modal fade otppopup" id="myModal1" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">

            <div class="modal-body">
                <div class="loginBox ">
                    <h2 align="center"><?php echo $this->lang->line("Enter_OTP"); ?></h2>
                    <p style="color:green" class="newsms"></p>
                    <?php echo form_open('front/otp_verify', ['class' => 'otpform', 'id' => 'formlogin']); ?>
                    <div class="col-sm-12">
                        <div class="input-group">
                            <p style="width:100%"><?php echo $this->lang->line("Enter_OTP_Detail"); ?> <span class="otpmo"></span>
                                <input type="hidden" class="uids" name="user_id">
                                <input type="hidden" class="otp" name="otp">
                                <?php echo form_input(['name' => 'otp', 'class' => 'form-control']); ?>
                                <span style="color:red" class="otperror"></span>
                        </div>
                        <div class="input-group">
                            <?php echo form_submit(['value' => $this->lang->line('Submit'), 'class' => 'senddisable form-control', 'autocomplete' => 'off']); ?>
                            <a href="javascript:;" class="form-control grayBtn" style=" text-align: center; " id="resendotp"><?php echo $this->lang->line("Resend_OTP"); ?></a>
                        </div>
                    </div>
                    <div class="clear"></div>
                    </form>
                </div>
            </div>
            <button type="button" class="btn btn-default closeBtn" data-dismiss="modal"><i class="fa fa-close"></i></button>
        </div>

    </div>
</div>
<style>
    span.aftertime {
        color: red;
    }

    .dataTables_wrapper .pagination .page-item.active>.page-link {
        background: #1f3958;
        color: #ffffff;
    }

    <?php if ($this->session->userdata('admin_site_lang') == "arabic") { ?>.calendars-month td .calendars-today {
        background: none;
    }

    .calendars-month td .calendars-selected {
        background-color: #f0c0c0;
    }

    <?php } ?>
</style>
<script>
    /*
$(window).bind("load", function() { 

var xCoordStart,
    yCoordStart,
    xSlideTrigger = 10,
    slickElement = $(".slick-slider")

slickElement.bind('touchstart', function (e){
  xCoordStart = e.originalEvent.touches[0].clientX;
  yCoordStart = e.originalEvent.touches[0].clientY;
});

slickElement.bind('touchend', function (e){
  var xCoordEnd = e.originalEvent.changedTouches[0].clientX;
  var yCoordEnd = e.originalEvent.changedTouches[0].clientY;

  var deltaX = Math.abs(xCoordEnd - xCoordStart)
  var deltaY = Math.abs(yCoordEnd - yCoordStart)

  if(deltaX > deltaY){  
    if(xCoordStart > xCoordEnd + xSlideTrigger){
      slickElement.slick('slickNext');
    }
    else if(xCoordStart < xCoordEnd + xSlideTrigger){
      slickElement.slick('slickPrev');
    }
  }

});

});*/
    $('#resendotp').on('click', function() {
        var url = "<?= base_url('front/resend_otp'); ?>";
        jQuery.ajax({
            type: 'ajax',
            method: 'post',
            url: url,
            success: function(data) {

                $(".newsms").html("<?php echo $this->lang->line("Resend_OTP_send_successfully"); ?>");
            },
        });
    });
    if ($("#m_table_1").length) {
        $('#m_table_1').DataTable({
            "lengthChange": false,
            "responsive": true,
            language: {
                paginate: {
                    <?php if ($this->session->userdata('site_lang') == "arabic") {  ?>
                        next: '<i class="fa fa-angle-left"></i>',
                        previous: '<i class="fa fa-angle-right"></i>',
                    <?php } else { ?>
                        next: '<i class="fa fa-angle-right"></i>',
                        previous: '<i class="fa fa-angle-left"></i>',
                    <?php } ?>
                },
                <?php if ($this->session->userdata('site_lang') == "arabic") {  ?> "sProcessing": "جارٍ التحميل...",
                    "sLengthMenu": "أظهر _MENU_ ",
                    "sZeroRecords": "لم يعثر على أية سجلات",
                    "sInfo": "إظهار _START_ إلى _END_ من أصل _TOTAL_ مدخل",
                    "sInfoEmpty": "يعرض 0 إلى 0 من أصل 0 سجل",
                    "sInfoFiltered": "(منتقاة من مجموع _MAX_ مُدخل)",
                    "sInfoPostFix": "",
                    "sSearch": "ابحث:",
                    "sUrl": "",
                <?php } else { ?> "sLengthMenu": "Show  _MENU_ ",
                <?php  } ?>
            }
        });
    }
    /*$('.countdownmin').each(function(){
    			$(this).countdown($(this).attr('value'), function(event) {
    				$(this).text(
    					event.strftime('%D days %H:%M:%S')
    				);
    			});
    		});*/
    $('.countdownmin').each(function() {
        $(this).countdown($(this).attr('value'), {
                elapse: true
            })
            .on('update.countdown', function(event) {
                var $this = $(this);
                if (event.elapsed) {
                    $this.html(event.strftime('<span class="aftertime">-%D <?php echo $this->lang->line('days'); ?> %H:%M:%S</span>'));
                } else {
                    $this.html(event.strftime('%D <?php echo $this->lang->line('days'); ?> %H:%M:%S'));
                }
            });
    });
    $('#email').on('keyup', function(e) {
        var email = $('#email').val();
        $.ajax({
            type: 'POST',
            url: '<?php echo base_url('front/email_check'); ?>',
            data: {
                email: email
            },
            success: function(response) {
                if (response == 'false') {
                    $("#answers").html('<?php echo $this->lang->line("Email_already_exist"); ?>');
                } else {
                    $("#answers").html('');
                }
            }
        });

    });
    /*$('#id_numbers').on('keyup', function(e){   
			var id_numbers  = $('#id_numbers').val(); 
           $.ajax({
                type: 'POST',
                url: '<?php echo base_url('front/id_numbers_check'); ?>',
                data: {id_numbers:id_numbers},
                success: function(response) {
					if(response == 'false'){ 
						$("#answersid").html('ID already exist');  
					} 
					else 
					{ 
						$("#answersid").html(''); 
					}
				}
            });
			 
        });*/
    $('#sendf').on('click', function() {

        var password = $('#password').val();
        var confirm_password = $('#confirm_password').val();

        var textbox = document.getElementById("clno");
        if (textbox.value.length <= 10 && textbox.value.length >= 9) {
            $("#errclno").html('');
        } else {
            $("#errclno").html('<?php echo $this->lang->line("Enter_only_9_10_digit"); ?>');
        }

        if (confirm_password != password) {
            $("#cpass").html('<?php echo $this->lang->line("Password_not_match"); ?>');
            return false;
        } else {
            $("#cpass").html('');
        }

        if ($('#answers').html() == '') {
            return true;
            alert($('#answers').val());
        } else {}



    });
    $("#formlogin").submit(function(event) {
        var recaptcha = $("#g-recaptcha-response").val();
        if (recaptcha === "") {
            event.preventDefault();
            $('#g-recaptcha').html('<span style="color:red"><?php echo $this->lang->line("Please_check_the_recaptcha"); ?></span>');
        }
    });


    <?php if (isset($_GET['popup'])) { ?>
        jQuery('#myModalpopup').modal('show');
    <?php } ?>
    jQuery('.formlogin').on('submit', function(e) {
        e.preventDefault();
        $('.loginworking').html('<div class="alert alert-success"><?php echo $this->lang->line("Please_wait_login_in_process"); ?></div>');
        var url = "<?= base_url('front/login_check'); ?>";
        jQuery.ajax({
            type: 'ajax',
            method: 'post',
            url: url,
            data: $('#formlogin').serialize(),
            success: function(data) {

                if (data == '') {
                    $('.lgerror').html('<?php echo $this->lang->line('Invalid_ID_and_Password'); ?>');
                    $('.loginworking').html('');
                    $('.caerror').html('');
                } else if (data == 'cfalse') {

                    $('.caerror').html('<?php echo $this->lang->line("Invalid_captcha"); ?>');
                    $('.loginworking').html('');
                    $('.lgerror').html('');

                } else if (data == 'block') {
                    $('.blockerror').html('<?php echo $this->lang->line("You_are_blocked_Please_contact_to_administrator_for_more_information"); ?>');
                    $('.loginworking').html('');
                    $('.lgerror').html('');
                } else {
                    $('#myModal').modal('hide');
                    var JSONObject = JSON.parse(data);
                    $(".otpget").html(JSONObject.otp);
                    $(".otpmo").html(JSONObject.phone);
                    $(".uids").val(JSONObject.user_id);
                    $(".otp").val(JSONObject.otp);
                    $('#myModal1').modal('show');
                }
            },
        });
    });



    jQuery('.formrigister').on('submit', function(e) {
        e.preventDefault();
        var minLength = 6;
        var maxLength = 8;

        var expr = /^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{8,}$/;

        var char = $('#password').val();
        var charLength = $("#password").val().length;
        if (charLength < minLength) {
            $('#errPass').text('<?php echo $this->lang->line("Password_is_too_short_minimum_is_6_number_8_max"); ?>');
            return false;
        } else if (charLength > maxLength) {
            $('#errPass').text('<?php echo $this->lang->line("Password_is_too_long_maximum_is_8_number_6_min"); ?>');
            $("#errPass").val(char.substring(0, maxLength));
            return false;
        } else {
            $('#errPass').html('');
        }

        if ($('#answersid').html() != '') {

        }
        if ($('#tremscheck').is(':checked') == false) {
            $('#tremerror').html('<?php echo $this->lang->line("Please_accept_Terms_and_conditions"); ?>');
            $('.registreworking').html('');
            return false;
        }
        var formData = new FormData(this);
        var url = "<?= base_url('front/store_details'); ?>";
        $('.registreworking').html('<div class="alert alert-success"><?php echo $this->lang->line('Please_wait_register_in_process'); ?></div>');
        jQuery.ajax({
            url: url,
            type: 'POST',
            data: formData,
            success: function(data) {
                $('#tremscheck').html('');
                $('#tremerror').html('');
                $('#tremerror').html('');
                if (data == 'opnamefound') {
                    $('.registreworking').html('');
                    $('#opnamefound').html('You have not eligible for register');
                } else if (data == 'pfalse') {
                    $('.registreworking').html('');
                    $('#opnamefound').html('<?php echo $this->lang->line("phone_is_already_exist"); ?>');
                } else if (data == 'efalse') {
                    $('.registreworking').html('');
                    $('#opnamefound').html('<?php echo $this->lang->line("Email_already_exit"); ?>');
                } else if (data == 'fnamelost') {
                    $('#fnamereq').html('<?php echo $this->lang->line("Only_character_allowed"); ?>');
                } else if (data == 'cfalse') {
                    $('.caerrorre').html('<?php echo $this->lang->line("Invalid_captcha"); ?>');
                    $('.loginworking').html('');
                    $('.registreworking').html('');


                } else {
                    $('#myModal').modal('hide');
                    var JSONObject = JSON.parse(data);
                    $(".otpget").html(JSONObject.otp);
                    $(".otpmo").html(JSONObject.phone);
                    $(".uids").val(JSONObject.user_id);
                    $(".otp").val(JSONObject.otp);
                    localStorage.setItem('popupdata', 'true');
                    $('#myModal1').modal('show');
                }
            },
            cache: false,
            contentType: false,
            processData: false
        });
    });



    jQuery('.otpform').on('submit', function(e) {
        e.preventDefault();
        jQuery('.senddisable').attr('disabled', true);
        jQuery(".newsms").html("Please wait...");
        if (localStorage.getItem('popupdata')) {
            morevalue = "true";
        } else {
            morevalue = "false";
        }
        var url = "<?= base_url('front/otp_verify'); ?>";
        jQuery.ajax({
            type: 'ajax',
            method: 'post',
            url: url,
            data: $('.otpform').serialize() + "&regsucc=" + morevalue,
            success: function(data) {
                if (data == 'true') {
                    jQuery(".newsms").html(" ");
                    window.location.replace("http://lexport.demosbywpsqr.com/dashboard");
                } else {
                    jQuery(".newsms").html(" ");
                    jQuery('.senddisable').removeAttr("disabled");
                    $(".otperror").html("<?php echo $this->lang->line('OTP_Not_Match'); ?>");
                }

            },
        });
    });
    $(document).ready(function() {
        $('.refreshCaptcha,#logpop,.regNow').on('click', function() {
            $.get('<?php echo base_url() . 'front/refresh'; ?>', function(data) {
                $('#captImg').html(data);
            });
        });
    });
    $(document).ready(function() {
        $('.refreshCaptchaRe,#nav-profile-tab').on('click', function() {
            $.get('<?php echo base_url() . 'front/refresh'; ?>', function(data) {
                $('#captImgRe').html(data);
            });
        });
    });
    $(document).ready(function() {
        var url = "<?= base_url('front/read_notification_status'); ?>";
        $.ajax({
            type: 'ajax',
            method: 'post',
            url: url,
            success: function(data) {
                $('.noticount').html(data);
                if (data == 0) {
                    $('.noticount').hide();
                }
            }
        });
    });
</script>

<script async src="https://www.googletagmanager.com/gtag/js?id=UA-136011600-1"></script>
<script>
    // un comment below for ALert model
    $('#exampleModal').modal('show');
    window.dataLayer = window.dataLayer || [];

    function gtag() {
        dataLayer.push(arguments);
    }
    gtag('js', new Date());

    gtag('config', 'UA-136011600-1');
</script>

</body>
<!-- Body End -->

</html>