@include('head')
<body class="compact-menu">
   <!-- START APP WRAPPER -->
    <div class="content-wrapper">
            @include('navbar')
           <div class="content">
               <section class="page-content container-fluid">
                {{-- content home --}}
                <div class="row hero">
                    <div class="col">
                        <h1><b>Sistem Pendukung Keputusan Pemilihan Laptop</b></h1>
                        <h2><b>Mahasiswa Informatika UPN Veteran Jawa Timur</b></h2>
                        <p>Sistem ini menggunakan metode Analytical Hierarchy Process (AHP)</p>
                        <a class="btn-pesan" href='/rekomendasiLaptop' role="button">Lihat data rekomendasi</a>
                    </div>
                    <div class="col">
                        <img src="assets/img/hero.png" alt="logo hero" width="600px">
                    </div>
                </div>
               </section>
           </div>

   </div>
@include('footer')
