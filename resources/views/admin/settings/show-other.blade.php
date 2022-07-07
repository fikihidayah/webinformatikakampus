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
          <form action="/othersettings/{{ $oset->slug }}" method="POST">
            @method('put')
            @csrf
            <h5>Edit Halaman {{ $oset->halaman }}</h5>
            <div class="form-group">
              <label for="isi">Isi</label>
              <textarea name="isi" id="isi">{{ $oset->isi }}</textarea>
              @error('isi')
                <span class="text-danger">{{ $message }}</span>
              @enderror
            </div>

            <button class="btn btn-primary" type="submit">Edit</button>

          </form>
        </div>
      </div>
    </div>

  </div>
@endsection

@section('optJS')
  <script src="/admin/plugins/tinymce/tinymce.min.js" referrerpolicy="origin"></script>
  <script src="/admin/js/tinymce.config.js"></script>

  <script>
    const editor_config = config_tinymce('#isi', cssFile)
    tinymce.init(editor_config);
  </script>
@endsection
