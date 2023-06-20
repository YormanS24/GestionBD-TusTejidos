<?php

require_once "models/MaterialPriModel.php";
require_once "models/ProvidersModel.php";
require_once "views/MaterialPriView.php";

class MaterialPriController
{
    private $materialPriView;

    function __construct()
    {
        $Connection = new Connection('sel');
        $this->materialPriView = new MaterialPriView();
    }

    function listMaterialPri()
    {
        $connection = new Connection('sel');
        $materialModel = new MaterialPriModel($connection);
        $listProver = $materialModel->listMaterialPri();
        $this->materialPriView->listMaterialPri($listProver);
    }

    function busquedaFiltro()
    {
        $connection = new Connection('sel');
        $materialModel = new MaterialPriModel($connection);

        $filtro = $_POST['filtro'];
        $busqueda = $_POST['busqueda'];
        $vista = $_POST['vista'];

        if (empty($filtro) or empty($busqueda)) {
            $response = ["message" => 'SELECIONE UN FILRO DE BUSQUEDA O INGRESE UNA PALABRA CLAVE PARA BUSCAR'];
            exit(json_encode($response));
        }


        if ($vista === "lista") {

            if($filtro == "nombre_proveedor")
            {
                $arreglo_busqueda = $materialModel->busquedaFiltro1($filtro, strtoupper($busqueda));
            }else
            {
                $arreglo_busqueda = $materialModel->busquedaFiltro2($filtro, strtoupper($busqueda));
            }

            if (!$arreglo_busqueda) {
                $response = ["message" => 'LA MATERIA PRIMA SOLICITADA NO SE ENCUENTRA REGISTRADA O SELECCIONE OTRO FILTRO'];
                exit(json_encode($response));
            }
            $this->materialPriView->listMaterialPri($arreglo_busqueda);

        } else if ($vista === "admin") {

            if (($filtro == "tipo_material") or ($filtro == "peso_material") or ($filtro == "precio_material")) {
                $arreglo_busqueda = $materialModel->busquedaFiltro2($filtro, strtoupper($busqueda));
            } else {
                $arreglo_busqueda = $materialModel->busquedaFiltro1($filtro, strtoupper($busqueda));
            }

            if (!$arreglo_busqueda) {
                $response = ["message" => 'EL USUARIO SOLICITADO NO SE ENCUENTRA REGISTRADO O SELECCIONE OTRO FILTRO'];
                exit(json_encode($response));
            }
            $this->materialPriView->showListMaterial($arreglo_busqueda);
        } else {
            $response = ["message" => 'ERROR, VISTA NO ENCONTRADO'];
            exit(json_encode($response));
        }
    }

    function showAddMaterial()
    {
        $connection = new Connection('sel');
        $materialModel = new MaterialPriModel($connection);
        $providerModel = new ProvidersModel($connection);

        $arreglo_marca = $materialModel->marcasMaterial();
        $arreglo_color = $materialModel->colorMaterial();
        $arreglo_proveedor = $providerModel->listProviders();

        if (!$arreglo_marca) {
            $response = ["message" => 'ERROR LAS MARCAS NO ESTAN DISPONIBLES EN ESTE MOMENTO'];
            exit(json_encode($response));
        }

        if (!$arreglo_color) {
            $response = ["message" => 'ERROR LOS COLORES NO ESTAN DISPONIBLES EN ESTE MOMENTO'];
            exit(json_encode($response));
        }

        if (!$arreglo_proveedor) {
            $response = ["message" => 'ERROR LOS PROVEEDORES NO ESTAN DISPONIBLES EN ESTE MOMENTO'];
            exit(json_encode($response));
        }

        $this->materialPriView->showAddMaterial($arreglo_marca, $arreglo_color, $arreglo_proveedor);
    }

    function addMaterial()
    {
        $connection = new Connection('all');
        $materialModel = new MaterialPriModel($connection);
        $providerModel = new ProvidersModel($connection);

        $tipo_materia = $_POST['tipo_material'];
        $marca_material = $_POST['marca'];
        $color = $_POST['color'];
        $proveedor = $_POST['proveedor'];
        $lote = $_POST['lote'];
        $cantidad = $_POST['cantidad'];
        $peso = $_POST['peso'];
        $precio = $_POST['precio'];
        $descrip = $_POST['descripcion'];

        $pattern = "/^[a-zA-Z0-9]+$/"; //solo letras y numeros
        $pattern1 = "/^[a-zA-Z\s.]+$/"; //solo letras y espacios
        $pattern3 = "/^[[:digit:]]*$/";

        if (empty($tipo_materia) or empty($marca_material) or empty($color) or empty($proveedor) or empty($lote) or empty($cantidad) or empty($peso) or empty($precio)) {
            $response = ["message" => 'FALTAN CAMPOS POR DILENGENCIAR'];
            exit(json_encode($response));
        }


        if (!preg_match($pattern1, $tipo_materia)) {
            $response = ["message" => 'TIPO DE MATERIA INCORRECTO'];
            exit(json_encode($response));
        }

        if (!preg_match($pattern3, $marca_material) or !preg_match($pattern3, $color) or !preg_match($pattern3, $proveedor)) {
            $response = ["message" => 'COLOR O MARCA O PROVEEDOR SON INCORRECTOS'];
            exit(json_encode($response));
        }

        if (!preg_match($pattern, $lote)) {
            $response = ["message" => 'ERROR, INGRESE SOLO NUMEROS Y LETRAS EN LOTE'];
            exit(json_encode($response));
        }

        if (!preg_match($pattern3, $cantidad)) {
            $response = ["message" => 'ERROR, INGRESE SOLO NUMEROS EN CANTIDAD'];
            exit(json_encode($response));
        }

        if (!preg_match($pattern3, $peso)) {
            $response = ["message" => 'ERROR, INGRESE SOLO NUMEROS EN PESO'];
            exit(json_encode($response));
        }

        if (!preg_match($pattern3, $precio)) {
            $response = ["message" => 'ERROR, INGRESE SOLO NUMEROS EN PRECIO'];
            exit(json_encode($response));
        }

        if (!($descrip == "") and !preg_match($pattern1, $descrip)) {
            $response = ["message" => 'ERROR, INGRESE SOLO LETRAS EN LA DESCRIPCION'];
            exit(json_encode($response));
        }

        $materia_prima = $materialModel->sharMateria($tipo_materia, $marca_material, $color, $peso);
        if ($materia_prima) {
            $response = ["message" => 'YA SE ENCUENTRA REGISTRADA LA MEATRIA PRIMA'];
            exit(json_encode($response));
        }

        $promate = $materialModel->proveMate($proveedor, $tipo_materia, $marca_material, $color, $peso);
        if ($promate) {
            $response = ["message" => 'YA SE ENCUENTRA REGISTRADO ESTA MATERIA PRUMA CON EL MISMO PROVEEDOR'];
            exit(json_encode($response));
        }

        $fecha  = date('Y-m-d');

        $materialModel->addMaterial(strtoupper($tipo_materia), $marca_material, $color, strtoupper($lote), $cantidad, $peso, $precio, $descrip);
        $materialModel->addProveMate($proveedor, $fecha, $tipo_materia, $marca_material, $color, $peso);

        $arreglo_marca = $materialModel->marcasMaterial();
        $arreglo_color = $materialModel->colorMaterial();
        $arreglo_proveedor = $providerModel->listProviders();


        $this->materialPriView->showAddMaterial($arreglo_marca, $arreglo_color, $arreglo_proveedor);
    }

    function showListMaterial()
    {
        $connection = new Connection('all');
        $materialModel = new MaterialPriModel($connection);

        $arreglo_materiPro = $materialModel->listproveMate();
        if (!$arreglo_materiPro) {
            $response = ["message" => 'ERROR NO SE ENCUEBTRAN LA MATERIA PRIMA DISPONIBLE'];
            exit(json_encode($response));
        }
        $this->materialPriView->showListMaterial($arreglo_materiPro);
    }

    function showMaterial()
    {
        $connection = new Connection('all');
        $materialModel = new MaterialPriModel($connection);

        $tipo_material = $_POST['tipo'];
        $cod_marca = $_POST['marca'];
        $cod_color = $_POST['color'];
        $peso = $_POST['peso'];
        $nit = $_POST['nit'];

        $arreglo_material = $materialModel->sharMaterial($tipo_material, $cod_marca, $cod_color, $peso, $nit);

        if (!$arreglo_material) {
            $response = ["message" => 'ERROR NO SE PUEDE ENCONTRAR LA MATERIA SELECIONADA'];
            exit(json_encode($response));
        }

        $this->materialPriView->showMaterial($arreglo_material);
    }

    function showUpdateMaterial()
    {
        $connection = new Connection('all');
        $materialModel = new MaterialPriModel($connection);
        $providerModel = new ProvidersModel($connection);

        $tipo_material = $_POST['tipo'];
        $cod_marca = $_POST['marca'];
        $cod_color = $_POST['color'];
        $peso = $_POST['peso'];
        $nit = $_POST['nit'];

        $arreglo_material = $materialModel->sharMaterial($tipo_material, $cod_marca, $cod_color, $peso, $nit);
        $arreglo_marca = $materialModel->marcasMaterial();
        $arreglo_color =  $materialModel->colorMaterial();
        $arreg_proveedor = $providerModel->listProver();

        if (!$arreglo_material) {
            $response = ["message" => 'ERROR NO SE PUEDE ENCONTRAR LA MATERIA SELECIONADA'];
            exit(json_encode($response));
        }

        if (!$arreglo_marca) {
            $response = ["message" => 'ERROR NO SE PUEDE ENCONTRAR LAS MARCAS'];
            exit(json_encode($response));
        }

        if (!$arreglo_color) {
            $response = ["message" => 'ERROR NO SE PUEDE ENCONTRAR LOS COLORES SOLICITADOS'];
            exit(json_encode($response));
        }
        $this->materialPriView->showUpdateMaterial($arreglo_material, $arreglo_marca, $arreglo_color, $arreg_proveedor);
    }

    function updateMaterial()
    {
        $connection = new Connection('all');
        $materialModel = new MaterialPriModel($connection);
        $providersModel = new ProvidersModel($connection);

        $cod_proveedor = $_POST['proveedor'];
        $tipo_material = $_POST['tipo_material'];
        $cantidad = $_POST['cantidad'];
        $marca = $_POST['marca'];
        $color = $_POST['color'];
        $peso = $_POST['peso'];
        $precio = $_POST['precio'];
        $descripcion = $_POST['des'];

        $tipo_material1 = $_POST['tipo_material1'];
        $marca1 = $_POST['marca1'];
        $color1 = $_POST['color1'];
        $peso1 = $_POST['peso1'];
        $cod_proveedor1 = $_POST['proveedor1'];
        $cantidad1 = $_POST['cantidad1'];


        $pattern = "/^[a-zA-Z0-9]+$/"; //solo letras y numeros
        $pattern1 = "/^[a-zA-Z\s.]+$/"; //solo letras y espacios
        $pattern3 = "/^[[:digit:]]*$/";

        if (empty($cod_proveedor) or empty($tipo_material) or empty($cantidad) or empty($peso) or empty($precio) or empty($peso) or empty($marca) or empty($color)) {
            $response = ["message" => 'FALTAN CAMPOS POR DILENGENCIAR'];
            exit(json_encode($response));
        }

        if (!preg_match($pattern1, $tipo_material) or !preg_match($pattern1, $tipo_material1)) {
            $response = ["message" => 'TIPO DE MATERIA INCORRECTA'];
            exit(json_encode($response));
        }

        if (!preg_match($pattern3, $cantidad)) {
            $response = ["message" => 'ERROR, INGRESE SOLO NUMEROS EN CANTIDAD'];
            exit(json_encode($response));
        }

        if (!preg_match($pattern3, $cod_proveedor)) {
            $response = ["message" => 'ERROR, SELECIONE UN PROVEEDOR'];
            exit(json_encode($response));
        }

        if (!preg_match($pattern3, $peso) or !preg_match($pattern3, $peso1)) {
            $response = ["message" => 'ERROR, INGRESE SOLO NUMEROS EN PESO'];
            exit(json_encode($response));
        }

        if (!preg_match($pattern3, $precio)) {
            $response = ["message" => 'ERROR, INGRESE SOLO NUMEROS EN PRECIO'];
            exit(json_encode($response));
        }

        if (!preg_match($pattern3, $marca) or !preg_match($pattern3, $marca1)) {
            $response = ["message" => 'ERROR, SELECCIONE UNA MARCA VALIDA'];
            exit(json_encode($response));
        }

        if (!preg_match($pattern3, $color) or !preg_match($pattern3, $color1)) {
            $response = ["message" => 'ERROR, SELECCIONE UN COLOR VALIDA'];
            exit(json_encode($response));
        }


        if (!($descripcion == "") and !preg_match($pattern1, $descripcion)) {
            $response = ["message" => 'ERROR, INGRESE SOLO LETRAS EN LA DESCRIPCION'];
            exit(json_encode($response));
        }

        $materia_prima = $materialModel->sharMateria($tipo_material, $marca, $color, $peso);
        if (($tipo_material != $tipo_material1) or ($marca != $marca1) or ($color != $color1) or ($peso != $peso1)) {
            if ($materia_prima) {
                $response = ["message" => 'YA SE ENCUENTRA REGISTRADA LA MEATRIA PRIMA'];
                exit(json_encode($response));
            }
        }

        if ($cantidad1 != $cantidad) {
            $sum = $cantidad1 + $cantidad;
            $materialModel->updateMateria1($tipo_material, $sum, $marca, $color, $peso, $precio, $descripcion, $tipo_material1, $marca1, $color1, $peso1);
        } else {
            $materialModel->updateMateria1($tipo_material, $cantidad, $marca, $color, $peso, $precio, $descripcion, $tipo_material1, $marca1, $color1, $peso1);
        }


        if ($cod_proveedor != $cod_proveedor1) {
            $providersModel->updateMateProver($cod_proveedor, $tipo_material1, $marca1, $color1, $peso1, $cod_proveedor1);
        }

        $this->showListMaterial();
    }

    function reportMateriaPrima()
    {
        $connection = new Connection('all');
        $materialModel = new MaterialPriModel($connection);

        $reporte = $materialModel->reporteMateriaPrima();

        if(!$reporte){
            $response = ["message" => 'LA CANTIDAD DE TODA LA MATERIA PRIMA TIENE STOCK SUFICIENTE'];
            exit(json_encode($response));
        }
        $this->materialPriView->reporteMateriaPrima($reporte);
    }
}
