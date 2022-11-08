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
//   admin

