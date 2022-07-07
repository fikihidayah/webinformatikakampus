<nav class="navbar {{ Request::segment(1) != '' ? 'bg-uis' : '' }} navbar-expand-lg navbar-light sticky-top">
  <div class="container-fluid py-3 py-sm-0 container-xxl">
    <a class="navbar-brand" href="/">
      <img src="/web/img/icon/{{ $setting->icon }}" alt="" class="img-uis">
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#navbarNav"
      aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <i class="fa-solid fa-bars text-warning"></i>
    </button>
    <div class="offcanvas offcanvas-end" id="navbarNav">
      <div class="offcanvas-header">
        <h5 class="offcanvas-title" id="offcanvasNavbarLabel">Menu</h5>
        <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
      </div>
      <div class="offcanvas-body justify-content-md-between">
        <ul class="navbar-nav">
          <li class="nav-item have-nest">
            <a class="nav-link active" href="#">Profil <i class="fa-solid fa-angle-right float-end"></i></a>
            <ul class="nav-nest shadow-sm">
              <li class="nest-item">
                <a href="/profil" class="nest-item-link">Profil</a>
              </li>
              <li class="nest-item">
                <a href="/visi-misi" class="nest-item-link">Visi dan Misi</a>
              </li>
              <li class="nest-item">
                <a href="/sambutan-ketua-jurusan" class="nest-item-link">Sambutan Ketua jurusan</a>
              </li>
              <li class="nest-item">
                <a href="/struktur-organisasi" class="nest-item-link">struktur organisasi</a>
              </li>
              <li class="nest-item">
                <a href="/dosen" class="nest-item-link">dosen</a>
              </li>
              <li class="nest-item">
                <a href="/staff" class="nest-item-link">staff</a>
              </li>
              <li class="nest-item">
                <a href="/kontak" class="nest-item-link">kontak</a>
              </li>
            </ul>
          </li>
          <li class="nav-item have-nest">
            <a class="nav-link" href="#">Program Studi <i class="fa-solid fa-angle-right float-end"></i></a>
            <ul class="nav-nest shadow-sm">
              <li class="nest-item have-nest">
                <a href="" class="nest-item-link">Program Sarjana <i class="fa-solid fa-angle-right float-end"></i>
                </a>
                <ul class="nav-nest-nest shadow-sm">
                  <li class="nest-item">
                    <a href="#" class="nest-item-link">Sarjana</a>
                  </li>
                  <li class="nest-item">
                    <a href="/sambutan-kaprodi-s1" class="nest-item-link">Sambutan Kaprodi S1</a>
                  </li>
                  <li class="nest-item">
                    <a href="/profil-lulusan" class="nest-item-link">Profil Lulusan</a>
                  </li>
                  <li class="nest-item">
                    <a href="" class="nest-item-link">Kurikulum 2020</a>
                  </li>
                  <li class="nest-item">
                    <a href="" class="nest-item-link">Jalur Tahun Keempat</a>
                  </li>
                  <li class="nest-item">
                    <a href="" class="nest-item-link">Informatics Expo</a>
                  </li>
                  <li class="nest-item">
                    <a href="" class="nest-item-link">Informasi & Layanan</a>
                  </li>
                  <li class="nest-item">
                    <a href="" class="nest-item-link">Prospekus S1</a>
                  </li>
                </ul>
              </li>
              <li class="nest-item have-nest">
                <a href="" class="nest-item-link">Magister <i class="fa-solid fa-angle-right float-end"></i></a>
                <ul class="nav-nest-nest shadow-sm">
                  <li class="nest-item">
                    <a href="" class="nest-item-link">Sambutan Kaprodi S1</a>
                  </li>
                  <li class="nest-item">
                    <a href="" class="nest-item-link">Profil Lulusan</a>
                  </li>
                </ul>
              </li>
              <li class="nest-item">
                <a href="" class="nest-item-link">International Program</a>
              </li>
            </ul>
          </li>
          <li class="nav-item have-nest">
            <a class="nav-link" href="#">Riset&Pengabdian <i class="fa-solid fa-angle-right float-end"></i></a>
            <ul class="nav-nest shadow-sm">
              <li class="nest-item">
                <a href="" class="nest-item-link">Satu</a>
              </li>
              <li class="nest-item">
                <a href="" class="nest-item-link">Dua</a>
              </li>
              <li class="nest-item">
                <a href="" class="nest-item-link">Tiga</a>
              </li>
            </ul>
          </li>
          <li class="nav-item have-nest">
            <a class="nav-link" href="#">Mahasiswa <i class="fa-solid fa-angle-right float-end"></i></a>
            <ul class="nav-nest shadow-sm">
              <li class="nest-item">
                <a href="" class="nest-item-link">Satu</a>
              </li>
              <li class="nest-item">
                <a href="" class="nest-item-link">Dua</a>
              </li>
              <li class="nest-item">
                <a href="" class="nest-item-link">Tiga</a>
              </li>
            </ul>
          </li>
          <li class="nav-item have-nest">
            <a class="nav-link" href="#">Unit Pendukung <i class="fa-solid fa-angle-right float-end"></i></a>
            <ul class="nav-nest shadow-sm">
              <li class="nest-item">
                <a href="" class="nest-item-link">Satu</a>
              </li>
              <li class="nest-item">
                <a href="" class="nest-item-link">Dua</a>
              </li>
              <li class="nest-item">
                <a href="" class="nest-item-link">Tiga</a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Kemitraan</a>
          </li>

          <li class="nav-item position-relative">
            <a href="" class="nav-link input-open">
              <i class="fa-solid fa-magnifying-glass"></i>
            </a>
            <form action="" class="form-search bg-warning shadow-sm">
              <input type="text" placeholder="search" class="input-search">
              <button class="border-0 bg-transparent btn-search"><i class="fa-solid fa-magnifying-glass"></i></button>
            </form>
          </li>

        </ul>
        <div class="navbar-nav2">
          @if ($setting->link_ig)
            <a href="{{ $setting->link_ig }}" target="_blank" class="brand-wrapper ig">
              <i class="fa-brands fa-instagram"></i>
            </a>
          @endif

          @if ($setting->link_fb)
            <a href="{{ $setting->link_fb }}" class="brand-wrapper fb">
              <i class="fa-brands fa-facebook-f"></i>
            </a>
          @endif

          @if ($setting->link_yt)
            <a href="" class="brand-wrapper yt">
              <i class="fa-brands fa-youtube"></i>
            </a>
          @endif
        </div>
      </div>
    </div>
  </div>
</nav>
