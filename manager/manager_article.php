<?php
    class MgrArticle extends Article{
        public function showAllArticleByCat($bdd, $value){
            try {
                $req = $bdd->prepare("SELECT article.id_article AS id, nom_article AS nom,
                GROUP_CONCAT(CONCAT(nom_cat )ORDER BY nom_cat ASC SEPARATOR ',')AS categories
                FROM associer INNER JOIN article ON associer.id_article = article.id_article
                INNER JOIN categories ON associer.id_cat = categories.id_cat
                WHERE associer.id_article IN (SELECT associer.id_article FROM associer
                INNER JOIN categories ON associer.id_cat = categories.id_cat
                WHERE nom_cat LIKE '%$value%')GROUP BY article.id_article ;");
                $req->execute();
                $data = $req->fetchAll(PDO::FETCH_ASSOC);
                return $data;
            }    
            catch (Exception $e) 
            {
                //affichage d'une exception en cas d’erreur
                die('Erreur : '.$e->getMessage());
            }
        
        }
        public function showAllArticle($bdd):?array{
            try {
                $requete = "SELECT article.id_article, nom_article,
                CONCAT('[', GROUP_CONCAT(CONCAT('`',nom_cat,'`') ORDER BY nom_cat ASC SEPARATOR ', '),']') AS `liste` 
                FROM associer INNER JOIN article ON associer.id_article = article.id_article
                INNER JOIN categories ON associer.id_cat = categories.id_cat
                GROUP BY article.id_article";
                $req = $bdd->prepare($requete);
                $req->execute();
                $data = $req->fetchAll(PDO::FETCH_ASSOC);
                return $data;
            }    
            catch (Exception $e) 
            {
                //affichage d'une exception en cas d’erreur
                die('Erreur : '.$e->getMessage());
            }
        
        }
    }
?>