$(".header__login").on("click", function() {
  $(".signin").toggleClass("login--active");
  $(".bg").toggleClass("bg--active");
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



