<?php
class LazerController {

    var $LazerModel;

    function __construct(){
        require_once("models/LazerModel.php");
        $this -> LazerModel = new LazerModel();
    }


    public function lazerList(){
        $LazerModel = new LazerModel();
        $LazerModel -> lazerList();
        $result = $LazerModel -> getConsult();

        $arrayLazer = array();

        while($line = $result->fetch_assoc()){
            array_push($arrayLazer,$line);
        }
        require_once("views/Header.php");
        require_once("views/lazer/Lazer.php");
        require_once("views/Footer.php");
    }
}
?>
