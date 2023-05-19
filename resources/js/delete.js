$('button.singleDlt').on('click', function(product){
    var productName = $(this).attr('data-product-name');
     Swal.fire({
         position: 'top-end',
         icon: 'success',
         title: 'Usunięto produkt '+ productName,
         showConfirmButton: false,
         timer: 1500
       })
 });
 $('button.allDlt').on('click', function(product){
     Swal.fire({
         position: 'top-end',
         icon: 'success',
         title: 'Wyczyszczono cały koszyk',
         showConfirmButton: false,
         timer: 1500
       })
 });
$('button.checkout-info').on('click', function(product){
    var productName = $(this).attr('data-product-name');
      Swal.fire({
        title: 'Dokonano zakupu!',
        showCancelButton: false,
        confirmButtonColor: '#008000',
        cancelButtonColor: '#0d6efd',
        confirmButtonText: 'Przejdz do sklepu',
        cancelButtonText: 'Przejdz do zamówień',
      }).then((result) => {
        if (result.isConfirmed) {
            window.location.href = '/';
        } else if (result.isDenied) {
            window.location.href = '/orders';
          }
      })
});
