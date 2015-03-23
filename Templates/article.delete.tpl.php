<h2>Confirmation de suppression</h2>
<Form action="" method="POST">
    <input type="hidden" name="id" value ="<?php echo $article->id ; ?>" />
    <p><strong>Voulez-vous confirmer la suppression de l'article <?php echo $article->id ; ?> ?</strong></p>
    <input type="submit" name="Valid" value="Confirmer" />
    <input type="submit" name="Annul" value="Annuler" />
</form>