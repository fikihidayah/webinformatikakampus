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
          <h5 class="mb-3">Slide</h5>
          <form action="@if ($slide->count() < 6) /setting/add-home-slide @endif" method="POST"
            enctype="multipart/form-data">
            @csrf
            <div class="row align-items-center">
              <div class="col-md-8">
                <div class="form-group">
                  <label for="image">Image Slide</label>
                  <div class="custom-file">
                    <input type="file" class="custom-file-input @error('image') is-invalid @enderror" id="image"
                      name="image" accept=".jpg,jpeg,.png">
                    <label class="custom-file-label" for="image">Choose file...</label>
                    @error('image')
                      <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                  </div>
                  <small class="text-muted">File berformat .jpeg,.png,.jpg ukuran max 1mb, disarankan ratio
                    5:2</small>
                </div>
              </div>
              <div class="col-md-4">
                <img src="/web/img/slideshow-home/1200x500.png" alt="" class="img-fluid image-preview">
              </div>
            </div>
            <button class="btn btn-primary" type="submit"
              @if ($slide->count() >= 6) disabled @endif>Tambah</button>
          </form>

          <div class="d-flex justify-content-end">
            <div class="badge bg-primary text-white p-2 mb-3"><span
                class="text-warning mr-2">{{ $slide->count() }}/6</span> gambar di upload
            </div>
          </div>
          <div class="row">
            @foreach ($slide->all() as $s)
              <div class="col-md-4 mb-3">
                <a href="/setting/slide/edit/{{ $s->id }}" class="img-place-wrapper">
                  <img src="/web/img/slideshow-home/{{ $s->image }}" alt="{{ $s->image }}" class="img-fluid">
                  <div class="link-to-place"><i class="feather icon-edit-2"></i></div>
                </a>
              </div>
            @endforeach
          </div>

          <h5 class="mt-3 mb-4">Ucapan Selamat Datang</h5>

          <form action="{{ route('setting.update.slm', $selamat->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('put')

            <div class="form-group">
              <label class="floating-label" for="id_embed">Id Embed <button type="button" class="badge bg-white border-0"
                  data-toggle="popover" data-html="true" data-placement="top"
                  title="Id Link URL Video Youtube <span class='text-primary'>copas yang diblock</span>"
                  data-content="<img src='/admin/img/tips/1.png' alt='' width='100%'>"><i
                    class="feather icon-help-circle"></i></button></label>
              <input type="text" class="form-control @error('id_embed') is-invalid @enderror" id="id_embed"
                name="id_embed" value="{{ $selamat->id_embed }}">
              @error('id_embed')
                <div class="invalid-feedback">{{ $message }}</div>
              @enderror
            </div>

            <div class="form-group">
              <label for="isi">Isi</label>
              <textarea name="isi" id="isi">{{ $selamat->isi }}</textarea>
              @error('isi')
                <span class="text-danger">{{ $message }}</span>
              @enderror
            </div>

            <button class="btn btn-primary mt-3" type="submit">Edit</button>
          </form>

          <div class="clearfix">
            <button class="btn btn-sm btn-info float-right" type="button" data-toggle="modal" data-target="#modalList"><i
                class="feather icon-list"></i></button>
            <h5 class="mt-3 mb-4">Testimoni</h5>
          </div>


          <form action="@if ($testi->count() < 6) /setting/home/testi @endif" method="POST"
            enctype="multipart/form-data">
            @csrf
            <div class="form-group">
              <label class="floating-label" for="nama">Nama</label>
              <input type="text" class="form-control @error('nama', 'testi') is-invalid @enderror" id="nama" name="nama"
                value="{{ old('nama') }}">
              @error('nama', 'testi')
                <div class="invalid-feedback">{{ $message }}</div>
              @enderror
            </div>

            <div class="form-group">
              <label class="floating-label" for="isi_testi">Isi Testi</label>
              <input type="text" class="form-control @error('isi_testi', 'testi') is-invalid @enderror" id="isi_testi"
                name="isi_testi" value="{{ old('isi_testi') }}">
              @error('isi_testi', 'testi')
                <div class="invalid-feedback">{{ $message }}</div>
              @enderror
            </div>

            <div class="form-group">
              <label class="floating-label" for="kerja">Pekerjaan</label>
              <input type="text" class="form-control @error('kerja', 'testi') is-invalid @enderror" id="kerja"
                name="kerja" value="{{ old('kerja') }}">
              @error('kerja', 'testi')
                <div class="invalid-feedback">{{ $message }}</div>
              @enderror
            </div>

            <div class="row align-items-center">
              <div class="col-md-8">
                <div class="form-group">
                  <label for="image_t">Image</label>
                  <div class="custom-file">
                    <input type="file" class="custom-file-input @error('image', 'testi') is-invalid @enderror"
                      id="image_t" name="image" accept=".jpg,jpeg,.png">
                    <label class="custom-file-label" for="image_t">Choose file...</label>
                    @error('image', 'testi')
                      <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                  </div>
                  <small class="text-muted">File berformat .jpeg,.png,.jpg ukuran max 512kb, ratio wajib
                    1:1</small>
                </div>
              </div>
            </div>

            <button class="btn btn-primary" type="submit"
              @if ($testi->count() >= 6) disabled @endif>Tambah</button>

          </form>


        </div>
      </div>
    </div>
  </div>

  <div id="modalList" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">List Testimoni</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
              aria-hidden="true">&times;</span></button>
        </div>
        <div class="modal-body">
          <div class="d-flex justify-content-end">
            <div class="badge bg-primary text-white p-2 mb-3"><span
                class="text-warning mr-2">{{ $testi->count() }}/6</span> testimoni</div>
          </div>
          <div class="table-responsive">
            <table class="table">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Nama</th>
                  <th>Image</th>
                  <th>Aksi</th>
                  <th>Isi</th>
                  <th>Kerja</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($testi->all() as $tes)
                  <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $tes->nama }}</td>
                    <td><img src="/web/img/testimoni/{{ $tes->image }}" alt="{{ $tes->image }}" width="64"></td>
                    <td>
                      <a href="/setting/testi/edit/{{ $tes->id }}" class="badge bg-warning text-dark"><i
                          class="feather icon-edit"></i></a>
                    </td>
                    <td>{{ $tes->isi_testi }}</td>
                    <td>{{ $tes->kerja }}</td>
                  </tr>
                @endforeach
              </tbody>
            </table>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn  btn-secondary" data-dismiss="modal">Tutup</button>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
@section('optJS')
  <script src="/admin/plugins/tinymce/tinymce.min.js" referrerpolicy="origin"></script>
  <script>
    tinymce.init({
      selector: '#isi',
      menubar: false,
      height: 500,
      skin: 'oxide-dark',
      plugins: 'wordcount'
    });

    $(document).ready(function() {
      $('#image').on('change', function() {
        previewImg('#image', '.image-preview');
      })

    })
  </script>
@endsection
