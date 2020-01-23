<?php 
    class User {
        
        public function cadastrar($name, $email, $password, $telephone) {
            global $pdo;
            
            $sql = $pdo->prepare("SELECT id FROM users WHERE email = :email");
            $sql->bindValue(":email", $email);
            $sql->execute();

            if($sql->rowCount() == 0 ) {
                $sql = $pdo->prepare("INSERT INTO users SET name = :name, email = :email, password = :password, telephone = :telephone");

                $sql->bindValue(":name", $name);
                $sql->bindValue(":email", $email);
                $sql->bindValue(":password", md5($password));
                $sql->bindValue(":telephone", $telephone);
                $sql->execute();

                return true;

            } else {
                return false;
            }
        }

        public function login ($email, $password) {
            global $pdo;
            
            $sql = $pdo->prepare("SELECT id FROM users WHERE email = :email AND password = :password");
            $sql->bindValue(":email", $email);
            $sql->bindValue(":password", md5($password));
            $sql->execute();

            if($sql->rowCount() > 0 ) {

                $dado = $sql->fetch();
                $_SESSION['cLogin'] = $dado['id'];

                return true;

            } else {
                return false;
            }
        }
    }
?>



