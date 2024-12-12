<?php
class UsuarioController
{
    private ?User $UsuarioModel;
    public function __construct(?Database $db = null)
    {
        if ($db) {
            $this->UsuarioModel = new User($db);
        }
    }

    public function create($datos)
    {
        $this->UsuarioModel->create($datos);
        header('Location: /users');
        exit;
    }
    public function show()
    {
        $users = $this->UsuarioModel->listAll();
        loadView('users/show', ['users' => $users]);
    }
}
