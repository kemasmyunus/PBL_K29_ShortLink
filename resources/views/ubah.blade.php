@extends('layouts.app')
@section('content')

    <head>
        <!-- *** LINK *** -->
        <link href="https://fonts.googleapis.com/css?family=Poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i&display=swap" rel="stylesheet">
            
        <!-- Additional CSS Files -->
        <link rel="stylesheet" type="text/css" href="tamplate/training-studio-1.0.0/assets/css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="tamplate/training-studio-1.0.0/assets/css/font-awesome.css">
        <link rel="stylesheet" href="tamplate/training-studio-1.0.0/assets/css/templatemo-training-studio.css">

        <title>Handapi | Edit Tautan</title>

    <!-- *** END LINK *** -->
    
</head> 


<!-- CONTENT -->
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-18">
            <style>
                .kotak{
                    margin: 5rem auto;
                    width: 50%;
                    padding: 10px;  
                }

                .bg {
                    /* Full height */                              
                    /* Center and scale the image nicely */
                    background-size: cover;
                    widows: 300px;
                  }
                  .card{
                    margin: 13px;
                    padding: 30px
                  }
            </style>
            <div class="bg">
                <div class="kotak">                     
                    <div class="card">
                        <!-- Form -->
                        <div class="card-body">
                            <div class="mb-2">

                                <h5>Ubah Tautan</h5>
                            </div>
                            <form method="post" action="{{ route('user.update', ['id'=>$tautan->id]) }}">
                            @csrf
                            @method('PUT')
                            <!-- form data yang disembunyikan -->
                            <div class="input-group">
                                <input type="hidden" name="user_id" class="form-control" value="{{ Auth::user()->id }}">
                            </div>
                            <div class="input-group">
                                <input type="hidden" name="user_username" class="form-control" value="{{ Auth::user()->username }}">
                            </div>

                            <!-- form data yang ditampilkan -->
         

                            <div class="input-group mb-3">
                                <p>Masukkan Tautan</p>
                                <div class="input-group">
                                    <input type="text" name="link" class="form-control" placeholder="Masukkan Tautan" value="{{ $tautan->link }}">
                                </div>
                                @error('link') <p class="m-0 p-0 text text-danger"> {{ $message }}</p>@enderror
                            </div>
                            
                            <div class="input-group mb-3">
                                <p>Masukkan Tautan</p>
                                <div class="input-group">
                                    <input type="text" name="code" class="form-control" placeholder="Masukkan Tautan Kustom (Opsional)" value="{{ $tautan->code }}">
                                </div>
                                @error('code') <p class="m-0 p-0 text text-danger"> {{ $message }}</p>@enderror
                            </div>
                            <div class="input-group mb-3">
                                <p>Masukkan Tautan</p>
                                <div class="input-group">
                                    <input type="text" name="judul" class="form-control" placeholder="Masukkan Judul Tautan (Opsional)" value="{{ $tautan->judul }}">
                                </div>
                            </div>
                            <div class="input-group mb-3">
                                <div class="input-group-addon">
                                    <button class="btn btn-success">Simpan</button>
                                </div>
                            </div>
                            
                            </form>
                            <div class="input-group-addon">
                                <a href="/home">
                                    <button class="btn btn-danger">Batal</button>
                                </a>
                            </div>
                        </div>
                        
                        <!-- End Form -->
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
                                    <img src="tamplate/training-studio-1.0.0/assets/images/icon-line.png" alt="waves">
                                    <p>ini adalah halaman bantuan, jika anda kesulitan dalam menggunakan fitur di website ini, anda dapat mengikuti langkah-langkah dibawah.</p>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <ul class="features-items">
                                    <li class="feature-item">
                                        <div class="left-icon">
                                            <img src="tamplate/training-studio-1.0.0/assets/images/icon-person.png" alt="First One">
                                        </div>
                                        <div class="right-content">
                                            <h4>1. Buat Akun</h4>
                                            <p>Untuk memulai, anda harus memiliki akun terlebih dahulu. Anda dapat membuat akun dengan cara menekan tombol Daftar pada <a href="#top" class="scroll-to-section active">Halaman Utama</a>. setelah memiliki akun, anda dapat masuk menggunakan akun tersebut dan menggunakan fitur yang kami sediakan.</p>
                                        </div>
                                    </li>
                                    <li class="feature-item">
                                        <div class="left-icon">
                                            <img src="tamplate/training-studio-1.0.0/assets/images/icon-link.png" alt="second one">
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
                                            <img src="tamplate/training-studio-1.0.0/assets/images/icon-share.png" alt="fourth muscle">
                                        </div>
                                        <div class="right-content">
                                            <h4>3. Bagikan</h4>
                                            <p>Anda dapat membagikan tautan yang sudah dipendekkan dengan cara yang sangat mudah. anda hanya perlu menekan tombol salin yang ada disebelah kanan tabel. setelahnya tautan akan tersalin ke clipboard anda secara otomatis.</p>
                                        </div>
                                    </li>
                                    <li class="feature-item">
                                        <div class="left-icon">
                                            <img src="tamplate/training-studio-1.0.0/assets/images/icon-friend.png" alt="training fifth">
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
                        <p>Copyright &copy; 2023 Handapi
                        
                        - Designed by Kelompok 29<br>

                    Project PBL di <a rel="" href="https://poliban.ac.id/" class="tm-text-link" target="_blank">Politeknin Negeri Banjarmaisn</a>
                    
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
            <script src="tamplate/training-studio-1.0.0/assets/js/jquery-2.1.0.min.js"></script>
            
            <!-- Bootstrap -->
            <script src="tamplate/training-studio-1.0.0/assets/js/popper.js"></script>
            <script src="tamplate/training-studio-1.0.0/assets/js/bootstrap.min.js"></script>
            
            <!-- Plugins -->
            <script src="tamplate/training-studio-1.0.0/assets/js/waypoints.min.js"></script>
            <script src="tamplate/training-studio-1.0.0/assets/js/scrollreveal.min.js"></script>
            <script src="tamplate/training-studio-1.0.0/assets/js/jquery.counterup.min.js"></script>
            <script src="tamplate/training-studio-1.0.0/assets/js/imgfix.min.js"></script> 
            <script src="tamplate/training-studio-1.0.0/assets/js/mixitup.js"></script> 
            <script src="tamplate/training-studio-1.0.0/assets/js/accordions.js"></script>
            
            <!-- Global Init -->
            <script src="tamplate/training-studio-1.0.0/assets/js/custom.js"></script>
        <!-- *** END SCRIPT *** -->
        
@endsection
