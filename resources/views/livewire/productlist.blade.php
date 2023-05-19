<div>
    <button class="btn btn-success btn-sm add_cart_button" wire:click="addToCart({{ $product->id }})" data-product-name="{{ $product->name }}">
        <i class="fas fa-cart-plus"></i> Dodaj do koszyka
    </button>
</div>
