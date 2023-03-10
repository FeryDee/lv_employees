<header class="p-3 bg-dark text-white">
    <div class="container">
        <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
            <a href="/" class="d-flex align-items-center mb-2 mb-lg-0 text-white text-decoration-none">
                <svg class="bi me-2" width="40" height="32" role="img" aria-label="Bootstrap">
                    <use xlink:href="#bootstrap" />
                </svg>
            </a>

            <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
                <li><a href="#" class="nav-link px-2 text-secondary">Home</a></li>

                @can('isAdmin')
                    <li><a href="{{ route('branch.index') }}" class="nav-link px-2 text-white">Branches</a></li>
                    <li><a href="{{ route('employee.index') }}" class="nav-link px-2 text-white">Employees</a></li>
                @elsecan('isManager')
                    <li><a href="{{ route('branch.index') }}" class="nav-link px-2 text-white">Branches</a></li>
                    <li><a href="{{ route('employee.index') }}" class="nav-link px-2 text-white">Employees</a></li>
                @elsecan('isBranchManager')
                    <li><a href="{{ route('branch.index') }}" class="nav-link px-2 text-white">Branches</a></li>
                    <li><a href="{{ route('employee.index') }}" class="nav-link px-2 text-white">Employees</a></li>
                {{-- @elsecan('isEmployee')
                    <li><a href="{{ route('branch.index') }}" class="nav-link px-2 text-white">Branches</a></li> --}}
                @endcan

                <li><a href="#" class="nav-link px-2 text-white">Users</a></li>
                {{-- <li><a href="#" class="nav-link px-2 text-white">FAQs</a></li> --}}
                {{-- <li><a href="#" class="nav-link px-2 text-white">About</a></li> --}}
            </ul>

            @auth
                <p class="m-2">{{ auth()->user()->name }}</p>
                <a href="{{ route('logout') }}" class="btn btn-outline-light me-2">Logout</a>
            @endauth

            @guest
                <a href="{{ route('login.show') }}" class="btn btn-outline-light btn-outline-light">Login</a>
                <a href="{{ route('register.show') }}" class="btn btn-outline-light btn-outline-light">Sign in</a>
            @endguest

        </div>
    </div>
</header>
