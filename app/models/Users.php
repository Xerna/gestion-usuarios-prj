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
    public function create($params)
    {
        return $this->db->query(
            "INSERT INTO USUARIOS (nombre, apellido, correo, pw) 
             VALUES (:nombre, :apellido, :correo, :pw)",
            $params
        );
    }
    
    public function delete($id)
    {
        $params['id'] = $id;
        return $this->db->query("DELETE FROM USUARIOS WHERE id = :id", $params);
    }
    public function checkEmailExist($email){
        $params = [
            'correo' => $email
        ];
        $user_email =  $this->db->query("SELECT * FROM USUARIOS WHERE correo=  :correo", $params)->fetchAll();
        if($user_email){
            return true;
        }
    }
    public function show($id){
        $params = [
            'id' => $id
        ];
        return $this->db->query("SELECT * FROM USUARIOS WHERE id = :id", $params)->fetch();
    }
}
