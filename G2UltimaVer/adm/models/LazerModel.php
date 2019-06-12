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

        public function lazerCount(){
            $sql = 'SELECT COUNT(*) AS quantidadelazer FROM lazer';
            $this -> result = $this -> conn -> query($sql);
        }

        public function consultLazer($idLazer){
            $sql = "SELECT * FROM lazer WHERE idLazer = ".$idLazer.";";

            $this -> result = $this -> conn -> query($sql);
        }

        public function lazerInsert($arrayLaz){
            $sql = "INSERT INTO lazer (name, phone, email, address, descri) VALUES 
            ('".$arrayLaz['name']."', '".$arrayLaz['phone']."', '".$arrayLaz['email']."',
            '".$arrayLaz['address']."', '".$arrayLaz['descri']."');";

            $this -> conn -> query($sql);

            $this -> result = $this -> conn -> insert_id;
        }

        public function lazerUpdate($arrayLaz){
            $sql = "UPDATE lazer set name ='".$arrayLaz['name']."',
            email='".$arrayLaz['email']."', phone='".$arrayLaz['phone']."', address='".$arrayLaz['address']."',
            descri='".$arrayLaz['descri']."' WHERE idLazer=".$arrayLaz['idLazer'].";";
        
            $this -> conn -> query($sql);
        }

        public function lazerDelete($idLazer){
            $sql = "DELETE FROM lazer WHERE idLazer ='".$idLazer."';";

            $this -> result = $this -> conn -> query($sql);
        }

        public function getConsult(){
            return $this -> result;
        }
    }
    ?>