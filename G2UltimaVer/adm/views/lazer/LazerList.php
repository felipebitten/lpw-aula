<br>
<h1 class="text-center">Listar Lazer</h1>
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
foreach($arrayLazer as $lazer){  
?>

    <tr class="text-center">
        <td><?=$lazer["idLazer"]?></td>
        <td><?=$lazer["name"]?></td>
        <td><?=$lazer["email"]?></td>
        <td><?=$lazer["address"]?></td>
        <td><?=$lazer["phone"]?></td>
        <td><?=$lazer["descri"]?></td>
        <td><a class="btn btn-warning" href="?c=l&a=lu&id=<?= $lazer
        ["idLazer"] ?>">Editar</a></td>
        <td><a class="btn btn-danger" href="?c=l&a=ld&id=<?= $lazer
        ["idLazer"] ?>">Deletar</a></td>
        <td>
            <?php
            if(is_file('assets/img/lazer/' . $lazer["idLazer"] . '.jpg')) {?>
                <a href="assets/img/lazer/ <?= $lazer["idLazer"] ?>.jpg">
                    <img style="max-width= 70px; max-height: 70px;" src="assets/img/lazer/<?= $lazer
                    ["idLazer"]?>.jpg">    
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