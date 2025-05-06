<?php $nvc = "white-nav sticky shrink modern hover4 radius-drop"; 
$pageTitle = $this->lang->line("Chat");
include('header.php');
?>
 </section>
<?php 
include('header_welcome.php');
?>

    <div class="m-grid__item m-grid__item--fluid m-wrapper">

        <!-- END: Subheader -->
        <div class="m-content chat-section">

            <!--begin::Portlet-->
            <div class="m-portlet lp-theme-card bg-transparent">
                <div class="m-portlet__head">
                    <div class="m-portlet__head-caption">
                        <!-- <div class="m-portlet__head-title">
                            <h3 class="m-portlet__head-text">
                                <?php echo $this->lang->line('Chatting');?>
                            </h3>
                        </div> -->
                        <div class="theme-new-nav-menu">
                            <h3 class="m-portlet__title" style="margin-right: 70px; font-size:24px !important;">
                                <?php echo $this->lang->line('Support_and_Chat');?>
                            </h3>
                        </div>
                    </div>
                </div>


                <div class="m-portlet__body theme-inner-chat">
                    <div class="chat-heading">
                        <h3 class="m-portlet__title" style="margin-right: 70px; font-size:24px !important;">
                            <?php echo $this->lang->line('Client_Panel');?>
                        </h3>

                    </div>
                    <div class="tab-content">
                        <div class="tab-pane active" id="m_quick_sidebar_tabs_messenger" role="tabpanel">
                            <div class="m-messenger m-messenger--message-arrow m-messenger--skin-light">
                                <div class="m-messenger__messages m-scrollable" data-scrollable="true" data-height="350" data-mobile-height="300" style="width: 100%;padding: 15px;" id="msgtop">
								<?php foreach($chat as $cn) { ?>
		 
								<?php if($cn['role_id'] == 1 OR $cn['role_id'] == 2){ ?>
                                    <div class="m-messenger__wrapper">
                                        <div class="m-messenger__message m-messenger__message--in">
                                            <div class="m-messenger__message-pic">
                                                <img class="user-avatar rounded-circle" src="<?php echo base_url(); ?>/uploads/profile/defualt_profile.png" alt="User Avatar">
                                            </div>
                                            <div class="m-messenger__message-body">
                                                <div class="m-messenger__message-arrow"></div>
                                                <div class="m-messenger__message-content">
                                                    <div class="m-messenger__message-username">
                                                        <?php echo getEmployeeName($cn['send_from']);?>
                                                    </div>
                                                    <div class="m-messenger__message-text">
                                                       <?php echo $cn['message']; ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
										<?php }  else { ?>
                                    <div class="m-messenger__wrapper">
                                        <div class="m-messenger__message m-messenger__message--out">
                                            <div class="m-messenger__message-body">
                                                <div class="m-messenger__message-arrow"></div>
                                                <div class="m-messenger__message-content">
                                                    <div class="m-messenger__message-text">
                                                     <?php echo $cn['message']; ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
									<?php }  ?>
									<?php }  ?>
                                </div>
								<?php  echo form_open_multipart();?>
                                <div class="m-messenger__seperator"></div>
                                <div class="m-messenger__form">
                                    <div class="m-messenger__form-controls">
                                        <input type="text" name="message" id="message" placeholder="<?php echo $this->lang->line('Type_a_message');?>" class="m-messenger__form-input" required>
                                    </div>
                                    <div class="m-messenger__form-tools">
                                      <button class="m-messenger__form-attachment" > <i class="fa fa-send"></i>
                       </button>
									  
                                           
                                    </div>
                                </div>
								</form>
                            </div>
                        </div>


                    </div>
                </div>
                <!--end::Form-->
            </div>

            <!--end::Portlet-->
        </div>
    </div>



<?php

include('footer.php');

?>
<script>
	$('#msgtop').animate({ scrollTop: 2000000000}, 1000);
</script>
