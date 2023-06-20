<?php
class SalesModel
{
    private $Conection;

    function __construct($Connection)
    {
        $this->Conection=$Connection;
    }

    function showProductSale()
    {
        try {
            $connection = new Connection();
            $result = $connection->query("finished_product");

            $documents = [];

            foreach ($result as $document) {
                $documents[] = $document;
            }

            if(is_null($documents)){
                exit("SIN DATOS");
            }

            return $documents;
            
        } catch (Exception $e) {
            printf($e->getMessage());
        }
    }

    function addFactura($date,$documento)
    {
        $sql = "INSERT INTO mis_tejidos.factura(fecha_factura,documento_cliente)
            VALUES ('$date','$documento')";
        $this->Conection->query($sql);
        return $this->Conection->fetchAll(); 
    }

    function codFactura()
    {
        $sql = "SELECT max(cod_factura) FROM mis_tejidos.factura";
        $this->Conection->query($sql);
        return $this->Conection->fetchAll();
    }

    function validarFactClient($documento)
    {
        try {
            $connection = new Connection();

            $salida = null;

            $filtro =[
                'documento'=>"$documento"
            ];

            $result = $connection->query("customer",$filtro);

            foreach($result AS $document){
                $salida = json_encode($document->jsonSerialize());
            }

            return $salida;
            
        } catch (Exception $e) {
            printf($e->getMessage());
        }
    }

    function productEnd($codigo)
    {
        $sql = "SELECT * FROM mis_tejidos.producto_terminado WHERE cod_producto='$codigo'";
        $this->Conection->query($sql);
        return $this->Conection->fetchAll();
    }

    function addDetail($documento,$total_pago,$usuario,$ordinal,$estado,$idProduct,$nombreProduct,$tipoProduct)
    {
        $connection = new Connection();

        $primary = [
            'documento'=>"$documento"
        ];

        $actualizar = [
            '$push'=>[
                'factura'=>[
                    'fecha_factura'=> "09/09/2023",
                    'total_factura'=>"$total_pago",
                    'usuario'=>"$usuario",
                    'estado_factura'=>"$estado",
                    'detalle_factura'=>[
                        'ordinal'=>"$ordinal",
                        'cantidad'=>1,
                        'precio_venta'=>"$total_pago",
                        'sub_venta'=>"$total_pago",
                        'fecha_detalle'=>"09/09/2023",
                        'id_producto'=>"$idProduct",
                        'nombre_producto'=>"$nombreProduct",
                        'tipo_producto'=>"$tipoProduct"
                    ]
                ]
            ]
        ];

        $connection->queryUpdate("customer",$primary,$actualizar);
    }

    function showDetail($codFactura)
    {
        $sql = "SELECT * FROM mis_tejidos.detalle
        WHERE cod_factura='$codFactura'";
        $this->Conection->query($sql);
        return $this->Conection->fetchAll();
    }

    function totalSuma($codFactura)
    {
        $sql = "SELECT SUM(subtotal) FROM mis_tejidos.detalle WHERE cod_factura='$codFactura'";
        $this->Conection->query($sql);
        return $this->Conection->fetchAll();
    }

    function deleteDetail($codFactura,$ordinal)
    {
        $sql = "DELETE FROM mis_tejidos.detalle WHERE cod_factura='$codFactura' AND ordinal='$ordinal'";
        $this->Conection->query($sql);
    }

    function updateEstado($estado,$codFactura,$total)
    {
        $sql = "UPDATE mis_tejidos.factura SET estado='$estado', total_factura='$total' WHERE cod_factura='$codFactura'";
        $this->Conection->query($sql);
    }
    
    function generateFactura($codFactura)
    {
        $sql = "SELECT CONCAT(c.nombre1_cliente,' ',c.nombre2_cliente,' ',c.apellido1_cliente,' ',c.apellido2_cliente) AS nombre_cliente, c.documento_cliente,f.estado as estado_factura, f.*,d.*,p.*
        FROM mis_tejidos.cliente c,mis_tejidos.factura f,mis_tejidos.detalle d,mis_tejidos.producto_terminado p
        WHERE c.documento_cliente=f.documento_cliente AND f.cod_factura=d.cod_factura AND d.cod_producto=p.cod_producto AND f.cod_factura='$codFactura'";
        $this->Conection->query($sql);
        return $this->Conection->fetchAll();
    }

    function updateProductEnd($codProduct)
    {
        $sql = "UPDATE mis_tejidos.producto_terminado SET estado='NO DISPONIBLE' WHERE cod_producto='$codProduct'";
        $this->Conection->query($sql);
    }

    function listFactura()
    {
        $sql = "SELECT * FROM mis_tejidos.factura";
        $this->Conection->query($sql);
        return $this->Conection->fetchAll();
    }

    function filtroBus($filtro,$buqueda)
    {
        $sql = "SELECT * FROM mis_tejidos.factura WHERE $filtro='$buqueda'";
        $this->Conection->query($sql);
        return $this->Conection->fetchAll();
    }
    
}

?>