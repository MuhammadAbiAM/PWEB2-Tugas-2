# DOKUMENTASI TUGAS 2 PHP OPP CASE STUDY

## Deskripsi Proyek

Proyek ini mendemonstrasikan studi kasus OOP dalam PHP.

## Studi Kasus

![alt text](<Screenshot 2024-10-16 095318.png>)

## Tugas

1. Create an OOP-based View, by retrieving data from the MySQL database
2. Use the _construct as a link to the database
3. Apply encapsulation according to the logic of the case study
4. Create a derived class using the concept of inheritance
5. Apply polymorphism for at least 2 roles according to the case study

## Langkah dan Proses

**1. Membuat View Berbasis OOP dengan Mengambil Data dari Database MySQL**

- Class `Database` akan digunakan untuk membuat koneksi dengan database MySQL, dan mengambil data menggunakan query SQL. 

- `__construct` digunakan untuk menginisialisasi koneksi ke database setiap kali class `Database` dibuat. Properti `private` digunakan untuk menjaga enkapsulasi agar koneksi tidak bisa diakses langsung dari luar class.

- Menerapkan _Encapsulation_ sesuai logika studi kasus dengan cara menggunakan property `private` di class `Database`, sehingga hanya method dalam class yang bisa mengakses properti tersebut.

```php
<?php
class Database {
    protected $host = "localhost";
    protected $username = "root";
    protected $password = "";
    protected $dbname = "persuratan";
    protected $connection;
    
    public function __construct(){
        $this->getConnection();
    }

    public function getConnection() {
        $this->connection = null;
        try {
            $this->connection = new mysqli($this->host, $this->username, $this->password, $this->dbname);
            if ($this->connection->connect_error) {
                throw new Exception("Koneksi error: " . $this->connection->connect_error);
            }
            $this->connection->set_charset("utf8");
        } catch (Exception $exception) {
            echo "Koneksi error: " . $exception->getMessage();
        }
        return $this->connection;
    }

    public function getConn() {
        return $this->connection;
    }

    public function tampilData(){
        return "";
    }
}
```

**2. Membuat Kelas Turunan dengan Menggunakan Konsep Inheritance Dan Menerapkan Polimorphysm**

- Kelas turunan seperti `LaporanKerjaLembur` mewarisi class `Database`, `LaporanKerjaLembur` mewarisi class ``, dan `JadwalGanda`. Ini memungkinkan penggunaan ulang kode (reusability).

- Polimorphysm diterapkan pada class `PenggantianPengawasUjian`, `LaporanKerjaLembur` dan `JadwalGanda`, di mana ketiganya memiliki method `tampilData()`, namun berperilaku berbeda tergantung role.

```php
 public function getConn() {
        return $this->connection;
    }

    public function tampilData(){
        return "";
    }

    class PenggantianPengawasUjian extends Database{
    public function __construct(){
        parent::__construct();
    }

    public function tampilData(){
        return "Dosen mengakses ";
    }
} 

class LaporanKerjaLembur extends Database{
    public function __construct(){
        parent::__construct();
    }

    public function tampilData(){
        return "";
    }
}

class JadwalGanda extends PenggantianPengawasUjian{
    public function __construct(){
        parent::__construct();
    }

    public function tampilData(){
        $query = "SELECT * FROM penggantian_pengawas_ujian WHERE hari_tgl_penggantian = '2024-12-01'";
        $result = $this->connection->query($query);
        return $result;
    }
} 
?>
```

## Proses

**3. Membuat HomePage Untuk Pemilihan Role**

```php
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</head>

<style>
    
    .button {
        display: inline-block;
        padding: 10px 20px;
        background-color: #007bff;
        color: white;
        text-decoration: none;
        border-radius: 20px;
        border: none;
        cursor: pointer;
        transition: background-color 0.3s;
        margin: 20px 30px;
    }

    .button:hover {
        background-color: #0b0b0b;
    }
    
</style>

<body>
    <section>
        <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
            <div class="container-fluid">
                <a class="navbar-brand">Home</a>
                <button class="navbar-toggler" type="text" data-bs-toggle="collapse" data-bs-target="#collapsibleNavbar">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="collapsibleNavbar">

                </div>
            </div>
        </nav>
        <div class="container-fluid mt-3">
            <center>
                <h3>SELAMAT DATANG DI HALAMAN UTAMA</h3>
            </center>
            <br/>
            <br/>
            <center>
                <h4>Masuk Sebagai :</h4></h4>
                <ul class="text-container">
                    <a href="index_pergantian.php?role=admin" class="button">Admin</a>
                    <a href="index_pergantian.php?role=dosen" class="button">Dosen</a>
                </ul>
            </center>
        </div>
    </section>
</body>

</html>
```

**4. Membuat Tampilan Tabel Untuk Class Penggantian Pengawas Ujian Serta Include dari Database**

```php
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
```

**5. Membuat Tampilan Tabel Untuk Class Laporan Kerja Lembur Serta Include dari Database**

```php
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
                <?php if ($_GET['role'] == "dosen") { ?>
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
        <h3>Daftar Laporan Kerja Lembur</h3>
        </center>
        <br />
        <div class="card-body">
            <table class="table1" id="myTable">
                <thead>
                    <tr align="center">
                        <th scope="col">No</th>
                        <th scope="col">Hari/Tanggal Laporan</th>
                        <th scope="col">Waktu</th>
                        <th scope="col">Uraian Pekerjaan</th>
                        <th scope="col">Keterangan</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    include('koneksi.php');
                    $database = new Database();
                    $connection = $database->getConnection(); // Ambil koneksi database
                    $no = 1;
                    $query = "SELECT * FROM laporan_kerja_lembur";
                    $result = mysqli_query($connection, $query);
                    if ($result) {
                        while ($row = mysqli_fetch_assoc($result)) {
                    ?>
                            <tr align="center">
                                <td><?php echo $no++ ?></td>
                                <td><?php echo $row['hari_tgl_laporan'] ?></td>
                                <td><?php echo $row['waktu'] ?></td>
                                <td><?php echo $row['uraian_pekerjaan'] ?></td>
                                <td><?php echo $row['keterangan'] ?></td>
                        <?php
                        }
                    }
                        ?>
                </tbody>
            </table>
        </div>
    </div>
    </div>
</body>

</html>
```

**6. Membuat Tampilan Tabel Untuk Class Jadwal Ganda yaitu Turunan dari Class Penggantian Pengawas Ujian Serta Include dari Database**

```php
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
                    <?php if ($_GET['role'] == "dosen") { ?>
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
        <h3>Daftar Jadwal Ganda</h3>
        </center>
        <br />
        <div class="card-body">
            <table class="table1" id="Ganti" name="ganti">
                <thead>
                    <tr align="center">
                        <th scope="col">No</th>
                        <th scope="col">Nama Pengawas Pengganti</th>
                        <th scope="col">Hari/Tanggal Penggantian</th>
                        <th scope="col">Jam</th>
                        <th scope="col">Ruang</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    include('koneksi.php');
                    $ganda = new JadwalGanda();
                    $query = $ganda->tampilData(); // Ambil koneksi database
                    $no = 1;
                    if ($query) {
                        while ($row = mysqli_fetch_assoc($query)) {
                    ?>
                            <tr align="center">
                                <td><?php echo $no++ ?></td>
                                <td><?php echo $row['nama_pengawas_pengganti'] ?></td>
                                <td><?php echo $row['hari_tgl_penggantian'] ?></td>
                                <td><?php echo $row['jam'] ?></td>
                                <td><?php echo $row['ruang'] ?></td>
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
```

## Hasil Output

![alt text](<Screenshot 2024-10-18 020545.png>)

![alt text](<Screenshot 2024-10-18 020602.png>)

![alt text](<Screenshot 2024-10-18 020613.png>)

![alt text](<Screenshot 2024-10-18 020623.png>)