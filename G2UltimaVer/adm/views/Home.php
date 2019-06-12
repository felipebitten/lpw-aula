<br>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <p id="painel">Painel de Controle - #Torres</p>
        </div>
    </div>
</div>
<div class="container">
    <div class="jumbotron">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <h2>Olá <?=$_SESSION["name"]?>, seja bem-vindo!</h2>
                </div>
            </div>
            <br>
            <div class="row text-center">
                <div class="col-sm-4">
                    <div class="card text-white bg-info mb-3" style="max-width: 18rem;">
                        <div class="card-body">
                            <h5 class="card-title text-center">Quantidade de lazer cadastrados</h5>
                            <h3 class="card-text text-center"><?=$totallazer?></h3>
                            <br>
                            <a href="?c=l&a=la" class="btn btn-warning">Listagem</a>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="card text-white bg-dark mb-3" style="max-width: 18rem;">
                        <div class="card-body">
                            <h5 class="card-title text-center">Quantidade de Hotéis cadastrados</h5>
                            <h3 class="card-text text-center"><?=$totalhotel?></h3>
                            <br>
                            <a href="?c=h&a=ha" class="btn btn-warning">Listagem</a>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="card text-white bg-primary mb-3" style="max-width: 18rem;">
                        <div class="card-body">
                            <h5 class="card-title text-center">Quantidade de Restaurantes cadastrados</h5>
                            <h3 class="card-text text-center"><?=$totalclients?></h3>
                            <br>
                            <a href="?c=c&a=lc" class="btn btn-warning">Listagem</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
