<?php
    class ClientsModel{
        var $conn;
        var $result;

        function __construct(){
            require_once("bd/ConnectClass.php");
            $Oconn = new ConnectClass();
            $Oconn -> openConnect();
            $this -> conn = $Oconn -> getConnect();
        }

        public function listClients(){
            $sql = 'SELECT * FROM clients';
            $this -> result = $this -> conn -> query($sql);
        }

        public function consultClient($idClient){
            $sql = "SELECT * FROM clients WHERE idClient = ".$idClient.";";

            $this -> result = $this -> conn -> query($sql);
        }

        public function getConsult(){
            return $this -> result;
        }
    }
    ?>