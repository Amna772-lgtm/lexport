<?php
include('header.php');

?>

<style>
.rehvero:hover {
    color: white !important;
}
.m-body .m-content {
    padding: 30px 30px;
}

.body_rtl .noticount {
    float: left;
}
.badge-success {
    color: #fff;
    background-color: #28a745;
}
.badge {
    display: inline-block;
    padding: .25em .4em;
    font-size: 75%;
    font-weight: 700;
    line-height: 1;
    text-align: center;
    white-space: nowrap;
    vertical-align: baseline;
    border-radius: .25rem;
}
.badge-success {
    color: #fff;
    background-color: #34bfa3;
}
</style>
<style> .marbanner img { width: 100%; height: 395px !important; } .chat { list-style: none; margin: 0; padding: 0; } .chat li { margin-bottom: 10px; padding-bottom: 5px; border-bottom: 1px dotted #B3A9A9; } .chat li.left .chat-body { margin-left: 60px; } .chat li.right .chat-body { margin-right: 60px; } .chat li .chat-body p { margin: 0; color: #777777; } .panel .slidedown .glyphicon, .chat .glyphicon { margin-right: 5px; } .panel-body { overflow-y: scroll; height: 400px; } ::-webkit-scrollbar-track { -webkit-box-shadow: inset 0 0 6px rgba(0,0,0,0.3); background-color: #F5F5F5; } ::-webkit-scrollbar { width: 12px; background-color: #F5F5F5; } ::-webkit-scrollbar-thumb { -webkit-box-shadow: inset 0 0 6px rgba(0,0,0,.3); background-color: #555; }
.panel-primary>.panel-heading { color: #fff; background-color: #1f3959; border-color: #1f3959; } .panel-heading { padding: 10px 15px; border-bottom: 1px solid transparent; border-top-left-radius: 3px; border-top-right-radius: 3px; } .panel-body { overflow-y: scroll; height: 400px; } .panel-body { padding: 15px; } .panel-footer { padding: 10px 15px; background-color: #f5f5f5; border-top: 1px solid #ddd; border-bottom-right-radius: 3px; border-bottom-left-radius: 3px; } .panel-primary { border-color: #337ab7; } .panel { margin-bottom: 20px; background-color: #fff; border: 1px solid transparent; border-radius: 4px; -webkit-box-shadow: 0 1px 1px rgba(0,0,0,.05); box-shadow: 0 1px 1px rgba(0,0,0,.05); }.userPer.uselected { font-weight: bold; }
.msend{
	    border-radius: 100%;
    display: -webkit-box;
    display: -ms-flexbox;
    display: flex;
    -moz-justify-content: center;
    -ms-justify-content: center;
    -webkit-box-pack: center;
    -ms-flex-pack: center;
    justify-content: center;
    -moz-align-items: center;
    -ms-align-items: center;
    -webkit-box-align: center;
    -ms-flex-align: center;
    align-items: center;
    text-align: center;
    vertical-align: middle;
    height: 40px;
    width: 40px;
    text-align: center;
    vertical-align: middle;
    line-height: 0;
    cursor: pointer;
}
 </style>
    <div class="m-grid__item m-grid__item--fluid m-wrapper">

        <!-- END: Subheader -->
        <div class="m-content">

            <!--begin::Portlet-->
            <div class="m-portlet lp-theme-card bg-transparent">
                <div class="m-portlet__head">
                    <div class="m-portlet__head-caption">
                        <div class="m-portlet__head-title">
                            <h3 class="m-portlet__head-text">
                                <?php echo $this->lang->line('Chatting');?>
                            </h3>
                        </div>
                    </div>
                </div>

 
				<div class="m-form m-form--fit m-form--label-align-right m-form--group-seperator-dashed">
                    <div class="m-portlet__body"> 
                        <div class="form-group row">
					        <div class="col-sm-5 col-md-4">
                                <div class="m-portlet__body theme-inner-form chat-box">
					                <div class="panel panel-primary">
                                        <div class="panel-heading">
                                            <span class="fa fa-users"></span> <?php echo $this->lang->line('User_List');?>
                                        </div>
                                        <!-- SEARCH BAR ADDED -->
                                        <input type="text" id="user-Search" class="form-control" placeholder="<?php echo $this->lang->line('Search'); ?>" style="margin-bottom: 15px;">
    
			                            <div class="panel-body">
    
                                            <?php echo $id; foreach($users as $user) { ?>
                                                <div class="searchable-user">
                                                <?php if($this->session->userdata('role_id') == 1 ){ ?>
                                                    <a href="<?php echo base_url();?>admin/admin/chat/<?php echo $user['id']; ?>">
                                                        <div class="userPer <?php if($userid == $user['id']) echo "uselected"; ?>">    
                                                            <?php echo $user['name'] ?> 
                                                            <?php if(chatNotification($user['id']) > 0) { ?>
                                                                <span class="badge badge-success noticount admin pull-right">
                                                                    <?php echo chatNotification($user['id']); ?>
                                                                </span>
                                                            <?php } ?>
                                                        </div>
                                                    </a>
                                                <?php } else { ?>
                                                    <a href="<?php echo base_url();?>admin/admin/chat/<?php echo $user['customers_id']; ?>">
                                                        <div class="userPer <?php if($userid == $user['customers_id']) echo "uselected"; ?>">    
                                                            <?php echo $user['client_name'] ?> 
                                                            <?php if(chatNotification($user['customers_id']) > 0) { ?>
                                                                <span class="badge badge-danger noticount admin pull-right">
                                                                    <?php echo chatNotification($user['customers_id']); ?>
                                                                </span>
                                                            <?php } ?>
                                                        </div>
                                                    </a>
                                                <?php } ?>
                                                </div>
                                                <hr>
                                            <?php } ?>
                                        </div>

			
	                            	</div>
                                </div>
					        </div>
					        <div class="col-sm-7 col-md-8">
                                <div class="m-portlet__body theme-inner-form chat-box">    
                                    <div class="panel panel-primary">
			                            <div class="panel-heading">
                                            <span class="fa fa-comment"></span> <?php echo $this->lang->line('Chat');?>
                                            <a href="" class="pull-right fa fa-refresh rehvero"></a>
                                        </div>
			                            <div class="panel-body" id="msgtop">
					                        <div class="tab-pane active" id="m_quick_sidebar_tabs_messenger" role="tabpanel">
                                                <div class="m-messenger m-messenger--message-arrow m-messenger--skin-light">
                            		                <?php if($this->uri->segment(4)){ ?>
                            		                    <div class="m-messenger__messages m-scrollable">
								                            <?php foreach($chat as $cn) { ?>
								                                <div class="m-messenger__datetime"><?php $timestamp = strtotime($cn['create_date']); echo  date("d M Y G:i",$timestamp);?>
                                                                </div>
								                                <?php if($cn['role_id'] == 1) { ?>
										                            <div class="m-messenger__wrapper">
                                                                        <div class="m-messenger__message m-messenger__message--out">
                                                                            <div class="m-messenger__message-body">
                                                                                <div class="m-messenger__message-arrow">

                                                                                </div>
                                                                                <div class="m-messenger__message-content">
                                                                                    <div class="m-messenger__message-text">
                                                                                        <?php echo $cn['message']; ?> 
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                <?php 
                                                                } else {
                                                                ?>   
                                                                <div class="m-messenger__wrapper">
                                                                    <div class="m-messenger__message m-messenger__message--in">
                                                                        <div class="m-messenger__message-pic">
                                                                            <img src="img/user4.jpg" alt="" />
                                                                        </div>
                                                                        <div class="m-messenger__message-body">
                                                                            <div class="m-messenger__message-arrow">

                                                                            </div>
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
                 
								                            <?php }  } ?>
								
                                                        </div>
                                                    <?php  } else  {  echo "<h2 style='text-align: center; '>".$this->lang->line('Select_Conversation')."</h2>"; } ?>
                                                </div>
                                            </div>
			                            </div>
			                            <div class="panel-footer">
				                            <div class="clearfix">
                                                <?php if($this->uri->segment(4)){ ?>
                                                    <?php  echo form_open_multipart();?>
                                                    <div class="col-md-12" id="msg_block">
                                                        <div class="input-group">
                                                            <input id="message" name="message" type="text" class="form-control input-sm" placeholder="Type your message here..." required />
                                                            <span class="input-group-btn">
                                                                <button class="msend" > 
                                                                    <svg width="19" height="20" viewBox="0 0 19 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                    <path d="M13.6596 0.959066L4.62965 3.95907C-1.44035 5.98907 -1.44035 9.29907 4.62965 11.3191L7.30965 12.2091L8.19965 14.8891C10.2196 20.9591 13.5396 20.9591 15.5596 14.8891L18.5696 5.86907C19.9096 1.81907 17.7096 -0.390934 13.6596 0.959066ZM13.9796 6.33907L10.1796 10.1591C10.0296 10.3091 9.83965 10.3791 9.64965 10.3791C9.45965 10.3791 9.26965 10.3091 9.11965 10.1591C8.98017 10.0179 8.90195 9.8275 8.90195 9.62907C8.90195 9.43064 8.98017 9.2402 9.11965 9.09907L12.9196 5.27907C13.2096 4.98907 13.6896 4.98907 13.9796 5.27907C14.2696 5.56907 14.2696 6.04907 13.9796 6.33907Z" fill="#0C66E4"/>
                                                                    </svg>
                                                                </button>
                                                            </span>
                                                        </div>
                                                    </div>
                                                </form>
                                                <?php } ?>
			                                </div>
                                        </div>
			                        </div>
		                        </div>
                            </div>
                        </div>
                    </div>
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
    $('#user-Search').on('keyup', function() {
        var value = $(this).val().toLowerCase();
        $('.searchable-user').filter(function() {
            $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1);
        });
    });

    $('#msgtop').animate({ scrollTop: 2000000000 }, 1000);
</script>
