$(".header__login").on("click", function () {
  $(".signin").toggleClass("login--active");
  $(".bg").toggleClass("bg--active");
});
$(".search__btn").on("click", function () {
  Swal.fire({
    icon: "error",
    title: "Oops...",
    text: "The feature is under maintenance. Please come back in the future!!",
  });
});
$(".btn__tourdetail").on("click", function () {
  $(".tourdetail").toggleClass("tourdetail--active");
  $(".bg").toggleClass("bg--active");
});
$(".bg").on("click", function () {
  $(".tourdetail").removeClass("tourdetail--active");
  $(".bg").removeClass("bg--active");
});
$(".bg").on("click", function () {
  $(".signin").removeClass("login--active");

  $(".bg").removeClass("bg--active");
});
$(".header__signup").on("click", function () {
  $(".signup").toggleClass("login--active");
  $(".bg").toggleClass("bg--active");
});
$(".bg").on("click", function () {
  $(".signup").removeClass("login--active");
  $(".bg").removeClass("bg--active");
});
$(document).on("click", ".hide", function () {
  if ($(".password").attr("type") == "password") {
    $(".password").attr("type", "text");
  } else {
    $(".password").attr("type", "password");
  }
});
$(document).on("click", ".seller", function () {
  $(".ip_hide").removeClass("ip_hide");
  $(".seller").addClass("ip_hide");
  $(".phone").attr("required", "required");
  $(".hotel_name").attr("required", "required");
});
$(document).on("click", ".user", function () {
  $(".ip_seller").addClass("ip_hide");
  $(".user").addClass("ip_hide");
  $(".seller").removeClass("ip_hide");
  $(".phone").removeAttr("required");
  $(".hotel_name").removeAttr("required");
});

$(document).ready(function () {
  $(".date").val(new Date().toISOString().substr(0, 10));
});
$(document).ready(function () {
  var price = parseFloat($(".price").val());
  var quantity = parseFloat($(".quantity").val());
  var total = price * quantity;
  $(".total").html(total);
  $(".btnad").click(function () {
    if ($(".discount").val() === "ULSAIT") {
      var price = parseFloat($(".price").val());
      var quantity = parseFloat($(".quantity").val());
      var total = price * quantity;
      total = total - total * 0.2;
      $(".totaldc").html(total);
      $(".total").addClass("gach");
    } else {
      Swal.fire({
        icon: "error",
        title: "Oops...",
        text: "The voucher is incorrect!!",
      });
      $(".totaldc").html("");
      $(".total").removeClass("gach");
    }
  });

  $(".quantity").on("change", function () {
    var price = parseFloat($(".price").val());
    var quantity = parseFloat($(".quantity").val());
    var total = price * quantity;
    $(".total").html(total);
    if ($(".discount").val() === "ULSAIT") {
      var price = parseFloat($(".price").val());
      var quantity = parseFloat($(".quantity").val());
      var total = price * quantity;
      total = total - total * 0.2;
      $(".totaldc").html(total);
      $(".total").addClass("gach");
    }
  });
});
$(document).on("click", ".btn__tour", function () {
  if ($(".header__signup").html() == "Sign Up") {
    Swal.fire({
      icon: "error",
      title: "Oops...",
      text: "Bạn phải đăng nhập để tiếp tục !!",
      confirmButtonText: "Đăng nhập",
      showDenyButton: true,
      denyButtonText: "Đăng ký",
      showCancelButton: true,
      cancelButtonText: "Hủy bỏ",
    }).then((result) => {
      if (result.isConfirmed) {
        $(".signin").toggleClass("login--active");
        $(".bg").toggleClass("bg--active");
      } else if (result.isDenied) {
        $(".signup").toggleClass("login--active");
        $(".bg").toggleClass("bg--active");
      } else {
        return;
      }
    });
  } else {
    window.location.href =
      "booking.php?quantity=" +
      $(".sluong").val() +
      "&tourID=" +
      $(this).attr("data-id");
  }
});
$(document).on("click", ".category__left", function () {
  $(location).attr(
    "href",
    "category.php?category=" + $(this).attr("data-category")
  );
  sessionStorage.setItem("category", $(this).attr("data-category"));
});
$(document).on("click", ".category__right", function () {
  $(location).attr(
    "href",
    "category.php?category=" + $(this).attr("data-category")
  );
  sessionStorage.setItem("category", $(this).attr("data-category"));
});
$(document).on("click", ".btnbook", function () {
  if ($("#pay").val() == "momo") {
    $(location).attr("href", "vnpay_php/index.php");
  } else {
    Swal.fire({
      icon: "error",
      title: "Oops...",
      text: "The feature is under maintenance. Please come back in the future!!",
    });

    // $(location).attr('href', 'http://localhost/travel/PayMoMo/init_payment.php');
  }
});
