<header>
    <div class="topbar d-flex align-items-center">
        <nav class="navbar navbar-expand gap-3">
            <div class="mobile-toggle-menu"><i class='bx bx-menu'></i>
            </div>
            <div class="search-bar flex-grow-1">

            </div>
            <div class="top-menu ms-auto">
                <ul class="navbar-nav align-items-center gap-1">



                    @auth
                        @if (Auth::user()->role === 'admin')
                            <li class="nav-item">
                                <a class="nav-link position-relative" href="{{ route('backend.konfirmasi.index') }}">
                                    <span class="alert-count">
                                        {{ \App\Models\User::where('is_approved', false)->count() }}
                                    </span>
                                    <i class='bx bx-bell'></i>
                                </a>
                            </li>
                        @endif
                    @endauth



                </ul>
            </div>
            <div class="user-box dropdown px-3">
                <a class="d-flex align-items-center nav-link dropdown-toggle gap-3 dropdown-toggle-nocaret"
                    href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">

                    <img src="{{ asset('dashboard/assets/images/logokel2.jpg') }}" class="user-img" alt="user">
                    <div class="user-info">
                        <p class="user-name mb-0">Kel-2</p>
                        <p class="designattion mb-0">Axe PBL</p>
                    </div>
                </a>
                <ul class="dropdown-menu dropdown-menu-end">

                    <li>
                        <!-- Form Logout -->
                        <form action="{{ route('logout') }}" method="POST" class="d-inline">
                            @csrf
                            <button type="submit" class="dropdown-item d-flex align-items-center"
                                style="background: none; border: none;">
                                <i class="bx bx-log-out-circle"></i>
                                <span>Logout</span>
                            </button>
                        </form>
                    </li>

                    </li>
                </ul>
            </div>
        </nav>
    </div>
</header>
