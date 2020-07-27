<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <a class="navbar-brand" href="{{ route('home') }}">My Shop</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
            </li>
            @guest
            <li class="nav-item">
                <a class="nav-link" href="{{ route('user.signup') }}">Sign up</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('user.signin') }}">Sign in</a>
            </li>
            @endguest
            <li class="nav-item">
                <a class="nav-link" href="{{ route('product.shoppingCart') }}"><i
                        class="fa fa-shopping-cart" aria-hidden="true"></i> Cart
                    <span
                        class="badge badge-pill badge-secondary">{{ Session::has('cart') ? Session::get('cart')->totalQty : '0' }}</span></a>
            </li>
            @auth
            <li class="nav-item">
                <a class="nav-link" href="{{ route('user.wishlist') }}"><i
                        class="fa fa-heart" aria-hidden="true"></i> Wishlist
                        <span
                        class="badge badge-pill badge-secondary">{{ Auth::user()->wishlist->sum('qty') }}</span> </a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fas fa-user"></i>
                    {{ Auth::user()->name }} 
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="{{ route('user.profile') }}">Profile</a>
                    <a class="dropdown-item" href="{{ route('user.orders') }}">Orders</a>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('user.logout') }}">Logout</a>
            </li>
            @endauth
        </ul>
    </div>
</nav>