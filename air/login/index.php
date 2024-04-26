<?php
session_start();
if (empty($_SESSION['user']) && empty($_SESSION['password'])) {
    echo "<script>window.location.replace('login.php')</script>";
}
include '../assets/func.php';
$air = new klas_air;
$koneksi = $air->koneksi();
$tipe_user = $air->tipe_user($_SESSION['username']);
$data_user = $air->data_user($_SESSION['username']);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Dashboard - SB Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
    <link href="../css/styles.css" rel="stylesheet" />
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
</head>

<body class="sb-nav-fixed">
    <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
        <!-- Navbar Brand-->
        <a class="navbar-brand ps-3" href="index.html">Start Bootstrap</a>
        <!-- Sidebar Toggle-->
        <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i
                class="fas fa-bars"></i></button>
        <!-- Navbar Search-->
        <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
            <div class="input-group">
                <input class="form-control" type="text" placeholder="Search for..." aria-label="Search for..."
                    aria-describedby="btnNavbarSearch" />
                <button class="btn btn-primary" id="btnNavbarSearch" type="button"><i
                        class="fas fa-search"></i></button>
            </div>
        </form>
        <!-- Navbar-->
        <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown"
                    aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                    <li><a class="dropdown-item" href="#!">Settings</a></li>
                    <li><a class="dropdown-item" href="#!">Activity Log</a></li>
                    <li>
                        <hr class="dropdown-divider" />
                    </li>
                    <li><a class="dropdown-item" href="logout.php">Logout</a></li>
                </ul>
            </li>
        </ul>
    </nav>
    <div id="layoutSidenav">
        <div id="layoutSidenav_nav">
            <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                <div class="sb-sidenav-menu">
                    <div class="nav">
                        <div class="sb-sidenav-menu-heading">Core</div>
                        <?php
                        if ($tipe_user == 'admin') {
                            ?>
                            <a class="nav-link" href="index.php?p=Dashboard">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Dashboard
                            </a>
                            <a class="nav-link" href="index.php?p=user">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Manajemen User
                            </a>
                            <a class="nav-link" href="index.php?p=komplain">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Lihat komplain
                            </a>
                            <a class="nav-link" href="index.php?p=pemakaian">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Lihat pemakaian
                            </a>
                            <a class="nav-link" href="index.php?p=ubah_data">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                ubah data
                            </a>
                            <?php
                        }
                        ?>
                        <?php
                        if ($tipe_user == 'petugas') {
                            ?>
                            <a class="nav-link" href="index.php?p=Input Meter">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Input Meter
                            </a>
                            <a class="nav-link" href="index.php?p=Lihat komplain">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Lihat komplain
                            </a>
                            <a class="nav-link" href="index.php?p=Lihat pemakaian">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Lihat pemakaian
                            </a>
                            <a class="nav-link" href="index.php?p=ubah data meter">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                ubah data meter
                            </a>
                            <a class="nav-link" href="index.php?p=jatuh tempo">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                jatuh tempo
                            </a>
                            <?php
                        }
                        ?>
                        <?php
                        if ($tipe_user == 'bendahara') {
                            ?>
                            <a class="nav-link" href="index.html">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Kirim Notif
                            </a>
                            <a class="nav-link" href="index.html">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Lihat komplain
                            </a>
                            <a class="nav-link" href="index.html">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Lihat pemakaian
                            </a>
                            <a class="nav-link" href="index.html">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Lihat Tagihan
                            </a>
                            <a class="nav-link" href="index.html">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Lihat Jatuh Tempo Semua warga
                            </a>
                            <?php
                        }
                        ?>
                        <?php
                        if ($tipe_user == 'warga') {
                            ?>
                            <a class="nav-link" href="index.html">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                notif meter
                            </a>
                            <a class="nav-link" href="index.html">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Lihat pemakaian
                            </a>
                            <a class="nav-link" href="index.html">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                ajukan komplain
                            </a>
                            <a class="nav-link" href="index.html">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                bayar
                            </a>
                            <?php
                        }
                        ?>
                        <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne"
                            data-bs-parent="#sidenavAccordion">
                            <nav class="sb-sidenav-menu-nested nav">
                                <a class="nav-link" href="layout-static.html">Static Navigation</a>
                                <a class="nav-link" href="layout-sidenav-light.html">Light Sidenav</a>
                            </nav>
                        </div>
                        <div class="collapse" id="collapsePages" aria-labelledby="headingTwo"
                            data-bs-parent="#sidenavAccordion">
                            <nav class="sb-sidenav-menu-nested nav accordion" id="sidenavAccordionPages">
                                <a class="nav-link collapsed" href="#" data-bs-toggle="collapse"
                                    data-bs-target="#pagesCollapseAuth" aria-expanded="false"
                                    aria-controls="pagesCollapseAuth">
                                    Authentication
                                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                                </a>
                                <div class="collapse" id="pagesCollapseAuth" aria-labelledby="headingOne"
                                    data-bs-parent="#sidenavAccordionPages">
                                    <nav class="sb-sidenav-menu-nested nav">
                                        <a class="nav-link" href="login.html">Login</a>
                                        <a class="nav-link" href="register.html">Register</a>
                                        <a class="nav-link" href="password.html">Forgot Password</a>
                                    </nav>
                                </div>
                                <a class="nav-link collapsed" href="#" data-bs-toggle="collapse"
                                    data-bs-target="#pagesCollapseError" aria-expanded="false"
                                    aria-controls="pagesCollapseError">
                                    Error
                                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                                </a>
                                <div class="collapse" id="pagesCollapseError" aria-labelledby="headingOne"
                                    data-bs-parent="#sidenavAccordionPages">
                                    <nav class="sb-sidenav-menu-nested nav">
                                        <a class="nav-link" href="401.html">401 Page</a>
                                        <a class="nav-link" href="404.html">404 Page</a>
                                        <a class="nav-link" href="500.html">500 Page</a>
                                    </nav>
                                </div>
                            </nav>
                        </div>
                    </div>
                </div>
                <div class="sb-sidenav-footer">
                    <div class="small">Logged in as:</div>
                    <?php

                    echo "$data_user[1] ($data_user[2])"
                        ?>
                    Start Bootstrap
                </div>
            </nav>
        </div>
        <div id="layoutSidenav_content">
            <main>
                <?php
                $e = explode("=", $_SERVER['REQUEST_URI']);
                if ($tipe_user == 'admin')
                    ; {
                    if (!empty($e[1])) {
                        if ($e[1] == "user") {
                            $h1 = "Manajemen user";
                            $h2 = "Menu untuk CRUD data user";
                        }
                        if ($e[1] == "komplain") {
                            $h1 = "lihat  komplain";
                            $h2 = "Menu untuk melihat data komplain ";
                        }
                        if ($e[1] == "pemakaian") {
                            $h1 = "lihat  pemakaian";
                            $h2 = "Menu untuk melihat data pemakaian ";
                        }
                        if ($e[1] == "ubah_data") {
                            $h1 = "Ubah Meter";
                            $h2 = "Menu untuk mengubah data ";
                        }
                    } else {
                        $h1 = "Dashboard";
                        $h2 = "Dashboard";
                    }
                }
                if ($tipe_user == 'petugas')
                    ; {
                    if (!empty($e[1])) {
                        if ($e[1] == "Input Meter") {
                            $h1 = "Input Meter";
                            $h2 = "Menu untuk input meter";
                        }
                        if ($e[1] == "Lihat komplain") {
                            $h1 = "lihat  komplain";
                            $h2 = "Menu untuk melihat data komplain ";
                        }
                        if ($e[1] == "Lihat pemakaian") {
                            $h1 = "lihat  pemakaian";
                            $h2 = "Menu untuk melihat data pemakaian ";
                        }
                        if ($e[1] == "ubah data meter") {
                            $h1 = "Ubah Meter";
                            $h2 = "Menu untuk mengubah data ";
                        }
                        if ($e[1] == "jatuh tempo") {
                            $h1 = "Jatuh tempo";
                            $h2 = "Menu untuk melihat jatuh tempo";
                        }
                    }
                    $h1 = "Dashboard";
                    $h2 = "Dashboard";
                }
                ?>

                <div class="container-fluid px-4">
                    <h1 class="mt-4"><?php
                    echo $h1;
                    ?></h1>
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item active"><?php
                        echo $h2;
                        ?></li>
                    </ol>
                    <div class="row" id="summary">
                        <div class="col-xl-3 col-md-6">
                            <div class="card bg-primary text-white mb-4">
                                <div class="card-body">Primary Card</div>
                                <div class="card-footer d-flex align-items-center justify-content-between">
                                    <a class="small text-white stretched-link" href="#">View Details</a>
                                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-md-6">
                            <div class="card bg-warning text-white mb-4">
                                <div class="card-body">Warning Card</div>
                                <div class="card-footer d-flex align-items-center justify-content-between">
                                    <a class="small text-white stretched-link" href="#">View Details</a>
                                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-md-6">
                            <div class="card bg-success text-white mb-4">
                                <div class="card-body">Success Card</div>
                                <div class="card-footer d-flex align-items-center justify-content-between">
                                    <a class="small text-white stretched-link" href="#">View Details</a>
                                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-md-6">
                            <div class="card bg-danger text-white mb-4">
                                <div class="card-body">Danger Card</div>
                                <div class="card-footer d-flex align-items-center justify-content-between">
                                    <a class="small text-white stretched-link" href="#">View Details</a>
                                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row" id="chart">
                        <div class="col-xl-6">
                            <div class="card mb-4">
                                <div class="card-header">
                                    <i class="fas fa-chart-area me-1"></i>
                                    Area Chart Example
                                </div>
                                <div class="card-body"><canvas id="myAreaChart" width="100%" height="40"></canvas></div>
                            </div>
                        </div>
                        <div class="col-xl-6">
                            <div class="card mb-4">
                                <div class="card-header">
                                    <i class="fas fa-chart-bar me-1"></i>
                                    Bar Chart Example
                                </div>
                                <div class="card-body"><canvas id="myBarChart" width="100%" height="40"></canvas></div>
                            </div>
                        </div>
                    </div>
                    <?php
                    if (isset($_POST['tombol']) == "user_add") {
                        $nik = $_POST['nik'];
                        $nama = $_POST['nama'];
                        $email = $_POST['email'];
                        $username = $_POST['username'];
                        $pass = $_POST['password'];
                        $alamat = $_POST['alamat'];
                        $no_telepon = $_POST['no_telepon'];
                        $tipe_user = $_POST['tipe_user'];

                        mysqli_query($koneksi, "INSERT INTO user (nik,nama,email,username,password,alamat,no_telepon,tipe_user) VALUES ('$nik',\"$nama\",'$email','$username', '$pass','$alamat','$no_telepon','$tipe_user')");
                        if (mysqli_affected_rows($koneksi) > 0) {
                            echo "
                            <div class=\"alert alert-success alert-dismissible fade show\">
                                <button type=button class=btn-close data-bs-dismiss=alert></button>
                                <strong>Data</strong> Berhasil Ditambahkan!
                            </div>
                            ";
                        } else {
                            echo "
                            <div class=\"alert alert-danger alert-dismissible fade show\">
                                <button type=button class=btn-close data-bs-dismiss=alert></button>
                                <strong>Data</strong> Berhasil Ditambahkan!
                            </div>
                            ";
                        }
                    }
                    ?>
                    <div class="card mb-4" id="user_add">
                        <div class="card-header">
                            <i class="fa-solid fa-users"></i>
                        </div>
                        <div class="card-body">
                            <form action="" method="POST">
                                <div class="mb-3 mt-3">
                                    <label for="nik" class="form-label">NIK</label>
                                    <input type="text" class="form-control" id="nik" placeholder="Masukan Nama"
                                        name="nik">
                                </div>
                                <div class="mb-3">
                                    <label for="nama" class="form-label">Nama</label>
                                    <input type="text" class="form-control" id="nama" placeholder="Masukan Nama"
                                        name="nama">
                                </div>
                                <div class="mb-3">
                                    <label for="email" class="form-label">Email</label>
                                    <input type="email" class="form-control" id="email" placeholder="Enter Email"
                                        name="email">
                                </div>
                                <div class="mb-3">
                                    <label for="username" class="form-label">Username</label>
                                    <input type="username" class="form-control" id="usernama"
                                        placeholder="Enter Username" name="username">
                                </div>
                                <div class="mb-3">
                                    <label for="password" class="form-label">Password</label>
                                    <input type="password" class="form-control" id="password"
                                        placeholder="Enter Password" name="password">
                                </div>
                                <div class="mb-3">
                                    <label for="alamat" class="form-label">Alamat</label>
                                    <textarea type="text" class="form-control" rows="5" id="alamat"
                                        placeholder="Enter Alamat" name="alamat"></textarea>
                                </div>
                                <div class="mb-3">
                                    <label for="no_telepon" class="form-label">No. Telepon</label>
                                    <input type="text" class="form-control" id="no_telepon"
                                        placeholder="Enter No Telepon" name="no_telepon">
                                </div>
                                <div class="mb-3">
                                    <label for="tipe_user" class="form-label">Tipe User</label>
                                    <select class="form-select" name="tipe_user" id="tipe_user">
                                        <option value="admin">Admin</option>
                                        <option value="warga">Warga</option>
                                        <option value="bendahara">Bendahara</option>
                                        <option value="petugas">Petugas</option>
                                    </select>
                                </div>
                                <button type="submit" class="btn btn-primary" name="tombol"
                                    value="user_add">Submit</button>
                            </form>
                        </div>
                    </div>
                    <div class="card mb-4" id="user_list">
                        <div class="card-header"></div>
                        <div class="card-body">
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                DataTable Example
                            </div>
                            <div class="card-body">
                                <table id="datatablesSimple">
                                    <thead>
                                        <th>NIK</th>
                                        <th>nama</th>
                                        <th>username</th>
                                        <th>email</th>
                                        <th>No. Telepon</th>
                                        <th>Tipe User</th>
                                        <th>Aksi</th>

                                    </thead>
                                    <tbody>
                                        <?php
                                        $q = mysqli_query($koneksi, "SELECT nik, nama, username, email, no_telepon, tipe_user FROM user ORDER BY tipe_user ASC, nama ASC");
                                        while ($d = mysqli_fetch_row($q)) {
                                            $nik = $d[0];
                                            $nama = $d[1];
                                            $username = $d[2];
                                            $email = $d[3];
                                            $no_telpon = $d[4];
                                            $tipe_user = $d[5];


                                            echo "
                                        <tr>
                                            <td>$nik</td>
                                            <td>$nama</td>
                                            <td>$username</td>
                                            <td>$email</td>
                                            <td>$no_telpon</td>
                                            <td>$tipe_user</td>
                                            <td>
                                                <button type=button class=\"btn btn-primary\">Ubah</button>
                                                <button type=button class=\"btn btn-danger\">Hapus</button>
                                            </td>
                                        </tr>";
                                        }
                                        ?>
                                    </tbody>

                                </table>
                            </div>
                        </div>
                    </div>
                    </div>
                    
            </main>
            <footer class="py-4 bg-light mt-auto">
                <div class="container-fluid px-4">
                    <div class="d-flex align-items-center justify-content-between small">
                        <div class="text-muted">Copyright &copy; Your Website 2023</div>
                        <div>
                            <a href="#">Privacy Policy</a>
                            &middot;
                            <a href="#">Terms &amp; Conditions</a>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        crossorigin="anonymous"></script>
    <script src="../js/scripts.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
    <script src="../assets/demo/chart-area-demo.js"></script>
    <script src="../assets/demo/chart-bar-demo.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js"
        crossorigin="anonymous"></script>
    <script src="../js/datatables-simple-demo.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="../js/air.js"></script>
</body>

</html>