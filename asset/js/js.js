$(".header__login").on("click", function() {
  $(".signin").toggleClass("login--active");
  $(".bg__login").toggleClass("bg__login--active");
});
$(".bg__login").on("click", function() {
        $(".signin").removeClass("login--active");
        $(".bg__login").removeClass("bg__login--active");
    });
    $(".header__signup").on("click", function() {
        $(".signup").toggleClass("login--active");
        $(".bg__login").toggleClass("bg__login--active");
      });
      $(".bg__login").on("click", function() {
              $(".signup").removeClass("login--active");
              $(".bg__login").removeClass("bg__login--active");
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
//   admin

