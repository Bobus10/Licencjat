$('.delete').on("click",function(){
    Swal.fire({
      title: messagesDelete,
      text: 'text',
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Tak usuń!',
      cancelButtonText: 'Anuluj'
      }).then((result) => {
        if (result.isConfirmed) {
          $.ajax({
            method: "delete",
            url: deleteUrl + $(this).data("id"),
          })
          .done(function( response ) {
            Swal.fire( 'Dane zostały usuniętę!', )
            window.location.reload();
         })
          .fail(function( data ) {
            Swal.fire( 'Coś poszło nie tak!', data.responseJSON.message, data.responseJSON.status)
          });
        }
    })
  });
