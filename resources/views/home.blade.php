@include('head')
<body class="compact-menu">
   <!-- START APP WRAPPER -->
    <div class="content-wrapper">
            @include('navbar')
           <div class="content">
               <section class="page-content container-fluid">
                {{-- content home --}}
                   @yield('content')
                   <p>ini halaman home</p>
               </section>
           </div>

   </div>
@include('footer')
