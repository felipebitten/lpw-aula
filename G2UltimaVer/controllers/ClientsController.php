<?php
class ClientsController {

    var $ClientModel;

    function __construct(){
        require_once("models/ClientsModel.php");
        $this -> ClientModel = new ClientsModel();
    }

    public function index(){
        $this -> listClients();
    }

    public function home(){
        require_once("views/Header.php");
        require_once("views/Home.php");
        require_once("views/Footer.php");
    }

    public function sobre(){
        require_once("views/Header.php");
        require_once("views/Sobre.php");
        require_once("views/Footer.php");
    }

    public function listClients(){
        $ClientModel = new ClientsModel();
        $ClientModel -> listClients();
        $result = $ClientModel -> getConsult();

        $arrayClients = array();

        while($line = $result->fetch_assoc()){
            array_push($arrayClients,$line);
        }
        require_once("views/Header.php");
        require_once("views/clients/Alimentacao.php");
        require_once("views/Footer.php");
    }
}
?>
