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

    require 'classes/AdvertModel.php';
    $a = new Advert();

    if(isset($_POST['title']) && !empty($_POST['title'])) {
      $title  = addslashes($_POST['title']);
      $categories  = addslashes($_POST['categories']);
      $value  = addslashes($_POST['value']);
      $description  = addslashes($_POST['description']);
      $status  = addslashes($_POST['status']);

      if(isset($_FILES['fotos'])) {
        $photos  = $_FILES['fotos'];
      } else {
          $photos = array();
      }

      if( !empty($title) && !empty($value) && !empty($description) && !empty($status) && !empty($categories) && !empty($photos) ) {
        
        $a->editAderts($title, $value, $description, $status, $categories, $photos, $_GET['id']);
        
        ?>
            <script>
                window.location.href="meus-anuncios.php"
            </script>
          <div class="container mt-5">
            <div class="alert alert-success">
              Produto Editado com sucesso!
            </div>
          </div>
        <?php
      }
    }

    if(isset($_GET['id']) && !empty($_GET['id'])) {
        $info = $a->getAdvert($_GET['id']);
    } else {
        ?>
            <script>
                window.location.href="meus-anuncios.php"
            </script>
        <?php
    }


?>

<div class="container">
    <h1>Meus anúncios - Editar anúncios</h1>

    <form action="" method="POST" enctype="multipart/form-data">
           <div class="form-group">
             <label for="categories">Categoria: </label>
             <select class="form-control" name="categories" id="categories">
              <?php
                require 'classes/CategorieModel.php';
                $c = new Categorie();
                $categs = $c->getList();  
                foreach( $categs as $categ ): ?>
                    <option value="<?= $categ["id"]?>" <?= ( $info['id_category'] === $categ["id"] ) ? 'selected="selected"' : ''; ?>>
                        
                        <?= utf8_encode($categ["name"])?>
                    </option>
                <?php endforeach ?>

              ?>
             </select>
           </div>
           <div class="form-group">
             <label for="title">Titulo</label>
             <input type="text" class="form-control" name="title" id="title"  placeholder="Titulo" value="<?= $info['title'] ;?>">
           </div>
           <div class="form-group">
             <label for="value">Valor</label>
             <input type="number" class="form-control" name="value" id="value"  placeholder="Digite o valor" value="<?= $info['value'] ;?>" >
           </div>
           <div class="form-group">
             <label for="description">Descrição</label>
             <textarea class="form-control" name="description" id="description" rows="3"><?= $info['description'] ;?></textarea>
           </div>
           <div class="form-group">
             <label for="status">Estado de conservação</label>
             <select class="form-control" name="status" id="status">
                <option value="2" <?= ( $info['status'] === '2' ) ? 'selected="selected"' : ''; ?>>Ótimo</option>
                <option value="1" <?= ( $info['status'] === '1' ) ? 'selected="selected"' : ''; ?>>Bom</option>
                <option value="0" <?= ( $info['status'] === '0' ) ? 'selected="selected"' : ''; ?>>Ruim</option>
             </select>
           </div>
           <div class="form-group">
             <label for="add_photo">Fotos do anúncio</label>
             <input type="file" class="form-control" name="fotos[]" multiple > 
             <div class="card mt-4">
                <div class="card-header"> Fotos do Anúncio </div>
                <div class="card-body ">
                    <div class="row mx-auto">
                        <?php 
                                
                            foreach($info['fotos'] as $photo) {
                                ?>                               
                                    <div class="card mt-5 m-5" style="width: 16rem;">
                                        <img class="card-img-top" src="assets/images/adverts/<?= $photo['url'] ;?>" alt="">
                                        <div class="card-body text-center">
                                            <a href="excluir-foto.php?id=<?= $photo['id'] ;?>" class="btn btn-danger btn-sm btn-block">Excluir imagem</a>
                                        </div>
                                    </div>
                                <?php
                            }
                        ?>
                    </div>

                </div>
            </div>  
           </div>

           <input name="btn" id="btn" class="btn btn-primary" type="submit" value="Salvar">
    </form>
</div>

<?php require 'pages/footer.php';?>