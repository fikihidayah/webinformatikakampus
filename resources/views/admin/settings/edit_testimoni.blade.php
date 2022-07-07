@extends('admin.layouts.main')

@section('content')
  <div class="row">
    <div class="col-sm-12">
      <div class="card">
        <div class="card-header">
          <h5>{{ $title }}</h5>

          <div class="card-header-right">
            <div class="btn-group card-option">
              <button type="button" class="btn dropdown-toggle btn-icon" data-toggle="dropdown" aria-haspopup="true"
                aria-expanded="false">
                <i class="feather icon-more-horizontal"></i>
              </button>
              <ul class="list-unstyled card-option dropdown-menu dropdown-menu-right">
                <li class="dropdown-item minimize-card"><a href="#!" class="expandable"><span><i
                        class="feather icon-minus"></i>
                      collapse</span><span style="display:none"><i class="feather icon-plus"></i> expand</span></a></li>
              </ul>
            </div>
          </div>
        </div>

        <div class="card-body">

          <div class="d-flex justify-content-end">
            <a href="/setting/home" class="btn btn-sm btn-primary mr-3"><i class="feather icon-chevron-left"></i>
              Kembali</a>
            <form action="/setting/home/testi/{{ $testi->id }}" method="POST" class="d-inline delete">
              @csrf
              @method('delete')
              <button class="btn btn-sm btn-danger" type="submit"><i class="feather icon-delete"></i>
                Delete</button>

            </form>
          </div>

          <form action="{{ route('setting.update.testi', $testi->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('put')
            <div class="form-group">
              <label class="floating-label" for="nama">Nama</label>
              <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama" name="nama"
                value="{{ old('nama') ?? $testi->nama }}">
              @error('nama')
                <div class="invalid-feedback">{{ $message }}</div>
              @enderror
            </div>

            <div class="form-group">
              <label class="floating-label" for="isi_testi">Isi Testi</label>
              <input type="text" class="form-control @error('isi_testi') is-invalid @enderror" id="isi_testi"
                name="isi_testi" value="{{ old('isi_testi') ?? $testi->isi_testi }}">
              @error('isi_testi')
                <div class="invalid-feedback">{{ $message }}</div>
              @enderror
            </div>

            <div class="form-group">
              <label class="floating-label" for="kerja">Pekerjaan</label>
              <input type="text" class="form-control @error('kerja') is-invalid @enderror" id="kerja" name="kerja"
                value="{{ old('kerja') ?? $testi->kerja }}">
              @error('kerja')
                <div class="invalid-feedback">{{ $message }}</div>
              @enderror
            </div>

            <div class="row align-items-center">
              <div class="col-md-8">
                <div class="form-group">
                  <label for="image">Image</label>
                  <div class="custom-file">
                    <input type="file" class="custom-file-input @error('image') is-invalid @enderror" id="image"
                      name="image" accept=".jpg,jpeg,.png">
                    <label class="custom-file-label" for="image">Choose file...</label>
                    @error('image')
                      <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                  </div>
                  <small class="text-muted">File berformat .jpeg,.png,.jpg ukuran max 512kb, ratio wajib
                    1:1</small>
                </div>
              </div>
              <div class="col-md-4 text-center">
                <img src="/web/img/testimoni/{{ $testi->image }}" alt="" class="img-fluid image-preview w-75">
              </div>
            </div>

            <button class="btn btn-primary" type="submit">Edit</button>

          </form>



        </div>


      </div>
    </div>
  </div>
@endsection

@section('optJS')
  <script>
    $(document).ready(function() {
      $('#image').on('change', function() {
        previewImg('#image', '.image-preview');
      })

    })
  </script>
@endsection
