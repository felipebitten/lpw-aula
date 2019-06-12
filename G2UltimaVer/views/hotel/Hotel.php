<br>
<h1 class="text-center">Hoteis</h1>
<br>
<div style="background-color: #F2F2F2;" class="container">
    <br>
    
        <br>
    <!-- Modal grande -->


<hr>
    <?php
foreach($arrayHotel as $hotel){  
?>
<div class="row">
    <div class="col-sm-2">
        <?php
        
            if(is_file('adm/assets/img/hotel/' . $hotel["idHotel"] . '.jpg')) {?>
                <img style="max-width= 150px; max-height: 150px; border-radius:50%; border: 1px solid black;" src="adm/assets/img/hotel/<?= $hotel
                ["idHotel"]?>.jpg">    

            
            <?php
            } else {    ?>
                Sem foto
            <?php
            }
            ?>
    </div>    
        <div class="col-sm-10">
            <h2 id="titulocard" class="card-title"><?=$hotel["name"]?></h2>
            <h5 class="card-text"><?=$hotel["descri"]?></h5>
            <p class="card-text lead">Endereço: <?=$hotel["address"]?></p>
            <p class="card-text lead">Telefone: <?=$hotel["phone"]?></p>
        </div>
    </div>
    <hr>
<?php
}
?>
  
  <br>

</div>
<br>