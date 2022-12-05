<?php
    //autorisation JSON
    header("Access-Control-Allow-Origin: *");
    // header("Content-Type : application/json");
    
    //imports
    include './utils/connectBdd.php';
    include './model/model_article.php';
    include './manager/manager_article.php';

    //instance d'un objet Article
    $article = new MgrArticle();

    //tableau d'article (stocké un tableau d'objet)
    if(isset($_GET['filtre'])){
        $search = $_GET['filtre'];
        $tab = $article->showAllArticleByCat($bdd, $search);
        echo json_encode($tab);
    }
    else{
        $tab = $article->showArticle($bdd);
        echo json_encode($tab);
    }
    
?>