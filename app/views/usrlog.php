<?php include 'layout-top.php' ?>



<form method='POST' action='<?=route('usrlog/salvar/'._v($data,"id"))?>'>

<label class='col-md-6'>
    Nome
    <input type="text" class="form-control" name="nome" value="<?=_v($data,"nome")?>" >
</label>

    E-mail
<label class='col-md-2'>
    <E-mail></E-mail>
    <input type="text" class="form-control" name="email" value="<?=_v($data,"email")?>" >
</label>

    Senha
<label class='col-md-2'>
    <E-mail></E-mail>
    <input type="text" class="form-control" name="senha" value="<?=_v($data,"senha")?>" >
</label>

<button class='btn btn-primary col-12 col-md-3 mt-3'>Salvar</button>
<a class='btn btn-secondary col-12 col-md-3 mt-3' href="<?=route("usrlog")?>">Novo</a>

</form>

<table class='table'>

    <tr>
        <th>Editar</th>
        <th>Nome</th>
        <th>E-mail</th>
        <th>Senha</th>
        <th>Deletar</th>
    </tr>

    <?php foreach($lista as $item): ?>

        <tr>
            <td>
                <a href='<?=route("usrlog/index/{$item['id']}")?>'>Editar</a>
            </td>
            <td><?=$item['nome']?></td>
            <td><?=$item['email']?></td>
            <td><?=$item['senha']?></td>
            <td>
                <a href='<?=route("usrlog/deletar/{$item['id']}")?>'>Deletar</a>
            </td>
        </tr>

    <?php endforeach; ?>
</table>

<?php include 'layout-bottom.php' ?>