<nav class="navbar navbar-expand-lg custom-navbar">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#WafiAdminNavbar" aria-controls="WafiAdminNavbar" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon">
            <i></i>
            <i></i>
            <i></i>
        </span>
    </button>
    <div class="collapse navbar-collapse" id="WafiAdminNavbar">
        <ul class="navbar-nav">
            
            <li class="nav-item dropdown">
                <a class="nav-link " href="#" id="appsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="icon-package nav-icon"></i>
                    Invoices Management
                </a>
                
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="icon-book-open nav-icon"></i>
                    Clients
                </a>
                <ul class="dropdown-menu" aria-labelledby="pagesDropdown">
                    <li>
                        <a class="dropdown-item" href="{{route('clients.index')}}">All Clients</a>
                    </li>
                    <li>
                        <a class="dropdown-item" href="{{ route('clients.create') }}">Add Clients</a>
                    </li>
                
        </ul>
    </div>
</nav>