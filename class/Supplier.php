<?php

class Supplier
{
    private $IdSupplier;
    private $UserName;
    private $Password;
    private $NamaSupplier;
    private $NoHP;
    private $AlamatSupplier;

    private $db;

    public function __construct(\PDO $db)
    {
        $this->db = $db;
    }

    public function setIdSupplier($IdSupplier)
    {
        $this->IdSupplier = $IdSupplier;
    }

    public function getIdSupplier()
    {
        return $this->IdSupplier;
    }

    public function setUserName($UserName)
    {
        $this->UserName = $UserName;
    }

    public function getUserName()
    {
        return $this->UserName;
    }

    public function setPassword($Password)
    {
        $this->Password = $Password;
    }

    public function getPassword()
    {
        return $this->Password;
    }

    public function setNamaSupplier($NamaSupplier)
    {
        $this->NamaSupplier = $NamaSupplier;
    }

    public function getNamaSupplier()
    {
        return $this->NamaSupplier;
    }

    public function setNoHP($NoHP)
    {
        $this->NoHP = $NoHP;
    }

    public function getNoHP()
    {
        return $this->NoHP;
    }

    public function setAlamatSupplier($AlamatSupplier)
    {
        $this->AlamatSupplier = $AlamatSupplier;
    }

    public function getAlamatSupplier()
    {
        return $this->AlamatSupplier;
    }

    public function all()
    {
        $query = "SELECT * FROM Supplier ORDER BY NamaSupplier ASC";

        $stmt = $this->db->prepare($query);
        $stmt->execute();

        return $stmt->fetchAll();
    }

    public function findById($IdSupplier)
    {
        try {
            $query = "SELECT * FROM Supplier WHERE IdSupplier = ?";

            $stmt = $this->db->prepare($query);
            $stmt->execute([$IdSupplier]);

            return $stmt->fetch();
        } catch (\Exception $e) {
            throw $e;
        }
    }

    public function create()
    {
        try {
            $query = "INSERT INTO Supplier (UserName, Password, NamaSupplier, NoHP, AlamatSupplier) VALUES (?, ?, ?, ?, ?)";

            $stmt = $this->db->prepare($query);

            return $stmt->execute([
                $this->getUserName(),
                $this->getPassword(),
                $this->getNamaSupplier(),
                $this->getNoHP(),
                $this->getAlamatSupplier(),
            ]);
        } catch (\Exception $e) {
            throw $e;
        }
    }

    public function update()
    {
        try {
            $query = "UPDATE Supplier SET UserName = ?, Password = ?, NamaSupplier = ?, NoHP = ?, AlamatSupplier = ? WHERE IdSupplier = ?";

            $stmt = $this->db->prepare($query);

            return $stmt->execute([
                $this->getUserName(),
                $this->getPassword(),
                $this->getNamaSupplier(),
                $this->getNoHP(),
                $this->getAlamatSupplier(),
                $this->getIdSupplier(),
            ]);
        } catch (\Exception $e) {
            throw $e;
        }
    }

    public function delete($IdSupplier)
    {
        try {
            $query = "DELETE FROM Supplier WHERE IdSupplier = ?";

            $stmt = $this->db->prepare($query);

            return $stmt->execute([$IdSupplier]);
        } catch (\Exception $e) {
            throw $e;
        }
    }
}
