<?php require 'pages/header.php';?>

<?php 
    if(empty($_SESSION['cLogin'])) {
        ?>
            <script>
                window.location.href="login.php"
            </script>
        <?php
        exit;
    }
?>

<div class="container mt-5">
    <h1>Meus Anúncios</h1>
    <a href="add-anuncio.php" class="btn btn-info mt-3 mb-4">Adicionar um anuncio</a>

    <table class="table table-striped">
        <thead class="thead-inverse">
            <tr>
                <th>Foto</th>
                <th>Titulo</th>
                <th>Descrição</th>
                <th>Valor</th>
                <th>Ações</th>
            </tr>
            </thead>
            <tbody>
            <?php
                require 'classes/AdvertModel.php';
                $adv = new Advert();
                $adverts = $adv->getMyAdverts();

                
                foreach($adverts as $advert): ?>
                    <tr>
                        <td scope="row">
                            <?php if(isset($advert['url'])): ?>
                                <img src="assets/images/adverts/<?= $advert['url'] ;?>" alt="" width="60px">
                            <?php else: ?>
                                <img src="assets/images/default.png" width="50px" alt="">
                            <?php endif; ?>
                        </td>
                        <td><?= $advert['title'] ?></td>
                        <td><?= $advert['description'] ?></td>
                        <td><?= number_format($advert['value'], 2); ?></td>
                        <td>
                            <a href="editar-anuncio.php?id=<?= $advert['id'] ?>" class="btn btn-primary btn-sm">Editar</a>
                            <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#confirm">Excluir</button>
                            <div class="modal fade" id="confirm" role="dialog">
                                <div class="modal-dialog modal-md">
                                    <div class="modal-content">
                                        <div class="modal-body">
                                            <p>Tem certeza que quer excluir o anuncio</p>
                                        </div>
                                        <div class="modal-footer">
                                            <a href="excluir-anuncio.php?id=<?= $advert['id'] ?>" class="btn btn-danger btn-sm">Excluir</a>
                                            <button type="button" data-dismiss="modal" class="btn btn-default btn-sm">Cancelar</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </td>
                    </tr>
                <?php endforeach ?>
            </tbody>
    </table>
</div>

<?php require 'pages/footer.php';?>

