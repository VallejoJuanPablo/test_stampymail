onInit();

function onInit() {

    contarUsuarios_com();
}

/* FUNCION QUE CUENTA CANTIDAD DE USUARIOS PARA 
MOSTRAR EN EL HOME */
async function contarUsuarios_com() {
    const datos = {
        backend: 'contarUsuarios',
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
            contarUsuarios_fin(respuesta);
        } else {
            console.log("else");
        }
    } catch (e) {
        // En caso de que haya un error
        console.log(e);
    }
}

async function contarUsuarios_fin(datos) {
    let h4 = document.querySelector("#cantidadUsuarios");

    h4.innerHTML = datos;
}


