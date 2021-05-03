/* DEFINICION DE CONSTANTES */
const myModalEspera = document.getElementById('myModalEspera');
const myModalRespuesta = document.getElementById('myModalRespuesta');
const myModalRespuestaError = document.getElementById('myModalRespuestaError');
const btnClosemyModalRespuesta = document.getElementById('btnClosemyModalRespuesta');
const btnClosemyModalRespuestaError = document.getElementById('btnClosemyModalRespuestaError');
const btnNuevoUsuario = document.querySelector("#btn-agregar-usuario");

/* VALORES DEL FORMULARIO */
const $nombre = document.querySelector("#nombre"),
    $apellido = document.querySelector("#apellido"),
    $email = document.querySelector("#email"),
    $acceso = document.querySelector("#acceso"),
    $telefono = document.querySelector("#telefono"),
    $user = document.querySelector("#user"),
    $password = document.querySelector("#password"),
    $cpassword = document.querySelector("#cpassword"),
    $dni = document.querySelector("#dni");

/* FUNCIONES DE AGREGAR USUARIO CONSTA DE 3 PARTES 
-agregarUsuario_com REALIZA UN PRIMER CHECKEO DE LOS DATOS
-agregarUsuario GENERA EL ENVIO AL CONTROLADOR DE USUARIO
-agregarUsuario_fin MUESTRA INFORMACION AL USUARIO DE LA OPERACION
 */
function agregarUsuario_com() {
    if ($nombre.value == '' || $apellido.value == '' || $dni.value == '' || $telefono.value == '' || $email.value == '' || $acceso.value == '0' || $user.value == '' || $password.value == '' || $cpassword.value == '') {
        let resError = document.querySelector("#resError");
        resError.innerHTML = 'Por favor completar todos los campos del formulario';
        myModalRespuestaError.classList.add('show');
    } else if ((validateEmail($email.value))) {
        agregarUsuario();
    } else {
        let resError = document.querySelector("#resError");
        resError.innerHTML = 'Por favor corroborar el formato del email';
        myModalRespuestaError.classList.add('show');
    }

}
async function agregarUsuario() {
    myModalEspera.classList.add('show');
    await sleep(500);
    const nombre = $nombre.value,
        apellido = $apellido.value,
        dni = $dni.value,
        email = $email.value,
        telefono = $telefono.value,
        user = $user.value,
        password = $password.value,
        cpassword = $cpassword.value,
        acceso = $acceso.value;
    // Lo que vamos a enviar a PHP
    const datos = {
        backend: 'agregarUsuario',
        nombre: nombre,
        apellido: apellido,
        dni: dni,
        email: email,
        telefono: telefono,
        user: user,
        password: password,
        cpassword: cpassword,
        acceso: acceso
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

            agregarUsuario_fin(respuesta);
        } else {
            console.log('else');
        }
    } catch (e) {
        // En caso de que haya un error
        console.log(e);
    }
}
function agregarUsuario_fin(datos) {
    myModalEspera.classList.remove('show');
    switch (datos.codigo) {
        case "000001":
            let res = document.querySelector("#res");
            res.innerHTML = datos.mensaje;
            myModalRespuesta.classList.add('show');
            break;
        case "000000":
        case "000002":
        case "000003":
        case "000004":
            let resError = document.querySelector("#resError");
            resError.innerHTML = datos.mensaje;
            myModalRespuestaError.classList.add('show');
            break;

        default:
            break;
    }
}

/* DEFINICION DE EVENTOS DE BOTONES */
btnNuevoUsuario.addEventListener('click', () => {
    agregarUsuario_com();
});

btnClosemyModalRespuesta.addEventListener('click', () => {
    window.location.href = "?p=usuarios_lista";
});

btnClosemyModalRespuestaError.addEventListener('click', () => {
    myModalRespuestaError.classList.remove('show');
});

/* DEFINICION DE VALIDACIONES COMO "SOLO ENTEROS" Y "SOLO NUMEROS" 
Y EL FORMATO DE EMAIL PARA LOS INPUT DEL FORMULARIO */
setInputFilter(document.getElementById("nombre"), function (value) {
    return /^[A-Za-z\s]+$/g.test(value); // Allow digits and '.' only, using a RegExp
});

setInputFilter(document.getElementById("apellido"), function (value) {
    return /^[A-Za-z\s]+$/g.test(value); // Allow digits and '.' only, using a RegExp
});

setInputFilter(document.getElementById("telefono"), function (value) {
    return /^\d*\.?\d*$/.test(value); // Allow digits and '.' only, using a RegExp
});

setInputFilter(document.getElementById("dni"), function (value) {
    return /^\d*\.?\d*$/.test(value); // Allow digits and '.' only, using a RegExp
});

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

function validateEmail(email) {
    const re = /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    return re.test(String(email).toLowerCase());
}

/* FUNCIONES EXTRAS */
function sleep(ms) {
    return new Promise(resolve => setTimeout(resolve, ms));
}


