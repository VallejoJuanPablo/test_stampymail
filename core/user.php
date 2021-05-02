<?php
include 'db.php';
class User extends DB
{
    private $nombre;
    private $acceso;
    private $username;

    //----------------------------------------------------------//
    //------------------FUNCIONES DE USUARIOS-------------------//
    //----------------------------------------------------------//

    /*
    Busqueda de usuario
    */
    public function buscarUsuarios($datos)
    {
        $query = $this->connect()->prepare('SELECT * FROM usuarios where dni = :dni');
        if ($query->execute(['dni' => $datos['inputBusqueda']])) {
            $response = $query->fetchAll(PDO::FETCH_ASSOC);
            $respuesta["codigo"] = '000001';
            $respuesta["usuarios"] = $response;
        } else {
            $respuesta["codigo"] = '000000';
        }

        return $respuesta;
    }

    /*
    Agregar un usuario
    */
    public function agregarUsuario($datos)
    {
        if ($this->checkDniAgregar($datos['dni'])) {
            $respuesta["codigo"] = '000004';
            $respuesta["mensaje"] = 'Ya existe un usuario para ese número de DNI';
            return $respuesta;
        }

        if ($this->checkUsernameAgregar($datos['user'])) {
            $respuesta["codigo"] = '000003';
            $respuesta["mensaje"] = 'User Existente';
            return $respuesta;
        }

        if ($datos['password'] == $datos['cpassword']) {
        } else {
            $respuesta["codigo"] = '000002';
            $respuesta["error"] = 'Error confirmando el Password';
            return $respuesta;
        }


        $query = $this->connect()->prepare('INSERT INTO usuarios (nombre,apellido,dni,telefono,email,acceso,password,user,handler) VALUES (:nombre,:apellido,:dni,:telefono,:email,:acceso,:password,:user,:handler)');

        if ($query->execute(['nombre' => $datos['nombre'], 'apellido' => $datos['apellido'], 'dni' => $datos['dni'], 'telefono' => $datos['telefono'], 'email' => $datos['email'], 'acceso' => $datos['acceso'], 'password' => md5($datos['password']), 'user' => $datos['user'], 'handler' => $_SESSION['user']])) {
            $respuesta["codigo"] = '000001';
            $respuesta["mensaje"] = 'Agregado con éxito';
        } else {
            $respuesta["codigo"] = '000000';
            $respuesta["mensaje"] = 'Error inesperado';
        }

        return $respuesta;
    }

    /*
    Editar de usuario 
    */
    public function editarUsuario($datos)
    {
        $cambioPassword = false;
        if ($this->checkUsername($datos['user'], $datos['id'])) {
            $respuesta["codigo"] = '000003';
            $respuesta["error"] = 'User Existente';
            return $respuesta;
        }
        if (($datos['password'] != "") || ($datos['cpassword'] != "")) {
            if ($datos['password'] == $datos['cpassword']) {
                $cambioPassword = true;
            } else {
                $respuesta["codigo"] = '000002';
                $respuesta["error"] = 'Error confirmando el Password';
                return $respuesta;
            }
        }

        if ($cambioPassword) {
            $query = $this->connect()->prepare('UPDATE usuarios SET nombre=:nombre,apellido=:apellido,dni=:dni,telefono=:telefono,email=:email,acceso=:acceso,user=:user,password=:password,handler=:handler where id =:id');
            if ($query->execute(['id' => $datos['id'], 'nombre' => $datos['nombre'], 'apellido' => $datos['apellido'], 'dni' => $datos['dni'], 'telefono' => $datos['telefono'], 'email' => $datos['email'], 'acceso' => $datos['acceso'], 'password' => md5($datos['password']), 'user' => $datos['user'], 'handler' => $_SESSION['user']])) {
                $respuesta["codigo"] = '000001';
            } else {
                $respuesta["codigo"] = '000000';
            }
            return $respuesta;
        } else {
            $query = $this->connect()->prepare('UPDATE usuarios SET nombre=:nombre,apellido=:apellido,dni=:dni,telefono=:telefono,email=:email,acceso=:acceso,user=:user,handler=:handler where id =:id');
            if ($query->execute(['id' => $datos['id'], 'nombre' => $datos['nombre'], 'apellido' => $datos['apellido'], 'dni' => $datos['dni'], 'telefono' => $datos['telefono'], 'email' => $datos['email'], 'acceso' => $datos['acceso'], 'user' => $datos['user'], 'handler' => $_SESSION['user']])) {
                $respuesta["codigo"] = '000001';
            } else {
                $respuesta["codigo"] = '000000';
            }
            return $respuesta;
        }
    }

    /*
    Habilitar o deshabilitar un usuario 
    */
    public function desHabUsuario($datos)
    {
        $query = $this->connect()->prepare('UPDATE usuarios SET estado=:estado,handler=:handler where id =:id');

        if ($query->execute(['id' => $datos['id'], 'estado' => $datos['val'], 'handler' => $_SESSION['user']])) {
            $respuesta["codigo"] = '000001';
        } else {
            $respuesta["codigo"] = '000000';
        }

        return $respuesta;
    }
    /*
    Contar cantidad de usuarios para mostrar en home
    */
    public function contarUsuarios()
    {

        $query = $this->connect()->prepare('SELECT Count(*) FROM usuarios');
        $query->execute();

        if ($query->rowCount()) {
            $response = $query->fetchColumn();
            return $response;
        } else {
            return false;
        }
    }

    /*
    Controla si ya existe el user ingresado en la modificacion de usuarios
    */
    public function checkUsername($user, $id)
    {
        $query = $this->connect()->prepare('SELECT * FROM usuarios WHERE user = :user AND id = :id');
        $query->execute(['user' => $user, 'id' => $id]);

        if ($query->rowCount()) {
            return true;
        } else {
            return false;
        }
    }

    /*
    Controla si ya existe el user ingresado al agregar un usuario
    */
    public function checkUsernameAgregar($user)
    {
        $query = $this->connect()->prepare('SELECT * FROM usuarios WHERE user = :user');
        $query->execute(['user' => $user]);

        if ($query->rowCount()) {
            return true;
        } else {
            return false;
        }
    }

    /*
    Controla si ya existe un usuario creado para el dni ingresado
    */
    public function checkDniAgregar($dni)
    {
        $query = $this->connect()->prepare('SELECT * FROM usuarios WHERE dni = :dni');
        $query->execute(['dni' => $dni]);

        if ($query->rowCount()) {
            return true;
        } else {
            return false;
        }
    }

    /*
    Controla si ya existe el usuario existe con user y password para el login
    */
    public function userExists($user, $pass)
    {
        $md5pass = md5($pass);
        $query = $this->connect()->prepare('SELECT * FROM usuarios WHERE user = :user AND password = :pass AND estado="S"');
        $query->execute(['user' => $user, 'pass' => $md5pass]);

        if ($query->rowCount()) {
            return true;
        } else {
            return false;
        }
    }

    /*
    Obtiene todos los usuarios para el uso de listar usuarios
    */
    public function getUsers()
    {
        $query = $this->connect()->prepare('SELECT * FROM usuarios');
        $query->execute();

        if ($query->execute()) {
            $response = $query->fetchAll(PDO::FETCH_ASSOC);
            $respuesta["codigo"] = '000001';
            $respuesta["usuarios"] = $response;
        } else {
            $respuesta["codigo"] = '000000';
        }

        return $respuesta;
    }

    /*
    Obtiene los datos usuario por numero de id generalmente para modificar
    */
    public function getUsers_cod($datos)
    {
        $query = $this->connect()->prepare('SELECT * FROM usuarios where id=:id');
        $query->execute(['id' => $datos['id']]);

        if ($query->execute()) {
            $response = $query->fetchAll(PDO::FETCH_ASSOC);
            $respuesta["codigo"] = '000001';
            $respuesta["usuarios"] = $response;
        } else {
            $respuesta["codigo"] = '000000';
        }

        return $respuesta;
    }

    public function setUser($user)
    {
        $query = $this->connect()->prepare('SELECT * FROM usuarios WHERE user = :user');
        $query->execute(['user' => $user]);

        foreach ($query as $currentUser) {
            $this->nombre = $currentUser['nombre'];
            $this->usename = $currentUser['user'];
            $this->acceso = $currentUser['acceso'];
        }
    }
    public function getNombre()
    {
        return $this->nombre;
    }

    public function getAcceso()
    {
        return $this->acceso;
    }
}
