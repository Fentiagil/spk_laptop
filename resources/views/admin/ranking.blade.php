@include('head')
<body class="compact-menu">
   <!-- START APP WRAPPER -->
    <div class="content-wrapper">
            @include('navbarAdmin')
           <div class="content">
               <section class="page-content container-fluid">
                {{-- content ranking --}}
                <div class="content container mt-5">
                    <h2 class="ui header">Hasil Perhitungan</h2><br/>
                    <table class="table table-striped table-hover table-light table-responsive text-center">
                        <thead>
                            <tr>
                                <th>Overall Composite Height</th>
                                <th>Priority Vector (rata-rata)</th>
                                @foreach (range(0, $jmlAlternatif- 1) as $i)
                                    @php
                                        $namaA = (new \App\Http\Controllers\PerbandinganKriteriaController)->getAlternatifNama($i);
                                    @endphp
                                    <th>{{ $namaA }}</th>
                                @endforeach
                            </tr>
                        </thead>
                        <tbody>
                            @foreach (range(0, $jmlKriteria - 1) as $x)
                            <tr>
                                <td>{{ (new \App\Http\Controllers\PerbandinganKriteriaController)->getKriteriaNama($x) }}</td>
                                <td>{{ round((new \App\Http\Controllers\PerbandinganKriteriaController)->getKriteriaPV((new \App\Http\Controllers\PerbandinganKriteriaController)->getKriteriaID($x)), 5) }}</td>
                        
                                @foreach (range(0, $jmlAlternatif - 1) as $y)
                                    <td>{{ round((new \App\Http\Controllers\PerbandinganKriteriaController)->getAlternatifPV((new \App\Http\Controllers\PerbandinganKriteriaController)->getAlternatifID($y), (new \App\Http\Controllers\PerbandinganKriteriaController)->getKriteriaID($x)), 5) }}</td>
                                @endforeach
                            </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <th colspan="2">Total</th>
                                @foreach (range(0, $jmlAlternatif - 1) as $i)
                                    <th>{{ round($nilai[$i], 5) }}</th>
                                @endforeach

                            </tr>
                        </tfoot>
                    </table><br/><br/>

                    <h2 class="ui header">Perangkingan</h2><br/>
                    <table class="table table-striped table-hover table-light table-responsive text-center">
                        <thead>
                            <tr>
                                <th>Peringkat</th>
                                <th>Alternatif</th>
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
