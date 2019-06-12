<br>
<h1 class="text-center">Listar Hoteis</h1>
<br>
<div id="tabela" class="container">
<table class="table table-hover text-center">
<tr>
    <th>Código</th>
    <th>Nome</th>
    <th>Email</th>
    <th>Endereço</th>
    <th>Telefone</th>
    <th>Descrição</th>
    <th colspan="2">Opções</th>
    <th colspan="1">Foto</th>
</tr>

<?php
foreach($arrayHotel as $hotel){  
?>

    <tr class="text-center">
        <td><?=$hotel["idHotel"]?></td>
        <td><?=$hotel["name"]?></td>
        <td><?=$hotel["email"]?></td>
        <td><?=$hotel["address"]?></td>
        <td><?=$hotel["phone"]?></td>
        <td><?=$hotel["descri"]?></td>
        <td><a class="btn btn-warning" href="?c=h&a=hu&id=<?= $hotel
        ["idHotel"] ?>">Editar</a></td>
        <td><a class="btn btn-danger" href="?c=h&a=hd&id=<?= $hotel
        ["idHotel"] ?>">Deletar</a></td>
        <td>
            <?php
            if(is_file('assets/img/hotel/' . $hotel["idHotel"] . '.jpg')) {?>
                <a href="assets/img/hotel/ <?= $hotel["idHotel"] ?>.jpg">
                    <img style="max-width= 70px; max-height: 70px;" src="assets/img/hotel/<?= $hotel
                    ["idHotel"]?>.jpg">    
                </a>
            
            <?php
            } else {    ?>
                Sem foto
            <?php
            }
            ?>
        </td>
    </tr>

<?php
}
?>
</table>
</div>