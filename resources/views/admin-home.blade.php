@extends('layouts.app')
@section('content')

    <head>
        <!-- *** LINK *** -->
        <link href="https://fonts.googleapis.com/css?family=Poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i&display=swap" rel="stylesheet">
            
        <!-- Additional CSS Files -->
        <link rel="stylesheet" type="text/css" href="tamplate/training-studio-1.0.0/assets/css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="tamplate/training-studio-1.0.0/assets/css/font-awesome.css">
        <link rel="stylesheet" href="tamplate/training-studio-1.0.0/assets/css/templatemo-training-studio.css">

        <title>Handapi | Admin | Home</title>

    <!-- *** END LINK *** -->
    
</head> 



<!-- CONTENT -->


<section class="section" id="schedule">
    <div class="container">
        <div class="row">

            <div class="card">
                <h2>Selamat datang di halaman <em>admin</em></h2>
                @if(session('success'))
                <div class="alert alert-success">{{ session ('success') }}</div>
                @endif
            </div>
        </div>

    </div>
    <div class="container">
        <div class="row">
            <div class="col-lg-6 offset-lg-3">
                <div class="section-heading dark-bg">
                    <h2>Tabel <em>Tautan Pendek</em></h2>
                    <img src="assets/images/line-dec.png" alt="">
                </div>
            </div>
        </div>
        <div class="row">
                <!-- tabel shortlink -->
                    <?php
                    use App\Models\Shortlink;
                    $links = ShortLink::latest()->get();?>
                    <table>
                        <thead>
                            <style>
                                tr{
                                    color: white;
                                }
                            </style>
                            <tr>
                                <th>Id</th>
                                <th>Username</th>
                                <th>Judul</th>
                                <th>Short Link</th>
                                <th>Link</th>
                                <th></th>
                            </tr>

                        </thead>
                        <tbody>


                            @php
                            $dataFound = false;
                        @endphp
                        
                        @foreach ($links as $row)
                                @php
                                    $dataFound = true;
                                @endphp
                                <tr>
                                    <td>{{ $row->user_id }}</td>
                                    <td>{{ $row->user_username }}</td>
                                    <td>{{ $row->judul }}</td>
                                    <td class="kode"><a href="{{ route('shorten.link', $row->code) }}" target="_blank">{{ route('shorten.link', $row->code) }}</a></td>
                                    <td>{{ $row->link }}</td>
                                    <td>
                                        <button class="btn btn-primary copy-button" onclick="copyLink('{{ route('shorten.link', $row->code) }}')">Salin</button>                              
                                        <a href="#">
                                            <button class="btn btn-danger" onclick="hapus({{ $row->id }}, '{{ $row->judul }}')">hapus</button>
                                          </a>
                                          

                                          

                                    </td>
                                </tr>
                        @endforeach
                        
                        @if (!$dataFound)
                            <tr>
                                <td colspan="4">
                                    data kosong
                                </td>
                            </tr>
                        @endif
                        

                        </tbody>
                    </table>





                        <div class="row">
                            <div class="col-lg-6 offset-lg-3">
                                <div class="section-heading dark-bg">
                                    <h2>Tabel <em>Pengguna</em></h2>
                                    <img src="assets/images/line-dec.png" alt="">
                                </div>
                            </div>
                        </div>
                <!-- tabel user -->
                    <?php
                    use App\Models\User;
                    $users = User::latest()->get();?>

                        <table>
                            <thead>
                                <tr>
                                    <th>User Id</th>
                                    <th>Username</th>
                                    <th>Full name</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $row)
                                <tr>
                                    <td>{{ $row->id }}</td>
                                    <td>{{ $row->username }}</td>
                                    <td>{{ $row->fullname }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                </div>
        </div>
    </div>
</section>













<!-- END CONTENT -->





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
            <script src="tamplate/training-studio-1.0.0//js/bootstrap.min.js"></script>
            
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
        <!-- Button Salin -->
        <script>
            function copyLink(link) {
                var dummy = document.createElement("textarea");
                document.body.appendChild(dummy);
                dummy.value = link;
                dummy.select();
                document.execCommand("copy");
                document.body.removeChild(dummy);
                alert("Link berhasil disalin!");
            }
        </script>
                                       <script>
                                        function hapus(id, judul) {
                                        var urlhapus = "/admindelete"+id;
                                        var urlbalik = "#top";
                                          var konfirmasi = confirm("Apakah Anda yakin ingin menghapus data "+judul+"?");
                                      
                                          if (konfirmasi) {
                                            window.location.href = urlhapus;
                                        } else {
                                            window.location.href = urlbalik;
                                          }
                                        }
                                      </script>
@endsection
