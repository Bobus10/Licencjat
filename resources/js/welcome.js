$(function() {
    $('button.add_cart_button').on('click', function(product){
        var productName = $(this).attr('data-product-name');
          Swal.fire({
            title: 'Dodano produkt '+ productName +' do koszyka!',
            showCancelButton: true,
            confirmButtonColor: '#008000',
            cancelButtonColor: '#0d6efd',
            confirmButtonText: 'Przejdz do koszyka',
            cancelButtonText: 'Przeglądaj dalej',
          }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = '/cart';
            }
          })
    });
    $('button.incrementQty').on('click', function(product){
        // event.preventDefault();
         Swal.fire({
             position: 'top-end',
             icon: 'success',
             title: 'Zwiększono ilość produktu',
             showConfirmButton: false,
             timer: 1500
           })
     });
     $('button.decrementQty').on('click', function(product){
        // event.preventDefault();
         Swal.fire({
             position: 'top-end',
             icon: 'success',
             title: 'Zmniejszono ilość produktu',
             showConfirmButton: false,
             timer: 1500
           })
     });

    function getImageUrl(product){
        if(!!product.image_path){
            return WELCOME_DATA.storagePath + product.image_path;
        }
        return WELCOME_DATA.defaultImageUrl;
    }
});
