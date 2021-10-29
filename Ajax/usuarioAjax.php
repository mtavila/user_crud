<?php 

require_once "../Controllers/UserController.php";
require_once "../Models/User.php";

class userAjax 
{
    public function ajaxListarUsuarios($flag, $criterioListarUsuario)
    {
        $respuesta = userController::ctrListarUsuarios($flag, $criterioListarUsuario);
        echo $respuesta;
    }

    public function ajaxRegistrarUsuarios($flag, $nombresUsuario, $apellidosUsuario, $txtBirthday, $cboGenero, $txtUsuario, $txtcontrasenia, $estadoUsuario)
    {
        $respuesta = userController::ctrRegistrarUsuarios($flag, $nombresUsuario, $apellidosUsuario, $txtBirthday, $cboGenero, $txtUsuario, $txtcontrasenia, $estadoUsuario);
        echo json_encode($respuesta);
    }

    public function ajaxEditarUsuario($flag, $iduser, $txtNombreUsuario, $txtApellidosusuario, $txtBirthday, $cboGenero, $txtUsuario, $txtcontrasenia, $txtContraseñaActual, $estadoUsuario)
    {
        $respuesta = userController::ctrEditarUsuario($flag, $iduser, $txtNombreUsuario, $txtApellidosusuario, $txtBirthday, $cboGenero, $txtUsuario, $txtcontrasenia, $txtContraseñaActual, $estadoUsuario);
        echo json_encode($respuesta);
    }

    public function ajaxEliminarUsuario($flag, $iduser)
    {
        $respuesta = userController::ctrEliminarUsuario($flag, $iduser);
        echo json_encode($respuesta);
    }

    public function ajaxActivarUsuario($flag, $iduser)
    {
        
        $respuesta = userController::ctrActivarUsuario($flag, $iduser);
        echo json_encode($respuesta);
    }

    public function ajaxDesactivarUsuario($flag, $iduser)
    {
        
        $respuesta = userController::ctrDesactivarUsaurio($flag, $iduser);
        echo json_encode($respuesta);
    }
}

if(isset($_REQUEST))
{
    switch ($_REQUEST['method']) 
    {
        case 'Listar':
            $flag = $_GET["flag"];
            $criterio = $_GET["criterio"];
            $listarUsuario = new userAjax();
            $listarUsuario->ajaxListarUsuarios($flag, $criterio);
            break;

        case 'Registrar':
            // var_dump($_POST);
            $flag = $_POST["txtflag"];
           $nombresUsuario = $_POST["txtNombreUsuario"];
           $apellidosUsuario = $_POST["txtApellidosusuario"];
           $txtBirthday = $_POST["txtBirthday"];
           $cboGenero = $_POST["cboGenero"];
           $txtUsuario = $_POST["txtUsuario"];
           $txtcontrasenia = $_POST["txtcontrasenia"];
           $estadoUsuario = isset($_REQUEST["chkEstadoUsuario"]) == "on" ? "1":"0";
           $registrarUsuario = new userAjax();
           $registrarUsuario->ajaxRegistrarUsuarios($flag, $nombresUsuario, $apellidosUsuario, $txtBirthday, $cboGenero, $txtUsuario, $txtcontrasenia, $estadoUsuario);
            break;
        
        case 'Editar':
            $flag = $_POST["txtflag"];
            $iduser = $_POST["txtiduser"];
            $txtNombreUsuario = $_POST["txtNombreUsuario"];
            $txtApellidosusuario = $_POST["txtApellidosusuario"];
            $txtBirthday = $_POST["txtBirthday"];
            $cboGenero = $_POST["cboGenero"];
            $txtUsuario = $_POST["txtUsuario"];
            $txtcontrasenia = $_POST["txtcontrasenia"];
            $txtContraseñaActual = $_POST["txtContraseñaActual"];
            $estadoUsuario = isset($_REQUEST["chkEstadoUsuario"]) == "on" ? "1":"0";
            $editarUsuario = new userAjax();
            $editarUsuario->ajaxEditarUsuario($flag, $iduser, $txtNombreUsuario, $txtApellidosusuario, $txtBirthday, $cboGenero, $txtUsuario, $txtcontrasenia, $txtContraseñaActual, $estadoUsuario);
            break;

        case 'Eliminar':
            $flag = $_POST["flag"];
            $iduser = $_POST["iduser"];
            $eliminarUsuario = new userAjax();
            $eliminarUsuario->ajaxEliminarUsuario($flag, $iduser);
            break;
        
        case 'Activar':
            $flag = $_POST["flag"];
            $iduser = $_POST["iduser"];
            $eliminarUsuario = new userAjax();
            $eliminarUsuario->ajaxActivarUsuario($flag, $iduser);
            break;

        case 'Desactivar':
            $flag = $_POST["flag"];
            $iduser = $_POST["iduser"];
            $eliminarUsuario = new userAjax();
            $eliminarUsuario->ajaxDesactivarUsuario($flag, $iduser);
            break;
    }
}


?>