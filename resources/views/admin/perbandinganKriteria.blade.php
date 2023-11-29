@include('head')
<body class="compact-menu">
   <!-- START APP WRAPPER -->
    <div class="content-wrapper">
            @include('navbarAdmin')
           <div class="content">
               <section class="page-content container-fluid">
                {{-- content perbandingan kriteria --}}
                   @yield('content')
                   <p>ini perbandingan kriteria</p>
               </section>
           </div>

   </div>
@include('footer')
