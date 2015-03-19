<h2>Edition d'articles</h2>
<?php

$idArticle = (isset($_POST["id"]) ? (int)$_POST["id"]:isset($_GET["id"]) ? (int) $_GET["id"] : 0);

$article = $articleRepository->get($idArticle);

if(isset($_POST["ValidRec"])) 
{
    $article->title = $_POST["title"];
    $article->content = $_POST["content"];
    $result = $articleRepository->persist($article);
    header("location: ./index.php?pages=article_list");
    exit();
}
else
{


	?>	
		<Form method="post" action="index.php?pages=article_edit&id=<?php echo $idArticle; ?>"  enctype="multipart/form-data" >
				
				<Fieldset>
					<label>Titre
						<input type="text" name="title" value="<?php echo ($idArticle>0 ? $article->title: ""); ?>" required>
					</Label><br>
					<label>Description : </br><textarea name ="content" rows="4" cols="125" ><?php echo ($idArticle>0 ? $article->content : "") ; ?></textarea></Label><br>
				</fieldset>
				<input type="hidden" name="id" value="<?php echo $idArticle ;?>" required>
				<input type="submit" Value="Enregistrer l'article" name="ValidRec">		
		</form>
	<?php
}



