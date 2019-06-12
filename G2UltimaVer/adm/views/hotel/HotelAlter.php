<br>
<h1 class="text-center">Alterar Restaurantes</h1>
<br>
<div class="container">
<form action="?c=h&a=hua" method="POST" enctype="multipart/form-data">
    <div class="form-group">
        <div>
            <label for="idHotel">ID:</label>
            <input type="text" class="form-control" name="idHotel" value="<?= $arrayHot['idHotel']?>"
            readonly="readonly">
        </div>
        <br>
        <div>
            <label for="name">Nome:</label>
            <input type="text" class="form-control" name="name" value="<?= $arrayHot['name']?>">
        </div>
        <br>
        <div>
            <label for="email">Email:</label>
            <input type="text" class="form-control" name="email" value="<?= $arrayHot['email']?>">
        </div>
        <br>
        <div>
            <label for="phone">Telefone:</label>
            <input type="text" class="form-control" name="phone" value="<?= $arrayHot['phone']?>">
        </div>
        <br>
        <div>
            <label for="address">Endereço:</label>
            <input type="text" class="form-control" name="address" value="<?= $arrayHot['address']?>">
        </div>
        <br>
        <div>
            <label for="address">Descrição sobre o local:</label>
            <textarea class="form-control"name="descri"><?= $arrayHot['descri']?></textarea>
        </div>
        <br>
        <div>
            <label for="photo">Foto: (Selecione uma imagem se quiser alterar)</label>
            <input type="file" class="form-control" name="photo">
        </div>
        <br>
        <div>
            <img style="max-width: 100px; max-height: 100px;" src="assets/img/lazer/<?=$arrayHot
            ["idLazer"]?>.jpg">
        </div>
        <br>
        <button type="submit" class="btn btn-success">Salvar</button>
    </div>
</form>
</div>