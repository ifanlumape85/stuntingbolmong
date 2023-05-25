@extends('layouts.frontend.app')
@section('content')
<section>
    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
            <!-- <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li> -->
        </ol>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img class="d-block w-100" src="/N89dFGMqvhssPIkEbPqfkKagX9qyRbPbAtA5u6yh.jpg" alt="BOLMONG HEBAT">
                <div class="carousel-caption d-none d-md-block">
                    <!-- <h5>Dashboard Pemantauan Terpadu</h5>
                    <p>Percepatan Pencegahan Stunting</p> -->
                </div>
            </div>
            <!-- <div class="carousel-item">
                <img class="d-block w-100" src=".../800x400?auto=yes&bg=666&fg=444&text=Second slide" alt="Second slide">
            </div>
            <div class="carousel-item">
                <img class="d-block w-100" src=".../800x400?auto=yes&bg=555&fg=333&text=Third slide" alt="Third slide">
            </div> -->
        </div>
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
</section>
<section>
    <div class="container">
        <div class="row mt-4 mb-4">
            <div class="col text-center">
                <p>&nbsp;</p>
                <h1 class="h1 text-dark text-bold">PERCEPATAN PENURUNAN STUNTING</h1>
                <p>&nbsp;</p>
                {{-- <img src="/Screenshot 2023-05-25 at 19.47.54.png" class="img-circle img-lg" /> --}}
                <p class="text-center text-dark text-break  text-lg">Percepatan penurunan stunting pada Balita adalah program prioritas Pemerintah sebagaimana termaktub dalam RPJMN 2020-2024. Target nasional pada tahun 2024, prevalensi stunting turun hingga 14%. Wakil Presiden RI sebagai Ketua Pengarah Tim Percepatan Penurunan Stunting (TP2S) Pusat bertugas memberikan arahan terkait penetapan kebijakan penyelenggaraan Percepatan Penurunan Stunting; serta memberikan pertimbangan, saran, dan rekomendasi dalam penyelesaian kendala dan hambatan penyelenggaraan Percepatan Penurunan Stunting secara efektif, konvergen, dan terintegrasi dengan melibatkan lintas sektor di tingkat pusat dan daerah.</p>
                <p>&nbsp;</p>
                {{-- <p class="text-bold">Julin Esther Papuling, SKM, ME</p> --}}
                {{-- <p class="text-secondary">Kepala Dinas Kesehatan</p> --}}

            </div>
        </div>
    </div>
</section>
<section class="bg-secondary">
    <div class="container">
        <div class="row">
            <div class="col text-center mt-4 mb-4">
                <p>&nbsp;</p>
                <h1 class="h1 text-bold">Kerangka Konsep Percepatan Penurunan Stunting</h1>
                <p class="text-center text-bold m-4 h2">Penyebab Tak Langsung</p>
                <p>&nbsp;</p>

                <div class="row mt-4 mb-4">
                    <div class="col text-lg">
                        1. Ketahanan Pangan<br />(Ketersediaan, keterjangkauan dan akses pangan bergizi)
                    </div>
                    <div class="col  text-lg">
                        2. Lingkungan Sosial<br />(Norma, makanan bayi dan anak, hygiene, pendidikan, tempat kerja)
                    </div>
                </div>
                <div class="row mt-4 mb-4">
                    <div class="col  text-lg">
                        3. Lingkungan Kesehatan<br />(Akses, pelayanan preventif dan kuratif)
                    </div>
                    <div class="col text-lg">
                        4. Lingkungan Pemukiman<br />(Air, sanitasi, kondisi bangunan)
                    </div>
                </div>
                <p>&nbsp;</p>
                <p>&nbsp;</p>
                <p>&nbsp;</p>
            </div>
        </div>
    </div>
</section>
<section>
    <div class="container">
        <div class="row mt-4 mb-2">
            <div class="col text-center">
                <h1 class="h2 text-dark text-bold">Proses</h1>
                <p class="text-center text-dark text-break text-lg">Pendapatan dan kesenjangan ekonomi, perdagangan, urbanisasi, globalisasi, sistem pangan, perlindungan sosial, sistem kesehatan, pembangunan pertanian dan pemberdayaan perempuan.</p>
                <p>&nbsp;</p>
                <p>&nbsp;</p>
                <p>&nbsp;</p>
            </div>
        </div>
    </div>
</section>
<section>
    <div class="container">
        <div class="row mt-4 mb-2">
            <div class="col text-center">
                <h1 class="h2 text-dark text-bold">Prasyarat Pendukung</h1>
                <p class="text-center text-dark text-break text-lg">Komitmen politis dan kebijakan pelaksanaan aksi kebutuhan dan tekanan untuk implementasi, tata kelola keterlibatan antar lembaga pemerintah dan non-pemerintah, kapasitas untuk implementasi.</p>
                <p>&nbsp;</p>
                <p>&nbsp;</p>
            </div>
        </div>
    </div>
</section>
<section>
    <div class="container">
        <h1 class="h2 text-dark text-bold text-center"><a href="/news" class="text-bold text-dark">News</a></h1>
        <div class="row mt-4 mb-2">
            @foreach($news as $item)
            <div class="col-md-6">

                <div class="card card-widget">
                <div class="card-header">
                    <span class="username"><a href="/news/{{ $item->slug ?? null }}" class="text-bold text-danger">{{ Str::limit($item->name, 55) ?? null }}</a></span>
                    <p class="text-sm text-secondary">{{ $item->created_at ?? null }}</p>
                </div>
                
                <div class="card-body">
                <img class="img-fluid pad" style="object-positon:center; object-fit:cover; width:100%; height:250px;"  src="{{ Storage::url($item->image) }}" alt="Photo">
                </div>
                
                </div>
                
                </div>
            @endforeach
        </div>
    </div>
</section>
<section>
    <div class="container">
        <h1 class="h2 text-dark text-bold text-center"><a href="/gallery" class="text-bold text-dark">Gallery</a></h1>
        <div class="row mt-4 mb-2">
            @foreach($galleries as $item)
            <div class="col-md-12 col-lg-6 col-xl-4">
                <a href="{{ Storage::url($item->image) }}" target="_blank" class="text-white">
                <div class="card mb-2 bg-gradient-dark">
                    <img style="object-positon:center; object-fit:cover; width:100%; height:250px;" class="card-img-top" src="{{ Storage::url($item->image) }}" alt="Dist Photo 1">
                    <div class="card-img-overlay d-flex flex-column justify-content-end">
                        <h5 class="card-title text-primary text-white">{{ $item->title ?? null }}</h5>
                        {{ $item->created_at ?? null }}
                    
                    </div>
                </div>
            </a>
            </div>
            @endforeach
        </div>
    </div>
</section>
@endsection