@extends('web.layouts.template')

@section('content')
  <!-- breadcrumb navigator -->
  <div class="container mt-5">
    <div class="d-flex justify-content-end">
      <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="#" class="text-muted">Home</a></li>
          <li class="breadcrumb-item text-muted active"><a href="#" class="text-muted">{{ ucfirst($data->modul) }}</a>
          </li>
          @if (strcasecmp($data->modul, $data->halaman))
            <li class="breadcrumb-item text-muted active">{{ $data->halaman }}</li>
          @endif
        </ol>
      </nav>
    </div>
  </div>
  <!-- end breadcrumb navigator -->

  @switch($data->slug)
    @case('profil')
      <!-- Profil -->
      <section id="profil">
        <div class="container pb-5">
          <div class="row">
            <div class="col">
              <header class="heading-w-border mb-4">
                <h4 class="text-uppercase fw-bold">{{ $data->halaman }}</h4>
              </header>
              <div class="profil-wrapper mb-4">
                {!! $data->isi !!}
              </div>
            </div>
          </div>

        </div>
      </section>

      <!-- Akhir Profil -->
    @break

    @case('sambutan-ketua-jurusan')
      <!-- Sambutan Ketua Jurusan -->
      <section id="sambutan-ketua-jurusan">
        <div class="container pb-5">
          <div class="row justify-content-center">
            <div class="col-lg-9">
              <header class="heading-w-border mb-4">
                <h4 class="text-uppercase fw-bold">{{ $data->halaman }}</h4>
              </header>
              <div class="sambutan-wrapper">
                {!! $data->isi !!}
              </div>

            </div>
          </div>

        </div>
      </section>

      <!-- Akhir Sambutan Ketua Jurusan -->
    @break

    @case('visi-misi')
      <!-- Visi dan Misi -->
      <section id="visi-misi">
        <div class="container pb-5">
          <div class="row justify-content-center">
            <div class="col-lg-9">
              {!! $data->isi !!}

            </div>
          </div>

        </div>
      </section>

      <!-- Akhir Visi Misi -->
    @break

    @case('struktur-organisasi')
      <!-- Struktur Organisasi -->
      <section id="sambutan-ketua-jurusan">
        <div class="container pb-5">
          <div class="row justify-content-center">
            <div class="col-lg-9">
              <header class="heading-w-border mb-4">
                <h4 class="text-uppercase fw-bold">{{ $data->halaman }}</h4>
              </header>
              <div class="sambutan-wrapper">
                {!! $data->isi !!}
              </div>

            </div>
          </div>

        </div>
      </section>

      <!-- Akhir Struktur Organisasi -->
    @break

    @case('sambutan-kaprodi-s1')
      <!-- Sambutan Ketua Prodi -->
      <section id="sambutan-kaprodi">
        <div class="container pb-5">
          <div class="row">
            <div class="col">
              <header class="heading-w-border mb-4">
                <h4 class="text-uppercase fw-bold">{{ $data->halaman }}</h4>
              </header>
              <div class="sambutan-wrapper clearfix">

                {!! $data->isi !!}

              </div>

            </div>
          </div>

        </div>
      </section>

      <!-- Akhir Sambutan Ketua Prodi -->
    @break

    @case('profil-lulusan')
      <!-- Profil Lulusan -->
      <section id="profil-lulusan-hal">
        <div class="container pb-5">
          <header class="heading-w-border mb-4">
            <h4 class="text-uppercase fw-bold">{{ $data->halaman }}</h4>
          </header>


          <main class="lulusan-wrapper">

            {!! $data->isi !!}

          </main>
        </div>
      </section>

      <!-- Akhir Lulusan -->
    @break

    @default
  @endswitch
@endsection
