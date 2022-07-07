@extends('admin.layouts.main')

@section('content')
  <div class="row justify-content-center">
    <div class="col-md-7">
      <div class="card">
        <div class="card-header">
          <h5>Tambah User</h5>
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

          <form action="/user/store" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="form-group">
              <label class="floating-label" for="name">Nama</label>
              <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name"
                value="{{ old('name') }}">
              @error('name')
                <div class="invalid-feedback">{{ $message }}</div>
              @enderror
            </div>

            <div class="form-group">
              <label class="floating-label" for="email">Email</label>
              <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email"
                value="{{ old('email') }}">
              @error('email')
                <div class="invalid-feedback">{{ $message }}</div>
              @enderror
            </div>

            <div class="form-group">
              <label for="image">Image</label>
              <div class="custom-file">
                <input type="file" class="custom-file-input @error('image') is-invalid @enderror" id="image" name="image">
                <label class="custom-file-label" for="image">Choose file...</label>
                @error('image')
                  <div class="invalid-feedback">{{ $message }}</div>
                @enderror
              </div>
            </div>

            <div class="form-group position-relative">
              <label class="floating-label" for="password">Password</label>
              <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password">
              <span class="show-pwd"><i class="feather icon-eye-off"></i></span>
              @error('password')
                <div class="invalid-feedback">{{ $message }}</div>
              @enderror
            </div>

            <div class="form-group position-relative">
              <label class="floating-label" for="password2">Konfirmasi Password</label>
              <input type="password" class="form-control @error('password2') is-invalid @enderror" id="password2" name="password2">
              <span class="show-pwd"><i class="feather icon-eye-off"></i></span>
              @error('password2')
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
