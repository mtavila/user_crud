<div class="container-fluid" id="container-wrapper">

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Administración de Usuarios</h1>
         <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="inicio"> <i class="fas fa-fw fa-home"></i> Inicio</a></li>
            <li class="breadcrumb-item">Administración</li>
            <li class="breadcrumb-item active" aria-current="page"><i class="far fa-id-badge"></i> Usuarios</li>
        </ol>
    </div>

    <div class="row">


        <div class="d-flex col-lg-12">

            <p class="h5 mb-0 text-gray-1000">Buscar por:</p>

        </div>

        <div class="row col-lg-12">

            <div class="col-5 mt-3">
                <div class="form-row">
                    <label class="col-sm-4 col-form-label col-form-label-sm" for="txtnomapeUsuariosBuscar">Nombres o Apellidos: </label>
                    <input type="text" class="form-control form-control-sm  col-lg-8 col-sm-12" id="txtnomapeUsuariosBuscar" name="txtnomapeUsuariosBuscar" placeholder="Ingrese el Nombre o Apellido." onkeyup="buscarUsuario(this.value)" />
                </div>
            </div>

            <div class="col-4 mt-3">
                <div class="form-row">
                    <label class="col-sm-4 col-form-label col-form-label-sm" for="cboGeneroUsuario">Género: </label>
                    <select id="cboGeneroUsuario" class="form-control col-lg-8 col-sm-12 form-control-sm" name="cboGeneroUsuario" onchange="buscarGenerUsuario(this.value)" >
                        <option value="_all_">--Seleccione--</option>
                        <option value="1">Masculino</option>
                        <option value="2">Femenino</option>
                    </select>
                </div>
            </div>

            <div class="col-3 mt-3">
                <div class="form-row">
                    <label class="col-sm-4 col-form-label col-form-label-sm" for="cboestadoUsuarioBuscar">Estado: </label>
                    <select id="cboestadoUsuarioBuscar" class="form-control col-lg-8 col-sm-12 form-control-sm" name="cboestadoUsuarioBuscar" onchange="buscarEstadoUsuario(this.value)" >
                        <option value="_all_">--Seleccione--</option>
                        <option value="1">Activo</option>
                        <option value="0">Inactivo</option>
                    </select>
                </div>
            </div>
        
        
            <div class="col-lg-12 col-sm-12 mt-3">

                <div class="form-row justify-content-end">
                    <a href="mantenimiento-usuario" class="btn btn-success btn-icon-split" style="margin-right:120px;" id="#myBtn">
                    <span class="icon text-white-50">
                        <img src="Views/dist/img/new.png">
                    </span>
                    <span class="text">Agregar Nuevo Usuario</span></a>
                </div>

            </div>

        </div>

    </div>


    <div class="row mt-3">
        
        <div class="col-lg-12 mb-4">
            <!-- Simple Tables -->
            <div class="card">

                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-success">Listado de Usuarios</h6>
                </div>

                <div class="table-responsive" id="tableUsers">

                </div>
                
                <div class="card-footer">

                    <div class="row justify-content-center h-100">
                        <div class="col-sm-5 align-self-center text-center">
                            <table class="table align-items-center table-flush">
                                <thead class="thead-light">
                                <tr>
                                    <th colspan="2">Leyenda</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td><img src="Views/dist/img/pencil.png" alt="Editar" width="24" height="24"></td>
                                    <td>Editar Usuario</td>
                                </tr>
                                <tr>
                                    <td><img src="Views/dist/img/delete.png" alt="Eliminar" width="24" height="24"></td>
                                    <td>Eliminar Usuario</td>
                                </tr>
                                <tr>
                                    <td><img src="Views/dist/img/off.png" alt="Desactivar" width="24" height="24"></td>
                                    <td>Desactivar Usuario</td>
                                </tr>
                                <tr>
                                    <td><img src="Views/dist/img/on.png" alt="Activar" width="24" height="24"></td>
                                    <td>Activar Usuario</td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>

                </div>

            </div>

        </div>
    
    </div>


</div>