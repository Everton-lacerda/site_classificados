<?php 
require 'config/database.php';

if(empty($_SESSION['cLogin'])) {
    header("Location: login.php");
    exit;
}

require 'classes/AdvertModel.php';
$adv = new Advert();

if(isset($_GET['id']) && !empty($_GET['id'])) {
    $adv->getAdvert($_GET['id']);
}

header("Location: meus-anuncios.php");

?>