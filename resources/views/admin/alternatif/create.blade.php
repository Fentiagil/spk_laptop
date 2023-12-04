@include('head')
<body class="compact-menu">
   <!-- START APP WRAPPER -->
    <div class="content-wrapper">
            @include('navbarAdmin')
           <div class="content">
               <section class="page-content container-fluid">
                <div class="container mt-5">
                    <h2>Tambah Data Alternatif</h2>
                    <form action="{{ route('storeAlternatif') }}" method="post">
                        @csrf
            
                        <div class="form-group">
                            <label for="nama">Nama</label>
                            <input type="text" class="form-control" id="nama" name="nama" required>
                        </div><br/>
            
                        <button type="submit" class="btn btn-primary">Simpan Data</button>
                    </form>
                </div>
               </section>
           </div>

   </div>
@include('footer')
