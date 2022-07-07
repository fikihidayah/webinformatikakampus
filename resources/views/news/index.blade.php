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
          <h5>List Berita</h5>

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
                <li class="dropdown-item"><a href="/news/create"><span><i class="feather icon-plus"></i>
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
                  <th>Judul</th>
                  <th>Aksi</th>
                  <th>Gambar</th>
                  <th>Deskripsi</th>
                  <th>Terakhir Di Update</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($news as $n)
                  <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $n->title }}</td>
                    <td>
                      <a href="/news/{{ $n->slug }}" class="badge bg-info"><i
                          class="feather icon-eye text-white"></i></a>
                      <a href="/news/{{ $n->slug }}/edit" class="badge bg-warning text-dark"><i
                          class="feather icon-edit"></i></a>

                      <form action="/news/{{ $n->slug }}" method="POST" class="d-inline delete">
                        @method('delete')
                        @csrf
                        <button class="badge bg-danger border-0" type="submit"><i class="feather icon-trash"></i></button>

                      </form>
                    </td>
                    <td><img src="{{ $n->image_thumb }}" alt="{{ $n->image_thumb }}" width="200"></td>
                    <td>{!! $n->description ?? nsm() !!}</td>
                    <td>{{ $n->updated_at->isoFormat('D MMMM Y hh:mm:ss') }}</td>
                  </tr>
                @endforeach
              </tbody>
            </table>
          </div>
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
