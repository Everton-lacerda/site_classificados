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

      if(!empty($title) && !empty($value) && !empty($description) && !empty($status) && !empty($categories) ) {
        $a->addAderts($title, $value, $description, $status, $categories);
        ?>
          <div class="container mt-5">
            <div class="alert alert-success">
              Produto adicionado com sucesso!
            </div>
          </div>
        <?php
      }
    }

?>

<div class="container">
    <h1>Meus anúncios - Adiconar anúncios</h1>

    <form action="" method="POST" enctype="multipart/form-data">
           <div class="form-group">
             <label for="categories">Categoria: </label>
             <select class="form-control" name="categories" id="categories">
              <?php
                require 'classes/CategorieModel.php';
                $c = new Categorie();
                $categs = $c->getList();  
                foreach($categs as $categ): ?>
                  <option value="<?= $categ["id"]?>"><?= utf8_encode($categ["name"])?></option>
                <?php endforeach ?>
              ?>
             </select>
           </div>
           <div class="form-group">
             <label for="title">Titulo</label>
             <input type="text" class="form-control" name="title" id="title"  placeholder="Titulo">
           </div>
           <div class="form-group">
             <label for="value">Valor</label>
             <input type="number" class="form-control" name="value" id="value"  placeholder="Digite o valor">
           </div>
           <div class="form-group">
             <label for="description">Descrição</label>
             <textarea class="form-control" name="description" id="description" rows="3"></textarea>
           </div>
           <div class="form-group">
             <label for="status">Estado de conservação</label>
             <select class="form-control" name="status" id="status">
               <option value="0">Ruim</option>
               <option value="1">Bom</option>
               <option value="2">Ótimo</option>
             </select>
           </div>
           <input name="btn" id="btn" class="btn btn-primary" type="submit" value="Adicionar">
    </form>
</div>

<?php require 'pages/footer.php';?>