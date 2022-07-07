@extends('admin.layouts.main')

@section('optCSS')
  <link rel="stylesheet" href="/admin/plugins/select2/dist/css/select2.css">
  <link rel="stylesheet" href="/admin/plugins/select2/dist/css/select2-bootstrap4.min.css">
@endsection

@section('content')
  <form action="/news" method="POST" enctype="multipart/form-data">
    <div class="row justify-content-center">

      <div class="col-md-9">
        <div class="card">
          <div class="card-header">
            <h5>Tambah Berita</h5>
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

            @csrf

            <div class="form-group">
              <label class="floating-label" for="title">Judul</label>
              <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title"
                value="{{ old('title') }}">
              @error('title')
                <div class="invalid-feedback">{{ $message }}</div>
              @enderror
            </div>

            <div class="form-group">
              <label class="floating-label" for="slug">Slug</label>
              <input type="text" class="form-control @error('title') is-invalid @enderror" id="slug" name="slug"
                value="{{ old('slug') }}">
              @error('slug')
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

            <div class="form-group">
              <label for="body">Isi</label>
              <textarea name="body" id="body">{{ old('body') }}</textarea>
              @error('body')
                <small class="text-danger">{{ $message }}</small>
              @enderror
            </div>
            <div class="form-group">
              <label for="category">Kategori</label>
              <select class="form-control @error('category') is-invalid @enderror select2" id="category" name="category[]"
                multiple="multiple">
                @foreach ($categories as $category)
                  <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
              </select>
              @error('category')
                <div class="invalid-feedback">{{ $message }}</div>
              @enderror
            </div>

            <div class="form-group">
              <label for="image">Image Header Berita</label>
              <div class="custom-file">
                <input type="file" class="custom-file-input @error('image') is-invalid @enderror" id="image" name="image">
                <label class="custom-file-label" for="image">Choose file...</label>
                @error('image')
                  <div class="invalid-feedback">{{ $message }}</div>
                @enderror
                <small class="text-muted">File berformat .jpeg,.png,.jpg ukuran max 512kb, disarankan ratio
                  16:9</small>
              </div>
            </div>

            <button class="btn btn-primary float-right" type="submit">Simpan</button>

          </div>
        </div>
      </div>

      <div class="col-md-3">
        <div class="card">
          <div class="card-body">
            <fieldset class="form-group">
              <label for="inputPassword3" class="col-form-label">Publikasi</label>
              <div class="form-check">
                <input class="form-check-input" type="radio" name="is_published" id="ya" value="1" checked>
                <label class="form-check-label" for="ya">Ya</label>
              </div>
              <div class="form-check">
                <input class="form-check-input" type="radio" name="is_published" id="tidak" value="0">
                <label class="form-check-label" for="tidak">Tidak</label>
              </div>
            </fieldset>
          </div>
        </div>
      </div>
    </div>
  </form>
@endsection



@section('optJS')
  <script src="/admin/plugins/tinymce/tinymce.min.js" referrerpolicy="origin"></script>
  <script src="/admin/js/tinymce.config.js"></script>
  <script src="/admin/plugins/select2/dist/js/select2.min.js"></script>
  <script>
    $('#title').on('keyup', function() {
      let title_val = $(this).val();
      title_val = string_to_slug(title_val);
      $('#slug').val(title_val).parent().addClass('fill')
    })

    const editor_config = config_tinymce('#body', cssFile)
    tinymce.init(editor_config);

    const oldValCategory = {{ Js::from(old('category')) }};
    $('#category').val(oldValCategory);
    $('#category').trigger('change');
    $('.select2').select2({
      placeholder: "Pilih Kategori(boleh lebih dari 1)",
      theme: 'bootstrap4'
    });
  </script>
@endsection
