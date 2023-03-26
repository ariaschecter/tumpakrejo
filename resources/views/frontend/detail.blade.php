<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="{{ asset('frontend/favicon.ico') }}">
    <link rel="stylesheet" href="{{ asset('frontend/responsive_navbar.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/detail.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/responsive_footer.css') }}">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100;200;300;400;500&family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <title>Detail Kegiatan</title>
</head>
<body>
    <header>
        @include('frontend.components.topbar')
        <section class="content-header">
            <div class="tagline-detail">
                <div class="name-tagline">
                    <p>{{ $blog->judul_blog }}</p>
                </div>
                <div class="place-date">
                    <div class="place-name">
                        <p>SDN Tumpakrejo 3 </p>
                    </div>
                    <time datetime="{{ \Carbon\Carbon::parse($blog->created_at)->format('Y-m-d') }}">{{ \Carbon\Carbon::parse($blog->created_at)->format('d M Y') }}</time>
                </div>
            </div>
            <figure class="hero-image">
                <img src="{{ asset($blog->gambar_blog) }}" alt="hero-image">
            </figure>
        </section>
    </header>
    <main>
        <article class="about-detail">
            <div class="tagline-about-detail">
                <p>{{ $blog->judul_blog }}</p>
            </div>
            <div class="description-about-detail">
                <p>{!! $blog->deskripsi_blog !!}</p>
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
