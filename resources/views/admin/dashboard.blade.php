@extends('admin.layouts.main')
@section('content')
  <div class="row">

    @can('admin')
      <div class="col-sm-6 col-lg-4 col-xl-3">
        <div class="card">
          <div class="card-body">
            <div class="row align-items-center">
              <div class="col-8">
                <h4 class="text-c-yellow">{{ $count['category'] }}</h4>
                <h6 class="text-muted m-b-0">Kategori</h6>
              </div>
              <div class="col-4 text-right">
                <i class="feather icon-book f-28"></i>
              </div>
            </div>
          </div>
          <div class="card-footer bg-c-yellow">
            <div class="row align-items-center">
              <div class="col-9">
                <a href="/news/categories">
                  <p class="text-white m-b-0">Manage</p>
                </a>
              </div>
              <div class="col-3 text-right">
                <i class="feather icon-trending-up text-white f-16"></i>
              </div>
            </div>
          </div>
        </div>
      </div>
    @endcan

    <div class="col-sm-6 col-lg-4 col-xl-3">
      <div class="card">
        <div class="card-body">
          <div class="row align-items-center">
            <div class="col-8">
              <h4 class="text-c-green">{{ $count['news'] }}</h4>
              <h6 class="text-muted m-b-0">News</h6>
            </div>
            <div class="col-4 text-right">
              <i class="feather icon-bar-chart-2 f-28"></i>
            </div>
          </div>
        </div>
        <div class="card-footer bg-c-green">
          <div class="row align-items-center">
            <div class="col-9">
              <a href="/news">
                <p class="text-white m-b-0">Manage</p>
              </a>
            </div>
            <div class="col-3 text-right">
              <i class="feather icon-trending-up text-white f-16"></i>
            </div>
          </div>
        </div>
      </div>
    </div>

    @can('admin')
      <div class="col-sm-6 col-lg-4 col-xl-3">
        <div class="card">
          <div class="card-body">
            <div class="row align-items-center">
              <div class="col-8">
                <h4 class="text-c-red">{{ $count['users'] }}</h4>
                <h6 class="text-muted m-b-0">Users</h6>
              </div>
              <div class="col-4 text-right">
                <i class="feather icon-users f-28"></i>
              </div>
            </div>
          </div>
          <div class="card-footer bg-c-red">
            <div class="row align-items-center">
              <div class="col-9">
                <a href="/user/manage">
                  <p class="text-white m-b-0">Manage</p>
                </a>
              </div>
              <div class="col-3 text-right">
                <i class="feather icon-trending-down text-white f-16"></i>
              </div>
            </div>
          </div>
        </div>
      </div>
    @endcan
  </div>
@endsection
