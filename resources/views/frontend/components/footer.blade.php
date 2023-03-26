<footer>
  <section>
      <div class="school">
          <div class="name-location-school">
              <div class="name-school">
                  <p>Sekolah Dasar Negeri Tumpakrejo 3</p>
              </div>
              <div class="address-school">
                  <p>Jl.Raya Gombangan RT. 35 RW. 07 Tumpakrejo, Kec. Gedangan, Kab. Malang Prov. Jawa Timur</p>
              </div>
          </div>
          <div class="information-contact-school">
              <p>Kontak Sekolah</p>
              <div class="contact-school">
                  <div class="phone-number">
                      <p><a href="">+6283150993913</a></p>
                  </div>
                  <div class="email-school">
                      <p><a href="">prayudariansyah1412@gmail.com</a></p>
                  </div>
                  <div class="time-operational-school">
                      <p>08.00 - 14.00 WIB</p>
                  </div>
              </div>
          </div>
      </div>
  </section>
  <section class="footer-navbar">
      <figure class="footer-logo">
          <img src="{{ asset('frontend/image/logo/logo.png') }}" alt="logo-sekolah">
      </figure>
      <nav class="footer-navigation">
          <div class="footer-navigation-content">
              <a href="{{ route('home.index') }}">Beranda</a>
              <a href="{{ route('home.index') }}#about-us">Tentang Kami</a>
              <div class="footer-subnav">
                  <button class="footer-subnavbtn">Kategori<img src="{{ asset('frontend/image/icon/down.png') }}"></button>
                  <div class="footer-subnav-content">
                    <a href="{{ route('home.index') }}#school-activity">Kegiatan Sekolah</a>
                    <a href="{{ route('home.index') }}#school-achievment">Prestasi</a>
                    <a href="{{ route('home.index') }}#school-extracurricular">Ekstrakulikuler</a>
                  </div>
              </div>
              <a href="{{ route('home.pengajar') }}">Pengajar</a>
              <a href="{{ route('home.informasi') }}">Informasi</a>
              <a href="{{ route('home.asset') }}">Asset</a>
          </div>
          <figure class="sosmed">
              <a href="https://www.linkedin.com/feed/"><img src="{{ asset('frontend/image/icon/youtube.svg') }}" alt="youtube"></a>
              <a href="https://www.linkedin.com/feed/"><img src="{{ asset('frontend/image/icon/facebook.svg') }}" alt="facebook"></a>
              <a href="https://www.linkedin.com/feed/"><img src="{{ asset('frontend/image/icon/instagram.svg') }}" alt="instagram"></a>
          </figure>
      </nav>
  </section>
</footer>
