<?php
include 'db.php';

class User extends DB{
    private $nombre;
    private $acceso;
    private $username;


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

    public function buscarUsuarios($datos){
        $query = $this->connect()->prepare('SELECT * FROM usuarios where dni = :dni');
        $query->execute(['dni' => $datos['inputBusqueda']]);
        
        if ($query->execute()) {
            $response = $query->fetchAll(PDO::FETCH_ASSOC);
            $respuesta["codigo"] = '000001';
            $respuesta["usuarios"] = $response;
        } else {
            $respuesta["codigo"] = '000000';
        }
        
        return $respuesta;
    }

    public function addUser($datos){
        $query = $this->connect()->prepare('INSERT INTO usuarios (nombre,apellido,dni,telefono,email,acceso,password,user,handler) VALUES (:nombre,:apellido,:dni,:telefono,:email,:acceso,:password,:user,:handler)');
        
        if ($query->execute(['nombre' => $datos['nombre'],'apellido' => $datos['apellido'],'dni' => $datos['dni'],'telefono' => $datos['telefono'],'email' => $datos['email'],'acceso' => $datos['acceso'],'password' => md5($datos['password']),'user' => $datos['user'],'handler' => 'asd']))
         {
            $respuesta["codigo"] = '000001';
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
