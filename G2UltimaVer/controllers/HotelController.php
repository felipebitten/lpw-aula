<?php
class HotelController {

    var $LazerModel;

    function __construct(){
        require_once("models/HotelModel.php");
        $this -> HotelModel = new HotelModel();
    }


    public function hotelList(){
        $HotelModel = new HotelModel();
        $HotelModel -> hotelList();
        $result = $HotelModel -> getConsult();

        $arrayHotel = array();
        //arrayLazer
        while($line = $result->fetch_assoc()){
            array_push($arrayHotel,$line);
        }
        require_once("views/Header.php");
        require_once("views/hotel/Hotel.php");
        require_once("views/Footer.php");
    }
}
?>
