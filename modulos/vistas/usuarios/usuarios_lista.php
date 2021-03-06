  <div class="main-content">
      <main>
          <h2 class="dash-title">Lista de Usuarios</h2>
          <section class="mt-2">
              <div class="user-grid">
                  <div class="user-card">
                      <div class="header-user-card">
                          <div class="search-wrapper">
                              <span><i class="fa fa-search"></i></span>
                              <input type="text" id="input-busquedas"  placeholder="Buscar por dni...">
                          </div>
                          <div class='btn'><button id="btn-buscar-usuario" class='badge info'>Buscar</button></div>
                      </div>

                  </div>
              </div>
          </section>
          <section class="mt-2">
              <div class="user-grid">
                  <div class="user-card">
                      <div class="header-user-card">
                          <div>
                              <h3>Usuarios</h3>
                          </div>
                          <div class='btn'><a href='?p=usuarios_nuevo' class='badge info'>Agregar nuevo</a></div>
                      </div>
                      <div class="table-responsive">
                          <table>
                              <thead>
                                  <tr>
                                      <th>Nombre</th>
                                      <th>Apellido</th>
                                      <th>DNI</th>
                                      <th>Usuario</th>
                                      <th>Acceso</th>
                                      <th>Estado</th>
                                      <th>Acciones</th>
                                  </tr>
                              </thead>
                              <tbody id="lista_usuarios">
                              </tbody>
                          </table>
                      </div>
                  </div>
              </div>
          </section>
      </main>
  </div>
 

<?php include_once 'usuarios_lista_modales.php';?>
<?php include_once 'usuarios_modales.php';?>