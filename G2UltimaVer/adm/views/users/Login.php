<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
    <link rel="stylesheet" type="text/css" href="views/users/main.css">
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <!-- Popper JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</head>
<body>
<div class="tudo">
<div class="container">
<div class="configdiv">
    <div class="row">
        <div class="col-md-4"></div>
            <div id="login" class="col-md-4 p-5">
                <img id="loginfoto" class="mx-auto" src="views/users/torres.png">
                    <h2 class="text-center text-white">Login no Sistema</h2>
                    <br>
                    <form action="?c=u&a=vl" method="POST" name="formulario" id="formulario">  
                        <div class="form-group">
                            <label class="text-white" for="">Login</label>
                            <input type="text" class="form-control" name="login" placeholder="Digite seu usuario">
                        </div>          
                        <div class="form-group">
                            <label class="text-white" for="">Senha</label>
                            <input type="password" class="form-control" placeholder="*****" name="password">
                        </div>
                        <div class="row">
                        <input class="btn btn-primary mx-auto " type="submit" name="Enviar" value="Logar">
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-md-4"></div>
    </div>
</div>
</div>
</body>
</html>