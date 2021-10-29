<?php 

    require_once 'Conexion.php';

    class User 
    {

        static public function mdlReadUsuario($flag, $criterio)
        {
            $stmt = Conexion::conectar()->prepare("CALL sp_usuarioListar(?,?)");
            $stmt -> bindParam(1,$flag,PDO::PARAM_INT);
            $stmt -> bindParam(2,$criterio, PDO::PARAM_STR);
    
            $stmt -> execute();
    
            return $stmt -> fetchAll();
    
            $stmt -> close();
    
            $stmt = null;
        }

        static public function mdlCrudUsuario($datos)
        {
            $stmt = Conexion::conectar()->prepare("CALL sp_usuarioMantenimiento(?,?,?,?,?,?,?,?,?)");

            $stmt -> bindParam(1,$datos["flag"],PDO::PARAM_INT);
            $stmt -> bindParam(2,$datos["iduser"], PDO::PARAM_INT);
            $stmt -> bindParam(3,$datos["nombresUsuario"], PDO::PARAM_STR);
            $stmt -> bindParam(4,$datos["apellidosUsuario"], PDO::PARAM_STR);
            $stmt -> bindParam(5,$datos["txtUsuario"], PDO::PARAM_STR);
            $stmt -> bindParam(6,$datos["txtcontrasenia"], PDO::PARAM_STR);
            $stmt -> bindParam(7,$datos["txtBirthday"], PDO::PARAM_STR);
            $stmt -> bindParam(8,$datos["estadoUsuario"], PDO::PARAM_STR);
            $stmt -> bindParam(9,$datos["cboGenero"], PDO::PARAM_STR);

            $stmt -> execute();

            return $stmt -> fetchAll();
            
            $stmt -> close();

            $stmt = null;

        }
    }

?>