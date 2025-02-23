<?php

namespace app\Repositories;

require_once dirname(__DIR__, 2) . '/app/Config/Database.php';

use app\Config\Database;

use PDO;

class UserRepository
{
    protected $db;

    public function __construct()
    {
        $this->db = Database::getInstance()->getConnection();
    }

    public function register($data)
    {
        $sql = "SELECT 1 FROM users WHERE email = :email";
        $stmt = $this->db->prepare($sql);
        $stmt->execute(['email' => $data['email']]);
        $exists = $stmt->fetchColumn();
        if ($exists) {
            die('Email Already Exists!');
        } else {
            $sql = "INSERT INTO users (name, email, password, role) VALUES (:name, :email, :password, :role)";
            $stmt = $this->db->prepare($sql);
            return $stmt->execute($data);
        }
    }

    public function login($data)
    {
        $sql = "SELECT id , name , email, password , role FROM users WHERE email = :email";
        $stmt = $this->db->prepare($sql);
        $stmt->execute(['email' => $data['email']]);
        $exists = $stmt->fetch(PDO::FETCH_ASSOC);

        if (!$exists) {
            die('Email Not Exists!');
        } else {
            if (!password_verify($data['password'], $exists['password'])) {
                die('Password is incorrect.');
            }
            return $exists ; 
        }
    }
}
