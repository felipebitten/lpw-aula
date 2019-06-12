<?php 
class ConnectClass {
    var $conn;

    function openConnect() {
        $servername = 'localhost';
        $username = 'root';
        $password = '';
        $dbname = 'lpw';
        $this -> conn = new mysqli($servername, $username, $password, $dbname);
    }

    function getConnect(){
        return $this -> conn;
    }
}