$(document).ready(function () {
  
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
 
   
    $btnBuscar.onclick = async () => {
        const datos = {
            backend: 'buscarUsuarios', inputBusqueda:$inputBusqueda.value,
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
  
    function limpiar_table(datos) {  
        let $table = document.querySelector("#lista_usuarios");
        $table.innerHTML = "";
    }

    function getUser_fin(datos) {  
    let table = document.querySelector("#lista_usuarios");
    let tr = document.createElement("tr");
    let aux = "";
    for(let item of datos.usuarios){
       
        aux += "<tr><td>"+item.nombre+"</td><td>"+item.apellido+"</td><td>"+item.dni+"</td><td>"+item.user+"</td>";
        if(item.estado == "S"){
            aux += "<td><span class='badge success'>Activo</span></td>";
        }else{
            aux += "<td><span class='badge success'>Inactivo</span></td>";
        }
        aux += "<td><button class='badge green'>Modificar</button> <button class='badge danger'>Deshabilitar</button></td></tr>";
        
    
    }
    table.innerHTML=aux;
    }
  });
  