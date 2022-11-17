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
$(document).on('click', '.btn__edit', function() {
  if($(".edit").hasClass("hide")) {
    $(".edit").removeClass("hide");
 }
else {
    $(".edit").addClass("hide");
}
});
$(document).on('click', '.btn__delete', function() {
  
  const swalWithBootstrapButtons = Swal.mixin({
    customClass: {
      confirmButton: 'btn btn-success',
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
      )
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