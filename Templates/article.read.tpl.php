<h2>Lecture d'article</h2>
<?php



if ($article)
{
?>
<article id="<?php echo $article->id; ?>" >
	<h1><?php echo $article->title; ?></h1>
	<p><?php echo nl2br($article->content); ?></p>
</article>	
<?php
}
else
	echo "<p>Aucun article</>";
?>
