<h2>Edition d'articles</h2>
<?php

$idArticle = (isset($_POST["id"]) ? (int)$_POST["id"]:isset($_GET["id"]) ? (int) $_GET["id"] : 0);

if(isset($_POST["ValidRec"])) 
{
		echo "Submit";
		if ($idArticle==0)
		{
			echo "New";
			$sql = "INSERT INTO article(title,content) VALUES(:title,:content)";
		}
		else
		{
			echo "Update";
			$sql = "UPDATE article SET title=:title,content=:content WHERE id =".$idArticle;
		
		}
		$statement = $db->prepare($sql);
		$statement->bindParam(":title",$_POST["title"]);
		$statement->bindParam(":content",$_POST["content"]) ;
		$result = $statement->execute();
		header("location: ./index.php?pages=article_list");
		exit();
}
else
{
	$sql ="SELECT * FROM article WHERE id=".$idArticle;
	// construire un statement
	$statement = $db->query($sql);
	$article = $statement->fetch()                   

	?>	
		<Form method="post" action="index.php?pages=article_edit&id=<?php echo $idArticle; ?>"  enctype="multipart/form-data" >
				
				<Fieldset>
					<label>Titre
						<input type="text" name="title" value="<?php echo ($idArticle>0 ? $article["title"]: ""); ?>" required>
					</Label><br>
					<label>Description : </br><textarea name ="content" rows="4" cols="125" ><?php echo ($idArticle>0 ? $article["content"] : "") ; ?></textarea></Label><br>
				</fieldset>
				<input type="hidden" name="id" value="<?php echo $idArticle ;?>" required>
				<input type="submit" Value="Enregistrer l'article" name="ValidRec">		
		</form>
	<?php
}



