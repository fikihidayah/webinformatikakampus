@extends('admin.layouts.main')

@section('optCSS')
  <link rel="stylesheet" href="/admin/plugins/DataTables/datatables.min.css">
  <link rel="stylesheet" href="/admin/assets/css/plugins/datatables.css">
@endsection

@section('content')
  <div class="row">
    <div class="col-sm-12">
      <div class="card">
        <div class="card-header">
          <h5>Manajemen User</h5>

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
                <li class="dropdown-item"><a href="/user/create"><span><i class="feather icon-plus"></i>
                      Tambah</span><span style="display:none"><i class="feather icon-plus"></i> expand</span></a></li>
              </ul>
            </div>
          </div>
        </div>

        <div class="card-body">

          <div class="table-responsive">
            <table class="table table-striped dataTable">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Email</th>
                  <th>Nama Lengkap</th>
                  <th>Peran</th>
                  <th>Image</th>
                  <th>Aksi</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($users as $user)
                  <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->role->name }}</td>
                    <td><img src="/admin/img/profile-user/{{ $user->image }}" alt="{{ $user->image }}" width="200">
                    </td>
                    <td>
                      @php
                        if ($user->role->id !== 1) {
                            $to = "/user/$user->id/edit";
                        } else {
                            $to = '/user/profile';
                        }
                      @endphp
                      <a href="{{ $to }}" class="badge bg-warning text-dark"><i
                          class="feather icon-edit"></i></a>

                      @if ($user->role->id !== 1)
                        <form action="/user/{{ $user->id }}" method="POST" class="d-inline delete">
                          @method('delete')
                          @csrf
                          <button class="badge bg-danger border-0" type="submit"><i
                              class="feather icon-trash"></i></button>

                        </form>
                      @endif
                    </td>
                  </tr>
                @endforeach
              </tbody>
            </table>
          </div>

        </div>
      </div>
    </div>
  </div>
@endsection

@section('optJS')
  <script src="/admin/plugins/DataTables/datatables.min.js"></script>
  <script>
    $('.dataTable').dataTable({
      "autoWidth": false
    })
  </script>
@endsection
