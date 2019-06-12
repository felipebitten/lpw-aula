<?php
    class LazerModel{
        var $conn;
        var $result;

        function __construct(){
            require_once("bd/ConnectClass.php");
            $Oconn = new ConnectClass();
            $Oconn -> openConnect();
            $this -> conn = $Oconn -> getConnect();
        }

        public function lazerList(){
            $sql = 'SELECT * FROM lazer';
            $this -> result = $this -> conn -> query($sql);
        }

        public function consultLazer($idLazer){
            $sql = "SELECT * FROM lazer WHERE idLazer = ".$idLazer.";";

            $this -> result = $this -> conn -> query($sql);
        }

        public function getConsult(){
            return $this -> result;
        }
    }
    ?>