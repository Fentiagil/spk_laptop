@include('head')
<body class="compact-menu">
   <!-- START APP WRAPPER -->
    <div class="content-wrapper">
            @include('navbarAdmin')
            <div class="content">
                <section class="page-content container-fluid">
                {{-- content alternatif --}}
                <div class="content container mt-5">
                    <h2 class="ui header">Data Alternatif</h2>
                    @if(session('success'))
                        <div class="alert alert-success d-flex justify-content-between">
                            <div>{{ session('success') }}</div>
                            
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endif
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
                                <th>Aksi</th>
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

                                    <td>
                                        <a href="{{ route('editAlternatif', ['id' => $item->id]) }}" class="btn btn-primary">Edit</a>
                                        <form action="{{ route('deleteAlternatif', ['id' => $item->id]) }}" method="post" style="display:inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Hapus</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <a href="{{ route('createAlternatif') }}" class="btn btn-success mb-3">+ Tambah </a>

                    <div class="d-flex justify-content-between">
                        <div></div>
                        <a href="/perbandinganKriteria" class="btn btn-primary mb-3 ml-auto">Lanjut -></a>
                    </div>
                    
                </div>
                
               </section>
           </div>

   </div>
@include('footer')
