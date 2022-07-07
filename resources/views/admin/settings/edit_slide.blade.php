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
          <div class="row align-items-center">
            <div class="col-md-8">

              <div class="d-flex justify-content-end">
                <a href="/setting/home" class="btn btn-sm btn-primary mr-3"><i class="feather icon-chevron-left"></i>
                  Kembali</a>
                <form action="/setting/home/slide/{{ $slide->id }}" method="POST" class="d-inline delete">
                  @csrf
                  @method('delete')
                  <button class="btn btn-sm btn-danger" type="submit"><i class="feather icon-delete"></i>
                    Delete</button>

                </form>
              </div>
              <form action="{{ route('setting.update.slide', $slide->id) }}" method="POST"
                enctype="multipart/form-data">
                @csrf
                @method('put')
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

                <button class="btn btn-primary mt-3" type="submit">Edit</button>

              </form>
            </div>
            <div class="col-md-4">
              <img src="/web/img/slideshow-home/{{ $slide->image }}" alt="" class="img-fluid image-preview">
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
