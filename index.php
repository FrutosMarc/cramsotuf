<?php
	require("./Includes/all.php");		
        $articleRepository = new ArticleRepository($db);
        $articleController = new ArticleController($articleRepository);
//	 GESTION DES PAGES 
	$page = "";
	$includePage = "" ;
	$title = "" ;

        
if (isset($_GET["pages"]))
	{
		$page = $_GET["pages"];
	}
	$DisplayHTML = true;
	switch ($page){
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
                    $html = $articleController->readAction();
                    $html .= $articleController->indexAction();
                    $includePage = "DEPREC";
                    break;
            case "article_list":
                    $html = $articleController->indexAction();
                    $title = "Liste des articles";
                    $includePage = "DEPREC";
                    break;
            case "article_edit":
                    $title = "Edition d'article";
                    $html = $articleController->persistAction();
                    $includePage = "DEPREC";
                    //$includePage = "/pages/article_edit.php";
                    break;
            case "article_delete":
                    $title = "Confirmation suppression";
                    $html = $articleController->deleteAction();
                    $includePage = "DEPREC";
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
                    if ($includePage != "DEPREC")
                        include("./includes".$includePage);
                    else
                        echo $html;
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
