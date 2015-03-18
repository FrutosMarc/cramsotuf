<?php
	session_start();
	require("./includes/db_connect.php");
	require("./Includes/functions.php");
	
	
//	 GESTION DES PAGES 
	$page = "";
	$includePage = "" ;
	$title = "" ;
	if (isset($_GET["pages"]))
	{
		$page = $_GET["pages"];
	}
	$DisplayHTML = true;
	switch ($page)
	{
			case "RegisterTraitement" :
				$includePage="/pages/RegisterTraitement.php";
				$DisplayHTML = false;
				break ;
			case "Register" :
				$title = "Enregistrement d'un compte";
				$includePage = "/pages/Register.php";
				break;
			case "Contact":
				$title = "Contacter";
				$includePage = "/pages/contact.php";
				break;
			case "article_read":
				$title = "Lecture d'un article";
				$includePage = "/pages/article_read.php";
				break;
			case "article_list":
				$title = "Liste des articles";
				$includePage = "/pages/article_list.php";
				break;
			case "article_edit":
				$title = "Edition d'article";
				$includePage = "/pages/article_edit.php";
				break;
			case "article_delete":
				$includePage = "/pages/article_delete.php";
				$DisplayHTML = false;
				break;
			
			default:
				$title = "Accueil";
				$includePage = "/pages/home.php";
				break ;
	}
	if ($DisplayHTML){
		
		include("./includes/blocs/head.php");
		include("./includes/blocs/menu.php");
		if(!DisplayMessage())
		{
			include("./includes".$includePage) ;
		}
		else
		{
			unset($_SESSION["messages"]);
		}
		include("./includes/blocs/foot.php");
	}	
	else {
		include("./includes".$includePage);
	}
