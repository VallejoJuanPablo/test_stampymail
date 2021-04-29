<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css">
    <link href='index.css' rel='stylesheet'>
    <title>Document</title>
</head>

<body>
    <input type="checkbox" id="sidebar-toggle">
    <div class="sidebar">
        <div class="sidebar-header">
            <h3 class="brand">
                <span><i class="fa fa-mail"></i></span>
                <span>Stampymail</span>
            </h3>
            <label for="sidebar-toggle"><i class="fa fa-bars"></i></label>
        </div>
        <div class="sidebar-menu">
            <ul>
                <li>
                    <a href="">
                        <span><i class="fa fa-users"></i></span>
                        <span>Usuarios</span></a>
                </li>
                <li>
                    <a href="">
                        <span><i class="fa fa-sign-out"></i></span>
                        <span>Salir</span></a>
                </li>
            </ul>
        </div>
    </div>

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
            <h2 class="dash-title">Principal-Home</h2>
            <div class="dash-cards">
                <div class="card-single">
                    <div class="card-body">
                        <span><i class="fa fa-users"></i></span>
                        <div>
                            <h5> Usuarios</h5>
                            <h4> 50</h4>

                        </div>
                    </div>
                    <div class="card-footer">
                        <a href="">Ver Todos</a>
                    </div>
                </div>
                <div class="card-single">
                    <div class="card-body">
                        <span><i class="fa fa-users"></i></span>
                        <div>
                            <h5> Usuarios</h5>
                            <h4> 50</h4>

                        </div>
                    </div>
                    <div class="card-footer">
                        <a href="">Ver Todos</a>
                    </div>
                </div>
                <div class="card-single">
                    <div class="card-body">
                        <span><i class="fa fa-users"></i></span>
                        <div>
                            <h5> Usuarios</h5>
                            <h4> 50</h4>

                        </div>
                    </div>
                    <div class="card-footer">
                        <a href="">Ver Todos</a>
                    </div>
                </div>
            </div>

            <section class="recent">
                <div class="activity-grid">
                    <div class="activity-card">
                        <h3>Recent Activity</h3>
                        <div class="table-responsive">
                            <table>
                                <thead>
                                    <tr>
                                        <th>Nombre</th>
                                        <th>Apellido</th>
                                        <th>DNI</th>
                                        <th>Usuario</th>
                                        <th>Estado</th>
                                    </tr>

                                </thead>
                                <tbody>
                                    <tr>
                                        <td>1123123asd</td>
                                        <td>a333123sd</td>
                                        <td>as312312d</td>
                                        <td class="td-team">
                                            <div class="img-1"></div>
                                            <div class="img-2"></div>
                                            <div class="img-3"></div>
                                        </td>
                                        <td><span class="badge warning">Success</span></td>
                                    </tr>
                                    <tr>
                                        <td>1123123asd</td>
                                        <td>a333123sd</td>
                                        <td>as312312d</td>
                                        <td class="td-team">
                                            <div class="img-1"></div>
                                            <div class="img-2"></div>
                                            <div class="img-3"></div>
                                        </td>
                                        <td><span class="badge success">Success</span></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="summary">
                        <div class="summary-card">
                            <div class="summary-single">
                                <span><i class="fa fa-users"></i></span>
                                <div>
                                    <h5>196</h5>
                                    <small>number of staff</small>
                                </div>
                            </div>
                            <div class="summary-single">
                                <span><i class="fa fa-calendar"></i></span>
                                <div>
                                    <h5>16</h5>
                                    <small>number of leave</small>
                                </div>
                            </div>
                            <div class="summary-single">
                                <span><i class="fa fa-smile-o"></i></span>
                                <div>
                                    <h5>12</h5>
                                    <small>Profile update</small>
                                </div>
                            </div>
                        </div>
                        <div class="bday-card">
                            <div class="bday-flex">
                                <div class="bday-img"></div>
                                <div class="bday-info">
                                    <h5>asdas</h5>
                                    <small>asdasd</small>
                                </div>
                            </div>
                            <div class="text-center">
                                <button>
                                    <span><i class="fa fa-gift"></i></span>
                                    wish him
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </main>
    </div>
</body>

</html>