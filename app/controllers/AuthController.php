<?php
class AuthController
{
    public function login()
    {
        include basePath('app/views/auth/login.view.php');
    }
    public function registrarse()
    {
        include basePath('app/views/auth/register.view.php');
    }
}
