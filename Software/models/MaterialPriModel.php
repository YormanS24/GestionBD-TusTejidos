<?php
class MaterialPriModel
{
    private $Conection;

    function __construct($Connection)
    {
        $this->Conection = $Connection;
    }

    function listMaterialPri()
    {
        $sql = "SELECT p.*,mpri.*,mm.*,cm.*
        FROM mis_tejidos.mateial_proveedor mp,mis_tejidos.proveedor p,mis_tejidos.materia_prima mpri,
        mis_tejidos.marca_material mm,mis_tejidos.color_material cm
        WHERE mp.nit_proveedor=p.nit_proveedor 
        AND mp.tipo_material=mpri.tipo_material 
        AND mp.marca_material=mpri.marca_material
        AND mp.color_material=mpri.color_material
        AND mp.peso_material=mpri.peso_material
        AND mp.marca_material=mm.cod_marca
        AND mp.color_material=cm.cod_color";
        $this->Conection->query($sql);
        return $this->Conection->fetchAll();
    }

    function marcasMaterial(){
        $sql = "SELECT * FROM mis_tejidos.marca_material";
        $this->Conection->query($sql);
        return $this->Conection->fetchAll();
    }

    function colorMaterial(){
        $sql = "SELECT * FROM mis_tejidos.color_material";
        $this->Conection->query($sql);
        return $this->Conection->fetchAll();
    }

    function proveMate($proveedor,$tipo_materia,$marca_material,$color,$peso)
    {
        $sql = "SELECT * FROM mis_tejidos.mateial_proveedor
        WHERE nit_proveedor='$proveedor' 
        AND tipo_material='$tipo_materia'
        AND marca_material='$marca_material'
        AND color_material='$color'
        AND peso_material='$peso'";
        $this->Conection->query($sql);
        return $this->Conection->fetchAll();
    }

    function addMaterial($tipo_materia,$marca_material,$color,$lote,$cantidad,$peso,$precio,$descrip)
    {
        $sql = "INSERT INTO mis_tejidos.materia_prima(tipo_material, marca_material, color_material, lote_material, cantidad_material, peso_material, precio_material, descripcion_material, foto_material)
            VALUES ('$tipo_materia', '$marca_material', '$color', '$lote', '$cantidad','$peso' , '$precio', '$descrip', '')";
            $this->Conection->query($sql);
    }

    function addProveMate($proveedor,$fecha,$tipo_materia,$marca_material,$color,$peso)
    {
        $sql = "INSERT INTO mis_tejidos.mateial_proveedor(
            nit_proveedor,fecha_regristo,tipo_material,marca_material,color_material,peso_material)
            VALUES ('$proveedor', '$fecha', '$tipo_materia','$marca_material','$color','$peso');";
        $this->Conection->query($sql);
    }

    function listproveMate()
    {
        $sql = "SELECT p.*,mpri.*,mm.*,cm.*
        FROM mis_tejidos.mateial_proveedor mp,mis_tejidos.proveedor p,mis_tejidos.materia_prima mpri,
        mis_tejidos.marca_material mm,mis_tejidos.color_material cm
        WHERE mp.nit_proveedor=p.nit_proveedor 
        AND mp.tipo_material=mpri.tipo_material 
        AND mp.marca_material=mpri.marca_material
        AND mp.color_material=mpri.color_material
        AND mp.peso_material=mpri.peso_material
        AND mp.marca_material=mm.cod_marca
        AND mp.color_material=cm.cod_color";
        $this->Conection->query($sql);
        return $this->Conection->fetchAll();
    }

    function busquedaFiltro2($filtro, $busqueda)
    {
        $sql = "SELECT p.*,mpri.*,mm.*,cm.*
        FROM mis_tejidos.mateial_proveedor mp INNER JOIN mis_tejidos.proveedor p ON (mp.nit_proveedor=p.nit_proveedor )
        INNER JOIN mis_tejidos.materia_prima mpri ON (mp.tipo_material=mpri.tipo_material 
        AND mp.marca_material=mpri.marca_material AND mp.color_material=mpri.color_material
        AND mp.peso_material=mpri.peso_material)
        INNER JOIN mis_tejidos.marca_material mm ON (mp.marca_material=mm.cod_marca)
        INNER JOIN mis_tejidos.color_material cm ON (mp.color_material=cm.cod_color)
        WHERE mpri.$filtro='$busqueda'";
        $this->Conection->query($sql);
        return $this->Conection->fetchAll();
    }

    function busquedaFiltro1($filtro, $busqueda)
    {
        $sql = "SELECT p.*,mpri.*,mm.*,cm.*
        FROM mis_tejidos.mateial_proveedor mp INNER JOIN mis_tejidos.proveedor p ON (mp.nit_proveedor=p.nit_proveedor )
        INNER JOIN mis_tejidos.materia_prima mpri ON (mp.tipo_material=mpri.tipo_material 
        AND mp.marca_material=mpri.marca_material AND mp.color_material=mpri.color_material
        AND mp.peso_material=mpri.peso_material)
        INNER JOIN mis_tejidos.marca_material mm ON (mp.marca_material=mm.cod_marca)
        INNER JOIN mis_tejidos.color_material cm ON (mp.color_material=cm.cod_color)
        WHERE p.$filtro='$busqueda'";
        $this->Conection->query($sql);
        return $this->Conection->fetchAll();
    }

    function sharMaterial($tipo_material, $cod_marca, $cod_color, $peso,$nit)
    {
        $sql = "SELECT p.*,mpri.*,mm.*,cm.*,mp.fecha_regristo,ciu.nombre_ciudad
        FROM mis_tejidos.mateial_proveedor mp,mis_tejidos.proveedor p,mis_tejidos.materia_prima mpri,
        mis_tejidos.marca_material mm,mis_tejidos.color_material cm, mis_tejidos.ciudad ciu
        WHERE mpri.tipo_material='$tipo_material'
        AND mpri.marca_material='$cod_marca'
        AND mpri.color_material='$cod_color'
        AND mpri.peso_material='$peso'
        AND mm.cod_marca='$cod_marca'
        AND cm.cod_color='$cod_color'
        AND p.nit_proveedor='$nit'
        AND p.cod_ciudad=ciu.cod_ciudad
        AND mp.tipo_material='$tipo_material'
        AND mp.marca_material='$cod_marca'
        AND mp.color_material='$cod_color'
        AND mp.peso_material='$peso'
        AND mp.nit_proveedor='$nit'";
        $this->Conection->query($sql);
        return $this->Conection->fetchAll();
    }

    function updateMateria1($tipo_material,$cantidad,$marca,$color,$peso,$precio,$descripcion,$tipo_material1,$marca1,$color1,$peso1)
    {
        $sql = "UPDATE mis_tejidos.materia_prima
        SET tipo_material='$tipo_material',cantidad_material='$cantidad', peso_material='$peso', precio_material='$precio', descripcion_material='$descripcion', marca_material='$marca', color_material='$color'
        WHERE tipo_material='$tipo_material1' 
        AND marca_material='$marca1'
        AND color_material='$color1'
        AND peso_material='$peso1'";
        $this->Conection->query($sql);
    }    

    function sharMateria($tipo_materia,$marca_material,$color,$peso)
    {
        $sql = "SELECT * FROM  mis_tejidos.materia_prima
        WHERE tipo_material='$tipo_materia'AND marca_material='$marca_material' AND color_material='$color' AND peso_material='$peso'";
        $this->Conection->query($sql);
        return $this->Conection->fetchAll();
    }

    function reporteMateriaPrima()
    {
        $sql = "SELECT mp.*,p.*,mm.nombre_marca,cm.nombre_color,c.nombre_ciudad
        FROM mis_tejidos.materia_prima mp 
        INNER JOIN mis_tejidos.mateial_proveedor mpro ON (mp.tipo_material=mpro.tipo_material) 
        AND (mp.marca_material=mpro.marca_material) AND (mp.color_material=mpro.color_material)
        INNER JOIN mis_tejidos.proveedor p ON (p.nit_proveedor = mpro.nit_proveedor)
        INNER JOIN mis_tejidos.marca_material mm ON (mm.cod_marca = mp.marca_material)
        INNER JOIN mis_tejidos.color_material cm ON (cm.cod_color = mp.color_material)
        INNER JOIN mis_tejidos.ciudad c ON (c.cod_pais = p.cod_pais) AND (c.cod_departamento=p.cod_departamento) 
        AND (c.cod_ciudad=p.cod_ciudad)
        WHERE mp.cantidad_material<20";
        $this->Conection->query($sql);
        return $this->Conection->fetchAll();
    }
}
