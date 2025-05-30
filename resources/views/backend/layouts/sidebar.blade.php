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

        <li>
            <a href="{{ route('backend.anggota.index') }}">
                <div class="parent-icon"><i class='bx bx-user'></i></i></div>
                <div class="menu-title">Anggota</div>
            </a>
        </li>

        <li>
            <a href="{{ route('backend.atlet.index') }}">
                <div class="parent-icon"><i class='bx bx-run'></i></div>
                <div class="menu-title">Atlet</div>
            </a>
        </li>

        <li>
            <a href="{{ route('backend.club.index') }}">
                <div class="parent-icon"><i class='bx bx-group'></i></div>
                <div class="menu-title">Club</div>
            </a>
        </li>

        <li>
            <a href="{{ route('backend.galeri.index') }}">
                <div class="parent-icon"><i class='bx bx-image'></i></div>
                <div class="menu-title">Galeri</div>
            </a>
        </li>

        <li>
            <a href="{{ route('backend.hasil_pertandingan.index') }}">
                <div class="parent-icon"><i class='bx bx-medal'></i></div>
                <div class="menu-title">Hasil Pertandingan</div>
            </a>
        </li>

        <li>
            <a href="{{ route('backend.jadwal_pertandingan.index') }}">
                <div class="parent-icon"><i class='bx bx-calendar'></i></div>
                <div class="menu-title">Jadwal Pertandingan</div>
            </a>
        </li>

        <li>
            <a href="{{ route('backend.juri.index') }}">
                <div class="parent-icon"><i class='bx bx-user-voice'></i></div>
                <div class="menu-title">Juri</div>
            </a>
        </li>

        <li>
            <a href="{{ route('backend.kategori_pertandingan.index') }}">
                <div class="parent-icon"><i class='bx bx-category'></i></div>
                <div class="menu-title">Kategori Pertandingan</div>
            </a>
        </li>

        <li>
            <a href="{{ route('backend.pengumuman.index') }}">
                <div class="parent-icon"><i class='bx bx-bell'></i></div>
                <div class="menu-title">Pengumuman</div>
            </a>
        </li>

        <li>
            <a href="{{ route('backend.pertandingan.index') }}">
                <div class="parent-icon"><i class='bx bx-trophy'></i></div>
                <div class="menu-title">Pertandingan</div>
            </a>
        </li>

        <li>
            <a href="{{ route('backend.penyelenggara_event.index') }}">
                <div class=""><i class='bx bx-briefcase'></i></div>
                <div class="menu-title">Penyelenggara Event</div>
            </a>
        </li>


    </ul>
    <!--end navigation-->
</div>
<!--end sidebar wrapper -->
