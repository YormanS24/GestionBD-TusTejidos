<?php
require_once "views/SalesView.php";
require_once "models/SalesModel.php";
require_once "models/ClientModel.php";
class SalesController
{
    private $salesView;

    function __construct()
    {
        $this->salesView = new SalesView();
    }

    function addFactura()
    {
        $connection = new Connection('sel');
        $salesModel = new SalesModel($connection);
        $clientModel = new ClientModel($connection);

        $documento = $_POST['documento'];
        $time = $_POST['time'];
        $pattern3 = "/^[[:digit:]]*$/";

        if (empty($documento)) {
            $response = ["message" => 'INGRESE DOCUMENTO'];
            exit(json_encode($response));
        }
        if (strlen($documento) > 15) {
            $response = ["message" => 'EXCEDE EL TAMAÑO MAXIMO DEL DOCUMENTO'];
            exit(json_encode($response));
        }
        if (!(preg_match($pattern3, $documento))) {
            $response = ["message" => 'INGRESE SOLO NUMEROS EN DOCUMENTO'];
            exit(json_encode($response));
        }

        $valodacion = json_decode($salesModel->validarFactClient($documento));

        if (!$valodacion) {
            $response = ["message" => 'EL DOCUMENTO DEL CLIENTE NO SE ENCUENTRA REGISTRADO'];
            exit(json_encode($response));
        }
        /*$fecha  = date('Y-m-d');
        $dataTime = ("$fecha $time");
        $salesModel->addFactura($dataTime,$documento);*/
    }

    function addDetalle()
    {
        $connection = new Connection('sel');
        $salesModel = new SalesModel($connection);

        $documento = $_POST['documento'];
        $usuario = $_SESSION['usuario'];
        $total_pago = $_POST['precio'];
        $idProduct = $_POST['id'];
        $ordinal = $_POST['ordinal'];
        $estado = $_POST['estado'];
        $nombreProduct = $_POST['nombreProduct'];
        $tipoProduct = $_POST['tipoProduct'];
        $pattern3 = "/^[[:digit:]]*$/";

        if (empty($documento)) {
            $response = ["message" => 'INGRESE DOCUMENTO'];
            exit(json_encode($response));
        }
        if (strlen($documento) > 15) {
            $response = ["message" => 'EXCEDE EL TAMAÑO MAXIMO DEL DOCUMENTO'];
            exit(json_encode($response));
        }
        if (!(preg_match($pattern3, $documento))) {
            $response = ["message" => 'INGRESE SOLO NUMEROS EN DOCUMENTO'];
            exit(json_encode($response));
        }

        //$codFactura = $salesModel->codFactura();
        //$maxValue = $codFactura[0]->max;
       /* $validadoFac = $salesModel->validarFactClient($documento);
        print_r($validadoFac);
        if (!$validadoFac) {
            $response = ["message" => 'REGISTRE LA FACTURA DEL CLIENTE'];
            exit(json_encode($response));
        }*/
       /* $fecha  = date('Y-m-d');
        $dataTime = ("$fecha $hours");
        $product = $salesModel->productEnd($id);
        $precio = $product[0]->precio;*/
        //salesModel->addDetail($ordinal,$precio,$precio,$dataTime,$id,$maxValue);
        $salesModel->addDetail($documento,$total_pago,$usuario,$ordinal,$estado,$idProduct,$nombreProduct,$tipoProduct);
       //$this->showDetail($maxValue);
    }

    function showDetail($codFactura)
    {
        $connection = new Connection('sel');
        $salesModel = new SalesModel($connection);

        $facDetail = $salesModel->showDetail($codFactura);
        $suma = $salesModel->totalSuma($codFactura);
        $this->salesView->showDetail($facDetail,$suma );
    }

    function showPrdoductSale()
    {
        $connection = new Connection('sel');
        $salesModel = new SalesModel($connection);

        $product = $salesModel->showProductSale();
        if (!$product) {
           $response = ["message" => 'PRODUCTOS PARA LA VENTA NO DISPONOBLES'];
           exit(json_encode($response));
        }

        $this->salesView->showPrdoductSale($product);
    }

    function generateFactura()
    {
        $connection = new Connection('sel');
        $salesModel = new SalesModel($connection);

        $estado = $_POST['estado'];
        /*$arrayDetail = $_POST['array'];

        $array = explode(",",$arrayDetail);

        $codFactura = $salesModel->codFactura();
        $maxValue = $codFactura[0]->max;

        $suma = $salesModel->totalSuma($maxValue);
        $total = $suma[0]->sum;
        $salesModel->updateEstado($estado,$maxValue,$total);*/
        

        if($estado == 'APROBADA')
        {

            $salesModel->updateProductEnd($array[$i]);
            /*for($i = 0;$i<count($array);$i++)
            {
                
            }*/
        }

        //$arregloFactura = $salesModel->generateFactura($maxValue);

        $this->salesView->generateFactura($arregloFactura);
    }

    function deleteDetail()
    {   $connection = new Connection('sel');
        $salesModel = new SalesModel($connection);

        $cod = $_POST['id'];
        $confit = $_POST['confir'];
        $codFactura = $_POST['factura'];
        
        if(!$confit)
        {
            $response = ["message"=>'ERROR AL INTERTAR ELIMINAR EL DETALLE'];
            exit(json_encode($response));
        }

        $salesModel->deleteDetail($codFactura,$cod);
        $suma = $salesModel->totalSuma($codFactura);

        $facDetail = $salesModel->showDetail($codFactura);
        $this->salesView->showDetail($facDetail,$suma);
    }

    function listaFactura()
    {
        $connection = new Connection('sel');
        $salesModel = new SalesModel($connection);
        $arreglo  = $salesModel->listFactura();
        if (!$arreglo) {
            $response = ["message" => 'ERROR AL CONSULTAR LA LISTA DE FACTURAS'];
            exit(json_encode($response));
        }
        $this->salesView->listFactura($arreglo);
    }

    function filtroBusqueda()
    {
        $connection = new Connection('sel');
        $salesModel = new SalesModel($connection); 

        $filtro = $_POST['filtro'];
        $busqueda = $_POST['busqueda'];

        if(empty($filtro) OR empty($busqueda)){
            $response = ["message"=>'SELECIONE UN FILRO DE BUSQUEDA O INGRESE UNA PALABRA CLAVE PARA BUSCAR'];
            exit(json_encode($response));
        }
        
        $arregloFac = $salesModel->filtroBus($filtro,strtoupper($busqueda));
        if(!$arregloFac){
            $response = ["message"=>'LA FACTURA SOLICITADA NO SE ENCUENTRA REGISTRADA O SELECCIONE OTRO FILTRO'];
            exit(json_encode($response));
        }
        $this->salesView->listFactura($arregloFac);
    }

    function showFactura()
    {
        $connection = new Connection('sel');
        $salesModel = new SalesModel($connection);

        $id = $_POST['id'];
        $array = $salesModel->generateFactura($id);

        if(!$array)
        {
            $response = ["message" => 'ERROR AL CONSULTAR LA FACTURA'];
            exit(json_encode($response));
        }
        $this->salesView->showFactura($array);
    }

}
