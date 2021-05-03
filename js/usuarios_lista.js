/* DEFINICION DE CONSTANTES */
const myModalEditarUsuario = document.getElementById('myModalEditarUsuario');
const myModalVerUsuario = document.getElementById('myModalVerUsuario');
const myModalEspera = document.getElementById('myModalEspera');
const myModalRespuesta = document.getElementById('myModalRespuesta');
const myModalRespuestaError = document.getElementById('myModalRespuestaError');
const btnClosemyModalVerUsuario = document.getElementById('btnClosemyModalVerUsuario');
const btnClosemyModalEditarUsuario = document.getElementById('btnClosemyModalEditarUsuario');
const btnEditarmyModalEditarUsuario = document.getElementById('btnEditarmyModalEditarUsuario');
const btnClosemyModalRespuesta = document.getElementById('btnClosemyModalRespuesta');
const btnClosemyModalRespuestaError = document.getElementById('btnClosemyModalRespuestaError');
const btnBuscar = document.querySelector("#btn-buscar-usuario");
const $inputBusqueda = document.querySelector("#input-busquedas");

/* VALORES DEL FORMULARIO */
const $id = document.querySelector("#eid"),
    $nombre = document.querySelector("#enombre"),
    $apellido = document.querySelector("#eapellido"),
    $email = document.querySelector("#eemail"),
    $acceso = document.querySelector("#eacceso"),
    $telefono = document.querySelector("#etelefono"),
    $user = document.querySelector("#euser"),
    $password = document.querySelector("#epassword"),
    $cpassword = document.querySelector("#ecpassword"),
    $dni = document.querySelector("#edni");

onInit();

function onInit() {

    getUser_com();
}

/* FUNCION DE  BUSQUEDA DE USUARIO POR DNI
DEVUELVE EL USUARIO CON EL DNI CORRESPONDIENTE. */
async function buscarUsuario_com() {
    const datos = {
        backend: 'buscarUsuarios', inputBusqueda: document.querySelector("#input-busquedas").value,

    };
    // Codificamos...
    const _datos = JSON.stringify(datos);
    console.log(_datos);
    // Enviamos
    try {
        const respuestaRaw = await fetch("core/userController.php", {
            method: "POST",
            body: _datos,
        });
        // El servidor nos responderá con JSON
        const respuesta = await respuestaRaw.json();
        if (respuesta) {
            limpiar_table();
            console.log(respuesta);
            getUser_fin(respuesta);
        } else {
            console.log("nara");
        }
    } catch (e) {
        // En caso de que haya un error
        console.log(e);
    }
}

/* FUNCION QUE OBTIENE TODOS LOS USUARIOS DEL SISTEMA
USADO AL CARGAR LA PANTALLA DE LISTA DE USUARIOS.
CONSTA DE 2 PARTES
getUser_com ENVIA LA SOLICITUD AL CONTROLADOR DE USUARIOS
getUser_fin RELLENA LA TABLA DE USUARIOS. */
async function getUser_com() {
    const datos = {
        backend: 'getUsers',
    };
    // Codificamos...
    const _datos = JSON.stringify(datos);
    // Enviamos
    try {
        const respuestaRaw = await fetch("core/userController.php", {
            method: "POST",
            body: _datos,
        });
        // El servidor nos responderá con JSON
        const respuesta = await respuestaRaw.json();
        if (respuesta) {
            getUser_fin(respuesta);
        } else {
            console.log("nara");
        }
    } catch (e) {
        // En caso de que haya un error
        console.log(e);
    }
}

function getUser_fin(datos) {
    let table = document.querySelector("#lista_usuarios");
    let tr = document.createElement("tr");
    let aux = "";
    for (let item of datos.usuarios) {
        aux += "<tr><td>" + item.nombre + "</td><td>" + item.apellido + "</td><td>" + item.dni + "</td><td>" + item.user + "</td>";
        if (item.acceso == "1") {
            aux += "<td>Adminitrador</td>";
        } else {
            aux += "<td>Usuario</td>";
        }
        if (item.estado == "S") {
            aux += `<td><button class='badge success'>Activo</button></td><td><button type="button" onClick="desHabUsuario_com('${item.id}','N')"  class='badge warning actionButton'>Deshabilitar</button>`;
        } else {
            aux += `<td><button class='badge warning'>Inactivo</button></td><td><button type="button" onClick="desHabUsuario_com('${item.id}','S')"  class='badge success'>Habilitar</button>`;
        }
        aux += `<button type="button" onClick="getUser_cod2_com('${item.id}')" class='badge green actionButton'>Modificar</button><button type="button" onClick="getUser_cod_com('${item.id}')"  class='badge danger actionButton'>Ver</button></td></tr>`;
    }
    table.innerHTML = aux;
}

/* FUNCION QUE OBTIENE LOS DATOS DE UN USUARIO 
AL USAR EL BOTON "Ver"
CONSTA DE 2 PARTES
getUser_cod_com ENVIA LA SOLICITUD AL CONTROLADOR DE USUARIOS CON EL ID DEL USUARIO
getUser_cod_fin MUESTRA UN MODAL CON LOS DATOS DEL USUARIO. */
async function getUser_cod_com(id) {
    const datos = {
        backend: 'getUsers_cod', id: id
    };
    // Codificamos...
    const _datos = JSON.stringify(datos);
    // Enviamos
    try {
        const respuestaRaw = await fetch("core/userController.php", {
            method: "POST",
            body: _datos,
        });
        // El servidor nos responderá con JSON
        const respuesta = await respuestaRaw.json();
        if (respuesta) {
            getUser_cod_fin(respuesta);
        } else {
            console.log("nara");
        }
    } catch (e) {
        // En caso de que haya un error
        console.log(e);
    }
}

function getUser_cod_fin(datos) {

    for (let item of datos.usuarios) {
        document.getElementById("nombre").value = item.nombre;
        document.getElementById("apellido").value = item.apellido;
        document.getElementById("email").value = item.email;
        document.getElementById("telefono").value = item.telefono;
        document.getElementById("dni").value = item.dni;
        document.getElementById("acceso").value = item.acceso;
        document.getElementById("telefono").value = item.telefono;
        document.getElementById("user").value = item.user;
    }
    myModalVerUsuario.classList.add('show');
}
/* FUNCION QUE OBTIENE LOS DATOS DE UN USUARIO 
AL USAR EL BOTON "Modificar"
CONSTA DE 2 PARTES
getUser_cod2_com ENVIA LA SOLICITUD AL CONTROLADOR DE USUARIOS CON EL ID DEL USUARIO
getUser_cod2_fin MUESTRA UN MODAL CON LOS DATOS DEL USUARIO PARA MODIFICARLOS. */
async function getUser_cod2_com(id) {
    const datos = {
        backend: 'getUsers_cod', id: id
    };
    // Codificamos...
    const _datos = JSON.stringify(datos);
    // Enviamos
    try {
        const respuestaRaw = await fetch("core/userController.php", {
            method: "POST",
            body: _datos,
        });
        // El servidor nos responderá con JSON
        const respuesta = await respuestaRaw.json();
        if (respuesta) {
            getUser_cod2_fin(respuesta);
        } else {
            console.log("nara");
        }
    } catch (e) {
        // En caso de que haya un error
        console.log(e);
    }
}

function getUser_cod2_fin(datos) {

    for (let item of datos.usuarios) {
        document.getElementById("eid").value = item.id;
        document.getElementById("enombre").value = item.nombre;
        document.getElementById("eapellido").value = item.apellido;
        document.getElementById("eemail").value = item.email;
        document.getElementById("etelefono").value = item.telefono;
        document.getElementById("edni").value = item.dni;
        document.getElementById("eacceso").value = item.acceso;
        document.getElementById("etelefono").value = item.telefono;
        document.getElementById("euser").value = item.user;
    }
    myModalEditarUsuario.classList.add('show');
}

/* FUNCION MODIFICA EL USUARIO
CONSTA DE 3 PARTES
-editarUsuario_com REALIZA UN PRIMER CHECKEO DE LOS DATOS
-editarUsuario GENERA EL ENVIO AL CONTROLADOR DE USUARIO
-editarUsuario_fin MUESTRA INFORMACION AL USUARIO DE LA OPERACION */

function editarUsuario_com() {
    if ($nombre.value == '' || $apellido.value == '' || $dni.value == '' || $telefono.value == '' || $email.value == '' || $acceso.value == '0' || $user.value == '' ) {
        let resError = document.querySelector("#resError");
        resError.innerHTML = 'Por favor completar todos los campos del formulario';
        myModalRespuestaError.classList.add('show');
    } else if ((validateEmail($email.value))) {
        editarUsuario();
    } else {
        let resError = document.querySelector("#resError");
        resError.innerHTML = 'Por favor corroborar el formato del email';
        myModalRespuestaError.classList.add('show');
    }

}

async function editarUsuario() {
    const datos = {
        backend: 'editarUsuario',
        id: $id.value,
        nombre: $nombre.value,
        apellido: $apellido.value,
        email: $email.value,
        telefono: $telefono.value,
        dni: $dni.value,
        acceso: $acceso.value,
        user: $user.value,
        password: $password.value,
        cpassword: $cpassword.value
    };
    // Codificamos...
    const _datos = JSON.stringify(datos);
    // Enviamos
    try {
        const respuestaRaw = await fetch("core/userController.php", {
            method: "POST",
            body: _datos,
        });
        // El servidor nos responderá con JSON
        const respuesta = await respuestaRaw.json();
        if (respuesta) {
            editarUsuario_fin(respuesta);
        } else {
            console.log("else");
        }
    } catch (e) {
        // En caso de que haya un error
        console.log(e);
    }

}

function editarUsuario_fin(datos) {

    switch (datos.codigo) {
        case "000001":
            myModalEditarUsuario.classList.remove('show');
            limpiar_table();
            getUser_com();
            let res = document.querySelector("#res");
            res.innerHTML = 'Modificado con éxito';
            myModalRespuesta.classList.add('show');
            break;
        case "000002":
        case "000003":
            let resError = document.querySelector("#resError");
            resError.innerHTML = datos.error;
            myModalRespuestaError.classList.add('show');
            break;

        default:
            break;
    }


}


/* FUNCION HABILITAR O DESHABILITAR UN USUARIO
CONSTA DE 2 PARTES
-desHabUsuario_com GENERA EL ENVIO AL CONTROLADOR DE USUARIO CON EL ID DEL MISMO Y LA OPCION DE EJECUTAR 
-desHabUsuario_fin MUESTRA INFORMACION AL USUARIO DE LA OPERACION */

async function desHabUsuario_com(id, val) {
    myModalEspera.classList.add('show');
    const datos = {
        backend: 'desHabUsuario', id: id, val: val
    };
    // Codificamos...
    const _datos = JSON.stringify(datos);
    // Enviamos
    try {
        const respuestaRaw = await fetch("core/userController.php", {
            method: "POST",
            body: _datos,
        });
        // El servidor nos responderá con JSON
        const respuesta = await respuestaRaw.json();
        if (respuesta) {
            desHabUsuario_fin(respuesta);
        } else {
            console.log("nara");
        }
    } catch (e) {
        // En caso de que haya un error
        console.log(e);
    }
}

async function desHabUsuario_fin(datos) {
    limpiar_table();
    getUser_com();
    await sleep(1000);
    myModalEspera.classList.remove('show');
}
/* FUNCION QUE LIMPIA O VACIA LA TABLA DE USUARIOS */
function limpiar_table(datos) {
    let $table = document.querySelector("#lista_usuarios");
    $table.innerHTML = "";
}

/* DEFINICION DE FUNCIONES DE BOTONES */
btnBuscar.addEventListener('click', () => {
    buscarUsuario_com();
});

btnEditarmyModalEditarUsuario.addEventListener('click', () => {
    editarUsuario_com();
});

btnClosemyModalVerUsuario.addEventListener('click', () => {
    myModalVerUsuario.classList.remove('show');
});

btnClosemyModalEditarUsuario.addEventListener('click', () => {
    myModalEditarUsuario.classList.remove('show');
});

btnClosemyModalRespuesta.addEventListener('click', () => {
    window.location.href = "?p=usuarios_lista";
});

btnClosemyModalRespuestaError.addEventListener('click', () => {
    myModalRespuestaError.classList.remove('show');
});

/* DEFINICION DE VALIDACIONES COMO "SOLO ENTEROS" Y "SOLO NUMEROS" 
Y EL FORMATO DE EMAIL PARA LOS INPUT DEL FORMULARIO */
setInputFilter(document.getElementById("enombre"), function (value) {
    return /^[A-Za-z\s]+$/g.test(value); // Allow digits and '.' only, using a RegExp
});
setInputFilter(document.getElementById("eapellido"), function (value) {
    return /^[A-Za-z\s]+$/g.test(value); // Allow digits and '.' only, using a RegExp
});

setInputFilter(document.getElementById("etelefono"), function (value) {
    return /^\d*\.?\d*$/.test(value); // Allow digits and '.' only, using a RegExp
});
setInputFilter(document.getElementById("edni"), function (value) {
    return /^\d*\.?\d*$/.test(value); // Allow digits and '.' only, using a RegExp
});

function validateEmail(email) {
    const re = /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    return re.test(String(email).toLowerCase());
}

function setInputFilter(textbox, inputFilter) {
    ["input", "keydown", "keyup", "mousedown", "mouseup", "select", "contextmenu", "drop"].forEach(function (event) {
        textbox.addEventListener(event, function () {
            if (inputFilter(this.value)) {
                this.oldValue = this.value;
                this.oldSelectionStart = this.selectionStart;
                this.oldSelectionEnd = this.selectionEnd;
            } else if (this.hasOwnProperty("oldValue")) {
                this.value = this.oldValue;
                this.setSelectionRange(this.oldSelectionStart, this.oldSelectionEnd);
            } else {
                this.value = "";
            }
        });
    });
}

/* FUNCIONES EXTRAS */
function sleep(ms) {
    return new Promise(resolve => setTimeout(resolve, ms));
}
