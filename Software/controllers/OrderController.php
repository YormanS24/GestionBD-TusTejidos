<?php
require_once "views/OrderView.php";
require_once "models/OrderModel.php";
require_once "models/ClientModel.php";
class OrderController
{
    private $orderView;

    function __construct()
    {
        $this->orderView = new OrderView();
    }

    function showAddOrder()
    {
        $connection = new Connection('sel');
        $OrderModel = new OrderModel($connection);
        $this->orderView->showAddOrder();
    }

    function addOrder()
    {
        $connection = new Connection('all');
        $OrderModel = new OrderModel($connection);
        $clientModel = new ClientModel($connection);

        $tipo_pedido = $_POST['tipope'];
        $descripcion = $_POST['descripcion'];
        $precio = $_POST['precio'];
        $abono = $_POST['abono'];
        $documento = $_POST['documento'];
        $estado = $_POST['estado'];

        $pattern1 = "/^[a-zA-Z\s.]+$/"; //solo letras y espacios
        $pattern3 = "/^[[:digit:]]*$/";

        if (empty($tipo_pedido)) {
            $response = ["message" => 'SELECION TIPO DE PEDIDO'];
            exit(json_encode($response));
        }
        if (!($tipo_pedido=="ROPA" OR $tipo_pedido=="ACCESORIO" OR $tipo_pedido=="BOLSO")) {
            $response = ["message" => 'SELECION DE TIPO DE PEDIDO ALTERADA'];
            exit(json_encode($response));
        }
        if (empty($descripcion)) {
            $response = ["message" => 'INGRESE UNA DESCRIPCION'];
            exit(json_encode($response));
        }
        if(!(preg_match($pattern1,$descripcion)))
        {
            $response = ["message"=>'INGRESE SOLO LETRAS EN DESCRIPCION'];
            exit(json_encode($response));
        }
        if (empty($precio)) {
            $response = ["message" => 'INGRESE PRECIO DEL PEDIDO'];
            exit(json_encode($response));
        }
        if(!(preg_match($pattern3,$precio)))
        {
            $response = ["message"=>'INGRESE SOLO NUMEROS EN PRECIO'];
            exit(json_encode($response));
        }
        if(!(preg_match($pattern3,$abono)))
        {
            $response = ["message"=>'INGRESE SOLO NUMEROS EN ABONO'];
            exit(json_encode($response));
        }
        if(!($abono >= 15000))
        {
            $response = ["message"=>'EL MONTO MINIMO A ABONAR ES DE: 15000'];
            exit(json_encode($response));
        }
        if (empty($documento)) {
            $response = ["message" => 'INGRESE DOCUMENTO'];
            exit(json_encode($response));
        }
        if(!(preg_match($pattern3,$documento)))
        {
            $response = ["message"=>'INGRESE SOLO NUMEROS EN DOCUMENTO'];
            exit(json_encode($response));
        }
        if (empty($estado)) {
            $response = ["message" => 'SELECIONE ESTADO DEL PEDIDO'];
            exit(json_encode($response));
        }
        if (!($estado=="FABRICACION")) {
            $response = ["message" => 'LISTA DE ESTADOS ALTERADOS'];
            exit(json_encode($response));
        }
        
        $client =  $clientModel->sharchDocumento($documento);
        if (!$client) {
            $response = ["message" => 'EL CLIENTE NO SE ENCUENTRA REGISTRADO: PROCEDA A REGISTRARLO'];
            exit(json_encode($response));
        }
        if($abono>$precio)
        {
            $response = ["message" => 'EL ABONO EXCEDE EL PRECIO DEL PEDIDO'];
            exit(json_encode($response)); 
        }

        $fecha  = date('Y-m-d');

        $OrderModel->addOrder($fecha,strtoupper($tipo_pedido),strtoupper($descripcion),$precio,$abono,$documento,strtoupper($estado));

    }

    function showListOrder()
    {
        $connection = new Connection('all');
        $OrderModel = new OrderModel($connection);

        $arr_order = $OrderModel->listOrder();

        if(!$arr_order)
        {
            $response = ["message" => 'ERROR EN LA CONSULTA DE PEDIDOS'];
            exit(json_encode($response));
        }
        $this->orderView->showListOrder($arr_order);
    }

    function filtroBusqueda()
    {
        $connection = new Connection('all');
        $OrderModel = new OrderModel($connection);

        $filtro = $_POST['filtro'];
        $busqueda = $_POST['busqueda'];

        $pedido = $OrderModel->filtroOrder($filtro,strtoupper($busqueda));

        if(!$pedido)
        {
            $response = ["message" => 'PEDIDO NO ENCONTRADO O SELECIONE OTRO TIPO DE FILTRO'];
            exit(json_encode($response));
        }
        $this->orderView->showListOrder($pedido);
    }

    function showOrder()
    {
        $connection = new Connection('all');
        $OrderModel = new OrderModel($connection);

        $id = $_POST['id'];

        $pedido = $OrderModel->showOrder($id);
        if(!$pedido)
        {
            $response = ["message" => 'NO FUE POSIBLE CONSULTAR EL PEDIDO'];
            exit(json_encode($response));
        }
        $this->orderView->showOrder($pedido);
    }

    function showOrderUpdate()
    {
        $connection = new Connection('all');
        $OrderModel = new OrderModel($connection);

        $id = $_POST['id'];

        $pedido = $OrderModel->showOrder($id);
        if(!$pedido)
        {
            $response = ["message" => 'NO FUE POSIBLE CONSULTAR EL PEDIDO'];
            exit(json_encode($response));
        }
        $this->orderView->showUpdateOrder($pedido);
    }

    function updateOrder()
    {
        $connection = new Connection('all');
        $OrderModel = new OrderModel($connection);

        $codigo = $_POST['codigo'];
        $tipo_pedido = $_POST['tipo'];
        $descripcion = $_POST['descripcion'];
        $precio = $_POST['precio'];
        $abono = $_POST['abono'];
        $documento = $_POST['documento'];
        $estado = $_POST['estado'];

        $pattern1 = "/^[a-zA-Z\s.]+$/"; //solo letras y espacios
        $pattern3 = "/^[[:digit:]]*$/";

        if (empty($codigo)) {
            $response = ["message" => 'ALTERADO EL CODIGO DEL PEDIDO'];
            exit(json_encode($response));
        }
        if(!(preg_match($pattern3,$codigo)))
        {
            $response = ["message"=>'INGRESE SOLO NUMEROS EN CODIGO'];
            exit(json_encode($response));
        }
        if (empty($tipo_pedido)) {
            $response = ["message" => 'SELECION TIPO DE PEDIDO'];
            exit(json_encode($response));
        }
        if (!($tipo_pedido=="ROPA" OR $tipo_pedido=="ACCESORIO" OR $tipo_pedido=="BOLSO")) {
            $response = ["message" => 'SELECION DE TIPO DE PEDIDO ALTERADA'];
            exit(json_encode($response));
        }
        if (empty($descripcion)) {
            $response = ["message" => 'INGRESE UNA DESCRIPCION'];
            exit(json_encode($response));
        }
        if(!(preg_match($pattern1,$descripcion)))
        {
            $response = ["message"=>'INGRESE SOLO LETRAS EN DESCRIPCION'];
            exit(json_encode($response));
        }
        if (empty($precio)) {
            $response = ["message" => 'INGRESE PRECIO DEL PEDIDO'];
            exit(json_encode($response));
        }
        if(!(preg_match($pattern3,$precio)))
        {
            $response = ["message"=>'INGRESE SOLO NUMEROS EN PRECIO'];
            exit(json_encode($response));
        }
        if (empty($abono)) {
            $response = ["message" => 'INGRESE ABONO DEL PEDIDO'];
            exit(json_encode($response));
        }
        if(!(preg_match($pattern3,$abono)))
        {
            $response = ["message"=>'INGRESE SOLO NUMEROS EN ABONO'];
            exit(json_encode($response));
        }
        if(!($abono >= 15000))
        {
            $response = ["message"=>'EL MONTO MINIMO A ABONAR ES DE: 15000'];
            exit(json_encode($response));
        }
        if (empty($documento)) {
            $response = ["message" => 'INGRESE DOCUMENTO'];
            exit(json_encode($response));
        }
        if(!(preg_match($pattern3,$documento)))
        {
            $response = ["message"=>'INGRESE SOLO NUMEROS EN DOCUMENTO'];
            exit(json_encode($response));
        }
        if (empty($estado)) {
            $response = ["message" => 'SELECIONE ESTADO DEL PEDIDO'];
            exit(json_encode($response));
        }
        if (!($estado=="FABRICACION" OR $estado=="TERMINADO") OR $estado=="CANCELADO") {
            $response = ["message" => 'LISTA DE ESTADOS ALTERADOS'];
            exit(json_encode($response));
        }
        if($abono>$precio)
        {
            $response = ["message" => 'EL ABONO EXCEDE EL PRECIO DEL PEDIDO'];
            exit(json_encode($response)); 
        }

        $OrderModel->updateOrder($codigo,strtoupper($tipo_pedido),strtoupper($descripcion),$precio,$abono,$documento,strtoupper($estado));
        $this->showListOrder();
    }
}
?>