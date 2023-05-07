<?php

class Pembelian
{
    private $IdPembelian;
    private $JumlahPembelian;
    private $HargaBeli;
    private $IdPengguna;
    private $IdBarang;
    private $IdSupplier;

    private $db;

    public function __construct(\PDO $db)
    {
        $this->db = $db;
    }

    public function getIdPembelian()
    {
        return $this->IdPembelian;
    }

    public function setIdPembelian($IdPembelian)
    {
        $this->IdPembelian = $IdPembelian;
    }

    public function getJumlahPembelian()
    {
        return $this->JumlahPembelian;
    }

    public function setJumlahPembelian($JumlahPembelian)
    {
        $this->JumlahPembelian = $JumlahPembelian;
    }

    public function getHargaBeli()
    {
        return $this->HargaBeli;
    }

    public function setHargaBeli($HargaBeli)
    {
        $this->HargaBeli = $HargaBeli;
    }

    public function getIdPengguna()
    {
        return $this->IdPengguna;
    }

    public function setIdPengguna($IdPengguna)
    {
        $this->IdPengguna = $IdPengguna;
    }

    public function getIdBarang()
    {
        return $this->IdBarang;
    }

    public function setIdBarang($IdBarang)
    {
        $this->IdBarang = $IdBarang;
    }

    public function getIdSupplier()
    {
        return $this->IdSupplier;
    }

    public function setIdSupplier($IdSupplier)
    {
        $this->IdSupplier = $IdSupplier;
    }

    public function all()
    {
        $query = "SELECT * FROM Pembelian ORDER BY JumlahPembelian DESC";

        $stmt = $this->db->prepare($query);
        $stmt->execute();

        return $stmt->fetchAll();
    }

    public function findById($IdPembelian)
    {
        try {
            $query = "SELECT * FROM Pembelian WHERE IdPembelian = ?";

            $stmt = $this->db->prepare($query);
            $stmt->execute([$IdPembelian]);

            return $stmt->fetch();
        } catch (\Exception $e) {
            throw $e;
        }
    }

    public function create()
    {
        try {
            $query = "INSERT INTO Pembelian (JumlahPembelian, HargaBeli, IdPengguna, IdBarang, IdSupplier) VALUES (?, ?, ?, ?, ?)";

            $stmt = $this->db->prepare($query);

            return $stmt->execute([
                $this->getJumlahPembelian(),
                $this->getHargaBeli(),
                $this->getIdPengguna(),
                $this->getIdBarang(),
                $this->getIdSupplier(),
            ]);
        } catch (\Exception $e) {
            throw $e;
        }
    }

    public function update()
    {
        try {
            $query = "UPDATE Pembelian SET JumlahPembelian = ?, HargaBeli = ?, IdPengguna = ?, IdBarang = ?, IdSupplier = ? WHERE IdPembelian = ?";

            $stmt = $this->db->prepare($query);

            return $stmt->execute([
                $this->getJumlahPembelian(),
                $this->getHargaBeli(),
                $this->getIdPengguna(),
                $this->getIdBarang(),
                $this->getIdSupplier(),
                $this->getIdPembelian(),
            ]);
        } catch (\Exception $e) {
            throw $e;
        }
    }

    public function delete($IdPembelian)
    {
        try {
            $query = "DELETE FROM Pembelian WHERE IdPembelian = ?";

            $stmt = $this->db->prepare($query);

            return $stmt->execute([$IdPembelian]);
        } catch (\Exception $e) {
            throw $e;
        }
    }

    public function totalHargaPembelian($IdBarang)
    {
        try {
            $query = "SELECT * FROM Pembelian WHERE IdBarang = ?";

            $stmt = $this->db->prepare($query);
            $stmt->execute([$IdBarang]);

            $daftarPembelian = $stmt->fetchAll();

            $total = 0;

            foreach ($daftarPembelian as $pembelian) {
                $total = (int) $pembelian["JumlahPembelian"] * (float) $pembelian["HargaBeli"];
            }

            return $total;
        } catch (\Exception $e) {
            throw $e;
        }
    }
}