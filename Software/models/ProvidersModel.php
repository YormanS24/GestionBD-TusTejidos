<?php

class ProvidersModel
{

    private $Conection;

    function __construct($Connection)
    {
        $this->Conection = $Connection;
    }

    function listProver()
    {
        $sql = "SELECT pro.*, ciu.nombre_ciudad FROM mis_tejidos.proveedor pro, mis_tejidos.ciudad ciu WHERE pro.cod_pais = ciu.cod_pais AND pro.cod_departamento = ciu.cod_departamento AND pro.cod_ciudad = ciu.cod_ciudad";
        $this->Conection->query($sql);
        return $this->Conection->fetchAll();
    }

    function busquedaFiltro($filtro,$busqueda)
    {
        $sql = "SELECT pro.*, ciu.nombre_ciudad FROM mis_tejidos.proveedor pro, mis_tejidos.ciudad ciu WHERE $filtro='$busqueda' AND pro.cod_pais = ciu.cod_pais AND pro.cod_departamento = ciu.cod_departamento AND pro.cod_ciudad = ciu.cod_ciudad";
        $this->Conection->query($sql);
        return $this->Conection->fetchAll();
    }

    function validarNit($nit)
    {
        $sql = "SELECT nit_proveedor FROM mis_tejidos.proveedor WHERE nit_proveedor = '$nit'";
        $this->Conection->query($sql);
        return $this->Conection->fetchAll();
    }

    function validarCorreo($correo)
    {
        $sql = "SELECT nit_proveedor,correo_proveedor FROM mis_tejidos.proveedor WHERE correo_proveedor = '$correo'";
        $this->Conection->query($sql);
        return $this->Conection->fetchAll();
    }

    function validarDireecion($direccion)
    {
        $sql = "SELECT nit_proveedor FROM mis_tejidos.proveedor WHERE direccion_proveedor = '$direccion'";
        $this->Conection->query($sql);
        return $this->Conection->fetchAll();
    }

    function addProvider($nit_proveedor,$nombre_completo,$tipo_pro,$direccion_pro,$telefono,$correo,$fecha,$cod_departamento,$ciudad)
    {
        $sql = "INSERT INTO mis_tejidos.proveedor (nit_proveedor, nombre_proveedor, tipo_proveedor, direccion_proveedor, telefono_proveedor, correo_proveedor, fecha_registro_proveedor, cod_pais, cod_departamento, cod_ciudad)
            VALUES ('$nit_proveedor','$nombre_completo','$tipo_pro','$direccion_pro','$telefono','$correo','$fecha ','170','$cod_departamento','$ciudad');";
        $this->Conection->query($sql);
    }

    function listProvider($cod_provvedor)
    {
        $sql = "SELECT pro.*, ciu.nombre_ciudad, dep.nombre_departamento FROM mis_tejidos.proveedor pro, mis_tejidos.ciudad ciu,mis_tejidos.departamento dep WHERE nit_proveedor='$cod_provvedor' AND pro.cod_pais = ciu.cod_pais AND pro.cod_departamento = ciu.cod_departamento AND pro.cod_departamento = dep.cod_departamento AND  pro.cod_ciudad = ciu.cod_ciudad";
        $this->Conection->query($sql);
        return $this->Conection->fetchAll();
    }

    function updateProvider($cod_provvedor,$nombre_completo,$tipo_pro,$direccion_pro,$telefono,$correo,$depart,$ciudad)
    {
        $sql = "UPDATE mis_tejidos.proveedor SET nombre_proveedor='$nombre_completo', tipo_proveedor='$tipo_pro', direccion_proveedor='$direccion_pro', telefono_proveedor='$telefono', correo_proveedor='$correo', cod_pais='170', cod_departamento='$depart',  cod_ciudad='$ciudad' WHERE nit_proveedor='$cod_provvedor'";
        $this->Conection->query($sql);
    }

    function listProviders()
    {
        $sql = "SELECT nit_proveedor, nombre_proveedor FROM mis_tejidos.proveedor";
        $this->Conection->query($sql);
        return $this->Conection->fetchAll();
    }

    function updateMateProver($cod_proveedor,$tipo_material1,$marca1,$color1,$peso1,$cod_proveedor1)
    {
        $sql = "UPDATE mis_tejidos.mateial_proveedor SET nit_proveedor='$cod_proveedor' 
        WHERE nit_proveedor='$cod_proveedor1'
        AND tipo_material='$tipo_material1'
        AND marca_material='$marca1'
        AND color_material='$color1'
        AND peso_material='$peso1'";
        $this->Conection->query($sql);
    }

    function listPais()
    {
        $sql = "SELECT * FROM mis_tejidos.pais";
        $this->Conection->query($sql);
        return $this->Conection->fetchAll();
    }

    function listDepartamento($pais)
    {
        $sql = "SELECT * FROM mis_tejidos.departamento WHERE cod_pais='170'";
        $this->Conection->query($sql);
        return $this->Conection->fetchAll();
    }

    function listCiudad($depar)
    {
        $sql = "SELECT * FROM mis_tejidos.ciudad WHERE cod_departamento='$depar'";
        $this->Conection->query($sql);
        return $this->Conection->fetchAll();
    }


}

?>