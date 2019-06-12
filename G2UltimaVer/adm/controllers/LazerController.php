<?php
class LazerController {

    var $LazerModel;

    function __construct(){
        if(!isset($_SESSION["login"])){
            header("Location: index.php?c=m&a=l");
        }

        require_once("models/LazerModel.php");
        $this -> LazerModel = new LazerModel();
    }

    public function index(){
        $this -> lazerList();
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
        require_once("views/lazer/LazerList.php");
        require_once("views/Footer.php");
    }

    public function lazerInsert(){
        require_once("views/Header.php");
        require_once("views/lazer/LazerInsert.php");
        require_once("views/Footer.php");
    }

    public function lazerInsertAction(){
        $arrayLaz["name"] = $_POST["name"];
        $arrayLaz["address"] = $_POST["address"];
        $arrayLaz["phone"] = $_POST["phone"];
        $arrayLaz["email"] = $_POST["email"];
        $arrayLaz["descri"] = $_POST["descri"];

        $this -> LazerModel -> lazerInsert($arrayLaz);

        $idLazer = $this -> LazerModel -> getConsult();

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
        @imagejpeg($img,"assets/img/lazer/".$idLazer.".jpg"); 

        $this -> lazerList();
    }

    public function lazerUpdate($idLazer){
        $this -> LazerModel -> consultLazer($idLazer);
        $result = $this -> LazerModel -> getConsult();

        if ($arrayLaz = $result->fetch_assoc()){
            require_once("views/Header.php");
            require_once("views/lazer/LazerAlter.php");
            require_once("views/Footer.php");
        }
    }

    public function lazerUpdateAction(){
        $arrayLaz["idLazer"] = $_POST["idLazer"];
        $arrayLaz["name"] = $_POST["name"];
        $arrayLaz["address"] = $_POST["address"];
        $arrayLaz["phone"] = $_POST["phone"];
        $arrayLaz["email"] = $_POST["email"];
        $arrayLaz["descri"] = $_POST["descri"];

        $this -> LazerModel -> lazerUpdate($arrayLaz);

        if(isset($_FILES['photo'])){
            $idLazer = $arrayLaz["idLazer"];

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
        @imagejpeg($img,"assets/img/lazer/".$idLazer.".jpg"); 
        

        }

        $this -> lazerList();
    }

    public function lazerDelete($idLazer){
        $this -> LazerModel -> lazerDelete($idLazer);

        $linkPhoto = 'assets/img/lazer/' .$idLazer. '.jpg';
        if (file_exists($linkPhoto)){
            unlink($linkPhoto);
        }

        $this -> lazerList();
    }

}
?>
