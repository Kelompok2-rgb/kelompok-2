<header>
    <div class="topbar d-flex align-items-center">
        <nav class="navbar navbar-expand gap-3">
            <div class="mobile-toggle-menu"><i class='bx bx-menu'></i>
            </div>
            <div class="search-bar flex-grow-1">
                <h3 id="typing-text"></h3>
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
                @php
                    $role = Auth::user()->role;
                    // Map role ke nama file gambar
                    $roleImages = [
                        'admin' => 'admin.png',
                        'penyelenggara' => 'penyelenggara.png',
                        'juri' => 'juri.png',
                        'atlet' => 'atlet.png',
                        'klub' => 'klub.png',
                        'anggota' => 'anggota.png',
                        // Tambahkan role lain jika perlu
                    ];

                    // Jika role tidak ada di daftar, fallback ke default
                    $image = isset($roleImages[$role]) ? $roleImages[$role] : 'logokel2.jpg';
                @endphp
             </div>
            <div class="user-box dropdown px-3">
                <a class="d-flex align-items-center nav-link dropdown-toggle gap-3 dropdown-toggle-nocaret"
                    href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">

                    <img src="{{ asset('dashboard/assets/images/' . $image) }}" class="user-img" alt="user">
                     <div class="user-info">
                        <p class="user-name mb-0">{{ Auth::user()->email }}</p>
                        <p class="designattion mb-0">{{ ucfirst(Auth::user()->role) }}</p>
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
