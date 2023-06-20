<?php
require_once "models/ProvidersModel.php";
require_once "views/ProvidersView.php";

class ProvidersController
{

    private $providersView;

    function __construct()
    {
        $Connection = new Connection('sel');
        $this->providersView = new ProvidersView();
    }

    function listProver()
    {
        $connection = new Connection('sel');
        $providersModel = new ProvidersModel($connection);
        $listProver = $providersModel->listProver();
        $this->providersView->listProver($listProver);
    }

    function busquedaFiltro()
    {
        $Connection = new Connection('sel');
        $providersModel = new ProvidersModel($Connection);

        $filtro = $_POST['filtro'];
        $busqueda = $_POST['busqueda'];
        $vista = $_POST['vista'];

        if (empty($filtro) or empty($busqueda)) {
            $response = ["message" => 'SELECIONE UN FILRO DE BUSQUEDA O INGRESE UNA PALABRA CLAVE PARA BUSCAR'];
            exit(json_encode($response));
        }

        $arreglo_busqueda = $providersModel->busquedaFiltro($filtro, strtoupper($busqueda));

        if (!$arreglo_busqueda) {
            $response = ["message" => 'EL PROVEEDOR SOLICITADO NO SE ENCUENTRA REGISTRADO O SELECCIONE OTRO FILTRO'];
            exit(json_encode($response));
        }

        if ($vista === "lista") {
            $this->providersView->listProver($arreglo_busqueda);
        } else if ($vista === "admin") {
            $this->providersView->showListProver($arreglo_busqueda);
        } else {
            $response = ["message" => 'ERROR, VISTA NO ENCONTRADO'];
            exit(json_encode($response));
        }
    }

    function showAddProver()
    {
        $Connection = new Connection('sel');
        $providersModel = new ProvidersModel($Connection);

        $arreglo_pais = $providersModel->listPais();
        //$arreglo_pais = $providersModel->ciudad();

        if (!$arreglo_pais) {
            $response = ["message" => 'ERROR LAS CUIDADES NO SE ENCUENTRAN DISNOBLES EN ESTE MOMENTO'];
            exit(json_encode($response));
        }

        $this->providersView->showAddProver($arreglo_pais);
    }

    function showDepartamento()
    {
        $Connection = new Connection('sel');
        $providersModel = new ProvidersModel($Connection);

        $pais = $_POST['pais'];


        $arreglo_depar = $providersModel->listDepartamento($pais);

        if (!$arreglo_depar) {
            $response = ["message" => 'ERROR LOS DEPARTAMENTOS NO SE ENCUENTRAN DISPONIBLES'];
            exit(json_encode($response));
        }
        echo (json_encode($arreglo_depar));
    }

    function lisCiudad()
    {
        $Connection = new Connection('sel');
        $providersModel = new ProvidersModel($Connection);

        $ciudad = $_POST['ciudad'];

        $arreglo_ciudad = $providersModel->listCiudad($ciudad);

        if (!$arreglo_ciudad) {
            $response = ["message" => 'LAS CIUDADES SOLICITADAS NO SE ENCUENTRAN DISPONIBLES'];
            exit(json_encode($response));
        }

        echo (json_encode($arreglo_ciudad));
    }

    function addProvider()
    {
        $Connection = new Connection('all');
        $providersModel = new ProvidersModel($Connection);

        $nit_proveedor = $_POST['nit'];
        $nombre_completo = $_POST['nombre'];
        $tipo_pro = $_POST['tipo_prover'];
        $direccion_pro = $_POST['dirreccion'];
        $telefono = $_POST['telefono'];
        $correo = $_POST['correo'];
        $ciudad = $_POST['ciudad'];
        $departamento = $_POST['depar'];


        $pattern = "/^[0-9]+$/"; //solo letras y numeros
        $pattern1 = "/^[a-zA-Z\s.]+$/"; //solo letras y espacios
        $pattern2 = "/^[a-zA-Z0-9#-]+$/"; //direciones
        $pattern3 = "/^[[:digit:]]*$/";

        if ((empty($nit_proveedor) or empty($nombre_completo) or empty($tipo_pro) or empty($direccion_pro) or empty($telefono) or empty($ciudad)) or empty($departamento)) {
            $response = ["message" => 'FALTAN CAMPOS POR DILENGENCIAR'];
            exit(json_encode($response));
        }

        if (!preg_match($pattern, $nit_proveedor) or strlen($nit_proveedor) > 11) {
            $response = ["message" => 'INGRESE UN NIT VALIDO'];
            exit(json_encode($response));
        }

        if (!(preg_match($pattern1, $nombre_completo))) {
            $response = ["message" => 'INGRESE UN NOMBRE VALIDO'];
            exit(json_encode($response));
        }

        if (($tipo_pro != "DISTRIBUIDOR") and ($tipo_pro != "FABRICA")) {
            $response = ["message" => 'TIPO DE PROVEEDOR NO VALIDO'];
            exit(json_encode($response));
        }

        if (!($correo == "") and !(filter_var($correo, FILTER_VALIDATE_EMAIL))) {
            $response = ["message" => 'INGRESE UN CORREO VALIDO '];
            exit(json_encode($response));
        }

        if (!$direccion_pro == "" and !preg_match($pattern2, $direccion_pro)) {
            $response = ["message" => 'INGRESE UNA DIRRECION VALIDA '];
            exit(json_encode($response));
        }

        if (!preg_match($pattern3, $telefono) or strlen($telefono) >= 18) {
            $response = ["message" => 'INGRESE UN NUMERO DE CELULAR VALIDO '];
            exit(json_encode($response));
        }

        if (!preg_match($pattern3, $departamento)) {
            $response = ["message" => 'SELECIONE UN DEPARTAMENTO VALIDO'];
            exit(json_encode($response));
        }

        if (!preg_match($pattern3, $ciudad)) {
            $response = ["message" => 'SELECIONE UNA CIUDAD VALIDA'];
            exit(json_encode($response));
        }


        $arr_nit = $providersModel->validarNit(strtoupper($nit_proveedor));
        if ($arr_nit) {
            $response = ["message" => 'YA SE ESTE NIT ASIGNADO A UN PROVEEDOR'];
            exit(json_encode($response));
        }

        $arr_correo = $providersModel->validarCorreo(strtoupper($correo));
        if ($arr_correo and $arr_correo[0]->correo_proveedor != "") {
            $response = ["message" => 'YA SE ESTE CORREO ASIGNADO A UN PROVEEDOR'];
            exit(json_encode($response));
        }

        $arr_direc = $providersModel->validarDireecion(strtoupper($direccion_pro));
        if ($arr_direc) {
            $response = ["message" => 'YA SE ESTA DIRECCION ASIGNADO A UN PROVEEDOR'];
            exit(json_encode($response));
        }

        $fecha  = date('Y-m-d');


        $providersModel->addProvider(strtoupper($nit_proveedor), strtoupper($nombre_completo), strtoupper($tipo_pro), strtoupper($direccion_pro), $telefono, strtoupper($correo), $fecha, $departamento, $ciudad);

        //$arreglo_pais = $providersModel->ciudad();
        //$this->providersView->showAddProver($arreglo_pais);
    }

    function showListProver()
    {
        $Connection = new Connection('sel');
        $providersModel = new ProvidersModel($Connection);
        $listProver = $providersModel->listProver();
        $this->providersView->showListProver($listProver);
    }

    function showProvider()
    {
        $Connection = new Connection('sel');
        $providersModel = new ProvidersModel($Connection);

        $cod_provvedor = $_POST['id'];
        $listProver = $providersModel->listProvider($cod_provvedor);

        if (!$listProver) {
            $response = ["message" => 'ERROR, NO SE ENCUNETRA EL PROVEEDOR EN EL SISTEMA'];
            exit(json_encode($response));
        }
        $this->providersView->showProvider($listProver);
    }

    function showUpdateProvider()
    {
        $Connection = new Connection('sel');
        $providersModel = new ProvidersModel($Connection);

        $cod_provvedor = $_POST['id'];
        $listProver = $providersModel->listProvider($cod_provvedor);

        $arreglo_depar = $providersModel->listDepartamento('170');

        if (!$listProver) {
            $response = ["message" => 'ERROR, NO SE ENCUNETRA EL PROVEEDOR EN EL SISTEMA'];
            exit(json_encode($response));
        }

        if (!$arreglo_depar) {
            $response = ["message" => 'ERROR, NO SE ENCUNETRA LOS DEPARTAMENTOS DISPONIBLES EN EL SISTEMA'];
            exit(json_encode($response));
        }

        $this->providersView->showUpdateProvider($listProver, $arreglo_depar);
    }

    function updateProvider()
    {
        $Connection = new Connection('all');
        $providersModel = new ProvidersModel($Connection);

        $nit_proveedor = $_POST['nit'];
        $nombre_completo = $_POST['nombre'];
        $tipo_pro = $_POST['tipo_prover'];
        $direccion_pro = $_POST['dirreccion'];
        $telefono = $_POST['telefono'];
        $correo = $_POST['correo'];
        $ciudad = $_POST['ciudad'];
        $departamento = $_POST['depar'];

        $pattern = "/^[0-9]+$/"; //solo letras y numeros
        $pattern1 = "/^[a-zA-Z\s.]+$/"; //solo letras y espacios
        $pattern2 = "/^[a-zA-Z0-9#-]+$/"; //direciones
        $pattern3 = "/^[[:digit:]]*$/";


        if ((empty($nit_proveedor) or empty($nombre_completo) or empty($tipo_pro) or empty($direccion_pro) or empty($telefono) or empty($ciudad)) or empty($departamento)) {
            $response = ["message" => 'FALTAN CAMPOS POR DILENGENCIAR'];
            exit(json_encode($response));
        }

        if (!preg_match($pattern, $nit_proveedor) or strlen($nit_proveedor) > 11) {
            $response = ["message" => 'INGRESE UN NIT VALIDO'];
            exit(json_encode($response));
        }

        if (!(preg_match($pattern1, $nombre_completo))) {
            $response = ["message" => 'INGRESE UN NOMBRE VALIDO'];
            exit(json_encode($response));
        }

        if (($tipo_pro != "DISTRIBUIDOR") and ($tipo_pro != "FABRICA")) {
            $response = ["message" => 'TIPO DE PROVEEDOR NO VALIDO'];
            exit(json_encode($response));
        }

        if (!($correo == "") and !(filter_var($correo, FILTER_VALIDATE_EMAIL))) {
            $response = ["message" => 'INGRESE UN CORREO VALIDO '];
            exit(json_encode($response));
        }

        if (!preg_match($pattern2, $direccion_pro)) {
            $response = ["message" => 'INGRESE UNA DIRRECION VALIDA '];
            exit(json_encode($response));
        }

        if (!preg_match($pattern3, $telefono) or strlen($telefono) >= 18) {
            $response = ["message" => 'INGRESE UN NUMERO DE CELULAR VALIDO '];
            exit(json_encode($response));
        }

        if (!preg_match($pattern3, $departamento)) {
            $response = ["message" => 'SELECIONE UN DEPARTAMENTO VALIDO'];
            exit(json_encode($response));
        }

        if (!preg_match($pattern3, $ciudad)) {
            $response = ["message" => 'SELECIONE UNA CIUDAD VALIDA'];
            exit(json_encode($response));
        }

        $arr_correo = $providersModel->validarCorreo(strtoupper($correo));
        if ($arr_correo and ($nit_proveedor != $arr_correo[0]->nit_proveedor)) {
            $response = ["message" => 'YA SE ESTE CORREO ASIGNADO A UN PROVEEDOR'];
            exit(json_encode($response));
        }

        $arr_direc = $providersModel->validarDireecion(strtoupper($direccion_pro));
        if ($arr_direc and ($nit_proveedor != $arr_direc[0]->nit_proveedor)) {
            $response = ["message" => 'YA SE ESTA DIRECCION ASIGNADO A UN PROVEEDOR'];
            exit(json_encode($response));
        }

        $providersModel->updateProvider($nit_proveedor, strtoupper($nombre_completo), strtoupper($tipo_pro), strtoupper($direccion_pro), $telefono, strtoupper($correo), $departamento, $ciudad);

        $this->showListProver();
    }
}
