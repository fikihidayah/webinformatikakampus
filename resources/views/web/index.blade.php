@extends('web.layouts.template')

@section('content')
  <!-- hero/slideshow -->
  <div id="slideHero" class="carousel slide carousel-fade" data-bs-ride="carousel">
    <div class="carousel-inner">

      @foreach ($slide as $sl)
        <div class="carousel-item {{ $loop->index == 1 ? 'active' : '' }}">
          <img data-src="/web/img/slideshow-home/{{ $sl->image }}" class="d-block img-slide w-100" alt="5">
          <div class="loader">
            <div class="spinner-border text-success" role="status">
              <span class="visually-hidden">Loading...</span>
            </div>
          </div>
        </div>
      @endforeach

    </div>
    <button class="prev-slide" type="button" data-bs-target="#slideHero" data-bs-slide="prev">
      <span class="fa-solid fa-angle-left"></span>
      <span class="visually-hidden">Previous</span>
    </button>
    <button class="right-slide" type="button" data-bs-target="#slideHero" data-bs-slide="next">
      <span class="fa-solid fa-angle-right"></span>
      <span class="visually-hidden">Next</span>
    </button>
  </div>
  <!-- endhero/slideshow -->


  <section id="mengenaiJurusan">
    <div class="container">
      <div class="row">
        <div class="col-lg-6">
          <iframe width="100%" height="300" class="lazy"
            data-src="https://www.youtube.com/embed/{{ $selamat->id_embed }}" title="Jurusan Informatika"
            frameborder="0"
            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
            allowfullscreen></iframe>
        </div>
        <div class="col-lg-6 ps-lg-5">
          <h4 class="text-uis mt-3 mt-sm-0">Selamat datang di</h4>
          <h1 class="text-uis fw-bold">Jurusan Informatika</h1>
          <div class="deskripsi-jurusan mt-4">
            {!! $selamat->isi !!}
          </div>
          <div class="btn-pilihan mt-5 row justify-content-sm-between p-3 p-sm-0">
            <a class="btn btn-uis fs-5 col-md-5 mb-3" href="">Program Sarjana</a>
            <a class="btn btn-uis fs-5 col-md-5 mb-3" href="">Program Magister</a>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section id="berita">
    <div class="container">
      <header class="text-center header-big">
        <div class="title-wrapper">
          <h1 class="title-content">Berita & Informasi</h1>
          <div class="line-title-bg"></div>
        </div>
        <p class="text-muted title-description">Tetap terhubung dengan berita dan informasi terbaru tentang berbagai
          aktivitas di
          Jurusan Informatika Universitas Ibnu Sina</p>
      </header>

      <header class="header-small mt-5">
        <div class="title-wrapper">
          <h3 class="title-content text-uppercase">Berita Pilihan</h3>
          <div class="line-title-bg"></div>
        </div>
      </header>

      <div class="row">
        @foreach ($berita_pilihan as $berita)
          <div class="col-md-6 col-lg-4">
            <div class="card berita-preview bg-transparent border-0">
              <div class="berita-img-preview">
                <img src="{{ $berita->image_thumb }}" loading="lazy" class="card-img-top" alt="2">
                <div class="img-overlay-wrapper">
                  <a href="/view/{{ $berita->slug }}" class="link-preview">
                    <div class="img-title">{{ $berita->title }}</div>
                  </a>
                  <div class="img-time"><i class="fa-regular fa-clock"></i>
                    {{ $berita->created_at->diffForHumans() }}</div>
                </div>
                <div class="img-overlay-link-wrapper">
                  @foreach ($berita->category as $category)
                    <a href="/berita/kategori/{{ $category->id }}"
                      class="btn-to-category {{ $category->bg_color }}">{{ $category->name }}</a>
                  @endforeach
                </div>
              </div>
              <div class="card-body px-0">
                <p class="card-text">{{ $berita->description }}</p>
              </div>
            </div>
          </div>
        @endforeach
      </div>

      <div class="d-block mt-5 clearfix">
        <div class="float-end">
          <a href="/filter/{{ $berita->category[0]->slug }}" class="btn btn-uis flat fw-bold">Baca
            {{ $berita->category[0]->name }}
            Lainnya</a>
        </div>
      </div>

    </div>
  </section>

  <section id="testimoni" class="d-flex flex-column justify-content-around">
    <h1 class="fw-bold alumni-title">Testimoni Alumni</h1>

    <div id="slideTestimoni" class="carousel slide carousel-fade testi" data-bs-ride="carousel">
      <div class="carousel-inner">
        <div class="container">
          @foreach ($testimonies as $testimoni)
            <div class="carousel-item {{ $loop->index > 0 ? '' : 'active' }}">
              <div class="deskripsi-alumni">
                <p>{{ $testimoni->isi_testi }}</p>
              </div>


              <div class="d-flex justify-content-center">
                <div class="profile-alumni">
                  <img src="/web/img/testimoni/{{ $testimoni->image }}" alt="" class="img-alumni">
                  <div class="yang-bersangkutan">
                    <p class="fw-bold mb-0">{{ $testimoni->nama }}</p>
                    <small class="pekerjaan-alumni">{{ $testimoni->kerja }}</small>
                  </div>
                </div>
              </div>
            </div>
          @endforeach

        </div>
      </div>
      <div class="carousel-indicators indicator">
        <button type="button" data-bs-target="#slideTestimoni" data-bs-slide-to="0" class="active"
          aria-current="true" aria-label="Slide 1"></button>
        <button type="button" data-bs-target="#slideTestimoni" data-bs-slide-to="1" aria-label="Slide 2"></button>
        <button type="button" data-bs-target="#slideTestimoni" data-bs-slide-to="2" aria-label="Slide 3"></button>
      </div>
    </div>
  </section>

  <!-- berita lainnya -->
  <section id="blain">
    <div class="container-fluid">
      <div class="row">

        @foreach ($categories_news as $cn)
          <div class="col-lg-4 px-4 blain-segment py-3">
            <header class="header-small">
              <div class="title-wrapper">
                <h3 class="title-content fs-4 text-uppercase">{{ $cn->name }}</h3>
                <div class="line-title-bg"></div>
              </div>
            </header>

            @foreach ($cn->news as $news)
              <main class="blain-wrapper">
                <article>
                  <div class="card border-0 rounded-0 bg-transparent">
                    <div class="row g-0">
                      <div class="col-3">
                        <a href="view/{{ $news->slug }}">
                          <img src="{{ $news->image_thumb }}" class="thumb-lain" alt="{{ $news->image_thumb }}">
                        </a>
                      </div>
                      <div class="col-9 ps-4 ps-sm-0">
                        <p class="card-text text-uppercase mb-1"><small
                            class="text-muted">{{ $news->created_at->isoFormat('DD MMMM YYYY') }}</small>
                        </p>
                        <a href="/view/{{ $news->slug }}" class="lain-link">
                          <p class="lain-title">{{ $news->title }}</p>
                        </a>
                      </div>
                    </div>
                  </div>
                  <div class="separator"></div>
                </article>
              </main>
              @php
                if ($loop->index === 2) {
                    break;
                }
              @endphp
            @endforeach

            <div class="d-block mt-3 clearfix">
              <div class="float-end">
                <a href="/filter/{{ $cn->slug }}" class="btn btn-uis flat fw-light">Baca {{ $cn->name }}
                  Lainnya</a>
              </div>
            </div>
          </div>
        @endforeach


      </div>
    </div>
  </section>


  <section id="informasi">
    <div class="container">
      <div class="info-wrapper">
        <div class="info-item">
          <h2 class="text-uis fs-3">Riset & Pengabdian</h2>
          <p class="text-muted deskripsi-info">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Exercitationem
            odit autem eum facere, sapiente nobis excepturi consequatur expedita? Ipsa, culpa?</p>
          <a href="" class="btn btn-uis flat d-flex justify-content-between align-items-center">Informasi Selengkapnya
            <i class="fa-solid fa-arrow-right-long"></i></a>
        </div>
        <div class="info-item">
          <h2 class="text-uis fs-3">Riset & Pengabdian</h2>
          <p class="text-muted deskripsi-info">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Exercitationem
            odit autem eum facere, sapiente nobis excepturi consequatur expedita? Ipsa, culpa?</p>
          <a href="" class="btn btn-uis flat d-flex justify-content-between align-items-center">Informasi Selengkapnya
            <i class="fa-solid fa-arrow-right-long"></i></a>
        </div>
        <div class="info-item">
          <h2 class="text-uis fs-3">Riset & Pengabdian</h2>
          <p class="text-muted deskripsi-info">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Exercitationem
            odit autem eum facere, sapiente nobis excepturi consequatur expedita? Ipsa, culpa?</p>
          <a href="" class="btn btn-uis flat d-flex justify-content-between align-items-center">Informasi Selengkapnya
            <i class="fa-solid fa-arrow-right-long"></i></a>
        </div>
        <div class="info-item">
          <h2 class="text-uis fs-3">Riset & Pengabdian</h2>
          <p class="text-muted deskripsi-info">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Exercitationem
            odit autem eum facere, sapiente nobis excepturi consequatur expedita? Ipsa, culpa?</p>
          <a href="" class="btn btn-uis flat d-flex justify-content-between align-items-center">Informasi Selengkapnya
            <i class="fa-solid fa-arrow-right-long"></i></a>
        </div>
      </div>
      <div class="separator bg-uis mt-5"></div>
    </div>
  </section>

  <section id="gabung">
    <div class="container">
      <div class="row">
        <div class="col-md-6 order-1 mt-5 mt-sm-0 order-md-0">
          <h1 class="text-uis fw-bolder">Ayo Gabung ke UIS</h1>
          <div class="gabung-deskripsi">
            <p>
              <span class="text-uis">#kuliahdiuis</span> Lorem ipsum, dolor sit amet consectetur adipisicing
              elit.
              Atque,
              blanditiis!
            </p>
            <p>
              Lorem ipsum dolor sit, amet consectetur adipisicing elit. Adipisci quia recusandae necessitatibus quis
              minima modi rem eius officiis eligendi deserunt, consectetur incidunt. Id dicta et dignissimos amet
              laborum porro saepe quas sit. Repudiandae laborum suscipit omnis quidem, officiis placeat veniam enim
              atque quod rem dolorem similique in, dolore, incidunt itaque.
            </p>
          </div>

          <a href="https://pmb.uis.ac.id/home" class="btn btn-uis flat fw-bold">Daftar Sekarang</a>

        </div>

        <div class="col-md-6 order-0 order-md-1 px-sm-5">
          <img src="/web/assets/app/img/slideshow/1.jpeg" alt="" class="img-fluid rounded">
        </div>
      </div>
    </div>
  </section>

  <section id="gallery">
    <div class="container-fluid">

      <div class="row">
        @foreach ($api_ig['data'] as $ig)
          <div class="col-md-4 col-lg-3 p-0">
            <a href="{{ $ig['permalink'] }}" class="img-ig-wrapper" target="_blank">
              <img data-src="{{ $ig['media_url'] }}" alt="igpost" class="lazy img-fluid">
              <div class="link-to-ig"><i class="fa-solid fa-arrow-up-right-from-square"></i></div>
              <div class="loader">
                <div class="spinner-border text-success" role="status">
                  <span class="visually-hidden">Loading...</span>
                </div>
              </div>
            </a>
          </div>
        @endforeach
      </div>
    </div>
  </section>


  <section id="followus">
    <center>
      <h4 class="title-mepet fs-5">Ikuti Informatika UIS Di Media Sosial</h4>
      <div class="btn-follow-group">
        <a href="https://www.instagram.com/uis.batam/" title="instagram uis" class="follow-brand-btn">
          <i class="fa-brands fa-instagram"></i>
        </a>
        <a href="https://www.youtube.com/c/UniversitasIbnuSina" title="youtube uis" class="follow-brand-btn">
          <i class="fa-brands fa-youtube"></i>
        </a>
        <a href="https://web.facebook.com/universitasibnusinabatam" title="facebook uis" class="follow-brand-btn">
          <i class="fa-brands fa-facebook-f"></i>
        </a>
        <a href="" title="twitter uis" class="follow-brand-btn">
          <i class="fa-brands fa-twitter"></i>
        </a>
      </div>
    </center>
  </section>
@endsection
