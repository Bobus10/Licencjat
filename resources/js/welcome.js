$(function() {

    // $('select#product_count_value select').on('click', function(event){
    //     event.preventDefault();
    //     getProducts(document.getElementById("product_count_value").value);
    // });

    // $('button#filter-button').on('click', function(event){
    //     event.preventDefault();
    //     getProducts(document.getElementById("product_count_value").value);
    // });

    $('button.add_cart_button').on('click', function(product){
       // event.preventDefault();
        Swal.fire({
            position: 'top-end',
            icon: 'success',
            title: 'Dodano produkt do koszyka!',
            showConfirmButton: false,
            timer: 1500
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


      //function getProducts(paginate){
    //     $('button#filter-button').on('click', function() {
    //         const form = $("form#sidebar_filter").serialize();
    //         $.ajax({
    //          method: "GET",
    //          url: "/",
    //          data: form ,
    //          //+"&" +$.param({paginate:paginate}),
    //        }).done(function( response ) {
    //          $('div#product_wrapper').empty();
    //          $.each(response.data, function (index, product) {
    //               const html =
    //  ' <div class="row justify-content-center mb-3"> '+
    //      ' <div class="col-md-12"> '+
    //          ' <div class="card shadow-0 border rounded-3"> '+
    //              ' <div class="card-body"> '+
    //                  ' <div class="row g-0"> '+
    //                      ' <div class="col-xl-3 col-md-4 d-flex justify-content-center"> '+
    //                          ' <div class="bg-image hover-zoom ripple rounded ripple-surface me-md-3 mb-3 mb-md-0"> '+
    //                                  ' <img src="'+ getImageUrl(product) +'" class="img-fluid mx-auto d-block" alt="Zdjęcie produktu"> '+
    //                              ' <a href="#!"> '+
    //                                  ' <div class="hover-overlay"> '+
    //                                      ' <div class="mask" style="background-color: rgba(253, 253, 253, 0.15);"> '+
    //                                     ' </div> '+
    //                                      ' </div> '+
    //                                  ' </a> '+
    //                              ' </div> '+
    //                          ' </div> '+
    //                      ' <div class="col-xl-6 col-md-5 col-sm-7"> '+
    //                          ' <h5> '+ product.name +' </h5> '+
    //                          ' <div class="d-flex flex-row"> '+
    //                              ' <div class="text-warning mb-1 me-2"> '+
    //                                  ' <i class="fa fa-star"> </i> '+
    //                                  ' <i class="fa fa-star"> </i> '+
    //                                  ' <i class="fa fa-star"> </i> '+
    //                                  ' <i class="fas fa-star-half-alt"> </i> '+
    //                                  ' <i class="far fa-star"> </i> '+
    //                                  ' <span class="ms-1"> '+ 3.5 +' </span> '+
    //                                  ' </div> '+
    //                              ' <span class="text-muted"> +910 orders </span> '+
    //                              ' </div> '+

    //                          ' <p class="text mb-4 mb-md-0"> '+ product.description +' </p> '+
    //                          ' </div> '+
    //                      ' <div class="col-xl-3 col-md-3 col-sm-5"> '+
    //                          ' <div class="d-flex flex-row align-items-center mb-1"> '+
    //                              ' <h4 class="mb-1 me-1"> '+ product.price +'PLN </h4> '+
    //                              ' </div> '+
    //                          ' <h6 class="text-success"> Free shipping </h6> '+
    //                          ' <div class="mt-4"> '+
    //                              ' <button class="btn btn-primary shadow-0" type="button"> Buy this </button> '+
    //                              ' <a href="#!" class="btn btn-light border px-2 pt-2 icon-hover"> <i class="fas fa-heart fa-lg px-1"> </i> </a> '+
    //                              ' </div> '+
    //                          ' </div> '+
    //                      ' </div> '+
    //                  ' </div> '+
    //              ' </div> '+
    //          ' </div> '+
    //  ' </div> ';
    //      $('div#product_wrapper').append(html);
    //          });
    //       }).fail(function( data ) {
    //          alert("ERROR");
    //        });
    //     }
    //     );


    function getImageUrl(product){
        if(!!product.image_path){
            return WELCOME_DATA.storagePath + product.image_path;
        }
        return WELCOME_DATA.defaultImageUrl;
    }
});
