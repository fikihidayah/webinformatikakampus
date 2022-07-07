<!-- [ navigation menu ] start -->
@php
$satu = Request::segment(1);
$dua = Request::segment(2);
@endphp
<nav class="pcoded-navbar menu-light ">
  <div class="navbar-wrapper  ">
    <div class="navbar-content scroll-div ">

      <div class="">
        <div class="main-menu-header">
          <img class="img-radius" src="/admin/img/profile-user/{{ auth()->user()->image }}"
            alt="User-Profile-Image">
          <div class="user-details">
            <div id="more-details">{{ auth()->user()->name }} <i class="fa fa-caret-down"></i></div>
          </div>
        </div>
        <div class="collapse" id="nav-user-link">
          <ul class="list-unstyled">
            <li class="list-group-item"><a href="/user/profile"><i class="feather icon-user m-r-5"></i>View Profile</a>
            </li>
            <li class="list-group-item"><a href="/gate/logout" class="logout"><i
                  class="feather icon-log-out m-r-5"></i>Logout</a></li>
          </ul>
        </div>
      </div>

      <ul class="nav pcoded-inner-navbar ">
        <li class="nav-item pcoded-menu-caption">
          <label>Main Menu</label>
        </li>
        <li class="nav-item ">
          <a href="/dashboard" class="nav-link"><span class="pcoded-micon"><i
                class="feather icon-home"></i></span><span class="pcoded-mtext">Dashboard</span></a>
        </li>


        <li class="nav-item pcoded-menu-caption">
          <label>Berita&Informasi</label>
        </li>

        @can('admin')
          <li class="nav-item {{ Request::is('news/categories/*') ? 'active' : '' }}">
            <a href="/news/categories" class="nav-link"><span class="pcoded-micon"><i
                  class="feather icon-list"></i></span><span class="pcoded-mtext">Kategori</span></a>
          </li>
        @endcan
        <li class="nav-item {{ $satu == 'news' && $dua != 'categories' ? 'active' : '' }}">
          <a href="/news" class="nav-link"><span class="pcoded-micon"><i
                class="feather icon-list"></i></span><span class="pcoded-mtext">Berita&Informasi</span></a>
        </li>

        @can('admin')
          @php
            $home = ['testi', 'slide'];
          @endphp
          <li class="nav-item pcoded-menu-caption">
            <label>Pengaturan</label>
          </li>
          <li class="nav-item pcoded-hasmenu {{ in_array($dua, $home) ? 'active pcoded-trigger' : '' }}">
            <a href="" class="nav-link "><span class="pcoded-micon"><i class="feather icon-layout"></i></span><span
                class="pcoded-mtext">Pengaturan Web</span></a>
            <ul class="pcoded-submenu">
              <li class="{{ in_array($dua, $home) ? 'active' : '' }}"><a href="/setting/home">Home</a>
              <li class=""><a href="/setting/informasi">Informasi Aplikasi</a>
              </li>
              <li><a href="/othersettings/profil">Profil</a></li>
              <li><a href="/othersettings/sambutan-ketua-jurusan">Sambutan Ketua Jurusan</a></li>
              <li><a href="/othersettings/visi-misi">Visi dan Misi</a></li>
              <li><a href="/othersettings/struktur-organisasi">Struktur Organisasi</a></li>
              <li><a href="/othersettings/sambutan-kaprodi-s1">Sambutan Kaprodi</a></li>
              <li><a href="/othersettings/profil-lulusan">Profil Lulusan</a></li>
            </ul>
          </li>

          <li
            class="nav-item pcoded-hasmenu {{ $satu == 'user' && $dua == 'create' ? 'active pcoded-trigger' : '' }}">
            <a href="" class="nav-link"><span class="pcoded-micon"><i class="feather icon-users"></i></span><span
                class="pcoded-mtext">Pengguna</span></a>
            <ul class="pcoded-submenu">
              <li class="{{ $satu == 'user' && $dua == 'create' ? 'active pcoded-trigger' : '' }}"><a
                  href="/user/manage">Manajemen</a>
              </li>
            </ul>
          </li>
        @endcan

      </ul>

    </div>
  </div>
</nav>
<!-- [ navigation menu ] end -->
