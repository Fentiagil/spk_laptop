<nav class="navbar navbar-expand-lg bg-body-tertiary mx-5 my-4 px-5 d-flex justify-content-between">
    <img src="assets/img/upn.png" alt="logo upn" width="50px" class="img-fluid">

    {{-- list menu --}}
    <div class="d-flex">
        <ul class="navbar-nav mx-auto gap-3 ">
            <li class="nav-item ">
                <a class="nav-link " href="/homeAdmin" role="button" >Home<i class="bi bi-chevron-right panah"></i></a>
            </li>
            <li class="nav-item ">
                <a class="nav-link " href="/kriteria" role="button" >Kriteria<i class="bi bi-chevron-right panah"></i></a>
            </li>
            <li class="nav-item ">
                <a class="nav-link " href="/alternatif" role="button" >Alternatif<i class="bi bi-chevron-right panah"></i></a>
            </li>
            <li class="nav-item ">
                <a class="nav-link " href="/perbandinganKriteria" role="button" >Perbandingan Kriteria<i class="bi bi-chevron-right panah"></i></a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Perbandingan Alternatif<i class="bi bi-chevron-right panah"></i>
                </a>
                @php                
                    $getJumlahKriteria = (new \App\Http\Controllers\PerbandinganKriteriaController)->getJumlahKriteria();
                @endphp
                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                    @if ( $getJumlahKriteria > 0)
                        @for ($i=0; $i <= ($getJumlahKriteria-1); $i++)
                        @php             
                            $getKriteriaNama = (new \App\Http\Controllers\PerbandinganKriteriaController)->getKriteriaNama($i);
                        @endphp
                            <a class='item' href="{{ url('perbandinganAlternatif', ['jenis' => $i + 1]) }}">
                                <li class="nav-link text-drp" style="text-decoration: none;">{{  $getKriteriaNama }}<hr></li>
                            </a>
                        @endfor
                    @else
                        <li><a class="dropdown-item" href="#">No criteria available</a></li>
                    @endif
                </ul>
            </li>
            <li class="nav-item ">
                <a class="nav-link " href="/ranking" role="button" >Ranking</a>
            </li>
                  
        </ul>
    </div>
        <a class="btn-logout nav-link" href='/logout' role="button">Logout</a>
    
</nav>
