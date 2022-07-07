@extends('admin.layouts.main')

@section('optCSS')
  <link rel="stylesheet" href="/admin/plugins/spectrum/spectrum.min.css">
@endsection

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
          <form action="{{ route('setting.update', $data->id) }}" method="POST" enctype="multipart/form-data">
            @method('put')
            @csrf

            <button class="btn btn-primary btn-sm mb-3" type="submit"><i class="feather icon-edit"></i> Ubah</button>
            <h5 class="mb-3">Informasi Umum</h5>
            <div class="form-group">
              <label class="floating-label" for="nama_web">Nama Website</label>
              <input type="text" class="form-control @error('nama_web') is-invalid @enderror" id="nama_web"
                name="nama_web" value="{{ $data->nama_web }}">
              @error('nama_web')
                <div class="invalid-feedback">{{ $message }}</div>
              @enderror
            </div>

            <div class="row align-items-center">
              <div class="col-md-8">
                <div class="form-group">
                  <label for="favicon">Favicon</label>
                  <div class="custom-file">
                    <input type="file" class="custom-file-input @error('favicon') is-invalid @enderror" id="favicon"
                      name="favicon" accept=".ico">
                    <label class="custom-file-label" for="favicon">Choose file...</label>
                    @error('favicon')
                      <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                  </div>
                  <small class="text-muted">File berformat .ico ukuran max 64x64px</small>
                </div>
              </div>
              <div class="col-md-4">
                <img src="/web/img/favicon/{{ $data->favicon }}" alt="" class="img-fluid favicon-preview">
              </div>
            </div>

            <div class="row align-items-center">
              <div class="col-md-8">
                <div class="form-group">
                  <label for="icon">Icon</label>
                  <div class="custom-file">
                    <input type="file" class="custom-file-input @error('icon') is-invalid @enderror" id="icon" name="icon"
                      accept=".png">
                    <label class="custom-file-label" for="icon">Choose file...</label>
                    @error('icon')
                      <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                  </div>
                  <small class="text-muted">File berformat .png ukuran max 512kb</small>
                </div>
              </div>
              <div class="col-md-4">
                <img src="/web/img/icon/{{ $data->icon }}" alt="" class="img-fluid icon-preview">
              </div>
            </div>

            <div class="row my-4 align-items-center">
              <div class="col-md-6">
                <div class="form-group">
                  <label class="floating-label" for="latitude">Latitude</label>
                  <input type="text" class="form-control @error('latitude') is-invalid @enderror" id="latitude"
                    name="latitude" value="{{ $data->latitude }}">
                  @error('latitude')
                    <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
                </div>
                <div class="form-group">
                  <label class="floating-label" for="longitude">Longitude</label>
                  <input type="text" class="form-control @error('longitude') is-invalid @enderror" id="longitude"
                    name="longitude" value="{{ $data->longitude }}">
                  @error('longitude')
                    <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
                </div>
              </div>

              <div class="col-md-6">
                <div id="maps">
                  <iframe
                    src="https://www.google.com/maps?q={{ $data->latitude }},{{ $data->longitude }}&z=15&output=embed"
                    width="100%" height="200" style="border:0;" allowfullscreen="" loading="lazy"
                    class="rounded"></iframe>
                </div>
              </div>
            </div>

            <div class="form-group">
              <label class="floating-label" for="alamat">Alamat</label>
              <input type="text" class="form-control @error('alamat') is-invalid @enderror" id="alamat" name="alamat"
                value="{{ $data->alamat }}">
              @error('alamat')
                <div class="invalid-feedback">{{ $message }}</div>
              @enderror
            </div>

            <div class="form-group">
              <label class="floating-label" for="telpon">Telpon</label>
              <input type="text" class="form-control @error('telpon') is-invalid @enderror" id="telpon" name="telpon"
                value="{{ $data->telpon }}">
              @error('telpon')
                <div class="invalid-feedback">{{ $message }}</div>
              @enderror
            </div>

            <h5 class="mb-3">Sosial Media</h5>

            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label class="floating-label" for="fb">Nama Facebook</label>
                  <input type="text" class="form-control @error('fb') is-invalid @enderror" id="fb" name="fb"
                    value="{{ $data->fb }}">
                  @error('fb')
                    <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label class="floating-label" for="link_fb">URL Facebook</label>
                  <input type="text" class="form-control @error('link_fb') is-invalid @enderror" id="link_fb"
                    name="link_fb" value="{{ $data->link_fb }}">
                  @error('link_fb')
                    <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label class="floating-label" for="ig">Nama Instagram</label>
                  <input type="text" class="form-control @error('ig') is-invalid @enderror" id="ig" name="ig"
                    value="{{ $data->ig }}">
                  @error('ig')
                    <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label class="floating-label" for="link_ig">URL Instagram</label>
                  <input type="text" class="form-control @error('link_ig') is-invalid @enderror" id="link_ig"
                    name="link_ig" value="{{ $data->link_ig }}">
                  @error('link_fb')
                    <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label class="floating-label" for="yt">Nama Youtube</label>
                  <input type="text" class="form-control @error('yt') is-invalid @enderror" id="yt" name="yt"
                    value="{{ $data->yt }}">
                  @error('yt')
                    <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label class="floating-label" for="link_yt">URL Youtube</label>
                  <input type="text" class="form-control @error('link_yt') is-invalid @enderror" id="link_yt"
                    name="link_yt" value="{{ $data->link_yt }}">
                  @error('link_fb')
                    <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
                </div>
              </div>
            </div>

            <div class="form-group">
              <label for="bg_login">Background Halaman Login</label>
              <input type="text" class="form-control @error('bg_login') is-invalid @enderror" id="bg_login"
                name="bg_login" value="{{ $data->bg_login }}">
              @error('bg_login')
                <div class="invalid-feedback">{{ $message }}</div>
              @enderror
            </div>

            <button class="btn btn-primary" type="submit"><i class="feather icon-edit"></i> Ubah</button>

          </form>
        </div>

      </div>
    </div>
  </div>
@endsection

@section('optJS')
  <script src="/admin/plugins/spectrum/spectrum.min.js"></script>
  <script>
    $('#bg_login').spectrum()

    $('#latitude,#longitude').on('change', function() {
      const lat = $('#latitude').val();
      const lng = $('#longitude').val();
      $.ajax({
        url: '/setting/getMaps/' + lat + '/' + lng,
        success: data => {
          $('#maps').html(data);
        }
      })
    })

    $(document).ready(function() {
      $('#icon').on('change', function() {
        previewImg('#icon', '.icon-preview');
      })

      $('#favicon').on('change', function() {
        previewImg('#favicon', '.favicon-preview');
      })
    })
  </script>
@endsection
