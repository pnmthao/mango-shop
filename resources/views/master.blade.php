<!DOCTYPE html>
<html lang="zxx">
<head>
	<title>Mango Shop</title>
	<base href="{{asset('')}}">
	<!--/tags -->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="keywords" content="" />
	<script>
		addEventListener("load", function () {
			setTimeout(hideURLbar, 0);
		}, false);

		function hideURLbar() {
			window.scrollTo(0, 1);
		}
	</script>
	<!--//tags -->
	<link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
	<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
	<link href="css/font-awesome.css" rel="stylesheet">
	<!--pop-up-box-->
	<link href="css/popuo-box.css" rel="stylesheet" type="text/css" media="all" />
	<!--//pop-up-box-->
	<!-- price range -->
	<link rel="stylesheet" type="text/css" href="css/jquery-ui1.css">
	<!-- fonts -->
	<link href="//fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800" rel="stylesheet">
	<!-- custom css -->
	<link href="css/custom.css" rel="stylesheet" type="text/css" media="all" />
	<!-- flexslider -->
	<link rel="stylesheet" href="css/flexslider.css" type="text/css" media="screen" />
</head>

<body>
	@include('header')
	@yield('content')
	@include('footer')

	<!-- js-files -->

	<!-- jquery -->
	<script src="js/jquery-2.1.4.min.js"></script>
	<!-- //jquery -->

	<!-- popup modal (for signin & signup)-->
	<script src="js/jquery.magnific-popup.js"></script>
	<script>
		$(document).ready(function () {
			$('.popup-with-zoom-anim').magnificPopup({
				type: 'inline',
				fixedContentPos: false,
				fixedBgPos: true,
				overflowY: 'auto',
				closeBtnInside: true,
				preloader: false,
				midClick: true,
				removalDelay: 300,
				mainClass: 'my-mfp-zoom-in'
			});

		});
	</script>

	<!-- Large modal -->
	<!-- <script>
		$('#').modal('show');
	</script> -->
	<!-- //popup modal (for signin & signup)-->

	<!-- cart-js -->
	<script src="js/minicart.js"></script>
	<script>
		paypalm.minicartk.render();
		function number_format(number){
			return new Intl.NumberFormat('vn-VN', { style: 'currency', currency: 'VND' }).format(number)
		}
		function transformRaw(item, index) {
			let {quantity, amount, discount_amount, item_name, item_image, item_id} = item._data
			discount_amount = parseInt(discount_amount)
			
			return `<tr class="rem${index}">
						<td class="invert">${index+1}</td>
						<td class="invert-image">
							<a href="chi-tiet-san-pham/${item_id}">
								<img src="uploads/product/${item_image}" alt=" " class="img-responsive">
							</a>
						</td>
						<td class="invert">${item_name}</td>
						<td class="invert">
							<div class="quantity">
								<div class="quantity-select">
								<div class="entry value-minus active" onclick="qtyChange(${index}, -1)">
										<i class="fa fa-minus"></i>
									</div>
									<div class="entry value">
										<span class="item-quantity">${quantity}</span>
									</div>
									<div class="entry value-plus active" onclick="qtyChange(${index}, 1)">
										<i class="fa fa-plus"></i>
									</div>
								</div>
							</div>
						</td>
						<td class="invert item-discount">${number_format(discount_amount*quantity)}</td>
						<td class="invert item-amount">${number_format(amount)}</td>
						<td class="invert item-price">${number_format((amount-discount_amount)*quantity)}</td>
						<td class="invert">
							<div class="rem">
								<span class="icon-close glyphicon glyphicon-remove-circle" aria-hidden="true" onclick="removeItem(${index})"></span>
							</div>
						</td>
					</tr>`
		}

		function renderTable(){
			let items = paypalm.minicartk.cart.items(), raws = ''
			var total, totalDiscount = 0, totalAmount = 0
			let url = window.location.href
		
			
			if (items.length == 0 && url.substring(url.lastIndexOf('/')+1) == 'dat-hang'){
				alert('Your shopping cart is empty')
				window.location.href = "index"
			}
			items.forEach((item, index) => {
				let {quantity, amount, discount_amount} = item._data
				totalDiscount += discount_amount * quantity
				totalAmount += amount * quantity
				raws += transformRaw(item, index)
			})
			total = totalAmount - totalDiscount
			raws += `<tr class="rem-total">
						<td class="invert" colspan="4">TOTAL</td>
						<td class="invert total total-discount">${number_format(totalDiscount)}</td>
						<td class="invert total total-amount">${number_format(totalAmount)}</td>
						<td class="invert total item-total" style="font-weight: bold">${number_format(total)}</td>
						<td class="invert"><i class="fa fa-check icon-check"></i></td>
					</tr>`
			document.getElementById("body-checkout").innerHTML = raws
			document.getElementById("product-qty").innerHTML = items.length + " Product(s)"
		}

		function qtyChange(index, value){
			let items = paypalm.minicartk.cart.items()
			let item  = items[index]._data
			let newData = Object.assign({}, item, {	"quantity": value })
			paypalm.minicartk.cart.add(newData)
		}

		function removeItem(index){
			paypalm.minicartk.cart.remove(index)
		}
		paypalm.minicartk.cart.on('change', function (evt) {
			renderTable()
		});
		paypalm.minicartk.cart.on('remove', function (evt) {
			renderTable()
		});
		renderTable()
	</script>
	<!-- //cart-js -->

	<!-- price range (top products) -->
	<script src="js/jquery-ui.js"></script>
	<script>
		//<![CDATA[ 
		$(window).load(function () {
			$("#slider-range").slider({
				range: true,
				min: 0,
				max: 9000,
				values: [50, 6000],
				slide: function (event, ui) {
					$("#amount").val("$" + ui.values[0] + " - $" + ui.values[1]);
				}
			});
			$("#amount").val("$" + $("#slider-range").slider("values", 0) + " - $" + $("#slider-range").slider("values", 1));
		}); //]]>
	</script>
	<!-- //price range (top products) -->

	<!-- imagezoom -->
	<script src="js/imagezoom.js"></script>
	<!-- //imagezoom -->

	<!-- FlexSlider -->
	<script src="js/jquery.flexslider.js"></script>
	<script>
		// Can also be used with $(document).ready()
		$(window).load(function () {
			$('.flexslider').flexslider({
				animation: "slide",
				controlNav: "thumbnails"
			});
		});
	</script>
	<!-- //FlexSlider-->

	<!-- flexisel (for special offers) -->
	<script src="js/jquery.flexisel.js"></script>
	<script>
		$(window).load(function () {
			$("#flexiselDemo1").flexisel({
				visibleItems: 3,
				animationSpeed: 1000,
				autoPlay: true,
				autoPlaySpeed: 3000,
				pauseOnHover: true,
				enableResponsiveBreakpoints: true,
				responsiveBreakpoints: {
					portrait: {
						changePoint: 480,
						visibleItems: 1
					},
					landscape: {
						changePoint: 640,
						visibleItems: 2
					},
					tablet: {
						changePoint: 768,
						visibleItems: 2
					}
				}
			});
		});
	</script>
	<!-- //flexisel (for special offers) -->

	<!-- script for tabs -->
	<script>
		$(function () {

			var menu_ul = $('.faq > li > ul'),
				menu_a = $('.faq > li > a');

			menu_ul.hide();

			menu_a.click(function (e) {
				e.preventDefault();
				if (!$(this).hasClass('active')) {
					menu_a.removeClass('active');
					menu_ul.filter(':visible').slideUp('normal');
					$(this).addClass('active').next().stop(true, true).slideDown('normal');
				} else {
					$(this).removeClass('active');
					$(this).next().stop(true, true).slideUp('normal');
				}
			});

		});
	</script>
	<!-- //script for tabs -->
	
	<!-- password-script -->
	<script>
		window.onload = function () {
			document.getElementById("password1").onchange = validatePassword;
			document.getElementById("password2").onchange = validatePassword;
		}

		function validatePassword() {
			var pass2 = document.getElementById("password2").value;
			var pass1 = document.getElementById("password1").value;
			if (pass1 != pass2)
				document.getElementById("password2").setCustomValidity("Passwords Don't Match");
			else
				document.getElementById("password2").setCustomValidity('');
			//empty string means no validation error
		}
	</script>
	<!-- //password-script -->

	<!-- smoothscroll -->
	<script src="js/SmoothScroll.min.js"></script>
	<!-- //smoothscroll -->

	<!-- start-smooth-scrolling -->
	<script src="js/move-top.js"></script>
	<script src="js/easing.js"></script>
	<script>
		jQuery(document).ready(function ($) {
			$(".scroll").click(function (event) {
				event.preventDefault();

				$('html,body').animate({
					scrollTop: $(this.hash).offset().top
				}, 1000);
			});
		});
	</script>
	<!-- //end-smooth-scrolling -->

	<!-- smooth-scrolling-of-move-up -->
	<script>
		$(document).ready(function () {
			/*
			var defaults = {
				containerID: 'toTop', // fading element id
				containerHoverID: 'toTopHover', // fading element hover id
				scrollSpeed: 1200,
				easingType: 'linear' 
			};
			*/
			$().UItoTop({
				easingType: 'easeOutQuart'
			});

		});
	</script>
	<!-- //smooth-scrolling-of-move-up -->

	<!-- for bootstrap working -->
	<script src="js/bootstrap.js"></script>
	<!-- //for bootstrap working -->

	<!-- //js-files -->
</body>
</html>