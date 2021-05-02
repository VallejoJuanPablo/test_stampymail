<div class="modal-container" id="myModalVerUsuario">
    <div class="modal-dialog">
        <div class="modal-header">
            Ver Usuario
            <button class="close-modal" id="btnClosemyModalVerUsuario" aria-label="close modal" data-close>✕</button>
        </div>
        <section class="modal-content">
            <div class="form-user">
                <label for="nombre">Nombre</label>
                <input type="text" id="nombre" disabled name="Nombre" placeholder="Nombre">
                <label for="apellido">Apellido</label>
                <input type="text" id="apellido" disabled name="Apellido" placeholder="Apellido">
                <label for="dni">DNI</label>
                <input type="text" id="dni" disabled name="DNI" placeholder="DNI">
                <label for="email">Email</label>
                <input type="text" id="email" disabled name="Email" placeholder="Email">
                <label for="telefono">Telefono</label>
                <input type="text" id="telefono" disabled name="Telefono" placeholder="Telefono">
                <label for="acceso">Nivel de Acceso</label>
                <select disabled name="Acceso" id="acceso">
                    <option value="0">--Seleccione un nivel de acceso--</option>
                    <option value="1">Administracion</option>
                    <option value="2">Usuario</option>
                </select>
                <label for="user">Usuario</label>
                <input type="text" id="user" disabled name="Usuario" placeholder="Usuario">
                <label for="password">Password</label>
                <input type="password" id="password" disabled name="Password" placeholder="Password">
                <label for="cpassword">Confirmar Password</label>
                <input type="password" id="cpassword" disabled name="Confirmar Password" placeholder="Confirmar Password">

                
            </div>
        </section>
        <footer class="modal-footer"></footer>
    </div>
</div>

<div class="modal-container" id="myModalEditarUsuario">
    <div class="modal-dialog">
        <div class="modal-header">
            Editar Usuario
            <button class="close-modal" id = "btnClosemyModalEditarUsuario"aria-label="close modal" data-close>✕</button>
        </div>
        <section class="modal-content">
            <div class="form-user">
            <input type="hidden" id="eid" name="id" placeholder="id" >
                <label for="enombre">Nombre</label>
                <input type="text" id="enombre" name="Nombre" placeholder="Nombre">
                <label for="eapellido">Apellido</label>
                <input type="text" id="eapellido" name="Apellido" placeholder="Apellido">
                <label for="edni">DNI</label>
                <input type="text" id="edni" name="DNI" placeholder="DNI">
                <label for="eemail">Email</label>
                <input type="text" id="eemail" name="Email" placeholder="Email">
                <label for="etelefono">Telefono</label>
                <input type="text" id="etelefono" name="Telefono" placeholder="Telefono">
                <label for="eacceso">Nivel de Acceso</label>
                <select name="Acceso" id="eacceso">
                    <option value="0">--Seleccione un nivel de acceso--</option>
                    <option value="1">Administracion</option>
                    <option value="2">Usuario</option>
                </select>
                <label for="euser">Usuario</label>
                <input type="text" id="euser" name="Usuario" placeholder="Usuario">
                <label for="epassword">Password</label>
                <input type="password" id="epassword" name="Password" placeholder="Password">
                <label for="ecpassword">Confirmar Password</label>
                <input type="password" id="ecpassword" name="Confirmar Password" placeholder="Confirmar Password">

                <div class="div-btn">
                    <button id="btnEditarmyModalEditarUsuario" class="badge info">Editar</button>
                </div>
            </div>
        </section>
        <footer class="modal-footer"></footer>
    </div>
</div>

<div class="modal-container" id="myModalEspera">
    <div class="modal-dialog">
        <div class="modal-header">
          
        </div>
        <img src="./img/dino.gif" class="dino" alt="Flowers in Chania">
        <div class="modal-content">
          Espere por favor...
        </div>
        <footer class="modal-footer"></footer>
    </div>
</div>