
<?php

if ($articles)
{
	$nbRows = count($articles);
?>

<h2>Liste d'articles(<?php echo (int)$nbRows ?>)</h2>
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
	</table>
<?php
} 
else
	echo "<p>Aucun article</>";

?>
<p><a href="?pages=article_edit"><button  style="width:75px;heigth:35px;cursor:hand;" >Ajouter</button></p>

