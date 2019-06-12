<?php
class HotelController {

    var $HotelModel;

    function __construct(){
        if(!isset($_SESSION["login"])){
            header("Location: index.php?c=m&a=l");
        }

        require_once("models/HotelModel.php");
        $this -> HotelModel = new HotelModel();
    }

    public function index(){
        $this -> hotelList();
    }

    public function hotelList(){
        $HotelModel = new HotelModel();
        $HotelModel -> hotelList();
        $result = $HotelModel -> getConsult();

        $arrayHotel = array();

        while($line = $result->fetch_assoc()){
            array_push($arrayHotel,$line);
        }
        require_once("views/Header.php");
        require_once("views/hotel/HotelList.php");
        require_once("views/Footer.php");
    }

    public function hotelInsert(){
        require_once("views/Header.php");
        require_once("views/hotel/HotelInsert.php");
        require_once("views/Footer.php");
    }
    
    public function hotelInsertAction(){
        $arrayHot["name"] = $_POST["name"];
        $arrayHot["address"] = $_POST["address"];
        $arrayHot["phone"] = $_POST["phone"];
        $arrayHot["email"] = $_POST["email"];
        $arrayHot["descri"] = $_POST["descri"];
        //arrayLaz arrayHot

        $this -> HotelModel -> hotelInsert($arrayHot);

        $idHotel = $this -> HotelModel -> getConsult();

        $foto_temp = $_FILES["photo"]["tmp_name"];	//pega o caminho tempor�rio do arquivo
        $foto_name = $_FILES["photo"]["name"];		//pega o nome

        $extensao = str_replace('.','',strrchr($foto_name, '.')); //strtolower(end(explode('.', $foto_name))); //seleciona a exten��o da imagem
        $max_width = 600; //define largura m�xima
        $max_height = 600; //define altura m�xima

        // Carrega a imagem
        $img = null;

                //Transforma a imagem em JPG
        if ($extensao == 'jpg' || $extensao == 'jpeg') { 
            $img = @imagecreatefromjpeg($foto_temp);
        } else if ($extensao == 'png') { 
            $img = @imagecreatefrompng($foto_temp);
        } else if ($extensao == 'gif') { 
            $img = @imagecreatefromgif($foto_temp); 
        }  else     
            $img = @imagecreatefromjpeg($foto_temp); 

        // Se a imagem foi carregada com sucesso, testa o tamanho da mesma
        if ($img) { 
            // Pega o tamanho da imagem e calcula propor��o de resize 
            $width  = imagesx($img); 
            $height = imagesy($img); 
            $scale  = min($max_width/$width, $max_height/$height); 
            // Se a imagem � maior que o permitido, encolhe ela! 
            if ($scale < 1) { 
                $new_width = floor($scale*$width); 
                $new_height = floor($scale*$height);
                // Cria uma imagem tempor�ria 
                $tmp_img = @imagecreatetruecolor($new_width, $new_height);
                // Copia e resize a imagem velha na nova     
                @imagecopyresampled($tmp_img, $img, 0, 0, 0, 0, 
                                $new_width, $new_height, $width, $height);  
                @imagedestroy($img); 
                $img = $tmp_img; 
            }           
        }

        //cria imagem no diret�rio @imagejpeg($img,"diretorio/".$id_noticia) se j� tiver com este nome vai substituir
        @imagejpeg($img,"assets/img/hotel/".$idHotel.".jpg"); 

        $this -> hotelList();
    }

    public function hotelUpdate($idHotel){
        $this -> HotelModel -> consultHotel($idHotel);
        $result = $this -> HotelModel -> getConsult();

        if ($arrayHot = $result->fetch_assoc()){
            require_once("views/Header.php");
            require_once("views/hotel/HotelAlter.php");
            require_once("views/Footer.php");
        }
    }

    public function hotelUpdateAction(){
        $arrayHot["idHotel"] = $_POST["idHotel"];
        $arrayHot["name"] = $_POST["name"];
        $arrayHot["address"] = $_POST["address"];
        $arrayHot["phone"] = $_POST["phone"];
        $arrayHot["email"] = $_POST["email"];
        $arrayHot["descri"] = $_POST["descri"];

        $this -> HotelModel -> hotelUpdate($arrayHot);

        if(isset($_FILES['photo'])){
            $idHotel = $arrayHot["idHotel"];

            $foto_temp = $_FILES["photo"]["tmp_name"];
            $foto_name = $_FILES["photo"]["name"];		//pega o nome

        $extensao = str_replace('.','',strrchr($foto_name, '.')); //strtolower(end(explode('.', $foto_name))); //seleciona a exten��o da imagem
        $max_width = 600; //define largura m�xima
        $max_height = 600; //define altura m�xima

        $img = null;

                //Transforma a imagem em JPG
        if ($extensao == 'jpg' || $extensao == 'jpeg') { 
            $img = @imagecreatefromjpeg($foto_temp);
        } else if ($extensao == 'png') { 
            $img = @imagecreatefrompng($foto_temp);
        } else if ($extensao == 'gif') { 
            $img = @imagecreatefromgif($foto_temp); 
        }  else     
            $img = @imagecreatefromjpeg($foto_temp); 

        // Se a imagem foi carregada com sucesso, testa o tamanho da mesma
        if ($img) { 
            // Pega o tamanho da imagem e calcula propor��o de resize 
            $width  = imagesx($img); 
            $height = imagesy($img); 
            $scale  = min($max_width/$width, $max_height/$height); 
            // Se a imagem � maior que o permitido, encolhe ela! 
            if ($scale < 1) { 
                $new_width = floor($scale*$width); 
                $new_height = floor($scale*$height);
                // Cria uma imagem tempor�ria 
                $tmp_img = @imagecreatetruecolor($new_width, $new_height);
                // Copia e resize a imagem velha na nova     
                @imagecopyresampled($tmp_img, $img, 0, 0, 0, 0, 
                                $new_width, $new_height, $width, $height);  
                @imagedestroy($img); 
                $img = $tmp_img; 
            }           
        }

        //cria imagem no diret�rio @imagejpeg($img,"diretorio/".$id_noticia) se j� tiver com este nome vai substituir
        @imagejpeg($img,"assets/img/hotel/".$idHotel.".jpg"); 
        

        }

        $this -> hotelList();
    }

    public function hotelDelete($idHotel){
        $this -> HotelModel -> hotelDelete($idHotel);

        $linkPhoto = 'assets/img/hotel/' .$idHotel. '.jpg';
        if (file_exists($linkPhoto)){
            unlink($linkPhoto);
        }

        $this -> hotelList();
    }

}
?>
