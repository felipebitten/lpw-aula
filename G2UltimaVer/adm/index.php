<?php
session_start();
require_once("config/config.php");

if(!isset($_GET['c'])){
    require_once("controllers/MainController.php");
    $Main = new MainController();
    $Main -> index();
}else{
    switch($_REQUEST['c']){
        case 'm':
            require_once("controllers/MainController.php");
            $Main = new MainController();

            if(!isset($_GET['a'])){
                $Main -> index();
            }else{
                switch($_REQUEST['a']){
                    case 'i': $Main -> index(); break;
                    case 'l': $Main -> login(); break;
                    case 'sd': $Main -> session_destroy(); break;
                }
            }
            break;

            case 'u': 
                require_once("controllers/UsersController.php");
                $User = new UsersController();

                if(!isset($_GET['a'])){
                    $User -> index();
                }else{
                    switch($_REQUEST['a']){
                        case 'vl': $User -> validateLogin(); break;
                    }
                }
            break;

            case 'c':
                require_once("controllers/ClientsController.php");
                $Client = new ClientsController();

                if(!isset($_GET['a'])){
                    $Client -> index();
                }else{
                    switch($_REQUEST['a']){
                        case 'lc': $Client -> listClients(); break;
                        case 'ic': $Client -> insertClient(); break;
                        case 'ica': $Client -> insertClientAction(); break;
                        case 'uc': $id=$_GET['id']; $Client -> updateClient($id); break;
                        case 'uca': $Client -> updateClientAction(); break;
                        case 'dc': $id=$_GET['id']; $Client -> deleteClient($id); break;
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
                    case 'la': $Client -> lazerList(); break;
                    case 'li': $Client -> lazerInsert(); break;
                    case 'lia': $Client -> lazerInsertAction(); break;
                    case 'lu': $id=$_GET['id']; $Client -> lazerUpdate($id); break;
                    case 'lua': $Client -> lazerUpdateAction(); break;
                    case 'ld': $id=$_GET['id']; $Client -> lazerDelete($id); break;
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
                    case 'ha': $Client -> hotelList(); break;
                    case 'hi': $Client -> hotelInsert(); break;
                    case 'hia': $Client -> hotelInsertAction(); break;
                    case 'hu': $id=$_GET['id']; $Client -> hotelUpdate($id); break;
                    case 'hua': $Client -> hotelUpdateAction(); break;
                    case 'hd': $id=$_GET['id']; $Client -> hotelDelete($id); break;
                }
            }
        break;
    }
}
?>