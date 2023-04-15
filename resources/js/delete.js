$('.delete').on("click",function(){
    Swal.fire({
      title: messagesDelete[0],
      text: messagesDelete[1],
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: messagesDelete[2],
      cancelButtonText: messagesDelete[3]
      }).then((result) => {
        if (result.isConfirmed) {
          $.ajax({
            method: "delete",
            url: deleteUrl + $(this).data("id"),
          })
          .done(function( response ) {
            Swal.fire( messagesDelete[4], )
            window.location.reload();
         })
          .fail(function( data ) {
            Swal.fire( messagesDelete[5], data.responseJSON.message, data.responseJSON.status)
          });
        }
    })
  });
