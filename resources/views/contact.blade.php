@include('head')

  
<body class="compact-menu">
   <!-- START APP WRAPPER -->
    <div class="content-wrapper">
            @include('navbar')
           <div class="content">
               <section class="page-content container-fluid">
                {{-- content contact --}}
                <div class="row hero-contact d-flex justify-content-center">
                    <div class="card section-contact ">
                        <img src="assets/img/contact1.jpg" alt="logo contact">
                        <div class="card-body">
                            <h4 class="card-title text-center">Contact</h4><br/>
                            <div class="row mb-3">
                                <label for="inputEmail3" class="col-sm-4 col-form-label">Email</label>
                                <div class="col-sm-8">
                                <input type="email" class="form-control" id="inputEmail3" value="fentiagil@gmail.com" readonly>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="inputEmail3" class="col-sm-4 col-form-label">Address</label>
                                <div class="col-sm-8">
                                <input type="email" class="form-control" id="inputEmail3" value="UPN Veteran Jawa Timur" readonly>
                                </div>
                            </div>
                        </div>
                      </div>
                </div>
               </section>
           </div>

   </div>
@include('footer')
