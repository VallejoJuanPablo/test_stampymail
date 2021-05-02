$(document).ready(function () {
    const myModalEspera = document.getElementById('myModalEspera');
    const myModalRespuesta = document.getElementById('myModalRespuesta');
    const myModalRespuestaError = document.getElementById('myModalRespuestaError');
    const btnClosemyModalRespuesta = document.getElementById('btnClosemyModalRespuesta');
    const btnClosemyModalRespuestaError = document.getElementById('btnClosemyModalRespuestaError');

    const $nombre = document.querySelector("#nombre"),
    $apellido = document.querySelector("#apellido"),
    $email = document.querySelector("#email"),
    $acceso = document.querySelector("#acceso"),
    $telefono = document.querySelector("#telefono"),
    $user = document.querySelector("#user"),
    $password = document.querySelector("#password"),
    $cpassword = document.querySelector("#cpassword"),
    $dni = document.querySelector("#dni"),
    $btnNuevoUsuario = document.querySelector("#btn-agregar-usuario");
   
    $btnNuevoUsuario.onclick = async () => {
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
            backend : 'agregarUsuario',
            nombre: nombre, 
            apellido : apellido,
            dni : dni,
            email : email,
            telefono : telefono,
            user : user,
            password : password,
            cpassword : cpassword,
            acceso : acceso
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
    };
    
    function agregarUsuario_fin(datos) {
        myModalEspera.classList.remove('show');
        switch (datos.codigo) {
            case "000001":
                let res = document.querySelector("#res");
                res.innerHTML = 'Agregado con éxito';
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

    btnClosemyModalRespuesta.addEventListener('click', () => {
        window.location.href = "?p=usuarios_lista";
    });

    btnClosemyModalRespuestaError.addEventListener('click', () => {
        myModalRespuestaError.classList.remove('show');
    });

    function sleep(ms) {
        return new Promise(resolve => setTimeout(resolve, ms));
    }
  });
  