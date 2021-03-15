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
				<img src="./image/EN.jpg">
    		</a>
    	</span>
    </div>
  </div>
  <div style="position: absolute; width: 100%; text-align: center;top:60px;">
    <a href="http://nhaxinh.com/index.php"><img src="image/logo.png" alt="Nhà Xinh" width="135px" height="135px"></a>
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
