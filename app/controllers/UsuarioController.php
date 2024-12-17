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
    public function create(){
        loadView('users/create');
    }
    public function store()
    {   
        //Definir campos permitidos para evitar que se envien otros campos
        $allowed_fields = ['user_name', 'user_lastname', 'user_email', 'user_pw'];
        //Busca las coincidencias entre los campos permitidos y los datos enviados por post
        $user_data = array_intersect_key($_POST, array_flip($allowed_fields));
        //Sanitizar el array
        $user_data = array_map('sanitize', $user_data); 
        
        $nombre = $user_data['user_name'];
        $apellido = $user_data['user_lastname'];
        $correo = $user_data['user_email'];
        $pw = $_POST['user_pw']; //Devolvemos para evitar eliminar caracteres especiales y password_hash de igual forma lo va a sanitizar

        $errors = [];
        //Validaciones
        if(!email($correo)){
            $errors['email'] = 'Porfavor ingresa una direccion de correo valida';
        }

        if (!string_input($nombre, 2, 80)) {
            $errors['nombre'] = 'El nombre debe tener entre 2 y 80 caracteres';
          }
        
        if (!string_input($apellido, 2, 80)) {
            $errors['apellido'] = 'El apellido debe tener entre 2 y 80 caracteres';
        }
        
        if (!string_input($pw, 6, 255)) {
            $errors['pw'] = 'La contraseña debe tener almenos 6 caracteres';
        }

        //Recargar vista con errores
        if(!empty($errors)){
            loadView('users/create',[
                'errors' => $errors,
                'userData' => [
                    'user_name' => $nombre,
                    'user_lastname' => $apellido,
                    'user_email' => $correo,
                  ]
            ]);
            exit;
        }

        //Verificar email 
        if($this->UsuarioModel->checkEmailExist($correo)){
            $errors['email'] = 'Ya existe una cuenta con ese correo';
            loadView('users/create',[
                'errors' => $errors
            ]);
            exit;
        }
        $params = [
                'nombre' => $nombre,
                'apellido' => $apellido,
                'correo' => $correo,
                'pw' => password_hash($pw, PASSWORD_DEFAULT)
        ];
        $this->UsuarioModel->create($params);
        header('Location: /users/list');
        exit;
    }
    public function list()
    {
        $users = $this->UsuarioModel->listAll();
        loadView('users/list', ['users' => $users]);
    }

    public function show($params){
        $id = $params['id'];
        $user = $this->UsuarioModel->show($id);
        loadview('users/show', ['user' => $user]);
    }

}
