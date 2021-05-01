<style>
    .form-nuevo-user {
        padding: 1rem;
    }

    .form-nuevo-user input[type=text],
    input[type=password],
    select {
        width: 100%;
        padding: .5rem;
        display: inline-block;
        border: 1px solid #ccc;
        border-radius: 4px;
        box-sizing: border-box;
    }

    .form-nuevo-user input[type=submit] {
        width: 100%;
        background-color: #4CAF50;
        color: white;
        padding: 14px 20px;
        margin: 8px 0;
        border: none;
        border-radius: 4px;
        cursor: pointer;
    }

    .form-nuevo-user input[type=submit]:hover {
        background-color: #45a049;
    }


    .form-nuevo-user .div-btn {
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 1rem;
    }
</style>
<div class="main-content">
    <main>
        <h2 class="dash-title">Nuevo Usuario</h2>
        <section class="recent">
            <div class="user-grid">
                <div class="user-card">
                    <div class="header-user-card">
                        <div>
                            <h3>Formulario</h3>
                        </div>
                        <div class='btn'><a href='?p=usuarios_lista' class='badge info'>Lista Usuario</a></div>

                    </div>
                    <div class="form-nuevo-user">
                        <label for="nombre">Nombre</label>
                        <input type="text" id="nombre" name="Nombre" placeholder="Nombre">
                        <label for="apellido">Apellido</label>
                        <input type="text" id="apellido" name="Apellido" placeholder="Apellido">
                        <label for="dni">DNI</label>
                        <input type="text" id="dni" name="DNI" placeholder="DNI">
                        <label for="email">Email</label>
                        <input type="text" id="email" name="Email" placeholder="Email">
                        <label for="telefono">Telefono</label>
                        <input type="text" id="telefono" name="Telefono" placeholder="Telefono">
                        <label for="acceso">Nivel de Acceso</label>
                        <select name="Acceso" id="acceso">
                            <option value="0">--Seleccione un nivel de acceso--</option>
                            <option value="1">Administracion</option>
                            <option value="2">Usuario</option>
                        </select>
                        <label for="user">Usuario</label>
                        <input type="text" id="user" name="Usuario" placeholder="Usuario">
                        <label for="password">Password</label>
                        <input type="password" id="password" name="Password" placeholder="Password">
                        <label for="cpassword">Confirmar Password</label>
                        <input type="password" id="cpassword" name="Confirmar Password" placeholder="Confirmar Password">

                        <div class="div-btn">
                            <button id="btn-agregar-usuario" class="badge info">Agregar</button>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
</div>