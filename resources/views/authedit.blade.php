
    <head>
        <!-- *** LINK *** -->
        <link href="https://fonts.googleapis.com/css?family=Poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i&display=swap" rel="stylesheet">
            
        <!-- Additional CSS Files -->
        <link rel="stylesheet" type="text/css" href="admin/tamplate/training-studio-1.0.0/assets/css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="admin/tamplate/training-studio-1.0.0/assets/css/font-awesome.css">
        <link rel="stylesheet" href="admin/tamplate/training-studio-1.0.0/assets/css/templatemo-training-studio.css">


    <!-- *** END LINK *** -->
    
</head> 


<!-- CONTENT -->
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-18">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>
                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        @if (session('error'))
                            <div class="alert alert-danger" role="alert">
                                {{ session('error') }}
                            </div>
                        @endif
                        
                        <h2>Wellcome to the User Dashboard</h2>

                        {{ __('You are logged in!') }}
                        <div class="container mt-5">
                            @if(session('success'))
                            <div class="alert alert-success">{{ session ('success') }}</div>
                            @endif
                            <div class="card">
                                <div class="card-header">
                                    <h1>Form Pemendek Tautan</h1>
                                </div>
                                <div class="card-body">
                                    <form method="post" action="{{ route('authupdate') }}">
                                    @csrf
                                    @method('PUT')
                                    <div class="input-group mb-3">
                                        <div class="input-group">
                                            <input type="text" name="username" class="form-control" placeholder="Masukkan Username" >
                                        </div>
                                    </div>
                                    
                                    <div class="input-group mb-3">
                                        <div class="input-group">
                                            <input type="text" name="fullname" class="form-control" placeholder="Masukkan Fullname">
                                        </div>
                                    </div>

                                    <div class="input-group mb-3">
                                        <div class="input-group">
                                            <input type="password" name="password" class="form-control" placeholder="Masukkan Password">
                                        </div>
                                    </div>
                               
                                    <div class="input-group mb-3">
                                        <div class="input-group-addon">
                                            <button class="btn btn-success">Simpan</button>
                                        </div>
                                    </div>
                                    
                                    @error('link') <p class="m-0 p-0 text text-danger"> {{ $message }}</p>@enderror
                                </form>
                                <div class="input-group-addon">
                                    <a href="/home">
                                        <button class="btn btn-danger">Batal</button>
                                    </a>
                                </div>
                                </div>
                            </div>




                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>






                <!-- ***** Features Item Start ***** -->
                <section class="section container" id="features">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-6 offset-lg-3">

                                <div class="section-heading">
                                    <h2>Halaman <em>Bantuan</em></h2>
                                    <img src="admin/tamplate/training-studio-1.0.0/assets/images/icon-line.png" alt="waves">
                                    <p>ini adalah halaman bantuan, jika anda kesulitan dalam menggunakan fitur di website ini, anda dapat mengikuti langkah-langkah dibawah.</p>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <ul class="features-items">
                                    <li class="feature-item">
                                        <div class="left-icon">
                                            <img src="admin/tamplate/training-studio-1.0.0/assets/images/icon-person.png" alt="First One">
                                        </div>
                                        <div class="right-content">
                                            <h4>1. Buat Akun</h4>
                                            <p>Untuk memulai, anda harus memiliki akun terlebih dahulu. Anda dapat membuat akun dengan cara menekan tombol Daftar pada <a href="#top" class="scroll-to-section active">Halaman Utama</a>. setelah memiliki akun, anda dapat masuk menggunakan akun tersebut dan menggunakan fitur yang kami sediakan.</p>
                                        </div>
                                    </li>
                                    <li class="feature-item">
                                        <div class="left-icon">
                                            <img src="admin/tamplate/training-studio-1.0.0/assets/images/icon-link.png" alt="second one">
                                        </div>
                                        <div class="right-content">
                                            <h4>2. Ringkas Tautan Anda</h4>
                                            <p>Anda dapat meringkas Tautan yang anda miliki, menjadi tautan yang lebih pendek. selain itu tautan anda juga bisa dinamakan sesuai keinginan anda. Anda cukup memasukkan judul, nama yang akan anda masukkan untuk tautan baru, dan tauran asli yang anda miliki pada form yang sudah kami sediakan.</p>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                            <div class="col-lg-6">
                                <ul class="features-items">
                                    <li class="feature-item">
                                        <div class="left-icon">
                                            <img src="admin/tamplate/training-studio-1.0.0/assets/images/icon-share.png" alt="fourth muscle">
                                        </div>
                                        <div class="right-content">
                                            <h4>3. Bagikan</h4>
                                            <p>Anda dapat membagikan tautan yang sudah dipendekkan dengan cara yang sangat mudah. anda hanya perlu menekan tombol salin yang ada disebelah kanan tabel. setelahnya tautan akan tersalin ke clipboard anda secara otomatis.</p>
                                        </div>
                                    </li>
                                    <li class="feature-item">
                                        <div class="left-icon">
                                            <img src="admin/tamplate/training-studio-1.0.0/assets/images/icon-friend.png" alt="training fifth">
                                        </div>
                                        <div class="right-content">
                                            <h4>4. Tersebar</h4>
                                            <p>Tautan anda dapat disebarluaskan dengan mengirimkan tautan tersebut pada siapa saja dan kemana saja.</p>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </section>
                <!-- ***** Features Item End ***** -->
        
        <!-- ***** Footer Start ***** -->
        <footer>
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <p>Copyright &copy; 2020 Training Studio
                        
                        - Designed by <a rel="nofollow" href="https://templatemo.com" class="tm-text-link" target="_parent">TemplateMo</a><br>

                    Distributed by <a rel="nofollow" href="https://themewagon.com" class="tm-text-link" target="_blank">ThemeWagon</a>
                    
                    </p>
                        
                        <!-- You shall support us a little via PayPal to info@templatemo.com -->
                        
                    </div>
                </div>
            </div>
        </footer>
        <!-- ***** Footer Start End***** -->


        <!-- *** SCRIPT *** -->
        <!-- SCRIPT UNTUK ANIMASI -->
            <!-- jQuery -->
            <script src="admin/tamplate/training-studio-1.0.0/assets/js/jquery-2.1.0.min.js"></script>
            
            <!-- Bootstrap -->
            <script src="admin/tamplate/training-studio-1.0.0/assets/js/popper.js"></script>
            <script src="admin/tamplate/training-studio-1.0.0/js/bootstrap.min.js"></script>
            
            <!-- Plugins -->
            <script src="admin/tamplate/training-studio-1.0.0/assets/js/waypoints.min.js"></script>
            <script src="admin/tamplate/training-studio-1.0.0/assets/js/scrollreveal.min.js"></script>
            <script src="admin/tamplate/training-studio-1.0.0/assets/js/jquery.counterup.min.js"></script>
            <script src="admin/tamplate/training-studio-1.0.0/assets/js/imgfix.min.js"></script> 
            <script src="admin/tamplate/training-studio-1.0.0/assets/js/mixitup.js"></script> 
            <script src="admin/tamplate/training-studio-1.0.0/assets/js/accordions.js"></script>
            
            <!-- Global Init -->
            <script src="admin/tamplate/training-studio-1.0.0/assets/js/custom.js"></script>
        <!-- *** END SCRIPT *** -->
