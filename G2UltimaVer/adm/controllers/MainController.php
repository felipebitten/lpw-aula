<?php
class MainController {

    public function index(){
        if(!isset($_SESSION["login"])){
            header("Location: index.php?c=m&a=l");
        }
        require_once("models/LazerModel.php");
        $this -> LazerModel = new LazerModel();
        $this -> LazerModel -> lazerCount();
        $totallazer = $this -> LazerModel -> getConsult() -> fetch_assoc() ['quantidadelazer'];

        require_once("models/HotelModel.php");
        $this -> HotelModel = new HotelModel();
        $this -> HotelModel -> hotelCount();
        $totalhotel = $this -> HotelModel -> getConsult() -> fetch_assoc() ['quantidadehotel'];

        require_once("models/ClientsModel.php");
        $this -> ClientsModel = new ClientsModel();
        $this -> ClientsModel -> clientsCount();
        $totalclients = $this -> ClientsModel -> getConsult() -> fetch_assoc() ['quantidadeclients'];
        



        require("views/Header.php");
        require("views/Home.php");
        require("views/Footer.php");
    }
    
    public function login(){
        require("views/users/Login.php");
    }

    public function session_destroy(){
        session_destroy();
        header("Location: index.php?c=m&a=l");

    }
}
?>