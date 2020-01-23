<?php 
require 'config/database.php';

if(empty($_SESSION['cLogin'])) {
    header("Location: login.php");
    exit;
}

require 'classes/AdvertModel.php';
$a = new Advert();

if(isset($_GET['id']) && !empty($_GET['id'])) {
    $id_advert = $a->deletePhoto($_GET['id']);
}
if(isset($id_advert)) {
    header("Location: editar-anuncio.php?id=".$id_advert);
}else {
    header("Location: meus-anuncios.php");
}

?>