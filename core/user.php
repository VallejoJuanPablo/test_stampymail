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

    public function getNombre(){
        return $this->nombre;
    }
    public function getAcceso(){
        return $this->acceso;
    }
}

?>