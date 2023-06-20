<?php
require_once "views/ProductEndView.php";
require_once "models/ProductEndModel.php";
class ProductEndController
{
    private $productEndView;

    function __construct()
    {
        $this->productEndView = new ProductEndView();
    }

    function showAddProductoEnd()
    {
        $connection = new Connection('sel');
        $productEndModel = new ProductEndModel($connection);

        $this->productEndView->showAddProductoEnd();
    }

    function addProductoEnd()
    {
        $connection = new Connection('all');
        $productEndModel = new ProductEndModel($connection);

        $nombre = $_POST['nombre'];
        $tipoProd = $_POST['tipope'];
        $peso = $_POST['peso'];
        $precio = $_POST['precio'];
        $descripcion = $_POST['descripcion'];
        $estado = $_POST['estado'];

        $pattern1 = "/^[a-zA-Z\s.]+$/"; //solo letras y espacios
        $pattern3 = "/^[[:digit:]]*$/";

        if (empty($nombre)) {
            $response = ["message" => 'INGRESE NOMBRE DEL PRODUCTO'];
            exit(json_encode($response));
        }
        if(!(preg_match($pattern1,$nombre)))
        {
            $response = ["message"=>'INGRESE SOLO LETRAS EN NOMBRE'];
            exit(json_encode($response));
        }
        if(!($tipoProd == 'ROPA' OR $tipoProd == 'ACCESORIO' OR $tipoProd == 'BOLSO'))
        {
            $response = ["message" => 'SELECIONE TIPO DE PRODUCTO'];
            exit(json_encode($response));
        }
        if (empty($peso)) {
            $response = ["message" => 'INGRESE PESO DEL PRODUCTO'];
            exit(json_encode($response));
        }
        if(!(preg_match($pattern3,$peso)))
        {
            $response = ["message"=>'INGRESE SOLO NUMEROS EN PESO'];
            exit(json_encode($response));
        }
        if (empty($precio)) {
            $response = ["message" => 'INGRESE PRECIO DEL PRODUCTO'];
            exit(json_encode($response));
        }
        if(!(preg_match($pattern3,$precio)))
        {
            $response = ["message"=>'INGRESE SOLO NUMEROS EN PRECIO'];
            exit(json_encode($response));
        }
        if(!($descripcion=="") AND !(preg_match($pattern1,$descripcion)))
        {
            $response = ["message"=>'INGRESE SOLO LETRAS EN DESCRIPCION'];
            exit(json_encode($response));
        }
        if(!($estado == 'DISPONIBLE' OR $estado == 'APARTADO'))
        {
            $response = ["message" => 'SELECIONE ESTADO DEL PRODUCTO'];
            exit(json_encode($response));
        }

        $valor = random_int(100, 999);
        $val = $productEndModel->validarCodigo($valor);
        if($val)
        {
            $response = ["message" => 'CODIGO MAL GENERADO'];
            exit(json_encode($response));
        }

        $productEndModel->addProductoEnd($valor,strtoupper($nombre),strtoupper($tipoProd),$peso,$precio,strtoupper($descripcion),strtoupper($estado));

        $this->showAddProductoEnd();
    }

    function showListProductEnd()
    {
        $connection = new Connection('sel');
        $productEndModel = new ProductEndModel($connection);

        $array_product = $productEndModel->showListProductEnd();
        if (!$array_product) {
            $response = ["message" => 'LA INFORMACION NO SE ENCUENTRA DISPONIBLE'];
            exit(json_encode($response));
        }

        $this->productEndView->showListProductEnd($array_product);
    }

    function busquedaFiltro()
    {
        $connection = new Connection('sel');
        $productEndModel = new ProductEndModel($connection);

        $filtro = $_POST['filtro'];
        $busqueda = $_POST['busqueda'];

        $prodcutos = $productEndModel->busquedaFiltro($filtro,strtoupper($busqueda));
        if(!$prodcutos)
        {
            $response = ["message" => 'NO SE ENCUENTRA REGISTRADO EL PRODUCTO O SELECIONE OTRO FILTRO'];
            exit(json_encode($response));
        }

        $this->productEndView->showListProductEnd($prodcutos);

    }

    function showProductoEnd()
    {
        $connection = new Connection('sel');
        $productEndModel = new ProductEndModel($connection);

        $codigo = $_POST['id'];
        $producto = $productEndModel->showProductoEnd($codigo);
        if(!$producto)
        {
            $response = ["message" => 'NO SE ENCUENTRA REGISTRADO'];
            exit(json_encode($response));
        }

        $this->productEndView->showProductoEnd($producto);
    }

    function showUpdateProduct()
    {
        $connection = new Connection('sel');
        $productEndModel = new ProductEndModel($connection);

        $codigo = $_POST['id'];
        $producto = $productEndModel->showProductoEnd($codigo);
        if(!$producto)
        {
            $response = ["message" => 'NO SE ENCUENTRA REGISTRADO'];
            exit(json_encode($response));
        }

        $this->productEndView->showUpdateProduct($producto);
    }

    function updateProduct()
    {
        $connection = new Connection('all');
        $productEndModel = new ProductEndModel($connection);

        $codigo = $_POST['codigo'];
        $nombre = $_POST['nombre'];
        $tipoProd = $_POST['tipope'];
        $peso = $_POST['peso'];
        $precio = $_POST['precio'];
        $descripcion = $_POST['descripcion'];
        $estado = $_POST['estado'];

        $pattern1 = "/^[a-zA-Z\s.]+$/"; //solo letras y espacios
        $pattern3 = "/^[[:digit:]]*$/";

        if (empty($nombre)) {
            $response = ["message" => 'INGRESE NOMBRE DEL PRODUCTO'];
            exit(json_encode($response));
        }
        if(!(preg_match($pattern1,$nombre)))
        {
            $response = ["message"=>'INGRESE SOLO LETRAS EN NOMBRE'];
            exit(json_encode($response));
        }
        if(!($tipoProd == 'ROPA' OR $tipoProd == 'ACCESORIO' OR $tipoProd == 'BOLSOS'))
        {
            $response = ["message" => 'SELECIONE TIPO DE PRODUCTO'];
            exit(json_encode($response));
        }
        if (empty($peso)) {
            $response = ["message" => 'INGRESE PESO DEL PRODUCTO'];
            exit(json_encode($response));
        }
        if(!(preg_match($pattern3,$peso)))
        {
            $response = ["message"=>'INGRESE SOLO NUMEROS EN PESO'];
            exit(json_encode($response));
        }
        if (empty($precio)) {
            $response = ["message" => 'INGRESE PRECIO DEL PRODUCTO'];
            exit(json_encode($response));
        }
        if(!(preg_match($pattern3,$precio)))
        {
            $response = ["message"=>'INGRESE SOLO NUMEROS EN PRECIO'];
            exit(json_encode($response));
        }
        if(!($descripcion=="") AND !(preg_match($pattern1,$descripcion)))
        {
            $response = ["message"=>'INGRESE SOLO LETRAS EN DESCRIPCION'];
            exit(json_encode($response));
        }
        if(!($estado == 'DISPONIBLE' OR $estado == 'APARTADO'))
        {
            $response = ["message" => 'SELECIONE ESTADO DEL PRODUCTO'];
            exit(json_encode($response));
        }
        
        $productEndModel->updateProduct($codigo,strtoupper($nombre),strtoupper($tipoProd),$peso,$precio,strtoupper($descripcion),strtoupper($estado));

        $this->showListProductEnd();
    }
}
?>