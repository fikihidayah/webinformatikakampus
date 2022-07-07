<!-- footer -->
<footer>
  <div class="container">
    <div class="row">
      <div class="col-md-4">
        <h4 class="title-mepet fs-5">Jurusan Teknik Informatika</h4>
        <p class="alamat"> JL. Teuku Umar - Pelita – Lubuk Baja, Batam, Riau Islands - Indonesia </p>
        <p class="kontak">
          Telpon : <span>(0778) 4083113</span><br>
          Email : <span>info@uis.ac.id </span>
        </p>
      </div>
      <div class="col-md-3 ps-sm-5">
        <h4 class="title-mepet fs-5">Tautan Cepat</h4>
        <p class="link-cepat">
          <a href="https://uis.ac.id/" target="_blank">Universitas</a>
        </p>
        <p class="link-cepat">
          <a href="https://siakadku.uis.ac.id/" target="_blank">Siakad</a>
        </p>
        <p class="link-cepat">
          <a href="#" target="_blank">Sister</a>
        </p>
        <p class="link-cepat">
          <a href="https://pmb.uis.ac.id/" target="_blank">PMB</a>
        </p>
      </div>
      <div class="col-md-5 text-center">
        <img src="/web/assets/app/img/uis-logo.png" alt="" class="img-fluid">
      </div>
    </div>
  </div>

</footer>

<div
  class="copyright bg-uis p-3 px-sm-5 text-white d-flex align-items-center justify-content-md-between flex-column flex-md-row">
  <div class="copy">
    <small class="small"><i class="fa-solid fa-copyright"></i> Hak Cipta
      {{ now()->isoFormat('YYYY') }} - Jurusan Informatika UIS -
      Batam</small>
  </div>
  <div class="logo">
    @if ($setting->link_ig)
      <a href="{{ $setting->link_ig }}" target="_blank" class="brand-wrapper ig">
        <i class="fa-brands fa-instagram"></i>
      </a>
    @endif

    @if ($setting->link_fb)
      <a href="{{ $setting->link_fb }}" class="brand-wrapper fb">
        <i class="fa-brands fa-facebook-f"></i>
      </a>
    @endif

    @if ($setting->link_yt)
      <a href="" class="brand-wrapper yt">
        <i class="fa-brands fa-youtube"></i>
      </a>
    @endif
  </div>
</div>
