<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<!-- saved from url=(0019)http://nhaxinh.com/ -->
<html lang="vi" xmlns="http://www.w3.org/1999/xhtml"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <!--<base href="/">--><base href=".">
	<title>Nội thất Nhà Xinh | Nội thất cao cấp | Đồ gỗ cao cấp</title>
	<link rel="alternate" href="http://www.nhaxinh.com/" hreflang="vi-vn">
	<link rel="shortcut icon" href="http://nhaxinh.com/favicon.ico" type="image/x-icon">
	<link rel="stylesheet" href="css/font.css" type="text/css" charset="utf-8">
	<script async="" src="js/analytics.js.download"></script>
	<script type="text/javascript" async="" src="txt/f.txt"></script>
	<script id="facebook-jssdk" src="js/sdk.js(1).download"></script>
	<script async="" src="js/fbevents.js.download"></script>
	<script async="" src="js/gtm.js.download"></script>
	<script src="js/jquery-3.3.1.min.js.download"></script>
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/fontawesome-all.min.css">
	<link rel="stylesheet" type="text/css" media="screen" href="css/style4.0.1.css">
	<link rel="stylesheet" type="text/css" media="screen" href="css/style.css">
	<script src="js/bootstrap.bundle.min.js.download"></script>
<body>
	<div id="fb-root" class=" fb_reset">
		<div style="position: absolute; top: -10000px; width: 0px; height: 0px;"><div></div></div>
	</div>
	<div class="cart-wrapper d-none" onclick="toggle_cart()"></div>
	<div class="cart hide">
		<div class="cart-header">
			<div>Giỏ hàng</div>
			<div onclick="toggle_cart()">X</div>
		</div>
		<div id="cart-items"></div>
		<div class="cart-summary">
			<div class="text-uppercase mb-2" style="font-size: .75rem">thuế &amp; phí sẽ được tính cụ thể khi thanh toán</div>
			<button onclick="(function(){window.location=&#39;cart&#39;})();" class="text-uppercase btn-submit">thanh toán</button>
		</div>
	</div>
<script>
	var timeout = null
	var current_location = '';
	var current_select = '';
	function message(message = '') {
		$wrapper = $('<div>', {
			style: "z-index:99999999999999999;width:100vw;height:100vh;position:fixed;top:0;left:0;display:flex;justify-content: center;align-items: center;",
			click: function () {
				$(this).remove();
			}
		})
		$div = $('<div>', {
			style: "background-color: rgba(0,0,0,0.7);padding:1rem;width: 400px;height: 200px;display: flex;justify-content: center;align-items: center;border:1px solid;color:white;font-size:1rem",text: message
		})
		$wrapper.append($div)
		$wrapper.appendTo('body');
		setTimeout(function () {
			$wrapper.remove();
		}, 6000)
	}
	function province_change(e) {
		var val = $(e).val();
		var khuvuc = $(e).find('option:selected').data('location');
		var val_name = $(e).find('option:selected').text();
		$.post('location', {location: val, location_name: val_name, khuvuc: khuvuc}, function (output) {
			$(e).parent().parent().remove();
			current_location = output;
			var select = current_select.split('|');
			if (select[0] == 'buynow')
				buy_now(select[1]);
			if (select[0] == 'addtocart')
				add_to_cart(select[1]);
			current_select = '';
		})
	}
	function show_provinces() {
		if (current_location != '')
			return;
		$.post('provinces', function (output) {
			var result = JSON.parse(output);
			$wrapper = $('<div>', {
				style: "background-color: rgba(0,0,0,0.4);z-index:99999999999999;width:100vw;height:100vh;position:fixed;top:0;left:0;display:flex;justify-content: center;align-items: center;",
				click: function () {
					$(this).remove();
				}
			})
			$div = $('<div>', {
				style: "background-color:white;padding: 5rem 10rem; display: flex; justify-content: center;align-items: center;border:1px solid;color:white;",
				click: function (e) {
					e.pre
					e.stopPropagation();
				}
			})
			$select = "<select id='province' onchange='province_change(this)'>";
			$select += "<option value='' data-location='0'>--------</option>";
			$.each(result, function (k, v) {
				$select += "<option value='" + v['val'] + "' data-location='" + v['location'] + "'>" + v['name'] + "</option>";
			})
			$select += "</select>";
			$div.append('<div>Bạn muốn giao hàng ở đâu: </div>').append($select).appendTo($wrapper);
			$wrapper.appendTo('body');
		})
	}
	function get_cart() {
		$.post('cart/load-info', function (output) {
			$('#cart-items').html(output);
		})
	}
	function toggle_cart() {
		if (!$('div.cart').hasClass('hide')) {
			$('.cart-wrapper').addClass('d-none');
			$('div.cart').addClass('hide');
			$('body').css('overflow', '');
		} else {
			get_cart();
			$('.cart-wrapper').removeClass('d-none');
			$('div.cart').removeClass('hide');
			$('body').css('overflow', 'hidden');
		}
	}

  function remove_location(e) {
    $.post('location', {location: 'del'}, function (output) {
      current_location = '';
      $(e).parent().siblings('div').each(function () {
        $(this).find('button:last').attr('data-type', 'remove-auto').trigger('click');
      })
      $(e).parent().remove();
    })
  }

  function add_to_cart(id) {
    if (current_location.trim() == '') {
      current_select = 'addtocart|' + id;
      show_provinces();
    } else
      $.post('cart/add-item', {id: id}, function (output) {
        var result = JSON.parse(output);
        message(result[1]);
        change_cart_status();
      })
  }

  function buy_now(id) {
    if (current_location == '') {
      current_select = 'buynow|' + id;
      show_provinces();
    } else
      $.post('cart/add-item', {id: id}, function (output) {
        var result = JSON.parse(output);
        if (result[0] == 1)
          window.location = 'cart';
        else
          message(result[1]);
      })
  }

  function update_item_cart(id, quantity) {
    $.post('cart/update-item', {id: id, quantity: quantity}, function (output) {
      var result = JSON.parse(output);
      message(result[1]);
    })
  }

  function remove_item(id = '') {
    $.post('cart/remove-item', {id: id}, function (output) {
      console.log(output);
      change_cart_status();
    })
  }

  function update_item(e) {
    var type = $(e).data('type');
    var id = $(e).data('id');

    if (type == 'remove-auto') {
      remove_item();
      $(e).closest('div.cart-item').remove();
    }

    if (type == 'remove') {
      if (confirm("Bạn có muốn xóa sản phẩm " + $(e).data('name') + " không?")) {
        remove_item(id);
        $(e).closest('div.cart-item').remove();
      }
    }

    if (type == 'plus') {
      var quantity = parseInt($(e).siblings('span').text()) + 1;

      clearTimeout(timeout)
      timeout = setTimeout(function () {
        $.post('cart/update-item', {id: id, quantity: quantity}, function (output) {
          var result = JSON.parse(output);
          if (result[0] == 1) {
            $(e).siblings('span').html(quantity);
          }
          message(result[1]);
        })
      }, 500)
    }

    if (type == 'minus') {
      var quantity = parseInt($(e).siblings('span').text());
      $(e).siblings('span').html(quantity);

      if (quantity == 1)
        $(e).siblings('span').html(1)
      else
        $(e).siblings('span').html(--quantity);

      clearTimeout(timeout);
      timeout = setTimeout(function () {
        update_item_cart(id, quantity)
      }, 1000)
    }
  }

  function change_cart_status() {
    $.post('cart/check', function (output) {
      if (output == 'true')
        $('#cart_bag').css('color', 'orange');
      else
        $('#cart_bag').css('color', '#000');
    })
  }

  $(document).ready(function () {
    change_cart_status();

    $.post('location', {location: ''}, function (output) {
      current_location = output;
    });

    $('#cart_bag').on('click', function (e) {
      e.preventDefault();
      toggle_cart();
    })
  })
</script>
<!-- END CART -->
<div>
	<div class="clearfix" style="background-color: #4B4E51;">
    <div class="float-left text-white d-block" style="width: 150px;margin: 15px 15px 15px 15px;">
		<span class="fas fa-phone mr-1" style="color: orange;"></span>Hotline: 1800 7200
    </div>
    <div class="float-right" style="margin: 15px;">
		<span>
			<a style="text-decoration:none;color:#51473e;" href="http://nhaxinh.com/en/index.php">
				<img src="./Nội thất Nhà Xinh _ Nội thất cao cấp _ Đồ gỗ cao cấp_files/EN.jpg">
    		</a>
    	</span>
    </div>
  </div>
  <div style="position: absolute; width: 100%; text-align: center;top:60px;">
    <a href="http://nhaxinh.com/index.php"><img src="anh/logo.png" alt="Nhà Xinh" width="135px" height="135px"></a>
  </div>
  <div class="container-fluid">
    <div class="header py-3 d-flex justify-content-between" style="height: 150px;">
      <div class="custom-nav" style="padding-left: 16px;">
        <ul>
          <li><a href="http://nhaxinh.com/gioi-thieu-sieu-thi-noi-that-gia-dinh-nha-xinh_m413_n69.html">Giới thiệu</a></li>
          <li><a href="http://nhaxinh.com/he-thong-cua-hang-sieu-thi-noi-that-nha-xinh_m413_n71.html">Tìm cửa hàng</a></li>
          <li><a href="http://nhaxinh.com/khuyen-mai">Khuyến mãi</a></li>
          <li><a href="http://nhaxinh.com/outlet-noi-that-khuyen-mai-giam-gia-dac-biet_m386.html" style="color:red">Giá đặc biệt -50%</a>
          </li>
        </ul>
      </div>
      <div class="custom-nav" style="padding-right: 16px;">
        <ul>
          <li>
            <a href="http://nhaxinh.com/#" class="fas fa-search"></a>
            <div class="search-box">
              <form id="frm_search" name="frm_search" method="get" action="http://nhaxinh.com/index.php">
                <input name="fstr_search" id="text_search" type="text">
                <input type="submit" value="Search">
              </form>
            </div>
          </li>
          <li><a href="http://nhaxinh.com/he-thong-cua-hang-sieu-thi-noi-that-nha-xinh_m413_n71.html" class="fas fa-map-marker-alt"></a></li>
          <li><a href="http://nhaxinh.com/#" id="cart_bag" class="fas fa-shopping-cart" style="color: orange;"></a></li>
        </ul>
      </div>
    </div>

    <div class="d-flex justify-content-center custom-nav position-relative" style="padding-top: 5px;background-color: white;" id="menu">
		<div class="position-absolute" id="sidebar">
			<div class="button-hamburger" id="btn">
				<div class="bar top"></div>
				<div class="bar middle"></div>
				<div class="bar bottom"></div>
			</div>
        <div id="sidebar-menu" style="height: 664px;">
        	<div class="sidebar-menu">
				<a href="http://nhaxinh.com/sofa/sofa-dep-sofa-da-sofa-goc-sofa-vai_m4.html">Sofa</a>
				<a href="http://nhaxinh.com/ghe-sofa/sofa-goc-lua-chon-cho-phong-khach-hien-dai_m5.html">Sofa góc</a>
				<a href="http://nhaxinh.com/ghe-armchair-cho-noi-that-phong-khach_m8.html">Armchair</a>
				<a href="http://nhaxinh.com/ban-nuoc-B%C3%A0n-n%C6%B0%E1%BB%9Bc_m11.html">Bàn nước</a>
				<a href="http://nhaxinh.com/ban-ben-B%C3%A0n-b%C3%AAn_m14.html">Bàn bên</a>
				<a href="http://nhaxinh.com/tu-tivi-truyen-hinh-T%E1%BB%A7-tivi_m16.html">Tủ tivi</a>
				<a href="http://nhaxinh.com/ke-sach_m21.html">Kệ trưng bày</a>
				<a href="http://nhaxinh.com/ghe-dai-don-trang-tri-noi-that-phong-khach_m9.html">Ghế dài và đôn</a>
				<a href="http://nhaxinh.com/ghe-thu-gian-cho-noi-that-phong-khach_m7.html">Ghế thư giãn</a>
				<div></div>
				<a href="http://nhaxinh.com/Ban-an-tinh-te-cho-phong-an-dep_m36.html">Bàn ăn</a>
				<a href="http://nhaxinh.com/Ghe-an-an-tuong-bien-noi-that-phong-an-tro-nen-tien-nghi-tao-cam-giac-thoai-mai_m37.html">Ghế ăn</a>
				<a href="http://nhaxinh.com/tu-ly-tang-quy-phai-noi-that-ban-an-T%E1%BB%A7-ly_m39.html">Tủ ly</a>
				<a href="http://nhaxinh.com/ban-console_m12.html">Bàn console</a>
				<div></div>
				<a href="http://nhaxinh.com/mau-giuong-ngu-thiet-ke-dep-tinh-te-cho-phong-ngu_m54.html">Giường ngủ</a>
				<a href="http://nhaxinh.com/ban-dau-giuong-noi-that-phong-ngu_m55.html">Bàn đầu giường</a>
				<a href="http://nhaxinh.com/ban-trang-diem-noi-that-phong-ngu_m56.html">Bàn trang điểm</a>
				<a href="http://nhaxinh.com/tu-hoc-keo-thich-hop-chua-cac-vat-dung%20trong-phong-an_m63.html">Tủ hộc kéo</a>
				<a href="http://nhaxinh.com/tu-ao-quan-tu-ao-2-buong-tu-ao-3-buong-tu-ao-4-buong-go-soi-tu-nhien-my-thuat-chau-Au-thap-nien-60-co-dien-chau%20Au-phu-hop-loi-song-hien-dai-gam-mau-nau-go-dam-quy-phai-van-lang_m60.html">Tủ áo</a>
				<a href="http://nhaxinh.com/tu-ao-am-tuong-phong-ngu-go-tu-nhien-mau-ma-dep-rong-rai-dep-tiet-kiem-dien-tich-toi-da-go-oc-cho-walnut-van-lang-soi-oak-go-tech-teak_m61.html">Tủ âm tường</a>
				<div></div>
				<a href="http://nhaxinh.com/Cac-bo-Tu-bep-ke-bep-dep-trong-noi-that-sieu-thi-gia-dinh-nha-xinh_m99.html">Tủ bếp</a>
				<div></div>
				<a href="http://nhaxinh.com/ban-lam-viec-phong-lam-viec_m80.html">Bàn làm việc</a>
				<a href="http://nhaxinh.com/ghe-phong-lam-viec_m81.html">Ghế làm việc</a>
				<a href="http://nhaxinh.com/ke-sach-phong-lam-viec_m83.html">Kệ sách</a>
				<div></div>
				<a href="http://nhaxinh.com/Tham-hang-trang-tri-sieu-thi-noi-that-nha-xinh_m146.html">Thảm</a>
				<a href="http://nhaxinh.com/den-chieu-sang-trang-tri-noi-that_m147.html">Đèn</a>
				<a href="http://nhaxinh.com/hang-trang-tri-da-dang-tinh-te_m142.html">Đồ trang trí</a>
				<div></div>
				<a href="http://nhaxinh.com/ban-ngoai-troi_m168.html">Bàn ngoài trời</a>
				<a href="http://nhaxinh.com/ghe-ngoi-ngoai-troi_m169.html">Ghế ngoài trời</a>
				<div></div>
				<a href="http://nhaxinh.com/tu-van-thiet-ke-noi-that_m219.html">Thiết kế nội thất</a>
        	</div>
        </div>
        <script>
          $(document).ready(function () {
            $('#sidebar-menu').height($(window).height() - 325);

            var toolbox = $('#sidebar-menu'), height = toolbox.height(),
              scrollHeight = toolbox.get(0).scrollHeight;
            toolbox.off("mousewheel").on("mousewheel", function (event) {
              var blockScrolling = this.scrollTop === scrollHeight - height && event.deltaY < 0 || this.scrollTop === 0 && event.deltaY > 0;
              return !blockScrolling;
            });

            function toggleSidebar() {
              $(".button-hamburger").toggleClass("active");
              $("#sidebar-menu").fadeToggle(700);
            }

            $(document).keyup(function (e) {
              if (e.keyCode === 27) {
                toggleSidebar();
              }
            });

            var toolbox = $('#sidebar-menu .sidebar-menu'),
              height = toolbox.height(),
              scrollHeight = toolbox.get(0).scrollHeight;

            toolbox.off("mousewheel").on("mousewheel", function (event) {
              var blockScrolling = this.scrollTop === scrollHeight - height && event.deltaY < 0 || this.scrollTop === 0 && event.deltaY > 0;
              return !blockScrolling;
            });

            $('.fas.fa-search').click(function (e) {
              e.preventDefault();
              e.stopPropagation();
              $(".search-box").toggle();
              $(".search-box input[type='text']").focus();
            });

            $(".button-hamburger").on("click tap", function (e) {
              e.preventDefault();
              e.stopPropagation();
              toggleSidebar();
            });

            $(".search-box").on("click", function (event) {
              event.stopPropagation();
            });
            $('#sidebar-menu').on('click', function () {
              event.stopPropagation();
            })

            $(document).on("click", function () {
              if ($('.search-box').css('display') == 'block') {
                $(".search-box").toggle();
              }
              if ($('.button-hamburger').hasClass('active')) {
                toggleSidebar();
              }
            });
          });
        </script>
		</div>
			<ul>
				<li><a href="http://nhaxinh.com/noi-that-phong-khach-dep_m2.html">Phòng khách</a></li>
				<li><a href="http://nhaxinh.com/noi-that-phong-an-thiet-ke-dep-tinh-te_m34.html">Phòng Ăn</a></li>
				<li><a href="http://nhaxinh.com/noi-that-phong-ngu-dep-sang-trong-tinh-te_m52.html">Phòng ngủ</a></li>
				<li><a href="http://nhaxinh.com/phong-lam-viec_m78.html">Phòng làm việc</a></li>
				<li><a href="http://nhaxinh.com/Noi-that-nha-Bep-voi-tu-bep-thiet-ke-sang-trong-bo-tri-hai-hoa-hop-phong-thuy-chu-nha_m97.html">Tủ Bếp</a></li>
				<li><a href="http://nhaxinh.com/hang-trang-tri-da-dang-tinh-te_m142.html">Hàng trang trí</a></li>
				<li><a href="http://nhaxinh.com/ngoai-that-do-go-ngoai-troi_m166.html">Ngoại thất</a></li>
				<li><a href="http://nhaxinh.com/Bo-suu-tap-noi-that-phong-khach-phong-an-phong-ngu-phong-lam-viec-nha-tu-bep-phong-tre-em-hang-trang-tri_m185.html">Bộ sưu tập</a></li>
				<li><a href="http://nhaxinh.com/tu-van-thiet-ke-noi-that_m219.html">Thiết kế nội thất</a></li>
				<li><a href="http://nhaxinh.com/mau-thiet-ke">Mẫu thiết kế</a></li>
			</ul>
	  </div>
	</div>
</div>

<div class="container-fluid" id="cpage">
  <!--<link rel="stylesheet" type="text/css" media="screen" href="css/product.css"/> -->
    <style>.navbar-toggler {
  display: block;
}</style>
<!-- bxSlider Javascript file -->
<script src="./Nội thất Nhà Xinh _ Nội thất cao cấp _ Đồ gỗ cao cấp_files/jquery.bxslider.min.js.download"></script>
<!-- bxSlider CSS file -->
<link href="./Nội thất Nhà Xinh _ Nội thất cao cấp _ Đồ gỗ cao cấp_files/jquery.bxslider.css" rel="stylesheet">

<!-- slick slider -->
<link rel="stylesheet" type="text/css" href="./Nội thất Nhà Xinh _ Nội thất cao cấp _ Đồ gỗ cao cấp_files/slick.css">
<link rel="stylesheet" type="text/css" href="./Nội thất Nhà Xinh _ Nội thất cao cấp _ Đồ gỗ cao cấp_files/slick-theme.css">
<script type="text/javascript" src="./Nội thất Nhà Xinh _ Nội thất cao cấp _ Đồ gỗ cao cấp_files/slick.min.js.download"></script>

<div id="home_banner" style="clear: both; height: 943.062px;">
  <div class="bx-wrapper" style="max-width: 100%; border: 0px;">
	  <div class="bx-viewport" style="width: 100%; overflow: hidden; position: relative; height: 863.062px;">
		  <ul class="bxslider" style="width: auto; position: relative;">
			  <li style="float: none; list-style: none; position: absolute; width: 1870px; z-index: 0; display: none;"><a href="http://localhost/KTPM_WebNoiThat/index.php"><img src="anh/banner/1.jpg"></a></li>
			  <li style="float: none; list-style: none; position: absolute; width: 1870px; z-index: 0; display: none;"><a href="http://localhost/KTPM_WebNoiThat/index.php"><img src="anh/banner/2.jpg"></a></li>
			  <li style="float: none; list-style: none; position: absolute; width: 1870px; z-index: 50;"><a href="http://localhost/KTPM_WebNoiThat/index.php"><img src="anh/banner/3.jpg"></a></li>
		  </ul>
	  </div>
	  <div class="bx-controls bx-has-pager bx-has-controls-direction">
		  <div class="bx-pager bx-default-pager">
			  <div class="bx-pager-item"><a href="http://localhost/KTPM_WebNoiThat/index.php" data-slide-index="0" class="bx-pager-link">1</a></div>
			  <div class="bx-pager-item"><a href="http://localhost/KTPM_WebNoiThat/index.php" data-slide-index="1" class="bx-pager-link">2</a></div>
			  <div class="bx-pager-item"><a href="http://localhost/KTPM_WebNoiThat/index.php" data-slide-index="2" class="bx-pager-link active">3</a></div>
		  </div>
		  <div class="bx-controls-direction"><a class="bx-prev" href="http://localhost/KTPM_WebNoiThat/index.php">Prev</a><a class="bx-next" href="http://localhost/KTPM_WebNoiThat/index.php">Next</a></div>
	  </div>
	</div>
</div>

<script>
  $('.bxslider').bxSlider({
    mode: 'fade',
    captions: false,
    auto: true,
    onSliderLoad: function () {
      var h = $('div.bx-wrapper img').height();
      h += 60;
      $('#home_banner').height(h);
      $('div.bx-wrapper').css('border', '0');
    }
  });
</script>

<div style="clear: both;"></div>
<!------------------------------------------------------------------------------------------------------------------------------------------------------------------------------>
<!--content-->

<div id="new_product" style="margin: 10px 0px 10px 0px;">
  <div class="page_header">
    Sản Phẩm Mới
  </div>
  <div class="page_header_container"><span class="fas fa-caret-down" style="font-size: 24px;"></span></div>
  <div class="page_header_container" style="padding-top: 10px;"><a href="http://nhaxinh.com/san-pham-moi_m311.html" class="link_box">Xem
    tất cả</a></div>

  <div class="new_product slick-initialized slick-slider" style="width: 90%;margin: auto;padding-top: 25px;">
    <div class="slick-list draggable"><div class="slick-track" style="opacity: 1; width: 1683px; transform: translate3d(0px, 0px, 0px);"><div style="height: 500px; width: 561px;" class="slick-slide slick-current slick-active" data-slick-index="0" aria-hidden="false" tabindex="0">
      
      
      <a href="http://nhaxinh.com/Ke-sach-Porto_m311_p6970.html" tabindex="0">
        <div style="width: 100%;height: 40%">
          <img src="./Nội thất Nhà Xinh _ Nội thất cao cấp _ Đồ gỗ cao cấp_files/ke-sach-porto.jpg" alt="Phối cảnh Kệ sách Porto" style="margin: auto;max-height: 100%;">
        </div>
        <div style="width: 100%;height:10%; text-align: center;">Kệ sách Porto</div>
      </a>
      <a href="http://nhaxinh.com/Ban-nuoc-Maxine-hinh-chu-nhat_m311_p6805.html" tabindex="0">
        <div style="width: 100%;height: 40%">
          <img src="./Nội thất Nhà Xinh _ Nội thất cao cấp _ Đồ gỗ cao cấp_files/ban_nuoc_vuong_maxine_1_-_copy.jpg" alt="Phối cảnh Bàn nước Maxine hình chữ nhật" style="margin: auto;max-height: 100%;">
        </div>
        <div style="width: 100%;height:10%; text-align: center;">Bàn nước Maxine hình chữ nhật</div>
      </a>
    </div><div style="height: 500px; width: 561px;" class="slick-slide slick-active" data-slick-index="1" aria-hidden="false" tabindex="0">
      
      
      <a href="http://nhaxinh.com/Ban-trang-diem-May-Mau-2_m311_p6760.html" tabindex="0">
        <div style="width: 100%;height: 40%">
          <img src="./Nội thất Nhà Xinh _ Nội thất cao cấp _ Đồ gỗ cao cấp_files/ban_trang_diem_may_1.jpg" alt="Phối cảnh Bàn trang điểm Mây - Mẫu 2" style="margin: auto;max-height: 100%;">
        </div>
        <div style="width: 100%;height:10%; text-align: center;">Bàn trang điểm Mây - Mẫu 2</div>
      </a>
      <a href="http://nhaxinh.com/Ban-an-May-8-cho-mau-2_m311_p6754.html" tabindex="0">
        <div style="width: 100%;height: 40%">
          <img src="./Nội thất Nhà Xinh _ Nội thất cao cấp _ Đồ gỗ cao cấp_files/ban_an_may_1_-_copy.jpg" alt="Phối cảnh Bàn ăn Mây 8 chỗ - mẫu 2" style="margin: auto;max-height: 100%;">
        </div>
        <div style="width: 100%;height:10%; text-align: center;">Bàn ăn Mây 8 chỗ - mẫu 2</div>
      </a>
    </div><div style="height: 500px; width: 561px;" class="slick-slide slick-active" data-slick-index="2" aria-hidden="false" tabindex="0">
      
      
      <a href="http://nhaxinh.com/Giuong-ngu-boc-da-May-1m6-Fango_m311_p6759.html" tabindex="0">
        <div style="width: 100%;height: 40%">
          <img src="./Nội thất Nhà Xinh _ Nội thất cao cấp _ Đồ gỗ cao cấp_files/giuong_may_1.jpg" alt="Phối cảnh Giường ngủ bọc da Mây 1m6 Fango" style="margin: auto;max-height: 100%;">
        </div>
        <div style="width: 100%;height:10%; text-align: center;">Giường ngủ bọc da Mây 1m6 Fango</div>
      </a>
      <a href="http://nhaxinh.com/Ban-nuoc-Alex_m311_p7039.html" tabindex="0">
        <div style="width: 100%;height: 40%">
          <img src="./Nội thất Nhà Xinh _ Nội thất cao cấp _ Đồ gỗ cao cấp_files/ban-nuoc-alex_-_copy.jpg" alt="Phối cảnh Bàn nước Alex" style="margin: auto;max-height: 100%;">
        </div>
        <div style="width: 100%;height:10%; text-align: center;">Bàn nước Alex</div>
      </a>
    </div></div></div>
  </div>

  <script>
    $(document).ready(function () {
      $('.new_product').slick({
        slidesToShow: 3,
        slidesToScroll: 1,
        autoplay: true,
        autoplaySpeed: 2000,
      });
    });
  </script>
</div>

<div style="clear: both;"></div>

<div id="best_seller_product" style="margin: 10px 0px 10px 0px;padding-top: 50px;">
  <div class="page_header">
    Sản phẩm bán chạy
  </div>
  <div class="page_header_container"><span class="fas fa-caret-down" style="font-size: 24px;"></span></div>
  <div class="page_header_container" style="padding-top: 10px;"><a href="http://nhaxinh.com/san-pham-ban-chay_m418.html" class="link_box">Xem tất cả</a></div>

  <div class="best_seller_product slick-initialized slick-slider" style="width: 90%;margin: auto;padding-top: 25px;"><button class="slick-prev slick-arrow" aria-label="Previous" type="button" style="background-color: lightgrey;">Previous</button>
    <div class="slick-list draggable"><div class="slick-track" style="opacity: 1; width: 11781px; transform: translate3d(-3366px, 0px, 0px);"><div style="height: 250px; width: 561px;" class="slick-slide slick-cloned" data-slick-index="-3" aria-hidden="true" tabindex="-1">
      
      <a href="http://nhaxinh.com/Giuong-ngu-go-Maxine-1m6_m418_p5201.html" tabindex="-1">
        <div style="width: 100%;height: 80%">
          <img src="./Nội thất Nhà Xinh _ Nội thất cao cấp _ Đồ gỗ cao cấp_files/3_91088_(1).jpg" alt="Phối cảnh Giường ngủ gỗ Maxine 1m6" style="margin: auto;max-height: 100%;">
        </div>
        <div style="width: 100%;height:20%; text-align: center;">Giường ngủ gỗ Maxine 1m6</div>
      </a>

    </div><div style="height: 250px; width: 561px;" class="slick-slide slick-cloned" data-slick-index="-2" aria-hidden="true" tabindex="-1">
      
      <a href="http://nhaxinh.com/Sofa-Bridge-3-cho-hien-dai-da-cognac_m418_p3580.html" tabindex="-1">
        <div style="width: 100%;height: 80%">
          <img src="./Nội thất Nhà Xinh _ Nội thất cao cấp _ Đồ gỗ cao cấp_files/2.jpg" alt="Phối cảnh Sofa Bridge 3 chỗ hiện đại da cognac" style="margin: auto;max-height: 100%;">
        </div>
        <div style="width: 100%;height:20%; text-align: center;">Sofa Bridge 3 chỗ hiện đại da cognac</div>
      </a>

    </div><div style="height: 250px; width: 561px;" class="slick-slide slick-cloned" data-slick-index="-1" aria-hidden="true" tabindex="-1">
      
      <a href="http://nhaxinh.com/Sofa-Jazz-3-cho-hien-dai-da-cognac_m418_p3929.html" tabindex="-1">
        <div style="width: 100%;height: 80%">
          <img src="./Nội thất Nhà Xinh _ Nội thất cao cấp _ Đồ gỗ cao cấp_files/1.jpg" alt="Phối cảnh Sofa Jazz 3 chỗ hiện đại da cognac" style="margin: auto;max-height: 100%;">
        </div>
        <div style="width: 100%;height:20%; text-align: center;">Sofa Jazz 3 chỗ hiện đại da cognac</div>
      </a>

    </div><div style="height: 250px; width: 561px;" class="slick-slide" data-slick-index="0" aria-hidden="true" tabindex="-1">
      
      <a href="http://nhaxinh.com/Ban-nuoc-Pio_m418_p5448.html" tabindex="-1">
        <div style="width: 100%;height: 80%">
          <img src="./Nội thất Nhà Xinh _ Nội thất cao cấp _ Đồ gỗ cao cấp_files/line-pio_dining-table_02(3).jpg" alt="Phối cảnh Bàn nước Pio" style="margin: auto;max-height: 100%;">
        </div>
        <div style="width: 100%;height:20%; text-align: center;">Bàn nước Pio</div>
      </a>

    </div><div style="height: 250px; width: 561px;" class="slick-slide" data-slick-index="1" aria-hidden="true" tabindex="-1">
      
      <a href="http://nhaxinh.com/Ban-lam-viec-Maxine_m418_p5182.html" tabindex="-1">
        <div style="width: 100%;height: 80%">
          <img src="./Nội thất Nhà Xinh _ Nội thất cao cấp _ Đồ gỗ cao cấp_files/1000-san-pham-nha-xinh_(11).jpg" alt="Phối cảnh Bàn làm việc Maxine" style="margin: auto;max-height: 100%;">
        </div>
        <div style="width: 100%;height:20%; text-align: center;">Bàn làm việc Maxine</div>
      </a>

    </div><div style="height: 250px; width: 561px;" class="slick-slide" data-slick-index="2" aria-hidden="true" tabindex="-1">
      
      <a href="http://nhaxinh.com/Sofa-Miami-2-cho-hien-dai-vai-xanh_m418_p5503.html" tabindex="-1">
        <div style="width: 100%;height: 80%">
          <img src="./Nội thất Nhà Xinh _ Nội thất cao cấp _ Đồ gỗ cao cấp_files/16.jpg" alt="Phối cảnh Sofa Miami 2 chỗ hiện đại vải xanh" style="margin: auto;max-height: 100%;">
        </div>
        <div style="width: 100%;height:20%; text-align: center;">Sofa Miami 2 chỗ hiện đại vải xanh</div>
      </a>

    </div><div style="height: 250px; width: 561px;" class="slick-slide slick-current slick-active" data-slick-index="3" aria-hidden="false" tabindex="0">
      
      <a href="http://nhaxinh.com/Armchair-co-tay-Maxine_m418_p5119.html" tabindex="0">
        <div style="width: 100%;height: 80%">
          <img src="./Nội thất Nhà Xinh _ Nội thất cao cấp _ Đồ gỗ cao cấp_files/500-armchair-maxine-co-tay(2).jpg" alt="Phối cảnh Armchair có tay Maxine" style="margin: auto;max-height: 100%;">
        </div>
        <div style="width: 100%;height:20%; text-align: center;">Armchair có tay Maxine</div>
      </a>

    </div><div style="height: 250px; width: 561px;" class="slick-slide slick-active" data-slick-index="4" aria-hidden="false" tabindex="0">
      
      <a href="http://nhaxinh.com/Giuong-ngu-boc-vai-Miami-1m6-hien-dai-mau-AM696_m418_p5767.html" tabindex="0">
        <div style="width: 100%;height: 80%">
          <img src="./Nội thất Nhà Xinh _ Nội thất cao cấp _ Đồ gỗ cao cấp_files/giuong-miami-2.jpg" alt="Phối cảnh Giường ngủ bọc vải Miami 1m6 hiện đại màu AM696" style="margin: auto;max-height: 100%;">
        </div>
        <div style="width: 100%;height:20%; text-align: center;">Giường ngủ bọc vải Miami 1m6 hiện đại màu AM696</div>
      </a>

    </div><div style="height: 250px; width: 561px;" class="slick-slide slick-active" data-slick-index="5" aria-hidden="false" tabindex="0">
      
      <a href="http://nhaxinh.com/Ghe-Lazboy-Pinnacle-10T512-Fern_m418_p6540.html" tabindex="0">
        <div style="width: 100%;height: 80%">
          <img src="./Nội thất Nhà Xinh _ Nội thất cao cấp _ Đồ gỗ cao cấp_files/lazboy-10t512-pinnacle-sl714890-fern.jpg" alt="Phối cảnh Ghế Lazboy Pinnacle 10T512 - Fern" style="margin: auto;max-height: 100%;">
        </div>
        <div style="width: 100%;height:20%; text-align: center;">Ghế Lazboy Pinnacle 10T512 - Fern</div>
      </a>

    </div><div style="height: 250px; width: 561px;" class="slick-slide" data-slick-index="6" aria-hidden="true" tabindex="-1">
      
      <a href="http://nhaxinh.com/Giuong-ngu-go-Maxine-1m6_m418_p5201.html" tabindex="-1">
        <div style="width: 100%;height: 80%">
          <img src="./Nội thất Nhà Xinh _ Nội thất cao cấp _ Đồ gỗ cao cấp_files/3_91088_(1).jpg" alt="Phối cảnh Giường ngủ gỗ Maxine 1m6" style="margin: auto;max-height: 100%;">
        </div>
        <div style="width: 100%;height:20%; text-align: center;">Giường ngủ gỗ Maxine 1m6</div>
      </a>

    </div><div style="height: 250px; width: 561px;" class="slick-slide" data-slick-index="7" aria-hidden="true" tabindex="-1">
      
      <a href="http://nhaxinh.com/Sofa-Bridge-3-cho-hien-dai-da-cognac_m418_p3580.html" tabindex="-1">
        <div style="width: 100%;height: 80%">
          <img src="./Nội thất Nhà Xinh _ Nội thất cao cấp _ Đồ gỗ cao cấp_files/2.jpg" alt="Phối cảnh Sofa Bridge 3 chỗ hiện đại da cognac" style="margin: auto;max-height: 100%;">
        </div>
        <div style="width: 100%;height:20%; text-align: center;">Sofa Bridge 3 chỗ hiện đại da cognac</div>
      </a>

    </div><div style="height: 250px; width: 561px;" class="slick-slide" data-slick-index="8" aria-hidden="true" tabindex="-1">
      
      <a href="http://nhaxinh.com/Sofa-Jazz-3-cho-hien-dai-da-cognac_m418_p3929.html" tabindex="-1">
        <div style="width: 100%;height: 80%">
          <img src="./Nội thất Nhà Xinh _ Nội thất cao cấp _ Đồ gỗ cao cấp_files/1.jpg" alt="Phối cảnh Sofa Jazz 3 chỗ hiện đại da cognac" style="margin: auto;max-height: 100%;">
        </div>
        <div style="width: 100%;height:20%; text-align: center;">Sofa Jazz 3 chỗ hiện đại da cognac</div>
      </a>

    </div><div style="height: 250px; width: 561px;" class="slick-slide slick-cloned" data-slick-index="9" aria-hidden="true" tabindex="-1">
      
      <a href="http://nhaxinh.com/Ban-nuoc-Pio_m418_p5448.html" tabindex="-1">
        <div style="width: 100%;height: 80%">
          <img src="./Nội thất Nhà Xinh _ Nội thất cao cấp _ Đồ gỗ cao cấp_files/line-pio_dining-table_02(3).jpg" alt="Phối cảnh Bàn nước Pio" style="margin: auto;max-height: 100%;">
        </div>
        <div style="width: 100%;height:20%; text-align: center;">Bàn nước Pio</div>
      </a>

    </div><div style="height: 250px; width: 561px;" class="slick-slide slick-cloned" data-slick-index="10" aria-hidden="true" tabindex="-1">
      
      <a href="http://nhaxinh.com/Ban-lam-viec-Maxine_m418_p5182.html" tabindex="-1">
        <div style="width: 100%;height: 80%">
          <img src="./Nội thất Nhà Xinh _ Nội thất cao cấp _ Đồ gỗ cao cấp_files/1000-san-pham-nha-xinh_(11).jpg" alt="Phối cảnh Bàn làm việc Maxine" style="margin: auto;max-height: 100%;">
        </div>
        <div style="width: 100%;height:20%; text-align: center;">Bàn làm việc Maxine</div>
      </a>

    </div><div style="height: 250px; width: 561px;" class="slick-slide slick-cloned" data-slick-index="11" aria-hidden="true" tabindex="-1">
      
      <a href="http://nhaxinh.com/Sofa-Miami-2-cho-hien-dai-vai-xanh_m418_p5503.html" tabindex="-1">
        <div style="width: 100%;height: 80%">
          <img src="./Nội thất Nhà Xinh _ Nội thất cao cấp _ Đồ gỗ cao cấp_files/16.jpg" alt="Phối cảnh Sofa Miami 2 chỗ hiện đại vải xanh" style="margin: auto;max-height: 100%;">
        </div>
        <div style="width: 100%;height:20%; text-align: center;">Sofa Miami 2 chỗ hiện đại vải xanh</div>
      </a>

    </div><div style="height: 250px; width: 561px;" class="slick-slide slick-cloned" data-slick-index="12" aria-hidden="true" tabindex="-1">
      
      <a href="http://nhaxinh.com/Armchair-co-tay-Maxine_m418_p5119.html" tabindex="-1">
        <div style="width: 100%;height: 80%">
          <img src="./Nội thất Nhà Xinh _ Nội thất cao cấp _ Đồ gỗ cao cấp_files/500-armchair-maxine-co-tay(2).jpg" alt="Phối cảnh Armchair có tay Maxine" style="margin: auto;max-height: 100%;">
        </div>
        <div style="width: 100%;height:20%; text-align: center;">Armchair có tay Maxine</div>
      </a>

    </div><div style="height: 250px; width: 561px;" class="slick-slide slick-cloned" data-slick-index="13" aria-hidden="true" tabindex="-1">
      
      <a href="http://nhaxinh.com/Giuong-ngu-boc-vai-Miami-1m6-hien-dai-mau-AM696_m418_p5767.html" tabindex="-1">
        <div style="width: 100%;height: 80%">
          <img src="./Nội thất Nhà Xinh _ Nội thất cao cấp _ Đồ gỗ cao cấp_files/giuong-miami-2.jpg" alt="Phối cảnh Giường ngủ bọc vải Miami 1m6 hiện đại màu AM696" style="margin: auto;max-height: 100%;">
        </div>
        <div style="width: 100%;height:20%; text-align: center;">Giường ngủ bọc vải Miami 1m6 hiện đại màu AM696</div>
      </a>

    </div><div style="height: 250px; width: 561px;" class="slick-slide slick-cloned" data-slick-index="14" aria-hidden="true" tabindex="-1">
      
      <a href="http://nhaxinh.com/Ghe-Lazboy-Pinnacle-10T512-Fern_m418_p6540.html" tabindex="-1">
        <div style="width: 100%;height: 80%">
          <img src="./Nội thất Nhà Xinh _ Nội thất cao cấp _ Đồ gỗ cao cấp_files/lazboy-10t512-pinnacle-sl714890-fern.jpg" alt="Phối cảnh Ghế Lazboy Pinnacle 10T512 - Fern" style="margin: auto;max-height: 100%;">
        </div>
        <div style="width: 100%;height:20%; text-align: center;">Ghế Lazboy Pinnacle 10T512 - Fern</div>
      </a>

    </div><div style="height: 250px; width: 561px;" class="slick-slide slick-cloned" data-slick-index="15" aria-hidden="true" tabindex="-1">
      
      <a href="http://nhaxinh.com/Giuong-ngu-go-Maxine-1m6_m418_p5201.html" tabindex="-1">
        <div style="width: 100%;height: 80%">
          <img src="./Nội thất Nhà Xinh _ Nội thất cao cấp _ Đồ gỗ cao cấp_files/3_91088_(1).jpg" alt="Phối cảnh Giường ngủ gỗ Maxine 1m6" style="margin: auto;max-height: 100%;">
        </div>
        <div style="width: 100%;height:20%; text-align: center;">Giường ngủ gỗ Maxine 1m6</div>
      </a>

    </div><div style="height: 250px; width: 561px;" class="slick-slide slick-cloned" data-slick-index="16" aria-hidden="true" tabindex="-1">
      
      <a href="http://nhaxinh.com/Sofa-Bridge-3-cho-hien-dai-da-cognac_m418_p3580.html" tabindex="-1">
        <div style="width: 100%;height: 80%">
          <img src="./Nội thất Nhà Xinh _ Nội thất cao cấp _ Đồ gỗ cao cấp_files/2.jpg" alt="Phối cảnh Sofa Bridge 3 chỗ hiện đại da cognac" style="margin: auto;max-height: 100%;">
        </div>
        <div style="width: 100%;height:20%; text-align: center;">Sofa Bridge 3 chỗ hiện đại da cognac</div>
      </a>

    </div><div style="height: 250px; width: 561px;" class="slick-slide slick-cloned" data-slick-index="17" aria-hidden="true" tabindex="-1">
      
      <a href="http://nhaxinh.com/Sofa-Jazz-3-cho-hien-dai-da-cognac_m418_p3929.html" tabindex="-1">
        <div style="width: 100%;height: 80%">
          <img src="./Nội thất Nhà Xinh _ Nội thất cao cấp _ Đồ gỗ cao cấp_files/1.jpg" alt="Phối cảnh Sofa Jazz 3 chỗ hiện đại da cognac" style="margin: auto;max-height: 100%;">
        </div>
        <div style="width: 100%;height:20%; text-align: center;">Sofa Jazz 3 chỗ hiện đại da cognac</div>
      </a>

    </div></div></div>
  <button class="slick-next slick-arrow" aria-label="Next" type="button" style="background-color: lightgrey;">Next</button></div>

  <script>
    $(document).ready(function () {
      $('.best_seller_product').slick({
        slidesToShow: 3,
        slidesToScroll: 1,
        autoplay: true,
        autoplaySpeed: 2000,
      });

      $('button.slick-prev').css('background-color', 'lightgrey');
      $('button.slick-next').css('background-color', 'lightgrey');
      $('#new_product a,#best_seller_product a').hover(function () {
        $(this).children('div').css('color', 'orange');
      }, function () {
        $(this).children('div').css('color', '');
      })
    });
  </script>
</div>

<div style="clear: both;"></div>

<div id="home_sub_banner" style="padding-top: 50px;">
  <div class="sub_banner">
    <a href="http://nhaxinh.com/Khong_gian_phong_khach_m312_op1.html">
      <div class="sub_banner_image" style="background-image: url(&quot;photo/sub_banner/nhaxinh-phong-khach-hien-dai-200902.jpg&quot;); height: 613.903px;"></div>
      <div class="sub_banner_text"></div>
    </a>
  </div>
  <div class="sub_banner">
    <a href="http://nhaxinh.com/Khong_gian_phong_an_m313_op1.html">
      <div class="sub_banner_image" style="background-image: url(&quot;photo/sub_banner/nhaxinh-phong-an-hien-dai-200902.jpg&quot;); height: 613.903px;"></div>
      <div class="sub_banner_text"></div>
    </a>
  </div>
  <div style="clear:both;"></div>
  <div class="sub_banner">
    <a href="http://nhaxinh.com/hang-trang-tri-da-dang-tinh-te_m142.html">
      <div class="sub_banner_image" style="background-image: url(&quot;photo/sub_banner/nhaxinh-hang-trang-tri-200828.jpg&quot;); height: 613.903px;"></div>
      <div class="sub_banner_text"></div>
    </a>
  </div>
  <div class="sub_banner">
    <a href="http://nhaxinh.com/Khong_gian_phong_ngu_m314_op1.html">
      <div class="sub_banner_image" style="background-image: url(&quot;photo/sub_banner/nhaxinh-mau-phong-ngu-201224.jpg&quot;); height: 613.903px;"></div>
      <div class="sub_banner_text"></div>
    </a>
  </div>
  <script>
    i = 0;
    $('.sub_banner_image').each(function () {
      var h = $('.sub_banner_image').width() * 0.6213;
      $(this).height(h + 'px');
    })
  </script>
</div>
<div style="clear: both;"></div>

<div class="clearfix" style="padding-top: 25px;;">
  <div class="panel_left w-50 float-left" style="padding-right: 25px;">
    <a href="http://nhaxinh.com/he-thong-cua-hang-sieu-thi-noi-that-nha-xinh_m413_n71.html"><img src="./Nội thất Nhà Xinh _ Nội thất cao cấp _ Đồ gỗ cao cấp_files/he-thong-cua-hang-hai-ba-trung-200529.jpg" width="100%"></a>
    <a href="http://nhaxinh.com/tu-van-thiet-ke-noi-that_m219.html">
      <div class="page_header float-right text-right w-50" style="margin-top: 35px;margin-bottom: 35px;">thiết kế nội thất<span class="fas fa-caret-right" style="padding-left: 25px; font-size: 24px;"></span></div>
    </a>
  </div>
  <div class="panel_right w-50 float-left" style="padding-left: 25px;">
    <a href="http://nhaxinh.com/he-thong-cua-hang-sieu-thi-noi-that-nha-xinh_m413_n71.html">
      <div class="page_header float-left text-left w-50" style="margin-top: 35px;margin-bottom: 35px;"><span class="fas fa-caret-left" style="padding-right: 25px; font-size: 24px;"></span>Hệ thống cửa hàng
      </div>
    </a>
    <a href="http://nhaxinh.com/tu-van-thiet-ke-noi-that_m219.html"><img src="./Nội thất Nhà Xinh _ Nội thất cao cấp _ Đồ gỗ cao cấp_files/nhaxinh-tu-van-thiet-ke-noi-that-201210.png" width="100%"></a>
  </div>
</div>

<div style="clear: both;"></div>


<div id="support" class="py-5">
  <div class="panel_left float-left" style="width: 55%;">
    <img src="./Nội thất Nhà Xinh _ Nội thất cao cấp _ Đồ gỗ cao cấp_files/banner-ban-can-ho-tro-201215.jpg" width="100%">
  </div>
  <div class="panel_middle float-left" style="padding-left: 75px;width: 45%;">
    <div class="page_header text-center" style="border-top: none; width: 85%;">Bạn cần hỗ trợ</div>
    <div style="width: 85%;margin: auto; padding-top: 25px;">
      <form action="http://nhaxinh.com/" method="post" name="order" id="order">
        <span class="text-left" style="padding-bottom: 10px; display: block;">Họ và tên</span>
        <input name="fstr_fullname" type="text" class="w-100" style="margin-bottom: 15px;">

        <span class="text-left" style="padding-bottom: 10px; display: block;">Điện Thoại</span>
        <input name="fstr_telephone" type="text" class="w-100" style="margin-bottom: 15px;">

        <span class="text-left" style="padding-bottom: 10px; display: block;">Email</span>
        <input name="fmail_email" type="text" class="w-100" style="margin-bottom: 15px;">

        <span class="text-left" style="padding-bottom: 10px; display: block;">Comments</span>
        <textarea name="fstr_comment" rows="3" class="w-100" style="margin-bottom: 15px;"></textarea>

        <span class="text-left" style="padding-bottom: 10px; display: block;">Điền mã xác nhận</span>
        <input type="text" class="w-100" name="fint_vercode" value="" style="margin-bottom: 15px;">
        <br>
        <img src="./Nội thất Nhà Xinh _ Nội thất cao cấp _ Đồ gỗ cao cấp_files/verification.php" style="margin-bottom: 15px;">
        <br>
        <input onclick="javascript:SubmitForm(&#39;index.php?menu=219&amp;fa=1&#39;);" name="send" type="button" value="Gửi">
        <input name="cancel" type="button" value="Hủy">
      </form>
    </div>
  </div>
  <script>
    function validate_required(field) {
      with (field) {
        if (value == null || value == "") {
          return false;
        } else {
          return true;
        }
      }
    }

    function echeck(str) {
      var at = "@";
      var dot = ".";
      var lat = str.indexOf(at);
      var lstr = str.length;
      var ldot = str.indexOf(dot);
      if (str.indexOf(at) == -1) {
        return false;
      }

      if (str.indexOf(at) == -1 || str.indexOf(at) == 0 || str.indexOf(at) == lstr) {
        return false;
      }

      if (str.indexOf(dot) == -1 || str.indexOf(dot) == 0 || str.indexOf(dot) == lstr) {
        return false;
      }

      if (str.indexOf(at, (lat + 1)) != -1) {
        return false;
      }

      if (str.substring(lat - 1, lat) == dot || str.substring(lat + 1, lat + 2) == dot) {
        return false;
      }

      if (str.indexOf(dot, (lat + 2)) == -1) {
        return false;
      }

      if (str.indexOf(" ") != -1) {
        return false;
      }
      return true;
    }

    function ValidateForm() {
      if (validate_required(document.order.fstr_fullname) == false) {
        alert("Bạn chưa điền họ tên");
        document.order.fstr_fullname.focus();
        return false;
      }
      var emailID = document.order.fmail_email;
      if ((emailID.value == null) || (emailID.value == "")) {
        alert("Bạn chưa điền email");
        emailID.focus();
        return false;
      }
      if (echeck(emailID.value) == false) {
        alert("Địa chỉ mail không hợp lệ");
        emailID.focus();
        return false;
      }
      if (validate_required(document.order.fstr_comment) == false) {
        alert("Bạn chưa điền nội dung yêu cầu");
        document.order.fstr_comment.focus();
        return false;
      }
      if (validate_required(document.order.fint_vercode) == false) {
        alert("Bạn chưa điền mã xác nhận");
        document.order.fint_vercode.focus();
        return false;
      }
      return true;
    }

    function SubmitForm(url) {
      if (ValidateForm() == true) {
        document.order.action = url;
        document.order.submit();
      }
    }
  </script>
</div>

<div style="clear: both;"></div>

<div id="idea" style="padding-top: 50px;">
  <div class="page_header">
    Cảm hứng và Ý tưởng
  </div>
  <div class="page_header_container"><span class="fas fa-caret-down" style="font-size: 24px;"></span></div>
  <div class="page_header_container" style="padding-top: 10px;"><a class="link_box" style="text-decoration: none;" href="http://nhaxinh.com/khong-gian-song_m411.html">Xem tất cả</a>
  </div>

  <div class="idea slick-initialized slick-slider" style="width: 98%;margin: auto;padding-top: 25px;"><button class="slick-prev slick-arrow" aria-label="Previous" type="button" style="background-color: lightgrey;">Previous</button>
    <div class="slick-list draggable"><div class="slick-track" style="opacity: 1; width: 25000px; transform: translate3d(-230px, 0px, 0px);"><div style="height: 300px;" class="slick-slide slick-cloned" data-slick-index="-3" aria-hidden="true" tabindex="-1">
      <img style="margin: auto;height: 100%;padding-left: 15px; padding-right: 15px;" src="./Nội thất Nhà Xinh _ Nội thất cao cấp _ Đồ gỗ cao cấp_files/nhaxinh-cam-hung-y-tuong-2.jpg">
    </div><div style="height: 300px;" class="slick-slide slick-cloned" data-slick-index="-2" aria-hidden="true" tabindex="-1">
      <img style="margin: auto;height: 100%;padding-left: 15px; padding-right: 15px;" src="./Nội thất Nhà Xinh _ Nội thất cao cấp _ Đồ gỗ cao cấp_files/nhaxinh-cam-hung-y-tuong-3.png">
    </div><div style="height: 300px;" class="slick-slide slick-cloned" data-slick-index="-1" aria-hidden="true" tabindex="-1">
      <img style="margin: auto;height: 100%;padding-left: 15px; padding-right: 15px;" src="./Nội thất Nhà Xinh _ Nội thất cao cấp _ Đồ gỗ cao cấp_files/nhaxinh-cam-hung-y-tuong-4.png">
    </div><div style="height: 300px;" class="slick-slide" data-slick-index="0" aria-hidden="true" tabindex="-1">
      <img style="margin: auto;height: 100%;padding-left: 15px; padding-right: 15px;" src="./Nội thất Nhà Xinh _ Nội thất cao cấp _ Đồ gỗ cao cấp_files/nhaxinh-cam-hung-y-tuong-0.jpg">
    </div><div style="height: 300px;" class="slick-slide" data-slick-index="1" aria-hidden="true" tabindex="-1">
      <img style="margin: auto;height: 100%;padding-left: 15px; padding-right: 15px;" src="./Nội thất Nhà Xinh _ Nội thất cao cấp _ Đồ gỗ cao cấp_files/nhaxinh-cam-hung-y-tuong-1.jpg">
    </div><div style="height: 300px;" class="slick-slide slick-current slick-active" data-slick-index="2" aria-hidden="false" tabindex="0">
      <img style="margin: auto;height: 100%;padding-left: 15px; padding-right: 15px;" src="./Nội thất Nhà Xinh _ Nội thất cao cấp _ Đồ gỗ cao cấp_files/nhaxinh-cam-hung-y-tuong-2.jpg">
    </div><div style="height: 300px;" class="slick-slide slick-active" data-slick-index="3" aria-hidden="false" tabindex="0">
      <img style="margin: auto;height: 100%;padding-left: 15px; padding-right: 15px;" src="./Nội thất Nhà Xinh _ Nội thất cao cấp _ Đồ gỗ cao cấp_files/nhaxinh-cam-hung-y-tuong-3.png">
    </div><div style="height: 300px;" class="slick-slide slick-active" data-slick-index="4" aria-hidden="false" tabindex="0">
      <img style="margin: auto;height: 100%;padding-left: 15px; padding-right: 15px;" src="./Nội thất Nhà Xinh _ Nội thất cao cấp _ Đồ gỗ cao cấp_files/nhaxinh-cam-hung-y-tuong-4.png">
    </div><div style="height: 300px;" class="slick-slide slick-cloned" data-slick-index="5" aria-hidden="true" tabindex="-1">
      <img style="margin: auto;height: 100%;padding-left: 15px; padding-right: 15px;" src="./Nội thất Nhà Xinh _ Nội thất cao cấp _ Đồ gỗ cao cấp_files/nhaxinh-cam-hung-y-tuong-0.jpg">
    </div><div style="height: 300px;" class="slick-slide slick-cloned" data-slick-index="6" aria-hidden="true" tabindex="-1">
      <img style="margin: auto;height: 100%;padding-left: 15px; padding-right: 15px;" src="./Nội thất Nhà Xinh _ Nội thất cao cấp _ Đồ gỗ cao cấp_files/nhaxinh-cam-hung-y-tuong-1.jpg">
    </div><div style="height: 300px;" class="slick-slide slick-cloned" data-slick-index="7" aria-hidden="true" tabindex="-1">
      <img style="margin: auto;height: 100%;padding-left: 15px; padding-right: 15px;" src="./Nội thất Nhà Xinh _ Nội thất cao cấp _ Đồ gỗ cao cấp_files/nhaxinh-cam-hung-y-tuong-2.jpg">
    </div><div style="height: 300px;" class="slick-slide slick-cloned" data-slick-index="8" aria-hidden="true" tabindex="-1">
      <img style="margin: auto;height: 100%;padding-left: 15px; padding-right: 15px;" src="./Nội thất Nhà Xinh _ Nội thất cao cấp _ Đồ gỗ cao cấp_files/nhaxinh-cam-hung-y-tuong-3.png">
    </div><div style="height: 300px;" class="slick-slide slick-cloned" data-slick-index="9" aria-hidden="true" tabindex="-1">
      <img style="margin: auto;height: 100%;padding-left: 15px; padding-right: 15px;" src="./Nội thất Nhà Xinh _ Nội thất cao cấp _ Đồ gỗ cao cấp_files/nhaxinh-cam-hung-y-tuong-4.png">
    </div></div></div>
    
    
    
    
  <button class="slick-next slick-arrow" aria-label="Next" type="button" style="background-color: lightgrey;">Next</button></div>
  <div style="width: 100%;text-align: center;"></div>
  <script>
    $(document).ready(function () {
      $('.idea').slick({
        slidesToShow: 3,
        slidesToScroll: 1,
        autoplay: true,
        autoplaySpeed: 2000,
        variableWidth: true,
      });

      $('button.slick-prev').css('background-color', 'lightgrey');
      $('button.slick-next').css('background-color', 'lightgrey');
    });
  </script>
</div>

<div style="clear: both;"></div>
<div id="intro-section" style="padding-top: 50px;">
  <img src="./Nội thất Nhà Xinh _ Nội thất cao cấp _ Đồ gỗ cao cấp_files/nha-xinh-gioi-thieu-mau.jpg" style="width: 100%;">
  <div id="intro_text">
    <div class="page_header" style="color: white;border: none;width: 100%;">TỔ ẤM CỦA NGƯỜI TINH TẾ</div>
    Khởi nguồn từ 1999 với ý tưởng tạo ra sự khác biệt và gu thẩm mỹ Tinh Tế, Nhà Xinh đã trở thành và giữ vững vị trí thương hiệu nội thất hàng đầu Việt Nam. Một quá trình dài của sự tìm tòi và đầy cảm hứng, Nhà Xinh đã thiết kế và sản xuất ra những sản phẩm nội thất hợp thời và độc đáo, kết hợp với quá trình chọn lọc kỹ lưỡng những món đồ trang trí để tạo nên không gian sống hài hòa, Tinh Tế và sang trọng. Nội thất Nhà Xinh chính là sự lựa chọn của những người Tinh Tế.
    <br><br>
    <a class="link_box top5" href="http://nhaxinh.com/nha-xinh-online-video_m378.html">Xem chi tiết</a>
  </div>
</div>
  </div>
<!------------------------------------------------------------------------------------------------------------------------------------------------------------------------------>
<!--footer-->
<div style="clear: both;"></div>
	<div id="footer" style="background-color: #4B4E51;">
    <div id="home_sub_banner"></div>
    <div class="footer-menu-left" style="padding-left: 35px;">
		<div class="clearfix">
			<div class="footerMenu" style="width:175px;">
				<h3>VỀ NHÀ XINH</h3>
				<ul style="padding-top: 10px;">
					<li><a href="http://nhaxinh.com/gioi-thieu-sieu-thi-noi-that-gia-dinh-nha-xinh_m413_n69.html" title="">Giới Thiệu</a></li>
					<li><a href="http://nhaxinh.com/tin-tuc-su-kien_m410.html" title="">Tin tức</a></li>
					<li><a href="http://nhaxinh.com/gioi-thieu-cong-ty_m252.html" title="">Tổng công ty</a></li>
					<li><a href="http://nhaxinh.com/sieu-thi-noi-that-gia-dinh-nha-xinh-tuyen-dung_m413_n59.html" title="">Tuyển dụng</a></li>
				</ul>
				<div class="mt-3"></div>
				<ul>
					<li><a href="http://nhaxinh.com/the-hoi-vien-sieu-thi-noi-that-gia-dinh-nha-xinh_m220.html" title="">Thẻ hộiviên</a></li>
					<li><a href="http://nhaxinh.com/phieu-qua-tang-nha-xinh_m271.html" title="">Phiếu quà tặng</a></li>
					<li><a href="http://nhaxinh.com/index.php?menu=222" title="">Giao hàng</a></li>
					<li><a href="http://nhaxinh.com/index.php?menu=221" title="">Bảo hành</a></li>
					<li><a href="http://nhaxinh.com/dat-hang-online-nha-xinh_m385.html" title="">Bán hàng online</a></li>
				</ul>
			</div>
			<div class="footerMenu" style="width:175px;">
				<h3>SẢN PHẨM</h3>
				<ul style="padding-top: 10px;">
					<li><a href="http://nhaxinh.com/sofa/sofa-dep-sofa-da-sofa-goc-sofa-vai_m4.html" title="">Sofa</a></li>
					<li><a href="http://nhaxinh.com/ghe-sofa/sofa-goc-lua-chon-cho-phong-khach-hien-dai_m5.html" title="">Sofa góc</a></li>
					<li><a href="http://nhaxinh.com/ghe-armchair-cho-noi-that-phong-khach_m8.html" title="">Armchair</a></li>
					<li><a href="http://nhaxinh.com/ban-nuoc-B%C3%A0n-n%C6%B0%E1%BB%9Bc_m11.html" title="">Bàn nước</a></li>
					<li><a href="http://nhaxinh.com/ban-ben-B%C3%A0n-b%C3%AAn_m14.html" title="">Bàn bên</a></li>
					<li><a href="http://nhaxinh.com/tu-tivi-tu-tivi-noi-that-phong-khach-noi-that-phong-khach_m16.html" title="">Tủ tivi</a></li>
					<li><a href="http://nhaxinh.com/ke-sach_m21.html" title="">Kệ trưng bày</a></li>
					<li><a href="http://nhaxinh.com/ghe-dai-don-trang-tri-noi-that-phong-khach_m9.html">Ghế dài và đôn</a></li>
					<li><a href="http://nhaxinh.com/ghe-thu-gian-cho-noi-that-phong-khach_m7.html" title="">Ghế thư giãn</a></li>
					<li></li>
					<li><a href="http://nhaxinh.com/Ban-an-tinh-te-cho-phong-an-dep_m36.html" title="">Bàn ăn</a></li>
					<li><a href="http://nhaxinh.com/Ghe-an-an-tuong-bien-noi-that-phong-an-tro-nen-tien-nghi-tao-cam-giac-thoai-mai_m37.html" title="">Ghế ăn</a></li>
					<li><a href="http://nhaxinh.com/tu-ly-tang-quy-phai-noi-that-ban-an-T%E1%BB%A7-ly_m39.html" title="">Tủ ly</a></li>
					<li><a href="http://nhaxinh.com/ban-console_m12.html" title="">Bàn console</a></li>
					<li></li>
					<li><a href="http://nhaxinh.com/Tu-bep-thiet-ke-dep-phong-phu_m99.html" title="">Tủ bếp</a></li>
				</ul>
			</div>
			<div class="footerMenu" style="width:175px;">
				<ul style="padding-top: 34px;">
					<li><a href="http://nhaxinh.com/mau-giuong-ngu-thiet-ke-dep-tinh-te-cho-phong-ngu_m54.html" title="">Giường ngủ</a></li>
					<li><a href="http://nhaxinh.com/ban-dau-giuong-noi-that-phong-ngu_m55.html" title="">Bàn đầu giường</a></li>
					<li><a href="http://nhaxinh.com/ban-trang-diem-noi-that-phong-ngu_m56.html" title="">Bàn trang điểm</a></li>
					<li><a href="http://nhaxinh.com/tu-hoc-keo-thich-hop-chua-cac-vat-dung%20trong-phong-an_m63.html" title="">Tủ hộc kéo</a></li>
					<li><a href="http://nhaxinh.com/tu-ao-quan-tu-ao-2-buong-tu-ao-3-buong-tu-ao-4-buong-go-soi-tu-nhien-my-thuat-chau-Au-thap-nien-60-co-dien-chau%20Au-phu-hop-loi-song-hien-dai-gam-mau-nau-go-dam-quy-phai-van-lang_m60.html" title="">Tủ áo</a></li>
					<li><a href="http://nhaxinh.com/tu-ao-am-tuong-phong-ngu-go-tu-nhien-mau-ma-dep-rong-rai-dep-tiet-kiem-dien-tich-toi-da-go-oc-cho-walnut-van-lang-soi-oak-go-tech-teak_m61.html" title="">Tủ âm</a></li>
					<li></li>
					<li><a href="http://nhaxinh.com/ban-lam-viec-phong-lam-viec_m80.html" title="">Bàn làm việc</a></li>
					<li><a href="http://nhaxinh.com/ghe-phong-lam-viec_m81.html" title="">Ghế làm việc</a></li>
					<li><a href="http://nhaxinh.com/ke-sach-phong-lam-viec_m83.html" title="">Kệ sách</a></li>
					<li></li>
					<li><a href="http://nhaxinh.com/tham_m146.html" title="">Thảm</a></li>
					<li><a href="http://nhaxinh.com/den_m147.html" title="">Đèn</a></li>
					<li><a href="http://nhaxinh.com/hang-trang-tri-da-dang-tinh-te_m142.html" title="">Đồ trang trí</a></li>
					<li></li>
					<li><a href="http://nhaxinh.com/ban-ngoai-troi_m168.html" title="">Bàn ngoài trời</a></li>
					<li><a href="http://nhaxinh.com/ghe-ngoi-ngoai-troi_m169.html" title="">Ghế ngoài trời</a></li>
				</ul>
			</div>
			<div class="footerMenu" style="width:175px; padding-left: 35px;">
				<h3>CẢM HỨNG #NHAXINH</h3>
				<ul style="padding-top: 10px;">
					<li><a href="http://nhaxinh.com/san-pham-moi_m311.html" title="">Sản phẩm mới</a></li>
					<li><a href="http://nhaxinh.com/khong-gian-song_m411.html" title="">Ý tưởng và cảm hứng</a></li>
					<li><a href="http://nhaxinh.com/phong-cach-noi-that" title="">Phong cách nội thất</a></li>
					<li><a href="http://nhaxinh.com/cau-chuyen-thiet-ke-noi-that-sofa-tu-bep_m228.html" title="">Câu chuyện thiết kế</a></li>
					<li><a href="http://nhaxinh.com/vat-lieu-su-dung-trong-noi-that_m414.html" title="">Vật liệu sử dụng</a></li>
					<li><a href="http://nhaxinh.com/an-pham-bao-chi-spaace_m216.html" title="">Tạp chí Spaace</a></li>
				</ul>
			</div>
		</div>
	</div>
		<script language="javascript">
			function validate_required(field) {
				with (field) {
					if (value == null || value == "") {
						return false;
					} else {
						return true;
					}
				}
			}
			function echeck(str) {
				var at = "@";
				var dot = ".";
				var lat = str.indexOf(at);
				var lstr = str.length;
				var ldot = str.indexOf(dot);
				if (str.indexOf(at) == -1) {
					return false;
				}
				if (str.indexOf(at) == -1 || str.indexOf(at) == 0 || str.indexOf(at) == lstr) {
					return false;
				}
				if (str.indexOf(dot) == -1 || str.indexOf(dot) == 0 || str.indexOf(dot) == lstr) {
					return false;
				}
				if (str.indexOf(at, (lat + 1)) != -1) {
					return false;
				}
				if (str.substring(lat - 1, lat) == dot || str.substring(lat + 1, lat + 2) == dot) {
					return false;
				}
				if (str.indexOf(dot, (lat + 2)) == -1) {
					return false;
				}
				if (str.indexOf(" ") != -1) {
					return false;
				}
				return true;
			}
			function ValidateForm01() {
				var emailID = document.mail_regis.fmail_email;
				if ((emailID.value == null) || (emailID.value == "")) {
					alert("Bạn chưa điền email");
					emailID.focus();
					return false;
				}
				if (echeck(emailID.value) == false) {
					alert("Địa chỉ mail không hợp lệ");
					emailID.focus();
					return false;
				}
				return true;
			}
			function submit_mail(url) {
				if (ValidateForm01() == true) {
					window.location.href = url;
					// $('#newsletterSubscribe').attr('action', url);
					// $('#newsletterSubscribe').submit();
					//document.mail_regis.submit();
				}
      }
    </script>
    <div class="footer-menu-right position-relative">
      <div class="position-absolute" style="right: 75px; top: 10px;background: white; width: 300px; height: 250px;">
        <div class="pt-2 pl-3" style="color:#4B4E51">Follow us on social networks!</div>
        <div class="pl-3 pt-3">
          <a href="https://www.facebook.com/nhaxinhvn"><img src="./Nội thất Nhà Xinh _ Nội thất cao cấp _ Đồ gỗ cao cấp_files/facebook.png"></a>
          <a href="https://www.instagram.com/nha_xinh/"><img src="./Nội thất Nhà Xinh _ Nội thất cao cấp _ Đồ gỗ cao cấp_files/instagram.png"></a>
          <a href="https://www.youtube.com/channel/UCF7xHSOGR-IW18A5OUjaFzw"><img src="./Nội thất Nhà Xinh _ Nội thất cao cấp _ Đồ gỗ cao cấp_files/youtube.png"></a>
        </div>
        <div class="pt-3 pl-3 pb-3" style="color:#4B4E51;line-height: 1.5;">Hãy để lại email của bạn để nhận
          được những ý tưởng trang trí mới và những thông tin, ưu đãi từ Nhà Xinh
        </div>
        <form id="newsletterSubscribe" name="mail_regis">
          <div class="input-group ml-3" style="width: 265px;" id="">
            <input type="text" style="width: 200px;outline: none;" value="Hãy tham gia đăng ký để nhận được những thông tin khuyến mại, sản phẩm mới từ Nhà Xinh" name="fmail_email" id="" onfocus="this.value=&#39;&#39;;">
            <div class="input-group-append" style="width: 65px;">
              <a href="javascript:submit_mail(&#39;index.php?menu=256&#39;);" class="sign_up_btn btn" id="" style="text-decoration:none;margin: auto;background-color: orange;text-align: center;color: white;font-size: 12px;">Đăng
                ký</a>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
  <!-- end footer -->
</div>
<div class="clearfix"></div>
<div id="home_showroom">
  <div class="location">
    Hệ thống cửa hàng
  </div>
  <div class="showroom">
    <div class="left-panel">
      <div class="text-center w-100"><h3>Hà Nội</h3></div>
      <ul>
        <li>
          Tầng 1 - Tòa nhà F4, 112 Đường Trung Kính, Q. Cầu Giấy, Hà Nội. (1000 m<sup style="font-size: 10px">2</sup>),
          có chỗ để xe ô tô.
          <br>
          ÐT: (84.24) 3782 1761 | 0904016263 (Ms. Huyền) | Giờ mở cửa: 8h30 - 21h00 (Cả tuần)
        </li>
        <li>
          L4-04, Tầng 4, TTTM Vincom Center, 54 Nguyễn Chí Thanh, Đống Đa.(700 m<sup>2</sup>), có chỗ để xe ô tô
          <br>
          ÐT: (84.24) 3761 7666 | 0982613543 (Ms. Dung) | Giờ mở cửa: 9h30 - 22h00 (Cả tuần)
        </li>
        <li>
          Tòa nhà E1, Chung cư Rừng Cọ, KĐT Ecopark, Hưng Yên.(300 m
          <sup>
            2
          </sup>
          ), có chỗ để xe ô tô
          <br>
          ÐT: (84.24) 6262 0739 | 0904127594 (Ms. Thủy) | Giờ mở cửa: 8h30 - 17h30 (Cả tuần)
        </li>
        <li>
          Tầng 3, TTTM Sun Plaza - 69 Thuỵ Khuê, Tây Hồ, Hà Nội (12 Hoàng Hoa Thám).
          Diện tích: 3000 m<sup style="font-size: 10px">2</sup> (Có chỗ đậu xe ô tô)<br>
          ĐT: (84.24) 3201 2118 | 0909358887 (Ms. Lành) | Giờ mở cửa: 9h00 - 20h00 (Cả tuần)
        </li>
      </ul>
    </div>
    <div class="middle-panel">
      <a href="http://nhaxinh.com/he-thong-cua-hang-sieu-thi-noi-that-nha-xinh_m413_n71.html">Xem tất cả</a>
    </div>
    <div class="right-panel">
      <h3>TP.Hồ Chí Minh</h3>
      <ul>
        <li>
          187A Hai Bà Trưng, P.6, Q.3, TP.HCM ( 1.000 m 2), có chổ để xe ô tô.
          <br>
          ĐT: (028) 62520022 / 62512200 | 0902946454 (Ms. Như) | Giờ mở cửa: 8h30 – 21h (Cả tuần)
        </li>
        <li>
          L4-20, Tầng 4, Tòa nhà Saigon Centre, 65 Lê Lợi, Q1, Tp. Hồ Chí Minh, có chỗ để xe ô tô.
          <br>
          ÐT: (84.28) 3620 1557 / 3620 1558 | 0976399733 (Ms. Hồng Trang) | Giờ mở cửa: 9h00 - 21h30 (Từ thứ 2 đến thứ
          5) | 9h00 - 22h00 (Thứ 6, thứ 7 &amp; CN)
        </li>
        <li>
          107 - 109 Song Hành - Xa Lộ Hà Nội, P.Thảo Điền, Q.2, TP.HCM ( 900 m2), có chỗ để xe ô tô.
          <br>
          ĐT: (84.28) 35351505 / 35351506 | 0902720868 (Ms. Vân Chung) | Giờ mở cửa: 8h30 – 21h (Cả tuần)
        </li>
        <li>
          Phú Mỹ Hưng , 111 Tôn Dật Tiên ( Cắt đường Phạm Thiều), Q.7 (3000 m
          <sup>
            2
          </sup>
          ), có chỗ để xe ô tô
          <br>
          ÐT: (84.28) 5413 6657 | 0974163015 (Ms. Nga) |Giờ mở cửa: 8h30 - 20h30 (Từ thứ 2 đến thứ 6) | 8h30 - 21h00
          (Thứ 7 &amp; CN)
        </li>
      </ul>
    </div>
  </div>
</div>
<div style="clear: both;"></div>

<div id="lgo">
  <div class="clearfix" style="position: relative; display: flex">
    <div class="lgo-left-2" style="position: relative;padding: 0 !important;width: 20%;border-right: 1px solid #BBBDC0;">
      <a target="_blank" href="http://www.akafurniture.com.vn/">
        <img src="./Nội thất Nhà Xinh _ Nội thất cao cấp _ Đồ gỗ cao cấp_files/0.akafurnituregroup.png" style="max-width: 65%;position: relative">
      </a>
    </div>
    <div class="lgo-right-2" style="position:relative; width: 80%">
      <div style="position: absolute; width:100%; padding-left: 30px;display: flex; top:0; justify-content: space-between;align-items: center;">
        <a target="_blank" href="https://www.nhaxinh.com/"><img style="max-height: 50px" src="./Nội thất Nhà Xinh _ Nội thất cao cấp _ Đồ gỗ cao cấp_files/nhaxinh_2.png"></a>
        <a target="_blank" href="https://www.boconcept.com/vi-vn/"><img style="max-height: 33px" wr="" src="./Nội thất Nhà Xinh _ Nội thất cao cấp _ Đồ gỗ cao cấp_files/boconcept_2.png"></a>
        <a target="_blank" href="https://www.calligaris.com/en_gb"><img style="max-height: 33px" src="./Nội thất Nhà Xinh _ Nội thất cao cấp _ Đồ gỗ cao cấp_files/calligaris.png"></a>
        <a target="_blank" href="http://bellavitaluxury.com/"><img style="height: 67px" src="./Nội thất Nhà Xinh _ Nội thất cao cấp _ Đồ gỗ cao cấp_files/bella.png"></a>
        <a target="_blank" href="http://bellavitaluxury.com/brands/baxter-vi/"><img style="height: 67px" src="./Nội thất Nhà Xinh _ Nội thất cao cấp _ Đồ gỗ cao cấp_files/baxter.png"></a>
        <a target="_blank" href="http://bellavitaluxury.com/brands/arclinea-vi/"><img style="max-height: 33px" src="./Nội thất Nhà Xinh _ Nội thất cao cấp _ Đồ gỗ cao cấp_files/arclinea.png"></a>
      </div>
      <div style="position: absolute; width:100%; padding-left: 30px;display: flex; bottom:0; justify-content: space-between;align-items: center;">
        <a target="_blank" href="http://bellavitaluxury.com/brands/ceccotti-collezioni/"><img style="max-height: 33px" src="./Nội thất Nhà Xinh _ Nội thất cao cấp _ Đồ gỗ cao cấp_files/ceccotti.png"></a>
        <a target="_blank" href="http://bellavitaluxury.com/brands/walter-knoll-vi/"><img style="max-height: 33px" src="./Nội thất Nhà Xinh _ Nội thất cao cấp _ Đồ gỗ cao cấp_files/walterknoll.png"></a>
        <a target="_blank" href="http://bellavitaluxury.com/brands/dimensione-chi-wing-lo-vi/"><img style="max-height: 50px" src="./Nội thất Nhà Xinh _ Nội thất cao cấp _ Đồ gỗ cao cấp_files/dimensione.png"></a>

        <a target="_blank" href="https://www.ligne-roset.com/vn/"><img style="height: 33px" src="./Nội thất Nhà Xinh _ Nội thất cao cấp _ Đồ gỗ cao cấp_files/logo-ligne.png"></a>
        <a target="_blank" href="https://www.lago.it/en/"><img style="max-height: 50px" src="./Nội thất Nhà Xinh _ Nội thất cao cấp _ Đồ gỗ cao cấp_files/lago.png"></a>
      </div>
    </div>
  </div>
</div>
<div style="clear: both;"></div>
<script>
  (function (i, s, o, g, r, a, m) {
    i['GoogleAnalyticsObject'] = r;
    i[r] = i[r] || function () {
      (i[r].q = i[r].q || []).push(arguments)
    }, i[r].l = 1 * new Date();
    a = s.createElement(o),
      m = s.getElementsByTagName(o)[0];
    a.async = 1;
    a.src = g;
    m.parentNode.insertBefore(a, m)
  })(window, document, 'script', '//www.google-analytics.com/analytics.js', 'ga');
  ga('create', 'UA-45570515-1', 'nhaxinh.com');
  ga('send', 'pageview');
</script>

<div class="clearfix" style="background-color: #4B4E51;">
  <div class="float-left text-white d-block" style="width: 150px;margin: 15px">
    <span class="fas fa-phone mr-1" style="color: orange;"></span>Hotline: 1800 7200
  </div>
  <div class="float-right" style="margin: 15px 30px 15px 15px;">
    <span class="text-white">nhaxinhcare@akacompany.com.vn</span>
  </div>
</div>
<!-- Start of akasupportcenter Zendesk Widget script -->
<script id="ze-snippet" src="./Nội thất Nhà Xinh _ Nội thất cao cấp _ Đồ gỗ cao cấp_files/snippet.js.download"></script>
<!-- End of akasupportcenter Zendesk Widget script -->
<!-- Load Facebook SDK for JavaScript -->
<div id="fb-root"></div>
<script>
  window.fbAsyncInit = function() {
    FB.init({
      xfbml            : true,
      version          : 'v10.0'
    });
  };

  (function(d, s, id) {
    var js, fjs = d.getElementsByTagName(s)[0];
    if (d.getElementById(id)) return;
    js = d.createElement(s); js.id = id;
    js.src = 'https://connect.facebook.net/vi_VN/sdk/xfbml.customerchat.js';
    fjs.parentNode.insertBefore(js, fjs);
  }(document, 'script', 'facebook-jssdk'));</script>

<!-- Your Chat Plugin code -->
<div class="fb-customerchat" attribution="setup_tool" page_id="242481079174652" theme_color="#0A7CFF" logged_in_greeting="Chào bạn! Hãy chat với Nhà Xinh ngay nhé." logged_out_greeting="Chào bạn! Hãy chat với Nhà Xinh ngay nhé.">
</div>

<iframe data-product="web_widget" title="No content" tabindex="-1" aria-hidden="true" src="./Nội thất Nhà Xinh _ Nội thất cao cấp _ Đồ gỗ cao cấp_files/saved_resource.html" style="width: 0px; height: 0px; border: 0px; position: absolute; top: -9999px;"></iframe></body></html>