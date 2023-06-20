<?php
class ClientModel
{
    private $Conection;

    function __construct($Connection)
    {
        $this->Conection=$Connection;
    }

    function tipoDoc()
    {
        $sql = "SELECT * FROM mis_tejidos.tipo_documento";
        $this->Conection->query($sql);
        return $this->Conection->fetchAll();
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

    function sharchDocumento($doc)
    {
        try {
            $connection = new Connection();

            $filtro =[
                'documento'=>"$doc"
            ];

            $result = $connection->query("customer",$filtro);

            foreach($result AS $document){
                $salida = json_encode($document->jsonSerialize());
            }

            if(is_null($salida)){
                exit("SIN DATOS");
            }

            return $salida;
            
        } catch (Exception $e) {
            printf($e->getMessage());
        }
    }

    function addCliente($nombre1,$nombre2,$apellido1,$apellido2,$documento,$sexo,$telefono,$correo,$direccion)
    {
        $connection = new Connection();

        $json = json_encode([
            'nombre1' =>"$nombre1",
            'nombre2' =>"$nombre2",
            'apellido1' =>"$apellido1",
            'apellido2' =>"$apellido2",
            'documento' =>"$documento",
            'sexo'=>"$sexo",
            'telefono'=>"$telefono",
            'correo'=>"$correo",
            'direccion'=>"$direccion"
        ]);

        $connection->queryCreate("customer",json_decode($json));
    }

    function listClient()
    {
        try {
            $connection = new Connection();
            $result = $connection->query("customer");

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
    
    function filtroBusqueda($filtro,$busqueda)
    {
        $sql = "SELECT c.*,ci.nombre_ciudad
        FROM mis_tejidos.cliente c INNER JOIN mis_tejidos.ciudad ci ON (c.cod_pais=ci.cod_pais)
        AND (c.cod_departamento=ci.cod_departamento) AND (c.cod_ciudad=ci.cod_ciudad)
        WHERE c.$filtro='$busqueda'";
        $this->Conection->query($sql);
        return $this->Conection->fetchAll();
    }

    function filtroBusquedaCiu($filtro,$busqueda)
    {
        $sql = "SELECT c.*,ci.nombre_ciudad
        FROM mis_tejidos.ciudad ci  INNER JOIN mis_tejidos.cliente c ON (c.cod_pais=ci.cod_pais)
        AND (c.cod_departamento=ci.cod_departamento) AND (c.cod_ciudad=ci.cod_ciudad)
        WHERE ci.$filtro='$busqueda'";
        $this->Conection->query($sql);
        return $this->Conection->fetchAll();
    }

    function showCient($id)
    {
        try {
            $connection = new Connection();

            $filtro =[
                'documento'=>"$id"
            ];

            $result = $connection->query("customer",$filtro);

            foreach($result AS $document){
                $salida = json_encode($document->jsonSerialize());
            }

            if(is_null($salida)){
                exit("SIN DATOS");
            }

            return $salida;
            
        } catch (Exception $e) {
            printf($e->getMessage());
        }
    }

    function updateClient($nombre1,$nombre2,$apellido1,$apellido2,$documento,$sexo,$telefono,$correo,$direccion)
    {
        $connection = new Connection();

        $primary = [
            'documento'=>"$documento"
        ];

        $actualizar = [
            '$set'=>[
                'nombre1'=>"$nombre1",
                'nombre2'=>"$nombre2",
                'apellido1'=>"$apellido1",
                'apellido2'=>"$apellido2",
                'documento'=>"$documento",
                'sexo'=>"$sexo",
                'telefono'=>"$telefono",
                'correo'=>"$correo",
                'direccion'=>"$direccion"
            ]
        ];

        $connection->queryUpdate("customer",$primary,$actualizar);
    }
}
?>