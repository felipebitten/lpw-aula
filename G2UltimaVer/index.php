<?php
session_start();
require_once("config/config.php");

if(!isset($_GET['c'])){
    require_once("controllers/MainController.php");
    $Main = new MainController();
    $Main -> index();
}else{
    switch($_REQUEST['c']){
            case 'c':
                require_once("controllers/ClientsController.php");
                $Client = new ClientsController();

                if(!isset($_GET['a'])){
                    $Client -> index();
                }else{
                    switch($_REQUEST['a']){
                        case 'i': $Client -> home(); break;
                        case 'lc': $Client -> listClients(); break;
                        case 'ic': $Client -> sobre(); break;
                    }
                }
            break;
            case 'l':
            require_once("controllers/LazerController.php");
            $Client = new LazerController();

            if(!isset($_GET['a'])){
                $Client -> index();
            }else{
                switch($_REQUEST['a']){
                    case 'll': $Client -> lazerList(); break;
                }
            }
        break;
            case 'h':
            require_once("controllers/HotelController.php");
            $Client = new HotelController();

            if(!isset($_GET['a'])){
                $Client -> index();
            }else{
                switch($_REQUEST['a']){
                    case 'hl': $Client -> hotelList(); break;
                }
            }
        break;
    }
}
?>