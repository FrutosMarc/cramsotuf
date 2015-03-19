
<?php
$sql ="SELECT * FROM article";
// construire un statement
$statement = $db->query($sql);

 $statement->setFetchMode(PDO::FETCH_CLASS,"Article");
if ($articles = $statement->fetchAll())
{
	$nbRows = count($articles);
	?><h2>Liste d'articles(<?php echo (int)$nbRows ?>)</h2>
	<table width="75%">
	<?php
	foreach ($articles as $article)
	{
        ?>
		<tr>
			<article id=<?php echo $article->id ;?> >
				<td class="title"><a href="?pages=article_read&id=<?php echo $article->id; ?>" > <?php echo $article->title; ?></a></td>
				<td><a href="?pages=article_edit&id=<?php echo $article->id; ?>" ><button style="width:75px;">Editer</button></a></td>
				<td><a href="?pages=article_delete&id=<?php echo $article->id; ?>" ><button style="width:75px;">Supprimer</button></a></td>
			</article>
		</tr>
<?php
	}
	
?>
		<tr>
			<td colspan=3 style="text-align:left;"><br><a href="?pages=article_edit"><button  style="width:75px;heigth:35px;cursor:hand;" >Ajouter</button></a></td>
		</tr>
	</table>
<?php
} 
else
	echo "<p>Aucun article</>";

