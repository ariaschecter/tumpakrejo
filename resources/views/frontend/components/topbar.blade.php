<section class="navigation">
    <figure class="logo">
        <img src="{{ asset('frontend/image/logo/logo.png') }}" alt="logo-sekolah">
    </figure>
    <nav id="navbar" class="overlay">
        <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
        <div class="overlay-content">
            <a href="{{ route('home.index') }}">Beranda</a>
            <a href="{{ route('home.index') }}#about-us">Tentang Kami</a>
            <div class="subnav">
                <button class="subnavbtn">Kategori <img src="{{ asset('frontend/image/icon/down.png') }}"></button>
                <div class="subnav-content">
                  <a href="{{ route('home.index') }}#school-activity">Kegiatan Sekolah</a>
                  <a href="{{ route('home.index') }}#school-achievment">Prestasi</a>
                  <a href="{{ route('home.index') }}#school-extracurricular">Ekstrakulikuler</a>
                </div>
            </div>
            <a href="{{ route('home.pengajar') }}">Pengajar</a>
            <a href="{{ route('home.informasi') }}">Information</a>
            <a href="{{ route('home.asset') }}">Asset</a>
        </div>
        <figure class="sosmed">
            <a href="https://www.linkedin.com/feed/"><img src="{{ asset('frontend/image/icon/youtube.svg') }}" alt="youtube"></a>
            <a href="https://www.linkedin.com/feed/"><img src="{{ asset('frontend/image/icon/facebook.svg') }}" alt="facebook"></a>
            <a href="https://www.linkedin.com/feed/"><img src="{{ asset('frontend/image/icon/instagram.svg') }}" alt="instagram"></a>
        </figure>
    </nav>
    <figure class="menu">
        <img src="{{ asset('frontend/image/icon/menu.svg') }}" alt="menu" onclick="openNav()">
    </figure>
</section>
