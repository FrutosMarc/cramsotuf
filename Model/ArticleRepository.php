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
    private $db;
    public function __construct($db)
    {
        $this->db = $db;
    }
    /**
 * @param int $id article identify
 * @return mixed $article Returns instance Class of Article or false
 */
    function get($id)
    {
        $sql ="SELECT * FROM article WHERE id=".$id;
        // construire un statement
        $statement = $this->db->query($sql);

         $statement->setFetchMode(PDO::FETCH_CLASS,"Article");
         $article = $statement->fetch();

        return $article;
    }
}

