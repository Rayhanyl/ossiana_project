<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="apple-touch-icon" sizes="76x76" href="{{ asset ('assets/img/apple-icon.png') }}">
  <link rel="icon" type="image/png" href="{{ asset ('assets/img/favicon.png') }}">
  <title>
    PT Ossiana Sakti Ekamaju
  </title>
  <!--     Fonts and icons     -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
  <!-- Nucleo Icons -->
  <link href="{{ asset ('assets/css/nucleo-icons.css') }}" rel="stylesheet" />
  <link href="{{ asset ('assets/css/nucleo-svg.css') }}" rel="stylesheet" />
  <!-- Font Awesome Icons -->
  <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
  <link href="{{ asset ('assets/css/nucleo-svg.css') }}" rel="stylesheet" />
  <!-- CSS Files -->
  <link href="{{ asset ('assets/css/soft-ui-dashboard.css?v=1.0.7') }}" rel="stylesheet" />
  <!-- Nepcha Analytics (nepcha.com) -->
  <!-- Nepcha is a easy-to-use web analytics. No cookies and fully compliant with GDPR, CCPA and PECR. -->
  <script defer data-site="http://127.0.0.1:8000/" src="https://api.nepcha.com/js/nepcha-analytics.js"></script>
</head>
<body class="">
    <div class="container position-sticky z-index-sticky top-0">
      <div class="row">
        <div class="col-12">
          <!-- Navbar -->
          <nav class="navbar navbar-expand-lg blur blur-rounded top-0 z-index-3 shadow position-absolute my-3 py-2 start-0 end-0 mx-4">
            <div class="container-fluid pe-0">
              <a class="navbar-brand font-weight-bolder ms-lg-0 ms-3 " href="{{ route ('landing.page') }}">
                Ossiana Tire
              </a>
              <button class="navbar-toggler shadow-none ms-2" type="button" data-bs-toggle="collapse" data-bs-target="#navigation" aria-controls="navigation" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon mt-2">
                  <span class="navbar-toggler-bar bar1"></span>
                  <span class="navbar-toggler-bar bar2"></span>
                  <span class="navbar-toggler-bar bar3"></span>
                </span>
              </button>
              <div class="collapse navbar-collapse" id="navigation">
                <ul class="navbar-nav mx-auto ms-xl-auto me-xl-7">
                    <li class="nav-item">
                        <a class="nav-link d-flex align-items-center me-2 active" aria-current="page" href="{{ route ('landing.page') }}">
                            <i class="fa fa-home   opacity-6 text-dark me-1"></i>
                            Home
                        </a>
                        </li>
                        <li class="nav-item">
                        <a class="nav-link me-2" href="{{ route ('register.page') }}">
                            <i class="fas fa-user-circle opacity-6 text-dark me-1"></i>
                            Sign Up
                        </a>
                        </li>
                        <li class="nav-item">
                        <a class="nav-link me-2" href="{{ route ('login.page') }}">
                            <i class="fas fa-key opacity-6 text-dark me-1"></i>
                            Sign In
                        </a>
                    </li>
                </ul>
              </div>
            </div>
          </nav>
          <!-- End Navbar -->
        </div>
      </div>
    </div>
    <main class="main-content  mt-0">
      <section>
        <div class="page-header min-vh-75">
          <div class="container">
            <div class="row">
              <div class="col-xl-6 col-lg-6 col-md-6 d-flex flex-column mx-auto">
                <div class="card card-plain mt-8">
                  <div class="card-header pb-0 text-left bg-transparent">
                    <h3 class="font-weight-bolder text-info text-gradient">Ossiana Sakti Ekamaju</h3>
                    <p class="mb-0">Dapat Memberikan Kepuasan dan Nilai Lebih Untuk Pelanggan</p>
                  </div>
                  <div class="card-body">
                    <div class="">
                        <p>PT.Ossiana Sakti Ekamaju merupakan website yang menyediakan jasa reparasi ban berukuran 45/65 - 45 inch dan 27.00 - 49 inch dengan kualitas terbaik.</p>
                      <button type="button" class="btn bg-gradient-info w-50 mt-4 mb-0">Get started</button>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-md-6">
                <div class="oblique position-absolute top-0 h-100 d-md-block d-none me-n8">
                  <div class="oblique-image bg-cover position-absolute fixed-top ms-auto h-100 z-index-0 ms-n6" style="background-image:url('../assets/img/curved-images/ekamaju.jpg')"></div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
      <section>
        <div class="page-header min-vh-55">
            <div class="container">
                <div class="row">
                    <div class="col-12 col-lg-4 my-auto">
                        <h1>About Us</h1>
                    </div>
                    <div class="col-12 col-lg-8">
                        <p style="text-align: justify;line-height:30px;">
                            <span class="text-info fw-bold">PT. Ossiana Sakti Ekamaju</span> merupakan perusahaan yang bergerak dibidang jasa reparasi
                            ban, didirikan pada tahun 1981 dan diberi lisensi oleh Vacu-lug Traction Tyres Ltd, England. Hasil reparasi pertama diluncurkan dalam tahun 1984. Perusahaan kami menjual jasa pelayanan mereparasi ban – ban “off the road“ dengan ukuran 45/65 - 45 inch untuk ban loader dan ban berukuran 27.00 – 49 untuk ban dump truck.                            Berpengalaman lebih dari 30 tahun merenovasi dan
                            menambal ban "off the road" hingga ukuran 45/65 - 45 untuk loader dan ukuran ban
                            27.00 - 49 untuk ban dump truck dengan berbagai macam jenis kecacatan seperti crack
                            buster yaitu merupakan cacat keretakan dibagian punggung ban, dirty mould yaitu
                            merupakan cacat ban disebabkan terdapat kotoran yang menempel atau menggumpal
                            pada ban, dan banyak jenis cacat lainnya.
                        </p>
                    </div>
                </div>
            </div>
        </div>
      </section>
      <section>
        <div class="min-vh-50">
            <div class="container">
                <div class="row">
                    <div class="col-12 text-center">
                        <h3> Tire Repair Warranty </h1>
                    </div>
                    <div>
                        <p class="text-center">Semua ban yang direparasi oleh PT. Ossiana Sakti Ekamaju dijamin bebas dari cacat material dan pengerjaannya.</p>
                        <p>Jaminan ini tidak mencakup kerusakan karena pemakaian yang tidak sesuai seperti dipakai dalam keadaan kempes, meledak melebihi kapasitas angkut, kerusakan lapisan benang (wire steel) dan robek karena benda tajam, jaminan berlaku hingga <span class="text-primary fw-bold">500 jam</span> dalam pemakaian normal.</p>
                        <p>Dalam hal ada kegagalan yang diakibatkan oleh material dan pengerjaan, PT. Ossiana Sakti Ekamaju, melakukan penggantian dengan memperhitungkan masa pemakaian ban tersebut. Contoh :</p>
                        <p>
                            <ol>
                                <li>Jaminan = 500 Jam</li>
                                <li>Umur Pemakaian Actual = 300 Jam</li>
                                <li>Sekurangan yang harus dikembalikan = 200 Jam.</li>
                            </ol>
                        </p>
                    </div>
                </div>
            </div>
        </div>
      </section>
      <section>
        <div class="min-vh-50">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <h2>Contact Us</h3>
                    </div>
                    <div class="col-12 col-lg-6">
                        <p class="fw-bold">Get in touch:</p>
                        <p>
                            <small><i class="bi bi-geo-alt"></i> 6th. Floor Gedung Manggala Wana Bhakti Blok IV, Wing Room 602 Jl. Gatot Subroto, Senayan Jakarta Indonesia,</small>
                        </p>
                        <p>
                            <small><i class="bi bi-envelope"></i> aose-p@indo.net.id</small>
                        </p>
                        <p>
                            <small><i class="bi bi-telephone"></i> (021) 5710487, 5736837, 7228346, 2778347</small>
                        </p>
                    </div>
                    <div class="col-12 col-lg-6">
                        <p class="fw-bold">Fabrication</p>
                        <p>
                            <small><i class="bi bi-geo-alt"></i> Jl. Mulawarman Km. 16.5 Manggar – Balikpapan Kaltim
                                Kode Pos : 76110, Kaltim – Indonesia</small>
                        </p>
                        <p>
                            <i class="bi bi-envelope"></i> aose-b@indo.net.id
                        </p>
                        <p>
                            <small><i class="bi bi-telephone"></i> (0542) 764119, 7641114, 7641115,762021</small>
                        </p>
                    </div>
                </div>
            </div>
        </div>
      </section>
    </main>
    <footer class="footer py-5">
        <div class="container">
          <div class="row">
            <div class="col-lg-8 mb-4 mx-auto text-center">
              <a href="javascript:;" target="_blank" class="text-secondary me-xl-5 me-3 mb-sm-0 mb-2">
                Company
              </a>
              <a href="javascript:;" target="_blank" class="text-secondary me-xl-5 me-3 mb-sm-0 mb-2">
                About Us
              </a>
              <a href="javascript:;" target="_blank" class="text-secondary me-xl-5 me-3 mb-sm-0 mb-2">
                Contact Us
              </a>
              <a href="javascript:;" target="_blank" class="text-secondary me-xl-5 me-3 mb-sm-0 mb-2">
                Sign In
              </a>
              <a href="javascript:;" target="_blank" class="text-secondary me-xl-5 me-3 mb-sm-0 mb-2">
                Sign Up
              </a>
              <a href="javascript:;" target="_blank" class="text-secondary me-xl-5 me-3 mb-sm-0 mb-2">
                Started
              </a>
            </div>
            <div class="col-lg-8 mx-auto text-center mb-4 mt-2">
              <a href="javascript:;" target="_blank" class="text-secondary me-xl-4 me-4">
                <span class="text-lg fab fa-dribbble"></span>
              </a>
              <a href="javascript:;" target="_blank" class="text-secondary me-xl-4 me-4">
                <span class="text-lg fab fa-twitter"></span>
              </a>
              <a href="javascript:;" target="_blank" class="text-secondary me-xl-4 me-4">
                <span class="text-lg fab fa-instagram"></span>
              </a>
              <a href="javascript:;" target="_blank" class="text-secondary me-xl-4 me-4">
                <span class="text-lg fab fa-pinterest"></span>
              </a>
              <a href="javascript:;" target="_blank" class="text-secondary me-xl-4 me-4">
                <span class="text-lg fab fa-github"></span>
              </a>
            </div>
          </div>
          <div class="row">
            <div class="col-8 mx-auto text-center mt-1">
              <p class="mb-0 text-secondary">
                Copyright © <script>
                  document.write(new Date().getFullYear())
                </script> Ossiana Tire.
              </p>
            </div>
          </div>
        </div>
      </footer>
      <script src="{{ asset ('assets/js/core/popper.min.js') }}"></script>
      <script src="{{ asset ('assets/js/core/bootstrap.min.js') }}"></script>
      <script src="{{ asset ('assets/js/plugins/perfect-scrollbar.min.js') }}"></script>
      <script src="{{ asset ('assets/js/plugins/smooth-scrollbar.min.js') }}"></script>
      @include('sweetalert::alert')
      <script>
        var win = navigator.platform.indexOf('Win') > -1;
        if (win && document.querySelector('#sidenav-scrollbar')) {
          var options = {
            damping: '0.5'
          }
          Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
        }
      <script async defer src="https://buttons.github.io/buttons.js"></script>
      <script src="{{ asset ('assets/js/soft-ui-dashboard.min.js?v=1.0.7') }}"></script>
    //   <script></script>
    </body>
    </html>

  