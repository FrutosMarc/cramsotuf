<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Remote control of article information
 *
 * @author Marc
 */
class ArticleController {
    private $_repo ;
    /**
     * 
     * @param array represent $Repo
     */
   public function __construct($repo) {
    $this->_repo = $repo;
    }
    /**
    * Index will show every article into a list
    *
    * @return string HTML code of the content of page
    */
    public function indexAction() {
    // on forge la requete SQL
    $articles = $this->_repo->getAll();
    $view = new View("article.index", array("articles" => $articles));
    return $view->getHtml();
    }
    /**
    * Allow the users to read an article on a given id via GET
    *
    * @return string HTML code of the content of page
    */
    public function readAction() {
    // on récupère l'id de l'article à travers la var GET
    $id = isset($_GET['id']) ? (int) $_GET['id'] : 0;
    // on demande l'article au repo
    $article = $this->_repo->get($id);
    $view = new View("article.read", array("article" => $article));
    return $view->getHtml();
    }
    
    
    public function persistAction() 
    {
 
        $idArticle = (isset($_POST["id"]) ? (int)$_POST["id"]:isset($_GET["id"]) ? (int) $_GET["id"] : 0);

        $article = $this->_repo->get($idArticle);
        if ($article==null)
        {
            $article = new Article() ;
        }
        if(isset($_POST["ValidRec"])) 
        {
            $article->title = $_POST["title"];
            $article->content = $_POST["content"];
            $result = $this->_repo->persist($article);
            header("location: ./index.php?pages=article_list");
            exit();
        }
        else
        {
            
             $view = new View("article.persist", array("article" => $article));
            return $view->getHtml();       
        }
    }
    public function deleteAction()
    {
        if (isset($_POST["Valid"]))
       {
           if ($_POST["id"]>0)
           {
               $result = $this->_repo->remove($_POST["id"]);
               if ($result)
               {
                   header("location: ./index.php?pages=article_list");
                   exit();
               }
               Echo "<p>ERREUR IMPOSSIBLE DE SUPPRIMER<p>";
           }
       }
       else if (isset($_POST["Annul"]))
       {
              header("location: ./index.php?pages=article_list");
              exit();
       } 
       $article = $this->_repo->get($_GET["id"]);
       $view = new View("article.delete", array("article" => $article));
       return $view->getHtml();       
       
    }
}