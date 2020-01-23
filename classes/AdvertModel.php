<?php 

class Advert {
    public function getMyAdverts(){
        global $pdo;
        $array = array(); 

        $sql = $pdo->prepare("SELECT *, (
            select adverts_images.url from adverts_images where adverts_images.id_adverts = id_adverts limit 1) as url 
            FROM adverts WHERE id_users = :id_users"
        );
        $sql->bindValue(":id_users", $_SESSION['cLogin']);
        $sql->execute();

        if($sql->rowCount() > 0) {
            $array = $sql->fetchAll();
        }

        return $array;
    }
    public function getAdvert($id) {
        global $pdo;
        $array = array(); 
        $sql = $pdo->prepare("SELECT * FROM adverts  WHERE id = :id;");
        $sql->bindValue(":id", $id );
        $sql->execute();

        if($sql->rowCount() > 0) {
            $array = $sql->fetch();
            $array['fotos'] = array();

            $sql = $pdo->prepare("SELECT id, url FROM adverts_images  WHERE id_adverts = :id_adverts;");
            $sql->bindValue(":id_adverts", $id );
            $sql->execute();

            if($sql->rowCount() > 0) {
                $array['fotos'] =$sql->fetchAll();
            }
        }

        return $array;

    }
    
    public function addAderts($title, $value, $description, $status, $categories) {
        global $pdo;
         
        $sql = $pdo->prepare("INSERT INTO adverts SET title = :title, id_category = :id_category, id_users = :id_users,
            description = :description, value = :value, status = :status    
        ");

        $sql->bindValue(":title", $title);
        $sql->bindValue(":value", $value);
        $sql->bindValue(":id_category", $categories);
        $sql->bindValue(":id_users", $_SESSION['cLogin']);
        $sql->bindValue(":description", $description);
        $sql->bindValue(":status", $status);
        $sql->execute();
    }

    public function editAderts($title, $value, $description, $status, $categories, $photos, $id) {
        global $pdo;
         
        $sql = $pdo->prepare("UPDATE adverts SET title = :title, id_category = :id_category, id_users = :id_users,
            description = :description, value = :value, status = :status WHERE id = :id  
        ");

        $sql->bindValue(":title", $title);
        $sql->bindValue(":value", $value);
        $sql->bindValue(":id_category", $categories);
        $sql->bindValue(":id_users", $_SESSION['cLogin']);
        $sql->bindValue(":description", $description);
        $sql->bindValue(":status", $status);
        $sql->bindValue(":id", $id);
        $sql->execute();

        if(count($photos['tmp_name']) > 0) {

            for($i=0; $i < count($photos); $i ++) {
                $type = $photos['type'][$i];

                if( in_array($type, array('image/jpeg', 'image/png' ) ) ) {
                    $tmpname = md5(time().rand(0,9999)).'.jpg';

                    move_uploaded_file($photos['tmp_name'][$i], 'assets/images/adverts/'.$tmpname);

                    list($width_orig, $height_orig) = getimagesize('assets/images/adverts/'.$tmpname);
                    $ratio = $width_orig/$height_orig;
                    
                    $width = 500;
                    $height = 500;

                    if($width / $height > $ratio) {
                        $width = $height * $ratio;
                    } else {
                        $height = $width / $ratio;
                    }
                    $img = imagecreatetruecolor($width, $height);

                    if($type === 'image/jpeg') {
                        $origi = imagecreatefromjpeg('assets/images/adverts/'.$tmpname);
                    } elseif($type === 'image/png') {
                        $origi = imagecreatefrompng('assets/images/adverts/'.$tmpname);
                    }

                    imagecopyresampled($img, $origi,0,0,0,0, $width, $height, $width_orig, $height_orig);


                    imagejpeg($img, 'assets/images/adverts/'.$tmpname, 80);

                    $sql = $pdo->prepare("INSERT INTO adverts_images SET id_adverts = :id_adverts, url = :url");
                    $sql->bindValue(":id_adverts", $id);
                    $sql->bindValue(":url", $tmpname);
                    $sql->execute();
                }

            }
        }
    }

    public function deleteAdevert($id) {
        global $pdo;

        $sql = $pdo->prepare("DELETE from adverts_images WHERE id_adverts = :id_adverts");
        $sql->bindValue(":id_adverts", $id);
        $sql->execute();


        $sql = $pdo->prepare("DELETE from adverts WHERE id = :id");
        $sql->bindValue(":id", $id);
        $sql->execute();
    }

    public function deletePhoto($id) {
        global $pdo;

        $id_advert = 0;

        $sql = $pdo->prepare("SELECT id_adverts FROM adverts_images  WHERE id = :id;");
        $sql->bindValue(":id", $id);
        $sql->execute();

        if($sql->rowCount() > 0) {
            $row = $sql->fetch();
            $id_advert = $row['id_adverts'];
        }

        $sql = $pdo->prepare("DELETE FROM adverts_images WHERE id = :id");
        $sql->bindValue(":id", $id);
        $sql->execute();

        return $id_advert;
    }
    
}

?>