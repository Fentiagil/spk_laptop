@include('head')
<body class="compact-menu">
   <!-- START APP WRAPPER -->
    <div class="content-wrapper">
            @include('navbarAdmin')
           <div class="content">
               <section class="page-content container-fluid">
                {{-- content home admin --}}
                   @yield('content')
                   <div class="content container mt-5">
                    <h1 class="ui header text-center">Selamat Datang Admin</h1><br/>
                    <h3 class=" text-center">Sistem Pendukung Keputusan</h3><br/>
                    <h5 class=" text-center">Metode AHP</h5><br/>
                   </div>
               </section>
           </div>

   </div>
@include('footer')
