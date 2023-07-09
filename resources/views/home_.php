<!DOCTYPE html>
<html lang="en">
  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">


    
    <title>Training Studio - Free CSS Template</title>
    
        <!-- *** LINK *** -->
            <link href="https://fonts.googleapis.com/css?family=Poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i&display=swap" rel="stylesheet">
            
            <!-- Additional CSS Files -->
            <link rel="stylesheet" type="text/css" href="tamplate/training-studio-1.0.0/assets/css/bootstrap.min.css">
            <link rel="stylesheet" type="text/css" href="tamplate/training-studio-1.0.0/assets/css/font-awesome.css">
            <link rel="stylesheet" href="tamplate/training-studio-1.0.0/assets/css/templatemo-training-studio.css">


        <!-- *** END LINK *** -->
        
    </head> 
    <body>
    
        <!-- *** HEADER / NAVBAR *** -->
        <!-- DIGUNAKAN UNTUK MENU NAVIGASI -->
            <!-- ***** Header Area Start ***** -->
            <header class="header-area header-sticky">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <nav class="main-nav">
                                <!-- ***** Logo Start ***** -->
                                
                                <a href="index.html" class="logo"><img src="./img/handapilogo.png" height="60" alt="" ></a>
                                <!-- ***** Logo End ***** -->
                                <!-- ***** Menu Start ***** -->
                                <ul class="nav">
                                    <li class="scroll-to-section"><a href="/" class="active">Halaman Utama</a></li>
                                    <li class="scroll-to-section"><a href="#features">Bantuan</a></li>
                                    <li class="main-button"><a href="{{ route('login') }}">Login</a></li>
                                </ul>        
                                <a class='menu-trigger'>
                                    <span>Menu</span>
                                </a>
                                <!-- ***** Menu End ***** -->
                            </nav>
                        </div>
                    </div>
                </div>
            </header>
            <!-- ***** Header Area End ***** -->
        <!-- *** END HEADER / END NAVBAR *** -->








        <!-- HALAMAN LOGIN PAGE -->

        <div class="section-heading">
        </div>
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
                                            <form method="post" action="{{ route('generate.shorten.link.post') }}">
                                            @csrf
                                            <!-- form data yang disembunyikan -->
                                            <div class="input-group mb-3">
                                                <input type="hidden" name="user_id" class="form-control" value="{{ Auth::user()->id }}">
                                            </div>
                                            <div class="input-group mb-3">
                                                <input type="hidden" name="user_username" class="form-control" value="{{ Auth::user()->username }}">
                                            </div>
        
                                            <!-- form data yang ditampilkan -->
                                            <div class="input-group mb-3">
                                                <input type="text" name="link" class="form-control" placeholder="Masukkan Tautan">
                                            </div>
                                            <div class="input-group mb-3">
                                                <input type="text" name="code" class="form-control" placeholder="Masukkan Tautan Kustom (Opsional)">
                                            </div>
                                            <div class="input-group mb-3">
                                                <input type="text" name="judul" class="form-control" placeholder="Masukkan Judul Tautan (Opsional)">
        
                                                <div class="input-group-addon">
                                                    <button class="btn btn-success">Generate Shorten Link</button>
                                                </div>
                                            </div>
                                            @error('link') <p class="m-0 p-0 text text-danger"> {{ $message }}</p>@enderror
                                            </form>
                                        </div>
                                    </div>
                                    <div class="card mt-5">
                                        <div class="card-header">
                                            <h1>Table Hasil Shortlink</h1>
                                        </div>
                                        <div class="card-body">
                                            <table class="table table-bordered">
                                                <thead>
                                                    <tr>
                                                        <th>Judul</th>
                                                        <th>Short Link</th>
                                                        <th>Link</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($links as $row)
                                                    <!-- jika id yang sedang aktif sama dengan user_id -->
                                                        @if (Auth::user()->id == $row->user_id)
                                                        <!-- cetak -->
                                                            <tr>
                                                                <td>{{ $row->judul }}</td>
                                                                <td><a href="{{ route('shorten.link', $row->code) }}" target="_blank">{{ route('shorten.link', $row->code) }}</a></td>
                                                                <td>{{ $row->link }}</td>
                                                                @if (empty(Auth::user()->id == $row->user_id))
                                                                
                                                                    <td colspan="4">
                                                                        data kosong
                                                                    </td>
                                                                
                                                                @endif
                                                            </tr>
                                                            @endif
        
                                                        
                                                        @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>




        <!-- END HALAMAN LOGIN PAGE -->
























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

    </body>
</html>