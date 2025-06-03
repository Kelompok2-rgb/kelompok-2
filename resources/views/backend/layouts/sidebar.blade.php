<!--sidebar wrapper -->
<div class="sidebar-wrapper" data-simplebar="true">
    <div class="sidebar-header">
        <div>
            <img src="{{ asset('dashboard/assets/images/logoporlempika.png') }}" class="logo-icon" alt="logo icon">

        </div>
        <div>
            <h4 class="logo-text">Porlempika</h4>
        </div>

    </div>
    <!--navigation-->
    <ul class="metismenu" id="menu">
        <li>
            <a href="{{ route('backend.dashboard') }}">
                <div class="parent-icon"><i class='bx bx-home-alt'></i></div>
                <div class="menu-title">Dashboard</div>
            </a>
        </li>

        @auth
            <li>
                @php
                    $allowedRoles = ['admin', 'anggota', 'klub'];
                    $canAccess = in_array(Auth::user()->role, $allowedRoles);
                @endphp

                <a href="{{ $canAccess ? route('backend.anggota.index') : '#' }}"
                    @if (!$canAccess) onclick="return false;" style="pointer-events: none; opacity: 0.5; cursor: not-allowed;" @endif>
                    <div class="parent-icon"><i class='bx bx-user'></i></div>
                    <div class="menu-title">Anggota</div>
                </a>
            </li>
        @endauth



        @auth
            <li>
                @php
                    $allowedRoles = ['admin', 'atlet', 'klub'];
                    $canAccess = in_array(Auth::user()->role, $allowedRoles);
                @endphp

                <a href="{{ $canAccess ? route('backend.atlet.index') : '#' }}"
                    @if (!$canAccess) onclick="return false;" style="pointer-events: none; opacity: 0.5; cursor: not-allowed;" @endif>
                    <div class="parent-icon"><i class='bx bx-run'></i></div>
                    <div class="menu-title">Atlet</div>
                </a>
            </li>
        @endauth


        @auth
            <li>
                @php
                    $allowedRoles = ['admin', 'klub'];
                    $canAccess = in_array(Auth::user()->role, $allowedRoles);
                @endphp

                <a href="{{ $canAccess ? route('backend.club.index') : '#' }}"
                    title="{{ $canAccess ? '' : 'Anda tidak memiliki akses' }}"
                    @if (!$canAccess) onclick="return false;" style="pointer-events: none; opacity: 0.5; cursor: not-allowed;" @endif>
                    <div class="parent-icon"><i class='bx bx-group'></i></div>
                    <div class="menu-title">Club</div>
                </a>
            </li>
        @endauth


        @auth
            <li>
                @php
                    $allowedRoles = ['admin', 'penyelenggara'];
                    $canAccess = in_array(Auth::user()->role, $allowedRoles);
                @endphp

                <a href="{{ $canAccess ? route('backend.galeri.index') : '#' }}"
                    title="{{ $canAccess ? '' : 'Anda tidak memiliki akses' }}"
                    @if (!$canAccess) onclick="return false;" style="pointer-events: none; opacity: 0.5; cursor: not-allowed;" @endif>
                    <div class="parent-icon"><i class='bx bx-image'></i></div>
                    <div class="menu-title">Galeri</div>
                </a>
            </li>
        @endauth



        @auth
            <li>
                @php
                    $allowedRoles = ['admin', 'juri'];
                    $canAccess = in_array(Auth::user()->role, $allowedRoles);
                @endphp

                <a href="{{ $canAccess ? route('backend.hasil_pertandingan.index') : '#' }}"
                    title="{{ $canAccess ? '' : 'Anda tidak memiliki akses' }}"
                    @if (!$canAccess) onclick="return false;" style="pointer-events: none; opacity: 0.5; cursor: not-allowed;" @endif>
                    <div class="parent-icon"><i class='bx bx-medal'></i></div>
                    <div class="menu-title">Hasil Pertandingan</div>
                </a>
            </li>
        @endauth



        @auth
            <li>
                @php
                    $allowedRoles = ['admin', 'penyelenggara'];
                    $canAccess = in_array(Auth::user()->role, $allowedRoles);
                @endphp

                <a href="{{ $canAccess ? route('backend.jadwal_pertandingan.index') : '#' }}"
                    title="{{ $canAccess ? '' : 'Anda tidak memiliki akses' }}"
                    @if (!$canAccess) onclick="return false;" style="pointer-events: none; opacity: 0.5; cursor: not-allowed;" @endif>
                    <div class="parent-icon"><i class='bx bx-calendar'></i></div>
                    <div class="menu-title">Jadwal Pertandingan</div>
                </a>
            </li>
        @endauth



        @auth
            <li>
                @php
                    $allowedRoles = ['admin', 'juri'];
                    $canAccess = in_array(Auth::user()->role, $allowedRoles);
                @endphp

                <a href="{{ $canAccess ? route('backend.juri.index') : '#' }}"
                    title="{{ $canAccess ? '' : 'Anda tidak memiliki akses' }}"
                    @if (!$canAccess) onclick="return false;" style="pointer-events: none; opacity: 0.5; cursor: not-allowed;" @endif>
                    <div class="parent-icon"><i class='bx bx-user-voice'></i></div>
                    <div class="menu-title">Juri</div>
                </a>
            </li>
        @endauth



        @auth
            <li>
                @php
                    $allowedRoles = ['admin', 'penyelenggara'];
                    $canAccess = in_array(Auth::user()->role, $allowedRoles);
                @endphp

                <a href="{{ $canAccess ? route('backend.kategori_pertandingan.index') : '#' }}"
                    title="{{ $canAccess ? '' : 'Anda tidak memiliki akses' }}"
                    @if (!$canAccess) onclick="return false;" style="pointer-events: none; opacity: 0.5; cursor: not-allowed;" @endif>
                    <div class="parent-icon"><i class='bx bx-category'></i></div>
                    <div class="menu-title">Kategori Pertandingan</div>
                </a>
            </li>
        @endauth



        @auth
            <li>
                @php
                    $allowedRoles = ['admin'];
                    $canAccess = in_array(Auth::user()->role, $allowedRoles);
                @endphp

                <a href="{{ $canAccess ? route('backend.pengumuman.index') : '#' }}"
                    title="{{ $canAccess ? '' : 'Anda tidak memiliki akses' }}"
                    @if (!$canAccess) onclick="return false;" style="pointer-events: none; opacity: 0.5; cursor: not-allowed;" @endif>
                    <div class="parent-icon"><i class='bx bx-bell'></i></div>
                    <div class="menu-title">Pengumuman</div>
                </a>
            </li>
        @endauth



        @auth
            <li>
                @php
                    $allowedRoles = ['admin', 'penyelenggara'];
                    $canAccess = in_array(Auth::user()->role, $allowedRoles);
                @endphp

                <a href="{{ $canAccess ? route('backend.pertandingan.index') : '#' }}"
                    title="{{ $canAccess ? '' : 'Anda tidak memiliki akses' }}"
                    @if (!$canAccess) onclick="return false;" style="pointer-events: none; opacity: 0.5; cursor: not-allowed;" @endif>
                    <div class="parent-icon"><i class='bx bx-trophy'></i></div>
                    <div class="menu-title">Pertandingan</div>
                </a>
            </li>
        @endauth


        @auth
            <li>
                @php
                    $allowedRoles = ['admin', 'penyelenggara'];
                    $canAccess = in_array(Auth::user()->role, $allowedRoles);
                @endphp

                <a href="{{ $canAccess ? route('backend.penyelenggara_event.index') : '#' }}"
                    title="{{ $canAccess ? '' : 'Anda tidak memiliki akses' }}"
                    @if (!$canAccess) onclick="return false;" style="pointer-events: none; opacity: 0.5; cursor: not-allowed;" @endif>
                    <div class=""><i class='bx bx-briefcase'></i></div>
                    <div class="menu-title">Penyelenggara Event</div>
                </a>
            </li>
        @endauth



    </ul>
    <!--end navigation-->
</div>
<!--end sidebar wrapper -->
