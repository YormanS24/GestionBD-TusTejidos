<?php
require_once "models/AccessModel.php";
require_once "views/AccessView.php";

define('METHOD','AES-256-CBC');
define('SECRET_KEY','$CARLOS@2016');
define('SECRET_IV','101712');

class AccessController
{
    function validateUser()
    {
        $AccessView = new AccessView();
        $AccessView->showFormSession();
    }

    function validateFromSession()
    {

        $user = $_POST['usuario'];
        $password = $_POST['password'];

        $password1 = $this->encryption($password);

        if(empty($user)){exit("!! DEBE INGRESAR EL USUARIO ¡¡");}
        if(empty($password)){exit("!! DEBE INGRESAR UNA CONTRASEÑA ¡¡");}

        $AccessModel = new AccessModel();
        $array_access = $AccessModel->validateFormSession($user,$password1);
        $obj = json_decode($array_access);

        //print_r($obj->access->user);
        $nombreUsuario = $obj->access->user;
        $passwordUsuario = $obj->access->password;
        $password1 = $this->decryption($passwordUsuario);

        if(($nombreUsuario == $user) AND ($password1 == $password)){
            $_SESSION['cod_usuario'] = $obj->_id;
            $_SESSION['usuario'] = $obj->access->user;
            $_SESSION['auth'] = 'OK';
            $response['message']="USUARIO LOGEADO CORRECTAMENTE";
            exit(json_encode($response));
        }
        

    }

    function closeSession()
    {
        $response=array();

        session_unset();
        session_destroy();
        $_SESSION = array();

        $response['message']="Cerrando Session";
        exit(json_encode($response));
    }

    function encryption($string){
        $output=FALSE;
        $key=hash('sha256', SECRET_KEY);
        $iv=substr(hash('sha256', SECRET_IV), 0, 16);
        $output=openssl_encrypt($string, METHOD, $key, 0, $iv);
        $output=base64_encode($output);
        return $output;
    }
    
    function decryption($string){
        $key=hash('sha256', SECRET_KEY);
        $iv=substr(hash('sha256', SECRET_IV), 0, 16);
        $output=openssl_decrypt(base64_decode($string), METHOD, $key, 0, $iv);
        return $output;
    }
}
