<?php

class Pengguna
{
    private $IdPengguna;
    private $NamaPengguna;
    private $Password;
    private $NamaDepan;
    private $NamaBelakang;
    private $NoHP;
    private $Alamat;
    private $IdAkses;

    private $db;

    public function __construct(\PDO $db)
    {
        $this->db = $db;
    }

    public function setIdPengguna($IdPengguna)
    {
        $this->IdPengguna = $IdPengguna;
    }

    public function getIdPengguna()
    {
        return $this->IdPengguna;
    }

    public function setNamaPengguna($NamaPengguna)
    {
        $this->NamaPengguna = $NamaPengguna;
    }

    public function getNamaPengguna()
    {
        return $this->NamaPengguna;
    }

    public function setPassword($Password)
    {
        $this->Password = $Password;
    }

    public function getPassword()
    {
        return $this->Password;
    }

    public function setNamaDepan($NamaDepan)
    {
        $this->NamaDepan = $NamaDepan;
    }

    public function getNamaDepan()
    {
        return $this->NamaDepan;
    }

    public function setNamaBelakang($NamaBelakang)
    {
        $this->NamaBelakang = $NamaBelakang;
    }

    public function getNamaBelakang()
    {
        return $this->NamaBelakang;
    }

    public function setNoHP($NoHP)
    {
        $this->NoHP = $NoHP;
    }

    public function getNoHP()
    {
        return $this->NoHP;
    }

    public function setAlamat($Alamat)
    {
        $this->Alamat = $Alamat;
    }

    public function getAlamat()
    {
        return $this->Alamat;
    }

    public function setIdAkses($IdAkses)
    {
        $this->IdAkses = $IdAkses;
    }

    public function getIdAkses()
    {
        return $this->IdAkses;
    }

    public function all()
    {
        $query = "SELECT * FROM Pengguna ORDER BY NamaPengguna ASC";

        $stmt = $this->db->prepare($query);
        $stmt->execute();

        return $stmt->fetchAll();
    }

    public function findById($IdPengguna)
    {
        try {
            $query = "SELECT * FROM Pengguna WHERE IdPengguna = ?";

            $stmt = $this->db->prepare($query);
            $stmt->execute([$IdPengguna]);

            return $stmt->fetch();
        } catch (\Exception $e) {
            throw $e;
        }
    }

    public function create()
    {
        try {
            $query = "INSERT INTO Pengguna (IdPengguna, NamaPengguna, Password, NamaDepan, NamaBelakang, NoHP, Alamat, IdAkses) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";

            $stmt = $this->db->prepare($query);

            return $stmt->execute([
                $this->getIdPengguna(),
                $this->getNamaPengguna(),
                $this->getPassword(),
                $this->getNamaDepan(),
                $this->getNamaBelakang(),
                $this->getNoHP(),
                $this->getAlamat(),
                $this->getIdAkses()
            ]);
        } catch (\Exception $e) {
            throw $e;
        }
    }

    public function update()
    {
        try {
            $query = "UPDATE Pengguna SET NamaPengguna = ?, NamaDepan = ?, NamaBelakang = ?, NoHP = ?, Alamat = ?, IdAkses = ? WHERE IdPengguna = ?";

            $stmt = $this->db->prepare($query);

            return $stmt->execute([
                $this->getNamaPengguna(),
                $this->getNamaDepan(),
                $this->getNamaBelakang(),
                $this->getNoHP(),
                $this->getAlamat(),
                $this->getIdAkses(),
                $this->getIdPengguna()
            ]);
        } catch (\Exception $e) {
            throw $e;
        }
    }

    public function delete($IdPengguna)
    {
        try {
            $query = "DELETE FROM Pengguna WHERE IdPengguna = ?";

            $stmt = $this->db->prepare($query);

            return $stmt->execute([$IdPengguna]);
        } catch (\Exception $e) {
            throw $e;
        }
    }
}
