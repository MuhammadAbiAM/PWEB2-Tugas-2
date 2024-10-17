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

class PenggantianPengawasUjian extends Database{
    public function __construct(){
        parent::__construct();
    }

    public function tampilData(){
        return "Dosen mengakses ";
    }
} 

class LaporanKerjaLembur extends PenggantianPengawasUjian{
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