@include('head')
<body class="compact-menu">
   <!-- START APP WRAPPER -->
    <div class="content-wrapper">
            @include('navbarAdmin')
           <div class="content">
               <section class="page-content container-fluid">
                <div class="container mt-5">
                    <h2>Edit Data Alternatif</h2>
                    <div class="create-container">
                        <form action="{{ route('updateAlternatif', ['id' => $alternatif->id]) }}" method="post">
                            @csrf
                            @method('PUT')

                            <div class="row mb-3 form-group">
                                <label for="nama" class="col-sm-2 col-form-label">Nama</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="nama" name="nama" value="{{ $alternatif->nama }}" required>
                                </div>
                            </div>
                            <div class="row mb-3 form-group">
                                <label for="layar" class="col-sm-2 col-form-label">Layar</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="layar" name="layar" value="{{ $alternatif->layar }}" required>
                                </div>
                            </div>
                            <div class="row mb-3 form-group">
                                <label for="prosesor" class="col-sm-2 col-form-label">Prosesor</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="prosesor" name="prosesor" value="{{ $alternatif->prosesor }}" required>
                                </div>
                            </div>
                            <div class="row mb-3 form-group">
                                <label for="RAM" class="col-sm-2 col-form-label">RAM</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="RAM" name="RAM" value="{{ $alternatif->RAM }}" required>
                                </div>
                            </div>
                            <div class="row mb-3 form-group">
                                <label for="penyimpanan" class="col-sm-2 col-form-label">Penyimpanan</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="penyimpanan" name="penyimpanan" value="{{ $alternatif->penyimpanan }}" required>
                                </div>
                            </div>
                            <div class="row mb-3 form-group">
                                <label for="baterai" class="col-sm-2 col-form-label">Baterai</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="baterai" name="baterai" value="{{ $alternatif->baterai }}" required>
                                </div>
                            </div>
                            <div class="row mb-3 form-group">
                                <label for="harga" class="col-sm-2 col-form-label">Harga (Juta)</label>
                                <div class="col-sm-10">
                                    <input type="number" class="form-control" id="harga" name="harga" value="{{ $alternatif->harga }}" required>
                                </div>
                            </div>
                        
                            <button type="submit" class="btn btn-primary">Update</button>

                        </form>
                    </div><br/>
                    
                </div>
               </section>
           </div>

   </div>
@include('footer')
