<header class="header">
    <div class="logo-wrapper">
        <a href="{{route('invoices.index')}}" class="logo">
            <img src="{{ asset('img/logo99.png') }}" alt="invoice Admin Dashboard" />
        </a>
    </div>
    <div class="header-items">
        <!-- Custom search start -->
        <div class="custom-search">
            <input type="text" class="search-query" placeholder="Search here ...">
            <i class="icon-search1"></i>
        </div>
        <!-- Custom search end -->

        <!-- Header actions start -->
        <ul class="header-actions">
            <li class="dropdown">
                @auth
                <a href="#" id="userSettings" class="user-settings" data-toggle="dropdown" aria-haspopup="true">
                    <span class="user-name">{{ Auth::user()->name }}</span>
                    <span class="avatar">Akh<span class="status busy"></span></span>
                </a>
                @endauth
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userSettings">
                    <div class="header-profile-actions">
                        <div class="header-user-profile">
                            <div class="header-user">
                                <img src="{{ asset('img/img99.png') }}" alt="Admin Template" />
                            </div>
                            <h5>{{ Auth::user()->name ?? 'Ahmed khmis' }}</h5>
                            <p>{{ Auth::user()->name ?? 'Ahmed khmis' }}</p>
                        </div>
                        
<form method="POST" action="{{ route('logout') }}">
    @csrf
    <button type="submit" class="btn btn-danger">Logout</button>
</form>

                    </div>
                </div>
            </li>
        </ul>
        <!-- Header actions end -->
    </div>
</header>
