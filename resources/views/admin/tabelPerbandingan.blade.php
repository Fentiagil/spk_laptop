<div class="content container mt-5">
    <form action="{{ route('prosesAlternatif') }}" method="post">
        @csrf
        @php
            $urut = 0;
            $nilai = 1; // Inisialisasi nilai
 
            $namaK = (new \App\Http\Controllers\PerbandinganKriteriaController)->getKriteriaNama($jenis-1);
        @endphp
        <h2 class="ui header">Perbandingan Alternatif -> {{ $namaK }}</h2><br/>
        <table class="table table-striped table-hover table-light table-responsive text-center">
            <thead>
                    <th colspan="2">Pilih yang lebih penting</th>
                    <th>Nilai perbandingan</th>
                </tr>
            </thead>
            <tbody>
            
                
                @for ($x=0; $x <= ($n - 2); $x++)
                    @for ($y=($x+1); $y <= ($n - 1) ; $y++)
                    @php
                        $urut++;                             
                        $nilai = (new \App\Http\Controllers\PerbandinganKriteriaController)->getNilaiPerbandinganAlternatif($x, $y,($jenis-1));
                    @endphp
                        <tr>
                            <td>
                                <div class="form-check d-flex">
                                    <input class="form-check-input" type="radio" name="pilih{{$urut}}" checked="" value="1" > 
                                    <label class="form-check-label" for="pilih{{$urut}}">
                                        {{ $pilihan[$x] }}
                                    </label>
                                </div> 
                            </td>
                            <td>
                                <div class="form-check d-flex">
                                    <input class="form-check-input" type="radio" name="pilih{{$urut}}" value="2"> 
                                    <label class="form-check-label" for="pilih{{$urut}}">
                                        {{ $pilihan[$y] }}
                                    </label>
                                </div>
                            </td>
                            
                            <td>
                                <div class="field">
                                    <input type="number" name="bobot{{ $urut }}" value="{{ $nilai }}" max="10" required>                                                    
                                </div>
                            </td>

                        </tr>
                        
                    @endfor
                @endfor
                
            </tbody>
            
        </table>
        <button type="submit" class="btn btn-success">Simpan Data</button>
    </form>

</div>