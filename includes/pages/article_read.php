<?php
$idArticle = 0 ;
if (isset($_GET["id"]))
{
	$idArticle = (int) $_GET["id"];
}
?>
<h2>Lecture d'article</h2>
<?php
$sql ="SELECT * FROM article WHERE id=".$idArticle;
// construire un statement
$statement = $db->query($sql);

if ($article = $statement->fetch())
{
?>
<article id="<?php echo $article["id"] ;?>" >
	<h1><?php echo $article["title"]; ?></h1>
	<p><?php echo nl2br($article["content"]); ?></p>
</article>	
<?php
}
else
	echo "<p>Aucun article</>";
?>
