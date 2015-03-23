                <h2>Edition d'articles</h2>
                <Form method="post" action="index.php?pages=article_edit&id=<?php echo $article->id; ?>"  enctype="multipart/form-data" >
				
				<Fieldset>
					<label>Titre
						<input type="text" name="title" value="<?php echo $article->title; ?>" required>
					</Label><br>
					<label>Description : </br><textarea name ="content" rows="4" cols="125" ><?php echo $article->content ; ?></textarea></Label><br>
				</fieldset>
				<input type="hidden" name="id" value="<?php echo $article->id ;?>">
				<input type="submit" Value="Enregistrer l'article" name="ValidRec">		
		</form>
