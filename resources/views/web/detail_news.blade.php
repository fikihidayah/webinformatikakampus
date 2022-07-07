@extends('web.layouts.template')

@section('content')
  <!-- Berita -->
  <section id="jalur-tugas-akhir" class="mt-5">
    <div class="container pb-5">

      <div class="row">
        <div class="col-lg-9">

          <div class="berita-wrapper">
            <header class="heading-w-border uis mb-4">
              <h4 class="text-uppercase title-mepet fw-bold">{{ $news->title }}</h4>
            </header>

            <div class="informasi-berita">
              <div class="yang-posting">
                <i class="fa-solid fa-user-pen"></i> <span>{{ $news->user->name }}</span>
              </div>

              <div class="kategori">
                @foreach ($news->category as $category)
                  <div class="badge {{ $category->bg_color }} mx-1" style="font-size: 14px">{{ $category->name }}
                  </div>
                @endforeach
              </div>
              <div class="tanggal-posting">
                <i class="fa-regular fa-calendar-days"></i>
                @if ($news->created_at == $news->updated_at)
                  <span>{{ $news->created_at->isoFormat('dddd MMMM YYYY HH:mm:ss') }}</span>
                @else
                  <span>{{ $news->updated_at->isoFormat('dddd MMMM YYYY HH:mm:ss') }} (updated)</span>
                @endif
              </div>
            </div>

            {{-- {{ $news->image }} --}}
            <a href="{{ $news->image }}" data-type="image" data-fslightbox="berita-thumb" crossorigin="anonymous"
              class="
              img-berita-wrapper rounded">
              <figure class="figure w-100">
                <img data-src="{{ $news->image_thumb }}" class="figure-img img-fluid rounded" alt="gambar">
                <div class="loader">
                  <div class="spinner-border text-success" role="status">
                    <span class="visually-hidden">Loading...</span>
                  </div>
                </div>
              </figure>
              <div class="link-to-berita"><i class="fa-solid fa-expand"></i></div>
            </a>

            <main class="berita-content">
              <div class="box-skeleton placeholder-glow">
                <div class="placeholder col-12"></div>
                <div class="placeholder col-12"></div>
                <div class="placeholder col-12"></div>
                <div class="placeholder col-6"></div>
                <div class="placeholder mt-4 col-12"></div>
                <div class="placeholder col-12"></div>
                <div class="placeholder col-12"></div>
                <div class="placeholder col-3"></div>
                <div class="placeholder col-12"></div>
                <div class="placeholder col-12"></div>
                <div class="placeholder col-12"></div>
                <div class="placeholder col-12"></div>
                <div class="placeholder col-12"></div>
              </div>
              {!! $news->body !!}
            </main>

            <div class="d-flex foot-article justify-content-end">
              <div class="reads me-3">
                <i class="fa-solid fa-book-open text-uis me-2"></i>{{ $news->views }}x Telah Dibaca
              </div>
              @if ($news->publised_at)
                <div class="published">
                  <i class="fa-brands fa-safari text-uis me-2"></i> {{ to_human($news->publised_at) }} di
                  publikasikan
                </div>
              @endif
            </div>

            <h5 class="text-center title-mepet mt-5">Share To Social Media</h5>
            <div class="share-btn">
              <a href="" class="btn-item fb" title="<b>Facebook</b>"><i class="fa-brands fa-facebook-f"></i></a>
              <a href="" class="btn-item tw" title="<b>Twitter</b>"><i class="fa-brands fa-twitter"></i></a>
              <a href="" class="btn-item wa" title="<b>Whatsapp</b>"><i class="fa-brands fa-whatsapp"></i></a>
              <a href="" class="btn-item ld" title="<b>Linkedin</b>"><i class="fa-brands fa-linkedin-in"></i></a>
              <a href="" class="btn-item em" title="<b>Email</b>"><i class="fa-solid fa-envelope"></i></a>
            </div>

            <header class="text-center header-big">
              <div class="title-wrapper">
                <div class="title-content bg-white">
                  <div class="bg-uis count-data">
                    0
                  </div>
                  <span class="balasan">Balasan</span>
                </div>
                <div class="line-title-bg"></div>
              </div>
            </header>


            <div class="balasan-wrapper">
              <h3 class="title-mepet mb-4">Tinggalkan Balasan</h3>
              <form action="" class="form-kontak">
                <div class="mb-3 row">
                  <label for="nama" class="col-sm-2 col-form-label">Nama <span class="text-danger">*</span></label>
                  <div class="col-sm-6">
                    <input type="text" class="form-control" id="nama">
                  </div>
                </div>
                <div class="mb-3 row">
                  <label for="email" class="col-sm-2 col-form-label">Email <span class="text-danger">*</span></label>
                  <div class="col-sm-6">
                    <input type="text" class="form-control" id="email">
                  </div>
                </div>
                <div class="mb-3 row">
                  <label for="pesan" class="col-sm-2 col-form-label">Pesan <span class="text-danger">*</span></label>
                  <div class="col-sm-10">
                    <textarea class="form-control" id="pesan"></textarea>
                  </div>
                </div>

                <div class="mb-3 row">
                  <div class="col-sm-10 offset-sm-2">
                    <button class="btn btn-uis flat"><i class="fa-solid fa-edit me-2"></i> Sunting</button>
                  </div>
                </div>
              </form>

            </div>

          </div>

        </div>

        <div class="col-lg-3 mt-5 mt-sm-0 pb-4">
          <div class="container-article">
            <form action="" class="mb-4">
              <label for="">Sorting By Category</label>
              <select name="category" id="category" class="mt-2 form-select form-select-uis">
                <option value="">-pilih kategori-</option>
                @foreach ($categories as $category)
                  <option value="{{ $category->slug }}">{{ $category->name }}</option>
                @endforeach
              </select>
            </form>

            @foreach ($blain as $bl)
              <main class="blain-wrapper side">
                <article>
                  <div class="card border-0 rounded-0 bg-transparent">
                    <div class="row g-0">
                      <div class="col-3">
                        <a href="/view/{{ $bl->slug }}">
                          <img src="{{ $bl->image_thumb }}" class="img-thumbnail img-fluid"
                            alt="{{ $bl->image_thumb }}">
                        </a>
                      </div>
                      <div class="col-9 ps-4 ps-sm-2">
                        <a href="/view/{{ $bl->slug }}" class="lain-link">
                          <p class="lain-title">{{ $bl->title }}</p>
                        </a>
                        <p class="card-text text-uppercase mb-1"><small
                            class="text-muted">{{ $bl->created_at->isoFormat('dddd DD MMMM, YYYY') }}</small>
                        </p>
                      </div>
                    </div>
                  </div>
                </article>
              </main>
            @endforeach




          </div>
        </div>

      </div>

      @isset($prev_news)
        <a class="prev-berita side-btn" href="/view/{{ $prev_news->slug }}">
          <div class="icon-left-wrapper">
            <i class="fa-solid fa-chevron-left"></i>
          </div>
          <div class="informasi-berita-side">
            <div class="berita-content-side">
              {{ $prev_news->description }}
            </div>
            <div class="berita-thumb-side">
              <img src="{{ Str::substr($prev_news->image_thumb_square, 0, 100) }}" alt=""
                class="rounded-circle img-side">
            </div>
          </div>
        </a>
      @endisset

      @isset($next_news)
        <a class="next-berita side-btn" href="/view/{{ $next_news->slug }}">
          <div class="icon-right-wrapper">
            <i class="fa-solid fa-chevron-right"></i>
          </div>
          <div class="informasi-berita-side">
            <div class="berita-content-side">
              {{ $next_news->description }}
            </div>
            <div class="berita-thumb-side">
              <img src="{{ $next_news->image_thumb_square }}" alt="" class="rounded-circle img-side">
            </div>
          </div>
        </a>
      @endisset




    </div>
  </section>
@endsection

@push('newsScript')
  <script src="/web/assets/app/js/fslightbox.js"></script>
  <script>
    fsLightboxInstances['berita-thumb'].props.onOpen = fsl => {
      refreshFsLightbox()
    };

    var tooltipTriggerList = [].slice.call(document.querySelectorAll('.btn-item'))
    var tooltipList = tooltipTriggerList.map(function(tooltipTriggerEl) {
      return new bootstrap.Tooltip(tooltipTriggerEl, {
        customClass: 'mytooltip',
        html: true
      })
    })

    const boxSkeleton = document.querySelector('.box-skeleton');
    boxSkeleton.classList.add('show');
    setTimeout(() => {
      boxSkeleton.style.display = 'none';
    }, 300)
  </script>
@endpush

@push('requestToFilter')
  <script>
    const kategori = document.querySelector('#category');

    kategori.onchange = function() {
      const valKategori = this.value;
      window.location.href = url + '/filter/' + valKategori;
    }
  </script>
@endpush

@push('upCountVar')
  <script src="/web/assets/app/js/helper.js"></script>

  <script>
    const slugNews = {{ Js::from($news->slug) }};

    postData('/upcountnews', {
        slug: slugNews
      }).then(request => hasUpdated = true) // set hasUpdated agar tidak di update berkali kali
      .catch(error => console.log(error))

    // let hasUpdated = false;
    // window.onscroll = function() {
    //   const beritaContentEl = document.querySelector('.berita-content');
    //   const rectToTop = beritaContentEl.getBoundingClientRect();

    //   if (rectToTop.bottom <= 0 && !hasUpdated) {
    //     // jika sudah siap baca sampai kebawah maka tambahkan read countnya

    //   }

    // }
  </script>
@endpush
