$(document).ready(function () {
    const myModalEditarUsuario = document.getElementById('myModalEditarUsuario');
    const myModalVerUsuario = document.getElementById('myModalVerUsuario');
    const btnClosemyModalVerUsuario = document.getElementById('btnClosemyModalVerUsuario');
    const btnClosemyModalEditarUsuario = document.getElementById('btnClosemyModalEditarUsuario');
    const btnEditarmyModalEditarUsuario = document.getElementById('btnEditarmyModalEditarUsuario');


    const $inputBusqueda = document.querySelector("#input-busqueda"),
        $btnBuscar = document.querySelector("#btn-buscar-usuario");

    onInit();

    function onInit() {
        getUser_com();
    }

    //##########################################################################
    //---------------------------FUNCIONES DE ROL-------------------------------
    //##########################################################################

    //##########################################################################
    //---------------FUNCIONES SIMPLES PARA RELLENAR FORMULARIO-----------------
    //##########################################################################


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
            if (item.estado == "S") {
                aux += "<td><button class='badge success'>Activo</button></td><td><button data-opt='1' data-val='N' value='" + item.id + "'class='badge warning'>Deshabilitar</button>";
            } else {
                aux += "<td><button class='badge warning'>Inactivo</button></td><td><button data-opt='1' data-val='S' value='" + item.id + "'class='badge success'>Habilitar</button>";
            }
            aux += "<button data-opt='2' value='" + item.id + "' class='badge green t'>Modificar</button> <button data-opt='3' value='" + item.id + "' class='badge danger'>Ver</button></td></tr>";
        }
        table.innerHTML = aux;
    }

    async function getUser_cod_com(id) {
        const datos = {
            backend: 'getUsers_com', id: id
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

    async function getUser_cod2_com(id) {
        const datos = {
            backend: 'getUsers_com', id: id
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

    function limpiar_table(datos) {
        let $table = document.querySelector("#lista_usuarios");
        $table.innerHTML = "";
    }

    $("#lista_usuarios").on("click", "button", function (e) {
        e.preventDefault();
        var opt = $(this).data("opt");
        var id = $(this).val();
        console.log(id);
        //$("#myAlert").modal({ backdrop: "static", keyboard: false });
        //$("#myAlert").modal("show");
        switch (opt) {
            case 3:
                var val = $(this).data("val");
                console.log(id);
                getUser_cod_com(id);
                break;
            case 2:
                getUser_cod2_com(id);
                break;
            case 1:
                getUser_cod_com(id);
                break;
            default:
                break;
        }
    });


    $btnBuscar.onclick = async () => {
        const datos = {
            backend: 'buscarUsuarios',inputBusqueda: $inputBusqueda.value,
          
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
                limpiar_table();
                getUser_fin(respuesta);
            } else {
                console.log("nara");
            }
        } catch (e) {
            // En caso de que haya un error
            console.log(e);
        }

    };

    btnEditarmyModalEditarUsuario.onclick = async () => {
        const datos = {
            backend: 'editarUsuario', 
             id: document.getElementById("eid").value,
            nombre: document.getElementById("enombre").value,
            apellido: document.getElementById("eapellido").value,
            email: document.getElementById("eemail").value,
            telefono: document.getElementById("etelefono").value,
            dni: document.getElementById("edni").value,
            acceso: document.getElementById("eacceso").value,
            telefono: document.getElementById("etelefono").value,
            user: document.getElementById("euser").value,
            password: document.getElementById("epassword").value,
            cpassword: document.getElementById("ecpassword").value
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
                
                limpiar_table();
                getUser_com();
                myModalEditarUsuario.classList.remove('show');
            } else {
                console.log("nara");
            }
        } catch (e) {
            // En caso de que haya un error
            console.log(e);
        }

    };




    btnClosemyModalVerUsuario.addEventListener('click', () => {
        myModalVerUsuario.classList.remove('show');
    });

    btnClosemyModalEditarUsuario.addEventListener('click', () => {
        myModalEditarUsuario.classList.remove('show');
    });

});
