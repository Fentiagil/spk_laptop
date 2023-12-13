@include('head')
<body class="compact-menu">
   <!-- START APP WRAPPER -->
    <div class="content-wrapper">
            @include('navbar')
           <div class="content">
               <section class="page-content container-fluid">
                {{-- content data laptop --}}
                <div class="content container mt-5">
                    <h2 class="ui header">Data Alternatif</h2>
                    <table class="table table-striped table-hover table-light table-responsive text-center">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Layar</th>
                                <th>Prosesor</th>
                                <th>RAM</th>
                                <th>Penyimpanan</th>
                                <th>Baterai</th>
                                <th>Harga/Juta</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php $nomor = 1 @endphp
                            @foreach($data as $item)
                                <tr>
                                    <td>{{ $nomor++ }}</td>
                                    <td>{{ $item->nama }}</td>
                                    <td>{{ $item->layar }}</td>
                                    <td>{{ $item->prosesor }}</td>
                                    <td>{{ $item->RAM }}</td>
                                    <td>{{ $item->penyimpanan }}</td>
                                    <td>{{ $item->baterai }}</td>
                                    <td>{{ $item->harga }}</td>                                   
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
               </section>
           </div>

   </div>
@include('footer')
