<br>
<h1 class="text-center">Listar Restaurantes</h1>
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
foreach($arrayClients as $client){  
?>

    <tr class="text-center">
        <td><?=$client["idClient"]?></td>
        <td><?=$client["name"]?></td>
        <td><?=$client["email"]?></td>
        <td><?=$client["address"]?></td>
        <td><?=$client["phone"]?></td>
        <td><?=$client["descri"]?></td>
        <td><a class="btn btn-warning" href="?c=c&a=uc&id=<?= $client
        ["idClient"] ?>">Editar</a></td>
        <td><a class="btn btn-danger" href="?c=c&a=dc&id=<?= $client
        ["idClient"] ?>">Deletar</a></td>
        <td>
            <?php
            if(is_file('assets/img/clients/' . $client["idClient"] . '.jpg')) {?>
                <a href="assets/img/clients/ <?= $client["idClient"] ?>.jpg">
                    <img style="max-width= 70px; max-height: 70px;" src="assets/img/clients/<?= $client
                    ["idClient"]?>.jpg">    
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