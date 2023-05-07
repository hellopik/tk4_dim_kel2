<?php

class Database
{
    private $server = "localhost";
    private $username = "root";
    private $password = ""; # default = "" (empty)
    private $database = "db_tk3rev";
    private $port = 8111; # default = 3306

    public function connect()
    {
        try {
            $conn = new PDO(
                "mysql:host={$this->server};port={$this->port};dbname={$this->database}",
                $this->username,
                $this->password
            );

            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            return $conn;
        } catch (PDOException $e) {
            echo "Connection failed: " . $e->getMessage() . "<br/>";

            die();
        }
    }
}

$db = (new Database())->connect();


// class database
// {
// private $server = "localhost";
// private $username = "root";
// private $password = "";
// private $database = "mooc";
// function koneksidatabase ()
// {
// try {
// // buat koneksi dengan database
// $dbh = new PDO('mysql:host='. $this->server 
// .';dbname='. $this->database, $this->username, $this->password);
// // set error mode
// $dbh->setAttribute( PDO::ATTR_ERRMODE, 
// PDO::ERRMODE_EXCEPTION );
// return $dbh;
//  }
//  catch (PDOException $e) {
// // tampilkan pesan kesalahan jika koneksi 
// gagal
// print "Koneksi atau query bermasalah: " . $e-
// >getMessage() . "<br/>";
// die();
//  }
// }
// }
// $d1 = new database();
// $database = $d1->koneksidatabase();
