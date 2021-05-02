<?php
include 'db.php';

class User extends DB{
    private $nombre;
    private $acceso;
    private $username;

    public function buscarUsuarios($datos){
        $query = $this->connect()->prepare('SELECT * FROM usuarios where dni = :dni');
        if ( $query->execute(['dni' => $datos['inputBusqueda']])) {
            $response = $query->fetchAll(PDO::FETCH_ASSOC);
            $respuesta["codigo"] = '000001';
            $respuesta["usuarios"] = $response;
        } else {
            $respuesta["codigo"] = '000000';
        }
        
        return $respuesta;
    }

    public function agregarUsuario($datos){
        $query = $this->connect()->prepare('INSERT INTO usuarios (nombre,apellido,dni,telefono,email,acceso,password,user,handler) VALUES (:nombre,:apellido,:dni,:telefono,:email,:acceso,:password,:user,:handler)');
        
        if ($query->execute(['nombre' => $datos['nombre'],'apellido' => $datos['apellido'],'dni' => $datos['dni'],'telefono' => $datos['telefono'],'email' => $datos['email'],'acceso' => $datos['acceso'],'password' => md5($datos['password']),'user' => $datos['user'],'handler' => 'asd']))
         {
            $respuesta["codigo"] = '000001';
        } else {
            $respuesta["codigo"] = '000000';
        }
        
        return $respuesta;
    }

    public function editarUsuario($datos){
        $query = $this->connect()->prepare('UPDATE usuarios SET nombre=:nombre,apellido=:apellido,dni=:dni,telefono=:telefono,email=:email,acceso=:acceso,password=:password,user=:user,handler=:handler where id =:id');
        
        if ($query->execute(['id' => $datos['id'],'nombre' => $datos['nombre'],'apellido' => $datos['apellido'],'dni' => $datos['dni'],'telefono' => $datos['telefono'],'email' => $datos['email'],'acceso' => $datos['acceso'],'password' => md5($datos['password']),'user' => $datos['user'],'handler' => 'asd']))
         {
            $respuesta["codigo"] = '000001';
        } else {
            $respuesta["codigo"] = '000000';
        }
        
        return $respuesta;
    }

    public function desHabUsuario($datos){
        $query = $this->connect()->prepare('UPDATE usuarios SET estado=:estado,handler=:handler where id =:id');
        
        if ($query->execute(['id' => $datos['id'],'estado' => $datos['val'],'handler' => 'asd']))
         {
            $respuesta["codigo"] = '000001';
        } else {
            $respuesta["codigo"] = '000000';
        }
        
        return $respuesta;
    }

    public function userExists($user, $pass){
        $md5pass = md5($pass);
        $query = $this->connect()->prepare('SELECT * FROM usuarios WHERE user = :user AND password = :pass');
        $query->execute(['user' => $user, 'pass' => $md5pass]);

        if($query->rowCount()){
            return true;
        }else{
            return false;
        }
    }

    public function setUser($user){
        $query = $this->connect()->prepare('SELECT * FROM usuarios WHERE user = :user');
        $query->execute(['user' => $user]);
        
        foreach ($query as $currentUser) {
            $this->nombre = $currentUser['nombre'];
            $this->usename = $currentUser['user'];
            $this->acceso = $currentUser['acceso'];
        }
    }

    public function getUsers(){
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
    public function getUsers_com($datos){
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

    public function getNombre(){
        return $this->nombre;
    }

    public function getAcceso(){
        return $this->acceso;
    }
}
