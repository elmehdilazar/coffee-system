<nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
    <div class="container">
        <a class="navbar-brand" href="{{ url('/') }}">Coffee<small>Blend</small></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav"
            aria-expanded="false" aria-label="Toggle navigation">
            <span class="oi oi-menu"></span> Menu
        </button>
        <div class="collapse navbar-collapse" id="ftco-nav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item active"><a href="{{ url('/') }}" class="nav-link">Home</a></li>
                <li class="nav-item"><a href="{{ route('product.menu') }}" class="nav-link">Menu</a></li>
                <li class="nav-item"><a href="{{route("services")}}" class="nav-link">Services</a></li>
                <li class="nav-item"><a href="{{route("about")}}" class="nav-link">About</a></li>

                <li class="nav-item"><a href="{{route("contact")}}" class="nav-link">Contact</a></li>

                @Auth

                <li class="nav-item cart"><a href=" {{ route('cart.show') }}" class="nav-link"><span
                            class="icon icon-shopping_cart"></span></a></li>
                @endif


                   @guest
                            @if (Route::has('login'))
                            <li class="nav-item"><a href="{{route("login")}} " class="nav-link">login</a></li>
                            @endif

                            @if (Route::has('register'))
                             <li class="nav-item"><a href="{{route("register")}}" class="nav-link">register</a></li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                    data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('user.orders') }}"
                                    >
                              my orders
                                    </a>
                                    <a class="dropdown-item" href="{{ route('user.booking') }}"
                                    >
                              my bookings
                                    </a>
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest

            </ul>
        </div>
    </div>
</nav>
