@extends('admin.layouts.main')

@section('content')
  <div class="row">
    <div class="col-xl-11">
      <div class="clearfix">
        <a class="btn btn-sm btn-warning float-right" href="/news"><i class="feather icon-corner-up-left"></i></a>
        <h3 class="text-white">{{ $news->title }}</h3>
      </div>
      <div class="clearfix mt-3">
        <div class="float-left">
          @foreach ($news->category as $category)
            <div class="badge {{ $category->bg_color }}">
              {{ $category->name }}</div>
          @endforeach
        </div>
        <div class="float-right text-dark">
          <b>By</b> : {{ $news->user->name }}
        </div>
      </div>

      <div class="berita mt-4">
        <img src="{{ $news->image }}" alt="{{ $news->image }}" class="img-fluid mb-4">
        {!! $news->body !!}
        <hr>
        <p>{{ $news->views }} Views</p>
        <div class="d-flex justify-content-between">
          <p>Posted On : {{ $news->created_at->diffForHumans() }}</p>
          <p>Edited At : {{ $news->updated_at->diffForHumans() }}</p>
        </div>
      </div>

    </div>
  </div>
@endsection
