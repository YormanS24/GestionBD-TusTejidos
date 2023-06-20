<?php
class UsersModel
{
    private $Conection;

    function __construct($Connection)
    {
        $this->Conection = $Connection;
    }

    function listUsers()
    {
        try {
            $connection = new Connection();
            $result = $connection->query("users");

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

    function buscarUser($documento,$telefono,$correo)
    {
        $sql = "SELECT * FROM mis_tejidos.usuario WHERE documento='$documento' OR telefono='$telefono' OR correo_usuario='$correo'";
        $this->Conection->query($sql);
        return $this->Conection->fetchAll();
    }

    function buscarTelefono($telefono,$doc)
    {
        $sql = "SELECT * FROM mis_tejidos.usuario WHERE telefono='$telefono'";
        $this->Conection->query($sql);
        return $this->Conection->fetchAll();
    }

    function buscarCorreo($correo,$doc)
    {
        $sql = "SELECT * FROM mis_tejidos.usuario WHERE correo_usuario='$correo'";
        $this->Conection->query($sql);
        return $this->Conection->fetchAll();
    }

    function listTipyDoc()
    {
        $sql = "SELECT * FROM mis_tejidos.tipo_documento";
        $this->Conection->query($sql);
        return $this->Conection->fetchAll();
    }

    function createUser($documento,$nombre1,$nombre2,$apellido1,$apelido2,$telefono,$correo,$sexo,$tipo)
    {
        $sql = "INSERT INTO mis_tejidos.usuario (documento,nombre1_usuario,nombre2_usuario,apellido1_usuario,apellido2_usuario,telefono ,correo_usuario,tipo_sexo,tipo_documento) 
                VALUES ('$documento','$nombre1','$nombre2','$apellido1','$apelido2','$telefono','$correo','$sexo','$tipo')";

        $this->Conection->query($sql);
    }

    function listAdmin($cod){
        $sql = "SELECT userr.*,tduc.* FROM mis_tejidos.usuario userr,mis_tejidos.tipo_documento tduc WHERE userr.documento = '$cod' AND userr.tipo_documento = tduc.cod_documento";
        $this->Conection->query($sql);
        return $this->Conection->fetchAll();
    }

    function updateUser($documento,$nombre1,$nombre2,$apellido1,$apellido2,$telefono,$correo,$tipo_documento,$tipo_sexo)
    {
        $sql = "UPDATE mis_tejidos.usuario SET nombre1_usuario ='$nombre1', nombre2_usuario='$nombre2',apellido1_usuario='$apellido1', apellido2_usuario='$apellido2', telefono='$telefono', correo_usuario='$correo', tipo_sexo='$tipo_sexo', tipo_documento='$tipo_documento'  WHERE  documento='$documento'";
        $this->Conection->query($sql);
    }

    function delateUser($cod)
    {
        $connection = new Connection();

        $json = [
            'documento'=>"$cod"
        ];

        $connection->queryDelete("users",$json);
    }

    function busquedaFiltro($filtro,$busqueda)
    {
        $sql = "SELECT * FROM mis_tejidos.usuario WHERE $filtro='$busqueda'";
        $this->Conection->query($sql);
        return $this->Conection->fetchAll();
    }
}
?>