<?php
class ProductEndModel
{
    private $Conection;

    function __construct($Connection)
    {
        $this->Conection=$Connection;
    }

    function validarCodigo($codigo)
    {
        $sql = "SELECT * FROM mis_tejidos.producto_terminado
        WHERE cod_producto='$codigo'";
        $this->Conection->query($sql);
        return $this->Conection->fetchAll();
    }

    function addProductoEnd($valor,$nombre,$tipoProd,$peso,$precio,$descripcion,$estado)
    {
        $sql = "INSERT INTO mis_tejidos.producto_terminado(
            cod_producto, nombre_producto, tipo_producto, peso_producto, precio, descripcion_producto, foto_producto, estado)
            VALUES ('$valor', '$nombre', '$tipoProd', '$peso', '$precio', '$descripcion', '', '$estado')";
            $this->Conection->query($sql);
    }

    function showListProductEnd()
    {
        $sql = "SELECT * FROM mis_tejidos.producto_terminado";
        $this->Conection->query($sql);
        return $this->Conection->fetchAll();
    }

    function busquedaFiltro($filtro,$busqueda)
    {
        $sql = "SELECT * FROM mis_tejidos.producto_terminado WHERE $filtro='$busqueda'";
        $this->Conection->query($sql);
        return $this->Conection->fetchAll();
    }

    function showProductoEnd($codigo)
    {
        $sql = "SELECT * FROM mis_tejidos.producto_terminado WHERE cod_producto='$codigo'";
        $this->Conection->query($sql);
        return $this->Conection->fetchAll();
    }

    function updateProduct($codigo,$nombre,$tipoProd,$peso,$precio,$descripcion,$estado)
    {
        $sql = "UPDATE mis_tejidos.producto_terminado
        SET nombre_producto='$nombre', tipo_producto='$tipoProd', peso_producto='$peso', precio='$precio', descripcion_producto='$descripcion', estado='$estado'
        WHERE cod_producto='$codigo'";
        $this->Conection->query($sql);
    }
}
?>