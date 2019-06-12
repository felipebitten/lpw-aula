<?php
class ClientsController {

    var $ClientModel;

    function __construct(){
        if(!isset($_SESSION["login"])){
            header("Location: index.php?c=m&a=l");
        }

        require_once("models/ClientsModel.php");
        $this -> ClientModel = new ClientsModel();
    }

    public function index(){
        $this -> listClients();
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
        require_once("views/clients/ListClients.php");
        require_once("views/Footer.php");
    }

    public function insertClient(){
        require_once("views/Header.php");
        require_once("views/clients/InsertClient.php");
        require_once("views/Footer.php");
    }

    public function insertClientAction(){
        $arrayClient["name"] = $_POST["name"];
        $arrayClient["address"] = $_POST["address"];
        $arrayClient["phone"] = $_POST["phone"];
        $arrayClient["email"] = $_POST["email"];
        $arrayClient["descri"] = $_POST["descri"];

        $this -> ClientModel -> insertClients($arrayClient);

        $idClient = $this -> ClientModel -> getConsult();

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
        @imagejpeg($img,"assets/img/clients/".$idClient.".jpg"); 

        $this -> listClients();
    }

    public function updateClient($idClient){
        $this -> ClientModel -> consultClient($idClient);
        $result = $this -> ClientModel -> getConsult();

        if ($arrayClient = $result->fetch_assoc()){
            require_once("views/Header.php");
            require_once("views/clients/AlterClient.php");
            require_once("views/Footer.php");
        }
    }

    public function updateClientAction(){
        $arrayClient["idClient"] = $_POST["idClient"];
        $arrayClient["name"] = $_POST["name"];
        $arrayClient["address"] = $_POST["address"];
        $arrayClient["phone"] = $_POST["phone"];
        $arrayClient["email"] = $_POST["email"];
        $arrayClient["descri"] = $_POST["descri"];

        $this -> ClientModel -> updateClient($arrayClient);

        if(isset($_FILES['photo'])){
            $idClient = $arrayClient["idClient"];

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
        @imagejpeg($img,"assets/img/clients/".$idClient.".jpg"); 
        

        }

        $this -> listClients();
    }

    public function deleteClient($idClient){
        $this -> ClientModel -> deleteClient($idClient);

        $linkPhoto = 'assets/img/clients/' .$idClient. '.jpg';
        if (file_exists($linkPhoto)){
            unlink($linkPhoto);
        }

        $this -> listClients();
    }

}
?>
