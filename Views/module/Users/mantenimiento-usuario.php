<?php 

if(isset($_GET["iduser"]))
{
    $flag = '2';
    $iduser = $_GET["iduser"];
    $idform = 'formEditarUsuario';
    $formtitle = 'Formulario Actualización de Usuario';
    $user = UserController::ctrMostrarUsuario($flag, $iduser);
    $nombreUsuario = $user[0]['name'];
    $apeUsuario = $user[0]['lastname'];
    $fechanac = $user[0]['birthdat'];
    $generUsuario = $user[0]['gener'];
    $checkedUsuario = $user[0]['status'] == 1 ? 'checked':'';
    $usuario = $user[0]['user'];
    $passwordactual = $user[0]['pwd'];
    $tooltip = 'data-container="body" data-toggle="popover" data-placement="top" title data-content="Ingrese la contraseña si desea modificarla, en caso contrario dejarla en blanco" data-original-title="Atención"';
    $valuebutton = 'Actualizar';
}
else 
{
    $flag = '1';
    $iduser = 0;
    $idform = 'formRegistroUsuario';
    $formtitle = 'Formulario Registro de Usuario';
    $nombreUsuario = '';
    $apeUsuario = '';
    $fechanac = '';
    $generUsuario = '_none_';
    $checkedUsuario = 'checked';
    $usuario = '';
    $passwordactual ='';
    $tooltip = '';
    $valuebutton = 'Guardar';
}


?>


<div class="container-fluid" id="container-wrapper">

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Mantenimiento Usuario</h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="inicio"> <i class="fas fa-fw fa-home"></i> Inicio</a></li>
            <li class="breadcrumb-item">Administración</li>
            <li class="breadcrumb-item"><a href="usuarios">  <i class="far fa-id-badge"></i> Usuarios</a></li>
            <li class="breadcrumb-item active" aria-current="page">Mantenimiento Usuario</li>
        </ol>
    </div>
    
    <div class="row">

        <div class="col-lg-12 mb-4">

            <form role="form" method="post" enctype="multipart/form-data" id="<?php echo $idform ?>">

                <div class="card">
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-success" id="formusuariotitle"><?php echo $formtitle; ?></h6>
                    </div>
                    
                    <div class="card-body">
                            
                        <div class="row">

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="txtNombreUsuario"><span style="color:#AB0505;">(*)</span> Nombres: </label>                                      
                                    <input type="text" class="form-control" id="txtNombreUsuario" name="txtNombreUsuario"
                                        placeholder="Ingrese el Nombre del Usuario..." value="<?php echo $nombreUsuario; ?>">
                                    <input type="hidden" name="txtflag" id="txtflag" value="<?php echo $flag; ?>">
                                    <input type="hidden" name="txtiduser" id="txtiduser" value="<?php echo $iduser; ?>">
                                    <small id="nombreUsuarioHelp" class="form-text text-muted" style="color: #AB0505 !important;"></small>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="txtApellidosusuario"><span style="color:#AB0505;">(*)</span> Apellidos: </label>                                      
                                    <input type="text" class="form-control" id="txtApellidosusuario" name="txtApellidosusuario"
                                        placeholder="Ingrese los Apellidos del Usuario..." value="<?php echo $apeUsuario; ?>">
                                    <small id="apellidoUsuarioHelp" class="form-text text-muted" style="color: #AB0505 !important;"></small>
                                </div>
                            </div>

                        </div>

                        <div class="row mt-2">

                            <div class="col-md-6 mb-2">
                                <label for="txtBirthday"><span style="color:#AB0505;">(*)</span> Fecha de Nacimiento: </label>
                                <input type="date" class="form-control" name="txtBirthday" id="txtBirthday" value="<?php echo $fechanac; ?>">
                                <small id="birthdayUsuarioHelp" class="form-text text-muted" style="color: #AB0505 !important;"></small>
                            </div>
                            
                            <div class="col-md-6">
                                <label for="cboGenero"><span style="color:#AB0505;">(*)</span> Género: </label>
                                <select class="form-control form-control-md"  name="cboGenero" id="cboGenero">
                                    <option value="_none_">Seleccione</option>
                                    <?php  

                                        $sexousu = array(
                                            "1"=>"Masculino",
                                            "2"=>"Femenino",
                                        );

                                        foreach ($sexousu as $valuesu=>$textsu){

                                    ?>
                                    <option <?php if($valuesu == $generUsuario){echo 'selected="selected"'; }?> value="<?php echo $valuesu; ?>"><?php echo $textsu; ?></option>
                                    <?php }
                                    ?>
                                </select>
                                <small id="generoUsuarioHelp" class="form-text text-muted" style="color: #AB0505 !important;"></small>
                            </div>

                        </div>

                        <div class="row mt-3">

                            <div class="col-md-6 mb-2">
                                <label for="txtUsuario"><span style="color:#AB0505;">(*)</span> Usuario: </label> 
                                <input type="text" class="form-control" id="txtUsuario" name="txtUsuario"
                                        placeholder="Ingrese el Usuario..."  value="<?php echo $usuario; ?>">
                                <small id="UsuarioHelp" class="form-text text-muted" style="color: #AB0505 !important;"></small>
                            </div>

                            <div class="col-md-6">
                                <label for="txtcontrasenia"><span style="color:#AB0505;">(*)</span> Contraseña: </label> 
                                <input type="password" class="form-control" id="txtcontrasenia" name="txtcontrasenia"
                                        placeholder="Ingrese el Usuario..." <?php echo $tooltip; ?>>
                                <input type="hidden" name="txtContraseñaActual" id="txtContraseñaActual" value="<?php echo $passwordactual; ?>">
                                <small id="contraseniaHelp" class="form-text text-muted" style="color: #AB0505 !important;"></small>
                            </div>

                        </div>

                        <div class="row mt-3">
                            <div class="col-md-6">
                                <label for="chkEstado"> Estado: </label> 
                                <div class="custom-control custom-checkbox ml-2">
                                        <input type="checkbox" class="custom-control-input" name="chkEstadoUsuario" id="chkEstadoUsuario" <?php echo $checkedUsuario ?>>  
                                        <label class="custom-control-label" for="chkEstadoUsuario">Activo</label>
                                    </div>      
                            </div>
                        </div>
                                                           

                    </div>

                    <div class="card-footer">

                        <div class="row">

                            <div class="form-group">

                                <p class="help-block font-weight-bold"><span style="color:#AB0505;">Nota: (*) Campos Obligatorios</span></p>

                                <a class="btn btn-danger btn-icon-split" href="usuarios"> <span class="icon text-white-50"><img src="Views/dist/img/cancel.png"></span><span class="text">Cerrar</span></a>
                                <button type="button" class="btn btn-primary btn-icon-split" id="limpiarUsuario" onclick="limpiarFormUsuario()"><span class="icon text-white-50"><img src="Views/dist/img/clear.png"></span><span class="text">Limpiar</span></button> 
                                <button type="submit" class="btn btn-success btn-icon-split" id="guardarUsuario"><span class="icon text-white-50"><img src="Views/dist/img/save.png"></span><span class="text"><?php echo $valuebutton ?></span></button>

                            </div>

                        </div>

                    </div>

                </div>

            </form>

        </div>
    
    </div>


</div>