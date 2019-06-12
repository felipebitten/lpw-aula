<?php 
    class UsersController{
        
        public function validateLogin(){
            $login = $_POST["login"];
            require("models/UsersModel.php");
            $User = new UsersModel();
            $User -> consultUser($login);
            $result = $User -> getConsult();

            if($line = $result->fetch_assoc()){
                if($line['password'] == $_POST['password']){
                    $_SESSION['idUSer'] = $line ['idUser'];
                    $_SESSION['name'] = $line ['name'];
                    $_SESSION['login'] = $line ['login'];
                    header("Location: index.php?c=m&a=i");
                }else{ //SENHA INCORRETA
                    print("Senha incorreta");
                }
            }else{ //USUARIO DIGITADO N EXISTE
                print("usuario não existe!");
            }
        }
    }
?>