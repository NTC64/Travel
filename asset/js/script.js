$(document).ready(function() {
  if($(".adrole").data("role") === "admin") {
   $(".account").addClass("hide");
  
  }
  else if($(".adrole").data("role") === "superadmin") {
   $(".account").removeClass("hide");
  }
  else{
    $(".account").addClass("hide");
    $(".adcategory").addClass("hide");
    $(".news").addClass("hide");
  }
 });
$(document).on('click', '.has-dropdown,.i', function() {
  if($(this).find(".sidebar-dropdown").hasClass("hide")) {
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
    $(".createad").addClass("hide");
    $(".bg").addClass("hide");
    $(".admin__ad").addClass("hide");
    $(".admin__seller").addClass("hide");
    $(".createnews").addClass("hide");
    $(".admincategorynews").addClass("hide");
    $(".admincategorytour").addClass("hide");
    $(".createctg").addClass("hide");
    $(".adminalltour").addClass("hide");
    $(".adminmntour").addClass("hide");
    $(".adminnews").removeClass("hide");
    
  }
  else {
  $(".adminnews").addClass("hide");
  }
});
$(document).on('click', '.tourmanagement', function() {
  if($(".adminmntour").hasClass("hide")) {
    $(".admin__user").addClass("hide");
    $(".createad").addClass("hide");
    $(".bg").addClass("hide");
    $(".admin__ad").addClass("hide");
    $(".admin__seller").addClass("hide");
    $(".createnews").addClass("hide");
    $(".admincategorynews").addClass("hide");
    $(".admincategorytour").addClass("hide");
    $(".adminalltour").addClass("hide");
    $(".createctg").addClass("hide");
    $(".adminnews").addClass("hide");
    $(".adminmntour").removeClass("hide");
    
  }
  else {
  $(".adminmntour").addClass("hide");
  }
});
$(document).on('click', '.user', function() {
  
  if($(".admin__user").hasClass("hide")) {
    $(".admin__ad").addClass("hide");
    $(".bg").addClass("hide");
    $(".admin__seller").addClass("hide");
    $(".adminnews").addClass("hide");
    $(".createad").addClass("hide");
    $(".createnews").addClass("hide");
    $(".adminalltour").addClass("hide");
    $(".adminmntour").addClass("hide");

     $(".admin__user").removeClass("hide");
  }
 else {
  
     $(".admin__user").addClass("hide");
 }

});
$(document).on('click', '.tourall', function() {
    
    if($(".admin__ad").hasClass("hide")) {
      $(".admin__user").addClass("hide");
      $(".bg").addClass("hide");
      $(".admin__seller").addClass("hide");
      $(".adminnews").addClass("hide");
      $(".createad").addClass("hide");
      $(".createnews").addClass("hide");
    $(".adminmntour").addClass("hide");
      $(".admincategorytour").addClass("hide");
      $(".createctg").addClass("hide");
      $(".admincategorynews").addClass("hide");
      $(".adminalltour").removeClass("hide");
    }
  else {
    
      $(".adminalltour").addClass("hide");
  }
  
});
$(document).on('click', '.seller', function() {
  if($(".admin__seller").hasClass("hide")) {
    $(".admin__ad").addClass("hide");
    $(".bg").addClass("hide");
    $(".admin__user").addClass("hide");
    $(".adminnews").addClass("hide");
    $(".createad").addClass("hide");
    $(".adminmntour").addClass("hide");

    $(".createnews").addClass("hide");
    $(".adminalltour").addClass("hide");

    $(".admin__seller").removeClass("hide");
 }
else {
    $(".admin__seller").addClass("hide");
}
});
$(document).on('click', '.categorynews', function() {
  if($(".admin__ad").hasClass("hide")) {
    $(".admin__user").addClass("hide");
    $(".bg").addClass("hide");
    $(".admin__seller").addClass("hide");
    $(".adminnews").addClass("hide");
    $(".createad").addClass("hide");
    $(".adminmntour").addClass("hide");

    $(".createnews").addClass("hide");
    $(".admincategorytour").addClass("hide");
    $(".createctg").addClass("hide");
    $(".adminalltour").addClass("hide");

    $(".admincategorynews").removeClass("hide");
 }
else {
    $(".admincategorynews").addClass("hide");
}
});
$(document).on('click', '.categorytour', function() {
  if($(".admin__ad").hasClass("hide")) {
    $(".admin__user").addClass("hide");
    $(".bg").addClass("hide");
    $(".admin__seller").addClass("hide");
    $(".adminnews").addClass("hide");
    $(".createad").addClass("hide");
    $(".adminmntour").addClass("hide");

    $(".admincategorynews").addClass("hide");
    $(".createctg").addClass("hide");
    $(".createnews").addClass("hide");
    $(".adminalltour").addClass("hide");

    $(".admincategorytour").removeClass("hide");
 }
else {
    $(".admincategorytour").addClass("hide");
}
});
$(document).on('click', '.btncreatenews', function() {

  if($(".createad").hasClass("hide")) {
    
    $(".bg").removeClass("hide");
    
   
    $(".createnews").removeClass("hide");
 }
else {
    $(".createnews").addClass("hide");
}
});
$(document).on('click','.btn__editnews',function(){
  if($(".editnews").hasClass("hide")) {
    $(".bg").removeClass("hide");
    $(".editnews").removeClass("hide");
  $(".upnewstitle").val($(this).attr("data-title"));
  $(".upnewsdescription").val($(this).attr("data-description"));
  $(".upnewscontent").val($(this).attr("data-content"));
  $(".upnewsresources").val($(this).attr("data-resources"));
  $(".upnewsdate").val($(this).attr("data-date"));
  $(".upnewsname").val($(this).attr("data-categoryid")); 
  $(".upnewscategory").val($(this).attr("data-categoryid"));
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
$(document).on('click', '.crcategory', function() {
  if($(".createad").hasClass("hide")) {
    $(".bg").removeClass("hide");
    $(".admin__user").addClass("hide");
    $(".admin__seller").addClass("hide");
    $(".adminnews").addClass("hide");
    $(".admin__ad").addClass("hide");
    $(".admincategorynews").addClass("hide");
    $(".createnews").addClass("hide");
    $(".adminmntour").addClass("hide");

    $(".adminalltour").addClass("hide");

    $(".admincategorytour").addClass("hide");
    $(".createctg").removeClass("hide");
 }
else {
    $(".createctg").addClass("hide");
}
});
$(document).on('click', '.adcreate', function() {
  if($(".createad").hasClass("hide")) {
    $(".bg").removeClass("hide");
    $(".admin__user").addClass("hide");
    $(".admin__seller").addClass("hide");
    $(".adminnews").addClass("hide");
    $(".admin__ad").addClass("hide");
    $(".createctg").addClass("hide");
    $(".adminmntour").addClass("hide");

    $(".admincategorynews").addClass("hide");
    $(".createnews").addClass("hide");
    $(".adminalltour").addClass("hide");

    $(".admincategorytour").addClass("hide");
    $(".createad").removeClass("hide");
 }
else {
    $(".createad").addClass("hide");
}
});
$(document).on('click', '.admin', function() {
  if($(".admin__ad").hasClass("hide")) {
    $(".admin__user").addClass("hide");
    $(".admin__seller").addClass("hide");
    $(".bg").addClass("hide");
    $(".createad").addClass("hide");
    $(".adminnews").addClass("hide");
    $(".adminmntour").addClass("hide");

    $(".admincategorynews").addClass("hide");
    $(".admincategorytour").addClass("hide");
    $(".createctg").addClass("hide");
    $(".adminalltour").addClass("hide");

    $(".createnews").addClass("hide");
    $(".admin__ad").removeClass("hide");
    
    
 }
else {
    $(".admin__ad").addClass("hide");
}
});
$(document).on('click', '.btn__editcategory', function() {
  if($(".editctg").hasClass("hide")) {
    $(".bg").removeClass("hide");
    $(".editctg").removeClass("hide");
    $(".idctg").val($(this).attr("data-id"));
    $(".ctgname").val($(this).attr("data-name"));
  
    
 }
else {
    $(".editctg").addClass("hide");
}
});
 

$(document).on('change', '.crrole', function() {
  if($(this).val() == "seller") {
    $(".crhotelname").removeClass("hide");
    $(".crhotelname").attr("required", true);
    $(".crphone").removeClass("hide");
    $(".crphone").attr("required", true);
 }
else {
    $(".crhotelname").addClass("hide");
    $(".crphone").addClass("hide");
}
});
$(document).ready(function() {
  $(".crdate").val(new Date().toISOString().substr(0, 10));
    
});
$(document).on('change', '.crctg', function() {
  if($(this).val() == "category_news") {
  $(".crid").val("N");
 }
else {
    $(".crid").val("T");
}
});