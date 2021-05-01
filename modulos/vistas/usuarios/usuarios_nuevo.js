$(document).ready(function () {
  
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
            backend : 'addUser',
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
    
             console.log(respuesta);
            } else {
                console.log('else');
            }
        } catch (e) {
            // En caso de que haya un error
            console.log(e);
        }
    };
    
  });
  