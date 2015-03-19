<?php
if (isset($_POST["Valid"]))
{
    if ($_POST["id"]>0)
    {
        $result = $articleRepository->remove($_POST["id"]);
        if ($result)
        {
            header("location: ./index.php?pages=article_list");
            exit();
        }
        Echo "<p>ERREUR IMPOSSIBLE DE SUPPRIMER<p>";
    }
}
else if (isset($_POST["Annul"]))
{
       header("location: ./index.php?pages=article_list");
}
?>    

<h2>Confirmation de suppression</h2>
<Form action="" method="POST">
    <input type="hidden" name="id" value ="<?php echo $_GET["id"] ; ?>" />
    <p><strong>Voulez-vous confirmer la suppression de l'article <?php echo $_GET["id"] ; ?> ?</strong></p>
    <input type="submit" name="Valid" value="Confirmer" />
    <input type="submit" name="Annul" value="Annuler" />
</form>