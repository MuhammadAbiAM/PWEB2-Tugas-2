<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</head>

<style>
    .table1 {
        font-family: sans-serif;
        color: #444;
        border-collapse: collapse;
        width: 100%;
        border: 1px solid #f2f5f7;
    }

    .table1 tr th {
        background: #35A9DB;
        color: #fff;
        font-weight: normal;
    }

    .table1,
    th,
    td {
        padding: 8px 20px;
        text-align: center;
    }

    .table1 tr:hover {
        background-color: #f5f5f5;
    }

    .table1 tr:nth-child(even) {
        background-color: #f2f2f2;
    }
</style>

<body>
    <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="homepage.php">Home</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#collapsibleNavbar">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="collapsibleNavbar">
                <ul class="navbar-nav">
                    <<?php if ($_GET['role'] == "dosen") { ?>
                        <li class="nav-item">
                            <a class="nav-link" href="index_pergantian.php?role=dosen">Data Pergantian Pegawai</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="index_laporan.php?role=dosen">Data Laporan Lembur</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="jadwalganda.php?role=dosen">Jadwal Ganda</a>
                        </li>
                    <?php } elseif ($_GET['role'] == "admin") { ?>
                        <li class="nav-item">
                            <a class="nav-link" href="index_pergantian.php?role=admin">Data Pergantian Pegawai</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="index_laporan.php?role=admin">Data Laporan Lembur</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="jadwalganda.php?role=admin">Jadwal Ganda</a>
                        </li>
                    <?php
                    }
                    ?>
                </ul>
            </div>
        </div>
    </nav>
    <div class="container mt-3">
        <br/>
        <center>
        <h3>Daftar Penggantian Pegawai Ujian</h3>
        </center>
        <br />
        <div class="card-body">
            <table class="table1" id="myTable">
                <thead>
                    <tr align="center">
                        <th scope="col">No</th>
                        <th scope="col">Nama Pengawas Diganti</th>
                        <th scope="col">Unit Kerja</th>
                        <th scope="col">Hari/Tanggal Penggantian</th>
                        <th scope="col">Jam</th>
                        <th scope="col">Ruang</th>
                        <th scope="col">Nama Pengawas Pengganti</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    include('koneksi.php');
                    $database = new Database();
                    $connection = $database->getConnection(); // Ambil koneksi database
                    $no = 1;
                    $query = "SELECT * FROM penggantian_pengawas_ujian";
                    $result = mysqli_query($connection, $query);
                    if ($result) {
                        while ($row = mysqli_fetch_assoc($result)) {
                    ?>
                            <tr align="center">
                                <td><?php echo $no++ ?></td>
                                <td><?php echo $row['nama_pengawas_diganti'] ?></td>
                                <td><?php echo $row['unit_kerja'] ?></td>
                                <td><?php echo $row['hari_tgl_penggantian'] ?></td>
                                <td><?php echo $row['jam'] ?></td>
                                <td><?php echo $row['ruang'] ?></td>
                                <td><?php echo $row['nama_pengawas_pengganti'] ?></td>
                            </tr>
                    <?php
                        }
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>

</body>

</html>