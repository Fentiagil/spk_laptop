@include('head')
<body class="compact-menu">
   <!-- START APP WRAPPER -->
    <div class="content-wrapper">
            @include('navbarAdmin')
           <div class="content">
               <section class="page-content container-fluid">
                {{-- content home admin --}}
                <div class="row hero">
                    <div class="col">
                        <img src="assets/img/admin.png" alt="logo admin" width="400px">
                    </div>
                    <div class="col">
                        <h1><b>Selamat Datang Admin !</b></h1>
                        <h2><b>Sistem Pendukung Keputusan Pemilihan Laptop</b></h2>
                        <p>Sistem ini menggunakan metode Analytical Hierarchy Process (AHP)</p>
                        <a class="btn-pesan" href='/kriteria' role="button">Mulai</a>
                    </div>
                </div>
               </section>
           </div>

   </div>
@include('footer')
