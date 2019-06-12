<br>
<h1 class="text-center">Lazer e Diversão</h1>
<br>
<div style="background-color: #F2F2F2;" class="container">
    <br>
    
        <br>
    <!-- Modal grande -->


<hr>
    <?php
foreach($arrayLazer as $lazer){  
?>
<div class="row">
    <div class="col-sm-2">
        <?php
        
            if(is_file('adm/assets/img/lazer/' . $lazer["idLazer"] . '.jpg')) {?>
                <img style="max-width= 150px; max-height: 150px; border-radius:50%; border: 1px solid black;" src="adm/assets/img/lazer/<?= $lazer
                ["idLazer"]?>.jpg">    

            
            <?php
            } else {    ?>
                Sem foto
            <?php
            }
            ?>
    </div>    
        <div class="col-sm-10">
            <h2 id="titulocard" class="card-title"><?=$lazer["name"]?></h2>
            <h5 class="card-text"><?=$lazer["descri"]?></h5>
            <p class="card-text lead">Endereço: <?=$lazer["address"]?></p>
            <p class="card-text lead">Telefone: <?=$lazer["phone"]?></p>
        </div>
    </div>
    <hr>
<?php
}
?>
  
  <br>

</div>
<br>