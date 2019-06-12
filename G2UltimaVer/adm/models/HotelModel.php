<?php
    class HotelModel{
        var $conn;
        var $result;

        function __construct(){
            require_once("bd/ConnectClass.php");
            $Oconn = new ConnectClass();
            $Oconn -> openConnect();
            $this -> conn = $Oconn -> getConnect();
        }

        public function hotelList(){
            $sql = 'SELECT * FROM hotel';
            $this -> result = $this -> conn -> query($sql);
        }

        public function hotelCount(){
            $sql = 'SELECT COUNT(*) AS quantidadehotel FROM hotel';
            $this -> result = $this -> conn -> query($sql);
        }

        public function consultHotel($idHotel){
            $sql = "SELECT * FROM hotel WHERE idHotel = ".$idHotel.";";

            $this -> result = $this -> conn -> query($sql);
        }

        public function hotelInsert($arrayHot){
            $sql = "INSERT INTO hotel (name, phone, email, address, descri) VALUES 
            ('".$arrayHot['name']."', '".$arrayHot['phone']."', '".$arrayHot['email']."',
            '".$arrayHot['address']."', '".$arrayHot['descri']."');";

            $this -> conn -> query($sql);

            $this -> result = $this -> conn -> insert_id;
        }

        public function hotelUpdate($arrayHot){
            $sql = "UPDATE hotel set name ='".$arrayHot['name']."',
            email='".$arrayHot['email']."', phone='".$arrayHot['phone']."', address='".$arrayHot['address']."',
            descri='".$arrayHot['descri']."' WHERE idHotel=".$arrayHot['idHotel'].";";
        
            $this -> conn -> query($sql);
        }

        public function hotelDelete($idHotel){
            $sql = "DELETE FROM hotel WHERE idHotel ='".$idHotel."';";

            $this -> result = $this -> conn -> query($sql);
        }

        public function getConsult(){
            return $this -> result;
        }
    }
    ?>