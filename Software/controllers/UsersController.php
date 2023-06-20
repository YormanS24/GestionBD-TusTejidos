<?php
require_once "views/UsersView.php";
require_once "models/UsersModel.php";
require_once "models/AccessModel.php";
require_once "controllers/AccessController.php";

class UsersController
{
    function listUser()
    {
        $Connection = new Connection('sel');
        $UsersModel = new UsersModel($Connection);
        $UsersView = new UsersView();
        $listUsers = $UsersModel->listUsers();
        $UsersView->listUsers($listUsers);
    }

    function addUser(){
        $Connection = new Connection('sel');
        $UsersModel = new UsersModel($Connection);
        $UserView = new UsersView();

        $array_tipo_docu = $UsersModel->listTipyDoc();

        $UserView->addUser($array_tipo_docu);

    }


    function createUser()
    {
        $Connection = new Connection('all');
        $UsersModel = new UsersModel($Connection);
        $AccessModel = new AccessModel($Connection);
        $UsersView = new UsersView();
        $AccessController = new AccessController();

        $nombre1 = $_POST['nombre1'];
        $nombre2 = $_POST['nombre2'];
        $apellido1 = $_POST['apellido1'];
        $apellido2 = $_POST['apellido2'];
        $documento = $_POST['documento'];
        $sexo = $_POST['sexo'];
        $tipo_docu = $_POST['tipo_documento'];
        $telefono = $_POST['telefono'];
        $correo = $_POST['correo'];
        $nombreUser = $_POST['usuario'];
        $contrasena = $_POST['password'];
        $contrasena1 = $_POST['password1'];

        if(!($sexo == 'M' OR $sexo == 'F' OR $sexo == 'I'))
        {
            $response = ["message" => 'ERROR AL INSERTAR EL TIPO DE SEXO'];
            exit(json_encode($response));
        }

        if(empty($nombre1) or empty($apellido1) or empty($documento) or empty($sexo) or empty($tipo_docu) or empty($telefono) or empty($correo) or empty($nombreUser) or empty($contrasena) or empty($contrasena1))
        {
            $response = ["message" => 'FALTAN CAMPOS POR DILIGENCIAR'];
            exit(json_encode($response));
        }

        if(strlen($telefono)>16)
        {
            $response = ["message"=>'EXCEDE EL TAMAÑO MAXIMO DEL TELEFONO'];
            exit(json_encode($response));
        }

        if(strlen($documento)>16)
        {
            $response = ["message"=>'EXCEDE EL TAMAÑO MAXIMO DEL DOCUMENTO'];
            exit(json_encode($response));
        }

        if($contrasena != $contrasena1)
        {
            $response = ["message"=>'LAS CONTRASEÑAS NO COINCIDEN'];
            exit(json_encode($response));
        }

        if(strlen($contrasena)<9)
        {
            $response = ["message"=>'CONTRASEÑA COMO MINIMO 8 CARACTERES'];
            exit(json_encode($response));
        }

        $pattern = "/^[a-zA-ZñáéíóúÁÉÍÓÚ]+$/";
        $pattern1 = "/^[[:digit:]]*$/";

        if(!(($nombre2  == "" OR preg_match($pattern,$nombre2)) AND ($apellido2 == "" OR preg_match($pattern,$apellido2))))
        {
            $response = ["message"=>'INGRESE SOLO LETRAS O DEJE EL CAMPO VACIO'];
            exit(json_encode($response));
        }

        if(!(preg_match($pattern,$nombre1)) OR !(preg_match($pattern,$apellido1)) OR !(preg_match($pattern,$sexo)))
        {
            $response = ["message"=>'INGRESE SOLO LETRAS'];
            exit(json_encode($response));
        }

        if(!(preg_match($pattern1,$tipo_docu)) or !(preg_match($pattern1,$telefono)) or !(preg_match($pattern1,$documento)))
        {
            $response = ["message"=>'INGRESE SOLO NUMEROS '];
            exit(json_encode($response));
        }

        if(!(filter_var($correo, FILTER_VALIDATE_EMAIL)))
        {
            $response = ["message"=>'INGRESE UN CORREO VALIDO '];
            exit(json_encode($response));
        }

        $array_user = $UsersModel->buscarUser($documento,$telefono,$correo);
        $array_acces = $AccessModel->searUS($nombreUser);

        if($array_user)
        {
            $response = ["message"=>'USUARIO YA REGISTRADO CON EL MISMO TELEFONO, CORREO, DOCUMENTO. POR FAVOR REVISAR'];
            exit(json_encode($response));
        }

        if($array_acces)
        {
            $response = ["message"=>'YA EXISTE UN USUARIO CON ESE NOMBRE DE USUARIO'];
            exit(json_encode($response));
        }

        $pass = $AccessController->encryption($contrasena);

        $UsersModel->createUser($documento,strtoupper($nombre1),strtoupper($nombre2),strtoupper($apellido1),strtoupper($apellido2),$telefono,strtoupper($correo),$sexo,$tipo_docu);
        $AccessModel->crearAccess($nombreUser,$pass,$documento);
        $array_typeDoc = $UsersModel->listTipyDoc();

        $UsersView->addUser($array_typeDoc);

    }

    function adminUsers()
    {
        $Connection = new Connection('sel');
        $UserModel = new UsersModel($Connection);
        $array_users = $UserModel->listUsers();
        $UserView = new UsersView();
        $UserView->adminUsers($array_users);
    }

    function showUser()
    {
        $Connection = new Connection('sel');
        $UserModel = new UsersModel($Connection);
        $AccessModel = new AccessModel($Connection);
        $AccessController = new AccessController();
        $UserView = new UsersView();
        
        $cod = $_POST['id'];
        $array_user = $UserModel->listAdmin($cod);
        $array_acces = $AccessModel->searchAccess($cod);

       

        if(!$array_user OR !$array_acces){
            $response = ["message"=>'ERROR, NO SE ENCUNETRA EL USUARIO'];
            exit(json_encode($response));
        }
        $contra = $AccessController->decryption($array_acces[0]->contrasena); 
        $user = $array_acces[0]->usuario;

        $UserView->showUser($array_user,$user,$contra);

    }

    function showUpdateUser()
    {
        $Connection = new Connection('all');
        $UsersModel = new UsersModel($Connection);
        $AccessModel = new AccessModel($Connection);
        $AccessController = new AccessController();
        $UserView = new UsersView();

        $cod = $_POST['id'];
        $array_user = $UsersModel->listAdmin($cod);
        $array_acces = $AccessModel->searchAccess($cod);

        $lisDoc = $UsersModel->listTipyDoc();

        if(!$lisDoc)
        {
            $response = ["message"=>'LISTA DE TIPO DOCUMENTO NO DISPONIBLE'];
            exit(json_encode($response));
        }

        if(!$array_user OR !$array_acces){
            $response = ["message"=>'ERROR, NO SE ENCUENTRA EL USUARIO'];
            exit(json_encode($response));
        }

        $contra = $AccessController->decryption($array_acces[0]->contrasena);

        $UserView->showUpdateUser($array_user,$array_acces[0]->usuario,$lisDoc,$contra,$array_acces[0]->cod_login);
    }

    function updateUser()
    {
        $Connection = new Connection('all');
        $UserModel = new UsersModel($Connection);
        $UsersView = new UsersView();
        $AccessModel = new AccessModel($Connection);
        $AccessController = new AccessController();

        $nombre1 = $_POST['nombre1'];
        $nombre2 = $_POST['nombre2'];
        $apellido1 = $_POST['apellido1'];
        $apellido2 = $_POST['apellido2'];
        $documento = $_POST['documento'];
        $tipo_documento = $_POST['tipo_documento'];
        $tipo_sexo = $_POST['sexo'];
        $telefono = $_POST['telefono'];
        $correo = $_POST['correo'];
        $contrasena = $_POST['contrasena'];
        $idUser = $_POST['cod_user'];

        $pattern = "/^[a-zA-ZñáéíóúÁÉÍÓÚ]+$/";
        $pattern1 = "/^[[:digit:]]*$/";

        if(!(($tipo_documento == "" OR preg_match($pattern1,$tipo_documento))))
        {
            $response = ["message"=>'SELECIONE UN TIPO DE DOCUMENTO O TIPO DE SEXO'];
            exit(json_encode($response));
        }

        if(!(($nombre2  == "" OR preg_match($pattern,$nombre2)) AND ($apellido2 == "" OR preg_match($pattern,$apellido2))))
        {
            $response = ["message"=>'INGRESE SOLO LETRAS O DEJE EL CAMPO VACIO'];
            exit(json_encode($response));
        }

        if(!(preg_match($pattern,$nombre1)) or !(preg_match($pattern,$apellido1)))
        {
            $response = ["message"=>'INGRESE SOLO LETRAS'];
            exit(json_encode($response));
        }

        if(!(preg_match($pattern1,$telefono)) OR !(preg_match($pattern1,$documento)))
        {
            $response = ["message"=>'INGRESE SOLO NUMEROS '];
            exit(json_encode($response));
        }
        $contrasen = trim($contrasena);
        if(empty($contrasen) OR strlen($contrasen)<8){
            $response = ["message"=>'CAMPO DE CONTRASEÑA VACIO O LA CONTRASEÑA CONTIENE MENOS DE 8 CARACTERES'];
            exit(json_encode($response));
        }

        if(!(filter_var($correo, FILTER_VALIDATE_EMAIL)))
        {
            $response = ["message"=>'INGRESE UN CORREO VALIDO '];
            exit(json_encode($response));
        }

        

        $tel = $UserModel->buscarTelefono($telefono,$documento);
        $corre = $UserModel->buscarCorreo($correo,$documento);

        

        if((($tel) AND ($tel[0]->documento != $documento)))
        {
            $response = ["message"=>'EL TELEFONO YA SE ECUENTRA SIGNADO A OTRO USUARIO'];
            exit(json_encode($response));
        }

        if((($corre) AND ($corre[0]->documento != $documento)))
        {
            $response = ["message"=>'EL CORREO YA SE ECUENTRA SIGNADO A OTRO USUARIO'];
            exit(json_encode($response));
        }

        $pass = $AccessController->encryption($contrasen);

        $UserModel->updateUser($documento,strtoupper($nombre1),strtoupper($nombre2),strtoupper($apellido1),strtoupper($apellido2),$telefono,strtoupper($correo),$tipo_documento,$tipo_sexo);
        $AccessModel->updateContra($pass ,$idUser);

        $this->adminUsers();
    }

    function delateUser()
    {   $Connection = new Connection('all');
        $UsersModel = new UsersModel($Connection);
        $UsersView = new UsersView();

        $cod = $_POST['id'];
        $confit = $_POST['confir'];
        if(!$confit)
        {
            $response = ["message"=>'ERROR AL INTERTAR ELIMINAR EL SUSARIO'];
            exit(json_encode($response));
        }
        $UsersModel->delateUser($cod);
        $this->adminUsers();
    }

    function busquedaFiltro()
    {
        $Connection = new Connection('sel');
        $UsersModel = new UsersModel($Connection);
        $UserView = new UsersView();

        $filtro = $_POST['filtro'];
        $busqueda = $_POST['busqueda'];
        $vista = $_POST['vista'];

        if(empty($filtro) OR empty($busqueda)){
            $response = ["message"=>'SELECIONE UN FILRO DE BUSQUEDA O INGRESE UNA PALABRA CLAVE PARA BUSCAR'];
            exit(json_encode($response));
        }

        $arreglo_busqueda = $UsersModel->busquedaFiltro($filtro,strtoupper($busqueda));

        if(!$arreglo_busqueda){
            $response = ["message"=>'EL USUARIO SOLICITADO NO SE ENCUENTRA REGISTRADO O SELECCIONE OTRO FILTRO'];
            exit(json_encode($response));
        }
        
        if($vista === "lista")
        {
            $UserView->listUsers($arreglo_busqueda);
        }else if($vista === "admin"){
            $UserView->adminUsers($arreglo_busqueda);
        }else{
            $response = ["message"=>'ERROR, VISTA NO ENCONTRADO'];
            exit(json_encode($response));
        }
        
        
    }
}
?>