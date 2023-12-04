@include('head')
<body class="compact-menu">
   <!-- START APP WRAPPER -->
    <div class="content-wrapper">
            @include('navbarAdmin')
           <div class="content">
               <section class="page-content container-fluid">
                <div class="container mt-5">
                    <h2>Edit Data Alternatif</h2>
                    <form action="{{ route('updateAlternatif', ['id' => $alternatif->id]) }}" method="post">
                        @csrf
                        @method('PUT')
            
                        <div class="form-group">
                            <label for="nama">Nama</label>
                            <input type="text" class="form-control" id="nama" name="nama" value="{{ $alternatif->nama }}" required>
                        </div><br/>
            
                        <button type="submit" class="btn btn-primary">Update</button>
                    </form>
                </div>
               </section>
           </div>

   </div>
@include('footer')
