$(".header__login").on("click", function() {
  $(".signin").toggleClass("login--active");
  $(".bg").toggleClass("bg--active");
});
$(".search__btn").on("click", function() {
    Swal.fire({
        icon: 'error',
        title: 'Oops...',
        text: 'the system is under maintenance, please come back in the future!!',

      })
});
$(".btn__tourdetail").on("click", function() {
    $(".tourdetail").toggleClass("tourdetail--active");
    $(".bg").toggleClass("bg--active");
  });
  $(".bg").on("click", function() {
    $(".tourdetail").removeClass("tourdetail--active");
    $(".bg").removeClass("bg--active");
});
$(".bg").on("click", function() {
        $(".signin").removeClass("login--active");
        
        $(".bg").removeClass("bg--active");
    });
    $(".header__signup").on("click", function() {
        $(".signup").toggleClass("login--active");
        $(".bg").toggleClass("bg--active");
      });
      $(".bg").on("click", function() {
              $(".signup").removeClass("login--active");
              $(".bg").removeClass("bg--active");
          });
$(document).on("click", ".hide", function() {

    if($(".password").attr("type") == "password"){
        $(".password").attr("type", "text");
    }
    else{
        $(".password").attr("type", "password");
    }

});
$(document).on("click", ".seller", function() {
    $(".ip_hide").removeClass("ip_hide");
    $(".seller").addClass("ip_hide");
    $(".phone").attr("required", "required");
    $(".hotel_name").attr("required", "required");
});
$(document).on("click", ".user", function() {
    $(".ip_seller").addClass("ip_hide");
    $(".user").addClass("ip_hide");
    $(".seller").removeClass("ip_hide");
    $(".phone").removeAttr("required");
    $(".hotel_name").removeAttr("required");
});

$(document).ready(function() {
    $(".date").val(new Date().toISOString().substr(0, 10));
   
        
});
$(document).ready(function() {
    var price=parseFloat( $('.price').val());
    var quantity=parseFloat( $('.quantity').val());
    var total=price*quantity;
    $(".total").html(total);
    $(".quantity").on("change", function() {
    var price=parseFloat( $('.price').val());
    var quantity=parseFloat( $('.quantity').val());
    var total=price*quantity;
    $(".total").html(total);});
});
$(document).on('click','.category__left',function() {
    $(location).attr('href', 'category.php?category='+$(this).attr('data-category'));
    sessionStorage.setItem('category', $(this).attr('data-category'));

});
$(document).on('click','.category__right',function() {
    $(location).attr('href', 'category.php?category='+$(this).attr('data-category'));
    sessionStorage.setItem('category', $(this).attr('data-category'));

});
$(document).on('click','.btnbook',function() {
    if($("#pay").val() == "momo"){
    $(location).attr('href', 'PayMoMo/init_payment.php');
    }
    else{
        alert("Chưa có phương thức thanh toán này");
        // $(location).attr('href', 'http://localhost/travel/PayMoMo/init_payment.php');
    }   

});
$(document).on('click','.btn__tour',function() {
    $(location).attr('href', 'http://localhost/travel/tourdetail.php?id='+$(this).attr('data-id'));


});



