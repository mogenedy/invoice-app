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
                <a class="nav-link dropdown-toggle" href="#" id="appsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="icon-package nav-icon"></i>
                    Invoices Management
                </a>
                <ul class="dropdown-menu" aria-labelledby="appsDropdown">
                    <li>
                        <a class="dropdown-item" href="{{route('clients.create')}}">Add New Client</a>
                    </li>
                    <li>
                        <a class="dropdown-item" href="{{route('invoices.create')}}">Add Invoices</a>
                    </li>
                    <li>
                        <a class="dropdown-item" href="{{route('invoices.index')}}">Show Invoices</a>
                    </li>
                    <li>
                        
                        <ul class="dropdown-menu dropdown-menu-right" aria-labelledby="calendarsDropdown">
                            <li>
                                <a class="dropdown-item" href="calendar.html">Daygrid View</a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="calendar-external-draggable.html">External Draggable</a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="calendar-google.html">Google Calendar</a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="calendar-list-view.html">List View</a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="calendar-selectable.html">Selectable</a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="calendar-week-numbers.html">Week Numbers</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                </ul>
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