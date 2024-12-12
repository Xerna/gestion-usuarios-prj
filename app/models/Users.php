<?php
//user.php
class User
{
    private $db;
    public function __construct($database)
    {
        $this->db = $database;
    }

    public function listAll()
    {
        return $this->db->query("SELECT * from USUARIOS")->fetchAll();
    }
    public function create($usuarios)
    {
        //encrypt to sha256
        $usuarios['user_pw'] = password_hash($usuarios['user_pw'], PASSWORD_DEFAULT);
        $params = [
            'nombre' => $usuarios['user_name'],
            'apellido' => $usuarios['user_lastname'],
            'correo' => $usuarios['user_email'],
            'pw' => $usuarios['user_pw'],
        ];
        return $this->db->query(
            "INSERT INTO USUARIOS (nombre, apellido, correo, pw) 
             VALUES (:nombre, :apellido, :correo, :pw)",
            $params
        );
    }
}
