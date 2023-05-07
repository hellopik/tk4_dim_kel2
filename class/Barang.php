<?php

class Barang
{
    private $IdBarang;
    private $NamaBarang;
    private $Keterangan;
    private $Satuan;
    private $IdPengguna;

    private $db;

    public function __construct(\PDO $db)
    {
        $this->db = $db;
    }

    public function getIdBarang()
    {
        return $this->IdBarang;
    }

    public function setIdBarang($IdBarang)
    {
        $this->IdBarang = $IdBarang;
    }

    public function getNamaBarang()
    {
        return $this->NamaBarang;
    }

    public function setNamaBarang($NamaBarang)
    {
        $this->NamaBarang = $NamaBarang;
    }

    public function getKeterangan()
    {
        return $this->Keterangan;
    }

    public function setKeterangan($Keterangan)
    {
        $this->Keterangan = $Keterangan;
    }

    public function getSatuan()
    {
        return $this->Satuan;
    }

    public function setSatuan($Satuan)
    {
        $this->Satuan = $Satuan;
    }

    public function getIdPengguna()
    {
        return $this->IdPengguna;
    }

    public function setIdPengguna($IdPengguna)
    {
        $this->IdPengguna = $IdPengguna;
    }

    public function all()
    {
        $query = "SELECT * FROM Barang ORDER BY NamaBarang ASC";

        $stmt = $this->db->prepare($query);
        $stmt->execute();

        return $stmt->fetchAll();
    }

    public function getCogs()
    {
        $query = "SELECT * FROM Barang a JOIN cogs_barang b on b.IdBarang = a.IdBarang ORDER BY NamaBarang ASC";

        $stmt = $this->db->prepare($query);
        $stmt->execute();

        return $stmt->fetchAll();
    }

    public function findById($IdBarang)
    {
        try {
            $query = "SELECT * FROM Barang WHERE IdBarang = ?";

            $stmt = $this->db->prepare($query);
            $stmt->execute([$IdBarang]);

            return $stmt->fetch();
        } catch (\Exception $e) {
            throw $e;
        }
    }

    public function create()
    {
        try {
            $query = "INSERT INTO Barang (NamaBarang, Keterangan, Satuan, IdPengguna) VALUES (?, ?, ?, ?)";

            $stmt = $this->db->prepare($query);

            return $stmt->execute([
                $this->getNamaBarang(),
                $this->getKeterangan(),
                $this->getSatuan(),
                $this->getIdPengguna(),
            ]);
        } catch (\Exception $e) {
            throw $e;
        }
    }

    public function update()
    {
        try {
            $query = "UPDATE Barang SET NamaBarang = ?, Keterangan = ?, Satuan = ?, IdPengguna = ? WHERE IdBarang = ?";

            $stmt = $this->db->prepare($query);

            return $stmt->execute([
                $this->getNamaBarang(),
                $this->getKeterangan(),
                $this->getSatuan(),
                $this->getIdPengguna(),
                $this->getIdBarang(),
            ]);
        } catch (\Exception $e) {
            throw $e;
        }
    }

    public function delete($IdBarang)
    {
        try {
            $query = "DELETE FROM Barang WHERE IdBarang = ?";

            $stmt = $this->db->prepare($query);

            return $stmt->execute([$IdBarang]);
        } catch (\Exception $e) {
            throw $e;
        }
    }
}
