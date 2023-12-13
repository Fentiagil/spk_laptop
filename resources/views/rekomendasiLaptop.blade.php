@include('head')
<body class="compact-menu">
   <!-- START APP WRAPPER -->
    <div class="content-wrapper">
            @include('navbar')
           <div class="content">
               <section class="page-content container-fluid">
                {{-- content rekomendasi --}}
                <div class="content container mt-5">
                    <h2 class="ui header">Rekomendasi Laptop</h2><br/>
                    <table class="table table-striped table-hover table-light table-responsive text-center">
                        <thead>
                            <tr>
                                <th>Peringkat</th>
                                <th>Data Laptop</th>
                                <th>Nilai</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($results as $key => $result)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ $result->nama }}</td>
                                    <td>{{ $result->nilai }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table><br/>
                </div>
               </section>
           </div>

   </div>
@include('footer')
