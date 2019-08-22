/* =================================
------------------------------------
	Divisima | eCommerce Template
	Version: 1.0
 ------------------------------------
 ====================================*/


'use strict';


$(window).on('load', function() {
	/*------------------
		Preloder
	--------------------*/
	$(".loader").fadeOut();
	$("#preloder").delay(400).fadeOut("slow");

});

(function($) {
	/*------------------
		Navigation
	--------------------*/
	$('.main-menu').slicknav({
		prependTo:'.main-navbar .container',
		closedSymbol: '<i class="flaticon-right-arrow"></i>',
		openedSymbol: '<i class="flaticon-down-arrow"></i>'
	});


	/*------------------
		ScrollBar
	--------------------*/
	$(".cart-table-warp, .product-thumbs").niceScroll({
		cursorborder:"",
		cursorcolor:"#afafaf",
		boxzoom:false
	});


	/*------------------
		Category menu
	--------------------*/
	$('.category-menu > li').hover( function(e) {
		$(this).addClass('active');
		e.preventDefault();
	});
	$('.category-menu').mouseleave( function(e) {
		$('.category-menu li').removeClass('active');
		e.preventDefault();
	});


	/*------------------
		Background Set
	--------------------*/
	$('.set-bg').each(function() {
		var bg = $(this).data('setbg');
		$(this).css('background-image', 'url(' + bg + ')');
	});



	/*------------------
		Hero Slider
	--------------------*/
	var hero_s = $(".hero-slider");
    hero_s.owlCarousel({
        loop: true,
        margin: 0,
        nav: true,
        items: 1,
        dots: true,
        animateOut: 'fadeOut',
    	animateIn: 'fadeIn',
        navText: ['<i class="flaticon-left-arrow-1"></i>', '<i class="flaticon-right-arrow-1"></i>'],
        smartSpeed: 1200,
        autoHeight: false,
        autoplay: true,
        onInitialized: function() {
        	var a = this.items().length;
            $("#snh-1").html("<span>1</span><span>" + a + "</span>");
        }
    }).on("changed.owl.carousel", function(a) {
        var b = --a.item.index, a = a.item.count;
    	$("#snh-1").html("<span> "+ (1 > b ? b + a : b > a ? b - a : b) + "</span><span>" + a + "</span>");

    });

	hero_s.append('<div class="slider-nav-warp"><div class="slider-nav"></div></div>');
	$(".hero-slider .owl-nav, .hero-slider .owl-dots").appendTo('.slider-nav');



	/*------------------
		Brands Slider
	--------------------*/
	$('.product-slider').owlCarousel({
		loop: true,
		nav: true,
		dots: false,
		margin : 30,
		autoplay: true,
		navText: ['<i class="flaticon-left-arrow-1"></i>', '<i class="flaticon-right-arrow-1"></i>'],
		responsive : {
			0 : {
				items: 1,
			},
			480 : {
				items: 2,
			},
			768 : {
				items: 3,
			},
			1200 : {
				items: 4,
			}
		}
	});


	/*------------------
		Popular Services
	--------------------*/
	$('.popular-services-slider').owlCarousel({
		loop: true,
		dots: false,
		margin : 40,
		autoplay: true,
		nav:true,
		navText:['<i class="fa fa-angle-left"></i>','<i class="fa fa-angle-right"></i>'],
		responsive : {
			0 : {
				items: 1,
			},
			768 : {
				items: 2,
			},
			991: {
				items: 3
			}
		}
	});


	/*------------------
		Accordions
	--------------------*/
	$('.panel-link').on('click', function (e) {
		$('.panel-link').removeClass('active');
		var $this = $(this);
		if (!$this.hasClass('active')) {
			$this.addClass('active');
		}
		e.preventDefault();
	});


	/*-------------------
		Range Slider
	--------------------- */
	var rangeSlider = $(".price-range"),
		minamount = $("#minamount"),
		maxamount = $("#maxamount"),
		minPrice = rangeSlider.data('min'),
		maxPrice = rangeSlider.data('max');
	rangeSlider.slider({
		range: true,
		min: minPrice,
		max: maxPrice,
		values: [minPrice, maxPrice],
		slide: function (event, ui) {
			minamount.val('$' + ui.values[0]);
			maxamount.val('$' + ui.values[1]);
		}
	});
	minamount.val('$' + rangeSlider.slider("values", 0));
	maxamount.val('$' + rangeSlider.slider("values", 1));


	



	/*------------------
		Single Product
	--------------------*/
	$('.product-thumbs-track > .pt').on('click', function(){
		$('.product-thumbs-track .pt').removeClass('active');
		$(this).addClass('active');
		var imgurl = $(this).data('imgbigurl');
		var bigImg = $('.product-big-img').attr('src');
		if(imgurl != bigImg) {
			$('.product-big-img').attr({src: imgurl});
			$('.zoomImg').attr({src: imgurl});
		}
	});


	$('.product-pic-zoom').zoom();

	//js tự viết thêm ============================================

	$(document).on('click', '.tabShowHangsx', function(e) {
		e.preventDefault();
	});
	
	//Add sản phẩm vào giỏ hàng
	$(document).on('click', '.add-card', function(e) {
		e.preventDefault();
		let id = $(this).data('id');
		console.log(id);
		$.ajax({
			type: 'POST',
			dataType: 'json',
			url: '/cart/addToCart',
			data: {'id': id},
			success: function() {
				$.notify.defaults({globalPosition: 'bottom right'})
				$.notify("Add completed !", "success", { position:'bottom right' });
				$('#up-item-shopping-card').load('#up-item-shopping-card .up-item-shopping-card');
			}
		})
	});

	/*-------------------
		Quantity change
	--------------------- */
    var proQty = $(document);
	proQty.on('click', '.pro-qty .qtybtn', function () {
		var $button = $(this);
		var oldValue = $button.parent().find('input').val();
		if ($button.hasClass('inc')) {
			var newVal = parseFloat(oldValue) + 1;
		} else {
			// Don't allow decrementing below zero
			if (oldValue > 0) {
				var newVal = parseFloat(oldValue) - 1;
			} else {
				newVal = 0;
			}
		}
		$button.parent().find('input').val(newVal);
		let id = $(this).data('id');
		console.log(id);
		$.ajax({
			type: 'post',
			url: '/cart/updateCart/' + id,
			data: {'quantity': newVal},
			success: function() {
				console.log(1);
				$('#cart-products .showProducts').load('#cart-products .cart-table');
			}
		})
	});

	//load district ==================
	$(document).on('change', '#province', function() {
		let provinceid = $('#province option:selected').val();
		$.ajax({
			type: 'post',
			url: '/postProvince',
			data: {'provinceid': provinceid},
			success: function(data) {
				// console.log(data);
				$('#district').removeAttr('disabled');
				$('#district option').remove();
				$('#ward option').remove();
				$('#ward').append("<option value=''>----------</option>");
				$('#ward').attr('disabled', true);
				$('#village option').remove();
				$('#village').append("<option value=''>----------</option>");
				$('#village').attr('disabled', true);
				$('#district').append("<option value=''>Chọn Quận/ Huyện</option>");
				$.each(data, function(index, value) {
					$('#district').append("<option value='"+ value.districtid+"'>"+value.name+"</option>")
					console.log('index: ' + index + ' value: ' + value.name);

				})
			}
		})
	})

	//load ward ================
	$(document).on('change', '#district', function() {
		let districtid = $('#district option:selected').val();
		$.ajax({
			type: 'post',
			url: '/postDistrict',
			data: {'districtid': districtid},
			success: function(data) {
				// console.log(data);
				$('#ward').removeAttr('disabled');
				$('#ward option').remove();
				$('#ward').append("<option value=''>Chọn Phường/ Xã</option>")
				$('#village option').remove();
				$('#village').append("<option value=''>----------</option>");
				$('#village').attr('disabled', true);
				$.each(data, function(index, value) {
					$('#ward').append("<option value='"+ value.wardid+"'>"+value.name+"</option>")
					console.log('index: ' + index + ' value: ' + value.name);

				})
			}
		})
	})

	//load village ==============
	$(document).on('change', '#ward', function() {
		let wardid = $('#ward option:selected').val();
		$.ajax({
			type: 'post',
			url: '/postWard',
			data: {'wardid': wardid},
			success: function(data) {
				// console.log(data);
				$('#village').removeAttr('disabled');
				$('#village option').remove();
				$('#village').append("<option value=''>Chọn Xóm/ Làng</option>")
				$.each(data, function(index, value) {
					$('#village').append("<option value='"+ value.villageid+"'>"+value.name+"</option>")
					console.log('index: ' + index + ' value: ' + value.name);

				})
			}
		})
	})

	$(document).on('click', '.submit-order-btn', function(e) {
		e.preventDefault();
		$.ajax({
			type: 'post',
			url: '/postPlaceOrder',
			data: $('.checkout-form').serialize(),
			success: function() {
				$.notify("Order completed !", "success", { position:'bottom right' });
				$('#checkout-products .showCheckoutProducts').load('#checkout-products .showCheckout');
				$('#up-item-shopping-card').load('#up-item-shopping-card .up-item-shopping-card');
			}
		})
	})

	$(document).on('click', '.submit-order-btn', function(e) {
		e.preventDefault();
		$.ajax({
			type: 'post',
			url: '/contact',
			data: $('.checkout-form').serialize(),
			success: function() {
				console.log(1);
			},
			error: function() {
				console.log('err');
			}
		})
	})

	$(document).on('click', '.tabShowAddressRegular', function() {
		$('#address_another .location').attr('disabled', true);
		$('#province').attr('disabled', true);
		$('#district').attr('disabled', true);
		$('#ward').attr('disabled', true);
		$('#village').attr('disabled', true);
		$('.value_active').attr('disabled', true);
	})

	$(document).on('click', '.tabShowAddressAnother', function() {
		$('.value_active').removeAttr('disabled');
		$('#province').removeAttr('disabled');
		$('#address_another .location').removeAttr('disabled');
	})

	$(document).on('click', '.settingUser', function(e) {
		e.preventDefault();
		$.ajax({
			type: 'post',
			data: $('.form-setting-user').serialize(),
			url: '/user/setting',
			success: function() {
				$.notify("Setting completed !", "success", { position:'bottom right' });
				$('#infor-user').load('#infor-user .infor');
			}
		})
	})

	// $(document).on('click', '.loginGoogle', function(e) {
	// 	e.preventDefault();
	// 	let provider = 'google'
	// 	$.ajax({
	// 		headers: { "Accept": "application/json"},
	// 		type: 'get',
	// 		url: '/login/' + provider,
	// 		dataType: 'jsonp',
	// 		success:function() {
	// 			console.log(1);
	// 		}
	// 	})
	// })


})(jQuery);

//delete product in cart ======================================
function deleteProductInCart(id) {
	$.ajax({
		type: 'post',
		url: '/cart/deleteProductInCart/' + id,
		success: function() {
			$('#cart-products .showProducts').load('#cart-products .cart-table');
			$.notify.defaults({globalPosition: 'bottom right'});
			$.notify("Remove completed !","success");
			$('#up-item-shopping-card').load('#up-item-shopping-card .up-item-shopping-card');
		}
	})
}
