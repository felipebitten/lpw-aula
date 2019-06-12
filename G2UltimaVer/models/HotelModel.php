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

        public function consultClient($idHotel){
            $sql = "SELECT * FROM hotel WHERE idHotel = ".$idHotel.";";

            $this -> result = $this -> conn -> query($sql);
        }

        public function getConsult(){
            return $this -> result;
        }
    }
    ?>