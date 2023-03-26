<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="{{ asset('frontend/favicon.ico') }}">
    <link rel="stylesheet" href="{{ asset('frontend/responsive_navbar.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/responsive_index.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/responsive_footer.css') }}">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100;200;300;400;500&family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <title>Home | SDN Tumpakrejo 3</title>
</head>
<body>
    <header>
        @include('frontend.components.topbar')
        <section class="content-header">
            <figure>
                <img class="hero-image" src="{{ asset('frontend/image/hero/hero_image.png') }}" alt="">
            </figure>
           <div class="text-header">
                <div class="tagline-header">
                    <p>Sekolah Dasar Negeri Tumpakrejo 3</p>
                </div>
                <div class="description-header">
                    <p>Menerapkan pembelajaran yang baik untuk mencapai murid yang berprestasi dan berakhlak</p>
                </div>
           </div>
        </section>
    </header>
    <main>
        <article id="about-us" class="about-us">
            <section class="content-about">
                <section class="text-about-us">
                    <section class="tagline-about-us">
                        <p>Bergabung dan Mulailah Belajar Bersama Kami</p>
                    </section>
                    <section class="description-about-us">
                        <p>Melakukan semua usaha semaksimal mungkin untuk meraih prestasi dibidang Akademik dan Non Akademik. Raihan prestasi yang diperoleh tak luput dari nilai-nilai ajaran agama dan etika yang diajarkan kepada murid. Selain itu kualitas para guru yang berkualitas menjadi tolak ukur dimana murid dapat berkembang dengan baik.</p>
                        <p>Selain itu juga lingkungan sekolah yang menerapkan adiwiyata sehingga membuat kualitas udara yang dihirup sangat bagus untuk alur pembelajaran sehingga peserta didik dapat belajar dengan baik agar memiliki pengetahuan dan keterampilan yang berguna untuk dirinya dan masyarakat.</p>
                    </section>
                </section>
                <section class="card">
                    <div class="list-card">
                        @foreach ($pengajars as $pengajar)
                            <div class="card-about">
                                <div class="content-card">
                                    <div class="text-card">
                                        <div class="moto">
                                            <p>{{ $pengajar->motivasi_pengajar }}</p>
                                        </div>
                                        <div class="name-position">
                                            <div class="name">
                                                <p>{{ $pengajar->nama_pengajar }}</p>
                                            </div>
                                            <div class="position">
                                                <p>{{ $pengajar->jabatan_pengajar }}</p>
                                            </div>
                                        </div>
                                    </div>
                                    <figure class="card-image">
                                        <img  class="image-card" src="{{ asset($pengajar->gambar_pengajar) }}" alt="{{ $pengajar->jabatan_pengajar }}">
                                    </figure>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </section>
            </section>
            <section class="profile-school">
                <iframe class="video-profile" src="https://www.youtube.com/embed/iUPz01ijNoU" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
                <div class="visi-misi">
                    <div class="visi">
                        <div class="tagline-visi">
                            <p>Visi SD Negeri 3 Tumpakrejo</p>
                        </div>
                        <div class="description-visi">
                            <p>Beriman, Berilmu, Berahklak, Nasionalis, dan Cinta Lingkungan</p>
                        </div>
                    </div>
                    <div class="misi">
                        <div class="tagline-misi">
                            <p>Visi SD Negeri 3 Tumpakrejo</p>
                        </div>
                        <div class="description-misi">
                            <p>1. Menciptakan peserta didik yang aktif, kreatif, dan inovatif</p>
                            <p>2. Mengembangkan intelektual dan spiritual untuk membentuk pribadi yang berketuhanan Yang Maha Esa</p>
                            <p>3. Membentuk karakter peserta didik yang berahklak mulia, berbudaya, dan peduli lingkungan</p>
                            <p>4. Menciptakan lingkungan yang bersih, ijo royo-royo dan aman</p>
                        </div>
                    </div>
                </div>
            </section>
        </article>
        <article id="school-activity" class="school-activity">
            <section class="tagline-school-activity">
                <p>Kegiatan Sekolah</p>
            </section>
            <section class="list-activity">
                @foreach ($kegiatans as $kegiatan)
                    <div class="card-activity">
                    <div class="content-activity">
                        <figure>
                            <img class="image-activity" src="{{ asset($kegiatan->gambar_blog) }}" alt="{{ $kegiatan->judul_blog }}">
                        </figure>
                        <div class="text-activity">
                            <time datetime="{{ \Carbon\Carbon::parse($kegiatan->created_at)->format('Y-m-d') }}">{{ \Carbon\Carbon::parse($kegiatan->created_at)->format('d M Y') }}</time>
                            <summary>{!! Str::of($kegiatan->deskripsi_blog)->limit(150) !!}</summary>
                        </div>
                    </div>
                    <a href="{{ route('home.detail', $kegiatan->slug_blog) }}"><button class="baca-selengkapnya">Baca Selengkapnya</button></a>
                    </div>
                @endforeach

            </section>
        </article>
        <article id="school-achievment" class="school-achievment">
            <div class="description-school-achievment">
                <p>Raihan yang diraih oleh peserta didik tidak luput dari bagaimana baiknya sistem belajar mengajar yang diberikan sekolah kepada mereka. Prestasi-prestasi yang diperoleh tersebut akan membentuk rasa kompetitif sejak dini agar peserta didik mampu berjuang di luar suatu saat nanti.</p>
            </div>
            <div class="list-achievment">
                @foreach ($prestasis as $prestasi)
                    <section class="card-achievment">
                        <figure>
                            <img class="image-achievment" src="{{ asset($prestasi->gambar_blog) }}" alt="{{ $prestasi->judul_blog }}">
                        </figure>
                        <button class="btn-achievment"><a href="{{ route('home.detail', $prestasi->slug_blog) }}">{{ $prestasi->judul_blog }}</a></button>
                    </section>
                @endforeach
            </div>
        </article>
        <article id="school-extracurricular" class="school-extracurricular">
            <section class="tagline-school-extracurricular">
                <p>Ekstrakulikuler</p>
            </section>
            <div class="list-extracurricular">
                @foreach ($ekstras as $ekstra)
                    <section class="card-extracurricular">
                        <figure class="border-ekstracurricular">
                            <img class="image-exctracurricular" src="{{ asset($ekstra->gambar_blog) }}" alt="{{ $ekstra->judul_blog }}">
                        </figure>
                        <div class="text-extracurricular">
                            <div class="name-extracurricular">
                                <p>{{ $ekstra->judul_blog }}</p>
                            </div>
                            <span></span>
                            <div class="description-extracurricular">
                                {!! Str::of($ekstra->deskripsi_blog)->limit(1000) !!}
                            </div>
                            <div class="link-detail-extracurricular">
                                <a href="{{ route('home.detail', $ekstra->slug_blog) }}">Pelajari lebih lanjut</a>
                            </div>
                        </div>
                    </section>
                @endforeach
            </div>
        </article>
    </main>
    @include('frontend.components.footer')
    <script>
        function openNav() {
            document.getElementById("navbar").style.height = "100%";
        }

        function closeNav() {
            document.getElementById("navbar").style.height = "0%";
        }
    </script>
</body>
</html>
