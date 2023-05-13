<div>
    <a class="nav-link position-relative" href="{{ route('shopping-cart') }}">
        <span class="position-absolute top-75 start-100 translate-middle badge rounded-pill bg-success">
            ({{ $cartItems->count() }})
        </span>
    </a>
</div>
