document.addEventListener("DOMContentLoaded", function() {
    console.log('Gaaaaaa');
    listarUsuarios();
});

function listarUsuarios(nomapeuser = '', gener = '_all_', estado ='_all_')
{
    let criteriousuario = nomapeuser+'*'+gener+'*'+estado;
    const paramUsuarios = 'flag=1&criterio='+criteriousuario+'&method=Listar';
    fetch('Ajax/usuarioAjax.php?'+paramUsuarios)
   .then((response) => {
       return response.text();
   })
   .then((html) => {
       // validamos si el elemento existe en la página
       if(document.querySelector('#tableUsers')!== null)
       {
          document.getElementById("tableUsers").innerHTML=html;    
       }
   });
}

function buscarUsuario(txtnomapebuscar)
{
    let cbogeneroUsuarioBuscar = document.querySelector('#cboGeneroUsuario').value;
    let cboestadoUsuarioBuscar = document.querySelector('#cboestadoUsuarioBuscar').value;
    listarUsuarios(txtnomapebuscar, cbogeneroUsuarioBuscar, cboestadoUsuarioBuscar);
}

function buscarGenerUsuario(cbogGenerUser)
{
    let txtnomapeUsuariosBuscar = document.querySelector('#txtnomapeUsuariosBuscar').value;
    let cboestadoUsuarioBuscar2 = document.querySelector('#cboestadoUsuarioBuscar').value;
    listarUsuarios(txtnomapeUsuariosBuscar, cbogGenerUser, cboestadoUsuarioBuscar2);
}

function buscarEstadoUsuario(cboEstadoUser)
{
    let txtnomapeUsuariosBuscar2 = document.querySelector('#txtnomapeUsuariosBuscar').value;
    let cbogeneroUsuarioBuscar2 = document.querySelector('#cboGeneroUsuario').value;
    listarUsuarios(txtnomapeUsuariosBuscar2, cbogeneroUsuarioBuscar2, cboEstadoUser);
}



// Validar
function validarUsuario()
{
    let nombreusuario = document.querySelector('#txtNombreUsuario');
    let apellidosusuario = document.querySelector('#txtApellidosusuario');
    let fechaNacimientoUsuario = document.querySelector('#txtBirthday');
    let generoUsuario = document.querySelector('#cboGenero');
    let usuario = document.querySelector('#txtUsuario');
    let claveusuario = document.querySelector('#txtcontrasenia');

    if(nombreusuario.value == '' || apellidosusuario.value == '' || fechaNacimientoUsuario.value=='' || generoUsuario.value=='_none_' || usuario.value =='' || claveusuario.value =='')
    {
        if(nombreusuario.value=='' || nombreusuario.value.lenght<0)
        {
           document.querySelector('#nombreUsuarioHelp').textContent='* Nombres del usuario es requerido';
           nombreusuario.style['border-color']="#AB0505";
        }
        else 
        {
            document.querySelector('#nombreUsuarioHelp').textContent='';
            nombreusuario.style['border-color']='';
        }

        if(apellidosusuario.value == '' || apellidosusuario.value.lenght<0)
        {
            document.querySelector('#apellidoUsuarioHelp').textContent='* Apellidos del usuario es requerido';
            apellidosusuario.style['border-color']='#AB0505';
        }
        else 
        {
            document.querySelector('#apellidoUsuarioHelp').textContent='';
            apellidosusuario.style['border-color']='';
        }

        if(fechaNacimientoUsuario.value=='' || fechaNacimientoUsuario.value.lenght<0)
        {
            document.querySelector('#birthdayUsuarioHelp').textContent='* Fecha de Nacimiento del usuario es requerido';
            fechaNacimientoUsuario.style['border-color']='#AB0505';
        }
        else 
        {
            document.querySelector('#birthdayUsuarioHelp').textContent='';
            fechaNacimientoUsuario.style['border-color']='';
        }

        if(generoUsuario.value=='_none_')
        {
            document.querySelector('#generoUsuarioHelp').textContent='* Género del Usuario es requerido';
            generoUsuario.style['border-color']='#AB0505';
        }
        else 
        {
            document.querySelector('#generoUsuarioHelp').textContent='';
            generoUsuario.style['border-color']='';
        }

        if(usuario.value == '')
        {   
            document.querySelector('#UsuarioHelp').textContent = ('* El usuario es requerido');
            usuario.style['border-color']='#AB0505';
        }
        else 
        {
            document.querySelector('#UsuarioHelp').textContent='';
            usuario.style['border-color']='';
        }

        if(claveusuario.value == '')
        {
            document.querySelector('#contraseniaHelp').textContent='* La Contraseña del usuario es requerida';
            claveusuario.style['border-color']='#AB0505';
        }
        else 
        {
            document.querySelector('#contraseniaHelp').textContent='';
            claveusuario.style['border-color']='';
        }
    }
    else 
    {
        return true;
    }
}

function validarUsuarioEditar()
{
    let nombreusuario = document.querySelector('#txtNombreUsuario');
    let apellidosusuario = document.querySelector('#txtApellidosusuario');
    let fechaNacimientoUsuario = document.querySelector('#txtBirthday');
    let generoUsuario = document.querySelector('#cboGenero');
    let usuario = document.querySelector('#txtUsuario');

    if(nombreusuario.value == '' || apellidosusuario.value == '' || fechaNacimientoUsuario.value=='' || generoUsuario.value=='_none_' || usuario.value == '')
    {
        if(nombreusuario.value=='' || nombreusuario.value.lenght<0)
        {
           document.querySelector('#nombreUsuarioHelp').textContent='* Nombres del usuario es requerido';
           nombreusuario.style['border-color']="#AB0505";
        }
        else 
        {
            document.querySelector('#nombreUsuarioHelp').textContent='';
            nombreusuario.style['border-color']='';
        }

        if(apellidosusuario.value == '' || apellidosusuario.value.lenght<0)
        {
            document.querySelector('#apellidoUsuarioHelp').textContent='* Apellidos del usuario es requerido';
            apellidosusuario.style['border-color']='#AB0505';
        }
        else 
        {
            document.querySelector('#apellidoUsuarioHelp').textContent='';
            apellidosusuario.style['border-color']='';
        }

        if(fechaNacimientoUsuario.value=='' || fechaNacimientoUsuario.value.lenght<0)
        {
            document.querySelector('#birthdayUsuarioHelp').textContent='* Fecha de Nacimiento del usuario es requerido';
            fechaNacimientoUsuario.style['border-color']='#AB0505';
        }
        else 
        {
            document.querySelector('#birthdayUsuarioHelp').textContent='';
            fechaNacimientoUsuario.style['border-color']='';
        }

        if(generoUsuario.value=='_none_')
        {
            document.querySelector('#generoUsuarioHelp').textContent='* Género del Usuario es requerido';
            generoUsuario.style['border-color']='#AB0505';
        }
        else 
        {
            document.querySelector('#generoUsuarioHelp').textContent='';
            generoUsuario.style['border-color']='';
        }

        if(usuario.value == '')
        {   
            document.querySelector('#UsuarioHelp').textContent = ('* El usuario es requerido');
            usuario.style['border-color']='#AB0505';
        }
        else 
        {
            document.querySelector('#UsuarioHelp').textContent='';
            usuario.style['border-color']='';
        }
    }
    else 
    {
        return true;
    }
}

// Guardar Usuario
if(document.querySelector('#formRegistroUsuario')!==null)
{
    let formRegistroUsuario = document.querySelector('#formRegistroUsuario');
    formRegistroUsuario.addEventListener('submit', (event) => {
        event.preventDefault();
        let formDataUsuario = new FormData(formRegistroUsuario);
        formDataUsuario.append("method","Registrar");
    if(validarUsuario())
    {
            fetch('Ajax/usuarioAjax.php',{
                method:"POST",
                body: formDataUsuario
            })
            .then(res => res.json())
            .then(data => {
                // console.log(data[0].dato);
                if(data[0].dato == "MSG_01")
                {
                    Swal.fire({
                                icon: 'success',
                                title: 'ÉXITO!',
                                text: 'Se ha registrado el usuario correctamente',
                                showCancelButton: false,
                                allowOutsideClick: false,
                                confirmButtonColor: '#3085d6',
                                confirmButtonText: 'OK'
                            }).then((result) => {
                                if (result.isConfirmed) {
                                    window.location = "usuarios";
                                }
                            });
                }
                else if(data == "error")
                {
                    Swal.fire({
                        icon: 'error',
                        title: 'ERROR...',
                        text: 'No se permite carácteres especiales'
                    })
                }
                else 
                {
                    Swal.fire({
                        icon: 'error',
                        title: 'ERROR...',
                        text: 'Ocurrió un error al procesar la información'
                    })
                }
            })
            .catch(err => {
                    // Catch and display errors
                    // document.querySelector('#loader').style['display']="none";
                    Swal.fire({
                            icon: 'error',
                            title: 'ERROR...',
                            text: 'Ocurrió un error al procesar la información'
                        })
            })
    }
    });
}

// mostrar usuario 
function mostrarUsuario(iduser)
{
  window.location = "index.php?ruta=mantenimiento-usuario&iduser=" + iduser;
}

// Editar Usuario
if(document.querySelector('#formEditarUsuario')!==null)
{
    let formEditarUsuario = document.querySelector('#formEditarUsuario');
    formEditarUsuario.addEventListener('submit', (event) => {
    event.preventDefault();
    let formDataEditarUsuario = new FormData(formEditarUsuario);
    formDataEditarUsuario.append("method","Editar");
    if(validarUsuarioEditar())
    {
            fetch('Ajax/usuarioAjax.php',{
                method:"POST",
                body: formDataEditarUsuario
            })
            .then(res => res.json())
            .then(data => {
                // console.log(data[0].dato);
                if(data[0].dato == "MSG_02")
                {
                    Swal.fire({
                                icon: 'success',
                                title: 'ÉXITO!',
                                text: 'Se ha actualizado el usuario correctamente',
                                showCancelButton: false,
                                allowOutsideClick: false,
                                confirmButtonColor: '#3085d6',
                                confirmButtonText: 'OK'
                            }).then((result) => {
                                if (result.isConfirmed) {
                                    window.location = "usuarios";
                                }
                            });
                }
                else if(data == "error")
                {
                    Swal.fire({
                        icon: 'error',
                        title: 'ERROR...',
                        text: 'No se permite carácteres especiales'
                    })
                }
                else 
                {
                    Swal.fire({
                        icon: 'error',
                        title: 'ERROR...',
                        text: 'Ocurrió un error al procesar la información'
                    })
                }
            })
            .catch(err => {
                    // Catch and display errors
                    // document.querySelector('#loader').style['display']="none";
                    Swal.fire({
                            icon: 'error',
                            title: 'ERROR...',
                            text: 'Ocurrió un error al procesar la información'
                        })
            })
    }
    });
}

// Eliminar Usuario
function eliminarUsuario(iduser)
{
    Swal.fire({
        icon: 'warning',
        title: 'Está seguro de eliminar el Usuario?',
        showDenyButton: false,
        showCancelButton: true,
        confirmButtonColor: "#EB1010",
        confirmButtonText: `Eliminar`,
        cancelButtonText: `Cancelar`,
    }).then((result) => {
         if (result.isConfirmed) {
            let data = new FormData();
                data.append("method","Eliminar");
                data.append("flag",3);
                data.append("iduser",iduser);
                 fetch('Ajax/usuarioAjax.php',{
                    method:"POST",
                    body: data,
                })
                .then(res => res.json())
                .then(data => {
                    // console.log(data);
                    if(data[0].dato == "MSG_03")
                    {
                        Swal.fire({
                            icon: 'success',
                            title: 'ÉXITO!',
                            text: 'Se ha eliminado el Usuario correctamente'
                        });
                        // document.querySelector('#txtnomapeUsuariosBuscar').value='';
                        // document.querySelector('#cboPerfilUsuario').value='_all_';
                        // document.querySelector('#cboTipoDocumentoUsuarioBuscar').value='_all_';
                        // document.querySelector('#txtnroDocumentoUsuarioBuscar').value='';
                        // document.querySelector('#cboestadoUsuarioBuscar').value='_all_';
                        listarUsuarios();
                    }
                    else 
                    {
                        Swal.fire({
                            icon: 'error',
                            title: 'ERROR...',
                            text: 'Ocurrió un error al procesar la información'
                        })
                    }
                })
                .catch(err => {
                // Catch and display errors
                    Swal.fire({
                        icon: 'error',
                        title: 'ERROR...',
                        text: 'Ocurrió un error al procesar la información'
                    })
                })
            }
    })

}


function activarUsuario(iduser)
{
    Swal.fire({
        icon: 'warning',
        title: 'Está seguro que desea activar el usuario?',
        showDenyButton: false,
        showCancelButton: true,
        confirmButtonColor: "#EB1010",
        confirmButtonText: `Activar`,
        cancelButtonText: `Cancelar`,
    }).then((result) => {
         if (result.isConfirmed) {
            let data = new FormData();
                data.append("method","Activar");
                data.append("flag",4);
                data.append("iduser",iduser);
                 fetch('Ajax/usuarioAjax.php',{
                    method:"POST",
                    body: data,
                })
                .then(res => res.json())
                .then(data => {
                    // console.log(data);
                    if(data[0].dato == "MSG_04")
                    {
                        Swal.fire({
                            icon: 'success',
                            title: 'ÉXITO!',
                            text: 'Se ha activado el Usuario correctamente'
                        });
                        // document.querySelector('#txtnomapeUsuariosBuscar').value='';
                        // document.querySelector('#cboPerfilUsuario').value='_all_';
                        // document.querySelector('#cboTipoDocumentoUsuarioBuscar').value='_all_';
                        // document.querySelector('#txtnroDocumentoUsuarioBuscar').value='';
                        // document.querySelector('#cboestadoUsuarioBuscar').value='_all_';
                        listarUsuarios();
                    }
                    else 
                    {
                        Swal.fire({
                            icon: 'error',
                            title: 'ERROR...',
                            text: 'Ocurrió un error al procesar la información'
                        })
                    }
                })
                .catch(err => {
                // Catch and display errors
                    Swal.fire({
                        icon: 'error',
                        title: 'ERROR...',
                        text: 'Ocurrió un error al procesar la información'
                    })
                })
            }
    })
}

function desactivarUsuario(iduser)
{
    Swal.fire({
        icon: 'warning',
        title: 'Está seguro que desea desactivar el usuario?',
        showDenyButton: false,
        showCancelButton: true,
        confirmButtonColor: "#EB1010",
        confirmButtonText: `Desactivar`,
        cancelButtonText: `Cancelar`,
    }).then((result) => {
         if (result.isConfirmed) {
            let data = new FormData();
                data.append("method","Desactivar");
                data.append("flag",5);
                data.append("iduser",iduser);
                 fetch('Ajax/usuarioAjax.php',{
                    method:"POST",
                    body: data,
                })
                .then(res => res.json())
                .then(data => {
                    // console.log(data);
                    if(data[0].dato == "MSG_05")
                    {
                        Swal.fire({
                            icon: 'success',
                            title: 'ÉXITO!',
                            text: 'Se ha desactivado el Usuario correctamente'
                        });
                        // document.querySelector('#txtnomapeUsuariosBuscar').value='';
                        // document.querySelector('#cboPerfilUsuario').value='_all_';
                        // document.querySelector('#cboTipoDocumentoUsuarioBuscar').value='_all_';
                        // document.querySelector('#txtnroDocumentoUsuarioBuscar').value='';
                        // document.querySelector('#cboestadoUsuarioBuscar').value='_all_';
                        listarUsuarios();
                    }
                    else 
                    {
                        Swal.fire({
                            icon: 'error',
                            title: 'ERROR...',
                            text: 'Ocurrió un error al procesar la información'
                        })
                    }
                })
                .catch(err => {
                // Catch and display errors
                    Swal.fire({
                        icon: 'error',
                        title: 'ERROR...',
                        text: 'Ocurrió un error al procesar la información'
                    })
                })
            }
    })
}