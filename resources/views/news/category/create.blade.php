@extends('admin.layouts.main')

@section('optCSS')
  <link rel="stylesheet" href="/admin/plugins/select2/dist/css/select2.css">
  <link rel="stylesheet" href="/admin/plugins/select2/dist/css/select2-bootstrap4.min.css">
@endsection

@section('content')
  <div class="row justify-content-center">
    <div class="col-md-7">
      <div class="card">
        <div class="card-header">
          <h5>Tambah Kategori Berita</h5>
          <div class="card-header-right">
            <div class="btn-group card-option">
              <button type="button" class="btn dropdown-toggle btn-icon" data-toggle="dropdown" aria-haspopup="true"
                aria-expanded="false">
                <i class="feather icon-more-horizontal"></i>
              </button>
              <ul class="list-unstyled card-option dropdown-menu dropdown-menu-right">
                <li class="dropdown-item minimize-card"><a href="#!"><span><i class="feather icon-minus"></i>
                      collapse</span><span style="display:none"><i class="feather icon-plus"></i> expand</span></a></li>
              </ul>
            </div>
          </div>
        </div>
        <div class="card-body">
          @dump($errors->all())
          <form action="/news/categories" method="POST">
            @csrf

            <div class="form-group">
              <label class="floating-label" for="name">Nama Kategori</label>
              <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name"
                value="{{ old('name') }}">
              @error('name')
                <div class="invalid-feedback">{{ $message }}</div>
              @enderror
            </div>

            <input type="hidden" name="slug" id="slug" value="{{ old('slug') }}">

            <div class="form-group">
              <label for="bg_color">Background Color Badge</label>
              <select name="bg_color" id="bg_color" class="form-control">
                <option value="bg-primary text-white">Primary</option>
                <option value="bg-secondary text-dark">Secondary</option>
                <option value="bg-danger text-white">Danger</option>
                <option value="bg-success text-white">Success</option>
                <option value="bg-warning text-dark">Warning</option>
                <option value="bg-info text-white">Info</option>
                <option value="bg-light text-dark">Light</option>
                <option value="bg-dark text-white">Dark</option>
              </select>
              @error('bg_color')
                <div class="invalid-feedback">{{ $message }}</div>
              @enderror
            </div>

            <div class="form-group">
              <label class="floating-label" for="description">Deskripsi</label>
              <textarea class="form-control @error('description') is-invalid @enderror" id="description"
                name="description">{{ old('description') }}</textarea>
              @error('description')
                <div class="invalid-feedback">{{ $message }}</div>
              @enderror
            </div>

            <button class="btn btn-primary float-right" type="submit">Simpan</button>

          </form>

        </div>
      </div>
    </div>
  </div>
@endsection
@push('categoryScript')
  <script src="/admin/plugins/select2/dist/js/select2.min.js"></script>

  <script>
    $('#name').on('keyup', function() {
      let title_val = $(this).val();
      title_val = string_to_slug(title_val);
      $('#slug').val(title_val)
    })

    const selectedBg = {{ Js::from(old('bg_color')) }};
    if (selectedBg) {
      $('#bg_color').val(selectedBg);
    }
    $('#bg_color').select2({
      placeholder: "Pilih Bacgkround",
      theme: 'bootstrap4',
      escapeMarkup: (markup) => markup,
      templateSelection: function(state) {
        let result = '<span class="' + state.id + ' rectangle"></span> ' + state.text;
        return result;
      },
      templateResult: function(state) {
        let result = '<span class="' + state.id + ' rectangle"></span> ' + state.text;
        return result;
      }
    });
  </script>
@endpush
