(function($){
    "use strict"; // Start of use strict  

    // Letter popup
    function letter_popup(){
    	//Popup letter
		var content = $('#boxes-content').html();
		$('#boxes-content').html('');
		if(content) $('body').append('<div id="boxes">'+content+'</div>');
		if($('#boxes').html() != ''){
			var id = '#dialog';	
			//Get the screen height and width
			var maskHeight = $(document).height();
			var maskWidth = $(window).width();
		
			//Set heigth and width to mask to fill up the whole screen
			$('#mask').css({'width':maskWidth,'height':maskHeight});
			
			//transition effect		
			$('#mask').fadeIn(500);	
			$('#mask').fadeTo("slow",0.6);	
		
			//Get the window height and width
			var winH = $(window).height();
			var winW = $(window).width();
	              
			//Set the popup window to center
			$(id).css('top',  winH/2-$(id).height()/2);
			$(id).css('left', winW/2-$(id).width()/2);
		
			//transition effect
			$(id).fadeIn(2000); 	
		
			//if close button is clicked
			$('.window .close-popup').on('click',function (e) {
				//Cancel the link behavior
				e.preventDefault();
				
				$('#mask').hide();
				$('.window').hide();
			});		
			
			//if mask is clicked
			$('#mask').on('click',function () {
				$(this).hide();
				$('.window').hide();
			});
		}
		//End popup letter
    }

    /************** FUNCTION ****************/ 
    function tool_panel(){
     $('.dm-open').on('click',function(){
      $('#widget_indexdm').toggleClass('active');
      $('#indexdm_img').toggleClass('active');
      return false;
     })
     $('.dm-content .item-content').on('hover',function(){
      if(!$(this).hasClass('active')){
       $('.img-demo').removeClass('dm-scroll-img');
    setTimeout(function() {
     $('.img-demo').addClass('dm-scroll-img');
    },20);
       $(this).parent().find('.item-content').removeClass('active');
       $(this).addClass('active');
      }
   $('#indexdm_img').addClass('active');
   var img_src = $(this).find('img').attr('data-src');   
   $('.img-demo').css('display','block');
   $('.img-demo').css('background-image','url('+img_src+')');
     });
     $('.img-demo').mouseenter(function(){
   $(this).addClass('pause');
         }).mouseleave(function(){
         $(this).removeClass('pause');
     });
     var default_data = $('#s7upf-theme-style-inline-css').html();     
     $('.dm-color').on('click',function(){
      $(this).parent().find('.dm-color').removeClass('active');
      $(this).addClass('active');
      var color,color2,rgb,rgb2;
      var data = $('.get-data-css').attr('data-css');
      var sep = new RegExp('##', 'gi');
      data = data.replace(sep,'"', -1);
      // Color 1
      var color_old = $('.get-data-css').attr('data-color');
      var rgb_old = $('.get-data-css').attr('data-rgb');
      var color_df = $('.get-data-css').attr('data-colordf');
      var rgb_df = $('.get-data-css').attr('data-rgbdf');
      if($(this).attr('data-color')) $('.get-data-css').attr('data-color',$(this).attr('data-color'));
      if($(this).attr('data-rgb')) $('.get-data-css').attr('data-rgb',$(this).attr('data-rgb'));
      color = $('.get-data-css').attr('data-color');      
      rgb = $('.get-data-css').attr('data-rgb');

      // Color 2
      var color2_old = $('.get-data-css').attr('data-color2');
      var rgb2_old = $('.get-data-css').attr('data-rgb2');
      var color2_df = $('.get-data-css').attr('data-color2df');
      var rgb2_df = $('.get-data-css').attr('data-rgb2df');
      if($(this).attr('data-color2')) $('.get-data-css').attr('data-color2',$(this).attr('data-color2'));
      if($(this).attr('data-rgb2')) $('.get-data-css').attr('data-rgb2',$(this).attr('data-rgb2'));
      color2 = $('.get-data-css').attr('data-color2');
      rgb2 = $('.get-data-css').attr('data-rgb2');
      if(color && color2){
       // Color 1
       color_df = new RegExp(color_df, 'gi');
       rgb_df = new RegExp(rgb_df, 'gi');
       data = data.replace(color_df,color, -1);
       data = data.replace(rgb_df,rgb, -1);

       // Color 2
       color2_df = new RegExp(color2_df, 'gi');
       rgb2_df = new RegExp(rgb2_df, 'gi');
       data = data.replace(color2_df,color2, -1);
       data = data.replace(rgb2_df,rgb2, -1);

       if($('#s7upf-theme-style-inline-css').length > 0) $('#s7upf-theme-style-inline-css').html(data);
       else $('head').append('<style id="s7upf-theme-style-inline-css" type="text/css">'+data+'</style>');
      }
      else $('#s7upf-theme-style-inline-css').html(default_data);
      return false;
     })
    }
    function auto_width_megamenu(){
    	if($(window).width()>767){
	        var full_width = parseInt($('.container').innerWidth());
	        var menu_width = parseInt($('.product-cate-menu4').width());
	        $('.product-cate-menu4').find('.cat-mega-menu').each(function(){
	            $(this).css('width',(full_width - menu_width)-30);
	        });
	        if($('.main-nav').length > 0){
		        var main_menu_width = parseInt($('.main-nav').innerWidth());
		        var main_menu_left = parseInt($('.main-nav').offset().left);
		        $('.main-nav > ul > li.has-mega-menu').each(function(){
		        	if($(this).find('.mega-menu').length > 0){
				        var mega_menu_width = parseInt($(this).find('.mega-menu').innerWidth());
				        var li_width = parseInt($(this).innerWidth());
				        var mega_menu_left = $(this).find('.mega-menu').offset().left;
				        var li_left = $(this).offset().left;
				        var pos = li_left - mega_menu_left - mega_menu_width/2 + li_width/2;
				        var pos2 = pos + mega_menu_left + mega_menu_width - main_menu_left - main_menu_width;
				        if(pos2 > 0 ) pos = pos - pos2;
				        if(pos > 0) $(this).find('.mega-menu').css('left',pos);
				    }
		        })
		    }
	    }
    }
    //Detail Gallery
    function parallax_slider(){
    	if($('.parallax-slider').length>0){
			var ot = $('.parallax-slider').offset().top;
			var sh = $('.parallax-slider').height();
			var st = $(window).scrollTop();
			var top = (($(window).scrollTop() - ot) * 0.5) + 'px';
			if(st>ot&&st<ot+sh){
				$('.parallax-slider .item-slider').css({
					'background-position': 'center ' + top
				});
			}else{
				$('.parallax-slider .item-slider').css({
					'background-position': 'center 0'
				});
			}
		}
    }

    function product_detail_gallery(){
		$(".list_images img").on('click',function (){
			var src = $(this).attr("src");
			$(this).parents('.item-product').find(".product-thumb-link img").attr("src", src);
			$(this).parents('.item-product').find(".product-thumb-link img").attr("srcset", src);
		});
		$(".product-grid-gallery a").on('click',function (){
			$(this).parents('.product-grid-gallery').find("a").removeClass('active');
            $(this).addClass('active');
        });
	}


	if($('.content-deal-countdown').length>0){
		$('.content-deal-countdown').TimeCircles({
			fg_width: 0.03,
			bg_width: 1.2,
			text_size: 0.07,
			circle_bg_color: "#5f6062",
			time: {
				Days: {
					show: true,
					text: "Days",
					color: "#c6d43a"
				},
				Hours: {
					show: true,
					text: "Hour",
					color: "#c6d43a"
				},
				Minutes: {
					show: true,
					text: "Mins",
					color: "#c6d43a"
				},
				Seconds: {
					show: true,
					text: "Secs",
					color: "#c6d43a"
				}
			}
		}); 
	}
	//add thêm vào menu
	if($(window).width()<1201){
		$('.main-nav #menu-main-menu').append($('.search-style3').html());
		$('.main-nav #menu-main-menu').append($('.header_lienhe .wpb_text_column > .wpb_wrapper ').html());
		$('.main-nav #menu-main-menu').append($('.mang_xh > div > .wpb_wrapper ').html());
		$('.main-nav #menu-main-menu').append('<span class="tat_menu"><i class="fa fa-times" aria-hidden="true"></i></span>');
		$('.header-bottom').append($('.margin-top-80 .logo').html());
		$('.header-bottom').append($('.dich .wpb_text_column').html());
	}

	//Video popup
    if($('.video-popup-fancybox').length > 0){
        $('.video-popup-fancybox').on('click',function () {
            $('.video-popup-fancybox').fancybox({
                padding: 0,
                autoScale: !1,
                transitionIn: "none",
                transitionOut: "none",
                title: this.title,
                width: 680,
                height: 495,
                href: this.href.replace(new RegExp("watch\\?v=", "i"), "v/"),
                type: "swf",
                swf: {
                    wmode: "transparent",
                    allowfullscreen: "true"
                }
            })
        })
    }

    $('.toggle-mobile-menu').on('click',function(event){
		$('.search-mobile').toggleClass('active');
	});
    
	$('body').on('click', '.fuzzy-pupup, .close-pupups', function(e){
        e.preventDefault();
        $('body > .add-cart-message').remove();
        $('.fuzzy-pupup').removeClass('active');
    });

    $('body').on('click', '.toggle-mobile-menu', function(e){
        e.preventDefault();
        $('.fuzzy').toggleClass('active');
        $('body').addClass('overbox');
    });
    //đăng ký nhận tin
    $('.dky.nt').on('click',function(event){
		$('.dkngay').addClass('active');
	});
	$('.bongmo').on('click',function(event){
		$('.dkngay').removeClass('active');
	});
	$('.tat').on('click',function(event){
		$('.dkngay').removeClass('active');
	});

    $('body').on('click', '.fuzzy-cart', function(e){
        e.preventDefault();
        $('.fuzzy-cart').removeClass('active');
        $('.mini-cart-content').removeClass('active');
        $('body').removeClass('overlay');
    });

    $('body').on('click', '.fuzzy, .tat_menu', function(e){
        e.preventDefault();
        $('.fuzzy').removeClass('active');
        $('.main-nav').removeClass('active');
        $('.search-mobile').removeClass('active');
        $('body').removeClass('overbox');
    });

	if($('.custom-scroll').length>0){
		$('.custom-scroll').each(function(){
			$(this).mCustomScrollbar({
				advanced:{
					autoScrollOnFocus: false,
				}  
			});
		});
	}

	if($('.search-form .dropdown-list').length>0){
		$('.search-form .dropdown-list').each(function(){
			$(this).mCustomScrollbar({
				advanced:{
					autoScrollOnFocus: false,
				}  
			});
		});
	}

	//service
	$('.home6-service > .col-sm-4').hover(function(){
        $(this).addClass('active');
        $('.home6-service > .col-sm-4:nth-child(2)').addClass('xoamau');
        }, function(){
        $(this).removeClass('active');
        $('.home6-service > .col-sm-4:nth-child(2)').removeClass('xoamau');
    });
    $('.home6-service > .col-sm-4:nth-child(2)').hover(function(){
		$(this).removeClass('xoamau');
    });

    //timkiem
    $('.click_search').on('click',function(){
		$('.on-search').toggleClass('active');
	});

    //testimonial 
	$('.slider-nav').slick({
		slidesToShow:3,
		slidesToScroll: 1,
		asNavFor: '.slider-for',
		dots: false,
		height:true,
		centerMode: true,
		centerPadding: '0px',
		focusOnSelect: true,
		variableWidth: false,
		arrows: true,
		autoplay:true,
  		autoplaySpeed:5500
	});
	$('.slider-for').slick({
		slidesToShow: 1,
		slidesToScroll: 1,
		arrows: false,
		fade: true,
		asNavFor: '.slider-nav',
		autoplay:true,
  		autoplaySpeed:5500
	});


	//Compare
	$('body').on('click', '.compare-link', function(e){
        e.preventDefault();
        $('body').toggleClass('search1_active');
    });
    $('body').on('click', '#cboxOverlay , #cboxClose', function(e){
        e.preventDefault();
        $('body').removeClass('search1_active');
    });

	//Search1
    $('body').on('click', '.submit-icon-search', function(e){
        e.preventDefault();
        $('.search1').toggleClass('active');
        $('body').toggleClass('search1_active');
    });

    $('body').on('click', '.submit-icon-search-close', function(e){
        e.preventDefault();
        $('.search1').removeClass('active');
        $('body').removeClass('search1_active');
    });

	//Toggle Class
	if($('.product-categories .cat-parent').length>0){
		$('.product-categories .cat-parent .count').on('click',function(){
			$(this).parent().toggleClass('active');
			$(this).next().slideToggle();
		});
	}

	//percentage 
	$('.bar-percentage[data-percentage]').each(function () {
  		var progress = $(this);
  		var percentage = Math.ceil($(this).attr('data-percentage'));
  		$({countNum: 0}).animate({countNum: percentage}, {
    		duration: 2000,
    		easing:'linear',
    		step: function() {
      		var pct = Math.floor(this.countNum) + '%';
      		progress.text(pct) && progress.siblings().children().css('width',pct);
    	}
  		});
	});

	//pupup detail-gallery
	$('.image-lightbox').on('click',function(event){
		event.preventDefault();
		var gallerys = $(this).attr('data-gallery');
		var gallerys_array = gallerys.split(',');
		var data = [];
		if(gallerys != ''){
			for (var i = 0; i < gallerys_array.length; i++) {
				if(gallerys_array[i] != ''){
					data[i] = {};
					data[i].href = gallerys_array[i];
				}
			};
		}
		$.fancybox.open(data);
	})
	//load more ảnh
	$(function () {
	    $(".anh").slice(0, 12).show();
	    $("#loadMorev").on('click', function (e) {
	        e.preventDefault();
	        $(".anh:hidden").slice(0, 6).slideDown();
	        if ($(".anh:hidden").length == 0) {
	            $("#load").fadeOut('slow');
	        }
	        $('html,body').animate({
	            scrollTop: $(this).offset().top
	        }, 1500);
	    });
	});
	//fancy3
	$('[data-fancybox="images"]').fancybox({
		loop: true,
	    touch: false
	});
	//xóa div
	if($(window).width()<426){
		$( ".epyt-gallery-rowbreak" ).remove();
	}

	function detail_gallery(){
		if($('.detail-gallery').length>0){
			$('.detail-gallery').each(function(){
				var data=$(this).find(".carousel").data();
				var seff = $(this);
				if($(this).find(".carousel").length>0){
					$(this).find(".carousel").jCarouselLite({
						btnNext: $(this).find(".gallery-control .next"),
						btnPrev: $(this).find(".gallery-control .prev"),
						speed: 800,
						visible:data.visible,
						vertical:data.vertical,
					});
				}
				//Elevate Zoom
				$.removeData($('.detail-gallery .mid img'), 'elevateZoom');//remove zoom instance from image
				$('.zoomContainer').remove();
				$(this).find('.zoom-style1 .mid img').elevateZoom();
				$(this).find('.zoom-style2 .mid img').elevateZoom({
					scrollZoom : true
				});
				$(this).find('.zoom-style3 .mid img').elevateZoom({
					zoomType: "lens",
					lensShape: "square",
					lensSize: 150,
					borderSize:1,
					containLensZoom:true,
					responsive:true
				});
				$(this).find('.zoom-style4 .mid img').elevateZoom({
					zoomType: "inner",
					cursor: "crosshair",
					zoomWindowFadeIn: 500,
					zoomWindowFadeOut: 750
				});

				$(this).find(".carousel a").on('click',function(event) {
					event.preventDefault();
					$(this).parents('.detail-gallery').find(".carousel a").removeClass('active');
					$(this).addClass('active');
					var z_url =  $(this).find('img').attr("data-src");
					var srcset =  $(this).find('img').attr("data-srcset");
					$(this).parents('.detail-gallery').find(".mid img").attr("src", z_url);
					$(this).parents('.detail-gallery').find(".mid img").attr("srcset", srcset);
					$('.zoomWindow,.zoomLens').css('background-image','url("'+z_url+'")');
					$.removeData($('.detail-gallery .mid img'), 'elevateZoom');//remove zoom instance from image
					$('.zoomContainer').remove();
					$(this).parents('.detail-gallery').find('.zoom-style1 .mid img').elevateZoom();
					$(this).parents('.detail-gallery').find('.zoom-style2 .mid img').elevateZoom({
						scrollZoom : true
					});
					$(this).parents('.detail-gallery').find('.zoom-style3 .mid img').elevateZoom({
						zoomType: "lens",
						lensShape: "square",
						lensSize: 150,
						borderSize:1,
						containLensZoom:true,
						responsive:true
					});
					$(this).parents('.detail-gallery').find('.zoom-style4 .mid img').elevateZoom({
						zoomType: "inner",
						cursor: "crosshair",
						zoomWindowFadeIn: 500,
						zoomWindowFadeOut: 750
					});
				});
				$('input[name="variation_id"]').on('change',function(){
					var z_url =  seff.find('.mid img').attr("src");
					$('.zoomWindow,.zoomLens').css('background-image','url("'+z_url+'")');
					$.removeData($('.detail-gallery .mid img'), 'elevateZoom');//remove zoom instance from image
					$('.zoomContainer').remove();
					$('.detail-gallery').find('.zoom-style1 .mid img').elevateZoom();
					$('.detail-gallery').find('.zoom-style2 .mid img').elevateZoom({
						scrollZoom : true
					});
					$('.detail-gallery').find('.zoom-style3 .mid img').elevateZoom({
						zoomType: "lens",
						lensShape: "square",
						lensSize: 150,
						borderSize:1,
						containLensZoom:true,
						responsive:true
					});
					$('.detail-gallery').find('.zoom-style4 .mid img').elevateZoom({
						zoomType: "inner",
						cursor: "crosshair",
						zoomWindowFadeIn: 500,
						zoomWindowFadeOut: 750
					});
				})
			});
		}
	}
    
    // Menu fixed
    function fixed_header(){
        var menu_element;
        menu_element = $('.main-nav:not(.menu-fixed-content)').closest('.vc_row');
        if($('.menu-sticky-on').length > 0 && $(window).width()>100){           
            var menu_class = $('.main-nav').attr('class');
            var header_height = $("#header").height()+20;
            var ht = header_height + 20;
            var st = $(window).scrollTop();

            if(!menu_element.hasClass('header-fixed') && menu_element.attr('data-vc-full-width') == 'true') menu_element.addClass('header-fixed');
            if(st>header_height){               
                if(menu_element.attr('data-vc-full-width') == 'true'){
                    if(st > ht) menu_element.addClass('active');
                    else menu_element.removeClass('active');
                    menu_element.addClass('fixed-header');
                }
                else{
                    if(st > ht) menu_element.parent().parent().addClass('active');
                    else menu_element.parent().parent().removeClass('active');
                    if(!menu_element.parent().parent().hasClass('fixed-header')){
                        menu_element.wrap( "<div class='menu-fixed-content fixed-header "+menu_class+"'><div class='container'></div></div>" );
                    }
                }
            }else{
                menu_element.removeClass('active');
                if(menu_element.attr('data-vc-full-width') == 'true') menu_element.removeClass('fixed-header');
                else{
                    if(menu_element.parent().parent().hasClass('fixed-header')){
                        menu_element.unwrap();
                        menu_element.unwrap();
                    }
                }
            }
        }
        else{
            menu_element.removeClass('active');
            if(menu_element.attr('data-vc-full-width') == 'true') menu_element.removeClass('fixed-header');
            else{
                if(menu_element.parent().parent().hasClass('fixed-header')){
                    menu_element.unwrap();
                    menu_element.unwrap();
                }
            }
        }
    }
    //Menu Responsive
    function fix_click_menu(){
    	if($(window).width()<768){
			if($('.btn-toggle-mobile-menu').length>0){
				return false;
			}
			else $('.main-nav li.menu-item-has-children,.main-nav li.has-mega-menu').append('<span class="btn-toggle-mobile-menu"></span>');
		}
		else{
			$('.btn-toggle-mobile-menu').remove();
			$('.main-nav .sub-menu,.main-nav .mega-menu').slideDown('fast');
		}
    }
	function rep_menu(){
		$('.toggle-mobile-menu').on('click',function(event){
			event.preventDefault();
			$(this).parents('.main-nav').toggleClass('active');
		});
		$('.main-nav').on('click','.btn-toggle-mobile-menu',function(event){
			$(this).toggleClass('active');
			$(this).prev().stop(true,false).slideToggle('fast');
		});
		$('.main-nav').on('click','.menu-item > a[href="#"]',function(event){
			event.preventDefault();
			$(this).toggleClass('active');
			$(this).next().stop(true,false).slideToggle('fast');
		});
	}

    function background(){
		$('.bg-slider .item-slider').each(function(){
			$(this).find('.banner-thumb a img').css('height',$(this).find('.banner-thumb a img').attr('height'));
			var src=$(this).find('.banner-thumb a img').attr('src');
			$(this).css('background-image','url("'+src+'")');
		});	
	}
    
    function fix_variable_product(){
    	//Fix product variable thumb    	
        $('body .variations_form select').live('change',function(){
            var id = $('input[name="variation_id"]').val();
            if(id){
                $('.product-gallery #bx-pager').find('a[data-variation_id="'+id+'"]').trigger( 'click' );
            }
        })
        // variable product
        if($('.wrap-attr-product1.special').length > 0){
            $('.attr-filter ul li a').live('click',function(){
                event.preventDefault();
                $(this).parents('ul').find('li').removeClass('active');
                $(this).parent().addClass('active');
                var attribute = $(this).parent().attr('data-attribute');
                var id = $(this).parents('ul').attr('data-attribute-id');
                $('#'+id).val(attribute);
                $('#'+id).trigger( 'change' );
                $('#'+id).trigger( 'focusin' );
                return false;
            })
            $('.attr-hover-box').on('hover',function(){
                var seff = $(this);
                var old_html = $(this).find('ul').html();
                var current_val = $(this).find('ul li.active').attr('data-attribute');
                $(this).next().find('select').trigger( 'focusin' );
                var content = '';
                $(this).next().find('select').find('option').each(function(){
                    var val = $(this).attr('value');
                    var title = $(this).html();
                    var el_class = '';
                    if(current_val == val) el_class = ' class="active"';
                    if(val != ''){
                        content += '<li'+el_class+' data-attribute="'+val+'"><a href="#" class="bgcolor-'+val+'"><span></span>'+title+'</a></li>';
                    }
                })
                if(old_html != content) $(this).find('ul').html(content);
            })
            $('body .reset_variations').live('click',function(){
                $('.attr-hover-box').each(function(){
                    var seff = $(this);
                    var old_html = $(this).find('ul').html();
                    var current_val = $(this).find('ul li.active').attr('data-attribute');
                    $(this).next().find('select').trigger( 'focusin' );
                    var content = '';
                    $(this).next().find('select').find('option').each(function(){
                        var val = $(this).attr('value');
                        var title = $(this).html();
                        var el_class = '';
                        if(current_val == val) el_class = ' class="active"';
                        if(val != ''){
	                        content += '<li'+el_class+' data-attribute="'+val+'"><a href="#" class="bgcolor-'+val+'"><span></span>'+title+'</a></li>';
	                    }
                    })
                    if(old_html != content) $(this).find('ul').html(content);
                    $(this).find('ul li').removeClass('active');
                })
            })
        }
        //end
    }
    
    function afterAction(){
		this.$elem.find('.owl-item').each(function(){
			var check = $(this).hasClass('active');
			if(check==true){
				$(this).find('.animated').each(function(){
					var anime = $(this).attr('data-animated');
					$(this).addClass(anime);
				});
				if($(this).find('video').length>0){
    				$(this).find('video').get(0).play();
   				}
			}else{
				$(this).find('.animated').each(function(){
					var anime = $(this).attr('data-animated');
					$(this).removeClass(anime);
				});
			}
		})
	}
    function s7upf_qty_click(){
    	//QUANTITY CLICK
		$("body").on("click",".detail-qty .qty-up",function(){
            var min = $(this).prev().attr("min");
            var max = $(this).prev().attr("max");
            var step = $(this).prev().attr("step");
            if(step === undefined) step = 1;
            if(max !==undefined && Number($(this).prev().val())< Number(max) || max === undefined || max === ''){ 
                if(step!='') $(this).prev().val(Number($(this).prev().val())+Number(step));
            }
            $( 'div.woocommerce > form .button[name="update_cart"]' ).prop( 'disabled', false );
            return false;
        })
        $("body").on("click",".detail-qty .qty-down",function(){
            var min = $(this).next().attr("min");
            var max = $(this).next().attr("max");
            var step = $(this).next().attr("step");
            if(step === undefined) step = 1;
            if(Number($(this).next().val()) > Number(min)){
	            if(min !==undefined && $(this).next().val()>min || min === undefined || min === ''){
	                if(step!='') $(this).next().val(Number($(this).next().val())-Number(step));
	            }
	        }
	        $( 'div.woocommerce > form .button[name="update_cart"]' ).prop( 'disabled', false );
	        return false;
        })
        $("body").on("keyup change","input.qty-val",function(){
        	$( 'div.woocommerce > form .button[name="update_cart"]' ).prop( 'disabled', false );
        })
		//END
    }
    
    function s7upf_owl_slider(){
    	//Carousel Slider
		if($('.sv-slider').length>0){
			$('.sv-slider').each(function(){
				var seff = $(this);
				var item = seff.attr('data-item');
				var speed = seff.attr('data-speed');
				var itemres = seff.attr('data-itemres');
				var animation = seff.attr('data-animation');
				var nav = seff.attr('data-navigation');
				var pag = seff.attr('data-pagination');
				var text_prev = seff.attr('data-prev');
				var text_next = seff.attr('data-next');
				var pagination = false, navigation= false, singleItem = false;
				var autoplay;
				if(speed != '') autoplay = speed;
				else autoplay = false;
				// Navigation
				if(nav) navigation = true;
				if(pag) pagination = true;
				if(animation != ''){
					singleItem = true;
					item = '1';
				}
				else animation = false;
				var prev_text = '<i class="fa fa-angle-left" aria-hidden="true"></i>';
				var next_text = '<i class="fa fa-angle-right" aria-hidden="true"></i>';
				if(text_prev) prev_text = text_prev;
				if(text_next) next_text = text_next;
				if(itemres == '' || itemres === undefined){
					if(item == '1') itemres = '0:1,480:1,768:1,1200:1';
					if(item == '2') itemres = '0:1,480:1,768:2,1200:2';
					if(item == '3') itemres = '0:1,480:2,768:2,992:3';
					if(item == '4') itemres = '0:1,480:2,840:3,1200:4';
					if(item >= '5') itemres = '0:1,480:2,768:3,1024:4,1200:'+item;
				}				
				itemres = itemres.split(',');
				var i;
				for (i = 0; i < itemres.length; i++) { 
				    itemres[i] =  $.map(itemres[i].split(':'), function(value){
					    return parseInt(value, 10);
					});
				}
				seff.owlCarousel({
					items: item,
					itemsCustom: itemres,
					autoPlay:autoplay,
					pagination: pagination,
					navigation: navigation,
					navigationText:[prev_text,next_text],
					singleItem : singleItem,
					beforeInit:background,
					addClassActive : true,
					afterAction: afterAction,
					touchDrag: true,
					transitionStyle : animation
				});
			});			
		}
    }

    function s7upf_all_slider(seff,number){
    	if(!seff) seff = $('.smart-slider');
    	if(!number) number = '';
    	//Carousel Slider
		if(seff.length>0){
			seff.each(function(){
				var seff = $(this);
				var item = seff.attr('data-item'+number);
				var speed = seff.attr('data-speed');
				var itemres = seff.attr('data-itemres'+number);
				var text_prev = seff.attr('data-prev');
				var text_next = seff.attr('data-next');
				var nav = seff.attr('data-navigation');
				var pag = seff.attr('data-pagination');
				var animation = seff.attr('data-animation');
				var autoplay;
				var pagination = false, navigation= false, singleItem = false;
				if(animation != '' && animation !== undefined){
					singleItem = true;
					item = '1';
				}
				if(speed === undefined) speed = '';
				if(speed != '') autoplay = speed;
				else autoplay = false;
				if(item == '' || item === undefined) item = 1;
				if(itemres === undefined) itemres = '';
				var prev_text = '<i class="fa fa-angle-left" aria-hidden="true"></i>';
				var next_text = '<i class="fa fa-angle-right" aria-hidden="true"></i>';
				if(text_prev) prev_text = text_prev;
				if(text_next) next_text = text_next;
				if(nav) navigation = true;
				if(pag) pagination = true;
				// Item responsive
				if(itemres == '' || itemres === undefined){
					if(item == '1') itemres = '0:1,480:1,768:1,1200:1';
					if(item == '2') itemres = '0:1,480:1,768:2,1200:2';
					if(item == '3') itemres = '0:1,480:2,768:2,992:3';
					if(item == '4') itemres = '0:1,480:2,840:3,1200:4';
					if(item >= '5') itemres = '0:1,480:2,768:3,1200:'+item;
				}				
				itemres = itemres.split(',');
				var i;
				for (i = 0; i < itemres.length; i++) { 
				    itemres[i] =  $.map(itemres[i].split(':'), function(value){
					    return parseInt(value, 10);
					});
				}
				seff.owlCarousel({
					items: item,
					itemsCustom: itemres,
					autoPlay:autoplay,
					pagination: pagination,
					navigation: navigation,
					navigationText:[prev_text,next_text],
					addClassActive : true,
					touchDrag: true,
					singleItem : singleItem,
					transitionStyle : animation,
					afterAction: afterAction,
				});
			});			
		}
    }

    /************ END FUNCTION **************/  
	$(document).ready(function(){
		//Menu Responsive 
		letter_popup();
		parallax_slider();
		fix_click_menu();
		rep_menu();
		s7upf_qty_click();
		detail_gallery();
		product_detail_gallery();
		tool_panel();
		//fix row bg
		var btnProductLink = "<a class='vc-btn-product-link' href='#'>Liên hệ CSKH.</a>";     
		$(".vc_home_product_list .desc-block").append(btnProductLink);
		$('.fix-row-bg').each(function(){
			var row_class = $(this).attr('class');
			row_class = row_class.replace('vc_row wpb_row','');
			$(this).removeClass(row_class);
			$(this).removeClass('fix-row-bg');
			$(this).wrap('<div class="wrap-vc-row'+row_class+'"></div>');
		})
		// remove
		$( ".vc_slider_custom  .item-image-list-slider .text" ).remove();

		//
		$(".vc_page_products .img-lable a").removeAttr( "href" );
		//Cat search
		$('.select-cat-search').on('click',function(event){
			event.preventDefault();
			$(this).parents('ul').find('li').removeClass('active');
			$(this).parent().addClass('active');
			var x = $(this).attr('data-filter');
			if(x){
				x = x.replace('.','');
				$('.cat-value').val(x);
			}
			else $('.cat-value').val('');
			$('.current-search-cat').text($(this).text());
		});
		//lên top
		// aside-box cart
		$('#close-minicart').on('click',function(event){
			$(this).removeClass('overlay');
			$('body').removeClass('overlay');
			$('.mini-cart-content').removeClass('active');
			$('.fuzzy-cart').removeClass('active');
		});
		$('.mini-cart-box.aside-box .mini-cart-link').on('click',function(event){
			event.preventDefault();
			event.stopPropagation();
			$('body').addClass('overlay');
			$(this).next().addClass('active');
			$('.fuzzy-cart').toggleClass('active');
		});
		//Count item cart
        if($(".get-cart-number").length){
            var count_cart_item = $(".get-cart-number").val();
            $(".set-cart-number").html(count_cart_item);
        }  
		$('.detail-tab-title').find('li').first().addClass('active');
		//List Item Masonry 
		if($('.blog-grid-view.list-masonry .list-post-wrap').length>0){
			$('.blog-grid-view.list-masonry .list-post-wrap').masonry();
		}
		if($('.product-grid-view.list-masonry .list-product-wrap').length>0){
			$('.product-grid-view.list-masonry .list-product-wrap').masonry();
		}
		//Fix mailchimp
        $('.sv-mailchimp-form').each(function(){
            var placeholder = $(this).attr('data-placeholder');
            var submit = $(this).attr('data-submit');
            if(placeholder) $(this).find('input[name="EMAIL"]').attr('placeholder',placeholder);
            if(submit) $(this).find('input[type="submit"]').val(submit);
        })      
        //Back To Top
		$('.scroll-top').on('click',function(event){
			event.preventDefault();
			$('html, body').animate({scrollTop:0}, 'slow');
		});	
		//Size Chart
		$('.click-chart').on('click',function(event){
			$('.size_chart_img').addClass("active");
			$('.fuzzy_size_chart').toggleClass("active");
		});
		$('.size_chart_img .close').on('click',function(event){
			$('.size_chart_img').removeClass("active");
			$('.fuzzy_size_chart').removeClass("active");
		});
		$('.fuzzy_size_chart').on('click',function(event){
			$('.size_chart_img').removeClass("active");
			$('.fuzzy_size_chart').removeClass("active");
		});

	});

	$(window).load(function(){
		if(document.getElementById("vc_posts") !== null) {
			var leftMarginPostBlock = document.getElementById("vc_posts").offsetLeft;
			leftMarginPostBlock = -leftMarginPostBlock - 7
			$("#vc_posts .blog-slider-view").css("margin-left", leftMarginPostBlock+"px");
		}
		if(document.getElementById("vc_banner_2item") !== null) {
			var rightMarginBannerBlock = document.getElementById("vc_banner_2item").offsetLeft;
			rightMarginBannerBlock = -rightMarginBannerBlock
			console.log('rightMarginBannerBlock', rightMarginBannerBlock);
			$(".vc_child_row").css("margin-right", rightMarginBannerBlock+"px");
		}

		s7upf_owl_slider();
		s7upf_all_slider();
		auto_width_megamenu();		
		//Pre Load
		$('body').removeClass('preload');
		// Fix height slider
		$('.banner-slider .banner-info').each(function(){
			var height_content = $(this).find('.slider-content-text')["0"].clientHeight;
			$(this).css('height',height_content);
		})
		// menu fixed onload
		$("#header").css('min-height','');
        if($(window).width()>1024){
            $("#header").css('min-height',$("#header").height());
            fixed_header();
        }
        else{
            $("#header").css('min-height','');
        }
        // rtl-enable
        if($('.rtl-enable').length > 0){
            $('*[data-vc-full-width="true"]').each(function(){
            	var pleft = $(this).css('padding-left');
            	pleft = parseFloat(pleft) - 15;
            	$(this).css('padding-left',pleft);
            })
        }
        if($('.rtl-enable .padinglech ').length > 0){
            $('*[data-vc-full-width="true"].padinglech').each(function(){
            	var pleft = $(this).css('padding-left');
            	pleft = parseFloat(pleft) + 15;
            	$(this).css('padding-left',pleft);
            })
        }
		//menu fix
		if($(window).width() >= 768){
			var c_width = $(window).width();
			$('.main-nav ul ul ul.sub-menu').each(function(){
				var left = $(this).offset().left;
				if(c_width - left < 180){
					$(this).css({"left": "-100%"})
				}
				if(left < 180){
					$(this).css({"left": "100%"})
				}
			})
		}
	});// End load

	/* ---------------------------------------------
     Scripts resize
     --------------------------------------------- */
    var w_width = $(window).width();
    $(window).resize(function(){
    	auto_width_megamenu();
    	fix_click_menu();
    	if($('#dialog').length > 0){
	    	// popup resize
			var id = '#dialog';	
			//Get the screen height and width
			var maskHeight = $(document).height();
			var maskWidth = $(window).width();
		
			//Set heigth and width to mask to fill up the whole screen
			$('#mask').css({'width':maskWidth,'height':maskHeight});
		
			//Get the window height and width
			var winH = $(window).height();
			var winW = $(window).width();
	              
			//Set the popup window to center
			$(id).css('top',  winH/2-$(id).height()/2);
			$(id).css('left', winW/2-$(id).width()/2);
		}
        $("#header").css('min-height','');
        var c_width = $(window).width();
        setTimeout(function() {
            if($('.rtl-enable').length > 0 && c_width != w_width){
                $('*[data-vc-full-width="true"]').each(function(){
                 var pleft = $(this).css('padding-left');
              pleft = parseFloat(pleft) - 15;
              $(this).css('padding-left',pleft);
                })
                w_width = c_width;
            }
        }, 2000);
    });

	jQuery(window).scroll(function(){
		fixed_header();
		parallax_slider();
		if($(window).width()>1024){
            $("#header").css('min-height',$("#header").height());
            fixed_header();
        }
        else{
            $("#header").css('min-height','');
        }
		//Scroll Top
		if($(this).scrollTop()>$(this).height()){
			$('.scroll-top').addClass('active');
		}else{
			$('.scroll-top').removeClass('active');
		}
	});// End Scroll

	$.fn.tawcvs_variation_swatches_form = function () {
        return this.each( function() {
            var $form = $( this ),
                clicked = null,
                selected = [];

            $form
                .addClass( 'swatches-support' )
                .on( 'click', '.swatch', function ( e ) {
                    e.preventDefault();
                    var $el = $( this ),
                        $select = $el.closest( '.value' ).find( 'select' ),
                        attribute_name = $select.data( 'attribute_name' ) || $select.attr( 'name' ),
                        value = $el.data( 'value' );

                    $select.trigger( 'focusin' );

                    // Check if this combination is available
                    if ( ! $select.find( 'option[value="' + value + '"]' ).length ) {
                        $el.siblings( '.swatch' ).removeClass( 'selected' );
                        $select.val( '' ).change();
                        $form.trigger( 'tawcvs_no_matching_variations', [$el] );
                        return;
                    }

                    clicked = attribute_name;

                    if ( selected.indexOf( attribute_name ) === -1 ) {
                        selected.push(attribute_name);
                    }

                    if ( $el.hasClass( 'selected' ) ) {
                        $select.val( '' );
                        $el.removeClass( 'selected' );

                        delete selected[selected.indexOf(attribute_name)];
                    } else {
                        $el.addClass( 'selected' ).siblings( '.selected' ).removeClass( 'selected' );
                        $select.val( value );
                    }

                    $select.change();
                } )
                .on( 'click', '.reset_variations', function () {
                    $( this ).closest( '.variations_form' ).find( '.swatch.selected' ).removeClass( 'selected' );
                    selected = [];
                } )
                .on( 'tawcvs_no_matching_variations', function() {
                    window.alert( wc_add_to_cart_variation_params.i18n_no_matching_variations_text );
                } );
        } );
    };

    $( function () {
        $( '.variations_form' ).tawcvs_variation_swatches_form();
        $( document.body ).trigger( 'tawcvs_initialized' );
    } );

})(jQuery);