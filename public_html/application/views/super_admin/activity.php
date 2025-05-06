<?php
include('header.php');

?>

    <style>
        .m-form.m-form--group-seperator-dashed .m-form__group {
            border-bottom: 0px dashed #ebedf2;
        }
        .thh h3{
            background: #1F3958;
            color: #fff;
            font-weight: bold;
            text-transform: uppercase;
            padding: 10px;
            -webkit-border-top-left-radius: 20px !important;
            -webkit-border-top-right-radius: 20px !important;
            -moz-border-radius-topleft: 20px !important;
            -moz-border-radius-topright: 20px !important;
            border-top-left-radius: 20px !important;
            border-top-right-radius: 20px !important;
            margin: 30px 30px 0 30px;
        }
        .in_fo{
            box-shadow: 0px 5px 10px 0px #cccccc !important;
            margin: 0 30px;
            padding-bottom: 25px;
            -webkit-border-bottom-right-radius: 20px;
            -webkit-border-bottom-left-radius: 20px;
            -moz-border-radius-bottomright: 20px;
            -moz-border-radius-bottomleft: 20px;
            border-bottom-right-radius: 20px;
            border-bottom-left-radius: 20px;
        }
        .m-form.m-form--group-seperator-dashed .m-form__group {
            border-bottom: 0px dashed #ebedf2;
            padding-bottom: 0;
            padding-top: 10px;
        }
        .m-portlet .m-form.m-form--fit > .m-portlet__body {
            padding-bottom: 40px !important;
        }
        .nav {
            display: -webkit-box;
        }
			h3.m-portlet__head-text {
    color: #1f3959 !important;
}
.m-portlet .m-portlet__head {
   
    background: none !important; 
}
    </style>

    <div class="m-grid__item m-grid__item--fluid m-wrapper">


        <!-- END: Subheader -->
        <div class="m-content">

            <!--begin::Portlet-->
            <div class="m-portlet">
                <div class="m-portlet__head">
                    <div class="m-portlet__head-caption">
                        <div class="m-portlet__head-title">
                            <h3 class="m-portlet__head-text">
                         Live Activity Of <?php echo getEmployeeName($this->uri->segment(4));?>
                            </h3>
							<div style="color: #f00;right: 10px;position: absolute;">Auto Refere every 5 Second</div>
                        </div>
                    </div>
                </div>
				<div id="getaction"></div>
				<?PHP // print_r($user_activity); ?>
                <!--end::Form-->
            </div>

            <!--end::Portlet-->
        </div>
    </div>
    </div>


<?php
include('footer.php');
?>
<script>
var url="<?= base_url('super_admin/dashboard/activity_ajax'); ?>"; 
 $.ajax({
    type:'ajax',
    method:'post',
    url:url,
    data:{"id" : <?php echo $this->uri->segment(4); ?>},
    success:function(data){
   
         $('#getaction').html(data);

      },
  });
window.setInterval(function(){
 var url="<?= base_url('super_admin/dashboard/activity_ajax'); ?>"; 
 $.ajax({
    type:'ajax',
    method:'post',
    url:url,
    data:{"id" : <?php echo $this->uri->segment(4); ?>},
    success:function(data){
   
         $('#getaction').html(data);

      },
  });
}, 5000);
 
</script>