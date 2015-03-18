	<?php
		if(!isset($_POST["ValidCpte"]))
		{
			unset($_SESSION["messages"]);
		}
	?>

	<h2>Formulaire d'enregistrement</h2>
	<Form method="post" action="./index.php?pages=RegisterTraitement"  enctype="multipart/form-data" >
			
			<Fieldset>
				<Legend>Etat civil</legend>
				<label>Titre
					<Select name ="titre"  placeholder="Titre" required>
						<option Value="M">M.</option>
						<option value="F">Mme</option>
						<option value="Mlle">Mlle</option>
					</Select></br>
				</Label>
				<label>Nom : </br><input type="text"  name="nom" placeholder="indiquez le nom" required></Label><br>
				<label>Prénom : </br><input type="text"  name="prenom" placeholder="indiquez le prénom" required></Label><br>
				<label>Date de naissance : </br>
					<input type="text" name="Date_naissance"   placeholder= "JJ/MM/AAAA" pattern="(0[1-9]|1[0-9]|2[0-9]|3[01])/(0[1-9]|1[012])/[0-9]{4}" title="Veuillez saisir une date correcte" required >
				</Label><br>
				Sexe :
					<label>M<input type="radio" name="sexe" Value="M"></label>
					<label>F<input type="radio" name="sexe" Value="F"></label>
			</fieldset>
			<fieldset>
				<legend>Identification</legend>
				<label>Email          : <input type="email" name="Email" required placeholder= "indiquez le courriel" onchange="form.EmailConfirm.pattern = this.value;" ></label>
				<label>Confirmation : <input type="email" name="EmailConfirm" ></label></br></br>
				<Label>Mot de passe : <input type="password" name="mdp" placeholder="indiquez le mot de passe"  onchange="form.mdpConfirm.pattern = this.value;"></label>
				<Label>Confirmation : <input type="password" name="mdpConfirm"></label>
			</fieldset>
			<fieldset>
				<legend>Informations complémentaires</legend>
				<label>Présentation :<textarea rows="4" cols="130" placeholder="décrivez-vous..."></textarea></label><br>
				<label>Téléphone : <input type="text" name="Tel" placeholder="téléphone" pattern="^(?:0|\(?\+33\)?\s?|0033\s?)[1-79](?:[\.\-\s]?\d\d){4}$"></label></br>
				<label>Adresse site (url) : <input type="url" placeholder="indiquez un site éventuel"name="Site"></label></br>
				<label>S'abonner à la newsletter : <input type="checkbox" name="Abonner"></label><br>
				<input type="hidden" name="MAX_FILE_SIZE" value="30000" />
				<label>photo de profil : <input type="file" name="profil_photo">
			</fieldset>
			<input type="submit" Value="Valider votre profil" name="ValidCpte">
			
		</Form>