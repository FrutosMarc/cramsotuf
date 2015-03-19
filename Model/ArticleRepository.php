<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * ArticleRepository will handle every transaction with the database 
 *
 * @author Marc
 */
class ArticleRepository {
    //put your code here
    private $_db;
    /**
     * The Constructor need db connexion for work
     * @param PDO $db
     */
    public function __construct($db)
    {
        $this->_db = $db;
    }
    /**
 * @param int $id article identify
 * @return mixed $article Returns instance Class of Article or false
 */
    function get($id)
    {
        $sql ="SELECT * FROM article WHERE id=".$id;
        // construire un statement
        $statement = $this->_db->query($sql);

         $statement->setFetchMode(PDO::FETCH_CLASS,"Article");
         $article = $statement->fetch();

        return $article;
    }
    /**
     * for update a Article method need an instance of Article class
     * This methode add or update Article
     * @param Class Article instance : $article
     */
    function persist($article)
    {
        if (!$article->id)
        {
                $sql = "INSERT INTO article(title,content) VALUES(:title,:content)";
        }
        else
        {
                $sql = "UPDATE article SET title=:title,content=:content WHERE id =".$article->id;
        }
        $statement = $this->_db->prepare($sql);
        $statement->bindParam(":title",$article->title);
        $statement->bindParam(":content",$article->content) ;
        $result = $statement->execute();
        
    }
    /**
     * Delete a article 
     * @return int of number of article delete
     */
    function remove($id)
    {
    	$sql = "DELETE FROM article WHERE id=". $id;
	// construire un statement
	$Result = $this->_db->exec($sql);

    
        return $Result; 
    }
    /**
     * 
     * @return array of Article Class instance
     */
    public function getAll()
    {
        // Construction de la requête permettant de récupérer tous les articles
        $sql ="SELECT * FROM article ";
        // construire un statement
        $statement = $this->_db->query($sql);

         $statement->setFetchMode(PDO::FETCH_CLASS,"Article");
         $articles = $statement->fetchAll();

        return $articles;
    }
    
}

