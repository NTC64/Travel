$(document).on('click', '.has-dropdown,.i', function() {
  if($(".sidebar-dropdown").hasClass("hide")) {
    $(".sidebar-dropdown").addClass("hide");
     $(this).find(".sidebar-dropdown").removeClass("hide");
  }
 else {
     $(this).find(".sidebar-dropdown").addClass("hide");
 }

});
$(document).on('click', '.user', function() {
  
  if($(".admin__user").hasClass("hide")) {
   
    $(".admin__seller").addClass("hide");
     $(".admin__user").removeClass("hide");
  }
 else {
  
     $(".admin__user").addClass("hide");
 }

});
$(document).on('click', '.seller', function() {
  if($(".admin__seller").hasClass("hide")) {
    $(".admin__user").addClass("hide");
    $(".admin__seller").removeClass("hide");
 }
else {
    $(".admin__seller").addClass("hide");
}
});