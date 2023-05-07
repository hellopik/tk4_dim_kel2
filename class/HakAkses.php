<?php

class HakAkses
{
    private $IdAkses;
    private $NamaAkses;
    private $Keterangan;

    private $db;

    public function __construct(\PDO $db)
    {
        $this->db = $db;
    }


    public function setIdAkses($IdAkses)
    {
        $this->IdAkses = $IdAkses;
    }

    public function getIdAkses()
    {
        return $this->IdAkses;
    }

    public function setNamaAkses($NamaAkses)
    {
        $this->NamaAkses = $NamaAkses;
    }

    public function getNamaAkses()
    {
        return $this->NamaAkses;
    }

    public function setKeterangan($Keterangan)
    {
        $this->Keterangan = $Keterangan;
    }

    public function getKeterangan()
    {
        return $this->Keterangan;
    }

    public function all()
    {
        $query = "SELECT * FROM HakAkses ORDER BY NamaAkses ASC";

        $stmt = $this->db->prepare($query);
        $stmt->execute();

        return $stmt->fetchAll();
    }

    public function findById($IdAkses)
    {
        try {
            $query = "SELECT * FROM HakAkses WHERE IdAkses = ?";

            $stmt = $this->db->prepare($query);
            $stmt->execute([$IdAkses]);

            return $stmt->fetch();
        } catch (\Exception $e) {
            throw $e;
        }
    }

    public function create()
    {
        try {
            $query = "INSERT INTO HakAkses (IdAkses, NamaAkses, Keterangan) VALUES (?, ?, ?)";

            $stmt = $this->db->prepare($query);

            return $stmt->execute([$this->getIdAkses(), $this->getNamaAkses(), $this->getKeterangan()]);
        } catch (\Exception $e) {
            throw $e;
        }
    }

    public function update()
    {
        try {
            $query = "UPDATE HakAkses SET NamaAkses = ?, Keterangan = ? WHERE IdAkses = ?";

            $stmt = $this->db->prepare($query);

            return $stmt->execute([$this->getNamaAkses(), $this->getKeterangan(), $this->getIdAkses()]);
        } catch (\Exception $e) {
            throw $e;
        }
    }

    public function delete($IdAkses)
    {
        try {
            $query = "DELETE FROM HakAkses WHERE IdAkses = ?";

            $stmt = $this->db->prepare($query);

            return $stmt->execute([$IdAkses]);
        } catch (\Exception $e) {
            throw $e;
        }
    }
}
