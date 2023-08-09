<div class="sidebar border border-right col-md-3 col-lg-2 p-0 bg-body-tertiary">
    <div class="offcanvas-lg offcanvas-end bg-body-tertiary" tabindex="-1" id="sidebarMenu"
        aria-labelledby="sidebarMenuLabel">
        <div class="offcanvas-header">
            <h5 class="offcanvas-title" id="sidebarMenuLabel">Company name</h5>
            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" data-bs-target="#sidebarMenu"
                aria-label="Close"></button>
        </div>
        <div class="offcanvas-body d-md-flex flex-column p-0 pt-lg-3 overflow-y-auto">
            <ul class="nav flex-column pb-3">
                <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/1/12/User_icon_2.svg/800px-User_icon_2.svg.png"
                    alt="user"
                    class="img-fluid rounded-circle p-3 bg-secondary-subtle m-auto justify-content-center"
                    width="120">
                <h6 class="text-center mt-3 text-secondary">{{ auth()->user()->name }}</h6>
                {{-- <h6 class="text-center"></h6> --}}
                <hr>
                <li class="nav-item">
                    <a class="nav-link d-flex align-items-center gap-2 {{ $title == 'Dashboard' ? 'side-active' : '' }}"
                        href="{{ route('admin.index') }}">
                        <i class="fa-solid fa-border-all"></i>
                        Dashboard
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link d-flex align-items-center gap-2 {{ $title == 'Appointments' ? 'side-active' : '' }}"
                        href="{{ route('admin.appointment') }}">
                        <i class="fa-solid fa-calendar-day"></i>
                        Appointments
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link d-flex align-items-center gap-2 {{ $title == 'Visitors' ? 'side-active' : '' }}"
                        href="{{ route('admin.visitor') }}">
                        <i class="fa-solid fa-users"></i>
                        Visitors
                    </a>
                </li>
                <hr>
                <li class="nav-item">
                    <a class="nav-link d-flex align-items-center gap-2 {{ $title == 'Manage Admin' ? 'side-active' : '' }}"
                        href="{{ route('admin.manage') }}">
                        <i class="fa-solid fa-lock"></i>
                        Manage Admin
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link d-flex align-items-center gap-2" href="#" onclick="$('.logout-form').submit()">
                        <i class="fa-solid fa-right-from-bracket"></i>
                        Logout
                    </a>
                    <form action="{{ route('logout') }}" class="logout-form" method="POST">
                        @csrf
                    </form>
                </li>
            </ul>
        </div>
    </div>
</div>
