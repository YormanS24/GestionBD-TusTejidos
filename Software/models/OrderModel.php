<?php
class OrderModel
{
    private $Conection;

    function __construct($Connection)
    {
        $this->Conection=$Connection;
    }

    function addOrder($fecha,$tipo_pedido,$descripcion,$precio,$abono,$documento,$estado)
    {
        $sql = "INSERT INTO mis_tejidos.pedido(
            cod_pedido, fecha_pedido, tipo_pedido, descripcion_pedido, precio_pedido, abono_pedido, documento_cliente, estado)
            VALUES (default, '$fecha', '$tipo_pedido', '$descripcion', '$precio', '$abono', '$documento', '$estado');";
        $this->Conection->query($sql);
    }

    function listOrder()
    {
        $sql = "SELECT * FROM mis_tejidos.pedido";
        $this->Conection->query($sql);
        return $this->Conection->fetchAll();
    }

    function filtroOrder($filtro,$busqueda)
    {
        $sql = "SELECT * FROM mis_tejidos.pedido WHERE $filtro='$busqueda'";
        $this->Conection->query($sql);
        return $this->Conection->fetchAll();
    }

    function showOrder($id)
    {
        $sql = "SELECT p.*,CONCAT(c.nombre1_cliente,' ',c.nombre2_cliente,' ',c.apellido1_cliente,' ',c.apellido2_cliente) AS nombre_cliente
        FROM mis_tejidos.pedido p 
        INNER JOIN mis_tejidos.cliente c ON (p.documento_cliente = c.documento_cliente)
        WHERE cod_pedido='$id'";
        $this->Conection->query($sql);
        return $this->Conection->fetchAll();
    }

    function updateOrder($codigo,$tipo_pedido,$descripcion,$precio,$abono,$documento,$estado)
    {
        $sql = "UPDATE mis_tejidos.pedido
        SET tipo_pedido='$tipo_pedido', descripcion_pedido='$descripcion', precio_pedido='$precio', 
        abono_pedido='$abono', documento_cliente='$documento', estado='$estado'
        WHERE cod_pedido='$codigo'";
        $this->Conection->query($sql);
    }
}
?>