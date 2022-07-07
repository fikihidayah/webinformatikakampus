<!-- [ Header ] start -->
<header class="navbar pcoded-header navbar-expand-lg navbar-light header-blue">


  <div class="m-header">
    <a class="mobile-menu" id="mobile-collapse" href=""><span></span></a>
    <a href="" class="b-brand">
      <!-- ========   change your logo hear   ============ -->
      <img src="/web/img/icon/{{ setting('icon') }}" alt="" class="logo" width="120">
      {{-- <img src="/admin/img/uis-ti.png" alt="" class="logo-thumb"> --}}
    </a>
    <a href="" class="mob-toggler">
      <i class="feather icon-more-vertical"></i>
    </a>
  </div>
  <div class="collapse navbar-collapse">
    <ul class="navbar-nav ml-auto">
      <li>
        <div class="dropdown drp-user">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">
            <i class="feather icon-user"></i>
          </a>
          <div class="dropdown-menu dropdown-menu-right profile-notification">
            <div class="pro-head">
              <img src="/admin/img/profile-user/{{ auth()->user()->image }}" class="img-radius"
                alt="User-Profile-Image">
              <span>{{ auth()->user()->name }}</span>
              <a href="/gate/logout" class="dud-logout" title="Logout">
                <i class="feather icon-log-out"></i>
              </a>
            </div>
            <ul class="pro-body">
              <li><a href="/user/profile" class="dropdown-item"><i class="feather icon-user"></i> Profile</a></li>
            </ul>
          </div>
        </div>
      </li>
    </ul>
  </div>


</header>
<!-- [ Header ] end -->
