<?php 

class userController 
{
    static public function ctrListarUsuarios($flag, $criterio)
    {
        $respuesta = User::mdlReadUsuario($flag, $criterio);

        // var_dump($respuesta);

        $html = '<table class="table align-items-center table-flush">';
        $html .='<thead class="thead-light">';
        $html .='<tr>';
        $html .=' <th>#</th>';
        $html .=' <th>USUARIO</th>';
        $html .= '<th>NOMBRE COMPLETO</th>';
        $html .= '<th>FECHA NAC.</th>';
        $html .= '<th>GÉNERO</th>';
        $html .= '<th>ESTADO</th>';
        $html .= '<th>ACCIONES</th>';
        $html .='</tr>';
        $html .= '</thead >';
        $html .= '<tbody>';

        if(count($respuesta)>0)
        {
            $i = 1;
            foreach($respuesta as $data)
            {
                $html.='<tr>';
                $html.='<td>'.$i.'</td>';
                $html.='<td>'.$data["user"].'</td>';
                $html.='<td>'.$data["fullname"].'</td>';
                $html.='<td>'.$data["birthdat"].'</td>';
                if($data["gener"]=='1')
                {
                    $html .='<td><span class="badge badge-success">Masculino</span></td>';
                }
                else 
                {
                    $html .='<td><span class="badge badge-danger">Femenino</span></td>';
                }
                if($data["status"]=='1')
                {
                    $html .='<td><span class="badge badge-success">ACTIVO</span></td>';
                }
                else 
                {
                    $html .='<td><span class="badge badge-danger">INACTIVO</span></td>';
                }

                $html.='<td>
                <div class="btn-group" role="group">

                    <img src="Views/dist/img/pencil.png" title="Editar Registro" width="24" height="24" onclick="mostrarUsuario(\''.$data["iduser"].'\')" style="cursor: pointer;">&nbsp;
                    
                    <img src="Views/dist/img/delete.png" title="Eliminar Registro" width="24" height="24" onclick="eliminarUsuario(\''.$data["iduser"].'\')"  style="cursor: pointer;">&nbsp';

                    if($data["status"]=='1')
                    {
                        $html.='<img src="Views/dist/img/off.png" title="Desactivar Registro" width="24" height="24" onclick="desactivarUsuario(\''.$data["iduser"].'\')"  style="cursor: pointer;">&nbsp';
                    }
                    else 
                    {
                        $html.='<img src="Views/dist/img/on.png" title="Activar Registro" width="24" height="24" onclick="activarUsuario(\''.$data["iduser"].'\')"  style="cursor: pointer;">&nbsp';
                    }

                $html.=' </div>
                    </td>';
                $html.='</tr>';


                $i++;
            }
        }
        else 
        {
            $html.='<tr>';
            $html.='<td align="center" colspan="7">No se encontraron registros</td>';
            $html.='</tr>';    
        }

        $html.='</tbody>';
        $html.='</table>';


        return $html;


    }

    static public function ctrRegistrarUsuarios($flag, $nombresUsuario, $apellidosUsuario, $txtBirthday, $cboGenero, $txtUsuario, $txtcontrasenia, $estadoUsuario)
    {
        if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $nombresUsuario)&& preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $apellidosUsuario)
            && preg_match('/^[0-9]+$/', $cboGenero))
        {

            
            $encriptar = crypt($txtcontrasenia, '$2a$07$asxx54ahjppf45sd87a5a4dDDGsystemdev$');

            // $birthday = date('d-m-Y',strtotime($txtBirthday));

            // $dt1=date("Y-m-d");

            $datos = array(
                "flag"=>$flag,
                "iduser"=>0,
                "nombresUsuario"=>$nombresUsuario,
                "apellidosUsuario"=>$apellidosUsuario,
                "txtBirthday"=>$txtBirthday,
                "cboGenero"=>$cboGenero,
                "txtUsuario"=>$txtUsuario,
                "txtcontrasenia"=>$encriptar,
                "estadoUsuario"=>$estadoUsuario
            );

            // var_dump($txtBirthday);


            $respuesta = User::mdlCrudUsuario($datos);

            return $respuesta;

        }
        else 
        {
            return "error";
        }
    }

    static public function ctrMostrarUsuario($flag, $criterio)
    {
        $respuesta = User::mdlReadUsuario($flag, $criterio);
        return $respuesta;
    }

    static public function ctrEditarUsuario($flag, $iduser, $txtNombreUsuario, $txtApellidosusuario, $txtBirthday, $cboGenero, $txtUsuario, $txtcontrasenia, $txtContraseñaActual, $estadoUsuario)
    {
        if($iduser!=0)
        {
            if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $txtNombreUsuario)&& preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $txtApellidosusuario)
            && preg_match('/^[0-9]+$/', $cboGenero))
            {
                if($txtcontrasenia!='')
                {
                    $encriptar = crypt($txtcontrasenia, '$2a$07$asxx54ahjppf45sd87a5a4dDDGsystemdev$');
                }
                else 
                {
                    $encriptar = $txtContraseñaActual;
                }

                $datos = array(
                    "flag"=>$flag,
                    "iduser"=>$iduser,
                    "nombresUsuario"=>$txtNombreUsuario,
                    "apellidosUsuario"=>$txtApellidosusuario,
                    "txtBirthday"=>$txtBirthday,
                    "cboGenero"=>$cboGenero,
                    "txtUsuario"=>$txtUsuario,
                    "txtcontrasenia"=>$encriptar,
                    "estadoUsuario"=>$estadoUsuario
                );
    
                // var_dump($txtBirthday);
    
    
                $respuesta = User::mdlCrudUsuario($datos);
    
                return $respuesta;
            }
            else 
            {
                return "error";
            }
        }
       
    }
    
   static public function ctrEliminarUsuario($flag, $iduser)
    {
        if(isset($iduser))
        {
            $datos = array(
                "flag"=>$flag,
                "iduser"=>$iduser,
                "nombresUsuario"=>'',
                "apellidosUsuario"=>'',
                "txtBirthday"=>'0000-00-00',
                "cboGenero"=>'',
                "txtUsuario"=>'',
                "txtcontrasenia"=>'',
                "estadoUsuario"=>''
            );


            $respuesta = User::mdlCrudUsuario($datos);
    
            return $respuesta;

        }
    }

    static public function ctrActivarUsuario($flag, $iduser)
    {
        if(isset($iduser))
        {
            $datos = array(
                "flag"=>$flag,
                "iduser"=>$iduser,
                "nombresUsuario"=>'',
                "apellidosUsuario"=>'',
                "txtBirthday"=>'0000-00-00',
                "cboGenero"=>'',
                "txtUsuario"=>'',
                "txtcontrasenia"=>'',
                "estadoUsuario"=>''
            );


            $respuesta = User::mdlCrudUsuario($datos);
    
            return $respuesta;
        }
    }

    static public function ctrDesactivarUsaurio($flag, $iduser)
    {
        if(isset($iduser))
        {
            $datos = array(
                "flag"=>$flag,
                "iduser"=>$iduser,
                "nombresUsuario"=>'',
                "apellidosUsuario"=>'',
                "txtBirthday"=>'0000-00-00',
                "cboGenero"=>'',
                "txtUsuario"=>'',
                "txtcontrasenia"=>'',
                "estadoUsuario"=>''
            );


            $respuesta = User::mdlCrudUsuario($datos);
    
            return $respuesta;
        }
    }
}

?>