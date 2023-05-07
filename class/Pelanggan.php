<?php

class Pelanggan
{
    private $IdPelanggan;
    private $UserName;
    private $Password;
    private $NamaPelanggan;
    private $NoHP;
    private $AlamatPelanggan;

    private $db;

    public function __construct(\PDO $db)
    {
        $this->db = $db;
    }

    public function setIdPelanggan($idPelanggan)
    {
        $this->IdPelanggan = $idPelanggan;
    }

    public function getIdPelanggan()
    {
        return $this->IdPelanggan;
    }

    public function setUserName($userName)
    {
        $this->UserName = $userName;
    }

    public function getUserName()
    {
        return $this->UserName;
    }

    public function setPassword($password)
    {
        $this->Password = $password;
    }

    public function getPassword()
    {
        return $this->Password;
    }

    public function setNamaPelanggan($namaPelanggan)
    {
        $this->NamaPelanggan = $namaPelanggan;
    }

    public function getNamaPelanggan()
    {
        return $this->NamaPelanggan;
    }

    public function setNoHP($noHP)
    {
        $this->NoHP = $noHP;
    }

    public function getNoHP()
    {
        return $this->NoHP;
    }

    public function setAlamatPelanggan($alamatPelanggan)
    {
        $this->AlamatPelanggan = $alamatPelanggan;
    }

    public function getAlamatPelanggan()
    {
        return $this->AlamatPelanggan;
    }

    public function all()
    {
        $query = "SELECT * FROM Pelanggan ORDER BY NamaPelanggan ASC";

        $stmt = $this->db->prepare($query);
        $stmt->execute();

        return $stmt->fetchAll();
    }

    public function findById($IdPelanggan)
    {
        try {
            $query = "SELECT * FROM Pelanggan WHERE IdPelanggan = ?";

            $stmt = $this->db->prepare($query);
            $stmt->execute([$IdPelanggan]);

            return $stmt->fetch();
        } catch (\Exception $e) {
            throw $e;
        }
    }

    public function create()
    {
        try {
            $query = "INSERT INTO Pelanggan (UserName, Password, NamaPelanggan, NoHP, AlamatPelanggan) VALUES (?, ?, ?, ?, ?)";

            $stmt = $this->db->prepare($query);

            return $stmt->execute([
                $this->getUserName(),
                $this->getPassword(),
                $this->getNamaPelanggan(),
                $this->getNoHP(),
                $this->getAlamatPelanggan(),
            ]);
        } catch (\Exception $e) {
            throw $e;
        }
    }

    public function update()
    {
        try {
            $query = "UPDATE Pelanggan SET UserName = ?, Password = ?, NamaPelanggan = ?, NoHP = ?, AlamatPelanggan = ? WHERE IdPelanggan = ?";

            $stmt = $this->db->prepare($query);

            return $stmt->execute([
                $this->getUserName(),
                $this->getPassword(),
                $this->getNamaPelanggan(),
                $this->getNoHP(),
                $this->getAlamatPelanggan(),
                $this->getIdPelanggan(),
            ]);
        } catch (\Exception $e) {
            throw $e;
        }
    }

    public function delete($IdPelanggan)
    {
        try {
            $query = "DELETE FROM Pelanggan WHERE IdPelanggan = ?";

            $stmt = $this->db->prepare($query);

            return $stmt->execute([$IdPelanggan]);
        } catch (\Exception $e) {
            throw $e;
        }
    }
}
