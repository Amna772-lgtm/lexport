
// Start Function
(function($, window, document, undefined) {

    'use strict';

    //*********************************************
    //  REVOLUTION SLIDER FOR HOME
    //*********************************************

        var tpj=jQuery;
        var revapi2;
        if(tpj("#home_slider").revolution == undefined){
            revslider_showDoubleJqueryError("#home_slider");
        }else{
            revapi2 = tpj("#home_slider").show().revolution({
                sliderType:"standard",
                jsFileLocation:"js/revolutionslider/",
                sliderLayout:"fullscreen",
                delay:9000,
                navigation: {
                    arrows: {
                        style: "uranus",
                        enable: false,
                        hide_onmobile: true,
                        hide_onleave: true,
                        left: {
                            h_align: "left",
                            v_align: "center",
                            h_offset: 10,
                            v_offset: 0
                        },
                        right: {
                            h_align: "right",
                            v_align: "center",
                            h_offset: 10,
                            v_offset: 0
                        }
                    },
                    bullets: {
                        enable: true,
                        hide_onmobile: false,
                        style: "hermes",
                        hide_onleave: false,
                        direction: "vertical",
                        h_align: "right",
                        v_align: "center",
                        h_offset: 20,
                        v_offset: 0,
                        space: 5,
                        tmp: ''
                    },
                    touch: {
                        touchenabled: "on",
                        swipe_threshold: 75,
                        swipe_min_touches: 1,
                        swipe_direction: "horizontal",
                        drag_block_vertical: false
                    }
                },
                responsiveLevels:[1240,1240,778,480],
                visibilityLevels:[1240,1240,778,480],
                gridwidth:[1240,1240,778,480],
                gridheight:[868,640,480,410],
                parallax: {
                    type:"scroll",
                    origo:"slidercenter",
                    speed:2000,
                    levels:[2,3,4,5,8,10,12,16,30],
                },
                shadow:0,
                spinner:"off",
                stopLoop:"off",
                stopAfterLoops:-1,
                stopAtSlide:-1,
                disableProgressBar:"on",
                shuffle:"off",
            });
        }


    //*********************************************
    //  PORTFOLIO SECTION
    //*********************************************

        $('#works #items').cubeportfolio({
            filters: '#works #filters',
            loadMore: '#loadmore',
            loadMoreAction: 'click',
            gridAdjustment: 'responsive',
            layoutMode: 'grid',
            mediaQueries: [{
                width: 1500,
                cols: 4
            }, {
                width: 900,
                cols: 3
            }, {
                width: 770,
                cols: 2
            }, {
                width: 640,
                cols: 2
            }, {
                width: 480,
                cols: 1,
                gapHorizontal: 0,
                gapVertical: 0
            }],
            defaultFilter: '*',
            animationType: 'quicksand',
            gapHorizontal: 20,
            gapVertical: 20,
            caption: 'zoom',
            displayType: 'sequentially',
            displayTypeSpeed: 0,
        });


    //*********************************************
    //  CATEGORIES SECTION
    //*********************************************

        $('#category-items').cubeportfolio({
            filters: '#category-filter',
            loadMore: '#category-load-more',
            loadMoreAction: 'click',
            layoutMode: 'grid',
            defaultFilter: '*',
            animationType: 'scaleSides',
            gapHorizontal: 0,
            gapVertical: 0,
            gridAdjustment: 'responsive',
            mediaQueries: [{
                width: 1500,
                cols: 4
            }, {
                width: 1200,
                cols: 4
            }, {
                width: 640,
                cols: 2
            }, {
                width: 480,
                cols: 1
            }],
            caption: 'zoom',
            displayType: 'fadeIn',
            displayTypeSpeed: 400
        });


    //*********************************************
    //  BACKGROUND VIDEO SECTION
    //*********************************************

        var revapi42;
        if(tpj("#background_video").revolution == undefined){
            revslider_showDoubleJqueryError("#background_video");
        }else{
            revapi42 = tpj("#background_video").show().revolution({
                sliderType:"standard",
                jsFileLocation:"js/revolutionslider/",
                sliderLayout:"fullwidth",
                dottedOverlay:"none",
                delay:9000,
                navigation: {
                    onHoverStop:"off",
                },
                responsiveLevels:[1240,1024,778,480],
                visibilityLevels:[1240,1024,778,480],
                gridwidth:[1240,1024,778,480],
                gridheight:[700,500,400,270],
                lazyType:"none",
                shadow:0,
                spinner:"off",
                stopLoop:"off",
                stopAfterLoops:0,
                stopAtSlide:1,
                shuffle:"off",
                autoHeight:"off",
                disableProgressBar:"on",
                hideThumbsOnMobile:"off",
                hideSliderAtLimit:0,
                hideCaptionAtLimit:0,
                hideAllCaptionAtLilmit:0,
                debugMode:false,

                fallbacks: {
                    simplifyAll:"off",
                    nextSlideOnWindowFocus:"off",
                    disableFocusListener:false,
                }
            });
        }

    //*********************************************
    //  FAQ OPTIONS ON QUADRA MODAL
    //*********************************************

        // init cubeportfolio
        $('#js-grid-faq').cubeportfolio({
            filters: '#js-filters-faq',
            defaultFilter: '*',
            animationType: 'sequentially',
            gridAdjustment: 'default',
            displayType: 'default',
            caption: 'expand',
            gapHorizontal: 0,
            gapVertical: 0,
        });

    //*********************************************
    //  HOME CONTENT ANIMATION
    //*********************************************

        // Moving Etna Home Content
        $('#etna_home_notes .home-content').each(function(){
            var container = $(this), winWidth = $(window).width() - 1170, conWidth = $(this).find('.right').width(), boxes = $(this).find('.content-boxes');
            if(winWidth > 200){
                $(boxes).css({'width': conWidth - winWidth / 2 + 'px'});
                $(window).resize(function(){ var newContWidth = $(container).find('.right').width(), newWinWidth = $(window).width() - 1170; $(boxes).css({'width': newContWidth - newWinWidth / 2 + 'px'}); });
            }
            $(container).addClass("hiding"); 
            // Home Text Slider's Position
            $(window).on( 'scroll', function(){ var $this = $(this);
                if ($this.scrollTop() > 3) {$('#etna_home_notes .home-content').removeClass("hiding");} else {$('#etna_home_notes .home-content').addClass("hiding");}
                if($(window).width() < 1300){ if ($this.scrollTop() > 20) {$('#etna_home_notes .left-note').fadeOut(300)} else {$('#etna_home_notes .left-note').fadeIn(300)}}
            });
        });

    //*********************************************
    //  TEAM TYPE 2 SCRIPTS
    //*********************************************

        // Team type 2 scripts
        $.fn.team2Function = function() {
            $('.team-type-2 .member').each(function(){
                var descBody = $(this).find('.member-description'),
                    $this = $(this),
                    descBodyHeight = $(descBody).height() / 2,
                    bodyHeight = $(this).find('.member-body').height() / 2;
                if(!!('ontouchstart' in window)){//check for touch device
                    $('div').not($this).on('touchstart touchmove', function (e) {
                         $(descBody).css({'top': 0});
                    });
                    $('body').on('touchstart touchmove', function (e) {
                         $(descBody).css({'top': 0});
                    });
                    $this.on('touchstart touchend touchmove', function (e) {
                        $(descBody).css({'top': - bodyHeight - descBodyHeight - 20});
                    });
                }else{
                    $(this).on('mouseover', function(){
                        var descBody = $(this).find('.member-description'),
                        descBodyHeight = $(descBody).height() / 2,
                        bodyHeight = $(this).find('.member-body').height() / 2;
                        $(descBody).css({'top': - bodyHeight - descBodyHeight - 20});
                    });
                    $(this).on('mouseout', function(){
                        $(descBody).css({'top': 0});
                    });
                }
            });
        }
        $('.team-type-2').team2Function();
        $(window).resize(function(){ $('.team-type-2').team2Function(); });


// End Function
})(jQuery, window, document);
