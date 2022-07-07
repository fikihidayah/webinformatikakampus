@extends('web.layouts.template')

@section('content')
  <section id="news">
    <div class="container mt-5 pb-5">
      <div class="row">
        <div class="col-lg-9">
          <header class="heading-w-border mb-4">
            <h4 class="text-uppercase fw-bold">{{ $data['category']->name }}</h4>
          </header>

          @if ($data['category']->description !== null)
            <div class="news-desctiption">
              {{ $data['category']->description }}
              <div class="separator my-3"></div>
            </div>
          @endif

          @if ($data['newsa']->count() > 0)
            @foreach ($data['newsa'] as $d)
              <div class="berita-list-wrapper pe-sm-5">
                <div class="row">
                  <div class="col-md-3">
                    <a href="/view/{{ $d->slug }}">
                      <img src="{{ $d->image_thumb }}" class=" img-fluid" alt="">
                    </a>
                  </div>
                  <div class="col-md-9 ps-4 ps-sm-2">
                    <a href="/view/{{ $d->slug }}" class="lain-link fs-4">
                      <p class="title-mepet">{{ $d->title }}</p>
                    </a>
                    <div class="description mb-3">
                      {{ $d->description }}
                    </div>
                    <p class="card-text text-uppercase mb-1"><small
                        class="text-muted">{{ $d->created_at->isoFormat('dddd DD MMMM, YYYY') }}</small>
                    </p>
                  </div>
                </div>
                @if (!$loop->last)
                  {{-- apa ini loop terakhir? jika ya jangan jalankan --}}
                  <div class="separator mt-3"></div>
                @endif
              </div>
            @endforeach
          @else
            <div class="alert alert-info">Data belum ada</div>
          @endif

          {{ $data['newsa']->links() }}

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

    </div>
  </section>
@endsection

@push('requestToFilter')
  <script>
    const kategori = document.querySelector('#category');

    kategori.onchange = function() {
      const valKategori = this.value;
      window.location.href = url + '/filter/' + valKategori;
    }
  </script>
@endpush
