@include('head')
<body class="compact-menu">
   <!-- START APP WRAPPER -->
    <div class="content-wrapper">
            @include('navbarAdmin')
           <div class="content">
               <section class="page-content container-fluid">
                <div class="container mt-5">
                    <h3 class="ui header">Matriks Perbandingan Berpasangan</h3><br/>
                    <table class="table table-striped table-hover table-light table-responsive text-center">
                        <thead>
                            <tr>
                                <th>Alternatif</th>
                                @foreach (range(0, $n - 1) as $i)
                                @php               
                                    $namaK = (new \App\Http\Controllers\PerbandinganKriteriaController)->getAlternatifNama($i);
                                @endphp
                                    <th>{{ $namaK }}</th>
                                @endforeach
                            </tr>
                        </thead>
                        <tbody>
                            @foreach (range(0, $n - 1) as $x)
                                @php               
                                    $namaK = (new \App\Http\Controllers\PerbandinganKriteriaController)->getAlternatifNama($x);
                                @endphp
                                <tr>
                                    <td>{{ $namaK }}</td>
                                    @foreach (range(0, $n - 1) as $y)
                                        <td>{{ round($matrik[$x][$y], 5) }}</td>
                                    @endforeach
                                </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>Jumlah</th>
                                @foreach (range(0, $n - 1) as $i)
                                    <th>{{ round($jmlmpb[$i], 5) }}</th>
                                @endforeach
                            </tr>
                        </tfoot>
                    </table>

                    <br/><br/>

                    <h3 class="ui header">Matriks Nilai Alternatif</h3><br/>
                    <table class="table table-striped table-hover table-light table-responsive text-center">
                        <thead>
                            <tr>
                                <th>Alternatif</th>
                                @foreach (range(0, $n - 1) as $i)
                                @php               
                                    $namaK = (new \App\Http\Controllers\PerbandinganKriteriaController)->getAlternatifNama($i);
                                @endphp
                                    <th>{{ $namaK }}</th>
                                @endforeach
                                <th>Jumlah</th>
                                <th>Priority Vector</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach (range(0, $n - 1) as $x)
                                @php               
                                    $namaK = (new \App\Http\Controllers\PerbandinganKriteriaController)->getAlternatifNama($x);
                                @endphp
                                <tr>
                                    <td>{{ $namaK }}</td>
                                    @foreach (range(0, $n - 1) as $y)
                                        <td>{{ round($matrikb[$x][$y], 5) }}</td>
                                    @endforeach
                                    <td>{{ round($jmlmnk[$x], 5) }}</td>
                                    <td>{{ round($pv[$x], 5) }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <th colspan="{{ $n + 2 }}">Principe Eigen Vector (λ maks)</th>
                                <th>{{ round($eigenvektor, 5) }}</th>
                            </tr>
                            <tr>
                                <th colspan="{{ $n + 2 }}">Consistency Index</th>
                                <th>{{ round($consIndex, 5) }}</th>
                            </tr>
                            <tr>
                                <th colspan="{{ $n + 2 }}">Consistency Ratio</th>
                                <th>{{ round(($consRatio * 100), 2) }} %</th>
                            </tr>
                        </tfoot>
                    </table><br/>

                    @if ($consRatio > 0.1)
                        <div class="card border-danger mb-3">
                            <div class="card-body text-danger">
                            <h5 class="card-title">Nilai Consistency Ratio melebihi 10% !!!</h5>
                            <p class="card-text">Mohon input kembali tabel perbandingan...</p>
                            </div>
                        </div>

                        <br>
                        <a href="javascript:history.back()" class="btn btn-danger mb-3 ml-auto"><- kembali</a>
                    @else
                        <br>
                        <a href="/ranking" class="btn btn-primary mb-3 ml-auto">Lanjut -></a>
                        <br> <br> <br> <br>
                    @endif
                </div>
               </section>
           </div>

   </div>
@include('footer')
