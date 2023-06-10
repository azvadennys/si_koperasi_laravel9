<!--
=========================================================
* Material Dashboard 2 - v3.0.5
=========================================================

* Product Page: https://www.creative-tim.com/product/material-dashboard
* Copyright 2023 Creative Tim (https://www.creative-tim.com)
* Licensed under MIT (https://www.creative-tim.com/license)
* Coded by Creative Tim

=========================================================

* The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.
-->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="apple-touch-icon" sizes="76x76" href="{{asset('assets')}}/img/apple-icon.png">
    <link rel="icon" type="image/png" href="{{asset('assets')}}/logo koperasi.png">
    <title>
        SI Koperasi
    </title>
    <!--     Fonts and icons     -->
    <link rel="stylesheet" type="text/css"
        href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900|Roboto+Slab:400,700" />
    <!-- Nucleo Icons -->
    <link href="{{ asset('assets') }}/css/nucleo-icons.css" rel="stylesheet" />
    <link href="{{ asset('assets') }}/css/nucleo-svg.css" rel="stylesheet" />
    <!-- Font Awesome Icons -->
    <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
    <!-- Material Icons -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Round" rel="stylesheet">
    <!-- CSS Files -->
    <link id="pagestyle" href="{{asset('assets')}}/css/material-dashboard.css?v=3.0.5" rel="stylesheet" />
    <!-- Nepcha Analytics (nepcha.com) -->
    <!-- Nepcha is a easy-to-use web analytics. No cookies and fully compliant with GDPR, CCPA and PECR. -->
    <script defer data-site="YOUR_DOMAIN_HERE" src="https://api.nepcha.com/js/nepcha-analytics.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <link href="{{asset('dist')}}/css/select2.min.css" rel="stylesheet" />
    <script src="{{asset('dist')}}/js/select2.full.min.js"></script>

    <link href="{{asset('DataTables')}}/datatables.min.css" rel="stylesheet" />

    <script src="{{asset('DataTables')}}DataTables/datatables.min.js"></script>
</head>

<body class="g-sidenav-show  bg-gray-200">
    <aside
        class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3   bg-gradient-dark"
        id="sidenav-main">
        <div class="sidenav-header">
            <i class="fas fa-times p-3 cursor-pointer text-white opacity-5 position-absolute end-0 top-0 d-none d-xl-none"
                aria-hidden="true" id="iconSidenav"></i>
            <a class="navbar-brand m-0" href=" https://demos.creative-tim.com/material-dashboard/pages/dashboard "
                target="_blank">
                <img src="{{asset('assets')}}/logo koperasi.png" class="navbar-brand-img h-100" alt="main_logo">
                <span class="ms-1 font-weight-bold text-white">SI Koperasi</span>
            </a>
        </div>
        <hr class="horizontal light mt-0 mb-2">
        <div class="collapse navbar-collapse  w-auto " id="sidenav-collapse-main">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link text-white @if($active == 'dasbor') active bg-gradient-primary @endif "
                        href="/dashboard">
                        <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="material-icons opacity-10">dashboard</i>
                        </div>
                        <span class="nav-link-text ms-1">Dashboard</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white @if($active == 'user') active bg-gradient-primary @endif"
                        href="{{ route('user.index') }}">
                        <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="material-icons opacity-10">person</i>
                        </div>
                        <span class="nav-link-text ms-1">Akun User</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white @if($active == 'anggota') active bg-gradient-primary @endif"
                        href="{{ route('anggota.index') }}">
                        <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="material-icons opacity-10">person</i>
                        </div>
                        <span class="nav-link-text ms-1">Anggota</span>
                    </a>
                </li>
                {{-- <li class="nav-item">
                    <a class="nav-link text-white @if($active == 'periode') active bg-gradient-primary @endif"
                        href="{{ route('periode.index') }}">
                        <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="material-icons opacity-10">directions_car</i>
                        </div>
                        <span class="nav-link-text ms-1">Periode</span>
                    </a>
                </li> --}}
                <li class="nav-item">
                    <a class="nav-link text-white @if($active == 'simpanan') active bg-gradient-primary @endif"
                        href="{{ route('simpanan.index') }}">
                        <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="material-icons opacity-10">supervised_user_circle</i>
                        </div>
                        <span class="nav-link-text ms-1">Simpanan</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white  @if($active == 'simpananpokok') active bg-gradient-primary @endif"
                        href="{{ route('simpananpokok.index') }}">

                        <span class="nav-link-text ms-1 ">Simpanan Pokok</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white  @if($active == 'simpananwajib') active bg-gradient-primary @endif"
                        href="{{ route('simpananwajib.index') }}">

                        <span class="nav-link-text ms-1 ">Simpanan Wajib</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white  @if($active == 'simpanankhusus') active bg-gradient-primary @endif"
                        href="{{ route('simpanankhusus.index') }}">

                        <span class="nav-link-text ms-1 ">Simpanan Khusus</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white @if($active == 'peminjaman') active bg-gradient-primary @endif"
                        href="{{ route('peminjaman.index') }}">
                        <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="material-icons opacity-10">paid</i>
                        </div>
                        <span class="nav-link-text ms-1">Pinjaman</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white @if($active == 'laporansimpanan') active bg-gradient-primary @endif"
                        href="{{ route('laporansimpanan.index') }}">
                        <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="material-icons opacity-10">note</i>
                        </div>
                        <span class="nav-link-text ms-1">Laporan Simpanan</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white @if($active == 'laporanpinjaman') active bg-gradient-primary @endif"
                        href="{{ route('laporanpinjaman.index') }}">
                        <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="material-icons opacity-10">note</i>
                        </div>
                        <span class="nav-link-text ms-1">Laporan Pinjaman</span>
                    </a>
                </li>
                {{-- <li class="nav-item">
                    <a class="nav-link text-white @if($active == 'transaksi') active bg-gradient-primary @endif"
                        href="{{ route('transaksi.index') }}">
                        <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="material-icons opacity-10">paid</i>
                        </div>
                        <span class="nav-link-text ms-1">Simpanan Anggota</span>
                    </a>
                </li> --}}
                {{-- <li class="nav-item">
                    <a class="nav-link text-white @if($active == 'report') active bg-gradient-primary @endif"
                        href="../pages/virtual-reality.html">
                        <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="material-icons opacity-10">list_alt</i>
                        </div>
                        <span class="nav-link-text ms-1">Laporan</span>
                    </a>
                </li> --}}

            </ul>
        </div>

    </aside>
    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
        <!-- Navbar -->
        <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur"
            data-scroll="true">
            <div class="container-fluid py-1 px-3">

                <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">
                    <div class="ms-md-auto pe-md-3 d-flex align-items-center">
                        {{-- <div class="input-group input-group-outline">
                            <label class="form-label">Type here...</label>
                            <input type="text" class="form-control">
                        </div> --}}
                    </div>
                    <ul class="navbar-nav  justify-content-end">
                        <li class="nav-item d-flex align-items-center">
                            <div class="dropdown">
                                <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    {{ auth()->user()->name}}
                                </button>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                    <a class="dropdown-item" href="{{ route('profile.edit') }}">Profile</a>
                                    @if(auth()->user() != TRUE)
                                    <a class="dropdown-item" href="#">Login</a>
                                    @else
                                    <form method="POST" action="{{ route('logout') }}">
                                        @csrf
                                        <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                    this.closest('form').submit();">Logout</a>
                                    </form>
                                    @endif

                                </div>
                            </div>
                        </li>


                    </ul>
                </div>
            </div>
        </nav>
        <!-- End Navbar -->
        @yield('content')
    </main>
    <div class="fixed-plugin">
        <a class="fixed-plugin-button text-dark position-fixed px-3 py-2">
            <i class="material-icons py-2">settings</i>
        </a>
        <div class="card shadow-lg">
            <div class="card-header pb-0 pt-3">
                <div class="float-start">
                    <h5 class="mt-3 mb-0">Material UI Configurator</h5>
                    <p>See our dashboard options.</p>
                </div>
                <div class="float-end mt-4">
                    <button class="btn btn-link text-dark p-0 fixed-plugin-close-button">
                        <i class="material-icons">clear</i>
                    </button>
                </div>
                <!-- End Toggle Button -->
            </div>
            <hr class="horizontal dark my-1">
            <div class="card-body pt-sm-3 pt-0">
                <!-- Sidebar Backgrounds -->
                <div>
                    <h6 class="mb-0">Sidebar Colors</h6>
                </div>
                <a href="javascript:void(0)" class="switch-trigger background-color">
                    <div class="badge-colors my-2 text-start">
                        <span class="badge filter bg-gradient-primary active" data-color="primary"
                            onclick="sidebarColor(this)"></span>
                        <span class="badge filter bg-gradient-dark" data-color="dark"
                            onclick="sidebarColor(this)"></span>
                        <span class="badge filter bg-gradient-info" data-color="info"
                            onclick="sidebarColor(this)"></span>
                        <span class="badge filter bg-gradient-success" data-color="success"
                            onclick="sidebarColor(this)"></span>
                        <span class="badge filter bg-gradient-warning" data-color="warning"
                            onclick="sidebarColor(this)"></span>
                        <span class="badge filter bg-gradient-danger" data-color="danger"
                            onclick="sidebarColor(this)"></span>
                    </div>
                </a>
                <!-- Sidenav Type -->
                <div class="mt-3">
                    <h6 class="mb-0">Sidenav Type</h6>
                    <p class="text-sm">Choose between 2 different sidenav types.</p>
                </div>
                <div class="d-flex">
                    <button class="btn bg-gradient-dark px-3 mb-2 active" data-class="bg-gradient-dark"
                        onclick="sidebarType(this)">Dark</button>
                    <button class="btn bg-gradient-dark px-3 mb-2 ms-2" data-class="bg-transparent"
                        onclick="sidebarType(this)">Transparent</button>
                    <button class="btn bg-gradient-dark px-3 mb-2 ms-2" data-class="bg-white"
                        onclick="sidebarType(this)">White</button>
                </div>
                <p class="text-sm d-xl-none d-block mt-2">You can change the sidenav type just on desktop view.</p>
                <!-- Navbar Fixed -->
                <div class="mt-3 d-flex">
                    <h6 class="mb-0">Navbar Fixed</h6>
                    <div class="form-check form-switch ps-0 ms-auto my-auto">
                        <input class="form-check-input mt-1 ms-auto" type="checkbox" id="navbarFixed"
                            onclick="navbarFixed(this)">
                    </div>
                </div>
                <hr class="horizontal dark my-3">
                <div class="mt-2 d-flex">
                    <h6 class="mb-0">Light / Dark</h6>
                    <div class="form-check form-switch ps-0 ms-auto my-auto">
                        <input class="form-check-input mt-1 ms-auto" type="checkbox" id="dark-version"
                            onclick="darkMode(this)">
                    </div>
                </div>
                <hr class="horizontal dark my-sm-4">
                <a class="btn bg-gradient-info w-100"
                    href="https://www.creative-tim.com/product/material-dashboard-pro">Free Download</a>
                <a class="btn btn-outline-dark w-100"
                    href="https://www.creative-tim.com/learning-lab/bootstrap/overview/material-dashboard">View
                    documentation</a>
                <div class="w-100 text-center">
                    <a class="github-button" href="https://github.com/creativetimofficial/material-dashboard"
                        data-icon="octicon-star" data-size="large" data-show-count="true"
                        aria-label="Star creativetimofficial/material-dashboard on GitHub">Star</a>
                    <h6 class="mt-3">Thank you for sharing!</h6>
                    <a href="https://twitter.com/intent/tweet?text=Check%20Material%20UI%20Dashboard%20made%20by%20%40CreativeTim%20%23webdesign%20%23dashboard%20%23bootstrap5&amp;url=https%3A%2F%2Fwww.creative-tim.com%2Fproduct%2Fsoft-ui-dashboard"
                        class="btn btn-dark mb-0 me-2" target="_blank">
                        <i class="fab fa-twitter me-1" aria-hidden="true"></i> Tweet
                    </a>
                    <a href="https://www.facebook.com/sharer/sharer.php?u=https://www.creative-tim.com/product/material-dashboard"
                        class="btn btn-dark mb-0 me-2" target="_blank">
                        <i class="fab fa-facebook-square me-1" aria-hidden="true"></i> Share
                    </a>
                </div>
            </div>
        </div>
    </div>

    @yield('custom_html')
    <!--   Core JS Files   -->

    <script src="{{asset('assets')}}/js/core/popper.min.js"></script>
    <script src="{{asset('assets')}}/js/core/bootstrap.min.js"></script>
    <script src="{{asset('assets')}}/js/plugins/perfect-scrollbar.min.js"></script>
    <script src="{{asset('assets')}}/js/plugins/smooth-scrollbar.min.js"></script>
    <script src="{{asset('assets')}}/js/plugins/chartjs.min.js"></script>

    <script>
        var win = navigator.platform.indexOf('Win') > -1;
    if (win && document.querySelector('#sidenav-scrollbar')) {
      var options = {
        damping: '0.5'
      }
      Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
    }
    </script>
    <!-- Github buttons -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>
    <!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
    <script src="{{asset('assets/js/material-dashboard.min.js?v=3.0.5')}}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.0/sweetalert.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous">
    </script>
    <script>
        $(document).ready( function () {
    $('#table_id').DataTable();
    $('#table_id2').DataTable();
    $('#table_id3').DataTable();
    $('#table_id4').DataTable();
} );
    </script>
    @if (session()->has('success'))
    <script>
        Swal.fire(
            'Berhasil!',
            '{{ session()->get('success') }}',
            'success'
        )
    </script>
    @endif
    @stack('custom_js')
</body>

</html>