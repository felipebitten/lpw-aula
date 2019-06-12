<?php
class UsersModel{
    var $result;

    function __construct(){
        require_once("bd/ConnectClass.php");
    }

    public function consultUser($login){
        $Oconn = new ConnectClass();
        $Oconn -> openConnect();
        $sql = "SELECT * FROM users WHERE login='".$login."'";
        $conn = $Oconn -> getConnect();
        $this -> result = $conn -> query($sql);
    }

    public function getConsult(){
        return $this -> result;
    }

}
?>