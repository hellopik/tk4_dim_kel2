<?php

class Penjualan
{
    private $IdPenjualan;
    private $JumlahPenjualan;
    private $HargaJual;
    private $IdPengguna;
    private $IdBarang;
    private $IdPelanggan;

    private $db;

    public function __construct(\PDO $db)
    {
        $this->db = $db;
    }


    public function setIdPenjualan($IdPenjualan)
    {
        $this->IdPenjualan = $IdPenjualan;
    }

    public function getIdPenjualan()
    {
        return $this->IdPenjualan;
    }

    public function setJumlahPenjualan($JumlahPenjualan)
    {
        $this->JumlahPenjualan = $JumlahPenjualan;
    }

    public function getJumlahPenjualan()
    {
        return $this->JumlahPenjualan;
    }

    public function setHargaJual($HargaJual)
    {
        $this->HargaJual = $HargaJual;
    }

    public function getHargaJual()
    {
        return $this->HargaJual;
    }

    public function setIdPengguna($IdPengguna)
    {
        $this->IdPengguna = $IdPengguna;
    }

    public function getIdPengguna()
    {
        return $this->IdPengguna;
    }

    public function setIdBarang($IdBarang)
    {
        $this->IdBarang = $IdBarang;
    }

    public function getIdBarang()
    {
        return $this->IdBarang;
    }

    public function setIdPelanggan($IdPelanggan)
    {
        $this->IdPelanggan = $IdPelanggan;
    }

    public function getIdPelanggan()
    {
        return $this->IdPelanggan;
    }

    public function all()
    {
        $query = "SELECT * FROM Penjualan ORDER BY JumlahPenjualan DESC";

        $stmt = $this->db->prepare($query);
        $stmt->execute();

        return $stmt->fetchAll();
    }

    public function findById($IdPenjualan)
    {
        try {
            $query = "SELECT * FROM Penjualan WHERE IdPenjualan = ?";

            $stmt = $this->db->prepare($query);
            $stmt->execute([$IdPenjualan]);

            return $stmt->fetch();
        } catch (\Exception $e) {
            throw $e;
        }
    }

    public function create()
    {
        try {
            $query = "INSERT INTO Penjualan (JumlahPenjualan, HargaJual, IdPengguna, IdBarang, IdPelanggan) VALUES (?, ?, ?, ?, ?)";

            $stmt = $this->db->prepare($query);

            return $stmt->execute([
                $this->getJumlahPenjualan(),
                $this->getHargaJual(),
                $this->getIdPengguna(),
                $this->getIdBarang(),
                $this->getIdPelanggan(),
            ]);
        } catch (\Exception $e) {
            throw $e;
        }
    }

    public function update()
    {
        try {
            $query = "UPDATE Penjualan SET JumlahPenjualan = ?, HargaJual = ?, IdPengguna = ?, IdBarang = ?, IdPelanggan = ? WHERE IdPenjualan = ?";

            $stmt = $this->db->prepare($query);

            return $stmt->execute([
                $this->getJumlahPenjualan(),
                $this->getHargaJual(),
                $this->getIdPengguna(),
                $this->getIdBarang(),
                $this->getIdPelanggan(),
                $this->getIdPenjualan(),
            ]);
        } catch (\Exception $e) {
            throw $e;
        }
    }

    public function delete($IdPenjualan)
    {
        try {
            $query = "DELETE FROM Penjualan WHERE IdPenjualan = ?";

            $stmt = $this->db->prepare($query);

            return $stmt->execute([$IdPenjualan]);
        } catch (\Exception $e) {
            throw $e;
        }
    }

    public function totalHargaPenjualan($IdBarang)
    {
        try {
            $query = "SELECT * FROM Penjualan WHERE IdBarang = ?";

            $stmt = $this->db->prepare($query);
            $stmt->execute([$IdBarang]);

            $daftarPenjualan = $stmt->fetchAll();

            $total = 0;

            foreach ($daftarPenjualan as $penjualan) {
                $total = (int) $penjualan["JumlahPenjualan"] * (float) $penjualan["HargaJual"];
            }

            return $total;
        } catch (\Exception $e) {
            throw $e;
        }
    }
}