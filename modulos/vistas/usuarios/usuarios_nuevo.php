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
    <header>
        <div class="search-wrapper">
            <span><i class="fa fa-search"></i></span>
            <input type="search" placeholder="buscar">

        </div>

        <div class="social-icons">
            <span><i class="fa fa-bell"></i></span>
            <span><i class="fa fa-comment"></i></span>
        </div>
    </header>
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
                    <form class="form-nuevo-user">
                        <label for="fname">Nombre</label>
                        <input type="text" id="fname" name="Nombre" placeholder="Nombre">

                        <label for="lname">Apellido</label>
                        <input type="text" id="lname" name="Apellido" placeholder="Apellido">
                        <label for="lname">DNI</label>
                        <input type="text" id="lname" name="DNI" placeholder="DNI">
                        <label for="lname">Email</label>
                        <input type="text" id="lname" name="Email" placeholder="Email">
                        <label for="lname">Telefono</label>
                        <input type="text" id="lname" name="Telefono" placeholder="Telefono">
                        <label for="lname">Usuario</label>
                        <input type="text" id="lname" name="Usuario" placeholder="Usuario">
                        <label for="lname">Password</label>
                        <input type="password" id="lname" name="Password" placeholder="Password">
                        <label for="lname">Confirmar Password</label>
                        <input type="password" id="lname" name="Confirmar Password" placeholder="Confirmar Password">

                        <div class="div-btn">
                            <button id="btn-agregar-usuario" class="badge info">Agregar</button>
                        </div>
                    </form>
                </div>
            </div>
        </section>
    </main>
</div>