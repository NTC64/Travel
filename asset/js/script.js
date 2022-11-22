$(document).on('click', '.has-dropdown,.i', function() {
  if($(".sidebar-dropdown").hasClass("hide")) {
    $(".sidebar-dropdown").addClass("hide");
     $(this).find(".sidebar-dropdown").removeClass("hide");
  }
 else {
     $(this).find(".sidebar-dropdown").addClass("hide");
 }

});
$(document).on('click', '.news', function() {
  if($(".adminnews").hasClass("hide")) {
    $(".admin__user").addClass("hide");
    $(".admin__seller").addClass("hide");
    $(".adminnews").removeClass("hide");
    
  }
  else {
  $(".adminnews").addClass("hide");
  }
});
$(document).on('click', '.user', function() {
  
  if($(".admin__user").hasClass("hide")) {
   
    $(".admin__seller").addClass("hide");
    $(".adminnews").addClass("hide");
     $(".admin__user").removeClass("hide");
  }
 else {
  
     $(".admin__user").addClass("hide");
 }

});
$(document).on('click', '.seller', function() {
  if($(".admin__seller").hasClass("hide")) {
    $(".admin__user").addClass("hide");
    $(".adminnews").addClass("hide");
    $(".admin__seller").removeClass("hide");
 }
else {
    $(".admin__seller").addClass("hide");
}
});
$(document).on('click','.btn__editnews',function(){
  if($(".editnews").hasClass("hide")) {
    $(".bg").removeClass("hide");
    $(".editnews").removeClass("hide");
    $(".id").val($(this).attr("data-id"));
    $(".newsname").val($(this).attr("data-newsname"));
    $(".describe").val($(this).attr("data-describe"));
    
 }
else {
    $(".editnews").addClass("hide");
}
});
$(document).on('click', '.btn__edituser', function() {
  if($(".edituser").hasClass("hide")) {
    $(".bg").removeClass("hide");
    $(".edituser").removeClass("hide");
    $(".id").val($(this).attr("data-id"));
    $(".username").val($(this).attr("data-username"));
    $(".name").val($(this).attr("data-name"));
    
 }
else {
    $(".edituser").addClass("hide");
}
});
$(document).on('click', '.btn__editseller', function(){
  if($(".editseller").hasClass("hide")) {
    $(".bg").removeClass("hide");
    $(".editseller").removeClass("hide");
    $(".id").val($(this).attr("data-id"));
    $(".username").val($(this).attr("data-username"));
    $(".name").val($(this).attr("data-name"));
    $(".hotel_name").val($(this).attr("data-hotelname"));
    $(".phone").val($(this).attr("data-phone"));
 }
else {
    $(".editseller").addClass("hide");
}
});
$(document).on('click', '.bg', function() {
  
    $(".bg").addClass("hide");
    $(".edit").addClass("hide");
    $(".create").addClass("hide");

});
$(document).on('click', '.btn__delete', function() {
  
  const swalWithBootstrapButtons = Swal.mixin({
    customClass: {
      confirmButton: 'btn btn-success mx-3',
      cancelButton: 'btn btn-danger'
    },
    buttonsStyling: false
  })
  
  swalWithBootstrapButtons.fire({
    title: 'Are you sure?',
    text: "You won't be able to revert this!",
    icon: 'warning',
    showCancelButton: true,
    confirmButtonText: 'Yes, delete it!',
    cancelButtonText: 'No, cancel!',
    reverseButtons: true
  }).then((result) => {
    if (result.isConfirmed) {
      swalWithBootstrapButtons.fire(
        'Deleted!',
        'Your file has been deleted.',
        'success'
      ).then((result) => {
        if (result.isConfirmed) {
          window.location.href = "delete.php?ID="+$(this).attr("data-id");
        }
      })
    } else if (
      /* Read more about handling dismissals below */
      result.dismiss === Swal.DismissReason.cancel
    ) {
      swalWithBootstrapButtons.fire(
        'Cancelled',
        'Your data is safe :)',
        'error'
      )
    }
  })
});
$(document).on('click', '.btncreateuser', function() {
  if($(".createuser").hasClass("hide")) {
    $(".bg").removeClass("hide");
    $(".createuser").removeClass("hide");
 }
else {
    $(".createuser").addClass("hide");
}
});
$(document).on('click', '.btncreatenews', function(){
  if($(".createnews").hasClass("hide")) {
    $(".bg").removeClass("hide");
    $(".createnews").removeClass("hide");
 }
else {
    $(".createnews").addClass("hide");
}
});
$(document).on('click', '.btncreateseller', function() {
  if($(".createseller").hasClass("hide")) {
    $(".bg").removeClass("hide");
    $(".createseller").removeClass("hide");
 }
else {
    $(".createseller").addClass("hide");
}
});