<div>
    <button class="btn btn-success btn-sm add_cart_button" wire:click="addToCart({{ $product->id }})">
        <i class="fas fa-cart-plus"></i> Dodaj do koszyka
    </button>
    <a href="#!" class="btn btn-light border px-2 pt-2 icon-hover"><i class="fas fa-heart fa-lg px-1"></i></a>
</div>
