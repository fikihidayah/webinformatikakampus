@extends('admin.layouts.main')

@section('content')
  <div class="row">
    <div class="col-md-9 pr-sm-5">
      <div class="card">
        <form action="/user/update-profile" method="POST" enctype="multipart/form-data">
          @csrf
          <div class="card-header clearfix">
            <button class="btn btn-sm btn-primary float-right mb-2" type="submit">Simpan</button>
            <h5>Profil {{ ucfirst($user->role->name) }}</h5>
          </div>
          <div class="card-body clearfix">
            <div class="form-group">
              <label class="floating-label" for="name">Nama</label>
              <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name"
                value="{{ $user->name }}">
              @error('name')
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
              <label class="floating-label" for="old_pw">Password Lama</label>
              <input type="password" class="form-control @error('old_pw') is-invalid @enderror" id="old_pw" name="old_pw">
              <span class="show-pwd"><i class="feather icon-eye-off"></i></span>
              @error('old_pw')
                <div class="invalid-feedback">{{ $message }}</div>
              @enderror
            </div>
            <div class="form-group position-relative">
              <label class="floating-label" for="password">Password</label>
              <input type="password" class="form-control @error('password') is-invalid @enderror" id="password"
                name="password">
              <span class="show-pwd"><i class="feather icon-eye-off"></i></span>
              @error('password')
                <div class="invalid-feedback">{{ $message }}</div>
              @enderror
            </div>
            <div class="form-group position-relative">
              <label class="floating-label" for="password2">Konfirmasi Password</label>
              <input type="password" class="form-control @error('password2') is-invalid @enderror" id="password2"
                name="password2">
              <span class="show-pwd"><i class="feather icon-eye-off"></i></span>
              @error('password2')
                <div class="invalid-feedback">{{ $message }}</div>
              @enderror
            </div>
            <button class="btn btn-primary float-right" type="submit">Edit</button>
          </div>
      </div>
      </form>
    </div>

    <div class="col-md-3 p-2">
      <div class="text-center">
        <img src="/admin/img/profile-user/{{ $user->image }}" alt="" class="img-fluid rounded-circle">
        <h6 class="mt-3">{{ $user->email }}</h6>
        <span>{{ $user->name }}</span>
        <a href="/user/reset-image/{{ $user->id }}" class="btn btn-block btn-primary mt-3">Reset Image</a>

        {{-- mau set locale tinggal masuk ke appserviceprovider --}}
        <p class="mt-3"><b>Bergabung Sejak :</b><br> {{ to_indo($user->created_at) }}</p>
      </div>
    </div>
  </div>
@endsection
