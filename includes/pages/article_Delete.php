<?php
if ($_GET["id"]>0)
{
	$sql = "DELETE FROM article WHERE id=". $_GET["id"];
	// construire un statement
	$statement = $db->query($sql);
	$statement->execute();
}
	header("location: ./index.php?pages=article_list");
?>