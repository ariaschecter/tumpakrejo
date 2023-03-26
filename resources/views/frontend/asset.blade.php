<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="shortcut icon" href="{{ asset('frontend/favicon.ico') }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('frontend/responsive_navbar.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/responsive_asset-infrastructures.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/responsive_footer.css') }}">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100;200;300;400;500&family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <title>Sarana dan Prasarana | SDN Tumpakrejo 3</title>
</head>
<body>
    <header>
        @include('frontend.components.topbar')
    </header>
    <main>
        <section class="tagline">
            <p>Aset Sarana dan Prasarana SDN Tumpakrejo 3</p>
        </section>
        <article class="asset">
            @foreach ($assets as $asset)
                <section class="asset-sarana-prasarana">
                    <div class="name-asset">
                        <p>{{ $asset->judul_asset }}</p>
                    </div>
                    <figure class="image-asset">
                        <img src="{{ $asset->gambar_asset }}" alt="">
                    </figure>
                    <div class="description-asset">
                        {!! $asset->deskripsi_asset !!}
                    </div>
                </section>
            @endforeach
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
