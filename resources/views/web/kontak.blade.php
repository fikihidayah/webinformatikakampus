@extends('web.layouts.template')

@section('content')
  <!-- breadcrumb navigator -->
  <div class="container mt-5">
    <div class="d-flex justify-content-end">
      <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="#" class="text-muted">Home</a></li>
          <li class="breadcrumb-item text-muted">Profil</li>
          <li class="breadcrumb-item text-muted active">Kontak</li>
        </ol>
      </nav>
    </div>
  </div>
  <!-- end breadcrumb navigator -->

  <!-- Kontak -->
  <section id="kontak">
    <div class="container pb-5">
      <div class="row">
        <div class="col-lg-6">
          <div class="kontak-wrapper">
            <h1 class="text-uppercase fw-bold fs-2 title-mepet">{{ $setting->nama_web }}</h1>
            <p>Alamat: {{ $setting->alamat }}</p>
            <p>Telepon: {{ $setting->telpon }}</p>

            <h4 class="title-mepet mt-4">Media Sosial Jurusan Informatika UIS</h4>
            @if ($setting->link_fb)
              <p>Facebook : <a href="{{ $setting->link_fb }}" class="link-sosmed"
                  target="_blank">{{ $setting->link_fb }}</a></p>
            @endif
            @if ($setting->link_ig)
              <p>Instagram : <a href="{{ $setting->link_ig }}" class="link-sosmed"
                  target="_blank">{{ $setting->link_ig }}</a></p>
            @endif

            @if ($setting->link_yt)
              <p>Youtube : <a href="{{ $setting->link_yt }}" class="link-sosmed"
                  target="_blank">{{ $setting->link_yt }}</a></p>
            @endif
          </div>
        </div>
        <div class="col-lg-6">
          <iframe
            src="https://www.google.com/maps?q={{ $setting->latitude }},{{ $setting->longitude }}&z=15&output=embed"
            width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
        </div>
      </div>

      <div class="row mt-5">
        <div class="col">
          <h5 class="fs-4 text-uppercase title-mepet">Kontak Kami</h5>
          <form action="" class="form-kontak">
            <div class="mb-3">
              <label for="nama">Nama <span>*</span></label>
              <input type="text" class="form-control" id="nama">
            </div>
            <div class="mb-3">
              <label for="email">Email <span>*</span></label>
              <input type="text" class="form-control" id="email">
            </div>
            <div class="mb-3">
              <label for="judul-pesan">Judul Pesan <span>*</span></label>
              <input type="text" class="form-control" id="judul-pesan">
            </div>
            <div class="mb-3">
              <label for="pesan">Pesan Anda<span>*</span></label>
              <textarea class="form-control" id="pesan"></textarea>
            </div>

            <button class="btn btn-uis">Kirim</button>
          </form>
        </div>
      </div>



    </div>
  </section>

  <!-- Akhir Kontak -->
@endsection
