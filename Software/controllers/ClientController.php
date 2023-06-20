<?php
require_once "views/ClientView.php";
require_once "models/ClientModel.php";
class ClientController
{
    private $clientView;

    function __construct()
    {
        $this->clientView = new ClientView();
    }

    function showAddClient()
    {
        $connection = new Connection('sel');
        $clientModel = new ClientModel($connection);
        
        //$arr_tipoDoc = $clientModel->tipoDoc();
        //$arr_pais = $clientModel->listPais();

        $this->clientView->addClient();
    }

    function addClient()
    {
        $connection = new Connection('sel');
        $clientModel = new ClientModel($connection);

        $nombre1 = $_POST['nombre1'];
        $nombre2 = $_POST['nombre2'];
        $apellido1 = $_POST['apellido1'];
        $apellido2 = $_POST['apellido2'];
        $documento = $_POST['documento'];
        $sexo = $_POST['sexo'];
        //$tipo_docu = $_POST['tipo_documento'];
        $telefono = $_POST['telefono'];
        $correo = $_POST['correo'];
        $direccion = $_POST['dirreccion'];
        //$ciudad = $_POST['ciudad'];
        //$departamento = $_POST['depar'];
        //$pais = $_POST['pais'];

        $pattern1 = "/^[a-zA-Z\s.]+$/"; //solo letras y espacios
        $pattern3 = "/^[[:digit:]]*$/";

        if (empty($nombre1)) {
            $response = ["message" => 'INGRESE PRIMER NOMBRE'];
            exit(json_encode($response));
        }
        if(!(preg_match($pattern1,$nombre1)))
        {
            $response = ["message"=>'INGRESE SOLO LETRAS EN NOMBRE'];
            exit(json_encode($response));
        }
        if (empty($apellido1)) {
            $response = ["message" => 'INGRESE PRIMER APELLIDO'];
            exit(json_encode($response));
        }
        if(!(preg_match($pattern1,$nombre1)))
        {
            $response = ["message"=>'INGRESE SOLO LETRAS EN APELLIDO'];
            exit(json_encode($response));
        }
        /*if (empty($tipo_docu)) {
            $response = ["message" => 'INGRESE TIPO DE DOCUMENTO'];
            exit(json_encode($response));
        }
        if(!(preg_match($pattern3,$tipo_docu)))
        {
            $response = ["message"=>'INGRESE SOLO NUMEROS EN TIPO DE DOCUMENTO'];
            exit(json_encode($response));
        }*/
        if (empty($documento)) {
            $response = ["message" => 'INGRESE DOCUMENTO'];
            exit(json_encode($response));
        }
        if(strlen($documento)>15)
        {
            $response = ["message"=>'EXCEDE EL TAMAÑO MAXIMO DEL DOCUMENTO'];
            exit(json_encode($response));
        }
        if(!(preg_match($pattern3,$documento)))
        {
            $response = ["message"=>'INGRESE SOLO NUMEROS EN DOCUMENTO'];
            exit(json_encode($response));
        }
        if(!($sexo == 'M' OR $sexo == 'F' OR $sexo == 'I'))
        {
            $response = ["message" => 'SELECIONE TIPO DE SEXO'];
            exit(json_encode($response));
        }
        if (empty($telefono)) {
            $response = ["message" => 'INGRESE TELEFONO'];
            exit(json_encode($response));
        }
        if(strlen($telefono)>15)
        {
            $response = ["message"=>'EXCEDE EL TAMAÑO MAXIMO DEL TELEFONO'];
            exit(json_encode($response));
        }
        if(!(preg_match($pattern3,$telefono)))
        {
            $response = ["message"=>'INGRESE SOLO NUMEROS EN TELEFONO'];
            exit(json_encode($response));
        }
        if (empty($correo)) {
            $response = ["message" => 'INGRESE CORREO'];
            exit(json_encode($response));
        }
        if (!(filter_var($correo, FILTER_VALIDATE_EMAIL))) {
            $response = ["message" => 'INGRESE UN CORREO VALIDO '];
            exit(json_encode($response));
        }

        if (empty($direccion)) {
            $response = ["message" => 'INGRESE DIRECCION'];
            exit(json_encode($response));
        }

       /*if ($pais==='SELECCIONE...') {
            $response = ["message" => 'SELECIONE PAIS'];
            exit(json_encode($response));
        }

        if ($departamento==='SELECCIONE...') {
            $response = ["message" => 'SELECIONE DEPARTAMENTO'];
            exit(json_encode($response));
        }
        if (!preg_match($pattern3, $departamento)) {
            $response = ["message" => 'SELECIONE UN DEPARTAMENTO VALIDO'];
            exit(json_encode($response));
        }
        if ($ciudad==='SELECCIONE...') {
            $response = ["message" => 'SELECIONE CIUDAD'];
            exit(json_encode($response));
        }
        if (!preg_match($pattern3, $ciudad)) {
            $response = ["message" => 'SELECIONE UNA CIUDAD VALIDA'];
            exit(json_encode($response));
        }*/
        if(!($nombre2  == "" OR preg_match($pattern1,$nombre2)))
        {
            $response = ["message"=>'INGRESE SOLO LETRAS EN SEGUNDO NOMBRE O DEJE EL CAMPO VACIO'];
            exit(json_encode($response));
        }
        if(!($apellido2  == "" OR preg_match($pattern1,$apellido2)))
        {
            $response = ["message"=>'INGRESE SOLO LETRAS EN SEGUNDO APELLIDO O DEJE EL CAMPO VACIO'];
            exit(json_encode($response));
        }

        /*$val_doc = $clientModel->sharchDocumento($documento);
        if ($val_doc) {
            $response = ["message" => 'EL DOCUMENTO INGRESADO YA SE ENCUENTRA REGISTRADO'];
            exit(json_encode($response));
        }*/

        $clientModel->addCliente(strtoupper($nombre1),strtoupper($nombre2),strtoupper($apellido1),strtoupper($apellido2),
        $documento,strtoupper($sexo),$telefono,strtoupper($correo),strtoupper($direccion));

        $this->showAddClient();
    }

    function showListClient()
    {
        $connection = new Connection('sel');
        $clientModel = new ClientModel($connection); 
        $list_client = $clientModel->listClient();
        $this->clientView->showListClient($list_client);
    }

    function filtroBusqueda()
    {
        $connection = new Connection('sel');
        $clientModel = new ClientModel($connection); 

        $filtro = $_POST['filtro'];
        $busqueda = $_POST['busqueda'];
        
        if($filtro != "nombre_ciudad")
        {
            $arr_client = $clientModel->filtroBusqueda(strtoupper($filtro),strtoupper($busqueda));
            if (!$arr_client) {
                $response = ["message" => 'EL CLIENTE SOLICITADO NO SE ENCUENTRA REGISTRADO O SELECCIONE OTRO FILTRO'];
                exit(json_encode($response));
            }
            $this->clientView->showListClient($arr_client);
        }else if($filtro == "nombre_ciudad")
        {
            $arr_client = $clientModel->filtroBusquedaCiu(($filtro),strtoupper($busqueda));
            if (!$arr_client) {
                $response = ["message" => 'ELL CLIENTE SOLICITADO NO SE ENCUENTRA REGISTRADO O SELECCIONE OTRO FILTRO'];
                exit(json_encode($response));
            }
            $this->clientView->showListClient($arr_client);
        }else
        {
            $response = ["message" => '!!! EL CODOGO FUE ALTERADO ¡¡¡'];
            exit(json_encode($response));
        }
    }

    function showClient()
    {
        $connection = new Connection('sel');
        $clientModel = new ClientModel($connection);

        $id = $_POST['id'];
        $client =   json_decode($clientModel->showCient($id));
        if(!$client)
        {
            $response = ["message" => 'ERROR AL CONSULTAR EL CLIENTE'];
            exit(json_encode($response));
        }
        $this->clientView->showCient($client);
    }

    function showUpdateClient()
    {
        $connection = new Connection('sel');
        $clientModel = new ClientModel($connection);

        $id = $_POST['id'];
        $client = json_decode($clientModel->showCient($id));
        //$arr_tipoDoc = $clientModel->tipoDoc();
        //$arr_pais = $clientModel->listPais();
        if(!$client)
        {
            $response = ["message" => 'ERROR AL CONSULTAR EL CLIENTE'];
            exit(json_encode($response));
        }
        /*if(!$arr_pais)
        {
            $response = ["message" => 'NO SE ENCUENTRAN DISPONIBLES LOS PAISES'];
            exit(json_encode($response));
        }
        if(!$arr_tipoDoc)
        {
            $response = ["message" => 'NO SE ENCUENTRAN DISPONIBLES LOS TIPOS DE DOCUMENTOS'];
            exit(json_encode($response));
        }*/
        $this->clientView->showUpdateClient($client);
    }

    function updateClient()
    {
        $connection = new Connection('sel');
        $clientModel = new ClientModel($connection);

        $nombre1 = $_POST['nombre1'];
        $nombre2 = $_POST['nombre2'];
        $apellido1 = $_POST['apellido1'];
        $apellido2 = $_POST['apellido2'];
        $documento = $_POST['documento'];
        $doc = $_POST['docactu'];
        $sexo = $_POST['sexo'];
        //$tipo_docu = $_POST['tipo_documento'];
        $telefono = $_POST['telefono'];
        $correo = $_POST['correo'];
        $direccion = $_POST['direccion'];
        //$ciudad = $_POST['ciudad'];
        //$departamento = $_POST['depar'];
        //$pais = ['pais'];

        $pattern1 = "/^[a-zA-Z\s.]+$/"; //solo letras y espacios
        $pattern3 = "/^[[:digit:]]*$/";

        if (empty($nombre1)) {
            $response = ["message" => 'INGRESE PRIMER NOMBRE'];
            exit(json_encode($response));
        }
        if(!(preg_match($pattern1,$nombre1)))
        {
            $response = ["message"=>'INGRESE SOLO LETRAS EN NOMBRE'];
            exit(json_encode($response));
        }
        if (empty($apellido1)) {
            $response = ["message" => 'INGRESE PRIMER APELLIDO'];
            exit(json_encode($response));
        }
        if(!(preg_match($pattern1,$nombre1)))
        {
            $response = ["message"=>'INGRESE SOLO LETRAS EN APELLIDO'];
            exit(json_encode($response));
        }
        /*if (empty($tipo_docu)) {
            $response = ["message" => 'INGRESE TIPO DE DOCUMENTO'];
            exit(json_encode($response));
        }
        if(!(preg_match($pattern3,$tipo_docu)))
        {
            $response = ["message"=>'INGRESE SOLO NUMEROS EN TIPO DE DOCUMENTO'];
            exit(json_encode($response));
        }*/
        if (empty($documento)) {
            $response = ["message" => 'INGRESE DOCUMENTO'];
            exit(json_encode($response));
        }
        if(strlen($documento)>12)
        {
            $response = ["message"=>'EXCEDE EL TAMAÑO MAXIMO DEL DOCUMENTO'];
            exit(json_encode($response));
        }
        if(!(preg_match($pattern3,$documento)))
        {
            $response = ["message"=>'INGRESE SOLO NUMEROS EN DOCUMENTO'];
            exit(json_encode($response));
        }
        if(!($sexo == 'M' OR $sexo == 'F' OR $sexo == 'I'))
        {
            $response = ["message" => 'SELECIONE TIPO DE SEXO'];
            exit(json_encode($response));
        }
        if (empty($telefono)) {
            $response = ["message" => 'INGRESE TELEFONO'];
            exit(json_encode($response));
        }
        if(strlen($telefono)>13)
        {
            $response = ["message"=>'EXCEDE EL TAMAÑO MAXIMO DEL TELEFONO'];
            exit(json_encode($response));
        }
        if(!(preg_match($pattern3,$telefono)))
        {
            $response = ["message"=>'INGRESE SOLO NUMEROS EN TELEFONO'];
            exit(json_encode($response));
        }
        if (!($correo == "") and !(filter_var($correo, FILTER_VALIDATE_EMAIL))) {
            $response = ["message" => 'INGRESE UN CORREO VALIDO '];
            exit(json_encode($response));
        }

        if (empty($direccion)) {
            $response = ["message" => 'INGRESE DIRECCION'];
            exit(json_encode($response));
        }

        if(!($nombre2  == "" OR preg_match($pattern1,$nombre2)))
        {
            $response = ["message"=>'INGRESE SOLO LETRAS EN SEGUNDO NOMBRE O DEJE EL CAMPO VACIO'];
            exit(json_encode($response));
        }
        if(!($apellido2  == "" OR preg_match($pattern1,$apellido2)))
        {
            $response = ["message"=>'INGRESE SOLO LETRAS EN SEGUNDO APELLIDO O DEJE EL CAMPO VACIO'];
            exit(json_encode($response));
        }

        
        /*if (!($documento === $doc)) {
            $val_doc = $clientModel->sharchDocumento($documento);
            if($val_doc)
            {
                $response = ["message" => 'EL DOCUMENTO INGRESADO YA SE ENCUENTRA REGISTRADO'];
                exit(json_encode($response));
            }
            
        }*/

        $clientModel->updateClient(strtoupper($nombre1),strtoupper($nombre2),strtoupper($apellido1),strtoupper($apellido2),
        $documento,strtoupper($sexo),$telefono,strtoupper($correo),strtoupper($direccion),$doc);

        $this->showListClient();
    }
}

?>