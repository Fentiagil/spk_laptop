@include('head')
<body class="compact-menu">
   <!-- START APP WRAPPER -->
    <div class="content-wrapper">
            @include('navbarAdmin')
           <div class="content">
               <section class="page-content container-fluid">
                <div class="container mt-5">
                    <h2>Tambah Data Alternatif</h2>
                    <div class="create-container">
                        @if(session('error'))
                        <div class="alert alert-danger d-flex justify-content-between">
                            <div>{{ session('error') }}</div>
                            
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        @endif
                    <form action="{{ route('storeAlternatif') }}" method="post"> 
                        @csrf
                        <div class="row mb-3 form-group">
                            <label for="nama" class="col-sm-2 col-form-label">Nama</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="nama" name="nama" placeholder="ASUS ZenBook UX425EA" required>
                            </div>
                        </div>
                        <div class="row mb-3 form-group">
                            <label for="layar" class="col-sm-2 col-form-label">Layar</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="layar" name="layar" placeholder="14 inci" required>
                            </div>
                        </div>
                        <div class="row mb-3 form-group">
                            <label for="prosesor" class="col-sm-2 col-form-label">Prosesor</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="prosesor" name="prosesor" placeholder="Intel Core i5-1135G7" required>
                            </div>
                        </div>
                        <div class="row mb-3 form-group">
                            <label for="RAM" class="col-sm-2 col-form-label">RAM</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="RAM" name="RAM" placeholder="8GB DDR4" required>
                            </div>
                        </div>
                        <div class="row mb-3 form-group">
                            <label for="penyimpanan" class="col-sm-2 col-form-label">Penyimpanan</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="penyimpanan" name="penyimpanan" placeholder="512GB SSD" required>
                            </div>
                        </div>
                        <div class="row mb-3 form-group">
                            <label for="baterai" class="col-sm-2 col-form-label">Baterai</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="baterai" name="baterai" placeholder="64 Wh" required>
                            </div>
                        </div>
                        <div class="row mb-3 form-group">
                            <label for="harga" class="col-sm-2 col-form-label">Harga (Juta)</label>
                            <div class="col-sm-10">
                                <input type="number" class="form-control" id="harga" name="harga" placeholder="8" required>
                            </div>
                        </div>
                    
                        <button type="submit" class="btn btn-primary">Simpan Data</button>
                    </form>
                    </div><br/>
                </div>
               </section>
           </div>

   </div>
@include('footer')
