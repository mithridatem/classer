<?php
    class Article{
        private ?int $id_article;
        private ?string $nom_article;

        public function __construct(){
        }
        public function getIdArticle(){
            return $this->id_article;
        }
        public function setIdArticle($id){
            $this->id_article = $id;
        }
        public function getNomArticle(){
            return $this->nom_article;
        }
        public function setNomArticle($nom){
            $this->nom_article = $nom;
        }
    }
?>