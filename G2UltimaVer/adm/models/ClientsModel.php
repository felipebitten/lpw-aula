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

        public function clientsCount(){
            $sql = 'SELECT COUNT(*) AS quantidadeclients FROM clients';
            $this -> result = $this -> conn -> query($sql);
        }


        public function consultClient($idClient){
            $sql = "SELECT * FROM clients WHERE idClient = ".$idClient.";";

            $this -> result = $this -> conn -> query($sql);
        }

        public function insertClients($arrayClient){
            $sql = "INSERT INTO clients (name, phone, email, address, descri) VALUES 
            ('".$arrayClient['name']."', '".$arrayClient['phone']."', '".$arrayClient['email']."',
            '".$arrayClient['address']."', '".$arrayClient['descri']."');";

            $this -> conn -> query($sql);

            $this -> result = $this -> conn -> insert_id;
        }

        public function updateClient($arrayClient){
            $sql = "UPDATE clients set name ='".$arrayClient['name']."',
            email='".$arrayClient['email']."', phone='".$arrayClient['phone']."', address='".$arrayClient['address']."',
            descri='".$arrayClient['descri']."' WHERE idClient=".$arrayClient['idClient'].";";
        
            $this -> conn -> query($sql);
        }

        public function deleteClient($idClient){
            $sql = "DELETE FROM clients WHERE idClient ='".$idClient."';";

            $this -> result = $this -> conn -> query($sql);
        }

        public function getConsult(){
            return $this -> result;
        }
    }
    ?>