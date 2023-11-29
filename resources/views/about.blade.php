@include('head')
<body class="compact-menu">
   <!-- START APP WRAPPER -->
    <div class="content-wrapper">
            @include('navbar')
           <div class="content">
               <section class="page-content container-fluid">
                {{-- content about --}}
                   @yield('content')
                   <p>ini halaman about</p>
               </section>
           </div>

   </div>
@include('footer')
